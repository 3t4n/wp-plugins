<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Front;

class WOOSHtmlMarkup
{
	public static function woos_markup(){
	$woos_enable_loading = woos_setting_data('woos_enable_loading');
	$search_placeholder_text = woos_setting_data('woos_search_placeholder');
	$woos_search_placeholder = isset($search_placeholder_text) && !empty($search_placeholder_text) ? $search_placeholder_text : 'Search for product...';

	  $categories = woos_get_product_category();
	  
	  $html_output = '';

	  $html_output .= '<div class="woos-container woos_layout">';
	  $html_output .= '<form name="woos-product-search" class="woos-search-form" action="#" method="POST" role="search">';
	  if ($categories):
	  	  $html_output .= '<div class="woos-select-wrapper woos-group">';
		  $html_output .= '<select name="woos-search-category" class="woos-control woos-select-control woos-search-category">';
		  $html_output .= '<option value="default">'.esc_html__( 'Select a category', 'woosearch' ).'</option>';
		  $html_output .= woos_list_taxonomy_hierarchy_no_instance( $categories);
		  $html_output .= '</select>';
		  $html_output .= '</div>';
	   endif;
	   $html_output .= '<div class="woos-search-wrapper woos-group">';
       $html_output .= '<input type="search" name="'.$woos_view_all_name.'" class="search woos-control woos-search-field" placeholder="'.esc_html__( $woos_search_placeholder, 'woosearch' ).'" value="">';
	   if( $woos_enable_loading == 1 ){
       	$html_output .= '<img class="laoding_img '.$woos_loading_class.'" src="'.WOOS_PLUGIN_IMAGE. 'loading.svg'.'" alt="loading...">'; 
   		}
       $html_output .= '</div>';
	  $html_output .= '</form>';
	  $html_output .= '<div class="woos-search-results"></div>';
	  $html_output .= '</div>';

	  return apply_filters( 'woo_html_markup', $html_output, $params_container );
	}
}