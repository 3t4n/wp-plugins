<?php
/**
 * This file will create Custom Rest API End Points.
 */
class WP_MetaText_Settings_Rest_Route extends WP_MetaText_Default_Properties {

    public function __construct() {
        parent::__construct();
        add_action( 'rest_api_init', [ $this, 'create_rest_routes' ] );
    }

    public function create_rest_routes() {
        register_rest_route( 'wp-meta-text/v1', '/settings', [
            'methods' => 'GET',
            'callback' => [ $this, 'get_settings' ],
            'permission_callback' => [ $this, 'get_settings_permission' ]
        ] );
        register_rest_route( 'wp-meta-text/v1', '/settings', [
            'methods' => 'POST',
            'callback' => [ $this, 'save_settings' ],
            'permission_callback' => [ $this, 'save_settings_permission' ]
        ] );
    }

    public function get_settings() {

        $description = get_option( 'meta-text-description', $this->description );
        $buttonWidth = get_option( 'meta-text-button-width', $this->buttonWidth );
        $verticalAlignment = get_option( 'meta-text-vertical-alignment', $this->verticalAlignment );
        $horizontalAlignment = get_option( 'meta-text-horizontal-alignment', $this->horizontalAlignment );
        $offsetMargin = get_option( 'meta-text-offset-margin', $this->offsetMargin );
        $appState = get_option( 'meta-text-app-state', $this->appState );
        $selector = get_option( 'meta-text-selector', $this->selector );
        $margins = get_option( 'meta-text-margins', $this->margins );
        $mobile = get_option( 'meta-text-mobile', $this->mobile );
        
        $response = [
            'mobile' => $mobile,
            'margins' => $margins,
            'appState' => $appState,
            'selector' => $selector,
            'description' => $description,
            'buttonWidth' => $buttonWidth,
            'offsetMargin' => $offsetMargin,
            'verticalAlignment' => $verticalAlignment,
            'horizontalAlignment' => $horizontalAlignment,
        ];

        return rest_ensure_response( $response );
    }

    public function get_settings_permission() {
        return true;
    }

    public function save_settings( $req ) {

        $mobile = strip_tags($req['mobile']);
        $margins = strip_tags($req['margins']);
        $appState = strip_tags($req['appState']);
        $selector = strip_tags($req['selector']);
        $buttonWidth = strip_tags($req['buttonWidth']);
        $description = strip_tags($req['description']);
        $offsetMargin = strip_tags($req['offsetMargin']);
        $verticalAlignment = strip_tags($req['verticalAlignment']);
        $horizontalAlignment = strip_tags($req['horizontalAlignment']);
        
        update_option( 'meta-text-mobile', $mobile );
        update_option( 'meta-text-margins', $margins );
        update_option( 'meta-text-selector', $selector );
        update_option( 'meta-text-app-state', $appState );
        update_option( 'meta-text-button-width', $buttonWidth );
        update_option( 'meta-text-description', $description );
        update_option( 'meta-text-offset-margin', $offsetMargin );
        update_option( 'meta-text-vertical-alignments', $verticalAlignment );
        update_option( 'meta-text-horizontal-alignments', $horizontalAlignment );

        return rest_ensure_response( 'success' );
    }

    public function save_settings_permission() {
        return current_user_can( 'publish_posts' );
    }
}

new WP_MetaText_Settings_Rest_Route();