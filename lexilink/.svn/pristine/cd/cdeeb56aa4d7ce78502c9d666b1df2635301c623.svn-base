<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class for managing the export process of a WXR file
 */
class Lexilink_Export {

    /**
     * Export the WXR file
     */
    public function export() {
        
        if ( ! current_user_can( 'export' ) ) {
            wp_die( __( 'Sorry, you are not allowed to export the content of this site.', 'lexilink' ) );
        }

        $this->generate_file();
        die();
    }

    /**
     * Generate the CSV file
     */
    public function generate_file() {
        $filename = 'lexilink-export-' . wp_date( 'Y-m-d' ) . '.csv';

        header( 'Content-Description: File Transfer' );
        header( 'Content-Disposition: attachment; filename=' . $filename );
        header( 'Content-Type: text/csv; charset=utf-8' );

        $args = array(
            'numberposts' => -1,
            'post_type'   => 'lexilink-glossary',
        );
        $posts = get_posts( $args );

        $output = fopen( 'php://output', 'w' );

        fputcsv( $output, array( 'ID', 'Title', 'Content', 'Excerpt', 'Thumbnail', 'Custom link' ) );

        foreach ( $posts as $post ) {

            $thumbnail    = '';
            $thumbnail_id = get_post_thumbnail_id( $post->ID );
            if ( $thumbnail_id ) {
                $thumbnail = get_post_field( 'guid', $thumbnail_id );
            }
            $custom_link = get_post_meta( $post->ID, Lexilink_CPT::CUSTOM_LINK_ID, true );

            $post_data = array(
                'id'          => $post->ID,
                'title'       => $post->post_title,
                'content'     => $post->post_content,
                'excerpt'     => $post->post_excerpt,
                'thumbnail'   => $thumbnail,
                'custom_link' => $custom_link,
            );

            fputcsv( $output, $post_data );
        }

        fclose( $output );
    }
}
