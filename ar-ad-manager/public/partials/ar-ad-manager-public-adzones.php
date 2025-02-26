<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) exit;
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Partials_Ar_Ad_Manager_Public_Adzones
 */
class Partials_Ar_Ad_Manager_Public_Adzones
{
    /**
     * @param $adzone
     * @return array
     */
    public function prepareAdzoneData($adzone)
    {
        $sizes = [
            'desktop' => [
                'size' => $adzone->ar_ad_manager_extra_desktop_adzone_size,
                'custom_width' => $adzone->ar_ad_manager_extra_desktop_adzone_width,
                'custom_height' => $adzone->ar_ad_manager_extra_desktop_adzone_height,
                'is_adzone_hide' => $adzone->ar_ad_manager_extra_desktop_is_adzone_hide === 'true',
                'show_adzone_on_init' => $adzone->ar_ad_manager_extra_desktop_show_adzone_on_init === 'true',
            ],
            'tablet' => [
                'size' => $adzone->ar_ad_manager_extra_tablet_adzone_size,
                'custom_width' => $adzone->ar_ad_manager_extra_tablet_adzone_width,
                'custom_height' => $adzone->ar_ad_manager_extra_tablet_adzone_height,
                'is_adzone_hide' => $adzone->ar_ad_manager_extra_tablet_is_adzone_hide === 'true',
                'show_adzone_on_init' => $adzone->ar_ad_manager_extra_tablet_show_adzone_on_init === 'true',
            ],
            'mobile' => [
                'size' => $adzone->ar_ad_manager_extra_mobile_adzone_size,
                'custom_width' => $adzone->ar_ad_manager_extra_mobile_adzone_width,
                'custom_height' => $adzone->ar_ad_manager_extra_mobile_adzone_height,
                'is_adzone_hide' => $adzone->ar_ad_manager_extra_mobile_is_adzone_hide === 'true',
                'show_adzone_on_init' => $adzone->ar_ad_manager_extra_mobile_show_adzone_on_init === 'true',
            ]
        ];

        return [
            'id' => $adzone->ID,
            'title' => $adzone->post_title,
            'adzone_align' => $adzone->ar_ad_manager_extra_adzone_align,
            'is_adzone_transparent' => $adzone->ar_ad_manager_extra_is_adzone_transparent === 'true',
            'hide_adzone_if_empty' => $adzone->ar_ad_manager_extra_hide_adzone_if_empty === 'true',
            'adzone_css_class' => $adzone->ar_ad_manager_extra_adzone_css_class,
            'adzone_text' => $adzone->ar_ad_manager_extra_adzone_text,
            'adzone_text_color' => $adzone->ar_ad_manager_extra_adzone_text_color ?? '#5e5e5e',
            'adzone_margin' => $adzone->ar_ad_manager_extra_adzone_margin,
            'adzone_background_color' => $adzone->ar_ad_manager_extra_adzone_background_color ?? '#f0f8ff',
            'adzone_border_transparent' => $adzone->ar_ad_manager_extra_is_adzone_border_transparent === 'true',
            'adzone_border_color' => $adzone->ar_ad_manager_extra_adzone_border_color ?? '#ddf0ff',
            'adzone_default_image' => $adzone->ar_ad_manager_extra_adzone_default_image,
            'adzone_default_link' => $adzone->ar_ad_manager_extra_adzone_default_link,
            'adzone_sizes' => $sizes
        ];
    }

    /**
     * @param int $windowWidth
     * @return string
     */
    public function getCurrentDevice($windowWidth)
    {
        $windowWidth = (int)$windowWidth;
        $device = 'desktop';

        if ($windowWidth < 968) {
            $device = 'tablet';
        }

        if ($windowWidth < 768) {
            $device = 'mobile';
        }

        return $device;
    }
}
