<?php
 /**
   Plugin Name: Easy videos for YouTube width and height 
   Description: Easily customize the width and height of YouTube videos.
   Version: 1.0
   Author: ReorMadrid
   Author URI: https://www.reormadrid.com
   License: GPLv2 or later
   License URI: http://www.gnu.org/licenses/gpl-2.0.html
   Text Domain: easy-videos-for-youtube
 */
 
 /**
 * Shortcode para insertar un video de YouTube con altura y anchura personalizada.
 * Uso:
 * [shortcode url-video-youtube opciones]
 * El shortcode puede ser: [easy_custom_video], [easy_youtube] o [easy_yt]
 * Ejemplos:
 * [easy_yt https://www.youtube.com/watch?v=FmjZlaacPd8]  					<----- 100% de ancho x altura automática.
 * [easy_custom_video https://www.youtube.com/watch?v=FmjZlaacPd8 100%]		<----- 100% de ancho x altura automática.
 * [easy_youtube https://www.youtube.com/watch?v=FmjZlaacPd8 600]   			<----- 600px de ancho x altura automática.
 * [easy_yt https://www.youtube.com/watch?v=FmjZlaacPd8 400 200]    			<----- 400px de ancho x 200px de alto.
 * [easy_youtube https://www.youtube.com/watch?v=FmjZlaacPd8 100% 400] 	 	<----- 100% de ancho x 400px de alto.
 *
 * ---------------------------------------------------------------------------------------------------------------
 * Shortcode to embed a YouTube video with custom height and width..
 * Use:
 * [shortcode url-video-youtube options]
 * The shortcode can be: [easy_custom_video], [easy_youtube] o [easy_yt]
 * Examples:
 * [easy_yt https://www.youtube.com/watch?v=FmjZlaacPd8] 					<----- 100% width x automatic height.
 * [easy_custom_video https://www.youtube.com/watch?v=FmjZlaacPd8 100%]		<----- 100% width x automatic height.
 * [easy_youtube https://www.youtube.com/watch?v=FmjZlaacPd8 600]   			<----- 600px width x automatic height.
 * [easy_yt https://www.youtube.com/watch?v=FmjZlaacPd8 400 200]    			<----- 400px width x 200px height.
 * [easy_youtube https://www.youtube.com/watch?v=FmjZlaacPd8 100% 400]   	<----- 100% width x 400px height.
**/

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
	// Evita el acceso directo.
	// Avoid direct access.
}

function easy_videos_for_youtube( $atts ) {
    // Si no se pone una URL de YouTube generamos error.
    // If no YouTube URL is provided, we generate an error.
    if ( count( $atts ) < 1 ) {
        return 'Error: Debes proporcionar una URL de YouTube - You must provide a YouTube URL.';
    }
    $video_url   = trim( $atts[0] );
    // Si no se proporciona un ancho lo susamos como 100%.
    // If no width is provided, we use it as 100%.
    $video_width = ( count( $atts ) >= 2 ) ? trim( $atts[1] ) : '100%';
    // Si se da el tercer parámetro, lo usaremos como altura.
    // If the third parameter is provided, we will use it as the height.
    $video_height = ( count( $atts ) >= 3 ) ? trim( $atts[2] ) : '';
    if ( empty( $video_url ) ) {
        return 'Error: Debes proporcionar una URL de YouTube - You must provide a YouTube URL.';
    }
    // Necesitamos extraer el ID del video de YouTube.
    // We need to extract the YouTube video ID.
    if ( preg_match( '/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/|shorts\/))([\w-]+)/', $video_url, $matches ) ) {
        $video_id = $matches[1];
    } else {
        return 'Error: URL de YouTube no válida - Invalid YouTube URL.';
    }
    // Si el ancho contiene el símbolo "%" entendemos que es responsivo.
    // If the width contains the "%" symbol, we understand that it is responsive.
    if ( strpos( $video_width, '%' ) !== false ) {
        // Si se ha especificado la altura, la vamos a usar como fija (en píxeles).
		// If the height has been specified, we will use it as a fixed value (in pixels).
        if ( ! empty( $video_height ) ) {
            $height_numeric = rtrim( $video_height, 'px' );
            if ( ! is_numeric( $height_numeric ) ) {
                return 'Error: Altura no válida - Invalid height.';
            }
            $output = '<div style="max-width:100%; width:' . esc_attr( $video_width ) . '; height:' . esc_attr( $height_numeric ) . 'px; margin:0 auto; overflow: hidden;">
                            <iframe src="https://www.youtube.com/embed/' . esc_attr( $video_id ) . '" style="width:100%; height:100%;" frameborder="0" allowfullscreen></iframe>
                       </div>';
        } else {
            // Si no se ha puesto una altura vamos a usar una relación de video 16:9.
			// If no height is specified, we will use a 16:9 video ratio.
            $output = '<div style="max-width:100%; width:' . esc_attr( $video_width ) . '; margin:0 auto; position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                            <iframe src="https://www.youtube.com/embed/' . esc_attr( $video_id ) . '" style="position: absolute; top:0; left: 0; width:100%; height:100%;" frameborder="0" allowfullscreen></iframe>
                       </div>';
        }
    } else {
        // Si se pone un valor numérico para el ancho entendemos que son píxeles.
		// If a numerical value is provided for the width, we will understand it as pixels.
        $width_numeric = rtrim( $video_width, 'px' );
        if ( ! is_numeric( $width_numeric ) ) {
            return 'Error: Ancho no válido - Invalid width.';
        }
        // Si se ha especificado una altura usamos esa altura. Si no se calcula una relación 16:9.
		// If no height is specified, we will use a 16:9 video ratio.
        if ( ! empty( $video_height ) ) {
            $height_numeric = rtrim( $video_height, 'px' );
            if ( ! is_numeric( $height_numeric ) ) {
                return 'Error: Altura no válida - Invalid height.';
            }
        } else {
            $height_numeric = round( $width_numeric * 9 / 16 );
        }
        $output = '<div style="width:' . esc_attr( $width_numeric ) . 'px; margin: 0 auto;">
                        <iframe width="' . esc_attr( $width_numeric ) . '" height="' . esc_attr( $height_numeric ) . '" src="https://www.youtube.com/embed/' . esc_attr( $video_id ) . '" frameborder="0" allowfullscreen></iframe>
                   </div>';
    }
    return $output;
}

add_shortcode( 'easy_custom_video', 'easy_videos_for_youtube' );
add_shortcode( 'easy_youtube', 'easy_videos_for_youtube' );
add_shortcode( 'easy_yt', 'easy_videos_for_youtube' );