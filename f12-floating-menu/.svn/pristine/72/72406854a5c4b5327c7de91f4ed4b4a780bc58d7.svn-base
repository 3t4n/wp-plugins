jQuery(function ($) {
    window.f12_floating_menu_items = window.f12_floating_menu_items || {};

    /**
     * This snippet will handle the removing of the link inputs
     */
    $(document).ready(function () {
        $(document).on('click','.f12-floating-menu-items-remove', function(e){
            e.preventDefault();

            if(confirm(f12_floating_menu_items_remove.labels.confirm)){
                $(this).closest('.box').remove();
            }
        });
    });

});