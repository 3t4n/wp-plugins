<?php
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @since      1.0.0
 * @package    ADSMANIA
 * @subpackage adsmania/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @since      1.0.0
 * @package    ADSMANIA
 * @subpackage adsmania/admin
 * @author     Abu Bakr Soliman <bakrianoo@gmail.com>
 */
class ADSMANIA_Admin {

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
	 * The form fields and default values.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array    $ads_values    The form fields and default values.
	 */
        private $ads_values;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
                
		$this->version = $version;
                
                $this->ads_values =  array(
                        'ads_type' => 'ads_content',
                        'ads_content' => 'code',
                        'ads_link' => '',
                        'ads_link_target' => '_blank',
                        'ads_media_link' => '',
                        'ads_media_w' => '550',
                        'ads_media_h' => '350',
                        'ads_fb_link' => '',
                        'ads_fb_theme' => 'light',
                        'ads_fb_w' => '200',
                        'ads_fb_h' => '450',
                        'ads_fb_friends' => 'true',
                        'ads_fb_header' => 'true',
                        'ads_fb_posts' => 'true',
                        'ads_fb_border' => 'true',
                        'ads_sound_link' => '',
                        'ads_adsense' => '',
                        'ads_code' => '',
                        'ads_code_box' => '',
                        'ads_code_box_w' => '300',
                        'ads_code_box_h' => '550',
                        'ads_code_box_b_w' => '1',
                        'ads_code_box_b_c' => '#000',
                        'ads_image_file' => '',
                        'ads_image_link' => '',
                        'ads_image_width' => '',
                        'ads_image_height' => '',
                        'ads_view_in' => 'all',
                        'ads_categories' => '',
                        'ads_post_ids' => '',
                        'ads_page_ids' => '',
                        'ads_start_at' => time(),
                        'ads_end_at' => time() + 86400,
                        'ads_sound_w' => '100%',
                        'ads_sound_h' => '450',
                        'ads_sound_autoplay' => '',
                        'ads_sound_visual' => 'true',
                        'ads_sound_comments' => 'true',
                        'ads_sound_user' => 'true'
                    );
	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( "{$this->plugin_name}_bootstrap", plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );
                wp_enqueue_style( "{$this->plugin_name}_jquery_ui", plugin_dir_url( __FILE__ ) . 'css/jquery-ui.min.css', array(), $this->version, 'all' );
                wp_enqueue_style( "{$this->plugin_name}_custom_post", plugin_dir_url( __FILE__ ) . 'css/post_options.css', array('wp-color-picker','thickbox'), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( "{$this->plugin_name}_bootstrap", plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
                wp_enqueue_script( "{$this->plugin_name}_custom_post", plugin_dir_url( __FILE__ ) . 'js/post-options.js', array( 'jquery','media-upload','thickbox','wp-color-picker','jquery-ui-datepicker' ), $this->version, false );

	}
        
        /**
         * This function is provided for the custom post type building.
         *
         * An instance of this class should be passed in the initial phase of this plugin.
         * @since    1.0.0
         */
        public function custom_post()
        {
                $labels = array(
                            'name'               => __('Ads Mania','adsmania'),
                            'singular_name'      => __('Ads','adsmania'),
                            'menu_name'          => __('Ads Mania','adsmania'),
                            'name_admin_bar'     => __('Ads Mania','adsmania'),
                            'add_new'            => __('Add New Ads','adsmania'),
                            'add_new_item'       => __('Add New Ads','adsmania'),
                            'new_item'           => __('New Ads','adsmania'),
                            'edit_item'          => __('Edit an Ads','adsmania'),
                            'view_item'          => __('View the Ads','adsmania'),
                            'all_items'          => __('All Ads','adsmania'),
                            'search_items'       => __('Search Ads','adsmania'),
                            'parent_item_colon'  => '',
                            'not_found'          => __('There is no Ads','adsmania'),
                            'not_found_in_trash' => __('No Ads in trash','adsmania')
                    );

                register_post_type('ads_post', array(

                            'labels'             => $labels,
                            'public'             => false,
                            'publicly_queryable' => false,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => 'ads_post',
                            'rewrite'            => array( 'slug' => 'ads_post' ),
                            'capability_type'    => 'post',
                            'has_archive'        => true,
                            'hierarchical'       => false,
                            'menu_position'      => 5,
                            'supports'           => array( 'title', 'excerpt', 'thumbnail')
                ));

                // we will register a new genre type for the ads
                $genre_labels = array(
                            'name'              => __('Ads Genre','adsmania'),
                            'singular_name'     => __('Ads Genre','adsmania'),
                            'search_items'      => __('Search about Ads Genre','adsmania'),
                            'all_items'         => __('All Ads Genre','adsmania'),
                            'parent_item'       => __('Parent Ads Genre','adsmania'),
                            'parent_item_colon' => __('Parent Genre','adsmania'),
                            'edit_item'         => __('Edit Ads Genre','adsmania'),
                            'update_item'       => __('Update Ads Genre','adsmania'),
                            'add_new_item'      => __('Add Ads Genre','adsmania'),
                            'new_item_name'     => __('New Ads Genre','adsmania'),
                            'menu_name'         => __('Ads Genre','adsmania'),
                    );

                    $genre_config = array(
                    'hierarchical'      => true,
                            'labels'            => $genre_labels,
                            'show_ui'           => true,
                            'show_admin_column' => true,
                            'query_var'         => true,
                            'rewrite'           => array( 'slug' => 'ads_post/genre' ),
                    );

                    register_taxonomy('ads_genre', array('ads_post'), $genre_config);
        }
        
        /**
         * This function is provided for meta box building.
         *
         * An instance of this class should be passed to the define_admin_hooks() function
         * defined in ADSMANIA_Loader in that particular class.
         * @since    1.0.0
         */
        public function meta_box() {                 
		add_meta_box('ads_post_meta', 'Options', array($this,'ads_post_options_metabox'), 'ads_post');

	}
        
        /**
         * This function is provided for generating the HTML Form for the custom meta box.
         * 
         * An instance of this class should be passed to the define_admin_hooks() function
         * defined in ADSMANIA_Loader in that particular class.
         * @since    1.0.0
        */
        function ads_post_options_metabox($post)
        {
            
            if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
                return $post->ID;
            }
            else
            {
                // this file contains the required HTML code for the meta box
                require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/ads_post_options.php';
            }
        }
        
        /**
         * This function detects how to handle the fields then save them.
         * 
         * An instance of this class should be passed to the define_admin_hooks() function
         * defined in ADSMANIA_Loader in that particular class.
         * @since    1.0.0
        */
        function ads_save_post($id)
        {
            
                if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
                        return $id;
                }
                else
                {
                // update post meta
                foreach($this->ads_values as $k=>$v)
                {
                  if(isset($_POST[$k])) {
                    // if the $_POST is an array, join multiple values, i.e <select multiple>
                    if(is_array($_POST[$k])) { $_POST[$k] = implode(',',$_POST[$k]); }
                    // fix code box dimensions (which % or px)
                        if(in_array($k, array('ads_code_box_w','ads_code_box_h','ads_code_box_b_w')))
                        {
                            if(!strstr($_POST[$k], '%')) { $_POST[$k] .= "px"; }
                        }
                        // fix custom dates (convert into unix time)
                        else if(in_array($k, array('ads_start_at','ads_end_at')))
                        {
                            if(!empty($_POST[$k])) {
                                $dates = explode("-", $_POST[$k]);
                                if(count($dates) == 3)
                                    {
                                        if($k=='ads_start_at') { $_POST[$k] = mktime('0','0','0',$dates[1],$dates[0],$dates[2]); }
                                        if($k=='ads_end_at') { $_POST[$k] = mktime('23','59','59',$dates[1],$dates[0],$dates[2]); }
                                    }
                                else
                                    $_POST[$k] = 0;
                            }
                        }

                            update_post_meta($id, $k, $_POST[$k]);
                    }
                }
            }
        }
        
        /**
         * This function is provided for setting the dashboard coloumns.
         * 
         * An instance of this class should be passed to the define_admin_hooks() function
         * defined in ADSMANIA_Loader in that particular class.
         * @since    1.0.0
        */
        function ads_coloumns($columns) {
            

            unset($columns['author'], $columns['comments']);

            $new_col = array(
                'cb' => $columns['cb'],
                'title' => $columns['title'],
                'taxonomy-ads_genre' => __("Genre",$this->plugin_name),
                'ads_start_at' => __("Starts at",$this->plugin_name),
                'ads_end_at' => __("Ends at",$this->plugin_name));

            return $new_col;
        }
        
        /**
         * This function is provided for setting the custom values of dashboard coloumns.
         * 
         * An instance of this class should be passed to the define_admin_hooks() function
         * defined in ADSMANIA_Loader in that particular class.
         * @since    1.0.0
        */
        function ads_custom_coloumns($col) {
            
            global $post;
            $val = '';
            switch($col)
            {    
                // convert ads dates into human readable ones.
                case 'ads_start_at' :
                   $val = (is_numeric(get_post_meta($post->ID,'ads_start_at', true))) ? gmdate("d-m-Y",get_post_meta($post->ID,'ads_start_at', true)) : "—";
                break;

                case 'ads_end_at' :
                   $val = (is_numeric(get_post_meta($post->ID,'ads_end_at', true))) ? gmdate("d-m-Y",get_post_meta($post->ID,'ads_end_at', true)) : "—";
                break;
            }
            echo $val;
        }
}
