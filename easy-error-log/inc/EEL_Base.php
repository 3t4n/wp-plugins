<?php
namespace EEL\Inc;

defined('ABSPATH') || die('Hey, what are you doing here? You silly human!');

class EEL_Base {
    
		public function __construct() {
			$this->includes();

			add_action('admin_menu', array($this, 'add_error_page'));
			add_action('admin_enqueue_scripts', [$this, 'admin_enqueue']);
			add_action('wp_enqueue_scripts', [$this, 'fe_scripts']);
			add_action('admin_bar_menu', array($this, 'add_my_page_to_admin_bar'), 100);
			add_action('init', array($this, 'system_info'));
			add_action('wp_footer', [$this, 'display_error_floating_widget'], 99);

			add_action('wp_ajax_toggle_admin_widget', array($this, 'toggle_admin_widget'));
			add_action('admin_footer', array($this, 'display_admin_error_widget'));
			
			$this->init_ajax_handlers();
		}

		private function init_ajax_handlers() {
			$ajax = new EEL_Ajax();
			$ajax->init();
		}

		public function includes() {
			add_action('plugins_loaded', array($this, 'eel_load'));
		}

		public function eel_load() {
			load_plugin_textdomain('easy-error-log', false, __DIR__ . 'languages');
		}

		public function get_admin_widget_status() {
			return get_option('eel_admin_widget_enabled', 'active');
		}
		
		public function toggle_admin_widget() {
			check_ajax_referer('eel_admin_nonce', 'nonce');
			
			$current_status = $this->get_admin_widget_status();
			$new_status = ($current_status === 'active') ? 'inactive' : 'active';
			
			update_option('eel_admin_widget_enabled', $new_status);
			wp_send_json_success(array('status' => $new_status));
		}

		/**
		 * Add error page.
		 */
		public function add_error_page() {
			$debug_error_mode_enabled = get_option('easy_error_log_debug_mode_enabled', 0);
			if (empty($debug_error_mode_enabled)) {
				$config_path = ABSPATH . 'wp-config.php';
				if (file_exists($config_path)) {
					$config_contents = file_get_contents($config_path);
					
					// First remove any existing duplicate constants
					$config_contents = preg_replace('/define\s*\(\s*[\'"]WP_DEBUG[\'"]\s*,\s*(?:true|false)\s*\);\s*\n?/i', '', $config_contents);
					$config_contents = preg_replace('/define\s*\(\s*[\'"]WP_DEBUG_LOG[\'"]\s*,\s*(?:true|false)\s*\);\s*\n?/i', '', $config_contents);
					
					// Add new constants
					$constants_to_add = "define('WP_DEBUG', false);\ndefine('WP_DEBUG_LOG', false);\n";
					
					// Find position to insert
					$position_to_insert = strpos($config_contents, '/* That\'s all, stop editing! Happy publishing. */');
					
					if (false !== $position_to_insert) {
						$config_contents = substr_replace($config_contents, $constants_to_add, $position_to_insert, 0);
						file_put_contents($config_path, $config_contents);
						update_option('easy_error_log_debug_mode_enabled', 1);
					}
				}
			}
			
			add_management_page('WP Errors', 'WP Errors', 'manage_options', 'errors', array($this, 'display_errors'));
		}


        /**
		 * Enqueue plugin files.
		 *
		 * @param string $screen   use to get the current page screen.
		 */
		public function admin_enqueue( $screen ) {
			if ( 'tools_page_errors' === $screen ) {
				remove_all_actions( 'admin_notices' );
				remove_all_actions( 'all_admin_notices' );

				wp_enqueue_style(
					'err-admin-css',
					EASY_ERROR_LOG_DIR_URL . 'assets/easy-errors.css',
					'',
					time(),
					'all'
				);

				wp_enqueue_script(
					'err-admin-js',
					EASY_ERROR_LOG_DIR_URL . 'assets/easy-errors.js',
					[ 'jquery' ],
					time(),
					true
				);

				// Localize the script with new data.
				$ajax_url = admin_url( 'admin-ajax.php' );
				// wp_localize_script( 'err-admin-js', 'ajax_object', array( 'ajax_url' => $ajax_url ) );
				wp_localize_script('err-admin-js', 'ajax_object', array(
					'ajax_url' => admin_url('admin-ajax.php'),
					'admin_widget_status' => $this->get_admin_widget_status(),
					'nonce' => wp_create_nonce('eel_admin_nonce')
				));
			}
			else{
				wp_enqueue_script('jquery-ui-draggable');
				wp_enqueue_style('dashicons');

				wp_enqueue_style(
					'err-admin-css',
					EASY_ERROR_LOG_DIR_URL . 'assets/admin-easy-errors.css',
					'',
					time(),
					'all'
				);

				wp_enqueue_script(
					'err-admin-js',
					EASY_ERROR_LOG_DIR_URL . 'assets/admin-easy-errors.js',
					[ 'jquery' ],
					time(),
					true
				);

				// Localize the script with new data.
				$ajax_url = admin_url( 'admin-ajax.php' );
				wp_localize_script('err-admin-js', 'ajax_object', array(
					'ajax_url' => admin_url('admin-ajax.php'),
					'admin_widget_status' => $this->get_admin_widget_status(),
					'nonce' => wp_create_nonce('eel_admin_nonce')
				));

			}

		
		}
    
        /**
		 * Display errors files.
		 */
		public function display_errors() {
			$mode = '';
			$status = '';
			$widgets_mode = '';
			$admin_widget_status = $this->get_admin_widget_status();

			?>
			<br>

			<div class="nav-tab-wrapper">
				<a href="#debugger" class="nav-tab nav-tab-active"><?php echo esc_html__( 'Debugger', 'easy-error-log' ); ?></a>
				<a href="#system-info" class="nav-tab"><?php echo esc_html__( 'System Info', 'easy-error-log' ); ?></a>
				<a href="#theme-plugins" class="nav-tab"><?php echo esc_html__( 'Theme & Plugins', 'easy-error-log' ); ?></a>
				<a href="#user-info" class="nav-tab"><?php echo esc_html__( 'User Info', 'easy-error-log' ); ?></a>
				<a href="#about" class="nav-tab"><?php echo esc_html__( 'About Me', 'easy-error-log' ); ?></a>
			</div>

			<div class="tab-content">
				<!-- Debugger Tab -->
				<div id="debugger" class="tab-pane active">

					<div class="header-status">
						<button id="toggle-controller" class="button">
							<span id="toggle-icon"><?php echo esc_html__( '▼', 'easy-error-log' ); ?></span> <?php echo esc_html__( 'Controls', 'easy-error-log' ); ?>
						</button>
						<div class="status">
							<h4><?php echo esc_html__( 'WP_DEBUG:', 'easy-error-log' ); ?> <span class="constant-status wp-debug" style="color: green;"><?php echo esc_html__( 'Found', 'easy-error-log' ); ?></span></h4>
							<h4><?php echo esc_html__( 'WP_DEBUG_LOG:', 'easy-error-log' ); ?> <span class="constant-status wp-debug-log" style="color: green;"><?php echo esc_html__( 'Found', 'easy-error-log' ); ?></span></h4>
						</div>
					</div>

					<div class="wpel-buttons" style="display: flex; gap: 16px;">

						<div class="debug-toggle-container">
							<label class="switch">
								<input type="checkbox" id="toggle-debug-mode">
								<span class="slider"></span>
							</label>
							<span class="toggle-label"><?php echo esc_html__( 'Toggle Debug Mode:', 'easy-error-log' ); ?></span>
							<span id="debug-mode-status" style="margin-left: 10px;"></span>
						</div>
					

						<button id="clean-debug-log" class="button"><?php echo esc_html__( 'Clean', 'easy-error-log' ); ?></button>

						<button id="refresh-debug-log" class="button"><?php echo esc_html__( 'Refresh', 'easy-error-log' ); ?></button>

						<form id="download-debug-log" method="post" action="">
							<?php wp_nonce_field( 'download_debug_log_nonce', 'download_debug_log_nonce' ); ?>
							<input type="hidden" name="action" value="download_debug_log">
							<button type="submit" class="button"><?php echo esc_html__( 'Download', 'easy-error-log' ); ?></button>
						</form>
						<button id="reset-constant" class="button"><?php echo esc_html__( 'Reset Debug Constant', 'easy-error-log' ); ?></button>

						<button id="toggle-admin-widget" class="button">
							<?php echo esc_html__('Admin widget:', 'easy-error-log'); ?>
							<span id="admin-widget-status" style="color: <?php echo esc_attr($admin_widget_status === 'active' ? '#ffee00' : 'red'); ?>">
								<?php echo esc_html($admin_widget_status === 'active' ? 'ON' : 'OFF'); ?>
							</span>
						</button>
						
						<button id="toggle-fe-mode" class="button">
							<?php echo esc_html__( 'FE widgets:', 'easy-error-log' ); ?>
							<span id="debug-fe-status" style="color: <?php echo esc_html( 'active' === $widgets_mode ? 'red' : '#ffee00' ); ?>">
								<?php echo esc_html( $status ); ?>
							</span>
						</button>

					</div>
					
					<div class="debug-constant">
						<div class="code-wrapper">
							<code contenteditable="true" id="code1"><?php echo esc_html__( "error_log( 'Log: ' . print_r( \$, true ) );", 'easy-error-log' ); ?></code>
							<button class="copy-btn" data-target="#code1" title="Copy to Clipboard">
								&#x1F4CB;
							</button>
						</div>
						<div class="code-wrapper">
							<code contenteditable="true" id="code2"><?php echo esc_html__( "error_log( 'Log:-  ' );", 'easy-error-log' ); ?></code>
							<button class="copy-btn" data-target="#code2" title="Copy to Clipboard">
								&#x1F4CB;
							</button>
						</div>
						<br>
					</div>


					<!-- Display error and other status  -->
					<table class="wp-list-table widefat fixed striped">
						<thead class="wp-error-head">
							<tr class="wp-error-row">
								<th class="wp-error-table-header"><?php echo esc_html__( 'Error Message: Duplicate errors removed from the panel', 'easy-error-log' ); ?></th>
							</tr>
						</thead>
						<tbody class="wp-error-body">
							<tr class="wp-error-body-row">
								<td class="wp-error-body-data"><p id="error-log-container" class="error-log-scrollable"></p></td>
							</tr>
						</tbody>
					</table>
				</div>

				<!-- System Info Tab -->

				<?php
					// Get the system information
					$system_info = $this->system_info();
				?>

				<div id="system-info" class="tab-pane" style="display: none;">
					<h3><?php echo esc_html__( 'System Information', 'easy-error-log' ); ?></h3>
					
					<h4 class="eel-title"><?php echo esc_html__( 'WordPress Environment Information', 'easy-error-log' ); ?></h4>
					<!-- General System Information -->
					<table class="wp-list-table widefat fixed striped">
						<tbody>
							<tr>
								<th><?php echo esc_html__( 'Home URL:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['home_url'] ); ?></td>
							</tr>
							<tr>
								<th><?php echo esc_html__( 'Site URL:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['site_url'] ); ?></td>
							</tr>


							<!-- New  -->
							<tr>
								<th><?php echo esc_html__( 'Site Description:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['site_description'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Timezone:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['timezone'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Date Format:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['date_format'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Time Format:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['time_format'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Post per page:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['posts_per_page'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Permalink Structure:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['permalink_structure'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Active Theme:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['active_theme'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Child Theme:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['child_theme'] ); ?></td>
							</tr>

							<!-- End  -->



							<tr>
								<th><?php echo esc_html__( 'WP Content Path:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['wp_content_path'] ); ?></td>
							</tr>
							<tr>
								<th><?php echo esc_html__( 'WP Path:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['wp_path'] ); ?></td>
							</tr>
							<tr>
								<th><?php echo esc_html__( 'WP Version:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['wp_version'] ); ?></td>
							</tr>
							<tr>
								<th><?php echo esc_html__( 'Multisite:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['multisite'] ); ?></td>
							</tr>
							<tr>
								<th><?php echo esc_html__( 'Memory Limit:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['memory_limit'] ); ?></td>
							</tr>

							<tr>
								<th><?php echo esc_html__( 'Database table:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( implode( ', ', $system_info['get_database_tables'] ) ); ?></td>
							</tr>
							
							
							
							<tr>
								<th><?php echo esc_html__( 'WP Debug:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['wp_debug'] ); ?></td>
							</tr>
							<tr>
								<th><?php echo esc_html__( 'Language:', 'easy-error-log' ); ?></th>
								<td><?php echo esc_html( $system_info['language'] ); ?></td>
							</tr>
						</tbody>
					</table>
					
					<!-- Server Information -->
					<h4 class="eel-title"><?php echo esc_html__( 'Server Information', 'easy-error-log' ); ?></h4>
					<table class="wp-list-table widefat fixed striped">
						<thead>
							<tr>
								<th><?php echo esc_html__( 'Parameter', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Value', 'easy-error-log' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo esc_html__( 'Operating System:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['os'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Server Info:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['server_info'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'PHP Version:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['php_version'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Post Max Size:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['post_max_size'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Time Limit:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['time_limit'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'MySQL Version:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['mysql_version'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Max Upload Size:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['max_upload_size'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'MBString:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['mbstring'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'XML:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['xml'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'DOM:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['dom'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'LibXML:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['libxml'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'PDO:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['pdo'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Zip:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['zip'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'cURL:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['curl'] ); ?></td>
							</tr>
							
							<tr>
								<td><?php echo esc_html__( 'Apache Status:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['apache_status'] ); ?></td>
							</tr>

							<tr>
								<td><?php echo esc_html__( 'Server IP:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['server_ip'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Server Protocol:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['server_protocol'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'https:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['https'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'PHP Architecture:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['php_architecture'] ); ?></td>
							</tr>
							
							<tr>
								<td><?php echo esc_html__( 'Max Execution Time:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['max_execution_time'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Max Input Vars:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['max_input_vars'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Aapache Modules:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['apache_modules'] ); ?></td>
							</tr>
							<tr>
								<td><?php echo esc_html__( 'Apache Version:', 'easy-error-log' ); ?></td>
								<td><?php echo esc_html( $system_info['apache_version'] ); ?></td>
							</tr>
							
						</tbody>
					</table>

					
				</div>


				<!-- Theme & Plugins Tab -->
				<div id="theme-plugins" class="tab-pane" style="display: none;">
					<h3><?php echo esc_html__( 'Theme & Plugins Information', 'easy-error-log' ); ?></h3>

					<h4 class="eel-title"><?php echo esc_html__( 'Active Theme Information', 'easy-error-log' ); ?></h4>
					<table class="wp-list-table widefat fixed striped theme-info-table">
						<thead>
							<tr>
								<th><?php echo esc_html__( 'Name', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Version', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Author', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Author URI', 'easy-error-log' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo esc_html( $system_info['theme_info']['Name'] ); ?></td>
								<td><?php echo esc_html( $system_info['theme_info']['Version'] ); ?></td>
								<td><?php echo esc_html( $system_info['theme_info']['Author'] ); ?></td>
								<td><?php echo esc_html( $system_info['theme_info']['AuthorURI'] ); ?></td>
							</tr>
						</tbody>
					</table>

					<h4 class="eel-title"><?php echo esc_html__( 'Active Plugins Information', 'easy-error-log' ); ?></h4>
					<table class="wp-list-table widefat fixed striped plugins-info-table">
						<thead>
							<tr>
								<th><?php echo esc_html__( 'Name', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Version', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Author', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Description', 'easy-error-log' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ( $system_info['plugins_info'] as $plugin ) : ?>
							<tr>
								<td><?php echo $plugin['Name']; ?></td>
								<td><?php echo esc_html( $plugin['Version'] ); ?></td>
								<td><?php echo esc_html( $plugin['Author'] ); ?></td>
								<td><?php echo wp_kses_post( html_entity_decode( $plugin['Description'] ) ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>


				<!-- User info Tab -->
				<div id="user-info" class="tab-pane" style="display: none;">
					<h3><?php echo esc_html__( 'User Basic Information', 'easy-error-log' ); ?></h3>

					<h4 class="eel-title"><?php echo esc_html__( 'Active user', 'easy-error-log' ); ?></h4>
					<table class="wp-list-table widefat fixed striped theme-info-table">
						<thead>
							<tr>
								<th><?php echo esc_html__( 'Name', 'easy-error-log' ); ?></th>
								<th><?php echo esc_html__( 'Value', 'easy-error-log' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ( $system_info['basic_user_info'] as $key => $value ) : ?>
							<tr>
								<td><?php echo esc_html( $key ); ?></td>
								<td><?php echo esc_html( $value ); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

                <!-- About  -->
                <div id="about" class="tab-pane tab-content" style="display: none;">
                    <div class="about-info">
                        <h2><?php echo esc_html__('WC Bulk Product & Order Generator', 'wc-bulk-order-generator'); ?></h2>
                        <p><?php echo esc_html__('Generates bulk orders/products for WooCommerce with optimized batch processing', 'wc-bulk-order-generator'); ?></p>
                    </div>

                    <div class="plugins-section-header">
                        <h2 class="plugins-section-title"><?php echo esc_html__('Get More Free Plugins', 'wc-bulk-order-generator'); ?></h2>
                    </div>

                    <div class="plugin-cards-container">
                        <?php
                        $plugins = [
                            [
                                'icon' => 'forms',
                                'name' => 'FormDeck',
                                'description' => 'Simple Form Builder with WhatsApp Floating Forms',
                                'tags' => ['Free', 'WhatsApp Integration'],
                                'url' => 'https://wordpress.org/plugins/simple-form/'
                            ],
                            [
                                'icon' => 'shield',
                                'name' => 'Activity Guard',
                                'description' => 'Real Time Notifier to Slack for System & User Activity Logs, Forum Tracker and Security',
                                'tags' => ['Free', 'Pro', 'Security and Tracker'],
                                'url' => 'https://wordpress.org/plugins/notifier-to-slack/'
                            ],
                            [
                                'icon' => 'warning',
                                'name' => 'WC Bulk Order Generator',
                                'description' => 'WC Bulk Generator to create realistic WooCommerce test data quickly. Generate thousands of WooCommerce products and orders with just a few clicks.',
                                'tags' => ['Free', 'Generates orders/products'],
                                'url' => 'https://wordpress.org/plugins/wc-bulk-order-generator'
                            ]
                        ];

                        foreach ($plugins as $plugin) : ?>
                            <div class="plugin-card">
                                <div class="plugin-content">
                                    <div class="plugin-header">
                                        <div class="plugin-icon">
                                            <span class="dashicons dashicons-<?php echo esc_attr($plugin['icon']); ?>"></span>
                                        </div>
                                        <h3><?php echo esc_html($plugin['name']); ?></h3>
                                    </div>
                                    <p><?php echo esc_html($plugin['description']); ?></p>
                                    <div class="plugin-features">
                                        <?php foreach ($plugin['tags'] as $tag) : ?>
                                            <span class="feature-tag"><?php echo esc_html($tag); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <a href="<?php echo esc_url($plugin['url']); ?>" 
                                    class="plugin-button" 
                                    target="_blank" 
                                    rel="noopener noreferrer">
                                        <?php echo esc_html__('Learn More', 'wc-bulk-order-generator'); ?>
                                        <span class="dashicons dashicons-external"></span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
				</div>

			</div>
			
			<?php
		}


		public function display_admin_error_widget() {
			$screen = get_current_screen();
			if ($screen && $screen->base == 'tools_page_errors') {
				return;
			}
		
			if (!current_user_can('manage_options')) {
				return;
			}

			if ($this->get_admin_widget_status() !== 'active') {
				return;
			}
		
			?>
			<div id="admin-error-widget" class="admin-error-widget">
				<div class="error-widget-header">
					<span class="error-widget-title">
						<span class="dashicons dashicons-warning"></span>
						<?php echo esc_html__('', 'wc-bulk-order-generator'); ?>Error Log Monitor
					</span>
					<div class="error-widget-actions">
						<button id="refresh-widget-log" class="widget-action-btn" title="Refresh Log">
							<span class="dashicons dashicons-update-alt"></span>
						</button>
						<button id="clean-widget-log" class="widget-action-btn" title="Clean Log">
							<span class="dashicons dashicons-trash"></span>
						</button>
						<button id="toggle-widget-view" class="widget-action-btn" title="Toggle View">
							<span class="dashicons dashicons-arrow-up-alt2"></span>
						</button>
					</div>
				</div>
				<div class="error-widget-content">
					<div class="error-stats">
						<span class="error-count"><?php echo esc_html__('Errors: ', 'wc-bulk-order-generator'); ?><span id="widget-error-count"><?php echo esc_html__('0', 'wc-bulk-order-generator'); ?></span></span>
						<span class="last-updated"><?php echo esc_html__('Last updated:', 'wc-bulk-order-generator'); ?> <span id="widget-last-updated"><?php echo esc_html__('Just now', 'wc-bulk-order-generator'); ?></span></span>
					</div>
					<div id="widget-error-container" class="widget-error-container">
						<div class="loading-errors"><?php echo esc_html__('Loading error logs...', 'wc-bulk-order-generator'); ?></div>
					</div>
				</div>
			</div>
			<?php
		}


        public function fe_scripts() {
			wp_enqueue_script(
				'err-fe-js',
				EASY_ERROR_LOG_DIR_URL . 'assets/fe-easy-errors.js',
				[ 'jquery' ],
				time(),
				true
			);

			wp_enqueue_style(
				'err-fe-css',
				EASY_ERROR_LOG_DIR_URL . 'assets/fe-error-style.css',
				'',
				time(),
				'all'
			);


			// Localize the script with new data.
			$ajax_url = admin_url( 'admin-ajax.php' );
			wp_localize_script( 'err-fe-js', 'ajax_fe_object', array( 'ajax_url' => $ajax_url ) );
		}


        /**
		 * Function to add error page in the admin bar.
		 *
		 * @param string $wp_admin_bar   use to add error page in the admin bar.
		 */
		public function add_my_page_to_admin_bar( $wp_admin_bar ) {
			$debug_log_paths = array(
				WP_CONTENT_DIR . '/debug.log',
				ABSPATH . 'debug.log',
			);

			$debug_log_path = '';
			foreach ( $debug_log_paths as $path ) {
				if ( file_exists($path) ) {
					$debug_log_path = $path;
					break;
				}
			}

			$error_count = 0;
			if ( file_exists($debug_log_path) ) {
				$debug_log_entries = file( $debug_log_path, FILE_IGNORE_NEW_LINES );
				$error_count = count($debug_log_entries);
			}

			$wp_admin_bar->add_node(array(
				'id'    => 'my-errors-page',
				'title' => "WP Errors-<span style='color:red;font-weight:bold;' class='update-plugins count-$error_count'><span class='update-count'>$error_count</span></span>",
				'href'  => admin_url('tools.php?page=errors'),
			));
		}


        public function system_info() {
            global $wpdb;

            // Ensure the get_plugin_data function is available
            if ( ! function_exists( 'get_plugin_data' ) ) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            $home_url = esc_url_raw(home_url());
            $site_url = esc_url_raw(site_url());
            $wp_content_path = defined('WP_CONTENT_DIR') ? esc_html(WP_CONTENT_DIR) : esc_html__('N/A', 'wpnts');
            $wp_path = defined('ABSPATH') ? esc_html(ABSPATH) : esc_html__('N/A', 'wpnts');
            $wp_version = get_bloginfo('version');
            $multisite = is_multisite() ? 'Yes' : 'No';
            $memory = ini_get('memory_limit');
            $memory = !$memory || -1 === $memory ? wp_convert_hr_to_bytes(WP_MEMORY_LIMIT) : wp_convert_hr_to_bytes($memory);
            $memory = is_numeric($memory) ? size_format($memory) : 'N/A';
            $wp_debug = defined('WP_DEBUG') && WP_DEBUG ? 'Active' : 'Inactive';
            $language = get_locale();
            
			//Server Information.
			$os = defined('PHP_OS') ? esc_html(PHP_OS) : esc_html__('N/A', 'wpnts');
            $server_info = isset($_SERVER['SERVER_SOFTWARE']) ? esc_html(sanitize_text_field(wp_unslash($_SERVER['SERVER_SOFTWARE']))) : esc_html__('Unknown', 'wpnts');
            $php_version = phpversion();
            $post_max_size = size_format(wp_convert_hr_to_bytes(ini_get('post_max_size')));
            $time_limit = ini_get('max_execution_time');
            $mysql_version = $wpdb->db_version();
            $max_upload_size = size_format(wp_max_upload_size());
            $mbstring = extension_loaded('mbstring') ? 'Installed' : 'Not installed';
            $xml = extension_loaded('xml') ? 'Installed' : 'Not installed';
            $dom = extension_loaded('dom') ? 'Installed' : 'Not installed';

            $libxml = extension_loaded('libxml') ? (defined('LIBXML_VERSION') && LIBXML_VERSION > 20760 ? 'Installed - Version: ' . LIBXML_DOTTED_VERSION : 'Lower version than required') : 'Not installed';
            $pdo = extension_loaded('pdo') ? 'Installed - PDO Drivers: ' . implode(', ', pdo_drivers()) : 'Not installed';
            $zip = class_exists('ZipArchive') ? 'Installed' : 'Not installed';
            $curl = extension_loaded('curl') ? 'Installed - Version: ' . curl_version()['version'] : 'Not installed';

			// New 
			$server_software = isset($_SERVER['SERVER_SOFTWARE']) ? esc_html(sanitize_text_field(wp_unslash($_SERVER['SERVER_SOFTWARE']))) : esc_html__('Unknown', 'wpnts');
			$server_ip = isset($_SERVER['SERVER_ADDR']) ? esc_html($_SERVER['SERVER_ADDR']) : esc_html__('N/A', 'wpnts');
			$server_protocol = isset($_SERVER['SERVER_PROTOCOL']) ? esc_html($_SERVER['SERVER_PROTOCOL']) : esc_html__('N/A', 'wpnts');
			$https = isset($_SERVER['HTTPS']) ? 'On' : 'Off';
			$php_architecture = PHP_INT_SIZE * 8 . 'bit';
			$php_sapi = php_sapi_name();
			$php_extensions = get_loaded_extensions();
			
			$max_execution_time = ini_get('max_execution_time');
			$max_input_vars = ini_get('max_input_vars');
			
			$apache_modules = function_exists('apache_get_modules') ? implode(', ', apache_get_modules()) : esc_html__('N/A', 'wpnts');
			$apache_version = function_exists('apache_get_version') ? esc_html(apache_get_version()) : esc_html__('N/A', 'wpnts');


            // Theme information.
            $themeObject = wp_get_theme();
            $theme_info = array(
                'Name' => esc_html($themeObject->get('Name')),
                'Version' => esc_html($themeObject->get('Version')),
                'Author' => esc_html($themeObject->get('Author')),
                'AuthorURI' => esc_html($themeObject->get('AuthorURI')),
            );
        
            // Active plugins information.
            $active_plugins = (array) get_option('active_plugins', array());
            if (is_multisite()) {
                $active_plugins = array_merge($active_plugins, array_keys(get_site_option('active_sitewide_plugins', array())));
            }
            $plugins_info = array();
            foreach ($active_plugins as $plugin) {
                $plugin_data = @get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin);
                if (!empty($plugin_data['Name'])) {
                    $plugins_info[] = array(
                        'Name' => !empty($plugin_data['PluginURI']) ? '<a href="' . esc_url($plugin_data['PluginURI']) . '" title="' . esc_attr__('Visit plugin homepage', 'wpdatatables') . '" target="_blank">' . esc_html($plugin_data['Name']) . '</a>' : esc_html($plugin_data['Name']),
                        'Author' => esc_html($plugin_data['AuthorName']),
                        'Version' => esc_html($plugin_data['Version']),
                        'Description' => esc_html($plugin_data['Description']),
                    );
                }
            }


            // New Information Sections
            $apache_status = function_exists('apache_get_version') ? esc_html(apache_get_version()) : esc_html__('N/A', 'wpnts');
            $database_name = $wpdb->dbname;
            $database_charset = $wpdb->charset;
            $database_collate = $wpdb->collate;
        
        
            $current_user = wp_get_current_user();
            $basic_user_info = array(
                'ID' => esc_html($current_user->ID),
                'user_login' => esc_html($current_user->user_login),
                'user_pass' => esc_html($current_user->user_pass),
                'user_nicename' => esc_html($current_user->user_nicename),
                'user_email' => esc_html($current_user->user_email),
                'user_url' => esc_html($current_user->user_url),
                'user_registered' => esc_html($current_user->user_registered),
                'user_activation_key' => esc_html($current_user->user_activation_key),
                'user_status' => esc_html($current_user->user_status),
                'user_firstname' => esc_html($current_user->user_firstname),
                'user_lastname' => esc_html($current_user->user_lastname),
                'display_name' => esc_html($current_user->display_name),
                'roles' => implode(', ', $current_user->roles),
                'user_email_verified' => 'N/A',
                'user_locale' => get_user_meta($current_user->ID, 'locale', true),
            );
            

            // Return the information as an associative array.
            return array(
                'home_url' => $home_url,
                'site_url' => $site_url,
				
				'site_description' => get_bloginfo('description'),
				'admin_email' => get_bloginfo('admin_email'),
				'timezone' => get_option('timezone_string') ?: 'UTC' . get_option('gmt_offset'),
				'date_format' => get_option('date_format'),
				'time_format' => get_option('time_format'),
				'posts_per_page' => get_option('posts_per_page'),
				'permalink_structure' => get_option('permalink_structure'),
				'active_theme' => wp_get_theme()->get('Name'),
				'child_theme' => is_child_theme() ? 'Yes' : 'No',
				
                'wp_content_path' => $wp_content_path,
                'wp_path' => $wp_path,
                'wp_version' => $wp_version,
                'multisite' => $multisite,
                'memory_limit' => $memory,

                'get_database_tables' => $this->get_database_tables(),
                
				
                'wp_debug' => $wp_debug,
                'language' => $language,
                'os' => $os,
                'server_info' => $server_info,
                'php_version' => $php_version,
                'post_max_size' => $post_max_size,
                'time_limit' => $time_limit,
                'mysql_version' => $mysql_version,
                'max_upload_size' => $max_upload_size,
                'mbstring' => $mbstring,
                'xml' => $xml,
                'dom' => $dom,
                'libxml' => $libxml,
                'pdo' => $pdo,
                'zip' => $zip,
                'curl' => $curl,

                'server_ip' => $server_ip,
                'server_protocol' => $server_protocol,
                'https' => $https,
                'php_architecture' => $php_architecture,
                'php_sapi' => $php_sapi,
                'max_execution_time' => $max_execution_time,
                'max_input_vars' => $max_input_vars,
                'apache_modules' => $apache_modules,
                'apache_version' => $apache_version,
                


                'apache_status' => $apache_status,
                'theme_info' => $theme_info,
                'plugins_info' => $plugins_info,
                
                'basic_user_info' => $basic_user_info,
            );
		}

	
		private function get_database_tables() {
			global $wpdb;
			$tables = $wpdb->get_results('SHOW TABLES', ARRAY_N);
			return array_map(function($table) {
				return $table[0];
			}, $tables);
		}
	
		
		/**
		 * Function to add error page in the admin bar.
		 *
		 * @param string $wp_admin_bar   use to add error page in the admin bar.
		 */
		
		public function display_error_floating_widget() {
			$mode = get_option( 'fe_widgets_mode', 'false' );
			if ( 'true' === $mode ) {
				?>
				<div id="error-log-container" class="error-log-container">
					<div class="error-log-header">
						<span><?php echo esc_html__( 'Error Log', 'easy-error-log' ); ?></span>
						<button id="error-log-toggle" class="error-log-toggle"><?php echo esc_html__( '+', 'easy-error-log' ); ?></button>
					</div>
					<div id="error-log-content" class="error-log-content"></div>
				</div>
				<?php
			}
		}

}