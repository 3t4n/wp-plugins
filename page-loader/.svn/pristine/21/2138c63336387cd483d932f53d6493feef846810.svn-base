<?php
/*
Plugin Name: Page Loader
Plugin URI: https://pluginers.com/
Description: Page Loader is a free WordPress plugin to show a loader animation while the page is being loaded.
Version: 1.2
Author: Pluginers
Author URI: https://pluginers.com/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
 
Page Loader is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Page Loader is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Loading Animation. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

if (!defined('ABSPATH')) { die(); }

class PageLoaderPlugin {

    public function __construct() {
        add_action( 'wp_enqueue_scripts', array( $this, 'include_files' ) );
        add_action( 'wp_body_open', array( $this, 'page_loader' ), 0 );
        add_action( 'wp_footer', array( $this, 'load_fallback' ) );
        include( plugin_dir_path( __FILE__ ) . 'admin.php' );
    }

    // Enqueueing Scripts and Styles for front-end
    public function include_files() {
        wp_enqueue_script( 'pl-script', plugins_url( 'assets/js/script.js', __FILE__ ) );
        wp_enqueue_style( 'pl-style', plugins_url( 'assets/css/style.css', __FILE__ ) );
    }

    // Display Page Loader in the front-end
    public function page_loader() {
        ?>
        <div id="plcover" style="background: <?php
        $backgroundcolor = esc_attr( get_option('background_color') );
        echo (empty($backgroundcolor)) ? '#ffffff' : $backgroundcolor;
        ?>">
            <div id="plcontent">
                <div class="<?php
                $loadericon = esc_attr( get_option('loader_icon') );
                echo (empty($loadericon)) ? 'plcircle' : $loadericon;
                ?>" style="<?php
                    if ( $loadericon == "plcircle" || $loadericon == "plfan" || empty($loadericon)) {
                        echo 'border-color: ';
                    } else if ( $loadericon == "plcircle2" ) {
                        echo 'border-top-color: ';
                    } else {
                        echo 'background: ';
                    }
                    $iconcolor = esc_attr( get_option('icon_color') );
                    echo (empty($iconcolor)) ? '#000000' : $iconcolor;
                ?>;"></div>
            </div>
        </div>
        <?php
    }

    function load_fallback() {
        if (!did_action('wp_body_open')) {
            $this->page_loader();
        }
    }
}

// Instantiate the class
$page_loader_plugin = new PageLoaderPlugin();











