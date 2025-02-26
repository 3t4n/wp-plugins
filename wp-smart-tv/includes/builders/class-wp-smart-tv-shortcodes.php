<?php

class Wp_Smart_Tv_shortcodes
{

    public function __construct()
    {
        add_shortcode('tv-video-player', array($this, 'video_player_handler'));
    }

    public function video_player_handler($atts)
    {
        $tv_settings = get_option('rovidx_smart_tv_options');

        $args = shortcode_atts(array(
            'id' => '',
            'url' => '',
            'bif' => '',
            'mp4' => '',
            'max_width' => '1920px',
            'controls' => '',
            'preload' => 'auto',
            'autoplay' => 'false',
            'loop' => '',
            'muted' => '',
            'poster' => '',
            'class' => ''
        ), $atts, 'tv-video-player');

        if (is_plugin_active('rovidx-media-player-pro/rovidx-media-player-pro.php')) {
            $out = rovidx_wp_smart_tv_mediaplayer_pro($args);
        } else {
            $out = $this->mediaplayer_light($args);
        }


        return $out;//apply_filters( 'rovidx_wpstv_player', $out );
    }

    private function mediaplayer_light($args)
    {
        global $wpstv_tools;
        wp_enqueue_style('wp-mediaelement');
        wp_enqueue_script('wp-mediaelement');

        // Get Post Meta
        if ($args['id'] == '') {
            $args['id'] = get_the_id();
        }

        $id = $args['id'];
        $type = get_post_meta($id, 'rovidx_smarttv_format', true);

        // If shortcode url or mp4 is blank, get the URL from the custom field rovidx_smarttv_URL
        if (empty($url)) {
            $url = $this->get_content_url($id);
        }

        // Error response for no playable URL
        if ($type == 'HLS' && empty($url) && empty($mp4)) {
            return __('You need to specify the HLS src of the video file', 'wp-smart-tv');
        } else if ($type == 'MP4' && empty($url) && empty($mp4)) {
            return __('You need to specify the MP4 src of the video file', 'wp-smart-tv');
        }

        // Setup HLS or MP4 source tag
        $src = '';

        if (is_plugin_active('wp-smart-tv-fire-creator/wp-smart-tv-fire-creator.php')) {
            $ftvcMp4 = get_post_meta($id, 'rovidx_smart_tv_ftvc_mp4_url', true);
            if ($ftvcMp4) {
                $src .= '<source src="' . $ftvcMp4 . '" type="video/mp4" />';
            }
        }

        if (!empty($url) && $type == 'HLS') {
            $src .= '<source src="' . $url . '" type="application/x-mpegURL" />';
        } else if (!empty($url) && ($type == 'MP4' || !empty($mp4))) {
            $src .= '<source src="' . $url . '" type="video/mp4" />';
        } else if (empty($url) && !empty($mp4)) {
            $src .= '<source src="' . $mp4 . '" type="video/mp4" />';
        }

        $plugin_options = array(
            'loop' => false,
            'mode' => 'auto_plugin'
        );

        $out = '<div class="wpstv-vid-container" style="max-width:' . esc_attr($args['max_width']) . ';">';
        $out .= '<video controls="controls" class="mejs__player" style="width: 100%; height: 100%;" poster="' . esc_url($wpstv_tools->featured_img_url($id, 'rokudp')) . '" data-mejsoptions=\'' . json_encode($plugin_options) . '\'>';
        $out .= $src;
        $out .= '</video>';
        $out .= '</div>';

        return $out;
    }

    // Tools
    private function get_content_url($id)
    {
        $baseUrl = get_post_meta($id, 'rovidx_smarttv_URL', true);
        return apply_filters('rovidx_wpstv_video_url', $baseUrl);
    }


}