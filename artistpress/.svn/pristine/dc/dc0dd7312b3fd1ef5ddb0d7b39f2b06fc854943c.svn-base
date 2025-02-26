<?php
namespace ArtistPress\Administration\View;

class Show extends View
{
    protected $settings;
    
    public function __construct($name, $version)
    {
        parent::__construct($name, $version);
        $this->setSettings();
    }
    
    private function setSettings()
    {
        $this->settings = \get_option('artistpress_show_list_settings');
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
        $args = [
            'labels'    => [
                'name'                  => __('Show', 'artistpress'),
                'singular_name'         => __('Show', 'artistpress'),
                'add_new'               => __('Add New', 'artistpress'),
                'add_new_item'          => __('Add New Show', 'artistpress'),
                'edit_item'             => __('Edit Show', 'artistpress'),
                'new'                   => __('New Show', 'artistpress'),
                'view_item'             => __('View Show', 'artistpress'),				
                'search_term'           => __('Search Shows', 'artistpress'),
                'parent'                => __('Parent Show', 'artistpress'),
                'not_found'				=> __('No Shows Found', 'artistpress'),
                'not_found_in_trash'    => __('No Shows In Trash', 'artistpress'),
            ],
            'public'				=> true,
            'exclude_from_search'	=> false,
            'show_in_nav_menus'		=> true,	
            'show_ui'				=> true,
            'show_in_menu'			=> false,
            'show_in_admin_bar'		=> true,
            'menu_position'			=> 10,
            'menu_icon'				=> 'dashicons-businessman',
            'can_export'			=> true,
            'delete_with_user'		=> false,
            'hierarchical'			=> false,	
            'query_var'				=> true,
            'capability_type'		=> 'page',
            'map_meta_cap'			=> true,
            'rewrite'			=> [
                'slug'			=> 'shows',
                'with_front' 	=> true,
                'pages'			=> true,
                'feeds'			=> false,
	        ],
            'supports'	=> [
                'title',
                'thumbnail'
            ]
        ];

        /**
	 	 * Conditional args
	     */
        if ($this->getSetting('show_list_use_shortcode') == 'no') {
            $args['has_archive'] = true;
            $args['public_queryable'] = true;

        } else {
            $args['has_archive'] = false;
            $args['public_queryable'] = false;
		}
    
	    \register_post_type('show',  $args);
	}

    public function customColumns($columns) 
    {
	    global $typenow;
		
        if ('show' != $typenow ){
            return $columns;
        }

	    $columns = [
	        'cb' => '<input type="checkbox" />',
	        'artistpress_id' => 'Show ID',
            'artistpress_image' => 'Featured Image',
            'title' => 'Show Title',
	        'date' => 'Date',
        ];
		
	    return \apply_filters(__METHOD__ , $columns);
    }

    public function customColumnData($column, $post_id) 
    {
		global $typenow;

		if ('show' != $typenow) {
		    return;
		} 	

		switch ( $column ) {
			case 'artistpress_id':
				echo $post_id;
				break;
            case 'artistpress_image':
                echo \the_post_thumbnail('thumbnail');
                break;
		}
    } 

    public function buildMenu()
    {
        \add_submenu_page(
            'artistpress',
            'Shows',
            'Shows',
            'manage_options',
            'edit.php?post_type=show'
        );
    }
}
