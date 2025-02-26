<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

settings_fields( 'hd_los_divisions_options' );
do_settings_sections( 'hd_los_divisions_options' );

$hd_los_option_divisions    = json_decode( json_encode( get_option( 'hd_los_divisions' ) ), true );
$hd_los_option_divisions_id = intval( get_option( 'hd_los_divisions_id' ) );

?>

<p><?php _e( 'This setting helps you to easier manage the divisions for your widgets. You can define custom aliases for divisions and use these aliases in multiple widgets. So if you change the division setting here, the change applies to all widgets you implemented using the corresponding alias. Of course you can also use permalinks or a JSON-string to automatically create a Division Picker.', 'hockeydata_los' ); ?></p>

<p><?php _e( 'If you are implementing widgets using shortcodes, add the attribue <code>division-alias</code> and the id of your configuration (the first input in each row).', 'hockeydata_los' ); ?> <?php _e( 'E.g.:', 'hockeydata_los' ); ?></p>

<p><code>[hd-los-schedule division-alias=2]</code></p>

<p><?php _e( 'Helpful links:', 'hockeydata_los' ); ?></p>

<p>

	&raquo; <a href="https://apidocs.hockeydata.net/division-finder/?apiKey=<?php echo get_option( 'hd_los_api_key' ); ?>" target="_blank"><?php _e( 'Division Finder', 'hockeydata_los' ); ?></a>

	<br>

	&raquo; <a href="https://apidocs.hockeydata.net/javascript-api/hockeydata-los-divisionpicker/" target="_blank"><?php _e( 'JSON-string format', 'hockeydata_los' ); ?></a>

</p>

<table class="form-table" id="hd-los-divisions-table"></table>

<hr>

<button type="button" class="button" onclick="hdLosAddDivisionConfigRow();"><?php _e( 'Add Entry', 'hockeydata_los' ); ?></button>

<input type="hidden" name="hd_los_divisions" id="hd_los_divisions">

<input type="hidden" name="hd_los_divisions_id" id="hd_los_divisions_id" value="<?php echo $hd_los_option_divisions_id; ?>">

<p id="hd-los-divisions-save-hint" style="display: none;"><?php _e( 'Don\'t forget to save your changes:' , 'hockeydata_los' ); ?></p>

<script>

	jQuery( function() {

		jQuery( '#hd_los_settings_form' ).submit( hdLosStringifyDivisionsConfig );

		var divisions = null || <?php echo $hd_los_option_divisions ? $hd_los_option_divisions : 'null'; ?>;

		if ( jQuery.isArray( divisions ) ) {

			for ( var i = 0; i < divisions.length; i++ ) {

				var division = divisions[ i ];

				hdLosAddDivisionConfigRow( division );

			}

		}

	} );

</script>