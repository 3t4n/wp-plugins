jQuery(document).ready(function() {
 
	jQuery('#upload-pib-button').click(function() {
		//type = image,audio,video,file. If we write it wrong, nothing will appear. type = file by default
		// El tipo no importa, ya que desde hace algunas versiones, el uploader puede subir cualquier tipo de archivo
		
		// Si no lo hacemos desde un meta box dentro de un post y además WP_DEBUG = true, nos saldrá un error ya que
		// no estará asociado a ningún post
		
		//tb_show(caption, url, imageGroup)
		// Google: 'ImageGroup tb_show thickbox':
		//The optional imageGroup parameter can also be used to pass in an array of images for a single or multiple image slide show gallery.
		// The problem is that inserting a gallery needs an associated post to work
		tb_show('Upload a Pin It Button!', 'media-upload.php?referer=wptuts-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
		return false;
	});
	
	window.send_to_editor = function(html) {
		// html returns a link like this:
		// <a href="{server_uploaded_image_url}"><img src="{server_uploaded_image_url}" alt="" title="" width="" height"" class="alignzone size-full wp-image-125" /></a>
		var image_url = jQuery('img',html).attr('src');
		//alert(html);
		jQuery('#button_url').val(image_url);
		tb_remove();
		jQuery('#upload-button-preview img').attr('src',image_url);
		
		jQuery('#submit-options-form').trigger('click');
		// jQuery('#uploaded_logo').val('uploaded');
		
	}
	tb_remove();
 
});