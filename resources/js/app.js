import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    // ─── Scroll Reveal Animations ───
    const revealObserver = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                obs.unobserve(entry.target);
            }
        });
    }, {
        root: null,
        rootMargin: '0px 0px -60px 0px',
        threshold: 0.1
    });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

    // ─── Navbar Scroll-Spy with Sliding Indicator ───
    const nav = document.getElementById('main-nav');
    const indicator = document.getElementById('nav-indicator');
    const navLinks = document.querySelectorAll('.nav-link');

    if (!nav || !indicator || navLinks.length === 0) return;

    // Section IDs mapped to nav links (hero = top of page)
    const sectionIds = ['faq', 'location', 'partners', 'pillars', 'consultation', 'categories', 'about', 'hero'];

    function moveIndicator(link) {
        if (!link) return;
        const navRect = nav.getBoundingClientRect();
        const linkRect = link.getBoundingClientRect();

        indicator.style.width = `${linkRect.width}px`;
        indicator.style.left = `${linkRect.left - navRect.left}px`;
        indicator.style.opacity = '1';
    }

    function setActiveLink(sectionId) {
        navLinks.forEach(link => {
            const isActive = link.dataset.section === sectionId;
            link.classList.toggle('text-brand-500', isActive);
            link.classList.toggle('text-slate-600', !isActive);

            if (isActive) {
                moveIndicator(link);
            }
        });
    }

    // Determine which section is currently visible
    function getActiveSection() {
        const scrollY = window.scrollY + 120; // offset for sticky header

        for (const id of sectionIds) {
            if (id === 'hero') {
                return 'hero';
            }
            const section = document.getElementById(id);
            if (section) {
                const rect = section.getBoundingClientRect();
                const top = rect.top + window.scrollY;
                if (scrollY >= top) {
                    return id;
                }
            }
        }
        return 'hero';
    }

    // Throttled scroll handler
    let ticking = false;
    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                setActiveLink(getActiveSection());
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', () => setActiveLink(getActiveSection()), { passive: true });

    // Click handler — smooth scroll and immediately update indicator
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const sectionId = link.dataset.section;

            if (sectionId === 'hero') {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Immediately highlight clicked link
            setActiveLink(sectionId);
        });
    });

    // Initialize on load
    setActiveLink(getActiveSection());

    // ─── Consultation Pop-up Modal Handling ───
    const modal = document.getElementById('consultation-modal');
    const backdrop = document.getElementById('consultation-backdrop');
    const panel = document.getElementById('consultation-panel');
    const openBtns = document.querySelectorAll('#open-consultation-modal, .open-consultation-trigger, [data-open-consultation]');
    const closeBtn = document.getElementById('close-consultation-modal');
    const cancelBtn = document.getElementById('cancel-consultation-modal');

    function openModal() {
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';

        requestAnimationFrame(() => {
            if (backdrop) {
                backdrop.classList.remove('opacity-0');
                backdrop.classList.add('opacity-100');
            }
            if (panel) {
                panel.classList.remove('scale-95', 'opacity-0');
                panel.classList.add('scale-100', 'opacity-100');
            }
        });
    }

    function closeModal() {
        if (!modal) return;
        if (backdrop) {
            backdrop.classList.remove('opacity-100');
            backdrop.classList.add('opacity-0');
        }
        if (panel) {
            panel.classList.remove('scale-100', 'opacity-100');
            panel.classList.add('scale-95', 'opacity-0');
        }

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        }, 250);
    }

    openBtns.forEach(btn => btn.addEventListener('click', openModal));
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

    // ─── FAQ Accordion Interactivity ───
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const toggle = item.querySelector('.faq-toggle');
        const content = item.querySelector('.faq-content');
        const icon = item.querySelector('.faq-icon');

        if (toggle && content) {
            toggle.addEventListener('click', () => {
                const isOpen = !content.classList.contains('hidden');

                // Optional: close other open items for cleaner look
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherContent = otherItem.querySelector('.faq-content');
                        const otherIcon = otherItem.querySelector('.faq-icon');
                        if (otherContent) otherContent.classList.add('hidden');
                        if (otherIcon) otherIcon.classList.remove('rotate-180', 'bg-brand-500', 'text-white');
                    }
                });

                if (isOpen) {
                    content.classList.add('hidden');
                    if (icon) {
                        icon.classList.remove('rotate-180', 'bg-brand-500', 'text-white');
                        icon.classList.add('bg-brand-50', 'text-brand-600');
                    }
                } else {
                    content.classList.remove('hidden');
                    if (icon) {
                        icon.classList.add('rotate-180', 'bg-brand-500', 'text-white');
                        icon.classList.remove('bg-brand-50', 'text-brand-600');
                    }
                }
            });
        }
    });
    // ─── Competition Category Filtering (Semua, Tim, Individu) ───
    const filterButtons = document.querySelectorAll('.competition-filter-btn');
    const competitionCards = document.querySelectorAll('.competition-card');

    if (filterButtons.length > 0 && competitionCards.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.dataset.filter;

                // Update active styles on buttons
                filterButtons.forEach(b => {
                    b.classList.remove('bg-brand-500', 'text-white', 'shadow-brand-500/25', 'active');
                    b.classList.add('bg-brand-50', 'text-brand-700', 'hover:bg-brand-100', 'border', 'border-brand-200');
                });

                btn.classList.remove('bg-brand-50', 'text-brand-700', 'hover:bg-brand-100', 'border', 'border-brand-200');
                btn.classList.add('bg-brand-500', 'text-white', 'shadow-brand-500/25', 'active');

                // Filter cards cleanly without lingering GPU transform blur
                competitionCards.forEach(card => {
                    const cardType = card.dataset.type;
                    const matches = (filter === 'all' || cardType === filter);

                    if (matches) {
                        card.classList.remove('hidden');
                        card.style.display = '';
                        card.style.opacity = '1';
                        card.style.transform = '';
                    } else {
                        card.classList.add('hidden');
                        card.style.display = 'none';
                    }
                });
            });
        });
    }
});
