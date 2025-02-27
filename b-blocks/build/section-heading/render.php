<?php
$prefix = 'bBlocksSectionHeading';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\GetCSS as GetCSS;

// Generate Styles
if( !function_exists( 'bBlocksSectionHeadingStyle' ) ) {
	function bBlocksSectionHeadingStyle($attributes, $id, $prefix){
		extract( $attributes );

		$headingSl = "#$id .$prefix";

		$sectionHeadingStyle = new BBlocksStyleGenerator();
		$sectionHeadingStyle::addStyle( "$headingSl", [
			'text-align' => $textAlign
		] );
		$sectionHeadingStyle::addStyle( "$headingSl .sectionHeadingTitle", [
			'color' => $titleColor,
			'margin' => GetCSS::getSpaceCSS( $titleMargin )
		] );
		$sectionHeadingStyle::addStyle( "$headingSl .sectionHeadingSeparator", [
			GetCSS::getSeparatorCSS( $separator ) => '',
			'margin' => GetCSS::getSpaceCSS( $sepMargin )
		] );
		$sectionHeadingStyle::addStyle( "$headingSl .sectionHeadingDescription", [
			'color' => $descColor,
			'margin' => GetCSS::getSpaceCSS( $descMargin )
		] );

		return GetCSS::getTypoCSS( '', $titleTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $descTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( "$headingSl .sectionHeadingTitle", $titleTypo )['styles'] .
			GetCSS::getTypoCSS( "$headingSl .sectionHeadingDescription", $descTypo )['styles'] .
			$sectionHeadingStyle::renderStyle();
	}
}

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksSectionHeadingStyle( $attributes, $id, $prefix ) ); ?></style>

	<div class='bBlocksSectionHeading'>
		<h2 class='sectionHeadingTitle'><?php echo wp_kses_post( $title ); ?></h2>
		<?php echo $isSep ? "<span class='sectionHeadingSeparator'></span>" : ''; ?>
		<?php echo $isDesc ? "<p class='sectionHeadingDescription'>". wp_kses_post( $desc ) ."</p>" : ''; ?>
	</div>
</div>