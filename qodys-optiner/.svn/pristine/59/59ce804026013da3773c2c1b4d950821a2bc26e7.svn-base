// Animated Image Preload Effect
// Courtesy of Sean Corey at http://5-squared.com

jQuery(document).ready( function()
{
	/*********************************************************************
	*	Header Text
	**********************************************************************/
	jQuery('#header_text').bind( 'blur focus keyup keydown', function(e) {
		jQuery('#optiner-optin').contents().find('.header_text').html( jQuery(this).val() );		
	} );
	jQuery('#header_text_size').change( function(e) {
		jQuery('#optiner-optin').contents().find('.header_text').css( 'font-size', jQuery(this).val() + 'px' );		
	} );
	jQuery('#header_text_top_padding').change( function(e) {
		jQuery('#optiner-optin').contents().find('.header_text').css( 'padding-top', jQuery(this).val() + 'px' );		
	} );
	jQuery('#header_text_bottom_padding').change( function(e) {
		jQuery('#optiner-optin').contents().find('.header_text').css( 'padding-bottom', jQuery(this).val() + 'px' );		
	} );
	
	AddDefaultColorPicker( '#header_text_color', '.header_text', 'color', '' );
	
	
	/*********************************************************************
	*	Secondary Text
	**********************************************************************/	
	jQuery('#secondary_text').bind( 'blur focus keyup keydown', function(e) {
		jQuery('#optiner-optin').contents().find('.secondary_text').html( jQuery(this).val() );		
	} );
	jQuery('#secondary_text_size').change( function(e) {
		jQuery('#optiner-optin').contents().find('.secondary_text').css( 'font-size', jQuery(this).val() + 'px' );		
	} );
	
	AddDefaultColorPicker( '#secondary_text_color', '.secondary_text', 'color', '' );
	
	
	/*********************************************************************
	*	Privacy Text
	**********************************************************************/	
	jQuery('#privacy_text').bind( 'blur focus keyup keydown', function(e) {
		jQuery('#optiner-optin').contents().find('.privacy_text').html( jQuery(this).val() );		
	} );
	jQuery('#privacy_text_size').change( function(e) {
		jQuery('#optiner-optin').contents().find('.privacy_text').css( 'font-size', jQuery(this).val() + 'px' );		
	} );
	
	AddDefaultColorPicker( '#privacy_text_color', '.privacy_text', 'color', '' );
	
	
	/*********************************************************************
	*	Facebook Connect Area
	**********************************************************************/
	jQuery('#connect_extra').bind( 'blur focus keyup keydown', function(e) {
		jQuery('#optiner-optin').contents().find('.connect_extra').html( jQuery(this).val() );		
	} );
	
	
	/*********************************************************************
	*	Submit Button
	**********************************************************************/
	jQuery('#submit_button_text').bind( 'blur focus keyup keydown', function(e) {
		jQuery('#optiner-optin').contents().find('#odin_submit_button').html( jQuery(this).val() );		
	} );
	jQuery('#submit_button_text_size').change( function(e)
	{
		jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'font-size', parseInt( jQuery(this).val() )  + 'px' );
	} );
	jQuery('#submit_button_size').change( function(e)
	{
		var the_value = parseInt( jQuery(this).val() );
		
		jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'padding-top', the_value  + 'px' );
		jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'padding-right', the_value + 5 + 'px' );
		jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'padding-bottom', the_value + 'px' );
		jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'padding-left', the_value + 5 + 'px' );
	} );
	
	AddDefaultColorPicker( '#submit_button_background_color', '#odin_submit_button', 'gradient', 'button' );
	AddDefaultColorPicker( '#submit_button_text_color', '#odin_submit_button', 'gradient', 'button_text' );
	
	
	/*********************************************************************
	*	Product Image
	**********************************************************************/
	jQuery('#extra_image_top_padding').change( function(e) {
		jQuery('#optiner-optin').contents().find('.product_image img').css( 'padding-top', jQuery(this).val() + 'px' );		
	} );
	jQuery('#extra_image_width').bind( 'blur focus change', function(e) {
		jQuery('#optiner-optin').contents().find('.product_image img').css( 'width', jQuery(this).val() + 'px' );		
	} );
	
	
	/*********************************************************************
	*	Container Background
	**********************************************************************/
	AddDefaultColorPicker( '#background_color_from', '.optiner-popup', 'gradient', '' );
	AddDefaultColorPicker( '#background_color_to', '.optiner-popup', 'gradient', '' );
	
	
	/*********************************************************************
	*	Container Border
	**********************************************************************/
	jQuery('#outer_border_width').change( function(e) {
		jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'border-width', jQuery(this).val() + 'px' );		
	} );
	jQuery('#outer_border_style').change( function(e) {
		jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'border-style', jQuery(this).val() );		
	} );
	
	AddDefaultColorPicker( '#outer_border_color', '.optiner-popup', 'border-color', '' );
	
	
	/*********************************************************************
	*	Container Dimensions
	**********************************************************************/
	jQuery('#frame_width').bind( 'blur focus', function(e) {
		AlterFrameWidth( parseInt(jQuery(this).val()) );
	} );
	jQuery('#frame_height').bind( 'blur focus', function(e) {
		AlterFrameHeight( parseInt(jQuery(this).val()) );
	} );
	
	
	
	
	// text colors
	
	
	
	
	
	
	
	/*if( jQuery("#frmwk-optin_preview") )
	{
		var jQuerysidebar   = jQuery("#frmwk-optin_preview"),
			jQuerywindow    = jQuery(window),
			offset     = jQuerysidebar.offset(),
			topPadding = 15;
		
		var normal_width = jQuerysidebar.width();
	
		jQuerywindow.scroll(function() {
			if (jQuerywindow.scrollTop() > offset.top)
			{
				jQuerysidebar.css( 'position', 'fixed' );
				jQuerysidebar.css( 'top', '40px' );
				jQuerysidebar.css( 'width', normal_width );				
				
			} else {
				
				jQuerysidebar.css( 'position', 'relative' );
				jQuerysidebar.css( 'top', '0px' );
				jQuerysidebar.css( 'width', '100%' );	
				
				normal_width = jQuerysidebar.width();
			}
		});
	}*/
	
} );

function SwitchOptinTheme( new_theme )
{
	if( jQuery('#frame_width').val() != 280 )
	{
		jQuery('#frame_width').val( 280 );
		AlterFrameWidth( 280 );
	}
	
	if( jQuery('#frame_height').val() != 400 )
	{
		jQuery('#frame_height').val( 400 );
		AlterFrameHeight( 400 );
	}
	
	if( jQuery('#use_background2').attr( 'checked' ) != 'checked' )
	{
		jQuery('#use_background2').click();
	}
	if( jQuery('#use_outer_border2').attr( 'checked' ) != 'checked' )
	{
		jQuery('#use_outer_border2').click();
	}
	
	//jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '' ).css( 'background-color', 'transparent' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '' ).removeClass().addClass('optiner-popup').addClass( new_theme );
}

function AttachLabelEvents( text_id, input_id )
{
	jQuery( '#' + text_id ).bind( 'blur focus keyup keydown', function(e)
	{		
		AdjustLabelText( text_id, input_id );
	} );
	
	AdjustLabelText( text_id, input_id );
}

function AdjustLabelText( text_id, input_id )
{
	var the_text = jQuery('#' + text_id).val();
	
	//jQuery('#optiner-optin').contents().find( '#label-for-' + input_id ).html( the_text );
	jQuery('#optiner-optin').contents().find( '#' + input_id ).attr( "placeholder", the_text );
	jQuery('#optiner-optin').contents().find( '#' + input_id ).attr( "value", the_text );
}
	
function InsertInputToForm( input_name, input_id, label_text )
{
	var the_input = jQuery('<input />');
	
	//the_input.addClass('xlarge');
	the_input.attr( 'name', input_name );
	the_input.attr( 'id', input_id );
	the_input.attr( 'type', 'text' );
	the_input.attr( 'size', 30 );
	the_input.attr( 'placeholder', label_text );
	//the_input.addClass('defaultText');
	
	var container1 = jQuery('<div />').addClass('input').append( the_input );
	//var new_label = jQuery('<label />').attr( 'id', 'label-for-' + input_id ).attr( 'for', input_id );
	
	//var new_input_container = jQuery('<div />').addClass('clearfix').addClass('input_container').append( new_label ).append( container1 );
	var new_input_container = jQuery('<div />').addClass('clearfix').addClass('input_container').append( container1 );
	
	jQuery('#optiner-optin').contents().find('#input_container').append( new_input_container );
}

function RemoveInputFromForm( input_id )
{
	jQuery('#optiner-optin').contents().find('#' + input_id ).parent().parent().remove();
}

function ShowOdinForm( the_pre )
{
	// Show good stuff
	jQuery('#' + the_pre + '-odin_form').show();
	jQuery('#' + the_pre + '-facebook_app').show();
	jQuery('#optiner-optin').contents().find('#odin_form').show();
	
	// Hide bad stuff
	jQuery('#' + the_pre + '-traditional_form').hide();
	jQuery('#' + the_pre + '-submit_button').hide();
	jQuery('#optiner-optin').contents().find('#traditional_form').hide();
}

function ShowTraditionalForm( the_pre )
{
	// Show good stuff
	jQuery('#' + the_pre + '-traditional_form').show();
	jQuery('#' + the_pre + '-submit_button').show();
	jQuery('#optiner-optin').contents().find('#traditional_form').show();
	
	// Hide bad stuff
	jQuery('#' + the_pre + '-odin_form').hide();
	jQuery('#' + the_pre + '-facebook_app').hide();
	jQuery('#optiner-optin').contents().find('#odin_form').hide();
}
function CalculateColorLuminance(hex, lum) {
	// validate hex string
	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;
	// convert to decimal and change luminosity
	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}
	return rgb;
}
function ChangeSubmitButtonTextColor( to_color )
{
	var shadow_color = CalculateColorLuminance( to_color, -0.95 );
	
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'color', to_color );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'text-shadow:', '0 -1px 0 ' + shadow_color );
}

function ChangeSubmitButtonGradient( to_color )
{
	var from_color = CalculateColorLuminance( to_color, 0.2 );
	
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-color', to_color );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-repeat', 'repeat-x' );
	
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', '-khtml-gradient(linear, left top, left bottom, from(' + from_color + '), to(' + to_color + '))' );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', '-ms-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', '-moz-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', '-o-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', '-webkit-gradient(-webkit-gradient(linear, left top, left bottom, color-stop(0%, ' + from_color + '), color-stop(100%, ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', '-webkit-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'background-image', 'linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'border-color', to_color + ' ' + to_color + ' ' + from_color );
	jQuery('#optiner-optin').contents().find('#odin_submit_button').css( 'border-color', 'rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25)' );
}

function AddDefaultColorPicker( select_slug, item_affected, change_key, gradient_type )
{
	jQuery(select_slug).miniColors( 
	{
		change: function( hex, rgba )
		{
			if( change_key == 'gradient' )
			{
				if( select_slug.indexOf('_from') != -1 )
				{
					from_color = hex;
					to_color = jQuery( select_slug.replace('from', 'to') ).val();
				}
				else
				{
					from_color = jQuery( select_slug.replace('to', 'from') ).val();
					to_color = hex;
				}
				
				//console.log( item_affected + ' ' + from_color + ' ' + to_color );
				//console.log( '-webkit-gradient(linear,left top,left bottom,from(' + from_color + '),to(' + to_color + ') )' );
				
				if( gradient_type == 'button' )
				{
					ChangeSubmitButtonGradient( to_color );
				}
				else if( gradient_type == 'button_text' )
				{
					ChangeSubmitButtonTextColor( to_color );
				}
				else
				{
					ShowGradients( from_color, to_color );
				}
				//jQuery(item_affected).css( 'background-image', '-webkit-gradient(linear,left top,left bottom,from(' + from_color + '),to(' + to_color + ') )' );
				
				/*jQuery(item_affected).css( {
					'background-color' : to_color,
					'background-image' : '-ms-linear-gradient(top,' + from_color + ', ' + to_color + ')',
					'background-image' : '-moz-linear-gradient(top,' + from_color + ', ' + to_color + ')',
					'background-image' : '-o-linear-gradient(top,' + from_color + ', ' + to_color + ')',
					'background-image' : '-webkit-gradient(linear,left top,left bottom,from(' + from_color + '),to(' + to_color + ') )',
					'background-image' : '-webkit-linear-gradient(top,' + from_color + ', ' + to_color + ')',
					'background-image' : 'linear-gradient(top,' + from_color + ', ' + to_color + ')'				
				} );*/
			}
			else
			{
				jQuery('#optiner-optin').contents().find(item_affected).css( change_key, hex );
			}
		}
	} );
}

function ShiftProductImage( new_position )
{
	var product_direction = 'none';
	var optin_direction = 'none';
	
	var image_width = jQuery('#optiner-optin').contents().find('.product_image').css( 'width' );
	var image_height = jQuery('#optiner-optin').contents().find('.product_image').css( 'height' );
	
	image_width = parseInt( image_width, 10 );
	image_height = parseInt( image_height, 10 );
	
	var container_width = default_container_width;
	var container_height = default_container_height;
	
	if( new_position == 'left' )
	{
		product_direction = 'left';
		optin_direction = 'right';
		
		container_width += image_width;
	}
	else if( new_position == 'right' )
	{
		product_direction = 'right';
		optin_direction = 'left';
		
		container_width += image_width;
	}
	else if( new_position == 'top' )
	{
		container_height += image_height;
	}
	
	AlterFrameHeight( container_height );
	AlterFrameWidth( container_width );
	
	jQuery('#optiner-optin').contents().find('.product_image').css( 'float', product_direction );
	jQuery('#optiner-optin').contents().find('#main_container').css( 'float', optin_direction );
}

function ShowProductImage()
{
	jQuery('#optiner-optin').contents().find('.product_image').show();
	
	var current_position = jQuery('input[name=field_product_image_position]:checked').val();
	
	ShiftProductImage( current_position );
}
function HideProductImage()
{
	jQuery('#optiner-optin').contents().find('.product_image').hide();
	
	ShiftProductImage( '' );
}

function ShowCustomSubmitButton()
{
	jQuery('#optiner-optin').contents().find('#custom_submit_button').show();
	jQuery('#optiner-optin').contents().find('#odin_submit_button').hide();	
}
function HideCustomSubmitButton()
{
	jQuery('#optiner-optin').contents().find('#custom_submit_button').hide();
	jQuery('#optiner-optin').contents().find('#odin_submit_button').show();
}

function AlterFrameHeight( the_value )
{
	//the_value = parseInt( the_value, 10 );
	
	jQuery('#optiner-optin').css('height', the_value + 25 + 'px' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css('height', the_value + 'px' );
	
	jQuery('#frame_height').val( the_value );
}

function AlterFrameWidth( the_value )
{
	jQuery('#optiner-optin').css('width', the_value + 25 + 'px' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css('width', the_value + 'px' );
	
	jQuery('#frame_width').val( the_value );
}

function AlterProductImage( the_image_src )
{
	var the_image_width = -1;
	
	if( the_image_src == '' )
	{
		jQuery('#optiner-optin').contents().find('.product_image img').hide();
		the_image_width = '';
	}
	else
	{
		jQuery('#optiner-optin').contents().find('.product_image img').show();
		jQuery('#extra_image_width').val( '' );
	}
		
	jQuery('#optiner-optin').contents().find('.product_image img').attr( 'src', the_image_src );
	
	if( the_image_width == -1 )
		the_image_width = jQuery('#optiner-optin').contents().find('.product_image').css( 'width' );
	
	jQuery('#extra_image_width').val( the_image_width ).change();
}

function AlterSubmitButtonImage( the_image_src )
{
	if( the_image_src == '' )
	{
		ShowCustomSubmitButton();
	}
	else
	{
		HideCustomSubmitButton();
	}
		
	jQuery('#optiner-optin').contents().find('#custom_submit_button').attr( 'src', the_image_src );
}

function AlterFacebookConnectImage( the_element )
{
	jQuery('#optiner-optin').contents().find('.facebook_connect_image').attr( 'src', jQuery(the_element).val() );
}

function IsThisThingInThisArray(needle, haystack)
{
	if( haystack == '' || haystack == null )
		return false;
		
    var length = haystack.length;
    for(var i = 0; i < length; i++) {
        if(haystack[i] == needle) return true;
    }
    return false;
}

function ShowOuterBorder()
{
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( {
		'border-width' : jQuery('#outer_border_width' ).val() + 'px',
		'border-style' : jQuery('#outer_border_style' ).val(),
		'border-color' : jQuery('#outer_border_color' ).val(),
		'-moz-box-shadow' : 'inset 0 1px 0 #fff',
		'-webkit-box-shadow' : 'inset 0 1px 0 #fff',
		'box-shadow' : 'inset 0 1px 0 #fff',
	} );
}

function HideOuterBorder()
{
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( {
		'border-width' : '0px',
		'-moz-box-shadow' : 'none',
		'-webkit-box-shadow' : 'none',
		'box-shadow' : 'none',
	} );
}

function ShowBackground()
{
	jQuery('#use_background').show();
	ShowGradients( null, null );
	
	jQuery('#optiner-optin').contents().find('.optiner-popup').removeClass().addClass('optiner-popup');
	jQuery('#empty_theme').attr( 'checked', 'checked' );
}
function HideBackground( reset_theme )
{
	jQuery('#use_background').hide();
	HideGradients();
	
	jQuery('#optiner-optin').contents().find('.optiner-popup').removeClass().addClass('optiner-popup');
	jQuery('#empty_theme').attr( 'checked', 'checked' );
}
function ShowGradients( from_color, to_color )
{
	if( from_color == null )
		from_color = jQuery('#background_color_from' ).val();
	
	if( to_color == null )
		to_color = jQuery('#background_color_to' ).val();
	
	var item_affected = '.optiner-popup';
	
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-color', to_color );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '-ms-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '-moz-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '-o-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '-webkit-gradient(linear,left top,left bottom,from(' + from_color + '),to(' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', '-webkit-linear-gradient(top,' + from_color + ', ' + to_color + ')' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', 'linear-gradient(top,' + from_color + ', ' + to_color + ')' );
}
function HideGradients()
{
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-image', 'none' );
	jQuery('#optiner-optin').contents().find('.optiner-popup').css( 'background-color', 'transparent' );
}


