<?php
/**
* Alpha Testimonials Widget
*
*/
?>
<?php

class Alpha_Widget extends WP_Widget {
  function alpha_widget() {
    $widget_ops = array('classname' => 'alpha_widget', 'description' => 'Include an testimonial sidebar carousel' );
    $this->WP_Widget('alpha_widget', 'Alpha Testimonials Widget', $widget_ops);
  }
  function widget($args, $instance) {
    extract($args);

    echo $before_widget;

    $title = $instance['widg_title'];
    $autoplay = $instance['widg_autoplay'];
    $delay = $instance['widg_delay'];
    $title_clr = $instance['widg_title_clr'];
    $text = $instance['widg_text'];
    $args = array(
          'post_type'      => 'tf_testimonials',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
          'status' => 'publish'
    );
    $testimonials = get_posts( $args );
        
    if( $testimonials ):
    ?>
    
    <div id="testimonials" class="tswd responsive" data-layout="alt" data-autoplay="<?php echo !empty($autoplay) ? $autoplay : 'on'; ?>" data-delay="<?php echo !empty($delay) ? $delay : ''; ?>">

        <div class="testim-ovl"></div>

        <?php echo ( !empty( $title ) ? ('<div id="wid-title"><h2 style="color: '. $title_clr .'">' . $title . '</h2></div>' ) : '' );  ?>

        <div class="testimonials-wrapper">

              <ul class="testimonials-line">

                <?php foreach( $testimonials as $testimonial ): ?>
                  <?php
                     setup_postdata($testiomonial);
                     $image[0] = get_template_directory_uri() . '/images/customer.png';;
                     if( has_post_thumbnail( $testimonial->ID ) ){
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ), 'customer-thumb' );
                     } 
                     $title = get_post_meta( $testimonial->ID, 'alpha_title', true ) ? get_post_meta( $testimonial->ID, 'alpha_title', true ) : '';
                     $company = get_post_meta( $testimonial->ID, 'alpha_company', true ) ? get_post_meta( $testimonial->ID, 'alpha_company', true ) : '';
                     $url  = get_post_meta( $post->ID, 'alpha_url', true ) ? get_post_meta( $post->ID, 'alpha_url', true ) : '';
                  ?>   

                  <li class="customer">

                      <div class="testimonial-bubble">
                          <p style="color: <?php echo $text; ?>"><?php echo get_post_meta( $testimonial->ID, 'tf_testimonial_content', true ); ?></p>
                      </div>

                      <div class="cus-profile">
                          <span class="cus-image"><img src="<?php echo $image[0]; ?>" width="75px" height="75px"></span>
                          <span class="cus-name">
                              <?php if( get_post_meta( $testimonial->ID, 'alpha_name', true ) ) echo get_post_meta( $testimonial->ID, 'alpha_name', true ); ?> 
                              <span class="cus-title"><?php echo $title . ' at ' . '<a href="' . $url . '" target="_BLANK">' . $company . '</a>'; ?> </span>
                          </span>  
                      </div>
                         
                    </li>

                    <?php endforeach; endif; ?>

                  <span id="prev" class="fa fa-chevron-left fa-3x"></span>
                  <span id="next" class="fa fa-chevron-right fa-3x"></span>    

            </ul><!-- .testimonials-line -->

        </div><!-- .testimonials-wrapper -->
                  
    </div><!-- .testimonials-widget -->  
  <?php    
    echo $after_widget;

    wp_reset_postdata();
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['widg_title']   = strip_tags($new_instance['widg_title']);
    $instance['widg_autoplay'] = $new_instance['widg_autoplay'];
    $instance['widg_delay']   = $new_instance['widg_delay'];
    $instance['widg_title_clr'] = $new_instance['widg_title_clr'];
    $instance['widg_text']   = $new_instance['widg_text'];

    return $instance;
  }

  function form($instance) {

    $instance = wp_parse_args( (array) $instance, array( 
        'widg_title' => 'Testimonials',
        'widg_title_clr' => 'lightgrey',
        'widg_autoplay' => 'on',
        'widg_text'   => '#fafafa',
        'widg_delay'   => 3500
    ) );

    $title = strip_tags($instance['widg_title']);
    $title_clr = $instance['widg_title_clr'];
    $text = $instance['widg_text'];
    $title_clr = $instance['widg_title_clr'];
    $delay = $instance['widg_delay'];
    $autoplay = $instance['widg_autoplay'];

  ?>
  <p>
    <label for="<?php echo $this->get_field_id('widg_title'); ?>">Title:
      <input class="widefat" id="<?php echo $this->get_field_id('widg_title'); ?>" name="<?php echo $this->get_field_name('widg_title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
    </label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('widg_title_clr'); ?>">Title Color:
      <input class="widefat" id="<?php echo $this->get_field_id('widg_title_clr'); ?>" name="<?php echo $this->get_field_name('widg_title_clr'); ?>" type="color" value="<?php echo $title_clr; ?>" />
    </label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('widg_text'); ?>">Text Color:
      <input class="widefat" id="<?php echo $this->get_field_id('widg_text'); ?>" name="<?php echo $this->get_field_name('widg_text'); ?>" type="color" value="<?php echo $text; ?>" />
    </label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('widg_autoplay'); ?>">Autoplay:
      <select name="<?php echo $this->get_field_name('widg_autoplay'); ?>" id="<?php echo $this->get_field_id('widg_autoplay'); ?>">
        <option value="on" <?php if( 'on' === $autoplay  ) echo 'selected="selected"'; ?>>On</option>
        <option value="off" <?php if( 'off' === $autoplay ) echo 'selected="selected"'; ?>>Off</option>
      </select> 
    </label>
  </p>
   <p>
    <label for="<?php echo $this->get_field_id('widg_delay'); ?>">Autoplay Delay (if autoplay enabled):
      <input class="widefat" id="<?php echo $this->get_field_id('widg_delay'); ?>" name="<?php echo $this->get_field_name('widg_delay'); ?>" type="text" value="<?php echo intval($delay); ?>" />
    </label>
  </p>
  <?php
    }
  }

  add_action('widgets_init', 'register_alpha_widget');
  function register_alpha_widget() {
    register_widget('Alpha_Widget');
  }
?>