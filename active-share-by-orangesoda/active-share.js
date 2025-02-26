jQuery.noConflict();
jQuery(document).ready(function(){
  	jQuery('#as-facebook span.fb_share_no_count').removeClass('fb_share_no_count');
    jQuery('#as-facebook span.fb_share_count_inner').html('0');

	var asstatus = 'closed';
	var dh = ((jQuery('#active-share-comment-marker').position().top)-(jQuery(window).height()/2));
	if (dh < 200) { dh = 200; }
	jQuery(document).scroll( function(){ 		
		if (((jQuery(window).scrollTop()) > dh) && jQuery('#as-share-window').css('top') == '-450px' && asstatus == 'closed') {
			jQuery('#as-share-window').animate({
				top: '0px',
			}, 'slow' );
			asstatus = 'opened';
		}
		else if ((jQuery(window).scrollTop() < dh) && jQuery('#as-share-window').css('top') == '0px' && asstatus == 'opened'){
			jQuery('#as-share-window').animate({
				top: '-450px',
			}, 'slow' );
			asstatus = 'closed';
		}  
	});
});
