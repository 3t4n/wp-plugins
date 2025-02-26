jQuery(document).ready(function($) {

$('<div class="acf-fc-toggle handlediv" title="Click to toggle"><br></div>').appendTo('.acf-fc-layout-handle');

$('body').on('click','.acf-fc-toggle', function() {
	$(this).toggleClass('closed');
    $(this).parent('.acf-fc-layout-handle').siblings('.acf-input-table').slideToggle(0);
});

});
