<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Media_Blaster
 * @subpackage Media_Blaster/includes
 * @author     Your Name <email@example.com>
 */
class Wp_Smart_Tv_series_meta {

    public function __construct() {
       $this->get_metabox();
	}
    
    private function get_metabox() {
        global $wpstv_tools;
        
        $tv_settings = get_option('rovidx_smart_tv_options');
        
        $prefix = 'rovidx_smarttv_';
        /**
         * Metabox to add fields to categories and tags
         */
        $cmb = new_cmb2_box( array(
            'id'               => $prefix . 'edit',
            'title'            => esc_html__( 'WP Smart TV Info', 'cmb2' ), // Doesn't output for term boxes
            'object_types'     => array('series'), // Tells CMB2 to use term_meta vs post_meta
            //'taxonomies'       => array( 'series' ), // Tells CMB2 which taxonomies should have these fields
            // 'new_term_section' => true, // Will display in the "Add New Category" section
        ) );
       

        $cmb->add_field( array(
                'id'   => $prefix . 'series_type',
                'name' => 'Type of Series',
                'desc' => 'Multiple seasons or mini-series',
                'type' => 'select',
                'options' => array(
                    'miniseries' => 'Mini-Series',
                    'seasons'	 => 'Multiple Seasons'
                )
            ));

        $cmb->add_field( array(
            'name' => 'Release Date',
            'id'   => $prefix . 'series_release_date',
            'type' => 'text_date',
            'desc' => 'YYYY-mm-dd',
            // 'timezone_meta_key' => 'wiki_test_timezone',
            'date_format' => 'Y-m-d',
            'attributes' => array(
                'data-datepicker' => json_encode(array(
                    'yearRange' => '1900:' . ( date('Y'))
                )),
                'data-validation' => 'required',
            )
        ) );

        $cmb->add_field( array(
            'name'    => __( 'Choose Content', 'cmb2' ),
            'desc'    => __( 'Drag posts from the left column to the right column to attach them to this Playlist.', 'cmb2' ),
            'id'      => $prefix . 'playlist',
            'type'    => 'custom_attached_posts',
            'options' => array(
                'show_thumbnails' => true, // Show thumbnails on the left
                'filter_boxes'    => true, // Show a text box for filtering the results
                'query_args'      => array(
                    'posts_per_page' => 200,
                    'post_type'      => array('episodes'),
                ), // override the get_posts args
            ),
            'attributes' => array(
                'data-validation' => 'required',
            ),
        ) );

        $cmb->add_field( array(
            'name' => esc_html__( 'Series Thumbnail', 'cmb2' ),
            'desc' => esc_html__( 'Minimum of 800px by 450px', 'cmb2' ),
            'id'   => $prefix . 'series_thumb',
            'type' => 'file',
            'preview_size' => array( 225, 400 ),
            'options' => array(
                'url' => false, // Hide the text input for the url
            ),
            'attributes' => array(
                'data-validation' => 'required',
            ),
        ) );
            
        $cmb->add_field( array(
            'name'    => 'Genres',
            //'desc'    => '',
            'id'      => $prefix . 'series_genres',
            'type'    => 'multicheck_inline',
            'select_all_button' => false,
            'options' => $wpstv_tools->get_genre_list(),
            'attributes' => array(
                'data-validation' => 'required',
            )

        ) );
        
        // Episode Meta's
        $box = new_cmb2_box( array(
			'id'            => $prefix . 'episode_metabox',
			'title'         => '<i class="fas fa-television" aria-hidden="true"></i> Series Information',
			'object_types'  => array('episodes'), // Post type
			// 'show_on_cb' => 'rovidx_smart_tv_show_if_front_page', // function should return a bool value
			'context'    => 'side',
			//'priority'   => 'high',
			// 'show_names' => true, // Show field names on the left
			'cmb_styles' => true, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
			//'classes'    => 'rovidx-admin-meta', // Extra cmb2-wrap classes
			//'classes_cb' => 'rovidx-smarttv-videodata', // Add classes through a callback.
		) ); 

		$box->add_field( array(
			'name'       => esc_html__( 'Season', 'wp-smart-tv' ),
			'desc'       => esc_html__( 'Leave blank for Mini Series', 'wp-smart-tv' ),
			'id'         => $prefix . 'se_no',
			'type'       => 'text',
			'column' => array(
				'position' => 2,
			),
			'attributes' => array(
				'type' => 'number',
				'pattern' => '\d*',
			),
		) );
       
		$box->add_field( array(
			'name'       => esc_html__( 'Episode Number', 'wp-smart-tv' ),
			//'desc'       => esc_html__( 'URL of the Media.  Tested with Vimeo Pro (HLS), Amazon S3 with CloudFront and Self-Hosted video files', 'wp-smart-tv' ),
			'id'         => $prefix . 'ep_no',
			'type'       => 'text',
			'column' => array(
				'position' => 3,
			),
			'attributes' => array(
				'type' => 'number',
				'pattern' => '\d*',
			),
		) );
    }
    
    public function get_genre_list() {
        return array(
                'action' 		=> 'Action',
                'adventure' 	=> 'Adventure',
                'animals'		=> 'Animals',
                'animated'		=> 'Animated',
                'anime'			=> 'Anime',
                'children'		=> 'Children',
                'comedy'		=> 'Comedy',
                'crime'			=> 'Crime',
                'documentary'	=> 'Documentary',
                'drama'			=> 'Drama',
                'educational'	=> 'Educational',
                'fantasy'		=> 'Fantasy',
                'faith'			=> 'Faith',
                'food'			=> 'Food',
                'fashion'		=> 'Fashion',
                'gaming'		=> 'Gaming',
                'health'		=> 'Health',
                'history'		=> 'History',
                'horror'		=> 'Horror',
                'miniseries'	=> 'Mini Series',
                'mystery'		=> 'Mystery',
                'nature'		=> 'Nature',
                'news'			=> 'News',
                'reality'		=> 'Reality',
                'romance'		=> 'Romance',
                'science'		=> 'Science',
                'science fiction' => 'Science Fiction',
                'sitcom'		=> 'Sitcom',
                'special'		=> 'Special',
                'sports'		=> 'Sports',
                'thriller'		=> 'Thriller',
                'technology'	=> 'Technology',
            );
    }
}
