<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

?>

<div class="wrap-rich-snippets-services">
    <div class="rankology-notice">
        <p>
            <?php
                /* translators: %s: link documentation */
                printf(__('Learn more about the <strong>Service schema</strong> from the <a href="%s" target="_blank">Schema.org official documentation website</a><span class="dashicons dashicons-redo"></span>', 'wp-rankology'), 'https://schema.org/Service');
            ?>
        </p>
    </div>

    <p>
        <label for="rankology_fno_rich_snippets_service_name_meta">
            <?php esc_html_e('Service name', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_name', 'default'); ?>
        <span class="description"><?php esc_html_e('The name of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_type_meta">
            <?php esc_html_e('Service type', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_type', 'default'); ?>
        <span class="description"><?php esc_html_e('The type of service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_description_meta"><?php esc_html_e('Service description', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_description', 'default'); ?>
        <span class="description"><?php esc_html_e('The description of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_img_meta"><?php esc_html_e('Image', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_img', 'image'); ?>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_area_meta"><?php esc_html_e('Area served', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_area', 'default'); ?>
        <span class="description"><?php esc_html_e('The area served by your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_provider_name_meta"><?php esc_html_e('Provider name', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_provider_name', 'default'); ?>
        <span class="description"><?php esc_html_e('The provider name of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_lb_img_meta"><?php esc_html_e('Location image', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_lb_img', 'image'); ?>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_provider_mobility_meta">
            <?php esc_html_e('Provider mobility (static or dynamic)', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_provider_mobility', 'default'); ?>
        <span class="description"><?php esc_html_e('The provider mobility of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_slogan_meta">
            <?php esc_html_e('Slogan', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_slogan', 'default'); ?>
        <span class="description"><?php esc_html_e('The slogan of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_street_addr_meta">
            <?php esc_html_e('Street Address', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_street_addr', 'default'); ?>
        <span class="description"><?php esc_html_e('The street address of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_city_meta">
            <?php esc_html_e('City', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_city', 'default'); ?>
        <span class="description"><?php esc_html_e('The city of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_state_meta">
            <?php esc_html_e('State', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_state', 'default'); ?>
        <span class="description"><?php esc_html_e('The state of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_pc_meta">
            <?php esc_html_e('Postal code', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_pc', 'default'); ?>
        <span class="description"><?php esc_html_e('The postal code of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_country_meta">
            <?php esc_html_e('Country', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_country', 'default'); ?>
        <span class="description"><?php esc_html_e('The country of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_lat_meta">
            <?php esc_html_e('Latitude', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_lat', 'default'); ?>
        <span class="description"><?php esc_html_e('The latitude of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_lon_meta">
            <?php esc_html_e('Longitude', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_lon', 'default'); ?>
        <span class="description"><?php esc_html_e('The longitude of your service', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_tel_meta">
            <?php esc_html_e('Telephone', 'wp-rankology'); ?>
        </label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_tel', 'default'); ?>
        <span class="description"><?php esc_html_e('The telephone of your service (international format)', 'wp-rankology'); ?></span>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_service_price_meta">
            <?php esc_html_e('Price range', 'wp-rankology'); ?></label>
        <?php echo rankology_schemas_mapping_array('rankology_fno_rich_snippets_service_price', 'default'); ?>
        <span class="description"><?php esc_html_e('The price range of your service', 'wp-rankology'); ?></span>
    </p>
</div>
