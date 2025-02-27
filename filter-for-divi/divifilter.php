<?php
/*
  Plugin Name:        Filter for Divi
  Plugin URI:         https://shop.danielvoelk.de/#divi-filter
  Description:        A plugin to filter every module in the Divi theme.
  Version:            2.0.2
  Author:             Daniel Völk
  Author URI:         https://danielvoelk.de/
  License:            GPL2
  License URI:        https://www.gnu.org/licenses/gpl-2.0.html
  
  Divi Filter is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.
  
  Divi Filter is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.
  
  You should have received a copy of the GNU General Public License
  along with Divi Filter. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
  */

  /** Our plugin class */
  class DiviFilter {
    public function __construct() {

      /** add filter files */
      add_action( 'wp_enqueue_scripts', [ $this, 'divifilter_add_files' ] );  

      /** add Upgrade link */
      add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), [ $this, 'filter_action_links' ] );

      /** add Documentation link */
      add_filter( 'plugin_row_meta', [ $this, 'add_documentation_link' ], 10, 2 );
 
    }

    public function filter_action_links( $links ) {

      $links['upgrade'] = '<a style="font-weight: bold;" href="https://shop.danielvoelk.de/" target="_blank">Go Premium</a>';;

      return $links;
     }
    
    public function divifilter_add_files() {

      wp_register_script('df-script', plugins_url('df-script.js', __FILE__), array('jquery'),'2.0.2', true);
      wp_enqueue_script('df-script');
    
      wp_register_style('df-style', plugins_url('df-style.css', __FILE__), array(), '2.0.2');
      wp_enqueue_style('df-style');
    
    }

    public function add_documentation_link( $links, $file ) {    
      if ( plugin_basename( __FILE__ ) == $file ) {
        $row_meta = array(
          'docs'    => '<a href="https://docs.danielvoelk.de/" target="_blank">Documentation</a>'
        );

        return array_merge( $links, $row_meta );
      }
      return (array) $links;
    }

}

new DiviFilter();