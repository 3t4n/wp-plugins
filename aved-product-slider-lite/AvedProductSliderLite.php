<?php 
/*
Plugin Name: AVED Multi Slider 
Plugin URI: http://AVEDsoft.com
Description: WooCommerce Functional Slider
Version: 2.0
Author: AVED soft | Vadim Kopeiken
Author URI: http://avedsoft.com
License: GPL2
Copyright 2016  AVEDsoft  (email : AVEDsoft@gmail.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
?>
<?php

//** Define structure **//

define( 'AVS_SLIDER_DIR', plugin_dir_path( __FILE__ ) );
define( 'AVS_SLIDER_URL', plugins_url() );

//** Start init **//

require_once(AVS_SLIDER_DIR.'includes/init.php');

?>