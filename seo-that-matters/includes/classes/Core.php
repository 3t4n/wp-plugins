<?php

namespace SeoThatMatters;

if (!defined('WPINC')) { die; }

class PluginCore {

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_option_menu'));
        
		add_filter('plugin_action_links_' . SEOTM_BASENAME, [$this, 'plugin_setting_links']);
		add_filter('plugin_row_meta', [$this, 'plugin_row_links'], 10, 2);
    }

    /**
     * Add seotm inside the "Tools" menu
     *
     */
    public function add_option_menu()
    {
        
        $menu = add_management_page(
            SEOTM_NAME,		        // Page title
            SEOTM_NAME,		        // Menu name
            'manage_options', 		// Permissions
            SEOTM_PREFIX,			// Menu slug
            array($this, 'view')    // Function callback
        );

        add_action('load-' . $menu, array($this, 'load'));
 
    }   
	
	/* add settings on plugin list */
	public function plugin_setting_links($links)
    {
        $links = array_merge(array(
		    '<a href="' . esc_url(admin_url('/tools.php?page=' . SEOTM_PREFIX)) . '">' . __('Settings', 'opm') . '</a>',
		), $links);
        
        return $links;
    }    
    /* add links on plugin list row */
    public function plugin_row_links($links, $file)
      {
        if ($file !== SEOTM_BASENAME ) {
          return $links;
        }
    
        $pro_link = '<a target="_blank" href="https://dhiratara.me/services/speed-optimization/" title="' . __('Optimize More', SEOTM_PREFIX) . '">' . __('Speed Up Your Site!', SEOTM_PREFIX) . '</a>';
    
        $links[] = $pro_link;
    
        return $links;
      } // plugin_meta_links

    /**
     * setting menu page is loaded
     *
     */
    public function load()
    {

        do_action(SEOTM_PREFIX . '_load-page');

        // Register scripts
        add_action("admin_enqueue_scripts", array($this, 'enqueue_scripts'));

        //check store;
        $this->store();
    }

    public function enqueue_scripts()
    {

        $setting_js = 'js/admin-scripts.php';
        wp_register_script(
            'admin-settings',
            SEOTM_ASSETS_URL . $setting_js, '',
            SEOTM_VERSION
        );
		
        $ays_before_js = 'js/ays-beforeunload-shim.js';
        wp_register_script(
            'ays-beforeunload-shim',
            SEOTM_ASSETS_URL . $ays_before_js,
            array('jquery'),
            SEOTM_VERSION
        );

        $areyousure_js = 'js/jquery-areyousure.js';
        wp_register_script(
            'jquery-areyousure',
            SEOTM_ASSETS_URL . $areyousure_js,
            array('jquery'),
            SEOTM_VERSION
        );

        $setting_css = 'css/admin-styles.php';
        wp_register_style(
            'admin-settings',
            SEOTM_ASSETS_URL . $setting_css, '',
            '0005'
        );

        wp_enqueue_script(array('ays-beforeunload-shim', 'jquery-areyousure', 'admin-settings'));
        wp_enqueue_style(array('admin-settings'));
		
        wp_localize_script(
		    SEOTM_PREFIX . '-admin-settings',
		    SEOTM_PREFIX . '_settings',
		    array(
		        'adminurl' => admin_url("index.php"),
		        SEOTM_PREFIX . '_ajax_nonce' => wp_create_nonce(SEOTM_PREFIX . '_ajax_nonce')
		    )
		);

    }

    private function store()
	{
	    do_action(SEOTM_PREFIX . '_save_before_validation');
	
	    if (!isset($_POST[SEOTM_PREFIX . '-settings'])) {
	        return;
	    }
	
	    if (isset($_POST[SEOTM_PREFIX . '-action']) && $_POST[SEOTM_PREFIX . '-action'] == 'reset') {
	        return;
	    }
	
	    //  nonce checking
	    if (!isset($_POST[SEOTM_PREFIX . '_settings_nonce'])
	        || !wp_verify_nonce($_POST[SEOTM_PREFIX . '_settings_nonce'], SEOTM_PREFIX . '-settings-action')) {
	
	        print 'Sorry, your nonce did not verify.';
	        exit;
	    }
	
	    plugin_instance()->Settings()->store();
	    return;
	}


    public function view()
	{
	    $plugin_instance = plugin_instance();
	    $view = $plugin_instance->get_active_view();
	    $plugin_instance->admin_view($view);
	}
    
}