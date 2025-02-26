jQuery(document).ready(function($){

    var $cell = $('.gis-item');

    $cell.find('.gis-expand').click(function (event) {
        event.preventDefault();

        var $thisCell = $(this).closest('.gis-item');

        if ($thisCell.hasClass('is-collapsed')) {
            $cell.not($thisCell).removeClass('is-expanded').addClass('is-collapsed');
            $thisCell.removeClass('is-collapsed').addClass('is-expanded');
        } else {
            $thisCell.removeClass('is-expanded').addClass('is-collapsed');
        }
        
    });
    
    $cell.find('.expand_close').click(function (event) {
        event.preventDefault();
        var $thisCell = $(this).closest('.gis-item');
        $thisCell.removeClass('is-expanded').addClass('is-collapsed');
    });
    
});