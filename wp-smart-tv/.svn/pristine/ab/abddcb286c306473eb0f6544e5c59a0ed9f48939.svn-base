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
class Wp_Smart_Tv_recipes_builder {

    public function __construct() {
        // Init Network Admin Menu for MS
//        if (is_multisite()) {
//            $this->get_network_settings_metabox();
//        } 
        
        // Init Settings for Pro Tools
        //$this->get_settings_metabox();
        add_action('cmb2_admin_init', [$this, 'get_settings_metabox'],11);
		//add_action('admin_menu', [$this, 'remove_submenus'], 999);
		add_filter( 'submenu_file', [$this, 'remove_submenus'], 999 );
	}

	public function get_settings_metabox() {   
        global $wpstv_tools;
        $prefix = 'rovidx_smart_tv_';
        if (function_exists('rovidx_wpstv_check_auth')) {
			$dfpUrl = get_site_url() . '/wp-json/tv/roku/?key=' . rovidx_wpstv_get_auth_key();
			$firetvUrl = get_site_url() . '/wp-json/tv/firetv/?key=' . rovidx_wpstv_get_auth_key();
		} else {
			$dfpUrl = get_site_url() . '/wp-json/tv/roku/';
			$firetvUrl = get_site_url() . '/wp-json/tv/firetv/';
		} 
		$scrub = array(' ', '\'');
        $site_name = str_replace( ' ', '_', get_bloginfo() ) ;
        $site_name = strtolower($site_name);
		$dfpText = '<div class="aws_full_row"><em>Link for Roku Direct Publisher Feed (JSON):</em><div id="r-dfp-link" class="r-feed-url"><a href="' . $dfpUrl . '" target="_blank">' . $dfpUrl . '</a></div><div id="r-button-download"><a href="' . $dfpUrl . '" download="'.$site_name.'-roku-feed.json" class="button button-primary"><i class="fa fa-download" aria-hidden="true"></i> Download JSON File</a></div></div>';
		
        /*
        * ROKU Settings
        */
        $args = array(
            'id'           => 'rovidx_smart_tv_roku_options',
            'title'        => 'Roku Publisher',
            'menu_title'   => 'Roku Publisher', // Use menu title, & not title to hide main h2.
            'object_types' => array( 'options-page' ),
            'option_key'   => 'rovidx_smart_tv_roku_options',
            'parent_slug'  => 'rovidx_smart_tv_options',
            'tab_group'    => 'rovidx_smart_roku_options',
            'tab_title'    => 'Direct Publisher',
			'capabilities' => 'unknown'
        );
        
        if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
            $args['display_cb'] = array($this,'options_display_with_tabs');
        }
        
        $roku_options = new_cmb2_box( $args );
            $roku_options->add_field( array(
                'name' => 'JSON Link',
                'desc' => $dfpText,
                'type' => 'title',
                'id'   => $prefix . 'dp_header'
            ) );
            $roku_options->add_field( array(
                'name' => 'Category Controls',
                'desc' => 'If you would like WP Smart TV to control your categories on Roku Direct Publisher, please enable this. <em><a href="https://github.com/rokudev/feed-specifications/blob/master/direct-publisher-feed-specification.md#category" target="_blank">More information</a></em>',
                'type' => 'title',
                'id'   => $prefix . 'category_controls'
            ) );
        
			$roku_options->add_field( array(
				'name' => __( '', 'wp-smart-tv' ),
				'after_row' => '',
				'desc'    => 'Enable Categories in Feed for Roku - ',
				'id'      => $prefix . 'roku_dfp_recipes_enabled',
				'type'	           => 'switch',
			) );
        
            $roku_options->add_field( array(
                'name' => 'Media Types',
                'desc' => 'Choose Direct Publisher Media Types',
                'type' => 'title',
                'id'   => $prefix . 'dp_media_types'
            ) );
        
			$roku_options->add_field( array(
				'name' => __( 'Movies', 'wp-smart-tv' ),
				'desc'    => '',
				'id'      => $prefix . 'roku_dfp_movies_enabled',
				'type'	           => 'switch',
			) );
		
			$roku_options->add_field( array(
				'name' => __( 'Shortform Videos', 'wp-smart-tv' ),
				'desc'    => '',
				'id'      => $prefix . 'roku_dfp_shortform_enabled',
				'type'	           => 'switch',
			) );
		
			$roku_options->add_field( array(
				'name' => __( 'TV Specials', 'wp-smart-tv' ),
				'desc'    => '',
				'id'      => $prefix . 'roku_dfp_tvspecials_enabled',
				'type'	           => 'switch',
			) );	
		    
            $roku_options->add_field( array(
				'name' => __( 'Series', 'wp-smart-tv' ),
				'desc'    => '',
				'id'      => $prefix . 'roku_dfp_series_enabled',
				'type'	           => 'switch',
			) );
		    
		    $roku_options->add_field( array(
				'name'       => esc_html__( 'No. of Items per type', 'wp-smart-tv' ),
				'desc'       => esc_html__( 'Set the number of items per post type in the Roku JSON feed.   Use -1 for all content.', 'wp-smart-tv' ),
				'id'         => $prefix . 'no_posts',
				'type'       => 'text',
                'default'    => -1,
				'attributes' => array(
					'type'    => 'number',
					'pattern' => '\d*',
				),
			) );
		
		    /*
            * ROKU Advertising Settings
            */
            $args = array(
                'id'           => 'rovidx_smart_tv_roku_ad_options',
                'title'        => 'Roku Settings',
                'menu_title'   => 'Advertising', // Use menu title, & not title to hide main h2.
                'object_types' => array( 'options-page' ),
                'option_key'   => 'rovidx_smart_tv_ad_options',
                'parent_slug'  => 'rovidx_smart_tv_options',
                'tab_group'    => 'rovidx_smart_roku_options',
                'tab_title'    => 'Advertising',
            );

            if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
                $args['display_cb'] = array($this,'options_display_with_tabs');
            }

            $ad_options = new_cmb2_box( $args );
        
        
            $ad_options->add_field( array(
                'name' => 'Advertising Controls',
                'desc' => 'Define your default settings for Advertising on the Direct Publisher platform',
                'type' => 'title',
                'id'   => $prefix . 'dp_ad_controls'
            ) );
        
			$ad_options->add_field( array(
				'name'             => __( 'Select Ad Types', 'wp-smart-tv' ),
				'desc'             => __( '	1 - Pre-roll - No mid-roll ads accepted<br>
											2 - Automatic - Scheduled mid-rolls based on a timer.  EX: <strong>7 minutes</strong> would schedule a commerical every 7 minutes for the duration of the content<br>
											3 - Scheduled - Choose when to run mid-rolls on a per item basis.<br>
											4 - Schedlued w/ Automatic Fallback - Play\'s scheduled ads if available.  Falls back to Automatic settings if the "Ad Break" section is empty.', 
										 'wp-smart-tv' ),
				'id'               => $prefix . 'ad_feed_type',
				'type'             => 'select',				
				'show_option_none' => true,
				'options'          => array(
					'1' => '1. Pre-Roll',
					'2' => '2. Automatic',
				    '3' => '3. Scheduled',
					'4' => '4. Scheduled w/ Automatic Fallback'
				),

			) );
		
		 $ad_options->add_field( array(
				'name'       => __( 'Mid Roll Timer', 'wp-smart-tv' ),
				'desc'       => __( 'Plays mid-roll every <em>XX</em> minutes. Only works with option 2 and 4.', 'wp-smart-tv' ),
				'id'         => $prefix . 'roku_midroll_timer',
				'type'       => 'text',
				'attributes' => array(
					'type' => 'number',
					'pattern' => '\d*',
				),
			) );
        
        /*
        * Recipe Settings
        */
        

        $roku_recipes = new_cmb2_box( array(
            'id'           => 'wpstv_rdp',
            'title'        => 'Roku Settings',
            'menu_title'   => 'Recipe Builder', // Use menu title, & not title to hide main h2.
            'object_types' => array( 'options-page' ),
            'capability'   => 'edit_posts',
            'option_key'   => 'wpstv_rdp',
            'parent_slug'  => 'rovidx_smart_tv_options',
            'tab_group'    => 'rovidx_smart_roku_options',
            'tab_title'    => 'Recipe Builder',
        ) );

        // VTT Group
        $catGroup = $roku_recipes->add_field( array(
                'id'          => $prefix . 'category_recipe',
                'type'        => 'group',
                //'description' => __( 'Add Closed Caption support', 'wp-smart-tv' ),
                'repeatable'  => true, // use false if you want non-repeatable group
                'options'     => array(
                'group_title'   => __( 'Category recipe {#}', 'wp-smart-tv' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'    => __( 'Add another recipe', 'wp-smart-tv' ),
                'remove_button' => __( 'Remove recipe', 'wp-smart-tv' ),
                'sortable'      => true, // beta
                'closed'     => false, // true to have the groups closed by default
            ),
        ) );

        $roku_recipes->add_group_field( $catGroup, array(
            'name' => __('Category Name'),
            'id' => $prefix . 'cat_name',
            'type' => 'text',
            'attributes' => array(
                'data-validation' => 'required',
            ),
        ) );

        $roku_recipes->add_group_field( $catGroup, array(
            'name' => __('Order'),
            'id' => $prefix . 'order',
            'type' => 'select',
            'attributes' => array(
                'data-validation' => 'required',
            ),
            'classes' => 'recipe_order',
            'options' => $wpstv_tools->get_recipe_order()
        ) );

        $roku_recipes->add_group_field( $catGroup, array(
            'name' => __('Query Type'),
            'id' => $prefix . 'query',
            'type' => 'select',
            'classes' => 'recipe_query',
            'attributes' => array(
                'data-validation' => 'required',
            ),
            'options' => $wpstv_tools->get_recipe_ops()
        ) );

        $roku_recipes->add_group_field( $catGroup, array(
            'name' => __('Select Tags'),
            'id' => $prefix . 'cat_tags',
            'type'           => 'multicheck_inline',
            'attributes' => array(
                'data-validation' => 'required',
            ),
            'classes' => 'playlist_tags',
            'options' => $wpstv_tools->get_terms_array()
        ));

        if (function_exists('rovidx_wpstv_roku_build_playlists') && function_exists('rovidx_wpstv_get_playlists') ) {      
            $roku_recipes->add_group_field($catGroup, array(
                'name'        => __( 'Playlist' ),
                'id'          => $prefix . 'at_playlist',
                'class'     => 'playlist_selector',
                'desc'		  => 'Enter the ID of your playlist or click the "Search" button',
                'type'        => 'select',
                'classes'     => 'playlist_select',
                'options'     => rovidx_wpstv_get_playlists()
                
            ) ); 
        }
        
    }
	
	public function menu_add() {
        //$sub = add_submenu_page( 'wpstv_rdp', 'Roku Direct', 'Roku Direct','manage_options', 'wpstv_rdp');
    }
    
    public function remove_submenus($submenu_file) {
		global $plugin_page;

		$hidden_submenus = array(
		// Uncomment "yourprefix_main_options" for removing all submenus
		//'yourprefix_main_options' => true,
		'wpstv_rdp' => true,
		'rovidx_smart_tv_ad_options' => true,
		);

		// Select another submenu item to highlight (optional).
		if ( $plugin_page && isset( $hidden_submenus[ $plugin_page ] ) ) {
			$submenu_file = 'rovidx_smart_tv_options';
		}

		// Hide the submenu.
		foreach ( $hidden_submenus as $submenu => $unused ) {
			remove_submenu_page( 'rovidx_smart_tv_options', $submenu );
		}

		return $submenu_file;
    }
}