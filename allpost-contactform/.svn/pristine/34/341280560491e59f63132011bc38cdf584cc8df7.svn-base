<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.Rainbow-Link.com
 * @since      1.0.0
 *
 * @package    allpost-contactform
 * @subpackage allpost-contactform
 */
if ( is_admin() ) {
include rl_apcf_dir_path.'allpost-contactform-language.php';
?>
<div class="apcf_admin_area">
<div class="apcf_admin_area_inner">
<p class="apcf_welcome">All Post Contact Form</p>    
<div class="rl-apcf-admin-settings">
<h1 class="admintop"><?php echo $rl_apcf_admin_H1; ?> </h1>
<p class="apcf_welcome_settings"><?php echo $rl_apcf_admin_sec1_name; ?></p>
<form action="options.php" method="post">  <?php  wp_nonce_field( 'checkadminref_apcf' );  settings_fields( $option_apcf_name );  do_settings_sections( $file ); ?>
<p class="submit">
<input name="Submit" type="submit" class="button-primary"
value="<?php esc_attr_e('Save Changes'); ?>" />
</p>
</form>
<h2 class="admintop"><?php echo $rl_apcf_admin_H2; ?></h2>
<h3 class="adminsub_required"><?php echo $rl_apcf_admin_ShortCode; ?></h3>
<p><input type="text" class="required" value=<?php echo $shortcode;?> readonly></input></p>
<h3 class="adminsub_required"><?php echo $rl_apcf_admin_UsethisPlugin_Desc; ?></h3>
<p><input type="text" class="required" value='&lt;form action="<?php echo $rl_apcf_admin_UsethisPlugin; ?>" method="POST" name="rl_apcf"  onsubmit="return checkForm()" enctype="multipart/form-data"&gt;' readonly></input></p><span class="apcf_eg"><?php echo $rl_apcf_admin_UsethisPlugin_js; ?></span>
</div>
</div>
</div>
<?php }

