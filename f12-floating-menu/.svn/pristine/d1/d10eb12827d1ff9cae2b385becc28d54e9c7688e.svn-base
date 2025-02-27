(function ($) {
    /**
     * Generate and set the JSON which will be saved to the database.
     * @param container
     */
    function update_post_types_textarea(container) {
        let data = [];
        let i = 0;

        container.find('.section input[type="checkbox"]').each(function () {
            if($(this).is(':checked')){
                data.push($(this).val());
            }
        });

        $(container).find('textarea').val(JSON.stringify(data)).change();
    }

    /**
     * Handle the on click on the checkbox items
     */
    $(document).on('change', '.section.post_types input[type="checkbox"]', function(){
        update_post_types_textarea($(this).closest('.customize-control-menu'));
    });

    /**
     * Add the toggle trigger for the menu items in the customizer floating menu section.
     */
    $(document).on('click', '.section.post_types .menu-item-bar', function () {
        if ($(this).parent().hasClass('menu-item-edit-active')) {
            $(this).parent().removeClass('menu-item-edit-active');
        } else {
            $(this).parent().addClass('menu-item-edit-active');
        }
    });
})(jQuery);