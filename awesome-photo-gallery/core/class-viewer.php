<?php

namespace APG\Core;

/**
 * Class Viewer
 * @package APG\Core
 */
class Viewer {

    /**
     * Get the photos belonging to an album
     *
     * @param $album_id
     *
     * @return array
     */
    public function get_photos( $album_id ) {
        $media        = get_post_meta( $album_id, '_apg_album_items', true );
	    $stored_value = get_post_meta( $album_id, 'apg_photo_order', true );
        $images       = array();

        if( ! isset( $media['photos'] ) )  {
            return array();
        }

	    if( isset( $stored_value ) && ! empty( $stored_value ) ) {
		    $photo_index = array_flip( $this->arrayColumn( $media['photos'], 'id' ) );
		    $stored_value = explode( ',', $stored_value );

		    foreach ( $stored_value as $item ) {
			    if( empty( $item ) || ! isset( $photo_index[ $item ] ) ) {
				    continue;
			    }

			    $key_id = $photo_index[ $item ];

			    $images[] = array(
				    'ID'       => $media['photos'][ $key_id ]['id'],
				    'metadata' => wp_get_attachment_metadata( $media['photos'][ $key_id ]['id'] ),
			    );
			    unset( $media['photos'][ $key_id ] );
		    }
	    }
	    else {
		    foreach ( $media['photos'] as $item ) {
			    $images[] = array(
				    'ID'       => $item['id'],
				    'metadata' => wp_get_attachment_metadata( $item['id'] ),
			    );
		    }
	    }

        return $images;
    }

	/**
	 * Fallback for array column
	 *
	 * @param array $array
	 * @param $column_key
	 * @param null $index_key
	 *
	 * @return array
	 */
	protected function arrayColumn( array $array, $column_key, $index_key = null ) {
		if ( function_exists( 'array_column ' ) ) {
			return array_column( $array, $column_key, $index_key );
		}
		$result = array();
		foreach ( $array as $arr ) {
			if ( ! is_array( $arr ) ) {
				continue;
			}

			if ( is_null( $column_key ) ) {
				$value = $arr;
			} else {
				$value = $arr[ $column_key ];
			}

			if ( ! is_null( $index_key ) ) {
				$key            = $arr[ $index_key ];
				$result[ $key ] = $value;
			} else {
				$result[] = $value;
			}

		}

		return $result;
	}

}