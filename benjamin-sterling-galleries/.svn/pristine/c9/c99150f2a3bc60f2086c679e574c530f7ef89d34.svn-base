(function ($) {
	$(document).ready(function(){
		var jQbsg_stylesTextarea = $('#bsg_stylesTextarea');
		var jQbsg_processStyles = $('#bsg_processStyles');

		jQbsg_processStyles.click(function(){
			
			$.ajax({
				url : '<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>',
				data : 'to=update_styles&aid='+$('#bsg_aid').val()+'&styles='+jQbsg_stylesTextarea.val(),
				dataType : 'json',
				type : 'POST',
				success : function(data, textStatus){
					if(data.error == 'error_no_styles'){
						alert('Sorry, but the styles were not passed to the server, please try again.');
					}
					else if(data.error == 'error_no_id'){
						alert('Sorry, but the ID was not passed to the server, please try again.');
					}
					else{
						var jQlink = $('link[href*=benjaminSterlingGalleries]')
						var href = jQlink.attr('href') + '&' + new Date().getTime();
						jQlink.attr('href', href);
					}
				}				
			});
			return false;
		});
		
		$('#finGallery').height($('#finGallery').height()+100);
	});
})(jQuery);