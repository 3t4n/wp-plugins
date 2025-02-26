<?php
$number_attributes = array( 'data-refresh-interval' => '50' );
if( ! empty ( $instance['number']['start'] ) ) $number_attributes['data-from'] = esc_attr($instance['number']['start']);
if( ! empty ( $instance['number']['end'] ) ) $number_attributes['data-to'] = esc_attr($instance['number']['end']);
if( ! empty ( $instance['number']['speed'] ) ) $number_attributes['data-speed'] = esc_attr ( $instance['number']['speed'] );
?>

<div id="counter" class="padding-vertical-2" >
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-justify align-middle"> <!-- Aligned to the edges -->
			<?php foreach( $instance['counter'] as $i => $counter ) { ?>
			<div class="cell small-24 cell medium-12 large-auto text-center">
				<?php if ( $counter['title'] && $instance['styling']['title-pos'] == 'above' ) : ?>
								<div class="cont_info" ><p><?php echo esc_html ( $counter['title'] ); ?>	</p></div>
				<?php endif; ?>
				<?php if ( $counter['icon']  ) : ?>
				<span class="icon_container icon_proportions_original" style="color:<?php echo esc_html ( $instance['styling']['icon-color'] ); ?>;font-size:<?php echo esc_html ( $instance['styling']['icon-size'] ); ?>;">
					<?php echo siteorigin_widget_get_icon( $counter['icon'] ); ?>
				</span>
				<?php endif; ?>
				<div class="stat_count_wrapper" >
					<?php if ( $counter['prefix']  ) : ?>
				<span ><?php echo esc_html( $counter['prefix'] ); ?></span>
				<?php endif; ?>
				<span class="timer-number" data-from="<?php echo esc_attr( $counter['start'] ); ?>" data-to="<?php echo esc_attr( $counter['end'] ); ?>" data-speed="<?php echo esc_attr( $counter['speed'] ); ?>" data-refresh-interval="50" >
					<?php echo esc_html( $counter['end'] ); ?>
				</span>
				<?php if ( $counter['suffix']  ) : ?>
				<span ><?php echo esc_html( $counter['suffix'] ); ?></span>
			<?php endif; ?>

				<?php if ( $counter['title'] && $instance['styling']['title-pos'] == 'below' ) : ?>
								<div class="cont_info"><?php echo esc_html ( $counter['title'] ); ?></div>
				<?php endif; ?>
			</div>
			</div>
		<?php } ?>
	</div>
</div>
</div>
