<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://catchplugins.com/plugins/ajax-autosearch
 * @since      1.0.0
 *
 * @package    Ajax AutoSearch
 * @subpackage Ajax AutoSearch/admin/partials
 */

?>

<div class="wrap">
	<h1 class="wp-heading-inline"><?php esc_html_e( 'Ajax AutoSearch', 'ajax-autosearch' ); ?></h1>
	<div id="plugin-description">
		<p><?php esc_html_e( 'Ajax AutoSearch is a free WordPress Search Plugin that comes with a handful of essential customization options to enhance the search engine feature and make your site more user-friendly with adequate search results.', 'ajax-autosearch' ); ?></p>
	</div>
	<div class="catchp-content-wrapper">
		<div class="catchp_widget_settings">
			<form id="breadcrumb-main" method="post" action="options.php">
				<h2 class="nav-tab-wrapper">
					<a class="nav-tab nav-tab-active" id="dashboard-tab" href="#dashboard"><?php esc_html_e( 'Dashboard', 'ajax-autosearch' ); ?></a>
					<a class="nav-tab" id="features-tab" href="#features"><?php esc_html_e( 'Features', 'ajax-autosearch' ); ?></a>
					<a class="nav-tab" id="premium-extensions-tab" href="#premium-extensions"><?php esc_html_e( 'Compare Table', 'ajax-autosearch' ); ?></a>
				</h2>
				<div id="dashboard" class="wpcatchtab nosave active">
					<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . 'partials/dashboard-display.php'; ?>
					<div id="go-premium" class="content-wrapper col-2">

						<div class="header">
							<h2><?php esc_html_e( 'Go Premium!', 'ajax-autosearch' ); ?></h2>
						</div> <!-- .Header -->

						<div class="content">
							<button type="button" class="button dismiss">
								<span class="screen-reader-text"><?php esc_html_e( 'Dismiss this item.', 'ajax-autosearch' ); ?></span>
								<span class="dashicons dashicons-no-alt"></span>
							</button>
							<ul class="catchp-lists">
								<li><strong><?php esc_html_e( 'Custom Post Type Filter', 'ajax-autosearch' ); ?></strong></li>
								<li><strong><?php esc_html_e( 'Layout Options', 'ajax-autosearch' ); ?></strong></li>
								<li><strong><?php esc_html_e( 'Column Options ', 'ajax-autosearch' ); ?></strong>
								</li>
							</ul>
							<a href="https://catchplugins.com/plugins/ajax-autosearch-pro/" target="_blank"><?php esc_html_e( 'Find out why you should upgrade to Ajax AutoSearch Premium »', 'ajax-autosearch' ); ?></a></div> <!-- .Content -->
					</div> <!-- #go-premium -->
					<div id="pro-screenshot" class="content-wrapper col-2">
						<div class="header">
							<h2><?php esc_html_e( 'Pro Screenshot', 'ajax-autosearch' ); ?></h2>
						</div> <!-- .Header -->

						<div class="content">
							<ul class="catchp-lists">
								<li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/pro-feature-1.jpg' ); ?>"></li>
								<li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/pro-feature-2.jpg' ); ?>"></li>
							</ul>
						</div> <!-- .content -->
					</div> <!-- #pro-screenshot -->
				</div><!-- #dashboard -->
				<div id="features" class="wpcatchtab save">
					<div class="content-wrapper col-3">
						<div class="header">
							<h3><?php esc_html_e( 'Features', 'ajax-autosearch' ); ?></h3>
						</div><!-- .header -->
						<div class="content">
							<ul class="catchp-lists">
								<li>
									<strong><?php esc_html_e( 'Inbuilt Post Type Filter', 'ajax-autosearch' ); ?></strong>
									<p><?php esc_html_e( 'To display search results from posts, pages, and attachments.', 'ajax-autosearch' ); ?></p>
								</li>

								<li>
									<strong><?php esc_html_e( 'Category Filter', 'ajax-autosearch' ); ?></strong>
									<p><?php esc_html_e( 'To display search results from different categories.', 'ajax-autosearch' ); ?></p>
								</li>

								<li>
									<strong><?php esc_html_e( 'Tag Filter', 'ajax-autosearch' ); ?></strong>
									<p><?php esc_html_e( 'To display search results from different tags.', 'ajax-autosearch' ); ?></p>
								</li>

								<li>
									<strong><?php esc_html_e( 'Featured Image', 'ajax-autosearch' ); ?></strong>
									<p><?php esc_html_e( 'The Featured Image option allows you to display the featured images of the search results. You can disable the option if you do not want to display featured images of your search results.', 'ajax-autosearch' ); ?></p>
								</li>

								<li>
									<strong><?php esc_html_e( 'Post Limit Number', 'ajax-autosearch' ); ?></strong>
									<p><?php esc_html_e( 'The option, Post Limit Number allows you to choose the number of search results you want to showcase in a single page. You can display from 1 to 20 search results at max on a single page.', 'ajax-autosearch' ); ?></p>
								</li>

							</ul>
						</div><!-- .content -->
					</div><!-- content-wrapper -->
				</div> <!-- #features -->

				<div id="premium-extensions" class="wpcatchtab  save">
					<div class="about-text">
						<h2><?php esc_html_e( 'Get Ajax AutoSearch Pro -', 'ajax-autosearch' ); ?> <a href="https://catchplugins.com/plugins/ajax-autosearch-pro/" target="_blank"><?php esc_html_e( 'Get It Here!', 'ajax-autosearch' ); ?></a></h2>
							<p><?php esc_html_e( 'You are currently using the free version of Ajax AutoSearch.', 'ajax-autosearch' ); ?><br />
							<a href="https://catchplugins.com/plugins/" target="_blank"><?php esc_html_e( 'If you have purchased from catchplugins.com, then follow this link to the installation instructions (particularly step 1).', 'ajax-autosearch' ); ?></a></p>
					</div>

					<div class="content-wrapper">
						<div class="header">
							<h3><?php esc_html_e( 'Compare Table', 'ajax-autosearch' ); ?></h3>
						</div><!-- .header -->
						<div class="content">

							<table class="widefat fixed striped posts">
								<thead>
									<tr>
										<th id="title" class="manage-column column-title column-primary"><?php esc_html_e( 'Features', 'ajax-autosearch' ); ?></th>
										<th id="free" class="manage-column column-free"><?php esc_html_e( 'Free', 'ajax-autosearch' ); ?></th>
										<th id="pro" class="manage-column column-pro"><?php esc_html_e( 'Pro', 'ajax-autosearch' ); ?></th>
									</tr>
								</thead>

								<tbody id="the-list" class="ui-sortable">
									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Responsive Design', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Super Easy Setup', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Lightweight', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Inbuilt Post Types Filter', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Category Filterr', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Tag Filter', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Enable/Disable Featured Image', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Post Limit', 'ajax-autosearch' ); ?></strong>
										</td>
									<td class="column column-free"><div class="table-icons icon-green">&#10003;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Custom Post Types Filterr', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Layout Options', 'ajax-autosearch' ); ?></strong>
										</td>
									<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

									<tr class="iedit author-self level-0 type-post status-publish format-standard hentry">
										<td>
											<strong><?php esc_html_e( 'Column Options', 'ajax-autosearch' ); ?></strong>
										</td>
										<td class="column column-free"><div class="table-icons icon-red">&#215;</div></td>
										<td class="column column-pro"><div class="table-icons icon-green">&#10003;</div></td>
									</tr>

								</tbody>
							</table>
						</div><!-- .content -->
					</div><!-- .content-wrapper -->
				</div> <!-- #premium-extensions -->
			</form><!-- breadcrumb-main -->
		</div><!-- .catchp_widget_settings -->
		<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/sidebar.php'; ?>
	</div> <!-- .catchp-content-wrapper -->
	<?php require_once plugin_dir_path( dirname( __FILE__ ) ) . '/partials/footer.php'; ?>
</div><!-- .wrap -->
