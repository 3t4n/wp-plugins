<?php
/**
 * @package  Code Mirror
 * @description  HTML Forms with  highlighting Syntax
 *
 * Author: wpdevelop, oplugins
 * @link http://oplugins.com/
 * @email info@oplugins.com
 *
 * @version 1.0
 * @modified 2019-04-10
 */


if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly

// https://make.wordpress.org/core/tag/codemirror/

// General Init Class
final class OPER_CodeMirror {

    static private $instance = NULL;											// Define only one instance of this class


	/** Get only one instance of this class
	 *
	 * @return class OPER_CodeMirror
	 */
	public static function init() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof OPER_CodeMirror ) ) {

			self::$instance = new OPER_CodeMirror;

			// JS & CSS
			add_action( 'oper_enqueue_js_files',  array( self::$instance, 'oper_js_load_files' ),     50  );
			add_action( 'oper_enqueue_css_files', array( self::$instance, 'oper_enqueue_css_files' ), 50  );

			// // Ajax Handlers.		Note. "locale_for_ajax" recehcked in oper-ajax.php
			// add_action( 'wp_ajax_'		    . 'OPER_CODEMIRROR', array( self::$instance, 'oper_ajax_' . 'OPER_CODEMIRROR' ) );	// Admin & Client (logged in usres)
			// add_action( 'wp_ajax_nopriv_' . 'OPER_CODEMIRROR', array( self::$instance, 'oper_ajax_' . 'OPER_CODEMIRROR' ) );	    // Client         (not logged in)
		}

		return self::$instance;
	}


	/** JSS */
	public function oper_js_load_files( $where_to_load ) {

		$in_footer = true;

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			if ( ! function_exists( 'wp_enqueue_code_editor' ) ) {
				return;
			}

		    $oper_ce_settings = wp_enqueue_code_editor( array( 'type' => 'text/html' ) );

		    // Bail if user disabled CodeMirror.
		    if ( false === $oper_ce_settings ) {
		        return;
		    }

		    wp_localize_script( 'oper-global-vars', 'oper_ce_settings', $oper_ce_settings );

			//FixIn: 2.0.1.3
			if ( ! wp_script_is( 'wp-theme-plugin-editor', 'registered' ) ) {
				wp_enqueue_script( 'wp-theme-plugin-editor' );
			}


			wp_enqueue_script( 'oper-codemirror'
							 , trailingslashit( plugins_url( '', __FILE__ ) ) . 'codemirror.js'         /* oper_plugin_url( '/src/js/codemirror.js' ) */
							 , array( 'oper-global-vars' ), '1.1', $in_footer );
		}
	}


	/** CSS */
	public function oper_enqueue_css_files( $where_to_load ) {

		if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

			wp_enqueue_style( 'wp-codemirror' );

			wp_enqueue_style( 'oper-codemirror'
							, trailingslashit( plugins_url( '', __FILE__ ) ) . 'codemirror.css'         /* oper_plugin_url( '/src/css/codemirror.css' ) */
							, array(), OPER_VERSION_NUM );
		}
	}


	/**
	 *  Define Textarea elements,  where we need to  define CodeMirror for HTML editing.
	 *
	 * @param $params    array(
									'textarea_id' => '#oper_add_form_html',
									'preview_id'   => '#oper_add_form_html_preview'    (Optional)
								)
	 *
	 * Example of usage:
     *                     oper_codemirror()->set_codemirror( array( 'textarea_id' => '#oper_add_form_html', 'preview_id'   => '#oper_add_form_html_preview' ) )
	 */
	public function set_codemirror( $params ) {

		$defaults = array(
							'textarea_id' => '#oper_add_form_html',
							'preview_id'  => false
		);
		$params   = wp_parse_args( $params, $defaults );


		?>
		<script type="text/javascript">
			jQuery( document ).ready( function (){

				OPER_CM.init_codemirror( {
											textarea_id : '<?php echo $params['textarea_id']; ?>'
											<?php
											if ( false !== $params['preview_id'] ) {
												echo ", preview_id: '{$params['preview_id']}'";
											}
											?>
										}
										, oper_ce_settings
				);
			} );
		</script>
		<?php
	}
}


function oper_codemirror() {
    return OPER_CodeMirror::init();
}
oper_codemirror();																	// Run


/**
 * Integration for oProjects:
 *
 * 1) Replace Instruction:
 *
          'email-reminders'       -> 'pluginnamelocale'
		  _oper_          ->  _bk_ (...)       in get_opcm_option ....
		   OPER           ->  PREFIX
		   oper           ->  prefix
 *
 *
 *  2) Add:
 * 		require_once( OPER_PLUGIN_DIR . '/includes/codemirror/class-codemirror.php' );			// Code Mirror - HTML Forms with  highlighting Syntax
 */


/**
 * Example of Usage:
 *
 * 1) oper_codemirror()->set_codemirror( array( 'textarea_id' => '#oper_add_form_html', 'preview_id'   => '#oper_add_form_html_preview' ) )
 *
 * 2)
 *
 	$oper_add_form_html = get_oper_option( 'oper_add_form_html' );

	?><textarea id="oper_add_form_html" name="oper_add_form_html" style="width:100%;height:200px;"><?php

		echo( ! empty( $oper_add_form_html ) ? esc_textarea( $oper_add_form_html ) : '' );

	?></textarea><?php
	oper_codemirror()->set_codemirror( array(
										'textarea_id' => '#oper_add_form_html'
										, 'preview_id'   => '#oper_add_form_html_preview'
	) );

	/**
	* Example of Reseting CM form:
	?>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			OPER_CM.set_codemirror_value( '#oper_add_form_html', 'This Form Was reseted !!!')
		});
	</script>
	<?php
 */