/**
 * Manages menu on navigation.php page
 *
 * @since 1.00.00
 */
jQuery(document).ready(function($){

    const SELECTIZE_OPTIONS = {
        plugins: [ 'remove_button' ],
        delimiter: ',',
        persist: true,
        create: function( input ) {
            return { value: input, text: input };
        }
    };

    // Check for the existing menu items
    let existingMenuItems = $('#menu-to-edit').find('.menu-item');

    // Watch for changes in the menu structure
    $('#menu-to-edit').on('DOMSubtreeModified', function () {
        // Compare the current menu items with the previous ones
        let currentMenuItems = $('#menu-to-edit').find('.menu-item');

        if (currentMenuItems.length > existingMenuItems.length) {
            // New menu item(s) added
            let addedMenuNumber = currentMenuItems.length - existingMenuItems.length
            let newlyAddedMenuList = [];
            for( I = currentMenuItems.length - 1; I >= existingMenuItems.length; I-- ) {
                newlyAddedMenuList.push( currentMenuItems[I] );
            }
            newlyAddedMenuList.forEach((element) => {
                $(element).find('.edit-menu-item-custom').selectize(SELECTIZE_OPTIONS);
            });
            existingMenuItems = currentMenuItems;
        }
    });

    $('.edit-menu-item-custom').each( ( index, element ) => {
        $(element).selectize( SELECTIZE_OPTIONS );
    } );
})