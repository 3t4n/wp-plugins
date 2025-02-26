<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$settings = $this->get_settings_for_display();
?>
         <div class="aefe-some-review-contents-area fix">
            <div class="aefe-some-review-content-slide fix owl-carousel">
              <?php if(!empty($settings['aefe_testimonial_slider_list'])) : foreach($settings['aefe_testimonial_slider_list'] as $testimonial_slider) : 

                				if ( ! empty( $testimonial_slider['aefe_testimonial_slider_fb_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_fb_url', $testimonial_slider['aefe_testimonial_slider_fb_url'] );
                        }
                
                        //for facebook url
                        if ( ! empty( $testimonial_slider['aefe_testimonial_slider_tw_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_tw_url', $testimonial_slider['aefe_testimonial_slider_tw_url'] );
                        }
                
                        //for linkedin url
                        if ( ! empty( $testimonial_slider['aefe_testimonial_slider_linkd_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_linkd_url', $testimonial_slider['aefe_testimonial_slider_linkd_url'] );
                        }
                
                        //for dribbble url
                        if ( ! empty( $testimonial_slider['aefe_testimonial_slider_drib_url']['url'] ) ) {
                          $this->add_link_attributes( 'aefe_testimonial_slider_drib_url', $testimonial_slider['aefe_testimonial_slider_drib_url'] );
                        }
                
                ?>
              <!--Single Some Review -->
              <div class="aefe-single-some-review">
                <div class="aefe-single-some-review-img">
                  <?php if(!empty($testimonial_slider['aefe_testimonial_slider_img']['url'])) : ?>
                    <img src="<?php echo esc_url($testimonial_slider['aefe_testimonial_slider_img']['url']); ?>" alt="">
                  <?php else : ?>
                    <img src="<?php echo AEFE_URL ?>assets/img/single-team-member.png" alt="">
                  <?php endif; ?>

                </div>
                <div class="aefe-single-some-review-title fix">
                  <h2><a><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_title']); ?></a></h2>
                  <h4><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_subtitle']); ?></h4>
                  <?php if(!empty($testimonial_slider['aefe_testimonial_slider_rating']) && '0' !== $testimonial_slider['aefe_testimonial_slider_rating']) : 
                    $tst_val = $testimonial_slider['aefe_testimonial_slider_rating']; 
                  ?>
                    <div class="aefe-tms-testimonial-rating">
                        <?php
                            for ($x = 1; $x <= $tst_val; $x++)  :    
                        ?>
                            <i class="fa fa-star"></i>
                        <?php endfor;?> 
                    </div>
                  <?php  endif; ?>
                </div>
                <div class="aefe-single-some-review-content fix">
                  <p><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_content']); ?></p>
                 
               
                </div>
                <div class="aefe-single-some-review-social fix">          
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_fb_url' ); ?>><i class="fa fa-facebook"></i></a>
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_tw_url' ); ?>><i class="fa fa-twitter"></i></a>
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_linkd_url' ); ?>><i class="fa fa-linkedin"></i></a>
                  <a <?php echo $this->get_render_attribute_string( 'aefe_testimonial_slider_drib_url' ); ?>><i class="fa fa-dribbble"></i></a>                  
                </div>
              </div><!--/ Single Some Review -->
            <?php endforeach; else : ?>              
              <div class="aefe-single-some-review-title fix">
                  <h2><a><?php do_action('aefe_please_add_testimonial');?></a></h2>                  
              </div>
            <?php endif; ?>

            </div>
          </div>