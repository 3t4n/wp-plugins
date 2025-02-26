<?php
/*
Plugin Name: Foreign Image by Agilita TI
Plugin URI: http://www.agilitati.com.br
Description: creates a short code to display an image from an any valid URL.
Version: 1.0
Author: Agilita TI <gustavo@agilitati.com.br>
Author URI: http://www.agilitati.com.br
License: GNU/GPL
*/

/*  Copyright 2012 - Agilita TI - Gustavo Jantsch (email : gustavo@agilitati.com.br)

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



class AgilitaImage {

	public static function ShowImage($params) {

		$return = "";
		$url = filter_var($params['url'], FILTER_SANITIZE_URL);
		$style = isset($params['style']) ? $params['style'] : "";
		$class = isset($params['class']) ? $params['class'] : "";
		if(!empty($url)) {
			$return =  "<img src=\"{$url}\" style=\"{$style}\" class=\"{$class}\" />";
		}

		return $return;

	}

}

// put the button on the page
add_shortcode( 'image', 'AgilitaImage::ShowImage' );
