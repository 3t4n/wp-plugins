<?php
/**
 * Plugin Name:       GL Import External Images
 * Plugin URI:        https://greenlifeit.com/plugins
 * Description:       Import and insert images to WordPress Media Library from external URLs.
 * Version:           3.1
 * Author:            Asiqur Rahman
 * Author URI:        https://asique.net
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gl-import-external-images
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

add_action( 'post-upload-ui', 'gliei_upload_form' );
function gliei_upload_form() {
	?>
	<div class="gliei-wrap" style="text-align: center;">
		<div class="gliei-input">
			<div style="margin-bottom: 15px;">or</div>
			<h2 class="upload-instructions">Insert Media from URL</h2>
			<input name="url" type="url" class="gliei-url" placeholder="<?php _e( 'Image URL...', 'gl-import-external-images' ); ?>" style="width: 300px;" autocomplete="off">
		</div>
		<div class="gliei-submit" style="margin-top: 15px;">
			<input type="hidden" name="gliei_nonce" class="gliei_nonce" value="<?php echo wp_create_nonce( 'gliei' ); ?>">
			<button type="button" class="gliei-submit-btn button-primary">
				<?php _e( 'Add to Media Library', 'gl-import-external-images' ); ?>
			</button>
			<div class="gliei-message" style="max-width: 300px; margin: 15px auto 0;"></div>
		</div>
	</div>
	<script>
		var gliei_import_image = function ( event ) {
			event.preventDefault();
			
			let wrap = event.target.closest( '.gliei-wrap' );
			
			var urlInput = wrap.querySelector( '.gliei-url' );
			if ( urlInput.value.length == 0 ) {
				alert( '<?php _e( 'Please add a URL', 'gl-import-external-images' ); ?>' );
				return false;
			}
			
			var message = wrap.querySelector( '.gliei-message' );
			message.classList = 'gliei-message';
			message.innerHTML = '<img src="<?php echo includes_url( 'images/spinner.gif' ); ?>" alt="Importing...">';
			
			var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
			var xhttp = new XMLHttpRequest();
			
			var formData = new FormData();
			formData.append( 'action', 'gliei_action' );
			formData.append( 'url', urlInput.value );
			formData.append( 'gliei_nonce', wrap.querySelector( '.gliei_nonce' ).value );
			
			xhttp.open( "POST", ajaxurl );
			xhttp.send( formData );
			
			xhttp.onreadystatechange = function () {
				if ( this.readyState === 4 && this.status === 200 ) {
					var data = JSON.parse( this.responseText );
					if ( data.success === true ) {
						message.classList.add( 'updated' );
						if ( window.location.href.indexOf( 'media-new.php' ) !== - 1 ) {
							let edit_url = '<?php echo admin_url( 'post.php?action=edit&post=' ); ?>' + data.image;
							data.data += ' <a href="' + edit_url + '" target="_blank"><?php _e( 'Edit Media', 'gl-import-external-images' ); ?></a>';
						}
						message.innerHTML = data.data;
						urlInput.value = '';
						
						// refresh media content
						if ( wp.media.frame.content.get() !== null ) {
							wp.media.frame.content.mode( 'browse' ).get().collection.props.set( {
								ignore: (
									+ new Date()
								)
							} );
							wp.media.frame.state().get( 'selection' ).add( wp.media.attachment( data.image ) );
						} else {
							wp.media.frame.library.props.set( {
								ignore: (
									+ new Date()
								)
							} );
						}
					} else {
						message.classList.add( 'error' );
						message.innerHTML = data.data;
					}
				}
			};
		}
		
		document.querySelectorAll( '.gliei-submit-btn' ).forEach( function ( gliei_btn ) {
			gliei_btn.addEventListener( 'click', gliei_import_image );
		} );
		
		document.querySelectorAll( '.gliei-url' ).forEach( function ( gliei_input ) {
			gliei_input.addEventListener( 'keypress', function ( event ) {
				if ( event.keyCode === 13 ) {
					gliei_import_image( event );
				}
			} );
		} );
	</script>
	<?php
}

add_action( 'wp_ajax_gliei_action', 'gliei_import_image' );
function gliei_import_image() {
	if ( ! wp_verify_nonce( $_POST['gliei_nonce'], 'gliei' ) ) {
		wp_send_json_error( __( 'You don\'t have permission to upload image', 'gl-import-external-images' ) );
		wp_die();
	}
	
	if ( isset( $_POST['url'] ) ) {
		add_filter( 'image_sideload_extensions', function ( $accepted_extensions ) {
			$mime_types = get_allowed_mime_types();
			
			foreach ( $mime_types as $ext => $mime_type ) {
				if ( str_starts_with( $mime_type, 'image/' ) ) {
					$accepted_extensions = array_merge( $accepted_extensions, explode( '|', $ext ) );
				}
			}
			
			return $accepted_extensions;
		} );
		
		$image = media_sideload_image( esc_url( $_POST['url'] ), null, null, 'id' );
		if ( is_wp_error( $image ) ) {
			wp_send_json_error( $image->get_error_message() );
		} else {
			wp_send_json( array( 'success' => true, 'data' => __( 'Import Successful.', 'gl-import-external-images' ), 'image' => $image ) );
		}
	} else {
		wp_send_json_error( __( 'No URL found!', 'gl-import-external-images' ) );
	}
	
	wp_die();
}


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_gl_import_external_images() {
	if ( ! class_exists( 'Appsero\Client' ) ) {
		require_once __DIR__ . '/lib/appsero/src/Client.php';
	}
	
	$client = new Appsero\Client( '448732d0-52eb-41d9-b41c-8931eb5e4897', 'GL Import External Images', __FILE__ );
	
	// Active insights
	$client->insights()->init();
}

appsero_init_tracker_gl_import_external_images();

