<?php

if ( !defined( 'ABSPATH' ) ) {

    exit;

}

if ( !class_exists( 'Food_Online_Product' ) ) {

     /**

		 * Class Food_Online_Product

		 *

		 * @since 1.0

		 */

    class Food_Online_Product

    {

	public static $item_icon;
	public static $cats_to_include;
	public static $modal_settings;
	public static $counter = 1;
	public static $do_image;
	public static $image_size;
	public static $isWpml;


	public static $products_shortcode_list;

public static function isWpml(){


	self::$isWpml = isset(self::$isWpml) ? self::$isWpml : class_exists('SitePress');
	return self::$isWpml;
}
function variation_has_option( $var ) {

   $variation_attr =  $var-> get_variation_attributes( );
	$variation_has_option = array_search("", $variation_attr);
	return $variation_has_option;
}

		public static function get_icon(){

			if(!isset(self::$item_icon)){

		 self::$item_icon = WC_Admin_Settings::get_option('fdoe_item_icon');


			}

		 return self::$item_icon;

		}
		public static function get_modal_settings(){

			if(!isset(self::$modal_settings)){

		 self::$modal_settings = array(  get_option('fdoe_popup_simple','yes') == 'yes',get_option('fdoe_popup_variable','yes') == 'yes' , get_option('fdoe_is_prem','no') == 'yes', get_option('fdoe_popup_variable','yes'),get_option('fdoe_popup_simple','yes'),get_option('fdoe_popup_grouped','redirect'),get_option('fdoe_popup_bundle','redirect'));


			}

		 return self::$modal_settings;

		}










		// Get the single page shortcode
		private static function do_product_shortcode(  $id, $force){


			if(self::$counter <= 50 || get_option('fdoe_fallback_modal','no') == 'yes'){


			$to_return =   do_shortcode('[product_page id="' . $id . '" ]') ;



			self::$counter++;


			return $to_return;
		}else{return '';}
		}




			public static function get_image_src($product){

				if(!isset(self::$do_image) || !isset(self::$image_size)){
				$image_in_modal = in_array('image', WC_Admin_Settings::get_option('fdoe_product_popup_content_spec', array()) ) ? true : false;

				$image_in_menu = get_option('fdoe_show_images','rec') !== 'hide'   ? true : false;
				$popup_is_theme = get_option('fdoe_product_popup_content', 'custom') == 'theme';
				$use_popup = get_option('fdoe_popup_variable', 'yes') == 'yes' || get_option('fdoe_popup_simple', 'yes') == 'yes';
				self::$image_size = get_option('fdoe_image_size', 'default');
				self::$do_image = $image_in_menu || ($use_popup && ($image_in_modal || $popup_is_theme ));
				}



		if(self::$do_image){

			switch (self::$image_size) {
    case 'default':
       $image_src = $product->get_image(array( 200, 200),$placeholder = true);
        break;
    case 'woocommerce_thumbnail':
         $image_src = $product->get_image('woocommerce_thumbnail',$placeholder = true);
        break;

	 default:
        $image_src = array();
	}
		}else{
			 $image_src = array();
		}


			return $image_src;
			}
		 // Gets the products and returns them to the loop
		public function get_add_links($product,$type, $temp_modal_settings){
				$force =  false;
			switch($type){

				case 'simple':
					switch($temp_modal_settings[4] ){
						case 'no':
								$product_add_url = $product->add_to_cart_url();
								$do_add_url =	'<span><a href="" class="add_to_cart_button fdoe_simple_add_to_cart_button product_type_simple" data-product_id="'. $product->get_id()  .'" data-product_sku="'.$product->get_sku().'"   data-quantity="1" rel="nofollow">  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
								$add_mode = 'instant';
								break 2;
						case 'redirect':
							$product_add_url = get_permalink($product->get_id() );

							$do_add_url =	'<span><a href="'.$product_add_url.'"  rel="nofollow" class="fdoe-product-link"  >  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
							$add_mode = 'redirect';
							break 2;
						default:
							$do_add_url = '';
							$add_mode = 'popup';
							break 2;

					}
				case 'variable':
					switch($temp_modal_settings[3] ){
						case 'no':

										$product_add_url = get_permalink($product->get_id() );

									$do_add_url =	'<span><a href="'.$product_add_url.'"  rel="nofollow" class="fdoe-product-link"  >  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
									$add_mode = 'redirect';
									break 2;
						case 'add':
								$children_id =  $product-> get_visible_children();
								$variable_has_option = false;

									foreach($children_id as $child_id){
										$var = wc_get_product($child_id);

										$variable_has_option = $variable_has_option ? $variable_has_option : $this->variation_has_option($var) !== false;


											if(!$var ->is_purchasable() || !$var ->variation_is_active() || !$var -> variation_is_visible() || !$var->is_in_stock() ){
												continue;
											}



										$children[] = array_combine(
										array('id','price','name'),
										array($child_id, $var->get_price_html(), wc_get_formatted_variation( $var, true, false, false ) )
											);

									}

								$do_add_url =	'<span><a href="" class="fdoe_var_add" data-inactive="true"  data-variation_atts="" data-variation_id="" data-add-to-cart="" data-quantity="1" rel="nofollow">  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
								$add_mode =  $variable_has_option ?  'popup' : 'instant';
								$force =  $variable_has_option;



								break 2;
							default:
								$do_add_url = '';
								$add_mode = 'popup';
								break 2;

					}

				case 'grouped':
							switch($temp_modal_settings[5] ){
						case 'instant':
								$product_add_url = $product->add_to_cart_url();
								$do_add_url =	'<span><a href="" class="add_to_cart_button fdoe_simple_add_to_cart_button product_type_simple" data-product_id="'. $product->get_id()  .'" data-product_sku="'.$product->get_sku().'"   data-quantity="1" rel="nofollow">  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
								$add_mode = 'instant';
								break 2;
						case 'redirect':
							$product_add_url = get_permalink($product->get_id() );

							$do_add_url =	'<span><a href="'.$product_add_url.'"  rel="nofollow" class="fdoe-product-link"  >  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
							$add_mode = 'redirect';
							break 2;
						default:
							$do_add_url = '';
							$add_mode = 'popup';
							break 2;

					}
				case 'composite':

				case 'bundle':
						switch($temp_modal_settings[6] ){
						case 'instant':
								$product_add_url = $product->add_to_cart_url();
								$do_add_url =	'<span><a href="" class="add_to_cart_button fdoe_simple_add_to_cart_button product_type_simple" data-product_id="'. $product->get_id()  .'" data-product_sku="'.$product->get_sku().'"   data-quantity="1" rel="nofollow">  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
								$add_mode = 'instant';
								break 2;
						case 'redirect':
							$product_add_url = get_permalink($product->get_id() );

							$do_add_url =	'<span><a href="'.$product_add_url.'"  rel="nofollow" class="fdoe-product-link"  >  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
							$add_mode = 'redirect';
							break 2;
						default:
							$do_add_url = '';
							$add_mode = 'popup';
							break 2;

					}
				default:
					$product_add_url = get_permalink($product->get_id() );

					$do_add_url =	'<span><a href="'.$product_add_url.'"  rel="nofollow" class="fdoe-product-link"  >  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';
					$add_mode = 'redirect';
					$children = array();







			}


				return array($do_add_url, $add_mode, isset( $children)? $children: array() , $force );
		}
        public function the_product()

        {



            $product          = wc_get_product();

            $this->id         = $product->get_id();


			$type = $product->get_type();




            $cat_id_simple = $product->get_category_ids();

			if(self::isWpml()){
			foreach($cat_id_simple as $cat_id ){
				$wpml_categories[] = apply_filters('wpml_object_id',$cat_id,'product_cat',true);
			}
			$cat_id_simple = $wpml_categories;
			}



			 $temp_modal_settings = self::get_modal_settings();


			 $add_params = $this->get_add_links($product,$type, $temp_modal_settings);


        $item  = array(

				'add_mode' => $add_params[1],

				'featured' =>  $product-> is_featured(),

                 'short_description' => do_shortcode($product->get_short_description()),

                'image' => array(



                     'src' => self::get_image_src($product)

                ) ,

                'title' => wp_strip_all_tags($product->get_title()),


                'price_html' => $product->get_price_html(),

                'id' =>  $this->id,


				'children' => $add_params[2],


                'cart_button' => '<span><i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></span>',

				'cart_button_add' =>  $add_params[0],


				'cat_id' => (array) $cat_id_simple,


                'parent_id' =>  $this->id,


				'item_class' =>  'fdoe-'.$type,

				'type' => $type,

				'in_stock' => $product-> is_in_stock(),


				'single_shortcode' =>  $add_params[1]  == 'popup' ? self::do_product_shortcode(   $this->id , $add_params[3]  ) : '',



            );


			$products[]    = apply_filters( 'fdoe_loop_single_item', $item, $product );
            global $wp_query, $post;


            $next_page = html_entity_decode( get_next_posts_page_link( $wp_query->max_num_pages ) );

            $next_page = $next_page ? add_query_arg( 'fdoe-ajax', '1', $next_page ) : '';

            $next_page = apply_filters( 'fdoe_next_page', $next_page );

            $data      = compact( 'next_page', 'products' );

            return apply_filters( 'fdoe_loop_products', $data );

        }

    }

}
