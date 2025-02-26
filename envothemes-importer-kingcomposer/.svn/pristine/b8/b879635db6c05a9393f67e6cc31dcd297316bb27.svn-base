<?php

if (class_exists('envo_business_kingcomposer_SettingsPage'))
return;

class ebdi_kc_SettingsPage {

	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;
  
  protected static $instance = NULL;
  
  public static function get_instance()
    {

        NULL === self::$instance and self::$instance = new self;
        return self::$instance;
    }

	/**
	 * Start up
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'et_welcome_register_menu' ) );
		add_action( 'admin_init', array( $this, 'et_importIt' ) );
	}

	/**
	 * Add options page
	 */
	public function et_welcome_register_menu() {
		add_theme_page( 'EnvoThemes Demo Import', __( 'EnvoThemes Demo Import', 'maxstore' ), 'activate_plugins', 'et-import', array( $this, 'et_import' ) );
	}

	/**
	 * The plugin page
	 */
	public function et_import() {
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Welcome To EnvoThemes Demo Import', 'ebdi-kc' ) ?></h1>
		</div>
		<?php
		if ( !is_plugin_active( 'kingcomposer/kingcomposer.php' ) ) {
    ?> 
		 <p><b><?php printf( __( 'EnvoThemes Demo Importer for KingComposer depends on the last version of KingComposer to work! %1s', 'envo-business-kingcomposer' ), '<a class="activate-now button-primary" href="' . esc_url( admin_url( 'themes.php?page=et_envo-business&tab=actions_required' ) ) . '" >' . esc_html__( 'Install it and activate', 'envo-business-kingcomposer' ) . '</a>' ); ?></b></p>
    <?php 
		} else {
			?> 
			<h3 class="about-description">
				<?php esc_html_e( 'It will allow you to quickly import all our free demo layouts instead of creating content from scratch.', 'ebdi-kc' ) ?> 		
			</h3>
			<hr>
			<p><b><?php esc_html_e( 'When you import the data, the following things might happen:', 'ebdi-kc' ) ?></b></p>
			<ul>
				<li><?php esc_html_e( 'No existing posts, pages, categories, images, custom post types or any other data will be deleted or modified', 'ebdi-kc' ) ?></li>
				<li><?php esc_html_e( '7 free demo pages will be imported and created', 'ebdi-kc' ) ?></li>
				<li><?php printf( __( 'The plugin will set the %1s page as Static Front Page (if there is no Homepage set)', 'ebdi-kc' ), '<a href="' . esc_url( 'https://envothemes.com/envo-business/business-free-1/' ) . '" target="_blank">' . esc_html__( 'Business Free #1', 'ebdi-kc' ) . '</a>' ) ?></li>
				<li><?php esc_html_e( 'The plugin will create a "Blog" page and set this page as Posts page (if there is no Blog page set)', 'ebdi-kc' ) ?></li>
				<li><?php esc_html_e( 'The plugin will set the fonts (from the imported demos) in the KingComposer plugin - Oswald, Russo One, Indie Flower', 'ebdi-kc' ) ?></li>
				<li><?php esc_html_e( 'Please click on the Import button only once and wait.', 'ebdi-kc' ) ?></li>
			</ul>
      <p><?php _e( '<b>Note:</b> Images are not included in the demo import. But they will be displayed and loaded from our server. Replace them with your own, to speed your website loading.', 'ebdi-kc' ) ?></p>
      <?php
    		if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
    			printf( __( 'WooCommerce plugin is active. If you need some dummy products, check %1s tutorial.', 'envo-business-kingcomposer' ), '<a href="' . esc_url( 'https://envothemes.com/envo-business/envo-business-documentation/#woocommerce-demo-dummy-data' ) . '" target="_blank">' . esc_html__( 'this', 'envo-business-kingcomposer' ) . '</a>' );
    		} 
			?>
			<hr>
			<form method="POST" action="">
				<input type="hidden" name="submit" value="submit" />
				<input type="submit" class="button button-primary et-import-data" value="<?php esc_html_e( 'Import Data', 'ebdi-kc' ) ?>" />
			</form>
			<?php
      // after submit action
			if ( isset( $_POST[ 'submit' ] ) && is_admin() ) {
				?>
				<div class="wrap">
					<h3><?php esc_html_e( 'Imported!', 'ebdi-kc' ) ?></h3>
					<p><?php printf( __( 'You can %1s now or go to %2s', 'ebdi-kc' ), '<a href="' . admin_url( 'edit.php?post_type=page' ) . '" target="_blank">' . esc_html__( 'edit the pages', 'ebdi-kc' ) . '</a>', '<a href="' . esc_url( home_url( '/' ) ) . '" target="_blank">' . esc_html__( 'homepage', 'ebdi-kc' ) . '</a>' ) ?></p>
				</div>
				<?php
			}
      // load set of useful plugins
      require_once(  dirname( __FILE__ ) . '/useful-plugins.php' );
		}
	} 

	/**
	 * The import
	 */
	public function et_importIt() {
		if ( isset( $_POST[ 'submit' ] ) && is_admin() ) {
			// Download and parse the xml
			$xml_path		 = plugin_dir_path( __DIR__ ) . '/lib/envobusiness-free.xml';
			$internal_errors = libxml_use_internal_errors( true );

			$dom		 = new DOMDocument;
			$old_value	 = null;
			if ( function_exists( 'libxml_disable_entity_loader' ) ) {
				$old_value = libxml_disable_entity_loader( true );
			}
			$success = $dom->loadXML( file_get_contents( $xml_path ) );
			if ( !is_null( $old_value ) ) {
				libxml_disable_entity_loader( $old_value );
			}

			if ( !$success || isset( $dom->doctype ) ) {
				return new WP_Error( 'SimpleXML_parse_error', __( 'There was an error when reading this WXR file', 'ebdi-kc' ), libxml_get_errors() );
			}

			$xml = simplexml_import_dom( $dom );
			unset( $dom );

			// halt if loading produces an error
			if ( !$xml )
				return new WP_Error( 'SimpleXML_parse_error', __( 'There was an error when reading this WXR file', 'ebdi-kc' ), libxml_get_errors() );

			$wxr_version = $xml->xpath( '/rss/channel/wp:wxr_version' );
			if ( !$wxr_version )
				return new WP_Error( 'WXR_parse_error', __( 'This does not appear to be a WXR file, missing/invalid WXR version number', 'ebdi-kc' ) );

			$wxr_version = (string) trim( $wxr_version[ 0 ] );
			// confirm that we are dealing with the correct file format
			if ( !preg_match( '/^\d+\.\d+$/', $wxr_version ) )
				return new WP_Error( 'WXR_parse_error', __( 'This does not appear to be a WXR file, missing/invalid WXR version number', 'ebdi-kc' ) );

			$base_url	 = $xml->xpath( '/rss/channel/wp:base_site_url' );
			$base_url	 = (string) trim( $base_url[ 0 ] );

			$namespaces				 = $xml->getDocNamespaces();
			if ( !isset( $namespaces[ 'wp' ] ) )
				$namespaces[ 'wp' ]		 = 'http://wordpress.org/export/1.1/';
			if ( !isset( $namespaces[ 'excerpt' ] ) )
				$namespaces[ 'excerpt' ] = 'http://wordpress.org/export/1.1/excerpt/';


			// Succesfully loaded?
			if ( $xml !== FALSE ) {
				// Loop through some items in the xml
				foreach ( $xml->channel->item as $item ) {
					// Let's start with creating the post itself
					$content	 = $item->children( 'http://purl.org/rss/1.0/modules/content/' );
					$postCreated = array(
						'post_title'	 => (string) $item->title,
						'post_content'	 => (string) $content->encoded,
						'post_status'	 => 'publish',
						'post_type'		 => 'page', // Or "post" or some custom post type
					);

					if ( !function_exists( 'post_exists' ) ) {
						require_once( ABSPATH . 'wp-admin/includes/post.php' );
					}

					// Check if the post exist...
					$my_post_id = post_exists( $postCreated[ 'post_title' ] );

					// ...if yes do nothing
					if ( !$my_post_id ) {
						// Create the posts
						$post_id = wp_insert_post( $postCreated );

						// Grab post meta from xml
						$post	 = array(
							'post_title' => (string) $item->title,
							'guid'		 => (string) $item->guid,
						);
						$wp		 = $item->children( $namespaces[ 'wp' ] );
						foreach ( $wp->postmeta as $meta ) {
							$post[ 'postmeta' ][] = array(
								'key'	 => (string) $meta->meta_key,
								'value'	 => (string) $meta->meta_value
							);
						}
						// Save post meta from xml
						foreach ( $post[ 'postmeta' ] as $key => $value ) {

							if ( 'kc_data' === $value[ 'key' ] ) {
								$values = unserialize( $value[ 'value' ] );
							} else {
								$values = $value[ 'value' ];
							}
							// Add the post options
							update_post_meta( $post_id, $value[ 'key' ], $values );
						}
					}
				}

				// programmatically create some basic pages, and then set Home and Blog
				// create the blog page
				$blog_page_title = 'Blog';
				$blog_page_check = get_page_by_title( $blog_page_title );
				$blog_page		 = array(
					'post_type'		 => 'page',
					'post_title'	 => $blog_page_title,
					'post_content'	 => '',
					'post_status'	 => 'publish',
					'post_slug'		 => 'blog'
				);
				$post_id		 = post_exists( 'Blog' );
				if ( !isset( $blog_page_check->ID ) && !$post_id ) {
					$blog_page_id = wp_insert_post( $blog_page );
				}

				// Set the blog page
				$blog = get_page_by_title( 'Blog' );
				update_option( 'page_for_posts', $blog->ID );


				// Use a static front page
				if ( 'page' != get_option( 'show_on_front' ) ) {
					$front_page = get_page_by_title( 'Business Free #1' );
					update_option( 'page_on_front', $front_page->ID );
					update_option( 'show_on_front', 'page' );
				}

				// Import google fonts into KingComposer
				$fonts = Array(
					'Oswald'		 => Array(
						'0'	 => 'latin-ext%2Ccyrillic%2Cvietnamese%2Clatin',
						'1'	 => '200%2C300%2Cregular%2C500%2C600%2C700',
					),
					'Russo%20One'	 => Array(
						'0'	 => 'latin-ext%2Ccyrillic%2Clatin',
						'1'	 => 'regular',
					),
					'Indie%20Flower'	 => Array(
						'0'	 => 'latin',
						'1'	 => 'regular',
					),
				);
				update_option( 'kc-fonts', $fonts );
			} // XML false end
		} // if $_POST['submit'] end
	} // et_importIt end
} // ebdi_kc_SettingsPage end

if ( is_admin() )
	$my_settings_page = new ebdi_kc_SettingsPage();
