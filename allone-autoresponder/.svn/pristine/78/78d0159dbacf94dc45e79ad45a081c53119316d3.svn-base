<?php
/*
Plugin Name: Powerfull Blog Copyright
Plugin URI: http://111waystomakemoney.com/powerful-blog-copyright/
Description: For using the plugin, read the <a href="http://111waystomakemoney.com/powerful-blog-copyright/" title="Powerfull Blog Copyright">Powerfull Blog Copyright Instruction Page</a> .Simple plugin to inject copyright statement into blog footer. <a href="options-general.php?page=BTE_BC_admin.php">Configuration options are here.</a>
Version: 9.140.9
Author: Sharath
Author URI: http://111waystomakemoney.com/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=chetan1990%40hotmail%2ecom&lc=US&item_name=Blogform&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
License: GPL
*/
/*  Copyright 2008-2009  Sharath (email : blogform.chetan@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02BTE-1307  USA
*/

require_once('BTE_BC_admin.php');
require_once('BTE_BC_core.php');

// Play nice to PHP 5 installations with REGISTER_LONG_ARRAYS off
if(!isset($HTTP_POST_VARS) && isset($_POST))
{
	$HTTP_POST_VARS = $_POST;
}

define ('BTE_BC_DB_SCHEMA', '1.0'); 
define ('BTE_BC_HEADER', '<p>'); 
define ('BTE_BC_FOOTER', '</p>'); 

register_activation_hook(__FILE__, 'bte_bc_activate');
register_deactivation_hook(__FILE__, 'bte_bc_deactivate');
add_action('wp_footer', 'bte_bc_footer');
add_action('admin_menu', 'bte_bc_options_setup');
add_action('admin_head', 'bte_bc_head_admin');

function bte_bc_tag() {
	echo bte_bc_get_html();
}

function bte_bc_deactivate() {
	delete_option('bte_bc_link');
}

function bte_bc_activate() {
	add_option('bte_bc_header',BTE_BC_HEADER);
	add_option('bte_bc_footer',BTE_BC_FOOTER);
	add_option('bte_bc_org_header','<strong>');
	add_option('bte_bc_org',get_bloginfo('name'));
	add_option('bte_bc_org_footer','</strong>');
	add_option('bte_bc_url',get_bloginfo('url'));
	add_option('bte_bc_start',date("Y"));
	add_option('bte_bc_rights','All Rights Reserved');
	add_option('bte_bc_add',true);
	add_option('bte_bc_link',true);
}

?>