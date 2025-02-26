<?php

/**
 * Provides public helper methods.
 *
 * @package GoFetch/Helper
 */
if ( !defined( 'ABSPATH' ) ) {
    die;
}
/**
 * Helper class.
 */
class GoFetch_JobEngine_Helper
{
    /**
     * Retrieves a given field content type if recognized. Defaults to 'text' if unknown.
     */
    public static function get_field_type( $field, $content_type = 'post' )
    {
        $type = 'text';
        $fields = self::get_known_field_types();
        $fields = array_merge( $fields, self::get_field_types( $content_type ) );
        if ( $field && isset( $fields[$field] ) ) {
            $type = $field;
        }
        return $type;
    }
    
    /**
     * Retrieve known field types for a know list of core fields.
     *
     * @uses apply_filters() Calls 'goft_je_known_field_types'
     */
    public static function get_known_field_types()
    {
        $fields = array(
            'post_author' => array(
            'user' => __( 'User', 'gofetch-je' ),
            'text' => __( 'Text', 'gofetch-je' ),
        ),
            'post_status' => array(
            'post_status' => __( 'Post Status', 'gofetch-je' ),
            'text'        => __( 'Text', 'gofetch-je' ),
        ),
        );
        return apply_filters( 'goft_je_known_field_types', $fields );
    }
    
    /**
     * Retrieve all possible field types.
     *
     * @uses apply_filters() Calls 'goft_je_field_types'
     *
     */
    public static function get_field_types( $content_type = 'post' )
    {
        $types = array(
            'text' => __( 'Text', 'gofetch-je' ),
            'date' => __( 'Date', 'gofetch-je' ),
            'user' => __( 'User', 'gofetch-je' ),
        );
        if ( 'user' != $content_type ) {
            $types['post_status'] = __( 'Post Status', 'gofetch-je' );
        }
        // get existing taxonomies
        $taxonomies = get_object_taxonomies( $content_type, 'objects' );
        // unset the 'post_status' taxonomy since it's empty
        unset( $taxonomies['post_status'] );
        foreach ( $taxonomies as $tax ) {
            $types[$tax->name] = sprintf( __( 'Taxonomy :: %s', 'gofetch-je' ), $tax->label );
        }
        return apply_filters( 'goft_je_field_types', $types, $content_type );
    }

}