<?php

/**
 * Class WP AJAX Loading
 * The file that defines the core plugin class
 *
 * @author Mahesh Thorat
 * @link https://maheshthorat.web.app
 * @version 0.2
 * @package WP_Ajax_loading
 */
class WP_ajax_loading_Admin
{
	private $plugin_name;
	private $version;

	/**
	 * Return the tabs menu
	 */
	public function return_tabs_menu($tab)
	{
		$link = admin_url('options-general.php');
		$list = array(
			array('tab1', 'wp-ajax-loading-admin', 'fa-cogs', __('<span class="dashicons dashicons-admin-tools"></span> Settings', 'wp-ajax-loading')),
			array('tab2', 'wp-ajax-loading-admin&con=about', 'fa-info-circle', __('<span class="dashicons dashicons-editor-help"></span> About', 'wp-ajax-loading')),
			array('tab3', 'wp-ajax-loading-admin&con=donate', 'fa-info-circle', __('<span class="dashicons dashicons-money-alt"></span> Donate', 'wp-ajax-loading'))
		);

		$menu = null;
		foreach ($list as $item => $value) {
			$menu .= '<div class="tab-label ' . $value[0] . ' ' . (($tab == $value[0]) ? 'active' : '') . '"><a href="' . $link . '?page=' . $value[1] . '"><span>' . $value[3] . '</span></a></div>';
		}

		echo wp_kses_post($menu);
	}

	/**
	 * Register the stylesheet file(s) for the dashboard area
	 */
	public function enqueue_backend_standalone()
	{
		wp_register_style($this->plugin_name . '-standalone', plugin_dir_url(__FILE__) . 'assets/styles/standalone.css', array(), $this->version, 'all');
		wp_enqueue_style($this->plugin_name . '-standalone');
	}

	/**
	 * Update `Options` on form submit
	 */
	public function return_update_options()
	{
		if ((isset($_POST['wp-ajax-loading-update-option'])) && ($_POST['wp-ajax-loading-update-option'] == 'true')
			&& check_admin_referer('pwm-referer-form', 'pwm-referer-option')
		) {
			$opts = array('enable_plugin' => 'off');

			if (isset($_POST['_wp_ajax_loading']['enable_plugin'])) {
				$opts['enable_plugin'] = 'on';
			}

			$data = update_option('_wp_ajax_loading', $opts);
			header('location:' . admin_url('options-general.php?page=wp-ajax-loading-admin') . '&status=updated');
			die();
		}
	}

	/**
	 * Return the `Options` page
	 */
	public function return_options_page()
	{
		$opts = get_option('_wp_ajax_loading');

		if ((isset($_GET['status'])) && ($_GET['status'] == 'updated')) {
			$notice = array('success', __('Your settings have been successfully updated.', 'wp-ajax-loading'));
		}
		if (@$_GET['con'] == 'about') {
			$this->return_about_page();
		} else if (@$_GET['con'] == 'donate') {
			$this->return_donate_page();
		} else {
?>
			<div class="wrap">
				<section class="wpbnd-wrapper">
					<div class="wpbnd-container">
						<div class="wpbnd-tabs">
							<?php echo wp_kses_post($this->return_plugin_header()); ?>
							<main class="tabs-main">
								<?php echo wp_kses_post($this->return_tabs_menu('tab1')); ?>
								<section class="tab-section">
									<?php if (isset($notice)) { ?>
										<div class="wpbnd-notice <?php echo esc_attr($notice[0]); ?>">
											<span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
											<span><?php echo esc_attr($notice[1], 'wp-ajax-loading'); ?></span>
										</div>
									<?php } elseif ((!isset($opts['enable_plugin']) || ($opts['enable_plugin']) == 'off')) { ?>
										<div class="wpbnd-notice warning">
											<span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
											<span><?php echo _e('You have not set up your AJAX Loading options ! In order to do so, please use the below form.', 'wp-ajax-loading'); ?></span>
										</div>
									<?php } else { ?>
										<div class="wpbnd-notice info">
											<span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
											<span><?php echo _e('Your plugin is properly configured! You can change your AJAX Loading options using the below settings.', 'wp-ajax-loading'); ?></span>
										</div>
									<?php } ?>
									<form method="POST">
										<input type="hidden" name="wp-ajax-loading-update-option" value="true" />
										<?php wp_nonce_field('pwm-referer-form', 'pwm-referer-option'); ?>
										<div class="wpbnd-form">
											<div class="field">
												<?php $fieldID = uniqid(); ?>
												<label class="label"><span class="dashicons dashicons-clipboard"></span> <?php echo _e('Enable Plugin', 'wp-ajax-loading'); ?></label>
												<label class="switchContainer">
													<input id="<?php echo esc_attr($fieldID); ?>" type="checkbox" name="_wp_ajax_loading[enable_plugin]" class="onoffswitch-checkbox" <?php if ((isset($opts['enable_plugin'])) && ($opts['enable_plugin'] == 'on')) {
																																																										echo 'checked="checked"';
																																																									} ?> />
													<span for="<?php echo esc_attr($fieldID); ?>" class="sliderContainer round"></span>
												</label>
												<div class="small">
													<small><?php echo _e('You just need to enable this option and you ready to go to see magic in front-end.', 'wp-ajax-loading'); ?></small>
												</div>
											</div>

											<div class="form-footer">
												<input type="submit" class="button button-primary button-theme" value="<?php _e('Update Settings', 'wp-ajax-loading'); ?>">
											</div>
										</div>
									</form>
								</section>
							</main>
						</div>
					</div>
				</section>
			</div>
		<?php
		}
	}

	/**
	 * Return the plugin header
	 */
	public function return_plugin_header()
	{
		$html = '<div class="header-plugin"><span class="header-icon"><span class="dashicons dashicons-admin-settings"></span></span> <span class="header-text">' . __(WPAJXL_PLUGIN_FULLNAME, 'wp-ajax-loading') . '</span></div>';
		return $html;
	}

	/**
	 * Return the `About` page
	 */
	public function return_about_page()
	{
		?>
		<div class="wrap">
			<section class="wpbnd-wrapper">
				<div class="wpbnd-container">
					<div class="wpbnd-tabs">
						<?php echo wp_kses_post($this->return_plugin_header()); ?>
						<main class="tabs-main about">
							<?php echo wp_kses_post($this->return_tabs_menu('tab2')); ?>
							<section class="tab-section">
								<img alt="Mahesh Thorat" src="https://secure.gravatar.com/avatar/13ac2a68e7fba0cc0751857eaac3e0bf?s=100&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/13ac2a68e7fba0cc0751857eaac3e0bf?s=200&amp;d=mm&amp;r=g 2x" class="avatar avatar-100 photo profile-image" height="100" width="100">

								<div class="profile-by">
									<p>© <?php echo date('Y'); ?> - created by <a class="link" href="https://maheshthorat.web.app/" target="_blank"><b>Mahesh Mohan Thorat</b></a></p>
								</div>
							</section>
							<section class="helpful-links">
								<b>helpful links</b>
								<ul>
									<li><a href="https://pagespeed.web.dev/" target="_blank">PageSpeed</a></li>
									<li><a href="https://gtmetrix.com/" target="_blank">GTmetrix</a></li>
									<li><a href="https://www.webpagetest.org" target="_blank">Web Page Test</a></li>
									<li><a href="https://http3check.net/" target="_blank">http3check</a></li>
									<li><a href="https://sitecheck.sucuri.net/" target="_blank">Sucuri - security check</a></li>
								</ul>
							</section>
						</main>
					</div>
				</div>
			</section>
		</div>
	<?php
	}

	public function return_donate_page()
	{
	?>
		<div class="wrap">
			<section class="wpbnd-wrapper">
				<div class="wpbnd-container">
					<div class="wpbnd-tabs">
						<?php echo wp_kses_post($this->return_plugin_header()); ?>
						<main class="tabs-main about">
							<?php echo wp_kses_post($this->return_tabs_menu('tab3')); ?>
							<section class="">
								<table class="wp-list-table widefat fixed striped table-view-list">
									<tbody id="the-list">
										<tr>
											<td><a href="https://buymeacoffee.com/maheshmthorat" target="_blank"><img width="160" src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))); ?>admin/assets/img/razorpay.svg" /></a></td>
										</tr>
										<tr>
											<td>
												<h3>Scan below code</h3>
												<img width="350" src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))); ?>admin/assets/img/qr.svg" />
												<br>
												<img width="350" src="<?php echo esc_url(plugin_dir_url(dirname(__FILE__))); ?>admin/assets/img/upi.png" />
												<br>
												<b>Mr Mahesh Mohan Thorat</b>
												<h3>UPI - maheshmthorat@oksbi</h3>
											</td>
										</tr>
									</tbody>
								</table>
							</section>
							<section class="helpful-links">
								<b>helpful links</b>
								<ul>
									<li><a href="https://pagespeed.web.dev/" target="_blank">PageSpeed</a></li>
									<li><a href="https://gtmetrix.com/" target="_blank">GTmetrix</a></li>
									<li><a href="https://www.webpagetest.org" target="_blank">Web Page Test</a></li>
									<li><a href="https://http3check.net/" target="_blank">http3check</a></li>
									<li><a href="https://sitecheck.sucuri.net/" target="_blank">Sucuri - security check</a></li>
								</ul>
							</section>
						</main>
					</div>
				</div>
			</section>
		</div>
	<?php	}

	/**
	 * Return Backend Menu
	 */
	public function return_admin_menu()
	{
		add_options_page(WPAJXL_PLUGIN_FULLNAME, WPAJXL_PLUGIN_FULLNAME, 'manage_options', 'wp-ajax-loading-admin', array($this, 'return_options_page'));
	}

	public function call_action_enable_plugin()
	{
		wp_enqueue_script(array('jquery'));
		wp_register_script($this->plugin_name . '-WPajaxLoad', plugin_dir_url(__FILE__) . '../includes/loadingJs/WPajaxLoad.js?ver=0.1', array(), $this->version, 'all');
		wp_enqueue_script($this->plugin_name . '-WPajaxLoad');
	?>
		<style type="text/css">
			body {
				position: relative !important;
			}

			#document-script,
			#document-title {
				display: none !important;
			}

			.wp-ajax-loading {
				position: relative;
			}

			.wp-ajax-loader-panel {
				display: none;
				background: #FFFFFF;
				position: fixed;
				z-index: 9999999;
				top: 0;
				left: 0;
				width: 100%;
				height: 100vh;
			}

			.wp-ajax-loader {
				display: none;
				position: fixed;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
				z-index: 9999;
				width: 80px;
				height: 80px;
				margin: -76px 0 0 -76px;
				border: 12px solid #f3f3f3;
				border-radius: 50%;
				border-top: 12px solid #4284f4;
				-webkit-animation: spin 2s linear infinite;
				animation: spin 2s linear infinite;
			}

			.wp-ajax-loading .wp-ajax-loader,
			.wp-ajax-loading .wp-ajax-loader-panel {
				display: flex;
			}

			@-webkit-keyframes spin {
				0% {
					-webkit-transform: rotate(0deg);
				}

				100% {
					-webkit-transform: rotate(360deg);
				}
			}

			@keyframes spin {
				0% {
					transform: rotate(0deg);
				}

				100% {
					transform: rotate(360deg);
				}
			}
		</style>
		<script>
			var reload_helper = {
				"rootUrl": "<?php echo site_url(); ?>",
				"ids": "",
				"container_id": "body",
				"mcdc": "header",
				"searchID": "searchform",
				"transition": "",
				"scrollTop": "0",
				"loader": "swing",
				"bp_status": ""
			};
		</script>
		<div class="wp-ajax-loader-panel">
			<div class="wp-ajax-loader"></div>
		</div>
<?php
	}

	public function wpajxl_settings_link($links)
	{
		$url = get_admin_url() . 'options-general.php?page=wp-ajax-loading-admin';
		$settings_link = "<a href='$url'>" . __('Settings') . '</a>';
		array_unshift(
			$links,
			$settings_link
		);
		return $links;
	}
}

?>