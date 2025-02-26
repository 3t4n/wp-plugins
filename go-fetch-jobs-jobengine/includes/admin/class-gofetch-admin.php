<?php

/**
 * Provides basic admin functionality.
 *
 * @package GoFetchJobs/Admin
 */
if ( !defined( 'ABSPATH' ) ) {
    die;
}
/**
 * Base admin class.
 */
class GoFetch_JobEngine_Admin
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        if ( get_option( 'goft-je-error' ) ) {
            add_action( 'admin_notices', array( $this, 'warnings' ) );
        }
        $this->hooks();
        $this->includes();
    }
    
    /**
     * Include any classes we need within admin.
     */
    public function includes()
    {
        require_once 'class-gofetch-admin-list.php';
        require_once 'class-gofetch-admin-sample-table.php';
        require_once 'class-gofetch-admin-settings.php';
        require_once 'class-gofetch-admin-meta-boxes.php';
        require_once 'class-gofetch-admin-ajax.php';
    }
    
    public function hooks()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ), 20 );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ), 21 );
        add_action( 'admin_head', array( $this, 'admin_icon' ) );
    }
    
    /**
     * Register admin JS scripts and CSS styles.
     */
    public function register_admin_scripts( $hook )
    {
        $ext = (( !defined( 'SCRIPT_DEBUG' ) || !SCRIPT_DEBUG ? '.min' : '' )) . '.js';
        wp_register_style( 'fontello', GoFetch_JobEngine()->plugin_url() . '/includes/admin/assets/font-icons/css/fontello.css' );
        // Selective load.
        if ( !$this->load_scripts( $hook ) ) {
            return;
        }
        wp_register_script(
            'goft_je-settings',
            GoFetch_JobEngine()->plugin_url() . '/includes/admin/assets/js/scripts' . $ext,
            array( 'jquery' ),
            GoFetch_JobEngine()->version,
            true
        );
        wp_register_script(
            'validate',
            GoFetch_JobEngine()->plugin_url() . '/includes/admin/assets/js/jquery.validate.min.js',
            array( 'jquery' ),
            GoFetch_JobEngine()->version
        );
        $params = array(
            'sensor'    => false,
            'libraries' => 'places',
        );
        $google_api = add_query_arg( $params, 'https://maps.googleapis.com/maps/api/js' );
        wp_register_script(
            'gmaps',
            $google_api,
            array( 'jquery' ),
            GoFetch_JobEngine()->version
        );
        wp_register_script(
            'geocomplete',
            GoFetch_JobEngine()->plugin_url() . '/includes/admin/assets/js/jquery.geocomplete.min.js',
            array( 'jquery', 'gmaps' ),
            GoFetch_JobEngine()->version
        );
        wp_register_style( 'goft_je', GoFetch_JobEngine()->plugin_url() . '/includes/admin/assets/css/styles.css' );
    }
    
    /**
     * Enqueue registered admin JS scripts and CSS styles.
     */
    public function enqueue_admin_scripts( $hook )
    {
        wp_enqueue_style( 'fontello' );
        // Selective load.
        if ( !$this->load_scripts( $hook ) ) {
            return;
        }
        wp_enqueue_script( 'goft_je-settings' );
        wp_enqueue_script( 'validate' );
        wp_enqueue_script( 'gmaps' );
        wp_enqueue_script( 'geocomplete' );
        wp_enqueue_script( 'jquery-ui-datepicker' );
        wp_enqueue_script( 'jquery-ui-sortable' );
        wp_enqueue_style( 'goft_je' );
        wp_enqueue_style( 'goft_je-jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css' );
        wp_localize_script( 'goft_je-settings', 'goft_je_admin_l18n', array(
            'ajaxurl'               => admin_url( 'admin-ajax.php' ),
            'ajax_nonce'            => wp_create_nonce( 'goft_je_nonce' ),
            'ajax_save_nonce'       => wp_create_nonce( 'go-fetch-jobs-jobengine' ),
            'date_format'           => get_option( 'date_format' ),
            'msg_jobs_found'        => __( 'Total Jobs in Feed', 'gofetch-je' ),
            'msg_simple'            => __( 'Simple...', 'gofetch-je' ),
            'msg_advanced'          => __( 'Edit...', 'gofetch-je' ),
            'msg_specify_valid_url' => __( 'Please specify a valid URL to import the feed.', 'gofetch-je' ),
            'msg_invalid_feed'      => __( 'Could not load feed.', 'gofetch-je' ),
            'msg_no_jobs_found'     => __( 'No Jobs Found in Feed.', 'gofetch-je' ),
            'msg_template_missing'  => __( 'Please specify a template name.', 'gofetch-je' ),
            'msg_template_saved'    => __( 'Template Settings Saved.', 'gofetch-je' ),
            'msg_rss_copied'        => __( 'Feed URL copied', 'gofetch-je' ),
            'label_yes'             => __( 'Yes', 'gofetch-je' ),
            'label_no'              => __( 'No', 'gofetch-je' ),
            'cancel_feed_load'      => __( 'Cancel', 'gofetch-je' ),
            'default_query_args'    => GoFetch_JobEngine_RSS_Providers::valid_item_tags(),
        ) );
    }
    
    /**
     * Criteria used for the selective load of scripts/styles.
     */
    private function load_scripts( $hook = '' )
    {
        if ( empty($_GET['post_type']) && empty($_GET['post']) && 'toplevel_page_' . GoFetch_JobEngine()->slug !== $hook ) {
            return false;
        }
        $post_type = '';
        
        if ( !empty($_GET['post']) ) {
            $post = get_post( (int) $_GET['post'] );
            $post_type = $post->post_type;
        } elseif ( isset( $_GET['post_type'] ) ) {
            $post_type = $_GET['post_type'];
        }
        
        if ( $post_type !== GoFetch_JobEngine()->post_type && 'toplevel_page_' . GoFetch_JobEngine()->slug !== $hook ) {
            return false;
        }
        return true;
    }
    
    /**
     * Use external font icons in dashboard.
     */
    public function admin_icon()
    {
        echo  '<style type=\'text/css\' media=\'screen\'>
	   		#toplevel_page_' . GoFetch_JobEngine()->slug . ' div.wp-menu-image:before {
	   		font-family: Fontello !important;
	   		content: \'\\e800\';
	     }
	     	</style>' ;
    }
    
    /**
     * Admin notices.
     */
    public function warnings()
    {
        echo  scb_admin_notice( sprintf( __( 'The <strong>%1$s</strong> was not found. Please install it first to be able to use <strong>%2$s</strong>.', 'gofetch-je' ), 'JobEngine plugin', 'Go Fetch Jobs' ), 'error' ) ;
    }
    
    public static function limited_plan_warn()
    {
        $text = '';
        
        if ( gfjwjm_fs()->is_not_paying() ) {
            $tooltip = __( 'Not available on the Free plan.', 'gofetch-je' );
            $text = html( 'span class="dashicons dashicons-warning tip-icon bc-tip limitation" data-tooltip="' . $tooltip . '"', '&nbsp;' );
        }
        
        return $text;
    }

}
new GoFetch_JobEngine_Admin();