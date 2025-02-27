<?php
add_action( 'admin_menu', 'ttfcf7_tooltip_generator_admin_menu' );

function ttfcf7_tooltip_generator_admin_menu(  ) { 
    add_menu_page(
        'Tooltips For Contact Form 7', // page <title>Title</title>
        'Tooltips For Contact Form 7', // menu link text
        'manage_options', // capability to access the page
        'ttfcf7_tooltip_generator', // page URL slug
        'ttfcf7_tooltip_generator_page', // callback function /w content
        'dashicons-star-half', // menu icon
        5
    );
}


function ttfcf7_tooltip_generator_page(  ) { 
    ?>
<?php if(isset($_REQUEST['messages']) && $_REQUEST['messages'] == 'success'){ ?>
    <div class="notice notice-success is-dismissible"> 
        <p><strong><?php echo __( 'Setting saved successfully.', 'tool-tips-for-contact-form-7' );?></strong></p>
    </div>
<?php } ?>

<div class="ttfcf7_main">
    <h1><?php echo esc_html('Tooltip Style Generator','product-call-for-price-for-woocommerce'); ?></h1>
<?php
settings_fields( 'ttfcf7_tooltip_generator' );
do_settings_sections( 'ttfcf7_tooltip_generator' );
?>
    <form action='<?php echo get_permalink(); ?>' id="ttfcf7-tooltip-generator-form" method='post'>
        <table class="form-table" role="presentation">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Position','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="radio" name="position-value" value="auto" checked><?php echo esc_html('Auto','tool-tips-for-contact-form-7'); ?>
                        <input type="radio" name="position-value" value="top" disabled><?php echo esc_html('Top','tool-tips-for-contact-form-7'); ?>
                        <input type="radio" name="position-value" value="bottom" disabled><?php echo esc_html('Bottom','tool-tips-for-contact-form-7'); ?>
                        <input type="radio" name="position-value" value="left" disabled><?php echo esc_html('Left','tool-tips-for-contact-form-7'); ?>
                        <input type="radio" name="position-value" value="right" disabled><?php echo esc_html('Right','tool-tips-for-contact-form-7'); ?><label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://www.topsmodule.com/product/tooltips-for-contact-form-7/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        <p><?php echo esc_html('Select tooltips position.','tool-tips-for-contact-form-7'); ?></p>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Width','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="box_width" name="max_width" class="width" value="<?php echo esc_attr(get_option('max_width','350',true)); ?>">
                        <p><?php echo esc_html('(Default: 350)','tool-tips-for-contact-form-7'); ?></p>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Trigger','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="radio" name="trigger_event" value="mouseenter click" checked><?php echo esc_html('Mouseenter Click','tool-tips-for-contact-form-7'); ?>
                        <input type="radio" name="trigger_event" value="click" disabled><?php echo esc_html('Click','tool-tips-for-contact-form-7'); ?>
                        <input type="radio" name="trigger_event" value="mouseenter focus" disabled><?php echo esc_html('Mouseenter Focus','tool-tips-for-contact-form-7'); ?>
                        <label class="ttfcf7_common_link"><?php echo __('Some Options Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://www.topsmodule.com/product/tooltips-for-contact-form-7/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                        <p><?php echo esc_html('Plz Select tooltips event.','tool-tips-for-contact-form-7'); ?></p>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Arrow','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <select id="box_arrow" name="box_arrow">
                            <option value="true" <?php selected('true', get_option("box_arrow","true"), true) ?>><?php echo esc_html('true','tool-tips-for-contact-form-7'); ?></option>
                            <option value="false" <?php selected('false', get_option("box_arrow","true"), true) ?>><?php echo esc_html('false','tool-tips-for-contact-form-7'); ?></option>
                        </select>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Offset','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="text" id="box_offset" name="box_offset" class="width" value="<?php echo esc_attr(get_option('box_offset','[0,10]',true)); ?>">
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Tooltips Icon','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="radio" name="question_img" value="question_1.png" <?php checked('question_1.png',get_option('question_img')); ?> checked><label for="label-1"><img class="quote_cart" src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/question_1.png"></label>
                        <input type="radio" name="question_img" value="question_2.png" <?php checked('question_2.png',get_option('question_img')); ?>><label for="label-1"><img class="quote_cart" src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/question_2.png"></label>
                        <input type="radio" name="question_img" value="question_3.png" <?php checked('question_3.png',get_option('question_img')); ?>><label for="label-1"><img class="quote_cart" src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/question_3.png"></label>
                        <input type="radio" name="question_img" value="question_4.png" <?php checked('question_4.png',get_option('question_img')); ?>><label for="label-1"><img class="quote_cart" src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/question_4.png"></label>
                        <input type="radio" name="question_img" value="question_5.png" <?php checked('question_5.png',get_option('question_img')); ?>><label for="label-1"><img class="quote_cart" src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/question_5.png"></label>
                        <input type="radio" name="question_img" value="question_6.png" <?php checked('question_6.png',get_option('question_img')); ?>><label for="label-1"><img class="quote_cart" src="<?php echo TTFCF7_PLUGIN_URL ;?>/public/images/question_6.png"></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Upload Icon','tool-tips-for-contact-form-7-pro'); ?></label>
                    </th>
                    <td>
                        <input type="hidden" name="ttfcf7_icon_image" id="ttfcf7_icon_image" value="<?php echo get_option('ttfcf7_icon_image'); ?>">
                        <input type="button" name="ttfcf7_image_upload_button" id="ttfcf7_image_upload_button" class="button-primary" value="Upload Image">
                        <input type="button" name="ttfcf7_image_remove_button" id="ttfcf7_image_remove_button" class="button-secondary" value="Remove Image">
                        <label class="ttfcf7_common_link"><?php echo __('This Option Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://www.topsmodule.com/product/tooltips-for-contact-form-7/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Image Width','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="box_width" name="img_width" class="width" disabled>
                        <label class="ttfcf7_common_link"><?php echo __('This Option Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://www.topsmodule.com/product/tooltips-for-contact-form-7/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                    </td>
                </tr>
                <tr class="font-size">
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Image Height','tool-tips-for-contact-form-7'); ?></label>
                    </th>
                    <td>
                        <input type="number" id="box_width" name="img_height" class="width" disabled>
                        <label class="ttfcf7_common_link"><?php echo __('This Option Are Only available in ','tool-tips-for-contact-form-7');?><a href="https://www.topsmodule.com/product/tooltips-for-contact-form-7/" target="_blank"><?php echo __('pro version','tool-tips-for-contact-form-7');?></a></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Background Color','tool-tips-for-contact-form-7-pro'); ?></label>
                    </th>
                    <td>
                        <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#333" name="ttbg_color" value="<?php echo esc_attr(get_option('ttbg_color','#333')); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="blogname"><?php echo esc_html('Text Color','tool-tips-for-contact-form-7-pro'); ?></label>
                    </th>
                    <td>
                        <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ffffff" name="tttext_color" value="<?php echo esc_attr(get_option('tttext_color','#ffffff')); ?>">
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <?php wp_nonce_field('ttfcf7_save_options', 'ttfcf7_nonce'); ?>
            <input type="hidden" name="action" value="tifcf7_save_option">
            <input type="submit" value="Save" name="submit" class="button-primary" id="tifcf7-btn-space">
        </p>
    </form>
</div>

    <?php
}

add_action('init','ttfcf7_add_tool_tips_type');
function ttfcf7_add_tool_tips_type(){
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'tifcf7_save_option') {
        if (isset($_REQUEST['ttfcf7_nonce']) && wp_verify_nonce($_REQUEST['ttfcf7_nonce'], 'ttfcf7_save_options')) {

            update_option('max_width',sanitize_text_field($_REQUEST['max_width']));
            update_option('box_arrow',sanitize_text_field($_REQUEST['box_arrow']));
            update_option('box_offset',sanitize_text_field($_REQUEST['box_offset']));
            update_option('question_img',sanitize_text_field($_REQUEST['question_img']));
            update_option('ttbg_color',sanitize_text_field($_REQUEST['ttbg_color']));
            update_option('tttext_color',sanitize_text_field($_REQUEST['tttext_color']));

            wp_redirect( admin_url( '/admin.php?page=ttfcf7_tooltip_generator&messages=success' ));
            //exit;  
        }
    }
}
?>
