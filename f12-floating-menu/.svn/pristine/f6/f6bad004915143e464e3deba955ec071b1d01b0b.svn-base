jQuery(function ($) {
    window.f12_floating_menu_items_upload = window.f12_floating_menu_items_upload || {};

    /**
     * This snippet will handle the adding of new menu items while clicking on the button.
     * Use the global variable f12_floating_menu_items_add which will store a attribute named template to clone the container.
     */
    $(document).ready(function () {
        /**
         * Save the current ajax call
         */
        var floating_menu_items_add_xhr = null;

        $('.f12-floating-menu-items-add').click(function (e) {
            e.preventDefault();

            if(null != floating_menu_items_add_xhr){
                floating_menu_items_add_xhr.abort();
            }

            /**
             * Add loading state to the button
             */
            $(this).addClass('loading');

            /**
             * Get all items to catch the required ids
             */
            var ids = [];

            $(this).parent().find('.box').each(function () {
                ids.push(parseInt($(this).attr('data-id')));
            });

            /**
             * Sort the array, this is required to ensure the catching of the nextID will work.
             */
            ids.sort(function (a, b) {
                return a - b;
            });

            console.log(ids);
            /**
             * get the next free integer, @see https://stackoverflow.com/questions/35603490/get-first-minimum-free-integer-key-id-in-array-of-integer
             * this will be used as the data-id.
             */
            var nextID = 1;
            nextID = ids[ids.length-1]+1;

            console.log(nextID);
            var c = $(this);

            floating_menu_items_add_xhr = $.ajax({
                url: f12_floating_menu_items_add.ajax_url,
                type: 'post',
                data: {
                    action: 'f12_floating_menu_get_template',
                    template: 'f12_floating_menu_items_add',
                    id: nextID,
                    nonce: f12_floating_menu_items_add.nonce
                },
                success(data) {
                    /**
                     * Add the element to the backend
                     */
                    data = JSON.parse(data);

                    if (data.status == 200) {
                        c.parent().find('.forge12-plugin-content-main').append(data.content);
                    } else {
                        alert('Something went wrong.');
                        throw 'Something went wrong. Please contact the author of the plugin.';
                    }

                    /**
                     * Reinit the upload to ensure new boxes working.
                     */
                    window.f12_floating_menu_items_upload.initUpload();

                    /**
                     * Remove loading state from the button
                     */
                    c.removeClass('loading');
                }
            });

            /**
             * Add the new ID to the element
             */
            //el.find('> div').last().attr('data-id', nextID);
        });
    });

});