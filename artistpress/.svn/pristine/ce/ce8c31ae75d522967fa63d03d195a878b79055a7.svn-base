<?php
namespace ArtistPress\Administration\View;

abstract class View
{
    protected $name;
    protected $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    	1.5.1
	 * @param 		string    $name
	 * @param 		string    $version
	 */
    public function __construct($name, $version) 
    {
    	$this->name 	= $name;
		$this->version  = $version;
    }

	/**
	 * Register the stylesheets for the admin.
	 * @since   1.5.1
	 */
	public function enqueueStyles()
	{
		$currentPage = \get_current_screen();
		$adminPages  = ['toplevel_page_artistpress', 'artistpress_page_artistpress_settings'];
		$pages 		 = ['edit', 'post-new', 'post'];
		$postTypes 	 = ['artist', 'venue', 'show', 'artistpress-gallery'];

        \wp_register_style('artistpress-admin', ARTISTPRESS_DIR_URL . '/build/admin.css', [], $this->version);
		
		if (\in_array($currentPage->base, $adminPages)) {
			\wp_enqueue_style('artistpress-admin');
		}

		if (
			\in_array($currentPage->base, $pages) &&
			\in_array($currentPage->post_type, $postTypes)
		) {
			\wp_enqueue_style('artistpress-admin');
		}
	}
    
    /**
	 * Register the scripts for the admin.
	 * @since   1.5.1
	 */
	public function enqueueScripts()
	{
		$currentPage = \get_current_screen();
		$pages 		 = ['edit', 'post-new', 'post'];
		$postTypes 	 = ['artist', 'venue', 'show', 'artistpress-gallery'];

		$showSettings = \get_option('artistpress_show_settings');
		
		\wp_register_script('artistpress-admin', ARTISTPRESS_DIR_URL . '/build/admin.js', ['jquery'], $this->version, ['in_footer' => true]);
		\wp_register_script('google_api_loader', 'https://unpkg.com/@googlemaps/js-api-loader@1.x/dist/index.min.js', [], $this->version);
		\wp_register_script('artistpress_maps', ARTISTPRESS_DIR_URL . '/build/maps.js', ['google_api_loader'], $this->version, true);
		
		if ( !empty($showSettings['artistpress_maps_api']) ) {
			\wp_localize_script('artistpress_maps', 'artistpressAdmin', ['mapKey' => $showSettings['artistpress_maps_api']]);
		}
		
		if (
			\in_array($currentPage->base, $pages) &&
			\in_array($currentPage->post_type, $postTypes)
		) {
			\wp_enqueue_script('artistpress-admin');
		}

		//echo $currentPage->post_type;

		if (
			\in_array($currentPage->base, $pages) &&
			($currentPage->post_type == 'venue')
		) {
			\wp_enqueue_script('artistpress_maps');
		}
	}

    /**
	 * Builds the view menu.
	 *
	 * @since   1.5.0
	 */
	abstract public function buildMenu();

	/**
	 * Filter content type registration based on settings
	 * @since   1.5.0
	 */
	public function registerContentTypeArgs($args, $postType)
	{
		return $args;
	}
    
    /**
	 * Registers this content type
	 * 
	 * @since   1.5.0
	 */
	public function registerContentType()
	{
		return false;
	}

    /**
	 * Admin redirects
	 * 
	 * @since   1.5.0
	 */
	public function adminRedirects()
	{
		return false;
	}
    
    /**
	 * Admin notices
	 * 
	 * @since   1.5.0
	 */
	public function adminNotices()
	{
		return false;
	}

    /**
	 * Filters the placeholder for title field
	 * 
	 * @since   1.5.0
	 */
	public function titleFilter($title) 
	{
		$screen = \get_current_screen();

	 	if ('show' == $screen->post_type) {
	 		$title = 'Enter show title here';
	    
	    } elseif ('artist' == $screen->post_type) {
	    	$title = 'Enter artist name here';
	    
	    } elseif ('venue' == $screen->post_type) {
	    	$title = 'Enter venue name here';
	    
		} elseif ('artistpress-gallery' == $screen->post_type) {
	    	$title = 'Enter gallery title here';

	    } elseif ('artistpress_playlist' == $screen->post_type) {
	    	$title = 'Enter playlist title here';
	    }

	 	return $title;
	}	
    
    /**
	 * Builds the view.
	 * 
	 * @since   1.5.0
	 */
    public function buildView()
    {
        $this->buildMenu();
    }

	/**
	 * Filters setting parent menu to make the plugin submenus stay active therefore displayed when editing the ArtistPress Custom Post Types
	 */
	public function setViewParent($parent)
	{
		$currentScreen = \get_current_screen();

		if ( ! in_array($currentScreen->base, ['post', 'edit', 'post-new'])) {
			return $parent;
		}

		if (in_array($currentScreen->post_type, ['artist', 'venue', 'show', 'artistpress-gallery'])) {
			return 'artistpress';
		}
		
	}
}
