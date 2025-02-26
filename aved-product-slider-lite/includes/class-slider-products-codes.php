<?php 
// Classes by codes generator operation
// AVS Core
?>

<?php 

class AVS_product_id_code
{
	public static function get_code($id)
	{
		if(isset($id) && $id != 0)
		{
			$slider_obj = AVS_data_op_API::get_slider_by_id($id);
			if( !isset($slider_obj) ) {	return false; 	}
			?>
			<div  id='AVS_slider_product_id' class='content-slider col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
				<div class='avs-slider-core'>
					<?php
						if(!isset($slider_obj->params['slides'])){return false;}
						foreach ($slider_obj->params['slides'] as $key) {
						?>
						<div class='slide visible'>
							<?= do_shortcode('[product id="'.$key.'"]');?>
						</div>
						<?php
						}
					?>	
				</div>
			</div>
			<?php
			// Output core slider
			AVS_scripts_loader::get_configurated_script_code($slider_obj);
			// End core
		}
		else{return false;}
	}
}

class AVS_product_page_category_code
{
	public static function get_code($id)
	{
		if(isset($id) && $id != 0)
		{
			global $wp;
			$current_url = home_url(add_query_arg(array(),$wp->request));
			$category_slug = basename( $current_url );

			if(!isset($category_slug))
			{
				return false;
			}
			if(!is_archive()){
				return 'This page not category page!!!';
			}
			$slider_obj = AVS_data_op_API::get_slider_by_id($id);
			if( !isset($slider_obj) ) {	return false; 	}
			// print_r($slider_obj);
			$args = array(
				'post_type' => 'product',
				'post_status'=>'publish',
				'orderby'    => 'post_date',
				'order'      => 'DESC',
				'product_cat'	 => $category_slug,
				'post_per_page' => $slider_obj->count_slides
				);
			$posts = get_posts($args);

			if( (!isset($posts)) || (!isset($slider_obj)) )
			{
				return false;
			}
			?>
			<div  id='AVS_slider_product_page_category' class='content-slider col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
			<h2><?= $slider_obj->name;?></h2>
				<div class='avs-slider-core'>
					<?php
						$counter = 0;
						foreach ($posts as $post) 
						{
						?>
							<div class='slide visible'>
								<?= do_shortcode('[product id="'.$post->ID.'"]');?>
							</div>
						<?php
							
							$counter++;
							if( $counter+1 == $slider_obj->count_slides )
							{
								break;
							}	
						}
					?>	
				</div>
			</div>
			<?php
			// Output core slider
			AVS_scripts_loader::get_configurated_script_code($slider_obj);
			// End core
		}
		else{return false;}
	}
}


class AVS_viewed_products
{
	public static function get_code($id)
	{	
		if(isset($id) && $id != 0)
		{
			$slider_obj = AVS_data_op_API::get_slider_by_id($id);
			$list = AVS_viewed_products::viewed_products_($slider_obj);
			if( !isset($slider_obj) || !isset($list)) {	return false; 	}
			?>
			<div  id='AVS_slider_product_id' class='content-slider col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
				<div class='avs-slider-core'>
					<?php
						
						foreach ($list as $ID ) {
						?>
							<div class='slide visible'>
								<?= do_shortcode('[product id="'.$ID.'"]');?>
							</div>
						<?php
						}
					?>	
				</div>
			</div>
			<?php
			// Output core slider
			AVS_scripts_loader::get_configurated_script_code($slider_obj);
			// End core
		}
		else{return false;}
	}
	public static function viewed_products_( $params ) {
 
    // Get shortcode parameters
    
	 $content = null;
	    // Get WooCommerce Global

	    global $woocommerce;
	 
	    // Get recently viewed product cookies data
	    $viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
	    $viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
	 
	    // Create the object
	    ob_start();
	 
	    // Get products per page
	    
	 
	    // Create query arguments array
	    $query_args = array(
	                    'posts_per_page' => $params->count_slides, 
	                    'no_found_rows'  => 1, 
	                    'post_status'    => 'publish', 
	                    'post_type'      => 'product', 
	                    'post__in'       => $viewed_products, 
	                    'orderby'        => 'rand'
	                    );
	 
	    // Add meta_query to query args
	    $query_args['meta_query'] = array();
	 
	    // Check products stock status
	    $query_args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
	 
	    // Create a new query
	    $r = new WP_Query($query_args);
	 
	    // If query return results
	     
	    if ( $r->have_posts() ) {
	        // Start the loop 
	        $i = 0;
	        while ( $r->have_posts()) {
	            $r->the_post();
	            global $product;
	            
	            $args_e[$i] = $product->id;
	         $i++;
	        }
	       
	    }
	    return $args_e;
	}
}

class AVS_product_category
{
	public static function get_code($id)
	{
		if(isset($id) && $id != 0)
		{
			$slider_obj = AVS_data_op_API::get_slider_by_id($id);
			$category_id = $slider_obj->params['category'];
			$arguments = array(
				'post_type'             => 'product',
    			'post_status'           => 'publish',
    			'posts_per_page'        => $slider_obj->count_slides,
				'taxonomy' => 'product_category',
				'tax_query'             => array( array( 'taxonomy'      => 'product_cat', 'field' => 'term_id', 'terms'         => $category_id, 'operator'      => 'IN' ) )
			);

			$products = get_posts($arguments);
			if( (!isset($products)) ||  (!isset($slider_obj))  || (!isset($category_id)) )
				{
					return false;
				}
			?>
			<div  id='AVS_slider_product_id' class='content-slider col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1'>
				<div class='avs-slider-core'>
					<?php
						foreach ($products as $product ) {
						?>
							<div class='slide visible'>
								<?= do_shortcode('[product id="'.$product->ID.'"]');?>
							</div>
						<?php
						}
					
					?>	
				</div>
			</div>
			<?php
			// Output core slider
			AVS_scripts_loader::get_configurated_script_code($slider_obj);
			// End core
		}
		else{return false;}
	}
}


?>