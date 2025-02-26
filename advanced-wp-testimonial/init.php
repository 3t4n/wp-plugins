<?php
/**
 * Plugin Name: Advanced Wp Testimonial
 * Plugin URI: http://phpconsultant.co/
 * Description: Advanced Wp Testimonial
 * Author: Anand Thakkar
 * Author URI: http://www.anthakkar.me/
 * Version: 1.0
 */

define('AWT_PLUGIN_DIR', dirname(__FILE__));

class AWT_CORE{
   
    function __construct() {
        
        include_once 'api/functions.php';
        include_once 'html/settings_screen.php';
        include_once 'html/client_meta_box.php';
        include_once 'widgets/testimonial_widget.php';
        
        load_plugin_textdomain('awt', false, basename(dirname(__FILE__)).'/language' );
        
        
        
        add_action('init'              ,array($this,'init'));
        add_action('admin_init'        ,array($this,'admin_init'));
        add_action('widgets_init'      ,array($this,'widgets_init'));
        add_action('admin_head'        ,array($this,'admin_head'));
        add_action('admin_menu'        ,array($this,'admin_menu'));
        add_action('add_meta_boxes'    ,array($this,'add_meta_boxes'));
        add_action('save_post'         ,array($this,'save_post'));
        add_action('template_redirect' ,array($this,'template_redirect'));
        
        
    }
    
    function widgets_init(){
        register_widget('AWT_TESTIMONIAL_WIDGET');
    }
    
    function template_redirect(){
        global $wp,$post, $wp_query;
        if($wp->query_vars['post_type']=='awt_testimonial' ){
            
            if(get_option('awt_plugin_template') != "TRUE"){
                if(is_archive())
                    $templatefilename = 'archive.php';
                else
                    $templatefilename = 'single.php';
            }else{
                if(is_archive())
                    $templatefilename = 'archive-awt_testimonial.php';
                else
                    $templatefilename = 'single-awt_testimonial.php';
                
                
            }
            
            if (file_exists(get_stylesheet_directory() . '/' . $templatefilename)) {
                $return_template = get_stylesheet_directory() . '/' . $templatefilename;
            } else {
                $return_template = AWT_PLUGIN_DIR . '/template/' . $templatefilename;
            }
            
            if (have_posts()) {
                include($return_template);
                die();
            } else {
                $wp_query->is_404 = true;
            }
        }
    }
    
    function admin_menu(){
        
        $page=add_submenu_page(
                'edit.php?post_type=awt_testimonial',
                __('Settings','awt'),
                __('Settings','awt'),
                'manage_options', 'awt_settings', 'awt_settings_screen'
        );
    }
    
    function save_post($post_id){
        
        $testimonial_post = get_post($post_id);
        if($testimonial_post->post_type=='awt_testimonial'){
            update_post_meta($post_id, 'awt_client_name'     ,strip_tags($_REQUEST['awt_client_name']));
            update_post_meta($post_id, 'awt_client_siteurl'  ,strip_tags($_REQUEST['awt_client_siteurl']));
        }
            
    }
    /**
     * Register the Meta Boxes for the awt_testimonial
     */
    function add_meta_boxes(){
        
        add_meta_box( 
                'awt_clientmeta',
                __( 'Client Details', 'awt' ),
                'awt_clientmeta_form',
                'awt_testimonial',
                'normal',
                'high'
        );
    }
    
    function save_settings(){
        if(!empty($_POST['awt_slug']))
            update_option('awt_slug',  strtolower ($_POST['awt_slug']));
        
        if(isset($_POST['awt_plugin_template']) && $_POST['awt_plugin_template']=='TRUE')
            update_option('awt_plugin_template','TRUE');
        else
            update_option('awt_plugin_template','FALSE');
        
        if(is_numeric($_POST['awt_short_desc_length']))
            update_option('awt_short_desc_length',$_POST['awt_short_desc_length']);
        else
            update_option('awt_short_desc_length',55);
        
        if(!empty($_POST['awt_link_text']))
            update_option('awt_link_text',$_POST['awt_link_text']);
        else
            update_option('awt_link_text',__('Read More','awt'));
        //$this->init();
        flush_rewrite_rules();
        
        wp_redirect(admin_url('edit.php?post_type=awt_testimonial&page=awt_settings&message=option_updated'));
    }
    
    function admin_init(){
        
        wp_register_script('awt_main_js', plugins_url('js/main.js',__FILE__),'jquery');
        
        add_filter('manage_edit-awt_testimonial_columns'        ,array($this,'custom_column'));
        add_action('manage_awt_testimonial_posts_custom_column' ,array($this,'custom_column_values'));
        
        if(isset($_POST['awt_do_action']) && current_user_can('manage_options')){
            $this->save_settings();
        }
    }
    
    function image_send_to_editor($html,$id){
        return $id;
    }
    
    function custom_column($columns){
        $new_columns['cb']             = $columns['cb'];
        $new_columns['title']          = $columns['title'];
        $new_columns['client']         = "Client Name";
        return $new_columns;
    }
    
    function custom_column_values($column){
        global $post;
        switch($column){
            case 'client':
                $link        = get_post_meta($post->ID,'awt_client_siteurl'  ,TRUE);
                $client_name = get_post_meta($post->ID,'awt_client_name'     ,TRUE);
                if(!empty($link)){
                    echo '<a target="_blank" class="row-title" herf="' . $link . '">' .  $client_name . '</a>';
                }else{
                    echo '<a class="row-title" herf="#">' . $client_name  . "</a>";
                }
                
                break;
        }
    }
    
    
    function admin_head(){
        
        if(isset($_GET['post'])){
            $post = get_post($_GET['post']);
        }
        
        if($_GET['post_type']=='awt_testimonial' || $post->post_type=='awt_testimonial'){
            
            wp_enqueue_style('thickbox');
            
            wp_enqueue_script('thickbox');
            wp_enqueue_script('awt_main_js');
        }
            
        
    }
    
    function init(){
        
       register_post_type( 'awt_testimonial',
            array(
                'labels' => array(
                        'name'               => __('Testimonials'                   ,'awt'),
                        'singular_name'      => __('Testimonial'                    ,'awt'),
                        'add_new'            => __('Add Testimonials'               ,'awt'),
                        'all_items'          => __('Testimonials'                   ,'awt'),
                        'add_new_item'       => __('Add New Testimonial'            ,'awt'),
                        'edit_item'          => __('Edit Testimonial'               ,'awt'),
                        'new_item'           => __('New Testimonials'               ,'awt'),
                        'view_item'          => __('View Testimonials'              ,'awt'),
                        'search_items'       => __('Search Testimonials'            ,'awt'),
                        'not_found'          => __('No Testimonials found'          ,'awt'),
                        'not_found_in_trash' => __('No Testimonials found in Trash' ,'awt'),
                ),
                'show_in_menu'       => true,
                'public'             => true,
                'publicly_queryable' => true,
                'has_archive'        => true,
                'rewrite'            => array(
                                            'slug'       => get_option('awt_slug','testimonial'),
                                            'with_front' => false
                                        ),
                'supports'           => array('title','editor','excerpt','thumbnail'),
            )
        ); 
    }
    
    function activation_hook(){
        
        $this->init();
        flush_rewrite_rules();
        
    }
}

$awt_core = new AWT_CORE();

register_activation_hook(__FILE__, array($awt_core,'activation_hook'));