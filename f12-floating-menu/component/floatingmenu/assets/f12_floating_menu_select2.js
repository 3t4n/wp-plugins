jQuery(function ($) {
    /**
     * This snippet integrates select2 vendor script into the floating menu.
     */
    $(document).ready(function () {
        /**
         * Initialize SELECT2
         */
        $('.f12-floating-menu-select2').select2({
            /**
             * define the ajax call
             * @see https://select2.org/data-sources/ajax
             */
            ajax: {
                url: select2_obj.ajax_url,
                dataType: 'json', // has to be set to understand the response via ajax.
                data: function (params) {
                    var query = {
                        action: 'f12_floating_menu_select2_pages',
                        nonce: select2_obj.nonce,
                        search: params.term
                    }
                    return query;
                }
            },
            // Disable close on select, @see https://select2.org/dropdown
            closeOnSelect: false,
        });

        /**
         * Update textarea in customizer when the select2 has changed.
         * @see https://select2.org/programmatic-control/events
         */
        $('.f12-floating-menu-select2-customizer').on('change', function (e) {
            var content = [];
            $(e.currentTarget).find('option:selected').each(function () {
                content.push($(this).val());
            });
            $(e.currentTarget).closest('.customize-control-menu').find('textarea.textarea-pages').val(content.join(','));
            $(e.currentTarget).closest('.customize-control-menu').find('textarea.textarea-pages').change();
        });
    });
});