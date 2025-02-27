<?php
/**
 * Class Cache
 *
 * Manages all cached requests
 *
 * @package DaReactions
 *
 * @since 3.0.0
 */
namespace DaReactions;
/**
 * Class Cache
 *
 * Manages all cached requests
 *
 * @package DaReactions
 *
 * @since 3.0.0
 */
class Cache {
    /**
     * Retrieve value from file system
     *
     * @param $id
     *
     * @return mixed|null
     */
    public static function get( $id ) {
	    return null;
        $general_options = Options::getInstance( 'general' );
        if ($general_options->getOption( 'enable_internal_cache', 'off' ) !== 'on') {
            return null;
        }
	    return wp_cache_get( $id, 'da_reactions' );
        }
    /**
     * Save value to file system
     *
     * @param $id
     * @param $content
     */
    public static function set( $id, $content ) {
        $general_options = Options::getInstance( 'general' );
        if ($general_options->getOption( 'enable_internal_cache', 'off' ) !== 'on') {
            return;
        }
	    wp_cache_set( $id, $content, 'da_reactions' );
        }
    /**
     * Delete cache file if matches strings
     *
     * @param $ids
     */
    public static function delete( $ids ) {
	    foreach ( $ids as $id ) {
		    wp_cache_delete( $id, 'da_reactions' );
            }
        }
    /**
     * Delete all cache files
     *
     * @since 3.0.0
     */
    public static function deleteAll() {
	    global $wp_object_cache;
	    $wp_object_cache->flush_group( 'da_reactions' );
    }
}
