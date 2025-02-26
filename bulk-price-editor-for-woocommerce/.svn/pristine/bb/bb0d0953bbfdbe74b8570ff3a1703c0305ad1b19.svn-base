<?php namespace BulkPriceEditor\EditorPage\Services;

use Exception;
use BulkPriceEditor\Core\ServiceContainerTrait;
use WC_Customer;
use WP_Term;
use WP_User_Query;

class LookupService {
	
	use ServiceContainerTrait;
	
	const CATEGORIES_SEARCH_ACTION = 'woocommerce_json_search_bpe_categories';
	
	public function __construct() {
		add_action( 'wp_ajax_' . self::CATEGORIES_SEARCH_ACTION, array( $this, 'categoriesSearchHandler' ) );
	}
	
	public function categoriesSearchHandler() {
		
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json( array() );
		}
		
		check_ajax_referer( 'search-products', 'security' );
		
		$term = isset( $_GET['term'] ) ? sanitize_text_field( wp_unslash( $_GET['term'] ) ) : false;
		
		if ( $term ) {
			$args = array(
				'taxonomy'   => array( 'product_cat' ),
				'orderby'    => 'id',
				'order'      => 'ASC',
				'limit'      => 5,
				'hide_empty' => false,
				'fields'     => 'all',
				'name__like' => $term,
			);
			
			$terms = get_terms( $args );
			
			if ( $terms ) {
				$_terms = array();
				
				foreach ( $terms as $term ) {
					if ( $term instanceof WP_Term ) {
						$_terms[ $term->term_id ] = self::getCategoryLabel( $term );
					}
				}
				
				wp_send_json( $_terms );
			}
		}
		
		wp_send_json( array() );
	}
	
	public static function getCategoryLabel( WP_Term $category ): string {
		$parentTermName = '';
		
		if ( $category->parent ) {
			$parentTerm = get_term( $category->parent );
			
			if ( $parentTerm ) {
				$parentTermName = ' (' . $parentTerm->name . ')';
			}
		}
		
		return $category->name . $parentTermName;
	}
}
