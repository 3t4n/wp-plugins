jQuery(function($){
	$('#info').click(function(){
		$('.info-bubble').fadeToggle();
	});
	$("#help_screen").click(function () {
		$("#help_screen").fadeOut();
	});
	$("#help").click(function () {
		$("#help_screen").fadeIn();
	});
	$('#drawerToggle').click(function(){
		$('.drawer').toggleClass('active');
	});
	$(".owl-carousel").owlCarousel({
		items:1,
		singleItem:true,
		mouseDraggable:true,
		slideSpeed:800,
		responsiveRefreshRate:2000,
		beforeInit:function(){
			var height = $('body').hasClass('logged-in') ? ($(document).height() - 73) : ($(document).height() - 45);
			$('.owl-carousel').height( height );
			window.location.hash ? '' : window.location.hash = '0'
			//var controller = $(this)[0]
		},
		afterMove:function(){
			window.location.hash = $('.owl-item.active').children('.item').attr('data-page')
		}
	});
	var owl = $(".owl-carousel").data('owlCarousel');
	if(window.location.hash){
		owl.goTo(parseInt( (window.location.hash).slice(1) ) )
	}

	$(".drawer li").click( function() {
		var mm = $(this).attr('data-target');
		owl.goTo(parseInt(mm));
		return false;
	});
	$(window).resize(function(){
		var height = $('body').hasClass('logged-in') ? ($(document).height() - 73) : ($(document).height() - 45);
		$('.owl-carousel').height(height)
	});
	$(document).keydown(function(e){
		switch(e.which){
			case 37 :
				owl.prev()
			break;
			case 39 :
				owl.next()
			break;
			default: return;
		}
	});
});