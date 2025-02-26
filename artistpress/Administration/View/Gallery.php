<?php
namespace ArtistPress\Administration\View;

class Gallery extends View
{
    public function registerContentType()
    {
        $args = [
            'labels' => [
                'name'                  => _x('Galleries', 'post type plural name', 'artistpress'),
                'singular_name'         => _x('Gallery', 'post type singular name', 'artistpress'),
                'add_new'               => __('Add New', 'artistpress'),
                'add_new_item'          => __('Add New Gallery', 'artistpress'),
                'edit_item'             => __('Edit Gallery', 'artistpress'),
                'new'                   => __('New Gallery', 'artistpress'),
                'view_item'             => __('View Gallery', 'artistpress'),			
                'search_term'           => __('Search Galleries', 'artistpress'),
                'not_found'             => __('No Galleries Found', 'artistpress'),
                'not_found_in_trash'    => __('No Galleries in Trash', 'artistpress'),
            ],
            'public'            => true,
            'public_queryable'  => true,
            'show_in_menu'	    => false,
            'show_in_admin_bar' => true,
            'capability_type'	=> 'page',
            'show_in_rest'	    => true,
            'rewrite' => [
                'slug'	=> 'artistpress-gallery',
                'feeds'	=> false,
            ],
            'supports'	=> [
                'title',
                'thumbnail'
            ]
        ];

        $taxArgs = [
            'labels' => [
                'name'              => _x('Albums', 'taxonomy general name', 'artistpress'),
                'singular_name'     => _x('Album', 'taxonomy singular name', 'artistpress'),
                'search_items'      => __('Search Albums', 'artistpress'),
                'all_items'         => __('All Albums', 'artistpress'),
                'edit_item'         => __('Edit Album', 'artistpress'),
                'update_item'       => __('Update Album', 'artistpress'),
                'add_new_item'      => __('Add New Album', 'artistpress'),
                'new_item_name'     => __('New Album Name', 'artistpress'),
                'menu_name'         => __('Gallery Albums', 'artistpress'),
            ],
            'hierarchical' => false,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite' => [
                'slug' => 'artistpress-album'
            ]
        ];
        
		\register_post_type('artistpress-gallery',  $args);
        \register_taxonomy('artistpress-album', 'artistpress-gallery', $taxArgs);

	}
    
    public function customColumns($columns) 
    {
		global $typenow;
		
		if ('artistpress-gallery' != $typenow ){
			return $columns;
		} 	

		$columns = array(
			'cb' => '<input type="checkbox" />',
            'artistpress_id' => 'Gallery ID',
            'artistpress_image' => 'Gallery Image',
            'title' => 'Gallery Name',
			'date' => 'Date'   
		);
		
		return \apply_filters(__METHOD__ , $columns);
    }

    public function customColumnData($column, $post_id) 
    {
		global $typenow;

        if ('artistpress-gallery' != $typenow) {
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
    
    public function buildMenu()
    {
        \add_submenu_page(
            'artistpress',
            'Artipress Galleries',
            'Galleries',
            'manage_options',
            'edit.php?post_type=artistpress-gallery'
        );
    }
}
