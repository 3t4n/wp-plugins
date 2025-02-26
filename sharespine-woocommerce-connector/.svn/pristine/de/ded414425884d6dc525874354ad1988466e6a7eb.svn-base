<?php

if ( ! defined( "ABSPATH" ) ) {
    die;
}

add_action('admin_menu', 'shsp_admin_menu' );

function shsp_admin_menu() {
	add_menu_page(
        "Sharespine Connector",
        "Sharespine Connector",
        "read",
        "shsp-connector-menu",
        "shsp_show_admin_menu_page"
    );
}

function shsp_show_admin_menu_page()
{
    $assetdir = plugin_dir_url(realpath(dirname(__FILE__))) . "assets";

    $shsp_integrator_info = get_option("shsp_integrator_info", array());

    $pbloginurl = "https://my." . $shsp_integrator_info["domain"]
        . "/?pb_login_tenant=".$shsp_integrator_info["tenantCodeName"];

    include "assets/admin-menu-page.php";
}
?>
