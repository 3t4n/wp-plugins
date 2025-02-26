function DetectAndCreateOptinSelects()
{
	var the_textarea = jQuery( "#form_code" );
	var name_select = jQuery( "#name_select" );
	var email_select = jQuery( "#email_select" );
	
	var temp_container = jQuery( '<span />' ).html( the_textarea.val() );
	
	var found_inputs = new Array();
	
	var iter = 0;
	
	temp_container.find('input').each( function()
	{		
		found_inputs[ iter ] = jQuery(this).attr( 'name' );
		
		iter++;		
	} );
	
	name_select.html('');
	email_select.html('');
	
	var new_thing = null;
	var found_input_iter = 0;
	
	jQuery.each( found_inputs, function( the_index, the_value )
	{
		found_input_iter++;
		
		new_thing = jQuery('<option></option>').val(the_value).html(the_value);
		
		if( the_value == name_select.attr('rel') )
			new_thing.attr( 'selected', true );
			
		name_select.append( new_thing );
		
		new_thing = jQuery('<option></option>').val(the_value).html(the_value);
		
		if( the_value == email_select.attr('rel') )
			new_thing.attr( 'selected', true );
		else if( found_input_iter == 2 )
			new_thing.attr( 'selected', true );
			
		email_select.append( new_thing );
		
	});
}