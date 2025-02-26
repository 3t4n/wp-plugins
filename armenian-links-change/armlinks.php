<?php

/*
* @package Armenian links
*/
/*
Plugin name: Armenian links change
Description: Convert Armenian slug into Latin
Version: 1.0.0
Author: Arevik Hambardzumyan
License: GPLv2 or later
Text Domain: armlinks
*/
/*
	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/


	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly
	}

	$plugin_slug = "armlinks";

 function armlinks_settings_page()
{	global $plugin_slug;
    add_settings_section("general_section", "General Settings", null, $plugin_slug);
    add_settings_field("armlinks-enable", "Enable plugin ?", "armlinks_enable_function", $plugin_slug, "general_section");  
    register_setting("general_section", "armlinks-enable");
}

function armlinks_enable_function()
{
   ?>
        <!-- Here we are comparing stored value with 1. Stored value is 1 if user checks the checkbox otherwise empty string. -->
        <input type="checkbox" name="armlinks-enable" value="1" <?php checked(1, get_option('armlinks-enable',true), true); ?> /> 
   <?php
}

add_action("admin_init", "armlinks_settings_page");

function plugin_add_settings_link( $links ) {
	global $plugin_slug;
    $settings_link = '<a href="options-general.php?page='.$plugin_slug.'">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$plugin = plugin_basename( __FILE__ );
add_filter( "plugin_action_links_$plugin", 'plugin_add_settings_link' );

function armlinks_page()
{
	
  ?>
      <div class="wrap">
         <h1>Name</h1>
  
         <form method="post" action="options.php">
            <?php
               settings_fields("general_section");
  
               do_settings_sections("armlinks");
                 
               submit_button(); 
            ?>
         </form>
      </div>
   <?php
}

function menu_item()
{
  add_submenu_page("options-general.php", "Armlinks", "Armenian links settings", "manage_options", "armlinks", "armlinks_page"); 
}
 
add_action("admin_menu", "menu_item");

    class ARMlinks {
    	
    	public $plugin_display;

    	public function __construct(){
    		//$this->$plugin_display = get_option('armlinks-enable',true);
    		if (get_option('armlinks-enable',true)){
			add_filter('sanitize_title', array($this, 'sanitizeTitle'), 9);
			add_filter('sanitize_file_name', array($this, 'sanitizeTitle'));
			}
    	}

    	public function sanitizeTitle($title)
		{

			$characters = $this->characters();

			$title = strtr($title, $characters);

			return $title;

		}

		public function characters (){
			$arm_lat = array(
				'Ա' => 'A',
				'ա' => 'a',
				'Բ' => 'B',
				'բ' => 'b',
				'Գ' => 'G',
				'գ' => 'g',
				'Դ' => 'D',
				'դ' => 'd',
				' Ե' => ' Ye',
				'Ե' => 'E',
				' ե' => ' ye',
				'ե' => 'e',
				'Զ' => 'Z',
				'զ' => 'z',
				'Է' => 'E',
				'է' => 'e',
				'Ը' => 'Y',
				'ը' => 'y',
				'Թ' => 'T',
				'թ' => 't',
				'Ժ' => 'Zh',
				'ժ' => 'zh',
				'Ի' => 'I',
				'ի' => 'i',
				'Լ' => 'L',
				'լ' => 'l',
				'Խ' => 'KH',
				'խ' => 'kh',
				'Ծ' => 'TS',
				'ծ' => 'ts',
				'Կ' => 'K',
				'կ' => 'K',
				'Հ' => 'H',
				'հ' => 'h',
				'Ձ' => 'DZ',
				'ձ' => 'dz',
				'Ղ' => 'GH',
				'ղ' => 'gh',
				'Ճ' => 'J',
				'Ճ' => 'j',
				'Մ' => 'M',
				'մ' => 'm',
				'Յ' => 'Y',
				'յ' => 'y',
				'Ն' => 'N',
				'ն' => 'n',
				'Շ' => 'SH',
				'շ' => 'sh',
				' Ո' => 'VO',
				'Ո' => 'VO',
				' ո' => ' vo',
				'ո' => 'o',
				'Չ' => 'Ch',
				'չ' => 'ch',
				'Պ' => 'P',
				'պ' => 'p',
				'Ջ' => 'J',
				'ջ' => 'j',
				'Ռ' => 'R',
				'ռ' => 'r',
				'Ս' => 'S',
				'ս' => 's',
				'Վ' => 'V',
				'վ' => 'v',
				'Տ' => 'T',
				'տ' => 't',
				'Ր' => 'R',
				'ր' => 'r',
				'Ց' => 'C',
				'ց' => 'c',
				'Ու' => 'U',
				'ու' => 'u',
				'Փ' => 'P',
				'փ' => 'p',
				'Ք' => 'Q',
				'ք' => 'q',
				'Եվ' => 'EV',
				'և' => 'ev',
				'Օ' => 'O',
				'օ' => 'o',
				'Ֆ' => 'F',
				'ֆ' => 'f',);
			return $arm_lat;
		}

    }

	new ARMlinks();

