<?php
/*
Plugin Name: Nav Menu Item Duplicator
Plugin URI: http://themestones.net/
Description: A simple plugin that adds a duplicate button to each items on edit menu screen.
Author: Sohan Zaman
Version: 1.0.1
Author URI: http://themestones.net/
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

function ts_nav_duplicator_js() {
	
	global $pagenow;
	
	if( $pagenow != 'nav-menus.php' || ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}
	
	?>
	<script type="text/javascript">
		(function($) {
			
			"use strict";
			
			function getID( el ) {
				return el.attr('id').replace('menu-item-', '') * 1;
			}
			
			function getDepth( el ) {
				return el.get(0).className.split('menu-item-depth-')[1].split(' ')[0];
			}
			
			$(document).on( 'mouseover', 'li.menu-item:not(.duplicator-enabled)', function(e) {
				
				var th = $(this).addClass('duplicator-enabled');
				
				th.find('.menu-item-actions').append('<span class="meta-sep hide-if-no-js"> | </span><a class="item-duplicate-this submitcancel hide-if-no-js" href="#">Duplicate</a>');
				
			});
			
			$(document).on( 'click', 'li.menu-item.duplicator-enabled .item-duplicate-this', function(e) {
				
				e.preventDefault();
				var li = $(this).closest('li.menu-item'),
					depth = 'menu-item-depth-' + getDepth( li ),
					availables = $('#menu-to-edit li[id^=menu-item-]'),
					ids = [],
					nowId = getID( li ),
					newId, newEl, form_data;
				
				form_data = {
					action: 'add-menu-item',
					menu: $('#menu').val(),
					'menu-settings-column-nonce': $('#menu-settings-column-nonce').val(),
					'menu-item': {
						'-1': {
							'menu-item-db-id': 0,
							'menu-item-object-id': li.find('input.menu-item-data-object-id').val(),
							'menu-item-object': li.find('input.menu-item-data-object').val(),
							'menu-item-parent-id': li.find('input.menu-item-data-parent-id').val(),
							'menu-item-type': li.find('input.menu-item-data-type').val(),
							'menu-item-title': li.find('input.edit-menu-item-title').val(),
							'menu-item-url': li.find('input.edit-menu-item-url').val(),
							'menu-item-description': li.find('textarea.edit-menu-item-description').val(),
							'menu-item-attr-title': li.find('input.edit-menu-item-attr-title').val(),
							'menu-item-target': li.find('.field-link-target input[type=checkbox]').is(':checked') ? '_blank' : '',
							'menu-item-classes': li.find('input.edit-menu-item-classes').val(),
							'menu-item-xfn': li.find('input.edit-menu-item-xfn').val()
						}
					}
				};
						   
				$.post( ajaxurl, form_data, function(menuMarkup) {
					console.log( $(menuMarkup) );
					
					var newElement = $(menuMarkup);
					
					$('.hide-column-tog').not(':checked').each(function(){
						newElement.find('.field-' + $(this).val() ).addClass('hidden-field');
					});
					
					newElement.removeClass( 'menu-item-depth-0' );
					newElement.addClass( depth );
					
					newElement = newElement.wrap('<div>').parent().html();
					
					if( li.next().hasClass( depth ) || li.parent().children('li').last().get(0) === li.get(0) ) {
						li.after(newElement);
					} else if( getDepth( li.next() ) < getDepth( li ) ) {
						li.after(newElement);
					} else {
						if( getDepth( li ) != 0 ) {
							depth = 'menu-item-depth-' + ( getDepth( li ) - 1 );
						}
						li.nextUntil( '.' + depth ).last().after(newElement);
					}
				});
				
			});
			
		})(jQuery)
	</script>
	<?php
	
}

add_action( 'admin_footer', 'ts_nav_duplicator_js' );

require_once( dirname(__FILE__) . '/class-ts-admin-notice.php' );

$href = admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=super-blog-pack&amp;TB_iframe=true&amp' );

if( !function_exists('wp_get_current_user') ) {
    require_once( ABSPATH . 'wp-includes/pluggable.php' );
}

if( current_user_can( 'install_plugins' ) || current_user_can( 'activate_plugins' ) ) {
    new TS_Admin_Notice( array(
        'id' => 'super-blog-pack',
        'notice' => '<strong>Power up your website</strong>! You can now show Post likes, Post views counter, Related posts, Post reviews with 5 star rating system and much more with a few clicks.<br><a href="' . esc_url( $href ) . '" class="thickbox open-plugin-details-modal" target="_blank">Try now for free!</a> or <a href="https://goo.gl/Ywr7L9" target="_blank">Get more details about this plugin.</a>',
        'type' => 'success',
        'dissmiss' => 'cookie',
    ) );
}