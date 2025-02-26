<?php
/*
Plugin Name: Pin It! Button
Plugin URI: http://www.iamdangavin.com
Description: Displays a Pin It button directly over your images, with the option to upload your own image.
Author: Dan Gavin
Author URI: http://www.iamdangavin.com
Version: 0.3.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define("PIBPIN_PATH", WP_PLUGIN_URL . "/" . plugin_basename( dirname(__FILE__) ) . "/" );
define("PIBPIN_NAME", "Pinterest Pin It button for images");
define("PIBPIN_VERSION", "0.3.1");

/* =Save Options
-------------------------------------------------------------- */

function pib_get_default_options() {
	$options = array(
		'pinbutton' => '',
		'nofade' => ''
	);
	return $options;
}
function pib_options_init() {
	$pib_options = get_option( 'pib_button_options' );
	 
	 // Are our options saved in the DB?
	if ( false === $pib_options ) {
		// If not, we'll save our default options
		$pib_options = pib_get_default_options();
		add_option( 'pib_button_options', $pib_options );
	}
	 
     // In other case we don't need to update the DB
}
// Initialize Theme options
add_action( 'after_setup_theme', 'pib_options_init' );


/* =Options Page
-------------------------------------------------------------- */
function pib_menu_options() {
	//add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function);
     add_options_page('Pin it!', 'Pin it!', 'edit_theme_options', 'pib-settings', 'pib_admin_options_page');
}
// Load the Admin Options page
add_action('admin_menu', 'pib_menu_options');

function set_plugin_meta($links, $file) {
	$plugin = plugin_basename(__FILE__);
	// create link
	if ($file == $plugin) {
		$pib_settings = 'pib-settings';
		return array_merge(
			$links,
			array( sprintf( '<a href="options-general.php?page=pib-settings">Settings</a>', $plugin, __('Settings') ) )
		);
	}
	return $links;
}
add_filter( 'plugin_row_meta', 'set_plugin_meta', 10, 2 );

function pib_admin_options_page() {
?>
<div class="wrap pinterest-panels">
		<div id="icon-options-general" class="icon32"><br/></div>
			<h2><?php _e('Pin It Settings', 'pinit') ?></h2>
			<div class="container">
			<div class="pinterest-logo"><p>Pin It! Version <?php echo PIBPIN_VERSION; ?></p></div>   		
			<h3>Custom Pinterest Pin It Button</h3>
			<p class="about-description">Below, you will be able to upload your own custom image to be used as your fancy new Pinterest Pin It button! The button/link will be added to all of your images site-wide within the content editor. It even supports the Align Left, Center, Right classes placed on your images!</p>
			<div class="pib-column-container">
			
			<form enctype="multipart/form-data" method="post" action="options.php">		
    		
    		<div class="tool-box pib-column pib-column-1">	
				<h4><span class="icon16 icon-settings"></span><?php _e('Upload Image', 'pib'); ?></h4>
						<div id="upload-image">
							<?php
							settings_fields('pib_button_options'); 
							$pib_options = get_option( 'pib_button_options' ); 
							?>
							<input type="text" id="button_url" size="26" name="pib_button_options[pinbutton]" value="<?php echo esc_url( $pib_options['pinbutton'] ); ?>" />
							<input id="upload-pib-button" type="button" class="button" value="<?php _e( 'Upload Image', 'pub' ); ?>" /><br/>
							<span class="description"><?php _e('Upload an image for the button & hit the <strong>Instert into Post</strong> button', 'pib' ); ?></span>
						</div>
					
			</div><!-- .tool-box -->
			<div class="tool-box pib-column">	    		
					<h4><span class="icon16 icon-media"></span><?php _e('Pin It Preview', 'pib'); ?></h4>
					<p>Rollover image placeholder to preview your Pin It button!</p>
					<div class="pin-it-preview">
					  	<?php
						$button = get_option( 'pib_button_options' ); 
						if (!empty($button['pinbutton'])) :
							$button = get_option( 'pib_button_options' );
							$pinit = $button['pinbutton'];
						else :
							$pinit = PIBPIN_PATH .'images/pib-pinterest.png';
						endif;
						?>
						<div class="pib-pinterest"><a href="#" onclick="return false;" class="pib-pin"><img src="<?php echo $pinit; ?>" /></a>
							<img src="http://placehold.it/300x200" />
						</div>
					</div>

			</div><!-- .tool-box -->
			<div class="tool-box pib-column panel-last">
					<h4><span class="icon16 icon-settings"></span><?php _e('Pin It CSS', 'pib'); ?></h4>
					<p>Default CSS Selectors. These can be overwritten in your themes stylsheet.</p>
					<p><strong>Disable the fade in/out on the button?</strong> <input type="checkbox" id="pib_button_options[nofade]" size="26" name="pib_button_options[nofade]" value="1"<?php checked( isset( $button['nofade'] ) ); ?> />
</p>
					<pre><code>.pib-pinterest > .pib-pin { }</code>
<code>.pib-pinterest > .pib-pin{ }</code>
<?php if($button['nofade'] != '1') { ?>
<code>.pib-pinterest:hover > .pib-pin { }</code>
<?php } ?>
<code>.pib-pinterest{ }</code>

<code>/* Alignment */</code>
<code>div.alignleft.pib-pinterest,</code>
<code>div.alignright.pib-pinterest,</code>
<code>div.aligncenter.pib-pinterest { }</code></pre>
			</div><!-- .tool-box -->
			
			<div id="save-changes">
				<p>
					<input name="pib_button_options[submit]" id="submit_options_form" type="submit" class="button-primary" value="<?php esc_attr_e('Save Settings', 'pib'); ?>" />  
					<?php if ( '' != $pib_options['pinbutton'] ): ?>
						<input id="delete-pib-button" name="pib_button_options[delete_button]" type="submit" class="button" value="<?php _e( 'Remove Image', 'pib' ); ?>" />
					<?php endif; ?>						</p>
			</div>
			</form><!-- END FORM -->	
			</div><!-- .pib-column-container -->
			
			</div><!-- .container -->
</div><!-- .wrap -->

<?php
}

function pib_options_validate( $input ) {
	$default_options = pib_get_default_options();
	$valid_input = $default_options;
	
	$pib_options = get_option('pib_button_options');
	
	$submit = ! empty($input['submit']) ? true : false;
	$reset = ! empty($input['reset']) ? true : false;
	$delete_button = ! empty($input['delete_button']) ? true : false;
	
	if ( $submit ) {
		if ( $pib_options['pinbutton'] != $input['pinbutton']  && $pib_options['pinbutton'] != '' )
			delete_image( $pib_options['pinbutton'] );
		
		$valid_input['pinbutton'] = $input['pinbutton'];
		$valid_input['nofade'] = $input['nofade'];
	}
	elseif ( $reset ) {
		delete_image( $pib_options['pinbutton'] );
		$valid_input['pinbutton'] = $default_options['pinbutton'];
	}
	elseif ( $delete_pinbutton ) {
		delete_image( $pib_options['pinbutton'] );
		$valid_input['pinbutton'] = '';
	}
	
	return $valid_input;
}
function delete_image( $image_url ) {
	global $wpdb;
	
	// We need to get the image's meta ID..
	$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($image_url) . "' AND post_type = 'attachment'";  
	$results = $wpdb -> get_results($query);

	// And delete them (if more than one attachment is in the Library
	foreach ( $results as $row ) {
		wp_delete_attachment( $row -> ID );
	}	
}

/* =Necessary Scripts and CSS
-------------------------------------------------------------- */

function pib_options_enqueue_scripts() {
	wp_register_script('pib-upload', PIBPIN_PATH.'js/admin.js', array('jquery','media-upload','thickbox'));

	if(isset($_GET['page']) && $_GET['page'] == 'pib-settings') {
		wp_enqueue_script('jquery');
		
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
		
		wp_enqueue_script('media-upload');
		wp_enqueue_script('pib-upload');
		
	}
	
}
add_action('admin_enqueue_scripts', 'pib_options_enqueue_scripts');

function pib_admin_css(){
	if(isset($_GET['page']) && $_GET['page'] == 'pib-settings') {
		wp_enqueue_style('pib-admin', PIBPIN_PATH.'css/pib-admin.css'); 
	}
}
add_action('admin_head', 'pib_admin_css');


/* =Settings
-------------------------------------------------------------- */
function pib_options_settings_init(){
	register_setting( 'pib_button_options', 'pib_button_options', 'pib_options_validate' );
	// Add a form section for the Logo
	// Add a form section for the Logo
	add_settings_section('pib_settings_header', NULL, NULL, 'pinit');
	
}
add_action( 'admin_init', 'pib_options_settings_init' );

function pib_css() {
?>
<style type="text/css" media="all">
.pib-pinterest img{
	margin: 0;
}
.pib-pinterest > .pib-pin {
	z-index: 10;
	margin: 0;
	position: absolute;
	top: 20px;
	left: 0px;
<?php $pib_options = get_option( 'pib_button_options' ); ?>
<?php if($pib_options['nofade'] != '1'){ ?>
	opacity: 0;
	-webkit-transition: opacity 0.5s linear;
	-moz-transition: 	opacity 0.5s linear;
	-ms-transition: 	opacity 0.5s linear;
	-o-transition: 		opacity 0.5s linear;
	transition: 		opacity 0.5s linear;
<?php } ?>	
}
.pib-pinterest > .pib-pin{
	max-width: 50%;
}
<?php if($pib_options['nofade'] != '1'){ ?>
.pib-pinterest:hover > .pib-pin {	
	opacity: 1;
	-webkit-transition-delay:	0s;
	-moz-transition-delay:		0s;
	-o-transition-delay: 		0s;
	transition-delay: 			0s;
}
<?php } ?>
.pib-pinterest{
	position: relative;
	width: auto;
}

/* Alignment */
span.alignleft.pib-pinterest, 
span.alignright.pib-pinterest, 
span.aligncenter.pib-pinterest {
	margin-bottom: 1.625em;
}
<?php
// Check to see if Twenty Eleven 
// is active to account for padding
$theme_name = get_current_theme();
if($theme_name = 'Twenty Eleven') :
?>
/* TwentyEleven Padding */
span.alignleft.pib-pinterest,
span.aligncenter.pib-pinterest{
	padding: 0 7px 7px 0;
}
span.alignright.pib-pinterest{
	padding: 0 0 7px 7px;
}
<?php endif; ?>

</style>
<?php
}
add_action( 'wp_head', 'pib_css' );
add_action( 'admin_head', 'pib_css' );


// Where the magic happens!
// Run our function to add the button to images

function pib_pinterest_run($content) {
	global $post;

	$button = get_option( 'pib_button_options' );
	if (!empty($button['pinbutton'])) :
		$pinit = $button['pinbutton'];
	else :
		$pinit = PIBPIN_PATH .'images/pib-pinterest.png';
	endif;
	
	$posturl = urlencode(get_permalink()); //Get the post URL
	$sitetitle = get_bloginfo('name');
	
	$unlinked = '/<img class="(.*?)" title="(.*?)" src="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?) width="(.*?)" height="(.*?)" \/>/i';
  	$replacement = '<span class="$1 pib-pinterest" style="width: $6px; height: auto;"><a href="#" onclick=\'window.open("http://pinterest.com/pin/create/button/?url='.$posturl.'&media=$3.$4&description='.$sitetitle.' - '.$posturl.'","Pinterest","scrollbars=no,menubar=no,width=600,height=380,resizable=yes,toolbar=no,location=no,status=no");return false;\' class="pib-pin"><img src="'.$pinit.'" /></a><img class="$1" title="$2" src="$3.$4" $5 width="$6" height="auto" /></span>';
  	
	$content = preg_replace( $unlinked, $replacement, $content );
	
	$linked = '/<a(.*?)><span(.*?)>(.*?)<img class="(.*?)" title="(.*?)" src="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?) width="(.*?)" height="(.*?)" \/><\/span><\/a>/i';
  	$replacement = '<span class="$4 pib-pinterest" style="width: $9px; height: auto;"><a href="#" onclick=\'window.open("http://pinterest.com/pin/create/button/?url='.$posturl.'&media=$6.$7&description='.$sitetitle.' - '.$posturl.'","Pinterest","scrollbars=no,menubar=no,width=600,height=380,resizable=yes,toolbar=no,location=no,status=no");return false;\' class="pib-pin"><img src="'.$pinit.'" /></a><a$1><img class="$4" title="$5" src="$6.$7" $8 width="$9" height="auto" /></a></span>';
  	
	$content = preg_replace( $linked, $replacement, $content );

	// Fixed link issue

	return $content;
}

if (!is_admin()) {
	add_filter('the_content', 'pib_pinterest_run');
}

