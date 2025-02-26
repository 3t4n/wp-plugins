<?php // Flipdish Ordering - System Info

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}

/**
 * System info class is responsible for managing system info reports.
 *
 * @since 1.4.2
 */
class System_Info {

	/**
	 * Display system info into admin page
	 *
	 * @since 1.4.2
	 * @access private
	 */
	public function display_info() {
		$reports = $this->load_reports();

		?>
		<div>
			<h3><?php echo 'Generated: ' . gmdate( 'l jS \of F Y h:i:s A' ); ?></h3>

			<?php
				$this->print_reports( $reports, 'html' );

				$this->print_reports( $reports, 'raw' );
			?>

		</div>
		<?php

	}

	/**
	 * Load reports.
	 *
	 * @since 1.4.2
	 * @access private
	 *
	 * @return array An array of system info reports.
	 */
	private function load_reports() {
		// Setup
		global $wpdb;
		$locale     = get_locale();
		$theme_data = wp_get_theme();

		// Get plugins that have an update
		$updates = get_plugin_updates();

		// Must-use plugins
		$muplugins      = get_mu_plugins();
		$muplugins_list = array( 'Label' => 'Must Use Plugins' );

		if ( count( $muplugins ) > 0 ) {
			foreach ( $muplugins as $plugin => $plugin_data ) {
				$muplugins_list[ $plugin_data['Name'] ] = $plugin_data['Version'];
			}
		}

		// Multisite plugins
		$network_plugins = array( 'Label' => 'Network Plugins' );
		if ( is_multisite() ) {
			// WordPress Multisite active plugins

			$plugins        = wp_get_active_network_plugins();
			$active_plugins = get_site_option( 'active_sitewide_plugins', array() );

			foreach ( $plugins as $plugin_path ) {
				$plugin_base = plugin_basename( $plugin_path );

				if ( ! array_key_exists( $plugin_base, $active_plugins ) ) {
					continue;
				}

				$update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[ $plugin_path ]->update->new_version . ')' : '';
				$plugin = get_plugin_data( $plugin_path );

				$network_plugins[ $plugin['Name'] ] = $plugin['Version'] . $update;
			}
		}

		// Plugins
		$plugins        = get_plugins();
		$active_plugins = get_option( 'active_plugins', array() );

		$active_plugins_list = array( 'Label' => 'Active Plugins' );
		$inactive_plugins    = array( 'Label' => 'Inactive Plugins' );

		foreach ( $plugins as $plugin_path => $plugin ) {
			$update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[ $plugin_path ]->update->new_version . ')' : '';

			if ( ! in_array( $plugin_path, $active_plugins, true ) ) {
				$inactive_plugins[ $plugin['Name'] ] = $plugin['Version'] . $update;

				continue;
			}

			$active_plugins_list[ $plugin['Name'] ] = $plugin['Version'] . $update;
		}

		// Flipdish settings
		$fd_options                   = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );
		$fd_options['Label']          = 'Flipdish Settings';
		$fd_options['Apple Pay File'] = file_exists( get_home_path() . '.well-known/apple-developer-merchantid-domain-association' ) ? 'Found' : 'Not Found';

		// User Details
		$user  = wp_get_current_user();
		$roles = (array) $user->roles;

		// WordPress config
		$data = array(
			'server'            => array(
				'Label'              => 'Server Environment',
				'Operating System'   => PHP_OS,
				'Software'           => $_SERVER['SERVER_SOFTWARE'],
				'MySQL version'      => $wpdb->db_version(),
				'PHP Version'        => PHP_VERSION,
				'PHP Max Input Vars' => ini_get( 'max_input_vars' ),
				'PHP Max Post Size:' => ini_get( 'post_max_size' ),
			),
			'wordpress'         => array(
				'Label'               => 'WordPress Environment',
				'Version'             => get_bloginfo( 'version' ),
				'Site URL'            => site_url(),
				'Home URL'            => home_url(),
				'WP Multisite'        => is_multisite() ? 'Yes' : 'No',
				'Max Upload Size'     => ini_get( 'upload_max_filesize' ),
				'Memory Limit'        => ini_get( 'memory_limit' ),
				'Permalink Structure' => get_option( 'permalink_structure' ) ? get_option( 'permalink_structure' ) : 'Default',
				'Language'            => ! empty( $locale ) ? $locale : 'en-US',
				'Admin Email'         => get_bloginfo( 'admin_email' ),
				'Debug Mode'          => WP_DEBUG ? 'Active' : 'Deactivated',
			),
			'user'              => array(
				'Label'           => 'User',
				'Username'        => $user->user_login,
				'Email'           => $user->user_email,
				'Role'            => $roles[0],
				'User Agent'      => $_SERVER['HTTP_USER_AGENT'],
				'Browser'         => $this->get_browser_name( $_SERVER['HTTP_USER_AGENT'] ),
				'Install Plugins' => $user->allcaps['install_plugins'] ? 'True' : 'False',
				'Edit Pages'      => $user->allcaps['edit_pages'] ? 'True' : 'False',
				'Update Themes'   => $user->allcaps['update_themes'] ? 'True' : 'False',
			),
			'flipdish_ordering' => $fd_options,
			'theme'             => array(
				'Label'   => 'Theme',
				'Name'    => $theme_data->name,
				'Version' => $theme_data->version,
				'Author'  => $theme_data->author,
			),
			'plugins'           => $active_plugins_list,
			'inactive_plugins'  => $inactive_plugins,
			'muplugins'         => $muplugins_list,
			'plugins_network'   => $network_plugins,
		);

		return $data;
	}


	/**
	 * Print reports
	 *
	 * @since 1.4.2
	 * @access private
	 *
	 * @param string $report_data - Report data
	 * @param string $format - Report format: 'raw' or 'html'
	 */
	private function print_reports( $report_data, $format ) {

		if ( 'html' === $format ) {
			foreach ( $report_data as $report ) :
				?>

				<div style="margin-bottom: 20px;">
					<table class="widefat">
						<thead>
						<tr>
							<th><?php echo $report['Label']; ?></th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<?php

						foreach ( $report as $field_name => $field ) :

							// Skip for section label
							if ( 'Label' === $field_name ) {
								continue;
							}
							?>

							<tr>
								<td width="300px"><?php echo $field_name; ?></td>
								<td><?php echo $field; ?></td>
							</tr>

							<?php
						endforeach;

						?>
						</tbody>
					</table>
				</div>
				<?php
			endforeach;
		} elseif ( 'raw' === $format ) {

			echo '<textarea id="system-info-raw" readonly class="system-info-raw">';

			foreach ( $report_data as $report ) :

				echo '------------ ' . $report['Label'] . " ------------ \r\n";

				foreach ( $report as $field_name => $field ) :

					// Skip for section label
					if ( 'Label' === $field_name ) {
						continue;
					}

					echo $field_name . ': ' . strip_tags( $field ) . "  \r\n";

				endforeach;

				echo "\r\n";
			endforeach;

			echo '</textarea>';
			echo '<button class="button button-primary" onclick="downloadSystemInfo()">Download System Info</button>';
			echo '<button class="button button-secondary" onclick="copySystemInfo()">Copy System Info</button>';
		}
	}

	/**
	 * Return Browser name
	 *
	 * @since 1.4.2
	 * @access private
	 *
	 * @param string $user_agent
	 */
	private function get_browser_name( $user_agent ) {
		$usr = strtolower( $user_agent );
		$usr = ' ' . $usr;

		if ( strpos( $usr, 'opera' ) || strpos( $usr, 'opr/' ) ) {
			return 'Opera';
		} elseif ( strpos( $usr, 'edge' ) ) {
			return 'Edge';
		} elseif ( strpos( $usr, 'chrome' ) ) {
			return 'Chrome';
		} elseif ( strpos( $usr, 'safari' ) ) {
			return 'Safari';
		} elseif ( strpos( $usr, 'firefox' ) ) {
			return 'Firefox';
		} elseif ( strpos( $usr, 'msie' ) || strpos( $usr, 'trident/7' ) ) {
			return 'Internet Explorer';
		}
		return 'Unkown';
	}

};
