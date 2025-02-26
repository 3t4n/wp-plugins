<!-- start me-cta-three  -->
<section class="me-cta-widget me-cta-widget-three"
         data-background="<?php echo esc_url($settings['cta_bg_img']['url']);?>">
    <div class="me-container">
        <div class="me-cta-image me-call-action-radius">
            <div class="me-row align-items">
                <div class="me-col-lg-8 me-offset-lg-2">
                    <div class="me-call-wrapper">
                        <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['title'], $settings['title_tag'], 'me-title me-call-action-title mt-n5'));?>
                        <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['content'], $settings['content_tag'], 'me-content'));?>
                        <div class="me-cta-btn">
                            <?php echo wp_kses_post($this->helper_functions()->get_linked_button($settings['link'], $settings['text'], 'me-btn me-btn-yellow me-btn-xl'));?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end me-cta-three  -->