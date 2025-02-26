(() => {
    window.addEventListener('load', () => {
        const iframe = document.querySelector('.block-editor-iframe__scale-container [name=editor-canvas]');

        if (!iframe) return;

        iframe.contentWindow.document.head.insertAdjacentHTML(
            'beforeend',
            `
				<style>
                    body {
                        font-family: var(--wp-administration-style-font_family_fa) !important;
                    }
                    :root {
                        --wp-administration-style-font_family_fa: wp-administration-style-vazirmatn;
                        --wp-administration-style-font_family_code: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace, var(--wp-administration-style-font_family_fa);

                        --wp--preset--font-family--manrope: var(--wp-administration-style-font_family_fa) !important;
                        --wp--preset--font-family--fira-code: var(--wp-administration-style-font_family_code) !important;
                        --wp--preset--font-family--inter: var(--wp-administration-style-font_family_fa) !important;
                        --wp--preset--font-family--cardo: var(--wp-administration-style-font_family_fa) !important;
                    }

                    .block-editor-block-list__empty-block-inserter.block-editor-block-list__empty-block-inserter,
                    .block-editor-default-block-appender .block-editor-inserter {
                        right: unset !important;
                        left: 0;
                    }
				</style>
			`,
        );
    });
})();
