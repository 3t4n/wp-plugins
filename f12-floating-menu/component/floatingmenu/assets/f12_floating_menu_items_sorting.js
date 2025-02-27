jQuery( function( $ ) {
    /*
     * Sortable images
     */
    $('.box-sorting').sortable({
        items:'.box',
        cursor:'-webkit-grabbing', /* mouse cursor */
        scrollSensitivity:40,
        /*
        You can set your custom CSS styles while this element is dragging
        start:function(event,ui){
            ui.item.css({'background-color':'grey'});
        },
        */
        stop:function(event,ui){
            ui.item.removeAttr('style');

            var sort = new Array(), /* array of image IDs */
                container = $(this); /* ul.misha_gallery_mtb */

            /* each time after dragging we resort our array */
            container.find('.box').each(function(index){
                sort.push( $(this).attr('data-id') );
            });

            /* add the array value to the hidden input field */
            container.next().val( sort.join() );
            /* console.log(sort); */
        }
    });

});