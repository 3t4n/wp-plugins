<?php
if ( isset( $_REQUEST['amm_submit'] ) && wp_verify_nonce( $_POST['_wpnonce'] ) ) {
	$api_key = ( ( isset( $_POST['amm_api_key'] ) && $_POST['amm_api_key'] != "" ) ? sanitize_text_field( $_POST['amm_api_key'] ) : '' );
	$map_style = isset( $_POST['amm_map_theme'] ) ? sanitize_text_field( $_POST['amm_map_theme'] ) : '';
	$map_type = isset( $_POST['amm_map_style'] ) ? sanitize_text_field( $_POST['amm_map_style'] ) : '';
	$map_height = isset( $_POST['amm_front_map_height'] ) ? sanitize_text_field( $_POST['amm_front_map_height'] ) : '';
	$map_width = isset( $_POST['amm_front_map_width'] ) ? sanitize_text_field( $_POST['amm_front_map_width'] ) : '';
 // $map_zoom = isset( $_POST['amm_zoom_level'] ) ? sanitize_text_field( $_POST['amm_zoom_level'] ) : '';
  $map_full_screen = isset( $_POST['amm_fullscreencontrol'] ) ? sanitize_text_field( $_POST['amm_fullscreencontrol'] ) : '';
  $map_type_control = isset( $_POST['amm_maptypecontrol'] ) ? sanitize_text_field( $_POST['amm_maptypecontrol'] ) : '';
  $map_street_view = isset( $_POST['amm_streetviewcontrol'] ) ? sanitize_text_field( $_POST['amm_streetviewcontrol'] ) : '';
  // Map setting array.
	$map_settings = array(
		'api'              => $api_key,
		'map_theme'        => $map_style,
		'map_style'        => $map_type,
		'map_height'       => $map_height,
		'map_width'        => $map_width,
    //'map_zoom'         => $map_zoom,
    'map_full_screen'  => $map_full_screen,
    'map_type_control' => $map_type_control,
    'map_street_view'  => $map_street_view,
	);
    // Store value into option table.
	$setting_saved = update_option( 'amm_map_setting', $map_settings );
	if ( $api_key == "" ){
		$error_msg = __( 'Please Enter Google API key', 'addmultiplemarker' );
	}
	if ( $setting_saved && $api_key != "" ) {
		$success_msg = __( 'Settings saved successfully', 'addmultiplemarker' );
	}
} ?>

<div class="amm-admin-main-wrap">
	<div class="amm-map-integration-wrap">
		<form method="POST" name="amm_map_integration" id="amm_map_integration">
			<?php wp_nonce_field();
			$retrieve_map_settings = get_option( 'amm_map_setting' );
			if ( !empty( $retrieve_map_settings ) ) {
				$api = $retrieve_map_settings['api'];
				$theme = isset( $retrieve_map_settings['map_theme'] ) ? $retrieve_map_settings['map_theme'] : 'standard';
				$map_type = isset( $retrieve_map_settings['map_style'] ) ? $retrieve_map_settings['map_style'] : 'roadmap';
				$map_width = isset( $retrieve_map_settings['map_width'] ) ? $retrieve_map_settings['map_width'] : '';
				$map_height = isset( $retrieve_map_settings['map_height'] ) ? $retrieve_map_settings['map_height'] : '';
        $map_zoom = isset( $retrieve_map_settings['map_zoom'] ) ? $retrieve_map_settings['map_zoom'] : '';
        $map_full_screen = isset( $retrieve_map_settings['map_full_screen'] ) ? $retrieve_map_settings['map_full_screen'] : '';
        $map_type_control = isset( $retrieve_map_settings['map_type_control'] ) ? $retrieve_map_settings['map_type_control'] : '';
        $map_street_view = isset( $retrieve_map_settings['map_street_view'] ) ? $retrieve_map_settings['map_street_view'] : '';
			} ?>
      <div class="left-align-section">
  			<div class="amm-api-section amm-panel">
  				<fieldset>
  					<legend><?php _e( 'Map API Key', 'addmultiplemarker' ); ?></legend>
  					<input class="amm-input" type="text" name="amm_api_key" value="<?php echo ( isset( $api ) ? $api : '' ); ?>" placeholder="<?php _e( 'Please enter your API key here', 'addmultiplemarker' ); ?>">
  					<span class="error error-span"><?php echo isset( $error_msg ) ? $error_msg : ''; ?></span>
  				</fieldset>
  			</div>

  			<div class="amm-map-theme-style amm-panel">
  				<fieldset>
  					<legend><?php _e('Map Type','addmultiplemarker'); ?></legend>
  					<label class="label">
  						<input type="radio" name="amm_map_style" value="roadmap" <?php echo ( ( isset ( $map_type ) && $map_type == 'roadmap' ) ? 'checked' : '' ); ?> <?php echo (!isset( $map_type ) ? 'checked': ''); ?> >
  						<?php esc_attr_e( 'Roadmap', 'addmultiplemarker' ); ?>
  					</label>
  					<label class="label">
  						<input type="radio" name="amm_map_style" value="satellite" <?php echo ( ( isset ( $map_type ) && $map_type == 'satellite' ) ? 'checked' : '' ); ?>>
  						<?php esc_attr_e( 'Satellite', 'addmultiplemarker' ); ?>
  					</label>
  					<label class="label">
  						<input type="radio" name="amm_map_style" value="hybrid" <?php echo ( ( isset ( $map_type ) && $map_type == 'hybrid' ) ? 'checked' : '' ); ?>><?php esc_attr_e( 'Hybrid', 'addmultiplemarker' ); ?>
  					</label>
  					<label class="label">
  						<input type="radio" name="amm_map_style" value="terrain" <?php echo ( ( isset ( $map_type ) && $map_type == 'terrain' ) ? 'checked' : '' ); ?>><?php esc_attr_e( 'Terrain', 'addmultiplemarker' ); ?>
  					</label>
  				</fieldset>
  			</div>
  			<div class="amm-dimensions amm-panel">
  				<fieldset>
  					<legend><?php _e( 'Width','addmultiplemarker' ); ?></legend>
  					<input class="amm-input" type="text" value="<?php echo ( isset( $map_width ) ? $map_width : '' ); ?>" name="amm_front_map_width" placeholder="eg. 100%">
  				</fieldset>
  			</div>
  			<div class="amm-dimensions amm-panel">
  				<fieldset>
  					<legend><?php _e( 'Height','addmultiplemarker' ); ?></legend>
  					<input class="amm-input" type="text" value="<?php echo ( isset( $map_height ) ? $map_height : '' ); ?>" name="amm_front_map_height" placeholder="eg. 100px">
  				</fieldset>
  			</div>
      </div>
      <div class="right-align-section">
       <!--  <div class="map-config-section amm-panel">
          <fieldset>
            <legend><?php esc_attr_e( 'Zoom Level', 'addmultiplemarker' ); ?></legend>
            <input type="number" name="amm_zoom_level" id="amm_zoom_level" class="amm-input" value="<?php echo ( isset( $map_zoom ) ? $map_zoom : '' ); ?>">
          </fieldset>
        </div> -->
        <input type="hidden" name="amm_zoom_level" id="amm_zoom_level" class="amm-input" value="<?php echo ( isset( $map_zoom ) ? $map_zoom : '' ); ?>">
        <div class="map-config-section amm-panel">
          <fieldset>
            <legend><?php esc_attr_e( 'Map Control', 'addmultiplemarker' ); ?></legend>
            <input type="checkbox" name="amm_fullscreencontrol" id="amm_fullscreencontrol" <?php if ( !empty( $map_full_screen ) ): echo 'checked="checked"'; endif; ?>><?php esc_attr_e( 'Full Screen Control', 'addmultiplemarker' ); ?>
          </fieldset>
          <fieldset>
            <input type="checkbox" name="amm_maptypecontrol" id="amm_maptypecontrol" <?php if ( !empty( $map_type_control ) ): echo 'checked="checked"'; endif; ?>><?php esc_attr_e( 'Map Type Control', 'addmultiplemarker' ); ?>
          </fieldset>
          <fieldset>
            <input type="checkbox" name="amm_streetviewcontrol" id="amm_streetviewcontrol" <?php if ( !empty( $map_street_view ) ): echo 'checked="checked"'; endif; ?>><?php esc_attr_e( 'Street View Control', 'addmultiplemarker' ); ?>
          </fieldset>
        </div>

        <div class="amm-map-theme-section amm-panel">
          <fieldset>
            <legend><?php _e('Map style','addmultiplemarker'); ?></legend>
            <label class="label">
              <input type="radio" name="amm_map_theme" value="standard" <?php echo ( ( isset ( $theme ) && $theme == 'standard' ) ? 'checked' : '' ); ?>
              <?php echo ( ! isset( $theme ) ? 'checked': '' ); ?> >
              <span class="text"><?php esc_attr_e( 'Standard', 'addmultiplemarker' ); ?></span>
              <img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/Standard.jpg" alt="map-style">
            </label>
            <label class="label">
              <input type="radio" name="amm_map_theme" value="silver" <?php echo ( ( isset ( $theme ) && $theme == 'silver' ) ? 'checked' : '' ); ?>>
              <span class="text"><?php esc_attr_e( 'Silver', 'addmultiplemarker' ); ?></span>
              <img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/Silver.jpg" alt="map-style">
            </label>
            <label class="label">
              <input type="radio" name="amm_map_theme" value="retro" <?php echo ( ( isset ( $theme ) && $theme == 'retro' ) ? 'checked' : '' ); ?>>
              <span class="text"><?php esc_attr_e( 'Retro', 'addmultiplemarker' ); ?></span>
              <img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/Retro.jpg" alt="map-style">
            </label>
            <label class="label">
              <input type="radio" name="amm_map_theme" value="dark" <?php echo ( ( isset ( $theme ) && $theme == 'dark' ) ? 'checked' : '' ); ?>>
              <span class="text"><?php esc_attr_e( 'Dark', 'addmultiplemarker' ); ?></span>
              <img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/Dark.jpg" alt="map-style">
            </label>
            <label class="label">
              <input type="radio" name="amm_map_theme" value="night" <?php echo ( ( isset ( $theme ) && $theme == 'night' ) ? 'checked' : '' ); ?>>
              <span class="text"><?php esc_attr_e( 'Night', 'addmultiplemarker' ); ?></span>
              <img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/Night.jpg" alt="map-style">
            </label>
            <label class="label">
              <input type="radio" name="amm_map_theme" value="aubergine" <?php echo ( ( isset ( $theme ) && $theme == 'aubergine' ) ? 'checked' : '' ); ?>>
              <span class="text"><?php esc_attr_e( 'Aubergine', 'addmultiplemarker' ); ?></span>
              <img src="<?php echo ADDMULTIPLEMARKER_PLUGIN_URL ?>admin/images/Aubergine.jpg" alt="map-style">
            </label>
          </fieldset>
        </div>
        <div class="amm-call-to-btn">
          <input type="submit" name="amm_submit" value="Save" class="submit">
        </div>
      </div>
			

			<?php echo isset( $success_msg ) ? '<div class="success-msg">' . $success_msg . '</div>' : ''; ?>
		</form>
	</div>
</div>
