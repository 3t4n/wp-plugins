(function ($) {
	$(document).ready(function(){
		var jQinputs = $('input[name=photo_alt]');
		var TO = Object();
		jQinputs.keyup(function(){
			var jQthis = $(this);
			var id = jQthis.attr('id');
			clearTimeout(TO[id]);
			TO[id] = setTimeout(function(){
						var value = jQthis.val();
						console.log(value)
						jQthis.parent().next().text('Alt text is being updated');		
						$.ajax({
							url : '<?php echo get_bloginfo('wpurl').'/wp-content/plugins/' . $this->baseDir . '/benjaminSterlingGalleries.php';?>',
							data : 'to=update_photos&pid='+id.split('-').pop()+'&value='+value,
							dataType : 'json',
							success : function(data, textStatus){
								if(data.error == 'error_no_styles'){
									alert('Sorry, but the styles were not passed to the server, please try again.');
								}
								else if(data.error == 'error_no_id'){
									alert('Sorry, but the ID was not passed to the server, please try again.');
								}
								else{
									jQthis.parent().next().text('Alt test has been updated');
								}
							}				
						});
				    }, 1000);
		});
	});
})(jQuery);