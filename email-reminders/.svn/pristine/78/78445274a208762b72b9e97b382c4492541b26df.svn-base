jQuery( document ).ready( function (){

	// Enable | Disable   R E S E T   button depend from selected option
	jQuery( '.oper_contact_form_reset_select' ).on( 'change', function (){
		var selected_option = jQuery( '.oper_contact_form_reset_select option:selected' ).val();
		if ( '' == selected_option ){
			jQuery( '.oper_contact_form_reset_button' ).addClass( 'disabled' );
		} else {
			jQuery( '.oper_contact_form_reset_button' ).removeClass( 'disabled' );
		}
	} );

	// R E S E T   Click
	jQuery( '.oper_contact_form_reset_button' ).on('click',function(){

		if ( ! jQuery( '.oper_contact_form_reset_button' ).hasClass('disabled') ){

			if ( oper_are_you_sure( oper_global1.message_do_you_really ) ){

				// Get selected template
				var selected_template = jQuery( '.oper_contact_form_reset_select option:selected' ).val();

				var textarea_content = oper_get_contact_form_template( selected_template );

				// Reset Contact Form in CodeMirror textarea
				var editor_textarea_id = 'oper_contact_form_textarea';

				oper_reset_contact_form( textarea_content, editor_textarea_id );
			}
		}
	});
});


/**
 * Replace content in the codemirror Contact Form
 *
 * @param editor_textarea_content
 * @param editor_textarea_id
 */
function oper_reset_contact_form( editor_textarea_content, editor_textarea_id ){

	if ( (typeof OPER_CM !== 'undefined') && (OPER_CM.is_defined( '#' + editor_textarea_id )) ){

		OPER_CM.set_codemirror_value( '#' + editor_textarea_id, editor_textarea_content );

	} else {

		if ( typeof tinymce != "undefined" ){
			var editor = tinymce.get( editor_textarea_id );
			if ( editor && editor instanceof tinymce.Editor ){
				editor.setContent( editor_textarea_content );
				editor.save( {no_events: true} );
			} else {
				jQuery( '#' + editor_textarea_id ).val( editor_textarea_content );
			}
		} else {
			jQuery( '#' + editor_textarea_id ).val( editor_textarea_content );
		}
	}
}


/**
 * T E M P L A T E S  -  Get Template for  Contact Form
 *
 * @param form_template_name
 * @returns {string}
 */
function oper_get_contact_form_template( form_template_name ){
	var form_content = '';

	// Default Form
	if ( ('' == form_template_name) || ('standard' == form_template_name) ){

		form_content = ''
		+ '<div class="oper-contact-form contact-form_standard">  \n'
		+ '	<div class="contact-form_field_group">  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[name]">First Name (required):</label><br/>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[name]" id="[name]" value=""/>  \n'
		+ '		</div>  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[secondname]">Last Name (required):</label><br/>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[secondname]" id="[secondname]" value=""/>  \n'
		+ '		</div>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[email]">Email (required):</label><br/>  \n'
		+ '		<input type="email" class="edit_contact_text_values" name="[email]" id="[email]" value=""/>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[phone]">Phone:</label><br/>  \n'
		+ '		<input type="text" class="edit_contact_text_values" name="[phone]" id="[phone]" value=""/>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[details]">Details:</label><br/>  \n'
		+ '		<textarea class="edit_contact_text_values" name="[details]" id="[details]"></textarea>  \n'
		+ '	</div>  \n'
		// + '	<div class="contact-form_field">  \n'
		// + '		<input type="submit" class="button button-primary" value="Send"/>  \n'
		// + '	</div>  \n'
		+ '</div>';
	}

	if ( 'inline' == form_template_name ){

		form_content = ''
		+ '<div class="oper-contact-form contact-form_inline">  \n'
		+ '	<div class="contact-form_field_group">  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[name]">First Name (required):</label>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[name]" id="[name]" value=""/>  \n'
		+ '		</div>  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[secondname]">Last Name (required):</label>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[secondname]" id="[secondname]" value=""/>  \n'
		+ '		</div>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[email]">Email (required):</label>  \n'
		+ '		<input type="email" class="edit_contact_text_values" name="[email]" id="[email]" value=""/>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[phone]">Phone:</label>  \n'
		+ '		<input type="text" class="edit_contact_text_values" name="[phone]" id="[phone]" value=""/>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[details]">Details:</label>  \n'
		+ '		<textarea class="edit_contact_text_values" name="[details]" id="[details]"></textarea>  \n'
		+ '	</div>  \n'
		+ '</div>';
	}

	if ( 'placeholders' == form_template_name ){

		form_content = ''
		+ '<div class="oper-contact-form contact-form_placeholders">  \n'
		+ '	<div class="contact-form_field_group">  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[name]">First Name (required):</label>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[name]" id="[name]" value="" placeholder="First Name (required)" />  \n'
		+ '		</div>  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[secondname]">Last Name (required):</label>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[secondname]" id="[secondname]" value="" placeholder="Last Name (required)" />  \n'
		+ '		</div>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[email]">Email (required):</label>  \n'
		+ '		<input type="email" class="edit_contact_text_values" name="[email]" id="[email]" value="" placeholder="Email (required)" />  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[phone]">Phone:</label>  \n'
		+ '		<input type="text" class="edit_contact_text_values" name="[phone]" id="[phone]" value="" placeholder="Phone" />  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[details]">Details:</label>  \n'
		+ '		<textarea class="edit_contact_text_values" name="[details]" id="[details]" placeholder="Details" ></textarea>  \n'
		+ '	</div>  \n'
		+ '</div>';
	}

	if ( 'product' == form_template_name ){

		form_content = ''
		+ '<div class="oper-contact-form contact-form_product"> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_purchase_product]">Product (short):</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_purchase_product]" id="[_purchase_product]" value="" /> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_product_name]">Product name (full):</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_product_name]" id="[_product_name]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_paid]">Paid Cost:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_paid]" id="[_paid]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_payment_type]">Payment type:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_payment_type]" id="[_payment_type]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div> \n'
		+ '	<hr style="margin: 0 0 1em;"/> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_order_num]">Order number:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_order_num]" id="[_order_num]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_date]">Date:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_date]" id="[_date]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_c_email]">Email:</label> \n'
		+ '			<input type="email" class="edit_contact_text_values" name="[_c_email]" id="[_c_email]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_c_name]">Customer Name:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_c_name]" id="[_c_name]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_license_key]">License key:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_license_key]" id="[_license_key]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_license_to]">License to:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_license_to]" id="[_license_to]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div> \n'
		+ '	<hr style="margin: 0 0 1em;"/> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_country_city]">Country / city:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_country_city]" id="[_country_city]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_address]">Address:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_address]" id="[_address]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_store]">Store:</label> \n'
		+ '			<select class="edit_contact_text_values" name="[_store]" id="[_store]"> \n'
		+ '				<option value="O">O</option> \n'
		+ '				<option value="A">A</option> \n'
		+ '			</select> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[source]">Source:</label> \n'
		+ '			<select class="edit_contact_text_values" name="[source]" id="[source]"> \n'
		+ '				<option value="csv">CSV</option> \n'
		+ '				<option value="manual">Manual Adding</option> \n'
		+ '			</select> \n'
		+ '		</div> \n'
		+ '	</div>	 \n'
		+ '	<div class="contact-form_field"> \n'
		+ '		<label for="[note]">Note:</label> \n'
		+ '		<textarea class="edit_contact_text_values" name="[note]" id="[note]"></textarea> \n'
		+ '	</div> \n'
		+ '	<div class="contact-form_field_group"> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_subscription_date]">Subscription date:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_subscription_date]" id="[_subscription_date]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_subscription_cost]">Subscription cost:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_subscription_cost]" id="[_subscription_cost]" value=""/> \n'
		+ '		</div> \n'
		+ '		<div class="contact-form_field"> \n'
		+ '			<label for="[_subscription_check]">Check on date:</label> \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[_subscription_check]" id="[_subscription_check]" value=""/> \n'
		+ '		</div> \n'
		+ '	</div> \n'
		+ '</div>';
	}


	if ( 'booking' == form_template_name ){

		form_content = ''
		+ '<div class="oper-contact-form contact-form_booking">  \n'
		+ '	<div class="contact-form_field_group">  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[name]">First Name (required):</label>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[name]" id="[name]" value=""/>  \n'
		+ '		</div>  \n'
		+ '		<div class="contact-form_field">  \n'
		+ '			<label for="[secondname]">Last Name (required):</label>  \n'
		+ '			<input type="text" class="edit_contact_text_values" name="[secondname]" id="[secondname]" value=""/>  \n'
		+ '		</div>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[email]">Email (required):</label>  \n'
		+ '		<input type="email" class="edit_contact_text_values" name="[email]" id="[email]" value=""/>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[phone]">Phone:</label>  \n'
		+ '		<input type="text" class="edit_contact_text_values" name="[phone]" id="[phone]" value=""/>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[visitors]">Adults:</label>  \n'
		+ '		<select class="edit_contact_text_values" name="[visitors]" id="[visitors]">  \n'
		+ '			<option value="1">1</option>  \n'
		+ '			<option value="2">2</option>  \n'
		+ '			<option value="3">3</option>  \n'
		+ '			<option value="4">4</option>  \n'
		+ '		</select>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[children]">Children:</label>  \n'
		+ '		<select class="edit_contact_text_values" name="[children]" id="[children]">  \n'
		+ '			<option value="0">0</option>  \n'
		+ '			<option value="1">1</option>  \n'
		+ '			<option value="2">2</option>  \n'
		+ '			<option value="3">3</option>  \n'
		+ '		</select>  \n'
		+ '	</div>  \n'
		+ '	<div class="contact-form_field">  \n'
		+ '		<label for="[details]">Details:</label>  \n'
		+ '		<textarea class="edit_contact_text_values" name="[details]" id="[details]"></textarea>  \n'
		+ '	</div>  \n'
		+ '</div>';
	}

	return form_content;
}