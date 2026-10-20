(() => {
    const toast = document.querySelector('[data-admin-toast]');
    let toastTimer;

    const showToast = (message) => {
        if (!toast) {
            return;
        }

        toast.textContent = message;
        toast.classList.add('is-visible');
        window.clearTimeout(toastTimer);
        toastTimer = window.setTimeout(() => toast.classList.remove('is-visible'), 3400);
    };

    document.querySelectorAll('[data-demo-action]').forEach((button) => {
        button.addEventListener('click', () => showToast(button.dataset.demoAction));
    });

    document.querySelectorAll('[data-pending-area]').forEach((button) => {
        button.addEventListener('click', () => {
            showToast(`${button.dataset.pendingArea} ainda não está incluída neste protótipo.`);
        });
    });

    const sidebar = document.querySelector('[data-admin-sidebar]');
    const sidebarToggle = document.querySelector('[data-sidebar-toggle]');
    const closeSidebar = () => {
        sidebar?.classList.remove('is-open');
        sidebarToggle?.setAttribute('aria-expanded', 'false');
    };

    sidebarToggle?.addEventListener('click', () => {
        const isOpen = !sidebar?.classList.contains('is-open');
        sidebar?.classList.toggle('is-open', isOpen);
        sidebarToggle.setAttribute('aria-expanded', String(isOpen));
    });

    document.querySelector('[data-sidebar-close]')?.addEventListener('click', closeSidebar);
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeSidebar();
            closeWizard();
            closeRowMenus();
        }
    });

    document.querySelector('[data-dismiss-demo]')?.addEventListener('click', () => {
        document.querySelector('.demo-banner')?.remove();
    });

    const searchInput = document.querySelector('[data-page-search]');
    const statusFilter = document.querySelector('[data-status-filter]');
    const emptyState = document.querySelector('[data-empty-state]');
    const visibleCount = document.querySelector('[data-visible-count]');

    const filterRows = () => {
        const query = searchInput?.value.trim().toLocaleLowerCase('pt-BR') ?? '';
        const status = statusFilter?.value ?? 'todos';
        const rows = [...document.querySelectorAll('[data-page-row]')];
        let visible = 0;

        rows.forEach((row) => {
            const text = `${row.dataset.pageName} ${row.dataset.pageCourse}`.toLocaleLowerCase('pt-BR');
            const matches = text.includes(query) && (status === 'todos' || row.dataset.pageStatus === status);
            row.hidden = !matches;
            visible += matches ? 1 : 0;
        });

        if (visibleCount) {
            visibleCount.textContent = String(visible);
        }

        if (emptyState) {
            emptyState.hidden = visible !== 0;
        }
    };

    searchInput?.addEventListener('input', filterRows);
    statusFilter?.addEventListener('change', filterRows);

    document.addEventListener('keydown', (event) => {
        if ((event.metaKey || event.ctrlKey) && event.key.toLowerCase() === 'k') {
            event.preventDefault();
            searchInput?.focus();
        }
    });

    const closeRowMenus = () => {
        document.querySelectorAll('.row-menu').forEach((menu) => {
            menu.hidden = true;
        });
    };

    document.querySelectorAll('[data-row-menu-toggle]').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.stopPropagation();
            const menu = button.parentElement?.querySelector('.row-menu');
            const shouldOpen = Boolean(menu?.hidden);
            closeRowMenus();

            if (menu && shouldOpen) {
                menu.hidden = false;
            }
        });
    });

    document.addEventListener('click', (event) => {
        if (!event.target.closest('.row-actions')) {
            closeRowMenus();
        }
    });

    const backdrop = document.querySelector('[data-wizard-backdrop]');
    const wizardForm = document.querySelector('[data-wizard-form]');
    const wizardSteps = [...document.querySelectorAll('[data-wizard-step]')];
    const wizardProgress = [...document.querySelectorAll('[data-wizard-progress]')];
    const nextButton = document.querySelector('[data-wizard-next]');
    const backButton = document.querySelector('[data-wizard-back]');
    const doneButton = document.querySelector('[data-wizard-done]');
    let wizardStep = 1;
    let previouslyFocused;

    function closeWizard() {
        if (!backdrop || backdrop.hidden) {
            return;
        }

        backdrop.hidden = true;
        document.body.classList.remove('admin-modal-open');
        previouslyFocused?.focus();
    }

    const openWizard = () => {
        if (!backdrop) {
            return;
        }

        previouslyFocused = document.activeElement;
        backdrop.hidden = false;
        document.body.classList.add('admin-modal-open');
        setWizardStep(1);
        backdrop.querySelector('input[name="page-name"]')?.focus();
    };

    const setWizardStep = (step) => {
        wizardStep = Math.min(4, Math.max(1, step));

        wizardSteps.forEach((wizardSection) => {
            const isCurrent = Number(wizardSection.dataset.wizardStep) === wizardStep;
            wizardSection.hidden = !isCurrent;
            wizardSection.classList.toggle('is-active', isCurrent);
        });

        wizardProgress.forEach((progress) => {
            const index = Number(progress.dataset.wizardProgress);
            progress.classList.toggle('is-current', index === wizardStep);
            progress.classList.toggle('is-complete', index < wizardStep);
        });

        if (backButton) {
            backButton.hidden = wizardStep === 1;
        }

        if (nextButton) {
            nextButton.hidden = wizardStep === 4;
        }

        if (doneButton) {
            doneButton.hidden = wizardStep !== 4;
        }

        if (wizardStep === 4) {
            updateWizardReview();
        }
    };

    document.querySelector('[data-open-wizard]')?.addEventListener('click', openWizard);
    document.querySelectorAll('[data-close-wizard]').forEach((button) => {
        button.addEventListener('click', closeWizard);
    });

    backdrop?.addEventListener('mousedown', (event) => {
        if (event.target === backdrop) {
            closeWizard();
        }
    });

    nextButton?.addEventListener('click', () => {
        if (wizardStep === 1) {
            const name = wizardForm?.elements.namedItem('page-name');
            if (name instanceof HTMLInputElement && !name.value.trim()) {
                name.setCustomValidity('Informe um nome para a página.');
                name.reportValidity();
                name.addEventListener('input', () => name.setCustomValidity(''), { once: true });
                return;
            }
        }

        setWizardStep(wizardStep + 1);
    });

    backButton?.addEventListener('click', () => setWizardStep(wizardStep - 1));

    document.querySelectorAll('[data-template-choice]').forEach((choice) => {
        choice.addEventListener('click', () => {
            document.querySelectorAll('[data-template-choice]').forEach((item) => item.classList.remove('is-selected'));
            choice.classList.add('is-selected');
            const input = choice.querySelector('input[type="radio"]');
            if (input instanceof HTMLInputElement) {
                input.checked = true;
            }
        });
    });

    const slugify = (value) => value
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .toLocaleLowerCase('pt-BR')
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-|-$/g, '');

    wizardForm?.elements.namedItem('page-name')?.addEventListener('input', (event) => {
        const slugField = wizardForm.elements.namedItem('page-slug');
        const courseField = wizardForm.elements.namedItem('course-name');

        if (slugField instanceof HTMLInputElement && !slugField.dataset.edited) {
            slugField.value = slugify(event.target.value);
        }

        if (courseField instanceof HTMLInputElement && !courseField.value) {
            courseField.value = event.target.value;
        }
    });

    wizardForm?.elements.namedItem('page-slug')?.addEventListener('input', (event) => {
        event.target.dataset.edited = 'true';
    });

    const updateWizardReview = () => {
        if (!wizardForm) {
            return;
        }

        const getValue = (name, fallback = '—') => {
            const field = wizardForm.elements.namedItem(name);
            return field instanceof HTMLInputElement || field instanceof HTMLTextAreaElement
                ? field.value.trim() || fallback
                : fallback;
        };

        const template = wizardForm.querySelector('input[name="template"]:checked');
        const templateLabel = template?.value === 'classico' ? 'Clássico com banner' : 'Moderno com VSL';
        const reviewName = document.querySelector('[data-review-name]');
        const reviewCourse = document.querySelector('[data-review-course]');
        const reviewSlug = document.querySelector('[data-review-slug]');
        const reviewTemplate = document.querySelector('[data-review-template]');

        if (reviewName) reviewName.textContent = getValue('page-name');
        if (reviewCourse) reviewCourse.textContent = getValue('course-name');
        if (reviewSlug) reviewSlug.textContent = `/p/${getValue('page-slug', 'nome-da-pagina')}`;
        if (reviewTemplate) reviewTemplate.textContent = templateLabel;
    };

    wizardForm?.querySelectorAll('[data-live-field]').forEach((field) => {
        field.addEventListener('input', () => {
            const target = document.querySelector(`[data-preview-${field.dataset.liveField}]`);
            if (!target) {
                return;
            }

            if (field.dataset.liveField === 'color') {
                document.querySelector('[data-wizard-preview]')?.style.setProperty('background', field.value);
                const colorLabel = field.parentElement?.querySelector('span');
                if (colorLabel) {
                    colorLabel.textContent = field.value.toUpperCase();
                }
                return;
            }

            target.textContent = field.value || target.dataset.defaultText || '';
        });
    });

    doneButton?.addEventListener('click', () => {
        showToast('Demonstração concluída. Nenhuma página foi criada, salva ou publicada.');
        closeWizard();
    });

    const previewFrame = document.querySelector('[data-preview-frame]');
    const previewWidth = document.querySelector('[data-preview-width]');
    const deviceWidths = { desktop: '100%', tablet: '760 px', mobile: '390 px' };

    document.querySelectorAll('[data-preview-device]').forEach((button) => {
        button.addEventListener('click', () => {
            document.querySelectorAll('[data-preview-device]').forEach((deviceButton) => {
                const isActive = deviceButton === button;
                deviceButton.classList.toggle('is-active', isActive);
                deviceButton.setAttribute('aria-pressed', String(isActive));
            });

            const device = button.dataset.previewDevice;
            previewFrame?.classList.remove('is-tablet', 'is-mobile');
            if (device === 'tablet') previewFrame?.classList.add('is-tablet');
            if (device === 'mobile') previewFrame?.classList.add('is-mobile');
            if (previewWidth && device) {
                previewWidth.textContent = deviceWidths[device] ?? '100%';
            }
        });
    });

    const editorFields = [...document.querySelectorAll('[data-editor-field]')];
    const previewText = (key) => document.querySelector(`[data-preview-text="${key}"]`);

    editorFields.forEach((field) => {
        field.addEventListener('input', () => {
            const key = field.dataset.editorField;

            if (key === 'color') {
                document.querySelector('[data-sales-preview]')?.style.setProperty('--sales-accent', field.value);
                const colorLabel = field.parentElement?.querySelector('span');
                if (colorLabel) colorLabel.textContent = field.value.toUpperCase();
                return;
            }

            const target = previewText(key);
            if (target) target.textContent = field.value;

            if (key === 'name') {
                const editorTitle = document.querySelector('.editor-toolbar__title > strong');
                if (editorTitle) editorTitle.textContent = field.value;
            }
        });
    });

    const templateSelect = document.querySelector('[data-editor-template]');
    const vslSettings = document.querySelector('[data-vsl-settings]');
    const vslPreview = document.querySelector('[data-preview-vsl]');

    templateSelect?.addEventListener('change', () => {
        const isModernTemplate = templateSelect.value === 'moderno';
        if (vslSettings) vslSettings.hidden = !isModernTemplate;
        if (vslPreview) vslPreview.hidden = !isModernTemplate;
        showToast('A estrutura da prévia demonstra o template selecionado; a alteração não é salva.');
    });

    if (templateSelect && vslSettings) {
        vslSettings.hidden = templateSelect.value !== 'moderno';
        if (vslPreview) vslPreview.hidden = templateSelect.value !== 'moderno';
    }

    document.querySelectorAll('[data-section-list] .section-order-item input[type="checkbox"]').forEach((checkbox) => {
        const sectionName = checkbox.closest('label')?.textContent.trim();
        const previewSection = [...document.querySelectorAll('[data-preview-section]')]
            .find((section) => section.dataset.previewSection === sectionName);

        if (!previewSection) return;

        previewSection.hidden = !checkbox.checked;
        checkbox.addEventListener('change', () => {
            previewSection.hidden = !checkbox.checked;
            showToast('Visibilidade da seção alterada somente nesta prévia demonstrativa.');
        });
    });

    document.querySelectorAll('[data-section-up], [data-section-down]').forEach((button) => {
        button.addEventListener('click', () => {
            const item = button.closest('.section-order-item');
            const list = item?.parentElement;
            if (!item || !list) return;

            if (button.hasAttribute('data-section-up') && item.previousElementSibling?.classList.contains('section-order-item')) {
                list.insertBefore(item, item.previousElementSibling);
                showToast('Ordem de demonstração atualizada. Nenhuma alteração foi salva.');
            } else if (button.hasAttribute('data-section-down') && item.nextElementSibling?.classList.contains('section-order-item')) {
                list.insertBefore(item.nextElementSibling, item);
                showToast('Ordem de demonstração atualizada. Nenhuma alteração foi salva.');
            }
        });
    });
})();
