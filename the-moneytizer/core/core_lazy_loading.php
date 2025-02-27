<?php
function add_admin_lazy_loading(){
    if(is_admin()){
        $admin_lazy_loading_script = plugins_url( '..\js\lazy-loading.js', __FILE__ );
        wp_enqueue_script( 'admin-lazy_loading', $admin_lazy_loading_script, array(), '1.0', true );
    }
}

function add_lazy_loading($pre_generation = false) {
    if(!is_single()&&!$pre_generation){
        return;
    }

    $lazy_folder = plugin_dir_path( __FILE__ ).'../lazy-loading/';
    $lazy_data = (array)json_decode(get_option('themoneytizer_data_lazy'));
    if(gettype($lazy_data)!='array'){
        $lazy_data = [];
    }

    $global_del = [];

    foreach($lazy_data as $data){
        $ad_id      = $data->ad_id;
        $ad_align   = $data->align;
        $activate   = $data->status;
        $src_iframe = plugins_url('..\lazy-loading\iframe-src-'.$ad_id.'.html', __FILE__ );
        $src_script = plugins_url( '..\lazy-loading\iframe-'.$data->ad_id.'.js', __FILE__ );

        include('inc/inc_lazy_template.php');       

        if($data->status=='true'){
            if(!verify_lazy_content($lazy_folder, $ad_id, $tag_js, $tag_html)){
                update_lazy_content($lazy_folder, $ad_id, $tag_js, $tag_html);
                if(!$pre_generation){
                    $global_del[] = $data->anchor;
                    wp_enqueue_script( 'lazy_loading-'.$data->ad_id, $src_script, array(), '1.0', true );
                }
            }
        }
    }
    define('GLOBAL_DEL', $global_del);
}

/*
Verify integrity of js and html lazy
*/
function verify_lazy_content($lazy_folder, $ad_id, $tag_html, $tag_js){
    if(!file_exists($lazy_folder."iframe-$ad_id.js")){
        return FALSE;
    }

    if(file_get_contents($lazy_folder."iframe-$ad_id.js")!=$tag_js){
        return FALSE;
    }

    if(!file_exists($lazy_folder."iframe-src-$ad_id.html")){
        return FALSE;
    }

    if(file_get_contents($lazy_folder."iframe-src-$ad_id.html")!=$tag_html){
        return FALSE;
    }

    return TRUE;
}

/*
Regenerate js and html lazy
*/
function update_lazy_content($lazy_folder, $ad_id, $tag_js, $tag_html){
    $fp = fopen($lazy_folder."iframe-$ad_id.js", 'w+');
    fwrite($fp, $tag_js);
    fclose($fp);

    $fp = fopen($lazy_folder."iframe-src-$ad_id.html", 'w+');
    fwrite($fp, $tag_html);
    fclose($fp);
}

/*
* Update lazy data
*/
function themoneytizer_update_data_lazy(){
    if ( !wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['_nonce'])), 'update_data_lazy') ) {
        return;
    }

    if(!current_user_can( 'manage_options' )){
        return 0;
    }
    $lazy_conf = [];
    $lazy_conf = (array)json_decode(get_option('themoneytizer_data_lazy'));
    if(gettype($lazy_conf)!='array'){
        $lazy_conf = [];
    }

    $lazy_el['ad_id'] = $_POST['id'];
    $lazy_el['order'] = $_POST['order'];
    $lazy_el['anchor'] = $_POST['anchor'];
    $lazy_el['status'] = $_POST['status'];
    $lazy_el['frequency'] = $_POST['frequency'];
    $lazy_el['tag'] = $_POST['tag'];
    $lazy_el['height'] = $_POST['height'];
    $lazy_el['width'] = $_POST['width'];
    $lazy_el['align'] = $_POST['align'];
    $lazy_el['start'] = $_POST['start'];

    $lazy_conf[$_POST['id']] = $lazy_el;
    
    update_option('themoneytizer_data_lazy', json_encode($lazy_conf));

    echo json_encode(array('status'=>true,'message'=> __('Configuration lazy loading enregistrée avec succès.', 'themoneytizer')));
}

add_action('admin_enqueue_scripts', 'add_admin_lazy_loading');
add_action('wp_enqueue_scripts', 'add_lazy_loading');
add_action('wp_ajax_update_data_lazy', 'themoneytizer_update_data_lazy');

function add_classes_del($content){
    $doc = new DOMDocument();
    @$doc->loadHTML('<?xml encoding="utf-8" ?>' .$content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    if(!is_single()){
        return $content;
    }

    $lazy_data = (array)json_decode(get_option('themoneytizer_data_lazy'));
    if(gettype($lazy_data)!='array'){
        $lazy_data = [];
    }

    foreach($lazy_data as $data){
        $ad_id      = $data->ad_id;
        $ad_id      = $data->ad_id;
        $ad_align   = $data->align;
        $activate   = $data->status;

        $lazy_folder = plugin_dir_path( __FILE__ ).'../lazy-loading/';

        $src_iframe = plugins_url('..\lazy-loading\iframe-src-'.$ad_id.'.html', __FILE__ );
        $src_script = plugins_url( '..\lazy-loading\iframe-'.$data->ad_id.'.js', __FILE__ );

        include('inc/inc_lazy_template.php');

        if($data->status=='true'){
            if(!verify_lazy_content($lazy_folder, $ad_id, $tag_js, $tag_html)){
                $del = $data->anchor;
                $node = $doc->getElementsByTagName($del);
                foreach($node as $node_el){
                    append_attr_to_element($node_el, 'class', 'tmzr-el');
                }
            }
        }
    }
    return $doc->saveHTML();
}
function append_attr_to_element(&$element, $attr, $value){
    if($element->hasAttribute($attr)){
        $attrs = explode(' ', $element->getAttribute($attr));
        if(!in_array($value, $attrs)){
            $attrs[] = $value;
        }
        $attrs = array_map('trim', array_filter($attrs));
        $element->setAttribute($attr, implode(' ', $attrs));
    }else{
        $element->setAttribute($attr, $value);
    }
}

add_filter('the_content', 'add_classes_del', 1);