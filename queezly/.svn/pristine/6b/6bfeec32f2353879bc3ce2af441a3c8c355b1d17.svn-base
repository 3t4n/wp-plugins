<?php

class wp_queezly_media {

  public static function init()
  {
    if (is_admin()) {
      add_action('media_buttons', array(__class__, 'add_queezly_button'));
      add_action('wp_enqueue_media', array(__class__, 'include_queezly_media_js_files'));
    } else {
      add_action('wp_enqueue_scripts', array(__class__, 'include_queezly_script_js_files'));
    }
  }

  public static function add_queezly_button()
  {
    global $post;

    if ($post->post_type == "page" || $post->post_type == "post") {
      ?>
      <a href="#" id="wp-insert-queezly-queez" class="button">
        <span><img src="<?php echo QUEEZLY_PLUGIN_URL. 'images/icon.png' ?>"/></span><?php echo 'Embed a content'; ?></a>
      <?php
    }
  }

  public static function include_queezly_media_js_files()
  {
    wp_register_script(
      'queezly_media_js',
      QUEEZLY_PLUGIN_URL . 'js/queezly-media.js',
      array('jquery'),
      '1.0',
      true
    );

    wp_enqueue_script('queezly_media_js');
    wp_localize_script( 'queezly_media_js', 'WPQueezly', array(
      'QUEEZLY_URL' => QUEEZLY_URL
    ));
  }

  public static function include_queezly_script_js_files()
  {
    wp_register_script(
      'queezly_script_js',
      QUEEZLY_PLUGIN_URL . 'js/queezly-script.js',
      array('jquery'),
      '1.0',
      true
    );

    wp_enqueue_script('queezly_script_js');
    wp_localize_script( 'queezly_script_js', 'WPQueezly', array(
      'QUEEZLY_URL' => QUEEZLY_URL
    ));
  }
}
