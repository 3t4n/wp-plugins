<?php 
namespace AP360V;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Shortcode{

    private $plugin_name;
    private $version;
    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function advance_panorama_viewer($atts){
        $attrs = (shortcode_atts( array(
            'id'        => null,
            "panorama"  => null,
            "title"  => null,
            "author"  => null,
            "auto_load"  => "true",
            "draggable"  => "true",
            "align"  => "",
            "class_name" => null,
            "height" => "400px",
            "width" => "100%",
        ), $atts, 'advance_panorama_viewer'));

        extract($attrs);

        if($id !== null){
            $id = esc_html($id);
            $post_type = get_post_type($id);

            if($post_type !== 'panorama-360-viewer'){
                return false;
            }
            $post = get_post($id);
    
            if($post){
                $blocks = parse_blocks($post->post_content);
                return render_block($blocks[0]);
            }
            return 'something went wrong!';
        }

        $block = $this->generate_advanced_panorama_viewer_to_block($attrs);

        return render_block($block);

    }


    public function generate_advanced_panorama_viewer_to_block($attrs){
        extract($attrs);
        
        return [
            'blockName' => 'ap360v/panorama-viewer',
            'attrs' => [
                'clientId' => 'adv-pano-'.uniqid(),
                'align' => esc_attr($align),
                'scene' => [
                    'panorama' => esc_url($panorama),
                    'title' => esc_html($title),
                    'author' => esc_html($author),
                ],
                'options' => [
                    'autoLoad' => $auto_load === 'true',
                    'draggable' => $draggable === 'true',
                    'default' => [
                        'firstScene' => '0'
                    ]
                ],
                'style' => [
                    'height' => esc_html($height),
                    'width' => esc_html($width),
                ],
                'className' => esc_attr($class_name)
            ],
            'innerBlocks' => [],
            'innerHTML' => '',
            'innerContent' => []
        ];
    }

}