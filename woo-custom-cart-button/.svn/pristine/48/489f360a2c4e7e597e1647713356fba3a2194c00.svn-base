<?php
// Custom ATC button on single product page.
if (!function_exists('catcbll_woo_single_temp_custom_act_btn')) {
    function catcbll_woo_single_temp_custom_act_btn() {
        $astra_active_or_not = get_option('template');
        include(WCATCBLL_CART_PUBLIC . 'wcatcbll_all_settings.php');
?>
        <style>
            :root {
                --text-align: <?php echo esc_attr($catcbll_custom_btn_alignment); ?>;
                --margin: <?php echo esc_attr($btn_margin); ?>;
                --display: <?php echo esc_attr($display); ?>;
                --border-radius: <?php echo esc_attr($catcbll_btn_radius . 'px ' . $imp); ?>;
                --color: <?php echo esc_attr($catcbll_btn_fclr . ' ' . $imp); ?>;
                --font-size: <?php echo esc_attr($catcbll_btn_fsize . 'px ' . $imp); ?>;
                --padding: <?php echo esc_attr($catcbll_padding_top_bottom . 'px ' . $catcbll_padding_left_right . 'px ' . $imp); ?>;
                --border: <?php echo esc_attr($catcbll_border_size . 'px solid '); ?>;
                --background-color: <?php echo esc_attr($catcbll_btn_bg . ' ' . $imp); ?>;
                --border-color: <?php echo esc_attr($catcbll_btn_border_clr . ' ' . $imp); ?>;
            }

            <?php
            $crtubtn_rds = '';
            echo '.catcbnl_mtxt{width: 100%; display: inline-block;}';
            if (isset($catcbll_ready_to_use) && !empty($catcbll_ready_to_use)) {

                $crtubtn = explode(" ", $catcbll_ready_to_use);
                if (!empty($catcbll_btn_fclr)) {
                    echo "." . esc_attr($crtubtn[1]) . " {--color1: var(--color);}";
                }
                if (!empty($catcbll_border_size)) {
                    echo "." . esc_attr($crtubtn[1]) . " {--border1: var(--border);}";
                }
                if (!empty($catcbll_btn_border_clr)) {
                    echo "." . esc_attr($crtubtn[1]) . " {--border-color1: var(--border-color);}";
                }
                if (!empty($catcbll_padding_top_bottom) && !empty($catcbll_padding_left_right)) {
                    echo "." . esc_attr($crtubtn[1]) . " { --padding1: var(--padding);}";
                }
                if (!empty($catcbll_btn_fsize)) {
                    echo "." . esc_attr($crtubtn[1]) . " {--font-size1: var(--font-size);}";
                }
                if (!empty($catcbll_btn_bg)) {
                    echo "." . esc_attr($crtubtn[1]) . " {--background1: var(--background-color);}";
                }
                if (!empty($catcbll_btn_radius) && $catcbll_btn_radius > 6) {
                    echo "." . esc_attr($crtubtn[1]) . " {--border-radius1: var(--border-radius);}";
                } else {
                    $crtubtn_rds = 'var(--border-radius1);';
                }

                echo '.' . esc_attr($crtubtn[1]) . '{--text-align1: center;-text-decoration1: none;--display1: inline-block;}';
            }

            if (isset($crtubtn_rds) && !empty($crtubtn_rds)) {
                $before_radius = $crtubtn_rds;
            } else {
                $before_radius = esc_attr($catcbll_btn_radius - 4 . 'px');
            }

            echo '.single-product .' . esc_attr($catcbll_hide_btn_bghvr) . ':before{border-radius:' . esc_attr($before_radius) . ' ' . esc_attr($imp) . ';background:' . esc_attr($catcbll_btn_hvrclr) . ' ' . esc_attr($imp) . ';color:#fff ' . esc_attr($imp) . ';}';

            if (empty($catcbll_hide_btn_bghvr)) {
                echo '.single-product .catcbll:hover{border-radius:' . esc_attr($catcbll_btn_radius) . ' ' . esc_attr($imp) . ';background-color:' . esc_attr($catcbll_btn_hvrclr) . ' ' . esc_attr($imp) . ';color:#fff ' . esc_attr($imp) . ';}';
            }
            ?>
        </style>
<?php
        // if custom setting is on
        if (!empty($prd_lbl[0]) && ($custom == "custom")) {
            if ($both == "both" && $add2cart == "add2cart" && ($catcbll_custom_btn_position == 'down' || $catcbll_custom_btn_position == 'right')) {
                if ($product->is_type('variable')) {
                    woocommerce_single_variation_add_to_cart_button();
                } else {
                    woocommerce_template_single_add_to_cart(); // Default                        
                }
            }

            // Show multiple buttons using loop
            for ($y = 0; $y < $atxtcnt; $y++) {
                $prd_btn = '';
                if ($catcbll_btn_icon_psn == 'right') {
                    if (!empty($prd_lbl[$y])) {
                        $prd_btn = '<div class="catcbll_preview_button"><a href="' . esc_url($prd_url[$y]) . '" class="' . esc_attr($btn_class) . ' ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '>' . esc_html($prd_lbl[$y]) . ' <i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i></a></div>';
                    }
                } else {
                    // Checking label field. It is empty or not
                    if (!empty($prd_lbl[$y])) {
                        $prd_btn = '<div class="catcbll_preview_button"><a href="' . esc_url($prd_url[$y]) . '" class="' . esc_attr($btn_class) . ' ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '><i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i> ' . esc_html($prd_lbl[$y]) . ' </a></div>';
                    }
                }
                echo $prd_btn;
            } // end for

            if ($both == "both" && $add2cart == "add2cart" && ($catcbll_custom_btn_position == 'up' || $catcbll_custom_btn_position == 'left')) {
                if ($product->is_type('variable')) {
                    woocommerce_single_variation_add_to_cart_button();
                } else {
                    woocommerce_template_single_add_to_cart(); // Default                        
                }
            }
        } else {
            if ($product->is_type('variable')) {
                woocommerce_single_variation_add_to_cart_button();
            } else {
                woocommerce_template_single_add_to_cart(); // Default
            }
        }
        echo '<div class="catcbnl_mtxt">' . esc_html($content) . '</div>';
    }
}

$astra_active_or_not = get_option('template');
if (isset($astra_active_or_not) && $astra_active_or_not == 'oceanwp') {
    add_action('ocean_before_single_product_meta', 'catcbll_woo_single_temp_custom_act_btn');

    add_filter('ocean_woo_summary_elements_positioning', 'catcbll_woo_single_temp_remove_default_button', 10, 2);
    function catcbll_woo_single_temp_remove_default_button($sections) {
        unset($sections[4]);
        return $sections;
    }
} else {
    // Check product type
    if (!function_exists('catcbll_check_product_type')) {
        function catcbll_check_product_type() {
            global $product;

            if ($product->is_type('variable')) {
                add_action('woocommerce_single_variation', 'catcbll_woo_single_temp_custom_act_btn', 30);
            } else {
                add_action('woocommerce_single_product_summary', 'catcbll_woo_single_temp_custom_act_btn', 30);
            }
        }
        add_action('woocommerce_before_single_product_summary', 'catcbll_check_product_type');
    }
}
?>
