jQuery(document).ready( function() {
	
	jQuery( ".fancy_radio_buttons" ).buttonset();
	jQuery( ".fancy_checkboxes" ).buttonset();
} );

function ToggleImportCompleted( the_label )
{
	var new_color = '';
	var new_value = '';
	var already_processed = jQuery(the_label).parent().find('.status_toggle').val();
	
	if( already_processed == -1 )
	{
		new_color = '#090';
		new_value = 1;
	}
	else
	{
		new_color = '#c00';
		new_value = -1;
	}
	
	jQuery(the_label).css( 'color', new_color );
	jQuery(the_label).parent().find('.status_toggle').val( new_value );
}