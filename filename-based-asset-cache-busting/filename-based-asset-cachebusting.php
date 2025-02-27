<?php
/**
 * Plugin Name: Filename based asset cache busting
 * Version: 1.4
 * Description: Filename based cache busting for WordPress scripts/styles using last modified date. Based on this gist https://gist.github.com/ocean90/1966227 from Dominik Schilling, I've enhanced it by automatically replacing the asset version with the file's modification time and automatically modifying htaccess - making it install + forget.
 * Author: Ben Lumley | Interoke Digital
 * Author URI: https://www.interokedigital.co.uk/
 * Plugin URI: https://wordpress.org/plugins/filename-based-asset-cache-busting/
 *
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * For WP-Engine redirect..
 * Source: ^(.+)\.([0-9\.]+)\.(js|css)$
 * Dest: $1.$3
 * Type: break
 *
 */

defined( 'ABSPATH' ) or die( 'No' );

function fb_acb_fix_urls( $src )
{
	// Don't touch admin scripts
	// Autoptimize is broken by these urls, plus it achieves our aim anyway - it uses an md5 as part of it's url
	$skip = false;
	if (defined('AUTOPTIMIZE_PLUGIN_DIR')) {
		$ao_conf = autoptimizeConfig::instance();
		if (preg_match('/\.js($|\?)/i', $src) && $ao_conf->get('autoptimize_js')) {
			$skip = true;
		}
		if (preg_match('/\.css($|\?)/i', $src) && $ao_conf->get('autoptimize_css')) {
			$skip = true;
		}
	}

	if (is_admin() || $skip) {
		return $src;
	}
	$_src = $src;
	if ('//' === substr($_src, 0, 2)) {
		$_src = 'http:' . $_src;
	}
	$_src = parse_url($_src);
	// Give up if malformed URL.
	if (false === $_src) {
		return $src;
	}

	// Check if it's a local URL.
	$wp = parse_url(home_url());
	if (isset($_src['host']) && $_src['host'] !== $wp['host']) {
		return $src;
	}

	// see if we can swap the version for file modification time
	// you may hate this - it works for me - saves me needing to bump versions manually or remember to do this same
	// thing when using enqueue script

	$options = get_option( 'fbacb_settings' );
	$mode = $options['fbacb_select_mode'];

	$file_path = ABSPATH . $_src['path'];
	if (file_exists($file_path)) {

		if ($mode == 'qs') {
			$ret = preg_replace(
				'/\.(js|css)($|\?.*$)/',
				'.$1?ver=' . filemtime($file_path),
				$src
			);
 		} else {
			$ret = preg_replace(
				'/\.(js|css)($|\?.*$)/',
				'.' . filemtime($file_path) . '.$1',
				$src
			);
		}

	} else {
		// otherwise we use the existing version
		if ($mode == 'qs') {
			$ret = preg_replace(
				'/\.(js|css)\?ver=([0-9\.]+)$/',
				'.$2.$1',
				$src
			);
		} else {
			$ret = $src;
		}
	}

	return $ret;
}
add_filter( 'script_loader_src', 'fb_acb_fix_urls' );
add_filter( 'style_loader_src', 'fb_acb_fix_urls' );

function fbacb_rewrite_rules( $rules ){
	$new_rules = <<<EOT

# FBACB
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteBase /

  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule ^(.+)\.([0-9\.]+)\.(js|css)$ $1.$3 [L]
</IfModule>

# still fbacb
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css                            "access plus 1 year"
    ExpiresByType application/javascript              "access plus 1 year"
</IfModule>
# END FBACB


EOT;

	return $new_rules . $rules;
}
add_filter('mod_rewrite_rules', 'fbacb_rewrite_rules');

register_activation_hook( __FILE__, function() { flush_rewrite_rules(); } );
register_deactivation_hook( __FILE__, function() {
	remove_filter('mod_rewrite_rules', 'fbacb_rewrite_rules');
	flush_rewrite_rules();
} );

// the next bits are to cover for nginx/apache config not being in place.
// we will try to find + serve the file with PHP.
// this isn't ideal - it'll be much slower than using url rewriting, but I find it useful in dev environments,
// expecially using PHP build in server / WP-CLI, which don't do url rewriting without a custom router - which is just php anyway
// it may well also be acceptable to you production if there's varnish or something in front meaning these urls rarely get hit.
// so in short - be aware, YMMV

// utility to detect if current request uri is one of our URLs
// can also populate $matches
function fbacb_is_our_url(&$matches = array()) {
	return preg_match('/^(.+)\.([0-9\.]+)\.(js|css)$/i', $_SERVER['REQUEST_URI'], $matches);
}

// make sure WP has this down as a 404
add_action('parse_query', 'fbacb_parse_query');
function fbacb_parse_query( $wp_query ) {
	if ($wp_query->is_main_query() && !$wp_query->is_404() && fbacb_is_our_url()) {
		$wp_query->set_404();
	}
}

// if we aren't on apache or htaccess has failed, try to catch it this way too.
add_filter('template_redirect', 'fbacb_404', 1 );
function fbacb_404() {
    global $wp_query;

    if ($wp_query->is_404 ) {
    	$matches = array();
    	if (fbacb_is_our_url($matches)) {
    		$filename = ABSPATH . $matches[1] . '.' . $matches[3];
	        $mime = 'text/plain';
	        switch ($matches[3]) {
	        	case 'css':
	        		$mime = 'text/css';
	        		break;
	        	case 'js':
	        		$mime = 'text/javascript';
	        		break;
	        }

	        status_header( 200 );

	        header("Content-type: $mime");
	        header('Cache-Control: max-age=31536000');
	        header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + (31536000)));
	        header('FBACB-Php-Fallback: yes');
	        readfile($filename);
	        exit;
    	}
    }
}


add_action( 'admin_menu', 'fbacb_add_admin_menu' );
add_action( 'admin_init', 'fbacb_settings_init' );


function fbacb_add_admin_menu(  ) {

	add_options_page( 'Cache-Busting', 'Cache-Busting', 'manage_options', 'cache-busting', 'fbacb_options_page' );

}


function fbacb_settings_init(  ) {

	register_setting( 'pluginPage', 'fbacb_settings' );

	add_settings_section(
		'fbacb_pluginPage_section',
		__( 'Operation', 'fbacb' ),
		'fbacb_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'fbacb_select_mode',
		__( 'Mode', 'fbacb' ),
		'fbacb_select_mode_render',
		'pluginPage',
		'fbacb_pluginPage_section'
	);


}


function fbacb_select_mode_render(  ) {

	$options = get_option( 'fbacb_settings' );
	?>
	<select name='fbacb_settings[fbacb_select_mode]'>
		<option value='filename' <?php selected( $options['fbacb_select_mode'], 'filename'); ?>>Filename</option>
		<option value='qs' <?php selected( $options['fbacb_select_mode'], 'qs' ); ?>>Querystring </option>
	</select>

	<?php

}


function fbacb_settings_section_callback(  ) {

	echo __( 'Choose querystring if filename based won\'t work correctly for you - not as cache friendly but better than nothing', 'fbacb' );

}


function fbacb_options_page(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>Filename Based Asset Cache-Busting</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>
