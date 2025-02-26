<?php
/*
Plugin Name: Ajax Filter
Plugin URI: http://www.electricstudio.co.uk
Description: Filter posts with Ajax
Version: 1.6
Author: James Irving-Swift
Author URI: http://www.irving-swift.com
License: GPL2
*/

$installpath = pathinfo(__FILE__);

//include php files in lib folder
foreach (glob($installpath['dirname']."/lib/*.php") as $filename){
    include $filename;
}

/**
 *
 * The main class used by the plugin
 * @since 1.5
 * @author James Irving-Swift
 *
 */
class Ajaxf extends Ajaxf_elements{

    /**
     *
     * The constructor
     * @since 1.5
     */
    function __construct(){
        add_shortcode('ajaxFilter',array(&$this,'ajax_filter'));
        add_action('init',array(&$this,'enqueue_scripts'));

        /* the following methods are inherited from Ajaxf_elements */
        if(is_admin()){
                add_action( 'wp_ajax_nopriv_affilterposts',array(&$this,'create_filtered_section'));
                add_action( 'wp_ajax_affilterposts',array(&$this,'create_filtered_section'));
            }else{
                add_action( 'wp_ajax_nopriv_affilterposts',array(&$this,'create_filtered_section'));
            }
        }

    /**
     *
     * The is the method that is used by the shortcode
     * @param array $atts
     * @since 1.5
     * @return HTML
     */
    function ajax_filter($atts){
        if(!isset($atts['posttypes']))
            $posttypes = array('post');
        else
            $posttypes = explode(',',$atts['posttypes']);

        if(isset($atts['taxonomies']))
            $taxs = explode(",",$atts['taxonomies']);
        else
            $taxs = array('category');

        if(isset($atts['showcount']) && $atts['showcount']==1)
            $showCount = 1;
        else
            $showCount = 0;

        if(isset($atts['pagination']))
            $pagination = explode(",",$atts['pagination']);
        else
            $pagination = array("top","bottom");

        if(isset($atts['posts_per_page']))
            $postsPerPage = $atts['posts_per_page'];
        else
            $postsPerPage = 15;

        if(isset($atts['filters']))
            $filters = explode(",",$atts['filters']);
        else
        	$filters = array();

        if(!isset($atts['shownav']) || $atts['shownav']=='1')
            $this->create_filter_nav($taxs,$posttypes,$showCount);
        $this->add_inline_javascript($posttypes);
        $this->create_prog_bar();?>
        <section id="ajax-filtered-section">
            <?php $this->create_filtered_section($posttypes,$filters,$postsPerPage,$pagination);?>
        </section>
        <?php
    }

    /**
     *
     * method to include all required scripts
     * @since 1.5
     */
    function enqueue_scripts(){
        wp_register_style('af-style',get_bloginfo('wpurl').'/wp-content/plugins/ajax-post-filter/css/style.css');
    	wp_register_script('af-html5', get_bloginfo('wpurl').'/wp-content/plugins/ajax-post-filter/js/html5.js',false,'1.0');
    	wp_register_script('af-script', get_bloginfo('wpurl').'/wp-content/plugins/ajax-post-filter/js/af-script.js',array('jquery'),'1.0',true);
        wp_enqueue_style('af-style');
        wp_enqueue_script('af-html5');
        wp_enqueue_script('af-script');
    }

}

//load up the class so it can be used in the theme or by other plugins
$ajaxf = new Ajaxf();