jQuery(document).ready(function($){
	// Backend Settings Tabs Configuration
	$('ul.apcf-tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.apcf-tabs li').removeClass('current');
		$('.apcf-tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});

	// Shortcode Click Copy to Clipboard
	$('.apcf-copy-to-clipboard input').click(function() {
    	$(this).focus();
    	$(this).select();
    	document.execCommand('copy');
    	//alert('copied');
  	});

  	// Backend form inner settings
  	$('.apcf-field-wrap-inner').hide();

  	$('#apcf-field-wrap-name').click(function(){
  			$('#apcf-field-wrap-inner-name').slideToggle();
  	});
  	$('#apcf-field-wrap-email').click(function(){
  			$('#apcf-field-wrap-inner-email').slideToggle();
  	});
  	$('#apcf-field-wrap-subject').click(function(){
  			$('#apcf-field-wrap-inner-subject').slideToggle();
  	});
  	$('#apcf-field-wrap-message').click(function(){
  			$('#apcf-field-wrap-inner-message').slideToggle();
  	});
  	$('#apcf-field-wrap-submit').click(function(){
  			$('#apcf-field-wrap-inner-submit').slideToggle();
  	});

});
