<?php
namespace PDP\Model;

class Block{

    public static function get($id){
        $content_post = get_post($id);
        $content = $content_post->post_content;
        return $content;
    }

    public static function getBlock($id){
        $blocks = parse_blocks(self::get($id));
        $out = [];
        
        foreach ($blocks as $block) {
            if($block['blockName'] === 'pdp/podcast'){
                $out[] = $block['attrs'];
            }else {
                $out[] = $block;
            }
        }

        return $out;
    }
}