<?php
function ambikly_get_settings()
{
    return apply_filters('ambikly_global_settings', [
        'general' => [
            'title' => esc_html__('General', 'ambikly'),
            'icon' => '🏠',
            'class' => \Ambikly\Settings\GeneralSettings::class
        ],
        'payments' => [
            'title' => esc_html__('Payments', 'ambikly'),
            'icon' => '💸', // Icon for Payment subtab
            'subtabs' => [
                'general' => [
                    'title' => esc_html__('General', 'ambikly'),
                    'icon' => '💸',
                    'class' => \Ambikly\Settings\GeneralPaymentSettings::class
                ],
                'cash_on_delivery' => [
                    'title' => esc_html__('Cash On Delivery', 'ambikly'),
                    'icon' => '💸',
                    'class' => \Ambikly\Gateways\CashOnDelivery\Settings::class
                ],
                'paypal' => [
                    'title' => esc_html__('PayPal', 'ambikly'),
                    'icon' => '🚚',
                    'class' => \Ambikly\Gateways\PayPal\Settings::class
                ],
            ],
        ]
    ]);
}

function ambikly_get_setting_class($current_tab, $current_sub_tab = '')
{
    $settings_lists = ambikly_get_settings();

    $setting_class = '';

    if ($settings_lists[$current_tab]) {

        $setting_class = $settings_lists[$current_tab]['class'] ?? '';;

        $subtab = $settings_lists[$current_tab]['subtabs'] ?? '';

        $subtab_item = $subtab[$current_sub_tab] ?? [];

        $setting_class = $setting_class === '' ? $subtab_item['class'] : $setting_class;
    }
    if ($setting_class !== '' && $setting_class !== null) {

        return $setting_class;
    }

    return null;
}