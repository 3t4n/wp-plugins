<?php 
global $mg_options;	
$mg_options = get_option( 'mg_options' );
 
// Add a menu for our option page
add_action('admin_menu', 'mobile_gallery_add_page');
function mobile_gallery_add_page() {
	add_options_page( 'Mobile Gallery', 'Mobile Gallery', 'manage_options', 'mobile_gallery', 'mobile_gallery_option_page' );
}

function load_pg_admin_scripts() {
	global $mg_options;	
	wp_enqueue_script( 'jquery'); 
	wp_register_script( 'mobile-gallery-admin', plugins_url( 'js/mobile-gallery-admin.js', __FILE__ ), false, $mg_options['version'], true); 
	wp_enqueue_script( 'mobile-gallery-admin' );
	wp_register_style( 'mobile-gallery-admin', plugins_url( 'css/mobile-gallery-admin.css', __FILE__ ), false, $mg_options['version'], 'screen' ); 
	wp_enqueue_style( 'mobile-gallery-admin' );
}
if ( isset( $_GET['page'] ) && $_GET['page'] == "mobile_gallery" ) {
	add_action('init','load_pg_admin_scripts');
}

// Draw the option page
function mobile_gallery_option_page() {

$mg_options = get_option( 'mg_settings' );

// set up some defaults if these fields are empty
?>
	<div class="wrap">
	
	
	<div class="updated fade">
	    <p style="line-height: 1.4em;">Thanks for downloading Mobile Gallery! If you like it, please be sure to give us a positive rating in the <a href="http://wordpress.org/extend/plugins/mobile-gallery/">WordPress repository</a>, it means a lot to us.</p>
	  	<p style="line-height: 1.4em;">If you like Mobile Gallery but need more advanced mobile image features, check out our premium version of this plugin, <a href="http://madebyraygun.com/wordpress/plugins/mobile-gallery-pro">Mobile Gallery Pro</a>.</p>
	  </div>
	
	
		<?php screen_icon(); ?>
		<h2>Mobile Gallery</h2>
		
		<form action="options.php" method="post">
			<?php settings_fields('mg_options'); ?>
			<?php do_settings_sections('mobile_gallery'); ?>
			
			<h3>Instructions</h3>
			<table class="form-table"><tr><td>
			<p>This plugin attaches a PhotoSwipe-powered mobile slideshow to the built-in WordPress <code>[gallery]</code> shortcode. To use the plugin, simply upload images to your post or page and click the "Insert Gallery" button. Make sure your gallery images link to the image files and not the attachment pages. The shorcode will look like <code>[gallery link=file]</code>. That's all there is to it! The plugin will take care of the rest.
			
			
			</td></tr></table>
			
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
		


		<a href="http://madebyraygun.com"><img style="margin-top:30px;" src="<?php echo plugins_url( 'img/logo.png', __FILE__ );?>" width="80" alt="Made by Raygun" /></a>
		<p>You're using Mobile Gallery, made by <a href="http://madebyraygun.com">Raygun</a>. Check out our <a href="http://madebyraygun.com/wordpress/" target="_blank">other plugins</a>, and if you have any problems, stop by our <a href="http://madebyraygun.com/support/forum/" target="_blank">support forum</a>!</p>
		</div>
	<?php
}

// Register and define the settings
add_action('admin_init', 'mobile_gallery_admin_init');

function mobile_gallery_admin_init(){

	global $gallery_style_options;

	register_setting(
		'mg_options',
		'mg_options',
		'mobile_gallery_validate_options'
	);

	add_settings_section(
		'mobile_gallery_basic_settings',
		'Gallery Options',
		'mobile_gallery_section_text',
		'mobile_gallery'
	);

	
add_settings_field(
	'mobile_gallery_add_to_front',
	'Enable mobile slideshow <span class="vtip" title="If you use the [gallery] shortcode on your site, this option will attach the PhotoSwipe library">?</span>',
	'mobile_gallery_index_add_to_front_input',
	'mobile_gallery',
	'mobile_gallery_basic_settings'
);

}

// Draw the section header
function mobile_gallery_section_text() {
}

// Display and fill the form fields


function mobile_gallery_index_add_to_front_input() {
	$mg_options = get_option( 'mg_options' );?>
	
	<input type="checkbox" name="mg_options[add_to_front]" value="true" <?php checked( "true", $mg_options['add_to_front'] ); ?> />
<?php }

// Validate user input
function mobile_gallery_validate_options( $input ) {
		
	if ( ! isset( $input['add_to_front'] ) )
	  $input['add_to_front'] = null;
	$input['add_to_front'] = ( $input['add_to_front'] == "true" ? "true" : "false" );	

	return $input;
		
}
