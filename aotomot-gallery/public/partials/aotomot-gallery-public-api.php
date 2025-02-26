<?php
/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.aotomot.com
 * @since      1.0.0
 *
 * @package    Aotomot_Gallery
 * @subpackage Aotomot_Gallery/public/partials
 */


class Aotomot_Gallery_REST_API {

    private $request_url;

    public function __construct( $data = null )
    {
        if ( isset( $data['aotg_url'] ) ) {
            $this->request_url = $data['aotg_url'];
        }
    }

    public function getGalleryPost( $args )
    {
        if ( !isset( $this->request_url ) ) {
            $wp_request_url = $args['aotg_url'];
        } else {
            $wp_request_url  = $this->request_url;
        }
        if ( isset( $args['aotg_select_order'] ) ) {
            // &sortFor=createdDate&sortDirection=d&pageSize=1&pageNumber=1
            $wp_request_url .= "/api/galleryImage/approved/" . $args['aotg_gallary_id'] . "?apiKey=" . $args['aotg_api_key'] . "&sortFor=lastModifiedDate&sortDirection=" . $args['aotg_select_order'] . "&pageSize=" . $args['aotg_total_image'] . "&pageNumber=1";
        }

        $args = array( 
            'headers' => array( 
                'x-api-key'    =>     $args['aotg_api_key']
             ),
            'method'    => 'GET'
         );
        $wp_get_post_response = wp_remote_get(
            $wp_request_url,
            $args
         );

        if ( wp_remote_retrieve_response_code( $wp_get_post_response ) != '200') {
            return false;
        } else {
            return json_decode( wp_remote_retrieve_body( $wp_get_post_response ) );
        }
    }
}