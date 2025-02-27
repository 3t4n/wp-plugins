<?php

/**
 * Class WOO_F_LOOKBOOK_Frontend_Product
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WOO_F_LOOKBOOK_Frontend_Product {
	protected $settings;

	public function __construct() {
		$this->settings = WOO_F_LOOKBOOK_Data::get_instance();
		add_action( 'woocommerce_after_single_product_summary', array( $this, 'show_lookbooks_html_after' ), 11 );
		add_action( 'woocommerce_after_single_product_summary', array( $this, 'show_lookbooks_html_before' ), 9 );
	}
	public function show_lookbooks_html_after(){
		global $product;
		$id = $product->get_id();
		$enable = $this->get_data( $id, 'enable', 0 );
		if ( ! $enable ) {
			return;
		}
		if ($this->get_data( $id, 'position', 0 ) !== '1'){
			return;
		}
		$this->show_lookbooks_html($product);
	}
	public function show_lookbooks_html_before(){
		global $product;
		$id = $product->get_id();
		$enable = $this->get_data( $id, 'enable', 0 );
		if ( ! $enable ) {
			return;
		}
		if ($this->get_data( $id, 'position', 0 ) === '1'){
			return;
		}
		$this->show_lookbooks_html($product);
	}

	/**
     * @param $product WC_Product
	 * Show lookbook HTML on product page
	 */
	public function show_lookbooks_html($product) {
		$product = wc_get_product($product);
		if (!$product){
			return;
		}
		$id = $product->get_id();
		if ( ! $this->get_data( $id, 'enable', 0 ) ) {
			return;
		}
		$lookbooks = $this->get_data( $id, 'lookbooks', array() );
		if (!is_array($lookbooks) || empty($lookbooks)){
			return;
		}
		/*Check Algin center or left or right*/
		$align = $this->get_data( $id, 'align', 0 );
		switch ( $align ) {
			case 1:
				$class = 'wlb-align-left';
				break;
			case 2:
				$class = 'wlb-align-right';
				break;
			default:
				$class = 'wlb-align-center';
		}
		switch ( $this->get_data( $id, 'shortcode_type', 0 ) ) {
			case 1:
				$shortcode_type = 'woocommerce_lookbook_slide';
				break;
			default:
				$shortcode_type = 'woocommerce_lookbook';
				$class .= ' wlb-single-lookbook';
		}
		?>
        <div class="<?php echo esc_attr( $class ) ?>">
			<?php echo do_shortcode( '['.$shortcode_type.' id="' . implode( ',', $lookbooks ) . '"]' ); ?>
        </div>
		<?php
	}

	/**
	 * Get Post Meta
	 *
	 * @param $field
	 *
	 * @return bool
	 */
	private function get_data( $post_id, $field, $default = '' ) {
		return $this->settings::get_lookbook_data($post_id, $field, $default);
	}
}