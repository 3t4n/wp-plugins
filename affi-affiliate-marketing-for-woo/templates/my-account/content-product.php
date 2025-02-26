<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use AffiAffiliate\Inc\QueryDB;

$user_id      = get_current_user_id();
$affiliate_id = QueryDB::instance()->get_affiliate_id_by_user_id( $user_id );
$c_args       = array(
	'taxonomy' => 'product_cat',
	'orderby'  => 'name',
);
$e_categories = get_categories( $c_args );
?>
<div class="affi-card-body affi-card-products">
    <div class="affi-products-wrap" data-id="<?php echo esc_attr( $user_id ) ?>"
         data-aff="<?php echo esc_attr( $affiliate_id ) ?>">
        <div class="affi-products-content-wrap">
            <div class="affi-products-filter-wrap">
                <div class="affi-products-catergory-wrap">
                    <select class="affi-products-catergory-input">
                        <option value=""><?php esc_html_e( 'Select Category', 'affi-affiliate-marketing-for-woo' ); ?></option>
						<?php foreach ( $e_categories as $e_category ) {
							echo sprintf( '<option value="%s">%s</option>',
								esc_attr( $e_category->term_id ), esc_html( $e_category->name ) );
						}
						?></select>
                </div>
                <div class="affi-products-search-wrap">
                    <input class="affi-products-search-input" placeholder="<?php
					esc_html_e( 'Search product', 'affi-affiliate-marketing-for-woo' ); ?>"/>
                </div>
            </div>
            <div class="affi-products-results-wrap">
                <div class="affi-products-result-loading-wrap affi-hidden">
                    <div class="affi-icon icon_loading"></div>
                </div>
                <div class="affi-products-results-inner">
                    <div class="affi-products-results"></div>
                </div>
            </div>
            <div class="affi-products-paging-wrap">
                <div class="affi-products-paging"></div>
            </div>
        </div>
    </div>
</div>