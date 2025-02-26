jQuery(document).ready(function(){
	jQuery('#form-settings').submit(function(){
		jQuery(this).sendFormGdprsup({
			btn: jQuery(this).find('.button-primary')
		,	onSuccess: function(res) {
				if(!res.error) {
					jQuery('#form-settings').slideUp();
					jQuery('#form-settings-send-msg').slideDown();
				}
			}
		});
		return false;
	});
	jQuery('.supsystic-overview-news-content').slimScroll({
		height: '500px'
	,	railVisible: true
	,	alwaysVisible: true
	,	allowPageScroll: true
	});
	jQuery('.faq-title').click(function(){
		var descBlock = jQuery(this).find('.description:first');
		if(descBlock.is(':visible')) {
			descBlock.slideUp( g_gdprsupAnimationSpeed );
		} else {
			jQuery('.faq-title .description').slideUp( g_gdprsupAnimationSpeed );
			descBlock.slideDown( g_gdprsupAnimationSpeed );
		}
	});
	jQuery('.supsysticOverviewACBtnDisable').on('click', function(e) {
		e.preventDefault();
		sendSubscribeDisable();
	});
	jQuery('.overview-section-btn').on('click', function() {
			jQuery(".overview-section").hide();
			jQuery(".overview-section[data-section='" + jQuery(this).data("section") + "']").show();
			jQuery('.overview-section-btn-active').removeClass('overview-section-btn-active');
			jQuery(this).addClass('overview-section-btn-active');
	});
	jQuery('.supsysticOverviewACBtnDisable, .supsysticOverviewACClose, .supsysticOverviewACBtnRemind').on('click', function() {
			jQuery('.supsysticOverviewACFormOverlay').fadeOut();
	});
	jQuery('.overview-section-btn').eq(2).trigger('click');
});
