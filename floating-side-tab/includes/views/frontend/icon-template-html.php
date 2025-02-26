<?php
defined('ABSPATH') or die('No script kiddies please!!');
?>
<div class="fsdt-frontend-display-wrap <?php echo esc_attr($menu_position); ?> fsdt-<?php echo esc_attr($home_menu_template); ?> fsdt-fixed <?php echo esc_attr($icon_animate_class); ?> <?php echo esc_attr($hide_mob_class); ?>"
    id="fsdt-front-display-wrap">


    <div class="fsdt-external fsdt-tab-type">
        <?php
       
        foreach ($fsdt_menu_details['menu'] as $home_menu_key => $home_menu_detail) {
            
           
            $icon_id = 'fst-icon-color-'.$home_menu_key;
            if (!empty($home_menu_detail['icon_link_type'])) {
                $each_customize_status = (!empty($home_menu_detail['each_customize_status']))?$home_menu_detail['each_customize_status']:'';

                $tooltip_text = (!empty($home_menu_detail['tool_tip_text'])) ? $home_menu_detail['tool_tip_text'] : '';
                $open_tab = (!empty($home_menu_detail['icon_link_open_type'])) ? $home_menu_detail['icon_link_open_type'] : '_self';
                if ($home_menu_detail['icon_link_type'] == 'tab') {
                    $tab_type = (!empty($home_menu_detail['icon_tab_type'])) ? $home_menu_detail['icon_tab_type'] : '';
                } else {
                    $tab_type = 'link';
                }
                ?>
                <div class="fsdt-tab fsdt-menu-wrap" data-tab-type="<?php echo esc_attr($tab_type); ?>"
                    data-tab-ref="<?php echo esc_attr($home_menu_key); ?>" id="<?php echo esc_attr($icon_id); ?>" >
                    <div class="fsdt-menu-text">
                        <?php
                        if ($home_menu_detail['icon_link_type'] == 'link') { ?>
                            <a href="<?php echo ($home_menu_detail['icon_link_type'] == 'link') ? esc_url($home_menu_detail['icon_link_url']) : '#'; ?>"
                                class="fsdt-tab-link"  target="<?php echo esc_attr($open_tab); ?>" >

                                <?php
                        } else { ?>
                                <a href="javascript:void(0)" class="fsdt-tab-link">
                                <?php }
                        if ($home_menu_detail['icon_select_type'] == 'bootstrap_icons') {
                            $icon_details = (!empty($home_menu_detail['icon_detail'])) ? $home_menu_detail['icon_detail'] : '';
                            $iconHtml = (!empty($icon_details['iconHtml'])) ? $icon_details['iconHtml'] : '';
                            echo wp_kses_post($iconHtml);
                        } else {
                            $custom_icon_url = (!empty($home_menu_detail['custom_icon'])) ? $home_menu_detail['custom_icon'] : '';
                            ?>
                                    <img src="<?php echo esc_url($custom_icon_url); ?>" />
                                    <?php
                        }
                        ?>
                                <span class="fsdt-tab-name">
                                    <?php echo esc_html($home_menu_detail['tab_name']); ?>
                                </span>
                                <?php
                                if (!empty($tooltip_text)) {
                                    ?>
                                    <span class="fsdt-tool-tip">
                                        <?php echo esc_html($tooltip_text); ?>
                                    </span>
                                <?php } ?>
                            </a>
                    </div>
                    <?php
                    if ($home_menu_detail['icon_link_type'] == 'tab') {

                        include(FSDT_PATH . '/includes/views/frontend/tab-types/custom-html.php');

                    }
                    ?> 
                      

                </div>

                <?php
            }
            include(FSDT_PATH . '/includes/cores/fst-customize.php');
        } ?>

    </div>
 

</div>