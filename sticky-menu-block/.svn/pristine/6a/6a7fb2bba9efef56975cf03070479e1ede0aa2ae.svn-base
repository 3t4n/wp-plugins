<?php
$prefix = 'smbStickyMenu';
$id = wp_unique_id( "$prefix-" );

if( !function_exists( 'getBackgroundCSS' ) ){
	function getBackgroundCSS($bg, $isSolid = true, $isGradient = true, $isImage = true) {
		extract( $bg );
		$type = $type ?? 'solid';
		$color = $color ?? '#000000b3';
		$gradient = $gradient ?? 'linear-gradient(135deg, #4527a4, #8344c5)';
		$image = $image ?? [];
		$position = $position ?? 'center center';
		$attachment = $attachment ?? 'initial';
		$repeat = $repeat ?? 'no-repeat';
		$size = $size ?? 'cover';
		$overlayColor = $overlayColor ?? '#000000b3';
	
		$gradientCSS = $isGradient ? "background: $gradient;" : '';
	
		$imgUrl = $image['url'] ?? '';
		$imageCSS = $isImage ? "background: url($imgUrl); background-color: $overlayColor; background-position: $position; background-size: $size; background-repeat: $repeat; background-attachment: $attachment; background-blend-mode: overlay;" : '';
	
		$solidCSS = $isSolid ? "background: $color;" : '';
	
		$styles = 'gradient' === $type ? $gradientCSS : ( 'image' === $type ? $imageCSS : $solidCSS );
	
		return $styles;
	}
}

if( !function_exists( 'getSpaceCSS' ) ){
	function getSpaceCSS( $space ) {
		extract( $space );
		$side = $side ?? 2;
		$vertical = $vertical ?? '0px';
		$horizontal = $horizontal ?? '0px';
		$top = $top ?? '0px';
		$right = $right ?? '0px';
		$bottom = $bottom ?? '0px';
		$left = $left ?? '0px';
	
		$styles = ( 2 === $side ) ? "$vertical $horizontal" : "$top $right $bottom $left";

		return $styles;
	}
}

global $allowedposttags;
extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes(); ?> id='<?php echo esc_attr( $id ); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>'>
	<style>
		<?php echo esc_html( "
			#$id .$prefix{
				". getBackgroundCSS( $background ) ."
				padding: ". getSpaceCSS( $padding ) .";
			}
		" ); ?>
	</style>

	<div class='<?php echo esc_attr( $prefix ); ?>'>
		<?php echo wp_kses( $content, wp_parse_args( [
			'style' => [],
			'iframe' => [
				'allowfullscreen' => true,
				'allowpaymentrequest' => true,
				'height' => true,
				'loading' => true,
				'name' => true,
				'referrerpolicy' => true,
				'sandbox' => true,
				'src' => true,
				'srcdoc' => true,
				'width' => true,
				'aria-controls' => true,
				'aria-current' => true,
				'aria-describedby' => true,
				'aria-details' => true,
				'aria-expanded' => true,
				'aria-hidden' => true,
				'aria-label' => true,
				'aria-labelledby' => true,
				'aria-live' => true,
				'class' => true,
				'data-*' => true,
				'dir' => true,
				'hidden' => true,
				'id' => true,
				'lang' => true,
				'style' => true,
				'title' => true,
				'role' => true,
				'xml:lang' => true
			],
			'svg' => [
				'xmlns' => [],
				'viewBox' => [],
				'width' => [],
				'height' => [],
				'fill' => [],
				'class' => [],
				'style' => [],
			],
			'g' => [
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			],
			'path' => [
				'd' => [],
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
				'stroke-width' => []
			],
			'circle' => [
				'cx' => [],
				'cy' => [],
				'r' => [],
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			],
			'rect' => [
				'x' => [],
				'y' => [],
				'width' => [],
				'height' => [],
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			],
			'ellipse' => [
				'cx' => [],
				'cy' => [],
				'rx' => [],
				'ry' => [],
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			],
			'line' => [
				'x1' => [],
				'y1' => [],
				'x2' => [],
				'y2' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			],
			'polyline' => [
				'points' => [],
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			],
			'polygon' => [
				'points' => [],
				'fill' => [],
				'stroke' => [],
				'class' => [],
				'style' => [],
			]
		], $allowedposttags ) ); ?>
	</div>
</div>