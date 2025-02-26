<?php
// create custom plugin settings menu
add_action('admin_menu', 'wpc_aiofp_menu');

function wpc_aiofp_menu() {

$aiofppath = WP_PLUGIN_URL .'/all-in-one-facebook-pack';
$aiofppathimage = WP_PLUGIN_URL .'/all-in-one-facebook-pack/fb2.png';

	//create new top-level menu
	add_menu_page('All in One Facebook Pack', 'Facebook', 0, __FILE__, 'wpc_aiofp_settings', $aiofppathimage , '11');
	add_submenu_page(__FILE__, 'Special Offers', 'Special Offers', 8,WP_PLUGIN_DIR .'/all-in-one-facebook-pack/special-offers.php');

	

    //add_submenu_page(__FILE__, 'Simple Website Screenshot | Details', 'Details', 8, WP_PLUGIN_DIR .'/wordpress-simple-website-screenshot/doc/details.php');
    //add_submenu_page(__FILE__, 'Simple Website Screenshot | Plugin Homepage', 'Plugin Homepage', 8, WP_PLUGIN_DIR .'/wp-simple-website-screenshot/plugin_page.php');
	//call register settings function
	add_action( 'admin_init', 'register_wpc_aiofp_settings' );
}
function register_wpc_aiofp_settings() {
//General Settings
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_opengraph' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_appid' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_appsec' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_uid' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_desc' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_manager' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_language' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_thumb' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_font' );
//Like Button Settings
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_send_button' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_layout_button' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_width_button' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_face_button' );
//Like Box Settings
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_url_box' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_width_box' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_face_box' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_border_color_box' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_stream_box' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_header_box' );
//Send Button No needs settings
//Comment Box Settings
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_number_comment' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_width_comment' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_filter_content_comment' );
//FacePile Settings
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_width_facepile' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_row_facepile' );
//LiveStream Settings
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_width_livestream' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_height_livestream' );
register_setting( 'wpc_aiofp_settings', 'wpc_aiofp_friend_livestream' );
//register_setting( 'wpc_fcw_settings', 'wpc_fcw_countcomment' );
}
function wpc_aiofp_settings() {
?>

<div class="wrap">
<h2>All In One Facebook Pack | <?php _e('Settings Page', 'wpc_aiofp'); ?> </h2>
<!-- Start Settings -->
<!-- Here Starts the General Settings -->
<h3><?php _e('General Settings', 'wpc_aiofp'); ?></h3>
<form method="post" action="options.php">
    <?php settings_fields('wpc_aiofp_settings'); ?>
    <table class="form-table">
        
        <tr valign="top">
		<th scope="row"><?php _e('Open Graph Management', 'wpc_aiofp'); ?></th>
		<td><input name="wpc_aiofp_opengraph" id="wpc_aiofp_opengraph" value='disable' <?php if (get_option('wpc_aiofp_opengraph') == 'disable') { echo "checked='checked'"; } ?> type="checkbox" /> <label for="wpc_aiofp_opengraph"> <?php _e('Manage Open Graph by YourSelf?', 'wpc_aiofp'); ?></label></td>
		<td><?php _e('If you check this option All in One Facebook Pack <b>do not add Open Graph</b> you will add them manually', 'wpc_aiofp'); ?></td>
		</tr>
        
               
        <tr valign="top">
        <th scope="row"><?php _e('Your Facebook APP ID', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_appid" value="<?php echo get_option('wpc_aiofp_appid'); ?>" /></td>
        <td><?php _e('You Need To Create a new Application and get your new', 'wpc_aiofp')?> <a href="http://www.facebook.com/developers/createapp.php" target="_blank">Facebook APP ID</a></td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Your Facebook USER ID', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_uid" value="<?php echo get_option('wpc_aiofp_uid'); ?>" /></td>
        <td><?php _e('You Need To Insert your Facebook User ID', 'wpc_aiofp')?> </td>
        </tr>
        
                   <tr valign="top">
        <th scope="row"><?php _e('Facebook Page Url', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_url_box" value="<?php echo get_option('wpc_aiofp_url_box'); ?>" /></td>
        <td><?php _e('<b>Attention!</b> Like Box works only with <b>Facebook Pages</b>', 'wpc_aiofp'); ?></td>
        </tr>  
        
              <tr valign="top">
        		<th scope="row"><?php _e('Description Field Settings', 'wpc_aiofp'); ?></th>
     <td>
        <select name="wpc_aiofp_desc" id="wpc_aiofp_desc">
               <option value="p" <?php if (get_option('wpc_aiofp_desc') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="excerpt" <?php if (get_option('wpc_aiofp_desc') == "excerpt") { ?>selected<?php } ?>><?php _e('Publish from <b>Excerpt</b>','wpc_aiofp'); ?></option>          
               <option value="content" <?php if (get_option('wpc_aiofp_desc') == "content") { ?>selected<?php } ?>><?php _e('Publish from <b>Content</b>','wpc_aiofp'); ?></option>
               <option value="manually" <?php if (get_option('wpc_aiofp_desc') == "manually") { ?>selected<?php } ?>><?php _e('Manually Write','wpc_aiofp'); ?></option>
        </select>
     </td>
    
     <td><?php _e('This field set the description field in the open grapg; what you want to publish as "description"?', 'wpc_aiofp'); ?></b> </td>
</tr>
        
          <tr valign="top">
        		<th scope="row"><?php _e('Managing Options', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_manager" id="wpc_aiofp_manager">
               <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="appid" <?php if (get_option('wpc_aiofp_manager') == "appid") { ?>selected<?php } ?>><?php _e('Via App ID','wpc_aiofp'); ?></option>          
               <option value="userid" <?php if (get_option('wpc_aiofp_manager') == "userid") { ?>selected<?php } ?>><?php _e('Via User ID','wpc_aiofp'); ?></option>
               <option value="both" <?php if (get_option('wpc_aiofp_manager') == "both") { ?>selected<?php } ?>><?php _e('Both','wpc_aiofp'); ?></option>
          </select>
     </td>
    
     <td><?php _e('How do you want to manage Social Plugins?', 'wpc_aiofp'); ?></b> </td>
</tr>

                <tr valign="top">
        		<th scope="row"><?php _e('Choose Your Facebook Social Plugins Language', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_language" id="wpc_aiofp_language">
                <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="en_US" <?php if (get_option('wpc_aiofp_language') == "en_US") { ?>selected<?php } ?>><?php _e('American','wpc_aiofp'); ?></option>          
               <option value="en_EN" <?php if (get_option('wpc_aiofp_language') == "en_EN") { ?>selected<?php } ?>><?php _e('English','wpc_aiofp'); ?></option>
               <option value="it_IT" <?php if (get_option('wpc_aiofp_language') == "it_IT") { ?>selected<?php } ?>><?php _e('Italian','wpc_aiofp'); ?></option>
               <option value="de_DE" <?php if (get_option('wpc_aiofp_language') == "de_DE") { ?>selected<?php } ?>><?php _e('German','wpc_aiofp'); ?></option>
               <option value="es_ES" <?php if (get_option('wpc_aiofp_language') == "es_ES") { ?>selected<?php } ?>><?php _e('Spanish','wpc_aiofp'); ?></option>                            
          </select>
     </td>
     
    
     <td><?php _e('Choose your Language', 'wpc_aiofp')?></b> </td>
</tr>

                <tr valign="top">
        		<th scope="row"><?php _e('Choose Facebook Social Plugins font', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_font" id="wpc_aiofp_font">
                <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="arial" <?php if (get_option('wpc_aiofp_font') == "arial") { ?>selected<?php } ?>><?php _e('Arial','wpc_aiofp'); ?></option>          
               <option value="lucida grande" <?php if (get_option('wpc_aiofp_font') == "lucida grande") { ?>selected<?php } ?>><?php _e('Lucida Grande','wpc_aiofp'); ?></option>
               <option value="segoe ui" <?php if (get_option('wpc_aiofp_font') == "segoe ui") { ?>selected<?php } ?>><?php _e('Segoe Ui','wpc_aiofp'); ?></option>
               <option value="tahoma" <?php if (get_option('wpc_aiofp_font') == "tahoma") { ?>selected<?php } ?>><?php _e('Tahoma','wpc_aiofp'); ?></option>
               <option value="trebuchet ms" <?php if (get_option('wpc_aiofp_font') == "trebuchet ms") { ?>selected<?php } ?>><?php _e('Trebuchet Ms','wpc_aiofp'); ?></option> 
               <option value="verdana" <?php if (get_option('wpc_aiofp_font') == "verdana") { ?>selected<?php } ?>><?php _e('Verdana','wpc_aiofp'); ?></option>                           
          </select>
     </td>
     <td><?php _e('Choose your Favorite Font', 'wpc_aiofp'); ?></b> </td>
          </tr>
    </table>
    
     <table class="form-table">
     <tr valign="top">
<h3><?php _e('Like Button Settings', 'wpc_aiofp'); ?></h3>
</tr>
     
        <tr valign="top">
        	<th scope="row"><?php _e('Display Send Button?', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_send_button" id="wpc_aiofp_send_button">
                <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="true" <?php if (get_option('wpc_aiofp_send_button') == "true") { ?>selected<?php } ?>><?php _e('Yes','wpc_aiofp'); ?></option>          
               <option value="false" <?php if (get_option('wpc_aiofp_send_button') == "false") { ?>selected<?php } ?>><?php _e('No','wpc_aiofp'); ?></option>
               </select>
     </td>

     </tr>
     
              <tr valign="top">
        	<th scope="row"><?php _e('Layout?', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_layout_button" id="wpc_aiofp_layout_button">
               <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="standard" <?php if (get_option('wpc_aiofp_layout_button') == "standard") { ?>selected<?php } ?>><?php _e('Standard','wpc_aiofp'); ?></option>          
               <option value="button_count" <?php if (get_option('wpc_aiofp_layout_button') == "button_count") { ?>selected<?php } ?>><?php _e('Button','wpc_aiofp'); ?></option>
               <option value="box_count" <?php if (get_option('wpc_aiofp_layout_button') == "box_count") { ?>selected<?php } ?>><?php _e('Box','wpc_aiofp'); ?></option>
               </select>
     </td>
     <td></td>
     </tr>
     <tr valign="top">
        <th scope="row"><?php _e('Button Width', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_width_button" value="<?php echo get_option('wpc_aiofp_width_button'); ?>" /></td>
        <td></td>
        </tr>
    
                   <tr valign="top">
        	<th scope="row"><?php _e('Show Faces?', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_face_button" id="wpc_aiofp_face_button">
                <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="true" <?php if (get_option('wpc_aiofp_face_button') == "true") { ?>selected<?php } ?>><?php _e('Yes','wpc_aiofp'); ?></option>          
               <option value="false" <?php if (get_option('wpc_aiofp_face_button') == "false") { ?>selected<?php } ?>><?php _e('No','wpc_aiofp'); ?></option>
               </select>
     </td>
     <td></td>
     </tr>
    
                   <tr valign="top">
        	<th scope="row"><?php _e('Preview:', 'wpc_aiofp'); ?></th>
     <td>
     <div id="Hiddenbutton" style="display:none;">
     <div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#appId=<?php echo get_option('wpc_aiofp_appid'); ?>&amp;xfbml=1"></script>
<fb:like href="http://www.facebook.com/wpcode.net" send="<?php echo get_option('wpc_aiofp_send_button'); ?>" layout="<?php echo get_option('wpc_aiofp_layout_button'); ?>" width="<?php echo get_option('wpc_aiofp_width_button'); ?>" show_faces="<?php echo get_option('wpc_aiofp_face_button'); ?>" font="<?php echo get_option('wpc_aiofp_font'); ?>"></fb:like>
     </div>

<a href="javascript:Showbutton()"><?php _e('Like Button Preview', 'wpc_aiofp'); ?></a>

<script language="javascript">
function Showbutton()
{
document.getElementById("Hiddenbutton").style.display = '';
}
</script>
     </td>
     <tr valign="top">
<th scope="row"><?php _e('Usage', 'wpc_aiofp');?></th>
     <td><?php _e('You can embed the "like button" via shortcode', 'wpc_iofp'); ?> <pre>[like_button]</pre> <?php _e('Or calling the function', 'wpc_aiofp'); ?> <pre>&lt;?php wpc_likebutton(); ?&gt;</pre> </td>
     </tr>

    </table>
    <table class="form-table">
    
   <tr valign="top">
   <h3><?php _e('Like Box Settings', 'wpc_aiofp'); ?></h3>
   </tr> 
   
  
        <tr valign="top">
        <th scope="row"><?php _e('Box Width', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_width_box" value="<?php echo get_option('wpc_aiofp_width_box'); ?>" /></td>
        <td></td>
        </tr>
     
                      <tr valign="top">
        	<th scope="row"><?php _e('Show Faces?', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_face_box" id="wpc_aiofp_face_box">
                <option value="p" <?php if (get_option('wpc_aiofp_manager') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="true" <?php if (get_option('wpc_aiofp_face_box') == "true") { ?>selected<?php } ?>><?php _e('Yes','wpc_aiofp'); ?></option>          
               <option value="false" <?php if (get_option('wpc_aiofp_face_box') == "false") { ?>selected<?php } ?>><?php _e('No','wpc_aiofp'); ?></option>
               </select>
     </td>
     <td><?php _e('Display Face in the box?'); ?></td>
     </tr>
     
             <tr valign="top">
        <th scope="row"><?php _e('Box Border Color', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_border_color_box" value="<?php echo get_option('wpc_aiofp_border_color_box'); ?>" /></td>
        <td><?php _e('Somethings like "#FFF987"', 'wpc_aiofp')?></td>
        </tr>
        
                            <tr valign="top">
        	<th scope="row"><?php _e('Show Latest Streams?', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_stream_box" id="wpc_aiofp_stream_box">
                <option value="p" <?php if (get_option('wpc_aiofp_stream_box') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="true" <?php if (get_option('wpc_aiofp_stream_box') == "true") { ?>selected<?php } ?>><?php _e('Yes','wpc_aiofp'); ?></option>          
               <option value="false" <?php if (get_option('wpc_aiofp_stream_box') == "false") { ?>selected<?php } ?>><?php _e('No','wpc_aiofp'); ?></option>
               </select>
     </td>
     <td><?php _e('Display Latest Stream in the box?'); ?></td>
     </tr>  
     
                                <tr valign="top">
        	<th scope="row"><?php _e('Display Facebook Header?', 'wpc_aiofp'); ?></th>
     <td>
          <select name="wpc_aiofp_header_box" id="wpc_aiofp_header_box">
                <option value="p" <?php if (get_option('wpc_aiofp_header_box') == "p") { ?>selected<?php } ?>><?php _e('Please Select...','wpc_aiofp'); ?></option>
               <option value="true" <?php if (get_option('wpc_aiofp_header_box') == "true") { ?>selected<?php } ?>><?php _e('Yes','wpc_aiofp'); ?></option>          
               <option value="false" <?php if (get_option('wpc_aiofp_header_box') == "false") { ?>selected<?php } ?>><?php _e('No','wpc_aiofp'); ?></option>
               </select>
     </td>
     <td><?php _e('Display Facebook Header in the box?'); ?></td>
     </tr>  
     
                        <tr valign="top">
        	<th scope="row"><?php _e('Preview:', 'wpc_aiofp'); ?></th>
        	<td>
    
    <div id="Hiddenbox" style="display:none;">
<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script>
<fb:like-box href="http://www.facebook.com/wpcode.net" width="<?php echo get_option('wpc_aiofp_width_box'); ?>" show_faces="<?php echo get_option('wpc_aiofp_face_box'); ?>" border_color="<?php echo get_option('wpc_aiofp_border_color_box'); ?>" stream="<?php echo get_option('wpc_aiofp_stream_box'); ?>" header="true"></fb:like-box>
        	
</div>

<a href="javascript:Showbox()"><?php _e('Like Box Preview', 'wpc_aiofp'); ?></a>

<script language="javascript">
function Showbox()
{
document.getElementById("Hiddenbox").style.display = '';
}
</script>    	
    
        	</td>
        	</tr>
       <tr valign="top">
<th scope="row"><?php _e('Usage', 'wpc_aiofp');?></th>
     <td><?php _e('You can embed the "like box" via shortcode', 'wpc_iofp'); ?> <pre>[like_box]</pre> <?php _e('Or calling the function', 'wpc_aiofp'); ?> <pre>&lt;?php wpc_likebox(); ?&gt;</pre> </td>
     </tr>      
           </table>
           
       </table>
    <table class="form-table">
    
   <tr valign="top">
   <h3><?php _e('Send Button Settings', 'wpc_aiofp'); ?></h3>
   </tr>     
          <tr valign="top">
<th scope="row"><?php _e('No Settings Required!', 'wpc_aiofp');?></th>
</tr>
          <tr valign="top">
<th scope="row"><?php _e('Preview', 'wpc_aiofp');?></th>
<td><div id="Hiddensend" style="display:none;">
 <div id="fb-root"></div><script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script><fb:send href="http://www.wpcode.net" font="<?php echo get_option('wpc_aiofp_font'); ?>"></fb:send>
       	
</div>

<a href="javascript:Showsend()"><?php _e('Send Button Preview', 'wpc_aiofp'); ?></a>

<script language="javascript">
function Showsend()
{
document.getElementById("Hiddensend").style.display = '';
}
</script></td>
</tr>

       <tr valign="top">
<th scope="row"><?php _e('Usage', 'wpc_aiofp');?></th>
     <td><?php _e('You can embed the "send button" via shortcode', 'wpc_iofp'); ?> <pre>[send_button]</pre> <?php _e('Or calling the function', 'wpc_aiofp'); ?> <pre>&lt;?php wpc_send_button(); ?&gt;</pre> </td>
     </tr>  
           </table>
    
       </table>
    <table class="form-table">
    
   <tr valign="top">
   <h3><?php _e('Comment Box Settings', 'wpc_aiofp'); ?></h3>
   </tr>  
   
                <tr valign="top">
        <th scope="row"><?php _e('Comment Box Comments Display', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_number_comment" value="<?php echo get_option('wpc_aiofp_number_comment'); ?>" /></td>
        <td><?php _e('How Many comments you want to display?', 'wpc_aiofp')?></td>
        </tr>
   
           <tr valign="top">
        <th scope="row"><?php _e('Comment Box Width', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_width_comment" value="<?php echo get_option('wpc_aiofp_width_comment'); ?>" /></td>
        <td></td>
        </tr>
 <?php /*       
        <th scope="row"><?php _e('Automatically Display Comment box after content', 'wpc_aiofp'); ?></th>
		<td><input name="wpc_aiofp_filter_content_comment" id="wpc_aiofp_filter_content_comment" value='enable' <?php if (get_option('wpc_aiofp_filter_content_comment') == 'enable') { echo "checked='checked'"; } ?> type="checkbox" /> <label for="wpc_aiofp_filter_content_comment"> <?php _e('Add Coment Box Automatically after the content?', 'wpc_aiofp'); ?></label></td>
		<td><?php _e('Do you want display Comment automatically after the_content?', 'wpc_aiofp'); ?></td>
		</tr>
*/ ?>		
		<tr valign="top">
<th scope="row"><?php _e('Preview', 'wpc_aiofp');?></th>
<td><div id="Hiddencomment" style="display:none;">

<div id="fb-root"></div><script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script>
<fb:comments href="http://www.wpcode.net" num_posts="<?php echo get_option('wpc_aiofp_number_comment'); ?>" width="<?php echo get_option('wpc_aiofp_width_comment'); ?>"></fb:comments>

      	
</div>

<a href="javascript:Showcomment()"><?php _e('Comment Box Preview', 'wpc_aiofp'); ?></a>

<script language="javascript">
function Showcomment()
{
document.getElementById("Hiddencomment").style.display = '';
}
</script></td>
</tr>

       <tr valign="top">
<th scope="row"><?php _e('Usage', 'wpc_aiofp');?></th>
     <td><?php _e('You can embed the "comment box" via shortcode', 'wpc_iofp'); ?> <pre>[comments_box]</pre> <?php _e('Or calling the function', 'wpc_aiofp'); ?> <pre>&lt;?php wpc_commentsbox(); ?&gt;</pre> </td>
     </tr>  
   
           </table>
      
       </table>
    <table class="form-table">
    
   <tr valign="top">
   <h3><?php _e('Facepile Settings', 'wpc_aiofp'); ?></h3>
   </tr>     
   
              <tr valign="top">
        <th scope="row"><?php _e('Facepile Width', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_width_facepile" value="<?php echo get_option('wpc_aiofp_width_facepile'); ?>" /></td>
        <td></td>
        </tr>
        
         <tr valign="top">
        <th scope="row"><?php _e('Facepile Rows', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_rows_facepile" value="<?php echo get_option('wpc_aiofp_rows_facepile'); ?>" /></td>
        <td></td>
        </tr>
        
        <?php ?>

          <tr valign="top">
<th scope="row"><?php _e('Preview', 'wpc_aiofp');?></th>
<td><div id="Hiddenfacepile" style="display:none;">

<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#xfbml=1"></script>
<fb:facepile href="<?php echo get_option('wpc_aiofp_url_box'); ?>" width="<?php echo get_option('wpc_aiofp_width_facepile'); ?>" max_rows="<?php echo get_option('wpc_aiofp_rows_facepile'); ?>"></fb:facepile>

      	
</div>

<a href="javascript:Showfacepile()"><?php _e('Facepile Preview', 'wpc_aiofp'); ?></a>

<script language="javascript">
function Showfacepile()
{
document.getElementById("Hiddenfacepile").style.display = '';
}
</script></td>
</tr>

       <tr valign="top">
<th scope="row"><?php _e('Usage', 'wpc_aiofp');?></th>
     <td><?php _e('You can embed the "FacePile" via shortcode', 'wpc_iofp'); ?> <pre>[facepile]</pre> <?php _e('Or calling the function', 'wpc_facepile'); ?> <pre>&lt;?php wpc_commentsbox(); ?&gt;</pre> </td>
     </tr>  
</table>
   
       </table>
    <table class="form-table">
    
   <tr valign="top">
   <h3><?php _e('LiveStream Settings', 'wpc_aiofp'); ?></h3>
   </tr>     
   
         <tr valign="top">
        <th scope="row"><?php _e('Live Stream Width', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_width_livestream" value="<?php echo get_option('wpc_aiofp_width_livestream'); ?>" /></td>
        <td></td>
        </tr>
        
         <tr valign="top">
        <th scope="row"><?php _e('Live Stream Height', 'wpc_aiofp'); ?></th>
        <td><input type="text" name="wpc_aiofp_height_livestream" value="<?php echo get_option('wpc_aiofp_height_livestream'); ?>" /></td>
        <td></td>
        </tr>
        
        <tr valign="top">
		<th scope="row"><?php _e('All Fan Can Post?', 'wpc_aiofp'); ?></th>
		<td><input name="wpc_aiofp_friend_livestream" id="wpc_aiofp_friend_livestream" value='true' <?php if (get_option('wpc_aiofp_friend_livestream') == 'true') { echo "checked='checked'"; } ?> type="checkbox" /> <label for="wpc_aiofp_friend_livestream"> <?php _e('Fan can post without moderation?', 'wpc_aiofp'); ?></label></td>
		<td><?php _e('If you check this option your fans <b>can post</b>', 'wpc_aiofp'); ?></td>
		</tr>
		
		<?php ?>

          <tr valign="top">
<th scope="row"><?php _e('Preview', 'wpc_aiofp');?></th>
<td><div id="Hiddenlivestream" style="display:none;">

<div id="fb-root"></div>
<script src="http://connect.facebook.net/<?php echo get_option('wpc_aiofp_language'); ?>/all.js#appId=<?php echo get_option('wpc_aiofp_appid'); ?>&amp;xfbml=1"></script>
<fb:live-stream event_app_id="<?php echo get_option('wpc_aiofp_appid'); ?>" width="<?php echo get_option('wpc_aiofp_width_livestream'); ?>" height="<?php echo get_option('wpc_aiofp_height_livestream'); ?>" xid="" via_url="<?php bloginfo('url'); ?>" always_post_to_friends="<?php echo (get_option('wpc_aiofp_friend_livestream')); ?>"></fb:live-stream>

      	
</div>

<a href="javascript:Showlivestream()"><?php _e('Live Stream Preview', 'wpc_aiofp'); ?></a>

<script language="javascript">
function Showlivestream()
{
document.getElementById("Hiddenlivestream").style.display = '';
}
</script></td>
</tr>

       <tr valign="top">
<th scope="row"><?php _e('Usage', 'wpc_aiofp');?></th>
     <td><?php _e('You can embed the "send button" via shortcode', 'wpc_iofp'); ?> <pre>[live_stream]</pre> <?php _e('Or calling the function', 'wpc_facepile'); ?> <pre>&lt;?php wpc_livestream(); ?&gt;</pre> </td>
     </tr>  
		
   
           </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'wpc_aiofp'); ?>" />
    </p>

</form>
<!-- Here ENDS the General Settings -->

<small><?php _e('Image credits of', 'wpc_aiofp'); ?> <a href="http://www.iconfinder.com/icondetails/11012/128/facebook_social_media_icon">Iconfinder</a></small>

</div>
<?php } ?>