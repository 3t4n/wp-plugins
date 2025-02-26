<?php

namespace SixStorageOnline\Base;

class Six_Storage_Deactivate
{
    public static function Six_storage_deactivation()
    {

        //delete_option('six_storage_online_api_url');
        
        // $pages = [
        //     get_page_by_title('Sign in'),
        //     get_page_by_title('Sign up'),
        //     get_page_by_title('Rent Now'),
        //     get_page_by_title('Dashboard'),
        //     get_page_by_title('Thank You'),
        //     get_page_by_title('Storage Move-in'),
        // ];

        // foreach ($pages as $page) {
        //     if(isset($page) && isset($page->ID))
        //     {
        //         wp_delete_post($page->ID, true);
        //     }
        // }

        // flush rewrite rules
        flush_rewrite_rules();
    }
}