<?php
/**
 * @package Go Top
 */
/*
Plugin Name: Go Top
Plugin URI: http://www.codycave.com/Plugins/go-top/
Description: This is a very simple plugin to scroll to top in a nice and smooth way.
Version: 1.0.0
Author: Codycave
Author URI: http://codycave.com
License: GPLv2 or later
Text Domain: go top
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


//Load goTop js
function goTop_js(){
   wp_enqueue_script('goTop-js', plugins_url('/js/elevator.js',__FILE__), array('jquery'));
}
add_action('init', 'goTop_js');


//Load goTop style
function goTop_css() 
{
    wp_enqueue_style( 'gotop-css', plugins_url( '/css/gotop.css', __FILE__ ) );
    wp_enqueue_style( 'fontawesome-css', plugins_url( '/css/font-awesome.min.css', __FILE__ ) );
}

add_action('init', 'goTop_css');





//Main function of goTop
function goTop() {
	echo '
			<div class="elevator">
                <i class="fa fa-arrow-circle-o-up fa-2x"></i>
            </div>
	';
    if(get_option('music') == 'true') {
        echo '
            <script>
                var elementButton = document.querySelector(".elevator");
                var elevator = new Elevator({
                    element: elementButton,
                    mainAudio: "'.plugins_url("/music/elevator.mp3",__FILE__).'", 
                    endAudio:  "'.plugins_url("/music/ding.mp3",__FILE__).'"
                });
            </script> 
        ';
    }else {
        echo '
            <script>
                var elementButton = document.querySelector(".elevator");
                var elevator = new Elevator({
                    element: elementButton
                });
            </script> 
        ';
    }
    

}
add_action('wp_footer','goTop');

//Including Admin panel option page
include_once('admin/index.php');