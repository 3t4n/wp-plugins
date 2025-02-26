<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to show the Plugin Settings tab content.
 *
 * @link       https://sfbx.io/
 * @since      1.0.0
 *
 * @package    Appconsent_Cmp_Sfbx
 * @subpackage Appconsent_Cmp_Sfbx/admin/templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
$alpha2Countries 	= $this->sfbx_countries();
$appKeyStatus 		= get_option('sfbx_appkey_valid');
$sfbxSettings		= get_option('sfbx_settings');

if( isset($sfbxSettings['sfbx_targetcountries']) && !empty($sfbxSettings['sfbx_targetcountries']) ){
	$countriesDB = $sfbxSettings['sfbx_targetcountries'];
}else{
	$countriesDB = array();
}

if( isset($sfbxSettings['sfwx_pw_position']) && !empty($sfbxSettings['sfwx_pw_position']) ){
	$sfwx_pw_position = $sfbxSettings['sfwx_pw_position'];
}else{
	$sfwx_pw_position = "bottomLeft";
}

if( isset($sfbxSettings['sfwx_pwcolor']) && !empty($sfbxSettings['sfwx_pwcolor']) ){
	$sfwx_pwcolor = $sfbxSettings['sfwx_pwcolor'];
}else{
	$sfwx_pwcolor = "clear";
}

if( isset($sfbxSettings['sfwx_ux_temp']) && !empty($sfbxSettings['sfwx_ux_temp']) ){
	$sfwx_ux_temp = $sfbxSettings['sfwx_ux_temp'];
}else{
	$sfwx_ux_temp = "clear";
}

if( isset($sfbxSettings['sfbx_pw_status']) && !empty($sfbxSettings['sfbx_pw_status']) ){
	$sfbx_pw_status = $sfbxSettings['sfbx_pw_status'];
}else{
	$sfbx_pw_status = "";
}

if( isset($sfbxSettings['sfbx_forcegdpr']) && !empty($sfbxSettings['sfbx_forcegdpr']) ){
	$sfbx_forcegdpr = $sfbxSettings['sfbx_forcegdpr'];
}else{
	$sfbx_forcegdpr = "";
}

if( isset($sfbxSettings['sfbx_debug_mode']) && !empty($sfbxSettings['sfbx_debug_mode']) ){
	$sfbx_debug_mode = $sfbxSettings['sfbx_debug_mode'];
}else{
	$sfbx_debug_mode = "";
}

?>
<div class="sfbx-content">
<h3><?php esc_html_e( "Settings", "appconsent-cmp-sfbx" ); ?></h3>
<div class="sfbx-message">
	<?php 
	if( isset($_GET['saved']) && $_GET['saved'] == 'true' ){
		?>
		<p class="sfbx-success"><?php esc_html_e("Settings saved successfully!", "appconsent-cmp-sfbx"); ?></p>
		<?php 
	}elseif( isset($_GET['appkey']) && $_GET['appkey'] == 'empty' ){
		?>
		<p class="sfbx-error"><?php esc_html_e("App Key is required!", "appconsent-cmp-sfbx"); ?></p>
		<?php
	}
	?>
</div>
<form name="sfbx-form" id="sfbx-form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="sfbx_appkey">
						<?php esc_html_e( "App Key", "appconsent-cmp-sfbx" ); ?>		
					</label>
				</th>
				<td>
					<input name="sfbx_appkey" type="text" id="sfbx_appkey" class="regular-text" value="<?php if( isset($sfbxSettings['sfbx_appkey']) && !empty($sfbxSettings['sfbx_appkey']) ){ echo esc_attr($sfbxSettings['sfbx_appkey']); } ?>" required />
						
						<?php if( $appKeyStatus === '0' ){
							printf( '<span class="dashicons dashicons-dismiss"></span><span class="invalid-text">%s</span>', esc_html__("Key is Invalid", "appconsent-cmp-sfbx") );
						}elseif( $appKeyStatus == '1' ){
							printf( '<span class="dashicons dashicons-yes-alt"></span><span class="valid-text">%s</span>', esc_html__("Key is Valid", "appconsent-cmp-sfbx") );
						} ?>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="sfbx_targetcountries">
						<?php esc_html_e( "Target Countries","appconsent-cmp-sfbx" ); ?>
					</label>
				</th>
				<td>
					<select id="sfbx_targetcountries" name="sfbx_targetcountries[]" multiple="multiple">
						<?php foreach ($alpha2Countries as $key => $value) { ?>
							<option value="<?php echo esc_attr($value['alpha-2']); ?>" <?php selected( in_array($value['alpha-2'], $countriesDB), 1 ); ?> >
								<?php echo esc_html($value['name']); ?>	
							</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<?php esc_html_e( "Force GDPR", "appconsent-cmp-sfbx" ); ?>	
				</th>
				<td>
					<label for="sfbx_forcegdpr">
						<input type="checkbox" name="sfbx_forcegdpr" id="sfbx_forcegdpr" value="true" <?php checked( $sfbx_forcegdpr, 'true' ); ?> />
						<?php esc_html_e( "Force GDPR Applies for ALL users", "appconsent-cmp-sfbx" ); ?>
					</label>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<?php esc_html_e( "Privacy Widget", "appconsent-cmp-sfbx" ); ?>	
				</th>
				<td>
					<label for="sfbx_pw_status">
						<input type="checkbox" name="sfbx_pw_status" id="sfbx_pw_status" value="true" <?php checked( $sfbx_pw_status, 'true' ); ?> />
						<?php esc_html_e( "Enable Use Privacy Center", "appconsent-cmp-sfbx" ); ?>
					</label>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<?php esc_html_e( "Privacy Widget Position", "appconsent-cmp-sfbx" ); ?>
				</th>
				<td>
					<fieldset>
						<label>
							<input type="radio" name="sfwx_pw_position" value="bottomLeft" <?php checked( $sfwx_pw_position, 'bottomLeft' ); ?> >
							<span><?php esc_html_e( "Bottom Left", "appconsent-cmp-sfbx" ); ?></span>
						</label>
						<br>
						<label>
							<input type="radio" name="sfwx_pw_position" value="bottomRight" <?php checked( $sfwx_pw_position, 'bottomRight' ); ?> >
							<span><?php esc_html_e( "Bottom Right", "appconsent-cmp-sfbx" ); ?></span>
						</label>
					</fieldset>
				</td>
			</tr>
			<tr>
				<th scope="row">
					<?php esc_html_e( "Privacy Widget Color", "appconsent-cmp-sfbx" ); ?>	
				</th>
				<td>
					<fieldset>
						<label>
							<input type="radio" name="sfwx_pwcolor" value="clear" <?php checked( $sfwx_pwcolor, 'clear' ); ?> >
							<span><?php esc_html_e( "Light", "appconsent-cmp-sfbx" ); ?></span>
						</label>
						<br>
						<label>
							<input type="radio" name="sfwx_pwcolor" value="dark" <?php checked( $sfwx_pwcolor, 'dark' ); ?> >
							<span>
								<?php esc_html_e( "Dark", "appconsent-cmp-sfbx" ); ?>	
							</span>
						</label>
					</fieldset>
				</td>
			</tr>	
			<tr>
				<th scope="row">
					<?php esc_html_e( "Privacy Widget Label", "appconsent-cmp-sfbx" ); ?>
				</th>
				<td>
					<input name="sfbx_pw_label" type="text" id="sfbx_pw_label" class="regular-text" value="<?php if( isset($sfbxSettings['sfbx_pw_label']) && !empty($sfbxSettings['sfbx_pw_label']) ){ echo esc_attr($sfbxSettings['sfbx_pw_label']); }else{ esc_attr( __("Privacy Center","appconsent-cmp-sfbx") ); } ?>" />
				</td>
			</tr>
			<tr>
				<th scope="row">
					<?php esc_html_e( "CMP Template UX", "appconsent-cmp-sfbx" ); ?>
				</th>
				<td>
					<fieldset>
						<label>
							<input type="radio" name="sfwx_ux_temp" value="clear" <?php checked( $sfwx_ux_temp, 'clear' ); ?>>
							<span>
								<?php esc_html_e( "Clear", "appconsent-cmp-sfbx" ); ?>
							</span>
						</label>
						<br>
						<label>
							<input type="radio" name="sfwx_ux_temp" value="classic" <?php checked( $sfwx_ux_temp, 'classic' ); ?>>
							<span>
								<?php esc_html_e( "Classic", "appconsent-cmp-sfbx" ); ?>
							</span>
						</label>
					</fieldset>
				</td>
			</tr>		
		</tbody>
	</table>
	<h3><?php esc_html_e( "Advance Settings", "appconsent-cmp-sfbx" ); ?></h3>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<?php esc_html_e( "Debug Mode", "appconsent-cmp-sfbx" ); ?>
				</th>
				<td>
					<label for="sfbx_debug_mode">
						<input type="checkbox" name="sfbx_debug_mode" id="sfbx_debug_mode" value="true" <?php checked( $sfbx_debug_mode, 'true' ); ?> />
						<?php esc_html_e( "Activate debug mode ( verbose log in console )", "appconsent-cmp-sfbx" ); ?>
					</label>
				</td>
			</tr>
		</tbody>
	</table>
	<p class="submit">
		<?php wp_nonce_field( 'savesfbxact', 'sfbxnoance' ); ?>
		<input type="hidden" name="action" value="save_sfbx_data" />
		<input type="submit" name="submit" id="sfbx-submit" class="button button-primary" value="<?php echo esc_attr( __( "Save Changes", "appconsent-cmp-sfbx" ) ); ?>">
	</p>
</form>
</div>