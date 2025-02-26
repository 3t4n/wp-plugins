<?php
/**
 * @package Nihaodropshipping
 * @version 1.0.0
 */
/*
Plugin Name: Nihaodropshipping 
Plugin URI: https://wordpress.org/plugins/nihaodropshipping
Description: A simple jump plugin.
Author: nihaodropshipping
Author URI: https://nihaodropshipping.com/
Version: 1.0.0
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

/** 第1步：创建自定义菜单的函数**/
function nhdsp_add_plugin_menu()
{
    add_menu_page('NihaoDropshipping', 'NihaoDropshipping', 'manage_options', 'nhdsp_plugin_manager', 'nhdsp_plugin_options', '', 10);

}

/** 第2步：将函数注册到钩子中 */
add_action('admin_menu', 'nhdsp_add_plugin_menu');

register_activation_hook(__FILE__, 'nhdsp_plugin_activate');
add_action('admin_init', 'nhdsp_plugin_redirect');

function nhdsp_plugin_activate() {
    add_option('my_plugin_do_activation_redirect', true);
}

function nhdsp_plugin_redirect() {
    if (get_option('my_plugin_do_activation_redirect', false)) {
        delete_option('my_plugin_do_activation_redirect');
        wp_redirect(('admin.php?page=nhdsp_plugin_manager'));
    }
}

/** 第3步：定义选项被点击时打开的页面 */
function nhdsp_plugin_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    //include_once(plugin_dir_path(__FILE__) . 'detail/index.php');

    //也可以直接返回HTML，不过我建议是额外放一个文件，这样以后维护起来好处理
    //你可以直接 echo "hello world"
    echo '<div class="nh-content">
            <div class="nh-header">
                <img class="header-img" src="' . esc_url( plugins_url('/images',__FILE__) ) . '/logo.png" />
            </div>
            <div class="nh-body">
                <h1 class="text-h1">About Nihaodropshipping</h1>
                <h2 class="text-h2">Description</h2>
                <div class="text-body">
                    <div class="item-content">· Nihao Dropshipping is an all-in-one dropshipping supplier that allows you to explore 500,000+ niche products and sell them online without inventory. With more than 8 years of wholesale experience, we specialized in the jewelry and clothing business</div>
                    <div class="item-content">· Nihao is your reliable dropshipping agent who specializes in helping you build your own brands. You only need to focus on your customers and your brand, and we do all the rest. No upfront inventory or monthly free</div>
                    <div class="item-content">· We will help you start and grow your own business in an easier way. From sourcing new items to fulfilling orders, we do all things for you to make your dropshipping business more efficient</div>
                </div>
                <h2 class="text-h2">Our Service</h2>
                <div class="text-body">
                    <div class="item-content">
                        <h4>1. 500,000+ Niche Products and Growing</h4>
                        <div>For dropshippers, you can use our app for free and list all our products to your Shopify store easily</div>
                    </div>
                    <div class="item-content">
                        <h4>2. 2.One-stop dropshipping solution</h4>
                        <div>From product sourcing to order fulfillment, Nihao will automatically do all these for you</div>
                    </div>
                    <div class="item-content">
                        <h4>3. Free to Source from China</h4>
                        <div>If you want unlisted items, you can post free sourcing requests to us. Nihao will source the items for you as soon as possible</div>
                    </div>
                    <div class="item-content">
                        <h4>4. Fast Delivery Worldwide Within 7-15 Days</h4>
                        <div>Nihao serves dropshippers from all over the world. We work with multiple reliable logistics providers to provide you with cheap and fast shipping solutions</div>
                    </div>
                    <div class="item-content">
                        <h4>5. Detailed product information and exquisite product pictures are available</h4>
                        <div>Exquisite pictures are ready for you to promote and marketing</div>
                    </div>
                    <div class="item-content">
                        <h4>6. 24/7 one-to-one customer service</h4>
                        <div>Nihao Dropshipping has a professional customer service team to solve your pre-sales and after-sales problems</div>
                    </div>
                    <div class="item-content">
                        <h4>7. Customized packaging available</h4>
                        <div>Customized packaging is available for you to better branding</div>
                    </div>
                </div>
                <h2 class="text-h2">Price</h2>
                <div class="text-body">
                    <div class="item-content">Free to use. No membership fee or monthly fee.</div>
                </div>
                <div class="text-bottom">Connect WooCommerce with Nihaodropshipping now!</div>
                <div class="text-footer">
                    <div class="footer-link">
                        <a href="https://nihaodropshipping.com" target="_blank">Connect</a>
                    </div>
                </div>
                <div class="grey-discribe">No app usage fee required, free to install. Additional charges may apply.</div>
            </div>
        </div>';
    wp_die();
}

function nhdsp_add_css(){
    echo "
	<style type='text/css'>
    .nh-content{
        padding: 24px 56px 0 56px;
    }
    .nh-content .nh-header{
        height: 40px;
        width: 100%;
    }
    .nh-content .nh-header .header-img{
        width: 200px;
        height: 80px;
        border: none;
    }
    .nh-content .nh-body{
        width: 816px;
        height: auto;
        margin: 0 auto;
    }
    .nh-content .nh-body .text-h1{
        width: 100%;
        height: 45px;
        font-size: 32px;
        color: #333;
        line-height: 45px;
        margin: 36px 0 8px 0;
    }
    .nh-content .nh-body .text-h2{
        width: 100%;
        height: 32px;
        font-size: 24px;
        color: #333;
        line-height: 32px;
        margin: 32px 0;
    }
    .nh-content .nh-body .text-body{
        width: 100%;
        height: auto;
    }
    .nh-content .nh-body .text-body .item-content{
        width: 100%;
        height: auto;
        font-size: 16px;
        line-height: 32px;
        color: #333;
    }
    .nh-content .nh-body .text-body .item-content h4{
        margin: 0;
    }
    .nh-content .nh-body .text-bottom{
        width: 100%;
        height: 32px;
        line-height: 32px;
        font-size: 18px;
        color: #333;
        text-align: center;
        margin-top: 40px;
    }
    .nh-content .nh-body .text-footer{
        width: 100%;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 12px;
    }
    .nh-content .nh-body .text-footer .footer-link{
        width: 144px;
        height: 40px;
        border-radius: 4px;
        background: #FF7701;
        color: #fff;
        font-size: 20px;
        line-height: 40px;
        text-align: center;
        cursor: pointer;
        
    }
    .nh-content .nh-body .text-footer .footer-link a{
        color: #fff;
        text-decoration: none;
        outline: none;
    }
    .nh-content .nh-body .text-footer .footer-link:hover{
        background: #E56A00;
    }
    .nh-content .nh-body .grey-discribe{
        width: 100%;
        height: 32px;
        line-height: 32px;
        text-align: center;
        margin-top: 22px;
        color: #999;
        font-size: 14px;
    }
	</style>
	";
}

add_action( 'admin_head', 'nhdsp_add_css' );


