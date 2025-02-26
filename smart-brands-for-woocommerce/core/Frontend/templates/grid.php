<?php
/**
 * The frontend facing Grid layout file.
 *
 * It shows the frontend output of plugin for grid layout.
 *
 * @link       https://shapedplugin.com
 * @since      2.0.0
 *
 * @package    smart_brands_for_wc
 * @subpackage smart_brands_for_wc/Frontend/templates
 * @author     ShapedPlugin<support@shapedplugin.com>
 */

use ShapedPlugin\SmartBrands\Frontend\Manager;
?>
<div class="sp-smart-brands-grid">
	<div class="sp-smart-brands-row">
		<?php
		foreach ( $filtered_brands as $brand_key => $brand_term ) {
			$term_all_meta = get_term_meta( $brand_term->term_id, 'sp_smart_brand_taxonomy_meta', true );
			$term_logo_id  = isset( $term_all_meta['smart_brand_term_logo']['id'] ) ? $term_all_meta['smart_brand_term_logo']['id'] : '';
			?>
			<div class="smart-brand-term <?php echo esc_attr( $smart_brand_column ); ?>">
			<div class="sp-brand-term-row sp-brand-term-no-gutters">
				<?php include Manager::smart_locate_template( 'brand/brand.php' ); ?>
			</div>
			</div>
				<?php
		} // End of foreach loop.
		?>
	</div>
</div>
