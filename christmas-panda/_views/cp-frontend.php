<?php
/**
 *
 * Frontend view
 *
 * @package christmas-panda
 * @subpackage _views
 * @since Christmas Panda 1.0.0
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( isset( $cp_options ) && 'yes' == $cp_options->px_cp_is_active ) : ?>

	<div id="pix-cp-container" class="pix-cp pix-cp-<?php echo esc_attr( $cp_options->px_cp_display_position ); ?> <?php echo 'yes' == esc_attr( $cp_options->px_cp_is_fixed ) ? 'pix-cp-fixed' : ''; ?>" data-class="pix-cp-<?php echo esc_attr( $cp_options->px_cp_display_position ); ?>" data-image="<?php echo esc_url( PIX_CHR_PAN_URL ); ?>assets/images/snowflake" data-fall="<?php echo esc_attr( $cp_options->px_cp_snowfall ); ?>" >
		<img src="<?php echo esc_url( PIX_CHR_PAN_URL . '/assets/images/decoration_' . esc_attr( $cp_options->px_cp_display_type ) . '.png' ); ?>" alt="" />
	</div>

<?php
elseif ( isset( $cp_options ) && 'yes' == $cp_options->px_cp_snowfall ) :
?>
	<div id="pix-cp-container" data-image="<?php echo esc_url( PIX_CHR_PAN_URL ); ?>assets/images/snowflake" data-fall="<?php echo esc_attr( $cp_options->px_cp_snowfall ); ?>" />
<?php
endif;

if ( isset( $cp_options ) && 'yes' == $cp_options->px_cp_display_popup ) :
	$img_ext = '.png';
?>
	<div class="pix-christmas-pandas-popup display-on-<?php echo esc_attr( $cp_options->px_cp_popup_position ); ?>">
		<img src="<?php echo esc_url( PIX_CHR_PAN_URL . 'assets/images/popup_' . $cp_options->px_cp_popup_type . $img_ext ); ?>" alt="Christmas Pop-up" />
		<a href="#" class="px-popup-close"></a>
	</div>
<?php
endif;
