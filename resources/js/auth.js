/**
 * Sukabumi Robotic Competition (SRC) - Frontend Auth Controller
 *
 * Handles:
 *   1. Form validation & error state feedback
 *   2. Tab switching (Login <-> Register)
 *   3. Multi-step Forgot Password flow (Email -> OTP -> Reset Password -> Success)
 *   4. Multi-box OTP input with auto-advance & paste distribution
 *   5. Admin login validation
 */

/* =====================================================================
 * 1. SHARED HELPERS & VALIDATION
 * ================================================================== */

const OTP_LENGTH = 4;
const RESEND_COOLDOWN = 30;
const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

const MESSAGES = {
    required: 'Kolom ini wajib diisi.',
    email: 'Format email tidak valid (contoh: tim@robot.id).',
    min: (param) => `Gunakan minimal ${param} karakter.`,
    match: 'Konfirmasi kata sandi tidak cocok.',
    otp: (param) => `Masukkan lengkap ${param} digit kode verifikasi.`,
};

const VALIDATORS = {
    required: (value) => value.trim().length > 0,
    email: (value) => EMAIL_PATTERN.test(value.trim()),
    min: (value, param) => value.length >= Number(param),
    match: (value, param, form) => {
        const other = form?.querySelector(`[name="${param}"]`);
        return Boolean(other) && value.length > 0 && value === other.value;
    },
    otp: (value, param) => new RegExp(`^\\d{${Number(param)}}$`).test(value),
};

/** Show or clear the inline error for a single input. */
function setFieldError(input, message) {
    const key = input.dataset.errorFor ?? input.name;
    const node = (input.form ?? document).querySelector(`[data-error-for="${key}"]`);

    if (message) {
        input.setAttribute('aria-invalid', 'true');
        if (node) {
            const textNode = node.querySelector('[data-error-text]');
            if (textNode) textNode.textContent = message;
            node.classList.remove('hidden');
            node.classList.add('flex');
        }
    } else {
        input.removeAttribute('aria-invalid');
        if (node) {
            node.classList.add('hidden');
            node.classList.remove('flex');
        }
    }

    return !message;
}

/** Validate one input against its `data-validate` rules and paint errors. */
function checkInput(input) {
    for (const rule of (input.dataset.validate ?? '').trim().split('|')) {
        if (!rule) continue;
        const [name, param] = rule.split(':');
        const validator = VALIDATORS[name];
        if (validator && !validator(input.value ?? '', param, input.form)) {
            const message = MESSAGES[name];
            return setFieldError(input, typeof message === 'function' ? message(param) : message);
        }
    }

    return setFieldError(input, null);
}

/** Validate every input in a scope, focusing the first invalid field. */
function validateForm(scope) {
    let firstInvalid = null;

    for (const input of scope.querySelectorAll('[data-validate]')) {
        if (!checkInput(input) && !firstInvalid) firstInvalid = input;
    }

    firstInvalid?.focus();
    return firstInvalid === null;
}

/** Remove every painted error in a scope. */
function clearErrors(scope) {
    for (const node of scope.querySelectorAll('[data-error-for]')) {
        node.classList.add('hidden');
        node.classList.remove('flex');
        const textNode = node.querySelector('[data-error-text]');
        if (textNode) textNode.textContent = '';
    }

    for (const input of scope.querySelectorAll('[aria-invalid]')) {
        input.removeAttribute('aria-invalid');
    }
}

/** Toggle a form-level banner, e.g. "account created, you can sign in". */
function setFormMessage(scope, message, tone = 'error') {
    const node = scope.querySelector('[data-form-message]');
    if (!node) return;

    const textNode = node.querySelector('[data-error-text]');
    if (textNode) textNode.textContent = message ?? '';

    node.classList.toggle('hidden', !message);
    node.classList.toggle('flex', Boolean(message));

    const banner = node.firstElementChild;
    if (banner && message) {
        banner.className = `flex items-start gap-2.5 rounded-xl border px-4 py-3 text-sm font-medium ${
            tone === 'success'
                ? 'border-emerald-200 bg-emerald-50 text-emerald-800'
                : 'border-red-200 bg-red-50 text-red-700'
        }`;
    }
}

/** Put a button into / out of its loading state. */
function setButtonLoading(button, loading, loadingText = 'Memproses...') {
    if (!button) return;
    const label = button.querySelector('[data-button-label]');
    const spinner = button.querySelector('[data-button-spinner]');

    if (loading) {
        if (label && !button.dataset.originalLabel) {
            button.dataset.originalLabel = label.textContent.trim();
        }
        if (label) label.textContent = loadingText;
        spinner?.classList.remove('hidden');
        button.disabled = true;
        button.setAttribute('aria-busy', 'true');
        return;
    }

    if (label) label.textContent = button.dataset.originalLabel ?? label.textContent;
    spinner?.classList.add('hidden');
    button.disabled = false;
    button.removeAttribute('aria-busy');
}

/** Wire show/hide toggles for every password field in a scope. */
function bindPasswordToggles(scope) {
    for (const toggle of scope.querySelectorAll('[data-password-toggle]')) {
        const input = document.getElementById(toggle.dataset.passwordToggle);
        if (!input) continue;

        toggle.addEventListener('click', () => {
            const revealed = input.type === 'text';
            input.type = revealed ? 'password' : 'text';
            toggle.setAttribute('aria-pressed', String(!revealed));
            toggle.setAttribute('aria-label', revealed ? 'Tampilkan kata sandi' : 'Sembunyikan kata sandi');

            const [shown, hidden] = toggle.querySelectorAll('[data-password-icon]');
            shown?.classList.toggle('hidden', !revealed);
            hidden?.classList.toggle('hidden', revealed);
        });
    }
}

/** Validate on blur; re-validate live only once a field is already in error. */
function bindValidation(scope) {
    for (const input of scope.querySelectorAll('[data-validate]')) {
        input.addEventListener('blur', () => checkInput(input));
        input.addEventListener('input', () => {
            if (input.getAttribute('aria-invalid') === 'true') checkInput(input);
        });
    }
}

/** Focus the first focusable control of a container. */
function focusFirst(scope) {
    scope?.querySelector('input:not([type="hidden"]), button, a[href]')?.focus();
}

/** Resolves after `ms` - stands in for a real API round-trip. */
function mockRequest(ms = 800) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}

/**
 * Multi-box OTP input: digit-only entry, auto-advance, backspace and arrow
 * navigation, plus paste distribution across the boxes.
 * Always enforces typing strictly from the leftmost available input slot.
 */
function createOtpController(group) {
    if (!group) return { value: () => '', setError: () => {}, clear: () => {}, focusFirst: () => {} };

    const inputs = [...group.querySelectorAll('[data-otp-input]')];
    const length = inputs.length;

    const setError = (message) => {
        for (const input of inputs) {
            if (message) input.setAttribute('aria-invalid', 'true');
            else input.removeAttribute('aria-invalid');
        }

        const node = group.querySelector('[data-error-for]');
        if (node) {
            const textNode = node.querySelector('[data-error-text]');
            if (textNode) textNode.textContent = message ?? '';
            node.classList.toggle('hidden', !message);
            node.classList.toggle('flex', Boolean(message));
        }
    };

    const focusAt = (index) => {
        const target = inputs[Math.max(0, Math.min(length - 1, index))];
        if (target) {
            target.focus();
            try {
                target.select();
            } catch (_) {}
        }
    };

    const getNextAvailableIndex = () => {
        const firstEmpty = inputs.findIndex((box) => box.value === '');
        return firstEmpty === -1 ? length - 1 : firstEmpty;
    };

    // If user clicks or focuses any slot ahead of an empty slot, divert focus to the leftmost empty slot
    const redirectFocusIfNeeded = (targetIndex, event = null) => {
        const firstEmpty = inputs.findIndex((box) => box.value === '');
        if (firstEmpty !== -1 && targetIndex > firstEmpty) {
            if (event) {
                event.preventDefault();
            }
            focusAt(firstEmpty);
            return true;
        }
        return false;
    };

    // Clicking anywhere inside the OTP container (even between boxes) focuses the first available slot
    group.addEventListener('pointerdown', (event) => {
        if (!event.target.matches('[data-otp-input]')) {
            event.preventDefault();
            focusAt(getNextAvailableIndex());
        }
    });

    inputs.forEach((input, index) => {
        // Enforce typing from leftmost slot on mouse/touch down
        input.addEventListener('pointerdown', (event) => {
            redirectFocusIfNeeded(index, event);
        });

        // Enforce typing from leftmost slot on keyboard Tab / focus
        input.addEventListener('focus', () => {
            if (!redirectFocusIfNeeded(index)) {
                try {
                    input.select();
                } catch (_) {}
            }
        });

        input.addEventListener('input', () => {
            input.value = input.value.replace(/\D/g, '').slice(-1);
            if (input.value && index < length - 1) focusAt(index + 1);
            if (inputs.every((box) => box.value !== '')) setError(null);
        });

        input.addEventListener('keydown', (event) => {
            if (event.key === 'Backspace') {
                if (!input.value && index > 0) {
                    event.preventDefault();
                    inputs[index - 1].value = '';
                    focusAt(index - 1);
                }
            } else if (event.key === 'ArrowLeft' && index > 0) {
                event.preventDefault();
                focusAt(index - 1);
            } else if (event.key === 'ArrowRight' && index < length - 1) {
                if (input.value) {
                    event.preventDefault();
                    focusAt(index + 1);
                }
            }
        });

        input.addEventListener('paste', (event) => {
            event.preventDefault();
            const digits = (event.clipboardData.getData('text') || '').replace(/\D/g, '');
            if (!digits) return;

            // Distribute digits starting from index 0 if full code, or leftmost empty slot
            const firstEmpty = inputs.findIndex((box) => box.value === '');
            const startIdx = digits.length >= length ? 0 : (firstEmpty === -1 ? 0 : firstEmpty);

            digits.slice(0, length - startIdx).split('').forEach((digit, offset) => {
                if (startIdx + offset < length) {
                    inputs[startIdx + offset].value = digit;
                }
            });
            focusAt(Math.min(length - 1, startIdx + digits.length));
            if (inputs.every((box) => box.value !== '')) setError(null);
        });
    });

    return {
        value: () => inputs.map((input) => input.value).join(''),
        setError,
        clear: () => inputs.forEach((input) => (input.value = '')),
        focusFirst: () => focusAt(0),
    };
}

/** Roving-tabindex arrow navigation for the login/register tablist. */
function bindTabKeys(tablist, onSelect) {
    if (!tablist) return;
    const tabs = [...tablist.querySelectorAll('[data-auth-tab]')];

    tablist.addEventListener('keydown', (event) => {
        const index = tabs.indexOf(document.activeElement);
        if (index === -1) return;

        const next = { ArrowRight: index + 1, ArrowLeft: index - 1, Home: 0, End: tabs.length - 1 }[event.key];
        if (next === undefined) return;

        event.preventDefault();
        const target = tabs[(next + tabs.length) % tabs.length];
        tabs.forEach((tab) => tab.setAttribute('tabindex', tab === target ? '0' : '-1'));
        onSelect(target.dataset.authTab);
        target.focus();
    });
}

/* =====================================================================
 * 2. USER AUTH (Login / Register / Forgot Password)
 * ================================================================== */

let routes = {};
try {
    const routeScript = document.getElementById('src-routes');
    if (routeScript) routes = JSON.parse(routeScript.textContent);
} catch (e) {
    console.warn('Failed to parse src-routes:', e);
}

let forgotStep = 'email';
let resendTimer = null;

if (document.getElementById('panel-login') || document.getElementById('panel-forgot')) {
    initUserAuth();
}

function initUserAuth() {
    const panels = {
        login: document.getElementById('panel-login'),
        register: document.getElementById('panel-register'),
        forgot: document.getElementById('panel-forgot'),
    };

    const tablist = document.querySelector('[data-auth-tabs]');
    const stepper = document.querySelector('[data-step-indicator]');

    const forms = {
        login: document.querySelector('[data-auth-form="login"]'),
        register: document.querySelector('[data-auth-form="register"]'),
        email: document.querySelector('[data-forgot-step="email"]'),
        otp: document.querySelector('[data-forgot-step="otp"]'),
        reset: document.querySelector('[data-forgot-step="reset"]'),
    };

    const otp = createOtpController(document.querySelector('[data-otp-group]'));

    /* ---- mode switching: login | register | forgot-password ---- */

    function selectTab(mode) {
        if (!tablist) return;
        for (const tab of tablist.querySelectorAll('[data-auth-tab]')) {
            const active = tab.dataset.authTab === mode;
            tab.setAttribute('aria-selected', String(active));
            tab.setAttribute('tabindex', active ? '0' : '-1');

            tab.classList.toggle('bg-white', active);
            tab.classList.toggle('text-src-blue', active);
            tab.classList.toggle('font-bold', active);
            tab.classList.toggle('shadow-xs', active);
            tab.classList.toggle('text-slate-500', !active);
            tab.classList.toggle('font-semibold', !active);
        }
    }

    function setMode(mode, { focus = true } = {}) {
        for (const [name, panel] of Object.entries(panels)) {
            if (panel) panel.hidden = name !== mode;
        }

        // When in forgot-password mode, hide the Login/Register tablist to give a focused experience
        if (tablist) {
            tablist.classList.toggle('hidden', mode === 'forgot');
        }

        if (mode === 'forgot') renderStepper();
        if (mode !== 'forgot') selectTab(mode);

        if (focus && panels[mode]) focusFirst(panels[mode]);
    }

    if (tablist) {
        for (const tab of tablist.querySelectorAll('[data-auth-tab]')) {
            tab.addEventListener('click', () => {
                resetForgotFlow();
                setMode(tab.dataset.authTab);
                setFormMessage(panels.login, null);
                setFormMessage(panels.register, null);
            });
        }

        bindTabKeys(tablist, (mode) => {
            resetForgotFlow();
            setMode(mode);
        });
    }

    /* ---- forgot-password step navigation ---- */

    const STEP_ORDER = ['email', 'otp', 'reset', 'success'];
    const VISIBLE_STEPS = 3;

    function renderStepper() {
        if (!stepper) return;
        const progress = forgotStep === 'success'
            ? VISIBLE_STEPS + 1
            : STEP_ORDER.indexOf(forgotStep) + 1;

        for (const item of stepper.querySelectorAll('[data-step-item]')) {
            const number = Number(item.dataset.stepItem);
            const dot = item.querySelector('[data-step-dot]');
            const label = item.querySelector('[data-step-label]');

            if (!dot || !label) continue;

            if (number < progress) {
                dot.className = 'flex size-8 shrink-0 items-center justify-center rounded-full border-2 border-src-blue bg-src-blue text-white shadow-xs transition duration-200';
                dot.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="size-4"><path d="m4.5 12.75 6 6 9-13.5"/></svg>';
            } else if (number === progress) {
                dot.className = 'flex size-8 shrink-0 items-center justify-center rounded-full border-2 border-src-blue bg-src-blue/10 text-xs font-extrabold text-src-blue transition duration-200';
                dot.textContent = String(number);
            } else {
                dot.className = 'flex size-8 shrink-0 items-center justify-center rounded-full border-2 border-slate-200 bg-white text-xs font-semibold text-slate-400 transition duration-200';
                dot.textContent = String(number);
            }

            label.className = `w-full truncate text-center text-[0.65rem] sm:text-xs font-semibold ${number <= progress ? 'text-src-blue' : 'text-slate-400'}`;
        }

        for (const line of stepper.querySelectorAll('[data-step-line]')) {
            const completed = Number(line.dataset.stepLine) < progress;
            line.classList.toggle('bg-src-blue', completed);
            line.classList.toggle('bg-slate-200', !completed);
        }
    }

    function setStep(step) {
        forgotStep = step;

        const forgotContainer = panels.forgot || document.getElementById('panel-forgot');
        if (forgotContainer) {
            forgotContainer.hidden = false;
            forgotContainer.removeAttribute('hidden');
            forgotContainer.style.display = '';

            for (const panel of forgotContainer.querySelectorAll('[data-forgot-step]')) {
                const isActive = panel.dataset.forgotStep === step;
                panel.hidden = !isActive;
                if (isActive) {
                    panel.removeAttribute('hidden');
                    panel.classList.remove('hidden');
                    panel.style.display = '';
                } else {
                    panel.setAttribute('hidden', '');
                    panel.classList.add('hidden');
                    panel.style.display = 'none';
                }
            }
        }

        renderStepper();

        // Focus ke input yang sesuai dengan langkah aktif
        if (step === 'email') {
            document.getElementById('forgot-email')?.focus();
        } else if (step === 'otp') {
            otp.focusFirst();
        } else if (step === 'reset') {
            document.getElementById('reset-password')?.focus();
        }
    }

    function resetForgotFlow() {
        window.clearTimeout(resendTimer);
        const forgotContainer = panels.forgot || document.getElementById('panel-forgot');
        if (forgotContainer) {
            clearErrors(forgotContainer);
        }
        otp.clear();
        otp.setError(null);
        setStep('email');
    }

    document.addEventListener('click', (event) => {
        const actionEl = event.target.closest('[data-action]');
        if (!actionEl) return;

        const action = actionEl.dataset.action;

        // Prevent default browser navigation for <a> tags with data-action
        event.preventDefault();

        if (action === 'forgot-password') {
            if (panels.forgot && panels.login) {
                setMode('forgot');
            } else {
                window.location.assign('/forgot-password');
            }
        }
        if (action === 'back-to-login') {
            if (panels.login) {
                resetForgotFlow();
                setMode('login');
            } else {
                window.location.assign('/login');
            }
        }
        if (action === 'change-email') {
            resetForgotFlow();
        }
        if (action === 'show-register') {
            resetForgotFlow();
            if (panels.register) {
                setMode('register');
                setFormMessage(panels.register, null);
            }
        }
        if (action === 'show-login') {
            resetForgotFlow();
            if (panels.login) {
                setMode('login');
                setFormMessage(panels.login, null);
            }
        }
        if (action === 'google-login' || action === 'google-register') {
            // TODO: Integrate Google OAuth
            window.location.href = '/auth/google';
        }
    });

    /* ---- submit handlers (mocked API) ---- */

    if (forms.login) {
        forms.login.addEventListener('submit', async (event) => {
            event.preventDefault();
            setFormMessage(forms.login, null);

            if (!validateForm(forms.login)) return;

            const submitBtn = forms.login.querySelector('[data-submit-login]');
            setButtonLoading(submitBtn, true, 'Memproses masuk...');
            await mockRequest(900);

            // Redirect to participant dashboard
            const destination = routes.userDashboard || '/dashboard';
            window.location.assign(destination);
        });
    }

    if (forms.register) {
        forms.register.addEventListener('submit', async (event) => {
            event.preventDefault();
            setFormMessage(forms.register, null);

            if (!validateForm(forms.register)) return;

            const name = forms.register.querySelector('[name="name"]')?.value.trim() || '';
            const email = forms.register.querySelector('[name="email"]')?.value.trim() || '';
            const button = forms.register.querySelector('[data-submit-register]');

            setButtonLoading(button, true, 'Mendaftarkan tim...');
            await mockRequest(1000);
            setButtonLoading(button, false);

            // Carried over to login form
            clearErrors(forms.register);
            forms.register.reset();
            const loginEmailInput = forms.login?.querySelector('[name="email"]');
            if (loginEmailInput) loginEmailInput.value = email;

            setMode('login');
            setFormMessage(
                panels.login,
                `Akun tim berhasil dibuat${name ? ` untuk ${name}` : ''}! Silakan masuk dengan kata sandi Anda.`,
                'success'
            );
            forms.login?.querySelector('[name="password"]')?.focus();
        });
    }

    if (forms.email) {
        forms.email.addEventListener('submit', async (event) => {
            event.preventDefault();
            event.stopPropagation();

            const emailInput = forms.email.querySelector('[name="email"]');
            const emailVal = emailInput?.value?.trim() || '';

            // Validasi email secara algoritmik
            if (!emailVal) {
                setFieldError(emailInput, MESSAGES.required);
                emailInput?.focus();
                return;
            }
            if (!EMAIL_PATTERN.test(emailVal)) {
                setFieldError(emailInput, MESSAGES.email);
                emailInput?.focus();
                return;
            }
            setFieldError(emailInput, null);

            const button = forms.email.querySelector('[data-submit-forgot-email]');
            setButtonLoading(button, true, 'Mengirim kode OTP...');
            await mockRequest(500);
            setButtonLoading(button, false);

            const otpEmailDisplay = document.querySelector('[data-otp-email]');
            if (otpEmailDisplay) otpEmailDisplay.textContent = emailVal;

            otp.clear();
            otp.setError(null);
            setStep('otp');
        });
    }

    if (forms.otp) {
        forms.otp.addEventListener('submit', async (event) => {
            event.preventDefault();
            event.stopPropagation();

            const otpVal = otp.value();
            if (otpVal.length < OTP_LENGTH || !VALIDATORS.otp(otpVal, OTP_LENGTH)) {
                otp.setError(MESSAGES.otp(OTP_LENGTH));
                otp.focusFirst();
                return;
            }
            otp.setError(null);

            const button = forms.otp.querySelector('[data-submit-forgot-otp]');
            setButtonLoading(button, true, 'Memverifikasi...');
            await mockRequest(500);
            setButtonLoading(button, false);

            otp.clear();
            otp.setError(null);
            clearErrors(forms.reset);
            setStep('reset');
        });
    }

    if (forms.reset) {
        forms.reset.addEventListener('submit', async (event) => {
            event.preventDefault();
            event.stopPropagation();

            if (!validateForm(forms.reset)) return;

            const button = forms.reset.querySelector('[data-submit-forgot-reset]');
            setButtonLoading(button, true, 'Menyimpan kata sandi...');
            await mockRequest(600);
            setButtonLoading(button, false);

            forms.reset.reset();
            setStep('success');
        });
    }

    /* ---- resend OTP cooldown handler ---- */

    const resendButton = document.querySelector('[data-action="resend-otp"]');
    const resendLabel = document.querySelector('[data-resend-label]');

    if (resendButton && resendLabel) {
        resendButton.addEventListener('click', async () => {
            if (resendButton.disabled) return;

            resendButton.disabled = true;
            resendLabel.textContent = 'Mengirim...';
            await mockRequest(600);

            let seconds = RESEND_COOLDOWN;
            resendLabel.textContent = `Kirim ulang (${seconds}s)`;

            resendTimer = window.setInterval(() => {
                seconds -= 1;

                if (seconds <= 0) {
                    window.clearInterval(resendTimer);
                    resendButton.disabled = false;
                    resendLabel.textContent = 'Kirim Ulang OTP';
                    return;
                }

                resendLabel.textContent = `Kirim ulang (${seconds}s)`;
            }, 1000);
        });
    }

    for (const form of Object.values(forms)) {
        if (form) bindValidation(form);
    }
    bindPasswordToggles(document);

    // Initial state: dedicated forgot-password page or default login tab
    if (!panels.login && panels.forgot) {
        panels.forgot.hidden = false;
        setStep('email');
    } else {
        setMode('login', { focus: false });
    }
}

/* =====================================================================
 * 3. ADMIN AUTH
 * ================================================================== */

const adminForm = document.querySelector('[data-auth-form="admin-login"]');

if (adminForm) {
    adminForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        setFormMessage(adminForm, null);

        if (!validateForm(adminForm)) return;

        const button = adminForm.querySelector('[data-submit-admin]');
        setButtonLoading(button, true, 'Memverifikasi admin...');
        await mockRequest(900);

        const destination = routes.adminDashboard || '/admin/dashboard';
        window.location.assign(destination);
    });

    bindValidation(adminForm);
    bindPasswordToggles(adminForm);
}

