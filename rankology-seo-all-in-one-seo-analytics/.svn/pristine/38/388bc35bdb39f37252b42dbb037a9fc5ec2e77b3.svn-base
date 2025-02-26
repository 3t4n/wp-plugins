<?php
// To prevent calling the plugin directly
if (!function_exists('add_action')) {
	echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
	exit;
}
?>
<div class="" style="display:none;">
	<div id="rankology-page-list" class="rankology-page-list rankology-card">
		<div class="rankology-card-title">
			<h2><?php esc_html_e('SEO settings', 'wp-rankology'); ?></h2>
		</div>

		<?php
		// $features = [
		// 	'titles' => [
		// 		'title' => __('Header Metas', 'wp-rankology'),
		// 		'desc' => __('Manage your post titles & metas for post types, taxonomies and archives.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-titles'),
		// 		'filter' => 'rankology_remove_feature_titles',
		// 	],
		// 	'social' => [
		// 		'title' => __('Social Platforms', 'wp-rankology'),
		// 		'desc' => __('Facebook, Twitter Card, Google Knowledge Graph and more.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-social'),
		// 		'filter' => 'rankology_remove_feature_social',
		// 	],
		// 	'xml-sitemap' => [
		// 		'title' => __('XML Sitemaps', 'wp-rankology'),
		// 		'desc' => __('Manage your XML - Image - Video - HTML Sitemap.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-xml-sitemap'),
		// 		'filter' => 'rankology_remove_feature_xml_sitemap',
		// 	],
		// 	'google-analytics' => [
		// 		'title' => __('Analytics', 'wp-rankology'),
		// 		'desc' => __('Track everything about website visitors with Google Analytics.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-google-analytics'),
		// 		'filter' => 'rankology_remove_feature_google_analytics',
		// 	],
		// 	'inspect-url' => [
		// 		'title' => __('Google Search Console', 'wp-rankology'),
		// 		'desc' => __('Get CTR, clicks, positions and impressions</strong>. Inspect URL for details about mobile compatibility, crawling, indexing and schemas.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_inspect_url'),
		// 		'filter' => 'rankology_remove_feature_inspect_url',
		// 		'toggle' => true,
		// 	],
		// 	'rich-snippets' => [
		// 		'title' => __('Structured Data Types', 'wp-rankology'),
		// 		'desc' => __('Add data types to your content i.e. articles, courses, recipes, videos, events, products and more.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rich_snippets'),
		// 		'filter' => 'rankology_remove_feature_schemas',
		// 	],
		// 	'woocommerce' => [
		// 		'title' => __('WooCommerce', 'wp-rankology'),
		// 		'desc' => __('Improve WooCommerce SEO.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_woocommerce'),
		// 		'filter' => 'rankology_remove_feature_woocommerce',
		// 	],
		// 	'breadcrumbs' => [
		// 		'title' => __('Breadcrumbs', 'wp-rankology'),
		// 		'desc' => __('Enable Breadcrumbs for your theme and improve your SEO.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_breadcrumbs'),
		// 		'filter' => 'rankology_remove_feature_breadcrumbs',
		// 	],
		// 	'page-speed' => [
		// 		'title' => __('Google Page Speed', 'wp-rankology'),
		// 		'desc' => __('Track your website performance to improve SEO with Google Page Speed.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_page_speed'),
		// 		'filter' => 'rankology_remove_feature_page_speed',
		// 		'toggle' => false,
		// 	],
		// 	'robots' => [
		// 		'title' => __('robots.txt', 'wp-rankology'),
		// 		'desc' => __('Edit your robots.txt file.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_robots'),
		// 		'filter' => 'rankology_remove_feature_robots',
		// 	],
		// 	'htaccess' => [
		// 		'title' => __('.htaccess', 'wp-rankology'),
		// 		'desc' => __('Edit your htaccess file.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_htaccess'),
		// 		'filter' => 'rankology_remove_feature_htaccess',
		// 		'toggle' => false,
		// 	],
		// 	'rss' => [
		// 		'title' => __('RSS', 'wp-rankology'),
		// 		'desc' => __('Configure default WordPress RSS.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_rss'),
		// 		'filter' => 'rankology_remove_feature_rss',
		// 		'toggle' => false,
		// 	],
		// 	'404' => [
		// 		'title' => __('Redirections', 'wp-rankology'),
		// 		'desc' => __('Monitor 404, create 301, 302 and 307 redirections.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_404'),
		// 		'filter' => 'rankology_remove_feature_redirects',
		// 	],
		// 	'bot' => [
		// 		'title' => __('Broken links', 'wp-rankology'),
		// 		'desc' => __('Scan your site to find SEO problems.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-bot-batch'),
		// 		'filter' => 'rankology_remove_feature_bot',
		// 	],
		// 	'ai' => [
		// 		'title' => __('AI Content', 'wp-rankology'),
		// 		'desc' => __('Use the power of artificial intelligence to increase your productivity.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_ai'),
		// 		'filter' => 'rankology_remove_feature_ai',
		// 	],
		// 	'news' => [
		// 		'title' => __('Google News Sitemap', 'wp-rankology'),
		// 		'desc' => __('Optimize your site for Google News.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_news'),
		// 		'filter' => 'rankology_remove_feature_news',
		// 	],
		// 	'tools' => [
		// 		'title' => __('Tools', 'wp-rankology'),
		// 		'desc' => __('Import/Export plugin settings from one site to other site.', 'wp-rankology'),
		// 		'btn_primary' => admin_url('admin.php?page=rankology-import-export'),
		// 		'filter' => 'rankology_remove_feature_tools',
		// 		'toggle' => false,
		// 	],
		// ];

		// $features = apply_filters('rankology_features_list_before_tools', $features);
		
		// $features['tools'] = [
		// 	'title' => __('Tools', 'wp-rankology'),
		// 	'desc' => __('Import/Export plugin settings from one site to other site.', 'wp-rankology'),
		// 	'btn_primary' => admin_url('admin.php?page=rankology-import-export'),
		// 	'filter' => 'rankology_remove_feature_tools',
		// 	'toggle' => false,
		// ];
		
		//$features = apply_filters('rankology_features_list_after_tools', $features);
		
		if (!empty($features)) { ?>
			<div class="rankology-card-content">

				<?php foreach ($features as $key => $value) {


					if (isset($value['filter'])) {
						$rankology_feature = apply_filters($value['filter'], true);

					}
					?>

					<div class="rankology-cart-list">

						<?php
						if (true === $rankology_feature) {
							$svg = isset($value['svg']) ? $value['svg'] : null;
							$title = isset($value['title']) ? $value['title'] : null;
							$desc = isset($value['desc']) ? $value['desc'] : null;
							$btn_primary = isset($value['btn_primary']) ? $value['btn_primary'] : '';
							$help = isset($value['help']) ? $value['help'] : null;
							$toggle = isset($value['toggle']) ? $value['toggle'] : true;

							if (true === $toggle) {
								$class = "";
								if ('1' == rankology_get_toggle_option($key)) {
									$rankology_get_toggle_option = '1';
									$class = ' is-rankology-feature-active';
								} else {
									$rankology_get_toggle_option = '0';
								}
							}
							?>

							<div class="rankology-card-item">
								<div class="setin-itm-hdercon">
									<h3><?php echo $title; ?></h3>

									<?php
									if ($title == 'WooCommerce' && is_plugin_active('woocommerce/woocommerce.php')) { ?>
										<?php if (true === $toggle) { ?>
											<div class="setin-itm-toglbtn">
												<span
													class="screen-reader-text"><?php printf(__('Toggle %s', 'wp-rankology'), $title); ?></span>
												<input type="checkbox" name="toggle-<?php echo $key; ?>" id="toggle-<?php echo $key; ?>"
													class="toggle" data-toggle="<?php echo $rankology_get_toggle_option; ?>">
												<label for="toggle-<?php echo $key; ?>"></label>
											</div>
										<?php }

									} elseif ($title == 'WooCommerce' && !is_plugin_active('woocommerce/woocommerce.php')) {

										echo '<h4 style="font-size:12px;margin-top:5px;">';
										esc_html_e('WooCommerce Not Activate', 'wp-rankology');
										echo '</h4>';
									} else { ?>
										<?php if (true === $toggle) { ?>
											<div class="setin-itm-toglbtn">
												<span
													class="screen-reader-text"><?php printf(__('Toggle %s', 'wp-rankology'), $title); ?></span>
												<input type="checkbox" name="toggle-<?php echo $key; ?>" id="toggle-<?php echo $key; ?>"
													class="toggle" data-toggle="<?php echo $rankology_get_toggle_option; ?>">
												<label for="toggle-<?php echo $key; ?>"></label>
											</div>
										<?php }

									}
									?>

								</div>
								<p><?php echo $desc; ?></p>
								<?php if ($title == 'WooCommerce' && is_plugin_active('woocommerce/woocommerce.php')) { ?>
									<div class="setin-itm-mngebtn">
										<a href="<?php echo $btn_primary; ?>" class="button button-secondary">
											<?php esc_html_e('Settings', 'wp-rankology'); ?>
										</a>
									</div>
									<?php
								} elseif ($title == 'WooCommerce' && !is_plugin_active('woocommerce/woocommerce.php')) {
									echo '<h4>';
									esc_html_e('WooCommerce Not Activate', 'wp-rankology');
									echo '</h4>';
								} else { ?>

									<div class="setin-itm-mngebtn">
										<a href="<?php echo $btn_primary; ?>" class="button button-secondary">
											<?php esc_html_e('Settings', 'wp-rankology'); ?>
										</a>
									</div>
								<?php } ?>

							</div>

							<?php
						}
						?>
					</div>
					<?php
				} ?>
			</div>
		<?php }
		?>
	</div>
</div>
<?php

// function plugin_settings_pages()
//     {
?>
<div class="custom-plugin-wrapper">
	<h1><?php esc_html_e('SEO Settings', 'wp-rankology'); ?></h1>
	<div class="rankology-main-page">

		<?php
		$features = array();
		$features = apply_filters('rankology_all_features_list_callback', $features);

		?>
		<!-- Main Tabs -->
		<div class="rankology-main-tabs tabs">
			<ul>
				<?php
				$activeTab = 1;
				foreach ($features as $key => $value) { ?>

					<li class="tab <?php if ($activeTab == 1) {
						echo ' active ';
					} ?> " data-tab="<?php echo $key ?>">
						<?php echo $value['title']; ?>
					</li>

					<?php $activeTab++;
				} ?>
			</ul>
		</div>
		<?php
				$activeTab = 1;
				foreach ($features as $key => $value) { ?>
		<!-- General Settings Tab Content -->
		<div id="<?php echo $key ?>" class="rankology-tabs-content content <?php if ($activeTab == 1) {
						echo ' active ';
					} ?>">
		<?php include_once dirname(dirname(__FILE__)) . '../admin-pages/Title_new.php'; ?>


		</div>
		<?php $activeTab++;
				} ?>

		<!-- Advanced Settings Tab Content -->
		<div id="advanced-settings" class="content">
			<h2>Advanced Settings</h2>
			<!-- Add similar sub-tab structure here if needed -->
		</div>

		<!-- Help Tab Content -->
		<div id="help" class="content">
			<h2>Help & Documentation</h2>
			<p>Here you can add your help content.</p>
		</div>
	</div>
</div>
<?php
// }


