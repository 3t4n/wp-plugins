<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$settings = $this->get_settings_for_display();
?>
   
     <!--Testimonial Contents Area-->
<div class="aefe-tms-testimonial-bottom">
    <div class="aefe-tms-testimonial-content-area owl-carousel">
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
        <!--Single Testimonial -->
        <div class="aefe-tms-single-testimonial">
            <div class="aefe-tms-testimonial-quote"><i class="fa fa-quote-left"></i></div>
            <div class="aefe-tms-clients-image">
                <?php if(!empty($testimonial_slider['aefe_testimonial_slider_img']['url'])) : ?>
                    <img src="<?php echo esc_url($testimonial_slider['aefe_testimonial_slider_img']['url']); ?>" alt="">
                <?php else : ?>
                    <img src="<?php echo AEFE_URL ?>assets/img/single-team-member.png" alt="">
                <?php endif; ?>
            </div>
            <div class="aefe-tms-testimonial-client-name">
                <h2><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_title']); ?></h2>
                <h3><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_subtitle']); ?></h3>
            </div>
            <div class="aefe-tms-testimonial-message fix">
                <p><?php echo esc_html($testimonial_slider['aefe_testimonial_slider_content']); ?></p>
            </div>
            <div class="aefe-tms-testimonial-rating">
                <?php if(!empty($testimonial_slider['aefe_testimonial_slider_rating']) && '0' !== $testimonial_slider['aefe_testimonial_slider_rating']) : 
                    $tst_val = $testimonial_slider['aefe_testimonial_slider_rating'];
                    for ($x = 1; $x <= $tst_val; $x++)  :    
                ?>
                    <i class="fa fa-star"></i>
                <?php endfor; endif;?>
            </div>
        </div><!--/ Single Testimonial -->
        <?php endforeach; else : ?>              
            <div class="aefe-single-some-review-title fix">
                <h2><a><?php do_action('aefe_please_add_testimonial');?></a></h2>                  
            </div>
        <?php endif; ?>
    </div>
</div><!--/ Testimonial Contents Area-->
