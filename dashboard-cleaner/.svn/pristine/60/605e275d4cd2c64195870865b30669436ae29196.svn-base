<?php
/*
Plugin Name: Dashboard Cleaner
Plugin URI: https://nintechnet.com/bruandet/
Description: Reclaim your admin dashboard: Get rid of annoying banners, unwanted ads and other nuisances.
Author: Jerome Bruandet
Version: 1.1.6
Author URI: https://nintechnet.com/
License: GPLv3 or later
Text Domain: dashboard-cleaner
Domain Path: /languages
*/

define( 'DHCL_VERSION', '1.1.6' );

/*
 +=====================================================================+
 |     ____            _     _                         _               |
 |    |  _ \  __ _ ___| |__ | |__   ___   __ _ _ __ __| |              |
 |    | | | |/ _` / __| '_ \| '_ \ / _ \ / _` | '__/ _` |              |
 |    | |_| | (_| \__ \ | | | |_) | (_) | (_| | | | (_| |              |
 |    |____/ \__,_|___/_| |_|_.__/ \___/ \__,_|_|  \__,_|              |
 |      ____ _                                                         |
 |     / ___| | ___  __ _ _ __   ___ _ __                              |
 |    | |   | |/ _ \/ _` | '_ \ / _ \ '__|                             |
 |    | |___| |  __/ (_| | | | |  __/ |                                |
 |     \____|_|\___|\__,_|_| |_|\___|_|                                |
 |                                                                     |
 | (c) Jerome Bruandet ~ https://nintechnet.com/bruandet/              |
 +=====================================================================+
*/

if (! defined( 'ABSPATH' ) ) { die( 'Forbidden' ); }

/* ================================================================== */
$i18n = __( "Reclaim your admin dashboard: Get rid of annoying banners, '.
		'unwanted ads and other nuisances.", "dashboard-cleaner" );
/* ================================================================== */

function dhcl_activate() {

	// Make sure the blog meets the requirements:

	global $wp_version;
	if ( version_compare( $wp_version, '3.3', '<' ) ) {
		exit( sprintf(
		__( 'Dashboard Cleaner requires WordPress 3.3 or greater but your current version is %s.',
		'dashboard-cleaner' ),
		htmlspecialchars( $wp_version ) ) );
	}

	if ( version_compare( PHP_VERSION, '5.3.0', '<' ) ) {
		exit( sprintf(
		__( 'Dashboard Cleaner requires PHP 5.3 or greater but your current version is %s.',
		'dashboard-cleaner' ),
		PHP_VERSION ) );
	}

	set_transient( 'dhcl_activate', 1, 15 );

}

register_activation_hook( __FILE__, 'dhcl_activate' );

/* ================================================================== */

function dhcl_init() {

	// Initialize DHCL and set up its configuration folder
	// as well as its default options, if this is the first run:

	$dhcl_options = get_option( 'dhcl_options' );
	if (! empty( $dhcl_options['user_filters'] ) ) {
		// Not the first time we are running:
		return;
	}

	// Create the configuration folder:
	$ud = wp_upload_dir();
	if (! is_dir( $ud['basedir'] ) ) {
		echo '<div class="error notice is-dismissible"><p>'.
		__("Error: 'wp_upload_dir' did not return WordPress upload directory. Aborting.",
		"dashboard-cleaner") .
		'</p></div>';
		return;

	}
	$dir = "{$ud['basedir']}/dashboard-cleaner";
	if (! is_dir( $dir ) ) {
		if (! @mkdir( $dir ) ) {
			echo '<div class="error notice is-dismissible"><p>'.
			sprintf( 	__("Error: unable to create %s directory. Aborting.", "dashboard-cleaner"),
			'<code>'. htmlspecialchars( $dir ) .'</code>' ) .
			'</p></div>';
			return;
		}
	}
	touch( "{$ud['basedir']}/dashboard-cleaner/index.html" );
	file_put_contents( "{$ud['basedir']}/dashboard-cleaner/.htaccess", "deny from all\n" );

	// Set all default values:
	$dhcl_options['user_filters'] = uniqid( 'dhcl_', true );
	$dhcl_options['border-color'] = "#FFA500";
	$dhcl_options['border-color-hash'] = "#FFA500";
	$dhcl_options['border-width'] = 2;
	$dhcl_options['show-label'] = 1;
	$dhcl_options['transition-effect'] = 1;
	$dhcl_options['crosshair-cursor'] = 1;
	$dhcl_options['apply-to'] = 1;

	// Update/create DHCL options:
	update_option( 'dhcl_options', $dhcl_options );

}

add_action( 'admin_init', 'dhcl_init' );

/* ================================================================== */

function dhcl_settings_link( $links ) {

	// Display the link in the "Plugins" page:

   $links[] = '<a href="'. get_admin_url( null, 'tools.php?page=dashboard-cleaner') .
					'">'.	__('Settings', 'dashboard-cleaner'). '</a>';
	return $links;

}

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'dhcl_settings_link' );

/* ================================================================== */

function create_dhcl_menu() {

	// If the request comes from a network admin screen, ignore it:
	if ( is_network_admin() ) {
		return;
	}

	// Display the adminbar menu to the admin, in the backend section only:
	if (! current_user_can( 'manage_options' ) || ! is_admin() ) {
		return;
	}

	global $wp_admin_bar;
	$menu_id = 'dhcl';

	$wp_admin_bar->add_menu( array(
		'id' => $menu_id,
		'title' => '<span id="dhcl-main">DHCL</span><span id="dhcl_placeholder"></span> <span>(~~DHCL~~)</span>',
		'meta' => array( 'title' => __( 'Elements blocked in this page:', 'dashboard-cleaner' ) . ' ~~DHCL~~ ' )
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => $menu_id,
		'title' => '<span id="dhcl-start" style="cursor:pointer;display:block">' . __( 'Start...', 'dashboard-cleaner' ) . '</span>',
		'id' => 'dhcl-start',
		'meta' => array( 'title' => __( 'Click this menu, then move your mouse over any HTML element and click on it.', 'dashboard-cleaner' ) )
	) );

	// Display "Undo last action" menu only if there is at least one filter enabled:
	$filters = array();
	$filters = dhcl_get_filters();
	if (! empty( $filters[0] ) ) {
		// Security nonce:
		$dhcl_nonce = wp_create_nonce( 'dhcl_undo_nonce' );
		$wp_admin_bar->add_menu( array(
			'parent' => $menu_id,
			'title' => '<span id="dhcl-undo" style="cursor:pointer;display:block" onClick="javascript:if(confirm(i18n_undo)) {window.location.search+=\'&dhcl_undo=1&dhcl_nonce='. $dhcl_nonce .'\'}">' . __( 'Undo last action', 'dashboard-cleaner' ) . '</span>',
			'id' => 'dhcl-undo',
			'meta' => array( 'title' => __( 'Click this menu if you want to undo the last action.', 'dashboard-cleaner' ) )
		) );
	} else {
		$wp_admin_bar->add_menu( array(
			'parent' => $menu_id,
			'title' => '<span id="dhcl-undo" style="cursor:not-allowed;display:block;opacity:0.5" onClick="alert(\'' . __( "You do not have any filter yet.", 'dashboard-cleaner' ) . '\')">' . __( 'Undo last action', 'dashboard-cleaner' ) . '</span>',
			'id' => 'dhcl-undo',
			'meta' => array( 'title' => __( 'Click this menu if you want to undo the last action.', 'dashboard-cleaner' ) )
		) );
	}

	$wp_admin_bar->add_menu( array(
		'parent' => $menu_id,
		'title' => __( 'Settings', 'dashboard-cleaner' ),
		'id' => 'dhcl-settings',
		'href' => 'tools.php?page=dashboard-cleaner&dhcltab=settings',
		'meta' => array('title' => __( 'Click to access your settings.', 'dashboard-cleaner') )
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => $menu_id,
		'title' => sprintf( _n( 'Manage filters (%s item)', 'Manage filters (%s items)', count( $filters ), 'dashboard-cleaner' ), count( $filters ) ),

		'id' => 'dhcl-filters',
		'href' => 'tools.php?page=dashboard-cleaner&dhcltab=filters',
		'meta' => array('title' => 'Click to manage your filters.', 'dashboard-cleaner')
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => $menu_id,
		'title' => __( 'About', 'dashboard-cleaner' ),
		'id' => 'dhcl-about',
		'href' => 'tools.php?page=dashboard-cleaner&dhcltab=about',
		'meta' => array('title' => __( 'About', 'dashboard-cleaner') )
	) );

	$wp_admin_bar->add_menu( array(
		'parent' => $menu_id,
		'title' => __( 'Info', 'dashboard-cleaner' ),
		'id' => 'dhcl-help',
		'href' => 'tools.php?page=dashboard-cleaner&dhcltab=donate',
		'meta' => array('title' => __( 'Info', 'dashboard-cleaner') )
	) );

}

add_action( 'admin_bar_menu', 'create_dhcl_menu', 2000 );

/* ================================================================== */

function dhcl_admin_menu() {

	// Append DHCL submenu to the "Tools" menu:

	$menu_hook = add_submenu_page(
		'tools.php',
		'Dashboard Cleaner',
		'Dashboard Cleaner',
		'manage_options',
		'dashboard-cleaner',
		'dhcl_main_menu'
	);

	// Load contextual help:
	require_once( plugin_dir_path(__FILE__) . 'help.php' );
	add_action( 'load-' . $menu_hook, 'dhcl_help' );

}

add_action('admin_menu', 'dhcl_admin_menu');

/* ================================================================== */

function dhcl_main_menu() {

	// Show the selected tab and page:

	$tab = array ( 'settings', 'filters', 'about', 'donate' );
	// Make sure $_GET['dhcltab']'s value is okay,
	// otherwise set it to its default 'settings' value:
	if (! isset( $_GET['dhcltab'] ) || ! in_array( $_GET['dhcltab'], $tab ) ) {
		$_GET['dhcltab'] = 'settings';
	}

	$dhcl_menu = "dhcl_menu_{$_GET['dhcltab']}";
	$dhcl_menu();

}

/* ================================================================== */

function dhcl_display_tabs( $which ) {

	// Display (in)active tabs:

	$t1 = ''; $t2 = ''; $t3 = ''; $t4 = '';

	if ( $which == 1 ) {
		$t1 = ' nav-tab-active';
	} elseif ( $which == 2 ) {
		$t2 = ' nav-tab-active';
	} elseif ( $which == 3 ) {
		$t3 = ' nav-tab-active';
	} elseif ( $which == 4 ) {
		$t4 = ' nav-tab-active';
	}

	?>
	<h2 class="nav-tab-wrapper wp-clearfix">
		<a href="?page=dashboard-cleaner&dhcltab=settings" class="nav-tab<?php
			echo $t1 ?>"><?php _e( 'Settings', 'dashboard-cleaner' ) ?></a>
		<a href="?page=dashboard-cleaner&dhcltab=filters" class="nav-tab<?php
			echo $t2 ?>"><?php _e( 'Filters', 'dashboard-cleaner' ) ?></a>
		<a href="?page=dashboard-cleaner&dhcltab=about" class="nav-tab<?php
			echo $t4 ?>"><?php _e( 'About', 'dashboard-cleaner' ) ?></a>
		<a href="?page=dashboard-cleaner&dhcltab=donate" class="nav-tab<?php
			echo $t3 ?>"><?php _e( 'Info', 'dashboard-cleaner' ) ?></a>
	</h2>
	<?php

}

/* ================================================================== */

function dhcl_js_insert() {

	// Load our scripts:

	// If the request comes from a network admin screen, ignore it:
	if ( is_network_admin() ) {
		return;
	}

	$dhcl_options = get_option( 'dhcl_options' );

	// Check if the filters shall apply to the admin only or to any logged in user:
	if ( empty( $dhcl_options['apply-to'] ) || $dhcl_options['apply-to'] == 1 ) {
		// Admin only:
		if (! current_user_can( 'manage_options' ) ) {
			return;
		}
	}

	// Load JS common code needed for the Settings, Filters and About pages only:
	if (! empty( $_GET['dhcltab'] ) && ( $_GET['dhcltab'] == 'settings' ||
		$_GET['dhcltab'] == 'filters' || $_GET['dhcltab'] == 'about' ) ) {
		wp_enqueue_script(
			'dhclcommon',
			plugin_dir_url( __FILE__ ) . 'static/common.min.js',
			array( 'jquery' )
		);
	}

	// If we just enabled the plugin, load the style sheet
	// to add a pulse effect to the menu:
	if ( false !== ( $value = get_transient( 'dhcl_activate' ) ) ) {
		delete_transient( 'dhcl_activate' );
		wp_enqueue_style(
			'dhclstyle',
			plugin_dir_url( __FILE__ ) . 'static/dashboard-cleaner.min.css'
		);
	}
	?>

	<script type="text/javascript">
	<?php

	// Don't edit DHCL own pages!
	if ( isset( $_GET['page'] ) && $_GET['page'] == 'dashboard-cleaner' ) {
		echo "var its_me = 1;\n";
	} else {
		echo "var its_me = 0;\n";
	}

	// Used to display an error/update dismissable notice after a form submission:
	global $dhcl_form_result;

	?>
		var dhcl_form_result = '<?php echo empty( $dhcl_form_result ) ? '' : addslashes( $dhcl_form_result ) ?>';
		if ( dhcl_form_result != '' ) {
			document.write( dhcl_form_result );
		}
		var dhcl_borderColor = '<?php echo esc_js( $dhcl_options['border-color'] ) ?>';
		var dhcl_label = <?php echo (int)$dhcl_options['show-label'] ?>;
		var dhcl_borderWidth = <?php echo (int)$dhcl_options['border-width'] ?>;
		var dhcl_crosshair = <?php echo (int)$dhcl_options['crosshair-cursor'] ?>;
		var dhcl_transition = <?php echo (int)$dhcl_options['transition-effect'] ?>;
		var i18n_running = '<span id="dhcl-span" style="background-color:orange;padding:4px;border-radius:2px;color:white;box-shadow: 1px 1px 2px #7F0000 inset;"><?php
			echo esc_js( __( "Running (ESC to cancel)", 'dashboard-cleaner' ) ) ?></span>';
		var i18n_itsme = "<?php
			echo esc_js( __( "Please don't try to delete elements from Dashboard Cleaner's own page or menu, otherwise you might not be able to undo your modification!", 'dashboard-cleaner' ) ) ?>";
		var i18n_disallowed = "<?php
			echo esc_js( __( "Sorry, but this is a core element of WordPress and it shouldn't be deleted!", 'dashboard-cleaner' ) ) ?>";
		var i18n_main = "DHCL";
		var i18n_noattr = "<?php
			echo esc_js( __( "No attribute found!", 'dashboard-cleaner' ) ) ?>";
		var i18n_viewHTML = "<?php
			echo esc_js( __( "View selected HTML source", 'dashboard-cleaner' ) ) ?>";
		var i18n_closeHTML = "<?php
			echo esc_js( __( "Close selected HTML source", 'dashboard-cleaner' ) ) ?>";
		var i18n_undo = "<?php
			echo esc_js( __( "This action will delete the last saved filter. Continue?", 'dashboard-cleaner' ) ) ?>";
		var i18n_select_attr = "<?php
			echo esc_js( __( "You must select a valid attribute name and value pair.", 'dashboard-cleaner' ) ) ?>";
		var i18n_select_tag = "<?php
			echo esc_js( __( "You must enter a valid HTML element.", 'dashboard-cleaner' ) ) ?>";
		var i18n_checkbox = "<?php
			echo esc_js( __( "You must select at least one filter to delete.", 'dashboard-cleaner' ) ) ?>";
	</script>
	<?php

	// Load the JS external main script:
	wp_enqueue_script(
		'dhclmainscript',
		plugin_dir_url( __FILE__ ) . 'static/dashboard-cleaner.min.js',
		array( 'jquery' )
	);

	// Load the thickbox dialogbox:
	require( __DIR__ . '/thickbox.php' );

}

add_action( 'admin_footer', 'dhcl_js_insert' );

/* ================================================================== */

function dhcl_menu_settings() {

	// Settings Menu

	// Save options?
	if ( isset( $_POST['dhcl_settings'] ) ) {
		if ( empty( $_POST['dhcl_nonce']) || ! wp_verify_nonce( $_POST['dhcl_nonce'], 'dhcl_settings' ) ) {
			wp_nonce_ays('dhcl_settings');
		}
		dhcl_menu_settings_save();
		echo '<div class="updated notice is-dismissible"><p>' .
			__('Your changes have been saved.', 'dashboard-cleaner') . '</p></div>';
	}

	$dhcl_options = dhcl_menu_get_settings();

?>
<div class="wrap">
	<h1>Dashboard Cleaner</h1>

	<?php dhcl_display_tabs( 1 ) ?>

	<form name="dhfc-settings-table" method="post" action="?page=dashboard-cleaner&tab=settings">

		<?php wp_nonce_field('dhcl_settings', 'dhcl_nonce', 0); ?>

		<div style="width:100%;">
			<div style="display:inline-block;width:70%">
				<h3><?php _e('Interface', 'dashboard-cleaner') ?></h3>
			</div>
			<div style="display:inline-block;">
				<span class="description"><?php _e('Click on the "Help" tab for help!', 'dashboard-cleaner') ?></span>
			</div>
		</div>
		<table class="form-table">
			<tr>
				<th scope="row"><?php _e('Border color', 'dashboard-cleaner') ?></th>
				<td>
					<input type="text" id="border-color" name="border-color" value="<?php echo htmlspecialchars( $dhcl_options['border-color'] ) ?>" style="border: <?php echo htmlspecialchars( $dhcl_options['border-width'] ) ?>px solid <?php echo htmlspecialchars( $dhcl_options['border-color-hash'] ) ?>" oninput="dhcl_change_color(this.value)" onpaste="dhcl_change_color(this.value);" />
					<p><span class="description"><?php _e('Hexadecimal value (e.g., <code>FFA500</code>) or CSS color name (e.g., <code>red</code>, <code>blue</code>).', 'dashboard-cleaner') ?></span></p>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e('Border width', 'dashboard-cleaner') ?></th>
				<td>
					<input type="number" class="small-text" name="border-width" step="1" min="1" max="10" value="<?php echo htmlspecialchars( $dhcl_options['border-width'] ) ?>" onchange="dhcl_change_border(this.value);" /> px
					<p><span class="description"><?php _e('From 1 to 10px.', 'dashboard-cleaner') ?></span></p>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e('Show label', 'dashboard-cleaner') ?></th>
				<td>
					<label><input type="radio" name="show-label" value="1"<?php checked( $dhcl_options['show-label'], 1 ) ?> /><?php _e('Yes', 'dashboard-cleaner') ?> <?php _e('(default)', 'dashboard-cleaner') ?></label>
					&nbsp;&nbsp;&nbsp;
					<label><input type="radio" name="show-label" value="0"<?php checked( $dhcl_options['show-label'], 0 ) ?> /><?php _e('No', 'dashboard-cleaner') ?></label>
					<p><span class="description"><?php _e('The label will display the name of the outlined HTML element and its available attributes.', 'dashboard-cleaner') ?></span></p>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e('Transition effect', 'dashboard-cleaner') ?></th>
				<td>
					<label><input type="radio" name="transition-effect" value="1"<?php checked( $dhcl_options['transition-effect'], 1 ) ?> /><?php _e('Yes', 'dashboard-cleaner') ?> <?php _e('(default)', 'dashboard-cleaner') ?></label>
					&nbsp;&nbsp;&nbsp;
					<label><input type="radio" name="transition-effect" value="0"<?php checked( $dhcl_options['transition-effect'], 0 ) ?> /><?php _e('No', 'dashboard-cleaner') ?></label>
				</td>
			</tr>

			<tr>
				<th scope="row"><?php _e('Crosshair cursor', 'dashboard-cleaner') ?></th>
				<td>
					<label><input type="radio" name="crosshair-cursor" value="1"<?php checked( $dhcl_options['crosshair-cursor'], 1 ) ?> /><?php _e('Yes', 'dashboard-cleaner') ?> <?php _e('(default)', 'dashboard-cleaner') ?></label>
					&nbsp;&nbsp;&nbsp;
					<label><input type="radio" name="crosshair-cursor" value="0"<?php checked( $dhcl_options['crosshair-cursor'], 0 ) ?> /><?php _e('No', 'dashboard-cleaner') ?></label>
				</td>
			</tr>
		</table>

		<br />

		<h3><?php _e('Filters', 'dashboard-cleaner') ?></h3>
		<table class="form-table">
			<tr>
				<th scope="row"><?php _e('Apply filters to', 'dashboard-cleaner') ?></th>
				<td>
					<p>
						<label><input type="radio" name="apply-to" value="1"<?php checked($dhcl_options['apply-to'], 1) ?>>&nbsp;<?php _e('The Admin account only', 'dashboard-cleaner') ?> <?php _e('(default)', 'dashboard-cleaner') ?>.</label>
					</p>
					<p>
						<label><input type="radio" name="apply-to" value="2"<?php checked($dhcl_options['apply-to'], 2) ?>>&nbsp;<?php _e('All user accounts', 'dashboard-cleaner') ?>.</label>
					</p>
				</td>
			</tr>
		</table>

		<br />
		<br />

		<input type="submit" class="button-primary" name="dhcl_settings" value="<?php _e('Save Options', 'dashboard-cleaner') ?>" />

	</form>

</div>

<?php

}

/* ================================================================== */

function dhcl_menu_settings_save() {

	// Save DC options:

	$dhcl_options = get_option( 'dhcl_options' );

	if ( empty( $_POST['border-color'] ) ) {
		$dhcl_options['border-color'] = '#FFA500';
	} else {
		// Make sure $_POST['border-color'] contains only word characters:
		$dhcl_options['border-color'] = preg_replace( '/\W/', '', $_POST['border-color'] );
		if ( ctype_xdigit( $dhcl_options['border-color'] ) ) {
			$dhcl_options['border-color'] = '#' . $dhcl_options['border-color'];
		}
	}

	// Make sure $_POST['border-width'] is an integer between 1 and 10,
	// otherwise set it to 2, its default value:
	if (! isset( $_POST['border-width'] ) || ! preg_match( '/^([1-9]|10)$/',  $_POST['border-width'] ) ) {
		$dhcl_options['border-width'] = 2;
	} else {
		$dhcl_options['border-width'] = (int)$_POST['border-width'];
	}

	// Make sure $_POST['show-label'] value is either 0 or 1,
	// otherwise set it to 1, its default value:
	if (! isset( $_POST['show-label'] ) || ! preg_match( '/^[01]$/', $_POST['show-label'] ) ) {
		$dhcl_options['show-label'] = 1;
	} else {
		$dhcl_options['show-label'] = (int)$_POST['show-label'];
	}

	// Make sure $_POST['transition-effect'] value is either 0 or 1,
	// otherwise set it to 1, its default value:
	if (! isset( $_POST['transition-effect'] ) || ! preg_match( '/^[01]$/', $_POST['transition-effect'] ) ) {
		$dhcl_options['transition-effect'] = 1;
	} else {
		$dhcl_options['transition-effect'] = (int)$_POST['transition-effect'];
	}

	// Make sure $_POST['crosshair-cursor'] value is either 0 or 1,
	// otherwise set it to 1, its default value:
	if (! isset( $_POST['crosshair-cursor'] ) || ! preg_match( '/^[01]$/', $_POST['crosshair-cursor'] ) ) {
		$dhcl_options['crosshair-cursor'] = 1;
	} else {
		$dhcl_options['crosshair-cursor'] = (int)$_POST['crosshair-cursor'];
	}

	// Make sure $_POST['apply-to'] value is either 1 or 2,
	// otherwise set it to 1, its default value:
	if (! isset( $_POST['apply-to'] ) || ! preg_match( '/^[12]$/', $_POST['apply-to'] ) ) {
		$dhcl_options['apply-to'] = 1;
	} else {
		$dhcl_options['apply-to'] = (int)$_POST['apply-to'];
	}

	update_option( 'dhcl_options', $dhcl_options );

}

/* ================================================================== */

function dhcl_get_blogtimezone() {

	// Fetch the blog timezone:

	$tzstring = get_option( 'timezone_string' );
	if (! $tzstring ) {
		$tzstring = ini_get( 'date.timezone' );
		if (! $tzstring ) {
			$tzstring = 'UTC';
		}
	}
	date_default_timezone_set( $tzstring );
}

/* ================================================================== */

function dhcl_menu_filters() {

	if (! empty( $_POST['delete_selected'] ) ) {
		// Security nonce:
		if ( empty( $_POST['dhcl_nonce']) || ! wp_verify_nonce( $_POST['dhcl_nonce'], 'dhcl_filters' ) ) {
			wp_nonce_ays('dhcl_filters');
		}
		// Delete user selected filters:
		$err = dhcl_delete_selected_filters();

		if ( $err ) {
			echo '<div class="error notice is-dismissible"><p>' . $err . '</p></div>';

		} else {
			echo '<div class="updated notice is-dismissible"><p>' .
				__('Your changes have been saved.', 'dashboard-cleaner') . '</p></div>';
		}
	}

	?>
<div class="wrap">
	<h1>Dashboard Cleaner</h1>

	<?php
	dhcl_display_tabs( 2 );

	$filters = dhcl_get_filters();
	$count = 0;

	if ( is_array( $filters ) ) {
		dhcl_get_blogtimezone()
		?>
	<form method="post" onSubmit="return dhcl_ischecked();">
		<br />
		<table class="widefat fixed">
			<tr>
				<td style="width:10px">
					<input type="checkbox" onClick="dhcl_checkboxes(this);" />
				</td>
				<td style="font-size:14px;">
					<strong><?php _e( 'Date', 'dashboard-cleaner' ) ?></strong>
				</td>
				<td style="font-size:14px;">
					<strong><?php _e( 'HTML element', 'dashboard-cleaner' ) ?></strong>
				</td>
				<td style="font-size:14px;">
					<strong><?php _e( 'Attribute name &amp; value', 'dashboard-cleaner' ) ?></strong>
				</td>
				<td style="font-size:14px;">
					<strong><?php _e( 'Notes', 'dashboard-cleaner' ) ?></strong>
				</td>
			</tr>
		<?php

		foreach ( $filters as $filter ) {
			list( $id, $date, $tag, $name, $value, $method, $notes ) = explode( '~~', $filter );
			if ( empty( $date ) || empty( $tag ) || empty( $name ) ||
				empty( $value ) || empty( $id ) ) {
				continue;
			}
			if ( empty( $notes ) ) {
				$notes = '-';
			}

			++$count;
			if ( $count % 2 == 1 ) {
				echo '<tr style="background-color:#F9F9F9;">';
			} else {
				echo '<tr style="background-color:#FFFFFF;">';
			}
			?>
				<td style="width:10px">
					<input type="checkbox" name="filter_item[]" value="<?php echo htmlspecialchars( $id ) ?>" />
				</td>
				<td>
					<?php echo htmlspecialchars( date_i18n('M d, Y H:i', $date ) ) ?>
				</td>
				<td>
					<?php echo htmlspecialchars( strtoupper( $tag ) ) ?>
				</td>
				<td>
					<?php echo '<b>' . htmlspecialchars( $name ) . '</b>="' . htmlspecialchars( $value ).'"' ?>
				</td>
				<td>
					<?php echo htmlspecialchars( $notes ) ?></a>
				</td>
			</tr>
			<?php
		} // foreach
		?>

		</table>

		<p><?php printf( _n( 'Total: %s item', 'Total: %s items', $count, 'dashboard-cleaner' ), $count ) ?></p>
		<?php
	}
	if (! $count )  {
		echo '<div class="notice-info notice is-dismissible"><p>' .
			__( 'You do not have any filter yet.', 'dashboard-cleaner' ) . '</p></div>';

	} else {

		wp_nonce_field('dhcl_filters', 'dhcl_nonce', 0);
		?>
		<input id="dhcl-delete-selected" class="button-primary" name="delete_selected" type="submit" value="<?php _e('Delete selected filters', 'dashboard-cleaner' ) ?>" />
		<?php
	}
	?>
	</form>
</div>
<?php
}

/* ================================================================== */

function dhcl_get_filters() {

	// Fetch filters:

	$dhcl_options = get_option( 'dhcl_options' );

	if ( empty( $dhcl_options['user_filters'] ) ) {
		return;
	}

	$filters = array();

	$ud = wp_get_upload_dir();
	if ( file_exists( "{$ud['basedir']}/dashboard-cleaner/{$dhcl_options['user_filters']}.filter" ) ) {
		$filters = file(
			"{$ud['basedir']}/dashboard-cleaner/{$dhcl_options['user_filters']}.filter",
			FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
		);
	}

	return $filters;
}

/* ================================================================== */

function dhcl_delete_selected_filters() {

	// Deleted user selected filters:

	if (! is_array( $_POST['filter_item'] ) ) {
		return __( 'Error: "filter_item" is not an array.', 'dashboard-cleaner' );
	}

	$filters = array();
	$filters = dhcl_get_filters();
	$outfilters = '';

	foreach ( $filters as $key => $value ) {
		// Get filter's ID:
		$id = explode( '~~', $value, 2 );
		if ( in_array( $id[0], $_POST['filter_item'] ) ) {
			unset( $filters[ $key ] );
		} else {
			$outfilters .= $filters[ $key ] . "\n";
		}
	}

	// Save remaining filters:
	$dhcl_options = get_option( 'dhcl_options' );

	if ( empty( $dhcl_options['user_filters'] ) ) {
		return __( 'Error: "user_filters" is undefined', 'dashboard-cleaner' );
	}

	$ud = wp_get_upload_dir();
	if ( false === file_put_contents(
		"{$ud['basedir']}/dashboard-cleaner/{$dhcl_options['user_filters']}.filter", $outfilters )
	) {
		return __( 'Error: Unable to save filters to file.', 'dashboard-cleaner' );
	}

}

/* ================================================================== */

function dhcl_menu_donate() {

	// Donate menu:

?>
<div class="wrap">
	<h1><?php _e('Info', 'dashboard-cleaner' ) ?></h1>

	<?php dhcl_display_tabs( 3 ) ?>

	<div class="card">
		<p><?php _e('<strong>Dashboard Cleaner</strong> is open-source and free. If you like it and want to support it, you can either donate or rate it on wordpress.org.', 'dashboard-cleaner' ) ?></p>
		<hr />
		<h3><?php _e('Bitcoin donation', 'dashboard-cleaner' ) ?></h3>
		<br />
		<a href="bitcoin:13GH1yAU22ukKQ4AxhtBnb8eiNRtzbqsUC?message=Dashboard%20Cleaner%20donation"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIYAAACGCAIAAACXG2XGAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4QYCCjMiGBn+rgAAAzJJREFUeNrtncFyg0AMQ6HD//9yeu10GsZG0jaGpzMhBMUSttfL/nq9NvBJOLZt2/fdft6fTL87/7tjKp9VrseF0H374l/5aYASKAEVL3Fpbldb3/lHwg8qXvXu/JVjjPeNKEG4AJSM95KuNygaWtH0yvkVD0vkGeJ9I0oQLgAlt/KSBLrP9a58ons9ifoVUYJwASjBSzz+kfCGbg3q5/Hp+hVRgnABKHm6l7g0tOsB3XzC1dtXfM5434gShAtAyXgvSdd2Ep5R8bD0mjHjfSNKEC4AJeOwLy7gdDU30c9Q/IwoQbgAlIC/vaRSI+rqeKI+1l3TtXJOxfW9zJcgXABKJuLYav0DxTOUfkbCwxRPcuVYJ+cnShAuACUjvUR5Hk9ovct7up+tXL8y21j0HqIE4QJQMtJLXNrdrWsptbVurpCeI1HWEfz6XUQJwgWgZHxe0p3PcPWxuzPwykzJyhyFKEG4AJQ8xUu6sxquPsfKWcVEbuG6BvolCBeAkuk4WxP8X/uIpHvvrvXESr5C7x3hAlDyRC9R+t5KfpDwBlddrtubIUoQLgAlT/SStF53j1F8qNsXcc2mXMhjiBKEC0DJSC9J5xldfxJn/ZblT6EcjihBuACUjM9LXPWldH9eyQkS8yuuHI4oQbgAlEzEcUFPXTpbWRuWyBVca39DfRqiBOECUDLeSxJ75VY0VJn1S7wfZfF+jkQJwgWgZLyXJJ67FY1O5A2u7+2+P5goQbgAlDzFS5TZurTmrswhVta7iBKEC0DJ3bxE0fGKx6TzDNd+J4l9Yi7U1ogShAtAyThceX9J91k+nXO45ldWvvvk5HqIEoQLQMlIL4l/h6nvvSAnaHmPklednJMoQbgAlIzDsWX23VL2gnT5h5IbuTzywnUSJQgXgJKRXpLQVkVzK9fTff9jYg8V1z6PRAnCBaDkbl6i5ASuPEZ571ZX95Uevuv3EiUIF4CSO3uJC0r/I72vopJPhOp1RAnCBaAEL7mo0a7eu6L1rvMofRSiBOECUHI3L1k5A+iaZ0zkOq4eD/0ShAtAyV1xNl+iIL1HZCIfUnzCtf6YGhfCBaBkqpdwFz4K3/F65gVuLsNPAAAAAElFTkSuQmCC"><br />13GH1yAU22ukKQ4AxhtBnb8eiNRtzbqsUC</a>
		<br />&nbsp;
		<hr />
		<h3><?php _e('Rate it', 'dashboard-cleaner' ) ?></h3>
		<a href="https://wordpress.org/support/view/plugin-reviews/dashboard-cleaner?rate=5#postform"><img title="<?php _e('Rate it', 'dashboard-cleaner' ) ?>" border="0" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAAcCAIAAAA/XwxHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3woMCgQevC7e8gAAActJREFUaN7tmb9LAmEYx9/XM1OLNDMCB8MLQRCHoKGprbW1pcWh/yKabHVsjIj+gKgGh1q1oMEIIoIup8Ph0lOvO7F7720QuZI6fd9q6X2+2/G+H57j88D7gxdTShHkb+IDBSAX5EJ+LJfS5p7RbHGVE4tll0sV82G383BIODZCwVgfcxsbBaPtoHah02gB+6tyqWI+HjoIIaRZj4zNFI1llNtv4+CLrZmisaxy3Tb2w9JM0ViEEEL42xsa1W3ttGc82ZZCTMW2FGLVv5iLp30h2R+SpbAshWT/9NpkPOdDgrGYVS7qEXVTuztxGFoVC+ZuookUFo5lXhYCUuI4ll7F41YKBNIXg0qisTxr7tRE6mw2uTROKX/yfDa1jMVlOTY0HJ/MXEYX5kZsiwtHscz68NIjGstzWsCLoexB0GOitBHJbkkYWL6jGKkTj3WeqI7HsGgsq1xqXRGv8ec3qwssn1ziGLeenXp5MxrA8sntEr3mApH8zMr9/EoxHIm6v6M/U2C/uj+PilN7LSO1hOqVvKHVHHfAtLWiXomqJaSW920H2OGMIde+ble3P5f5GNPWinp1p2cDOxwMr79/F3hDA7kgFwJyQe6/yDsZhxXHUCuqgQAAAABJRU5ErkJggg==" width="116" height="28"><br /><?php _e('Rate it on WordPress.org' ) ?></a>
		<br />&nbsp;
		<hr />
		<p><?php _e('Thanks!', 'dashboard-cleaner' ) ?></p>
	</div>
</div>
<?php
}

/* ================================================================== */

function dhcl_menu_about() {

	// About menu

	if ( file_exists( plugin_dir_path( __FILE__ ) . 'LICENSE.TXT' ) ) {
		$gpl3 = file_get_contents( plugin_dir_path( __FILE__ ) . 'LICENSE.TXT' );
	} else {
		$gpl3 = __( 'Error: cannot open LICENSE.TXT!', 'dashboard-cleaner' );
	}

?>
<div class="wrap">
	<h1>Dashboard Cleaner</h1>

	<?php dhcl_display_tabs( 4 ) ?>

	<div class="card">
		<h1>Dashboard Cleaner v<?php echo DHCL_VERSION?></h1>
		<h3>&copy; <?php echo date( 'Y' ) ?> Jerome Bruandet</h3>
		<strong><?php _e('From the same author:', 'dashboard-cleaner' ) ?></strong>
		<ul>
			<li><a href="https://wordpress.org/plugins/ninjafirewall/">NinjaFirewall (WP Edition)</a>: <?php _e('A true Web Application Firewall to protect and secure WordPress.', 'dashboard-cleaner' ) ?></li>
			<li><a href="https://wordpress.org/plugins/ninjascanner/">NinjaScanner</a>: <?php _e('A lightweight, fast and powerful antivirus scanner for WordPress.', 'dashboard-cleaner' ) ?></li>
			<li><a href="https://wordpress.org/plugins/wpterm/">WPTerm</a>: <?php _e('An xterm-like plugin to run non-interactive shell commands.', 'dashboard-cleaner' ) ?></li>
		</ul>
		<br />
		<br />
		<textarea id="dhcl-license" class="small-text code" style="display:none; width:100%" rows="8" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"><?php echo htmlspecialchars( $gpl3 ) ?></textarea>
		<input id="dhcl-license-button" type="button" class="button-secondary" value="<?php _e('View license', 'dashboard-cleaner' ) ?>" onClick="dhcl_show_license();" />
		<br />&nbsp;
	</div>
</div>
<?php

}

/* ================================================================== */

function dhcl_menu_get_settings() {

	// Retrieve options from the database:

	$dhcl_options = get_option( 'dhcl_options' );

	if ( empty( $dhcl_options['border-color'] ) ) {
		$dhcl_options['border-color'] = 'FFA500';
	} else {
		$dhcl_options['border-color'] = preg_replace( '/\W/', '', $dhcl_options['border-color'] );
	}
	if ( ctype_xdigit( $dhcl_options['border-color'] ) ) {
		$dhcl_options['border-color-hash'] = '#' . $dhcl_options['border-color'];
	} else {
		$dhcl_options['border-color-hash'] = $dhcl_options['border-color'];
	}

	if (! isset( $dhcl_options['border-width'] ) ||
		! preg_match( '/^([1-9]|10)$/',  $dhcl_options['border-width'] ) ) {
		$dhcl_options['border-width'] = 2;
	}
	if (! isset( $dhcl_options['show-label'] ) ||
		! preg_match( '/^[01]$/', $dhcl_options['show-label'] ) ) {
		$dhcl_options['show-label'] = 1;
	}
	if (! isset( $dhcl_options['transition-effect'] ) ||
		! preg_match( '/^[01]$/', $dhcl_options['transition-effect'] ) ) {
		$dhcl_options['transition-effect'] = 1;
	}
	if (! isset( $dhcl_options['crosshair-cursor'] ) ||
		! preg_match( '/^[01]$/', $dhcl_options['crosshair-cursor'] ) ) {
		$dhcl_options['crosshair-cursor'] = 1;
	}

	if ( empty( $dhcl_options['apply-to'] ) ||
		! preg_match( '/^[12]$/', $dhcl_options['apply-to'] ) ) {
		$dhcl_options['apply-to'] = 1;
	}

	return $dhcl_options;

}

/* ================================================================== */

function dhcl_submitted_form() {

	// Forms processing functions:

	if (! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Thickbox form:
	if ( isset( $_POST['dhcl_html_submit'] ) ) {
		// Check security nonce:
		if ( empty( $_POST['dhcl_nonce']) || ! wp_verify_nonce( $_POST['dhcl_nonce'], 'dhcl_thickbox_nonce' ) ) {
			wp_nonce_ays('dhcl_thickbox_nonce');
		}
		dhcl_process_form();
		return;
	}

	// "Undo last change" form:
	if (! empty( $_GET['dhcl_undo'] ) ) {
		// Check security nonce:
		if ( empty( $_GET['dhcl_nonce']) || ! wp_verify_nonce( $_GET['dhcl_nonce'], 'dhcl_undo_nonce' ) ) {
			wp_nonce_ays('dhcl_undo_nonce');
		}
		dhcl_undo_form();
		return;
	}

}

add_action('admin_init', 'dhcl_submitted_form' );

/* ================================================================== */

function dhcl_process_form() {

	// Process the thickbox form and save data to the filters log:

	global $dhcl_form_result;

	// HTML element:
	if (! isset( $_POST['dhcl_choice_tag'] ) || ! preg_match( '/^\w+$/', $_POST['dhcl_choice_tag'] ) ) {
		$dhcl_form_result = '<div class="error notice is-dismissible"><p>'.
		__( "Dashboard Cleaner error: you must enter a valid HTML element.", 'dashboard-cleaner' ) .'</p></div>';
		return;
	}
	$dhcl_html_tag = $_POST['dhcl_choice_tag'];

	// Element attribute name:
	if ( empty( $_POST['dhcl_choice'] ) ) {
		$dhcl_form_result = '<div class="error notice is-dismissible"><p>'.
		__( "Dashboard Cleaner error: you must select a valid attribute name.", 'dashboard-cleaner' ) .'</p></div>';
		return;
	}
	$dhcl_attr_name = stripslashes( substr( $_POST['dhcl_choice'], 4 ) );
	// Remove the '~' char., it is used as a string separator by the filter log:
	$dhcl_attr_name = str_replace( '~', '-', $dhcl_attr_name );

	// Element attribute value:
	if ( empty( $_POST[ $_POST['dhcl_choice'] ] ) ) {
		$dhcl_form_result = '<div class="error notice is-dismissible"><p>'.
		__( "Dashboard Cleaner error: you must select a valid attribute value.", 'dashboard-cleaner' ) .'</p></div>';
		return;
	}
	$dhcl_attr_value = stripslashes( $_POST[ $_POST['dhcl_choice'] ] );
	$dhcl_attr_value = str_replace( '~', '-', $dhcl_attr_value );

	// Optional user notes:
	if (! empty( $_POST['dhcl-notes'] ) ) {
		$dhclnotes = stripslashes( $_POST['dhcl-notes'] );
		$dhclnotes = str_replace( '~', '-', $dhclnotes );
	} else {
		$dhclnotes = '';
	}

	// Hidding method:
	if ( empty( $_POST['hidding_method'] ) || ! preg_match( '/^[012]$/', $_POST['hidding_method'] ) ) {
		$hidding_method = '0';
	} else {
		$hidding_method = (int)$_POST['hidding_method'];
	}

	// Save the new filter to disk:

	$dhcl_options = get_option( 'dhcl_options' );
	if ( empty( $dhcl_options['user_filters'] ) ) {
		$dhcl_form_result = '<div class="error notice is-dismissible"><p>'.
			__( "Dashboard Cleaner error: 'user_filters' is undefined", 'dashboard-cleaner' ) .'</p></div>';
		return;
	}
	$ud = wp_get_upload_dir();
	if ( false === file_put_contents(
		"{$ud['basedir']}/dashboard-cleaner/{$dhcl_options['user_filters']}.filter",
		uniqid( 'filter_', true ) .'~~'.
		time() .'~~'.
		strtolower( trim( $dhcl_html_tag ) ) .'~~'.
		strtolower( trim( $dhcl_attr_name ) ) .'~~'.
		trim( $dhcl_attr_value ) .'~~'.
		$hidding_method .'~~'.
		trim( $dhclnotes ) ."\n",
		FILE_APPEND	)
	) {
		$dhcl_form_result = '<div class="error notice is-dismissible"><p>'.
			__( "Dashboard Cleaner error: unable to save filters to file.", 'dashboard-cleaner' ) .'</p></div>';
		return;
	}

	$dhcl_form_result = '<div class="updated notice is-dismissible"><p>' .
		sprintf( __( "Dashboard Cleaner: your filter has been successfully created. You can undo this operation from the <strong>DHCL</strong> menu located in your Toolbar. ", 'dashboard-cleaner' ),
		'<a href="tools.php?page=dashboard-cleaner&dhcltab=filters">', '</a>' ) . '</p></div>';

}

/* ================================================================== */

function dhcl_undo_form() {

	// "Undo last change" form:

	global $dhcl_form_result;

	// Fetch filters:
	$filters = dhcl_get_filters();
	if (! empty( $filters[0] ) ) {
		// Pop last entry off the end of array:
		array_pop( $filters );
	}

	// Save the remaining filters:
	$dhcl_options = get_option( 'dhcl_options' );

	if ( empty( $dhcl_options['user_filters'] ) ) {
		$err =  __( 'Dashboard Cleaner error: "user_filters" is undefined', 'dashboard-cleaner' );

	} else {
		$data = '';
		foreach( $filters as $filter ) {
			$data .= "$filter\n";
		}
		$ud = wp_get_upload_dir();
		if ( false === file_put_contents(
		"{$ud['basedir']}/dashboard-cleaner/{$dhcl_options['user_filters']}.filter", $data ) ) {
			$err =  __( 'Dashboard Cleaner error: unable to save filters to file.', 'dashboard-cleaner' );
		}
	}

	if (! empty( $err ) ) {
		$dhcl_form_result = '<div class="error notice is-dismissible"><p>' . $err . '</p></div>';

	} else {
		$dhcl_form_result = '<div class="updated notice is-dismissible"><p>' .
		__('Dashboard Cleaner: the last saved filter was deleted.', 'dashboard-cleaner') . '</p></div>';
	}

}

/* ================================================================== */

function dhcl_ob_callback( $buffer ) {

	// Apply filters (part #1):

	global $dhcl_method;

	$tot = 0;
	$filters = array();
	$filters = dhcl_get_filters();
	if (! empty( $filters[0] ) ) {
		foreach ( $filters as $filter ) {
			list( $id, $date, $tag, $name, $value, $dhcl_method, $notes ) = explode( '~~', $filter );
			if ( empty( $tag ) || empty( $name ) || empty( $value ) ) { continue; }
			$value = preg_replace( '/&/', '&(?:amp;|#038;)?', preg_quote( $value, '/' ) );
			$buffer = preg_replace_callback( "/(<(?i:{$tag})\b[^>]+\b(?i:". preg_quote( $name, '/' ) .
				")\b\s*=\s*['\"]?[^>]*?\W{$value}\W[^>]*?['\"]?[^>]*)>/", 'dhcl_preg_callback', $buffer, -1, $count );
			$tot += $count;
		}
	}

	// Display the total number of filtered elements in the Toolbar:
	return str_replace( '~~DHCL~~', $tot, $buffer );

}

/* ================================================================== */

function dhcl_preg_callback( $capture ) {

	// Apply filters (part #2):

	global $dhcl_method;

	// Select the method to use to hide the element:
	if ( $dhcl_method == 1 ) {
		$style = 'position:absolute !important;top:-9999px !important;left:-9999px !important';
	} elseif ( $dhcl_method == 2 ) {
		$style = 'visibility:hidden !important';
	} else {
		$style = 'display:none !important';
	}

	if ( stripos( $capture[1], ' style' ) !== FALSE ) {
		return preg_replace( '/(?i)style\s*=\s*([\'"])(.+?)\1/', 'style="\2;'. $style .'"', $capture[0] );
	} else {
		return $capture[1] . ' style="'. $style .'">' ;
	}
	// Something wrong occurred, don't do anything:
	return $capture[0];

}

/* ================================================================== */

function dhcl_ob_start() {

	// If the request comes from a network admin screen, ignore it:
	if ( is_network_admin() ) {
		return;
	}

	$dhcl_options = get_option( 'dhcl_options' );

	// Check if the filters shall apply to the admin only or to any logged in user:
	if ( empty( $dhcl_options['apply-to'] ) || $dhcl_options['apply-to'] == 1 ) {
		// Admin only:
		if (! current_user_can( 'manage_options' ) ) {
			return;
		}
	}
	@ob_start( 'dhcl_ob_callback' );
}

add_action( 'admin_head', 'dhcl_ob_start' );

/* ================================================================== */

function dhcl_ob_end() {

	// If the request comes from a network admin screen, ignore it:
	if ( is_network_admin() ) {
		return;
	}

	$dhcl_options = get_option( 'dhcl_options' );

	if ( empty( $dhcl_options['apply-to'] ) || $dhcl_options['apply-to'] == 1 ) {
		if (! current_user_can( 'manage_options' ) ) {
			return;
		}
	}
	@ob_end_flush();
}

add_action( 'admin_footer', 'dhcl_ob_end' );

/* ================================================================== */
// EOF
