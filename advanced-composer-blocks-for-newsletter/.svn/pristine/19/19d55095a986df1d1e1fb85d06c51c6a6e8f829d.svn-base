<?php
/*
 * Name: Call To Action+
 * Section: content
 * Description: Call to action button
 */

 // Don't access this file directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$default_options = array(
    'button_text' => 'Learn more',
    'button_url' => '',
    'button_color' => '#000000',
	'button_border_radius' => '3',
    'text_color' => '#ffffff',
    'align' => 'center',
    'block_background' => '',
    'button_width' => 'inline',
    'button_align' => 'center',
    'block_padding_top' => 20,
    'block_padding_bottom' => 20,
    'schema' => ''
);

$options = array_merge($default_options, $options);

$text_style = TNP_Composer::get_style($options, 'button_text', $composer, 'text');
?>

<style>
	.button {
		<?php echo esc_html( $text_style->echo_css() ) ?>
		background: <?php echo esc_attr( $options['button_color'] ); ?>;
		color: <?php echo esc_attr( $options['text_color'] ); ?>;
		display: inline-block;
		<?php if( $options['button_width'] == 'full_width' ){ ?>
			display: block;
		<?php } ?>
		padding: 12px 24px;
		<?php if( $options['button_text_font_size'] ){ ?>
			padding: <?php echo esc_attr( $options['button_text_font_size'] ) * 0.75; ?>px <?php echo esc_attr( $options['button_text_font_size'] ) * 1.5; ?>px;
		<?php } ?>
		text-decoration: none;
		<?php if( $options['button_border_radius'] ){ ?>
			border-radius: <?php echo esc_attr( $options['button_border_radius'] ); ?>px;
		<?php } ?>
	}
</style>

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0; border-collapse: collapse;">
    <tr>
        <td align="<?php echo esc_attr( $options['button_align'] ) ?>">
			<a href="<?php echo esc_url( $options['button_url'] ) ?>" inline-class="button"><?php echo esc_html( $options['button_text'] ); ?></a>
        </td>
    </tr>
</table>