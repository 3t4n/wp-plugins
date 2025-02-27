<?php
/**
 * Handles 'Ticker' post settings metabox HTML
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$prefix = WPTU_META_PREFIX; // Metabox prefix

// Getting saved values
$read_more_link = get_post_meta( $post->ID, $prefix.'more_link', true );

?>

<table class="form-table wptu-post-sett-table">
	<tbody>

		<tr valign="top">
			<th scope="row">
				<label for="wptu-more-link"><?php esc_html_e('Read More Link', 'ticker-ultimate'); ?></label>
			</th>
			<td>
				<input type="text" value="<?php echo esc_url($read_more_link); ?>" class="large-text wptu-more-link" id="wptu-more-link" name="<?php echo esc_attr($prefix); ?>more_link" /><br/>
				<span class="description"><?php esc_html_e('Add custom link for the ticker post. eg :', 'ticker-ultimate'); ?>https://www.essentialplugin.com</span>
			</td>
		</tr>

		<tr class="wptu-pro-feature">
			<th>
				<label><?php esc_html_e('Ticker Description', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php esc_html_e('PRO','ticker-ultimate');?></span>
				</label>
			</th>
			<td>
				<textarea name="<?php echo esc_attr($prefix); ?>ticker_desc" rows="4" cols="70" disabled=""></textarea><br/>
				<span class="description"><?php esc_html_e('Enter ticker description using default wordpress content editor.', 'ticker-ultimate'); ?></span>
				<?php // echo sprintf( __( 'Utilize this <a href="%s" target="_blank">Premium Features (With Risk-Free 30 days money back guarantee)</a> to get best of this plugin.', 'ticker-ultimate'), WPTU_PLUGIN_LINK_UNLOCK); ?>
				<?php // echo sprintf( __( 'Try This <a href="%s" target="_blank">PRO Features in Essential Bundle Free For 5 Days.</a>', 'ticker-ultimate'), WPTU_PLUGIN_LINK_UNLOCK); ?>
				<!-- <strong><?php // echo sprintf( __( 'Try This PRO Features with <a href="%s" target="_blank">Early Back Friday Deals</a> on lifetime plan. FLAT $100 USD OFF.', 'countdown-timer-ultimate'), WPTU_PLUGIN_LINK_UNLOCK); ?></strong> -->
				<strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'ticker-ultimate'), WPTU_PLUGIN_LINK_UNLOCK); ?></strong>
			</td>
		</tr>

	</tbody>
</table><!-- end .wptu-tstmnl-table -->