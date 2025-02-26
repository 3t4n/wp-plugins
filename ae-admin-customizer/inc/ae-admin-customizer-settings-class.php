<?php
if ( ! defined( 'ABSPATH' ) ) exit;

require_once (AE_ADMIN_CUSTOMIZER_PLUGIN_PATH . "inc/classes/general-settings-class.php");
require_once (AE_ADMIN_CUSTOMIZER_PLUGIN_PATH . "inc/classes/admin-panel-styling-class.php");
require_once (AE_ADMIN_CUSTOMIZER_PLUGIN_PATH . "inc/classes/login-registration-styling-class.php");
require_once (AE_ADMIN_CUSTOMIZER_PLUGIN_PATH . "inc/classes/custom-css-class.php");
require_once (AE_ADMIN_CUSTOMIZER_PLUGIN_PATH . "inc/classes/live-login-registration-customizer.php");


class AE_Admin_Customizer_Settings
{

    public function __construct(  )
    {
        add_action('admin_enqueue_scripts', array( $this, 'ae_admin_required_scripts' ), 1000);
        add_action('wp_enqueue_scripts', array( $this, 'ae_admin_required_scripts_frontend' ), 1000);
        add_action( 'admin_menu', array( $this, 'ae_admin_customizer_setting_page_create' ), 1000 );
    }


    /**
     * Enqueue AE Admin Customizer Required BackEnd Scripts
     * @author Allan Empalmado (AppDevPH)
     * @since : 1.0.0
     */
    public function ae_admin_required_scripts(){
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lato|Roboto', false );
        wp_enqueue_style( 'ae-admin-customizer-css', plugins_url('/assets/css/style.css', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ ), false, '1.0.0');
        wp_enqueue_script('iris', admin_url('js/iris.min.js'),array('jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch'), false, 1);
        wp_enqueue_script('wp-color-picker', admin_url('js/color-picker.min.js'), array('iris'), false,1);
        $colorpicker_l10n = array('clear' => __('Clear'), 'defaultString' => __('Default'), 'pick' => __('Select Color'));
        wp_localize_script( 'wp-color-picker', 'wpColorPickerL10n', $colorpicker_l10n ); 
        wp_enqueue_media();
        wp_enqueue_script( 'ae-admin-customizer-js', plugins_url('/assets/js/ae-admin-customizer.js', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ ), array('jquery'), '1.0', true);
    }

    /**
     * Enqueue AE Admin Customizer Required FrontEnd Scripts
     * @author Allan Empalmado (AppDevPH)
     * @since : 1.0.0
     */
    public function ae_admin_required_scripts_frontend(){
        //1.0.6
        //only enqueue if admin bar is showing
        if(is_admin_bar_showing()){
            wp_enqueue_style( 'ae-admin-customizer-css', plugins_url('/assets/css/style.css', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ ), false, '1.0.0');
        }
    }

    /**
     * Create AE Admin Customizer Menu
     * @author Allan Empalmado (AppDevPH)
     * @since : 1.0.0
     */
    public function ae_admin_customizer_setting_page_create()
    {
        add_menu_page( 'AE Admin Customizer', 'AE Admin Customizer', 'manage_options', 'ae-admin-customizer', array($this, 'ae_admin_customizer_setting_page_render'), plugins_url('/assets/image/icon.png', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ ) ,50.45 );
    }

    /**
     * Render AE Admin Customizer Page
     * @author Allan Empalmado (AppDevPH)
     * @since : 1.0.0
     */
    public function ae_admin_customizer_setting_page_render()
    {
        if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        }

        $ae_color_options = ( isset( $_GET['tab'] ) && 'admin-panel-styling' === $_GET['tab'] ) ? true : false;
        $ae_logreg_options = ( isset( $_GET['tab'] ) && 'login-registration-styling' === $_GET['tab'] ) ? true : false; 
        $ae_custom_css_options = ( isset( $_GET['tab'] ) && 'custom-css' === $_GET['tab'] ) ? true : false; 

        $import_export_tab = ( isset( $_GET['tab'] ) && 'import-export' === $_GET['tab'] ) ? true : false;
        $support_tab = ( isset( $_GET['tab'] ) && 'support' === $_GET['tab'] ) ? true : false; 
        ?>
        <div class="wrap ae-admin-customizer-general-settings-wrapper">
            <div class="wrap-content-main ae-table-cell">
                <h1>AE Admin Customizer</h1>
                <?php settings_errors(); ?>
                
                <h2 class="nav-tab-wrapper">
                <a href="<?php echo AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE; ?>" class="nav-tab<?php if ( ! isset( $_GET['tab'] ) || isset( $_GET['tab'] ) && 'admin-panel-styling' != $_GET['tab']  && 'login-registration-styling' != $_GET['tab']  && 'custom-css' != $_GET['tab'] )   echo ' nav-tab-active'; ?>"><?php esc_html_e( 'General', 'ae-admin-customizer' ); ?></a>
                <a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'admin-panel-styling' ), AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE ) ); ?>" class="nav-tab<?php if ( $ae_color_options ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Admin Panel Styling', 'ae-admin-customizer' ); ?></a> 
                <a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'login-registration-styling' ), AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE ) ); ?>" class="nav-tab<?php if ( $ae_logreg_options ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Login & Registration Styling', 'ae-admin-customizer' ); ?></a>        
                <a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'custom-css' ), AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE ) ); ?>" class="nav-tab<?php if ( $ae_custom_css_options ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Custom CSS', 'ae-admin-customizer' ); ?></a>   
                <a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'import-export' ), AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE ) ); ?>" class="nav-tab<?php if ( $import_export_tab ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Import / Export', 'ae-admin-customizer' ); ?></a>   
                <a href="<?php echo esc_url( add_query_arg( array( 'tab' => 'support' ), AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE ) ); ?>" class="nav-tab<?php if ( $support_tab ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Support', 'ae-admin-customizer' ); ?></a>   
            </h2>
                <?php
                if($ae_color_options){
                    ?><form method="post" action="options.php"><?php
                    AE_Admin_Panel_Styling::render_setting_page();
                    ?></form><?php
                }else if( $ae_logreg_options ){
                    ?><form method="post" action="options.php"><?php
                    AE_Admin_Login_Registration_Styling::render_setting_page();
                    ?></form><?php
                }else if ( $ae_custom_css_options ){
                    ?><form method="post" action="options.php"><?php
                    AE_Admin_Custom_Css::render_setting_page();
                    ?></form><?php
                }else if ( $support_tab ){
                    self::ae_admin_support_us_tab();
                }else if ( $import_export_tab ){
                    self::ae_admin_import_export();
                }else {
                    ?><form method="post" action="options.php"><?php
                    AE_Admin_General_Settings::render_setting_page();
                    ?></form><?php
                }

                ?>
               
            </div>         
        </div>
        <?php
    }

    /**
     * Support Tab
     * @author Allan Empalmado (AppDevPH)
     * @since : 1.0.2
     */
    public function ae_admin_support_us_tab(){
        ?>
            <div class="ae-admin-customizer-info-box">
                <div class="ae-admin-customizer-heading">
                    <h1><?php echo __("Do you like AE Admin Customizer?", "ae-admin-customizer"); ?></h1>
                </div>
                <h3><?php echo __("Support us by rating our plugin.", "ae-admin-customizer"); ?></h3>
                <p><?php echo __("Rate AE Admin Customizer:", "ae-admin-customizer"); ?> 
                    <a href="https://wordpress.org/support/plugin/ae-admin-customizer/reviews?rate=5#new-post" target="_blank" class="ae-rate-us">
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-filled"></span>
                        <span class="dashicons dashicons-star-half"></span>
                    </a>
                </p>
                <h3><?php echo __("Comments / Suggestion / Technical Support", "ae-admin-customizer"); ?></h3>
                <?php echo __("Visit our ", "ae-admin-customizer") ?> <a href="https://wordpress.org/support/plugin/ae-admin-customizer" target="_blank"><?php echo __("Support Forum", "ae-admin-customizer") ?></a> <?php echo __("or reach us through our facebook page", "ae-admin-customizer") ?> <a href="https://www.facebook.com/appdevph/" target="_blank">@AppDevPh</a> <?php echo __("or directly using facebook", "ae-admin-customizer") ?> <a href="https://www.messenger.com/t/appdevph" target="_blank"><?php echo __("Messenger", "ae-admin-customizer") ?></a>
                <h3><?php echo __("Localization", "ae-admin-customizer"); ?></h3>
                <p><?php echo __("For translators who wants to add new language to AE Admin Customizer contribute via", "ae-admin-customizer") ?> <a href="https://translate.wordpress.org/projects/wp-plugins/ae-admin-customizer" target="_blank"><?php echo __("translate.wordpress.org", "ae-admin-customizer") ?></a></p>
                <h3><?php echo __("Premium Version", "ae-admin-customizer"); ?></h3>
                <p><?php echo __("- Coming Soon - . The premium version will let you customize everything in the admin dashboard, login and registration pages. You will also be able to select pre-made templates to easily apply it to your own.", "ae-admin-customizer"); ?></p>
                <h3><?php echo __("Donations", "ae-admin-customizer"); ?></h3>
                <p><?php echo __("If you want to support the plugin development through donation you can, it will keep us motivated in developing amazing plugins and improving AE Admin Customizer even more.", "ae-admin-customizer"); ?></p>
                <p><a href="https://www.paypal.me/allanempalmado" target="_blank"><?php echo __("Click Here to Donate", "ae-admin-customizer"); ?></a></p>
                <p><?php echo __("AE Admin Customizer is powered by", "ae-admin-customizer"); ?> <a href="https://www.facebook.com/appdevph/" target="_blank"><img src="<?php echo plugins_url('/assets/image/appdevph-logo.png', AE_ADMIN_CUSTOMIZER_PLUGIN__FILE__ ) ?>" class="logo-poweredby blink-image"></a></p>
            </div>
        <?php
    }

    /**
     * Import Export Tab
     * @author Allan Empalmado (AppDevPH)
     * @since : 1.0.4
     */
    public function ae_admin_import_export(){
            if(isset($_POST["action"]) && $_POST["action"] == "import"){
                $b_url = "admin.php?page=ae-admin-customizer&tab=import-export";

                try{
                    $array = json_decode(stripslashes($_POST["import-setting"]), true);
                    if(count($array) > 0){
                        if(isset($array["general"])){
                            update_option("ae_admin_customizer_options", $array["general"]);
                        }

                        if(isset($array["admin_panel"])){
                            update_option("ae_admin_customizer_color_options", $array["admin_panel"]);   
                        }

                        if(isset($array["login_registration"])){
                            update_option("ae_admin_customizer_logreg_options", $array["login_registration"]);   
                        }

                        if(isset($array["custom_css"])){
                            update_option("ae_admin_customizer_custom_css", $array["custom_css"]);   
                        }
                       
                        wp_safe_redirect( admin_url( $b_url . "&r=success&msg=" . urlencode(__("Settings has been imported successfully!", "ae-admin-customizer")) ) );
                        die();
                    }else{

                        wp_safe_redirect( admin_url( $b_url . "&r=invalid&msg=" . urlencode(__("No data or invalid data to import!", "ae-admin-customizer")) ) );
                    }
                }catch(Exception $e){
                    wp_safe_redirect( admin_url( $b_url . "&r=error&msg=" . urlencode($e->getMessage()) ) );
                }
            }

            if(isset($_GET["r"]) && !empty($_GET["r"])){
                switch($_GET["r"]){
                    case "success":
                    ?>
                    <div class="notice-success notice is-dismissible"> 
                        <p><strong><?php echo esc_html($_GET["msg"]) ?></strong></p>
                        <button type="button" class="notice-dismiss"></button>
                    </div>
                    <?php
                    break;
                    case "invalid":
                    ?>
                    <div class="notice-error notice is-dismissible"> 
                        <p><strong><?php echo esc_html($_GET["msg"]) ?></strong></p>
                        <button type="button" class="notice-dismiss"></button>
                    </div>
                    <?php
                    break;
                    case "error":
                    ?>
                    <div class="notice-error notice is-dismissible"> 
                        <p><strong><?php echo esc_html($_GET["msg"]) ?></strong></p>
                        <button type="button" class="notice-dismiss"></button>
                    </div>
                    <?php
                    break;
                }
            } 
        ?>

            <div class="wrap">
                <form method="post" action="<?php echo esc_url( add_query_arg( array( 'tab' => 'import-export' ), AE_ADMIN_CUSTOMIZER_PLUGIN_PAGE ) ); ?>">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php echo __("Import AE Admin Customizer Settings", "ae-admin-customizer"); ?>
                            <div class="ae-warning-info">
                            <?php echo __("Warning! Importing new settings will overwrite your current AE Admin Customizer configuration on this website. Make sure that you know what you're doing before clicking the Import button.", "ae-admin-customizer"); ?>
                            </div>
                            </th>
                            <td>
                                <input type="hidden" value="import" name="action">
                                <textarea id="ae-admin-import" name="import-setting" class="textarea widefat" rows="12" placeholder="Paste your AE Admin Customizer settings to be imported here."></textarea><br /><button class="button button-primary" id="ae-admin-import" type="submit"><?php echo __("Import Setting", "ae-admin-export"); ?></button>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                    $general            =  get_option( 'ae_admin_customizer_options' );
                    $admin_panel        =  get_option( 'ae_admin_customizer_color_options' );
                    $login_registration =  get_option( 'ae_admin_customizer_logreg_options' );
                    $custom_css         =  get_option( 'ae_admin_customizer_custom_css' );

                    unset($general["ae_admin_dashboard_logo"]); //removes logo
                    unset($login_registration["ae_logreg_image_background"]); //removes bg image

                    $out_setting = array(
                            "general"               => $general,
                            "admin_panel"           => $admin_panel,
                            "login_registration"    => $login_registration,
                            "custom_css"            => $custom_css
                        );
                ?>
                <form method="post">
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php echo __("Export Setting", "ae-admin-customizer"); ?><br /><small><?php echo __("Note: Images like logo and background image are not included on the generated export data. You will need to manually set it after importing the setting to a new website.", "ae-admin-customizer") ?></small></th>
                            <td>
                                <textarea id="ae-admin-export" name="export-setting" class="textarea widefat" rows="12"><?php echo( wp_json_encode($out_setting )); ?></textarea><br /><button class="button button-primary" id="ae-admin-btn-export" type="button"><?php echo __("Copy To Clipboard", "ae-admin-customizer") ?></button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        <?php
    }
}

new AE_Admin_Customizer_Settings();