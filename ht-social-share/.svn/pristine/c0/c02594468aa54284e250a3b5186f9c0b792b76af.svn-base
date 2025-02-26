(function ($) {
	
	"use strict";

	var htSocialShareButtonPos = social_share_admin.social_share_style;
	var htSocialShareMessenger = social_share_admin.socialshare_messenger;
	var htSocialShareInstagram = social_share_admin.socialshare_instagram;
	var htSocialShareYoutube   = social_share_admin.socialshare_youtube;
	var htsocialShareLocation  = social_share_admin.socialshare_default_location;

	htSocialShareCheckedIcon();

	$('.social-icon-list').on('change',function(){
		var icon_value = $(this).val();
		var icon_checked = $(this).prop('checked');
		htInputfieldShoeHide(icon_value,icon_checked);
	});

	function htSocialShareCheckedIcon(){
		htSocialShareMessenger ? htInputfieldShoeHide(htSocialShareMessenger,true) : htInputfieldShoeHide('fab fa-facebook-messenger',false);
		htSocialShareInstagram ? htInputfieldShoeHide(htSocialShareInstagram,true) : htInputfieldShoeHide('fab fa-instagram',false);
		htSocialShareYoutube ? htInputfieldShoeHide(htSocialShareYoutube,true) : htInputfieldShoeHide('fab fa-youtube',false);
	}

	function htInputfieldShoeHide(icon_value,icon_checked){
		switch ( icon_value ){
			case 'fab fa-instagram': 
				icon_checked ? $('.instagram-username').show() : $('.instagram-username').hide();
				break;
			case 'fab fa-youtube': 
				icon_checked ? $('.youtube-url').show() : $('.youtube-url').hide();
				break;
			case 'fab fa-facebook-messenger': 
				icon_checked ? $('.facebook-app-id').show() : $('.facebook-app-id').hide();
				break;
			default:
		}
	}

	htSocialSetButtonPosition(htSocialShareButtonPos);

	$('input[name=socail_btn_style]').on('change',function(){
		var styleValue = $(this).val();
		var locationSelectior = "#"+htsocialShareLocation;
		htSocialSetButtonPosition(styleValue);
		if( styleValue === 'style-1'){
			$('#center').prop('checked', true);
		}else{
			$(locationSelectior).prop('checked', true);
		}
	});

	function htSocialSetButtonPosition(btnStyle){

		if( btnStyle === 'style-1'){
			$('.for-social-style-1').css({"display":"block"});
			$('.for-social-style-others').css({"display":"none"});
		}else{
			$('.for-social-style-others').css({"display":"block"});
			$('.for-social-style-1').css({"display":"none"});
		}

	}

    $('.button-styles > i').on('mouseover',function(){

		$(this).parent().children('div').show();

	}).on('mouseout',function(){

		$(this).parent().children('div').hide();

	});

})(jQuery);