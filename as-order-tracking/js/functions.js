/**
 * ASOT
 * -
 *
 * Licensed under the GPLv2+ license.
 */

window.ASOT = window.ASOT || {};

( function( window, document, $, plugin ) {

	var input_date_shipped      = $('#as_date_shipped')
			provider_sortable       = $('#provider-sortable')
			// provider_header         = '#provider-sortable h3'
			button_add_provider	    = $('#add-provider')
			button_close_provider   = '.close-provider'
			add_tracking_url        = '.add_tracking_url'
			button_update_provider  = '.update-provider'
			button_delete_provider  = '.delete-provider'
			input_provider_name     = '.provider-name'
			shipment_tracking_input = $('.as-field')
			button_tracking         = $('#as-shipment-tracking button')

	plugin.init = function() {

		if ( input_date_shipped.length ) {

			input_date_shipped.datepicker({
				showButtonPanel: true,
			});

		}

 
    button_tracking.on('click', function(e) {

      e.preventDefault();

      var $this = $(this);

      $this.closest('.control-actions').find('.spinner').addClass('active');

      $('.wrap > #message.notice').remove();

      $.ajax({
        type: 'POST',
        url: ASOT.ajaxurl,
        data: shipment_tracking_input.serialize() +'&as_shipment_tracking_nonce=' + $('#as_shipment_tracking_nonce').val() + '&action=as_send_tracking',
        success: function(data, textStatus, XMLHttpRequest) {

          $this.closest('.control-actions').find('.spinner').removeClass('active');

          if ( data.errors == true ){
            alert( data.msg );
          }else{
            $('select#order_status').val( ASOT.order_action ).trigger('change');
          }

          $( '.wp-header-end' ).after( '<div id="message" class="updated notice notice-success is-dismissible"><p>'+ ASOT.notice +'</p></div>' );

        },

      });

    });

    $(document).on('click', 'button.notice-dismiss', function(e) {

      $(this).closest( 'div.notice' ).remove();

    });

	};



	$( plugin.init );



}( window, document, jQuery, window.ASOT ) );
