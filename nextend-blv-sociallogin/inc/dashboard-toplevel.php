<?php
function blvnsl_register_setting() {
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_css_inclde' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_css_newurl' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_js_inclde' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_js_newurl' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_facebookbtn_login' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_googlebtn_login' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_twitterbtn_login' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_facebookbtn_WP_Members' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_googlebtn_WP_Members' );
	register_setting( 'blvnsl-toplevel-group' , 'blvnsl_twitterbtn_WP_Members' );
}
function blvnsl_toplevel_page() {
?>

<div class="wrap">
	<h2>Nextend BLV SocialLogin Settings <small>Version <?php echo BLVNSL_VERSION;?></small></h2>

<form method="post" action="options.php">
    <?php settings_fields( 'blvnsl-toplevel-group' ); ?>
    <?php do_settings_sections( 'blvnsl-toplevel-group' ); ?>

<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h3 id="blvnslCSS"><?php _e('Setting up CSS for button layout','nextend-blv-sociallogin'); ?></h3>
				<div class="inside">
				<p><?php _e('CSS setting concerning button display. For buttons displayed by the Nextend plugin, it is hidden by "display: hidden".','nextend-blv-sociallogin'); ?></p>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('Specifying CSS','nextend-blv-sociallogin'); ?></th>
				<?php if('default'===get_option('blvnsl_css_inclde')){?>
  				<td><input type="radio" name="blvnsl_css_inclde" value="default" checked='checked' ><?php _e('Use plug-in CSS','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_css_inclde" value="flag_invalid" ><?php _e('Do not use plugin CSS','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_css_inclde" value="designation" ><?php _e('Specify the URL','nextend-blv-sociallogin'); ?></td>
				<?php }elseif('flag_invalid'===get_option('blvnsl_css_inclde')){?>
  				<td><input type="radio" name="blvnsl_css_inclde" value="default" ><?php _e('Use plug-in CSS','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_css_inclde" value="flag_invalid" checked='checked' ><?php _e('Do not use plugin CSS','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_css_inclde" value="designation" ><?php _e('Specify the URL','nextend-blv-sociallogin'); ?></td>
				<?php }elseif('designation'===get_option('blvnsl_css_inclde')){?>
  				<td><input type="radio" name="blvnsl_css_inclde" value="default" ><?php _e('Use plug-in CSS','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_css_inclde" value="flag_invalid" ><?php _e('Do not use plugin CSS','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_css_inclde" value="designation" checked='checked' ><?php _e('Specify the URL','nextend-blv-sociallogin'); ?></td>
				<?php }else{?>
          <td><input type="radio" name="blvnsl_css_inclde" value="default" checked='checked' ><?php _e('Use plug-in CSS','nextend-blv-sociallogin'); ?></td>
          <td><input type="radio" name="blvnsl_css_inclde" value="flag_invalid" ><?php _e('Do not use plugin CSS','nextend-blv-sociallogin'); ?></td>
          <td><input type="radio" name="blvnsl_css_inclde" value="designation" ><?php _e('Specify the URL','nextend-blv-sociallogin'); ?></td>
				<?php };?>
				</tr>
				<tbody>
				</table>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('URL of CSS','nextend-blv-sociallogin'); ?></th>
          <td><input type="text" id="blvnsl_css_newurl" name="blvnsl_css_newurl" size="50" value="<?php echo get_option('blvnsl_css_newurl'); ?>" />
				</td>
				</tr>
				</tbody>
				</table>
				<hr>
				<?php submit_button(); ?>
					</div><!-- /inside -->
			</div><!-- /welcome-panel -->
	</div><!-- /"welcome-panel-content -->

<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h3 id="blvnslJAVASCRIPT"><?php _e('Setting up javascript','nextend-blv-sociallogin'); ?></h3>
				<div class="inside">
				<p>
					<?php _e('It is JavaScript used to respond when changing the specification of each social button.','nextend-blv-sociallogin'); ?><br>
					<?php _e('If you want to load your own javascript please enter the URL and save.','nextend-blv-sociallogin'); ?><br>
				</p>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('Specifying javascript','nextend-blv-sociallogin'); ?></th>
				<?php if('default'===get_option('blvnsl_js_inclde')){?>
  				<td><input type="radio" name="blvnsl_js_inclde" value="default" checked='checked' ><?php _e('Default','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_js_inclde" value="designation" ><?php _e('Specify the javascript','nextend-blv-sociallogin'); ?></td>
				<?php }elseif('designation'===get_option('blvnsl_js_inclde')){?>
  				<td><input type="radio" name="blvnsl_js_inclde" value="default" ><?php _e('Default','nextend-blv-sociallogin'); ?></td>
  				<td><input type="radio" name="blvnsl_js_inclde" value="designation" checked='checked' ><?php _e('Specify the javascript','nextend-blv-sociallogin'); ?></td>
				<?php }else{?>
          <td><input type="radio" name="blvnsl_js_inclde" value="default" checked='checked' ><?php _e('Default','nextend-blv-sociallogin'); ?></td>
          <td><input type="radio" name="blvnsl_js_inclde" value="designation" ><?php _e('Specify the javascript','nextend-blv-sociallogin'); ?></td>
				<?php };?>
				</tr>
				<tbody>
				</table>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('URL of javascript','nextend-blv-sociallogin'); ?></th>
          <td><input type="text" id="blvnsl_css_newurl" name="blvnsl_js_newurl" size="50" value="<?php echo get_option('blvnsl_js_newurl'); ?>" />
				</td>
				</tr>
				</tbody>
				</table>
				<hr>
				<?php submit_button(); ?>
					</div><!-- /inside -->
			</div><!-- /welcome-panel -->
	</div><!-- /"welcome-panel-content -->

		<div class="welcome-panel">
			<div class="welcome-panel-content">
				<h3 id="blvnslLoginPage"><?php _e('Login Page Setting','nextend-blv-sociallogin'); ?></h3>
				<div class="inside">
				<p><?php _e('This is the setting when outputting to the login screen.','nextend-blv-sociallogin'); ?></p>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('Facebook login button','nextend-blv-sociallogin'); ?></th>
				<?php if('flag_valid'===get_option('blvnsl_facebookbtn_login')){?>
				<td><input type="radio" name="blvnsl_facebookbtn_login" value="flag_valid" checked='checked' ><?php _e('Display','nextend-blv-sociallogin');?></td>
				<td><input type="radio" name="blvnsl_facebookbtn_login" value="flag_invalid" ><?php _e('No Display','nextend-blv-sociallogin');?></td>
				<?php }else{?>
				<td><input type="radio" name="blvnsl_facebookbtn_login" value="flag_valid" ><?php _e('Display','nextend-blv-sociallogin');?></td>
				<td><input type="radio" name="blvnsl_facebookbtn_login" value="flag_invalid" checked='checked' ><?php _e('No Display','nextend-blv-sociallogin');?></td>
				<?php };?>
				</tr>
				<tbody>
				</table>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('Google+ login button','nextend-blv-sociallogin'); ?></th>
				<?php if('flag_valid'===get_option('blvnsl_googlebtn_login')){?>
				<td><input type="radio" name="blvnsl_googlebtn_login" value="flag_valid" checked='checked' ><?php _e('Display','nextend-blv-sociallogin');?></td>
				<td><input type="radio" name="blvnsl_googlebtn_login" value="flag_invalid" ><?php _e('No Display','nextend-blv-sociallogin');?></td>
				<?php }else{?>
				<td><input type="radio" name="blvnsl_googlebtn_login" value="flag_valid" ><?php _e('Display','nextend-blv-sociallogin');?></td>
				<td><input type="radio" name="blvnsl_googlebtn_login" value="flag_invalid" checked='checked' ><?php _e('No Display','nextend-blv-sociallogin');?></td>
				<?php };?>
				</tr>
				<tbody>
				</table>
				<hr>
				<table class="form-table">
				<tbody>
				<tr>
				<th scope="row"><?php _e('Twitter login button','nextend-blv-sociallogin'); ?></th>
				<?php if('flag_valid'===get_option('blvnsl_twitterbtn_login')){?>
				<td><input type="radio" name="blvnsl_twitterbtn_login" value="flag_valid" checked='checked' ><?php _e('Display','nextend-blv-sociallogin');?></td>
				<td><input type="radio" name="blvnsl_twitterbtn_login" value="flag_invalid" ><?php _e('No Display','nextend-blv-sociallogin');?></td>
				<?php }else{?>
				<td><input type="radio" name="blvnsl_twitterbtn_login" value="flag_valid" ><?php _e('Display','nextend-blv-sociallogin');?></td>
				<td><input type="radio" name="blvnsl_twitterbtn_login" value="flag_invalid" checked='checked' ><?php _e('No Display','nextend-blv-sociallogin');?></td>
				<?php };?>
				</tr>
				<tbody>
				</table>
				<hr>
				<?php submit_button(); ?>
					</div><!-- /inside -->
			</div><!-- /welcome-panel -->
	</div><!-- /"welcome-panel-content -->

<?php if( true === blvnsl_WP_Members_judgment() ){?>
    <div class="welcome-panel">
      <div class="welcome-panel-content">
        <h3 id="blvnslWPMembers"><?php _e('WP Members Widget','nextend-blv-sociallogin'); ?></h3>
        <div class="inside">
        <p><?php _e('When you use WP Members, when you display sidebar login, we will automatically output the Facebook , Google , Twitter login button.','nextend-blv-sociallogin'); ?></p>
        <hr>
        <table class="form-table">
        <tbody>
        <tr>
        <th scope="row"><?php _e('Facebook login button','nextend-blv-sociallogin'); ?></th></th>
        <?php if('flag_valid'===get_option('blvnsl_facebookbtn_WP_Members')){?>
        <td><input type="radio" name="blvnsl_facebookbtn_WP_Members" value="flag_valid" checked='checked' ><?php _e('Display','nextend-blv-sociallogin');?></td>
        <td><input type="radio" name="blvnsl_facebookbtn_WP_Members" value="flag_invalid" ><?php _e('No Display','nextend-blv-sociallogin');?></td>
        <?php }else{?>
        <td><input type="radio" name="blvnsl_facebookbtn_WP_Members" value="flag_valid" ><?php _e('Display','nextend-blv-sociallogin');?></td>
        <td><input type="radio" name="blvnsl_facebookbtn_WP_Members" value="flag_invalid" checked='checked' ><?php _e('No Display','nextend-blv-sociallogin');?></td>
        <?php };?>
        </tr>
        <tbody>
        </table>
        <hr>
        <table class="form-table">
        <tbody>
        <tr>
        <th scope="row"><?php _e('Google+ login button','nextend-blv-sociallogin'); ?></th>
        <?php if('flag_valid'===get_option('blvnsl_googlebtn_WP_Members')){?>
        <td><input type="radio" name="blvnsl_googlebtn_WP_Members" value="flag_valid" checked='checked' ><?php _e('Display','nextend-blv-sociallogin');?></td>
        <td><input type="radio" name="blvnsl_googlebtn_WP_Members" value="flag_invalid" ><?php _e('No Display','nextend-blv-sociallogin');?></td>
        <?php }else{?>
        <td><input type="radio" name="blvnsl_googlebtn_WP_Members" value="flag_valid" ><?php _e('Display','nextend-blv-sociallogin');?></td>
        <td><input type="radio" name="blvnsl_googlebtn_WP_Members" value="flag_invalid" checked='checked' ><?php _e('No Display','nextend-blv-sociallogin');?></td>
        <?php };?>
        </tr>
        <tbody>
        </table>
        <hr>
        <table class="form-table">
        <tbody>
        <tr>
        <th scope="row"><?php _e('Twitter login button','nextend-blv-sociallogin'); ?></th>
        <?php if('flag_valid'===get_option('blvnsl_twitterbtn_WP_Members')){?>
        <td><input type="radio" name="blvnsl_twitterbtn_WP_Members" value="flag_valid" checked='checked' ><?php _e('Display','nextend-blv-sociallogin');?></td>
        <td><input type="radio" name="blvnsl_twitterbtn_WP_Members" value="flag_invalid" ><?php _e('No Display','nextend-blv-sociallogin');?></td>
        <?php }else{?>
        <td><input type="radio" name="blvnsl_twitterbtn_WP_Members" value="flag_valid" ><?php _e('Display','nextend-blv-sociallogin');?></td>
        <td><input type="radio" name="blvnsl_twitterbtn_WP_Members" value="flag_invalid" checked='checked' ><?php _e('No Display','nextend-blv-sociallogin');?></td>
        <?php };?>
        </tr>
        <tbody>
        </table>
        <hr>
        <?php submit_button(); ?>
          </div><!-- /inside -->
      </div><!-- /welcome-panel -->
  </div><!-- /"welcome-panel-content -->
<?php }?>

</form>
</div>
<?php }