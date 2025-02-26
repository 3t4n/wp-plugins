<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_service($rankology_fno_rich_snippets_data, $key_schema = 0) {
    $rankology_fno_rich_snippets_service_name                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_name'] : '';
    $rankology_fno_rich_snippets_service_type                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_type']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_type'] : '';
    $rankology_fno_rich_snippets_service_description                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_description']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_description'] : '';
    $rankology_fno_rich_snippets_service_img                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_img'] : '';
    $rankology_fno_rich_snippets_service_area                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_area']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_area'] : '';
    $rankology_fno_rich_snippets_service_provider_name               = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_provider_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_provider_name'] : '';
    $rankology_fno_rich_snippets_service_lb_img                      = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_lb_img']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_lb_img'] : '';
    $rankology_fno_rich_snippets_service_provider_mobility           = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_provider_mobility']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_provider_mobility'] : '';
    $rankology_fno_rich_snippets_service_slogan                      = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_slogan']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_slogan'] : '';
    $rankology_fno_rich_snippets_service_street_addr                 = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_street_addr']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_street_addr'] : '';
    $rankology_fno_rich_snippets_service_city                        = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_city']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_city'] : '';
    $rankology_fno_rich_snippets_service_state                       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_state']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_state'] : '';
    $rankology_fno_rich_snippets_service_pc                          = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_pc']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_pc'] : '';
    $rankology_fno_rich_snippets_service_country                     = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_country']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_country'] : '';
    $rankology_fno_rich_snippets_service_lat                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_lat']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_lat'] : '';
    $rankology_fno_rich_snippets_service_lon                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_lon']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_lon'] : '';
    $rankology_fno_rich_snippets_service_tel                         = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_tel']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_tel'] : '';
    $rankology_fno_rich_snippets_service_price                       = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_price']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_service_price'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-services">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Add markup to your service pages so that Google can provide detailed service information in rich Search results.', 'wp-rankology'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_service_name_meta">
            <?php esc_html_e('Service name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_name]"
            placeholder="<?php echo esc_html__('The name of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Service name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_name; ?>" />
        <span class="description"><?php esc_html_e('Default: post title', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_type_meta">
            <?php esc_html_e('Service type', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_type_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_type]"
            placeholder="<?php echo esc_html__('The type of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Service type', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_type; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_description_meta">
            <?php esc_html_e('Service description', 'wp-rankology'); ?>
        </label>
        <textarea id="rankology_fno_rich_snippets_service_description_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_description]"
            placeholder="<?php echo esc_html__('The description of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Service description', 'wp-rankology'); ?>"><?php echo $rankology_fno_rich_snippets_service_description; ?></textarea>
        <span class="description"><?php esc_html_e('Default: post excerpt', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_img_meta">
            <?php esc_html_e('Thumbnail', 'wp-rankology'); ?>
        </label>
        <input id="rankology_fno_rich_snippets_service_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_img]"
            placeholder="<?php echo esc_html__('Select your image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Thumbnail', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_img; ?>" />
        <span class="description"><?php esc_html_e('Default: post thumbnail', 'wp-rankology'); ?></span>
        <input id="rankology_fno_rich_snippets_service_img" class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload"
            type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_area_meta">
            <?php esc_html_e('Area served', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_area_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_area]"
            placeholder="<?php echo esc_html__('The area served by your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Area served', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_area; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_provider_name_meta">
            <?php esc_html_e('Provider name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_provider_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_provider_name]"
            placeholder="<?php echo esc_html__('The provider name of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Provider name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_provider_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_lb_img_meta"><?php esc_html_e('Location image', 'wp-rankology'); ?>
        </label>
        <input id="rankology_fno_rich_snippets_service_lb_img_meta" type="text"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_lb_img]"
            placeholder="<?php echo esc_html__('Select your location image', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Location image', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_lb_img; ?>" />
        <input id="rankology_fno_rich_snippets_service_lb_img"
            class="<?php echo rankology_btn_secondary_classes(); ?> rankology_media_upload" type="button"
            value="<?php esc_html_e('Upload an Image', 'wp-rankology'); ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_provider_mobility_meta">
            <?php esc_html_e('Provider mobility (static or dynamic)', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_provider_mobility_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_provider_mobility]"
            placeholder="<?php echo esc_html__('The provider mobility of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Provider mobility', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_provider_mobility; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_slogan_meta">
            <?php esc_html_e('Slogan', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_slogan_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_slogan]"
            placeholder="<?php echo esc_html__('The slogan of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Slogan', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_slogan; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_street_addr_meta">
            <?php esc_html_e('Street Address', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_street_addr_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_street_addr]"
            placeholder="<?php echo esc_html__('The street address of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Street Address', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_street_addr; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_city_meta">
            <?php esc_html_e('City', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_city_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_city]"
            placeholder="<?php echo esc_html__('The city of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('City', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_city; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_state_meta">
            <?php esc_html_e('State', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_state_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_state]"
            placeholder="<?php echo esc_html__('The state of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('State', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_state; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_pc_meta">
            <?php esc_html_e('Postal code', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_pc_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_pc]"
            placeholder="<?php echo esc_html__('The postal code of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Postal code', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_pc; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_country_meta">
            <?php esc_html_e('Country', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_country_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_country]"
            placeholder="<?php echo esc_html__('The country of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Country', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_country; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_lat_meta">
            <?php esc_html_e('Latitude', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_lat_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_lat]"
            placeholder="<?php echo esc_html__('The latitude of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Latitude', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_lat; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_lon_meta">
            <?php esc_html_e('Longitude', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_lon_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_lon]"
            placeholder="<?php echo esc_html__('The longitude of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Longitude', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_lon; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_tel_meta">
            <?php esc_html_e('Telephone', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_tel_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_tel]"
            placeholder="<?php echo esc_html__('The telephone of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Telephone', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_tel; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_price_meta">
            <?php esc_html_e('Price range', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_service_price_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_service_price]"
            placeholder="<?php echo esc_html__('The price range of your service', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Price range', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_service_price; ?>" />
    </p>
</div>
<?php
}
