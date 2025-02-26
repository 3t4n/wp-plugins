<?php namespace SmoothScroll;

use Premmerce\SDK\V2\FileManager\FileManager;
use SmoothScroll\Admin\Admin;
use SmoothScroll\Frontend\Frontend;
use SmoothScroll\Admin\Settings;

/**
 * Class SmoothScrollPlugin
 *
 * @package SmoothScroll
 */
class SmoothScrollPlugin {

    const DOMAIN = 'anchor-smooth-scroll';
    
    const BASE_NAME = 'anchor-smooth-scroll/anchor-smooth-scroll.php';

    const VERSION = '1.0.0';

	/**
	 * @var FileManager
	 */
	private $fileManager;

	/**
	 * SmoothScrollPlugin constructor.
	 *
     * @param string $mainFile
	 */
    public function __construct($mainFile) {
        $this->fileManager = new FileManager($mainFile);

        add_action('plugins_loaded', [ $this, 'loadTextDomain' ]);

	}

	/**
	 * Run plugin part
	 */
	public function run() {
		if ( is_admin() ) {
			new Admin( $this->fileManager );
		} else {
			new Frontend( $this->fileManager );
		}

	}

    /**
     * Load plugin translations
     */
    public function loadTextDomain()
    {
        $name = $this->fileManager->getPluginName();
        load_plugin_textdomain('anchor-smooth-scroll', false, $name . '/languages/');
    }

	/**
	 * Fired when the plugin is activated
	 */
	public function activate() {
		// TODO: Implement activate() method.

        if(!isset( $options['remove_anchor_highlight'])){
            $options['remove_anchor_highlight'] = false;
        }

        $options = get_option( Settings::OPTIONS );
        $options['offset'] = Settings::OFFSET;
        $options['scroll_duration'] = Settings::SCROLL_DURATION;
        $options['custom_anchor_selector'] = Settings::CUSTOM_ANCHOR_SELECTOR;
        $options['remove_anchor_highlight'] = Settings::REMOVE_ANCOR_HIGHLIGHT;
        $options['disable_theme_scroll'] = Settings::DISABLE_THEME_SCROLL;
        update_option(Settings::OPTIONS, $options);
	}

	/**
	 * Fired when the plugin is deactivated
	 */
	public function deactivate() {
		// TODO: Implement deactivate() method.

	}

	/**
	 * Fired during plugin uninstall
	 */
	public static function uninstall() {
		// TODO: Implement uninstall() method.
        delete_option(Settings::OPTIONS);
	}
}