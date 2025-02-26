<?php
/**
 * @package  WooSearch
 * @developer  name : Joy Shaha
 */
namespace WOOS\Front;

use WOOS\Front\WOOSHtmlMarkup;

class WOOSFrontController{
	/**
    * Constructor
    * Feature added by : Joy Shaha joysaha7302@gmail.com
    * Date       : 22.04.2020
    */
	public function woos_register()
    {
      //shortcode
      add_shortcode( 'woos_search_form', array( $this, 'woos_search_form_shortcode'), 1000 );
      add_action( 'wp_ajax_woos_search_product_action', array( $this, 'woos_ajax_front_handler' ) );
      add_action( 'wp_ajax_nopriv_woos_search_product_action', array( $this, 'woos_ajax_front_handler' ) );

    }
    /**
	 * Setting Data option
	 * @return string
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
	 * Date : 21.04.2020
	*/
	/* CONTACT FORM */

  public function woos_search_form_shortcode($atts, $content = null)
  {
    return WOOSHtmlMarkup::woos_markup();
  }

	/**
	 * Setting Save Handler
	 * @return string
	 * Feature added by : Joy Shaha <joysaha7302@gmail.com>
	 * Date : 21.04.2020
	*/
   public function woos_ajax_front_handler() {
    global $wpdb, $woocommerce;
    //Options
    $show_cat = woos_setting_data('woos_enable_category');
    $show_sku = woos_setting_data('woos_enable_sku');
    $show_stock = woos_setting_data('woos_enable_stock');
    $show_price = woos_setting_data('woos_enable_price');
    $show_content = woos_setting_data('woos_enable_content');
    $show_image = woos_setting_data('woos_enable_image');
    $show_content_limit = woos_setting_data('woos_content_limit');
    $num_of_limit = isset($show_content_limit) && !empty($show_content_limit) ? $show_content_limit : 200;

    if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
 
        $keyword = sanitize_text_field($_POST['keyword']);
 
        if (isset($_POST['category']) && !empty($_POST['category'])) {
 
            $category = sanitize_text_field($_POST['category']);
            $woos_post_table = woos_post_table();
            $woos_term_relationships = woos_term_relationships();
            $woos_term_taxonomy = woos_term_taxonomy();
            $woos_terms = woos_terms();
            $woos_postmeta = woos_postmeta();
 
            $querystr = "SELECT DISTINCT * FROM $woos_post_table AS p
            LEFT JOIN $woos_term_relationships AS r ON (p.ID = r.object_id)
            INNER JOIN $woos_term_taxonomy AS x ON (r.term_taxonomy_id = x.term_taxonomy_id)
            INNER JOIN $woos_terms AS t ON (r.term_taxonomy_id = t.term_id)
            WHERE p.post_type IN ('product')
            AND p.post_status = 'publish'
            AND x.taxonomy = 'product_cat'
            AND (
                (x.term_id = {$category})
                OR
                (x.parent = {$category})
            )
            AND (
                (p.ID IN (SELECT post_id FROM $woos_postmeta WHERE meta_key = '_sku' AND meta_value LIKE '%{$keyword}%'))
                OR
                (p.post_content LIKE '%{$keyword}%')
                OR
                (p.post_title LIKE '%{$keyword}%')
            )
            ORDER BY t.name ASC, p.post_date DESC;";
 
        } else {
            $querystr = "SELECT DISTINCT $woos_post_table.*
            FROM $woos_post_table, $woos_postmeta
            WHERE $woos_post_table.ID = $woos_postmeta.post_id
            AND (
                ($woos_postmeta.meta_key = '_sku' AND $woos_postmeta.meta_value LIKE '%{$keyword}%')
                OR
                ($woos_post_table.post_content LIKE '%{$keyword}%')
                OR
                ($woos_post_table.post_title LIKE '%{$keyword}%')
            )
            AND $woos_post_table.post_status = 'publish'
            AND $woos_post_table.post_type = 'product'
            ORDER BY $woos_post_table.post_date DESC";
        }
 
        $query_results = $wpdb->get_results($querystr);

        if (!empty($query_results)) {
 
            $output = '';
 
            foreach ($query_results as $result) {
                $post_content = woos_shorten_text($result->post_content, $num_of_limit);
                $price      = get_post_meta($result->ID,'_regular_price');
                $price_sale = get_post_meta($result->ID,'_sale_price');
                $currency   = get_woocommerce_currency_symbol();
 
                $sku   = get_post_meta($result->ID,'_sku');
                $stock = get_post_meta($result->ID,'_stock_status');
 
                $categories = wp_get_post_terms($result->ID, 'product_cat');
 
                $output .= '<li>';
                    $output .= '<a class="woos-product-link" href="'.esc_url(get_post_permalink($result->ID)).'">';
                        if( $show_image == 1 ) {   
                            $output .= '<div class="woos-product-image">';
                                $output .= '<img src="'.esc_url(get_the_post_thumbnail_url($result->ID,'thumbnail')).'">';
                            $output .= '</div>';
                        }
                        $output .= '<div class="woos-product-data">';
                            $output .= '<h3>'.esc_attr($result->post_title).'</h3>';
                            if ( $show_content == 1 ) {
                                $output .= '<p>'.esc_attr($post_content).'</p>';
                            }
                            if ( $show_price == 1 ) {
                                if (!empty($price)) {
                                    $output .= '<div class="woos-product-price">';
                                        $output .= '<span class="woos-regular-price regular-price">'.esc_attr($price[0]).'</span>';
                                        if (!empty($price_sale)) {
                                            $output .= '<span class="woos-sale-price sale-price"> -'.esc_attr($price_sale[0]).'</span>';
                                        }
                                        $output .= esc_attr( $currency );
                                    $output .= '</div>';
                                }
                            }
                            if($show_cat == 1){
                                if (!empty($categories)) {
                                    $output .= '<div class="woos-product-categories">';
                                        foreach ($categories as $category) {
                                            if ($category->parent) {
                                                $parent = get_term_by('id',$category->parent,'product_cat');
                                                $output .= '<span>'.esc_html($parent->name, 'woosearch').'</span>';
                                            }
                                            $output .= '<span>'.esc_html($category->name, 'woosearch').'</span>';
                                        }
                                    $output .= '</div>';
                                }
                            }
                            if( $show_sku == 1 ){
                                if (!empty($sku)) {
                                    $output .= '<div class="woos-product-sku product-sku">'.esc_html__( 'SKU:', 'woosearch' ).' '.esc_attr($sku[0]).'</div>';
                                }
                            }
                            if( $show_stock == 1 ){
                                if (!empty($stock)) {
                                    $output .= '<div class="woos-product-stock product-stock">'.esc_attr($stock[0]).'</div>';
                                }
                            }
 
                        $output .= '</div>';
                        $output .= '</a>';
                $output .= '</li>';
            }
 
            if (!empty($output)) {
                echo $output;
            }
        }
    }
 
    die();
    }
}