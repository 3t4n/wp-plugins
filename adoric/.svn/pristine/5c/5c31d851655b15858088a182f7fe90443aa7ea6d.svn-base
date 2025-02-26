<?php

defined( 'ABSPATH' ) or exit;

class adoric_embed_handler
{
    public function __construct()
    {
        add_action('wp_head', [$this, 'adoric_add_embed_code']);
    }
    
    public function adoric_add_embed_code()
    {
        $embed_code_parsed = ADORICWP::instance()->util->get_adoric_embed_code();
        
        echo $embed_code_parsed;
        
    }

}