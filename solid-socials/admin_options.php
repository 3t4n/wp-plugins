<?php
// Function to process form Data
function process_solid_socials_options() {
    $position = $_POST['solid_socials_position'];
    $facebook_option = $_POST['solid_socials_fb_option'];
    $twitter_handle = $_POST['solid_socials_twitter_handle'];
    $display_options = $_POST['solid_socials_display'];
    $header_height = $_POST['solid_socials_header_height'];
    $link_love = $_POST['solid_socials_link_love'];

    $option_name = "solid_socials";
    $new_value = array(
                       'position'=>$position,
                       'fb_option'=>$facebook_option,
                       'twitter_handle'=>$twitter_handle,
                       'display_options'=>$display_options,
                       'header_height'=>$header_height,
                       'link_love'=>$link_love
                       );
    
    
    update_option($option_name,$new_value);
   

}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   process_solid_socials_options(); $updated = 1;
}

// Get Options

$option_name = "solid_socials";
$options = get_option($option_name);
//var_dump($options);

// Build Form

// Form Variables
$uri =  $_SERVER["REQUEST_URI"];
$twitterHandle = $options['twitter_handle'];
$headerHeight = $options['header_height'];
$position = $options['position'];
$display = $options['display_options'];
$fb_option = $options['fb_option'];
$link_love = $options['link_love'];




?>
<link rel="stylesheet" href="<?php echo home_url(); ?>/wp-content/plugins/solid-socials/style.css"/>
</pre>
  <div class="wrap">
    <?php if($updated == 1) {?>
    <div class="updated fade">Settings successfully saved</div>
    <?php } ?>
    <h1 class="solid_admin">solid_socials </h1>
    <form method="post" action="<?php echo $uri; ?>">
      <ul>
        <div class="solid_admin_options">
     <li>Position:
            <select name="solid_socials_position">
            <option value="1" <?php if($position == 1) echo 'selected'; ?>>Left</option>
            <option value="2" <?php if($position == 2) echo 'selected'; ?>>Right</option>
            </select></li>
     <li>Facebook Button:
            <select name="solid_socials_fb_option">
            <option value="like" <?php if($fb_option == 'like') echo 'selected'; ?>>Like</option>
            <option value="share"  <?php if($fb_option == 'share') echo 'selected'; ?>>Share</option>
            </select></li>
     <li>Twitter Handle: @
            <input type="text" name="solid_socials_twitter_handle" placeholder="the_tweeter" value="<?php echo $twitterHandle; ?>">
        </li>
     <li>Header Height in px (Default 0px):
            <input type="text" name="solid_socials_header_height" value="<?php echo $headerHeight; ?>"/>
        </li>
     <li>Link love:
        <select name="solid_socials_link_love">
          <option value="1" <?php if($link_love == 1) echo 'selected'; ?>>Yes</option>
          <option value="2" <?php if($link_love == 2) echo 'selected'; ?>>No</option>
        </select></li>
     </div>
      <li class="solid_socials_btn_opt">Buttons to display:
        <ul class="solid_admin">
            <li><div class="facebookBtn admin_btn"></div><input type="checkbox" name="solid_socials_display[]" value="facebook" <?php if(in_array('facebook',$display)){ echo "checked";} ?>/><span class="solid_social_title">Facebook</span></li>
            <li><div class="twitterBtn admin_btn"></div><input type="checkbox" name="solid_socials_display[]" value="twitter"  <?php if(in_array('twitter',$display)){ echo "checked";}  ?>> <span class="solid_social_title">Twitter</span></li>
            <li><div class="stumbleBtn admin_btn"></div><input type="checkbox" name="solid_socials_display[]" value="stumbleupon"  <?php if(in_array('stumbleupon',$display)){ echo "checked";}  ?>/> <span class="solid_social_title">StumbleUpon</span></li>
            <li><div class="linkedInBtn admin_btn"></div><input type="checkbox" name="solid_socials_display[]" value="linkedIn"  <?php if(in_array('linkedIn',$display)){ echo "checked";}  ?>/> <span class="solid_social_title">LinkedIn</span></li>
            <li><div class="googleplusBtn admin_btn"></div><input type="checkbox" name="solid_socials_display[]" value="googleplus"  <?php if(in_array('googleplus',$display)){ echo "checked";}  ?>/> <span class="solid_social_title">Google+</span></li>
        </ul>
        </li>
       
        
        <li>
            <input type="submit" value="save changes" class="solid_admin"/>
        </li> 
      </ul>
    </form>
    <div id="solid_socials_about">
      <p><b>Thanks for using solid_socials!</b> <br/> Solid_socials is a plugin developed by me <a href="http://www.linkedin.com/in/rorykermack">Rory Kermack</a>.I am the founder of <a href="http://kermackcreative.com">Kermack Creative</a> a Web and Design Agency with an international client base. I also blog on <a href="http://codeanthology.com">codeanthology</a> which covers web design, development and digital marketing. If you have any questions or issues either relating to the plugin or not, feel free to email me at <br/> <b>rory@codeanthology.com</b></p>
      <img src="<?php echo home_url(); ?>/wp-content/plugins/solid-socials/includes/roryk.jpg"/>
    </div>
  </div>
  
<pre>



