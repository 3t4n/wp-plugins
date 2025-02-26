<?php

if (!defined('WPINC')) {
    die;
}

class OPM_IMG_Admin_Core
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_option_menu'), 11);
        //add_action('admin_menu', array($this, 'add_sub_menu'));
        
        add_action('admin_head', array($this, 'add_menu_style'));
        
		add_filter('plugin_action_links_' . OPM_IMG_BASENAME, [$this, 'plugin_setting_links']);
		add_filter('plugin_row_meta', array($this, 'plugin_row_links'), 10, 2);
    }

    /**
     * Add opm_img to setting menu
     *
     * @return void
     */
    public function add_option_menu()
    {
		if ( !is_plugin_active( 'optimize-more/optimize-more.php' ) ) {
			
		$icon_base64 = 'PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA0ODcuOCA0ODcuOCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDg3LjggNDg3LjgiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxwYXRoIGQ9Ik0yNDMuOSAwQzEwOS4yIDAgMCAxMDkuMiAwIDI0My45czEwOS4yIDI0My45IDI0My45IDI0My45IDI0My45LTEwOS4yIDI0My45LTI0My45UzM3OC42IDAgMjQzLjkgMHptOTYuNyAxMzEuN2MxNC43IDAgMjYuNiAxMiAyNi42IDI2LjZzLTEyIDI2LjYtMjYuNiAyNi42UzMxNCAxNzMgMzE0IDE1OC40czExLjktMjYuNyAyNi42LTI2Ljd6bS0xNDguOSA0LjZoMTEwLjZjMi45IDAgNS4yIDMgNS4yIDYuOHMtMi4zIDYuOC01LjIgNi44SDE5MS43Yy0yLjkgMC01LjMtMy01LjItNi44LS4xLTMuOCAyLjItNi44IDUuMi02Ljh6bS05OSA1MS40aDExMC42YzIuOSAwIDUuMiAzIDUuMiA2LjhzLTIuMyA2LjgtNS4yIDYuOEg5Mi43Yy0yLjkgMC01LjItMy01LjItNi44czIuMy02LjggNS4yLTYuOHptMTQ1LjYgNTkuNWMyLjkgMCA1LjIgMyA1LjIgNi44cy0yLjMgNi44LTUuMiA2LjhIMTI3LjdjLTIuOSAwLTUuMi0zLTUuMi02LjhzMi4zLTYuOCA1LjItNi44aDExMC42em0tNTAuNiA4MC4ySDg0LjNjLTMgMC01LjUtMy4xLTUuNS03czIuNS03IDUuNS03aDEwMy40YzMgMCA1LjQgMy4yIDUuNSA3IC4xIDMuOC0yLjQgNy01LjUgN3pNMzMyIDIxOS45Yy05IDE1LjUtMTcuNyAzMS4zLTI1LjkgNDcuMyAxMi4xIDYuMyAyNi42IDE3LjIgMzMuOSAyMy4yIDkuMyA3LjQgMjEuMSAzNi40IDI4LjIgNTEgNy42IDE1LjYtMTYuNyAyNy0yNC4zIDExLjQtNi4zLTEyLjktMTYuNy0zOC40LTIyLjgtNDMuNC02LjItNS4xLTI2LjEtMTkuMi00MS40LTI0LjUtLjctLjMtMS41LS42LTIuMS0uOS0xOC43IDIzLjctNTUuMyAzNS04Ni42IDE2LjctMTYuNS05LjYtMS42LTMzLjQgMTQuOS0yMy43IDIyLjkgMTMuNCA0Ni43LTMuOCA1Ny41LTI1LjEgMTAuOS0yMS40IDE4LjUtMzYuNSAyNy4xLTUxLjctMTcuMS01LjQtMzIuNy0uNS00NC45IDE2LjctOS45IDE0LTMzLjMuNi0yMy4yLTEzLjUgMjMuNy0zMy4yIDU5LjItNDEuNSA5NC43LTIwLjQgMS41LjkgOC4xIDQuNiA5LjYgNS40IDIyLjEgMTMuMSA0Mi41IDEwLjYgNTcuOC0xMC45IDkuOS0xNCAzMy4zLS42IDIzLjIgMTMuNi0xOS41IDI3LjItNDYuOSAzNy42LTc1LjcgMjguOHoiLz48L3N2Zz4=';

        //The icon in the data URI scheme
        $icon_data_uri = 'data:image/svg+xml;base64,' . $icon_base64;
		
		$page = add_menu_page(
            __('Optimize More! - Images', 'opm_img'),		// Page title
            __('Optimize More!', 'opm_img'),		// Menu name
            'manage_options', 					// Permissions
            'optimize-more-images',					// Menu slug
            array($this, 'view'),
			$icon_data_uri
        );
        
        $submenu = add_submenu_page( 'optimize-more-images', OPM_IMG_NAME, OPM_IMG_PLUGIN_NAME, 'manage_options', 'admin.php?page=optimize-more-images', '', 0);

        add_action('load-' . $page, array($this, 'load'));

    	} else {
    	    $submenus = add_submenu_page(
                'optimize-more',
                OPM_IMG_NAME,	// Page title
                OPM_IMG_PLUGIN_NAME,	// Menu name
                'manage_options',
                'optimize-more-images',
                array($this, 'view'), 2);
            
            add_action('load-' . $submenus, array($this, 'load'));
    	}
    
	}
	
	
	public function add_menu_style() {
        if (! is_plugin_active( 'optimize-more/optimize-more.php' ) ) {
            ?>
            <style>#adminmenu li.toplevel_page_optimize-more-images.menu-icon-generic,
				#adminmenu li#toplevel_page_optimize-more-images ul.wp-submenu li:last-child {
            	display:none!important
            }</style>
            <?php
		}
    }
    
	
	/* add settings on plugin list */
	public function plugin_setting_links($links)
    {
        $links = array_merge(array(
            '<a href="' . esc_url(admin_url('/admin.php?page=optimize-more-images')) . '">' . __('Settings', 'opm_img') . '</a>',
        ), $links);
        
        return $links;
    }
    
    public function plugin_row_links($links, $file)
      {
        if ($file !== OPM_IMG_BASENAME ) {
          return $links;
        }
    
        $pro_link = '<a target="_blank" href="https://thinkweb.dev/service/speed-optimization/" title="' . __('Optimize More', 'opm_img') . '">' . __('Optimize More!', 'opm_img') . '</a>';
    
        $links[] = $pro_link;
    
        return $links;
      } // plugin_meta_links

    /**
     * opm_img setting menu page is loaded
     *
     * @return void
     */
    public function load()
    {

        do_action("opm_img_load-page");

        // Register scripts
        add_action("admin_enqueue_scripts", array($this, 'enqueue_scripts'));

        //check store;
        $this->store();
    }

    public function enqueue_scripts()
    {

        $setting_js = 'js/admin-settings.js';
        wp_register_script(
            'opm_img-admin-settings',
            OPM_IMG_ASSETS_URL . $setting_js,
            OPM_IMG_VERSION
        );

        $jquery_validate = 'js/jquery.validate.min.js';
        wp_register_script(
            'jquery-validate',
            OPM_IMG_ASSETS_URL . $jquery_validate,
            array('jquery'),
            OPM_IMG_VERSION
        );

        $ays_before_js = 'js/ays-beforeunload-shim.js';
        wp_register_script(
            'ays-beforeunload-shim',
            OPM_IMG_ASSETS_URL . $ays_before_js,
            array('jquery'),
            OPM_IMG_VERSION
        );

        $areyousure_js = 'js/jquery-areyousure.js';
        wp_register_script(
            'jquery-areyousure',
            OPM_IMG_ASSETS_URL . $areyousure_js,
            array('jquery'),
            OPM_IMG_VERSION
        );

        $setting_css = 'css/admin-settings.css';
        wp_register_style(
            'opm_img-admin-settings',
            OPM_IMG_ASSETS_URL . $setting_css,
            OPM_IMG_VERSION . '2'
        );


        wp_enqueue_script(array('ays-beforeunload-shim', 'jquery-areyousure', 'opm_img-admin-settings'));
        wp_enqueue_style(array('opm_img-admin-settings'));
		
		// custom admin settings
		wp_register_style('opm_img-custom-admin-settings', OPM_IMG_ASSETS_URL . 'css/admin-custom-settings.css');
		wp_enqueue_style('opm_img-custom-admin-settings');
		

        wp_localize_script(
            'opm_img-admin-settings',
            'opm_img_settings',
            array(
                'adminurl' => admin_url("index.php"),
                'opm_img_ajax_nonce' => wp_create_nonce("opm_img_ajax_nonce")
            )
        );
    }

    private function store()
    {
        do_action('opm_img_save_before_validation');

        if (!isset($_POST['opm_img-settings'])) {
            return;
        }

        if (isset($_POST['opm_img-action']) && $_POST['opm_img-action'] == 'reset') {
            return;
        }
        //  nonce checking
        if (!isset($_POST['opm_img-settings_nonce'])
            || !wp_verify_nonce($_POST['opm_img-settings_nonce'], 'opm_img-settings-action')) {

            print 'Sorry, your nonce did not verify.';
            exit;
        }

        opm_img()->Settings()->store();
        return;
    }

    public function view()
    {
        $opm_img = opm_img();
        $view = $opm_img->get_active_view();
        $opm_img->admin_view($view);
    }
    
    
}