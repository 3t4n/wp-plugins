jQuery(function($) {
    $( document ).ready(function() {
		
		$('.dv-iran-map .province path').click(function() {
			window.location = $( this ).data('url');
		});
		
		$( 'body' ).append( '<div class="dv-map-tooltip"></div>' );

		$description = $(".dv-map-tooltip");

		$('.dv-tooltip-enabled').hover(function () {

		  $(this).attr("class", "dv-tooltip-enabled dv-tooltip-heyo");
		  $description.addClass('dv-map-active');
		  $description.html($(this).data('info'));
		}, function () {
		  $description.removeClass('dv-map-active');
		});

		$(document).on('mousemove', function (e) {

		  $description.css({
			left: e.pageX,
			top: e.pageY - 70 });


		});
    });
});
