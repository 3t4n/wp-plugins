<?php

defined( 'ABSPATH' ) or	die( 'Cheatin\' uh?' );

/**
 * Add submenu in menu "Settings"
 *
 * @since 1.0
 *
 */

add_action( 'admin_menu', 'jlasp_admin_menu' );
function jlasp_admin_menu()
{
	add_options_page( 'Auto Sticky Post', 'Auto Sticky Post', 'manage_options', 'auto-sticky-post', 'jlasp_display_options' );
}


/**
 * Initialization of the form
 * @since 1.0
 *
 *
 */

function jlasp_display_options()
{
?>

	<h2>Auto Sticky Post <small>v<?php echo jlasp_VERSION; ?></small></h2>
	
	<form action="options.php" method="post">
		<?php settings_fields( 'jlasp_general' ); ?>	
		<?php do_settings_sections( 'jlasp_general' ); ?>	
		<?php submit_button(); ?>
	</form>
<?php

}

/**
 * The settings registration
 * @since 1.1.0
 *
 *
 */
add_action('admin_init', 'jlasp_register_setting');
function jlasp_register_setting() {
	register_setting(  
			'jlasp_general',  
			'jlasp_number_post'  
		);
}


/**
 * The main settings page construtor using the required functions from WP
 * @since 1.0
 *
 *
 */
add_action('load-settings_page_auto-sticky-post', 'jlasp_initialize_plugin_options');
function jlasp_initialize_plugin_options()
{
  add_settings_section( 
        'general_settings_section',
        __( 'Options', 'stickyposts' ),
        '__return_false',
        'jlasp_general'
    );

   add_settings_field(   
        'jlasp_number_post', 
        __( 'Number of posts', 'stickyposts'),
        'jlasp_toggle_posts_callback', 
        'jlasp_general', 
        'general_settings_section',
		array( 'type'=>'number', 'label_screen'=>__('Number of posts', 'stickyposts'),'label_for'=>'jlasp_number_post', 'label'=>__('latest posts will be sticked to the homepage', 'stickyposts'), 'name'=>'jlasp_number_post', 'placeholder'=>'3' )		
    );
	
}


/**
 * Used to display fields on settings form
 *
 * @since 1.0
 *
 */
 
function jlasp_toggle_posts_callback($args) {
	if( !is_array( reset( $args ) ) )
	{
		$args = array( $args );
	}
	foreach ($args as $arg) {
		extract( $arg );
		$value = esc_attr( get_option( $name, '' ) );
		$placeholder = isset( $placeholder ) ? 'placeholder="' . esc_attr( $placeholder ) . '" ' : '';
		$name = isset( $name ) ? $name : $label_for;
		$number_options = $type=='number' ? ' min="0" class="small-text"' : '';
		?>
		<legend class="screen-reader-text"><span><?php echo esc_html( $label_screen ); ?></span></legend>
		<label><input type="<?php echo esc_attr( $type ); ?>"<?php echo $number_options; ?> id="<?php echo esc_attr( $label_for ); ?>" name="<?php echo esc_attr( $name ); ?>" value="<?php echo $value; ?>" <?php echo $placeholder; ?>/> <?php echo esc_html( $label ); ?></label>
		<?php
	}
}


/**
 * When our settings are saved: purge, cron, flush, preload!
 *
 * @since 1.0
 *
 */
 
add_action( 'update_option_jlasp_number_post', 'jlasp_update_post_visibility' );