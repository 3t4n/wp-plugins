<?php
/* 
Plugin Name: Simple Stock Quotes 
Description: An simple AJAX powered plugin that allows you to add a shortcode or widget to your theme that will allow users to look up stock quotes via the stock symbol.

NOTE: This plugin requires SOAP be enable on the server. Most servers have this enabled by default, but there are always the exceptions. Stock quotes are pulled www.webservicex.net.
Version: 1.0.1
Author: Your Local Webmaster
Author URI: http://yourlocalwebmaster.com
Plugin URI: http://yourlocalwebmaster.com
License: GPL2*/

/*  Copyright 2013  Grant Kimball <YourLocalWebmaster.com>  (email : webmaster@yourlocalwebmaster.com)

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

class YlwmStockQuotes{

	function ylwm_enqueue_style(){
		
		wp_register_style('ylwm-stock-styles', plugins_url('ylwm-stock-css.css',__FILE__) );
		wp_enqueue_style('ylwm-stock-styles');
		
	}
	
	function ylwm_enqueue_scripts(){
		wp_register_script('jquery_latest','http://code.jquery.com/jquery.min.js');
		wp_enqueue_script('jquery_latest');
		wp_register_script('ylwm-stock-quote-js',plugins_url('main.js',__FILE__))	;
		wp_enqueue_script('ylwm-stock-quote-js');
	}
	
	
	
	 function ylwm_display_stock_app(){?>
		<div><input id="ylwm_txtName" type="text" name="ylwm_txtName" placeholder="Enter Stock Symbol" /><img src="<?php echo plugins_url('ajax-loader.gif',__FILE__);?>" id="ylwm_loader" /></div><div id="ylwm_response"></div></center>
	<?php } 
	
} // end YlwmStockQuotes class 

// Instatiate the Stock Quote object
$Ylwm_Stock_Quote = new YlwmStockQuotes();

// add action enqueue styles
	add_action('wp_enqueue_scripts',array($Ylwm_Stock_Quote,'ylwm_enqueue_style'));
// add action enqueue scripts
	add_action('wp_enqueue_scripts',array($Ylwm_Stock_Quote,'ylwm_enqueue_scripts'));
	
// add shortcode
	add_shortcode('stock_quotes',array($Ylwm_Stock_Quote,'ylwm_display_stock_app'));




?>