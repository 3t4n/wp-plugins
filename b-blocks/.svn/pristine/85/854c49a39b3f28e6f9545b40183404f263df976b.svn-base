<?php
$prefix = 'bBlocksGif';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

// Generate Styles
if( !function_exists( 'bBlocksGifStyle' ) ) {
	function bBlocksGifStyle($attributes, $id, $prefix){
		extract( $attributes );

		$mainSl = "#$id";
		$gifSl = "$mainSl .$prefix";

		$gifW = '0px' === $gifWidth || '0%' === $gifWidth || '0em' === $gifWidth ? 'auto' : $gifWidth;

		$gifCSS = "$gifSl{
			text-align: $gifAlign;
		}
		$gifSl figure{
			width: $gifW;
		}";

		return $gifCSS;
	}
}

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksGifStyle( $attributes, $id, $prefix ) ); ?></style>

	<div class='<?php echo esc_attr( $prefix ); ?>'>
		<figure>
			<?php echo !empty( $gif ) ? "<img src='". esc_url( $gif['images']['original']['url'] ?? '' ) ."' alt='". esc_attr( $gif['title'] ?? '' ) ."' />" : ''; ?>
		</figure>
	</div>
</div>