<?php

function as_woo_owl_excerpt($num) {
global $post;
$as_woo_owl_exce = strip_tags($post->post_excerpt);

echo substr($as_woo_owl_exce, 0, $num);
}

function as_woo_owl_add_cart_button($button, $add_to_cartsdsd, $text = 'Add to cart', $id, $after_carttext = 'View Cart'){
 $as_woo_set_value = get_option('as_woo_owl_all_settings_save');

if($button == 'default'){
	$button = 'themeforest';
}
global $woocommerce;
$as_woo_loader = as_woo_owl_url.'/ico/ajax-loader.gif';
$as_woo_loader = (!empty($as_woo_set_value['as_atc_loader_gif'])) ? $as_woo_set_value['as_atc_loader_gif'] : $as_woo_loader ;
$as_opc = ($as_woo_set_value['as_woo_add_to_cart_bg_opacity'] == 10) ? 1 : '0.'.$as_woo_set_value['as_woo_add_to_cart_bg_opacity'] ;
if ($add_to_cartsdsd == 'true') {
  return apply_filters( 'as_woo_owl_add_to_cart',
    sprintf( '<a href="%s" id="%s" rel="nofollow" as_woo_owl_product_id="%s" class="'.$button.'" ><span class="as_woo_owl_ajax_loader_gif" style="background-color: rgba('.as_woo_owl_hex2rgb($as_woo_set_value['as_woo_add_to_cart_bg_color']).','.$as_opc.');background-image:url(\'%s\');"></span>%s</a><a href="%s" class="as_woo_owl_view_cart '.$button.'" id="as_woo_owl_'.$id.'_new_id">%s</a>',
      esc_url( $woocommerce->cart->get_cart_url() ),
      esc_attr( 'as_woo_owl_ajax_add_to_cart' ),
      esc_attr( $id ),
      esc_url( $as_woo_loader ),
      esc_html( $text ),
      esc_url( $woocommerce->cart->get_cart_url() ),
      esc_html( $after_carttext )
    ),
  $product );
}else{
  echo '<a href="'.get_the_permalink().'" class="'.$button.'" >Add to cart</a>';
}

}


function as_woocommerce_owl_featured_shortcode($atts, $content = null){
  $as_woo_set_value = get_option('as_woo_owl_all_settings_save');
  $as_woo_d_limit = (empty($as_woo_set_value)) ? 0 : $as_woo_set_value['as_woo_d_limit'] ;
	$as_woo_featured = extract(shortcode_atts( array(
               'carousel_name'      => '',
               'items'             => '',
               'itemsdesktop'       => '',
               'itemsdesktopsmall'  => '',
               'itemstablet'        => '',
               'itemstabletsmall'  => '',
               'itemsmobile'  => '',
               'singleitem'   => '',
               'itemsscaleup' => '',
               'slidespeed'   => '',
               'paginationspeed'   => '',
               'rewindspeed'  => '',
               'autoplay'     => '',
               'stoponhover'  => '',
               'navigation'   => '',
               'navigationtext'    => '',
               'rewindnav'    => '',
               'scrollperpage'     => '',
               'pagination'   => '',
               'paginationnumbers' => '',
               'responsive'   => '',
               'lazyload'     => '',
               'lazyfollow'   => '',
               'lazyeffect'   => '',
               'mousedrag'    => '',
               'touchdrag'    => '',
               'afterlazyload'     => '',
               'add_to_cart'     => 'true',
               'icon'     => 'left11.right11',
               'button'     => 'default',
               'porduct_type'     => '_featured',
               'show_porducts'    => -1,
               'product_cat'      => ''
		), $atts));
	ob_start();
	//start product query

if ($porduct_type == '_featured') {
  $as_query = array(
  'post_type'         => 'product',
  'post_status'       => 'publish',
  'posts_per_page'    => -1,
  'meta_query'      => array(
          array(
            'key' => '_visibility',
            'value' => array('catalog', 'visible'),
            'compare' => 'IN'
            ),
            array(
              'key' => '_featured',
              'value' => 'yes'
              )
            )
          );
}else{
  $porduct_type = trim($porduct_type);
  $porduct_type = preg_replace('/\s+/', '', $porduct_type);
  $porduct_type = sanitize_text_field( $porduct_type );

  $product_cat = trim($product_cat);
  $product_cat = preg_replace('/\s+/', '', $product_cat);
  $product_cat = sanitize_text_field( $product_cat );

  $as_query = array(
    'product_cat'       => (!empty($product_cat)) ? $product_cat : '',
    'post_type'         => 'product',
    'post_status'       => 'publish',
    'posts_per_page'    => -1
          );
}


	$as_product_query = new WP_query($as_query);

$icon = explode('.', $icon);

  ?>

  <script>

  jQuery(document).ready(function($) {

    var as_woo_owl_ac = $("#as_woo_owl_name_<?php echo $carousel_name; ?>");
  as_woo_owl_ac.owlCarousel({
      <?php

      if (!empty($items)) {
        echo 'items : '.$items .',';
      }
      if (!empty($itemsdesktop)) {
        echo 'itemsDesktop : ['.$itemsdesktop .'],';
      }
      if (!empty($itemsdesktopsmall)) {
        echo 'itemsDesktopSmall : ['. $itemsdesktopsmall.'],';
      }
      if (!empty($itemstablet)) {
         echo 'itemsTablet: ['.$itemstablet.'],';
      }
      if (!empty($itemstabletsmall)) {
        echo 'itemsTabletSmall : '.$itemstabletsmall.',';
      }
      if (!empty($itemsmobile)) {
        echo 'itemsMobile : ['.$itemsmobile.'],';
      }
      if (!empty($singleitem)) {
        echo 'singleItem : '.$singleitem.',';
      }
      if (!empty($itemsscaleup)) {
        echo 'itemsScaleUp : '.$itemsscaleup.',';
      }
      if (!empty($slidespeed)) {
        echo 'slideSpeed : '.$slidespeed.',';
      }
      if (!empty($paginationspeed)) {
        echo 'paginationSpeed : '.$paginationspeed.',';
      }
      if (!empty($rewindspeed)) {
        echo 'rewindSpeed : '.$rewindspeed.',';
      }
      if (!empty($autoplay)) {
        echo 'autoPlay : '.$autoplay.',';
      }
      if (!empty($stoponhover)) {
        echo 'stopOnHover : '.$stoponhover.',';
      }
      if (!empty($navigation)) {
        echo 'navigation : '.$navigation.',';
      }
      if (!empty($navigationtext)) {
        echo 'navigationText : ['.$navigationtext.'],';
      }
      if (!empty($rewindnav)) {
        echo 'rewindNav : '.$rewindnav.',';
      }
      if (!empty($scrollperpage)) {
        echo 'scrollPerPage : '.$scrollperpage.',';
      }
      if (!empty($pagination)) {
        echo 'pagination : '.$pagination.',';
      }
      if (!empty($paginationnumbers)) {
        echo 'paginationNumbers : '.$paginationnumbers.',';
      }
      if (!empty($responsive)) {
        echo 'responsive : '.$responsive.',';
      }
      if (!empty($lazyload)) {
        echo 'lazyLoad : '.$lazyload.',';
      }
      if (!empty($lazyfollow)) {
        echo 'lazyFollow : '.$lazyfollow.',';
      }
      if (!empty($lazyeffect)) {
        echo 'lazyEffect : "'.$lazyeffect.'",';
      }
      if (!empty($mousedrag)) {
        echo 'mouseDrag : '.$mousedrag.',';
      }
      if (!empty($touchdrag)) {
        echo 'touchDrag : '.$touchdrag.',';
      }
      if (!empty($afterlazyload)) {
        echo 'afterLazyLoad : '.$afterlazyload.',';
      }
        ?>
  });

    $(".as_woo_owl_prev_<?php echo $carousel_name; ?>").click(function(){
        as_woo_owl_ac.trigger('owl.next');
    })
    $(".as_woo_owl_next_<?php echo $carousel_name; ?>").click(function(){
        as_woo_owl_ac.trigger('owl.prev');
    })


  });
  </script>

<div class="as_woo_owl_outer as_def_pre_load">
<?php
$as_spin    = as_woo_owl_url.'/ico/spin.gif';
$as_woo_img = (!empty($as_woo_set_value['loader_gif'])) ? $as_woo_set_value['loader_gif'] : $as_spin ;
$as_bg_op    = ($as_woo_set_value['as_woo_loader_bg_opacity'] == 10) ? 1 : '0.'.$as_woo_set_value['as_woo_loader_bg_opacity'] ;

?>
<div class="as_woo_pre_load" style="background-image: url('<?php echo $as_woo_img; ?>');">
</div>
<style>
  .as_def_pre_load:before{
    background-color: <?php echo $as_woo_set_value['as_woo_loader_bg_color']; ?>;
    opacity: <?php echo $as_bg_op; ?>;
  }
</style>

    <div class="as_woo_owl_next_<?php echo $carousel_name; ?> as_woo_owl_next">
        <img src="<?php echo plugins_url( '../ico/'.$icon[1].'.png', __FILE__ ) ?>" alt="">
    </div>
    <div id="as_woo_owl_name_<?php echo $carousel_name; ?>" class="as_woo_owl_middil">

<?php	while ( $as_product_query->have_posts() ) : $as_product_query->the_post(); ?>


<div class="as_woo_owl_item">
	<figure class="as_woo_owl_image">
		<a href="<?php echo get_the_permalink(); ?>"><?php
$as_woo_img = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'as_woo_owl_image' );
?>
    <img style="max-height:200px;" src="<?php echo $as_woo_img[0] ?>" alt="<?php echo get_the_title(); ?>">
</a>
	</figure>
	<div class="as_woo_owl_content">
		<h3>
		    <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>         </h3>
		<div class="as_woo_owl_description">
			<?php global $product; if ( $price_html = $product->get_price_html() ) : ?>
			<span class="as_woo_owl_price" as_woo_oel="<?php echo get_the_id(); ?>"><?php echo $price_html; ?></span>
			<?php endif; ?>
<?php

if ($as_woo_d_limit != 0) {
  ?>
      <div class="as_woo_owl_pera" >
        <p><?php as_woo_owl_excerpt($as_woo_d_limit); ?></p>
      </div>
  <?php
}
?>



		</div>
		<div class="as_woo_owl_add_to_cart_button">
		    <?php echo as_woo_owl_add_cart_button($button, $add_to_cart, 'Add to cart', $product->id ); ?>
		</div>

	</div>
</div>


	<?php
	endwhile;
    ?>
    </div>
    <div class="as_woo_owl_prev_<?php echo $carousel_name; ?> as_woo_owl_prev">
    <img src="<?php echo plugins_url( '../ico/'.$icon[0].'.png', __FILE__ ) ?>" alt="">
    </div>

    </div>

	<?php
	return ob_get_clean();
}
add_shortcode('as_featured_product','as_woocommerce_owl_featured_shortcode');