<?php
$prefix = 'bBlocksContainer';
$id = wp_unique_id( "$prefix-" );

use BBlocks\Inc\Utils as Utils;
$planClass = Utils::isPro() ? 'pro' : 'free';

$innerBlocks = $content;

extract( $attributes );
extract( $content );

$mainSl = "#$id .$prefix";
$cSl = "$mainSl .$prefix" . "Content";

$bBlocksContainerCSS = "
	$mainSl{
		min-height: " . Utils::valForZero( $wrapper['minHeight'] ) . ";
		align-items: $horizontalAlign;
		justify-content: $verticalAlign;
	}
	$cSl{
 		width: " . ( $isFullWidth ? '100%' : Utils::valForZero( $width['desktop'], '100%' ) ) . ";
		flex-grow: $height;
	}
	@media only screen and (min-width:641px) and (max-width: 1024px){
		$cSl{
			width: " . ( $isFullWidth ? '100%' : Utils::valForZero( $width['tablet'], '100%' ) ) . ";
		}
	}
	@media only screen and (max-width: 640px){
		$cSl{
			width: " . ( $isFullWidth ? '100%' : Utils::valForZero( $width['mobile'], '100%' ) ) . ";
		}
	}
";

?>

<div <?php echo get_block_wrapper_attributes(); ?> id='<?php echo esc_attr( $id ) ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>' data-bblocks-advanced='<?php echo esc_attr( wp_json_encode( $attributes['advanced'] ) ); ?>'>
	<style><?php echo esc_html( $bBlocksContainerCSS ); ?></style>

	<div class='<?php echo esc_attr( $prefix ) ?>'>
		<?php if( $shape['top']['uploadSvg']['url'] || 'none' !== $shape['top']['type'] ){ ?>
			<div class='shaped topShaped'></div>
		<?php } ?>

		<div class='<?php echo esc_attr( $prefix ) ?>Content is-layout-constrained wp-block-b-blocks-container-is-layout-constrained'>
			<?php echo wp_kses( $innerBlocks, Utils::allowedInnerHTML() ); ?>
		</div>

		<?php if( $shape['bottom']['uploadSvg']['url'] || 'none' !== $shape['bottom']['type'] ){ ?>
			<div class='shaped bottomShaped'></div>
		<?php } ?>
	</div>
</div>