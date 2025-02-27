<?php
/**
* Views: Social Icons
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$position = 'fl_left';
if ( isset( $fl_social_icons_settings['bar_position'] ) ) {
	$position = $fl_social_icons_settings['bar_position'];
}
?>
<div class="floating_next_prev_wrap fl_social_icons_bar fl_social_icons_wrap fl_<?php esc_attr_e( $position ); ?>">
	<div class="floating_links">
		<div id="fl_social_icons_inner_wrap" class="fl_inner_wrap">
		<?php
		do_action( 'fl_before_social_icons_bar', $fl_social_icons_settings );
		if ( isset( $fl_social_icons_settings['networks'] ) ) {
			$social_icons = ( isset( $fl_social_icons_settings['networks']['sort'] ) ) ? wp_parse_args( fl_social_networks_defaults(), $fl_social_icons_settings['networks']['sort'] ) : $fl_social_icons_settings['networks'];
			$show_minimizer = false;
			foreach ( $social_icons as $key => $social_icon ) {
				if ( ! isset( $fl_social_icons_settings['networks'][ $key ]['enabled'] ) || $fl_social_icons_settings['networks'][ $key ]['enabled'] !== 'on' ) {
					continue;
				}
				$fl_social_share_url = fl_social_share_url( $key );
				?>

			<a id="fl_social_<?php echo esc_attr( $fl_social_icons_settings['networks'][ $key ]['id'] ); ?>" target="_blank" rel="noopener noreferrer nofollow" href="<?php echo $fl_social_share_url; ?>" title="<?php echo esc_attr( $fl_social_icons_settings['networks'][ $key ]['name'] ); ?>" class="fl_social_<?php echo esc_attr( $fl_social_icons_settings['networks'][ $key ]['id'] ); ?> fl_icon_holder">
				<i class="fl_<?php echo esc_attr( $fl_social_icons_settings['networks'][ $key ]['id'] ); ?>_icon <?php echo esc_html( $fl_social_icons_settings['networks'][ $key ]['icon'] ); ?>"></i>
			</a>
				<?php
				$show_minimizer = true; }
		}
		do_action( 'fl_after_social_icons_bar', $fl_social_icons_settings );
		?>
		</div>
	<?php if ( isset( $fl_social_icons_settings['enable_minimizer'] ) && $fl_social_icons_settings['enable_minimizer'] == 'on' && $show_minimizer ) { ?>
		<div id="fl_slimer_social_wrap" class="fl_slimer_Wrap">
			<i class="fl_slimmer_icon fl_minimizer_icon fa fa-close"></i>
			<i class="fl_slimer_close_icon fl_hide fl_minimizer_icon fa fa-crosshairs"></i>
		</div>
	<?php } ?>
	</div>	
</div>	
