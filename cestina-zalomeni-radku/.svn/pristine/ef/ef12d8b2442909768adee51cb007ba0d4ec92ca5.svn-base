<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.bozimedia.cz
 * @since      1.0.0
 *
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Bozimediazalomeni
 * @subpackage Bozimediazalomeni/public
 * @author     Marek Vratil <marek.vratil@gmail.com>
 */
class Bozimediazalomeni_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		// wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/bozimediazalomeni-public.css', array(), $this->version, 'all' ); // not use

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/bozimediazalomeni-public.js', array( 'jquery' ), $this->version, false ); // not use

	}
	
	/**
	 * Make filtrs
	 *
	 * @since    1.0.0
	 */
	public function add_filters() {
	    
	    $zalomeni_matches = get_option('bozimediazalomeni_matches');
	    if (!empty($zalomeni_matches)) {
	        $filters = array('comment_author', 'term_name', 'link_name', 'link_description', 'link_notes', 'bloginfo', 'wp_title', 'widget_title', 'widget_text', 'term_description', 'the_title', 'the_content', 'the_excerpt', 'comment_text', 'single_post_title', 'list_cats');
	        
	        // add 3rd plugins filters
	        // ACF
	        if (get_option('bozimediazalomeni_acf') == 'on') {
	           array_push($filters, get_option('bozimediazalomeni_acf_the_content'));
	        }
	        
	        $filters = array_combine($filters, $filters);
	        
	        /** remove by function
                function remove_filter_from_bozimediazalomeni(array $filters) {
                    unset($filters['the_title']);
                    return $filters;
                }
                add_filter('bozimediazalomeni_filtry', 'remove_filter_from_bozimediazalomeni');
	        
	        * add by function
	            function add_filter_to_bozimediazalomeni(array $filters) {
                    $filters['the_title'] = 'the_title';
                    return $filters;
                }
                add_filter('bozimediazalomeni_filtry', 'add_filter_to_bozimediazalomeni');  
	        
	        */
	        $filters = apply_filters('bozimediazalomeni_filtry', $filters);
	        
	        foreach ($filters as $filter) {
	            add_filter($filter, array($this, 'add_hard_spaces'));  // content filter
	        }
	    }
	    
	}
	
	/**
	 * ADD hard spaces to texts
	 *
	 * @since    1.0.0
	 * @param    string    $text       Content to add hard spaces.
	 */
	static public function add_hard_spaces($text) {
	   
	    if (get_option('bozimediazalomeni_matches') == '') return $text; // return original text
    	    $output = '';
    	    $curl = '';
    	    $textarr = preg_split('/(<.*>|\[.*\])/Us', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
    	    $stop = count($textarr);
    	    
    	    $no_texturize_tags = apply_filters('no_texturize_tags', array('pre', 'code', 'kbd', 'style', 'script', 'tt'));
    	    $no_texturize_shortcodes = apply_filters('no_texturize_shortcodes', array('code'));
    	    $no_texturize_tags_stack = array();
    	    $no_texturize_shortcodes_stack = array();
    	    
    	    for ($i = 0; $i < $stop; $i++) {
    	        $curl = $textarr[$i];
    	        
    	        if (!empty($curl)) {
    	            if ('<' != $curl[0] && '[' != $curl[0]
    	            && empty($no_texturize_shortcodes_stack) && empty($no_texturize_tags_stack)) { 
    	                $curl = preg_replace(get_option('bozimediazalomeni_matches'), get_option('bozimediazalomeni_replacements'), $curl);
    	                $curl = preg_replace(get_option('bozimediazalomeni_matches'), get_option('bozimediazalomeni_replacements'), $curl);
    	            } else {
    	                _wptexturize_pushpop_element($curl, $no_texturize_tags_stack, $no_texturize_tags, '<', '>');
    	                _wptexturize_pushpop_element($curl, $no_texturize_shortcodes_stack, $no_texturize_shortcodes, '[', ']');
    	            }
    	        }
    	        
    	        $output .= $curl;
    	    }
	    
	    return $output;
	}
	

	/**
	 * 3rd ACF plugin
	 *
	 * @since    1.0.0
	 * @param    string    $value             
	 */
	static public function acf_format_value( $value, $post_id, $field ) {

	    // run do_shortcode on all textarea values
	    $value = do_shortcode($value);
	    // return
	    return Bozimediazalomeni_Public::add_hard_spaces($value);
	    
	}
	

}
