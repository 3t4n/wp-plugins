<?php
$prefix = 'bBlocksQRCode';
$id = wp_unique_id( "$prefix-" );
$planClass = BBlocks\Inc\Utils::isPro() ? 'pro' : 'free';

extract( $attributes );
$qrStyles = "#$id .$prefix{ text-align: $qrAlign; }";
$siteUrl = $url ? $url : 'https://bplugins.com';

$qrUrl = "https://api.qrserver.com/v1/create-qr-code/?size=$dimension"."x"."$dimension&color=". str_replace( '#', '', $color ) ."&bgcolor=". str_replace( '#', '', $bgColor ) ."&ecc=L&qzone=1&data=$siteUrl";
?>
<div <?php echo get_block_wrapper_attributes( [ 'class' => $planClass ] ); ?> id='<?php echo esc_attr( $id ); ?>'>
	<style><?php echo esc_html( $qrStyles ); ?></style>

	<div class='<?php echo esc_attr( $prefix ); ?>'>
		<img src='<?php echo esc_url( $qrUrl ); ?>' alt='<?php echo esc_url( $url ); ?>' />
	</div>
</div>