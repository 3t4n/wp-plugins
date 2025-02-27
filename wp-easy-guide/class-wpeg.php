<?php
/**
 * WordPress EasyGuide Main Class
 *
 * @package WPEG_Admin
 * @since 1.0.0
 */

/**
 * WPEG Main Class
 */
class WPEG {
	/**
	 * Check if has been initialized or not yet.
	 *
	 * @var boolean
	 */
	private static $initiated = false;

	/**
	 * Initiaalization.
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! self::$initiated ) {
			self::$initiated = true;
			// Do your action here.
		}
	}

	/**
	 * WPEG Guide Table.
	 *
	 * @var string
	 */
	public static $guide_table = 'wpeg_guides';

	/**
	 * WPEG Step Table.
	 *
	 * @var string
	 */
	public static $step_table = 'wpeg_steps';

	/**
	 * Attached to activate_{ plugin_basename( __FILES__ ) } by register_activation_hook().
	 *
	 * @param mixed $plugin Plugin.
	 * @static
	 */
	public static function plugin_activation( $plugin ) {
		$wpeg_db_version = get_option( 'wpeg_db_version', false );

		if ( ! $wpeg_db_version ) {
			self::update_db_version();

			if ( self::all_table_exists() ) {
				self::update_db();
			} else {
				self::install_new_db();
			}
		} else {
			self::update_db();
		}

		add_option( 'wpeg_plugin_activation', true );
	}
	/**
	 * Removes all connection options.
	 *
	 * @static
	 */
	public static function plugin_deactivation() {
	}

	/**
	 * Display raw html on activate or deactivation.
	 *
	 * @param string  $message Message.
	 * @param boolean $deactivate Is deactivation.
	 * @return void
	 */
	private static function raw_html( $message, $deactivate = true ) {
	?>
<!doctype html>
<html>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<style>
* {
	text-align: center;
	margin: 0;
	padding: 0;
	font-family: "Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
}
p {
	margin-top: 1em;
	font-size: 18px;
}
</style>
<body>
<p><?php echo wp_kses( $message, array( 'strong' ) ); ?></p>
</body>
</html>
	<?php
	if ( $deactivate ) {
		$plugins = get_option( 'active_plugins' );
		$akismet = plugin_basename( WPEG_PLUGIN_DIR . 'wpeg.php' );
		$update  = false;

		foreach ( $plugins as $i => $plugin ) {
			if ( $plugin === $akismet ) {
				$plugins[ $i ] = false;
				$update        = true;
			}
		}

		if ( $update ) {
			update_option( 'active_plugins', array_filter( $plugins ) );
		}
	}
		exit;
	}

	/**
	 * Viewer in MVC.
	 *
	 * @param string $name Filename.
	 * @param array  $args Additional Arguments.
	 * @return void
	 */
	public static function view( $name, array $args = array() ) {
		$args = apply_filters( 'wpeg_view_arguments', $args, $name );

		foreach ( $args as $key => $val ) {
			$$key = $val;
		}

			load_plugin_textdomain( 'wpeg' );

		$file = WPEG_PLUGIN_DIR . 'views/' . $name . '.php';
		include $file;
	}

	/**
	 * DB updates and callbacks that need to be run per version.
	 *
	 * @var array
	 */
	private static $db_updates = array(
		'1.0.1' => array(
			'wpeg_update_101_steps_structure',
			'wpeg_update_101_db_version',
		),
	);

	/**
	 * Create new tables
	 */
	private static function install_new_db() {
		global $wpdb;

		// Add database structure.
		if ( ! function_exists( 'dbDelta' ) ) {
			require_once ABSPATH . '/wp-admin/includes/upgrade.php';
		}

		// Guides table.
		$guides_table = $wpdb->prefix . self::$guide_table;

		if ( $guides_table !== $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', esc_sql( $guides_table ) ) ) ) {
			$sql = 'CREATE TABLE `' . esc_sql( $guides_table ) . '` (' .
				'`ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,' .
				'`title` varchar(255) NOT NULL,' .
				'`description` text,' .
				'`active` BOOLEAN DEFAULT TRUE,' .
				'`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,' .
				'PRIMARY KEY (`ID`)' .
				') ENGINE=InnoDB DEFAULT CHARSET=utf8;';
			dbDelta( $sql );
		}

		// Steps table.
		$steps_table = $wpdb->prefix . self::$step_table;

		if ( $steps_table !== $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', esc_sql( $steps_table ) ) ) ) {
			$sql = 'CREATE TABLE `' . esc_sql( $steps_table ) . '` (' .
				'`ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,' .
				'`guide_id` bigint(20) UNSIGNED NOT NULL,' .
				'`order` int(10) UNSIGNED NOT NULL, ' .
				'`title` varchar(255) DEFAULT NULL,' .
				'`description` text,' .
				'`action` text DEFAULT NULL,' .
				'`type` varchar(255) DEFAULT NULL,' .
				'`selector` varchar(255),' .
				'`uri` varchar(255) DEFAULT NULL,' .
				'`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,' .
				'PRIMARY KEY (`ID`)' .
				') ENGINE=InnoDB DEFAULT CHARSET=utf8;';
			dbDelta( $sql );
		}

		end( self::$db_updates );
		self::update_db_version( key( self::$db_updates ) );
	}

	/**
	 * Push all needed DB updates to the queue for processing.
	 */
	private static function update_db() {
		require_once WPEG_PLUGIN_DIR . 'wpeg-update-functions.php';

		$current_db_version = self::db_version();

		foreach ( self::$db_updates as $version => $update_callbacks ) {
			if ( version_compare( $current_db_version, $version, '<' ) ) {
				foreach ( $update_callbacks as $update_callback ) {
					call_user_func( $update_callback );
				}
			}
		}
	}

	/**
	 * Check if all database tables exists.
	 */
	private static function all_table_exists() {
		global $wpdb;

		// Guides table.
		$guides_table     = $wpdb->prefix . self::$guide_table;
		$has_guides_table = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', esc_sql( $guides_table ) ) );

		// Steps table.
		$steps_table     = $wpdb->prefix . self::$step_table;
		$has_steps_table = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', esc_sql( $steps_table ) ) );

		$result = ( $has_guides_table && $has_steps_table ) ? true : false;

		return $result;
	}

	/**
	 * Get DB version.
	 */
	public static function db_version() {
		return get_option( 'wpeg_db_version', '1.0.0' );
	}

	/**
	 * Update DB version to current.
	 *
	 * @param string|null $version New WPEG DB version or null.
	 */
	public static function update_db_version( $version = null ) {
		delete_option( 'wpeg_db_version' );
		add_option( 'wpeg_db_version', is_null( $version ) ? self::db_version() : $version );
	}
}
