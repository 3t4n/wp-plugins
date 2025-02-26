<?php

class Wp_Smart_Tv_settings {

    public function __construct() {
        // Init Network Admin Menu for MS
//        if (is_multisite()) {
//            $this->get_network_settings_metabox();
//        } 
        
        // Init Settings for Pro Tools
        $this->get_settings_metabox();
        add_action( 'admin_menu', array($this, 'menu_add'));
        
        add_action( 'admin_menu', array($this, 'menu_rmv'),2);
		add_filter( 'submenu_file', [$this, 'remove_submenus'], 999 );
	}

	public function get_settings_metabox() {
        /**
         * Registers options page menu item and form.
         */
        $prefix = 'rovidx_smart_tv_';
		
		
        
        /*
        * General Settings
        */
        $args = array(
            'id'           => 'rovidx_smart_tv_options',
            'title'        => 'WP Smart TV Settings', // Page title
            'object_types' => array( 'options-page' ),
            'capability'   => 'manage_options',
            'option_key'   => 'rovidx_smart_tv_options', // The option key and admin menu page slug.
            'icon_url'     => plugins_url('assets/img/wpsmtv-by-rovidx.icon.png', __DIR__), // Menu icon. Only applicable if 'parent_slug' is left empty.
            'menu_title'   => esc_html__( 'WP Smart TV', 'wp-smart-tv' ), // Falls back to 'title' (above).
            'tab_group'    => 'rovidx_smart_tv_options',
		    'tab_title'    => 'General Settings',
        );
        
        if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
            $args['display_cb'] = array($this,'options_display_with_tabs');
        }
        
        $general_options = new_cmb2_box( $args );
        
        $general_options->add_field( array(
                'name' => '<strong>Media Post Types</strong>',
                'desc' => 'Choose which types of Media Posts you want to use',
                'type' => 'title',
                'id'   => $prefix . 'media_post_types'
            ) );
        
        
		$general_options->add_field( array(
            'name'    => __( 'Enable Movies', 'wp-smart-tv' ),
            //'desc'    => __( 'Enable Movie Post Type', 'wp-smart-tv' ),
            'id'      => $prefix . 'movie_post_type_enabled',
            'type'	           => 'switch',
        ) );


        $general_options->add_field( array(
            'name'    => __( 'Enable Short-form Videos', 'wp-smart-tv' ),
            'id'      => $prefix . 'shortform_video_post_type_enabled',
            'type'	           => 'switch',
        ) );

        $general_options->add_field( array(
            'name'    => __( 'Enable Series', 'wp-smart-tv' ),
            'id'      => $prefix . 'series_post_type_enabled',
            'type'	           => 'switch',
        ) );

        $general_options->add_field( array(
            'name' => __( 'Enable TV Specials', 'wp-smart-tv' ),
            'id'      => $prefix . 'tvspecials_post_type_enabled',
            'type'	           => 'switch',
        ) );
        
        $general_options->add_field( array(
            'name' => '<strong>Meta Controls</strong>',
            'desc' => 'Choose which meta controls you will use',
            'type' => 'title',
            'id'   => $prefix . 'meta_controls'
        ) );
        
        $general_options->add_field( array(
            'name' => __( 'Enable Trickplay Support', 'wp-smart-tv' ),
            'id'      => $prefix . 'trickplay_enabled',
            'type'	           => 'switch',
        ) );
        
        $general_options->add_field( array(
            'name' => __( 'Enable Subtitle Support', 'wp-smart-tv' ),
            'id'      => $prefix . 'subtitle_enabled',
            'type'	           => 'switch',
        ) );
        
        $general_options->add_field( array(
            'name' => __( 'Enable Advanced Controls', 'wp-smart-tv' ),
            'id'      => $prefix . 'advanced_enabled',
            'type'	           => 'switch',
        ) );
        
        $general_options->add_field( array(
            'name' => __( 'Enable Advertising Controls', 'wp-smart-tv' ),
            'id'      => $prefix . 'ads_enabled',
            'type'	           => 'switch',
        ) );
        
//        $args = array(
//            'id'           => 'rovidx_smart_tv_options',
//            'title'        => 'WP Smart TV Settings', // Page title
//            'object_types' => array( 'options-page' ),
//            'capability'   => 'manage_options',
//            'option_key'   => 'rovidx_smart_tv_options', // The option key and admin menu page slug.
//            'icon_url'     => plugins_url('assets/img/wpsmtv-by-rovidx.icon.png', __DIR__), // Menu icon. Only applicable if 'parent_slug' is left empty.
//            'menu_title'   => esc_html__( 'WP Smart TV', 'wp-smart-tv' ), // Falls back to 'title' (above).
//            'tab_group'    => 'rovidx_smart_tv_options',
//		    'tab_title'    => 'General Settings',
//        );
//        
//        if ( version_compare( CMB2_VERSION, '2.4.0' ) ) {
//            $args['display_cb'] = array($this,'options_display_with_tabs');
//        }
//        
//        $general_options = new_cmb2_box( $args );
        
    }

    public function options_display_with_tabs($cmb_options) {
        $tabs = $this->options_page_tabs( $cmb_options );
        ?>
        <div class="wrap r_wrap cmb2-options-page option-<?php echo $cmb_options->option_key; ?>">
            <?php if ( get_admin_page_title() ) : ?>
                <h2><?php echo wp_kses_post( get_admin_page_title() ); ?></h2>
            <?php endif; ?>
            <h2 class="nav-tab-wrapper">
                <?php foreach ( $tabs as $option_key => $tab_title ) : ?>
                    <a class="nav-tab<?php if ( isset( $_GET['page'] ) && $option_key === $_GET['page'] ) : ?> nav-tab-active<?php endif; ?>" href="<?php menu_page_url( $option_key ); ?>"><?php echo wp_kses_post( $tab_title ); ?></a>
                <?php endforeach; ?>
            </h2>
            <form class="cmb-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" id="<?php echo $cmb_options->cmb->cmb_id; ?>" enctype="multipart/form-data" encoding="multipart/form-data">
                <input type="hidden" name="action" value="<?php echo esc_attr( $cmb_options->option_key ); ?>">
                <?php $cmb_options->options_page_metabox(); ?>
                <?php submit_button( esc_attr( $cmb_options->cmb->prop( 'save_button' ) ), 'primary', 'submit-cmb' ); ?>
            </form>
        </div>
        <?php
    }
    
    public function options_page_tabs( $cmb_options ) {
        $tab_group = $cmb_options->cmb->prop( 'tab_group' );
        $tabs      = array();
        foreach ( CMB2_Boxes::get_all() as $cmb_id => $cmb ) {
            if ( $tab_group === $cmb->prop( 'tab_group' ) ) {
                $tabs[ $cmb->options_page_keys()[0] ] = $cmb->prop( 'tab_title' )
                    ? $cmb->prop( 'tab_title' )
                    : $cmb->prop( 'title' );
            }
        }
        return $tabs;
    }
    
    private function get_roles() {
        global $wp_roles;
        $roles = $wp_roles->get_names();
        
        return $roles;
    }
    
    public function menu_add() {
        $sub = add_submenu_page( 'rovidx_smart_tv_options', 'General Settings', 'General Settings',
        'manage_options', 'rovidx_smart_tv_options');
    }

    public function menu_rmv() {
        $page = remove_submenu_page( 'rovidx_smart_tv_options', 'rovidx_smart_tv_options' );	
    }

	public function remove_submenus($submenu_file) {
		global $plugin_page;

		$hidden_submenus = array(
			// Uncomment "yourprefix_main_options" for removing all submenus
			//'yourprefix_main_options' => true,
			'rovidx_smart_tv_api_options' => true,
			'wpstv_license' => true,
			'rovidx_smart_tv_import_content' => true,
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