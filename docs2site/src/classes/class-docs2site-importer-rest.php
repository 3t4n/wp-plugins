<?php
/**
 * register rest route and handler for API requests.
 *
 * @package Docs2Site_Importer
 * @subpackage  Docs2Site_Importer
 */

defined( 'ABSPATH' ) || exit;

/**
 * Global Settings.
 */
class Docs2Site_Importer_Rest {

    /**
	 * REST API base.
	 *
	 * @var string
	 */
	public $rest_api_base = 'docs2site/v1';

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialization.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init() {        
        // Includes.
        $this->includes();

		// Initialize hooks.
		$this->init_hooks();
    }
    
    /**
     * Include core files.
     *
     * @return void
     */
    private function includes() {
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/post.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';
    }

	/**
	 * Initialize hooks.
	 *
	 * @since 1.0.0
	 * @access private
	 *
	 * @return void
	 */
	private function init_hooks() {
		add_action( 'rest_api_init', array( $this, 'initialize_rest_routes' ) );
	}

    /**
     * Add our REST API routes to handle posts updates and creation tasks.
     *
     * @return void
     */
	public function initialize_rest_routes() {
        
        // Register route for documents POST handling.
        register_rest_route( $this->rest_api_base, 'documents', [
            'methods'             => 'POST',
            'callback'            => array( $this, 'post_document' ),
            'permission_callback' => function( $request ) {
                return $this->authorize_api( $request );
            },
        ] );
        
        // register route for images POST handling.
        register_rest_route( $this->rest_api_base, 'images', [
            'methods'             => 'POST',
            'callback'            => array( $this, 'post_image' ),
            'permission_callback' => function( $request ) {
                return $this->authorize_api( $request );
            },
        ] );
        
        // register route for images delete.
        register_rest_route( $this->rest_api_base, 'images/(?P<id>\d+)', [
            'methods'             => 'DELETE',
            'callback'            => array( $this, 'delete_image' ),
            'permission_callback' => function( $request ) {
                return $this->authorize_api( $request );
            },
        ] );
        
        // register route for authors GET Request.
        register_rest_route( $this->rest_api_base, 'authors', [
            'methods'  => 'GET',
            'callback' => array( $this, 'get_authors' ),
            'permission_callback' => function( $request ) {
                return $this->authorize_api( $request );
            },
        ] );
        
        // Handle categories GET request.
        register_rest_route( $this->rest_api_base, 'categories', [
            'methods'  => 'GET',
            'callback' => array( $this, 'get_categories' ),
            'permission_callback' => function( $request ) {
                return $this->authorize_api( $request );
            },
        ] );
        
        // Ping GET handler.
        register_rest_route( $this->rest_api_base, 'ping', [
            'methods'  => 'GET',
            'callback' => array( $this, 'get_ping' ),
            'permission_callback' => function( $request ) {
                return $this->authorize_api( $request );
            },
        ] );
    }

    /**
     * Authorize the REST requests.
     *
     * @param [type] $request
     * @return void
     */
    private function authorize_api( $request ) {
        $auth_header = $request->get_header( 'Authorization' );
        $jwt_token = substr( $auth_header, 7 );

        if ( $jwt_token !== get_option( 'docs2site_importer_connect_token' ) ) {
            return false;
        }

        return true;
    }

    /**
     * Handle the Post content POST request.
     *
     * @param [type] $request
     * @return void
     */
    public function post_document( $request ) {
        // get params.
        $params = $request->get_json_params();

        $type         = $params['type'];
        $status       = $params['status'];
        $author_id    = $params['author_id'];
        $category_ids = $params['category_ids'];
        $title        = $params['title'];
        $content      = $params['content'];
        $image_ids    = $params['image_ids'];

        if ( !isset( $type ) || !isset( $status ) || !isset( $author_id ) || !isset( $category_ids ) || !isset( $title ) || !isset( $content ) || !isset( $image_ids ) ) {
            return new WP_Error( 400, __( 'Must include all of the required params', 'docs2site' ) );
        }

        wp_set_current_user( $author_id );

        $post = [
            'post_type'     => $type,
            'post_title'    => wp_strip_all_tags( $title ),
            'post_status'   => $status,
            'post_author'   => $author_id,
            'post_category' => $category_ids,
            'post_content'  => $content,
        ];

        $post_id = wp_insert_post( $post, true );

        if ( is_wp_error( $post_id ) ) {
            return new WP_Error( 500, __( 'Could not insert post', 'docs2site' ) );
        }

        foreach ( $image_ids as $image_id ) {
            $image = array(
                'ID'          => $image_id,
                'post_parent' => $post_id
            );

            $error = wp_update_post( $image );

            if ( is_wp_error( $error ) ) {
                return new WP_Error( 500, 'Could not update post' );
            }
        }

        update_option( 'docs2site_importer_get_last_import', time() );

        return [
            'id' => $post_id,
        ];
    }

    /**
     * Handles the post request for images.
     *
     * @param [type] $request
     * @return void
     */
    public function post_image( $request ) {
        
        // Get request parameters.
        $params = $request->get_json_params();

        $author_id  = $params['authorId'];
        $url        = $params['url'];
        $crop       = $params['crop'];
        $dimensions = $params['dimensions'];

        if ( !isset( $author_id ) || !isset( $url ) ) {
            return new WP_Error( 400, __( 'Must include all required params', 'docs2site' ) );
        }

        wp_set_current_user( $author_id );

        $image = wp_tempnam();

        $response = wp_safe_remote_get( $url, array(
            'stream'   => true,
            'filename' => $image,
            'timeout'  => 30,
        ) );

        if ( is_wp_error( $response ) ) {
            wp_delete_file( $image );
            return new WP_Error( 500, __( 'Could not download image', 'docs2site' ) );
        }
        
        $response_code = wp_remote_retrieve_response_code( $response );
        
        if ( 200 != $response_code ) {
            return new WP_Error( 500, 'Could not download image' );
        }
        
        $content_disposition = wp_remote_retrieve_header( $response, 'content-disposition' );
        
        preg_match( '/filename="(.*)"/', $content_disposition, $matches );
        $dest_filename = $matches[1];
        
        if ( !isset( $dest_filename ) ) {
            return new WP_Error( 500, __( 'Could not get downloaded image file name', 'docs2site' ) );
        }

        $edit = wp_get_image_editor( $image );

        if ( is_wp_error( $edit ) ) {
            wp_delete_file( $image );
            return new WP_Error( 500, __( 'Could not initialize image editor', 'docs2site' ) );
        }

        $size     = $edit->get_size();
        $width    = $size['width'];
        $height   = $size['height'];
        $r_width  = $dimensions['width'];
        $r_height = $dimensions['height'];

        if ( !empty( $crop ) ) {
            $top    = $height * ( isset( $crop['top'] ) ? $crop['top'] : 0 );
            $bottom = $height * ( isset( $crop['bottom'] ) ? $crop['bottom'] : 0 );
            $left   = $width * ( isset( $crop['left'] ) ? $crop['left'] : 0 );
            $right  = $width * ( isset( $crop['right'] ) ? $crop['right'] : 0 );

            $c_width  = $width - $left - $right;
            $c_height = $height - $top - $bottom;

            $edit->crop( $left, $top, $c_width, $c_height );
        }

        if ( $width !== $r_width || $height !== $r_height ) {
            $edit->resize( $r_width, $r_height );
        }

        $edit->set_quality( 100 );

        $result = $edit->save( $image );
        wp_delete_file( $image );

        if ( is_wp_error( $result ) ) {
            return new WP_Error( 500, __( 'Could not save edited image', 'docs2site' ) );
        }

        $dest_image = $result['path'];

        $file = [
            'name'     => $dest_filename,
            'tmp_name' => $dest_image,
        ];

        $id = media_handle_sideload( $file, 0 );
        wp_delete_file( $dest_image );

        if ( is_wp_error( $id ) ) {
            return new WP_Error( 500, __( 'Could not sideload image', 'docs2site' ) );
        }

        $url = wp_get_attachment_url( $id );

        return [
            'id'  => $id,
            'url' => $url,
        ];
    }
    
    /**
     * Handle DELETE request for images.
     *
     * @return void
     */
    public function delete_image( $request ) {
        
        $id     = $request->get_param( 'id' );
        $result = wp_delete_attachment( $id );

        if ( empty($result) ) {
            return new WP_Error( 500, __( 'Could not delete image', 'docs2site' ) );
        }

        return new WP_REST_Response( null, 201 );
    }
    
    /**
     * Get authors for post assignments.
     *
     * @return void
     */
    public function get_authors() {
        
        // Get authors only for post assignment.
        $users = get_users( 'who=authors' );
        $results = array();

        foreach( $users as $user ) {
            array_push( $results, array(
                'id'   => $user->ID,
                'name' => $user->display_name,
            ) );
        }

        return $results;
    }

    /**
     * Get categories for post assignment.
     *
     * @return void
     */
    public function get_categories(){
        $categories = get_categories( array(
            'hide_empty' => false,
        ) );
        
        $results = array();
        
        // Loop through categories.
        foreach( $categories as $category ) {
            array_push( $results, array(
                'id'   => $category->term_id,
                'name' => $category->name,
            ) );
        }
        return $results;
    }

    /**
     * Ping handler for API.
     *
     * @return void
     */
    public function get_ping() {
        return array(
            'pluginVersion'    => DOCS2SITE_IMPORTER_VERSION,
            'wordpressVersion' => get_bloginfo( 'version' ),
            'phpVersion'       => phpversion(),
        );
    }
}

new Docs2Site_Importer_Rest();
