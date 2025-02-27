<?php

class ImageHotspotBlockRenderer {
  function __construct() {}

  function render($attributes) {
    if (!is_admin()) {
      wp_enqueue_script('imagehotspotblockFrontend', IMAGE_HOTSPOT_BLOCK_PLUGIN_URL . 'build/frontend.js', array('wp-element'));
    }
  
    if (isset($attributes['dots']) && count($attributes['dots']) > 0) {
      foreach ($attributes['dots'] as &$dot) {
        /**
         * Update wcProduct with current data
         */
        if ($dot['wcProduct']['productId'] && class_exists('WC_Product')) {
          $product = new WC_Product($dot['wcProduct']['productId']);
          $dot['wcProduct']['productPermalink'] = get_permalink($product->get_id());
          $dot['wcProduct']['productName'] = $product->get_name();
          $dot['wcProduct']['productShortDescription'] = $product->get_short_description();
          $dot['wcProduct']['productPrice'] = $product->get_price_html();
          if($product->get_image_id()) {
            $size = $dot['wcProduct']['productFeaturedImage']['size'];
            $imageUrl = wp_get_attachment_image_src($product->get_image_id(), $size)[0];
            $dot['wcProduct']['productFeaturedImage']['url'] = $imageUrl;
          }
        }
      }
    }
  
    ob_start();
    ?>
      <div class="image-hotspot-block-container align<?php if(isset($attributes['align'])) echo esc_attr($attributes['align']); ?>">
        <pre style="display: none;"><?php echo json_encode($attributes, JSON_HEX_QUOT | JSON_HEX_TAG); ?></pre>
      </div>
    <?php
    return ob_get_clean();
  }
} 
