<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post;

$prefix = '_wpvideo_'; // Metabox prefix

// Getting saved values
$video_mp4	= get_post_meta( $post->ID, $prefix.'video_mp4', true );
$video_wbbm	= get_post_meta( $post->ID, $prefix.'video_wbbm', true );
$video_ogg	= get_post_meta( $post->ID, $prefix.'video_ogg', true );
$video_yt	= get_post_meta( $post->ID, $prefix.'video_yt', true );
$video_vm	= get_post_meta( $post->ID, $prefix.'video_vm', true );
?>

<table class="form-table html5video-post-sett-table">
	<tbody>

		<tr class="html5video-feature">
			<th>
				<label><?php esc_html_e('External Video Poster Image ', 'html5-videogallery-plus-player'); ?><span class="html5video-tag"><?php esc_html_e('PRO','html5-videogallery-plus-player');?></span></label>
			</th>
			<td>
				<input type="url" class="large-text" name="<?php echo esc_attr($prefix); ?>video_mp4" disabled="" /> <br />
				<span class="description"><?php esc_html_e('Enter external URL of video poster image if you do not want to use `Video Poster Image` (Right hand side).', 'html5-videogallery-plus-player'); ?></span><strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?></strong><?php //echo sprintf( __( 'Try This PRO Features with <a href="%s" target="_blank">Early Back Friday Deals</a> on lifetime plan. FLAT $100 USD OFF.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?><?php //echo sprintf( __( ' Utilize this <a href="%s" target="_blank">Premium Features (With Risk-Free 30 days money back guarantee)</a> to get best of this plugin with Annual or Lifetime bundle deal.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label><?php esc_html_e('HTML5 Player', 'html5-videogallery-plus-player'); ?></label>
			</th>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="link-for-mp4"><?php esc_html_e('video/mp4', 'html5-videogallery-plus-player'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo esc_attr($video_mp4); ?>" class="large-text html5video-more-link" id="link-for-mp4" name="<?php echo esc_attr($prefix); ?>video_mp4" /><br/>
				<span class="description"><?php esc_html_e('Enter webm video link. ie', 'html5-videogallery-plus-player') ; ?> http://videolink.mp4</span>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="link-for-webm"><?php esc_html_e('video/webm', 'html5-videogallery-plus-player'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo esc_attr($video_wbbm); ?>" class="large-text html5video-more-link" id="link-for-webm" name="<?php echo esc_attr($prefix); ?>video_wbbm" /><br/>
				<span class="description"><?php esc_html_e('Enter webm video link. ie', 'html5-videogallery-plus-player') ; ?> http://videolink.webm</span>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="link-for-ogg"><?php esc_html_e('video/ogg', 'html5-videogallery-plus-player'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo esc_attr($video_ogg); ?>" class="large-text html5video-more-link" id="link-for-ogg" name="<?php echo esc_attr($prefix); ?>video_ogg" /><br/>
				<span class="description"><?php esc_html_e('Enter Ogg video link. ie', 'html5-videogallery-plus-player') ; ?> http://videolink.ogg</span>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2" style="padding-bottom:0px">
				OR
			</th>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2">
				<hr />
			</th>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label><?php esc_html_e('YouTube Link', 'html5-videogallery-plus-player'); ?></label>
			</th>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="link-for-youtube"><?php esc_html_e('Enter YouTube Link', 'html5-videogallery-plus-player'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo esc_attr($video_yt); ?>" class="large-text html5video-more-link" id="link-for-youtube" name="<?php echo esc_attr($prefix); ?>video_yt" /><br/>
				<span class="description"><?php esc_html_e('Enter youtube video link. ie', 'html5-videogallery-plus-player') ; ?> https://www.youtube.com/watch?v=07IRBn1oXrU</span>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2" style="padding-bottom:0px">
				OR
			</th>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2">
				<hr />
			</th>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label><?php esc_html_e('Vimeo Link', 'html5-videogallery-plus-player'); ?></label>
			</th>
		</tr>

		<tr valign="top">
			<th scope="row">
				<label for="link-for-vimeo"><?php esc_html_e('Enter Vimeo Link', 'html5-videogallery-plus-player'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo esc_attr($video_vm); ?>" class="large-text html5video-more-link" id="link-for-vimeo" name="<?php echo esc_attr($prefix); ?>video_vm" /><br/>
				<span class="description"><?php esc_html_e('Enter Vimeo video link. ie', 'html5-videogallery-plus-player') ; ?> https://vimeo.com/171807697</span>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2" style="padding-bottom:0px">
				OR
			</th>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2">
				<hr />
			</th>
		</tr>

		<tr class="html5video-feature">
			<th>
				<label><?php esc_html_e('Dailymotion Link ', 'html5-videogallery-plus-player'); ?><span class="html5video-tag"><?php esc_html_e('PRO','html5-videogallery-plus-player');?></span></label>
			</th>
			<td>
				<input type="url" class="large-text" name="<?php echo esc_attr($prefix); ?>video_mp4" disabled="" /> <br />
				<span class="description"><?php esc_html_e('Enter dailymotion video link. ie', 'html5-videogallery-plus-player') ; ?> http://www.dailymotion.com/video/x2u6iu9_xxxxxxx - </span><strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?></strong><?php // echo sprintf( __( 'Try This PRO Features with <a href="%s" target="_blank">Early Back Friday Deals</a> on lifetime plan. FLAT $100 USD OFF.</a>', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?><?php //echo sprintf( __( ' Utilize this <a href="%s" target="_blank">Premium Features (With Risk-Free 30 days money back guarantee)</a> to get best of this plugin with Annual or Lifetime bundle deal.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?>
			</td>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2" style="padding-bottom:0px">
				OR
			</th>
		</tr>

		<tr valign="top">
			<th scope="row" colspan="2">
				<hr />
			</th>
		</tr>

		<tr class="html5video-feature">
			<th>
				<label><?php esc_html_e('Other Link ', 'html5-videogallery-plus-player'); ?><span class="html5video-tag"><?php esc_html_e('PRO','html5-videogallery-plus-player');?></span></label>
			</th>
			<td>
				<input type="url" class="large-text" name="<?php echo esc_attr($prefix); ?>video_mp4" disabled="" /> <br />
				<span class="description"><?php esc_html_e('Enter embed link of video. ie', 'html5-videogallery-plus-player') ; ?> http://view.vzaar.com/XXXXXXX/player - </span><strong style="color:#2ECC71; font-weight: 700;"><?php echo sprintf( __( ' <a href="%s" target="_blank" style="color:#2ECC71;">Upgrade To Pro</a> and Get Designs, Optimization, Security, Backup, Migration Solutions @ one stop.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?></strong><?php // echo sprintf( __( 'Try This PRO Features with <a href="%s" target="_blank">Early Back Friday Deals</a> on lifetime plan. FLAT $100 USD OFF.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?><?php // echo sprintf( __( ' Utilize this <a href="%s" target="_blank">Premium Features (With Risk-Free 30 days money back guarantee)</a> to get best of this plugin with Annual or Lifetime bundle deal.', 'html5-videogallery-plus-player'), WP_HTML5VP_PLUGIN_LINK_UNLOCK); ?>
			</td>
		</tr>

	</tbody>
</table><!-- end .wtwp-tstmnl-table -->