<?php
/*
Plugin Name: Ajax the metaboxes
Plugin URI: http://www.prometod.eu/en/ajax-wordpress-boilerplate-plugin/
Description: A plugin that gives the Wordpress developer two sample buttons, that are already implementing the native Wordpress's AJAX functionality
Version: 1.0.0
Author: peeping4dsun

Copyright 2014 Deyan Totev  (email : deyan8284@gmail.com)

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
// Note: the names of the functions and values are set as the initial name of the plugin, which was "Ajax boilerplate plugin"
// Changing the names seems not necessary as the names are still relevant to the actions and purposes they serve

	function metabox_ajax_boilerplate(){
	
            //-------------------------  function creating the input form visible in the admin metabox
            //-------------------------  If you want to easy add a new button follow the procedure:
            //-------------------------  Add a new row after<input type="submit" name="bp_ajax_submit_field2....
            //-------------------------  Use the template of the two buttons and set new class, for example class="my_new_API"
            //-------------------------  copy the code between the comment lines 'handling button #1' 'handling button #2' located in js file
            //-------------------------  paste and edit the code in proper manner so your new button is AJAX connected 
            //-------------------------  check the function 'bp_ajax_process' and its comments
            //-------------------------  it should be easy to take the last step with no further help
			
	?>
            <form id="form_id_bp_ajax">
				<input type="text" class="bp_ajax_input_field" placeholder="Add your text" value="">
				<input type="submit"  class="bp_ajax_submit_field"  value="Get AJAX data" />
                <input type="submit" name="bp_ajax_submit_field_2" class="bp_ajax_submit_field_2"  value="Get more AJAX data" />
				<input type="hidden" name="bp_ajax-submitted" class="bp_ajax-submitted" value="true" />
             
				<?php 
                                //------------------------- Setting the nonce in order to use this Wordpress security feature
								
                                 wp_nonce_field( 'bp_ajax_action', 'bp_ajax-nonce' );
                                ?>
            </form>
                    <!-- The following div will display your AJAX data -->
					
                    <div id="bp_ajax_results"></div>
		<?php
		}
                //------------------------- Common procedure to set the metabox
				
		add_action('admin_menu', 'metabox_ajax_boilerplate_function');
		
		function  metabox_ajax_boilerplate_function() {			
			    if( function_exists( 'add_meta_box' )) {
				
				add_meta_box( 'bp_ajax_plugin', 'AJAX Data', 'metabox_ajax_boilerplate', 'page', 'advanced', 'high' );
				add_meta_box( 'bp_ajax_plugin', 'AJAX Data', 'metabox_ajax_boilerplate', 'post', 'advanced', 'high' );
				
		    }else{
			
				add_action('dbx_post_advanced', 'metabox_ajax_boilerplate' );
				add_action('dbx_page_advanced', 'metabox_ajax_boilerplate' );
				
		    }
		}
                //------------------------- Sample function appending user input to the text ' I work in AJAX'
		
		function get_any_data($data){
                    /*
                    *IMPORTANT! Example function that sends data to the bp_ajax_process function 
                    */
		
		return $data.' I work in AJAX';
		
            }
            //-------------------------
			
            function bp_ajax_process(){
                 /*
                    *IMPORTANT! This is the function that sends data via AJAX to the metabox
                    * Here you can exchange data with your custom functions 
                    */
                //------------------------- Common procedure to ensure that only authorized users receives the data
				
               if ( isset( $_POST['submission'] ) && $_POST['submission'] && wp_verify_nonce( $_POST['nonce'], 'bp_ajax_action' ) )
               {
			   
               //------------------------- Get the data from button #1 and echo the result of exchanging data with the sample function 'get_any_data'
			   
                if(isset( $_POST['data'])){
                 $coming_data = $_POST['data'];
                 $end_data = get_any_data($coming_data);
                 echo $end_data;
                }
				
                //------------------------- Get the data from button #2 and echo the result of exchanging data with the sample function 'get_any_data'
				
                 if(isset( $_POST['data2'])){
                 $coming_data2 = $_POST['data2'];
                 $end_data = get_any_data($coming_data2);
				 echo $end_data;
                 }
               }else{echo "you have insufficient rights to perform this operation";}
                die();
            }
				// It is common to want to style the metabox
				// In this case, uncomment the next 2 lines of comment to register and enqueue css file with name ajax-the-metaboxes.css
				// wp_register_style( 'custom-ajax-css', plugin_dir_url(__FILE__) . 'ajax-the-metaboxes.css' ); 
				
				add_action( wp_ajax_bp_action, bp_ajax_process );
				
                function simpleboilerplate_load_scripts() {
				// wp_enqueue_style( 'custom-ajax-css' );
	wp_enqueue_script( 'custom-js', plugin_dir_url(__FILE__). 'ajax-the-metaboxes.js', array('jquery')  );
}
				add_action('admin_enqueue_scripts', 'simpleboilerplate_load_scripts');
				add_action( 'wp_enqueue_scripts', 'simpleboilerplate_load_scripts' );