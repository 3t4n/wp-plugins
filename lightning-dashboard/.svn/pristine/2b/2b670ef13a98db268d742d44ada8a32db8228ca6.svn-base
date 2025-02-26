<?php

/**
 * Pages class file
 */

if( !defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'LDASH_Pages' ) ) {

	/**
	 * Pages
	 *
	 * Page related configuration
	 *
	 * @package LightningDashboard/Classes
	 * @since   1.0.0
	 */

	class LDASH_Pages {

		/**
		 * Construct
		 *
		 * @since 1.0.0
		 */

		public function __construct() {

			add_filter( 'login_redirect', array( $this, 'login_redirect' ), 10, 3 );
			add_filter( 'parent_file', array( $this, 'current_sub_menu_page_styling' ) );
			add_action( 'admin_menu', array( $this, 'menu_items' ) );
			add_action( 'admin_head', array( $this, 'menu_items_targets' ) );
			add_action( 'admin_menu', array( $this, 'menu_items_order_count' ) );
			add_action( 'admin_title' , array( $this, 'change_admin_titles' ) );

		}

		/**
		 * Redirect user on login
		 *
		 * @since 1.0.0
		 * @param string $redirect_to Redirect URL used upon login
		 * @param string $request The requested redirect destination URL
		 * @param object $user WordPress User or error object
		 * @return string Redirect URL
		 */

		public function login_redirect( $redirect_to, $request, $user ) {

			// This condition ensures there is a user object before doing has_cap otherwise would cause errors

			if( isset( $user->caps ) && is_array( $user->caps ) ) {
				if( $user->has_cap( 'manage_woocommerce' ) && get_option( 'ldash_general_misc_login_redirect' ) == 'on' ) {
					$redirect_to = get_admin_url() . 'admin.php?page=lightning-dashboard';
				}
			}
	
			return $redirect_to;

		}

		/**
		 * Ensures WordPress left menu bolds the active menu item
		 *
		 * @since 1.0.0
		 * @param string $parent_file Parent file
		 * @return string Parent file
		 */

		public function current_sub_menu_page_styling( $parent_file ) {

			global $submenu_file;

			if( ldash_current_tab() == 'products' ) {

				$submenu_file = 'admin.php?page=lightning-dashboard&tab=products';

			} elseif( ldash_current_tab() == 'customers' ) {

				$submenu_file = 'admin.php?page=lightning-dashboard&tab=customers';

			} elseif( ldash_current_tab() == 'settings' ) {

				$submenu_file = 'admin.php?page=lightning-dashboard&tab=settings';

			}

			return $parent_file;

		}

		/**
		 * Adds WordPress menu items
		 *
		 * @since 1.0.0
		 */
		
		public function menu_items() {

			$menu_icon = get_option( 'ldash_general_menu_icon' );

			if( empty( $menu_icon ) ) {

				$menu_icon = 'dashicons-ldash-menu-icon'; // default menu icon

			}

			$menu_position = get_option( 'ldash_general_menu_position' );

			add_menu_page(
				LDASH_NAME,
				get_option( 'ldash_general_menu_name' ),
				'manage_woocommerce',
				'lightning-dashboard',
				array( $this, 'dashboard' ),
				$menu_icon,
				$menu_position
			);

			add_submenu_page(
				'lightning-dashboard', // points to top level menu_page page
				LDASH_NAME, // This will be the browser title for all pages as all pages run through the same file and therefore the slug matches all the other pages
				__( 'Orders', 'lightning-dashboard' ),
				'manage_woocommerce',
				'lightning-dashboard' // points to top level menu_page page
			);

			add_submenu_page(
				'lightning-dashboard',
				__( 'Products', 'lightning-dashboard' ),
				__( 'Products', 'lightning-dashboard' ),
				'manage_woocommerce',
				'admin.php?page=lightning-dashboard&tab=products'
			);

			add_submenu_page(
				'lightning-dashboard',
				__( 'Customers', 'lightning-dashboard' ),
				__( 'Customers', 'lightning-dashboard' ),
				'manage_woocommerce',
				'admin.php?page=lightning-dashboard&tab=customers'
			);

			add_submenu_page(
				'lightning-dashboard',
				__( 'Settings', 'lightning-dashboard' ),
				__( 'Settings', 'lightning-dashboard' ),
				'manage_woocommerce',
				'admin.php?page=lightning-dashboard&tab=settings'
			);

			if( get_option( 'ldash_general_misc_external_tabs' ) == 'on' ) {

				add_submenu_page(
					'lightning-dashboard',
					__( 'Add-Ons', 'lightning-dashboard' ),
					__( 'Add-Ons', 'lightning-dashboard' ),
					'manage_woocommerce',
					LDASH_URL . 'add-ons'
				);

			}

		}

		/**
		 * Add target blank to external menu links
		 *
		 * @since 1.0.0
		 */

		public function menu_items_targets() {

			if( get_option( 'ldash_general_misc_external_tabs' ) == 'on' ) { ?>

				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$('#toplevel_page_lightning-dashboard .wp-submenu li:nth-last-child(1) a').attr( 'target','_blank' );
					});
				</script>

			<?php }

		}

		/**
		 * Add order count to menu
		 *
		 * @since 1.0.0
		 */

		public function menu_items_order_count() {

			global $submenu;

			if( isset( $submenu['lightning-dashboard'] ) ) {

				if( !empty( $submenu['lightning-dashboard'] ) ) {

					// Remove 'WooCommerce' sub menu item.

					foreach( $submenu['lightning-dashboard'] as $key => $menu_item ) {

						if( $menu_item[0] == 'Orders' ) {

							$order_count = wc_processing_order_count();

							$submenu['lightning-dashboard'][ $key ][0] .= ' <span class="awaiting-mod update-plugins count-' . esc_attr( $order_count ) . '"><span class="processing-count">' . number_format_i18n( $order_count ) . '</span></span>'; // WPCS: override 

							break;

						}

					}

				}

			}

		}

		/**
		 * Change admin titles to current tab
		 *
		 * @since 1.0.0
		 * @param string $admin_title Current admin title
		 * @return string Admin title
		 */

		public function change_admin_titles( $admin_title ) {

			global $current_screen;

			if( $current_screen->id !== 'toplevel_page_lightning-dashboard' ) {
				
				return $admin_title;

			} else {

				$admin_title = str_replace( LDASH_NAME, ucfirst( ldash_current_tab() ), $admin_title );
				return $admin_title;

			}

		}

		/**
		 * Renders the dashboard
		 *
		 * @since 1.0.0
		 */

		public function dashboard() {

			// Remove admin footer text and version numbers

			add_filter( 'admin_footer_text', '__return_empty_string', 11 ); 
			add_filter( 'update_footer', '__return_empty_string', 11 );	

			// Initial data

			$tab = ldash_current_tab();
			$option = ldash_current_option();
			$sub_option = ldash_current_sub_option();
			$user_id = $_REQUEST['user_id'];
			$custom_date_from = $_REQUEST['date_from'];
			$custom_date_to = $_REQUEST['date_to'];

			if( get_option( 'ldash_general_misc_save_state' ) == 'on' ) {

				// Save state should not be used if user ID search on orders

				if( !isset( $_GET['user_id'] ) ) {

					session_start();

					if( $_GET['clear_save_state'] == 1 ) {

						unset( $_SESSION['ldash'] );

					}

					if( !isset( $_GET['option'] ) ) {

						// Last Option

						if( !isset( $_SESSION['ldash']['last_option'][$tab] ) ) {

							$_SESSION['ldash']['last_option'][$tab] = $option;

						} else {

							$option = $_SESSION['ldash']['last_option'][$tab];

						}

						// Last Sub Option

						if( !isset( $_SESSION['ldash']['last_sub_option'][$tab] ) ) {

							$_SESSION['ldash']['last_sub_option'][$tab] = $sub_option;

						} else {

							$sub_option = $_SESSION['ldash']['last_sub_option'][$tab];

						}

					} else {

						$_SESSION['ldash']['last_option'][$tab] = $option;
						$_SESSION['ldash']['last_sub_option'][$tab] = $sub_option;

					}

				}

			} ?>

			<script type="text/javascript">
				var ldashAjaxUrl = '<?php echo admin_url( 'admin-ajax.php?action=datatable&tab=' . $tab . '&option=' . $option . '&user_id=' . $user_id . '&date_from=' . $custom_date_from . '&date_to=' . $custom_date_to ); ?>';	
			</script>

			<div class="wrap">

				<?php

				// Render HTML content

				require 'views/html-global-notice.php';
				require 'views/html-notices.php';
				require 'views/html-tabs.php';
				require 'views/html-options.php';

				if( $tab !== 'settings' ) {

					require 'views/html-datatable.php';
					require 'views/html-edit.php';
	
				} else {

					require 'views/html-settings.php';

				} ?>

			</div>			

		<?php }

	}

	new LDASH_Pages();

}