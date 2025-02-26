<?php
wp_nonce_field( 'igbap_ui_meta_box_nonce', 'igbap_meta_box_nonce' );

global $post;
$igbap_show_photos_from = get_post_meta($post->ID, '_igbap_show_photos_from', true);
$igbap_user_id = get_post_meta($post->ID, '_igbap_user_id', true);
$igbap_user_hashtag = get_post_meta($post->ID, '_igbap_user_hashtag', true);
$igbap_multiuser_id = get_post_meta($post->ID, '_igbap_multiuser_id', true);
$igbap_multitag_id = get_post_meta($post->ID, '_igbap_multitag_id', true);
$igbap_column_count = get_post_meta($post->ID, '_igbap_column_count', true);
$igbap_liked_id = get_post_meta($post->ID, '_igbap_liked_id', true);
$igbap_number_of_photos = get_post_meta($post->ID, '_igbap_number_of_photos', true);
$ifba_number_of_columns = get_post_meta($post->ID, '_ifba_number_of_columns', true);
$ifba_images_margin = get_post_meta($post->ID, '_ifba_images_margin', true);
$igbap_lightbox_speed = get_post_meta($post->ID, '_igbap_lightbox_speed', true);
$igbap_lightbox_delay = get_post_meta($post->ID, '_igbap_lightbox_delay', true);
$utbap_enable_videos = get_post_meta($post->ID, '_utbap_enable_videos', true);
$utbap_enable_videos_controls = get_post_meta($post->ID, '_utbap_enable_videos_controls', true);
$igbap_lightbox_username = get_post_meta($post->ID, '_igbap_lightbox_username', true);
$igbap_lightbox_description = get_post_meta($post->ID, '_igbap_lightbox_description', true);
$igbap_lightbox_likes = get_post_meta($post->ID, '_igbap_lightbox_likes', true);
$igbap_lightbox_comments = get_post_meta($post->ID, '_igbap_lightbox_comments', true);
$igbap_lightbox_location = get_post_meta($post->ID, '_igbap_lightbox_location', true);
$igbap_lightbox_date = get_post_meta($post->ID, '_igbap_lightbox_date', true);
$igbap_lightbox_link = get_post_meta($post->ID, '_igbap_lightbox_link', true);
$igbap_color_scheme = get_post_meta($post->ID, '_igbap_color_scheme', true);
$utbap_enable_load_more_button = get_post_meta($post->ID, '_utbap_enable_load_more_button', true);

$igbap_bg_overlay = get_post_meta($post->ID, '_igbap_bg_overlay', true);
$igbap_container_bg = get_post_meta($post->ID, '_igbap_container_bg', true);
$igbap_username_color = get_post_meta($post->ID, '_igbap_username_color', true);
$igbap_date_time_color = get_post_meta($post->ID, '_igbap_date_time_color', true);
$igbap_caption_color = get_post_meta($post->ID, '_igbap_caption_color', true);
$igbap_link_color = get_post_meta($post->ID, '_igbap_link_color', true);
$igbap_private_access_token = get_post_meta($post->ID, '_igbap_private_access_token', true);



?>

<style type="text/css">

  main {
    background: #FFF;
    width: 98%;
    padding: 1%;
    margin-top: 1%;
    box-shadow: 0 3px 5px rgba(0,0,0,0.2);
  }
  main p {
    font-size: 13px;
  }
  main #igbap-tab1, main #igbap-tab2, main #igbap-tab3, main #igbap-tab4, main section {
    clear: both;
    padding-top: 30px;
    display: none;
  }
  #igbap-tab1-label, #igbap-tab2-label,  #igbap-tab3-label,  #igbap-tab4-label {
    font-weight: bold;
    font-size: 14px;
    display: block;
    float: left;
    padding: 10px 30px;
    border-top: 2px solid transparent;
    border-right: 1px solid transparent;
    border-left: 1px solid transparent;
    border-bottom: 1px solid #DDD;
  }
  main label:hover {
    cursor: pointer;
    text-decoration: underline;
  }
  #igbap-tab1:checked ~ #igbap-content1, #igbap-tab2:checked ~ #igbap-content2, #igbap-tab3:checked ~ #igbap-content3, #igbap-tab4:checked ~ #igbap-content4 {
    display: block;
  }
  main input:checked + #igbap-tab1-label, main input:checked + #igbap-tab2-label, main input:checked +  #igbap-tab3-label, main input:checked +  #igbap-tab4-label {
    border-top-color: #e62117;
    border-right-color: #DDD;
    border-left-color: #DDD;
    border-bottom-color: transparent;
    text-decoration: none;
  }
  #igbap_show_photos_from_id , #igbap_show_photos_from_location , #igbap_show_photos_from_hashtag{
    margin-top: 2px;
  }
  .igbap_checkbox{
    width: 25px !important;
    height: 25px !important;
    border: 1px solid lightgrey !important;
    border-radius: 5px !important;
    margin-left: 10px !important;
  }
  .igbap_checkbox:checked:before{
    font-size: 30px !important;
  }
  #igbap_theme_selection_table tr td{
    vertical-align: top;
    display: inline-block;
  }

  .Switch {
    position: relative;
    display: inline-block;
    font-size: 1.6em;
    font-weight: bold;
    color: #ccc;
    text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
    height: 18px;
    padding: 6px 6px 5px 7px;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,0.2);
    border-radius: 4px;
    background: #ececec;
    box-shadow: 0px 0px 4px rgba(0,0,0,0.1), inset 0px 1px 3px 0px rgba(0,0,0,0.1);
    cursor: pointer;
    font-size: 16px;
  }
  body.IE7 .Switch { width: 78px; }
  .Switch span {
    display: inline-block;
    width: 35px;
  }
  .Switch span.On { color: #e62117; }
  .Switch .Toggle {
    position: absolute;
    top: 1px;
    width: 37px;
    height: 25px;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,0.3);
    border-radius: 4px;
    background: #fff;
    background: -moz-linear-gradient(top, #ececec 0%, #ffffff 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ececec), color-stop(100%, #ffffff));
    background: -webkit-linear-gradient(top, #ececec 0%, #ffffff 100%);
    background: -o-linear-gradient(top, #ececec 0%, #ffffff 100%);
    background: -ms-linear-gradient(top, #ececec 0%, #ffffff 100%);
    background: linear-gradient(top, #ececec 0%, #ffffff 100%);
    box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,0.5);
    z-index: 999;
    -webkit-transition: all 0.15s ease-in-out;
    -moz-transition: all 0.15s ease-in-out;
    -o-transition: all 0.15s ease-in-out;
    -ms-transition: all 0.15s ease-in-out;
  }
  .Switch.On .Toggle { left: 2%; }
  .Switch.Off .Toggle { left: 54%; }
  /* Round Switch */
  .Switch.Round {
    padding: 0px 20px;
    border-radius: 40px;
  }
  body.IE7 .Switch.Round { width: 1px; }
  .Switch.Round .Toggle {
    border-radius: 40px;
    width: 14px;
    height: 14px;
  }
  .Switch.Round.Off .Toggle {
    left: 3%;
    background: #33d2da;
  }
  .Switch.Round.On .Toggle { left: 58%; }
  .info {
    font-size: 1.2em;
    margin-bottom: 4px;
  }
</style>
<script type="text/javascript">
  jQuery(document).ready(function($) {

    $('#igbap_get_userid').click(function(){
            $('#igbap_instagram_userid').css('display','none');
            $('#igbap_instagram_userid_error').css('display','none');
            $('#igbap_userid_loading_img').css('margin','0 auto');
            $('#igbap_userid_loading_img').css('display','block');
      var insta_username = $('#igbap_username_userid').val();
      var get_id_url = "https://api.instagram.com/v1/users/search?q="+insta_username+"&access_token=1976045897.3a81a9f.d5235c36f32945289a74a9e9e3a95598";
      $.ajax({
        method: "GET",
        url: get_id_url,
        dataType: "jsonp",
        jsonp: "callback",
        jsonpCallback: "jsonpcallback",
        success: function(data) {
          var value = data.data[0];
          if(jQuery.type(value) === "undefined" ){
            $('#igbap_userid_loading_img').css('display','none');
            $('#igbap_instagram_userid_error').css('display','block');
        }else{
            $('#igbap_userid_loading_img').css('display','none');
            $( "#igbap_name" ).text(data.data[0].full_name);
            $( "#igbap_username" ).text(" @"+data.data[0].username);
            $( "#igbap_userid" ).text(data.data[0].id);
            $('#igbap_instagram_userid').css('display','block');

        }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('fales');
          $("#log").val($("#log").val() + 'Error\n');
        }
      });
    });
  });
</script>
<p style="text-align: center;
background: white;
border: 2px solid #e62117;
padding: 5px;
font-size: 17px;">
  Enter your Instagram Username with "@" sign to get your UserID: 
  <input style="height: 30px;" type="text" id="igbap_username_userid" name="igbap_username_userid" value=""> 
  <input id="igbap_get_userid" class="button button-primary button-large" type="button" value="Get UserID"><br/> 
  <span><img style="display: none;" id="igbap_userid_loading_img" src="<?php echo plugins_url('images/loading.gif', __FILE__); ?>"></span>
  <span id="igbap_instagram_userid" style="display: none;margin: 0 auto;">
    <span id="igbap_name" style="font-weight: bold;"></span>
    <span id="igbap_username" style="font-weight: bold;"></span><br/>
    <span id="igbap_text" style="font-weight: bold;">UserID:</span>
    <span id="igbap_userid" style="font-weight: bold;"></span>
  </span>
   <span id="igbap_instagram_userid_error" style="display: none;">
  <span id="igbap_name" style="font-weight: bold;color:red;">Please Enter Correct Instagram Username<br/>Provided username doesn't exists or incorrect.</span>
  </span>
</p>
<p style="text-align: center;
background: white;
border: 2px solid #e62117;
padding: 5px;
font-size: 17px;">Copy this shortcode & paste into your post, page to show Instagram Gallery<br/> <code><strong style="font-size:18px;">[arrow_insta_gallery id='<?php echo $post->ID; ?>']</strong></code></p>
<main>
  <input id="igbap-tab1" type="radio" name="igbap-tabs" checked>
  <label id="igbap-tab1-label" for="igbap-tab1">Gallery Settings</label>
  <input id="igbap-tab2" type="radio" name="igbap-tabs">
  <label id="igbap-tab2-label" for="igbap-tab2">Lightbox Settings</label>
  <input id="igbap-tab3" type="radio" name="igbap-tabs">
  <label id="igbap-tab3-label" for="igbap-tab3">Lightbox Customizations</label>
  <input id="igbap-tab4" type="radio" name="igbap-tabs">
  <label id="igbap-tab4-label" for="igbap-tab4">Private Account</label>
  <section id="igbap-content1">
    <table id="igbap_general_options">
      <tr>
        <td style="vertical-align: top;    width: 230px;">
          <h3 style="margin: 6px;">Show Photos From:</h3>
        </td>
        <td>
       <!--    <table id="igbap_selection_table">
            <tr>
              <td style="width:220px;">
                <input type="radio" id="igbap_show_photos_from_popular" name="igbap_show_photos_from" value='popular'<?php checked( "popular", $igbap_show_photos_from); ?>  />
                <label for="igbap_show_photos_from_popular"><strong>Popular Instagram Feed :</strong></label> 
              </td>
              <td>
                <span><strong>This will pulls Most Popular photos from Instagram</strong></span>
              </td>
            </tr>
           </table>
           <hr> -->
           <table>
            <tr>
              <td style="vertical-align: top;width:220px;">
                <input type="radio" id="igbap_show_photos_from_user" name="igbap_show_photos_from" value='user'<?php checked( "user", $igbap_show_photos_from); ?> <?php if($igbap_show_photos_from == ''){ echo 'checked="checked"';} ?> />
                <label for="igbap_show_photos_from_user"><strong>From Specific UserID :</strong></label> 
              </td>
              <td style="vertical-align: top;">
                <input type="text" id="igbap_show_photos_from_user_value" name="igbap_user_id" placeholder="Enter userID Here" value="<?php echo $igbap_user_id; ?>" /> <br/>
                <span><strong>This mode allows you to specify a user id to pull in photos from a specific user</strong></span>
              </td>
            </tr>

           </table>
           <hr>
           <table>
            <tr>
              <td style="vertical-align: top;width:220px;">
                <input disabled type="radio" id="igbap_show_photos_from_hashtag" name="igbap_show_photos_from" value='hashtag'<?php checked( "hashtag", $igbap_show_photos_from); ?>  />
                <label for="igbap_show_photos_from_hashtag"><strong>From Hashtag :</strong></label> 
              </td>
              <td style="vertical-align: top;">
                <input disabled type="text" id="igbap_show_photos_from_hashtag_value" name=" " placeholder="Enter Hashtag"   /> <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Premium Feature</a> <br/>
                <span><strong>This mode allows you to specify a hashtag to get photos from</strong></span>
              </td>
            </tr>
           </table>
           <hr>
           <table>
            <tr>
              <td style="vertical-align: top;width:220px;">
                <input disabled type="radio" id="igbap_show_photos_from_multi_user" name=" "    />
                <label for="igbap_show_photos_from_multi_user"><strong>From Multiple UserID(s) :</strong></label> 
              </td>
              <td style="vertical-align: top;">
                <input disabled style="" type="text" id="igbap_show_photos_from_multi_user_value" name="igbap_multiuser_id" placeholder="UserID(s) , comma seperated (no spaces)" value="<?php echo $igbap_multiuser_id; ?>" /> <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Premium Feature</a> <br/>
                <span><strong>This mode allows you to specify multiple user id’s to pull in photos from specific users (example: 10943735,43109246)</strong></span><br/>
                <span><strong style="color:red;">Note, this feature does NOT allow load more functionality</strong></span>
              </td>
            </tr>
         </table>
           <hr>
           <table>
            <tr>
              <td style="vertical-align: top;width:220px;">
                <input disabled type="radio" id="igbap_show_photos_from_multi_hashtag" name=" "    />
                <label for="igbap_show_photos_from_multi_hashtag"><strong>From Multiple Hashtags :</strong></label> 
              </td>
              <td style="vertical-align: top;">
                <input disabled style="" type="text" id="igbap_show_photos_from_multi_hashtag_value" name="igbap_multitag_id" placeholder="Hashtag(s) , comma seperated (no spaces)" value="<?php echo $igbap_multitag_id; ?>" /> <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Premium Feature</a> <br/>
                <span><strong>This mode allows you to specify multiple hashtags to pull in photos from</strong></span><br/>
                <span><strong style="color:red;">Note, this feature does NOT allow load more functionality</strong></span>
              </td>
            </tr>
          </table>
          <!--  <table>
            <tr>
              <td style="vertical-align: top;width:220px;">
                <input type="radio" id="igbap_show_photos_from_liked" name="igbap_show_photos_from" value='liked'<?php checked( "liked", $igbap_show_photos_from); ?>  />
                <label for="igbap_show_photos_from_liked"><strong>User Liked Photos :</strong></label> 
              </td>
              <td style="vertical-align: top;">
                <input type="text" id="igbap_show_photos_from_liked_value" name="igbap_liked_id" placeholder="Enter userID" value="<?php echo $igbap_liked_id; ?>" /> <br/>
                <span><strong>This mode allows you to specify a user id to pull photos that were liked </strong></span><br/>
              </td>
            </tr>
           
          </table> -->

        </td>
      </tr>
      <tr>
        <td>
          <h3>Number of Photos to Show: </h3> 
        </td>
        <td>
          <input style="" type="number" min="1" max="20" id="igbap_number_of_photos" name="igbap_number_of_photos" value="<?php if($igbap_number_of_photos == ''){ echo '20' ;}else{ echo $igbap_number_of_photos; } ?>" /> max 20 
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">
          <h3 style="margin: ;">Enable Videos: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name="utbap_enable_videos" id="utbap_enable_videos"  value='1'<?php checked(1, $utbap_enable_videos); ?>  style="display: none;">
              </div>
              <div class="Switch">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
          </td>
        </tr>
      <tr>
        <td style="vertical-align: top;">
          <h3 style="margin: ;">Enable Video Controls: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name="utbap_enable_videos_controls" id="utbap_enable_videos_controls"  value='1'<?php checked(1, $utbap_enable_videos_controls); ?>  style="display: none;">
              </div>
              <div class="Switch">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
        <td style="vertical-align: top;">
          <h3 style="margin: ;">Show Load More Functionality: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name="utbap_enable_load_more_button" id="utbap_enable_load_more_button"  value='1'<?php checked(1, $utbap_enable_load_more_button); ?>  style="display: none;">
              </div>
              <div class="Switch">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <span><strong>Will show Load More button to load more photos from instagram account/hashtag selected </strong></span><br/>
          </td>
        </tr>
         <tr>
        <td>
          <h3>Number of Columns in a Row: </h3> 
        </td>
        <td>
        <select name="ifba_number_of_columns" id="ifba_number_of_columns" value='1'<?php checked(1, $ifba_number_of_columns); ?> >
            <option value="col-5" <?php if ( $ifba_number_of_columns == "col-5" ) echo 'selected="selected"'; ?> >5 Column (Default)</option>
            <option disabled>1 Column (Premium Feature)</option>
            <option disabled>2 Column (Premium Feature)</option>
            <option disabled>3 Column (Premium Feature)</option>
            <option disabled>4 Column (Premium Feature)</option>
            <option disabled>6 Column (Premium Feature)</option>
            <option disabled>7 Column (Premium Feature)</option>
            <option disabled>8 Column (Premium Feature)</option>
            <option disabled>9 Column (Premium Feature)</option>
            <option disabled>10 Column (Premium Feature)</option>
        </select>
        </td>
      </tr>
        <tr>
        <td>
          <h3>Margin Between Images: </h3> 
        </td>
        <td>
        <select name="ifba_images_margin" id="ifba_images_margin" value='1'<?php checked(1, $ifba_images_margin); ?> >
            <option value="" <?php if ( $ifba_images_margin == "" ) echo 'selected="selected"'; ?> >None (Default)</option>
            <option disabled value="" >5 pixels (Premium Feature)</option>
        </select>
        </td>
      </tr>
      <tr>
        <td style="vertical-align: top;">
          <h3 style="margin: ;">Select Color Scheme: </h3>
        </td>
        <td>
          <table>
            <tr>
              <td style="vertical-align: top;width:220px;text-align: center;">
                <input type="radio" id="igbap_color_scheme_default" name="igbap_color_scheme" value='ig-business'<?php checked( "ig-business", $igbap_color_scheme); ?> <?php if($utbap_video_thumbnail_view == ''){ echo 'checked="checked"';} ?> /><label for="igbap_color_scheme_default">Default</label><br/>
                <img style="margin-top: 5px;width:150px;" src="<?php echo plugins_url('images/preset1.png',__FILE__); ?>">
              </td>
              <td style="vertical-align: top;width:220px;text-align: center;">
                <input type="radio" id="igbap_color_scheme_1" name="igbap_color_scheme" value='ig-dream'<?php checked( "ig-dream", $igbap_color_scheme); ?>  /><label for="igbap_color_scheme_1">Preset 1</label><br/>
                <img style="margin-top: 5px;width:150px;" src="<?php echo plugins_url('images/preset2.png',__FILE__); ?>">
              </td>
              <td style="vertical-align: top;width:220px;text-align: center;">
                <input type="radio" id="igbap_color_scheme_2" name="igbap_color_scheme" value='ig-pinterest'<?php checked( "ig-pinterest", $igbap_color_scheme); ?>  /><label for="igbap_color_scheme_2">Preset 2</label><br/>
                <img style="margin-top: 5px;width:150px;" src="<?php echo plugins_url('images/preset3.png',__FILE__); ?>">
              </td>
            </tr>
           </table>
           <hr>
           <table>
            <tr>
              <td style="vertical-align: top;width:220px;text-align: center;">
                <input disabled type="radio" id="igbap_color_scheme_3" name=" "    /><label for="igbap_color_scheme_3">Preset 3 <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Locked</a></label><br/>
                <img style="margin-top: 5px;width:150px;" src="<?php echo plugins_url('images/preset4.png',__FILE__); ?>">
              </td>
              <td style="vertical-align: top;width:220px;text-align: center;">
                <input disabled type="radio" id="igbap_color_scheme_4" name=" "    /><label for="igbap_color_scheme_4">Preset 4 <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Locked</a></label><br/>
                <img style="margin-top: 5px;width:150px;" src="<?php echo plugins_url('images/preset5.png',__FILE__); ?>">
              </td>
              <td style="vertical-align: top;width:220px;text-align: center;">
                <input disabled type="radio" id="igbap_color_scheme_5" name=" "    /><label for="igbap_color_scheme_5">Preset 5 <a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Locked</a></label><br/>
                <img style="margin-top: 5px;width:150px;" src="<?php echo plugins_url('images/preset6.png',__FILE__); ?>">
              </td>
            </tr>
           </table>
          </td>
        </tr>
    </table>
      <input style="margin: 0 auto;display: block;margin-top: 20px;margin-bottom: 20px;" name="save" type="submit" class="button button-primary button-large" id="publish" value="Save Changes">
  </section>
  <section id="igbap-content2">
  <h3 style="    font-size: 23px;
    margin: 0;
    margin-bottom: 15px;">Configure Lightbox Settings</h3>
    <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Speed: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <input type="text" id="igbap_lightbox_speed" name="igbap_lightbox_speed" value="<?php if($igbap_lightbox_speed == ''){ echo '700' ;}else{ echo $igbap_lightbox_speed; } ?>"> miliseconds
            </div>
            <strong>Sets the speed of the images fade in effect. Default is 700</strong>
          </td>
        </tr>

    </table>
    <hr>
    <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Delay Interval: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <input type="text" id="igbap_lightbox_delay" name="igbap_lightbox_delay" value="<?php if($igbap_lightbox_delay == ''){ echo '80' ;}else{ echo $igbap_lightbox_delay; } ?>"> miliseconds
            </div>
            <strong>Sets the interval of the delay between photos appearing. Default is 80</strong>
          </td>
        </tr>
    </table>
    <h3 style="text-align: center;font-size: 25px;"><a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Premium Features</a></h3>
    <div style="border: 2px solid #e2e2e2;border-radius: 8px;padding: 5px;">
    <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show Username: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_username"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <strong>Show your Instagram Username in the lightbox</strong>
          </td>
        </tr>
    </table>
    <hr>
    <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show Description: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_description"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <strong>Show your Instagram Photo Description in the lightbox</strong>
          </td>
        </tr>
    </table>
    <hr>
    <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show Likes: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_likes"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <strong>Show your Instagram Photo Likes in the lightbox</strong>
          </td>
        </tr>
    </table>
    <hr>
     <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show Comments: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_comments"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <strong>Show your Instagram Photo Comments in the lightbox</strong>
          </td>
        </tr>
    </table>
    <hr>
     <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show Location: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_location"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <strong>Show your Instagram Photo Location in the lightbox</strong>
          </td>
        </tr>
    </table>
    <hr>
    <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show Date: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_date"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
            <strong>Show your Instagram Photo Date in the lightbox</strong>
          </td>
        </tr>
    </table>
    <hr>
     <table>
       <tr>
        <td style="vertical-align: top;width: 200px;">
          <h3 style="margin:0,padding:0;">Show View Photo Link: </h3>
        </td>
        <td>
          <div id="MainContainer">
            <div>
              <div class="info">
                <input type="checkbox" name=" " id="igbap_lightbox_link"     style="display: none;">
              </div>
              <div class="Switch disabled">
                <div class="Toggle"></div>
                <span class="On">ON</span> <span class="Off">OFF</span> </div>
              </div>
            </div>
          </td>
        </tr>
    </table>
    </div>
      <input style="margin: 0 auto;display: block;margin-top: 20px;margin-bottom: 20px;" name="save" type="submit" class="button button-primary button-large" id="publish" value="Save Changes">
  </section>
  <section id="igbap-content3">
<!--     <table>
      <tr>
        <td style="vertical-align: top;width: 350px;">
          <h3 style="margin:0,padding:0;">Lightbox Background Overlay Color: </h3>
        </td>
        <td style="padding-top: 7px;">
          <input type="text" class="color_picker" name="igbap_bg_overlay" value="<?php echo $igbap_bg_overlay; ?>" >
        </td>
      </tr>
    </table> -->
      <table>
      <tr>
        <td style="vertical-align: top;width: 350px;">
          <h3 style="margin:0,padding:0;">Lightbox Container Background Color: </h3>
        </td>
        <td style="padding-top: 7px;">
          <input type="text" class="color_picker" name="igbap_container_bg" value="<?php echo $igbap_container_bg; ?>" >
        </td>
      </tr>
    </table>
    <h3 style="text-align: center;font-size: 25px;"><a href="https://www.arrowplugins.com/insta-gallery" target="_blank">Premium Features</a></h3>
    <div style="border: 2px solid #e2e2e2;border-radius: 8px;padding: 5px;">
  
    <table>
      <tr>
        <td style="vertical-align: top;width: 350px;">
          <h3 style="margin:0,padding:0;">Insta Username Color: </h3>
        </td>
        <td style="padding-top: 7px;">
          <input type="text" class="color_picker" name=" "   >
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td style="vertical-align: top;width: 350px;">
          <h3 style="margin:0,padding:0;">Date/Time Color: </h3>
        </td>
        <td style="padding-top: 7px;">
          <input type="text" class="color_picker" name=" "    >
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td style="vertical-align: top;width: 350px;">
          <h3 style="margin:0,padding:0;">Photo Caption Text Color: </h3>
        </td>
        <td style="padding-top: 7px;">
          <input type="text" class="color_picker" name=" "  >
        </td>
      </tr>
    </table>
    <table>
      <tr>
        <td style="vertical-align: top;width: 350px;">
          <h3 style="margin:0,padding:0;">Link to Instagram Color: </h3>
        </td>
        <td style="padding-top: 7px;">
          <input type="text" class="color_picker" name=" "   >
        </td>
      </tr>
    </table>
    </div>
     <input style="margin: 0 auto;display: block;margin-top: 20px;margin-bottom: 20px;" name="save" type="submit" class="button button-primary button-large" id="publish" value="Save Changes">
  </section>
  <section id="igbap-content4">
<h3>Private Account Settings</h3>
    <p>To show private account feed you need to generate Instagram Access Token. Visit <a href="https://www.arrowplugins.com/generate-instagram-access-token/" target="_blank">How to get Instaram Access Token</a> and Paste the access token into the field below </p>
    <p><strong>Instagram Access Token: </strong>
    <input style="width: 80%;" type="text" value="<?php echo $igbap_private_access_token; ?>" name="igbap_private_access_token" id="igbap_private_access_token"> 
    <span style="color: red;font-weight: bold;">(Leave this field empty if your account is public)</span></p>
  </section>
</main>
     <script type="text/javascript">

                    jQuery(document).ready(function() {

// Switch Click
jQuery('.Switch').click(function() {

if (jQuery(this).hasClass('disabled')){

alert('This is a **Premium Feature**');
}else{

if (jQuery(this).hasClass('On')){

// Try To Find Checkbox Within Parent Div, And Check It
jQuery(this).parent().find('input:checkbox').attr('checked', true);

// Change Button Style - Remove On Class, Add Off Class
jQuery(this).removeClass('On').addClass('Off');

} else { // If Button Is Disabled (Has 'Off' Class)

// Try To Find Checkbox Within Parent Div, And Uncheck It
jQuery(this).parent().find('input:checkbox').attr('checked', false);

// Change Button Style - Remove Off Class, Add On Class
jQuery(this).removeClass('Off').addClass('On');

}
}

});

// Loops Through Each Toggle Switch On Page
jQuery('.Switch').each(function() {

// Search of a checkbox within the parent
if (jQuery(this).parent().find('input:checkbox').length){

// This just hides all Toggle Switch Checkboxs
// Uncomment line below to hide all checkbox's after Toggle Switch is Found
//jQuery(this).parent().find('input:checkbox').hide();

// For Demo, Allow showing of checkbox's with the 'show' class
// If checkbox doesnt have the show class then hide it
if (!jQuery(this).parent().find('input:checkbox').hasClass("show")){ jQuery(this).parent().find('input:checkbox').hide(); }
// Comment / Delete out the above line when using this on a real site

// Look at the checkbox's checkked state
if (jQuery(this).parent().find('input:checkbox').is(':checked')){

// Checkbox is not checked, Remove the 'On' Class and Add the 'Off' Class
jQuery(this).removeClass('On').addClass('Off');

} else { 

// Checkbox Is Checked Remove 'Off' Class, and Add the 'On' Class
jQuery(this).removeClass('Off').addClass('On');

}

}

});

});

////////////////////////////////////////////////////////
// Ignore This Bit - Only To Load Syntax Highlighting //
////////////////////////////////////////////////////////

</script>