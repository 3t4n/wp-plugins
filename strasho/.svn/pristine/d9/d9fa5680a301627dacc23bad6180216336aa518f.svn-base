(function($) {
    var dropField = '<div class="droppable"></div>';
    $('#menu-settings-column form').after(dropField);

    $('.droppable').droppable({
        tolerance: 'pointer',
        over: function( event, ui ) {
            $(this).addClass('trash');
        },
        out: function( event, ui ) {
            $(this).removeClass('trash');
        },
        drop: function( event, ui ) {
            var draggedElementDeleteUrl = $(ui.draggable).find('.item-delete');
            var draggedElementId = $(ui.draggable).attr('id');
            draggedElementDeleteUrl.trigger('click');
            $(this).removeClass('trash');
        }
    });
})(jQuery);