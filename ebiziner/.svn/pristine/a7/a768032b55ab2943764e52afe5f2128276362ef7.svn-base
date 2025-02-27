<?php
/**
 * Plugin Name:       eBiziner
 * Plugin URI:        https://www.ebizner.com/
 * Description:       This is a simple plugin for ebiziner customers.
 * Version:           2.0.4
 * Requires at least: 5.0
 * Requires PHP:      5.5
 * Tested up to:      6.5.2
 * Author:            eBiziner
 * Author URI:        https://ebiziner.com/about-us/
 * License:           GNU Public License v3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.html
 */

// Register Plugin menu
function register_ebiziner_menu() {
    add_menu_page(
        __( 'Dashboard', 'my-textdomain' ),
        __( 'eBiziner', 'my-textdomain' ),
        'manage_options',
        'ebiziner',
        'ebiziner_dashboard_content',
        'dashicons-admin-site-alt3',
    );
	
	add_submenu_page( 'ebiziner',
    __( 'eBiziner - Site Edit', 'my-textdomain' ),
    __( 'Site Edit', 'my-textdomain' ),
    'manage_options',
    'ebiziner-site-edit',
    'ebiziner_quick_access_content');
	
}
add_action( 'admin_menu', 'register_ebiziner_menu' );



// content of dashboard page
function ebiziner_dashboard_content() {
    	echo "<h1>eBiziner</h1>";
$var = '
	
	 <iframe src="https://ebiziner.com/plugin/" id="myIframe" style="border: 0px none rgb(255, 255, 255); width: 100%; margin-top: 54px; margin-right: auto; margin-left: auto; display: block;height: 1400px;"></iframe>

    <script>
    // Selecting the iframe element
    var iframe = document.getElementById("myIframe");
    
    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + \'px\';
    }
    </script>';
	
	echo $var;
}

// content of setting page
function ebiziner_quick_access_content(){ ?>	 
<style>
.container {
	    display: flex;
    flex-direction: column;
}

#wpcontent {
     padding-right: 20px;
}
 .hero {
     padding: 80px;
     text-align: center;
     background-image: url(https://ebiziner.com/wp-content/uploads/2023/01/home-bg.jpg);
     background-size: cover;
     margin-top: 15px;
     margin-bottom: 15px;
}
 .hero h1 {
     color: #fff !important;
     font-size: 60px !important;
     font-weight: 500 !important;
}
 .col {
     width: 175px;
     display: inline-block;
     background: #182955;
     padding: 25px 20px;
     text-align: center;
     margin:1px;
}
 .col:hover {
     background: #4cd137;
}
 .col img {
     width: 55px;
     display: block;
     margin: 0 auto;
     margin-bottom: 20px;
}
 a .col{
     font-size: 16px;
     text-decoration: none;
     color: #fff;
}
 span.section-title{
     font-size: 32px;
     text-align: left;
     display: block;
     font-weight: 400;
     color: #000;
     border-bottom: 3px solid #4CD137;
     padding-bottom: 15px;
     margin: 70px 0 10px 0;
     text-transform: uppercase;
}
 .row {
    /* text-align: center;
     */
}
 .note {
     font-size: 14px;
     text-align: left;
     display: block;
     color: #707070;
     margin-top: 12px;
}
</style>

<div class="container">

    <div class="hero">
        <h1>eBiziner Quick access</h1>
    </div>
		<span style="text-align: left; position: relative; top: -45px; color: #fff; padding: 5px;">v2.0.3</span>

    <div class="row">
        <span class="section-title">Posts</span>
        <a href="<?php echo get_site_url();?>/wp-admin/edit.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-1.png" /> All Posts</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/post-new.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-5.png" />Add New Post</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/edit-tags.php?taxonomy=category"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-9.png" />Categories</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/edit-tags.php?taxonomy=post_tag"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-11.png" />Tags</div></a>
    </div>

    <div class="row">
        <span class="section-title">Pages</span>
        <a href="<?php echo get_site_url();?>/wp-admin/edit.php?post_type=page"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-1.png" />All Pages</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/post-new.php?post_type=page"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-5.png" />Add New Page</div></a>
    </div>
	
    <div class="row">
        <span class="section-title">Other</span>
        <a href="<?php echo get_site_url();?>/wp-admin/options-general.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-12.png" />General Settings </div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/theme-editor.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-7.png" />Theme Editor</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/nav-menus.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-8.png" />Edit Menu</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/customize.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-16.png" />Theme Customization</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/plugin-install.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-10.png" />Plugin Install</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/upload.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-4.png" />Media</div></a>
    </div>

    <div class="row">
        <span class="section-title">e-Shop</span>
        <a href="<?php echo get_site_url();?>/wp-admin/edit.php?post_type=shop_order"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-23.png" />Orders</div></a>
		<a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=wc-admin&path=%2Fcustomers"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-22.png" />Customers</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/edit.php?post_type=product"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-18.png" />Products</div></a>
		<a href="<?php echo get_site_url();?>/wp-admin/post-new.php?post_type=product"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-19.png" />New product</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=wc-settings"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-13.png" />General Settings</div></a>
		<a href="<?php echo get_site_url();?>/wp-admin/edit.php?post_type=shop_coupon"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-20.png" />Coupons</div></a>
		<a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=wc-reports"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-23.png" />Reports</div></a>
        <a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=wc-settings&tab=shipping"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-21.png" />Shipping</div></a>	
        <a href="<?php echo get_site_url();?>/wp-admin/admin.php?page=wc-settings&tab=checkout"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-15.png" />Payments</div></a>
    </div>
        <span class="note">Note: This section will be active for e-Commerce websites</span>

    <div class="row">
        <span class="section-title">eBiziner</span>
        <a href="https://client.ebiziner.com/knowledgebase"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-3.png" />Knowledgebase</div></a>
        <a href="https://client.ebiziner.com/submitticket.php"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-14.png" />Open New Ticket</div></a>
        <a href="https://ebiziner.com/category/blog/"><div class="col"><img src="https://ebiziner.com/wp-content/uploads/2023/04/icon-2.png" />Blog</div></a>
    </div>
	
</div>

		
<?php
 };
// change login page style
function my_login_logo() { ?>
<style>
 #login h1 a, .login h1 a {
     background-image: url(https://ebiziner.com/wp-content/uploads/2021/06/logo-footer-1-1024x237.png);
     height: 45px;
     width: 320px;
     background-size: 320px 80px;
     background-repeat: no-repeat;
     padding-bottom: 30px;
}
 #login {
     width: 450px !important;
}
 .login form {
     border: 1px solid #182955 !important;
     box-shadow: 0px !important;
     border-radius: 0 !important;
}
 .language-switcher {
     display: none !important;
}
 body {
     background: #182955 !important;
}
 .login #backtoblog a, .login #nav a {
     text-decoration: none;
     color: #cecece !important;
}

</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Styles for wordpress Dashboard
function my_custom_style()  { ?>
<style>
.wrap .add-new-h2, .wrap .add-new-h2:active, .wrap .page-title-action, .wrap .page-title-action:active {
     border: 1px solid #182955 !important;
     color: #182955 !important;
}
 .wp-core-ui .button-primary {
     background: #182955 !important;
     border-color: #182955 !important;
}
 #adminmenu .wp-submenu a:focus, #adminmenu .wp-submenu a:hover, #adminmenu a:hover, #adminmenu li.menu-top>a:focus {
     color: #4BD036 !important;
}
 a:hover div.wp-menu-image:before {
     color: #4BD036 !important;
}
 #adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu .wp-menu-arrow, #adminmenu .wp-menu-arrow div, #adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu {
     background: #182955 !important;
     color: #fff;
}
</style>
<?php }; 
add_action('admin_head', 'my_custom_style');
?>
