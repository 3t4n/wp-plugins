<?php
/*
Plugin Name: Image Point
Plugin URI: http://saturnplugins.com
Description: A lightweight and responsive image map WordPress plugin
Author: SaturnPlugins
Version: 1.0.2
Author URI: http://saturnplugins.com/
*/

class ST_Image_Point {
    public function __construct() {
	    define( 'SIP_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
	    define( 'SIP_URL', untrailingslashit( plugins_url( '/', __FILE__ ) ) );
	    define( 'SIP_VERSION', '1.0.2' );

	    if ( is_admin() ) {
		    include_once( SIP_PATH . '/admin/sip-admin.php' );
	    }

	    if ( ! is_admin() ) {
		    include_once( SIP_PATH . '/inc/sip-render.php' );
	    }

	    load_plugin_textdomain( 'image-point', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	    add_action( 'init', array( $this, 'register_post_type' ) );
	    add_shortcode( 'image_point', array( $this, 'shortcode' ) );
    }

    public function register_post_type() {
	    register_post_type( 'image_point',
		    array(
			    'labels'              => array(
				    'name'                  => __( 'Image Points', 'saturnthemes-post-types' ),
				    'singular_name'         => __( 'Image Point', 'saturnthemes-post-types' ),
				    'menu_name'             => _x( 'Image Points', 'Admin menu name', 'saturnthemes-post-types' ),
				    'add_new'               => __( 'Add Image Point', 'saturnthemes-post-types' ),
				    'add_new_item'          => __( 'Add New Image Point', 'saturnthemes-post-types' ),
				    'edit'                  => __( 'Edit', 'saturnthemes-post-types' ),
				    'edit_item'             => __( 'Edit Image Point', 'saturnthemes-post-types' ),
				    'new_item'              => __( 'New Image Point', 'saturnthemes-post-types' ),
				    'view'                  => __( 'View Image Point', 'saturnthemes-post-types' ),
				    'view_item'             => __( 'View Image Point', 'saturnthemes-post-types' ),
				    'search_items'          => __( 'Search Image Points', 'saturnthemes-post-types' ),
				    'not_found'             => __( 'No Image Points found', 'saturnthemes-post-types' ),
				    'not_found_in_trash'    => __( 'No Image Points found in trash', 'saturnthemes-post-types' ),
			    ),
			    'public'              => true,
			    'show_in_menu'        => true,
			    'show_ui'             => true,
			    'capability_type'     => 'post',
			    'map_meta_cap'        => true,
			    'publicly_queryable'  => false,
			    'exclude_from_search' => true,
			    'hierarchical'        => false,
			    'rewrite'             => false,
			    'query_var'           => true,
			    'supports'            => array( 'title' ),
			    'show_in_nav_menus'   => false,
			    'menu_icon'           => 'dashicons-location',
		    )
	    );
    }

	public function shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'id' => 0,
		), $atts );

		$image_point = get_post( $atts['id'] );

		if ( empty( $image_point ) ) {
			return;
		}

		$data = get_post_meta( $image_point->ID, 'sip_image_point', true );
		$points = get_post_meta( $image_point->ID, 'sip_points', true );

		if ( empty( $data ) || empty( $points ) ) {
			return;
		}

		wp_enqueue_style( 'sip-style' );
		wp_enqueue_script( 'sip-script' );

		?>
<div class="sip-wrapper" id="sip-wrapper-<?php echo esc_attr( $image_point->ID ); ?>">
	<img src="<?php echo esc_url( $data['image'] ); ?>" alt="<?php echo esc_attr( $image_point->post_title ); ?>" />
	<?php foreach ( $points as $point ) : ?>
    <?php $point_type = ! empty( $point['icon_image'] ) ? 'image' : 'text'; ?>
    <?php $point_tag = ( 'link' == $point['popup_type'] ) ? 'a' : 'div'; ?>
    <<?php echo esc_html( $point_tag ); ?> <?php if ( 'link' == $point['popup_type'] && ! empty( $point['popup_link'] ) ) echo 'href="' . esc_url( $point['popup_link'] ) . '"'; ?> class="sip-point sip-point-icon-<?php echo esc_attr( $point_type ); ?>" data-left="<?php echo esc_attr( $point['left'] ); ?>" data-top="<?php echo esc_attr( $point['top'] ); ?>" style="<?php if ( ! empty( $point['icon_color'] ) ) echo esc_attr( 'color: ' . $point['color'] ); ?> <?php if ( ! empty( $point['icon_background'] ) ) echo esc_attr( 'background-color: ' . $point['icon_background'] ); ?>">
      <?php if ( ! empty( $point['icon_image'] ) ) : ?>
        <img class="sip-point-image" src="<?php echo esc_url( $point['icon_image'] ) ?>" />
      <?php else : ?>
          <span class="sip-point-text"><?php echo esc_html( $point['icon_text'] ) ?></span>
      <?php endif; ?>
      <?php if ( ! empty( $point['popup_title'] ) || ! empty( $point['popup_content'] ) || ! empty( $point['product'] ) ) : ?>
        <div class="sip-popup sip-popup-<?php echo esc_attr( $point['popup_type'] ); ?> sip-popup-<?php echo esc_attr( ! empty( $point['popup_position'] ) ? $point['popup_position'] : 'top' ); ?>">
          <div class="sip-popup-inner">
            <?php if ( 'popup' == $point['popup_type'] || 'link' == $point['popup_type'] ) : ?>

              <?php if ( ! empty( $point['popup_title'] ) ) : ?>
                <div class="sip-popup-title"><?php echo wp_kses_post( $point['popup_title'] ); ?></div>
              <?php endif; ?>
              <?php if ( ! empty( $point['popup_content'] ) ) : ?>
                <div class="sip-popup-content"><?php echo wp_kses_post( $point['popup_content'] ); ?></div>
              <?php endif; ?>

            <?php elseif ( 'product' == $point['popup_type'] && defined( 'WC_VERSION' ) ) : ?>
              <?php
              global $post;
              $post = get_post( $point['product'], OBJECT );
              setup_postdata( $post );

              global $product;

              woocommerce_template_loop_product_link_open();

              woocommerce_show_product_loop_sale_flash();
              woocommerce_template_loop_product_thumbnail();

              woocommerce_template_loop_product_title();

              woocommerce_template_loop_price();

              woocommerce_template_loop_product_link_close();

              echo '<div class="sip-product-control-container">';
              woocommerce_template_loop_add_to_cart();
              echo '<a href="'. get_the_permalink() .'" class="button">'. esc_html( 'Details', 'image-point' ) .'</a>';
              echo '</div>';

              wp_reset_postdata();
              ?>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
    </<?php echo esc_html( $point_tag ); ?>>
  <?php endforeach; ?>
</div>
<?php
	}
}

new ST_Image_Point();