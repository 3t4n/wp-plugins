<?php
/*
Plugin Name: admin-css
Plugin URI: http://wordpress.org/extend/plugins/admin-css/
Description: Manage back-end admin panel design style by a single css file and overwrite existing css.
Author: Md. Jamal Hossain Khan
Version: 1.1
Author URI: http://www.krishe.com/en/

	Copyright 2010 Md. Jamal Hossain Khan (email : jamal_khanbd@yahoo.com)
 
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
// Begin admin_css plugin

$jk_acss = new Admin_css();

class Admin_css{
	
	public function __construct()
	{
		add_filter('plugin_row_meta', array(&$this,'jk_filter_plugin_links'), 10, 2);
		add_action('admin_head', array(&$this,'print_admin_css'));	
	}
	// Add donate and support information
	function jk_filter_plugin_links($links, $file)
	{
		if ( $file == plugin_basename(__FILE__) )
		{
		$links[] = '<a href="http://www.krishe.com/en/admin-css">' . __('Support') . '</a>';
		$links[] = '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=NR7SVN2HFJXX4&lc=GB&item_name=Donation%20for%20Plugin%20Development&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted">' . __('Donate') . '</a>';
		}
		return $links;
	}

	function print_admin_css()
	{?>	
	<link rel="stylesheet" href="<?php echo (bloginfo("wpurl").'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/css/admin.css" type="text/css" media="screen" />'."\n"); 
	}
}
?>