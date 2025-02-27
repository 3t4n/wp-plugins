<?php
$prefix = 'bBlocksSocialShare';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'>
	<div class='<?php echo esc_attr( $prefix ); ?>Style'></div>

	<ul class='<?php echo esc_attr( $prefix ); ?>'>
		<?php foreach ( $socials as $index => $social ) {
			extract( $social );
			$upIconUrl = $upIcon['url'];
			$upIconAlt = $upIcon['alt'];
			$iconClass = $icon['class'];

			$upIconEl = !empty( $upIconUrl ) ? "<img src='$upIconUrl' alt='$upIconAlt' />" : '';
			$iconEl = !empty( $iconClass ) ? "<i class='$iconClass'></i>" : '';
			$filterIconEl = $isUpIcon ? $upIconEl : $iconEl; ?>

			<li class='icon icon-<?php echo esc_attr( $index ); ?>' data-social='<?php echo esc_attr( $network ); ?>'>
				<?php echo wp_kses_post( $filterIconEl ); ?>
			</il>
		<?php } ?>
	</ul>
</div>