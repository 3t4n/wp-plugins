<?php
/**
 * CRE_Video class for the video output
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class CRE_Video {

    /**
     * Get Video
     *
     * @param string $url video url
     * @return void
     */
    public static function get_video( $url ) {

        $youtube    = self::get_youtube_id( $url );
        $vimeo      = self::get_vimeo_id( $url );
        $media      = self::get_media_url( $url );

        // Youtube
        if ( $youtube ) {
            self::youtube_video( $youtube );
        }

        // Vimeo
        if ( $vimeo ) {
            self::vimeo_video( $vimeo );
        }

        // $media
        if ( $media ) {
            self::media_video( $media );
        }

    }

    /**
     * Returns youtube video id
     *
     * @param string $url video url
     * @return string|false
     */
    public static function get_youtube_id( $url ) {

        if ( preg_match( '/\/\/(www\.)?(youtu|youtube)\.(com|be)\/(watch|embed)?\/?(\?v=)?([a-zA-Z0-9\-\_]+)/', $url, $youtube_matches ) ) {
            return $youtube_matches[6];
        }
        return false;
    }

    /**
     * Returns vimeo video id
     *
     * @param string $url video url
     * @return string|false
     */
    public static function get_vimeo_id( $url ) {

        if ( preg_match( '#https?://(.+\.)?vimeo\.com/.*#i', $url, $vimeo_matches ) ) {
            return preg_replace( "/[^0-9]/", '', $vimeo_matches[0] );
        }
        return false;
    }

    /**
     * Returns media video url
     *
     * @param string $url video url
     * @return string|false
     */
    public static function get_media_url( $url ) {

        $except = array("mp4", "3gp", "mov", "flv", "wmv", "swf", "bmp", "avi");
        $imp = implode('|', $except);

        if ( preg_match( '/(https?:.*?\.('.$imp.'))/', $url, $matches ) ) {
            // the preg_replace strips out the double backslashes.
            return preg_replace( "/\\\\/", '', $matches[0] );
        }
        return false;
    }

    /**
     * Youtube Video
     *
     * @param string $video_id
     * @return void
     */
    public static function youtube_video( $video_id ) {

        ?>
        <iframe height="500" src="https://www.youtube.com/embed/<?php echo esc_attr( $video_id ); ?>" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        <?php
    }

    /**
     * Vimeo Video
     *
     * @param string $video_id
     * @return void
     */
    public static function vimeo_video( $video_id ) {

        $vimeo_data = wp_remote_get( 'http://www.vimeo.com/api/v2/video/' . esc_attr( $video_id ) . '.php' );

        if ( isset( $vimeo_data['response']['code'] ) && '200' == $vimeo_data['response']['code'] ) {
            ?>
            <iframe height="500" src="https://player.vimeo.com/video/<?php echo esc_attr( $video_id ); ?>" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            <?php
        }

    }

    /**
     * Media Video
     *
     * @param string $video_url
     * @return void
     */
    public static function media_video( $video_url ) {

        ?>
        <figure class="wp-block-video">
            <video src="<?php echo esc_url( $video_url ); ?>" controls></video>
        </figure>
        <?php

    }
}
