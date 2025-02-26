<!-- start me-team-layout-five  -->
<section class="me-service-widget me-service-layout-five">
    <div class="me-container">
        <div class="me-row">
            <?php if ($settings['service_list']) {
            foreach ($settings['service_list'] as $service) {
            ?>
                <?php var_dump($service);?>

                <div class="me-col-lg-3">
                <div class="me-service-item me-ser-item-bg">
                    <div class="me-service-wrapper">
                        <?php echo wp_kses_post($this->helper_functions()->has_image_before($service['image'], '<div class="me-service-image">')); ?>
                        <?php echo wp_kses_post($this->helper_functions()->generate_image($service['image'], '', true, $settings['image_size'])); ?>
                        <?php echo wp_kses_post($this->helper_functions()->has_image_after($service['image'], '</div>')); ?>
                        <div class="me-service-info-box">
                            <h4 class="me-icon-title">
                                <?php echo wp_kses_post($this->helper_functions()->get_linked_button($service['link'], $service['title'], '')); ?>
                            </h4>
                        </div>
                    </div>
                    <div class="btn-link">
                        <?php echo wp_kses_post($this->helper_functions()->get_linked_button($service['link'], $service['btn'].' <i class="fas fa-arrow-right"></i>', 'link-arrow me-ser-link-clr')); ?>
                    </div>
                </div>
            </div>
            <?php }
            }
            ?>
        </div>
    </div>
</section>
<!-- end me-team-layout-five  -->