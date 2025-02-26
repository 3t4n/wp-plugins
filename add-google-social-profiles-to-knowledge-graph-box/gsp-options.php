<?php
  if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}
?>

 <div class="wrap">
        <?php screen_icon('plugins'); ?> <h2>Google Social Profiles in Knowledge Graph Boxes</h2>
<?php
 if (isset($_POST["update_settings"])) {
    // Do the saving
     $type = esc_attr($_POST["type"]);  
    $facebook = esc_attr($_POST["facebook"]);   
    $name = esc_attr($_POST["name"]);   
    $twitter = esc_attr($_POST["twitter"]);   
    $linkedin = esc_attr($_POST["linkedin"]);   
    $google = esc_attr($_POST["google"]);
     $instagram = esc_attr($_POST["instagram"]);   
    $youtube = esc_attr($_POST["youtube"]);   
    $myspace = esc_attr($_POST["myspace"]);   
    $pinterest = esc_attr($_POST["pinterest"]);   
    $soundcloud = esc_attr($_POST["soundcloud"]);   
    $tumblr = esc_attr($_POST["tumblr"]);   


   update_option("gsp_type", $type); 
update_option("gsp_facebook", $facebook);
update_option("gsp_name", $name);
update_option("gsp_twitter", $twitter);
update_option("gsp_linkedin", $linkedin);
update_option("gsp_google", $google);
update_option("gsp_instagram", $instagram);
update_option("gsp_youtube", $youtube);
update_option("gsp_myspace", $myspace);
update_option("gsp_pinterest", $pinterest);
update_option("gsp_soundcloud", $soundcloud);
update_option("gsp_tumblr", $tumblr);




?>
<div id="message" class="updated">Settings saved</div>
<?php
}
  $name = get_option("gsp_name");
  $type = get_option("gsp_type");
  $facebook = get_option("gsp_facebook");
  $twitter = get_option("gsp_twitter");
  $linkedin = get_option("gsp_linkedin");
  $google = get_option("gsp_google");
  $instagram = get_option("gsp_instagram");
  $youtube = get_option("gsp_youtube");
  $myspace = get_option("gsp_myspace");
  $pinterest = get_option("gsp_pinterest");
  $tumblr = get_option("gsp_tumblr");
  
 
?>
        <form method="POST" action="">
          <input type="hidden" name="update_settings" value="Y" />
            <table class="form-table">
              
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                          Type
                        </label> 
                    </th>
                    <td>
                      <select name="type">
                        <?php 
                        //$arr[]='Please Select';
                        $arr[]='Organization';
                        $arr[]='Person';
                        foreach($arr as $v){
                          $selected="";
              if($type==$v){
                $selected=' selected="selected" ';
              }
                          echo '<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
                        }
                        ?>
                        
                        
                      </select>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                          Name
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="name"  value="<?php echo $name; ?>" size="25" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                           Facebook link
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="facebook"  value="<?php echo $facebook; ?>" size="25" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                           Twitter link
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="twitter" value="<?php echo $twitter; ?>" size="25" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                           linkedin link
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="linkedin" value="<?php echo $linkedin; ?>" size="25" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                           Google+ link
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="google" value="<?php echo $google; ?>" size="25" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                          Instagram
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="instagram" value="<?php echo $instagram; ?>" size="25" />
                    </td>
                </tr>
                   <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                          Youtube
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="youtube" value="<?php echo $youtube; ?>" size="25" />
                    </td>
                </tr>
                    <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                          Myspace
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="myspace" value="<?php echo $myspace; ?>" size="25" />
                    </td>
                </tr>
                     <tr valign="top">
                    <th scope="row">
                        <label for="facebook">
                          Pinterest
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="pinterest" value="<?php echo $pinterest; ?>" size="25" />
                    </td>
                </tr>
                <tr>
                         <tr valign="top">
                    <th scope="row">
                        <label for="soundCloud">
                          SoundCloud
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="soundcloud" value="<?php echo $soundcloud; ?>" size="25" />
                    </td>
                </tr>
                        <tr valign="top">
                    <th scope="row">
                        <label for="soundCloud">
                          Tumblr
                        </label> 
                    </th>
                    <td>
                        <input type="text" name="tumblr" value="<?php echo $tumblr; ?>" size="25" />
                    </td>
                </tr>
                <tr>
                  <td colspan="2"> <p>
    <input type="submit" value="Save settings" class="button-primary"/>
</p></td>
                </tr>
            </table>
        </form>
    
    
    Please note this will appears on google search results if your brands or businesses already generate a knowledge graph box in Google search results
    <a href="https://developers.google.com/webmasters/structured-data/customize/social-profiles"> More information</a>
    <br>
    <a href="http://twitter.com/omarnas" target="_blank">@omarnas</a>
    </div>
