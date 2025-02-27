<?php
$prefix = 'bBlocksInfoBox';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\GetCSS as GetCSS;

// Generate Styles
if( !function_exists( 'bBlocksInfoBoxStyle' ) ) {
	function bBlocksInfoBoxStyle($attributes, $id, $prefix){
		extract( $attributes );

		$mainSl = "#$id";
		$infoBoxSl = "$mainSl .$prefix";

		$infoBoxStyle = new BBlocksStyleGenerator();
		$infoBoxStyle::addStyle( "$mainSl", [
			'text-align' => $infoBoxAlign
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl", [
			'text-align' => $textAlign,
			'width' => '0px' === $width || '0%' === $width || '0em' === $width ? '100%' : $width,
			GetCSS::getBackgroundCSS( $background ) => '',
			'padding' => GetCSS::getSpaceCSS( $padding ),
			GetCSS::getBorderCSS( $border ) => '',
			'box-shadow' => GetCSS::getShadowCSS( $shadow )
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl .infoBoxIcon", [
			'margin' => GetCSS::getSpaceCSS( $iconMargin )
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl .infoBoxIcon i", [
			GetCSS::getIconCSS( $icon ) => ''
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl .infoBoxTitle", [
			'color' => $titleColor,
			'margin' => GetCSS::getSpaceCSS( $titleMargin )
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl .infoBoxDescription", [
			'color' => $descColor,
			'margin' => GetCSS::getSpaceCSS( $descMargin )
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl .infoBoxButton", [
			GetCSS::getColorsCSS( $btnColors ) => '',
			'padding' => GetCSS::getSpaceCSS( $btnPadding ),
			GetCSS::getBorderCSS( $btnBorder ) => ''
		] );
		$infoBoxStyle::addStyle( "$infoBoxSl .infoBoxButton:hover", [
			GetCSS::getColorsCSS( $btnHovColors ) => ''
		] );

		return GetCSS::getTypoCSS( '', $titleTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $descTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $btnTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( "$infoBoxSl .infoBoxTitle", $titleTypo )['styles'] .
			GetCSS::getTypoCSS( "$infoBoxSl .infoBoxDescription", $descTypo )['styles'] .
			GetCSS::getTypoCSS( "$infoBoxSl .infoBoxButton", $btnTypo )['styles'] .
			$infoBoxStyle::renderStyle();
	}
}

extract( $attributes );

$btnTab = $isLinkNewTab ? '_blank' : '';
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksInfoBoxStyle( $attributes, $id, $prefix ) ); ?></style>

	<div class='bBlocksInfoBox'>
		<?php echo $isIcon && $icon['class'] ? "<div class='infoBoxIcon'><i class='". esc_html( $icon['class'] ) ."'></i></div>" : ''; ?>
		<?php echo $title ? "<h3 class='infoBoxTitle'>". wp_kses_post( $title ) ."</h3>" : ''; ?>
		<?php echo $isDesc && $desc ? "<p class='infoBoxDescription'>". wp_kses_post( $desc ) ."</p>" : ''; ?>
		<?php echo $isBtn && $btn ? "<a href='". esc_url( $btnLink ) ."' class='infoBoxButton' target='". esc_attr( $btnTab ) ."' rel='noreferrer noopener'>". wp_kses_post( $btn ) ."</a>" : ''; ?>
	</div>
</div>