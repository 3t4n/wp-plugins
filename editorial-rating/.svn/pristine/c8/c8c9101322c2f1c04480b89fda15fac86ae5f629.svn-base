<?php
/**
 * Define the custom post type functionality.
 *
 * Loads and defines the custom post type for this plugin
 * so that it is ready for admin menu under a different post type.
 *
 * @link       https://forhad.net/
 * @since      2.0.0
 *
 * @package    WPAS_Editorial_Rating
 * @subpackage WPAS_Editorial_Rating/includes
 */

/**
 * Define the custom post type functionality.
 */
class WPAS_Editorial_Rating_CPT {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Settings page ID for WPAS_Editorial_Rating settings.
	 */
	const PAGE_ID = 'wpas_review';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Redirect after activation.
	 *
	 * @param string $file Path to the plugin file, relative to the plugin.
	 * @return void
	 */
	public function wpas_redirect_after_activation( $file ) {

		if ( WPASER_BASE_FILE === $file ) {

			exit( esc_url( wp_safe_redirect( admin_url( 'edit.php?post_type=wpas_review&page=wpas_help' ) ) ) );
		}
	}

	/**
	 * Custom Post Type of the Plugin.
	 *
	 * @since    2.0.0
	 */
	public function wpas_post_type() {

		if ( post_type_exists( 'wpas_review' ) ) {

			return;
		}

		$capability = apply_filters( 'wpas_review_ui_permission', 'manage_options' );
		$show_ui    = current_user_can( $capability ) ? true : false;
		$labels     = apply_filters(
			self::PAGE_ID . '_post_type_labels',
			array(
				'name'               => esc_html_x( 'All Reviews', 'wpas_editorial_rating' ),
				'singular_name'      => esc_html_x( 'Reviews', 'wpas_editorial_rating' ),
				'add_new'            => esc_html__( '+ Add Review', 'wpas_editorial_rating' ),
				'add_new_item'       => esc_html__( 'Add New Review', 'wpas_editorial_rating' ),
				'edit_item'          => esc_html__( 'Edit Review', 'wpas_editorial_rating' ),
				'new_item'           => esc_html__( 'New Review', 'wpas_editorial_rating' ),
				'view_item'          => esc_html__( 'View Review', 'wpas_editorial_rating' ),
				'search_items'       => esc_html__( 'Search Reviews', 'wpas_editorial_rating' ),
				'not_found'          => esc_html__( 'No Review found.', 'wpas_editorial_rating' ),
				'not_found_in_trash' => esc_html__( 'No Review found in trash.', 'wpas_editorial_rating' ),
				'parent_item_colon'  => esc_html__( 'Parent Item:', 'wpas_editorial_rating' ),
				'menu_name'          => esc_html__( 'Editorial Rating', 'wpas_editorial_rating' ),
				'all_items'          => esc_html__( 'All Reviews', 'wpas_editorial_rating' ),
			)
		);

		$args = apply_filters(
			self::PAGE_ID . '_post_type_args',
			array(
				'labels'              => $labels,
				'public'              => false,
				'hierarchical'        => false,
				'exclude_from_search' => true,
				'show_ui'             => $show_ui,
				'show_in_admin_bar'   => false,
				'menu_position'       => apply_filters( 'wpas_review_menu_position', 20 ),
				'menu_icon'           => 'data:image/svg+xml;base64,' . base64_encode( '<svg style="fill:rgba(240,246,252,.6);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192c0-44.2-35.8-80-80-80s-80 35.8-80 80s35.8 80 80 80s80-35.8 80-80zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z"/></svg>' ),
				'rewrite'             => false,
				'query_var'           => false,
				'imported'            => true,
				'supports'            => array( 'title' ),
			)
		);
		register_post_type( self::PAGE_ID, $args );
		register_taxonomy(
			'er_cat',
			array( self::PAGE_ID ),
			array(
				'hierarchical'      => true,
				'labels'            => 'Categories',
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'er_cat' ),
			)
		);

		/**
		 * Adding Post type for Cross Rating.
		 */
		$labels = apply_filters(
			'wpas_cross_rating_post_type_labels',
			array(
				'name'               => esc_html_x( 'Cross Ratings', 'wp-post-slider-grandslider' ),
				'singular_name'      => esc_html_x( 'Cross Ratings', 'wp-post-slider-grandslider' ),
				'add_new'            => esc_html__( '+ Add Cross Rating', 'wp-post-slider-grandslider' ),
				'add_new_item'       => esc_html__( '+ Add Cross Rating', 'wp-post-slider-grandslider' ),
				'edit_item'          => esc_html__( 'Edit Cross Rating Group', 'wp-post-slider-grandslider' ),
				'new_item'           => esc_html__( 'New Cross Rating', 'wp-post-slider-grandslider' ),
				'view_item'          => esc_html__( 'View Cross Rating Group', 'wp-post-slider-grandslider' ),
				'search_items'       => esc_html__( 'Search Cross Ratings', 'wp-post-slider-grandslider' ),
				'not_found'          => esc_html__( 'No Cross Rating Group found.', 'wp-post-slider-grandslider' ),
				'not_found_in_trash' => esc_html__( 'No Cross Rating Group found in trash.', 'wp-post-slider-grandslider' ),
				'parent_item_colon'  => esc_html__( 'Parent Item:', 'wp-post-slider-grandslider' ),
				'menu_name'          => esc_html__( 'Cross Rating Settings', 'wp-post-slider-grandslider' ),
				'all_items'          => esc_html__( 'Cross Ratings', 'wp-post-slider-grandslider' ),
			)
		);
		$args   = apply_filters(
			'wpas_cross_rating_post_type_args',
			array(
				'labels'              => $labels,
				'exclude_from_search' => true,
				'show_ui'             => true,
				'show_in_admin_bar'   => false,
				'rewrite'             => false,
				'query_var'           => false,
				'supports'            => array( 'title' ),
				'show_in_menu'        => 'edit.php?post_type=' . self::PAGE_ID,
			)
		);
		register_post_type( 'wpas_cross_rating', $args );
	}

	/**
	 * Change Reviews updated messages.
	 *
	 * @param string $messages The Update messages.
	 * @return statement
	 */
	public function wpas_updated_messages( $messages ) {
		global $post, $post_ID;
		$messages[ self::PAGE_ID ] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf( __( 'Review updated.', 'wpas_editorial_rating' ) ),
			2  => '',
			3  => '',
			4  => __( ' updated.', 'wpas_editorial_rating' ),
			5  => isset( $_GET['revision'] ) ? sprintf( esc_html( 'Review restored to revision from %s' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => sprintf( __( 'Review published.', 'wpas_editorial_rating' ) ),
			7  => __( 'Review saved.', 'wpas_editorial_rating' ),
			8  => sprintf( __( 'Review submitted.', 'wpas_editorial_rating' ) ),
			9  => sprintf( wp_kses_post( 'Review scheduled for: <strong>%1$s</strong>.', 'wpas_editorial_rating' ), date_i18n( __( 'M j, Y @ G:i', 'wpas_editorial_rating' ), strtotime( $post->post_date ) ) ),
			10 => sprintf( __( 'Review draft updated.', 'wpas_editorial_rating' ) ),
		);
		return $messages;
	}

	/**
	 * Change Placeholder of new post title input.
	 */
	public function wpas_change_title_text( $title ){
		$screen = get_current_screen();
	  
		if  ( 'wpas_review' == $screen->post_type ) {

			$title = 'Add a section title';
		}
	  
		return $title;
   }

	/**
	 * Add new custom columns.
	 *
	 * @param [type] $columns The columns.
	 * @return statement
	 */
	public function wpas_admin_column( $columns ) {
		return array(
			'cb'        => '<input type="checkbox" />',
			'title'     => __( 'Name', 'wpas_editorial_rating' ),
			'category'  => __( 'Category', 'wpas_editorial_rating' ),
			'shortcode' => __( 'Shortcode', 'wpas_editorial_rating' ),
			'date'      => __( 'Date', 'wpas_editorial_rating' ),
		);
	}

	/**
	 * Display admin columns content.
	 *
	 * @param mix    $column The columns.
	 * @param string $post_id The post ID.
	 * @return void
	 */
	public function wpas_admin_field( $column, $post_id ) {
		switch ( $column ) {
			case 'category':
				$terms = wp_get_post_terms( $post_id, 'er_cat', array( 'fields' => 'names' ) );
				// Check if categories are present.
				if ( !empty( $terms ) ) {
					// If so, output them.
					echo join( ', ', $terms );
				} else {
					// If no category is assigned, output a default message.
					_e( 'No Category Assigned', 'wpas_editorial_rating' );
				}
				break;

			case 'shortcode':
				echo '<input title="Copy the Shortcode" style="width:200px;padding:2px 12px;color:#e91e63;text-align:center;cursor:copy;" type="text" onClick="this.select();" readonly="readonly" value="[editorial-rating id=&quot;' . esc_attr( $post_id ) . '&quot;]"/>';
				break;
			default:
				echo '';
		}
	}

	/**
	 * Admin help page
	 *
	 * @since    2.0.0
	 */
	public function wpas_help_admin_submenu() {

		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			__( '+ Add New', 'wpas_editorial_rating' ),
			__( '+ Add New', 'wpas_editorial_rating' ),
			'manage_options',
			'post-new.php?post_type=wpas_cross_rating',
			array(),
			4
		);

		$wpas_block_redirect_link = admin_url() . 'edit.php?post_type=wpas_review&page=wpas-global-options#tab=blocks';
		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			'',
			'Blocks',
			'manage_options',
			$wpas_block_redirect_link,
			'',
			5
		);

		add_submenu_page(
			'edit.php?post_type=' . self::PAGE_ID,
			__( 'Help', 'wpas_editorial_rating' ),
			__( 'Help', 'wpas_editorial_rating' ),
			'manage_options',
			'wpas_help',
			array( $this, 'wpas_help_callback' ),
			10
		);

		if ( 'PRESTIGE' !== WPASER_COPY ) {

			$wpas_pro_redirect_link = 'https://pluginic.com/plugins/editorial-rating/?ref=100';
			add_submenu_page(
				'edit.php?post_type=' . self::PAGE_ID,
				'',
				'<span style="display: flex;align-items: center;gap: 5px;color: #8bc34a;"><i class="dashicons dashicons-superhero-alt"></i> ' . esc_html__( 'Go Pro', 'post-block' ) . '</span>',
				'manage_options',
				$wpas_pro_redirect_link
			);
		}
	}

	/**
	 * Admin help callback function
	 *
	 * @since    1.0.0
	 */
	public function wpas_help_callback() {

		include_once WPASER_DIR_PATH_FILE . '/admin/wpas-help-admin-display.php';
	}

	/**
	 * Add action links.
	 *
	 * @param Array $actions Get all action links.
	 * @param Sting $plugin_file Get all plugin file paths.
	 * @return Array
	 */
	public function wpas_add_action_plugin( $actions, $plugin_file ) {

		static $plugin;

		if ( ! isset( $plugin ) ) {

			$plugin = WPASER_BASE_FILE;
		}

		if ( $plugin == $plugin_file ) {

			$site_link = array( 'support' => '<a href="https://pluginic.com/support/?ref=100" target="_blank">Support</a>' );
			$settings  = array( 'settings' => '<a href="' . esc_url( get_admin_url() . 'edit.php?post_type=wpas_review&page=wpas_help' ) . '">' . __( 'Get Started', 'General' ) . '</a>' );

			// Add link before Deactivate.
			$actions = array_merge( $site_link, $actions );
			$actions = array_merge( $settings, $actions );

			// Add link after Deactivate.
			if ( 'PRESTIGE' !== WPASER_COPY ) {

				$actions[] = '<a href="https://pluginic.com/plugins/editorial-rating/?ref=100">' . __( '<br><svg style="width: 14px;height: 14px;margin-bottom: -2px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36"><path fill="#4caf50" d="M35 19c0-2.062-.367-4.039-1.04-5.868-.46 5.389-3.333 8.157-6.335 6.868-2.812-1.208-.917-5.917-.777-8.164.236-3.809-.012-8.169-6.931-11.794 2.875 5.5.333 8.917-2.333 9.125-2.958.231-5.667-2.542-4.667-7.042-3.238 2.386-3.332 6.402-2.333 9 1.042 2.708-.042 4.958-2.583 5.208-2.84.28-4.418-3.041-2.963-8.333C2.52 10.965 1 14.805 1 19c0 9.389 7.611 17 17 17s17-7.611 17-17z"/><path fill="#cddc39" d="M28.394 23.999c.148 3.084-2.561 4.293-4.019 3.709-2.106-.843-1.541-2.291-2.083-5.291s-2.625-5.083-5.708-6c2.25 6.333-1.247 8.667-3.08 9.084-1.872.426-3.753-.001-3.968-4.007C7.352 23.668 6 26.676 6 30c0 .368.023.73.055 1.09C9.125 34.124 13.342 36 18 36s8.875-1.876 11.945-4.91c.032-.36.055-.722.055-1.09 0-2.187-.584-4.236-1.606-6.001z"/></svg><span style="font-weight: bold;color: #4caf50;"> Go Pro</span>', 'General' ) . '</a>';
			}
		}

		return $actions;
	}

	/**
	 * CPT Header.
	 */
	public function wpas_cpt_custom_header() {
		
		// Getting screen data.
		$wpas_screen = get_current_screen();

		// Show header.
		if ( 'wpas_review' === $wpas_screen->post_type || 'wpas_cross_rating' === $wpas_screen->post_type ) {

			if ( 'wpas_review_page_wpas-global-options' !== $wpas_screen->base && 'wpas_review_page_wpas_help' !== $wpas_screen->base ) {
			?>
			<style>
			@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400..700&display=swap');
			div#wpbody {
				font-family: "Rubik", sans-serif;
				font-optical-sizing: auto;
			}
			/* Hide all kind of notice except license notice, Hide page heading, Hide action button */
			div#wpbody-content [class*="notice"]:not(.wpas-license-notice),
			.wp-heading-inline,
			.page-title-action {
				display: none !important;
			}
			/* Inner Body */
			#wpcontent {
				background: rgb(206 255 243 / 30%) !important;
			}
			#screen-meta-links {
				position: absolute;
				top: 0;
				right: 0;
				z-index: 9999;
			}
			.wpas-option-body {
				margin-left: -20px;
			}
			.wpas-setting-header {
				margin-bottom: 20px;
				box-sizing: border-box;
				background-image: linear-gradient(to right, #009688, #009688, #4caf50, #009688) !important;
				border-bottom: 1px solid #dedede;
			}
			.wpas-setting-header-info {
				position: relative;
				overflow: hidden;
			}
			.wpas-setting-header-info > img {
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				object-fit: cover;
				object-position: center -180px;
			}
			.frhd-setting-header-info-content {
				display: flex;
				align-items: center;
				gap: 30px;
				justify-content: space-between;
				flex-wrap: wrap;
				padding: 20px;
				position: relative;
				z-index: 999;
			}
			.frhd-dashboard-logo {
				display: flex;
				align-items: center;
				gap: 20px;
			}
			.frhd-setting-header-info-content img {
				max-width: 70px;
				max-height: 70px;
				filter: drop-shadow(1px 1px 1px #919191);
			}
			.frhd-setting-header-info-content h1 {
				font-size: 37px;
				font-weight: bold;
				color: rgb(3,34,27);
				text-shadow: 1px 1px 1px #f9ffb9;
			}
			#frhd-plugin-version {
				position: relative;
				padding: 3px 17px;
				font-weight: 500;
				text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
				background: linear-gradient(to bottom, #8BC34A, rgb(3, 34, 27));
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
				display: inline-block;
				font-size: 14px;
				color: #fff;
				margin-left: 7px;
				border-radius: 50px;
			}
			#frhd-plugin-version:before {
				content: "";
				position: absolute;
				z-index: -1;
				top: -1px;
				right: -1px;
				bottom: -1px;
				left: -1px;
				border-radius: 999px;
			}
			#frhd-plugin-version span {
				width: 20px;
				height: 20px;
				position: absolute;
				top: -2px;
				right: 10px;
				transform: rotate(-20deg);
				filter: blur(0.5px);
				animation-name: wpas-spin;
				animation-duration: 20000ms;
				animation-iteration-count: infinite;
				animation-timing-function: linear;
			}
			#frhd-plugin-version span:before,
			#frhd-plugin-version span:after {
				content: "";
				position: absolute;
			}
			#frhd-plugin-version span:before {
				width: 1px;
				height: 100%;
				left: 12px;
				background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.7), transparent);
			}
			#frhd-plugin-version span:after {
				width: 100%;
				height: 1px;
				top: 10px;
				left: 0;
				background: linear-gradient(to left, transparent, rgba(255, 255, 255, 0.7), transparent);
			}
			.frhd-dashboard-nav nav {
				display: flex;
				justify-content: center;
				align-items: center;
				flex-wrap: wrap;
				gap: 10px;
			}
			.frhd-dashboard-nav nav a {
				border-radius: 3px;
				color: #2f2e2e;
				padding: 7px 13px;
				text-decoration: none;
				transition: all .15s ease;
				border: 1px solid transparent;
				display: inline-flex;
				align-items: center;
				gap: 2px;
				font-size: 13px;
				line-height: 13px;
				font-weight: bold;
				text-shadow: 1px 1px 3px #cfcfcf;
			}
			.frhd-dashboard-nav nav a.frhd-current,
			.frhd-dashboard-nav nav a:hover {
				background-color: #fff;
				border-color: #dfdbdb;
				box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
			}
			.frhd-dashboard-nav nav a .dashicons {
				font-size: 16px;
				line-height: 21px;
			}
			/* span.frhd-nav-badge {
				color: #f18500;
				vertical-align: super;
				font-size: 9px;
				font-weight: 700;
				padding-left: 2px;
				margin-top: -10px;
				animation: wpas-fade-in 1.6s infinite linear;
			} */
			span.frhd-nav-badge {
    color: #f18500;
    vertical-align: super;
    font-size: 9px;
    font-weight: 700;
    margin-top: -19px;
    animation: wpas-fade-in 1.6s infinite linear;
    margin-left: -26px;
}
			.dashicons-admin-home:before {
				content: "\f102";
			}
			/* Animation */
			@keyframes wpas-spin {
				from {transform:rotate(0deg);}
				to {transform:rotate(360deg);}
			}
			@keyframes wpas-fade-in {
				0% {
					opacity: 0
				}
				40% {
					opacity: 1
				}
				60% {
					opacity: 1
				}
				to {
					opacity: 0
				}
			}
			</style>
			<div class="wpas-option-body">
				<div class="wpas-setting-header">
					<div class="wpas-setting-header-info">
						<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/admin-head-bg-pattern.png' ); ?>" alt="">
						<div class="frhd-setting-header-info-content">
							<div class="frhd-dashboard-logo">
								<img src="<?php echo esc_url( WPASER_DIR_URL_FILE . 'admin/img/plugin-logo.png' ); ?>" alt="Header Footer Customizer">
								<div class="frhd-plugin-about">
									<h1>Editorial Rating<sup id="frhd-plugin-version"><?php echo WPAS_Editorial_Rating_VERSION; ?><span></span></sup></h1>
								</div>
							</div>
							<div class="frhd-dashboard-nav">
								<?php if ( 'wpas_review' === $wpas_screen->post_type ) : ?>
								<nav>
									<a href="<?php echo get_admin_url() . 'edit.php?post_type=wpas_review'; ?>" class="<?php echo ( 'edit' === $wpas_screen->base ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-star-filled"></span>All Reviews</a>
									<a href="<?php echo get_admin_url() . 'post-new.php?post_type=wpas_review'; ?>" class="<?php echo ( 'post' === $wpas_screen->base && 'add' === $wpas_screen->action ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-plus-alt"></span>Add New Review</a>
									<a href="<?php echo get_admin_url() . 'edit-tags.php?taxonomy=er_cat&post_type=wpas_review'; ?>" class="<?php echo ( 'edit-tags' === $wpas_screen->base ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-category"></span>All Categories</a>
									<a href="<?php echo get_admin_url() . 'edit.php?post_type=wpas_cross_rating'; ?>" style="padding: 8px 13px 6px;"><span class="dashicons dashicons-controls-repeat"></span>Cross Ratings<span class="frhd-nav-badge">&nbsp;NEW!</span></a>
								</nav>
								<?php else : ?>
								<nav>
									<a href="<?php echo get_admin_url() . 'edit.php?post_type=wpas_cross_rating'; ?>" class="<?php echo ( 'edit' === $wpas_screen->base ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-controls-repeat"></span>Cross Ratings<span class="frhd-nav-badge">&nbsp;NEW!</span></a>
									<a href="<?php echo get_admin_url() . 'post-new.php?post_type=wpas_cross_rating'; ?>" class="<?php echo ( 'post' === $wpas_screen->base && 'add' === $wpas_screen->action ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-plus-alt"></span>Add Cross Rating</a>
									<a href="<?php echo get_admin_url() . 'edit.php?post_type=wpas_review'; ?>" class="<?php echo ( 'edit-tags' === $wpas_screen->base ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-undo"></span>Back to Reviews</a>
									<a href="<?php echo get_admin_url() . 'edit-tags.php?taxonomy=er_cat&post_type=wpas_review'; ?>" class="<?php echo ( 'edit-tags' === $wpas_screen->base ) ? 'frhd-current' : ''; ?>"><span class="dashicons dashicons-category"></span>All Categories</a>
								</nav>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php
				if ( 'wpas_review' !== $wpas_screen->post_type && 'PRESTIGE' !== WPASER_COPY ) {

					echo '<div style="position: relative;border: 2px dashed #9C27B0;padding: 20px;text-align: center;font-size: 17px;text-shadow: 1px 1px 1px #9C27B0;max-width: 1200px;margin: auto;margin-bottom: 70px;"><h2>Editorial Cross Rating feature only available for PRO version.</h2><p>This feature offers you the ability to effortlessly create and manage cross-referenced ratings and reviews based on specific grouped review ratings that you have created previously. It enables you to showcase a group of reviews in a sequential manner, starting from the top scores and gradually descending.</p><span style="position: absolute;left: -2px;top: -2px;background: #9C27B0;color: #fff;font-size: 13px;padding: 3px 17px;">PRO Features</span></div>';
				}
				?>
			</div>
			<?php
			}
		}
	}
}
