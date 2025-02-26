/*! h-gallery.js v0.5 (c) 2012 Markus Steiger. MIT License. http://01241.com  */

$("ul.thumbs li:first").addClass('active-thumb');
$("ul.thumbs li:first").css('opacity','1');
$("ul.thumbs li").css('opacity','0.5');	
$("ul.big-images li:first").css('display','block');				
$(".thumbs li").click(function() {                  			
	$(".thumbs li").removeClass('active-thumb');		
	$(this).addClass("active-thumb");			
	$(".tab_content").fadeOut(500);				
	var selected_tab = $(this).find("a").attr("href");	
	$(selected_tab).fadeIn(1000);	

$(function() {
	$("ul.thumbs li").css("opacity","0.5");
	$("ul.thumbs li").hover(function () {
	$(this).stop().animate({
	opacity: 1.0
	}, "slow");
	},

function () {
$(this).stop().animate({
	opacity: 0.5
	}, "slow");
	});
});



return false;
});