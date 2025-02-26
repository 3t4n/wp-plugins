jQuery( document ).ready(function( $ ){
	$(document).ready(sectionfunction);
	$(window).on('resize',sectionfunction);
	
	function sectionfunction() {
		if (window.matchMedia('(min-width: 1170px)').matches) {
		
		var mediaWidth = $('#bodychild').width(),
			halfsectionWidth = mediaWidth / 2 ;
		
		$('.namaste-fullwidth-section .section-image-left').css({ 'width': halfsectionWidth+'px' });
		$('.namaste-fullwidth-section .section-image-right').css({ 'width': halfsectionWidth+'px' });
		$('.namaste-fullwidth-section .section-content-left').css({ 'width': halfsectionWidth+'px' });
		$('.namaste-fullwidth-section .section-content-right').css({ 'width': halfsectionWidth+'px' });
		$('.namaste-fullwidth-section .section-layer-holder').css({ 'width': mediaWidth+'px' });
		$('.namaste-fullwidth-section .section-dynamic-width').css({ 'width': mediaWidth+'px' });
		}
	}
	
	$(document).ready(smallsectionfunction);
	$(window).on('resize',smallsectionfunction);
	
	function smallsectionfunction() {
		if (window.matchMedia('(max-width: 1169px)').matches) {
		
		var mediaWidth = $('#bodychild').width();
		
		$('.namaste-fullwidth-section .section-content-left').css({ 'width': mediaWidth+'px' });
		$('.namaste-fullwidth-section .section-content-right').css({ 'width': mediaWidth+'px' });
		$('.namaste-fullwidth-section .section-content').css({ 'width': mediaWidth+'px' });
		$('.namaste-fullwidth-section .section-layer-holder').css({ 'width': mediaWidth+'px' });
		$('.namaste-fullwidth-section .section-dynamic-width').css({ 'width': mediaWidth+'px' });
		}
	}
});