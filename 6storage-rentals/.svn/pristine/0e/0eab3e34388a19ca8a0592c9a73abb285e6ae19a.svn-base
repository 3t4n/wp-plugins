<?php

namespace SixStorageOnline\Base;

class Six_Storage_ManagePages extends Six_Storage_BaseController
{

    public $six_storage_pages = [];

    public function __construct()
    {
        $this->six_storage_wpPages();
    }

    public function Six_Storage_Manage_Pages_register()
    {
        $this->six_storage_wpPages();
        $this->six_storage_addPages();
    }

    public function six_storage_wpPages()
    {
        $this->six_storage_pages = [
            ['post_name' => 'sign-up', 'post_title' => 'Sign up', 'post_content' => '[six_storage_online_sign_up]', 'parent_page' => null ,'wp_option_name' => 'six_storage_signup_page_id'],
            ['post_name' => 'rent-now', 'post_title' => 'Rent Now', 'post_content' => '[six_storage_online_storage_move_in_shortcode_form]', 'parent_page' => null , 'wp_option_name' => 'six_storage_rent_now_page_id'],
            ['post_name' => 'sign-in', 'post_title' => 'Sign in', 'post_content' => '[six_storage_online_sign_in]', 'parent_page' => null , 'wp_option_name' => 'six_storage_sign_in_page_id'],
            ['post_name' => 'online-dashboard', 'post_title' => 'Dashboard', 'post_content' => '[six_storage_online_dashboard]', 'parent_page' => null , 'wp_option_name' => 'six_storage_dashboard_page_id'],
            ['post_name' => 'thank-you', 'post_title' => 'Thank You', 'post_content' => '[six_storage_online_storage_thank_you_page]', 'parent_page' => 'rent-now' , 'wp_option_name' => 'six_storage_thankyou_page_id'],
            ['post_name' => 'transaction-response', 'post_title' => 'Transaction Response', 'post_content' => '[six_storage_online_ptwofour_response_short_code]', 'parent_page' => null , 'wp_option_name' => 'six_storage_ptwofour_response_page_id'],
        ];
    }

    public function six_storage_addPages()
    {
        foreach ($this->six_storage_pages as $page) {
            // if(get_option($page['wp_option_name']) === false){
            
                if(!isset($page) || !isset($page['post_name']) || !isset($page['post_title'])
                    || $page['post_name'] == '' || $page['post_title'] == '') {
                        continue;
                }
               
                $page_title = wp_strip_all_tags($page['post_title']);
                $six_storage_existing_page_id = get_option($page['wp_option_name']);
                if(empty(get_post($six_storage_existing_page_id)) == false){
                    continue;
                }

                if (get_page_by_title($page_title) == NULL) {
                    $six_storage_page_id = wp_insert_post([
                        'post_title'    => $page_title,
                        'post_content'  => $page['post_content'],
                        'post_status'   => 'publish',
                        'post_author'   => 1,
                        'post_type'     => 'page',
                        'post_name'     => $page['post_name'],
                        'post_parent'   => $page['parent_page'] != null && $page['parent_page'] != "" ? get_page_by_path($page['parent_page'])->ID : null,
                        'page_template' =>'six-storage-full-width.php'
                    ]);
                    if($six_storage_page_id != 0){
                        if($page['post_title'] == 'Sign up'){
                            update_option('six_storage_signup_page_id',$six_storage_page_id);
                        }else if($page['post_title'] == 'Rent Now'){
                            update_option('six_storage_rent_now_page_id',$six_storage_page_id);
                        }else if($page['post_title'] == 'Sign in'){
                            update_option('six_storage_sign_in_page_id',$six_storage_page_id);
                        }else if($page['post_title'] == 'Dashboard'){
                            update_option('six_storage_dashboard_page_id',$six_storage_page_id);
                        }else if($page['post_title'] == 'Thank You'){
                            update_option('six_storage_thankyou_page_id',$six_storage_page_id);
                        } else if($page['post_title'] == 'Transaction Response'){
                            update_option('six_storage_ptwofour_response_page_id',$six_storage_page_id);
                        }
                    }
                }
            // }
        }
    }

    public function six_storage_removePages()
    {
        foreach ($this->six_storage_pages as $page) {
            $page_title = wp_strip_all_tags($page['post_title']);
            $page_resource = get_page_by_title($page_title);

            if (isset($page_resource) && isset($page_resource->ID)) {
                wp_delete_post($page_resource->ID, true);
            }
        }
    }
}
