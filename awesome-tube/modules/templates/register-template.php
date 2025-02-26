<?php
/**
 * Register Form
 *
 * @package Awetube/Modules/Templates
 * @version 1.0.0
 */
defined( 'ABSPATH' ) || exit;

get_header();

?>

	<div class="wp-user-form-custom register clearfix">
		<div class="outside-container">
			<div class="login-images">
				<div class="page-title-log">
					<h1><?php echo esc_html_e( 'Sign Up to explore','awetube' ) ?><br> <?php echo esc_html_e( 'videos','awetube' ) ?></h1>
				</div>
			</div>
			<form id="awetube_registration_form" class="awetube_user_form awetube_form" action="" method="POST">
				<fieldset class="skwp-form-inner">
					<div class="login-button">
						<div class="inner-login">
							<a href="<?php echo esc_url( home_url( 'awetube-login' ) ); ?>" class="login-btn log-btn"><?php esc_html_e( 'Login', 'awetube' ); ?></a>
						</div>
					</div>
					<?php awetube_show_error_messages(); ?>
					<p>
						<input name="awetube_user_login" id="awetube_user_login" class="required skwp-form-control" type="text" placeholder="<?php esc_attr_e( 'Username', 'awetube' ); ?>" />
					</p>
					<p>
						<input name="awetube_user_email" id="awetube_user_email" class="required skwp-form-control" type="email" placeholder="<?php esc_attr_e( 'Email', 'awetube' ); ?>" />
					</p>
					<p>
						<input name="awetube_user_first" id="awetube_user_first" class="skwp-form-control" type="text" placeholder="<?php esc_attr_e( 'First Name', 'awetube' ); ?>" />
					</p>
					<p>
						<input name="awetube_user_last" id="awetube_user_last" class="skwp-form-control" type="text" placeholder="<?php esc_attr_e( 'Last Name', 'awetube' ); ?>" />
					</p>
					<p>
						<input name="awetube_user_pass" id="password" class="required skwp-form-control" type="password" placeholder="<?php esc_attr_e( 'Password', 'awetube' ); ?>" />
					</p>
					<p>
						<input name="awetube_user_pass_confirm" id="password_again" class="required skwp-form-control" type="password" placeholder="<?php esc_attr_e( 'Password Again', 'awetube' ); ?>" />
					</p>
					<p>
						<input type="hidden" name="awetube_register_nonce" value="<?php echo wp_create_nonce('awetube-register-nonce'); ?>"/>
						<input id="awetube_login_submit" type="submit" value="<?php esc_html_e( 'Register Your Account', 'awetube' ); ?>"/>
						<span><?php esc_html_e('By signing up you agree to our terms and conditions','awetube') ?></span>
					</p>
				</fieldset>
			</form>
			</div>
	</div>

<?php
get_footer();
