<?php
namespace Pagup\Vidseo\Controllers;
use Pagup\Vidseo\Core\Option;
use Pagup\Vidseo\Core\Plugin;

class ShortcodeController
{

    public function vidseo_shortcode( $atts )
    {

        $option = new Option;
        $vidseo_pro = vidseo_fs()->can_use_premium_code__premium_only();

        $atts = shortcode_atts(
            array(
                'id' => null,
                'width' => null,
                'hide_title' => null,
                'disable_trans' => null,
                'hide_trans' => null,
                'excerpt' => null,
            ),
            $atts,
            'vidseo'
        );

        $args = array(
            'post_type' => 'vidseo',
            'p' => $atts['id'],
            'post_status' => 'publish'
        );

        if ( empty( $atts['id'] ) ) {
		
            return __("Please add post ID to see Video SEO", "vidseo");
        
        } else {

            $postId = $atts['id'];

            $query = new \WP_Query( $args );

            if ( $query->have_posts() ) {

                while ( $query->have_posts() ) {

                    $query->the_post();

                    //var_dump(parse_url($vidseo_url, PHP_URL_PATH););

                    // Get Video ID based on Selected Host
                    $vidseo_url = ($option::post_meta('vidseo_host') == 'vidseo_youtube') ? 
                                    $this->youtube_id( $option::post_meta('vidseo_url') ) :
                                    ($option::post_meta('vidseo_host') == 'vidseo_vimeo' ?
                                    parse_url($option::post_meta('vidseo_url'), PHP_URL_PATH) : '');
                    
                    // Get Post Content
                    $content = $option::post_meta('vidseo_content');

                    // Get Excerpt based on Shortcode Attribute OR Post Content
                    $excerpt = ( $option->issetNotEmpty($atts['excerpt']) ) ? 
                                $this->excerpt( wp_strip_all_tags($content), $atts['excerpt'] ) : 
                                ( $option::check('vidseo_excerpt') ?
                                $this->excerpt( wp_strip_all_tags($content), $option::get('vidseo_excerpt') ) :
                                $this->excerpt( wp_strip_all_tags($content), 60 ) );
                    
                    // Define Width
                    $width = ( $option::check('vidseo_width') ) ? $option::get('vidseo_width') : "560px";

                    // Data array to be passed in Video View
                    $data = array(
                        'video_id' => $vidseo_url,
                        'host' => get_post_meta( $postId, 'vidseo_host', true ),
                        'title' => get_the_title(),
                        'width' => ( $option->issetNotEmpty($atts['width']) ) ? $atts['width'] : $width,
                        'content' => ( $option->issetNotEmpty($content) ) ? $content : '',
                        'excerpt' => $excerpt,
                        'hide_title' => ( $option->issetNotEmpty( $atts['hide_title'] ) ) ? true : ( $option::check('hide_title') ? true : false),
                        'disable_trans' => ( $option->issetNotEmpty( $atts['disable_trans'] ) ) ? true : ( $option::check('disable_trans') ? true : false),
                        'hide_trans' => ( $vidseo_pro && $option->issetNotEmpty( $atts['hide_trans'] ) ) ? true : ( $vidseo_pro && $option::check('hide_trans') ? true : false),
                        'title_bg'  =>  ( $option::check('vidseo_title_bg') ) ? 
                                        "background-color: {$option::get('vidseo_title_bg')};" : '',
                        'title_txt'  =>  ( $option::check('vidseo_title_txt') ) ? 
                                        "color: {$option::get('vidseo_title_txt')};" : '',
                        'trans_bg'  =>  ( $option::check('vidseo_trans_bg') ) ? 
                                        "background-color: {$option::get('vidseo_trans_bg')};" : '',
                        'trans_txt'  =>  ( $option::check('vidseo_trans_txt') ) ? 
                                        "color: {$option::get('vidseo_trans_txt')};" : '',
                        'controls' => ($option::check('vidseo_controls')) ? "controls=0&" : '', 
                        // ^ Separate Controls Parameter bcoz of Vimeo Issue with foreach loop in view
                    );
                    
                    // iEmbed Player Parameters for Youtube/Vimeo
                    $params = array(
                        "autoplay" => ($option::check('vidseo_autoplay')) ? "autoplay=1&" : '',
                        "annotations" => ($option::check('vidseo_annotations')) ? "iv_load_policy=3&" : '',
                        "loop" => ($option::check('vidseo_loop')) ? "loop=1&playlist={$data['video_id']}&" : '',
                        "modestbranding" => ($option::check('vidseo_modestbranding')) ? "modestbranding=1&" : '',
                        "captions" => ($option::check('vidseo_captions')) ? "cc_load_policy=1&" : '',
                        "rel" => ($option::check('rel')) ? "rel=0&" : '',
                        "fullscreen" => ($option::check('rel')) ? "fs=0&" : '',
                        "subtitles" => ($option::check('rel')) ? "texttrack=en&" : '',
                        "muted" => ($option::check('muted')) ? "muted=1&" : '',
                        "vimeo_title" => ($option::check('vimeo_title')) ? "title=0&" : '',
                        "author" => ($option::check('author')) ? "byline=0&" : ''
                    );

                    if ( $option::post_meta('vidseo_url') ) {

                        // Clean view to return it with output.
                        ob_start();
                        Plugin::view('shortcode/video', compact('data', 'params'));
                        $output = ob_get_clean();

                    } else {

                        $output = "<p>Error: Video URL doesn't exist. Make sure to add a correct Video URL</p>";

                    }

                }

            } else {

                return __("Please enter correct post id for Video SEO Post", "vidseo");

            }

        }

        wp_reset_postdata();
        
        return $output;

    }

    /**
     * Convert YouTube Normal URL to Embed URL
     *
     * @return string
     */
    function youtube_id($string) {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            '$2',
            $string
        );
    }

    public function excerpt($content, $length)
    {
    if ( strlen( $content ) <= $length ) {

            $output = $content . '... &#9660;';

        } else {

            $excerpt = substr( $content, 0 , $length ) . '...';
            
            $output = $excerpt;

        }

        return $output;
    }
}

$shortcode = new ShortcodeController();