<?php

/**
 * @package Arena Notice
 * @author Arena
 * @copyright (C) 2017- Arena
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div class="updated albfre-notice">
  <div class="albfre-notice--container">
    <div class="albfre-notice--info">
      <a href="<?php echo esc_url(admin_url('options-general.php?page=albfre_plugin')); ?>" class="albfre-notice--info--button">
        <?php esc_html_e('SET UP YOUR ARENA ACCOUNT', 'albfre'); ?>
      </a>
      <div class="albfre-notice--info--text">
        <?php esc_html_e('Almost done! Login to Arena and set all your events on wordpress', 'albfre'); ?>
      </div>
    </div>
    <div>
      <?php 
      $image_path = plugins_url( 'assets/albfre_alpha_white.png' , dirname(__FILE__) );
      
      // Try to get image from media library first
      $image_id = attachment_url_to_postid($image_path);
      
      if ($image_id) {
        // Use wp_get_attachment_image if image is in media library
        echo wp_get_attachment_image(
          $image_id,
          'full',
          false,
          array(
            'class' => 'albfre-notice--logo',
            'alt' => esc_attr__('Arena Logo', 'albfre')
          )
        );
      } else {
        // Fallback to direct img tag with proper escaping
        printf(
          '<img src="%s" class="albfre-notice--logo" alt="%s">',
          esc_url($image_path),
          esc_attr__('Arena Logo', 'albfre')
        );
      }
      ?>
    </div>
  </div>
</div>