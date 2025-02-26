<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//if cooming soon page available
$nncd_page_id = nncd_get_option( 'nncd_page' );
if ( ( ! empty( $nncd_page_id ) AND ! is_page( $nncd_page_id ) ) or ( empty( $nncd_page_id ) ) ) {
	//style countdown
	$nncd_page_class = nncd_get_option( 'nncd_cd_style' );

	if ( empty( $nncd_page_class ) ) {
		$nncd_page_class = 'cdstyle-tb-default';
	}
?>

<div id="nn-count-down" class="<?php echo ' ' . $nncd_page_class; ?>">
	<div class="container">
		<div class="image" >
			<?php nncd_image(); ?>
		</div>
		<div class="data" >
			<?php nncd_message(); ?>
			<div id="countdown_time"></div>
		</div>
		<?php nncd_button(); ?>
	</div>
</div>

<?php nncd_datetime(); ?>
<?php } ?>