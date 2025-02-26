<?php
/**
 * Plugin Name: ActivityLog
 * Description: A WordPress plugin to log user activities, post/page actions, and plugin activation/deactivation/deletion events.
 * Version:     1.1
 * Author:      Anton Simonov
 * Text Domain: activitylog
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ALPL_ActivityLog {
	private $log_file_path;
	const OPTION_NAME = 'alpl_log_retention_days';

	public function __construct() {
		$upload_dir = wp_upload_dir();
		$this->log_file_path = $upload_dir['basedir'] . '/activitylog/activitylog.txt';
		$this->create_log_directory();
		add_action( 'wp_login', [ $this, 'alpl_handle_user_login' ], 10, 2 );
		add_action( 'wp_logout', [ $this, 'alpl_handle_user_logout' ] );
		add_action( 'transition_post_status', [ $this, 'alpl_handle_transition_post_status' ], 10, 3 );
		add_action( 'before_delete_post', [ $this, 'alpl_handle_delete_post' ] );
		add_action( 'activated_plugin', [ $this, 'alpl_handle_plugin_activated' ], 10, 2 );
		add_action( 'deactivated_plugin', [ $this, 'alpl_handle_plugin_deactivated' ], 10, 2 );
		add_action( 'deleted_plugin', [ $this, 'alpl_handle_plugin_deleted' ], 10, 1 );
		add_action( 'admin_menu', [ $this, 'alpl_register_admin_menu' ] );
		add_action( 'admin_init', [ $this, 'alpl_register_settings' ] );
	}

	private function create_log_directory() {
		$upload_dir = wp_upload_dir();
		$log_dir = $upload_dir['basedir'] . '/activitylog/';
		if ( ! file_exists( $log_dir ) ) {
			wp_mkdir_p( $log_dir );
		}
	}

	public function alpl_register_settings() {
		register_setting(
			'alpl_activitylog_settings',
			self::OPTION_NAME,
			[
				'type'              => 'integer',
				'description'       => __( 'How many days to keep the logs?', 'activitylog' ),
				'sanitize_callback' => 'absint',
				'default'           => 7,
			]
		);
		add_settings_section(
			'alpl_activitylog_main_section',
			__( 'Activity Log Settings', 'activitylog' ),
			null,
			'alpl_activitylog_settings'
		);
		add_settings_field(
			self::OPTION_NAME,
			__( 'Retention (days)', 'activitylog' ),
			[ $this, 'alpl_log_retention_days_field_render' ],
			'alpl_activitylog_settings',
			'alpl_activitylog_main_section'
		);
	}

	public function alpl_log_retention_days_field_render() {
		$value = get_option( self::OPTION_NAME, 7 );
		?>
		<input type="number" name="<?php echo esc_attr( self::OPTION_NAME ); ?>" value="<?php echo esc_attr( $value ); ?>" min="1" />
		<?php
	}

	public function alpl_handle_user_login( $user_login, $user ) {
		$message = __( 'User logged in', 'activitylog' );
		$this->alpl_write_log( $message, $user->ID );
	}

	public function alpl_handle_user_logout() {
		$user_id = get_current_user_id();
		$message = __( 'User logged out', 'activitylog' );
		$this->alpl_write_log( $message, $user_id );
	}

	public function alpl_handle_transition_post_status( $new_status, $old_status, $post ) {
		if ( 'revision' === $post->post_type ) {
			return;
		}
		if ( ! $post->ID ) {
			return;
		}
		$label = ( 'page' === $post->post_type ) ? __( 'Page', 'activitylog' ) : __( 'Post', 'activitylog' );
		if ( 'auto-draft' === $old_status && 'auto-draft' !== $new_status ) {
			
			$message = sprintf(
				// translators: 1: post type label, 2: post title, 3: post ID.
				__( 'New %1$s "%2$s" (ID %3$d) created', 'activitylog' ),
				$label,
				$post->post_title,
				(int) $post->ID
			);
			$this->alpl_write_log( $message );
			return;
		}
		if ( 'trash' === $new_status && 'trash' !== $old_status ) {
			$message = sprintf(
				// translators: 1: post type label, 2: post title, 3: post ID.
				__( '%1$s "%2$s" (ID %3$d) moved to Trash', 'activitylog' ),
				$label,
				$post->post_title,
				(int) $post->ID
			);
			$this->alpl_write_log( $message );
			return;
		}
		if ( 'auto-draft' !== $new_status && 'trash' !== $new_status ) {
			$message = sprintf(
				// translators: 1: post type label, 2: post title, 3: post ID.
				__( '%1$s "%2$s" (ID %3$d) updated', 'activitylog' ),
				$label,
				$post->post_title,
				(int) $post->ID
			);
			$this->alpl_write_log( $message );
		}
	}

	public function alpl_handle_delete_post( $post_id ) {
		$post = get_post( $post_id );
		if ( ! $post ) {
			return;
		}
		if ( 'revision' === $post->post_type ) {
			return;
		}
		$label = ( 'page' === $post->post_type ) ? __( 'Page', 'activitylog' ) : __( 'Post', 'activitylog' );
		$message = sprintf(
			// translators: 1: post type label, 2: post title, 3: post ID.
			__( '%1$s "%2$s" (ID %3$d) permanently deleted', 'activitylog' ),
			$label,
			$post->post_title,
			(int) $post_id
		);
		$this->alpl_write_log( $message );
	}

	public function alpl_handle_plugin_activated( $plugin, $network_wide ) {
		$plugin_name = $this->alpl_get_plugin_name( $plugin );
		// translators: %s: plugin name.
		$message = sprintf( __( 'Plugin "%s" was activated.', 'activitylog' ), $plugin_name );
		$this->alpl_write_log( $message );
	}

	public function alpl_handle_plugin_deactivated( $plugin, $network_wide ) {
		$plugin_name = $this->alpl_get_plugin_name( $plugin );
		// translators: %s: plugin name.
		$message = sprintf( __( 'Plugin "%s" was deactivated.', 'activitylog' ), $plugin_name );
		$this->alpl_write_log( $message );
	}

	public function alpl_handle_plugin_deleted( $plugin ) {
		$plugin_name = $this->alpl_get_plugin_name( $plugin );
		// translators: %s: plugin name.
		$message = sprintf( __( 'Plugin "%s" was deleted.', 'activitylog' ), $plugin_name );
		$this->alpl_write_log( $message );
	}

	private function alpl_get_plugin_name( $plugin_path ) {
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		$all_plugins = get_plugins();
		return isset( $all_plugins[ $plugin_path ] ) ? $all_plugins[ $plugin_path ]['Name'] : $plugin_path;
	}

	private function alpl_write_log( $action, $user_id = 0 ) {
		if ( ! $user_id ) {
			$user_id = get_current_user_id();
		}
		$user = get_user_by( 'ID', $user_id );
		$user_login = $user ? $user->user_login : __( 'Unknown', 'activitylog' );
		$date_time = current_time( 'mysql' );
		$log_entry = sprintf( "%s | %s | %s\n", $date_time, $user_login, $action );
		$this->alpl_append_to_log_file( $log_entry );
		$this->alpl_cleanup_logs();
	}

	private function alpl_cleanup_logs() {
		$retention_days = (int) get_option( self::OPTION_NAME, 7 );
		if ( $retention_days <= 0 ) {
			return;
		}
		if ( ! $this->alpl_file_exists( $this->log_file_path ) ) {
			return;
		}
		$lines = $this->alpl_get_file_lines( $this->log_file_path );
		$now = current_time( 'timestamp' );
		$new_lines = [];
		foreach ( $lines as $line ) {
			$parts = explode( '|', $line, 3 );
			if ( count( $parts ) < 3 ) {
				continue;
			}
			$date_time_str = trim( $parts[0] );
			$log_timestamp = strtotime( $date_time_str );
			if ( false === $log_timestamp ) {
				continue;
			}
			$diff_days = ( $now - $log_timestamp ) / DAY_IN_SECONDS;
			if ( $diff_days <= $retention_days ) {
				$new_lines[] = $line;
			}
		}
		$content = implode( "\n", $new_lines ) . "\n";
		$this->alpl_write_file_contents( $this->log_file_path, $content );
	}

	public function alpl_register_admin_menu() {
		add_menu_page( __( 'Activity Log', 'activitylog' ), __( 'Activity Log', 'activitylog' ), 'manage_options', 'activitylog', [ $this, 'alpl_render_admin_page' ], 'dashicons-admin-site', 80 );
		add_submenu_page( 'activitylog', __( 'Activity Log Settings', 'activitylog' ), __( 'Settings', 'activitylog' ), 'manage_options', 'alpl_activitylog_settings', [ $this, 'alpl_render_settings_page' ] );
	}

	public function alpl_render_admin_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$filter = isset( $_GET['filter'] ) ? sanitize_text_field( $_GET['filter'] ) : 'all';
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Activity Log', 'activitylog' ); ?></h1>
			<form method="get" action="">
				<input type="hidden" name="page" value="activitylog" />
				<label for="filter"><?php esc_html_e( 'Filter by event type:', 'activitylog' ); ?></label>
				<select name="filter" id="filter">
					<option value="all" <?php selected( $filter, 'all' ); ?>><?php esc_html_e( 'All', 'activitylog' ); ?></option>
					<option value="login" <?php selected( $filter, 'login' ); ?>><?php esc_html_e( 'Login/Logout', 'activitylog' ); ?></option>
					<option value="publication" <?php selected( $filter, 'publication' ); ?>><?php esc_html_e( 'Publications', 'activitylog' ); ?></option>
					<option value="plugin" <?php selected( $filter, 'plugin' ); ?>><?php esc_html_e( 'Plugins', 'activitylog' ); ?></option>
					<option value="user" <?php selected( $filter, 'user' ); ?>><?php esc_html_e( 'Users', 'activitylog' ); ?></option>
				</select>
				<input type="submit" class="button" value="<?php esc_attr_e( 'Apply Filter', 'activitylog' ); ?>" />
			</form>
			<?php
			if ( ! $this->alpl_file_exists( $this->log_file_path ) ) {
				echo '<p>' . esc_html__( 'No log file found.', 'activitylog' ) . '</p>';
				echo '</div>';
				return;
			}
			$all_lines = $this->alpl_get_file_lines( $this->log_file_path );
			if ( empty( $all_lines ) ) {
				echo '<p>' . esc_html__( 'No log entries found.', 'activitylog' ) . '</p>';
				echo '</div>';
				return;
			}
			$filtered_lines = [];
			foreach ( $all_lines as $line ) {
				$line = trim( $line );
				if ( empty( $line ) ) {
					continue;
				}
				$parts = explode( '|', $line, 3 );
				if ( count( $parts ) < 3 ) {
					continue;
				}
				$action = trim( $parts[2] );
				if ( $filter === 'all' ) {
					$filtered_lines[] = $line;
				} elseif ( $filter === 'login' ) {
					if ( stripos( $action, 'logged in' ) !== false || stripos( $action, 'logged out' ) !== false ) {
						$filtered_lines[] = $line;
					}
				} elseif ( $filter === 'publication' ) {
					if ( stripos( $action, 'Post' ) !== false || stripos( $action, 'Page' ) !== false ) {
						$filtered_lines[] = $line;
					}
				} elseif ( $filter === 'plugin' ) {
					if ( stripos( $action, 'Plugin' ) !== false ) {
						$filtered_lines[] = $line;
					}
				} elseif ( $filter === 'user' ) {
					if ( stripos( $action, 'User' ) !== false && stripos( $action, 'logged in' ) === false && stripos( $action, 'logged out' ) === false ) {
						$filtered_lines[] = $line;
					}
				}
			}
			$all_lines = array_reverse( $filtered_lines );
			$lines_per_page = 20;
			$total_lines = count( $all_lines );
			$total_pages = ceil( $total_lines / $lines_per_page );
			$paged = isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1;
			if ( $paged < 1 ) {
				$paged = 1;
			}
			if ( $paged > $total_pages ) {
				$paged = $total_pages;
			}
			$offset = ( $paged - 1 ) * $lines_per_page;
			$lines_for_page = array_slice( $all_lines, $offset, $lines_per_page );
			?>
			<table class="widefat fixed striped">
				<thead>
					<tr>
						<th><?php esc_html_e( 'Date/Time', 'activitylog' ); ?></th>
						<th><?php esc_html_e( 'User', 'activitylog' ); ?></th>
						<th><?php esc_html_e( 'Action', 'activitylog' ); ?></th>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach ( $lines_for_page as $line ) {
					$parts = explode( '|', $line, 3 );
					if ( count( $parts ) < 3 ) {
						continue;
					}
					$date_time = trim( $parts[0] );
					$user = trim( $parts[1] );
					$action = trim( $parts[2] );
					?>
					<tr>
						<td><?php echo esc_html( $date_time ); ?></td>
						<td><?php echo esc_html( $user ); ?></td>
						<td><?php echo esc_html( $action ); ?></td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
			<?php
			if ( $total_pages > 1 ) {
				echo '<div style="margin-top:20px;">';
				if ( $paged > 1 ) {
					$prev_page = $paged - 1;
					$prev_link = wp_nonce_url( add_query_arg( array( 'paged' => $prev_page, 'filter' => $filter ) ), 'paged_pagination' );
					echo '<a style="margin-right:5px;" href="' . esc_url( $prev_link ) . '">« ' . esc_html__( 'Previous', 'activitylog' ) . '</a>';
				}
				for ( $i = 1; $i <= $total_pages; $i++ ) {
					$page_link = wp_nonce_url( add_query_arg( array( 'paged' => $i, 'filter' => $filter ) ), 'paged_pagination' );
					if ( $i === $paged ) {
						echo '<strong style="margin-right:5px;">' . intval( $i ) . '</strong>';
					} else {
						echo '<a style="margin-right:5px;" href="' . esc_url( $page_link ) . '">' . intval( $i ) . '</a>';
					}
				}
				if ( $paged < $total_pages ) {
					$next_page = $paged + 1;
					$next_link = wp_nonce_url( add_query_arg( array( 'paged' => $next_page, 'filter' => $filter ) ), 'paged_pagination' );
					echo '<a style="margin-right:5px;" href="' . esc_url( $next_link ) . '">' . esc_html__( 'Next', 'activitylog' ) . ' »</a>';
				}
				echo '</div>';
			}
			?>
		</div>
		<?php
	}

	public function alpl_render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( isset( $_POST['clear_logs'] ) && check_admin_referer( 'alpl_clear_logs' ) ) {
			if ( $this->alpl_file_exists( $this->log_file_path ) ) {
				$this->alpl_write_file_contents( $this->log_file_path, '' );
				echo '<div class="notice notice-success is-dismissible"><p>' . esc_html__( 'Logs cleared successfully.', 'activitylog' ) . '</p></div>';
			} else {
				echo '<div class="notice notice-error is-dismissible"><p>' . esc_html__( 'Log file not found.', 'activitylog' ) . '</p></div>';
			}
		}
		?>
		<div class="wrap">
			<form method="post" action="options.php">
				<?php
				settings_fields( 'alpl_activitylog_settings' );
				do_settings_sections( 'alpl_activitylog_settings' );
				submit_button();
				?>
			</form>
			<form method="post" action="" style="margin-top:10px;">
				<?php wp_nonce_field( 'alpl_clear_logs' ); ?>
				<input type="submit" name="clear_logs" class="button button-secondary" value="<?php esc_attr_e( 'Clear Logs', 'activitylog' ); ?>" onclick="return confirm('<?php esc_attr_e( 'Are you sure you want to clear all logs?', 'activitylog' ); ?>');" />
			</form>
		</div>
		<?php
	}

	private function alpl_file_exists( $file_path ) {
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		WP_Filesystem();
		global $wp_filesystem;
		if ( ! $wp_filesystem ) {
			return false;
		}
		return $wp_filesystem->exists( $file_path );
	}

	private function alpl_get_file_lines( $file_path ) {
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		WP_Filesystem();
		global $wp_filesystem;
		if ( ! $wp_filesystem ) {
			return [];
		}
		$content = $wp_filesystem->get_contents( $file_path );
		if ( ! $content ) {
			return [];
		}
		return preg_split( '/\r\n|\r|\n/', $content );
	}

	private function alpl_write_file_contents( $file_path, $content ) {
		if ( ! function_exists( 'WP_Filesystem' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		WP_Filesystem();
		global $wp_filesystem;
		if ( ! $wp_filesystem ) {
			return;
		}
		$wp_filesystem->put_contents( $file_path, $content, FS_CHMOD_FILE );
	}

	private function alpl_append_to_log_file( $new_line ) {
		if ( ! $this->alpl_file_exists( $this->log_file_path ) ) {
			$this->alpl_write_file_contents( $this->log_file_path, $new_line );
			return;
		}
		$existing_lines = $this->alpl_get_file_lines( $this->log_file_path );
		$existing_lines[] = rtrim( $new_line, "\n" );
		$content = implode( "\n", $existing_lines ) . "\n";
		$this->alpl_write_file_contents( $this->log_file_path, $content );
	}
}

function alpl_init_plugin() {
	new ALPL_ActivityLog();
}
add_action( 'plugins_loaded', 'alpl_init_plugin' );