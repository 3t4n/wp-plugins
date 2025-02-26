<?php
function ambikly_get_account_endpoints()
{
    return array(
        'dashboard' => esc_html__('Dashboard', 'ambikly'),
        'orders' => esc_html__('Orders', 'ambikly'),
        'payments' => esc_html__('Payments', 'ambikly'),
    );
}