<?php

class Futura{

    public $total_posts;
    public $posts_per_page;
    public $paged;
    public $error_post_data;

    function __construct(){
        $this->posts_per_page = 100;
        add_action( 'admin_init', array($this, 'update_setting') );    
        add_action( 'admin_menu', array($this, 'add_menu') );  
        add_action( 'transition_post_status', array($this, 'save_post'), 10, 3 );    
        add_action( 'edit_form_advanced', array($this, 'futura_post_field') );
        add_action( 'admin_enqueue_scripts', array($this, 'futura_styles_script'));
        add_action( 'wp_ajax_futura_ajax_post_data', array($this, 'futura_ajax_post_data'));
        add_action( 'wp_ajax_nopriv_futura_ajax_post_data', array($this, 'futura_ajax_post_data'));
        add_action( 'wp_ajax_futura_ajax_post_s_data', array($this, 'futura_ajax_post_s_data'));
        add_action( 'wp_ajax_nopriv_futura_ajax_post_s_data', array($this, 'futura_ajax_post_s_data'));
        add_action( 'wp_ajax_futura_ajax_set_tag', array($this, 'futura_ajax_set_tag'));
        add_action( 'wp_ajax_nopriv_futura_ajax_set_tag', array($this, 'futura_ajax_set_tag'));
        add_action( 'wp_ajax_futura_ajax_analyze', array($this, 'futura_ajax_analyze'));
        add_action( 'wp_ajax_nopriv_futura_ajax_analyze', array($this, 'futura_ajax_analyze'));
        add_action( 'wp_ajax_futura_ajax_remove_post', array($this, 'futura_ajax_remove_post'));
        add_action( 'wp_ajax_nopriv_futura_ajax_remove_post', array($this, 'futura_ajax_remove_post'));
        add_action( 'wp_ajax_futura_ajax_record_click', array($this, 'futura_ajax_record_click'));
        add_action( 'wp_ajax_nopriv_futura_ajax_record_click', array($this, 'futura_ajax_record_click'));
        add_action( 'wp_ajax_futura_add_tag', array($this, 'futura_add_tag'));
        add_action( 'wp_ajax_nopriv_futura_add_tag', array($this, 'futura_add_tag'));
        add_action( 'wp_ajax_futura_remove_tag', array($this, 'futura_remove_tag'));
        add_action( 'wp_ajax_nopriv_futura_remove_tag', array($this, 'futura_remove_tag'));
        //add_action( 'admin_notices', array($this, 'analyize_is_disable_message') );
        add_action( 'wp_trash_post', array($this, 'delete_post_from_futura') );
        add_action( 'wp_enqueue_scripts', array($this, 'maybe_load_jquery') );
        //タグボックスにタグ提案を追加
        add_filter( 'register_taxonomy_args', array($this, 'add_tag_suggest_to_tag_area'), 10, 2 );


        if($this->is_widget_active()==0 &&  get_option('futura_display')=="sidebar" ){
            update_option('futura_display', 'after_content');
        }elseif($this->is_widget_active()){
            update_option('futura_display', 'sidebar');
        }

    }


    function add_menu() {
        add_menu_page( __('futura Setting', 'futura'), 'FUTURA', 'edit_themes', 'futura', array($this, 'index'), '', 8);
        add_submenu_page('futura', __( 'Basic Setting', 'futura' ), __( 'Basic Setting', 'futura' ), 'manage_options', 'futura', array($this, 'index'));
        add_submenu_page('futura', __( 'Detail Setting', 'futura' ), __( 'Detail Setting', 'futura' ), 'manage_options', 'futura-setting', array($this, 'detail_setting'));
        add_submenu_page('futura', __( 'Design Setting', 'futura' ), __( 'Design Setting', 'futura' ), 'manage_options', 'futura-design', array($this, 'design_setting'));
        // add_submenu_page('futura', __( 'Search Setting', 'futura' ), __( 'Search Setting', 'futura' ), 'manage_options', 'futura-search', array($this, 'search_setting'));
        add_submenu_page('futura', __( 'Tag Suggestions', 'futura' ), __( 'Tag Suggestions', 'futura' ), 'manage_options', 'futura-tag', array($this, 'tag_setting'));
    }


    function futura_styles_script() {
        wp_enqueue_style( 'futura_mulsti_select_styles', plugins_url( '/assets/css/multiple-select.min.css', dirname(__FILE__) ), array(), FUTURA_V, 'all');
        wp_enqueue_style( 'futura_admin_styles', plugins_url( '/assets/css/admin_style.css', dirname(__FILE__) ), array(), FUTURA_V, 'all');
        wp_enqueue_script( 'futura_admin_script', plugins_url( 'assets/js/admin_script.js', dirname(__FILE__) ), array(), FUTURA_V, true);
        wp_enqueue_script( 'futura_multi_select_script', plugins_url( 'assets/js/multiple-select.min.js', dirname(__FILE__) ), array(), FUTURA_V, true);
    }
    

    function index(){
        $license_key = get_option('futura_license');
        require_once dirname(__FILE__).'/../assets/template/index.php';
    }


    function detail_setting(){
        $license_key = get_option('futura_license');
        require_once dirname(__FILE__).'/../assets/template/detail_setting.php';
    }


    function design_setting(){
        require_once dirname(__FILE__).'/../assets/template/design_setting.php';
    }


    function search_setting(){
        $license_key = get_option('futura_license');
        require_once dirname(__FILE__).'/../assets/template/search_setting.php';
    }

    function tag_setting(){
        require_once dirname(__FILE__).'/../assets/template/tag_setting.php';
    }


    function futura_ajax_post_data(){
        if(filter_input( INPUT_POST, 'futura-post_data', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_post_data_nonce','secure');
            if(filter_input( INPUT_POST, 'init', FILTER_VALIDATE_INT )){
                $paged = 1;
                $return = $this->futura_analyze_init();
                $return = json_decode($return, 1);
                if(isset($return["response"]["error"])){
                    print json_encode(array("error"=>"analyze init error"));
                    die();                    
                }
                $return = $this->futura_search_init();
                $return = json_decode($return, 1);
                if(isset($return["response"]["error"])){
                    print json_encode(array("error"=>"search init error"));
                    die();                    
                }
            }else{
                $paged = get_option('futura_paged');
            }
            $this->post_data($paged, 'related');
            $total_posts = $this->total_posts;
            $array = array(
                "paged" => $this->paged,
                "progress" => floor(($paged+1)*$this->posts_per_page/$total_posts*100).'%'
            );
            if($paged*$this->posts_per_page >= $total_posts){$array['paged'] = -1;}
            if($this->error_post_data){
                print json_encode(array("error"=>$this->error_post_data));
            }else{
                update_option('futura_paged', $this->paged);
                print json_encode($array);
            }
            die();
        }
    }

        
    function futura_ajax_remove_post(){
        if(filter_input( INPUT_POST, 'futura_remove_post', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_remove_post_nonce','secure');

            $post_id = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
            $remove_post_id = filter_input( INPUT_POST, 'remove_post_id', FILTER_SANITIZE_NUMBER_INT );

            $exclude_id = rtrim(get_post_meta($post_id, 'futura_exclude_post', 1), ',');
            if($exclude_id){
                $exclude_id .= ",".$remove_post_id;
            }else{
                $exclude_id = $remove_post_id;
            }
            update_post_meta($post_id, 'futura_exclude_post', $exclude_id);
            update_post_meta($post_id, 'futura_related_posts', '');

            _e( 'This post will be removed.', 'futura' );
            die();
        }
    }

        
    function post_data($paged, $type){

        $post_types = $this->get_target_post_types(true);
        $args = array(
            'post_type' => $post_types,
            'post_status' => 'publish',
            'posts_per_page' => $this->posts_per_page,
            'paged' => $paged,
            'fields' => 'ids',
            'order' => 'ASC',
            'orderby' => 'date',
        );
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $the_query = new WP_Query( $args );    
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_id = get_the_ID();
                $post = get_post($post_id);
                $array = $this->make_post_content_data($post, $post_id, $type);                
                $array["is_first"] = 1;
                $return = $this->post_content($array);
                if($return == "connection error" || $return == "500 server error"){
                    $this->error_post_data = $return;
                }
            endwhile;
        else:
            $this->paged = -1;
            wp_reset_postdata();
            return;   
        endif;

        $total = $the_query->found_posts;
        $this->total_posts = $total;
        $this->paged = $paged+1;
        wp_reset_postdata();
        return;   
    }


    function futura_ajax_analyze(){
        if(filter_input( INPUT_POST, 'futura-analyze', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_analyze_nonce','secure');
            $user_id = get_option('futura_user_id');
            $license_key = get_option('futura_license');    
            $post_types = $this->get_target_post_types(true);
            $is_error = 0;
            foreach($post_types as $post_type){
                $data = array(
                    'user_id' => $user_id,
                    'license_key' => $license_key,
                    'wp_post_type' => $post_type,
                    'is_first' => 1
                );
                $return = json_decode($this->analyze($data), true);
                if(isset($return["response"]["error"])){
                    $is_error = 1;
                }    
            }
            if($is_error){
                print json_encode(array("response"=>"error"));
            }else{
                print json_encode(array("response"=>"success"));
            }
        }
        die();
    }


    function post_content($array){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/post_data/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "connection error";            
        }else{
            if( $return["response"]["code"] == 500){
                return "500 server error";
            }else{
                return $return["body"];
            }
        }

    }


    // function post_content_s($array){
    //     $method = "POST";
    //     $timeout = 4;
    //     $headers = array('Content-Type'=>'application/json');
    //     $body = json_encode($array);
    //     $return = wp_remote_post(
    //         FUTURA_SITE_URL.'/post_data_s/', 
    //         compact("method","timeout","headers","body"));
    //     if(is_wp_error($return)){
    //         return "connection error";            
    //     }else{
    //         if( $return["response"]["code"] == 500){
    //             return "500 server error";
    //         }else{
    //             return $return["body"];
    //         }
    //     }
    // }


    function delete_content($array){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/delete_data/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return '{"response":{"error":"connection errroe"}}';            
        }else{
            return $return["body"];
        }        
    }

    
    function analyze($array){
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/analyze/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }        
        update_option('futura_stored_version', '');
        update_option('futura_last_action_time', date('Y/m/d H:i:s'));
        $this->delete_futura_related_posts_for_all();
        return $return["body"];
    }


    function futura_analyze_init(){
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $array = array(
            'user_id' => $user_id,
            'license_key' => $license_key,
        );
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/analyze_init/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return json_decode('{"response": {"error":{"message":"analyze init error"}}}');
        }else{
            return $return["body"];
        }
    }
    
    
    function futura_search_init(){
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $array = array(
            'user_id' => $user_id,
            'license_key' => $license_key,
        );
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/search_init/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return json_decode('{"response": {"error":{"message":"search init error"}}}');
        }else{
            return $return["body"];
        }
    }


    function update_setting(){
        if(filter_input( INPUT_POST, 'futura-license', FILTER_SANITIZE_STRING )){
            $license = trim(filter_input( INPUT_POST, 'license', FILTER_SANITIZE_STRING ));
            if(!$license){return;}
            $response = $this->validate_license($license)->response;
            if(property_exists( $response, 'error' )){
                if($response->error->message == "license_key is invalid."){
                    add_action( 'admin_notices', array($this, 'license_admin_notice__error') );
                }elseif($response->error->message == "payment status is invalid."){
                    add_action( 'admin_notices', array($this, 'payment_status_admin_notice__error') );
                }elseif($response->error->message == "connection error"){
                    add_action( 'admin_notices', array($this, 'connection_admin_notice__error') );
                }else{
                    add_action( 'admin_notices', array($this, 'site_url_admin_notice__error') );
                }
                update_option('futura_license', '');
                update_option('futura_user_id', '');
            }else{
                update_option('futura_license', $license);
                update_option('futura_user_id', $response->success->user_id);
                add_action( 'admin_notices', array($this, 'futura_admin_notice__success' ));
            }
        }

        if(filter_input( INPUT_POST, 'futura-design_setting', FILTER_SANITIZE_NUMBER_INT )){
            update_option('futura_deactivate_style', filter_input( INPUT_POST, 'deactivate_style', FILTER_SANITIZE_SPECIAL_CHARS ));        
            update_option('futura_title_text', filter_input( INPUT_POST, 'title_text', FILTER_SANITIZE_SPECIAL_CHARS ));        
            update_option('futura_html_posts_wrap_bg_color', filter_input( INPUT_POST, 'background_color', FILTER_SANITIZE_STRING ));        
            update_option('futura_html_border_color', filter_input( INPUT_POST, 'border_color', FILTER_SANITIZE_STRING ));        
            update_option('futura_html_border_title_color', filter_input( INPUT_POST, 'border_title_color', FILTER_SANITIZE_STRING ));        
            update_option('futura_html_h3_font_size', filter_input( INPUT_POST, 'h3_font_size', FILTER_SANITIZE_STRING ));        
            update_option('futura_post_title_font_size', filter_input( INPUT_POST, 'post_title_font_size', FILTER_SANITIZE_STRING ));        
            update_option('futura_summary_font_size', filter_input( INPUT_POST, 'summary_font_size', FILTER_SANITIZE_STRING ));        
            update_option('futura_author_font_size', filter_input( INPUT_POST, 'author_font_size', FILTER_SANITIZE_STRING ));        
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }

        if(filter_input( INPUT_POST, 'futura_number_of_posts', FILTER_SANITIZE_STRING )):
            update_option('futura_number_of_posts', filter_input( INPUT_POST, 'number_of_posts', FILTER_SANITIZE_STRING ));
            $this->delete_futura_related_posts_for_all();
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        endif;

        if(filter_input( INPUT_POST, 'futura_display_area', FILTER_SANITIZE_STRING )):
            update_option('futura_display', filter_input( INPUT_POST, 'display', FILTER_SANITIZE_STRING ));
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        endif;

        $setting = filter_input( INPUT_POST, 'futura-tag_taxonomy_percentage', FILTER_SANITIZE_NUMBER_INT );       
        if($setting){
            $content =  filter_input( INPUT_POST, 'content_percentage', FILTER_SANITIZE_NUMBER_INT );
            $title =  filter_input( INPUT_POST, 'title_percentage', FILTER_SANITIZE_NUMBER_INT );
            $excerpt =  filter_input( INPUT_POST, 'excerpt_percentage', FILTER_SANITIZE_NUMBER_INT );
            $image =  filter_input( INPUT_POST, 'image_percentage', FILTER_SANITIZE_NUMBER_INT );
            $tag =  filter_input( INPUT_POST, 'tag_percentage', FILTER_SANITIZE_NUMBER_INT );
            $tax =  filter_input( INPUT_POST, 'tax_percentage', FILTER_SANITIZE_NUMBER_INT );
            $cf =  filter_input( INPUT_POST, 'cf_percentage', FILTER_SANITIZE_NUMBER_INT );
            $author =  filter_input( INPUT_POST, 'author_percentage', FILTER_SANITIZE_NUMBER_INT );
            update_option('futura_content_percentage', $content);
            update_option('futura_title_percentage', $title);
            update_option('futura_excerpt_percentage', $excerpt);
            update_option('futura_image_percentage', $image);
            update_option('futura_tag_percentage', $tag);
            update_option('futura_tax_percentage', $tax);
            update_option('futura_cf_percentage', $cf);
            update_option('futura_author_percentage', $author);
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }


        if(filter_input( INPUT_POST, 'futura-custom_field_setting', FILTER_SANITIZE_NUMBER_INT )){
            update_option('futura_custom_fields_setting', filter_input( INPUT_POST, 'custom_fields', FILTER_SANITIZE_STRING ));
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }


        if(filter_input( INPUT_POST, 'futura-custom_post_setting', FILTER_SANITIZE_NUMBER_INT )){
            $array = filter_input_array (INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($array['custom_post_types'])){
                $values = $array['custom_post_types'];
            }else{
                $values = '';
            }
            update_option('futura_custom_post_setting', implode(",", $values));
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }


        if(filter_input( INPUT_POST, 'futura_custom_post_not_show_setting', FILTER_SANITIZE_NUMBER_INT )){
            $array = filter_input_array (INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($array['custom_post_types_not_show'])){
                $values = $array['custom_post_types_not_show'];
            }else{
                $values = '';
            }
            update_option('futura_custom_post_not_show_setting', implode(",", $values));

            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }


        // if(filter_input( INPUT_POST, 'futura-search_setting', FILTER_SANITIZE_NUMBER_INT )){
        //     $array = filter_input_array (INPUT_POST, FILTER_SANITIZE_STRING);
        //     if(isset($array['custom_post_types'])){
        //         $values = $array['custom_post_types'];
        //     }else{
        //         $values = '';
        //     }
        //     update_option('futura_custom_post_search_setting', implode(",", $values));
        //     add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        // }


        // if(filter_input( INPUT_POST, 'futura_search-custom_post_setting', FILTER_SANITIZE_NUMBER_INT )){            
        //     $array = filter_input_array (INPUT_POST, FILTER_SANITIZE_STRING);
        //     if(isset($array['custom_post_types_s'])){
        //         $values = $array['custom_post_types_s'];
        //     }else{
        //         $values = '';
        //     }
        //     update_option('futura_custom_post_types_s', implode(",", $values));
        //     add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        // }


        // if(filter_input( INPUT_POST, 'futura_search-custom_field_setting', FILTER_SANITIZE_NUMBER_INT )){
        //     update_option('futura_search-custom_field_setting', filter_input( INPUT_POST, 'custom_fields', FILTER_SANITIZE_STRING ));
        //     add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        // }


        if(filter_input( INPUT_POST, 'add_futura_default_thumbnail', FILTER_SANITIZE_NUMBER_INT )){
            $thumbnail_url = filter_input( INPUT_POST, 'futura_default_thumbnail', FILTER_SANITIZE_STRING );
            $image_id   = attachment_url_to_postid( $thumbnail_url ); 
            if($image_id){
                $thumbnail_url = wp_get_attachment_image_src( $image_id, 'thumbnail' )[0];
            }
            update_option('futura_default_thumbnail', $thumbnail_url);
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }

        if(filter_input( INPUT_POST, 'futura-record_click', FILTER_SANITIZE_NUMBER_INT )){
            $value = filter_input( INPUT_POST, 'futura_record_setting', FILTER_SANITIZE_NUMBER_INT );
            update_option('futura_record_setting', $value);
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }

        if(filter_input( INPUT_POST, 'futura_display_setting', FILTER_SANITIZE_NUMBER_INT )){
            $array = filter_input_array (INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($array['futura_items_display'])){
                update_option('futura_items_display', implode(",", $array['futura_items_display']));
            }
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }

        if(filter_input( INPUT_POST, 'futura_display_device_flg', FILTER_SANITIZE_NUMBER_INT )){
            $value = filter_input( INPUT_POST, 'futura_displya_device', FILTER_SANITIZE_STRING );
            update_option('futura_displya_device', $value);
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }

        if(filter_input( INPUT_GET, 'futura_min_tag_count', FILTER_SANITIZE_NUMBER_INT)){
            $value = filter_input( INPUT_GET, 'futura_min_tag_count', FILTER_SANITIZE_NUMBER_INT );
            update_option('futura_min_tag_count', $value);
            add_action( 'admin_notices', array($this, 'futura_admin_notice__update' ));
        }

        //プラグインを更新したことにより、reactivateが本来必要な項目だが、初期値として代入する方法をとる *futra-activationで設定済みなので、新規ユーザーには不要。後日、消してもOK
        $this->init_data();

    }


    function init_data(){
        if(get_option('futura_html_border_color', "empty") == "empty"){
            update_option('futura_html_border_color', '#d3d3d3');        
        }
    
        if(get_option('futura_html_border_title_color', "empty") == "empty"){
            update_option('futura_html_border_title_color', '#333');        
        }
    
        if(get_option('futura_items_display', "empty") == "empty"){
            update_option('futura_items_display', 'thumbnail_pc,content_pc,title_pc,author_pc,thumbnail_sp,content_sp,title_sp,author_sp');        
        }    

    }


    function futura_admin_notice__success() {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e( 'Success!', 'futura' ); ?></p>
        </div>
        <?php
    }


    function futura_admin_notice__update() {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e( 'Update!', 'futura' ); ?></p>
        </div>
        <?php
    }


    function license_admin_notice__error() {
        $class = 'notice notice-error';
        $message = __( 'This license key is not valid.', 'futura' );
     
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    }


    function site_url_admin_notice__error() {
        $class = 'notice notice-error';
        $message = __( 'This site url is not valid.', 'futura' );
     
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    }


    function payment_status_admin_notice__error() {
        $class = 'notice notice-error';
        $message = __( 'Payment status is not valid.', 'futura' );
     
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    }


    function connection_admin_notice__error() {
        $class = 'notice notice-error';
        $message = __( 'Connection error with FUTURA server.', 'futura' );
     
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    }


    function analyze_admin_notice__error() {
        $class = 'notice notice-warning';
        $message = __( 'When you post, FUTURA will not analyze yet because of last excecute time.', 'futura' );
     
        printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
    }


    function validate_license($license){
        $array = array(
            'license_key' => $license,
            'site_url' => get_home_url()
        );
        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/validate_user/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return json_decode('{"response": {"error":{"message":"connection error"}}}');
        }else{
            return json_decode($return["body"]);
        }
    }


    function show_monthly_forecast(){
        $post_types = $this->get_target_post_types();
        $total_posts = 0;
        foreach($post_types as $post_type){
            $total_posts += wp_count_posts($post_type)->publish;
        }
        $quotes = $this->get_quotes_of_posts();

        ?>
        <dl>
            <dt>テキスト分</dt>
            <dd>$<?php print number_format($quotes['char_price'], 2); ?></dd>
        </dl>
        <dl>
            <dt>画像分</dt>
            <dd>$<?php print number_format($quotes['img_price'], 2); ?></dd>
        </dl>
        <dl>
            <dt>合計</dt>
            <dd>$<?php print number_format($quotes['char_price']+$quotes['img_price'], 2); ?></dd>
        </dl>
        <?php

    }


    function get_quotes_of_posts(){
        $post_types = $this->get_target_post_types();
        $args = array(
            'post_type' => $post_types,
            'posts_per_page' => -1,
            'fields' => 'ids'
        );
        $the_query = new WP_Query( $args );

        $char_nums = 0;
        $img_nums = 0;
        if ( $the_query->have_posts() ) :
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $id = get_the_ID();
                $content = get_the_content($id);
                if(has_post_thumbnail($id)){
                    $content .= '<img src="'.get_the_post_thumbnail_url($id,'full').'">';
                }        
                $matches = array();
                preg_match_all('/<img(.*?)>/', $content, $matches);
                $content = preg_replace('/<(.*?)>/', '', $content);
                $char_nums += mb_strlen($content);
                if(isset($matches[1])){
                    $img_nums += count($matches[1]);
                }
            endwhile;
        endif;
        wp_reset_postdata();

        $char_unit = $char_nums/1000;
        $char_price = $char_unit/1000*2;
        $img_price = $img_nums/1000*1.5*2;

        return compact('char_price','img_price');

    }


    static function get_target_post_types($no_skip=null){
        if($no_skip){
            $skip_post_types = array();
        }else{
            $skip_post_types = explode(",", get_option('futura_custom_post_not_show_setting'));        
        }
        $post_types = array();
        foreach(explode(",", get_option('futura_custom_post_setting')) as $post){
            if(in_array($post, $skip_post_types)){
                continue;
            }else{
                $post_types[] = $post;
            }
        }

        $post_types[] = "post";
        $post_types =  array_filter( $post_types, "strlen" ) ;
        return $post_types;
    }


    // static function get_target_s_post_types(){
    //     $post_types = explode(",", get_option('futura_custom_post_types_s'));
    //     $post_types[] = "post";
    //     $post_types =  array_filter( $post_types, "strlen" ) ;
    //     return $post_types;
    // }


    static function get_terms($id, $post_type){
        $array = get_object_taxonomies( $post_type, 'objects' );
        $escape = array("post_format","post_tag");
        $terms = "";
        foreach($array as $tax){
            if(in_array($tax->name, $escape)){continue;}
            $the_term = get_the_terms($id, $tax->name);
            if($the_term){
                foreach($the_term as $term){
                    $terms .= $term->name.',';
                }        
            }
        }
        $terms = rtrim($terms, ',');
        return $terms;
    }


    static function get_tags($id){
        if(empty(get_the_tags($id))){
            return;
        }
        $tags = "";
        foreach ( get_the_tags($id) as $tag ) {
            $tags .= $tag->name.',';
        }
        $tags = rtrim($tags, ',');
        return $tags;
    }


    static function get_custom_field($id, $type){
        // if($type == "search"){
        //     $custom_fields = explode(",", get_option('futura_search-custom_field_setting'));
        // }else{
        //     $custom_fields = explode(",", get_option('futura_custom_fields_setting'));
        // }
        $custom_fields = explode(",", get_option('futura_custom_fields_setting'));
        $str = "";
        if(empty($custom_fields) || !$custom_fields[0]){return;}
        foreach($custom_fields as $key=>$field){
            $value = get_post_meta($id, $field, 1);
            $str .= $value.',';
        }
        $str = rtrim($str, ',');
        return $str;
    }


    function futura_post_field($post){
        if(in_array($post->post_type, $this->get_target_post_types())){
            ?>
            <div class="js">
                <div class="meta-box-sortables">
                    <div id="futura_field" class="postbox">
                        <button type="button" class="handlediv" aria-expanded="true">
                            <span class="screen-reader-text"></span>
                            <span class="toggle-indicator" aria-hidden="true"></span>
                        </button>
                        <h2 class="hndle ui-sortable-handle"><span><?php _e( 'futura Setting', 'futura' ); ?></span></h2>
                        <div class="inside">
                            <label class="" for="include"><strong><?php _e( 'include posts', 'futura' ); ?></strong></label>
                            <p><?php _e( 'Please input post_id you want to include. Please use comma for multiple ids.', 'futura' ); ?></p>
                            <input type="text" name="futura_include_post" id="futura_include_post" class="widefat" value="<?php print get_post_meta($post->ID, 'futura_include_post', 1); ?>">
                            <p><input type="checkbox" name="futura_mutal_link[]" id="futura_mutal_link" value="1" <?php if(get_post_meta($post->ID, 'futura_mutal_link', 1)){print 'checked';} ?>> <?php _e( 'If you make mutual link, please check here.', 'futura' ); ?></p>
                        </div>
                        <div class="inside">
                            <label class="" for="exclude"><strong><?php _e( 'exclude posts', 'futura' ); ?></strong></label>
                            <p><?php _e( 'Please input post_id you want to exclude. Please use comma for multiple ids.', 'futura' ); ?></p>
                            <input type="text" name="futura_exclude_post" id="futura_exclude_post" class="widefat" value="<?php print get_post_meta($post->ID, 'futura_exclude_post', 1); ?>">
                        </div>
                    </div>            
                </div>
            </div>

            <?php 
            $this->show_futura_tags_js($post->ID); 

        }
    }


    function get_futura_tags($post_id){

        if($tags = get_post_meta($post_id, 'futura_tags', 1)){
            return $tags;
        }

        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $array = array(
            'user_id' => $user_id,
            'license_key' => $license_key,
            'wp_content_id' => $post_id,
        );

        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/futura_tags/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }
        $return = json_decode($return["body"], true);

        if(isset($return["response"]["error"])){
            return "";            
        }else{
            update_post_meta($post_id, 'futura_tags', $return["response"]);
            return $return["response"];
        }

    }


    function get_futura_main_tags(){

        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $futura_min_tag_count = get_option('futura_min_tag_count');
        if(!$futura_min_tag_count){$futura_min_tag_count = 5;}
        $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
        if(!$paged){$paged = 1;}
        $offset = $paged - 1;
        $array = array(
            'user_id' => $user_id,
            'license_key' => $license_key,
            'offset' => $offset,
            'min_tag_count' => $futura_min_tag_count
        );

        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/futura_main_tags/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }
        $return = json_decode($return["body"], true);

        if(isset($return["response"]["error"])){
            return "";            
        }else{
            return $return["response"];
        }

    }


    function show_tag_posts($tag){
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $array = array(
            'user_id' => $user_id,
            'license_key' => $license_key,
            'tag' => $tag,
            'type' => 'futura_tag',
        );

        $method = "POST";
        $timeout = 4;
        $headers = array('Content-Type'=>'application/json');
        $body = json_encode($array);
        $return = wp_remote_post(
            FUTURA_SITE_URL.'/futura_get_post_by_tag/', 
            compact("method","timeout","headers","body"));
        if(is_wp_error($return)){
            return "";            
        }
        if(isset($return["response"]["error"])){
            return "";            
        }

        $return = json_decode($return["body"], true);        
        foreach($return["response"] as $post_id):
            $has_tag = has_tag( $tag, $post_id );
            if($has_tag){
                $class = "futura_recommended_tags_attached";
                $btn_txt =  __( 'Remove', 'futura' );
            }else{
                $class = "futura_recommended_tags";
                $btn_txt =  __( 'Add', 'futura' );
            }        
            if(get_the_title($post_id)):
        ?>
                <div><span class="<?php print $class; ?> futura_by_tag" data-tag="<?php print $tag; ?>" data-post_id="<?php print $post_id; ?>"><?php print $btn_txt; ?></span>
                 <a href="<?php print get_edit_post_link($post_id); ?>" target="_blank"><?php print get_the_title($post_id); ?></a>
                </div>
                <div class="futura_by_tag_under" style=""><a href="<?php print get_edit_post_link($post_id); ?>" target="_blnak"><?php _e( 'edit page', 'futura' ) ?></a>&emsp;<a href="<?php print get_permalink($post_id); ?>" target="_blnak"><?php _e( 'front page', 'futura' ) ?></a></div>
            <?php endif; ?>
        <?php endforeach;

    }


    function futura_tags_admin(){
        $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
        if(!$paged){$paged = 1;}
        $posts_per_page = 50;

        $args = array(
            'post_type' => array('post'),
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'paged' => $paged,
            'order' => 'ASC',
            'orderby' => 'date',
        );

        $the_query = new WP_Query( $args );    
        if ( $the_query->have_posts() ) :
            $num_of_pages = ceil($the_query->found_posts/100);
            $this->show_futura_tags_pagination($num_of_pages, $paged);
            ?><div class="futura_suggestion_tags" id="futura_recommended_tags"><?php
            while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_id = get_the_ID();
                $title = get_the_title();
                if($title == ""){continue;}
                ?>
                <dl>
                    <dt><a href="<?php print get_edit_post_link($post_id); ?>"><?php the_title(); ?></a>
                        <div class="futura_by_tag_under" style="margin-left:0!important;"><a href="<?php print get_edit_post_link($post_id); ?>" target="_blnak"><?php _e( 'edit page', 'futura' ) ?></a>&emsp;<a href="<?php print get_permalink($post_id); ?>" target="_blnak"><?php _e( 'front page', 'futura' ) ?></a></div>
                    </dt>
                    <dd><?php $this->show_futura_tags_html($post_id, "&emsp;&emsp;"); ?></dd>
                </dl>
                <?php
            endwhile;
            ?></div>
            <?php
            $this->show_futura_tags_pagination($num_of_pages, $paged);
            $this->show_futura_tags_js();
        endif;

    }


    function futura_tags_list_admin(){
        ?>
        <select name="futura_min_tag_count" id="futura_min_tag_count">
            <?php $futura_min_tag_count = get_option('futura_min_tag_count');
            if(!$futura_min_tag_count){$futura_min_tag_count = 5;}
            ?>
            <?php for($i = 1; $i<=10; $i++): ?>
            <option value="<?php print $i; ?>" <?php ($i==$futura_min_tag_count)?print 'selected':''; ?>><?php print $i; ?></option>
            <?php endfor; ?>
        </select>
        <?php _e( 'You can choose min count posts of the tags.', 'futura' ) ?>
        <br>
        <?php

        $res = $this->get_futura_main_tags();
        $main_tag_list = $res["list"];
        $total = $res["total"];

        ?><div id="futura_main_tags"><?php
        foreach($main_tag_list as $index=>$tag){
            ?><div class="futura_main_tag_list <?php if($index==0): ?>active<?php endif; ?>" id="<?php print $index; ?>"><?php print $tag; ?></div><?php
        }
        ?></div><?php


        $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
        if(!$paged){$paged = 1;}
        $this->show_futura_tags_pagination($total, $paged);

        ?>
        <div class="futura_suggestion_tags" id="futura_recommended_tags"><?php
        foreach($main_tag_list as $index=>$tag){
            ?>
            <dl <?php if($index!=0): ?>style="display:none;"<?php endif; ?> data-id="<?php print $index; ?>">
                <dt style="margin-bottom:15px;"><strong><?php _e( 'Tag', 'futura' ) ?>：<?php print $tag; ?></strong></dt>
                <dd><?php $this->show_tag_posts($tag); ?></dd>
            </dl>
            <?php
        }
        ?></div>
        <?php $this->show_futura_tags_pagination($total, $paged);
    }


    function show_futura_tags_pagination($num_of_pages, $paged){
        $page_links = paginate_links( array(
            'base' => add_query_arg( 'paged', '%#%' ),
            'format' => '',
            'end_size' => 2,
            'mid_size' => 5,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;', 'text-domain',
            'total' => $num_of_pages,
            'current' => $paged,
            'type' => 'html'
        ) );
        
        if ( $page_links ) {

            echo '<br><div class="futura_pagination">' . $page_links . '</div><br>';
        }        
    }


    function show_futura_tags_html($post_id, $space){
        $tags = $this->get_futura_tags($post_id);
        $tags = explode(',', $tags);
        foreach($tags as $tag):
            if($tag == ""){continue;}
            $has_tag = has_tag( $tag, $post_id );
            if($has_tag){
                $class = "futura_recommended_tags_attached";
            }else{
                $class = "futura_recommended_tags";
            }
            ?><span class="<?php print $class; ?>" data-tag="<?php print $tag; ?>" data-post_id="<?php print $post_id; ?>"><?php print $tag; ?></span><?php print $space; ?><?php
        endforeach;
    }


    function show_futura_tags_js(){
        ?>
        <script>
        jQuery(function($){            
            if($('#futura_recommended_tags').length){
                // $('#futura_recommended_tags .futura_recommended_tags').on('click', function(){                    
                $('#futura_recommended_tags dd span').on('click', function(){                    
                    var tag = $(this).data('tag');
                    var post_id = $(this).data('post_id');
                    var admin_ajax_url  = '<?php echo admin_url('admin-ajax.php', __FILE__); ?>';
                    var elem = $(this);
                    if(elem.hasClass('futura_recommended_tags_attached')){
                        var data = {
                            'action': 'futura_remove_tag',
                            'futura_remove_tag': 1,
                            'tag':tag,
                            'post_id':post_id,
                            'secure': '<?php echo wp_create_nonce('futura_remove_tag_nonce') ?>'
                        };
                    }else{
                        var data = {
                            'action': 'futura_add_tag',
                            'futura_add_tag': 1,
                            'tag':tag,
                            'post_id':post_id,
                            'secure': '<?php echo wp_create_nonce('futura_add_tag_nonce') ?>'
                        };
                    }
                    $.ajax({
                        type: 'POST',
                        url: admin_ajax_url,
                        data: data
                        ,success: function(data){
                            if(elem.hasClass('futura_recommended_tags_attached')){
                                elem.addClass('futura_recommended_tags');
                                elem.removeClass('futura_recommended_tags_attached');
                                if($('.futura_adrb').length){
                                    $('.tagchecklist li').each(function(){
                                        var text = $(this).html().replace(/<button(.*?)<\/button>/, '');
                                        var text = text.replace(/&nbsp;/, '');
                                        console.log(text, elem.text());
                                        if(text == elem.text()){console.log("hgoe"); $(this).find('button').click();}
                                    });
                                }else{
                                    elem.text("<?php _e( 'Add', 'futura' ); ?>");
                                }
                            }else{
                                elem.removeClass('futura_recommended_tags');
                                elem.addClass('futura_recommended_tags_attached');
                                if($('.futura_adrb').length){
                                    $('#new-tag-post_tag').val(elem.text());
                                    $('.button.tagadd').click();
                                }else{
                                    elem.text("<?php _e( 'Remove', 'futura' ); ?>");
                                }
                            }
                        },
                    })            
                });
            }
        });
        </script>        
        <?php
    }


    function save_post($new_status, $old_status, $post){

        $post_type = $post->post_type;

        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $post_id = $post->ID;

        if(in_array($post_type, $this->get_target_post_types())){


            $pre_include_post = explode(",", get_post_meta($post_id, 'futura_include_post', 1));        
            $include_post = filter_input( INPUT_POST, 'futura_include_post', FILTER_SANITIZE_STRING );
            $include_post = preg_replace('/, /', ',', $include_post);
            /** update for empty */
            update_post_meta($post_id, 'futura_include_post', $include_post);
            $exclude_post = filter_input( INPUT_POST, 'futura_exclude_post', FILTER_SANITIZE_STRING );
            /** update for empty */
            update_post_meta($post_id, 'futura_exclude_post', $exclude_post);
    
            /** for mutal link */
            $mutal_link = filter_input_array(INPUT_POST, ['futura_mutal_link' => ['flags' => FILTER_REQUIRE_ARRAY]]);
            if(!empty($mutal_link['futura_mutal_link'])){
                update_post_meta($post_id, 'futura_mutal_link', 1);
                foreach(explode(",", get_post_meta($post_id, 'futura_include_post', 1)) as $id){
                    $this->add_mutal_link_of_the_post(trim($id), $post_id);
                }
    
                $delete_posts = array_diff($pre_include_post, explode(",", $include_post));
                $this->remove_mutal_link_from_other_post($post_id, $delete_posts);
    
            }else{
                update_post_meta($post_id, 'futura_mutal_link', 0);
            }
    
            /** for analyze server */
            if($new_status=="publish"){
                // if($this->is_analyze_disabled()){
                //     return;
                // }
                $array = $this->make_post_content_data($post, $post_id, 'related');
                $this->post_content($array);
                $this->analyze($array);
            }

        }

        return;
    }


    function delete_post_from_futura($post_id){
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $array = array(
            'user_id' => $user_id,
            'wp_content_id' => $post_id,
            'content_key' => $user_id.'_'.$post_id,
            'license_key' => $license_key,
        );
        $return = $this->delete_content($array);
        $return = json_decode($return,1);
        /** maybe do sommething if(isset($return["response"]["error]))  */
    }


    function make_post_content_data($post, $post_id, $type){
        $post_type = $post->post_type;
        $user_id = get_option('futura_user_id');
        $license_key = get_option('futura_license');
        $terms = $this->get_terms($post_id, $post_type);
        $tags = $this->get_tags($post_id);
        $custom_field = $this->get_custom_field($post_id, $type);
        $content = $post->post_content;
        $content = preg_replace('/\n|\r\n|\r/', '', $content);
        if ( $post->post_excerpt ){
            $excerpt = $post->post_excerpt;
        }else{
            $excerpt = "";
        }
        if(has_post_thumbnail($post_id)){
            $content .= '<img src="'.get_the_post_thumbnail_url($post_id,'full').'">';
        }
        $array = array(
            'user_id' => $user_id,
            'wp_user_id' => get_the_author_meta('ID', $post->post_author),
            'wp_content_id' => $post_id,
            'content_key' => $user_id.'_'.$post_id,
            'title' => get_the_title($post_id),
            'content' => $content,
            'excerpt' => $excerpt,
            'wp_post_type' => $post_type,
            'taxonomy' => $terms,
            'tag' => $tags,
            'custom_field' => $custom_field,
            'author' => get_the_author_meta('nickname', $post->post_author),
            'license_key' => $license_key,
            'post_date' =>  get_the_date( 'Y/m/d', $post_id )
        );
        return $array;
    }


    function delete_futura_related_posts_for_all(){
        global $wpdb;
        $wpdb->get_results("delete from $wpdb->postmeta where meta_key = 'futura_related_posts'");
    }


    function add_mutal_link_of_the_post($id, $post_id){
        $include_posts = explode(",", get_post_meta($id, 'futura_include_post', 1));
        if(!in_array($post_id, $include_posts)){
            $include_posts[] = $post_id;
            update_post_meta($id, 'futura_include_post', implode(",", array_filter($include_posts, "strlen")));
        }
        return;
    }


    function remove_mutal_link_from_other_post($post_id, $delete_posts){
        foreach($delete_posts as $id){
            $array = explode(",", get_post_meta($id, 'futura_include_post', 1));
            $index = array_search( $post_id, $array );
            if($index !== False){
                unset( $array[$index] ) ;
            }
            update_post_meta($id, 'futura_include_post', implode(",", array_filter($array, "strlen")));
        }
    }


    function is_analyze_disabled(){
        if($_SERVER["HTTP_HOST"]=="localhost"){
            $hour = 0;
        }else{
            $hour = 24;
        }

        $license_key = get_option('futura_license');
        if($license_key){
            $license = $this->validate_license($license_key);
            if(isset($license->response)){
                $response = $license->response;
                if(property_exists( $response, 'error' )){
                    add_action( 'admin_notices', array($this, 'license_admin_notice__error') );
                    return 1;
                }     
            }
        }else{
            return 1;
        }

        
        if((strtotime(date('Y/m/d H:i:s')) - strtotime(get_option('futura_last_action_time'))) > $hour*60*60){
            $disable = 0;
        }else{
            $disable = 1;
        }
        return $disable;        
    }


    function is_widget_active(){
        $w=wp_get_sidebars_widgets();
        foreach($w as $key=>$row){
            if(preg_match('/sidebar/', $key)){ 
                foreach($row as $value){
                    if(preg_match('/futura_related/', $value)){
                        return 1;
                    }
                }                
            }
        }
        return 0;
    }


    function maybe_load_jquery() {
        if ( ! wp_script_is( 'jquery', 'enqueued' )) {    
            wp_enqueue_script( 'jquery' );    
        }
    }

    function futura_ajax_record_click(){
        if(filter_input( INPUT_POST, 'futura_click_record', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_record_click_nonce','secure');

            $post_id = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
            $target_id = filter_input( INPUT_POST, 'target_id', FILTER_SANITIZE_NUMBER_INT );

            $json = get_post_meta($post_id, 'futura_click_record', true);
            if($json){
                $array = json_decode($json, true);
            }else{
                $array = array();
            }
            if(isset($array[$target_id])){
                $array[$target_id] += 1;
            }else{
                $array[$target_id] = 1;
            }
            update_post_meta($post_id, 'futura_click_record', json_encode($array));
            die();
        }
    }

    
    function futura_add_tag(){
        if(filter_input( INPUT_POST, 'futura_add_tag', FILTER_SANITIZE_NUMBER_INT )){
            check_ajax_referer('futura_add_tag_nonce','secure');

            $post_id = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
            $tag = filter_input( INPUT_POST, 'tag', FILTER_SANITIZE_STRING );

            wp_set_post_tags( $post_id, $tag, true );
            print 'suuccess';
            die();
        }
    }


    function futura_remove_tag(){
        if(filter_input( INPUT_POST, 'futura_remove_tag', FILTER_SANITIZE_NUMBER_INT )){
            check_ajax_referer('futura_remove_tag_nonce','secure');

            $post_id = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
            $tag = filter_input( INPUT_POST, 'tag', FILTER_SANITIZE_STRING );

            $tags = array();
            $_tags = get_the_tags($post_id);
            if(!empty($_tags)){
                foreach($_tags as $_tag){
                    if($_tag->name == $tag){continue;}
                    $tags[] = $_tag->name;
                }
            }
            wp_set_post_tags( $post_id, $tags, false );
            print 'suuccess';
            die();
        }
    }


    function futura_ajax_set_tag(){
        if(filter_input( INPUT_POST, 'futura-set_tag_data', FILTER_SANITIZE_STRING )){
            check_ajax_referer('futura_ajax_set_futura_tag_nonce','secure');
            $offset = filter_input( INPUT_POST, 'offset', FILTER_SANITIZE_NUMBER_INT );
            $args = array(
                'post_type' => array('post'),
                'post_status' => 'publish',
                'offset' => $offset,               
            );
    
            $the_query = new WP_Query( $args );    
            $total_posts = $the_query->found_posts;
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    $post_id = get_the_ID();
                    $tags = $this->get_futura_tags($post_id);
                    $tags = preg_split('/,/', $tags);
                    wp_set_post_tags( $post_id, $tags, true );                        
                endwhile;
            endif;
            $offset += 10;
            $percent = $offset/$total_posts;
            if($percent >= 1){
                $percent = 1;
                $offset = -1;
            }
            print json_encode(array("percent"=>$percent, "offset"=>$offset));
            die();
        }
    }


    function add_tag_suggest_to_tag_area($args, $taxonomy){
        if( 'post_tag' === $taxonomy )
            $args['meta_box_cb'] = array($this, 'futura_post_tags_meta_box');
        return $args;
    }

    function futura_post_tags_meta_box($post, $box){
        post_tags_meta_box( $post, $box );

        global $pagenow;
        if($pagenow != "post-new.php"):
        ?>
        <div class="futura_adrb">
            <label class="" for="exclude"><strong><?php _e( 'recommended tags', 'futura' ); ?></strong></label>
            <p><?php _e( 'FUTURA recommends tags. If you want to add, please click the tag.', 'futura' ); ?></p>
            <div id="futura_recommended_tags">
                <dd><?php $this->show_futura_tags_html($post->ID, " "); ?></dd>
            </div>
        </div>
        <?php endif;
    }
            
    
    function futura_admin_menu(){

        $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);
        if($page == "futura"):
            ?><div><strong><?php _e( 'Basic Setting', 'futura' ) ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura"); ?>"><?php _e( 'Basic Setting', 'futura' ) ?></a></div><?php
        endif;
        ?>&emsp;|&emsp;<?php
        if($page == "futura-setting"):
            ?><div><strong><?php _e( 'Detail Setting', 'futura' ) ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura-setting"); ?>"><?php _e( 'Detail Setting', 'futura' ) ?></a></div><?php
        endif;
        ?>&emsp;|&emsp;<?php

        if($page == "futura-design"):
            ?><div><strong><?php _e( 'Design Setting', 'futura' ) ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura-design"); ?>"><?php _e( 'Design Setting', 'futura' ) ?></a></div><?php
        endif;
        ?>&emsp;|&emsp;<?php

        if($page == "futura-tag"):
            ?><div><strong><?php _e( 'Tag Suggestions', 'futura' ) ?></strong></div><?php
        else:
            ?><div><a href="<?php menu_page_url("futura-tag"); ?>"><?php _e( 'Tag Suggestions', 'futura' ) ?></a></div><?php
        endif;

        return;
    }


    function admin_footer_area(){
    ?>
        <section>
            <div id="futura_footer_logo"><img src="<?php print plugins_url( '/assets/images/logo-rectangle-gray.svg', dirname(__FILE__) ) ; ?>" alt="Futura"></div>
        </section>
    <?php
    }

}
