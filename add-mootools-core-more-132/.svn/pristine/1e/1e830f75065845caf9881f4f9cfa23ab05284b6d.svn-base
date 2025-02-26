<?php
/*
Plugin Name: Add Mootools Core + More 1.3.2
Plugin URI: http://mghtb.com/tools/
Description: Adds a single compressed MooTools Core 1.3.2 + Mootools More 1.3.2.1 file to the head of your Wordpress template.
Version: 1.3.2.1
Author: John Robert Morris (@mghtb)
Author URI: http://mghtb.com/
License: GNU General Public License (GPL) version 3

Copyright (C) 2011  John Robert Morris

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

if ( !is_admin() ) {
    $pluginPath = (dirname( __FILE__ ));
    
    if ( file_exists( $pluginPath.'/js/mootools.js' )) {
        // As a precaution, deregister any previous 'mootools' registrations. 
        wp_deregister_script(array('mootools'));
        wp_register_script( 'mootools', WP_PLUGIN_URL.'/add-mootools-1.3.2/js/mootools.js', false, '1.3.2.1');
        wp_enqueue_script('mootools');
    } else {
        // TODO: The mootools library could not be found. We should do something here.
    }
   
}

?>