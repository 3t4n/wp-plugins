<!-- start lp team widget me-team-layout-three -->
<section class="me-team-widget me-team-layout-three">
    <div class="me-container">
        <div class="me-row">
            <?php if ($settings['team_list']) {
            foreach ($settings['team_list'] as $team) {
            ?>
            <div class="me-col-md-6 me-col-lg-3">
                <div class="me-team-item me-radius">

                    <?php echo wp_kses_post($this->helper_functions()->has_image_before($team['image'], '<figure class="me-team-image me-radius-img">')); ?>
                    <?php echo wp_kses_post($this->helper_functions()->generate_image($team['image'], '', true, $settings['image_size'])); ?>
                    <?php echo wp_kses_post($this->helper_functions()->has_image_after($team['image'], '</figure>')); ?>
                    <div class="me-team-wrapper">
                        <h4 class="me-team-title">
                            <?php echo wp_kses_post($this->helper_functions()->get_linked_button($team['link'], $team['title'], '')); ?>
                        </h4>
                        <?php echo wp_kses_post($this->helper_functions()->generate_html($team['designation'], 'span', 'me-team-designation')); ?>
                        <ul class="me-team-social-link">

                            <li><?php echo wp_kses_post($this->helper_functions()->get_linked_button($team['sc_link_1'], ' <i class="'.$team['sc_icon_1'].'"></i>', '')); ?></li>
                            <li><?php echo wp_kses_post($this->helper_functions()->get_linked_button($team['sc_link_2'], ' <i class="'.$team['sc_icon_2'].'"></i>', '')); ?></li>
                            <li><?php echo wp_kses_post($this->helper_functions()->get_linked_button($team['sc_link_3'], ' <i class="'.$team['sc_icon_3'].'"></i>', '')); ?></li>
                            <li><?php echo wp_kses_post($this->helper_functions()->get_linked_button($team['sc_link_4'], ' <i class="'.$team['sc_icon_4'].'"></i>', '')); ?></li>

                        </ul>
                    </div>
                </div>
            </div>
            <?php }
            }
            ?>
        </div>
    </div>
</section>
<!-- start lp team widget me-team-layout-three -->