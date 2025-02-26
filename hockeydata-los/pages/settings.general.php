<?php

if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

settings_fields( 'hd_los_general_options' );
do_settings_sections( 'hd_los_general_options' );

$hd_los_option_sport    = get_option( 'hd_los_sport'    );
$hd_los_option_language = get_option( 'hd_los_language' );

?>

<table class="form-table">

	<tr>

		<th scope="row">

			<label for="hd_los_api_key">

				<?php _e( 'API Key', 'hockeydata_los' ); ?>

				<small>(<?php _e( 'required', 'hockeydata_los' ); ?>)</small>

			</label>

		</th>

		<td>

			<input type="text" name="hd_los_api_key" id="hd_los_api_key" value="<?php echo esc_attr( get_option( 'hd_los_api_key' ) ); ?>" class="regular-text" onchange="hdLosCheckApiKey();">

			<span id="hd-los-api-key-checking"><?php _e( 'Checking...', 'hockeydata_los' ); ?></span>

			<span id="hd-los-api-key-ok" class="hd-los-ok"><?php _e( '[VALID]', 'hockeydata_los' ); ?></span>

			<span id="hd-los-api-key-nok" class="hd-los-nok"><?php _e( '[INVALID]', 'hockeydata_los' ); ?></span>

		</td>

	</tr>

	<tr>

		<th scope="row">

			<label for="hd_los_sport">

				<?php _e( 'Sport', 'hockeydata_los' ); ?>

				<small>(<?php _e( 'required', 'hockeydata_los' ); ?>)</small>

			</label>

		</th>

		<td>

			<select name="hd_los_sport" id="hd_los_sport" class="regular-text">

				<option value=""<?php if ( ! $hd_los_option_sport ) { ?> selected="selected"<?php } ?>></option>

				<option value="americanfootball"<?php if ( 'americanfootball' === $hd_los_option_sport  ) { ?> selected="selected"<?php } ?>><?php _e( 'American Football', 'hockeydata_los' ); ?></option>

				<option value="icehockey"<?php if ( 'icehockey' === $hd_los_option_sport ) { ?> selected="selected"<?php } ?>><?php _e( 'Icehockey', 'hockeydata_los' ); ?></option>

			</select>

		</td>

	</tr>

	<tr>

		<th scope="row"><label for="hd_los_language"><?php _e( 'Widget Language', 'hockeydata_los' ); ?></label></th>

		<td>

			<select name="hd_los_language" id="hd_los_language" class="regular-text">

				<option value="en"<?php if ( 'en' === $hd_los_option_language || ! $hd_los_option_language ) { ?> selected="selected"<?php } ?>><?php _e( 'English', 'hockeydata_los' ); ?></option>

				<option value="de"<?php if ( 'de' === $hd_los_option_language ) { ?> selected="selected"<?php } ?>><?php _e( 'German', 'hockeydata_los' ); ?></option>

			</select>

		</td>

	</tr>

	<tr>

		<th scope="row"><label for="hd_los_page_game_report"><?php _e( 'Game Report Page', 'hockeydata_los' ); ?></label></th>

		<td>

			<?php

			wp_dropdown_pages( array(
				'name'              => 'hd_los_page_game_report',
				'id'                => 'hd_los_page_game_report',
				'selected'          => get_option( 'hd_los_page_game_report' ),
				'show_option_none'  => ' ',
				'option_none_value' => '',
				'class'             => 'regular-text'
			) );

			?>

			<p class="description"><?php _e( 'Implement the widget "hockeydata LOS: Game Report" on this page.', 'hockeydata_los' ); ?> <?php _e( 'You can overwrite the page for each widget individually.', 'hockeydata_los' ); ?></p>

		</td>

	</tr>

	<tr>

		<th scope="row"><label for="hd_los_page_player_details"><?php _e( 'Player Details Page', 'hockeydata_los' ); ?></label></th>

		<td>

			<?php

			wp_dropdown_pages( array(
				'name'              => 'hd_los_page_player_details',
				'id'                => 'hd_los_page_player_details',
				'selected'          => get_option( 'hd_los_page_player_details' ),
				'show_option_none'  => ' ',
				'option_none_value' => '',
				'class'             => 'regular-text'
			) );

			?>

			<p class="description"><?php _e( 'Implement the widget "hockeydata LOS: Player Page" on this page.', 'hockeydata_los' ); ?> <?php _e( 'You can overwrite the page for each widget individually.', 'hockeydata_los' ); ?></p>

		</td>

	</tr>

	<tr>

		<th scope="row"><label for="hd_los_page_team_details"><?php _e( 'Team Details Page', 'hockeydata_los' ); ?></label></th>

		<td>

			<?php

			wp_dropdown_pages( array(
				'name'              => 'hd_los_page_team_details',
				'id'                => 'hd_los_page_team_details',
				'selected'          => get_option( 'hd_los_page_team_details' ),
				'show_option_none'  => ' ',
				'option_none_value' => '',
				'class'             => 'regular-text'
			) );

			?>

			<p class="description"><?php _e( 'Implement the widget "hockeydata LOS: Team Page" on this page.', 'hockeydata_los' ); ?> <?php _e( 'You can overwrite the page for each widget individually.', 'hockeydata_los' ); ?></p>

		</td>

	</tr>

</table>

<script>

	jQuery( function() {

		hdLosCheckApiKey();

	} );

</script>