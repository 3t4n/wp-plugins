<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

// Shortcoded Options
$hmlsCategory = isset( $hmlsAttr['category'] ) ? $hmlsAttr['category'] : '';
$hmlsDisplay  = isset( $hmlsAttr['display'] ) ? $hmlsAttr['display'] : '';
$hmlsLayout   = isset( $hmlsAttr['layout'] ) ? $hmlsAttr['layout'] : 'slide';
$hmlsOrderby  = isset( $hmlsAttr['orderby'] ) ? $hmlsAttr['orderby'] : 'menu_order';
$hmlsOrder    = isset( $hmlsAttr['order'] ) ? $hmlsAttr['order'] : 'ASC';

$hmls_arr = array(
  'post_type'   => 'hmls_logo',
  'post_status' => 'publish',
  'orderby'     => $hmlsOrderby,
  'order'       => $hmlsOrder,
  'meta_query' => array(
    'relation' => 'and',
      array(
        'key' => 'hmls_status',
        'value' => 'active',
        'compare' => '='
      ),
  ),
);

// If Categor params found in shortcode
if ( $hmlsCategory ) {
  $hmls_arr['tax_query'] = array(
    array(
      'taxonomy'  => 'logo_category',
      'field'     => 'slug',
      'terms'     => $hmlsCategory
    )
  );
}

// If display params found in shortcode
if ( $hmlsDisplay ) {
  $hmls_arr['posts_per_page'] = $hmlsDisplay;
}

$hmls_logos = new WP_Query( $hmls_arr );

if ( $hmls_logos->have_posts() ) {
    if ( 'grid' === $hmlsLayout ) {
      include HMLS_PATH . 'front/view/layout/grid.php';
    }
    if ( 'slide' === $hmlsLayout ) {
      include HMLS_PATH . 'front/view/layout/slide2.php';
    }
}  else {
  ?>
  <p class="hmls-no-logos-found"><?php _e('No logos found!', HMLS_TXT_DOMAIN); ?></p>
  <?php
}
wp_reset_postdata();
?>