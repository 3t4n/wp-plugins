jQuery(document).ready(function($) {
	var current_classes = $('#minecraft-block-preview .minecraft').attr('class');
	var current_texture = current_classes.replace('minecraft ', '');
	var new_texture = '';
	$('select.texture').change( function() {
		new_texture = $('select.texture option:selected').val();
		$('#minecraft-block-preview .minecraft').removeClass( current_texture ).addClass( new_texture );
		current_texture = new_texture;
	});
});