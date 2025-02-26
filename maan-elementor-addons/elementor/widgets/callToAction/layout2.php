<!-- start me-cta-two  -->
<section class="me-cta-widget me-cta-widget-two">
    <div class="me-container">
        <div class="me-row align-items">
            <div class="me-col-lg-12">
                <div class="me-cta-image" data-background="<?php echo esc_url($settings['cta_bg_img']['url']);?>">
                    <div class="me-row align-items">
                        <div class="me-col-lg-8 me-offset-lg-2">
                            <div class="me-cta-wrapper">
                                <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['title'], $settings['title_tag'], 'me-title'));?>
                                <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['content'], $settings['content_tag'], 'me-content'));?>
                                <div class="me-cta-btn">
                                    <?php echo wp_kses_post($this->helper_functions()->get_linked_button($settings['link'], $this->helper_functions()->generate_image($settings['btn_img']).' '.$settings['text'], 'me-btn me-btn-outline-white me-btn-xl me-btn-round'));?>
                                    <?php echo wp_kses_post($this->helper_functions()->get_linked_button($settings['link2'], $this->helper_functions()->generate_image($settings['btn_img2']).' '.$settings['text2'], 'me-btn me-btn-outline-white me-btn-xl me-btn-round'));?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end me-cta-two  -->