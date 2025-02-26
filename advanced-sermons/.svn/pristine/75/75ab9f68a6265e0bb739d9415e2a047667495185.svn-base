<?php


// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}


function asp_sermon_video_template()
{
    global $post;
    $page_title = $post->post_title;
    $sermonVideoType = get_post_meta($post->ID, 'asp_sermon_video_type_select', true);
    $sermonyoutube = get_post_meta($post->ID, 'asp_sermon_youtube', true);
    $sermonvimeo = get_post_meta($post->ID, 'asp_sermon_vimeo', true);
    $sermonfacebook = get_post_meta($post->ID, 'asp_sermon_facebook', true);
    $sermon_video_embed = get_post_meta($post->ID, 'asp_sermon_video_embed', true); // Added version 3.0
    $sermon_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail');
    $asp_disable_featured_image = get_option('asp_single_sermon_disable_featured_image'); // Added version 3.0
    $url = "$sermonyoutube";
    $vimeourl = "$sermonvimeo";

    $youtube_id = '';
    $start_time = '';

    // Handles default Series image logic
    $asp_series_image = '';
    $asp_single_sermon_default_series_image = get_option( 'asp_single_sermon_default_series_image' );
    if ( !empty( $asp_single_sermon_default_series_image ) ) {
        $asp_sermon_series_terms = wp_get_post_terms($post->ID, 'sermon_series');
        if (!empty($asp_sermon_series_terms) && !is_wp_error($asp_sermon_series_terms)) {
            $asp_series_term = $asp_sermon_series_terms[0];
            $asp_series_image_id = get_term_meta($asp_series_term->term_id, 'series-taxonomy-image-id', true);
            $asp_series_image = wp_get_attachment_image($asp_series_image_id, 'large', false, array('alt' => $asp_series_term->name));
        } else {
            $asp_series_image = '';
        }
    }

    if (!empty($sermonVideoType) ) {
        if (!getSermonVideoFormat($sermonVideoType, $url, $vimeourl, $sermonfacebook, $sermon_video_embed)) {
            aspFrontImageDisplay($asp_disable_featured_image, $sermon_featured_image, false, false, false, false, $page_title, $asp_series_image);
        }
        return;
    }

    // Display Sermon YouTube Video
    if (!empty($sermonyoutube)) {
        aspRenderYoutubeVideo($url);
    }
    // Display Sermon Vimeo Video
    if (!empty($sermonvimeo) && empty($sermonyoutube) && empty($sermonfacebook)) {
        aspRenderVimeoVideo($vimeourl);
    }
    // Display Sermon Facebook Video
    if (!empty($sermonfacebook) && empty($sermonyoutube)) {
        aspRenderFacebookVideo($sermonfacebook);
    }
    // Format Sermon Video Embed
    if (!empty($sermon_video_embed)) {
        aspRenderSermonVideoEmbed($sermon_video_embed);
    }
    // Display sermon featured image if enabled and no videos applied. Added version 2.8.

    aspFrontImageDisplay($asp_disable_featured_image, $sermon_featured_image, $sermonfacebook, $sermonyoutube, $sermonvimeo, $sermon_video_embed, $page_title, $asp_series_image);
}


function aspRenderYoutubeVideo($url) {
    $youtube_id = '';
    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=|live/)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
        $youtube_id = $match[1];
        if (strpos($url, 't=') !== false) {
            $start_time = substr($url, strpos($url, 't=')+2);
            if (strpos($start_time, 's') !== false) {
                $start_time = str_replace('s', '', $start_time);
            }
            echo '<div class="sermon-youtube-player"><iframe src="https://www.youtube.com/embed/' . $youtube_id . '?start=' . $start_time . '&rel=0" frameborder="0" allowfullscreen></iframe></div>';
        } elseif (strpos($url, 'live') !== false) {
            echo '<div class="sermon-youtube-player"><iframe src="https://www.youtube.com/embed/' . $youtube_id . '?autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe></div>';
        } else {
            echo '<div class="sermon-youtube-player"><iframe src="https://www.youtube.com/embed/' . $youtube_id . '?rel=0" frameborder="0" allowfullscreen></iframe></div>';
        }
    }
}

function aspRenderVimeoVideo($vimeourl) {
    $vimeo_id = '';
    // Format Sermon Vimeo Video URL
    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im',
        $vimeourl, $vimeo_match)) {
        $vimeo_id = $vimeo_match[3];

        $start_time = '';
        if (strpos($vimeourl, 't=') !== false) {
            $start_time = substr($vimeourl, strpos($vimeourl, 't=')+2);
            // Convert start time to Vimeo format if necessary
            if (!is_numeric($start_time)) {
                // Convert to seconds if in minute-second format
                $time_parts = explode(':', $start_time);
                if (count($time_parts) == 2) {
                    $start_time = (int)$time_parts[0] * 60 + (int)$time_parts[1];
                }
            }
            $start_time = '#t=' . $start_time;
        }

        echo '<div class="sermon-vimeo-player"><iframe src="https://player.vimeo.com/video/' . $vimeo_id . $start_time . '" frameborder="0" allowfullscreen></iframe></div>';
    }
}

function aspRenderFacebookVideo($sermonfacebook) {
    if (empty($sermonfacebook)) {
        return;
    }
    echo '<div class="sermon-facebook-player">';
    echo '<div id="fb-root"></div>';
    echo '<div class="fb-video" data-href=" ' . $sermonfacebook . '" data-allowfullscreen="true"></div>';
    echo '</div> ';

}

function aspRenderSermonVideoEmbed($sermon_video_embed) {
	if (!empty($sermon_video_embed)) {
		echo '<div class="sermon-embed-video-player">';
		$allowed_html = array(
			'iframe' => array(
				'src'             => array(),
				'width'           => array(),
				'height'          => array(),
				'frameborder'     => array(),
				'allowfullscreen' => array(),
				'allow'           => array(),
				'referrerpolicy'  => array(),
				'sandbox'         => array(),
				'title'           => array(),
			),
		);
		echo wp_kses($sermon_video_embed, $allowed_html);
		echo '</div>';
	}
}

function aspFrontImageDisplay($asp_disable_featured_image, $sermon_featured_image, $sermonfacebook, $sermonyoutube, $sermonvimeo, $sermon_video_embed, $page_title, $asp_series_image) {
    if (empty($asp_disable_featured_image) && empty($sermonfacebook) && empty($sermonyoutube) && empty($sermonvimeo) && empty($sermon_video_embed)) {
        if (!empty($sermon_featured_image)) {
            echo '<div class="asp-sermon-image-holder"><img class="asp-single-sermon-image" alt="' . $page_title . '" src="' . $sermon_featured_image[0] . '" /></div>';
        } elseif ( !empty($asp_series_image) ) {
            echo '<div class="asp-sermon-image-holder">' . $asp_series_image . '</div>';
        }
    }
}

function getSermonVideoFormat($sermonVideoType, $url, $vimeourl, $sermonfacebook, $sermon_video_embed) {
    switch ($sermonVideoType) {
        case 'youtube':
            aspRenderYoutubeVideo($url);
            if (empty($url)) {
                return false;
            }
            return true;
        case 'vimeo':
            aspRenderVimeoVideo($vimeourl);
            if (empty($vimeourl)) {
                return false;
            }
            return true;
        case 'facebook':
            aspRenderFacebookVideo($sermonfacebook);
            if (empty($sermonfacebook)) {
                return false;
            }
            return true;
        case 'embed':
            aspRenderSermonVideoEmbed($sermon_video_embed);
            if (empty($sermon_video_embed)) {
                return false;
            }
            return true;
        default:
            return false;
    }
}

function getChossenVideo($sermonVideoType, $url, $vimeourl, $sermonfacebook, $sermon_video_embed) {

    switch ($sermonVideoType) {
        case 'youtube':
            aspRenderYoutubeVideo($url);
            if (empty($url)) {
                return false;
            }
            return true;
        case 'vimeo':
            aspRenderVimeoVideo($vimeourl);
            if (empty($vimeourl)) {
                return false;
            }
            return true;
        case 'facebook':
            aspRenderFacebookVideo($sermonfacebook);
            if (empty($sermonfacebook)) {
                return false;
            }
            return true;
        case 'embed':
            aspRenderSermonVideoEmbed($sermon_video_embed);
            if (empty($sermon_video_embed)) {
                return false;
            }
            return true;
        default:
            return false;
    }
}