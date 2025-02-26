<?php

namespace APG\Core;

use APG\Core\Viewer;

/**
 * Class Posttype
 * @package APG\Core
 */
class Posttype {

    /**
     * Register the custom post type and media buttons
     */
	public function register() {
        // Custom post type
		add_action( 'init', array( $this, 'apg_hook_album_taxonomy' ), 0 );
		add_action( 'init', array( $this, 'apg_hook_album_posttype' ) );

        // Custom columns
        add_filter( 'manage_apg_photo_albums_posts_columns', array( $this, 'apg_set_post_columns' ) );
        add_action( 'manage_posts_custom_column', array( $this, 'apg_set_post_columns_content' ), 10, 2 );

        // Media buttons above all posts
        add_action( 'media_buttons', array( $this, 'apg_hook_media_buttons' ), 15 );
	}

	/**
	 * Hook the APG post type for albums
	 */
	public function apg_hook_album_posttype() {
		$labels = array(
			'name'               =>  _x( 'Photo Albums', 'post type general name', 'apg' ),
			'singular_name'      => _x( 'Photo Album', 'post type singular name', 'apg' ),
			'menu_name'          => _x( 'Photo Albums', 'admin menu', 'apg' ),
			'name_admin_bar'     => _x( 'Photo Album', 'add new on admin bar', 'apg' ),
			'add_new'            => __( 'Add New Album', 'apg' ),
			'add_new_item'       => 'Awesome Photo Gallery - ' . __( 'Add New Album', 'apg' ),
			'new_item'           => __( 'New Photo Album', 'apg' ),
			'edit_item'          => 'Awesome Photo Gallery - ' . __( 'Edit Photo Album', 'apg' ),
			'view_item'          => __( 'View Photo Album', 'apg' ),
			'all_items'          => __( 'All Photo Albums', 'apg' ),
			'search_items'       => __( 'Search Photo Albums', 'apg' ),
			'parent_item_colon'  => __( 'Parent Photo Albums:', 'apg' ),
			'not_found'          => __( 'No Photo Albums found.', 'apg' ),
			'not_found_in_trash' => __( 'No Photo Albums found in Trash.', 'apg' )
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'albums' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon'          => 'dashicons-images-alt',
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
		);

		register_post_type( 'apg_photo_albums', $args );
	}

	/**
	 * Setup the docs categories
	 */
	public function apg_hook_album_taxonomy() {
		$labels = array(
			'name'              => 'Awesome Photo Gallery - ' . _x( 'Photo Albums categories', 'taxonomy general name', 'apg' ),
			'singular_name'     => _x( 'Photo Album category', 'taxonomy singular name', 'apg' ),
			'search_items'      => __( 'Search Photo Album', 'apg' ),
			'all_items'         => __( 'All Photo Album categories', 'apg' ),
			'parent_item'       => __( 'Parent Photo Album category', 'apg' ),
			'parent_item_colon' => __( 'Parent Photo Album category:', 'apg' ),
			'edit_item'         => __( 'Edit Photo Album category', 'apg' ),
			'update_item'       => __( 'Update Photo Album category', 'apg' ),
			'add_new_item'      => __( 'Add New Photo Album category', 'apg' ),
			'new_item_name'     => __( 'New Photo Album category', 'apg' ),
			'menu_name'         => __( 'Album categories', 'apg' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'public'            => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'albums-categories' ),
		);

		register_taxonomy('apg_photo_albums_category', array('apg_photo_albums'), $args);
	}


	/**
     * Hook the media buttons in WordPress
     */
    public function apg_hook_media_buttons() {
        echo '<button type="button" id="apg-media-add-album-overview" class="button"><span class="dashicons dashicons-images-alt" style="padding-top: 2px;"></span> APG - ' . __('Add Albums Overview', 'apg') . '</button>';
    }

    /**
     * Set the custom columns for our post type apg_photo_albums
     *
     * @param $cols
     *
     * @return array
     */
    public function apg_set_post_columns( $cols ) {
	    $cols = array(
		    'cb'            => '<input type="checkbox" />',
		    'apg_img'       => __( 'Photo', 'apg' ),
		    'title'         => __( 'Title' ),
		    'apg_photos'    => __( '# Photos', 'apg' ),
		    'apg_category'  => __( 'Category', 'apg' ),
		    'apg_shortcode' => __( 'Shortcode', 'apg' ) . ' <a href="https://codebrothers.eu/documentation/apg-available-shortcodes/?utm_source=WordPress&utm_medium=referral&utm_campaign=apg_post_type_overview" target="_blank" class="button" style="height: 20px; line-height:18px; font-size: 11px;">' . __( 'More info', 'apg' ) . '</a>',
		    'date'          => __( 'Date' ),
		    'author'        => __( 'Author' ),
		    'date'          => __( 'Date' ),
	    );

        return $cols;
    }

    /**
     * Fill the custom columns with the values of the album
     *
     * @param $column
     * @param $post_id
     */
    public function apg_set_post_columns_content( $column, $post_id ) {
        switch( $column ) {
            case 'apg_photos':
                $viewer = new Viewer();
                printf( __( '%d photos', 'apg' ), count( $viewer->get_photos( $post_id ) ) );
                break;
            case 'apg_img':
	            $viewer = new Viewer();
	            $thumbnail = get_the_post_thumbnail( $post_id, array( 50, 50 ) );

				if( empty( $thumbnail ) ) {

					$photos = $viewer->get_photos( $post_id );

					if( isset( $photos[0]['ID'] ) ) {
						echo wp_get_attachment_image( $photos[0]['ID'], array( 50, 50 ) );
					}
					else {
						echo '<img src="' . plugins_url( 'assets/backend/images/placeholder.png', APG_ROOT_PATH ) . '" alt="APG - Placeholder" />';
					}
				}
				else{
					echo $thumbnail;
				}

                break;
            case 'apg_category':
	            $album_categories = get_the_terms( $post_id, 'apg_photo_albums_category' );

	            if ( ! empty( $album_categories ) && ! is_wp_error( $album_categories ) ) {
		            $apg_cats = array();

		            foreach ( $album_categories as $album_term ) {
			            $link = get_term_link( $album_term );
			            $apg_cats[] = '<a href="' . $link . '">' . $album_term->name . '</a>';
		            }

		            echo implode( ', ', $apg_cats );
	            }
				else{
					echo '<i>' . __( 'No category', 'apg' ) . '</i>';
				}

                break;
            case 'apg_shortcode':
                echo '<code>[apg_album id=' . $post_id . ' preview=true]</code>';
                break;
        }
    }

}