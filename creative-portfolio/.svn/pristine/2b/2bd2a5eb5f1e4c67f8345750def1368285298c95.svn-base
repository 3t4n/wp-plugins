<?php


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
   Panel
*/
add_action('admin_menu', 'pgflio_setup_menu');
 
function pgflio_setup_menu(){

	//Enqueue color picker
	wp_enqueue_style( 'wp-color-picker' );
	//wp_enqueue_script( 'pugfolio-js', get_template_directory_uri().'/myscript.js', array( 'wp-color-picker','jquery' ), false, true );
	wp_enqueue_script( 'pugfolio-js', plugin_dir_url( __FILE__ ) .  'js/pugfolio-admin.js', array( 'wp-color-picker' ), '20151218', true );

	//Create Admin Page
 	$page_title = 'Creative Portfolio';
    $menu_title = 'Creative Portfolio';
    $capability = 'edit_posts';
    $menu_slug = 'Pugfolio';
    $function = 'pgflio_options_page';
    $icon_url = 'dashicons-layout';
    $position = 99;

    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );

    //Create Settings
    $option_group = 'pgflio';

	register_setting( $option_group, 'pgflio_color' );

	// Color Section
	$settings_section = 'pgflio_main';
	$page = 'pgflio';
	add_settings_section( $settings_section, __( 'Settings', 'pgflio' ), '', $page );
	add_settings_field( 'pgflio_color', __('Color Scheme', 'pgflio'), 'pgflio_color_callback', $page, 'pgflio_main' );

	//Shortcode Section
	//add_settings_section( 'pgflio_howto', __( 'How to display the portfolio grid', 'pgflio' ), 'pgflio_shortcode_callback', $page );
}

//Fields Callback
function pgflio_color_callback(){
	echo '<input type="text" name="pgflio_color" class="color-picker" value="' .get_option("pgflio_color") .'"> Select the main color of your website <br>';
}	

//Texts
function pgflio_shortcode_callback() {
	
}


//Page
function pgflio_options_page() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Creative Portfolio- Settings', 'pugfolio' ) ?></h1>
		<form action="options.php" method="post">
			<?php settings_fields( 'pgflio' ); ?>
			<?php do_settings_sections( 'pgflio' ); ?>
			<input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes', 'pugfolio' ); ?>" class="button button-primary" />
			<br/><br/><br/><hr/><br/>
			<h2><?php esc_html_e( 'How to display the Portfolio Grid', 'pugfolio' ); ?></h2>
			<div class="alert" style="border: 1px solid #ccc; padding: 15px; background: #eee;"><p><strong><?php esc_html_e( 'NOTE: You can use the plugin with a page builder like Elementor or King Composer. In this case the Portfolio Element will be displayed as a Widget/Element of the Page builder. Just Drag & Drop the widget and set your options.', 'pugfolio' ); ?></strong></p></div>
			<p><?php esc_html_e( 'To display the portfolio grid on a page/post, use the [pugfolio] shortcode. You can customize it using these options:', 'pugfolio' ); ?></p>
			<code>[pugfolio]</code>
			<p><?php esc_html_e( 'You can customize it using these options:', 'pugfolio' ); ?></p>
				<ul>
					<li><strong><?php esc_html_e('postsperpage'); ?></strong>: <?php esc_html_e( 'Set a number of posts to show', 'pugfolio' ); ?> <i>(eg: postsperpage="12").</i></li>
					<li><strong><?php esc_html_e('type' ); ?></strong>: <?php esc_html_e( 'Set it to yes if you want to show a specific portfolio category. Options: ', 'pugfolio' ); ?>  <i>yes/no. (eg: type="yes")</i>.</li>
					<li><strong><?php esc_html_e('taxonomy'); ?></strong>: <?php esc_html_e( 'Set the specific taxonomy slug. You need to set type="yes" to use this feature.', 'pugfolio' ); ?>  <i>(eg: taxonomy="print")</i>.</li>
					<li><strong><?php esc_html_e('showfilter' ); ?></strong>: <?php esc_html_e( 'Show the category filter on the top of the grid. Options: ', 'pugfolio' ); ?>  <i> yes/no. (eg: showfilter="yes")</i>.</li>
					<li><strong><?php esc_html_e('style'); ?></strong>: <?php esc_html_e( 'Set the grid style of the portfolio. Options: ', 'pugfolio' ); ?>  <i> masonry/box. (eg: style="box")</i>.</li>
					<li><strong><?php esc_html_e('linkto'); ?></strong>: <?php esc_html_e( 'Set the link type of the portfolio item. If is set to image, it will open the Featured Image on a lightbox. Options: ', 'pugfolio' ); ?>  <i> image/project. (eg: linkto="image")</i>.</li>
					<li><strong><?php esc_html_e('columns'); ?></strong>: <?php esc_html_e( 'Set the columns per row of the portfolio grid.  Options: ', 'pugfolio' ); ?>  <i> 2/3/4. (eg: columns="4")</i>.</li>
					<li><strong><?php esc_html_e('margin'); ?></strong>: <?php esc_html_e( 'Choose if you want a margin between the items or no.  Options: ', 'pugfolio' ); ?>  <i> yes/no. (eg: margin="no")</i>.</li>
				</ul>
			<h3><?php esc_html_e( 'Example of a complete shortcode:', 'pugfolio' ); ?></h3>
			<code>[pugfolio postsperpage="12" type="no" showfilter="yes" style="masonry" linkto="image" columns="4" margin="no"]</code>		
			<h3><?php esc_html_e( 'Example of a complete shortcode without the set properties:', 'pugfolio' ); ?></h3>
			<code>[pugfolio postsperpage="" type="" taxonomy="" showfilter="" style="" linkto="" columns="" margin=""]</code>				
		</form>
	</div>
	<div>
		
	</div>
<?php
}