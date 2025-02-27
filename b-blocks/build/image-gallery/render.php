<?php
$id = wp_unique_id( "bBlocksImageGallery-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\GetCSS as GetCSS;

// Generate Styles
if( !function_exists( 'bBlocksImageGalleryStyle' ) ) {
	function bBlocksImageGalleryStyle($attributes, $id){
		extract( $attributes );

		$imgShadow = GetCSS::getShadowCSS( $imgShadow, 'text' );
		$imgPaddingH = $imgPadding['horizontal'] ?? '0px';
		$imgPaddingV = $imgPadding['vertical'] ?? '0px';

		$imgLinkSl = "#$id .imgGalleryWrapper .imgGalleryImgLink";

		$imageGalleryStyle = new BBlocksStyleGenerator();
		$imageGalleryStyle::addStyle( "$imgLinkSl .imgGalleryImg", [
			'padding' => GetCSS::getSpaceCSS( $imgPadding ),
			GetCSS::getBorderCSS( $imgBorder ) => '',
			'filter' => "drop-shadow( $imgShadow )"
		] );
		$imageGalleryStyle::addStyle( "$imgLinkSl .imgGalleryImgCaption", [
			'text-align' => $capAlign,
			'color' => $capColor,
			'margin' => GetCSS::getSpaceCSS( $imgPadding ),
			'width' => "calc( ( 100% - 10px ) - ( $imgPaddingH * 2 ) )",
			'height' => "calc( ( 100% - 10px ) - ( $imgPaddingV * 2 ) )",
			'border-radius' => $imgBorder['radius'] ?? '0px'
		] );

		return GetCSS::getTypoCSS( '', $capTitleTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( '', $capDescTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( "$imgLinkSl .imgGalleryImgCaption h4", $capTitleTypo )['styles'] .
			GetCSS::getTypoCSS( "$imgLinkSl .imgGalleryImgCaption p", $capDescTypo )['styles'] .
			$imageGalleryStyle::renderStyle();
	}
}

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksImageGalleryStyle( $attributes, $id ) ); ?></style>

	<div class='imgGalleryWrapper columns-<?php echo esc_attr( $columns['desktop'] ); ?> columns-tablet-<?php echo esc_attr( $columns['tablet'] ); ?> columns-mobile-<?php echo esc_attr( $columns['mobile'] ); ?>'>
		<?php foreach ( $images as $image ) {
			$imgUrl = $image['url'];
			$imgUrlLarge = !empty( $image['sizes']['large']['url'] ) ? $image['sizes']['large']['url'] : $imgUrl;
			$imgAlt = $image['alt'] ? $image['alt'] : $image['title']; ?>
			
			<a class='imgGalleryImgLink' 
				<?php if( $isCap ){}else{ ?>
					href='#'
					data-fancybox='imgGalleryPreviewBtn'
					data-src='<?php echo esc_url( $imgUrl ); ?>'
					data-srcset='<?php echo esc_url( $imgUrlLarge ); ?> 576w, <?php echo esc_url( $imgUrl ); ?> 992w'
					data-sizes='( max-width: 576px ) 576px, 992px'
					data-caption='<?php echo wp_kses_post( $image['caption'] ); ?>'
				<?php } ?>>

				<img src='<?php echo esc_url( $imgUrl ); ?>' alt='<?php echo esc_html( $imgAlt ); ?>' class='imgGalleryImg' />

				<?php if( $isCap && ( !empty( $imgAlt ) || $isPreview ) ){ ?>
					<div class='imgGalleryImgCaption'>
						<div class='captionContent'>
							<?php echo !empty( $imgAlt ) ? "<h4>". wp_kses_post( $image['caption'] ) ."</h4>" : '' ; ?>
							<?php echo !empty( $image['description'] ) ? "<p>". wp_kses_post( $image['description'] ) ."</p>" : '' ; ?>

							<?php if( $isPreview ){ ?>
								<button class='imgGalleryPreviewBtn'
									data-fancybox='imgGalleryPreviewBtn'
									data-src='<?php echo esc_url( $imgUrl ); ?>'
									data-srcset='<?php echo esc_url( $imgUrlLarge ); ?> 576w, <?php echo esc_url( $imgUrl ); ?> 992w'
									data-sizes='( max-width: 576px ) 576px, 992px'
									data-caption='<?php echo wp_kses_post( $image['caption'] ); ?>'>
									<i class='fa fa-eye'></i><?php echo esc_html__( 'Preview', 'b-blocks' ); ?>
								</button>
							<?php } ?>
						</div>
					</div>
				<?php } ?> <!-- Image Gallery Caption -->
			</a> <!-- Image Gallery Link -->
		<?php } ?> <!-- Image Gallery Loop -->
	</div> <!-- Image Gallery Wrapper -->
</div>