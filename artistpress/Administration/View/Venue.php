<?php
namespace ArtistPress\Administration\View;

class Venue extends View
{
    public function registerContentType()
    {
		$singular	= 'Venue';
		$plural		= 'Venues';
		
        $args = [
            'labels'    => [
                'name'                  => $plural,
                'singular_name'         => $singular,
                'add_new'               => 'Add New',
                'add_new_item'          => 'Add New ' . $singular ,
                'edit_item'             => 'Edit ' . $singular,
                'new'                   => 'New' . $singular,
                'view_item'             => 'View ' . $singular,				
                'search_term'           => 'Search ' . $plural,
                'parent'                => 'Parent ' . $singular,
                'not_found'				=> 'No ' . $plural . ' Found',
                'not_found_in_trash'    => 'No ' . $plural . ' in Trash',
            ],
            'show_ui'		    => true,
            'show_in_menu'	    => false,
            'capability_type'	=> 'page',
            'show_in_rest'	    => true,
            'supports'	=> [
                'title'
            ],
        ];
    
		\register_post_type('venue',  $args);
	}
    
    public function customColumns($columns) 
    {
		global $typenow;
		
		if ('venue' != $typenow ){
			return $columns;
		} 	

		$columns = array(
			'cb' => '<input type="checkbox" />',
			'artistpress_id' => 'Venue ID',
			'title' => 'Venue Name',
			'date' => 'Date' 
		);
		
		return \apply_filters(__METHOD__ , $columns);
    }

    public function customColumnData($column, $post_id) 
    {
		global $typenow;

		if ('venue' != $typenow) {
			return;
		} 	

		switch ( $column ) {
			case 'artistpress_id':
				echo $post_id;
				break;
		}
    } 
    
    public function buildMenu()
    {
        \add_submenu_page(
            'artistpress',
            'Venues',
            'Venues',
            'manage_options',
            'edit.php?post_type=venue'
        );
    }
}
