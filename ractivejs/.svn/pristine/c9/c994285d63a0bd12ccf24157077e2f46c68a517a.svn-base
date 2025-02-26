<?php
/**
 * Plugin Name: RactiveJS
 * Plugin URI: http://www.fuzzguard.com.au/plugins/ractivejs
 * Description: Adds RactiveJS FrameWork library to WordPress
 * Version: 1.3
 * Author: Benjamin Guy
 * Author URI: http://www.fuzzguard.com.au
 * Text Domain: ractivejs
 * License: GPL2

    Copyright 2014  Benjamin Guy  (email: beng@fuzzguard.com.au)

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


/**
* Don't display if wordpress admin class is not found
* Protects code if wordpress breaks
* @since 0.1
*/
if ( ! function_exists( 'is_admin' ) ) {
    header( 'Status: 403 Forbidden' );
    header( 'HTTP/1.1 403 Forbidden' );
    exit();
}



/**
* Create class ractiveJS() to prevent any function name conflicts with other WordPress plugins or the WordPress core.
* @since 0.1
*/
class ractiveJS {

        /**
        * Register the required RactiveJS files
        * @since 1.0
        */
        function register_js_files()
        {
		wp_register_script ('ractive-js', plugins_url( '/ractive.min.js', __FILE__  ), false, '0.8.1', true);

		$this->register_events_scripts();
		$this->register_transitions_scripts();
	}


        /**
        * Register the RactiveJS scripts for Events (http://docs.ractivejs.org/latest/events-overview)
        * @since 1.1
        */

	function register_events_scripts() {
                wp_register_script ('ractive-hover', plugins_url( '/plugins/hover/ractive-hover.min.js', __FILE__  ), array('ractive-js'), '0.2.0', true); #https://github.com/ractivejs/ractive-events-hover/
                wp_register_script ('ractive-keys', plugins_url( '/plugins/keys/ractive-keys.min.js', __FILE__  ), array('ractive-js'), '0.2.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-events-keys/master/dist/ractive-events-keys.js
                wp_register_script ('ractive-mousewheel', plugins_url( '/plugins/mousewheel/ractive-mousewheel.min.js', __FILE__  ), array('ractive-js'), '0.1.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-events-mousewheel/master/ractive-events-mousewheel.js
                wp_register_script ('ractive-resize', plugins_url( '/plugins/resize/ractive-resize.min.js', __FILE__  ), array('ractive-js'), '0.1.3', true); #https://raw.githubusercontent.com/smallhadroncollider/ractive.events.resize/master/ractive.events.resize.js
                wp_register_script ('ractive-tap', plugins_url( '/plugins/tap/ractive-taps.min.js', __FILE__  ), array('ractive-js'), '0.3.1', true); #http://ractivejs.github.io/ractive-events-tap/ractive-events-tap.js
                wp_register_script ('ractive-touch-hammer', plugins_url( '/plugins/touch/hammer.min.js', __FILE__  ), false, '2.0.8', true); #https://cdn.rawgit.com/hammerjs/hammer.js/2.0.1/hammer.js
                wp_register_script ('ractive-touch', plugins_url( '/plugins/touch/ractive-touch.min.js', __FILE__  ), array('ractive-js', 'ractive-touch-hammer'), '0.4.0', true); #https://raw.githubusercontent.com/rstacruz/ractive-touch/master/index.js
                wp_register_script ('ractive-typing', plugins_url( '/plugins/typing/ractive-typing.min.js', __FILE__  ), array('ractive-js'), '0.0.1', true); #https://raw.githubusercontent.com/svapreddy/ractive-events-typing/master/ractive-events-typing.js
                wp_register_script ('ractive-viewport', plugins_url( '/plugins/viewport/ractive-viewport.min.js', __FILE__  ), array('ractive-js'), '0.0.1', true); #https://raw.githubusercontent.com/svapreddy/ractive-event-viewport/master/lib/in-view.js
	}

        /**
        * Register the RactiveJS scripts for Transitions (http://docs.ractivejs.org/latest/transitions)
        * @since 1.1
        */

        function register_transitions_scripts() {
                wp_register_script ('ractive-fade', plugins_url( '/plugins/fade/ractive-fade.min.js', __FILE__  ), array('ractive-js'), '0.3.1', true); #https://raw.githubusercontent.com/ractivejs/ractive-transitions-fade/master/dist/ractive-transitions-fade.js 
				wp_register_script ('ractive-fly', plugins_url( '/plugins/fly/ractive-fly.min.js', __FILE__  ), array('ractive-js'), '0.3.0', true); #http://ractivejs.github.io/ractive-transitions-fly/ractive-transitions-fly.js
                wp_register_script ('ractive-scale', plugins_url( '/plugins/scale/ractive-transitions-scale.min.js', __FILE__  ), array('ractive-js'), '0.1.0', true); #https://raw.githubusercontent.com/1N50MN14/Ractive-transitions-scale/master/Ractive-transitions-scale.js
                wp_register_script ('ractive-slide', plugins_url( '/plugins/slide/ractive-transitions-slide.min.js', __FILE__  ), array('ractive-js'), '0.4.0', true); #https://raw.githubusercontent.com/ractivejs/ractive-transitions-slide/master/src/ractive-transitions-slide.js
                wp_register_script ('ractive-slide-horizontal', plugins_url( '/plugins/slide/ractive-transitions-slidehorizontal.min.js', __FILE__  ), array('ractive-js'), '1.0.3', true); #https://raw.githubusercontent.com/zenflow/ractive-transitions-slidehorizontal/master/src/ractive-transitions-slidehorizontal.js
				wp_register_script ('ractive-typewriter', plugins_url( '/plugins/typewriter/ractive-transitions-typewriter.min.js', __FILE__  ), array('ractive-js'), '0.1.1', true); #https://raw.githubusercontent.com/RactiveJS/Ractive-transitions-typewriter/master/Ractive-transitions-typewriter.js

	}

} //End of ractiveJS() class



/**
* Define the Class
* @since 0.1
*/
$ractive = new ractiveJS();


/**
* Load RactiveJS FrameWork
* @since 0.1
*/
	add_action( 'wp_enqueue_scripts', array($ractive, 'register_js_files'), 5);
?>
