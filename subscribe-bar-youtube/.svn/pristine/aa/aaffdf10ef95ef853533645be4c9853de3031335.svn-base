<?php
// build the container styles
$style = '';
if ( ! empty( $settings['ytsb_text_color'] ) ) {
	$style .= 'color: ' . $settings['ytsb_text_color'] . ';';
}
if ( ! empty( $settings['ytsb_bg_color'] ) ) {
	$style .= 'background-color: ' . $settings['ytsb_bg_color'] . ';';
}
?>
<div class="youtube-subscribe-bar" style="<?php echo esc_attr( $style ); ?>">
	<?php if ( ! empty( $settings['ytsb_text'] ) ) : ?>
		<div><?php echo esc_html( $settings['ytsb_text'] ); ?></div>
	<?php endif; ?>
	<div>
		<iframe
		<?php
		if ( 'full' === $settings['ytsb_button_layout'] ) {
			echo ' class="big" ';
		}
		?>
		src="https://www.youtube.com/subscribe_embed?usegapi=1&amp;<?php echo rawurlencode( $settings['ytsb_channel_type'] ); ?>=<?php echo rawurlencode( $settings['ytsb_channel_id'] ); ?>&amp;layout=<?php echo rawurlencode( $settings['ytsb_button_layout'] ); ?>&amp;theme=<?php echo rawurlencode( $settings['ytsb_button_theme'] ); ?>&amp;count=<?php echo rawurlencode( $settings['ytsb_button_count'] ); ?>&amp;origin=<?php echo rawurlencode( get_site_url( null, '/' ) ); ?>"></iframe></div>
	<div class="clear"></div>
</div>
