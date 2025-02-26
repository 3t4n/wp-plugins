(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(function() {
		
			//sortable
			jQuery("#sortable li").sort(sort_li).appendTo('#sortable');
			function sort_li(a, b){
				return ($(b).data('position')) < ($(a).data('position')) ? 1 : -1;    
			}

			//sort social buttons
			jQuery( "#sortable" ).sortable({
				update: function( event, ui ) {
					var idsInOrder = jQuery( "#sortable" ).sortable("toArray");
					console.log(idsInOrder);
					jQuery("#sort_social_network").attr('value', idsInOrder);
				}
			});
			jQuery( "#sortable" ).disableSelection();
			
			//facebook
			if(jQuery('#wp-scsb-facebook').is(':checked')){
				jQuery('#wp-scsb-name_facebook-fieldset').show();
				jQuery( '#sort_facebook' ).addClass( "networkselected" );

			} else {
				jQuery('#wp-scsb-name_facebook-fieldset').hide();
			}

			jQuery('#wp-scsb-facebook').change(function() {
				if(jQuery('#wp-scsb-facebook').is(':checked')){
					jQuery('#wp-scsb-name_facebook-fieldset').show();
					jQuery( '#sort_facebook' ).addClass( "networkselected" );

				} else {
					jQuery('#wp-scsb-name_facebook-fieldset').hide();
					jQuery( '#sort_facebook' ).removeClass( "networkselected" );
				}
			});
		
			//twitter
			if(jQuery('#wp-scsb-twitter').is(':checked')){
				jQuery('#wp-scsb-name_twitter-fieldset').show();
				jQuery('#textetwitter').show();
				jQuery( '#sort_twitter' ).addClass( "networkselected" );

				
			} else {
				jQuery('#wp-scsb-name_twitter-fieldset').hide();
				jQuery('#textetwitter').hide();
				
			}

			jQuery('#wp-scsb-twitter').change(function() {
				if(jQuery('#wp-scsb-twitter').is(':checked')){
					jQuery('#wp-scsb-name_twitter-fieldset').show();
					jQuery('#textetwitter').show();
					jQuery( '#sort_twitter' ).addClass( "networkselected" );

				} else {
					jQuery('#wp-scsb-name_twitter-fieldset').hide();
					jQuery('#textetwitter').hide();
					jQuery( '#sort_twitter' ).removeClass( "networkselected" );

				}
			});
		
			//linkedin
			if(jQuery('#wp-scsb-linkedin').is(':checked')){
				jQuery('#wp-scsb-name_linkedin-fieldset').show();
				jQuery( '#sort_linkedin' ).addClass( "networkselected" );


			} else {
				jQuery('#wp-scsb-name_linkedin-fieldset').hide();
			}

			jQuery('#wp-scsb-linkedin').change(function() {
				if(jQuery('#wp-scsb-linkedin').is(':checked')){
					jQuery('#wp-scsb-name_linkedin-fieldset').show();
					jQuery( '#sort_linkedin' ).addClass( "networkselected" );


				} else {
					jQuery('#wp-scsb-name_linkedin-fieldset').hide();
					jQuery( '#sort_linkedin' ).removeClass( "networkselected" );

				}
			});
		
			//google+
			if(jQuery('#wp-scsb-google-plus').is(':checked')){
				jQuery('#wp-scsb-name_googleplus-fieldset').show();
				jQuery( '#sort_google-plus' ).addClass( "networkselected" );


			} else {
				jQuery('#wp-scsb-name_googleplus-fieldset').hide();
			}

			jQuery('#wp-scsb-google-plus').change(function() {
				if(jQuery('#wp-scsb-google-plus').is(':checked')){
					jQuery('#wp-scsb-name_googleplus-fieldset').show();
					jQuery( '#sort_google-plus' ).addClass( "networkselected" );


				} else {
					jQuery('#wp-scsb-name_googleplus-fieldset').hide();
					jQuery( '#sort_google-plus' ).removeClass( "networkselected" );

				}
			});
		
			//pinterest
			if(jQuery('#wp-scsb-pinterest').is(':checked')){
				jQuery('#wp-scsb-name_pinterest-fieldset').show();
				jQuery( '#sort_pinterest' ).addClass( "networkselected" );


			} else {
				jQuery('#wp-scsb-name_pinterest-fieldset').hide();
			}

			jQuery('#wp-scsb-pinterest').change(function() {
				if(jQuery('#wp-scsb-pinterest').is(':checked')){
					jQuery('#wp-scsb-name_pinterest-fieldset').show();
					jQuery( '#sort_pinterest' ).addClass( "networkselected" );


				} else {
					jQuery('#wp-scsb-name_pinterest-fieldset').hide();
					jQuery( '#sort_pinterest' ).removeClass( "networkselected" );

				}
			});
		
			//whatsapp
			if(jQuery('#wp-scsb-whatsapp').is(':checked')){
				jQuery('#wp-scsb-name_whatsapp-fieldset').show();
				jQuery( '#sort_whatsapp' ).addClass( "networkselected" );


			} else {
				jQuery('#wp-scsb-name_whatsapp-fieldset').hide();
			}

			jQuery('#wp-scsb-whatsapp').change(function() {
				if(jQuery('#wp-scsb-whatsapp').is(':checked')){
					jQuery('#wp-scsb-name_whatsapp-fieldset').show();
					jQuery( '#sort_whatsapp' ).addClass( "networkselected" );

				} else {
					jQuery('#wp-scsb-name_whatsapp-fieldset').hide();
					jQuery( '#sort_whatsapp' ).removeClass( "networkselected" );

				}
			});
		
		
			//forme des boutons
			if(jQuery('#wp-scsb-scsb_circle').is(':checked') || jQuery('#wp-scsb-scsb_noborder').is(':checked')){
				jQuery('#coinarrondi').hide();

			} else {
				jQuery('#coinarrondi').show();
			}

			jQuery('input:radio[name="wp-scsb[scsb_forme]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_circle').is(':checked') || jQuery('#wp-scsb-scsb_noborder').is(':checked')){
					jQuery('#coinarrondi').hide();

				} else {
					jQuery('#coinarrondi').show();
				}
				
			});
		
			if(jQuery('#wp-scsb-scsb_square').is(':checked') || jQuery('#wp-scsb-scsb_circle').is(':checked') || jQuery('#wp-scsb-scsb_noborder').is(':checked')){
				jQuery('#icon').hide();
				jQuery('#backplein').hide();
				jQuery('#backpleinhover').hide();
				
			} else {
				jQuery('#icon').show();
				jQuery('#backplein').show();
				jQuery('#backpleinhover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_forme]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_square').is(':checked') || jQuery('#wp-scsb-scsb_circle').is(':checked') || jQuery('#wp-scsb-scsb_noborder').is(':checked')){
					jQuery('#icon').hide();

				} else {
					jQuery('#icon').show();
				}
				
			});
		
			//rectangle texte button
			if(jQuery('#wp-scsb-scsb_rectangle').is(':checked')){
				jQuery('#textebouton').show();

			} else {
				jQuery('#textebouton').hide();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_forme]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_rectangle').is(':checked')){
					jQuery('#textebouton').show();

				} else {
					jQuery('#textebouton').hide();
				}
				
			});
		
			
			
		
			//background choice
			if(jQuery('#wp-scsb-scsb_officialcolor input').is(':checked')){
				jQuery('#wp-scsb-scsb_socialhover').hide();

			} else {
				jQuery('#wp-scsb-scsb_socialhover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_officialcolor input').is(':checked')){
					jQuery('#wp-scsb-scsb_socialhover').hide();

				} else {
					jQuery('#wp-scsb-scsb_socialhover').show();
				}
				
			});
		
		
			if(jQuery('#wp-scsb-scsb_grey input').is(':checked')){
				jQuery('#wp-scsb-scsb_hover').hide();

			} else {
				jQuery('#wp-scsb-scsb_hover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_grey input').is(':checked')){
					jQuery('#wp-scsb-scsb_hover').hide();

				} else {
					jQuery('#wp-scsb-scsb_hover').show();
				}
				
			});
		
		
			if(jQuery('#wp-scsb-scsb_dark input').is(':checked')){
				jQuery('#wp-scsb-scsb_greyhover').hide();

			} else {
				jQuery('#wp-scsb-scsb_greyhover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_dark input').is(':checked')){
					jQuery('#wp-scsb-scsb_greyhover').hide();

				} else {
					jQuery('#wp-scsb-scsb_greyhover').show();
				}
				
			});
		
			
			if(jQuery('#wp-scsb-scsb_noback_social input').is(':checked')){
				jQuery('#wp-scsb-scsb_noback_social_hover').hide();

			} else {
				jQuery('#wp-scsb-scsb_noback_social_hover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_noback_social input').is(':checked')){
					jQuery('#wp-scsb-scsb_noback_social_hover').hide();

				} else {
					jQuery('#wp-scsb-scsb_noback_social_hover').show();
				}
				
			});
		
		
			if(jQuery('#wp-scsb-scsb_noback_dark input').is(':checked')){
				jQuery('#wp-scsb-scsb_noback_dark_hover').hide();

			} else {
				jQuery('#wp-scsb-scsb_noback_dark_hover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_noback_dark input').is(':checked')){
					jQuery('#wp-scsb-scsb_noback_dark_hover').hide();

				} else {
					jQuery('#wp-scsb-scsb_noback_dark_hover').show();
				}
				
			});

		
			//probleme circle
			if((jQuery('#wp-scsb-scsb_circle').is(':checked') && jQuery('#wp-scsb-scsb_noback_social input').is(':checked')) || (jQuery('#wp-scsb-scsb_circle').is(':checked') && jQuery('#wp-scsb-scsb_noback_dark input').is(':checked'))){
			
				jQuery('#backpleinhover').hide();
			
				
			}
			jQuery('input:radio[name="wp-scsb[scsb_forme]"]').change(function() {
				
				if((jQuery('#wp-scsb-scsb_circle').is(':checked') && jQuery('#wp-scsb-scsb_noback_social input').is(':checked')) || (jQuery('#wp-scsb-scsb_circle').is(':checked') && jQuery('#wp-scsb-scsb_noback_dark input').is(':checked'))){

					jQuery('#wp-scsb-scsb_socialhover').hide();
					jQuery('#wp-scsb-scsb_hover').hide();
					jQuery('#wp-scsb-scsb_greyhover').hide();

				} else {
					jQuery('#wp-scsb-scsb_socialhover').show();
					jQuery('#wp-scsb-scsb_hover').show();
					jQuery('#wp-scsb-scsb_greyhover').show();
				}
			})
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if((jQuery('#wp-scsb-scsb_circle').is(':checked') && jQuery('#wp-scsb-scsb_noback_social input').is(':checked')) || (jQuery('#wp-scsb-scsb_circle').is(':checked') && jQuery('#wp-scsb-scsb_noback_dark input').is(':checked'))){

					jQuery('#backpleinhover').hide();
			
				} else {
					jQuery('#backpleinhover').show();
				}
			})
			
			//back nohover
			if(jQuery('#wp-scsb-scsb_noborder').is(':checked')){
				jQuery('#backplein').hide();
				jQuery('#backpleinhover').hide();
				
			} else {
				jQuery('#backplein').show();
				jQuery('#backpleinhover').show();
			}
		
			jQuery('input:radio[name="wp-scsb[scsb_forme]"]').change(function() {
				
				if(jQuery('#wp-scsb-scsb_noborder').is(':checked')){
					jQuery('#backplein').hide();
					jQuery('#backpleinhover').hide();
			
				} else {
					jQuery('#backplein').show();
					jQuery('#backpleinhover').show();
				}
				
			});
		
			jQuery('input:radio[name="wp-scsb[scsb_background]"]').change(function() {
				
				if((jQuery('#wp-scsb-scsb_noborder').is(':checked') && jQuery('#wp-scsb-scsb_noback_social input').is(':checked')) || (jQuery('#wp-scsb-scsb_noborder').is(':checked') && jQuery('#wp-scsb-scsb_noback_dark input').is(':checked'))){

					jQuery('#backpleinhover').hide();
			
				} else {
					jQuery('#backpleinhover').show();
				}
			})
	});

})( jQuery );
