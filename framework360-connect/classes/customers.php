<?php
namespace Fw360Connect;

class customers {

    function __construct() {

    }

    public function prepareData($user_id) {
        if(!$user_id) return [];

        $user_obj = get_userdata($user_id);
        $user_meta = get_user_meta($user_id);

        if(!count(array_intersect(get_option('fw360_allowed_roles', []), $user_obj->roles))) {
            return false;
        }

        $tags = get_option('fw360_default_tags', '');

        $user_data = array(
            'nome' => $user_meta['first_name'][0],
            'cognome' => $user_meta['last_name'][0],
            'avatar' => get_avatar_url($user_id),
            'telefono' => $user_meta['mobile'] ?: $user_meta['billing_phone'][0],
            'email' => $user_obj->user_email,
            'indirizzo' => $user_meta['billing_address_1'][0],
            'stato' => $user_meta['billing_country'][0],
            'citta' => $user_meta['billing_state'][0],
            'comune' => $user_meta['billing_city'][0],
            'cap' => $user_meta['billing_postcode'][0],
            'ragione_sociale' => '',
            'piva' => '',
            'cf' => '',
            'cart' => [],
            'tags' => 'Fw360 Connect (' . get_bloginfo('name') . ')',
            'marketing_list' => array_filter(array_merge(explode(',', $tags), array_map(function($role) {
                return get_bloginfo('name') . ' - ' . $role;
            }, $user_obj->roles)))
        );

        if((new \Fw360Connect\settings())->getSyncData()['cart']['status']) {
            $user_data['cart'] = (new \Fw360Connect\cart($user_meta['_woocommerce_persistent_cart_1'][0]))->getCart();
        }

        $user_data = array_filter($user_data);

        return $user_data;
    }

    public function syncCustomer($user_id = null) {
        if(is_null($user_id) || !is_numeric($user_id)) $user_id = get_current_user_id();

        if($user_id) {
            $awaiting_users = array_unique(array_merge([$user_id], get_option('fw360_users_sync', [])));
            update_option('fw360_users_sync', $awaiting_users);
        }
    }

    public function syncCustomers() {
        $awaiting_users = array_unique(get_option('fw360_users_sync', []));

        foreach(array_slice($awaiting_users, 0, 5) as $user_id) {

            if($userData = $this->prepareData($user_id)) {
                (new \Fw360Connect\api())->call('/customers/registration', $userData);
            }

            $awaiting_users = array_diff($awaiting_users, [$user_id]);
            update_option('fw360_users_sync', $awaiting_users);
        }
    }

}