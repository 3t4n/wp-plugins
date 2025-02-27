<?php
// Adding meta box to product page
function catcbll_atc_register_meta_box()
{
    add_meta_box('wcatc_meta_box', __('Product Custom Button Settings', 'catcbll'), 'catcbll_atc_meta_box_callback', 'product', 'advanced', 'high');
}
add_action('add_meta_boxes', 'catcbll_atc_register_meta_box');

// Meta box HTML.
if (!function_exists('catcbll_atc_meta_box_callback')) {
    function catcbll_atc_meta_box_callback($meta_id)
    {
        // Use a nonce for verification to secure form submission
        wp_nonce_field(basename(__FILE__), "wcatcbnl-nonce");

        // Fetch and sanitize existing metadata values
        $catcbll_btn_lbl = get_post_meta($meta_id->ID, '_catcbll_btn_label', true);
        $catcbll_btn_act = get_post_meta($meta_id->ID, '_catcbll_btn_link', true);

        // Initialize button label and URL safely
        $btn_lbl = isset($catcbll_btn_lbl) ? $catcbll_btn_lbl : "";
        $btn_url = isset($catcbll_btn_act) ? $catcbll_btn_act : "";

        // Count the button labels if they exist
        $btn_lbl_count = (!empty($btn_lbl)) ? count($btn_lbl) : 0;

        echo '<div class="catcbll_main_sec">';
        echo '<div class="catcbll_left">';

        // If label count >= 1
        if ($btn_lbl_count >= 1) {
            ?>
            <div class="catcbll_clone">
            <input type="hidden" name="catcbll_hidden_counter" id="catcbll_hide_value" value="<?php echo esc_attr($btn_lbl_count); ?>" />
            <button id="catcbll_add_btn" class="catcbll_add_btn"><?php echo esc_html__('Add New', 'catcbll'); ?></button>
            </div>
            <?php
            for ($y = 0; $y < $btn_lbl_count; $y++) {
                ?>
                <div id="main_fld_<?php echo esc_attr($y); ?>" class="main_prd_fld">
                    <div id="wcatcbll_wrap_<?php echo esc_attr($y); ?>" class="wcatcbll_wrap">
                        <div class="wcatcbll" id="wcatcbll_prdt_<?php echo esc_attr($y); ?>">
                            <div class="wcatcbll_mr_100">
                                <span class="tgl-indctr" aria-hidden="true"></span>
                                <button id="btn_remove_<?php echo esc_attr($y); ?>" class="btn_remove top_prd_btn" data-field="<?php echo esc_attr($y); ?>">
                                    <?php echo esc_html__('Remove', 'catcbll'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="wcatcbll_content" id="wcatcbll_fld_<?php echo esc_attr($y); ?>">
                        <div class="wcatcbll_p-20">
                            <label for="wcatcbll_atc_text" style="width:150px; display:inline-block;">
                                <?php echo esc_html__('Label', 'catcbll'); ?>
                            </label>
                            <input type="text" name="wcatcbll_wcatc_atc_text[]" class="title_field" value="<?php echo esc_attr($btn_lbl[$y]); ?>" style="width:300px;" placeholder="<?php echo esc_attr__('Add To Basket Or Shop Now Or Shop On Amazon', 'catcbll'); ?>" />
                            <div class="wcatcblltooltip">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                <span class="wcatcblltooltiptext">
                                    <?php echo esc_html__('This Text Will Be Shown On The Button Linking To The External Product', 'catcbll'); ?>
                                </span>
                            </div>
                            <br><br>
                            <label for="title_field" style="width:150px; display:inline-block;">
                                <?php echo esc_html__('URL', 'catcbll'); ?>
                            </label>
                            <input type="url" name="wcatcbll_wcatc_atc_action[]" class="title_field" value="<?php echo esc_url($btn_url[$y]); ?>" style="width:300px;" placeholder="https://example.com" />
                            <div class="wcatcblltooltip">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                <span class="wcatcblltooltiptext">
                                    <?php echo esc_html__('Enter The External URL To The Product', 'catcbll'); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } // end for each
            echo '<div id="wcatcbll_repeat" class="wcatcbll_repeat"></div>';
        } else {
            ?>
            <div class="catcbll_clone" style="background:#fff">
                <input type="hidden" name="catcbll_hidden_counter" id="catcbll_hide_value" value="0" />
                <button id="catcbll_add_btn" class="catcbll_add_btn"><?php echo esc_html__('Add New', 'catcbll'); ?></button>
            </div>
            <div id="main_fld_0" class="main_prd_fld">
                <div id="wcatcbll_wrap_0" class="wcatcbll_wrap">
                    <div class="wcatcbll" id="wcatcbll_prdt_0" style="display:none">
                        <div class="wcatcbll_mr_100">
                            <span class="tgl-indctr" aria-hidden="true"></span>
                            <button class="btn_remove top_prd_btn" data-field="1">
                                <?php echo esc_html__('Remove', 'catcbll'); ?>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="wcatcbll_content" id="wcatcbll_fld_0">
                    <div class="wcatcbll_p-20">
                        <label for="wcatcbll_atc_text" style="width:150px; display:inline-block;">
                            <?php echo esc_html__('Label', 'catcbll'); ?>
                        </label>
                        <input type="text" name="wcatcbll_wcatc_atc_text[]" class="title_field" value="" style="width:300px;" placeholder="<?php echo esc_attr__('Add To Basket Or Shop Now Or Shop On Amazon', 'catcbll'); ?>" />
                        <div class="wcatcblltooltip">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <span class="wcatcblltooltiptext">
                                <?php echo esc_html__('This Text Will Be Shown On The Button Linking To The External Product', 'catcbll'); ?>
                            </span>
                        </div>
                        <br><br>
                        <label for="title_field" style="width:150px; display:inline-block;">
                            <?php echo esc_html__('URL', 'catcbll'); ?>
                        </label>
                        <input type="url" name="wcatcbll_wcatc_atc_action[]" class="title_field" value="" style="width:300px;" placeholder="https://example.com" />
                        <div class="wcatcblltooltip">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <span class="wcatcblltooltiptext">
                                <?php echo esc_html__('Enter The External URL To The Product', 'catcbll'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="wcatcbll_repeat" class="wcatcbll_repeat"></div>
            <?php
        } // end else
        echo '</div>';
        echo '<div class="catcbll_right">';
        echo '<p class="more_infor">' . esc_html__('Distinct Information Per Product', 'catcbll') . '</p>';

        // Safely get the meta value and initialize editor
        $moreinfo = get_post_meta($meta_id->ID, '_catcbll_more_info', true);
        $content = is_array($moreinfo) ? '' : (isset($moreinfo) && !empty($moreinfo) ? $moreinfo : '');
        $editor_id = 'catcbll_more_info';
        $settings = array(
            'tinymce'       => array(
                'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo',
                'toolbar2'      => '',
                'toolbar3'      => '',
            ),
            'media_buttons' => false,
            'textarea_name' => 'catcbll_more_info',
        );
        wp_editor(wp_kses_post($content), $editor_id, $settings);
        echo '</div>';
        echo '</div>';
    }
}

/**
 * Insert values in post metadata - sanitization.
 */
if (!function_exists('catcbll_atc_save')) {
    function catcbll_atc_save($post_id)
    {
        // Verify the nonce
        if (!isset($_POST['wcatcbnl-nonce']) || !wp_verify_nonce($_POST['wcatcbnl-nonce'], basename(__FILE__))) {
            return $post_id;
        }

        // Unslash and sanitize input variables
        $btn_labels = isset($_POST['wcatcbll_wcatc_atc_text']) ? array_map('sanitize_text_field', wp_unslash($_POST['wcatcbll_wcatc_atc_text'])) : array();
        $btn_links = isset($_POST['wcatcbll_wcatc_atc_action']) ? array_map('esc_url_raw', wp_unslash($_POST['wcatcbll_wcatc_atc_action'])) : array();

        update_post_meta($post_id, '_catcbll_btn_label', $btn_labels);
        update_post_meta($post_id, '_catcbll_btn_link', $btn_links);

        // Sanitize and save rich text editor content
        $more_info = isset($_POST['catcbll_more_info']) ? wp_kses_post(wp_unslash($_POST['catcbll_more_info'])) : '';
        update_post_meta($post_id, '_catcbll_more_info', $more_info);
    }
}
add_action('save_post', 'catcbll_atc_save');

?>
