<?php /**
 * @version 1.1
 * @package Any
 * @category Toolbar. Flex UI Elements for Admin Panel,  that  does not use BootStrap
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2019-12-30
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit, if accessed directly


/**
 * CSS files loading
 *
 * @param string $where_to_load
 */
function oper_flex_toolbar_enqueue_css_files( $where_to_load ) {

	if ( ( is_admin() ) && ( in_array( $where_to_load, array( 'admin', 'both' ) ) ) ) {

		wp_enqueue_style( 'oper-flex-toolbar', oper_plugin_url( '/core/flex-ui/_src/css/flex-ui-toolbar.css' ), array(), OPER_VERSION_NUM );
	}
}
add_action( 'oper_enqueue_css_files', 'oper_flex_toolbar_enqueue_css_files', 50 );

////////////////////////////////////////////////////////////////////////////////
//  Navigation Toolbar Tabs
////////////////////////////////////////////////////////////////////////////////

function oper_flex_toolbar_sub_html_container_start( $page = 'oper-flex-toolbar',  $attr = array() ) {

	$defaults = array(
						'class' => ''
	);
	$attr   = wp_parse_args( $attr, $defaults );
                                                                            // S U B    T A B S     or      U I  elements
	?>
	<div class="clear"></div>
	<div
		<?php
		foreach ( $attr as $tag_name => $tag_value ) {

			if ( 'class' == $tag_name ) {
				$tag_value = 'oper_ui_flex_toolbar_container ' . $tag_value;
			}

			echo ' ' . $tag_name . '="' . str_replace( '"', '', $tag_value ) . '" ';
		}
		?>
	>
	<?php
		do_action( 'oper_flex_toolbar_start' , $page );     // Load functionality in Addons
}

function oper_flex_toolbar_sub_html_container_end( $page = 'oper-flex-toolbar' ) {

		do_action( 'oper_flex_toolbar_end', $page );		// Load functionality in Addons
	?>
	</div><!-- oper_ui_flex_toolbar_container -->
	<div class="clear"></div>
	<?php
}


function oper_flex_toolbar_group_start( $attr = array() ){

	$defaults = array(
						'class' => ''
	);
	$attr   = wp_parse_args( $attr, $defaults );

	?><div
			<?php
			foreach ( $attr as $tag_name => $tag_value ) {

				if ( 'class' == $tag_name ) {
					$tag_value = 'ui_toolbar_group ' . $tag_value;
				}

				echo ' ' . $tag_name . '="' . str_replace( '"', '', $tag_value ) . '" ';
			}
			?>
	><?php

}


function oper_flex_toolbar_group_end() {

	?></div><!-- ui_toolbar_group --><?php

}