<?php
/**
Plugin Name: Admin Post Formats filter
Plugin URI: http://wordpress.org/extend/plugins/admin-post-formats-filter/
Description: Display the post format filter in post page
Author: Pandikamal
Version: 1.0
Author URI: 
*/
?>
<?php

if(!class_exists('P_Formats')):
  
  class P_Formats {
	  
			   function __construct(){
					 add_action('restrict_manage_posts', array($this,'pf_restrict_manage_posts'),12);
					 add_action( 'parse_query', array($this,'pf_parse_query'),12 );
			   } 
			   
			  
			  function pf_restrict_manage_posts(){
				  global $typenow;
                  $p_format = isset($_GET['pf_format'])?$_GET['pf_format']:0;
			      if ($typenow != 'post') return;
                        wp_dropdown_categories(array('taxonomy'=> 'post_format', 'name' => 'pf_format', 'show_option_none' => 'Show All Formats','selected' => $p_format));
                       
			  }
			  function pf_parse_query($query){
				 global $pagenow,$typenow;
				 if ($typenow != 'post') return;
				 $p_format = isset($_GET['pf_format'])?$_GET['pf_format']:0;
				 if($p_format == 0) return;
                  $tax_group = array( 
					'taxonomy' => 'post_format', 
					'terms' => array( $p_format), 
					'field' => 'ID', 
					'operator' => 'IN',
					'include_children' => 1
				 );
				set_query_var( 'tax_query', array( $tax_group ) );
			  } 
			  
   } // end class
  
    
  if(!isset($p_formats_obj))
  $p_formats_obj = new P_Formats();

	
endif; // end class