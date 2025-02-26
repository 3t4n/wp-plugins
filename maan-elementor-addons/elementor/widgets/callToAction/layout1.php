<!-- start me-cta-one  -->
<section class="me-cta-widget me-cta-widget-one">
    <div class="me-container">
        <div class="me-cta">
            <div class="me-row align-items">
                <div class="me-col-lg-7">
                    <div class="me-cta-wrapper">
                        <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['title'], $settings['title_tag'], 'me-title'));?>
                        <?php echo wp_kses_post($this->helper_functions()->generate_html($settings['content'], $settings['content_tag'], 'me-content me-call-p'));?>
                    </div>
                </div>
                <div class="me-col-lg-5">
                    <div class="me-cta-button">
                        <?php echo wp_kses_post($this->helper_functions()->get_linked_button($settings['link'], $settings['text'], 'me-btn me-btn-white me-btn-lg me-btn-round'));?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end me-cta-one  -->