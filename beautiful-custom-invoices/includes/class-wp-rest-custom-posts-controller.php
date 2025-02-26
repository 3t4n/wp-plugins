<?php

class WP_REST_Custom_Posts_Controller extends WP_REST_Posts_Controller {

    /**
     * Registers the routes for the objects of the controller.
     *
     * @since 4.7.0
     *
     * @see register_rest_route()
     */
    public function register_routes() {

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base,
            array(
                array(
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'get_items' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                ),
                array(
                    'methods'             => WP_REST_Server::CREATABLE,
                    'callback'            => array( $this, 'create_item' ),
                    'permission_callback' => array( $this, 'create_item_permissions_check' ),
                    'args'                => $this->get_endpoint_args_for_item_schema( WP_REST_Server::CREATABLE ),
                ),
                'schema' => array( $this, 'get_public_item_schema' ),
            )
        );

        $schema        = $this->get_item_schema();
        $get_item_args = array(
            'context' => $this->get_context_param( array( 'default' => 'view' ) ),
        );
        if ( isset( $schema['properties']['password'] ) ) {
            $get_item_args['password'] = array(
                'description' => __( 'The password for the post if it is password protected.' ),
                'type'        => 'string',
            );
        }
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/(?P<slug>[\w-]+)',
            array(
                'args'   => array(
                    'id' => array(
                        'description' => __( 'Unique identifier for the object.' ),
                    ),
                ),
                array(
                    'methods'             => WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'get_item' ),
                    'permission_callback' => array( $this, 'get_items_permissions_check' ),
                    'args'                => $get_item_args,
                ),
                array(
                    'methods'             => WP_REST_Server::EDITABLE,
                    'callback'            => array( $this, 'update_item' ),
                    'permission_callback' => array( $this, 'update_item_permissions_check' ),
                    'args'                => $this->get_endpoint_args_for_item_schema( WP_REST_Server::EDITABLE ),
                ),
                array(
                    'methods'             => WP_REST_Server::DELETABLE,
                    'callback'            => array( $this, 'delete_item' ),
                    'permission_callback' => array( $this, 'delete_item_permissions_check' ),
                    'args'                => array(
                        'force' => array(
                            'type'        => 'boolean',
                            'default'     => false,
                            'description' => __( 'Whether to bypass Trash and force deletion.' ),
                        ),
                    ),
                ),
                'schema' => array( $this, 'get_public_item_schema' ),
            )
        );
    }

    public function get_item( $request ) {
        $post = $this->get_post( $request['slug'] );
        if ( is_wp_error( $post ) ) {
            return $post;
        }
        $request['id'] = $post->ID;
        return parent::get_item($request);
    }

    protected function get_post( $slug ) {
        if (is_integer($slug)) {
            return parent::get_post($slug);
        }
        $post = get_page_by_path($slug, OBJECT, $this->rest_base);

        return $post;
    }

    public function update_item( $request ) {
        $post = $this->get_post( $request['slug'] );
        if ( is_wp_error( $post ) ) {
            return $post;
        }
        $request['id'] = $post->ID;
        return parent::update_item($request);
    }

    public function delete_item( $request ) {
        $post = $this->get_post( $request['slug'] );
        if ( is_wp_error( $post ) ) {
            return $post;
        }
        $request['id'] = $post->ID;
        return parent::delete_item($request);
    }

    public function get_items_permissions_check( $request ) {

        $post_type = get_post_type_object( $this->post_type );

        if (! current_user_can( $post_type->cap->edit_posts ) ) {
            return new WP_Error(
                'rest_forbidden_context',
                __( 'Sorry, you are not allowed to view posts in this post type.' ),
                array( 'status' => rest_authorization_required_code() )
            );
        }

        return true;
    }
}
