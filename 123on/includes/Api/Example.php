<?php
namespace p123on\Api;

use WP_Query;
use WP_REST_Controller;

/**
 * REST_API Handler
 */
class Example extends WP_REST_Controller {

    /**
     * [__construct description]
     */
    public function __construct() {
        $this->namespace = 'v2';
        $this->rest_base = 'video_123on';
    }

    /**
     * Register the routes
     *
     * @return void
     */
    public function register_routes() {
        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/(?P<page_number>\d+)',
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'p123on_custompost' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/add',
            array(
                array(
                    'methods'             => 'POST',
                    'callback'            => array( $this, 'p123on_addPost' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/pages',
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'p123on_getPages' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/products',
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'p123on_getProducts' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/delete/(?P<id>\d+)',
            array(
                array(
                    'methods'             => 'DELETE',
                    'callback'            => array( $this, 'p123on_deletePost' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/edit/(?P<id>\d+)',
            array(
                array(
                    'methods'             => 'POST',
                    'callback'            => array( $this, 'p123on_editPost' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/video_meta/(?P<id>\d+)',
            array(
                array(
                    'methods'             => 'GET',
                    'callback'            => array( $this, 'p123on_getVideoMeta' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/posts/(?P<id>\d+)',
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'p123on_getPost' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );

        register_rest_route(
            $this->namespace,
            '/' . $this->rest_base . '/posts',
            array(
                array(
                    'methods'             => \WP_REST_Server::READABLE,
                    'callback'            => array( $this, 'p123on_getAllPosts' ),
                    'permission_callback' => array( $this, 'p123on_get_items_permissions_check' ),
                    'args'                => $this->get_collection_params(),
                )
            )
        );
    }

    /**
     * Retrieves a collection of items.
     *
     * @param WP_REST_Request $request Full details about the request.
     *
     * @return WP_REST_Response|WP_Error Response object on success, or WP_Error object on failure.
     */

    public function p123on_addPost($data)
    {
        global $wpdb;
        $my_post = array(
            'post_title'    => $data['title'],
            'post_content'  => $data['content'],
            'post_status'   => 'published',
            'post_author'   => 1,
            'post_type'     => 'video_123on',
            'post_category' => array( 8,39 ),
            );
        $post_id = wp_insert_post( $my_post );

        add_post_meta( $post_id, 'hot_spots', $data['hotspot']);
        add_post_meta( $post_id, 'duration', $data['duration']);
        add_post_meta( $post_id, 'controls', $data['controls']);
        add_post_meta( $post_id, 'tooltips_closed', $data['tooltips_closed']);
        add_post_meta( $post_id, 'font', $data['font']);
        add_post_meta( $post_id, 'weight', $data['weight']);
        wp_die();
    }

    public function p123on_getVideoMeta($data)
    {
        $meta = get_post_meta($data['id'], 'hot_spots');
        return json_encode($meta[0]);
    }

    public function p123on_custompost( $data ) {

        $pagination_number = $data['page_number'];
        $posts_per_page = 5;
        $offset = ($pagination_number - 1) * $posts_per_page;

        $args = array(
            'post_type' => 'video_123on',
            'post_status' => 'published',
            'posts_per_page' => 5,
            'offset' => $offset,
        );

        $query = new WP_Query( $args ); // $query is the WP_Query Object
        $posts = $query->get_posts();   // $posts contains the post objects

        $number_of_posts = $query->found_posts; // get number of all posts
        $number_of_pages = ceil($number_of_posts/$posts_per_page);

        $output = array();


        foreach( $posts as $post ) {    // Pluck the id and title attributes
            $meta = get_post_meta($post->ID, 'duration');
            $controls = get_post_meta($post->ID, 'controls');
            $tooltips_closed = get_post_meta($post->ID, 'tooltips_closed');
            $font = get_post_meta($post->ID, 'font');
            $weight = get_post_meta($post->ID, 'weight');
            $meta = json_encode($meta[0]);
            $output[] = array( 'id' => $post->ID, 'title' => $post->post_title, 'content' => $post->post_content, 'duration' => $meta, 'controls' => $controls, 'tooltips_closed' => $tooltips_closed, 'font' => $font, 'weight' => $weight);
        }

        $pagination = array('number_of_posts' => $number_of_posts, 'number_of_pages' => $number_of_pages, 'current_page' => $pagination_number);

        wp_send_json( [$output,$pagination] ); // getting data in json format.
    }

    public function p123on_getPages ($request) {
        wp_send_json( get_pages() ); // getting data in json format.
    }

    public function p123on_getProducts ($request) {
        $args     = array( 'post_type' => 'product', 'posts_per_page' => -1 );
        $products = get_posts( $args );
        $productsData = [];
        foreach($products as $product)
        {
            $product_info = wc_get_product( $product->ID);
            array_push($productsData, ['ID' => $product->ID ,'link' => get_permalink( $product->ID ), 'name' => $product_info->get_name(), 'price' => $product_info->get_price(), 'thumbnail' => wp_get_attachment_url( $product_info->get_image_id() )]);
        }
        
        wp_send_json ($productsData);
    }

    public function p123on_deletePost($data)
    {
        wp_delete_post($data['id'], true);
    }

    public function p123on_editPost($data)
    {
        $post = get_post($data['id']);
        $post->post_title = $data['title'];
        $post->post_content = $data['content'];
        $duration = get_post_meta($data['id'], 'duration');
        wp_update_post( $post );
        update_post_meta( $data['id'], 'hot_spots', $data['hotspot']);
        update_post_meta( $data['id'], 'duration',  $data['duration']);
        update_post_meta( $data['id'], 'controls',  $data['controls']);
        update_post_meta( $data['id'], 'tooltips_closed', $data['tooltips_closed']);
        update_post_meta( $data['id'], 'font',  $data['font']);
        update_post_meta( $data['id'], 'weight',  $data['weight']);
    }

    public function p123on_getPost($request)
    {
        $post = get_post($request['id']);
        wp_send_json($post);
    }

    public function p123on_getAllPosts() {

        $posts_per_page = -1;

        $args = array(
            'post_type' => 'video_123on',
            'post_status' => 'published',
            'posts_per_page' => $posts_per_page,
        );

        $query = new WP_Query( $args ); // $query is the WP_Query Object
        $posts = $query->get_posts();   // $posts contains the post objects

        $output = array();

        foreach( $posts as $post ) {    // Pluck the id and title attributes

            $output[] = array( 'id' => $post->ID, 'title' => $post->post_title);
        }

        wp_send_json( $output ); // getting data in json format.
    }

    /**
     * Checks if a given request has access to read the items.
     *
     * @param  WP_REST_Request $request Full details about the request.
     *
     * @return true|WP_Error True if the request has read access, WP_Error object otherwise.
     */
    public function p123on_get_items_permissions_check( $request ) {
        return true;
    }

    /**
     * Retrieves the query params for the items collection.
     *
     * @return array Collection parameters.
     */
    public function p123on_get_collection_params() {
        return [];
    }
}
