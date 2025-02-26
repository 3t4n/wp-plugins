<?php
if (!defined('ABSPATH'))
  exit ;
// Exit if accessed directly.

class WPCAV_Product {

  protected $textdomain;
  protected $version;

  public function __construct($textdomain, $version) {

    $this -> textdomain = $textdomain;
    $this -> version = $version;
		
		
	
		 add_action( 'wp_enqueue_scripts',  array($this,'load_styles' ));
		 add_action( 'wp_enqueue_scripts',  array($this,'load_scripts' )); 
		 
		
    add_action('woocommerce_after_single_product', array($this,'woocommerce_cav_relation_product_options'));

  }
	
	
	function load_scripts(){
		
		 wp_enqueue_script( 'wc_cav_owlslider', WPCAV_SCRIPTS . 'owl.carousel.js', array( 'jquery' ), '1.0', true );
		 wp_enqueue_script( 'wc_cav_script', WPCAV_SCRIPTS . 'script.js', array( 'wc_cav_owlslider' ), '1.0', true  );
		 
	}
	
	function load_styles(){
		
		wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'); 
		 wp_enqueue_style( 'wccav_owlslider_stylesheet', WPCAV_STYLES.'owl.carousel.css', false ); 
		 wp_enqueue_style( 'wccav_owlslider_theme', WPCAV_STYLES.'owl.theme.css', false ); 
		  wp_enqueue_style( 'wccav_stylesheet', WPCAV_STYLES.'style.css', false ); 
	 
		 
	}

  function woocommerce_cav_relation_product_options() {
  	
		$this->cav_update_option();
		$this->cav_show_block();

  }

  function cav_update_option() {
  	
		 

    global $post;
    $customer_also_viewed = !empty($_COOKIE['woocommerce_recently_viewed']) ? (array) explode('|', $_COOKIE['woocommerce_recently_viewed']) : array();
    if (($key = array_search($post -> ID, $customer_also_viewed)) !== false) { unset($customer_also_viewed[$key]);
    }

    if (!empty($customer_also_viewed)) {

      foreach ($customer_also_viewed as $viewed) {
        $option = 'customer_also_viewed_' . $viewed;
        $option_value = get_option($option);

        if (isset($option_value) && !empty($option_value)) {
          $option_value = explode(',', $option_value);
          if (!in_array($post -> ID, $option_value)) {
            $option_value[] = $post -> ID;
          }
        }

        $option_value = (count($option_value) > 1) ? implode(',', $option_value) : $post -> ID;
			  
        update_option($option, $option_value);
      }

    }

  }
	
	
	function cav_show_block(  ) {
				
				 // Get WooCommerce Global
        global $woocommerce;
        global $post;
				
        $per_page = get_option( 'wc_settings_tab_alsoviewed_total_items_display' );
        $plugin_title = get_option( 'wc_settings_tab_alsoviewed_title' );
        $category_filter = get_option( 'wc_settings_tab_alsoviewed_category_filter' );
       
        $show_rating_filter = get_option( 'wc_settings_tab_alsoviewed_show_rating' );
        $show_price_filter = get_option( 'wc_settings_tab_alsoviewed_show_price' );
        $show_addtocart_filter = get_option( 'wc_settings_tab_alsoviewed_show_addtocart' );
        $product_order = get_option( 'wc_settings_tab_alsoviewed_product_order' );
				$custom_css = get_option( 'wc_settings_tab_alsoviewed_customcss' );
				$color_schema = get_option( 'wc_settings_tab_color_schema' );
       
			 
        // Get recently viewed product data using get_option

        $customer_also_viewed = get_option('customer_also_viewed_'.$post->ID);  
        if(!empty($customer_also_viewed))        
        {  
            $customer_also_viewed = explode(',',$customer_also_viewed);
            $customer_also_viewed = array_reverse($customer_also_viewed);       
            
            //Skip same product on product page from the list
            if(($key = array_search($post->ID, $customer_also_viewed)) !== false) { unset($customer_also_viewed[$key] ); }

            $per_page = ($per_page == "")? $per_page = 5 : $per_page;
            $plugin_title = ($plugin_title == "")? $plugin_title = 'Also Viewed' : $plugin_title;

            // Create the object
            ob_start();        

            $categories = get_the_terms( $post->ID, 'product_cat' );  
            
            // Create query arguments array
            $query_args = array(
                                    'posts_per_page' => $per_page, 
                                    'no_found_rows'  => 1, 
                                    'post_status'    => 'publish', 
                                    'post_type'      => 'product',                                
                                    'post__in'       => $customer_also_viewed                                
                                    );
           
            $query_args['orderby'] = ($product_order == '') ? 'ID(ID, explode('.$customer_also_viewed.'))' : $product_order;
           

            //Executes if category filter applied on product page
            
            if($category_filter == 'yes' && !empty($categories))
            {
                foreach ($categories as $category) {
                if($category->parent == 0){
                       $category_slug = $category->slug;
                    }
                }
                $query_args['product_cat'] = $category_slug;
            }

            // Add meta_query to query args
            $query_args['meta_query'] = array();

            // Check products stock status
            $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();

            // Create a new query
            $products = new WP_Query($query_args); 
          
            // If query return results
            if ( !$products->have_posts() ) {     
                // If no data, quit            
                exit;           
            } 
            else {         
              require_once (WPCAV_PATH . '/views/product/tpl.php');
             }
            wp_reset_postdata();
        }
}

}//# End class
