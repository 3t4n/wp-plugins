<?php
(array_key_exists('st4', $args['data']) && !empty($args['data']['st4'])) ? extract($args['data']['st4']) : array();
(array_key_exists('fs', $args['data']) && !empty($args['data']['fs'])) ? extract($args['data']['fs']) : array();
?>
<style>
    div#<?= $themeID; ?>,
    #<?= $themeID; ?> .tm-wrap-4 {
        background: <?= (!empty($grid_bg_color))? esc_attr($grid_bg_color) : '#fff'; ?>;
    }
    #<?= $themeID; ?> .tm-text-4 > h2 {
                          color: <?= (!empty($title_color))? esc_attr($title_color) : '#3A82EA'; ?>;
                          font-size: <?= (!empty($titleFS))? esc_attr($titleFS).'px' : '36px'; ?>;
                      }
    #<?= $themeID; ?> .tm-text-4 > h2::after {
                          background: <?= (!empty($title_color))? esc_attr($title_color) : '#3A82EA'; ?>;
                      }
    #<?= $themeID; ?> .tm-info-4,
    #<?= $themeID; ?> .tm-overlay-4,
    #<?= $themeID; ?> .tm-info-4 > h4 {
                          background: <?= (!empty($st4_member_hover))? esc_attr($st4_member_hover) : '#3A82EA'; ?>;
                          color: <?= (!empty($st4_member_name))? esc_attr($st4_member_name) : '#fff'; ?>;
                      }
    #<?= $themeID; ?> .tm-info-4 > h4 {
                          font-size: <?= (!empty($memberNameFS))? esc_attr($memberNameFS).'px' : '16px'; ?>;
                      }

    #<?= $themeID; ?> .tm-short-desc-4 > p,
    #<?= $themeID; ?> .tm-short-desc-4 > p > a {
                          color: <?= (!empty($st4_designation))? esc_attr($st4_designation) : '#fff'; ?>;
                          font-size: <?= (!empty($biographyFS))? esc_attr($biographyFS).'px' : '16px'; ?>;
                      }

    #<?= $themeID; ?> .tm-social.tm-social-4 > ul > li > a {
                          color: <?= (!empty($st4_social_icon))? esc_attr($st4_social_icon) : '#fff'; ?>;
                          font-size: <?= (!empty($iconFS))? esc_attr($iconFS).'px' : '16px'; ?>;
                          border-color: <?= (!empty($st4_social_icon))? esc_attr($st4_social_icon) : '#fff'; ?>;
                      }
    #<?= $themeID; ?> .tm-social.tm-social-4 > ul > li > a:hover {
                          background: <?= (!empty($st4_social_icon_hover))? esc_attr($st4_social_icon_hover) : '#3981EA'; ?>;
                          border-color: <?= (!empty($st4_social_icon_hover))? esc_attr($st4_social_icon_hover) : '#3981EA'; ?>;

                      }
    #<?= $themeID; ?> .tm-info-4 > h4 > a {
                          color: <?= (!empty($st4_member_name))? esc_attr($st4_member_name) : '#3d3d3d'; ?>;
                          font-size: <?= (!empty($memberNameFS))? esc_attr($memberNameFS).'px' : '16px'; ?>;

                      }
    #<?= $themeID; ?> .tm-info-4 > p,
    #<?= $themeID; ?> .tm-info-4 > p > a {
                          color: <?= (!empty($st4_designation))? esc_attr($st4_designation) : '#e7e7e7'; ?>;
                          font-size: <?= (!empty($designationFS))? esc_attr($designationFS).'px' : '16px'; ?>;
                          text-align: center;
                      }




</style>