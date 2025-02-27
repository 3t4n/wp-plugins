<?php
/**
 * Admin customizations.
 *
 */

defined( 'ABSPATH' ) || exit;

/**
 * Admin class.
 */
class REVIVESO_Admin extends REVIVESO_BaseController {
	use REVIVESO_Hooker;

	/**
	 * Messages to show in the admin.
	 *
	 * @var string
	 * @since 2.0.0
	 */
	public $messages = array();

	/**
	 * Register functions.
	 */
	public function register() {
		$this->action( "plugin_action_links_{$this->plugin}", 'settings_link', 10, 1 );
		$this->action( 'admin_menu', 'menu_items', 99 );
		$this->action( 'admin_footer', 'do_footer', 99 );
		$this->action( 'plugin_row_meta', 'meta_links', 10, 2 );
		$this->action( 'reviveso_extra_info', 'admin_footer', 999 );
		$this->filter( 'action_scheduler_pastdue_actions_check_pre', 'as_exclude_pastdue_actions' );
		// Remove admin notices from Revive.so pages
		add_action( 'admin_notices', array( $this, 'remove_admin_notices' ), 9 );
		// Add critical inline styles
		add_action( 'admin_head', array( $this, 'add_inline_style' ) );
		// Add a class to the body to know we are in a Revive.so admin page
		add_filter( 'admin_body_class', array( $this, 'admin_body_class' ) );
		// Add a loading icon to the Revive.so admin page
		add_action( 'in_admin_header', array( $this, 'add_header_elements' ) );
		// Starting with version 2.0.0 of the plugin, we are using a completely different UI, so the extensions need to be updated.
		add_action( 'admin_init', array( $this, 'extensions_requirements' ) );
		// Filter to enable search on the Scheduled Tasks page.
		add_filter( 'reviveso_page_has_search', array( $this, 'search_on_scheduled_tasks' ), 15, 1 );
		// Filter to enable top navigation on Dashboard page
		add_filter( 'reviveso_top_nav', array( $this, 'dashboard_top_navigation' ), 15, 1 );
	}

	/**
	 * Register settings link.
	 */
	public function settings_link( $links ) {
		$settings = array(
			'<a href="' . admin_url( 'admin.php?page=reviveso' ) . '">' . __( 'Settings', 'revive-so' ) . '</a>',
		);

		return array_merge( $settings, $links );
	}

	/**
	 * Add roadmap item to submenu
	 */
	public function menu_items() {
		// Don't show the Scheduled Tasks menu item if it's not explicitly enabled.
		/**
		 * Filter to enable/disable the Scheduled Tasks menu item.
		 *
		 * @hook reviveso_display_scheduled_tasks
		 *
		 * @param  bool  $display_scheduled_tasks  True to display the Scheduled Tasks menu item, false to hide it.
		 */
		if ( ! apply_filters( 'reviveso_display_scheduled_tasks', false ) ) {
			return;
		}
		$manage_options_cap = $this->do_filter( 'manage_options_capability', 'manage_options' );

		// Add custom Action Schedular page.
		if ( class_exists( 'ActionScheduler_AdminView' ) ) {
			$as          = \ActionScheduler_AdminView::instance();
			$hook_suffix = add_submenu_page(
				'reviveso',
				__( 'Scheduled Tasks', 'revive-so' ),
				__( 'Scheduled Tasks', 'revive-so' ),
				$manage_options_cap,
				'reviveso-scheduled-tasks',
				array( $as, 'render_admin_ui' )
			);
			add_action( 'load-' . $hook_suffix, array( $as, 'process_admin_ui' ) );
		}

		// Filter to redefine that Reviveso > Scheduled Tasks menu item.
		if ( $this->do_filter( 'tasks_admin_hide_as_menu', true ) ) {
			remove_submenu_page( 'tools.php', 'revive-so' );
		}
	}

	/**
	 * Open External links in new tab
	 */
	public function do_footer() { ?>
		<script type="text/javascript">
			jQuery(document).ready(function ($) {
				let revsTaskItem = $("ul#adminmenu .toplevel_page_reviveso ul.wp-submenu li a[href*='reviveso-scheduled-tasks']");
				revsTaskItem.attr({
									  target: '_blank',
									  href  : revsTaskItem.attr('href') + '&status=pending&s=reviveso'
								  });
			});
		</script>
		<?php
	}

	/**
	 * Register meta links.
	 */
	public function meta_links( $links, $file ) {
		if ( $this->plugin === $file ) { // only for this plugin
			$links[] = '<a href="https://revive.so/knowledge-base/?utm_source=plugin_page&utm_medium=plugin" target="_blank">' . __( 'Documentation', 'revive-so' ) . '</a>';
		}

		return $links;
	}

	/**
	 * Custom Admin footer text
	 */
	public function admin_footer( $content ) {
		$content = __( 'Thank you for using', 'revive-so' ) . ' <a href="https://revive.so/" target="_blank" style="font-weight: 500;" class="text-indigo-600 hover:text-indigo-500">Reviveso</a>';
		$content .= ' &bull; <a href="https://wordpress.org/support/plugin/revive-so/reviews/?filter=5#new-post" target="_blank" style="font-weight: 500;" class="text-indigo-600 hover:text-indigo-500">' . __( 'Rate it', 'revive-so' ) . '</a> (<span style="color:#ffa000;">★★★★★</span>) on WordPress.org, if you like this plugin.</span>';
		$content = '<span class="reviveso-footer text-sm font-medium">' . $content . '</span>';

		echo $content;
	}

	/**
	 * Action Scheduler: exclude our actions from the past-due checker.
	 * Since this is a *_pre hook, it replaces the original checker.
	 *
	 * We first do the same check as what ActionScheduler_AdminView->check_pastdue_actions() does,
	 * but then we also count how many of those past-due actions are ours.
	 *
	 * @param  null  $null  Null value.
	 */
	public function as_exclude_pastdue_actions( $null ) {
		$query_args = array(
			'date'     => as_get_datetime_object( time() - DAY_IN_SECONDS ),
			'status'   => \ActionScheduler_Store::STATUS_PENDING,
			'per_page' => 1,
		);

		$store               = \ActionScheduler_Store::instance();
		$num_pastdue_actions = (int) $store->query_actions( $query_args, 'count' );

		if ( 0 !== $num_pastdue_actions ) {
			$query_args['group']      = 'reviveso';
			$num_pastdue_revs_actions = (int) $store->query_actions( $query_args, 'count' );

			$num_pastdue_actions -= $num_pastdue_revs_actions;
		}

		$threshold_seconds = (int) apply_filters( 'action_scheduler_pastdue_actions_seconds', DAY_IN_SECONDS );
		$threshhold_min    = (int) apply_filters( 'action_scheduler_pastdue_actions_min', 1 );

		$check = ( $num_pastdue_actions >= $threshhold_min );

		return (bool) apply_filters( 'action_scheduler_pastdue_actions_check', $check, $num_pastdue_actions, $threshold_seconds, $threshhold_min );
	}

	/**
	 * Remove all notices that are in Revive.so's pages
	 *
	 * @return void
	 * @since 1.0.4
	 */
	public function remove_admin_notices() {
		$screen = get_current_screen();

		if ( 'reviveso' === $screen->parent_base ) {
			remove_all_actions( 'admin_notices' );
		}
	}

	/**
	 * Add critical inline styles
	 *
	 * @return void
	 * @since 1.0.7
	 */
	public function add_inline_style() {
		?>
		<style>

			body.revive-so-admin-page #wpwrap,
			body.revive-so-admin-page #wpcontent {
				width: 100%;
				margin: 0 auto;
				z-index: 9999;
				background-color:transparent;
				position: relative;
				padding: 0;
			}

			body.revive-so-admin-page #wpwrap #wpadminbar {
				display:none;
			}

			body.revive-so-admin-page #adminmenumain,
			body.revive-so-admin-page:not( .revive-so-admin-page-loaded ) #wpadminbar {
				display: none;
			}

			body.revive-so-admin-page:not( .revive-so-admin-page-loaded ) {
				overflow: hidden;
			}

			.reviveso-loading-icon {
				display: block;
				position: fixed;
				z-index: 999999;
				padding: 20px;
				border-radius: 5px;
				width: 100vw;
				height: 100vh;
				left: 0;
				right: 0;
				margin: 0 auto;
				top: 0;
			}
		</style>
		<?php
	}

	/**
	 * Add a loading icon to the Revive.so admin page
	 *
	 * @return void
	 * @since 1.0.7
	 */
	public function add_header_elements() {
		// If we are not in one of the pages where the icon should be displayed, return.
		if ( ! $this->is_reviveso_admin_page() ) {
			return;
		}
		$tailwind_ui = REVIVESO_Tailwind_UI::get_instance();
		$tailwind_ui->tailwind_main_page();
	}

	/**
	 * Add a class to the body to know we are in a Revive.so admin page
	 *
	 * @return string
	 * @since 1.0.7
	 */
	public function admin_body_class( $classes ) {
		if ( $this->is_reviveso_admin_page() ) {
			$classes .= ' revive-so-admin-page';
		}

		return $classes;
	}

	/**
	 * Check if we are in a Revive.so admin page
	 *
	 * @return bool
	 * @since 1.0.7
	 */
	public static function is_reviveso_admin_page() {

		if ( ! function_exists( 'get_current_screen' ) ) {
			return false;
		}
		$screen = get_current_screen();
		global $submenu;

		if( ! isset( $submenu['reviveso'] ) ){
			return false;
		}
		
		$revive_sub   = $submenu['reviveso'];
		$revive_menus = array(
			'toplevel_page_reviveso',
		);
		// Cycle through the submenus and create the menu link for each one.
		foreach ( $revive_sub as $sub ) {
			list( $name, $capability, $uri, $title ) = $sub;
			$revive_menus[] = 'revive-so_page_' . $uri;
		}
		/**
		 * Filter to define the admin pages where the loading icon should be displayed.
		 *
		 * @hook  reviveso_admin_pages
		 *
		 * @param  array  $revive_menus  The array of admin pages where the loading icon should be displayed.
		 *
		 * @since 1.0.7
		 */
		$pages = apply_filters(
			'reviveso_admin_pages',
			$revive_menus
		);

		$is_page = false;
		// Check if we are in one of the pages where the icon should be displayed.
		foreach ( $pages as $page ) {
			if ( $screen->base === $page ) {
				$is_page = true;
			}
		}

		return $is_page;
	}

	/**
	 * Check if the plugin is already loaded.
	 *
	 * @since 2.0.0
	 */
	public function extensions_requirements() {
		$ext_service        = REVIVESO_Extensions::get_instance();
		$extensions         = $ext_service->get_addons();
		$default_extensions = array( 'reviveso-pro' => array( 'path' => 'wp-reviveso-pro/reviveso-pro.php', 'lite_dependency' => '2.0.0'  ) );
		$all_extensions     = array_merge( $extensions['all_extensions'], $default_extensions );
		$lite_version = Reviveso::get()->version;

		// Cycle through all the extensions and check if they meet the requirements.
		foreach ( $all_extensions as $extension ) {
			$extension_path = $extension['path'];
			if ( is_plugin_active( $extension_path ) ) {
				// Get the plugin data.
				$plugin_data = get_plugin_data( WP_PLUGIN_DIR . '/' . $extension_path );
				if ( ! isset( $extension['lite_dependency'] ) ) {
					$extension['lite_dependency'] = '2.0.0';
				}
				if ( version_compare( $plugin_data['Version'], $extension['lite_dependency'], '<' ) ) {
					// The plugin is active and the version is lower than the required one.
					// Add a notice to the admin.
					$this->messages[] = sprintf(
					/* translators: 1: Extension name, 2: Required version, 3: Current version */
						__( 'Revive.So version %1$s requires extension %2$s to be at least version %3$s. You are currently using version %4$s. Please update from %5$sPlugins%6$s page or download the zip from %7$syour account%8$s and manually update the extension.', 'revive-so' ),
						$lite_version,
						$plugin_data['Name'],
						$extension['lite_dependency'],
						$plugin_data['Version'],
						'<a href="' . esc_url( admin_url( 'plugins.php' ) ) . '">',
						'</a>',
						'<a href="https://revive.so/my-account" target="_blank">',
						'</a>'
					);
				}
			}
		}
		if ( ! empty( $this->messages ) ) {
			// Auto-deactivate plugin.
			add_action( 'admin_notices', array( $this, 'extensions_notices' ), 8 );
		}
	}

	/**
	 * Add notices for the extensions requirements.
	 *
	 * @return void
	 */
	public function extensions_notices() {
		$revive_page = REVIVESO_Admin::is_reviveso_admin_page();

		foreach ( $this->messages as $message ) {
			if ( $revive_page ) {
				?>
				<!-- Global notification live region, render this permanently at the end of the document -->
				<div aria-live='assertive' class='reviveso-notice mt-6 pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6'>
					<div class='flex w-full flex-col items-center space-y-4 sm:items-end'>
						<div class='border-2 border-t-0 border-b-0 border-r-0 border-red-500 pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5'>
							<div class='p-4'>
								<div class='flex items-center'>
									<div class='flex w-0 flex-1 justify-between'>
										<p class='w-0 flex-1 text-sm font-medium text-gray-900'>
											<?php echo wp_kses_post( $message ); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			} else {
				?>
				<div class="notice reviveso-notice notice-error">
					<p>
						<?php
						echo wp_kses_post( $message ); ?>
					</p>
				</div>
				<?php
			}
		}
	}

	/**
	 * Filter to enable search on the Scheduled Tasks page.
	 *
	 * @param  bool  $has_search  Whether the current page has a search field.
	 *
	 * @return bool
	 * @since 2.0.0
	 */
	public function search_on_scheduled_tasks( $has_search ) {
		$current_screen = get_current_screen();

		if ( 'revive-so_page_reviveso-scheduled-tasks' === $current_screen->base ) {
			$has_search = true;
		}

		return $has_search;
	}

	/**
	 * Filter to enable search on the Scheduled Tasks page.
	 *
	 * @param  bool  $has_nav  Whether the current page has the top navigation
	 *
	 * @return bool
	 * @since 2.0.0
	 */
	public function dashboard_top_navigation( $has_nav ) {
		$current_screen = get_current_screen();

		if ( 'toplevel_page_reviveso' === $current_screen->base ) {
			$has_nav = true;
		}

		return $has_nav;
	}
}
