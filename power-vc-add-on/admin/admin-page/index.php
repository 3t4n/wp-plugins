<?php

// Add menu
add_action( 'admin_menu', 'pa_addon_admin_page' );
function pa_addon_admin_page() {
	$power_vc_addon = get_plugin_data( POWER_ADDONS_DIR . 'power-vc-add-on.php' );
	$plugin_name	= $power_vc_addon['Name'];
	$parent_slug	= 'powervcaddon';
	$page_title		= $plugin_name.' page';
	$menu_title		= $plugin_name;
	$capability		= 'edit_theme_options';
	$menu_slug		= $plugin_name.'-page';
	$function		= 'pa_addon_welcome';
	$icon_url		= 'dashicons-schedule';
	$position		= '76';
	add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
}
// Redirect to welcome page
global $pagenow;
if ( is_admin() && 'plugins.php' == $pagenow && isset( $_GET['activated'] ) ) {
	$power_vc_addon = get_plugin_data( POWER_ADDONS_DIR . 'power-vc-add-on.php' );
	$plugin_name = $power_vc_addon->get( 'Name' );
	wp_redirect(admin_url("plugins.php?page=$plugin_name-page"));
}

// Content
function pa_addon_welcome(){
	$power_vc_addon = get_plugin_data( POWER_ADDONS_DIR .'power-vc-add-on.php');
	$plugin_version = $power_vc_addon['Version'];
	$plugin_name = $power_vc_addon['Name'];
	$change_log = POWER_ADDONS_DIR . 'admin/admin-page/Change_log.txt';
	$plugin_name_lowercase = strtolower($plugin_name).'_power_vc_addon_options';
	$protocol = is_ssl() ? 'https://' : 'http://';

	$keyses = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
		'target' => array(),
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
	'code' => array(
		'class' => array(),
	),
	'p' => array(
		'class' => array(),
	),
	);
	ob_start();
	?>
	<div id="webnus-dashboard" class="wrap about-wrap">
		<div class="welcome-head w-clearfix">
			<div class="w-row">
				<div class="w-col-sm-10">
					<h1> <?php echo esc_html__('Welcome to','power-addons') .' '.$plugin_name.'!'; ?> </h1>
					<div class="w-welcome">
						<p><?php echo  $plugin_name.' '.esc_html__('is now installed and ready to use! Get ready to build something beautiful.','power-addons') ?></p>
					</div>
				</div>
				<div class="w-col-sm-2">
					<img src="<?php echo POWER_ADDONS_URL . 'admin/images/logo.png'; ?>" />
					<span class="w-theme-version"><?php echo esc_html__('Version','power-addons'); ?> <?php echo '' . $plugin_version; ?></span>
				</div>
			</div>
		</div>
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-6">
					<div class="w-box doc">
						<div class="w-box-head">
							<?php esc_html_e('Documentation','power-addons'); ?>
						</div>
						<div class="w-box-content">
							<p>
							<?php esc_html_e('Our documentation is simple and functional wit full details and cover all essential aspects from beginning to the most advanced parts.' , 'power-addons'); ?>
							</p>
							<div class="w-button">
								<a href="<?php echo esc_attr( $protocol ); ?>>webnus.net/plugins/power-vc/documentation/" target="_blank"><?php esc_html_e('DOCUMENTATION','power-addons'); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="w-col-sm-6">
					<div class="w-box support">
						<div class="w-box-head">
							<?php esc_html_e('Support Forum','power-addons'); ?>
						</div>
						<div class="w-box-content">
							<p>
							<?php esc_html_e('Webnus is elite and trusted author with high percentage of satisfied user. If you have any issues please don\'t hesitate to contact us, we will reply as soon as possible.' , 'power-addons'); ?>
							</p>
							<div class="w-button">
								<a href="https://wordpress.org/support/plugin/power-addon" target="_blank"><?php esc_html_e('OPEN A TICKET','power-addons'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-row">
				<div class="w-col-sm-12">
					<div class="w-box change-log">
						<div class="w-box-head">
							<?php esc_html_e('Changelog (Updates)','power-addons'); ?>
						</div>
						<div class="w-box-content">
							<pre><?php echo file_get_contents($change_log); ?></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
$out = ob_get_contents();
ob_end_clean();
echo '' . $out;
}