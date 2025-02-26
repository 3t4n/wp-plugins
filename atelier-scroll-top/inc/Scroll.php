<?php
/**
 * Scroll Class
 *
 * @package AtlScrollTop
 *
 */
namespace atlScrollTop;


class Scroll {

    public $name_plugin;

	public function __construct() {

		// Activation && Deactivation Hook
		$this->registerHook();
		$this->deactivationHook();

		// Load text domain
		add_action( 'plugins_loaded', [$this,'loadDomainLanguages'] );

		// Register submenu page
		add_action('admin_menu',[&$this, 'addSubmenuScrollTop']);

		// Register Scripts Web
		add_action('admin_enqueue_scripts',[$this,'enqueueScripts']);
		add_action('wp_enqueue_scripts',[$this,'enqueueScripts']);

		// Link settings page
		add_filter( "plugin_action_links_" . ATL_AST_PLUGIN_NAME , [$this,'settingsLinkPage']);
	}


	/**
	 * @param $links
	 *
	 * return links settings scroll page
	 */
	public function settingsLinkPage($links) {
		$mylinks = array (
			'<a href="' . admin_url('options-general.php?page=atelier-scroll-top'). '">' . esc_html_e('Settings','atl-scroll-top') . '</a>'
		);
		return array_merge ($links, $mylinks);
	}


	/**
	 * Register enqueue scripts
	 */
	public function enqueueScripts() {
		wp_enqueue_style('atlScrollTopCss', ATL_AST_PLUGIN_URL . 'assets/scrolltop.css' );
		wp_enqueue_style('atlFontelloScrollTop', ATL_AST_PLUGIN_URL . 'assets/fontello/css/fontello.css' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'googleFonts','https://fonts.googleapis.com/css?family=Dancing+Script&display=swap&subset=latin-ext' );
		wp_enqueue_script('atlScrollTopJs', ATL_AST_PLUGIN_URL . 'js/scrolltop.js', ['jquery'] );
		wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/scrolltop.js', __FILE__ ) );
	}

	/**
	 * Activation register hook
	 */
	public function registerHook() {
		register_activation_hook(__FILE__,[&$this,'plugin_activation']);
	}

	/**
	 * Deactivation register hook
	 */
	public function deactivationHook() {
		register_deactivation_hook(__FILE__,[&$this,'plugin_activation']);
	}

	/**
	 *  Load text Domain Internationalizing
	 */
	public function loadDomainLanguages() {
		load_plugin_textdomain('atl-scroll-top', false, basename( ATL_AST_PLUGIN_URL) . '/languages/' );
	}

	/**
	 * Add Submenu Page
	 */
	public function addSubmenuScrollTop() {
		add_options_page('Atelier Scroll Top','Atelier ScrollTop','manage_options','atelier-scroll-top',[&$this,'settingsScrollPage']);
	}

	/**
	 * Generate Settings Scroll
	 */
	public function settingsScrollPage() { ?>

        <!-- Admin Header -->
        <div class="header-adm">
            <div class="atl-stt-logo">
                <figure>
                    <img class="img-fluid" src="<?php echo esc_attr(ATL_AST_PLUGIN_URL . 'assets/img/logoMedium.png'); ?>" alt="<?php esc_html_e('Atelier Scroll Top Logo','atl-scroll-top'); ?>">
                </figure>
            </div>
            <div class="atl-stt-title">
                <h1><?php esc_html_e('Atelier Scroll Top','atl-scroll-top'); ?></h1>
            </div>
        </div>
        <hr class="hr-head">

		<!-- Displaying Form & Settings Api -->
		<div class="admin-wrapper">
			<form action="options.php" method="post">
				<?php settings_fields('atl_plugin_scroll_option_group'); ?>
				<?php do_settings_sections('atelier-scroll-top'); ?>
				<?php submit_button(); ?>
			</form>
		</div>
	<?php }


}