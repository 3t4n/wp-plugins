<?php
namespace ArtistPress\Includes;

/**
 * Exit if accessed directly
 */	
if (!defined('ABSPATH')) {
	exit;
}

class ArtistPress
{
    protected $loader;
    protected $name;
    protected $version;

    public function __construct()
	{
		if (defined('ARTISTPRESS_VERSION') ) {
			$this->version = ARTISTPRESS_VERSION;
		} else {
			$this->version = '1.5.2';
		}
		$this->name = 'artistpress';
        
        $this->loadDependencies();
        $this->setLocalization();
        $this->defineAdminHooks();
		$this->definePublicHooks();
    }

    public function loadDependencies()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'Includes/Loader.php';
        
        require_once plugin_dir_path(dirname(__FILE__)) . 'Includes/Localization.php';

        //require_once plugin_dir_path(dirname(__FILE__)) . 'Includes/Constants.php';

        spl_autoload_register([$this, 'autoloadClasses']);

        $this->loader = new Loader();
    }

    /**
	 * Define the locale for ArtistPress for internationalization.
	 *
	 * @access   private
	 * @since    1.5.0
	 */
	private function setLocalization()
	{
		$localization = new Localization();

		$this->loader->addAction('plugins_loaded', $localization, 'loadPluginTextdomain');
	}

    /**
	 * Auto Load Plugin Classes
	 * @access   private
	 * @param 	 string		$class_name
	 * @since    1.5.0
	 */
	public function autoloadClasses($className)
	{
        $class	=   str_replace('_', '-', $className);
        $classNamePieces = explode( '\\' , $class);
        
        unset($classNamePieces[0]);

        $fileName = \array_pop($classNamePieces);
        $fileDirectory = join(DIRECTORY_SEPARATOR, $classNamePieces);
		$file =  $fileDirectory . '/' . $fileName . '.php';

		if (file_exists(plugin_dir_path(dirname(__FILE__)) . $file )) {
            include_once( plugin_dir_path(  dirname( __FILE__ )  ) .  $file  );
		}
	}

    private function defineAdminHooks()
    {
        $updater = new \ArtistPress\Administration\Update\V122($this->getPluginName(), $this->getVersion());
		$updater->run();

		$updater = new \ArtistPress\Administration\Update\V151($this->getPluginName(), $this->getVersion());
		$updater->run();
		
		$functions = new \ArtistPress\Includes\Functions();
		$this->loader->addAction('init', $functions, 'registerImageSizes');

		$adminViews     =	[];
        $adminViews[]	=	new \ArtistPress\Administration\View\Dashboard($this->getPluginName(), $this->getVersion());
        $adminViews[]	=	new \ArtistPress\Administration\View\Settings($this->getPluginName(), $this->getVersion());

		foreach ($adminViews as $adminView) {
            $this->loader->addAction('admin_menu', $adminView, 'buildView');
			$this->loader->addAction('parent_file', $adminView, 'setViewParent');
            $this->loader->addAction('admin_enqueue_scripts', $adminView, 'enqueueStyles');
			$this->loader->addAction('admin_enqueue_scripts', $adminView, 'enqueueScripts');
        }

		$contentViews = [];
		$contentViews[]	=	new \ArtistPress\Administration\View\Artist($this->getPluginName(), $this->getVersion());
		$contentViews[]	=	new \ArtistPress\Administration\View\Venue($this->getPluginName(), $this->getVersion());
		$contentViews[]	=	new \ArtistPress\Administration\View\Show($this->getPluginName(), $this->getVersion());
		$contentViews[]	=	new \ArtistPress\Administration\View\Gallery($this->getPluginName(), $this->getVersion());

		foreach ($contentViews as $contentView) {
            $this->loader->addAction('init', $contentView, 'registerContentType');
            $this->loader->addAction('admin_menu', $contentView, 'buildView');
			$this->loader->addAction('parent_file', $contentView, 'setViewParent');
            $this->loader->addAction('enter_title_here', $contentView, 'titleFilter');
            $this->loader->addFilter('manage_posts_columns', $contentView, 'customColumns');
			$this->loader->addAction('manage_posts_custom_column', $contentView, 'customColumnData', 10 , 2);
            $this->loader->addAction('admin_enqueue_scripts', $contentView, 'enqueueStyles');
			$this->loader->addAction('admin_enqueue_scripts', $contentView, 'enqueueScripts');
            $this->loader->addAction('load-post-new.php', $contentView, 'adminRedirects');
			$this->loader->addAction('admin_notices', $contentView, 'adminNotices');
        }

		$metaBoxes = [];
        $metaBoxes[] = new \ArtistPress\Administration\Meta\Artist(
            'artist_info',
            __('Artist Information', 'artistpress'),
            'artist'
        );
		$metaBoxes[] = new \ArtistPress\Administration\Meta\Venue(
            'venue_details',
            __('Venue Details', 'artistpress'),
            'venue'
        );
		$metaBoxes[] = new \ArtistPress\Administration\Meta\Show(
            'show_details',
            __('Show Details', 'artistpress'),
            'show'
        );
		$metaBoxes[] = new \ArtistPress\Administration\Meta\Gallery(
            'gallery_content',
            __('Gallery Images', 'artistpress'),
            'artistpress-gallery'
        );

		foreach($metaBoxes as $metaBox){
			$this->loader->addAction('add_meta_boxes', $metaBox, 'register');
			$this->loader->addAction('save_post', $metaBox, 'save');
		}
		
		$settingsSection = [];
		$settingsSection[]	= new \ArtistPress\Administration\Settings\Artist(
			$this->getPluginName(),
			$this->getVersion(),
			'Artist Settings',
			'artistpress_artist_settings',
			'artistpress_artist_settings_section'
		);

		$settingsSection[] = new \ArtistPress\Administration\Settings\ShowList(
			$this->getPluginName(),
			$this->getVersion(),
			'Show List Settings',
			'artistpress_show_list_settings',
			'artistpress_show_list_settings_section'
		);

		$settingsSection[] = new \ArtistPress\Administration\Settings\Show(
			$this->getPluginName(),
			$this->getVersion(),
			'Individual Shows Settings',
			'artistpress_show_settings',
			'artistpress_show_settings_section'
		);

		$settingsSection[] = new \ArtistPress\Administration\Settings\Gallery(
			$this->getPluginName(),
			$this->getVersion(),
			'Gallery Settings',
			'artistpress_gallery_settings',
			'artistpress_gallery_settings_section'
		);

		$settingsSection[] = new \ArtistPress\Administration\Settings\Upgrade(
			$this->getPluginName(),
			$this->getVersion(),
			'Upgrade Settings',
			'artistpress_upgrade_settings',
			'artistpress_upgrade_settings_section'
		);

		foreach ($settingsSection as $settings) {
            $this->loader->addAction('admin_init', $settings, 'registerSettings');	
		}
    }

    private function definePublicHooks()
    { 
    }

	public function run()
	{
        $this->loader->run();
	}

    /**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
     * 
	 * @return    string    The name of the plugin.
	 * @since     1.5.0
	 */
	public function getPluginName()
	{
		return $this->name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
     * 
	 * @return    ArtistPress_Loader Orchestrates the hooks of the plugin.
	 * @since     1.5.0
	 */
	public function getLoader()
	{
		return $this->loader;
	}

    /**
	 * Retrieve the version number of the plugin.
     * 
	 * @return    string    The version number of the plugin.
	 * @since     1.5.0
	 */
	public function getVersion() 
	{
		return $this->version;
	}

    /**
	 * Flushes rewrites only if needed
	 *
	 * @return    string    The version number of the plugin.
	 * @since     1.5.0
	 */
	// public function flushRewrites()
	// {
	// 	if( get_option('artistpress_rewrite_flag')) {
	// 		flush_rewrite_rules();
	// 		delete_option( 'artistpress_rewrite_flag');
	// 	}
	// }
}
