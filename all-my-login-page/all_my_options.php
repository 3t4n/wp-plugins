<?php 
Class AMLP {
/* --------------------------------------------*
* Attributes
* -------------------------------------------- */

/** Refers to a single instance of this class. */

private static $instance = null;

/* Saved options */
public $options;

/* --------------------------------------------*
* Constructor
* -------------------------------------------- */

/**
* Creates or returns an instance of this class.
*
* @return AMLP_Theme_Options A single instance of this class.
*/
public static function all_my_get_instance() {

if (null == self::$instance) {
self::$instance = new self;
}

return self::$instance;
}

// end get_instance;

private function __construct() {
// Add the page to the admin menu.
add_action('admin_menu', array(&$this, 'all_my_menu_page'));

// Register javascript.
add_action('admin_enqueue_scripts', array(&$this, 'all_my_enqueue_admin_js'));

// Add function on admin initalization.
add_action('admin_init', array(&$this, 'all_my_options_setup'));

// Call Function to store value into database.
add_action('init', array(&$this, 'all_my_store_in_database'));

// Call Function to delete image.
add_action('init', array(&$this, 'all_my_delete_image'));

// Add CSS rule.
add_action('admin_enqueue_scripts', array(&$this, 'all_my_add_stylesheet'));
}

/* --------------------------------------------*
* Functions
* -------------------------------------------- */

/**
* Function will add option page under Appearance Menu.
*/
public function all_my_menu_page() {
add_menu_page('all_my_login', 'All My Login', 'edit_theme_options', 'media_page', array($this, 'all_my_login'));
}



//Function that will display the options page.

public function all_my_login() {
global $wpdb;
$img_path1 = get_option('all_my_image_logo');
$img_path2 = get_option('all_my_image_background');
$all_my_css = get_option('all_my_css','login.css');
?>
<div class="all-my-wrap">
<div class="all_my_advt_backrgound">
	<div class="all_my_advt1">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Plugin -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6487900944251457"
     data-ad-slot="7199984096"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
</div>

<div class="all_my_form">
	<h1 class="all_my_head">All My Login Page</h1>
<form class="all_my_image" method="post" action="#">
<!-- <h2> <b>Upload your Image from here </b></h2> -->

<div>
<label>Login Page Logo </label>	
<input type="text" name="path1" class="image_path" value="<?php echo $img_path1; ?>" id="all_my_image_path1">
<input type="button" value="Upload New" class="button-primary" id="all_my_upload_image1"/> 
</div>

<div>
<img id="all_my_img_path_1" src="<?php if(! empty($img_path1)){ echo $img_path1 ; }?>">

<input type="submit" name="remove1" value="Remove Image" class="button-secondary" id="all_my_remove_image1"/>
</div>

<div>
<label>Login Page background image</label>	
<input type="text" name="path2" class="image_path" value="<?php echo $img_path2; ?>" id="all_my_image_path2">
<input type="button" value="Upload New" class="button-primary" id="all_my_upload_image2"/> 
</div>


<div>
<img id="all_my_img_path_2" src="<?php if(! empty($img_path2)){ echo $img_path2 ; }?>">
<input type="submit" name="remove2" value="Remove Image" class="button-secondary" id="all_my_remove_image2"/>
</div>
<div>
<label>Custom CSS (Stored in CSS folder of the plugin directory) </label>	
<input type="text" name="all_my_css" class="image_path" value="<?php echo $all_my_css; ?>" id="all_my_css">

</div>




<input type="submit" name="submit" class="save_path button-primary" id="all_my_submit_button" value="Save Setting">

</form>
</div> 


<div class="all_my_advt_backrgound">
	<div class="all_my_advt2">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Plugin -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6487900944251457"
     data-ad-slot="7199984096"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	</div>
</div>


</div>

<?php } 


public function all_my_enqueue_admin_js() {
wp_enqueue_script('media-upload'); //Provides all the functions needed to upload, validate and give format to files.
wp_enqueue_script('thickbox'); //Responsible for managing the modal window.
wp_enqueue_style('thickbox'); //Provides the styles needed for this window.
wp_enqueue_script('script', plugins_url('admin/upload.js', __FILE__), array('jquery'), '', true); //It will initialize the parameters needed to show the window properly.
}

//Function that will add stylesheet file.
public function all_my_add_stylesheet(){
wp_enqueue_style( 'stylesheet', plugins_url( 'admin/stylesheet.css', __FILE__ ));
}

// Here it check the pages that we are working on are the ones used by the Media Uploader.
public function all_my_options_setup() {
global $pagenow;
if ('media-upload.php' == $pagenow || 'async-upload.php' == $pagenow) {
// Now we will replace the 'Insert into Post Button inside Thickbox'
add_filter('gettext', array($this, 'all_my_replace_window_text'), 1, 2);
// gettext filter and every sentence.
}
}


function all_my_replace_window_text($translated_text, $text) {
if ('Insert into Post' == $text) {
$referer = strpos(wp_get_referer(), 'media_page');
if ($referer != '') {
return __('Upload Image', 'all_my');
}
}
return $translated_text;
}

// The Function store image path in option table.
public function all_my_store_in_database(){
if(isset($_POST['submit'])){
$image_path = $_POST['path1'];
update_option('all_my_image_logo', $image_path);
}

if(isset($_POST['submit'])){
$image_path = $_POST['path2'];
update_option('all_my_image_background', $image_path);
}
if(isset($_POST['all_my_css'])){
$all_my_css = $_POST['all_my_css'];
update_option('all_my_css', $all_my_css);
}

}

function all_my_delete_image() {

if(isset($_POST['remove1'])){
global $wpdb;
$img_path1 = $_POST['path1'];

// We need to get the images meta ID.
$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($img_path1) . "' AND post_type = 'attachment'";
$results = $wpdb->get_results($query);

foreach ( $results as $row ) {
wp_delete_attachment( $row->ID ); //delete the image and also delete the attachment from the Media Library.
}
delete_option('all_my_image_logo'); //delete image path from database.
}



if(isset($_POST['remove2'])){
global $wpdb;
$img_path2 = $_POST['path2'];

// We need to get the images meta ID.
$query = "SELECT ID FROM wp_posts where guid = '" . esc_url($img_path2) . "' AND post_type = 'attachment'";
$results = $wpdb->get_results($query);

// And delete it
foreach ( $results as $row ) {
wp_delete_attachment( $row->ID ); //delete the image and also delete the attachment from the Media Library.
}
delete_option('all_my_image_background'); //delete image path from database.
}
}	

}
// End class

AMLP::all_my_get_instance();