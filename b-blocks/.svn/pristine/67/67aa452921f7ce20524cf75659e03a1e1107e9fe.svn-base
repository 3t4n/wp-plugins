<?php
$prefix = 'bBlocksMailto';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

use BBlocks\Inc\GetCSS as GetCSS;

// Generate Styles
if( !function_exists( 'bBlocksMailtoStyle' ) ) {
	function bBlocksMailtoStyle($attributes, $id, $prefix){
		extract( $attributes );

		$mailToSl = "#$id .$prefix";

		$mailtoStyle = new BBlocksStyleGenerator();
		$mailtoStyle::addStyle( "$mailToSl", [
			'text-align' => $mailtoAlign
		] );
		$mailtoStyle::addStyle( "$mailToSl a.mailtoButton", [
			GetCSS::getColorsCSS( $btnColors ) => '',
			'padding' => GetCSS::getSpaceCSS( $btnPadding ),
			GetCSS::getBorderCSS( $btnBorder ) => '',
			'box-shadow' => '0px 5px 20px 0px '. $btnColors['bg']
		] );
		$mailtoStyle::addStyle( "$mailToSl a.mailtoButton:hover", [
			GetCSS::getColorsCSS( $btnHovColors ) => '',
			'box-shadow' => '0px 5px 20px 0px '. $btnHovColors['bg']
		] );

		return GetCSS::getTypoCSS( '', $btnTypo )['googleFontLink'] .
			GetCSS::getTypoCSS( "$mailToSl a.mailtoButton", $btnTypo )['styles'] .
			$mailtoStyle::renderStyle();
	}
}

extract( $attributes );
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( bBlocksMailtoStyle( $attributes, $id, $prefix ) ); ?></style>

	<div class='<?php echo esc_attr( $prefix ); ?>'>
		<a href='<?php echo 'mailto:' . esc_attr( sanitize_email( $receiverMail ) ); ?>' class='mailtoui mailtoButton'>
			<?php echo 'left' === $iconPosition && $icon['class'] ? "<i class='". esc_html( $icon['class'] ) ."'></i>" : ''; ?>

			<span><?php echo wp_kses_post( $btn ); ?></span>

			<?php echo 'right' === $iconPosition && $icon['class'] ? "<i class='". esc_html( $icon['class'] ) ."'></i>" : ''; ?>
		</a>
	</div>
</div>