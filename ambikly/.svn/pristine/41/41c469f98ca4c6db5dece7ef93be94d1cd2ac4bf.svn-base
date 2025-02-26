<?php

namespace Ambikly\Admin;

use Ambikly\Installer;

class Admin
{
    public function __construct()
    {
        $this->load_helpers();
        $this->dispatch();
        $this->hooks();


    }

    public function load_helpers()
    {
        include_once AMBIKLY_ABSPATH . 'src/Helpers/admin.php';

    }

    public function dispatch()
    {
        new \Ambikly\Admin\Menu();
        new \Ambikly\Admin\Assets();
        Installer::init();
    }

    public function hooks()
    {
        add_filter('display_post_states', array($this, 'display_status'), 10, 2);

    }

    public function display_status($post_states, $post)
    {
        $cart_page = ambikly_get_cart_page();

        $checkout_page = ambikly_get_checkout_page();

        $account_page = ambikly_get_account_page();

        $thank_you_page = ambikly_get_thank_you_page();

        $shop_page = ambikly_get_shop_page();

        if ($cart_page == $post->ID) {
            $post_states['ambikly_page_for_cart'] = esc_html__('Ambikly Cart', 'ambikly');
        }

        if ($checkout_page == $post->ID) {
            $post_states['ambikly_page_for_checkout'] = esc_html__('Ambikly Checkout', 'ambikly');
        }

        if ($account_page == $post->ID) {
            $post_states['ambikly_page_for_my_account'] = esc_html__('Ambikly Account', 'ambikly');
        }

        if ($shop_page == $post->ID) {
            $post_states['ambikly_page_for_shop'] = esc_html__('Ambikly Shop', 'ambikly');
        }

        if ($thank_you_page == $post->ID) {
            $post_states['ambikly_page_for_thank_you'] = esc_html__('Ambikly Thank You', 'ambikly');
        }
        return $post_states;
    }
}