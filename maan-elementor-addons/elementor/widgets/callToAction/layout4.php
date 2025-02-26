<!-- start me-cta-four  -->
<section class="me-cta-widget me-cta-widget-four">
    <div class="me-container">
        <div class="me-row align-items">
            <div class="me-col-lg-6">
                <div class="me-call-wrapper">
                    <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['title'], $settings['title_tag'], 'me-title'));?>
                    <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['content'], $settings['content_tag'], 'me-content'));?>
                    <div class="me-cta-btn">
                        <?php echo wp_kses_post($this->helper_functions()->get_linked_button($settings['link'], $settings['text'], 'me-btn me-btn-orange me-btn-xl'));?>
                    </div>
                </div>
            </div>
            <div class="me-col-lg-6">
                <div class="me-cta-image">
                    <?php echo wp_kses_post($this->helper_functions()->generate_image($settings['cta_img'], '', true, $settings['image_size']));?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end me-cta-four  -->