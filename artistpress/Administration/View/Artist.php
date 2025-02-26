<?php
namespace ArtistPress\Administration\View;

class Artist extends View
{
    protected $settings;
    
    public function __construct($name, $version)
    {
        parent::__construct($name, $version);
        $this->setSettings();
    }

    private function setSettings()
    {
        $this->settings = \get_option('artistpress_artist_settings');
    }

    protected function getSetting($key)
    {
        if (empty($this->settings[$key])) {
            return;
        }

        return \sanitize_option($key, $this->settings[$key]);
    }

    public function registerContentType()
    {
        $singular   = 'Artist';
        $plural     = 'Artists';
		
        $labels = [
            'name'                  => $plural,
            'singular_name'         => $singular,
            'add_new'               => 'Add New',
            'add_new_item'          => 'Add New ' . $singular ,
            'edit_item'             => 'Edit ' . $singular,
            'new'                   => 'New' . $singular,
            'view_item'             => 'View ' . $singular,				
            'search_term'           => 'Search ' . $plural,
            'parent'                => 'Parent ' . $singular,
            'not_found'             => 'No ' . $plural . ' Found',
            'not_found_in_trash'    => 'No ' . $plural . ' in Trash',
        ];
		
        /**
         * Base args
        */
        $args = [
            'labels'		    => $labels,
            'show_ui'		    => true,
            'query_var'		    => true,
            'show_in_menu'	    => false,
            'capability_type'	=> 'page',
            'show_in_rest'	    => true,
            'rewrite' => [
                'slug'	=> 'artist',
                'feeds'	=> false,
            ],
            'supports'	=> [
                'title',
                'thumbnail'
            ],
        ];
        
        /**
	 	 * Conditional args
	     */
        if ($this->getSetting('artist_use_shortcode') == 'no') {
            $args['public'] = true;
            $args['public_queryable'] = true;
            $args['show_in_admin_bar'] = true;

        } else {
            $args['public'] = false;
            $args['public_queryable'] = false;
            $args['show_in_admin_bar'] = false;
		}

		\register_post_type('artist',  $args);
	}
    
    /**
	 * Adds custom columns for this view
	 * @since	1.5.0
	 */
    public function customColumns($columns) 
    {
		global $typenow;
		
		if ('artist' != $typenow ){
			return $columns;
		} 	

		$columns = array(
			'cb' => '<input type="checkbox" />',
            'artistpress_id' => 'Artist ID',
            'artistpress_image' => 'Artist Image',
            'title' => 'Artist Name',
			'date' => 'Date'   
		);
		
		return \apply_filters(__METHOD__ , $columns);
    }

    /**
	 * Add the data to the custom columns
	 * @since	1.5.0
	 */
    public function customColumnData($column, $post_id) 
    {
		global $typenow;

        if ('artist' != $typenow) {
            return;
        }

		switch($column) {
			case 'artistpress_id':
				echo $post_id;
				break;
			
			case 'artistpress_image':
				echo \the_post_thumbnail('thumbnail');
				break;
		}
    } 
    
	public function adminRedirects()
	{
		global $typenow;

		if ('artist' != $typenow) {
			return;
		} 
		
		$total = \get_posts([
			'post_type' => 'artist', 
			'numberposts' => -1, 
			'post_status' => 'publish' 
        ]);

		if ($total && count($total) >= 1 ) {
			\wp_safe_redirect('edit.php?post_type=artist');
		} 
	}

	public function adminNotices()
	{
		global $typenow, $pagenow;

		$total = \get_posts( array( 
			'post_type' => 'artist', 
			'numberposts' => -1, 
			'post_status' => 'publish' 
		));

		if (($typenow == 'artist') && ($pagenow == 'edit.php')){
			if( $total && count( $total ) >= 1 ) {
				echo '<div id="my-custom-warning" class="notice notice-error settings-error is-dismissible">';
				echo '<p>The maximum number of published <strong>ArtistPress Artists</strong> has been met.</p>';
				echo '</div>';
			}
		}
	}

    /**
	 * Renders the menus and page for this view
	 * @since    1.5.0
     */
    public function buildMenu()
    {
        \add_submenu_page(
            'artistpress',
            'Artists',
            'Artists',
            'manage_options',
            'edit.php?post_type=artist'
        );
    }
}