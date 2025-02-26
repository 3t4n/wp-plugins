<?php namespace BulkPriceEditor\ProductsTable;

use BulkPriceEditor\PriceModifiers\Modifiers\PriceModifier;
use BulkPriceEditor\ProductQuery\ProductQuery;
use WC_Product;
use WP_List_Table;

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class WPListProductsTable extends WP_List_Table {
	
	protected ProductQuery $query;
	protected ?PriceModifier $priceModifier;
	
	public function __construct( ProductQuery $query, ?PriceModifier $priceModifier = null ) {
		parent::__construct( [
			'singular' => __( 'Product', 'bulk-price-editor-for-woocommerce' ),
			'plural'   => __( 'Products', 'bulk-price-editor-for-woocommerce' ),
			'ajax'     => true,
			'screen'   => 'products',
		] );
		
		$this->query         = $query;
		$this->priceModifier = $priceModifier;
	}
	
	public function get_columns(): array {
		
		$columns = [
			//'cb'        => '<input type="checkbox" />', // Checkbox for bulk actions
			'image'         => __( 'Image', 'bulk-price-editor-for-woocommerce' ),
			'title'         => __( 'Name', 'bulk-price-editor-for-woocommerce' ),
			'sku'           => __( 'SKU', 'bulk-price-editor-for-woocommerce' ),
			'categories'    => __( 'Categories', 'bulk-price-editor-for-woocommerce' ),
			'regular_price' => __( 'Regular Price', 'bulk-price-editor-for-woocommerce' ),
			'sale_price'    => __( 'Sale Price', 'bulk-price-editor-for-woocommerce' ),
		
		];
		
		$columns['stock_status'] = __( 'Stock', 'bulk-price-editor-for-woocommerce' );
		$columns['product_type'] = __( 'Type', 'bulk-price-editor-for-woocommerce' );
		
		
		return $columns;
	}
	
	protected function column_cb( $item ) {
		
		return sprintf( '<input type="checkbox" name="product[]" value="%s" />', $item['ID'] );
	}
	
	protected function column_title( WC_Product $product ) {
		return sprintf( '<a href="%s">%s</a>', get_edit_post_link( $product->get_id() ),
			esc_html( $product->get_title() ) );
	}
	
	protected function column_sku( WC_Product $product ) {
		return esc_html( $product->get_sku() ?: '—' );
	}
	
	protected function column_image( WC_Product $product ) {
		$productLink = get_edit_post_link( $product->get_id() );
		ob_start();
		?>

		<a href="<?php echo esc_attr( $productLink ) ?> ">
			<?php echo wp_kses_post( $product->get_image() ); ?>
		</a>
		
		<?php
		return ob_get_clean();
	}
	
	protected function column_regular_price( WC_Product $product ) {
		
		$originalPrice = $product->get_regular_price( 'edit' ) ? wc_price( $product->get_regular_price( 'edit' ) ) : 'N/A';
		
		if ( ! $this->priceModifier ) {
			return $originalPrice;
		}
		
		$newRegularPrice = $this->priceModifier->getUpdatedRegularPrice( $product );
		
		if ( ! is_null( $newRegularPrice ) ) {
			
			if ( $newRegularPrice !== 'N/A' ) {
				$newRegularPrice = wc_price( $newRegularPrice );
			}
			
			return sprintf( ' <span>%s</span>  → <span style="background: #fffcc1;padding: 3px;font-weight: 500;">%s</span>',
				$originalPrice, $newRegularPrice );
		}
		
		return $originalPrice;
	}
	
	protected function column_sale_price( WC_Product $product ) {
		
		$originalPrice = $product->get_sale_price( 'edit' ) ? wc_price( $product->get_sale_price( 'edit' ) ) : 'N/A';
		
		if ( ! $this->priceModifier ) {
			return $originalPrice;
		}
		
		$newRegularPrice = $this->priceModifier->getUpdatedSalePrice( $product );
		
		if ( ! is_null( $newRegularPrice ) ) {
			
			if ( $newRegularPrice !== 'N/A' ) {
				$newRegularPrice = wc_price( $newRegularPrice );
			}
			
			return sprintf( ' <span>%s</span>  → <span style="background: #fffcc1;padding: 3px;font-weight: 500;">%s</span>',
				$originalPrice, $newRegularPrice );
		}
		
		return $originalPrice;
	}
	
	protected function column_categories( WC_Product $product ) {
		return implode( ', ', array_map( function ( $categoryId ) {
			$category = get_term_by( 'id', $categoryId, 'product_cat' );
			
			return sprintf( '<a target="_blank" href="%s">%s</a>',
				esc_url( admin_url( 'edit-tags.php?action=edit&taxonomy=product_cat&tag_ID=' . $categoryId . '&post_type=product' ) ),
				$category->name );
			
		}, $product->get_category_ids() ) );
	}
	
	protected function column_stock_status( WC_Product $product ) {
		if ( $product->is_on_backorder() ) {
			$stock_html = '<mark class="onbackorder">' . __( 'On backorder', 'bulk-price-editor-for-woocommerce' ) . '</mark>';
		} elseif ( $product->is_in_stock() ) {
			$stock_html = '<mark class="instock">' . __( 'In stock', 'bulk-price-editor-for-woocommerce' ) . '</mark>';
		} else {
			$stock_html = '<mark class="outofstock">' . __( 'Out of stock', 'bulk-price-editor-for-woocommerce' ) . '</mark>';
		}
		
		if ( $product->managing_stock() ) {
			$stock_html .= ' (' . wc_stock_amount( $product->get_stock_quantity() ) . ')';
		}
		
		return $stock_html;
	}
	
	protected function column_product_type( WC_Product $product ) {
		return ucfirst( esc_html( $product->get_type() ) );
	}
	
	public function prepare_items( ProductQuery $query = null ) {
		$per_page     = $this->get_items_per_page( 'products_per_page', 20 );
		$current_page = $this->get_pagenum();
		
		$this->query->args['page']           = $current_page;
		$this->query->args['posts_per_page'] = $per_page;
		
		$productQuery = $this->query->build();
		
		$products = $productQuery->get_products();
		
		$this->items = $products->products;
		
		$this->set_pagination_args( [
			'total_items' => $products->total,
			'per_page'    => $per_page,
			'total_pages' => $products->max_num_pages,
		] );
	}
	
	public function no_items() {
		esc_html_e( 'No products found.', 'bulk-price-editor-for-woocommerce' );
	}
}