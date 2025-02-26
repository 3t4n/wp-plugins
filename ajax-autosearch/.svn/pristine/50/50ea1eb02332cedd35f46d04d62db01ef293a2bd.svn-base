<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://catchplugins.com/plugins/ajax-autosearch
 * @since      1.0.0
 *
 * @package    Ajax_AutoSearch
 * @subpackage Ajax_AutoSearch/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ajax_AutoSearch
 * @subpackage Ajax_AutoSearch/admin
 * @author     Catch Plugins <info@catchplugins.com>
 */
class Ajax_AutoSearch_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Breadcrumb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Breadcrumb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name . '-icon', plugin_dir_url( __FILE__ ) . 'css/icon-style.css', array(), $this->version, 'all' );
		if ( isset( $_GET['page'] ) && 'ajax-autosearch' === $_GET['page'] ) {
			wp_enqueue_style( $this->plugin_name . '-display-dashboard', plugin_dir_url( __FILE__ ) . 'css/admin-dashboard.css', array(), $this->version, 'all' );
		}
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Breadcrumb_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Breadcrumb_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( isset( $_GET['page'] ) && 'ajax-autosearch' === $_GET['page'] ) {
			wp_enqueue_script( 'matchHeight', plugin_dir_url( __FILE__ ) . 'js/jquery-matchHeight.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ajax-autosearch-admin.js', array( 'jquery', 'matchHeight', 'jquery-ui-tooltip' ), $this->version, false );

		}
	}

	/**
	 * Ajax AutoSearch: action_links
	 * Ajax AutoSearch Settings Link function callback
	 *
	 * @param arrray $links Link url.
	 *
	 * @param arrray $file File name.
	 */
	public function action_links( $links, $file ) {
		if ( $file === $this->plugin_name . '/' . $this->plugin_name . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=ajax-autosearch' ) ) . '">' . esc_html__( 'Settings', 'ajax-autosearch' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}

	/**
	 * Add plugin menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_plugin_settings_menu() {
		$icon = AJAX_AUTOSEARCH_URL . 'admin/images/icon.svg';
		add_menu_page(
			esc_html__( 'Ajax AutoSearch', 'ajax-autosearch' ), // $page_title.
			esc_html__( 'Ajax AutoSearch', 'ajax-autosearch' ), // $menu_title.
			'manage_options', // $capability.
			'ajax-autosearch', // $menu_slug.
			array( $this, 'settings_page' ), // $callback_function.
			$icon, // $icon_url.
			'99.01564' // $position.
		);
	}

	/**
	 * Settings page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.', 'ajax-autosearch' ) );
		}

		require plugin_dir_path( __FILE__ ) . 'partials/ajax-autosearch-admin-display.php';
	}

	/**
	 * Register the plugin settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function register_settings() {
		register_setting(
			'ajax-autosearch-group',
			'ajax_autosearch_options',
			array( $this, 'sanitize_callback' )
		);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @param array $input Input data.
	 * @since    1.0.0
	 */
	public function sanitize_callback( $input ) {
		if ( isset( $input['reset'] ) && $input['reset'] ) {
			// If reset, restore defaults.
			return ajax_autosearch_default_options();
		}
		$message = null;
		$type    = null;

		// Verify the nonce before proceeding.
		if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			|| ( ! isset( $_POST['ajax_autosearch_nounce'] )
			|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ajax_autosearch_nounce'] ) ), basename( __FILE__ ) ) )
			|| ( ! check_admin_referer( basename( __FILE__ ), 'ajax_autosearch_nounce' ) ) ) {
			if ( null !== $input ) {
				$input['enable_post_filter']     = ( isset( $input['enable_post_filter'] ) && '1' === $input['enable_post_filter'] ) ? '1' : '0';
				$input['enable_category_filter'] = ( isset( $input['enable_category_filter'] ) && '1' === $input['enable_category_filter'] ) ? '1' : '0';
				$input['enable_tags_filter']     = ( isset( $input['enable_tags_filter'] ) && '1' === $input['enable_tags_filter'] ) ? '1' : '0';
				$input['show_featured_image']    = ( isset( $input['show_featured_image'] ) && '1' === $input['show_featured_image'] ) ? '1' : '0';
				$input['limit']                  = ( isset( $input['limit'] ) ) ? absint( $input['limit'] ) : 10;
			}
			return $input;
		}
		return 'Invalid Nonce';
	}

	/**
	 * Adds meta links in plugin page.
	 *
	 * @param array  $meta_fields Meta fields.
	 * @param string $file File Path.
	 * @since    1.0.0
	 */
	public function add_plugin_meta_links( $meta_fields, $file ) {
		if ( AJAX_AUTOSEARCH_BASENAME == $file ) {
			$meta_fields[] = "<a href='https://catchplugins.com/support-forum/forum/ajax-autosearch/' target='_blank'>Support Forum</a>";
			$meta_fields[] = "<a href='https://wordpress.org/support/plugin/ajax-autosearch/reviews#new-post' target='_blank' title='Rate'>
					<i class='ct-rate-stars'>"
			. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			. "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>"
			. '</i></a>';

			$stars_color = '#ffb900';

			echo '<style>'
				. '.ct-rate-stars{display:inline-block;color:' . $stars_color . ';position:relative;top:3px;}'
				. '.ct-rate-stars svg{fill:' . $stars_color . ';}'
				. '.ct-rate-stars svg:hover{fill:' . $stars_color . '}'
				. '.ct-rate-stars svg:hover ~ svg{fill:none;}'
				. '</style>';
		}

		return $meta_fields;
	}
}
