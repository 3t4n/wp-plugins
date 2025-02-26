// JavaScript Document
jQuery(document).ready(function($) {
	/*jQuery('#imup-form').live('submit', function(e) {
		e.preventDefault(); // <-- important
			showBox();
			alignBox();
			$(this).ajaxSubmit({
				target: '.imup-main'
			});
	});*/
	
});
jQuery('.ep-link').live('submit', function(e) {e.preventDefault();});
jQuery('#mbutn').live('click', function(e) {
$ = jQuery;
	var attId = $('#slideClose').attr('class');
	if ($('#mbutn').hasClass('ply')) {
	$('#mbutn').removeClass('ply');
	soundManager.play('play'+attId+'Sound');
	}
	else {
	$('#mbutn').addClass('ply');
	soundManager.stop('play'+attId+'Sound');
	}
});
function expandPost(id) {
$ = jQuery;
	if ($(id).is(':hidden')) {
		$('.ep-expand:visible').slideToggle('slow');
		$(id).slideToggle('slow');
	}
	else {
		$(id).slideToggle('slow');
	}
//$('.ep-expand:visible').hide('slow');
//$(id).slideToggle('slow');
}
function cmntSubmit(id) {
$ = jQuery;
	$('#cmntform'+id).ajaxSubmit({
		target: '#ep-result'+id
	});
}
function slideShow(id) {
$ = jQuery;
	$('#spid').val(id);
	$('#slider-wrap').fadeToggle(1000);
	$('#slider').show();
	alignBox();
	$('#slider-form').ajaxSubmit({
		target: '#slider'
	});
	soundManager.play('play'+id+'Sound');
}
function hideBox() {
$ = jQuery;
	var attId = $('#slideClose').attr('class');
	$('#slider-wrap').hide();
	$('#slider').hide();
	var lsrc = getLsrc();
	$('#slider').html('<img src="'+lsrc+'">');
	soundManager.stop('play'+attId+'Sound');
	//soundManager.destruct('play'+id+'Sound');
}
function alignBox() {
$ = jQuery;
	var wwid = $('#slider-wrap').outerWidth(); var bwid = $('#slider').outerWidth();
	var whit = $('#slider-wrap').outerHeight(); var bhit = $('#slider').outerHeight();
	var ctop = (whit-bhit)/2; var cleft = (wwid-bwid)/2;
	$('#slider').css('top', ctop); $('#slider').css('left', cleft);
}
jQuery(window).resize(function() {alignBox();});