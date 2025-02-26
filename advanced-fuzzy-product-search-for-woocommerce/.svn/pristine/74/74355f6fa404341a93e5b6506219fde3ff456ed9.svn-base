jQuery(document).ready(function(){
	jQuery('.afswStarsRatingLine input').on('change', function() {
		var $this = jQuery(this),
			$block = $this.closest('.afsw-overview-block-body'),
			value = $this.val();
		if (value == 5) {
			jQuery(this).sendFormAfsw({
				data: 'mod=overview&action=rating',
				appendData: {afswNonce: window.afswNonce, rate: 5},
				noError: true,
				onSuccess: function(res) {
					afswOverviewSubmitSuccess(jQuery('.afswStarsRatingLine input'), res);
					toeRedirect('https://wordpress.org/support/plugin/advanced-fuzzy-search/reviews/#new-post', true);
				}
			});
			$block.find('.afsw-overview-rating').addClass('afsw-overview-hidden');
		} else {
			$block.find('.afsw-overview-rating').removeClass('afsw-overview-hidden');
		}
	});
	jQuery('#afswSubscribeSubmit').on('click', function(){
		var $button = jQuery(this),
			$email = $button.parent().find('input[name="afsw-email"]'),
			email = $email.val();
		if (email.length == 0) {
			jQuery.sNotify({
				'icon': 'fa fa-exclamation',
				'content': ' <span> '+$email.attr('placeholder')+'</span>',
				'delay' : 2500
			});
		} else {
			jQuery(this).sendFormAfsw({
				btn: $button,
				data: 'mod=overview&action=subscribe',
				appendData: {afswNonce: window.afswNonce, email: email},
				noError: true,
				onSuccess: function(res) {
					afswOverviewSubmitSuccess($button, res);
				}
			});
		}
		return false;
	});
	jQuery('#afswRatingSubmit').on('click', function(){
		var $button = jQuery(this),
			$block = $button.closest('.afsw-overview-block'),
			$email = $block.find('input[name="afsw-email"]'),
			email = $email.val(),
			$problem = $block.find('input[name="afsw-problem"]'),
			problem = $problem.val();
		if (email.length == 0) {
			jQuery.sNotify({
				'icon': 'fa fa-exclamation',
				'content': ' <span> '+$email.attr('placeholder')+'</span>',
				'delay' : 2500
			});
		} else if ($problem.length == 0) {
			jQuery.sNotify({
				'icon': 'fa fa-exclamation',
				'content': ' <span> '+$problem.attr('placeholder')+'</span>',
				'delay' : 2500
			});
		} else {
			jQuery(this).sendFormAfsw({
				btn: $button,
				data: 'mod=overview&action=rating',
				appendData: {
					afswNonce: window.afswNonce,
					email: email, 
					problem: problem,
					rate: $block.find('input[name="afswStarInput"]:checked').val()
				},
				noError: true,
				onSuccess: function(res) {
					afswOverviewSubmitSuccess($button, res);
				}
			});
		}
		return false;
	});
	
});
function afswOverviewSubmitSuccess($button, res) {
	if(!res.error) {
		$button.attr('disabled', 'disabled');
		$button.closest('.afsw-overview-block').addClass('afsw-overview-hidden');
		if (res['messages'][0]) {
			jQuery.sNotify({
				'icon': 'fa fa-check',
				'content': ' <span> '+res['messages'][0]+'</span>',
				'delay' : 2500
			});
		}
	} else {
		if (res['errors'][0]) {
			jQuery.sNotify({
				'icon': 'fa fa-exclamation',
				'content': ' <span> '+res['errors'][0]+'</span>',
				'delay' : 2500
			});
		}	
	}
}
