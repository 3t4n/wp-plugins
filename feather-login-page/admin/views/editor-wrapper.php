<?php 
if ( ! defined( 'ABSPATH' ) ) exit;

?>

<div class="plbp_login-editor" >
	<a href="<?php echo admin_url(); ?>"><div class="feather-login-close"> <i class="fa fa-times"></i></div></a>
	<div style="text-align: center">
		<img src="<?php echo FPOLPB_PLUGIN_URL . '/admin/images/icons/feather-login.png' ?>" />
		<!-- <h3 class="plbp_login-editor_welcome_heading" style="text-align: center;"> <?php echo __('Welcome To', 'feather-login-page'); ?> <br> Feather <?php echo __('Login Page Designer', 'feather-login-page'); ?></h3> -->
	</div>
	<?php include_once(FPOLPB_PLUGIN_PATH.'/admin/views/editor.php'); ?>
</div>


<div class="featherControlPanleButtonContainer">
		
	<div class="featherHideOptions"> <i class="fa fa-angle-left" aria-hidden="true"></i></div>

	<div class="featherShowOptions" style="display: none"> <i class="fa fa-angle-right"></i></div>

</div>


<div class="plbp_login-preview">
	<?php include_once(FPOLPB_PLUGIN_PATH.'/admin/views/wp-login-live-preview.php'); ?>
</div>
