<?php 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; 
?>

<div>
  <section class="freshmarketerAPIwrapper">
    <div class="headerContent">
      <img src="<?php echo plugin_dir_url( __FILE__ );?>../public/images/freshmarketer-logo.png" class="center-block" alt="Freshmarketer Logo" />
      <h2 class="freshmarketerVision"><?php _e( 'All-in-one CRO Suite','Freshmarketer'); ?></h2>
    </div>
    <div id="freshmarketer-tabs" class="installZAPI">
      <div class="ZcontentWrapper">
        <p class="ZAPIsubheading"><?php _e( 'To get your Freshmarketer API Key:','freshmarketer'); ?></p>
        <ol class="ZAPIinstallstep">
          <li><?php _e( 'Login to','Freshmarketer');?> <a href="https://app.freshmarketer.com/" target="_blank"><?php _e( 'Freshmarketer','freshmarketer'); ?></a></li>
          <li><?php _e( 'Click on “Setup” &#45;> “Integrations”','freshmarketer'); ?></li>
          <li><?php _e( 'Select the Wordpress tile','freshmarketer'); ?></li>
          <li><?php _e( 'Click on “Generate API key”. Copy the key and paste it below.','freshmarketer'); ?></li>
        </ol>
        <div class="inputZcontiner">
	<form action="" method="post" id="zg_approval_form">
	  <input type="hidden" name="auth_token" id="auth_token" value="">
	  <input type="hidden" name="project_id" id="project_id" value="">
	  <input type="hidden" name="org_id" id="org_id" value="">
	  <input type="hidden" name="user_id" id="user_id" value="">
	  <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('wporg_authtoken_verify')?>">
	  <input type="hidden" name="project_code" id="project_code" value="" >
          <input type="text" id="token" name="token" value="<?php echo esc_attr( get_option( 'freshmarketer_token' ) ) ?>" class="Zapiinputbox" placeholder="<?php _e( 'Enter the API key','freshmarketer'); ?>" />
          <button type="button" name="zg_button" id="connect_freshmarketer" class="ZAPIbtn"><?php _e( 'Connect with Freshmarketer','freshmarketer'); ?></button>
	</form>
        </div>
        <p id="zg_disp_msg" class="ZAPIsuccess" style="display:none"><?php _e( 'Your website integrated with Freshmarketer Successfully!','freshmarketer'); ?></p>
        <p id="zg_alert_msg" class="ZAPIwarning" style="display:none"><?php _e( 'Please enter the token in the text field','freshmarketer'); ?></p>
	<?php if ( ! get_option( 'freshmarketer_auth_token' )): ?>
        <p id="zg_info_msg" class="ZAPIsuccess" style="display:block"><?php _e( 'Freshmarketer is almost ready. You must first add your API Token to configure.','freshmarketer'); ?></p>
	<?php endif; ?>
      </div>
    </div>
    <div class="text-center">
      <a class="Zloginbtn" href="https://app.freshmarketer.com/" target="_blank"><?php _e( 'Login to Freshmarketer','freshmarketer'); ?></a>
      <p class="ZAPIhelp"><?php _e( 'Have more questions? Ask us','freshmarketer'); ?> <span>support@freshmarketer.com</span></p>
    </div>
  </section>
</div>
