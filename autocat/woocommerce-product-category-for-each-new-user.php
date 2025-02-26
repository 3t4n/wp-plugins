<?php

/**
* Plugin Name: Woocommerce Product Category for Each New User
* Plugin URI: https://www.abi-webdesign.com
* Description: Creates a Product category for each new WP user
* Version: 1.1
* Author: ABI Web Design
* Author URI: https://abi-webdesign.com
* License: GPL2
*/

?>

<?php


add_action( 'wp_footer', 'wpcenu_set_new_cats' );



function wpcenu_set_new_cats() {

		global $wpdb;
        $tablename = $wpdb->prefix . "users";
        $sql = $wpdb->prepare( "SELECT * FROM {$tablename} ORDER BY user_nicename ASC", $tablename);
        $results = $wpdb->get_results( $sql , ARRAY_A );
        
        /* Get all customers below */
        
        $blogusers = get_users( 'orderby=nicename&role=customer' );
        $i = 0;
        foreach ( $blogusers as $user ) {
        	$nicenames[$i] = $user->user_nicename;
	        $i = $i+1;
        }        

        /* Get all product categories below */
        
        $categories = get_terms( 'product_cat', 'orderby=term_id&hide_empty=0' );
        $i = 0;
        foreach ( $categories as $category ) {
        	$slugs[$i] = $category->slug;
	        $i = $i+1;
        } 
        
        /* Get the last present term ID */
        
        $terms = get_terms('orderby=term_id&hide_empty=0' );
        $i = 0;
        foreach ( $terms as $term ) {

	        $last = $term->term_id;
        }         
        


        foreach($nicenames as $value) {
            
            $existing = '';
            
          foreach($slugs as $slug) {
            if ($slug == $value) {
                $existing = 'yes';

            }

          
              
          }
            
        if ($existing != 'yes') {
            

        $last = $last+1; 

            
            /* DB input of not existing categories starts here*/


            
            $sql = $wpdb->prepare( "INSERT INTO wp_terms(term_id, name, slug) VALUES ('$last', '$value', '$value')", $last);
            $wpdb->query($sql);

  			
  			
            $sql = $wpdb->prepare( "INSERT INTO wp_term_taxonomy(term_taxonomy_id, term_id, taxonomy) VALUES ('$last', '$last', 'product_cat')", $last);
		    $wpdb->query($sql);

    
            
            /* DB input of not existing categories ends here */

        }
            
        }
        


        


}


?>