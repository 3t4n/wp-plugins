/**
 * Social Share Options for the floating menu.
 */
jQuery(document).ready(function ($) {
    /**
     * Adding social share icons to the backend allowing us to prefill the link url field
     */
    $(document).on('click', 'button[name="social-share"]', function(e){
        e.preventDefault();

        if(!$(this).attr('data-value')){
            throw 'data value not found';
        }

        if(!$(this).attr('data-storage-id')){
            throw 'data storage not found';
        }

        $('#'+$(this).attr('data-storage-id')).val($(this).attr('data-value'));

        /**
         * Set the item in the icon box to be active
         * @type {*|jQuery}
         */
        let icon_class = $(this).find('i').attr('class');
        $(this).closest('.box').find('.icon-box li[data-name="'+icon_class+'"]').each(function(){
            $(this).click();
        });
    });
});