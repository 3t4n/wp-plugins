(() => {
    window.addEventListener('load', () => {
        const is_elementor_pro_available = !!document.querySelector('.elementor-panel-heading-promotion');

        if (is_elementor_pro_available) {
            return;
        }

        // Removes the AI button on the left side of a field label.
        (() => {
            document.head.insertAdjacentHTML(
                'beforeend',
                `
                <style>
                   .elementor-control-field .e-ai-button {
                        display: none !important;
                    }
        	    </style>
            `,
            );
        })();

        // Removed big circle add AI stuff button.
        (() => {
            const elementor_preview_iframe = document.querySelector('#elementor-preview-iframe');

            if (!elementor_preview_iframe) return;

            elementor_preview_iframe.contentDocument.head.insertAdjacentHTML(
                'beforeend',
                `
                <style>
                    .elementor-add-new-section .elementor-add-section-area-button[title="ساختن با هوش مصنوعی"] {
                        display: none !important;
                    }
        	    </style>
            `,
            );
        })();
    });
})();
