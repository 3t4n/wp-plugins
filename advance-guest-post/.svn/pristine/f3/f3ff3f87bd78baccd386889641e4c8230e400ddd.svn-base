<?php
/*
Plugin Name: Advance Guest Post
Plugin URI: http://buykodo.com
Description: Now your user can submit post without backend enjoy :).
Version: 1.9
Author: cybergeekshop
Author URI: http://www.cybergeekshop.net
License: GPL2
*/

###################################################
####### plugin Code ###############
###################################################

include ('lib/ajax-upload.php');

define("agp_URL", WP_PLUGIN_URL ."/advance-guest-post");
define("agp_PATH", WP_PLUGIN_DIR."/advance-guest-post");
add_action('admin_menu', 'agp_create_menu');

function agp_create_menu()
{
// Check that the user is allowed to update options
    if (!current_user_can('manage_options'))
    {
        wp_die('You do not have sufficient permissions to access this page.');
    }
	
	

    //create new top-level menu
    add_menu_page('agp Plugin Settings', 'Guest Post', 'administrator', __FILE__, 'agp_settings_page', plugins_url('/images/icon.png', __FILE__));

    //call register settings function
    add_action('admin_init', 'register_agpsettings');
	add_action('admin_enqueue_scripts', 'agp_custom_admin_css');
}


function register_agpsettings()
{
    //register our settings
    register_setting('agp-settings-group', 'posttitle');
    register_setting('agp-settings-group', 'postdiscription');
    register_setting('agp-settings-group', 'postauthor');
    register_setting('agp-settings-group', 'postcategory');
    register_setting('agp-settings-group', 'uploadimage');
	register_setting('agp-settings-group', 'posttitleenabledisables');
	register_setting('agp-settings-group', 'postdiscriptionenabledisable');
    register_setting('agp-settings-group', 'postauthorenabledisable');
    register_setting('agp-settings-group', 'postcategoryenabledisable');
    register_setting('agp-settings-group', 'uploadimageenabledisable');
	register_setting('agp-settings-group', 'posttype');
	register_setting('agp-settings-group', 'posttaxonomies');
	register_setting('agp-settings-group', 'autopublish');
	register_setting('agp-settings-group', 'enablecaptcha');
	register_setting('agp-settings-group', 'captchapublickey');
	register_setting('agp-settings-group', 'guestpost');
	register_setting('agp-settings-group', 'captchaprivatekey');
	register_setting('agp-settings-group', 'successmessage');
	register_setting('agp-settings-group', 'imagesize');
	register_setting('agp-settings-group', 'productshortdiscription');
	register_setting('agp-settings-group', 'producttags');
	register_setting('agp-settings-group', 'tagsenabledisable');
	register_setting('agp-settings-group', 'expertsenabledisable');
	register_setting('agp-settings-group', 'titlerequire');
	register_setting('agp-settings-group', 'featurerequire');
	register_setting('agp-settings-group', 'discriptionrequire');
	register_setting('agp-settings-group', 'categoryrequire');
	register_setting('agp-settings-group', 'tagsrequire');
	register_setting('agp-settings-group', 'expertrequire');
	register_setting('agp-settings-group', 'multicategory');
	
    
}

function agp_settings_page()
{
    ?>
    <div class="wrap">
        <h2>Advance Guest Post Settings</h2>
        
      
            <div class="metabox-holder">
	               <div class="meta-box-sortables ui-sortable">
                         <div id="mm-panel-overview" class="postbox">
						       <h3>Options</h3>
						          <div class="toggle default-hidden">
							      <div id="mm-panel-options-agp">
                                        <form method="post" action="options.php">
								  <p>
								   Select Option according your needs
                                   <br/> <br/> <br/>
                                <b>  Enter labale Name which You want to show in front page: </b>
                                   
								  </p>
             <?php settings_fields('agp-settings-group'); ?>
            <?php register_agpsettings('agp-settings-group'); ?>
								           <table class="form-table">
                <tr valign="top">
                    <th scope="row">Post Title:</th>
                    <td><input type="text" name="posttitle" value="<?php echo get_option('posttitle'); ?>" /> //default Post Title</td>
               
                </tr>

             <tr valign="top">
                    <th scope="row">Post Discription:</th>
                    <td><input type="text" name="postdiscription" value="<?php echo get_option('postdiscription'); ?>" /> //default Post Discription</td>
                </tr>
                
                   <tr valign="top">
                    <th scope="row">Post Author:</th>
                    <td><input type="text" name="postauthor" value="<?php echo get_option('postauthor'); ?>" /> //default Post Author</td>
                </tr>
 
                   <tr valign="top">
                    <th scope="row">Post Category:</th>
                    <td><input type="text" name="postcategory" value="<?php echo get_option('postcategory'); ?>" /> //default Post Category</td>
                </tr>
                
                     <tr valign="top">
                    <th scope="row">Upload Image:</th>
                    <td><input type="text" name="uploadimage" value="<?php echo get_option('uploadimage'); ?>" /> //default Upload Image</td>
                </tr>
                                   <tr valign="top">
                    <th scope="row">Post Tags:</th>
                    <td><input type="text" name="producttags" value="<?php echo get_option('producttags'); ?>" /> //default Product Category</td>
                </tr>  
                
                     <tr valign="top">
                    <th scope="row">Post Short Description:</th>
                    <td><input type="text" name="productshortdiscription" value="<?php echo get_option('productshortdiscription'); ?>" /> //default Short Description</td>
                </tr>
                                
            </table>
			
           <table class="form-table">
            
    <br/> <br/> <br/>
                                <b>  enable or disable option which you don't want in front page: </b>
                                
                                <?php 
								
								$posttitleenabledisables = get_option('posttitleenabledisables'); 
								$postdiscriptionenabledisable = get_option('postdiscriptionenabledisable');
								$postauthorenabledisable  = get_option('postauthorenabledisable');
								$postcategoryenabledisable = get_option('postcategoryenabledisable');
								$uploadimageenabledisable = get_option('uploadimageenabledisable');
								$posttype = get_option('posttype'); 
								$posttaxonomies = get_option('posttaxonomies'); 
								$autopublish = get_option('autopublish'); 
								$enablecaptcha = get_option('enablecaptcha');
								$captchaprivatekey = get_option('captchaprivatekey');
								$guestpost = get_option('guestpost'); 
								$successmessage = get_option('successmessage'); 
								$imagesize = get_option('imagesize');
								$productshortdiscription = get_option('productshortdiscription');
								$productshortdiscription = get_option('producttags'); 
								$titlerequire = get_option('titlerequire'); 
								$discriptionrequire = get_option('discriptionrequire'); 
								$categoryrequire = get_option('categoryrequire'); 
								$featurerequire = get_option('featurerequire'); 
								$tagsrequire = get_option('tagsrequire'); 
								$expertrequire = get_option('expertrequire'); 
								$multicategory = get_option('multicategory'); 
								

								?>
                                
                                             <tr valign="top">
                    <th scope="row">Post Title:</th>
                    <td><select name="posttitleenabledisables">
										<option <?php if ($posttitleenabledisables == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($posttitleenabledisables == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                
                                                             <tr valign="top">
                    <th scope="row">Post Discription:</th>
                    <td><select name="postdiscriptionenabledisable">
										<option <?php if ($postdiscriptionenabledisable == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($postdiscriptionenabledisable == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                
                                                             <tr valign="top">
                    <th scope="row">Post Author:</th>
                    <td><select name="postauthorenabledisable">
										<option <?php if ($postauthorenabledisable == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($postauthorenabledisable == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                
                                                             <tr valign="top">
                    <th scope="row">Post Category:</th>
                    <td><select name="postcategoryenabledisable">
										<option <?php if ($postcategoryenabledisable == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($postcategoryenabledisable == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                
                                                             <tr valign="top">
                    <th scope="row">Upload Image:</th>
                    <td><select name="uploadimageenabledisable">
										<option <?php if ($uploadimageenabledisable == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($uploadimageenabledisable == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                                  <th scope="row">Tags:</th>
                    <td><select name="tagsenabledisable">
										<option <?php if ($tagsenabledisable == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($tagsenabledisable == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                
                             <th scope="row">Excerpt Post:</th>
                    <td><select name="expertsenabledisable">
										<option <?php if ($expertsenabledisable == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($expertsenabledisable == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
									</select></td>
                </tr>
                
                   
            </table>
            
            <table class="form-table">
            
    <br/> <br/> <br/>
                                <b> Create field required(tick checkbox which filed you want require): </b>
                                
                                
                                             <tr valign="top">
                    <th scope="row">Post Title:</th>
                    <td><input type="checkbox" name="titlerequire" value="require" <?php if ( 'require' == $titlerequire ) echo 'checked="checked"'; ?>></td>
                </tr>
                                                             <tr valign="top">
                    <th scope="row">Post Discription:</th>
                    <td><input type="checkbox" name="discriptionrequire" value="require" <?php if ( 'require' == $discriptionrequire ) echo 'checked="checked"'; ?>></td>
                </tr>
                </tr>
                
                                                             <tr valign="top">
                    <th scope="row">Post Category:</th>
                    <td><input type="checkbox" name="categoryrequire" value="require" <?php if ( 'require' == $categoryrequire ) echo 'checked="checked"'; ?>></td>
                </tr>
                </tr>
                
                                                             <tr valign="top">
                    <th scope="row">Feature Image:</th>
                    <td><input type="checkbox" name="featurerequire" value="require" <?php if ( 'require' == $featurerequire ) echo 'checked="checked"'; ?>></td>
                </tr>
                </tr>
                
 
                             <th scope="row">Tags:</th>
                    <td><input type="checkbox" name="tagsrequire" value="require" <?php if ( 'require' == $tagsrequire ) echo 'checked="checked"'; ?>></td>
                </tr>
                </tr>
                
                             <th scope="row">Excerpt Post:</th>
                    <td><input type="checkbox" name="expertrequire" value="require" <?php if ( 'require' == $expertrequire ) echo 'checked="checked"'; ?>></td>
                </tr>
                </tr>
                
                      <table class="form-table"> 
                      
                      <tr>
                             <th scope="row">Enable Multiple Category:</th>
                    <td><input type="checkbox" name="multicategory" value="enable" <?php if ( 'enable' == $multicategory ) echo 'checked="checked"'; ?>></td>
                </tr>
                   
                   </table>
            
               <table class="form-table">
            
    <br/> <br/> <br/>
                                <b>  Select Post Type and taxnomy where you want to post to publish<br/>(Note* the texnomy you select is the part of post type you selected like if you select "post-type:post" then taxnomy should be "category"): </b>
                <tr valign="top">
                        <th scope="row">Post Type:</th>
                    <td><select name="posttype"> 
					<?php 
$post_types=get_post_types('','names'); 
foreach ($post_types as $post_type ) {
	?><option <?php if ($posttype == $post_type) echo 'selected="selected"'; ?> value="<?php echo $post_type; ?>"><?php echo $post_type; ?></option> <?php
 
}
?>
</select></td>
                </tr>
                 <tr valign="top">
                        <th scope="row">Post Taxonomies:</th>
                    <td><select name="posttaxonomies"> 
                <?php 
$taxonomies=get_taxonomies('','names'); 
foreach ($taxonomies as $taxonomy ) { ?>

<option <?php if ($posttaxonomies == $taxonomy) echo 'selected="selected"'; ?> value="<?php echo $taxonomy; ?>"><?php echo $taxonomy; ?></option> <?php
 
}
?>
</select></td>
                </tr>
                
                 <tr valign="top">
                    <th scope="row">Auto Publish?:</th>
                    <td><select name="autopublish">
										<option <?php if ($autopublish == 'publish') echo 'selected="selected"'; ?> value="publish"><?php _e('Publish'); ?></option>
										<option <?php if ($autopublish == 'pending') echo 'selected="selected"'; ?> value="pending"><?php _e('Pending'); ?></option>
									</select></td>
                </tr>

</table>

 <table class="form-table">
            
    <br/> <br/> <br/>
                                <b>Captcha setting(get captcha public key from here http://www.google.com/recaptcha): </b>
                                    <tr valign="top">
                    <th scope="row">Enable/disable Captcha:</th>
                    <td><select name="enablecaptcha">
										<option <?php if ($enablecaptcha == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
										<option <?php if ($enablecaptcha == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
									</select></td>
                </tr>
                
                <tr valign="top">
                    <th scope="row">Captcha Public Key:</th>
                    <td><input type="text" name="captchapublickey" value="<?php echo get_option('captchapublickey'); ?>" /> //default none</td>
               
                </tr>
                
                                <tr valign="top">
                    <th scope="row">Captcha Private Key:</th>
                    <td><input type="text" name="captchaprivatekey" value="<?php echo get_option('captchaprivatekey'); ?>" /> //default none</td>
               
                </tr>
                                </table>
                                
 <table class="form-table">
            
    <br/> <br/> <br/>
                                <b>Other Option: </b>
                                    <tr valign="top">
                    <th scope="row">Enable/disable Guest Posting:</th>
                    <td><select name="guestpost">
											<option <?php if ($guestpost == 'enable') echo 'selected="selected"'; ?> value="enable"><?php _e('enable'); ?></option>
										<option <?php if ($guestpost == 'disable') echo 'selected="selected"'; ?> value="disable"><?php _e('disable'); ?></option>
								</select>
                                <p>enable or disable guest posting(disable need required login to publish post)</p>	</td>
                </tr>
                  <tr valign="top">
                    <th scope="row">Success Message</th>
                    <td><textarea type="text" name="successmessage" value="<?php echo get_option('successmessage'); ?>" ><?php echo get_option('successmessage'); ?></textarea>   <p> //default message none</p></td>
            
                </tr>
          <tr valign="top">
                    <th scope="row">Image Size:</th>
                    <td><input type="text" name="imagesize" value="<?php echo get_option('imagesize'); ?>" /> //defult 2mb use only value ex: "2"</td>
               
                </tr>
                                </table>                                
                                
			<?php submit_button(); ?>
            </form>
							</div>
                            <div class="shortcode-agp">

							<h4>Shortcode</h4>
							<p>Use this shortcode to display the advcance guest post Form on any post or page:</p>
							<p><code class="mm-code">[advance_guest_post]</code></p>

						   </div>
					      </div>
 
                   </div>
            </div>
                
        <?php 
}
        
include ('lib/agp-functions.php');

	
		    function script_head()  
    {  
     ?>
     
<link rel="stylesheet" type="text/css" href="<?php echo agp_URL; ?>/css/agp.css">
 <script type="text/javascript">
function Check () {

var content = document.getElementById ("agp_image_content");

//Minimum number of characters
if (content.value.length < 100) {
alert ("The content must be at least 400 characters long!");
return false;
}

//Maximum number of characters
if (content.value.length > 300) {
alert ("The content must be at most 2000 characters long!");
return false;
}

return true;
}
</script>
 <?php
    }  
    add_action( 'wp_head', 'script_head' );
	
	// add styles to admin Edit page

function agp_custom_admin_css() {
	global $pagenow;
 
	wp_enqueue_style('asp_style_admin', WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/css/admin.css', false, 1.0, 'all');
 
}

// ajax login page code 

function ajax_login_init(){
   global $post;
    wp_register_script('ajax-login-script', agp_URL. '/js/ajax-login-script.js', array('jquery') ); 
    wp_enqueue_script('ajax-login-script');

    wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'redirecturl' => get_permalink( $post->ID ),
        'loadingmessage' => __('Sending user info, please wait...')
    ));

// Enable the user with no privileges to run ajax_login() in AJAX
    add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}

// Execute the action only if the user isn't logged in
add_action('init', 'ajax_login_init');

function ajax_login(){

// First check the nonce, if it fails the function will break
    check_ajax_referer( 'ajax-login-nonce', 'security' );

// Nonce is checked, get the POST data and sign user on
    $info = array();
    $info['user_login'] = $_POST['username'];
    $info['user_password'] = $_POST['password'];
    $info['remember'] = true;

    $user_signon = wp_signon( $info, false );
    if ( is_wp_error($user_signon) ){
        echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.')));
    } else {
        echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, redirecting...')));
    }

    die();
}

?>