(() => {
    const header = document.querySelector('[data-site-header]');
    const menuToggle = document.querySelector('[data-menu-toggle]');
    const navigation = document.querySelector('[data-primary-navigation]');
    const coursesItem = document.querySelector('[data-navigation-courses]');
    const coursesToggle = document.querySelector('[data-courses-toggle]');
    const coursesMenu = document.querySelector('[data-courses-menu]');
    const backToTop = document.querySelector('[data-back-to-top]');
    let coursesOpenedByHover = false;

    const setCoursesMenu = (isOpen) => {
        if (!coursesToggle || !coursesMenu) {
            return;
        }

        coursesToggle.setAttribute('aria-expanded', String(isOpen));
        coursesMenu.hidden = !isOpen;
    };

    const closeNavigation = () => {
        if (!menuToggle || !navigation) {
            return;
        }

        coursesOpenedByHover = false;
        menuToggle.setAttribute('aria-expanded', 'false');
        navigation.classList.remove('is-open');
        document.body.classList.remove('menu-open');
        setCoursesMenu(false);
    };

    menuToggle?.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') !== 'true';
        menuToggle.setAttribute('aria-expanded', String(isOpen));
        navigation?.classList.toggle('is-open', isOpen);
        document.body.classList.toggle('menu-open', isOpen);

        if (!isOpen) {
            setCoursesMenu(false);
        }
    });

    coursesToggle?.addEventListener('click', () => {
        const isOpen = coursesToggle.getAttribute('aria-expanded') === 'true';

        if (isOpen && coursesOpenedByHover) {
            coursesOpenedByHover = false;
            return;
        }

        coursesOpenedByHover = false;
        setCoursesMenu(!isOpen);
    });

    coursesItem?.addEventListener('mouseenter', () => {
        if (window.matchMedia('(min-width: 981px)').matches) {
            coursesOpenedByHover = true;
            setCoursesMenu(true);
        }
    });

    coursesItem?.addEventListener('mouseleave', () => {
        if (window.matchMedia('(min-width: 981px)').matches) {
            coursesOpenedByHover = false;
            setCoursesMenu(false);
        }
    });

    document.addEventListener('click', (event) => {
        if (coursesItem && !coursesItem.contains(event.target)) {
            coursesOpenedByHover = false;
            setCoursesMenu(false);
        }

        if (
            navigation?.classList.contains('is-open')
            && !navigation.contains(event.target)
            && !menuToggle?.contains(event.target)
        ) {
            closeNavigation();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeNavigation();
        }
    });

    navigation?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.matchMedia('(max-width: 980px)').matches) {
                closeNavigation();
            }
        });
    });

    const updateScrollControls = () => {
        const isScrolled = window.scrollY > 24;
        header?.classList.toggle('is-scrolled', isScrolled);
        backToTop?.classList.toggle('is-visible', window.scrollY > 520);
    };

    window.addEventListener('scroll', updateScrollControls, { passive: true });
    updateScrollControls();

    backToTop?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    const comparison = document.querySelector('[data-comparison]');
    const comparisonBefore = document.querySelector('[data-comparison-before]');
    const comparisonRange = document.querySelector('[data-comparison-range]');

    if (comparison && comparisonBefore && comparisonRange) {
        const updateComparison = () => {
            const value = Number(comparisonRange.value);
            comparisonRange.setAttribute('aria-valuetext', `Comparação em ${value} por cento`);
            comparison.style.setProperty('--comparison-position', `${value}%`);
        };

        comparisonRange.addEventListener('input', updateComparison);
        updateComparison();
    }

    const testimonials = [...document.querySelectorAll('[data-testimonial]')];
    const testimonialCurrent = document.querySelector('[data-testimonial-current]');
    let activeTestimonial = 0;

    const showTestimonial = (index) => {
        if (testimonials.length === 0) {
            return;
        }

        activeTestimonial = (index + testimonials.length) % testimonials.length;
        testimonials.forEach((testimonial, testimonialIndex) => {
            const isActive = testimonialIndex === activeTestimonial;
            testimonial.hidden = !isActive;
            testimonial.classList.toggle('is-active', isActive);
        });

        if (testimonialCurrent) {
            testimonialCurrent.textContent = String(activeTestimonial + 1).padStart(2, '0');
        }
    };

    document.querySelector('[data-testimonial-prev]')?.addEventListener('click', () => {
        showTestimonial(activeTestimonial - 1);
    });

    document.querySelector('[data-testimonial-next]')?.addEventListener('click', () => {
        showTestimonial(activeTestimonial + 1);
    });
})();
