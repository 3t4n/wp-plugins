<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.advancedcustomtypes.io
 * @since      1.0.0
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    ACT_Divi
 * @subpackage ACT_Divi/admin
 * @author     Pablo Capello <hola@capellopablo.com>
 */
class ACT_Divi_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ACT_Divi    The ID of this plugin.
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
	 * @param      string    $ACT_Divi       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        add_action( 'admin_menu', array($this, 'admin_menu') );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ACT_Divi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ACT_Divi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
//		wp_die($this->plugin_name);
		wp_enqueue_style( $this->plugin_name.'-admin', plugin_dir_url( __FILE__ ) . "css/{$this->plugin_name}-admin.css", array(), $this->version, 'all' );

        $current_screen = get_current_screen();
        if($current_screen->id == 'toplevel_page_act_divi_settings'){
//            wp_enqueue_style( 'epanel-style', get_template_directory_uri() . '/epanel/css/panel.css', array(), et_get_theme_version() );


            $is_divi        = ( 'toplevel_page_act_divi_settings' === $current_screen->id );

            if ( ! wp_style_is( 'et-core-admin', 'enqueued' ) ) {
                wp_enqueue_style( 'et-core-admin-epanel', get_template_directory_uri() . '/core/admin/css/core.css', array(), et_get_theme_version() );
            }

            wp_enqueue_style( 'epanel-style', get_template_directory_uri() . '/epanel/css/panel.css', array(), et_get_theme_version() );

            if ( wp_style_is( 'activecampaign-subscription-forms', 'enqueued' ) ) {
                // activecampaign-subscription-forms style breaks the panel.
                wp_dequeue_style( 'activecampaign-subscription-forms' );
            }

            // ePanel on theme others than Divi might want to add specific styling
            if ( ! apply_filters( 'et_epanel_is_divi', $is_divi ) ) {
                wp_enqueue_style( 'epanel-theme-style', apply_filters( 'et_epanel_style_url', get_template_directory_uri() . '/style-epanel.css'), array( 'epanel-style' ), et_get_theme_version() );
            }


            global $themename;

            $epanel_jsfolder = get_template_directory_uri() . '/epanel/js';

            et_core_load_main_fonts();

            wp_register_script( 'epanel_colorpicker', $epanel_jsfolder . '/colorpicker.js', array(), et_get_theme_version() );
            wp_register_script( 'epanel_eye', $epanel_jsfolder . '/eye.js', array(), et_get_theme_version() );
            wp_register_script( 'epanel_checkbox', $epanel_jsfolder . '/checkbox.js', array(), et_get_theme_version() );
            wp_enqueue_script( 'wp-color-picker' );
            wp_enqueue_style( 'wp-color-picker' );

            $wp_color_picker_alpha_uri = defined( 'ET_BUILDER_URI' ) ? ET_BUILDER_URI . '/scripts/ext/wp-color-picker-alpha.min.js' : $epanel_jsfolder . '/wp-color-picker-alpha.min.js';

            wp_enqueue_script( 'wp-color-picker-alpha', $wp_color_picker_alpha_uri, array( 'jquery', 'wp-color-picker' ), et_get_theme_version(), true );

            wp_enqueue_script( 'epanel_functions_init', $epanel_jsfolder . '/functions-init.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-form', 'epanel_colorpicker', 'epanel_eye', 'epanel_checkbox', 'wp-color-picker-alpha' ), et_get_theme_version() );
            wp_localize_script( 'epanel_functions_init', 'ePanelSettings', array(
                'clearpath'      => get_template_directory_uri() . '/epanel/images/empty.png',
                'epanel_nonce'   => wp_create_nonce( 'epanel_nonce' ),
                'help_label'     => esc_html__( 'Help', $themename ),
                'et_core_nonces' => et_core_get_nonces(),
            ) );

            // Use WP 4.9 CodeMirror Editor for some fields
            if ( function_exists( 'wp_enqueue_code_editor' ) ) {
                wp_enqueue_code_editor(
                    array(
                        'type' => 'text/css',
                    )
                );
                // Required for Javascript mode
                wp_enqueue_script( 'jshint' );
                wp_enqueue_script( 'htmlhint' );
            }
        }
//        echo "<pre>";
//        print_r($screen);
//        echo "</pre>";
//        wp_die();
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in ACT_Divi_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The ACT_Divi_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

//		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );


	}


    function admin_menu() {
        add_menu_page( __( 'ACT', 'act-divi' ), __( 'ACT for Divi', 'act-divi' ), 'manage_options', 'act_divi_settings', array($this, 'plugin_page'), plugins_url( 'advanced-custom-types-divi/admin/img/icon-30x30.png' ), 99 );

    }

    function plugin_page() {
        ?>
        <div id="wrapper">
            <div id="panel-wrap">
                <div id="epanel-top">
                    <!--<input type="submit" value="<?php /*_e( 'Save changes', 'act-divi' ) */?>" class="et-save-button" style=''>-->
                </div>

                <div id="epanel-wrapper" class="actd-panel">
                    <div id="epanel" class="et-onload">
                        <div id="epanel-content-wrap">
                            <div id="epanel-content" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                                <div id="epanel-header" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
                                    <h1 id="epanel-title">Advanced Custom Types for Divi</h1>
                                </div>
                                <ul id="epanel-mainmenu" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                    <?php
                                    /*

                                        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="wrap-general" aria-labelledby="ui-id-3" aria-selected="true" aria-expanded="true">
                                            <a href="#wrap-general" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">General</a>
                                        </li>
                                        */
                                    ?>

                                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="wrap-builder" aria-labelledby="ui-id-5" aria-selected="false" aria-expanded="false">
                                        <a href="#wrap-cpt" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-5">Post Types</a>
                                    </li>
                                </ul><!-- end epanel mainmenu -->



                                <?php
                                /*

                                <div id="wrap-general" class="et-content-div ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs ui-widget ui-corner-all" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="false">
                                    <ul class="et-id-tabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="general-1" aria-labelledby="ui-id-11" aria-selected="true" aria-expanded="true">
                                            <a href="#general-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-11">
                                                <span class="pngfix">General</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div id="general-1" class="et-tab-content ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-11" role="tabpanel" aria-hidden="false">

                                            <form id="actd-setting-general-form" class="actd-settings-form" action="options.php" method="POST">
                                                <input type="submit" value="<?php _e( 'Save general settings', 'act-divi' ) ?>" class="et-save-button" style=''>
                                                <?php settings_fields( 'actd_general_settings_group' ); ?>
                                                <?php do_settings_sections( 'actd_general_settings' ); ?>
                                                <input type="submit" value="<?php _e( 'Save general settings', 'act-divi' ) ?>" class="et-save-button" style='width:25%'>
                                            </form>

                                    </div> <!-- end general-1 div -->
                                </div> <!-- end wrap-general div -->
                                */
                                ?>

                                <div id="wrap-cpt" class="et-content-div ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs ui-widget ui-corner-all" aria-labelledby="ui-id-5" role="tabpanel" aria-hidden="true" style="display: none;">

                                    <ul class="et-id-tabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="builder-1" aria-labelledby="ui-id-15" aria-selected="true" aria-expanded="true">
                                            <a href="#builder-1" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-15">
                                                <span class="pngfix">Post Type Integration</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div id="builder-1" class="et-tab-content ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-15" role="tabpanel" aria-hidden="false">
                                        <form id="actd-setting-post-typeform" class="actd-settings-form" action="options.php" method="POST">
                                            <input type="submit" value="<?php _e( 'Save post type settings', 'act-divi' ) ?>" class="et-save-button">
                                                <?php settings_fields( 'actd_post_type_settings_group' ); ?>
                                                <?php do_settings_sections( 'actd_post_type_settings' ); ?>
                                            <input type="submit" value="<?php _e( 'Save post type settings', 'act-divi' ) ?>" class="et-save-button">
                                        </form>
                                    </div> <!-- end builder-1 div -->




                                        <div id="builder-2" class="et-tab-content ui-tabs-panel ui-widget-content ui-corner-bottom" aria-labelledby="ui-id-16" role="tabpanel" aria-hidden="true" style="display: none;">
                                        </div> <!-- end builder-2 div -->
                                    </div> <!-- end wrap-builder div -->


                                </div> <!-- end epanel-content div -->
                            </div> <!-- end epanel-content-wrap div -->
                        </div> <!-- end epanel div -->
                    </div> <!-- end epanel-wrapper div -->

                <div id="epanel-bottom">
                    <!--<button class="et-save-button" name="save" id="epanel-save">Save Changes</button>-->
                </div><!-- end epanel-bottom div -->
            </div>
        </div>
        <?php
    }

}
