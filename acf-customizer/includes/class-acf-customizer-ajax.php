<?php



class acf_customizer_ajax {
    function  __construct()
    {
        add_action('wp_ajax_parse_data_acf', array($this, 'parse_data_acf'));
        add_action('wp_ajax_nopriv_parse_data_acf', array($this, 'parse_data_acf'));
    }

    public function parse_data_acf($requests)
    {
        $posts = isset($_POST['acf']) ? $_POST['acf'] : array();

        foreach ($posts as $key => $post){
            if (is_array($post)) {
                $posts[$key] = serialize($post);
            }
        }

        wp_send_json($posts);
    }
}


new acf_customizer_ajax();