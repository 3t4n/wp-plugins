<?php
/*
 * Name: Cover
 * Section: content
 * Description: Email cover block
 */

/* @var $options array */

// Don't access this file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// On future releases of Newsletter, default options will be part of the options.php
// file, it is the best place to have them. By now, be patience.

// The "block_*" options are reserved and could be processed dutrectly by Newsletter. For example the
// "block_background" and "block_padding_*" are used to generated the wrapper of the block content.

$defaults = array(
    'title' => 'Cover Title',
    'title_font_family' => '',
    'title_font_size' => '',
    'title_font_weight' => '',
    'title_font_color' => '',
    'title_font_align' => 'center',
    'text' => 'Cover block text (optional)',
    'font_family' => '',
    'font_size' => '',
    'font_weight' => '',
    'font_color' => '',
	'overlay-opacity' => 50,
	'padding-top' => 40,
	'padding-bottom' => 40,
	'padding-left' => 40,
	'padding-right' => 40,
    'block_padding_top' => 30,
    'block_padding_bottom' => 30,
    'block_padding_left' => 0,
    'block_padding_right' => 0,
    'block_background' => '',
);

$options = array_merge($defaults, $options);

$title_style = TNP_Composer::get_title_style($options, 'title', $composer);
$text_style = TNP_Composer::get_text_style($options, '', $composer);

$media = false;

if ( !empty($options['image']['id']) ) {
    $td_width = round(($composer['width'] - $options['block_padding_left'] - $options['block_padding_right'] - 20) / 2);
    //$image_width = 300 - $options['block_padding_left'];
    $media = tnp_resize_2x( $options['image']['id'], [$td_width, 0] );
} ?>

<style>
    /* Styles which will be removed and injected in the replacing the matching "inline-class" attribute */
    .title {
        <?php esc_html( $title_style->echo_css() ) ?>
        line-height: normal;
        margin: 0;
        padding: 40px;
		<?php if( $options['padding-top'] ){
			echo 'padding-top: ' . esc_attr( $options['padding-top'] ) . 'px;';
		} ?>
		<?php if( $options['padding-bottom'] ){
			echo 'padding-bottom: ' . esc_attr( $options['padding-bottom'] ) . 'px;';
		} ?>
		<?php if( $options['padding-left'] ){
			echo 'padding-left: ' . esc_attr( $options['padding-left'] ) . 'px;';
		} ?>
		<?php if( $options['padding-right'] ){
			echo 'padding-right: ' . esc_attr( $options['padding-right'] ) . 'px;';
		} ?>
		<?php if( $options['text'] ){ echo 'padding-bottom: 0px;'; } ?>
    }

    .text {
        <?php esc_html( $text_style->echo_css() ) ?>
        padding: 40px;
        line-height: 1.4;
        margin: 0;
		<?php if( $options['padding-top'] ){
			echo 'padding-top: ' . esc_attr( $options['padding-top'] ) . 'px;';
		} ?>
		<?php if( $options['padding-bottom'] ){
			echo 'padding-bottom: ' . esc_attr( $options['padding-bottom'] ) . 'px;';
		} ?>
		<?php if( $options['padding-left'] ){
			echo 'padding-left: ' . esc_attr( $options['padding-left'] ) . 'px;';
		} ?>
		<?php if( $options['padding-right'] ){
			echo 'padding-right: ' . esc_attr( $options['padding-right'] ) . 'px;';
		} ?>
		<?php if( $options['title'] ){ echo 'padding-top: 0px;'; } ?>
    }

	.img-background {
		padding: 0;
		margin: 0;
		background-color: #ddd;
		<?php if ($media) { ?>
			background: url(<?php echo esc_url( $media->url ); ?>);
			background-size: cover;
			background-position: center center;
		<?php } ?>
		<?php if( $options['border-radius'] ){
			echo 'border-radius: ' . esc_attr( $options['border-radius'] ) . 'px;';
			echo 'overflow: hidden;';
		} ?>
		<?php if( $options['box-shadow-x'] || $options['box-shadow-y'] || $options['box-shadow-blur'] || $options['box-shadow-spread'] || $options['box-shadow-color'] ){

			if( empty($options['box-shadow-x']) ){ $options['box-shadow-x'] = '0'; }
			if( empty($options['box-shadow-y']) ){ $options['box-shadow-y'] = '0'; }
			if( empty($options['box-shadow-blur']) ){ $options['box-shadow-blur'] = '0'; }
			if( empty($options['box-shadow-spread']) ){ $options['box-shadow-spread'] = '0'; }
			if( empty($options['box-shadow-color']) ){ $options['box-shadow-color'] = '#000000'; }

			echo ' box-shadow: ' . esc_attr( $options['box-shadow-x'] ) . 'px ' . esc_attr( $options['box-shadow-y'] ) . 'px ' . esc_attr( $options['box-shadow-blur'] ) . 'px ' . esc_attr( $options['box-shadow-spread'] ) . 'px ' . esc_attr( $options['box-shadow-color'] ) . ';';
		} ?>
	}

</style>

<?php
// convert hex+opacity to rgba
if( $options['overlay-color'] || $options['overlay-opacity'] ){
	if( empty($options['overlay-color']) ){ $options['overlay-color'] = '#ffffff'; }
	if( empty($options['overlay-opacity']) ){ $options['overlay-opacity'] = 0; }

	$hex = $options['overlay-color'];
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

	$overlay_color = "rgba($r, $g, $b, " . ($options['overlay-opacity']/100) . ")";
}
?>

<div inline-class="img-background">
	<table width="100%" class="responsive" border="0" cellspacing="0" cellpadding="0" inline-class="table">

		<?php if ($options['title']) { ?>
			<tr style="background-color: <?php echo esc_attr( $overlay_color ); ?>;">
				<td align="center" inline-class="title">
					<?php echo esc_html( $options['title'] ); ?>
				</td>
			</tr>
		<?php } ?>

		<?php if ($options['text']) { ?>
			<tr style="background-color: <?php echo esc_attr( $overlay_color ); ?>;">
				<td align="center" inline-class="text">
					<?php echo esc_html( $options['text'] ); ?>
				</td>
			</tr>
		<?php } ?>

	</table>
</div>