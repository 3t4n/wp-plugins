<?php
/**
 * Login
 *
 * @package Awetube/Modules/Templates
 * @version 1.0.0
 */
defined( 'ABSPATH' ) || exit;

get_header();
do_action( 'awetube_before_main_content' );

//register get link
$page = get_page_by_title('register');
?>

	<?php if ( ! is_user_logged_in() ) { ?>
	<div class="wp-user-form-custom clearfix">
		<div class="outside-container">
			<div class="login-images">
				<div class="page-title-log">
					<h1><?php echo esc_html__( 'Sign In to explore ', 'awetube' ); ?><br> <?php echo esc_html__( 'videos', 'awetube' ); ?></h1>
				</div>
			</div>
			<div class="awetube_user_form login">
				<form id="awetube_login_form" class="awetube_form" action="" method="post">
					<fieldset class="skwp-form-inner">
						<div class="login-button">
							<div class="inner-login">
								<a href="<?php echo esc_url( get_permalink( $page->ID ) ); ?>" class="register-btn log-btn"><?php echo esc_html_e('Sign Up', 'awetube'); ?></a>
							</div>
						</div>
						<?php awetube_show_error_messages(); ?>
						<p>
							<input name="awetube_user_login" id="awetube_user_login" class="required swkp-usr-form" type="text" placeholder="<?php esc_html_e( 'Username', 'awetube' ); ?>"/>
						</p>
						<p>
							<input name="awetube_user_pass" id="awetube_user_pass" class="required swkp-usr-form" type="password"  placeholder="<?php esc_html_e( 'Password', 'awetube' ); ?>"/>
						</p>
						<div class="login meta skwp-clearfix" style="display: flex;">
							<p class="forgetmenot float-left" style=""><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> <?php esc_html_e( 'Remember', 'awetube' ); ?></label></p>
							<p class="forgetmenot float-right" style="margin-left: auto; margin-right: 0;"><a href="<?php echo wp_lostpassword_url(); ?>"><?php echo esc_html_e('Forgot Password', 'awetube'); ?></a></p>
						</div>
						<p>
							<input id="skwp-login-btn" type="hidden" name="awetube_login_nonce" value="<?php echo wp_create_nonce( 'awetube-login-nonce' ); ?>"/>
							<input id="awetube_login_submit" type="submit" value="<?php echo esc_html__( 'Login', 'awetube' ); ?>"/>
						</p>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
	<?php } else { ?>
	<div class="already-login-page">
		<div class="image-login-already"></div>
		<h1><?php echo esc_html__('Already signed in', 'awetube'); ?></h1>
	</div>
	<?php } ?>

<?php
do_action( 'awetube_after_main_content' );
get_footer();
