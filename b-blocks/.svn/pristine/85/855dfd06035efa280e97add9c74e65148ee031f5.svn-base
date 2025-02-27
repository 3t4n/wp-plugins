<?php
$prefix = 'bBlocksPriceLists';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\GetCSS as GetCSS;

// Generate Styles
if( !function_exists( 'bBlocksPriceListsStyle' ) ) {
	function bBlocksPriceListsStyle($attributes, $id, $prefix){
		extract( $attributes );

		$mainSl = "#$id";
		$priceListsSl = "$mainSl .$prefix";
		$gPriceSl = "$priceListsSl .priceItem";
		
		$priceListsStyle = new BBlocksStyleGenerator();
		$priceListsStyle::addStyle( "$priceListsSl", [
			'grid-gap' => "$rowGap $columnGap"
		] );
		$priceListsStyle::addStyle( "$gPriceSl", [
			'text-align' => $textAlign,
			'padding' => GetCSS::getSpaceCSS( $padding )
		] );
		$priceListsStyle::addStyle( "$gPriceSl .productImage", [
			'margin' => GetCSS::getSpaceCSS( $imgMargin )
		] );
		$priceListsStyle::addStyle( "$gPriceSl .productName", [
			'margin' => GetCSS::getSpaceCSS( $nameMargin )
		] );
		$priceListsStyle::addStyle( "$gPriceSl .productDescription", [
			'margin' => GetCSS::getSpaceCSS( $descMargin )
		] );

		$childCSS = "";
		foreach ( $products as $index => $product ) {
			extract( $product );
			$priceSl = "$mainSl #priceItem-$index";

			$backgroundStyle = GetCSS::getBackgroundCSS( $background );
			$imgBorderStyle = GetCSS::getBorderCSS( $imgBorder );
			$separatorStyle = GetCSS::getSeparatorCSS( $separator );

			$childCSS .= "
				$priceSl{ $backgroundStyle }
				$priceSl .productImage{ $imgBorderStyle }
				$priceSl .productName{ color: $nameColor; }
				$priceSl .productDescription{ color: $descColor; }
				$priceSl .productPrice{ color: $priceColor; }
				$priceSl .productSeparator{ $separatorStyle }
			";
		}

		return GetCSS::getTypoCSS( '', $nameTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $descTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $priceTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( "$gPriceSl .productName", $nameTypo )['styles'] .
			GetCSS::getTypoCSS( "$gPriceSl .productDescription", $descTypo )['styles'] .
			GetCSS::getTypoCSS( "$gPriceSl .productPrice", $priceTypo )['styles'] .
			$priceListsStyle::renderStyle() .
			$childCSS;
	}
}

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksPriceListsStyle( $attributes, $id, $prefix ) ); ?></style>

	<div class='<?php echo esc_attr( $prefix ); ?> <?php echo esc_attr( $layout ?? 'vertical' ); ?> columns-<?php echo esc_attr( $columns['desktop'] ); ?> columns-tablet-<?php echo esc_attr( $columns['tablet'] ); ?> columns-mobile-<?php echo esc_attr( $columns['mobile'] ); ?>'>
		<?php foreach ( $products as $index => $product ) {
			extract( $product ); ?>

			<div class='priceItem' id='priceItem-<?php echo esc_attr( $index ); ?>'>
				<?php echo $img['url'] ? "<img class='productImage' src='". esc_url( $img['url'] ) ."' alt='". esc_attr( $img['alt'] ) ."' />" : ''; ?>

				<div class='productDetails'>
					<h4 class='productName'><?php echo wp_kses_post( $name ); ?></h4>

					<?php echo $isDesc ? "<p class='productDescription'>". wp_kses_post( $desc ) ."</p>" : ''; ?>

					<span class='productPrice'><?php echo wp_kses_post( $price ); ?></span>
				</div>

				<?php echo $isSep ? "<span class='productSeparator'></span>" : ''; ?>
			</div>
		<?php } ?>
	</div>
</div>