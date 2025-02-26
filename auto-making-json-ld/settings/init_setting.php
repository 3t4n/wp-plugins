<?php

if (!defined('ABSPATH')) exit;

if (!function_exists('auto_making_jsonld_init_option')){
  function auto_making_jsonld_init_option(){

    if(!get_option('auto_making_jsonld_installed')){
      add_option('auto_making_jsonld_installed', 1);

      //article.php
      for((int)$i=1; $i<=10; $i++){
        add_option("url_{$i}", '');
      }
      add_option('privacy', '');
      for((int)$i=1; $i<=30; $i++){
        add_option("cat_ID_{$i}", '');
        add_option("thumb_url_{$i}", '');
      }

      //certification.php
      add_option('plugin', '');

      //youtube_api.php
      add_option('API', '');

      add_option('profile_url', '');
      add_option('author_image', '');

      //view_settings.php
      add_option('all_view', 0);
      add_option('breadcrumb_check', 1);
      add_option('article_check', 1);
      add_option('image_check', 1);
      add_option('sitelink_check', 1);
      add_option('video_value', 1);
      add_option('howto_check', 1);
      add_option('faq_check', 1);
      add_option('review_check', 1);
      add_option('profile_check', 1);

    }
  }
}
register_activation_hook(__FILE__, 'auto_making_jsonld_init_option');