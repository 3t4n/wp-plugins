<!-- start me-team-layout-two  -->
<section class="me-service-widget me-service-layout-two">
    <div class="me-container">
        <div class="me-row">
            <?php if ($settings['service_list']) {
                foreach ($settings['service_list'] as $service) {
            ?>
            <div class="me-col-lg-4">
                <div class="me-service-item">
                    <div class="me-service-wrapper">
                        <div class="me-service-icon" style="color: <?php echo esc_attr($service['colors']);?>">
                            <?php \Elementor\Icons_Manager::render_icon( $service['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="me-service-info-box">
                            <h4 class="me-service-title">
                                <?php echo wp_kses_post($this->helper_functions()->get_linked_button($service['link'], $service['title'], '')); ?>
                            </h4>
                        </div>
                    </div>
                    <div class="me-service-content">
                        <?php echo wp_kses_post($this->helper_functions()->generate_html($service['content'], 'p', '')); ?>
                    </div>
                    <div class="btn-link">
                        <?php echo wp_kses_post($this->helper_functions()->get_linked_button($service['link'], $service['btn'].' <i class="fas fa-arrow-right"></i>', 'link-arrow')); ?>
                    </div>
                </div>
            </div>
            <?php }
                }
            ?>
        </div>
    </div>
</section>
<!-- end me-team-layout-two  -->