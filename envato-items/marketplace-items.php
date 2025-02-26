<?php
/*
Plugin Name: Marketplace Items
Version: 1.3
Plugin URI: http://getbutterfly.com/wordpress-plugins/marketplace-items/
Description: Display your Envato marketplace portfolio inside a post or a page.
Author: Ciprian Popescu
Author URI: http://getbutterfly.com/

Copyright 2012, 2013 Ciprian Popescu (email: getbutterfly@gmail.com)

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

/*
 * Usage: [envato type="loose" count=3]
 * Usage: [envato type="compact"]
 */

define('EI_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__)));
define('EI_PLUGIN_PATH', WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)));
define('EI_VERSION', '1.3');

function ei_styles() {
	wp_enqueue_style('ei-style', EI_PLUGIN_URL . '/css/style.css');	
}

add_action('wp_print_styles', 'ei_styles');

if(!function_exists('envato_items')){
	function envato_items($atts) {
		extract(shortcode_atts(array(
			'type' 		=> 'compact',
			'username' 	=> 'butterflymedia',
			'market' 	=> 'codecanyon',
			'price' 	=> true,
			'ref' 		=> 'butterflymedia',
			'currency' 	=> '$',
			'count' 	=> 0
		), $atts));

		$json_url = 'http://marketplace.envato.com/api/edge/new-files-from-user:' . $username . ',' . $market . '.json';
		$json_info = file_get_contents($json_url);
		$json_data = json_decode($json_info, true);
		if($count != 0)
			$json_length = $count;
		else
			$json_length = count($json_data['new-files-from-user']);

		$data = '<div class="envato-wrap">';
			// simple view (thumbnails only)
			if($type == 'compact') {
				for($i=0; $i<$json_length; $i++) {
					$data .= '<div class="envato-thumb-compact"><a href="' . $json_data['new-files-from-user'][$i]['url'] . '?ref='.$ref.'" title="'. $json_data['new-files-from-user'][$i]['url'] .'"><img src="'.$json_data['new-files-from-user'][$i]['thumbnail'].'" alt="'. $json_data['new-files-from-user'][$i]['item'] .'" /></a></div>';
				}
			}

			// advanced view
			if($type == 'loose') {
				for($i=0; $i<$json_length; $i++) {
					$data .= '<div class="envato-container">';
						$data .= '<div class="envato-thumb"><a href="' . $json_data['new-files-from-user'][$i]['url'] . '?ref='.$ref.'" title="'. $json_data['new-files-from-user'][$i]['url'] .'"><img src="'.$json_data['new-files-from-user'][$i]['thumbnail'].'" alt="'. $json_data['new-files-from-user'][$i]['item'] .'" /></a></div>';
						$data .= '<div class="envato-link"><a href="' . $json_data['new-files-from-user'][$i]['url'] . '?ref='.$ref.'" title="'. $json_data['new-files-from-user'][$i]['url'] .'">' . $json_data['new-files-from-user'][$i]['item'] . '</a></div>';
						if($price === true){
							$data .= '<div class="envato-price">'.$currency . $json_data['new-files-from-user'][$i]['cost'] . '</div>';
						}
					$data .= '</div>';
				}
			}
		$data .= '</div>';
		$data .= '<div class="envato-clear"></div>';

		return $data;	
	}
}

add_shortcode('envato', 'envato_items');
?>
