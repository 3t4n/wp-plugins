<?php

if (!function_exists('awesome_instagram_shortcode_content')) {

    // Add Shortcode
    function awesome_instagram_shortcode( $atts = null ) {
      $aif_options = awesome_instagram_feed_options();
      $feed_style = $aif_options['instagram_feed_style'];
      $feed_username = $aif_options['instagram_feed_username'];
      $feed_token = $aif_options['instagram_feed_accesstoken'];
      $feed_clientid = $aif_options['instagram_feed_clientid'];
      $insta_title = $aif_options['instagram_title'];
      $insta_url = $aif_options['instagram_url'];
        // Attributes
        extract(shortcode_atts( array(
            'feedlayout' => "",
            ), $atts )
        );

        $feedlayoutstyle = ( empty($feedlayout)?$aif_options['instagram_feed_style']:$feedlayout );
          if('slider' == $feedlayoutstyle) {
            ?>

              <div class="instagram-sec" data-client="<?php echo esc_attr($feed_clientid) ?>" data-access="<?php echo esc_attr($feed_token) ?>" data-user="<?php echo esc_attr($feed_username) ?>">
                <?php if($insta_title){ ?>
                  <div class="instagram-follow"><a class="instagram-title" href="<?php echo esc_url($insta_url); ?>" target="_blank"><?php echo esc_html($insta_title); ?></a></div>
                <?php } ?>
                  <ul id="instagram" class="instagram-slider"></ul>
              </div>
            <?php
            }

            elseif('grid' == $feedlayoutstyle) { ?>
                <div class="instagram-sec" data-client="<?php echo esc_attr($feed_clientid) ?>" data-access="<?php echo esc_attr($feed_token) ?>" data-user="<?php echo esc_attr($feed_username) ?>">
                <?php if($insta_title){ ?>
                  <div class="instagram-follow"><a class="instagram-title" href="<?php echo esc_url($insta_url); ?>" target="_blank"><?php echo esc_html($insta_title); ?></a></div>
                <?php } ?>
                    <ul id="instagram" class="instagram-grid"></ul>
                </div>
                <?php
            }
    }
    add_shortcode( 'awesome_instagram_feed', 'awesome_instagram_shortcode' );

}
