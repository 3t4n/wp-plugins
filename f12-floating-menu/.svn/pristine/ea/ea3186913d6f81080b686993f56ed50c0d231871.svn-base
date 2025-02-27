(function ($) {
    $(function () {
        /**
         * Search for an active icon and move it to the start of the list.
         */
        $(document).find('.icon-box li.active').each(function(){
            $(this).clone().prependTo($(this).parent());
            $(this).remove();
        });
        /**
         * This function handles the search of the icon box container. Just hide not matching values
         * adding css classes or remove them.
         */
        $(document).on('keyup', '.icon-box-search input', function () {
            var keyword = $(this).val();
            $(this).closest('.icon-box').find('.icon-box-content li').each(function () {
                if (keyword.length > 0) {
                    if ($(this).attr('data-name').search(keyword) != -1) {
                        $(this).removeClass('hidden');
                    } else {
                        $(this).addClass('hidden');
                    }
                } else {
                    $(this).removeClass('hidden');
                }
            });
        });

        /**
         * This function handles the click on the icons. Select the icon that should be used
         */
        $(document).on('click', '.icon-box-content li', function () {
            let data_storage = null;
            let data_name = null;

            if ($(this).closest('.icon-box').attr('data-storage')) {
                data_storage = $(this).closest('.icon-box').attr('data-storage');
            }

            if ($(this).attr('data-name')) {
                data_name = $(this).attr('data-name');
            }

            /**
             * Only if data-storage and data-name are defined continue to select the given element
             */
            if (data_storage != null && data_name != null) {
                /**
                 * Check if the data-storage element exists
                 */
                if ($(document).find('.' + data_storage).length > 0) {
                    /**
                     * Check if the current element has been clicked again to unselect it.
                     */
                    if ($(this).hasClass('active')) {
                        /**
                         * Unselect the element
                         */
                        $(document).find('.' + data_storage).val('').blur();
                        $(this).removeClass('active');
                    } else {
                        /**
                         * Update the element
                         */
                        $(document).find('.' + data_storage).val(data_name).blur();
                        $(this).closest('ul').find('li').removeClass('active');
                        $(this).addClass('active');
                    }
                }
            }
        });
    });
})(jQuery);