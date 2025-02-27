<?php
/*
Plugin Name: TicketSource Ticket Shop
Plugin URI: https://www.ticketsource.co.uk/kb/additional-services-and-integrations/wordpress-plugin
Description: TicketSource Ticket Shop plugin for WordPress.
Version: 3.1.0
Requires PHP: 7.4
Author: TicketSource
Author URI: https://ticketsource.co.uk/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.txt
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

Copyright 2005-2018 TicketSource.
*/
if ( ! class_exists( 'ticketsource_events') ):
    class ticketsource_events {

        private static $instance;

        public static function instance() {
            if ( ! isset( self::$instance ) && ! ( self::$instance instanceof ticketsource_events ) ) {
                self::$instance = new ticketsource_events();
                self::$instance->setup_constants();
                self::$instance->includes();
                self::$instance->build = new ticketsource_events_build();
            }
            return self::$instance;
        }

        private function __construct() {}

        private function setup_constants() {

            if ( ! defined( 'TS_VERSION' ) ) {
                define( 'TS_VERSION', '3.1.0');
            }

            if ( ! defined( 'TS_PLUGIN_DIR' ) ) {
                define( 'TS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
            }
        }

        private function includes() {
            require_once TS_PLUGIN_DIR . 'includes/ticketsource-events-build.php';
        }
    }
endif; // end class

function import_ticketsource_events() {
    return ticketsource_events::instance();
}
global $ts_events;
$ts_events = import_ticketsource_events();