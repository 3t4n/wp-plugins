<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

function rankology_get_schema_metaboxe_software($rankology_fno_rich_snippets_data, $key_schema = 0)
{
    $options_software = [
        ['value' => 'GameApplication', 'label' => __('GameApplication', 'wp-rankology')],
        ['value' => 'SocialNetworkingApplication', 'label' => __('SocialNetworkingApplication', 'wp-rankology')],
        ['value' => 'TravelApplication', 'label' => __('TravelApplication', 'wp-rankology')],
        ['value' => 'ShoppingApplication', 'label' => __('ShoppingApplication', 'wp-rankology')],
        ['value' => 'SportsApplication', 'label' => __('SportsApplication', 'wp-rankology')],
        ['value' => 'LifestyleApplication', 'label' => __('LifestyleApplication', 'wp-rankology')],
        ['value' => 'BusinessApplication', 'label' => __('BusinessApplication', 'wp-rankology')],
        ['value' => 'DesignApplication', 'label' => __('DesignApplication', 'wp-rankology')],
        ['value' => 'DeveloperApplication', 'label' => __('DeveloperApplication', 'wp-rankology')],
        ['value' => 'DriverApplication', 'label' => __('DriverApplication', 'wp-rankology')],
        ['value' => 'EducationalApplication', 'label' => __('EducationalApplication', 'wp-rankology')],
        ['value' => 'HealthApplication', 'label' => __('HealthApplication', 'wp-rankology')],
        ['value' => 'FinanceApplication', 'label' => __('FinanceApplication', 'wp-rankology')],
        ['value' => 'SecurityApplication', 'label' => __('SecurityApplication', 'wp-rankology')],
        ['value' => 'BrowserApplication', 'label' => __('BrowserApplication', 'wp-rankology')],
        ['value' => 'CommunicationApplication', 'label' => __('CommunicationApplication', 'wp-rankology')],
        ['value' => 'DesktopEnhancementApplication', 'label' => __('DesktopEnhancementApplication', 'wp-rankology')],
        ['value' => 'EntertainmentApplication', 'label' => __('EntertainmentApplication', 'wp-rankology')],
        ['value' => 'MultimediaApplication', 'label' => __('MultimediaApplication', 'wp-rankology')],
        ['value' => 'HomeApplication', 'label' => __('HomeApplication', 'wp-rankology')],
        ['value' => 'UtilitiesApplication', 'label' => __('UtilitiesApplication', 'wp-rankology')],
        ['value' => 'ReferenceApplication', 'label' => __('ReferenceApplication', 'wp-rankology')],
    ];

    $rankology_fno_rich_snippets_softwareapp_name                    = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_name']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_name'] : '';
    $rankology_fno_rich_snippets_softwareapp_os                      = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_os']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_os'] : '';
    $rankology_fno_rich_snippets_softwareapp_cat                     = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_cat']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_cat'] : '';
    $rankology_fno_rich_snippets_softwareapp_price                   = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_price']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_price'] : '';
    $rankology_fno_rich_snippets_softwareapp_currency                = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_currency']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_currency'] : '';
    $rankology_fno_rich_snippets_softwareapp_rating                  = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_rating']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_rating'] : '';
    $rankology_fno_rich_snippets_softwareapp_max_rating              = isset($rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_max_rating']) ? $rankology_fno_rich_snippets_data['_rankology_fno_rich_snippets_softwareapp_max_rating'] : ''; ?>
<div class="wrap-rich-snippets-item wrap-rich-snippets-software-app">
    <div class="rankology-notice">
        <p>
            <?php esc_html_e('Mark up software application information so that Google can provide detailed service information in rich Search results.', 'wp-rankology'); ?>
        </p>
    </div>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_name_meta">
            <?php esc_html_e('Software name', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_softwareapp_name_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_name]"
            placeholder="<?php echo esc_html__('The name of your app', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('App name', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_softwareapp_name; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_os_meta">
            <?php esc_html_e('Operating system', 'wp-rankology'); ?>'</label>
        <input type="text" id="rankology_fno_rich_snippets_softwareapp_os_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_os]"
            placeholder="<?php echo esc_html__('The operating system(s) required to use the app', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Operating system', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_softwareapp_os; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_cat_meta">
            <?php esc_html_e('Application category', 'wp-rankology'); ?>
        </label>
        <select id="rankology_fno_rich_snippets_softwareapp_cat_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_cat]">
            <?php foreach ($options_software as $item) { ?>
            <option <?php selected($item['value'], $rankology_fno_rich_snippets_softwareapp_cat); ?>value="<?php echo $item['value']; ?>">
                <?php echo $item['label']; ?>
            </option>
            <?php } ?>

        </select>
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_price_meta">
            <?php esc_html_e('Price of your app', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_softwareapp_price_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_price]"
            placeholder="<?php echo esc_html__('The price of your app (set "0" if the app is free of charge)', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Price', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_softwareapp_price; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_currency_meta">
            <?php esc_html_e('Currency', 'wp-rankology'); ?>
        </label>
        <input type="text" id="rankology_fno_rich_snippets_softwareapp_currency_meta"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_currency]"
            placeholder="<?php echo esc_html__('Currency: USD, EUR...', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Currency', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_softwareapp_currency; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_rating_meta">
            <?php esc_html_e('Your rating', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_softwareapp_rating_meta" min="1" step="0.1"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_rating]"
            placeholder="<?php echo esc_html__('The item rating', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Your rating', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_softwareapp_rating; ?>" />
    </p>
    <p>
        <label for="rankology_fno_rich_snippets_softwareapp_max_rating_meta">
            <?php esc_html_e('Max best rating', 'wp-rankology'); ?>
        </label>
        <input type="number" id="rankology_fno_rich_snippets_softwareapp_max_rating_meta" min="1" step="0.1"
            name="rankology_fno_rich_snippets_data[<?php echo $key_schema; ?>][rankology_fno_rich_snippets_softwareapp_max_rating]"
            placeholder="<?php echo esc_html__('Max best rating', 'wp-rankology'); ?>"
            aria-label="<?php esc_html_e('Max best rating', 'wp-rankology'); ?>"
            value="<?php echo $rankology_fno_rich_snippets_softwareapp_max_rating; ?>" />
    </p>
</div>
<?php
}
