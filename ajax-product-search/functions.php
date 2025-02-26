<?php 

// Ajax Search Shortcode
function ajax_product_search( $atts, $content = null  ) {

  extract( shortcode_atts( array(
    'placeholder' => 'Search...',
    'button' => 'Search'
  ), $atts ) );

  ob_start(); ?>
   
	<form class="ajax-search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
    <input type="text" name="s" id="keyword" onkeyup="fetch()" placeholder="<?php echo esc_attr_x( $placeholder, 'placeholder', 'startesk' ); ?>">
    <button type="submit"><?php echo esc_html( $button ) ?></button>
    <input type="hidden" name="post_type" value="product" />
	</form>
	<div id="productDataFetch"></div>

  <?php
  return ob_get_clean();
};

add_shortcode('ajaxsearch', 'ajax_product_search');