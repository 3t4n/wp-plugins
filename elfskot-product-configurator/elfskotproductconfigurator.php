<?php
/**
 * @package ElfskotProductConfigurator
 */
/*
Plugin Name: Elfskot Product Configurator
Description: This plugin allows you to embed the Elfskot Product Configurator in your WordPress website.
Version: 1.0.0
Author: Elfskot
Author URI: https://elfskot.com
License: MIT
Text Domain: elfskot-product-configurator
*/

/*
Copyright 2018 Elfskot

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class elfskot_ProductConfigurator
{
    function __construct(){
        register_setting( 'elfskot-configurator-settings', 'configurator_domain', array($this, 'sanitize_domain_input'));
        
        add_action('admin_menu', array($this, 'add_elfskot_menu'));      

        add_action( 'add_meta_boxes', array($this, 'add_edit_page_meta_box' ));
    }

    function activate(){
        
    }

    function deactivate(){

    }

    function get_access_token(){
        $configuratorDomain =  get_option("configurator_domain");

        if($configuratorDomain == ''){ return; }

        $args = array(
            'body' => $configuratorDomain,
            'headers' => array(
                'Content-type' => 'application/x-www-form-urlencoded'
            )
        );

        $accessTokenResponse = wp_remote_post('https://api.elfskot.cloud/api/2/auth/configuratorlogin', $args);

        if($accessTokenResponse['response']['code'] == 200){
            return json_decode($accessTokenResponse['body'], true)["accessToken"];
        }

        return null;        
    }

    function add_elfskot_menu(){
        add_menu_page(
            "Elfskot Product Configurator",
            "Elfskot Config.",
            "manage_options",
            "elfskot_product_configurator",
            array($this, "elfskot_menu_page")
        );
    }

    function elfskot_menu_page(){
        include('elfskot-menu-page.php');
    }

    function add_edit_page_meta_box(){
        add_meta_box(
            'elfskot_configurator_meta_box',            // this is HTML id of the box on edit screen
            'Elfskot Product Configurator',             // title of the box
            array($this, 'edit_page_meta_box'),         // function to be called to display the checkboxes, see the function below
            'page',                                     // on which edit screen the box should appear
            'side',                                     // part of page where the box should appear
            'default'                                   // priority of the box
        );
    }

    function edit_page_meta_box(){
        include('elfskot-meta-box.php');
    }


    
    function sanitize_domain_input($option){
        
        return strip_tags($option);
    }
    
}


if(class_exists('elfskot_ProductConfigurator')){
    $elfskotProductConfigurator = new elfskot_ProductConfigurator();
}

// activation
register_activation_hook(__FILE__, array($elfskotProductConfigurator, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($elfskotProductConfigurator, 'deactivate'));