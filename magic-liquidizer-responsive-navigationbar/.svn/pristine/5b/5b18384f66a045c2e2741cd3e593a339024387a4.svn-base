<?php
defined( 'ABSPATH' ) OR exit;

/*
/--------------------------------------------------------------------\
|                                                                    |
| License: GPL Version 3                                             |
|                                                                    |
| Magic Liquidizer Responsive Form - Make HTML Form Responsive.      |
| Copyright (C) 2014, Elvin Deza,                                    |
| http://innovedesigns.com/                                          |
| All rights reserved.                                               |
|                                                                    |
| By using the software, you agree to be bound by the terms of		 | 		
| this license.														 |
| 																	 |
|                                                                    |
\--------------------------------------------------------------------/
*/

function liquidizer_navigationbar_uninstall() {
	 if ( ! current_user_can( 'activate_plugins' ) )
        return;

	if ( !is_multisite() ) {
			delete_option('liquidizer_lite_wp_navigationbar');
			delete_option('liquidizer_lite_wp_which_navigationbar_element');
			delete_option('liquidizer_lite_wp_navigationbar_width');
			delete_option('liquidizer_lite_wp_navcolor');
			delete_option('liquidizer_lite_wp_navselect');
			delete_option('liquidizer_lite_wp_home');
			delete_option('liquidizer_lite_wp_info');
			delete_option('liquidizer_lite_wp_contact');

	} else {
  		delete_site_option('liquidizer_lite_wp_navigationbar');
		delete_site_option('liquidizer_lite_wp_which_navigationbar_element');
		delete_site_option('liquidizer_lite_wp_navigationbar_width');
		delete_site_option('liquidizer_lite_wp_navcolor');
		delete_site_option('liquidizer_lite_wp_navselect');
		delete_site_option('liquidizer_lite_wp_home');
		delete_site_option('liquidizer_lite_wp_info');
		delete_site_option('liquidizer_lite_wp_contact');
	}
}	
