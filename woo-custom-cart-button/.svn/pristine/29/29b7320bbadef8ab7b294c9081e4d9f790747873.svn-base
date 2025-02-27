<?php
// Register and load the widget
function wcatcbll_widget() {
    register_widget('wccb_widget');
}
add_action('widgets_init', 'wcatcbll_widget');

// Creating the widget
class wccb_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'wccb_widget',
            __('Custom Cart Button', 'catcbll'),
            array('description' => __('Wcatcbll Product show', 'catcbll'))
        );
    }

    // Creating widget front-end
    public function widget($args, $instance) {
        global $product;
        $astra_active_or_not = get_option('template');
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
        $nbr_prd = isset($instance['nprd']) ? apply_filters('widget_title', $instance['nprd']) : '';

        // before and after widget arguments are defined by themes
        echo esc_html($args['before_widget']);
        echo !empty($title) ? esc_html($args['before_title']) . esc_html($title) . esc_html($args['after_title']) : esc_html($args['before_title']) . esc_html__("Products", "catcbll") . esc_html($args['after_title']);

        $arg = array(
            'post_type' => array('product'),
            'post_status' => 'publish',
            'posts_per_page' => '100',
            'meta_key' => array('_catcbll_btn_label'),
        );
        $dbResult = new WP_Query($arg);
        $posts = $dbResult->posts;
        $count = ($dbResult->post_count >= $nbr_prd) ? $nbr_prd : $dbResult->post_count;

        /*button styling settings */
        $catcbll_settings = get_option('_woo_catcbll_all_settings');
        extract($catcbll_settings);

        /*Button Margin*/
        $btn_margin = isset($catcbll_margin_top) ? intval($catcbll_margin_top) . 'px ' : '0px ';
        $btn_margin .= isset($catcbll_margin_right) ? intval($catcbll_margin_right) . 'px ' : '0px ';
        $btn_margin .= isset($catcbll_margin_bottom) ? intval($catcbll_margin_bottom) . 'px ' : '0px ';
        $btn_margin .= isset($catcbll_margin_left) ? intval($catcbll_margin_left) . 'px ' : '0px ';

        ?>
        <style>
            <?php
            $btn_class = isset($catcbll_hide_btn_bghvr) && !empty($catcbll_hide_btn_bghvr) || isset($catcbll_btn_hvrclr) && !empty($catcbll_btn_hvrclr) ? 'btn' : 'button';
            $imp = isset($catcbll_hide_btn_bghvr) && !empty($catcbll_hide_btn_bghvr) || isset($catcbll_btn_hvrclr) && !empty($catcbll_btn_hvrclr) ? '' : '!important';

            $avada_style = (isset($astra_active_or_not) && $astra_active_or_not == 'Avada') ? 'display: inline-block;float: none !important;' : '';
            echo '.widget_wccb_widget .catcbll_preview_button{text-align:' . esc_attr($catcbll_custom_btn_alignment) . ';margin:' . esc_attr($btn_margin) . ';}';
            echo '.widget_wccb_widget .catcbll_preview_button .fa{font-family:FontAwesome ' . esc_attr($imp) . '}'; // Escaped font-family
            echo '.widget_wccb_widget .' . esc_attr($catcbll_hide_btn_bghvr) . ':before{border-radius:' . intval($catcbll_btn_radius) . 'px ' . esc_attr($imp) . ';background:' . esc_attr($catcbll_btn_hvrclr) . ' ' . esc_attr($imp) . ';color:#fff ' . esc_attr($imp) . ';}'; 
            echo '.widget_wccb_widget .catcbll_preview_button .catcbll{' . esc_attr($avada_style) . 'color:' . esc_attr($catcbll_btn_fclr) . ' ' . esc_attr($imp) . ';font-size:' . intval($catcbll_btn_fsize) . 'px ' . esc_attr($imp) . ';padding:' . intval($catcbll_padding_top_bottom) . 'px ' . intval($catcbll_padding_left_right) . 'px ' . esc_attr($imp) . ';border:' . intval($catcbll_border_size) . 'px solid ' . esc_attr($catcbll_btn_border_clr) . ' ' . esc_attr($imp) . ';border-radius:' . intval($catcbll_btn_radius) . 'px ' . esc_attr($imp) . ';background-color:' . esc_attr($catcbll_btn_bg) . ' ' . esc_attr($imp) . ';}';
            echo '.widget_wccb_widget .catcbll_preview_button a{text-decoration: none ' . esc_attr($imp) . ';}';
            if(empty($catcbll_hide_btn_bghvr)){
                echo '.widget_wccb_widget .catcbll:hover{border-radius:' . intval($catcbll_btn_radius) . ' ' . esc_attr($imp) . ';background-color:' . esc_attr($catcbll_btn_hvrclr) . ' ' . esc_attr($imp) . ';color:#fff ' . esc_attr($imp) . ';}';
            }
            ?>.widget_wccb_widget .quantity,
            .widget_wccb_widget .buttons_added {
                display: inline-block;
            }

            .widget_wccb_widget .stock {
                display: none
            }
        </style>
        <?php

        for ($x = 0; $x < $count; $x++) {
            $pimg_id = get_post_meta($posts[$x]->ID, '_thumbnail_id', true);
            $pimg_url = get_post($pimg_id);
            $pimg_urls = esc_url($pimg_url->guid); // Escape URL

            // Get button label, URL, and open-new-tab-checkbox value in the database
            $prd_lbl = get_post_meta($posts[$x]->ID, '_catcbll_btn_label', true);
            $prd_url = get_post_meta($posts[$x]->ID, '_catcbll_btn_link', true);

            // Count button values               
            $atxtcnt = is_array($prd_lbl) ? count($prd_lbl) : '';

            $trgtblnk = ($btn_opnt_new_tab == "1") ? "target='_blank'" : "";

            if (($custom == "custom") || ($add2cart == "add2cart")) {
                if (!empty($prd_lbl[0]) && ($custom == "custom")) {
                    $html = '<img src="' . esc_url($pimg_urls) . '" class="prd_img_shrtcd">'; // Product featured image
                    echo esc_html($html);

                    if ($catcbll_custom_btn_position == 'down' || $catcbll_custom_btn_position == 'right') {
                        if ($both == "both" && $add2cart == "add2cart") {
                            if ($product->is_type('variable')) {
                                woocommerce_single_variation_add_to_cart_button($posts[$x]->ID, $product);
                            } else {
                                woocommerce_template_single_add_to_cart($posts[$x]->ID, $product);
                            }
                        }
                    }
                    for ($y = 0; $y < $atxtcnt; $y++) {
                        $prd_btn = '';
                        if ($catcbll_btn_icon_psn == 'right') {
                            if (!empty($prd_lbl[$y])) {
                                $prd_btn = '<div class="catcbll_preview_button"><a href="' . esc_url($prd_url[$y]) . '" class="' . esc_attr($btn_class) . ' btn-lg catcbll ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '>' . esc_html($prd_lbl[$y]) . ' <i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i></a></div>';
                            }
                        } else {
                            if (!empty($prd_lbl[$y])) {
                                $prd_btn = '<div class="catcbll_preview_button"><a href="' . esc_url($prd_url[$y]) . '" class="' . esc_attr($btn_class) . ' btn-lg catcbll ' . esc_attr($catcbll_hide_btn_bghvr) . ' ' . esc_attr($catcbll_hide_2d_trans) . '" ' . esc_attr($trgtblnk) . '><i class="fa ' . esc_attr($catcbll_btn_icon_cls) . '"></i> ' . esc_html($prd_lbl[$y]) . ' </a></div>';
                            }
                        }
                        echo esc_html($prd_btn);
                    }

                    if ($catcbll_custom_btn_position == 'up' || $catcbll_custom_btn_position == 'left') {
                        if ($both == "both" && $add2cart == "add2cart") {
                            if ($product->is_type('variable')) {
                                woocommerce_single_variation_add_to_cart_button($posts[$x]->ID, $product);
                            } else {
                                woocommerce_template_single_add_to_cart($posts[$x]->ID, $product);
                            }
                        }
                    }
                }
            }
        }
        echo esc_html($args['after_widget']);
    }

    // Creating widget backend
    public function form($instance) {
        // Widget admin form
        $title = !empty($instance['title']) ? esc_attr($instance['title']) : __('New title', 'catcbll');
        $nprd = !empty($instance['nprd']) ? esc_attr($instance['nprd']) : __('2', 'catcbll');
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'catcbll'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('nprd')); ?>"><?php esc_html_e('Number of Products:', 'catcbll'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('nprd')); ?>" name="<?php echo esc_attr($this->get_field_name('nprd')); ?>" type="text" value="<?php echo esc_attr($nprd); ?>" />
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? wp_strip_all_tags($new_instance['title']) : '';
        $instance['nprd'] = (!empty($new_instance['nprd'])) ? wp_strip_all_tags($new_instance['nprd']) : '';
        return $instance;
    }
}
?>
