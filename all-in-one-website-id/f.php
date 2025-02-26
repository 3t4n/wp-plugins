<?php
class all_in_one_website_id {

	public function __construct() {

		add_action( 'admin_init', array( $this, 'custom_objects' ) );
		add_action( 'admin_head', array( $this, 'add_css' ) );

		// For Post 
		add_filter( 'manage_posts_columns', array( $this, 'add_column' ) );
		add_action( 'manage_posts_custom_column', array( $this, 'add_value' ),  10, 2 );
		
		// For Category 
		add_action( 'manage_edit-link-categories_columns', array( $this, 'add_column' ) );
		add_filter( 'manage_link_categories_custom_column', array( $this, 'add_return_value' ), 10, 3 );

		// For Media 
		add_filter( 'manage_media_columns', array( $this, 'add_column' ) );
		add_action( 'manage_media_custom_column', array( $this, 'add_value' ), 10, 2 );

		// For Page 
		add_filter( 'manage_pages_columns', array( $this, 'add_column' ) );
		add_action( 'manage_pages_custom_column', array( $this, 'add_value' ), 10, 2 );
		
		// For User 
		add_action( 'manage_users_columns', array( $this, 'add_column' ) );
		add_filter( 'manage_users_custom_column', array( $this, 'add_return_value' ), 10, 3 );

		// For Link 
		add_filter( 'manage_link-manager_columns', array( $this, 'add_column' ) );
		add_action( 'manage_link_custom_column', array( $this, 'add_value' ), 10, 2 );

		// For Comment
		add_action( 'manage_edit-comments_columns', array( $this, 'add_column' ) );
		add_action( 'manage_comments_custom_column', array( $this, 'add_value' ), 10, 2 );
	}

	public function custom_objects() {

		$taxonomies = get_taxonomies( array( 'public' => true ), 'names' );
		foreach ( $taxonomies as $custom_taxonomy ) {
			if ( isset( $custom_taxonomy ) ) {
				add_action( 'manage_edit-' . $custom_taxonomy . '_columns', array( $this, 'add_column' ) );
				add_filter( 'manage_' . $custom_taxonomy . '_custom_column', array( $this, 'add_return_value' ), 10, 3 );
			}
		}

		$post_types = get_post_types( array( 'public' => true ), 'names' );
		foreach ( $post_types as $post_type ) {
			if ( isset( $post_type ) ) {
				add_action( 'manage_edit-' . $post_type . '_columns', array( $this, 'add_column' ) );
				add_filter( 'manage_' . $post_type . '_custom_column', array( $this, 'add_return_value' ), 10, 3 );
			}
		}
	}

	public function add_css() {
		?>
		<style type="text/css">
			#get-all-website-id {
				width: 50px;
			}
		</style>
		<?php
	}

	public function add_column( $cols ) {

		$cols['get-all-website-id'] = 'ID';

		return $cols;
	}

	public function add_value( $column_name, $id ) {
		if ( 'get-all-website-id' === $column_name ) {
			echo $id;
		}
	}

	public function add_return_value( $value, $column_name, $id ) {

		if ( 'get-all-website-id' === $column_name ) {
			$value = $id;
		}

		return $value;
	}
}

new all_in_one_website_id;

?>