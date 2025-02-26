<?php
/**
 * latest post single blog style  Widget
 *
 * @since 1.0.0
 *
 * @package Aazeen extension
 */



 if ( !class_exists( 'aazeen_product_carousel' ) ) {

    class aazeen_product_carousel extends WP_Widget {

      public function __construct() {
        parent::__construct(
          'aazeen_product_carousel',
          __( 'Aazeen - Product carousel', 'aazeen-extension' ),
          array(
            'description' => __( '(Product carousel style) Displays product from a choosen category.(Home page & sidebar) ', 'aazeen-extension' ),
          )
        );
      $this->alt_option_name = 'aazeen_product_carousel';
      }

      /**
      * Display Widget
      *
      * @param $args
      * @param $instance
      */
      function widget($args, $instance) {
        extract($args);
        $auto_play = ( ! empty( $instance['auto_play'] ) ) ? wp_kses_post( $instance['auto_play'] ) : '';
        $slidesto_show = ( ! empty( $instance['slidesto_show'] ) ) ? absint( $instance['slidesto_show'] ) : 3;
        $number_posts = ( ! empty( $instance['number_posts'] ) ) ? absint( $instance['number_posts'] ) : 3;
        $category = ( isset( $instance['category'] ) ) ? $instance['category']  : '';
        $title_color_picker = isset($instance['title_color_picker']) ? $instance['title_color_picker'] : '#0a0a0a';
        $bg_color = isset( $instance['bg_color'] ) ? $instance['bg_color'] : '#BCBDD4';
 			  $content_bgimage = isset( $instance['content_bgimage'] ) ? $instance['content_bgimage'] : '';
  			$fixed_bg = isset( $instance['fixed_bg'] ) ? $instance['fixed_bg'] : false;

        echo $before_widget;
        ?>
        <?php $id= $this->id; ?>
 			 <style>
 				#<?php echo $id;?> .separator-center::after{border-bottom-color:<?php echo esc_attr($instance['title_color']); ?>;}
 			 </style>

        <div  class="padding-vertical-2" style="Background-color:<?php echo $bg_color; ?>;<?php if (!empty($content_bgimage)): ?> background:url(<?php echo $content_bgimage ;?>) no-repeat <?php if ( $fixed_bg ) : ?> fixed <?php endif; ?> ; background-size: cover;<?php endif; ?>">
 			 <?php if ( !empty($instance['title']) || !empty($instance['sub_title']) ):?>
 	 			<div class="grid-container">
 	 				<div class="section-header text-center margin-bottom-3 " >
 	 					<?php if( !empty($instance['title']) ): ?>
 	 						<h2 class="section-title separator-center"  style="color:<?php echo esc_attr($instance['title_color']); ?>;" >
 	 							<?php echo apply_filters('widget_title', $instance['title']); ?>
 	 						</h2>
 	 					<?php endif;?>
 	 					<?php if( !empty($instance['sub_title']) ): ?>
 	 						<div class="section-description">
 	 							<h4 class="subheader" style="color:<?php echo esc_attr($instance['subtitle_color']); ?>;" ><?php echo apply_filters('widget_title', $instance['sub_title']); ?></h4>
 	 						</div>
 	 					<?php endif;?>
 	 				</div><!--section head end-->
 	 			</div><!--row end-->
 	 		<?php endif; ?>
      <div class="grid-container">
        <div class="lates-post-carousel Product-carousel woocommerce"  >
          <div class="post-wrap-carousel" >
            <?php
            $args = array(
              'post_type' => 'product',
              'posts_per_page' => $number_posts,
              'product_cat' => $category
            );
            $loop_carousel_aazeen = new WP_Query( $args );?>
            <div class="carousel-layout4" data-slick='{"slidesToShow":<?php echo $slidesto_show;?>,"autoplay":<?php echo $auto_play;?>}'>
              <?php
              while ( $loop_carousel_aazeen->have_posts() ) : $loop_carousel_aazeen->the_post(); global $product; global $post;?>
                  <article class="post-carousel-warp">
                    <div class="post-thumbouter">
                    <?php  woocommerce_show_product_sale_flash();?>
                      <div class="post-thumb-carousel ">
                        <?php aazeen_extension_woocommerce_template_carousel_product_thumbnail($loop_carousel_aazeen->post->ID);?>
                      </div>
                      <div class="product-contentouter">
                        <div class="card-content-absolute">
                          <h6 class="product-price">
                            <?php
                            $product_price = $product->get_price_html();
                            if ( ! empty( $product_price ) ) {
                              echo '<span class="price">';
                              echo wp_kses(
                                $product_price, array(
                                  'span' => array(
                                    'class' => array(),
                                  ),
                                  'del'  => array(),
                                )
                              );
                              echo '</span>';
                            }
                            ?>
                          </h6>
                          <h3 class="post-title is-font-size-4">
                              <a class="shop-item-title-link" href="<?php the_permalink( $loop_carousel_aazeen->post->ID ); ?>" title="<?php echo esc_attr($loop_carousel_aazeen->post->post_title ? $loop_carousel_aazeen->post->post_title : $loop_carousel_aazeen->post->ID); ?>"><?php esc_html( the_title() ); ?></a>
                          </h3>
                          <?php aazeen_template_loop_add_to_cart($loop_carousel_aazeen->post, $product ); ?>
                        </div>
                        </div>
                    </div>
                    </article >
                <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
            </div>
          </div>
          </div>
          </div>
          </div>
  <?php
  echo $after_widget;
  }

public function update( $new_instance, $old_instance ) {
  $instance = $old_instance;
  $instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
  $instance[ 'category' ]	=  $new_instance[ 'category' ] ;
  $instance[ 'number_posts' ] = (int)$new_instance[ 'number_posts' ];
  $instance[ 'show_post_row' ]	= wp_kses_post( $new_instance[ 'show_post_row' ] );
  $instance[ 'slidesto_show' ] = (int)$new_instance[ 'slidesto_show' ];
  $instance[ 'auto_play' ]	= wp_kses_post( $new_instance[ 'auto_play' ] );
  $instance['title_color'] = sanitize_hex_color($new_instance['title_color']);
  $instance['subtitle_color'] = sanitize_hex_color($new_instance['subtitle_color']);
  $instance['bg_color'] = sanitize_hex_color($new_instance['bg_color']);
  $instance['content_bgimage'] = strip_tags($new_instance['content_bgimage']);

  $instance['fixed_bg'] = isset( $new_instance['fixed_bg'] ) ? (bool) $new_instance['fixed_bg'] : false;


  return $instance;
}

function form($instance) {
  /* Set up some default widget settings. */
 $defaults = array(

 'category' => 'show_option_all',
 'title' => 'Popular Products ',
  'number_posts' => '5',
 'slidesto_show'=>'3',
 'auto_play'=>'true',
 'title_color' => '#0a0a0a',
 'subtitle_color' => '#747474',
 'bg_color' => '#fff',


 );
 $instance = wp_parse_args( (array) $instance, $defaults );
 $fixed_bg = isset( $instance['fixed_bg'] ) ? (bool) $instance['fixed_bg'] : false;

 ?>

 <p>
      <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Main Title', 'aazeen-extension'); ?></label>
      <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
  </p>

  <p>
      <label for="<?php echo $this->get_field_id('sub_title'); ?>"><?php _e('Sub Title', 'aazeen-extension'); ?></label>
      <input type="text" name="<?php echo $this->get_field_name('sub_title'); ?>" id="<?php echo $this->get_field_id('sub_title'); ?>" value="<?php if( !empty($instance['sub_title']) ): echo $instance['sub_title']; endif; ?>" class="widefat">
  </p>
  <p>
    <label><?php esc_html_e( 'Select a Product category', 'aazeen-extension' ); ?></label>
    <?php $args = array(
  'show_option_all'    => 'Show all posts',
  'orderby'            => 'ID',
  'order'              => 'ASC',
  'show_count'         => 1,
  'hide_empty'         => 1,
  'selected'           => $instance['category'],
  'hierarchical'       => 0,
  'name'               => $this->get_field_name('category'),
  'taxonomy'           => 'product_cat',
  'value_field'	     => 'slug',
  ); ?>
    <?php wp_dropdown_categories( $args ); ?>
  </p>


  <p>
    <label for="<?php echo $this->get_field_id( 'number_posts' ); ?>"><?php esc_html_e( 'Number of Products:', 'aazeen-extension' ); ?></label>
    <input type="number" id="<?php echo $this->get_field_id( 'number_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_posts' ); ?>" value="<?php echo absint( $instance['number_posts'] ); ?>" size="3"/>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'slidesto_show' ); ?>"><?php esc_html_e( 'slides to show', 'aazeen-extension' ); ?></label>
    <input type="number" id="<?php echo $this->get_field_id( 'slidesto_show' ); ?>" name="<?php echo $this->get_field_name( 'slidesto_show' ); ?>" value="<?php echo absint( $instance['slidesto_show'] ); ?>" size="3"/>
  </p>
  <p>
  <label for="<?php echo $this->get_field_id('auto_play'); ?>"><?php _e('Auto play', 'aazeen-extension') ?></label>
  <select id="<?php echo $this->get_field_id('auto_play'); ?>" name="<?php echo $this->get_field_name('auto_play'); ?>" class="widefat">
    <option value="true" <?php if ( 'true' == $instance['auto_play'] ) echo 'selected="selected"'; ?>><?php esc_html_e('ON', 'aazeen-extension') ?></option>
    <option value="false" <?php if ( 'false' == $instance['auto_play'] ) echo 'selected="selected"'; ?>><?php esc_html_e('OFF', 'aazeen-extension') ?></option>
  </select>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'title_color' ); ?>" class="icon-color"><?php _e('Title Color', 'aazeen-extension') ?></label>
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'title_color' ); ?>" name="<?php echo $this->get_field_name( 'title_color' ); ?>" value="<?php echo $instance['title_color']; ?>" type="text" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" class="icon-color"><?php _e('Sub Title Color', 'aazeen-extension') ?></label>
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'subtitle_color' ); ?>" name="<?php echo $this->get_field_name( 'subtitle_color' ); ?>" value="<?php echo $instance['subtitle_color']; ?>" type="text" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>" class="icon-color"><?php _e('Background Color', 'aazeen-extension') ?></label>
    <input class="widefat color-picker" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" type="text" />
  </p>
  <p>
    <div class="widget_input_wrap">
        <label for="<?php echo $this->get_field_id( 'content_bgimage' ); ?>"><?php _e('Background Image ', 'aazeen-extension') ?></label>
        <div class="media-picker-wrap">
        <?php if(!empty($instance['content_bgimage'])) { ?>
            <img style="max-width:100%; height:auto;" class="media-picker-preview" src="<?php echo esc_url($instance['content_bgimage']); ?>" />
            <i class="fa fa-times media-picker-remove"></i>
        <?php } ?>

        <input class="widefat media-picker" id="<?php echo $this->get_field_id( 'content_bgimage' ); ?>" name="<?php echo $this->get_field_name( 'content_bgimage' ); ?>" value="<?php if( !empty($instance['content_bgimage']) ): echo $instance['content_bgimage']; endif; ?>" type="hidden" />
        <a class="media-picker-button button" onclick="mediaPicker(this.id)" id="<?php echo $this->get_field_id( 'content_bgimage' ).'mpick'; ?>"><?php _e('Select Image', 'aazeen-extension') ?></a>
        </div>
    </div>
  </p>
  <!-- About Content TITLE DIVIDER Field -->
  <p><input class="checkbox" type="checkbox"<?php checked( $fixed_bg ); ?> id="<?php echo $this->get_field_id( 'fixed_bg' ); ?>" name="<?php echo $this->get_field_name( 'fixed_bg' ); ?>" />
  <label for="<?php echo $this->get_field_id( 'fixed_bg' ); ?>"><?php _e( 'background image fixed', 'aazeen-extension' ); ?></label></p>

  <?php
    }
  }
}


// register aazeen dual category posts widget
function aazeen_aazeen_product_carousel_reg() {
    register_widget( 'aazeen_product_carousel' );
}
add_action( 'widgets_init', 'aazeen_aazeen_product_carousel_reg' );
