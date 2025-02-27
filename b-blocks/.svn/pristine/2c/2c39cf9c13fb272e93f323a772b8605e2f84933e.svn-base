<?php
$prefix = 'bBlocksFeatureBoxes';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\GetCSS as GetCSS;

// Generate Styles
if( !function_exists( 'bBlocksFeatureBoxesStyle' ) ) {
	function bBlocksFeatureBoxesStyle($attributes, $id, $prefix){
		extract( $attributes );

		$mainSl = "#$id";
		$featureBoxesSl = "$mainSl .$prefix";
		$gFeatureSl = "$featureBoxesSl .feature";
		
		$featureBoxesStyle = new BBlocksStyleGenerator();
		$featureBoxesStyle::addStyle( "$featureBoxesSl", [
			'grid-gap' => "$rowGap $columnGap"
		] );
		$featureBoxesStyle::addStyle( "$gFeatureSl", [
			'text-align' => $textAlign,
			'padding' => GetCSS::getSpaceCSS( $padding )
		] );
		$featureBoxesStyle::addStyle( "$gFeatureSl .featureIcon", [
			'margin' => GetCSS::getSpaceCSS( $iconMargin )
		] );
		$featureBoxesStyle::addStyle( "$gFeatureSl .featureTitle", [
			'margin' => GetCSS::getSpaceCSS( $titleMargin )
		] );
		$featureBoxesStyle::addStyle( "$gFeatureSl .featureSeparator", [
			'margin' => GetCSS::getSpaceCSS( $sepMargin )
		] );

		$childCSS = "";
		foreach ( $features as $index => $feature ) {
			extract( $feature );

			$featureSl = "$mainSl #feature-$index";

			$backgroundStyle = GetCSS::getBackgroundCSS($background );
			$iconStyle = GetCSS::getIconCSS($icon );
			$separatorStyle = GetCSS::getSeparatorCSS($separator );

			$childCSS .= "
				$featureSl{ $backgroundStyle }
				$featureSl .featureIcon i{ $iconStyle }
				$featureSl .featureIcon img{ width: $iconWidth; }
				$featureSl .featureTitle{ color: $titleColor; }
				$featureSl .featureSeparator{ $separatorStyle }
				$featureSl .featureDescription{ color: $descColor; }
			";
		}

		return GetCSS::getTypoCSS( '', $titleTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $descTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( "$gFeatureSl .featureTitle", $titleTypo )['styles'] .
			GetCSS::getTypoCSS( "$gFeatureSl .featureDescription", $descTypo )['styles'] .
			$featureBoxesStyle::renderStyle() .
			$childCSS;
	}
}

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksFeatureBoxesStyle( $attributes, $id, $prefix ) ); ?></style>

	<div class='<?php echo esc_attr( $prefix ); ?> columns-<?php echo esc_attr( $columns['desktop'] ); ?> columns-tablet-<?php echo esc_attr( $columns['tablet'] ); ?> columns-mobile-<?php echo esc_attr( $columns['mobile'] ); ?>'>
		<?php foreach ( $features as $index => $feature ) {
			extract( $feature ); ?>

			<div class='feature' id='feature-<?php echo esc_attr( $index ); ?>'>
				<div class='featureIcon'>
					<?php echo $isUpIcon ?
					( $upIcon['url'] ? "<img src='". esc_url( $upIcon['url'] ) ."' alt='". esc_attr( $upIcon['alt'] ) ."' />" : '' ) :
					( $icon['class'] ? "<i class='". esc_attr( $icon['class'] ) ."'></i>" : '' ); ?>
				</div>

				<div class='featureDetails'>
					<?php echo $isTitle && $title ? "<h4 class='featureTitle'>". wp_kses_post( $title ) ."</h4>" : ''; ?>

					<?php echo $isSep ? "<span class='featureSeparator'></span>" : ''; ?>

					<?php echo $isDesc && $desc ? "<p class='featureDescription'>". wp_kses_post( $desc ) ."</p>" : ''; ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>