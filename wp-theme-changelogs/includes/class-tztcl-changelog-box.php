<?php
/**
 * Show changelog iframe box
 *
 * @package WP Theme Changelogs
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Changelog Box Class
 */
class TZTCL_Changelog_Box {

	/**
	 * Setup Readme
	 *
	 * @return void
	 */
	static function setup() {

		// Show Changelog.
		add_action( 'admin_init', array( __CLASS__, 'show_changelog' ) );

	}

	/**
	 * Show Changelog
	 *
	 * @return void
	 */
	static function show_changelog() {
		global $wp_list_table;

		// Return early if action not fired.
		if ( ! isset( $_GET['tztcl_action'] ) || 'changelog' !== $_GET['tztcl_action'] ) {
			return;
		}

		// Return early if theme or version details are missing.
		if ( ! isset( $_GET['theme'] ) || ! isset( $_GET['version'] ) ) {
			return;
		}

		// Define Iframe Request Constant.
		if ( ! defined( 'IFRAME_REQUEST' ) ) {
			define( 'IFRAME_REQUEST', true );
		}

		// Set Theme Slug and Version.
		$theme_slug = esc_attr( $_GET['theme'] );
		$theme_version = esc_attr( $_GET['version'] );

		// Set Readme URL.
		$readme_url = esc_url( 'https://themes.svn.wordpress.org/' . $theme_slug . '/' . $theme_version . '/readme.txt' );

		// Fetch Readme Data.
		$readme_data = self::get_readme_data( $readme_url );

		// Get Theme Data.
		$theme_data = wp_get_theme( $theme_slug );

		// Display Changelog Box.
		iframe_header( esc_html__( 'Theme Changelog', 'wp-theme-changelogs' ) );
		?>

		<div id="plugin-information">

			<div id="plugin-information-scrollable">

				<div id="plugin-information-title" style="border-bottom: 1px solid #ddd">

					<h2>
						<?php esc_html_e( 'Changelog:', 'wp-theme-changelogs' ); ?>

						<?php // Display Theme Name.
						if ( $theme_data->exists() ) :
							echo esc_html( $theme_data->get( 'Name' ) );
						endif; ?>

					</h2>

				</div>

				<div id="plugin-information-content">

					<div class="fyi">

						<ul>

							<?php if ( $theme_data->exists() ) : ?>

								<img src="<?php echo esc_url( $theme_data->get_screenshot() ); ?>" width="220" height="165" /><br/><br/>

								<li>
									<strong><?php esc_html_e( 'New Version:', 'wp-theme-changelogs' ); ?></strong>
									<?php echo $theme_version; ?><br/>
									<strong><?php esc_html_e( 'Installed Version:', 'wp-theme-changelogs' ); ?></strong>
									<?php echo esc_html( $theme_data->get( 'Version' ) ); ?>
								</li>

								<li>
									<strong><?php esc_html_e( 'Author:', 'wp-theme-changelogs' ); ?></strong>
									<a href="<?php echo esc_url( $theme_data->get( 'AuthorURI' ) ); ?>" target="_blank"><?php echo esc_html( $theme_data->get( 'Author' ) ); ?></a>
								</li>

								<li>
									<a href="<?php echo esc_url( $theme_data->get( 'ThemeURI' ) ); ?>" target="_blank"><?php esc_html_e( 'Theme Homepage', 'wp-theme-changelogs' ); ?> →</a>
								</li>

							<?php endif; ?>

						</ul>

					</div>

					<div id="section-holder" class="wrap">

						<div id="section-changelog" class="section" style="display: block;">

							<?php // Display Changelog.
							if ( isset( $readme_data['sections'] ) && array_key_exists( 'changelog', $readme_data['sections'] ) ) :

								echo $readme_data['sections']['changelog'];

							else :

								echo esc_html__( 'No changelog details found. This means the theme has no readme.txt which can be displayed here. The readme.txt could also be invalid or not include a changelog section. Contact your theme developer and ask them about making their themes compatible with the WP Theme Changelogs plugin.', 'wp-theme-changelogs' );

							endif; ?>

						</div>

					</div>

				</div>

			</div>

			<div id="plugin-information-footer">

				<?php // Display Update Now button.
				$update_url = add_query_arg( array(
					'action' => 'upgrade-theme',
					'theme'  => $theme_slug,
				), self_admin_url( 'update.php' ) );

				echo '<a class="theme-install button-primary right" href="' . esc_url( wp_nonce_url( $update_url, 'upgrade-theme_' . $theme_slug ) ) . '" title="' . esc_attr( sprintf( __( 'Update to version %s' ), $theme_version ) ) . '" target="_parent">' . __( 'Install Update Now' ) . '</a>';
				?>

			</div>

		</div>

		<?php
		iframe_footer();

		exit;

	}

	/**
	 * Fetch the readme.txt data from cache or fresh.
	 *
	 * Use `cache` query string to force a fresh download of the readme.
	 *
	 * @uses  parse_readme()			Process the readme data
	 * @param  string $readme_url 		URL of the readme.
	 * @return boolean|array            False if not exists, array of data if exists.
	 */
	static function get_readme_data( $readme_url = '' ) {

		// Create Transient Name.
		$transient_name = sprintf( 'tztcl_%s', hash( 'ripemd128', $readme_url ) );

		// Use cached readme for this version.
		$readme = get_transient( $transient_name );

		// If the cache doesn't exist or overridden.
		if ( empty( $readme ) || isset( $_REQUEST['cache'] ) ) {

			// Parse readme.
			$readme = self::parse_readme( $readme_url );

			// Store the parsed readme for a week.
			set_transient( $transient_name, $readme, HOUR_IN_SECONDS * 48 );

		}

		return $readme;
	}

	/**
	 * Parse the ReadMe URL
	 *
	 * @since  2.4
	 * @link https://github.com/markjaquith/WordPress-Plugin-Readme-Parser/tree/WordPress.org WordPress_Readme_Parser package
	 * @uses WordPress_Readme_Parser::parse_readme()
	 * @param  string $url URL of the readme.txt file.
	 * @return array  Processed readme.txt
	 */
	static function parse_readme( $url = '' ) {

		if ( ! class_exists( 'TZTCL_Parse_Readme' ) ) {
			include_once( TZTCL_PLUGIN_DIR . 'includes/class-tztcl-parse-readme.php' );
		}

		$request = wp_remote_get( $url, array(
			'timeout' => 15,
			'sslverify' => false,
			'sslcertificates' => null,
		) );

		if ( ! empty( $request ) && ! is_wp_error( $request ) ) {

			$body = $request['body'];

			$parser = new TZTCL_Parse_Readme;

			return $parser->parse_readme_contents( $request['body'] );
		}

		return false;
	}
}

// Run Class.
TZTCL_Changelog_Box::setup();
