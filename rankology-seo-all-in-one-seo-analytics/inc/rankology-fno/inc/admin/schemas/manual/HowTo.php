<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_how_to($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_how_to_name = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_name'] : '';
    $rankology_fno_rich_snippets_how_to_desc = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_desc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_desc'] : '';

    $rankology_fno_rich_snippets_how_to_img = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_img'] : '';
    $rankology_fno_rich_snippets_how_to_img_width = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_img_width']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_img_width'] : '';
    $rankology_fno_rich_snippets_how_to_img_height = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_img_height']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_img_height'] : '';

    $rankology_fno_rich_snippets_how_to_currency = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_currency']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_currency'] : '';
    $rankology_fno_rich_snippets_how_to_cost = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_cost']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_cost'] : '';
    $rankology_fno_rich_snippets_how_to_total_time = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_total_time']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to_total_time'] : '';
    $rankology_fno_rich_snippets_how_to = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_how_to'] : [];

    // Rankology < 3.9
    // Double dimension required as a result of migration 3.9
    $rankology_fno_rich_snippets_how_to = ['0' => $rankology_fno_rich_snippets_how_to];
    ?>

<div class="wrap-rich-snippets-item wrap-rich-snippets-how-to">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Mark up your How-to page with JSON-LD to try to get the position 0 in search results. ', 'wp-rankology'); ?>
        </p>
    </div>

    <p>
        <label for="rankology_fno_rich_snippets_how_to_name_meta">
            <?php esc_html_e('Title of the how-to', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_how_to_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_name]"
            placeholder="<?php echo esc_html__('The name of your how-to', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('How-to name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_how_to_name; ?>" />
    </p>

    <p>
        <label for="rankology_fno_rich_snippets_how_to_desc">
            <?php esc_html_e('How-to description (default excerpt, or beginning of the content)', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_how_to_desc"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_desc]"
            placeholder="<?php echo esc_html__('Enter your how-to description', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('How-to description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_how_to_desc; ?></textarea>
    </p>

    <p>
        <label for="rankology_fno_rich_snippets_how_to_img_meta">
            <?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>
        </label>
        <span class="description"><?php esc_html_e('Minimum width: 720px - Recommended size: 1920px -  .jpg, .png, or. gif format - crawlable and indexable', 'wp-rankology'); ?></span>

        <!-- URL -->
        <input id="rankology_fno_rich_snippets_how_to_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_how_to_img; ?>" />

        <!-- Width -->
        <input id="rankology_fno_rich_snippets_how_to_img_width" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_img_width]"
            value="<?php echo $rankology_fno_rich_snippets_how_to_img_width; ?>" />

        <!-- Height -->
        <input id="rankology_fno_rich_snippets_how_to_img_height" type="hidden"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_img_height]"
            value="<?php echo $rankology_fno_rich_snippets_how_to_img_height; ?>" />

        <!-- Upload -->
        <input id="rankology_fno_rich_snippets_how_to_img"
            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>

    <p>
        <label for="rankology_fno_rich_snippets_how_to_cost_meta">
            <?php esc_html_e('Estimated cost', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_how_to_cost_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_cost]"
            placeholder="<?php echo esc_html__('The estimated cost', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('How-to estimated cost', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_how_to_cost; ?>" />
    </p>

    <p>
        <label for="rankology_fno_rich_snippets_how_to_currency_meta">
            <?php esc_html_e('Currency', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_how_to_currency_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_currency]"
            placeholder="<?php echo esc_html__('The currency of the estimated cost', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('How-to currency', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_how_to_currency; ?>" />
    </p>

    <p>
        <label for="rankology_fno_rich_snippets_how_to_total_time_meta">
            <?php esc_html_e('Total time needed', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_how_to_total_time_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to_total_time]"
            placeholder="<?php echo esc_html__('e.g. HH:MM:SS', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Total time needed', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_how_to_total_time; ?>" />
    </p>

    <?php //Init $rankology_how_to array if empty
        if (empty($rankology_fno_rich_snippets_how_to)) {
            $rankology_fno_rich_snippets_how_to = ['0' => ['']];
        }

    $total = count($rankology_fno_rich_snippets_how_to[0]);

    if ($total > 0) {
        ?>
    <div id="wrap-how-to" data-count="<?php echo $total; ?>">
        <?php foreach ($rankology_fno_rich_snippets_how_to[0] as $key => $value) {
            $num = $key + 1;
            $check_name = isset($rankology_fno_rich_snippets_how_to[0][$key]['name']) ? esc_attr($rankology_fno_rich_snippets_how_to[0][$key]['name']) : null;
            $check_text = isset($rankology_fno_rich_snippets_how_to[0][$key]['text']) ? esc_textarea($rankology_fno_rich_snippets_how_to[0][$key]['text']) : null;
            $check_img = isset($rankology_fno_rich_snippets_how_to[0][$key]['image']) ? esc_textarea($rankology_fno_rich_snippets_how_to[0][$key]['image']) : null;
            $check_img_width = isset($rankology_fno_rich_snippets_how_to[0][$key]['width']) ? esc_textarea($rankology_fno_rich_snippets_how_to[0][$key]['width']) : null;
            $check_img_height = isset($rankology_fno_rich_snippets_how_to[0][$key]['height']) ? esc_textarea($rankology_fno_rich_snippets_how_to[0][$key]['height']) : null; ?>
        <div class="step">
            <h3 class="accordion-section-title" tabindex="0">
                <?php echo $check_name; ?>
            </h3>
            <div class="accordion-section-content">
                <div class="inside">
                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][name]">
                            <?php esc_html_e('The title of the step (required)', 'wp-rankology'); ?>
                        </label>
                        <input
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][name]"
                            type="text"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][name]"
                            placeholder="<?php echo esc_html__('Enter a title for this step', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Step name', 'wp-rankology'); ?>"
                            value="<?php echo $check_name; ?>" />
                    </p>

                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][text]">
                            <?php esc_html_e('The text of your step (required)', 'wp-rankology'); ?>
                        </label>
                        <textarea
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][text]"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][text]"
                            placeholder="<?php echo esc_html__('Enter the text of your step', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Step text', 'wp-rankology'); ?>"
                            rows="8"><?php echo $check_text; ?></textarea>
                    </p>
                    <p class="js-media-upload-how-to-repeater">
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][image]">
                            <?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>
                        </label>
                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_<?php echo $key; ?>_image_meta"
                            type="text"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][image]"
                            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>"
                            class="rankology_fno_rich_snippets_data_image_meta"
                            value="<?php echo $check_img; ?>" />
                        <!-- Width -->
                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_<?php echo $key; ?>_image_width"
                            type="hidden"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][width]"
                            class="rankology_fno_rich_snippets_data_image_width"
                            value="<?php echo $check_img_width; ?>" />

                        <!-- Height -->
                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_<?php echo $key; ?>_image_height"
                            type="hidden"
                            class="rankology_fno_rich_snippets_data_image_height"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][<?php echo $key; ?>][height]"
                            value="<?php echo $check_img_height; ?>" />

                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_<?php echo $key; ?>_image"
                            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
                            type="button"
                            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>"
                            style="width:auto;" />
                    </p>



                    <p>
                        <a href="#" class="remove-step button">
                            <?php esc_html_e('Remove step', 'wp-rankology'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <?php
        } ?>
    </div>
    <?php
    } else { ?>
    <div id="wrap-how-to" data-count="1">
        <div class="step">
            <h3 class="accordion-section-title" tabindex="0">
                <?php esc_html_e('Step', 'wp-rankology'); ?>
            </h3>
            <div class="accordion-section-content">
                <div class="inside">
                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][name]">
                            <?php esc_html_e('The title of the step (required)', 'wp-rankology'); ?>
                        </label>
                        <input
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][name]"
                            type="text"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][name]"
                            placeholder="<?php echo esc_html__('Enter a title for this step', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Step name', 'wp-rankology'); ?>"
                            value="" />
                    </p>

                    <p>
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][text]">
                            <?php esc_html_e('The text of your step (required)', 'wp-rankology'); ?>
                        </label>
                        <textarea
                            id="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][text]"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][text]"
                            placeholder="<?php echo esc_html__('Enter the text of your step', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Step text', 'wp-rankology'); ?>"
                            rows="8"></textarea>
                    </p>
                    <p class="js-media-upload-how-to-repeater">
                        <label
                            for="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][image]">
                            <?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>
                        </label>
                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_0_image_meta"
                            type="text"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][image]"
                            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
                            aria-label="<?php esc_html_e('Image thumbnail', 'wp-rankology'); ?>"
                            value="" />
                        <!-- Width -->
                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_0_image_width"
                            type="hidden"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][width]"
                            value="" />

                        <!-- Height -->
                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_0_image_height"
                            type="hidden"
                            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_how_to][0][height]"
                            value="" />

                        <input
                            id="rankology_fno_rich_snippets_data_<?php echo $key_schema; ?>_0_image"
                            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
                            type="button"
                            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>"
                            style="width:auto;" />
                    </p>

                    <p>
                        <a href="#" class="remove-step button">
                            <?php esc_html_e('Remove step', 'wp-rankology'); ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <p><a href="#" id="add-step"
            class="add-step components-button <?php echo rankology_btn_secondary_classes(); ?>"><?php esc_html_e('Add step', 'wp-rankology'); ?></a>
    </p>
</div>
<?php
}
