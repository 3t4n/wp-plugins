<?php

global $post;
$tfbip_select_feed_from = get_post_meta($post->ID, '_tfbip_select_feed_from', true);
$tfbip_username = get_post_meta($post->ID, '_tfbip_username', true);
$tfbip_hashtag = get_post_meta($post->ID, '_tfbip_hashtag', true);
$tfbip_number_of_tweets = get_post_meta($post->ID, '_tfbip_number_of_tweets', true);
$tfbip_select_style = get_post_meta($post->ID, '_tfbip_select_style', true);
$tfbip_caption_text_limit_vertical = get_post_meta($post->ID, '_tfbip_caption_text_limit_vertical', true);
$tfbip_display_photos_only = get_post_meta($post->ID, '_tfbip_display_photos_only', true);
$tfbip_vertical_show_hide_date = get_post_meta($post->ID, '_tfbip_vertical_show_hide_date', true);
$tfbip_vertical_show_hide_dp = get_post_meta($post->ID, '_tfbip_vertical_show_hide_dp', true);
$tfbip_vertical_show_hide_caption = get_post_meta($post->ID, '_tfbip_vertical_show_hide_caption', true);
$tfbip_caption_text_limit_blog = get_post_meta($post->ID, '_tfbip_caption_text_limit_blog', true);
$tfbip_blog_show_hide_date = get_post_meta($post->ID, '_tfbip_blog_show_hide_date', true);
$tfbip_blog_show_hide_dp = get_post_meta($post->ID, '_tfbip_blog_show_hide_dp', true);
$tfbip_blog_show_hide_caption = get_post_meta($post->ID, '_tfbip_blog_show_hide_caption', true);
$tfbip_no_of_columns_masonry = get_post_meta($post->ID, '_tfbip_no_of_columns_masonry', true);
$tfbip_caption_text_limit_masonry = get_post_meta($post->ID, '_tfbip_caption_text_limit_masonry', ture);
$tfbip_masonry_show_hide_date = get_post_meta($post->ID, '_tfbip_masonry_show_hide_date', true);
$tfbip_masonry_show_hide_dp = get_post_meta($post->ID, '_tfbip_masonry_show_hide_dp', true);
$tfbip_masonry_show_hide_caption = get_post_meta($post->ID, '_tfbip_masonry_show_hide_caption', true);
$tfbip_select_template = get_post_meta($post->ID, '_tfbip_select_template', true);
$tfbip_date_posted_lang = get_post_meta($post->ID, '_tfbip_date_posted_lang', true);

?>

<div id="tfbip_main_container">

  <div id="header">
  <img src="<?php echo plugins_url('images/twitter.png',__FILE__); ?>" width="30px" id="twitter_img">
  <h1 id="heading_text">Twitter Feed</h1>
  </div>
    
    <div id="tfbip_feed_settings">
        
        <table width="100%">
    
     <tr>
        <td style="width: 40%"><strong>Show Feed From:</strong></td>
        <td>
          <input type="radio" id="tfbip_username1" name="tfbip_select_feed_from" value="username" <?php checked( "username", $tfbip_select_feed_from); ?>>
          <label for="tfbip_username1" style="vertical-align: text-bottom !important;" id="label_user">Username:</label>
          <input type="text" style="margin-left: 20px;" name="tfbip_username" placeholder="@example123" value="<?php echo $tfbip_username; ?>">
        </td>
      </tr>

      <tr>
        <td></td>
        <td>
          <input type="radio" id="tfbip_hash_tag" name="tfbip_select_feed_from" value="hashtag" <?php checked( "hashtag", $tfbip_select_feed_from); ?> disabled="" >
          <label for="tfbip_hash_tag">Hashtag:</label>
          <input type="text" style="margin-left: 34px;margin-top: 10px;" name="tfbip_hashtag" placeholder="#example123" value="<?php echo $tfbip_hashtag; ?>" disabled=""><span style="color: red"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
        </td>
      </tr>

      <tr>
        <td style="padding-top: 15px;"><strong>Number of Tweets to Display:</strong></td>
        <td style="padding-top: 15px;"><input type="number" min="1" max="100" value="<?php if($tfbip_number_of_tweets == ''){ echo '10' ;}else{ echo $tfbip_number_of_tweets; } ?>" name="tfbip_number_of_tweets"></td>
      </tr>

      <tr>
          <td style="padding-top: 15px;"><strong>Hide Twitter Photos:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_display_photos_only" value="1" <?php checked(1, $tfbip_display_photos_only); ?> ></td>
        </tr>

        <tr>
            <td style="padding-top: 15px;"><strong>Select Date Posted Language:</strong></td>
            <td style="padding-top: 15px;"><select name="tfbip_date_posted_lang" id="tfbip_date_posted_lang" value='1'<?php checked(1, $tfbip_date_posted_lang); ?> >
            <option value="en" <?php if ( $tfbip_date_posted_lang == "en" ) echo 'selected="selected"'; ?> >English (Default)</option>
            <option value="ar" <?php if ( $tfbip_date_posted_lang == "ar" ) echo 'selected="selected"'; ?> >Arabic</option>
            <option value="bn" <?php if ( $tfbip_date_posted_lang == "bn" ) echo 'selected="selected"'; ?> >Bangali</option>
            <option value="cs" <?php if ( $tfbip_date_posted_lang == "cs" ) echo 'selected="selected"'; ?> >Czech</option>
            <option value="da" <?php if ( $tfbip_date_posted_lang == "da" ) echo 'selected="selected"'; ?> >Danish</option>
            <option value="nl" <?php if ( $tfbip_date_posted_lang == "nl" ) echo 'selected="selected"'; ?> >Dutch</option>
            <option value="fr" <?php if ( $tfbip_date_posted_lang == "fr" ) echo 'selected="selected"'; ?> >French</option>
            <option value="de" <?php if ( $tfbip_date_posted_lang == "de" ) echo 'selected="selected"'; ?> >German</option>
            <option value="it" <?php if ( $tfbip_date_posted_lang == "it" ) echo 'selected="selected"'; ?> >Italian</option>
            <option value="ja" <?php if ( $tfbip_date_posted_lang == "ja" ) echo 'selected="selected"'; ?> >Japanese</option>
            <option value="ko" <?php if ( $tfbip_date_posted_lang == "ko" ) echo 'selected="selected"'; ?> >Korean</option>
            <option value="pt" <?php if ( $tfbip_date_posted_lang == "pt" ) echo 'selected="selected"'; ?> >Portuguese</option>
            <option value="ru" <?php if ( $tfbip_date_posted_lang == "ru" ) echo 'selected="selected"'; ?> >Russian</option>
            <option value="es" <?php if ( $tfbip_date_posted_lang == "es" ) echo 'selected="selected"'; ?> >Spanish</option>
            <option value="tr" <?php if ( $tfbip_date_posted_lang == "tr" ) echo 'selected="selected"'; ?> >Turkish</option>
            <option value="uk" <?php if ( $tfbip_date_posted_lang == "uk" ) echo 'selected="selected"'; ?> >Ukranian</option>
        </select></td>
        </tr>

  </table>

  </div>

        <div id="tfbip_feed_style">
          
          <div style="border: none !important; padding-left: 30px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_style" value="vertical" id="vertical" <?php checked( "vertical", $tfbip_select_style); ?> > <strong>Vertical</strong> <br/>
      <img src="<?php echo plugins_url('images/vertical.png',__FILE__); ?>" width="200px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; display: inline-block;vertical-align: top;">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_style" value="blog_style" <?php checked( "blog_style", $tfbip_select_style); ?> id="blog_style"> <strong>Blog Style</strong> <br/>
      <img src="<?php echo plugins_url('images/blog_style.png',__FILE__); ?>" width="200px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; display: inline-block;">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_style" disabled=""> <strong>Masonry</strong> 
      <span style="margin-left: 5px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/masonry.png',__FILE__); ?>" width="200px" style="padding-top: 8px;">
    </label>

    </div>

    <div id="vertical_options" style="width: 80% !important; border: none !important;display: none;">

      <table width="100%">
        
        <tr>
          <td><strong>Limit caption text:</strong></td>
          <td><input type="number" min="40" max="650" value="<?php if($tfbip_caption_text_limit_vertical == ''){ echo '300' ;}else{ echo $tfbip_caption_text_limit_vertical; } ?>" name="tfbip_caption_text_limit_vertical"></td>
        </tr>

        

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Date:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_vertical_show_hide_date" value="1" <?php checked(1, $tfbip_vertical_show_hide_date); ?> ></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Profile Picture:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_vertical_show_hide_dp" value="1" <?php checked(1, $tfbip_vertical_show_hide_dp); ?> ></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Caption Text:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_vertical_show_hide_caption" value="1" <?php checked(1, $tfbip_vertical_show_hide_caption); ?> ></td>
        </tr>

      </table>
      
    </div>

    <div id="blog_options" style="width: 80% !important; border: none !important;display: none;">

      <table width="100%">
        
        <tr>
          <td><strong>Limit caption text:</strong></td>
          <td><input type="number" min="40" max="650" value="<?php if($tfbip_caption_text_limit_blog == ''){ echo '300' ;}else{ echo $tfbip_caption_text_limit_blog; } ?>" name="tfbip_caption_text_limit_blog"></td>
        </tr>

        

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Date:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_blog_show_hide_date" value="1" <?php checked(1, $tfbip_blog_show_hide_date); ?> ></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Profile Picture:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_blog_show_hide_dp" value="1" <?php checked(1, $tfbip_blog_show_hide_dp); ?> ></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Caption Text:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_blog_show_hide_caption" value="1" <?php checked(1, $tfbip_blog_show_hide_caption); ?> ></td>
        </tr>

      </table>
      
    </div>

    <div id="masonry_options" style="width: 80% !important; border: none !important;display: none;">

      <table width="100%">
        
        <tr>
          <td><strong>No of Columns:</strong></td>
          <td><input type="number" min="1" max="5" value="<?php if($tfbip_no_of_columns_masonry == ''){ echo '1' ;}else{ echo $tfbip_no_of_columns_masonry; } ?>" name="tfbip_no_of_columns_masonry"></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Limit caption text:</strong></td>
          <td style="padding-top: 10px;"><input type="number" min="40" max="650" value="<?php if($tfbip_caption_text_limit_masonry == ''){ echo '300' ;}else{ echo $tfbip_caption_text_limit_masonry; } ?>" name="tfbip_caption_text_limit_masonry"></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Date:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_masonry_show_hide_date" value="1" <?php checked(1, $tfbip_masonry_show_hide_date); ?> ></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Profile Picture:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_masonry_show_hide_dp" value="1" <?php checked(1, $tfbip_masonry_show_hide_dp); ?> ></td>
        </tr>

        <tr>
          <td style="padding-top: 15px;"><strong>Hide Caption Text:</strong></td>
          <td style="padding-top: 12px;"><input type="checkbox" name="tfbip_masonry_show_hide_caption" value="1" <?php checked(1, $tfbip_masonry_show_hide_caption); ?> ></td>
        </tr>

      </table>
      
    </div>

  </div>

          <div id="tfbip_templates">
              
              <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template1" <?php checked( "tfbip_template1", $tfbip_select_template); ?> id="tfbip_template1"> <strong>Template 1</strong> <br/>
      <img src="<?php echo plugins_url('images/template1.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template9" <?php checked( "tfbip_template9", $tfbip_select_template); ?> id="tfbip_template9"> <strong>Template 2</strong> <br/>
      <img src="<?php echo plugins_url('images/template9.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" id="tfbip_template2" disabled=""> <strong>Template 2</strong> <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template2.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" id="tfbip_template3" disabled=""> <strong>Template 3</strong> <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template3.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template4" <?php checked( "tfbip_template4", $tfbip_select_template); ?> id="tfbip_template4" disabled=""> <strong>Template 4</strong>
      <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template4.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template5" <?php checked( "tfbip_template5", $tfbip_select_template); ?> id="tfbip_template5" disabled=""> <strong>Template 5</strong>
      <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template5.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template6" <?php checked( "tfbip_template6", $tfbip_select_template); ?> id="tfbip_template6" disabled=""> <strong>Template 6</strong>
      <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template6.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template7" <?php checked( "tfbip_template7", $tfbip_select_template); ?> id="tfbip_template7" disabled=""> <strong>Template 7</strong>
      <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template7.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>

    <div style="border: none !important; padding-left: 20px; display: inline-block;vertical-align: top;" id="tfbip_feed_style_vertical">

    <label>
      <input type="radio" style="margin-left: 15px;" name="tfbip_select_template" value="tfbip_template8" <?php checked( "tfbip_template8", $tfbip_select_template); ?> id="tfbip_template8" disabled=""> <strong>Template 8</strong>
      <span style="color: red;margin-left: 15px;"><strong><a href="https://www.iconplugins.com/wordpress-twitter-feed">Buy Premium</a></strong></span> <br/>
      <img src="<?php echo plugins_url('images/template8.png',__FILE__); ?>" width="300px" style="padding-top: 8px;">
    </label>

    </div>


        </div>

</div>
