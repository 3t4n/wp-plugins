<?php
/**
 * Handles Post Setting metabox HTML
 *
 * @package App Mockups Carousel
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

$prefix = WP_AMC_META_PREFIX; // Metabox prefix

// Carousel Variables
$arrow_carousel 			= get_post_meta( $post->ID, $prefix.'arrow_carousel', true );
$pagination_carousel 		= get_post_meta( $post->ID, $prefix.'pagination_carousel', true );
$speed_carousel 			= get_post_meta( $post->ID, $prefix.'speed_carousel', true );
$autoplay_carousel 			= get_post_meta( $post->ID, $prefix.'autoplay_carousel', true );
$autoplay_speed_carousel	= get_post_meta( $post->ID, $prefix.'autoplay_speed_carousel', true );
$auto_stop_carousel 		= get_post_meta( $post->ID, $prefix.'auto_stop_carousel', true );
$pagination_type_carousel 	= get_post_meta( $post->ID, $prefix.'pagination_type_carousel', true );
$loop_carousel 				= get_post_meta( $post->ID, $prefix.'loop_carousel', true );
?>

<div class="wp-amc-mb-tabs-wrp">	
	<div id="wp-amc-sdetails" class="wp-amc-sdetails wp-amc-tab-cnt wpamc-carousel">		
		<table class="form-table wp-amc-sdetails-tbl">
			<tbody>
				<tr valign="top">
					<h4><?php _e('Navigation & Pagination Settings', 'app-mockups-carousel') ?></h4>
					<hr>
					<td scope="row">
						<label><?php _e('Arrow', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>arrow_carousel" value="true" <?php checked( 'true', $arrow_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>arrow_carousel" value="false" <?php checked( 'false', $arrow_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Enable Arrows for slider','app-mockups-carousel'); ?></em>
					</td>
				</tr>

				<tr valign="top">
					<td scope="row">
						<label><?php _e('Pagination', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>pagination_carousel" value="true" <?php checked( 'true', $pagination_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>pagination_carousel" value="false" <?php checked( 'false', $pagination_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('String with CSS selector or HTML element of the container with pagination','app-mockups-carousel'); ?></em>
					</td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Pagination Type', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<select name="<?php echo $prefix; ?>pagination_type_carousel">
							<option value="bullets" <?php selected( $pagination_type_carousel, 'bullets'); ?>>Bullets</option>
							<option value="fraction" <?php selected( $pagination_type_carousel, 'fraction'); ?>>Fraction</option>
						</select><br/>
						<em style="font-size:11px;"><?php _e('String with type of pagination. Can be "bullets", "fraction"','app-mockups-carousel'); ?></em>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="form-table wp-amc-sdetails-tbl">
			<tbody>
				<tr valign="top">
					<h4><?php _e('Genaral Settings', 'app-mockups-carousel') ?></h4>
					<hr>
					<td scope="row">
						<label><?php _e('Autoplay', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>autoplay_carousel" value="true" <?php checked( 'true', $autoplay_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>autoplay_carousel"  value="false" <?php checked( 'false', $autoplay_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Enable Autoplay for Slider','app-mockups-carousel'); ?></em>
					</td>
				</tr>

				<tr valign="top">
					<td scope="row">
						<label><?php _e('Autoplay Speed', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="number"  name="<?php echo $prefix; ?>autoplay_speed_carousel" value="<?php echo wp_amc_esc_attr($autoplay_speed_carousel); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled','app-mockups-carousel'); ?></em>
					</td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Speed', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="number"  name="<?php echo $prefix; ?>speed_carousel" value="<?php echo wp_amc_esc_attr($speed_carousel); ?>"><br/>
						<em style="font-size:11px;"><?php _e('Duration of transition between slides (in ms)','app-mockups-carousel'); ?></em>
					</td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Loop', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>loop_carousel" value="true" <?php checked( 'true', $loop_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>loop_carousel" value="false" <?php checked( 'false', $loop_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Set to true to enable continuous loop mode','app-mockups-carousel'); ?></em>
					</td>
				</tr>
				<tr valign="top">
					<td scope="row">
						<label><?php _e('Autoplay Stop On Last', 'app-mockups-carousel'); ?></label>
					</td>
					<td>
						<input type="radio" name="<?php echo $prefix; ?>auto_stop_carousel" value="true" <?php checked( 'true', $auto_stop_carousel ); ?>>True
						<input type="radio" name="<?php echo $prefix; ?>auto_stop_carousel" value="false" <?php checked( 'false', $auto_stop_carousel ); ?>>False<br/>
						<em style="font-size:11px;"><?php _e('Enable this parameter and autoplay will be stopped when it reaches last slide','app-mockups-carousel'); ?></em><br/>
						<em style="font-size:11px;color:#ff0808;"><?php _e('This will work when loop is false.','app-mockups-carousel'); ?></em>
					</td>
				</tr>
			</tbody>
		</table><!-- end .wtwp-tstmnl-table -->
	</div>
</div>