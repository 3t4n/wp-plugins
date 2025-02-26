<?php
/*
Plugin Name: Custom Ads Widget
Plugin URI: http://wordpress.org/extend/plugins/custom-ads-sidebar/
Description: To display your image ads appear in sidebar. || <a href="plugins.php?page=adssidebar-options"><b>Options</b></a> || <a href="http://www.liemmp.com/?p=295"><b>Tutorials</b></a>
Version: 1.0.4
Author: Rhino Liêm
Author URI: http://www.liemmp.com
*/

// Reg widget
class custom_ads_sidebar {
   
   function display() {
   global $post;

	if( get_post_meta($post->ID, 'custom_ads_sidebar', true) ){
    		echo '' . get_post_meta($post->ID, 'custom_ads_sidebar', $single = true) .'';
    		}
    	else{
    echo "<a href='";
    echo get_option('adssidebar_adside_link');
    echo "'>";
    echo "<img src='";
    echo get_option('adssidebar_adside_image');
    echo "' ";
    echo "width='";
    echo get_option('adssidebar_adside_width');
    echo "'>";
    echo "</a>";
}
   }
}
register_sidebar_widget('Custom Ads', array('custom_ads_sidebar', 'display'));
// End Reg widget 

// Post custom ads
$new_meta_boxes = array(

  "custom_ads_sidebar" => array(
	  "name" => "custom_ads_sidebar",
	  "std" => "",
	  "title" => "Put your ads code",
	  "description" => "Put your <b>html code</b> for your ads to display in single post.<br><b>Note:</b> Don't worrry if your code will be not appear here. They will display in sidebar, where you put widget.")
);

function new_meta_boxes() {
  global $post, $new_meta_boxes;

  foreach($new_meta_boxes as $meta_box) {
    $meta_box_value = get_post_meta($post->ID, $meta_box['name'], true);

    if($meta_box_value == "")
      $meta_box_value = $meta_box['std'];

    echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

    echo'<label style="font-weight: bold; display: block; padding: 5px 0 2px 2px" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
    echo'<input type="text" name="'.$meta_box['name'].'" size="175" /><br />';

    echo'<p><label for="'.$meta_box['name'].'">'.$meta_box['description'].'</label></p>';
	echo'You should use HTML code like that:<br>';
	echo'<b>Image ads: </b>&lt;a href="http://www.your-ads-url.com"&gt;&lt;img src="http://www.your-ads-url.com/your-ads-folder/your-ads.jpg"&gt;&lt;/a&gt;<br>';
	echo'<b>Texlink ads: </b>&lt;a href="http://www.your-ads-url.com"&gt;Text link ads&lt;/a&gt;<br>';
  }
}

function create_meta_box() {
  global $theme_name;
  if ( function_exists('add_meta_box') ) {
    add_meta_box( 'new-meta-boxes', 'Custom Ads Code box', 'new_meta_boxes', 'post', 'normal', 'high' );
  }
}

function save_postdata( $post_id ) {
  global $post, $new_meta_boxes;

  foreach($new_meta_boxes as $meta_box) {
  // Verify
  if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
    return $post_id;
  }

  if ( 'page' == $_POST['post_type'] ) {
  if ( !current_user_can( 'edit_page', $post_id ))
    return $post_id;
  } else {
  if ( !current_user_can( 'edit_post', $post_id ))
    return $post_id;
  }

  $data = $_POST[$meta_box['name']];

  if(get_post_meta($post_id, $meta_box['name']) == "")
    add_post_meta($post_id, $meta_box['name'], $data, true);
  elseif($data != get_post_meta($post_id, $meta_box['name'], true))
    update_post_meta($post_id, $meta_box['name'], $data);
  elseif($data == "")
    delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));
  }
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');
// Post custom ads

function adssidebar_admin_menu(){
if (function_exists('add_submenu_page') ) {
add_submenu_page('plugins.php', __('Custom Ads widget'), __('Custom Ads widget'),'manage_options' , 'adssidebar-options','adssidebar_options');
}
}


function adssidebar_imageandlink(){


$adside_image_default = "/wp-content/plugins/custom-ads-sidebar/image/custom-ads-sidebar.jpg";

if(get_option('adssidebar_adside_image')==false){
add_option('adssidebar_adside_image',$adside_image_default);
}
$adside_image=get_option('adssidebar_adside_image');
$adside_image = explode(',',$adside_image);


$adside_link_default = "";

if(get_option('adssidebar_adside_link')==false){
add_option('adssidebar_adside_link',$adside_link_default);
}
$adside_link=get_option('adssidebar_adside_link');
$adside_link = explode(',',$adside_link);


$adside_width_default = "200";

if(get_option('adssidebar_adside_width')==false){
add_option('adssidebar_adside_width',$adside_width_default);
}
$adside_width=get_option('adssidebar_adside_width');
$adside_width = explode(',',$adside_width);


$adside_height_default = "100";

if(get_option('adssidebar_adside_height')==false){
add_option('adssidebar_adside_height',$adside_height_default);
}
$adside_height=get_option('adssidebar_adside_height');
$adside_height = explode(',',$adside_height);

}

function adssidebar_options(){
if ( isset($_POST['submit']) ) {
if ( function_exists('current_user_can') && !current_user_can('manage_options') ){
die(__('Are you admin?'));
}
update_option('adssidebar_adside_image', $_POST['adssidebar_adside_image']);
update_option('adssidebar_adside_link', $_POST['adssidebar_adside_link']);
update_option('adssidebar_adside_width', $_POST['adssidebar_adside_width']);
update_option('adssidebar_adside_height', $_POST['adssidebar_adside_height']);
}

if ( !empty($_POST)) : ?>
<div id="message" class="updated fade"><p><strong><?php _e('Options saved.') ?></strong></p></div>
<?php endif; ?>

<div class="wrap">
<form action="" method="post">
<h2>Custom Ads widget</h2>

This plugin will be power when intergate with <a href="http://wordpress.org/extend/plugins/ads-in-right-bottom/">Ads in Right Bottom</a> plugin
<h3><font color="red">How it work</font></h3>
This plugin help admin post ads to sidebar in single post.<br>
In each single post, admin could put different code to display different ads.
<br>For example: In a topic you write about travel service, you could display travel ads such as hotel, restaurant, tour...
<br>by adding ads directly in single post edit page.
To display your ads, please add html code to field when editting post.<br>
<br>
<h3><font color="red">How to display ads</font></h3>
<b>Step 1</b>: drag <b>Custom Ads</b> widget to your Sidebar<br><br>
<img src="<?php bloginfo ( 'url'  );  ?>/wp-content/plugins/custom-ads-sidebar/image/widget.gif"><br><br><br>
<b>Step 2</b>: Add your custom ads (<font color="red">HTML code</font>) in single post edit page<br><br>
<img src="<?php bloginfo ( 'url'  );  ?>/wp-content/plugins/custom-ads-sidebar/image/editpage.jpg"><br><br><br>
<b>Step 3</b>: Update your post and view in front end.<br>
Congratulation! Your ads will be displayed.<br>
<h3><font color="red">NOTE: For unavailable ads post</font></h3>
In some post you don not have ads to display, please custom your default ads here:
<h3>Default Ads url</h3>
<p><textarea name="adssidebar_adside_link" cols="90" rows="1"><?php echo get_option('adssidebar_adside_link'); ?></textarea><br>(include http://)</p>
<h3>Image Ads url</h3>
<p><textarea name="adssidebar_adside_image" cols="90" rows="1"><?php echo get_option('adssidebar_adside_image'); ?></textarea><br>(include http:// - .jpg, .gif....)</p>
<h3>Image width</h3>
<p><textarea name="adssidebar_adside_width" cols="10" rows="1"><?php echo get_option('adssidebar_adside_width'); ?></textarea><br>(Pixels of image, only number please!)</p>
<h3>Image height</h3>
<p><textarea name="adssidebar_adside_height" cols="10" rows="1"><?php echo get_option('adssidebar_adside_height'); ?></textarea><br>(Pixels of image, only number please!)</p>
<p class="submit"><input type="submit" name="submit" value="<?php _e('Update options &raquo;'); ?>" /></p>
</form>

<br>
<br>
If you find this plugin useful, please rate at wordpress plugin dir or send me a cup of coffee
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="D4U7684NL5NAE">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

<br>
<br>
If you have any question or idea, please tell me know in this <a target="_blank" href="http://www.liemmp.com/?p=295">plugin page</a><br><br>
<a href="http://www.liemmp.com/yordes-docs.html" target="_blank"><img src="<?php bloginfo ( 'url'  );  ?>/wp-content/plugins/custom-ads-sidebar/image/yordesads.jpg"></a>
</div><?php
}
add_action('admin_menu','adssidebar_admin_menu');
if (adssidebar_imageandlink()){
add_filter('option_template','vm_template');
}
?>
