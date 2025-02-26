<!--start me-team widget me-team-layout-one-->
<section class="me-team-widget me-team-layout-one">
    <div class="me-container">
        <div class="me-row">
            <?php if ($settings['team_list']) {
                foreach ($settings['team_list'] as $team) {
                    ?>
                    <div class="me-col-md-6 me-col-lg-3">
                        <div class="me-team-item">
                            <?php echo wp_kses_post($this->helper_functions()->has_image_before($team['image'], '<figure class="me-team-image">')); ?>
                            <?php echo wp_kses_post($this->helper_functions()->generate_image($team['image'], '', true, $settings['image_size'])); ?>
                            <?php echo wp_kses_post($this->helper_functions()->has_image_after($team['image'], '</figure>')); ?>
                            <div class="me-team-wrapper">
                                <h4 class="me-team-title">
                                    <?php echo wp_kses_post($this->helper_functions()->get_linked_button($team['link'], $team['title'], '')); ?>
                                </h4>
                                <?php echo wp_kses_post($this->helper_functions()->generate_html($team['designation'], 'span', 'me-team-designation')); ?>
                                <?php echo wp_kses_post($this->helper_functions()->generate_html($team['content'], 'p', 'me-team-content')); ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }
            ?>
        </div>
    </div>
</section>
<!--end lp team widget me-team-layout-one-->