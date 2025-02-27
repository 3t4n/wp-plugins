<?php
$atts = wp_parse_args( $attributes, [
	'images'        => '',
	'columns'       => 2,
	'columnsTablet' => 2,
	'columnsMobile' => 1,
	'space'         => 30,
	'spaceTablet'   => 30,
	'spaceMobile'   => 30,
	'loop'          => false,
	'autoplay'      => false,
	'center'        => true,
	'ratio'         => '16/9'
] );

if ( ! isset( $atts['images'] ) ) {
	return;
}

$data  = ' data-columns="' . esc_attr( $atts['columns'] ) . '"';
$data .= ' data-columns-tablet="' . esc_attr( $atts['columnsTablet'] ) . '"';
$data .= ' data-columns-mobile="' . esc_attr( $atts['columnsMobile'] ) . '"';
$data .= ' data-space="' . esc_attr( $atts['space'] ) . '"';
$data .= ' data-space-tablet="' . esc_attr( $atts['spaceTablet'] ) . '"';
$data .= ' data-space-mobile="' . esc_attr( $atts['spaceMobile'] ) . '"';
$data .= ' data-loop="' . esc_attr( $atts['loop'] ) . '"';
$data .= ' data-autoplay="' . esc_attr( $atts['autoplay'] ) . '"';
$data .= ' data-center="' . esc_attr( $atts['center'] ) . '"';

$class = ( isset( $atts['verticalAlign'] ) ) ? [ 'class' => 'is-vertically-aligned-' . esc_attr( $atts['verticalAlign'] ) ] : [];
$ratio = ( 'original' !== $atts['ratio'] ) ? 'style="aspect-ratio: ' . esc_attr( $atts['ratio'] ) . ';"' : '';
?>

<div <?php echo wp_kses_data( get_block_wrapper_attributes( $class ) ); ?>>
	<div class="swiper"<?php echo wp_kses_data( $data ); ?>>
		<div class="swiper-wrapper">
			<?php foreach ( $atts['images'] as $image ) { ?>
				<div class="swiper-slide" <?php echo wp_kses_data( $ratio ); ?>>
					<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
