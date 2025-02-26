<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

settings_fields( 'hd_los_styling_options' );
do_settings_sections( 'hd_los_styling_options' );

$hd_los_option_template = get_option( 'hd_los_template' );

$css_colors = array(

	__( 'Background of Table Headers and Panels; different Borders', 'hockeydata_los' ),
	__( 'Font of Table Headers and Panels',                          'hockeydata_los' ),
	__( 'Background and Borders of different Headers',               'hockeydata_los' ),
	__( 'Different Borders and Backgrounds',                         'hockeydata_los' ),
	__( 'Alternating Backgrounds',                                   'hockeydata_los' ),
	__( 'Alternating Backgrounds, Borders',                          'hockeydata_los' ),
	__( 'Fonts',                                                     'hockeydata_los' ),
	__( 'Button Backgrounds and Borders',                            'hockeydata_los' ),
	__( 'Minor Background Color',                                    'hockeydata_los' ),
	__( 'Minor Font Color',                                          'hockeydata_los' )

);

$templates = array(

	'default' => __( 'Default', 'hockeydata_los' ),
	'dark'    => __( 'Dark',    'hockeydata_los' ),
	'glass'   => __( 'Glass',   'hockeydata_los' ),
	'soda'    => __( 'Soda',    'hockeydata_los' )

);

?>

<table class="form-table">

	<tr>

		<th scope="row"><label for="hd_los_template"><?php _e( 'Template', 'hockeydata_los' ); ?></label></th>

		<td>

			<select name="hd_los_template" id="hd_los_template" class="regular-text">

				<option value=""<?php if ( ! $hd_los_option_template ) { ?> selected="selected"<?php } ?>><?php _e( '[None]', 'hockeydata_los' ); ?></option>

				<?php foreach ( $templates as $template_name => $template_label ) { ?>

					<option value="<?php echo $template_name; ?>"<?php if ( $hd_los_option_template === $template_name ) { ?> selected="selected"<?php } ?>><?php echo $template_label; ?></option>

				<?php } ?>

			</select>

		</td>

	</tr>

	<?php for ( $i = 0; $i < count( $css_colors); $i++ ) { ?>

		<tr>

			<th scope="row"><label for="hd_los_css_color_<?php echo $i; ?>"><?php _e( 'Color', 'hockeydata_los' ); ?> #<?php echo $i + 1; ?></label></th>

			<td>

				<input type="text" name="hd_los_css_color_<?php echo $i; ?>" id="hd_los_css_color_<?php echo $i; ?>" value="<?php echo get_option( 'hd_los_css_color_' . $i ); ?>" class="hd-los-color-picker">

				<p class="description"><?php echo $css_colors[ $i ]; ?></p>

			</td>

		</tr>

	<?php } ?>

</table>