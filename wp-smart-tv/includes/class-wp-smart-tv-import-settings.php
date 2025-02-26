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
class Wp_Smart_Tv_importer {

    public function __construct() {
            
        // Init Settings for Pro Tools
        $this->get_settings_metabox();
	}

	public function get_settings_metabox() {   
        $prefix = 'rovidx_smart_tv_';
       /*
        * Importer Settings
        */
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
        
        $dfpbutton = '<a href="' . $dfpUrl . '" download="'.$site_name.'-roku-feed.json" class="button button-primary"><i class="fa fa-download" aria-hidden="true"></i> Download JSON File</a>';
        
        
        
        
        $args = array(
            'id'           => 'rovidx_smart_tv_import_content',
            'title'        => 'WP Smart TV Settings',
            'menu_title'   => 'Import/Export', // Use menu title, & not title to hide main h2.
            'object_types' => array( 'options-page' ),
            'option_key'   => 'rovidx_smart_tv_import_content',
            'parent_slug'  => 'rovidx_smart_tv_options',
            'tab_group'    => 'rovidx_smart_tv_options',
            'tab_title'    => 'Import/Export',
            'classes' => array( '' )
        );
        
        if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
            $args['display_cb'] = array($this,'options_display_with_tabs');
        }
        
        $import_export = new_cmb2_box( $args );
        
        $import_export->add_field( array(
            'name' => '<strong>Direct Publisher Import</strong>',
            'desc' => 'Import a Direct Publisher JSON feed from another source.',
            'type' => 'title',
            'class' => '',
            'id'   => $prefix . 'import_header_1'
        ) );
        
		$import_export->add_field( array(
            'name'    => 'Direct Publisher Feed URL',
            'desc'    => 'Upload Roku Direct Publisher JSON file',
            'id'      => $prefix . 'roku_dp_json',
            'type'    => 'text',
            'classes'   => '',
            //'query_args' => array( 'type' => 'image/x-biff' ),
        ) );
    
        $import_export->add_field( array(
            'name'             => __( 'Import Type', 'wp-smart-tv' ),
            'desc'             => __( '', 'wp-smart-tv' ),
            'id'               => $prefix . 'import_type',
            'type'             => 'select',
            'classes'           => '',
            'show_option_none' => false,
            'options'          => array(
                'rokudp_json' => 'Roku JSON',
            ),
            'after' => '<br><button id="wpstv-trigger-import" class="btn-outline-primary waves-effect"><i class="fas fa-cloud-upload-alt"></i> Start Import</button><div id="r-import-console"></div>'
        ) );
        
        $import_export->add_field( array(
            'name' => '<strong>Export Feed</strong>',
            //'desc' => 'Import a Direct Publisher JSON feed from another source.',
            'type' => 'title',
            'id'   => $prefix . 'import_header_2'
        ) );
        
        $import_export->add_field( array(
            'name'  => __( 'Export Direct Publisher (JSON)', 'wp-smart-tv' ),
            'desc'  => __( $dfpbutton , 'wp-smart-tv' ),
            'id'    => $prefix . 'export_json',
            'type'  => 'title',
            'after' => ''
        ) );
        
        
    }
}