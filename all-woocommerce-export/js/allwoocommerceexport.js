jQuery(document).ready(function($){
	$('#upload_header_image_button').click(function(e){
		e.preventDefault();
		var elv_easylogo_uploader = wp.media({
			title: 'Select or upload a logo',
			button: { text: 'Select Logo' },
			multiple: false
		}).on('select', function(){
			var attachment = elv_easylogo_uploader.state().get('selection').first().toJSON();
			$('#cot_header_logo_image').val(attachment.url);
			$('#awe_customtheme_admin_preview').attr("src", attachment.url);
		}).open();
		
	});
});	
