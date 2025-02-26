<?php
/**
 * @package DS Woocommerce Next Previous Category Products
 * @version 0.1
 */
/*
Plugin Name: DS Woocommerce Next Previous Category Products
Plugin URI: http://store.dotsquares.com/
Description: Shows Next Previous Navigation on product detail page. It will show navigation if the products has been added under product category.
Author: http://dotsquares.com/
Version: 0.1
Author URI: http://dotsquares.com/
*/

define('WNPP_PLUGIN_DIR', __DIR__);
define('WNPP_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
 
// Including settings options file. 
require_once(WNPP_PLUGIN_DIR . '/includes/wnppSettingsPage.inc.php');

// function to check woocommerce version.
function wnpp_check_wc_version(){
    add_action( 'admin_notices', 'wnpp_woocommerce_warning',999,1); 
    return; // STOP THE WHOLE PLUGIN
}
add_action('plugins_loaded', 'wnpp_check_wc_version');

// function to show warning message if woocommerce is not installed.
function wnpp_woocommerce_warning($version = '2.0.0') {
	$version = '2.0.0';
	 
	if ( !defined( 'WOOCOMMERCE_VERSION' )   ){
		$errmsg='Error, you\'re need WooCommerce to run our plugin!';
	}else if( version_compare(WOOCOMMERCE_VERSION, $version, "<" )){ 
		$errmsg='Error, you\'re need higher WooCommerce version to run our plugin!';
	}else{
	return;
	}
	 ?>
     <div class="error">
        <p><?php _e( $errmsg, 'dsproductnav' ); ?></p>
     </div>
   <?php 
}

// Checking if font-awesome is already including otherwise, include. 
add_action('wp_enqueue_scripts', 'wnpp_check_font_awesome', 99999);
function wnpp_check_font_awesome() {
	global $wp_styles;
	$srcs = array_map('basename', (array) wp_list_pluck($wp_styles->registered, 'src') );
	if ( in_array('font-awesome.css', $srcs) || in_array('font-awesome.min.css', $srcs)  ) {
		/* 'font-awesome.css registered'; */
	} else {
		wp_enqueue_style('font-awesome',WNPP_PLUGIN_DIR_URL. '/assets/css/wnpp-font-awesome.min.css' );
	}
}


// Retrieving Next and Prev Products
function wnpp_ShowLinkToProduct($options,$post_id, $categories_as_array, $label, $direction){
	$plugin_url = plugin_dir_url(__FILE__);
    // get post according post id
    $query_args = array('post__in' => array($post_id), 'posts_per_page' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $categories_as_array
    )));
    $r_single = new WP_Query($query_args);
    if ($r_single->have_posts()) {
        $r_single->the_post();
        global $product, $woocommerce;
        $size = wc_get_image_size('shop_thumbnail');
        $placeholder_width = $size['width'];
        $placeholder_height = $size['height']; 
	 
		$output='';
		$output.='<li  class="'.$direction.'"><a href="'.get_the_permalink(get_the_ID()).'" title="'.esc_attr(get_the_title() ? get_the_title() : get_the_ID()).'">';
		if($direction=='previous'){
					$output.='<i class="fa fa-angle-'.(($direction=='next')? 'right':'left').' fa-1" aria-hidden="true"></i>';
		}else{
			if($options['hideProductImage']!='on'){ 
						if (has_post_thumbnail()){
							$output.= get_the_post_thumbnail(get_the_ID(),'shop_thumbnail');
						} else { 
							$output.= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_thumbnail_image_width').'" height="'.$woocommerce->get_image_size('shop_thumbnail_image_height').'" />'; 
						}
					}
		}
					if($options['hideProductDetails']!='on'){
						$output.='<span class="prd_container "> 
						<span class="prd_name">';
							if( get_the_title() ){
								$output.=get_the_title(get_the_ID());
							} else{
								$output.=the_ID();
							}
						$output.='</span>
						'.$product->get_price_html().'</span>';
					}
		
		if($direction=='previous'){
					if($options['hideProductImage']!='on'){ 
						if (has_post_thumbnail()){
							$output.= get_the_post_thumbnail(get_the_ID(),'shop_thumbnail');
						} else { 
							$output.= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_thumbnail_image_width').'" height="'.$woocommerce->get_image_size('shop_thumbnail_image_height').'" />'; 
						}
					}
		}else{
			$output.='<i class="fa fa-angle-'.(($direction=='next')? 'right':'left').' fa-1" aria-hidden="true"></i>';
		}
		$output.= ' <div class="clear"></div>
				</a> 
				</li>'; 
    
		echo $output; 
 
        wp_reset_query();
    }
}

// Start of the plugin.
function wnpp_start($options) {

    if (is_singular('product')) {
        global $post, $woocommerce;
		
		$options = get_option( 'ds_product_option' );
		if($options['enable']!='on') return;
		 
        // get categories
        $terms = wp_get_post_terms($post->ID, 'product_cat');
        foreach ($terms as $term)
            $cats_array[] = $term->term_id;

        // get all posts in current categories
        $query_args = array('posts_per_page' => -1, 'post_status' => 'publish', 'post_type' => 'product', 'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'id',
                    'terms' => $cats_array
        )));
        $r = new WP_Query($query_args);

        // show next and prev only if we have 3 or more
        if ($r->post_count > 2) {

            $prev_product_id = -1;
            $next_product_id = -1;

            $found_product = false;
            $i = 0;

            $current_product_index = $i;
            $current_product_id = get_the_ID();

            if ($r->have_posts()) {
                while ($r->have_posts()) {
                    $r->the_post();
                    $current_id = get_the_ID();

                    if ($current_id == $current_product_id) {
                        $found_product = true;
                        $current_product_index = $i;
                    }

                    $is_first = ($current_product_index == $first_product_index);

                    if ($is_first) {
                        $prev_product_id = get_the_ID(); // if product is first then 'prev' = last product
                    } else {
                        if (!$found_product && $current_id != $current_product_id) {
                            $prev_product_id = get_the_ID();
                        }
                    }

                    if ($i == 0) { // if product is last then 'next' = first product
                        $next_product_id = get_the_ID();
                    }

                    if ($found_product && $i == $current_product_index + 1) {
                        $next_product_id = get_the_ID();
                    }

                    $i++;
                }
                ?>
				<ul class="product_list_widget <?php echo (($options[location]=='beforetitle')? '': 'float_dir'); ?> cust_color">
				<?php
					if ($prev_product_id != -1) {
						wnpp_ShowLinkToProduct($options,$prev_product_id, $cats_array, "next", "previous");
					}
					if ($next_product_id != -1) {
						wnpp_ShowLinkToProduct($options,$next_product_id, $cats_array, "previous", "next");
					}
                ?>
				</ul>
				<style>
				.product_list_widget { margin-bottom:10px;}
				.woocommerce div.product { clear: both;}
				ul.product_list_widget {width: 100%;float: left;}
				li.previous {float: left;}
				li.next {float: right;}
				li.previous a img:first-child { float: left;}
				/**/
				.product_list_widget li.previous a i,
				.product_list_widget li.next a i { font-size: 52px; margin-right: 10px; vertical-align:middle;}
				
				.product_list_widget li.previous a img,
				.product_list_widget li.next a img { float:none; margin:0;}
				
				.product_list_widget li.previous .prd_container,
				.product_list_widget li.next .prd_container { display: inline-block; line-height: normal;  vertical-align:middle; margin-right: 10px; min-width: 100px; max-width: 175px; font-weight:normal;}
				
				.product_list_widget li.previous .prd_name,
				.product_list_widget li.next .prd_name {display: block;}

				.product_list_widget li.next a i { /*font-size:52px; float:right; margin-left:10px; vertical-align:middle !important;*/}
				.product_list_widget li.next a img { /*float:left;margin-top: 10px;*/}
				.product_list_widget li.next .prd_container { /*float:right;line-height: normal; margin: 7px 5px 0 10px; min-width: 100px; text-align:right;  max-width: 175px; font-weight:normal;*/    margin-left: 10px;
    margin-right: 0;}
				.product_list_widget li.next .prd_name { /*display:block;*/}

				.product_list_widget .clear { /*clear:both;*/}

				/*Float Direction*/
				.product_list_widget.float_dir {/* position:fixed; z-index:99; width: 90%; left: 5%; */}
				.product_list_widget.float_dir.cust_color li.previous a { z-index:99999; position:fixed; left:5%;box-shadow:1px 1px 3px 0px #ddd;} 
				.product_list_widget.float_dir.cust_color li.next a {z-index:99999; position:fixed; right:5%; box-shadow:-1px 1px 3px 0px #ddd;}
					 
				/*Custom Color*/
				.product_list_widget.cust_color li.previous a,
				.product_list_widget.cust_color li.next a 
					{ background:<?php echo (($options[arrowbgColor]!='')? $options[arrowbgColor]:'#f3f3f3'); ?>; padding: 0 7px;} 
				/*Arrows Color*/	
				.product_list_widget.cust_color li.previous a i,
				.product_list_widget.cust_color li.next a i 
					{ color:<?php echo (($options[arrowColor]!='')? $options[arrowColor]:'#444'); ?>;}

				/*Product Detail Color*/	
				.product_list_widget.cust_color li.previous .prd_container,
				.product_list_widget.cust_color li.next .prd_container 
					{ color:<?php echo (($options[arrowTextColor]!='')? $options[arrowTextColor]:'#666'); ?>;}

				/*Responsive*/
				@media(max-width:599px) {
				.product_list_widget li.previous a i,
				.product_list_widget li.next a i { font-size:32px;}
				
				.product_list_widget li.previous .prd_container,
				.product_list_widget li.next .prd_container { font-size:14px; margin-top:0;}
				
				.product_list_widget li.next a img { /*margin-top:2px;*/}
				.product_list_widget li.previous a i { margin-right:5px;}
				.product_list_widget li.next a i { margin-left:5px;}
				}
				@media(max-width:479px) {
					.product_list_widget li.previous .prd_container,
					.product_list_widget li.next .prd_container,
					.product_list_widget li.previous a img,
					.product_list_widget li.next a img { display:none;}
				}
				/**/
				</style>
<?php
            }

            wp_reset_query();
        }
    }
}

add_action('woocommerce_before_single_product', 'wnpp_start',10,1);