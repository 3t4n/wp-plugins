<?php
  if( !class_exists( 'Alpha_Shortcode' ) ) {
    class Alpha_Shortcode {

      public static function setup(){ 
        add_shortcode( 'ates', array( 'Alpha_Shortcode', 'shortcode') );
      }

      public static function shortcode( $atts ){ 

        $args = array(
          'post_type'      => 'tf_testimonials',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
          'status' => 'publish'
        );
        $testimonials = get_posts( $args );
        $the_title = get_option('alpha-title');
        $layout = get_option('alpha-layout');  
        $delay = get_option('alpha-delay');
        $autoplay = get_option('alpha-autoplay');
        if( $testimonials ):
        $output = '<section id="testimonials" data-autoplay="'. ( !empty($autoplay[0]) ? $autoplay[0] : 'on' ) .'" data-delay="' . ( !empty($delay) ? $delay : 3500 ) . '" data-layout="' .( !empty($layout[0]) ? $layout[0] : 'default' ) . '">';
        $output .= '<div class="testim-ovl"></div>';
        $output .= ( !empty( $the_title ) ? ('<div id="tes-title"><h2>' . $the_title . '</h2></div>' ) : '' );
        $output .= '<div class="testimonials-wrapper">';
        $output .= '<ul class="testimonials-line">';
        foreach( $testimonials as $testimonial ):
          setup_postdata($testimonial);
          $image[0] = plugin_dir_url( __FILE__ ) . '../images/customer.png';
          if( has_post_thumbnail( $testimonial->ID ) ){
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ), 'customer-thumb' );
          } 
          $title = get_post_meta( $testimonial->ID, 'alpha_title', true ) ? get_post_meta( $testimonial->ID, 'alpha_title', true ) : '';
          $company = get_post_meta( $testimonial->ID, 'alpha_company', true ) ? get_post_meta( $testimonial->ID, 'alpha_company', true ) : '';
          $url  = get_post_meta( $testimonial->ID, 'alpha_url', true ) ? get_post_meta( $testimonialt->ID, 'alpha_url', true ) : '';
          $output .= '<li class="customer">';
          $output .= '<div class="testimonial-bubble">';
          $output .= '<p>' . get_post_meta( $testimonial->ID, 'tf_testimonial_content', true ) . '</p></div>';
          $output .= '<div class="cus-profile">';
          $output .= '<span class="cus-image"><img src="' . $image[0] . '" width="75px" height="75px"></span>';
          $output .= '<span class="cus-name">';
          if( get_post_meta( $testimonial->ID, 'alpha_name', true ) ) $output .= get_post_meta( $testimonial->ID, 'alpha_name', true );
          $output .= '<span class="cus-title">' . $title . ' at ' . '<a href="' . $url . '" target="_BLANK">' . $company . '</a> </span></span></div></li>';
        endforeach; endif;
        $output .= '<span id="prev"></span>';
        $output .= '<span id="next"></span>';    
        $output .= '<div class="tes_bullets"></div>';
        $output .= '</ul><!-- .testimonials-line --></div><!-- .testimonials-wrapper --></section><!-- .testimonials -->';  
        wp_reset_postdata();

        return $output;
      }
      //initializating function
      public static function initialize() {
         self::setup();
      }
    }
  }
?>