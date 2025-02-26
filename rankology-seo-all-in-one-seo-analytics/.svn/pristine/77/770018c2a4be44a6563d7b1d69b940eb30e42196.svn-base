<?php

namespace RankologyFno\Services\Forms\Schemas;

defined('ABSPATH') || exit;

use RankologyFno\Core\FormApi;
use RankologyFno\Helpers\Settings\LocalBusinessHelper;

class FormSchemaLocalBusiness extends FormApi {
    protected function getTypeByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_lb_name':
            case '_rankology_fno_rich_snippets_lb_street_addr':
            case '_rankology_fno_rich_snippets_lb_city':
            case '_rankology_fno_rich_snippets_lb_state':
            case '_rankology_fno_rich_snippets_lb_pc':
            case '_rankology_fno_rich_snippets_lb_country':
            case '_rankology_fno_rich_snippets_lb_lat':
            case '_rankology_fno_rich_snippets_lb_lon':
            case '_rankology_fno_rich_snippets_lb_website':
            case '_rankology_fno_rich_snippets_lb_tel':
            case '_rankology_fno_rich_snippets_lb_price':
            case '_rankology_fno_rich_snippets_lb_cuisine':
            case '_rankology_fno_rich_snippets_lb_menu':
            case '_rankology_fno_rich_snippets_lb_accepts_reservations':
                return 'input';
            case '_rankology_fno_rich_snippets_lb_type':
                return 'select';
            case '_rankology_fno_rich_snippets_lb_img':
                return 'upload';
            case '_rankology_fno_rich_snippets_lb_opening_hours':
                return 'opening_hours';
        }
    }

    protected function getLabelByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_lb_name':
                return __('Name of your business', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_type':
                return __('Select a business type', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_img':
                return __('Image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_street_addr':
                return __('Street Address', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_city':
                return __('City', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_state':
                return __('State', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_pc':
                return __('Postal code', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_country':
                return __('Country', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_lat':
                return __('Latitude', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_lon':
                return __('Longitude', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_website':
                return __('URL', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_tel':
                return __('Telephone', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_price':
                return __('Price range', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_cuisine':
                return __('Cuisine served', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_menu':
                return __('URL of the menu', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_accepts_reservations':
                return __('Accepts reservations', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_opening_hours':
                return __('Opening hours', 'wp-rankology');
        }
    }

    protected function getPlaceholderByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_lb_name':
                return __('e.g. My Local Business', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_type':
                return __('Select a business type', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_img':
                return __('Select your image', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_street_addr':
                return __('e.g. Place Bellevue', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_city':
                return __('e.g. Biarritz', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_state':
                return __('e.g. Nouvelle Aquitaine', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_pc':
                return __('e.g. 64200', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_country':
                return __('e.g. France', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_lat':
                return __('e.g. 43.4831389', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_lon':
                return __('e.g. -1.5630987', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_website':
                return sprintf(esc_html__('e.g. %s', 'wp-rankology'), get_home_url());
            case '_rankology_fno_rich_snippets_lb_tel':
                return __('+47501020304', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_price':
                return __('$$, €€€, or ££££...', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_cuisine':
                return __('French, Italian, Indian, American', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_menu':
                return sprintf(esc_html__('e.g. %s', 'wp-rankology'), get_home_url());
            case '_rankology_fno_rich_snippets_lb_accepts_reservations':
                return __('e.g. True', 'wp-rankology');
            default:
                return '';
        }
    }

    protected function getDescriptionByField($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_lb_img':
                return __('Every page must contain at least one image (whether or not you include markup). Google will pick the best image to display in Search results based on the aspect ratio and resolution.<br> Image URLs must be crawlable and indexable.<br> Images must represent the marked up content.<br> Images must be in .jpg, .png, or. gif format.<br> For best results, provide multiple high-resolution images (minimum of 50K pixels when multiplying width and height) with the following aspect ratios: 16x9, 4x3, and 1x1.', 'wp-rankology');

            case '_rankology_fno_rich_snippets_lb_accepts_reservations':
                return __('Indicates whether a FoodEstablishment accepts reservations. Values can be Boolean (True or False), an URL at which reservations can be made or (for backwards compatibility) the strings Yes or No.', 'wp-rankology');
            case '_rankology_fno_rich_snippets_lb_opening_hours':
                return __("<strong>Morning and Afternoon are just time slots.</strong> e.g. if you're opened from 10:00 AM to 9:00 PM, check Morning and enter 10:00 / 21:00. If you are open non-stop, check Morning and enter 0:00 / 23:59.", 'wp-rankology');
            default:
                return '';
        }
    }

    protected function getOptions($field) {
        switch ($field) {
            case '_rankology_fno_rich_snippets_lb_type':
                $types = LocalBusinessHelper::getListTypes();

                return $types;
        }
    }

    protected function getDetails($postId = null) {
        return [
            ['key' => '_rankology_fno_rich_snippets_lb_name'],
            ['key' => '_rankology_fno_rich_snippets_lb_type','value' => 'LocalBusiness'],
            ['key' => '_rankology_fno_rich_snippets_lb_img'],
            ['key' => '_rankology_fno_rich_snippets_lb_street_addr'],
            ['key' => '_rankology_fno_rich_snippets_lb_city'],
            ['key' => '_rankology_fno_rich_snippets_lb_state'],
            ['key' => '_rankology_fno_rich_snippets_lb_pc'],
            ['key' => '_rankology_fno_rich_snippets_lb_country'],
            ['key' => '_rankology_fno_rich_snippets_lb_lat'],
            ['key' => '_rankology_fno_rich_snippets_lb_lon'],
            ['key' => '_rankology_fno_rich_snippets_lb_website'],
            ['key' => '_rankology_fno_rich_snippets_lb_tel'],
            ['key' => '_rankology_fno_rich_snippets_lb_price'],
            ['key' => '_rankology_fno_rich_snippets_lb_cuisine'],
            ['key' => '_rankology_fno_rich_snippets_lb_menu'],
            ['key' => '_rankology_fno_rich_snippets_lb_accepts_reservations'],
            ['key' => '_rankology_fno_rich_snippets_lb_opening_hours'],
        ];
    }
}
