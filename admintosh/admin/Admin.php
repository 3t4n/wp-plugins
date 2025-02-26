<?php
namespace Admintosh\Admin;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Admin
{
    use Text;
    use Color;
    use Media;
    use Switcher;
    use Heading;
    use Dimension;
    use Number;
    use Border;
    use Select;
    use Image_Radio_Button;
    use Multi_Select;

    /**
     * Start up
     */
    public function __construct()
    {
        
        $admintoshrev_options = get_option( ADMINTOSH_OPTION_NAME );
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        // Init
        new Admin_Hooks();
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
		add_menu_page(
			esc_html__( 'Admintosh', 'admintosh' ),
			esc_html__( 'Admintosh Settings', 'admintosh' ),
			'manage_options',
			'admintosh-setting-admin',
			array( $this, 'create_admin_page' ),
			'dashicons-superhero',
			6
		);

    }

	
    function page_init() {
        //register our settings
        register_setting( 'admintosh-settings-group', ADMINTOSH_OPTION_NAME );
    }


    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // add error/update messages

        // check if the user have submitted the settings
        if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'admintosh_messages', 'admintosh_message', esc_html__( 'Settings Saved', 'admintosh' ), 'updated' );
        }
        // show error/update messages
        settings_errors( 'admintosh_messages' );
        ?>
        <div class="admintosh-admin-wrap">

            <ul class="settings-menu">
                <?php
                echo '<h2>'.esc_html__( 'Admintosh', 'admintosh' ).'</h2>';
                $tabs = [
                    'admin_modules' => [
                        'li_class' => 'active',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'admin_modules',
                        'title' => esc_html__( 'Modules', 'admintosh' )
                    ],
                    'admin_general' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'admin_general',
                        'title' => esc_html__( 'General Settings', 'admintosh' )
                    ],
                    'dash_color_schemes' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'dash_color_schemes',
                        'title' => esc_html__( 'Dashboard Color Schemes', 'admintosh' )
                    ],
                    'login_page_customize' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'login_page_customize',
                        'title' => esc_html__( 'Login Page Customize', 'admintosh' )
                    ],
                    'login_recaptcha' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'login_recaptcha',
                        'title' => esc_html__( 'Login reCAPTCHA', 'admintosh' )
                    ],
                    'login_attempts' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'login_attempts',
                        'title' => esc_html__( 'Login Attempts', 'admintosh' )
                    ],
                    'hide_login' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'hide_login',
                        'title' => esc_html__( 'Hide Login', 'admintosh' )
                    ],
                    'country_restriction' => [
                        'li_class' => '',
                        'anc_class' => 'admintosh-tab',
                        'data_attr' => 'country_restriction',
                        'title' => esc_html__( 'Country Restriction', 'admintosh' )
                    ],
                    
                ];
                $tabs = apply_filters( 'admintosh_admin_tabs', $tabs );
                foreach( $tabs as $key => $tab ) {
                    echo '<li class="'.esc_attr( $tab['li_class'] ).'"><a href="#'.esc_attr( $key ).'" data-tab-select="'.esc_attr( $tab['data_attr'] ).'" class="'.esc_attr( $tab['anc_class'] ).'">'.esc_html( $tab['title'] ).'</a></li>';
                }
                ?>
			</ul>
			<?php
            $admintoshrev_options = get_option( ADMINTOSH_OPTION_NAME );
			?>
            <form class="admin-admintosh" method="post" action="options.php">
			    <?php settings_fields( 'admintosh-settings-group' ); ?>
                <?php do_settings_sections( 'admintosh-settings-group' ); ?>

                <!-- admin modules -->
                <div id="admin_modules" class="admintosh-tab-content-wrap admintosh-admin-modules admintosh-active">
                    <div class="admin-general-top-area">
                        <div class="help-links">
                            <a target="_blank" href="https://wpmobo.com/admintosh-wordpress-admin-customization-and-security-plugin/"><?php esc_html_e( 'Live Demo', 'admintosh' ); ?></a>
                            <a target="_blank" href="https://wpmobo.com/admintosh/documentation/"><?php esc_html_e( 'Documentation', 'admintosh' ); ?></a>
                        </div>
                        <?php
                        //
                        $this->switcher_field([
                            'title' => esc_html__( 'Dashboard Design Customization', 'admintosh' ),
                            'name' => 'active_login_dashboard_customiz',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Login Page Customization', 'admintosh' ),
                            'name' => 'active_login_page_customiz',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Active Captcha', 'admintosh' ),
                            'name' => 'active_captcha',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Login Attempts', 'admintosh' ),
                            'name' => 'active_login_attempts',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Hide Login', 'admintosh' ),
                            'name' => 'active_hide_login',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Login History', 'admintosh' ),
                            'name' => 'active_login_history',
                        ]);

                        $this->switcher_field([
                            'title' => esc_html__( 'Country Restriction', 'admintosh' ),
                            'name' => 'active_country_restriction',
                        ]);
                    ?>
                    </div>
                </div>
                <!-- admin general -->
                <div id="admin_general" class="admintosh-tab-content-wrap admintosh-admin-general admintosh-active">
                    <div class="admin-general-top-area">
                        
                        <?php
                        //
                        $this->switcher_field([
                            'title' => esc_html__( 'Hide WordPress Version', 'admintosh' ),
                            'name' => 'hide_wp_version',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Disable File Editing', 'admintosh' ),
                            'name' => 'disable_file_editing',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Disable XML-RPC', 'admintosh' ),
                            'name' => 'disable_xml_rpc',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Disable Right Click', 'admintosh' ),
                            'name' => 'disable_right_click',
                        ]);
                        $this->switcher_field([
                            'title' => esc_html__( 'Disable Login Hints Error Messages', 'admintosh' ),
                            'name' => 'disable_login_hint_msg',
                        ]);
                        
                        
                        ?>
                    </div>
                </div>
                <!-- admin dashboard style -->
                <div id="dash_color_schemes" class="admintosh-tab-content-wrap admintosh-dash-color-schemes admintosh-hide">
                    <div class="inner-tab">
                        <ul>
                            <li><a href="#admin_topbar_tab" class="admintosh-inner-tab inner-tab-active"><?php esc_html_e( 'Admin Top Bar', 'admintosh' ); ?></a></li>
                            <li><a href="#adminmenu_tab" class="admintosh-inner-tab"><?php esc_html_e( 'Admin Menu', 'admintosh' ); ?></a></li>

                        </ul>
                    </div>
                    <div id="admin_topbar_tab" class="settings-area admintosh-inner-active">
                        <?php 
                        // Top Bar
                        $this->image_radio_field([
                            'title' => esc_html__( 'Color Preset', 'admintosh' ),
                            'name' => 'adminbar_color_scheme',
                            'options' => [
                                'color-1' => ADMINTOSH_DIR_URL.'admin/assets/img/color-1.png',
                                'color-2' => ADMINTOSH_DIR_URL.'admin/assets/img/color-2.png',
                                'color-3' => ADMINTOSH_DIR_URL.'admin/assets/img/color-3.png',
                                'color-4' => ADMINTOSH_DIR_URL.'admin/assets/img/color-4.png'
                            ]
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Top Bar Background Color', 'admintosh' ),
                            'name' => 'adminbar_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Top Bar Text Color', 'admintosh' ),
                            'name' => 'adminbar_text_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Top Bar Link Color', 'admintosh' ),
                            'name' => 'adminbar_link_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Top Bar Link Hover Background Color', 'admintosh' ),
                            'name' => 'adminbar_link_hv_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Top Bar Link Hover Color', 'admintosh' ),
                            'name' => 'adminbar_link_hv_color',
                        ]);
                        $this->media_field([
                            'title' => esc_html__( 'Admin Top bar Logo', 'admintosh' ),
                            'name' => 'top_bar_logo',
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Logo Width', 'admintosh' ),
                            'name' => 'tb_logo_width',
                            'placeholder' => '100'
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Logo Height', 'admintosh' ),
                            'name' => 'tb_logo_height',
                            'placeholder' => '32'
                        ]);
                        $this->dimension_field([
                            'title' => esc_html__( 'Logo Margin', 'admintosh' ),
                            'name' => 'tb_logo_margin',
                        ]);
                        
                        ?>
                    </div>
                    <div id="adminmenu_tab" class="shortcode-area admintosh-hide">
                        <?php
                        // Admin Menu
                        $this->image_radio_field([
                            'title' => esc_html__( 'Color Preset', 'admintosh' ),
                            'name' => 'admin_menu_color_scheme',
                            'options' => [
                                'color-1' => ADMINTOSH_DIR_URL.'admin/assets/img/color-1.png',
                                'color-2' => ADMINTOSH_DIR_URL.'admin/assets/img/color-2.png',
                                'color-3' => ADMINTOSH_DIR_URL.'admin/assets/img/color-3.png',
                                'color-4' => ADMINTOSH_DIR_URL.'admin/assets/img/color-4.png'
                            ]
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Background Color', 'admintosh' ),
                            'name' => 'admin_menu_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Menu Hover Background Color', 'admintosh' ),
                            'name' => 'admin_menu_hov_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Menu Link Color', 'admintosh' ),
                            'name' => 'admin_menu_text_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Menu Hover Link Color', 'admintosh' ),
                            'name' => 'admin_menu_hov_link_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Sub Menu Background Color', 'admintosh' ),
                            'name' => 'admin_menu_sub_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Admin Sub Menu Link Color', 'admintosh' ),
                            'name' => 'admin_menu_sub_link_color',
                        ]);
                        ?>
                    </div>
                </div>

                <!-- login page customize -->
                <div id="login_page_customize" class="admintosh-tab-content-wrap admintosh-login-page-customize admintosh-hide">

                    <div class="inner-tab">
                        <ul>
                            <li><a href="#login_page_tab" class="admintosh-inner-tab inner-tab-active"><?php esc_html_e( 'Login Page Style', 'admintosh' ); ?></a></li>
                            <li><a href="#login_page_form_tab" class="admintosh-inner-tab"><?php esc_html_e( 'Login Form Style', 'admintosh' ); ?></a></li>
                        </ul>
                    </div>

                    <div id="login_page_tab" class="settings-area admintosh-inner-active">
                        <?php
                        $this->image_radio_field([
                            'title' => esc_html__( 'Color Preset', 'admintosh' ),
                            'name' => 'login_page_color_scheme',
                            'options' => [
                                'color-1' => ADMINTOSH_DIR_URL.'admin/assets/img/color-1.png',
                                'color-2' => ADMINTOSH_DIR_URL.'admin/assets/img/color-2.png',
                                'color-3' => ADMINTOSH_DIR_URL.'admin/assets/img/color-3.png',
                                'color-4' => ADMINTOSH_DIR_URL.'admin/assets/img/color-4.png'
                            ]
                        ]);
                        $this->color_field([
                        'title' => esc_html__( 'Background Color', 'admintosh' ),
                        'name' => 'login_page_bg_color',
                        ]);

                        $this->media_field([
                            'title' => esc_html__( 'Background Image', 'admintosh' ),
                            'name' => 'login_page_bg_img',
                        ]);
                        $this->media_field([
                            'title' => esc_html__( 'Logo', 'admintosh' ),
                            'name' => 'login_page_logo',
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Logo Width', 'admintosh' ),
                            'name' => 'logo_width',
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Logo Height', 'admintosh' ),
                            'name' => 'logo_height',
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Logo Size', 'admintosh' ),
                            'name' => 'logo_size',
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Logo/Site Name Margin Bottom', 'admintosh' ),
                            'name' => 'logo_margin_bottom',
                        ]);
                        $this->text_field([
                            'title' => esc_html__( 'Site Name', 'admintosh' ),
                            'name' => 'login_page_site_name',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Text Color', 'admintosh' ),
                            'name' => 'login_page_text_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Link Color', 'admintosh' ),
                            'name' => 'login_page_link_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Link Hover Color', 'admintosh' ),
                            'name' => 'login_page_link_hover_color',
                        ]);
                        ?>
                    </div>

                    <div id="login_page_form_tab" class="shortcode-area admintosh-hide">
                        <?php 
                        // Login form style
                        $this->image_radio_field([
                            'title' => esc_html__( 'Color Preset', 'admintosh' ),
                            'name' => 'login_form_color_scheme',
                            'options' => [
                                'color-1' => ADMINTOSH_DIR_URL.'admin/assets/img/color-1.png',
                                'color-2' => ADMINTOSH_DIR_URL.'admin/assets/img/color-2.png',
                                'color-3' => ADMINTOSH_DIR_URL.'admin/assets/img/color-3.png',
                                'color-4' => ADMINTOSH_DIR_URL.'admin/assets/img/color-4.png'
                            ]
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Login Form Background Color', 'admintosh' ),
                            'name' => 'login_form_bg_color',
                        ]);
                        $this->media_field([
                            'title' => esc_html__( 'Login Form Background Image', 'admintosh' ),
                            'name' => 'login_form_bg_img',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Text Color', 'admintosh' ),
                            'name' => 'login_form_text_color',
                        ]);
                        $this->border_field([
                            'title' => esc_html__( 'Border', 'admintosh' ),
                            'name' => 'login_form_border',
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Border Radius', 'admintosh' ),
                            'name' => 'login_form_border_radius',
                        ]);
                        // Input field
                        $this->heading_field([
                            'title' => esc_html__( 'Input Fields Style', 'admintosh' ),
                            'name' => 'input_field_heading',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Input Field Background Color', 'admintosh' ),
                            'name' => 'input_field_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Input Field Text Color', 'admintosh' ),
                            'name' => 'input_field_text_color',
                        ]);
                        $this->border_field([
                            'title' => esc_html__( 'Input Field Border', 'admintosh' ),
                            'name' => 'input_field_border',
                        ]);
                        $this->dimension_field([
                            'title' => esc_html__( 'Input Field Padding', 'admintosh' ),
                            'name' => 'input_field_padding',
                        ]);
                        // Button field
                        $this->dimension_field([
                            'title' => esc_html__( 'Login Button Padding', 'admintosh' ),
                            'name' => 'login_btn_padding',
                        ]);
                        $this->dimension_field([
                            'title' => esc_html__( 'Login Button Margin', 'admintosh' ),
                            'name' => 'login_btn_margin',
                        ]);
                        $this->heading_field([
                            'title' => esc_html__( 'Form Button Style', 'admintosh' ),
                            'name' => 'form_button_heading',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Button Background Color', 'admintosh' ),
                            'name' => 'btn_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Button Text Color', 'admintosh' ),
                            'name' => 'btn_text_color',
                        ]);
                        $this->border_field([
                            'title' => esc_html__( 'Button Border Color', 'admintosh' ),
                            'name' => 'btn_border',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Button Hover Background Color', 'admintosh' ),
                            'name' => 'btn_hover_bg_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Button Hover Text Color', 'admintosh' ),
                            'name' => 'btn_hover_text_color',
                        ]);
                        $this->color_field([
                            'title' => esc_html__( 'Button Hover Border Color', 'admintosh' ),
                            'name' => 'btn_hover_border_color',
                        ]);
                        
                        ?>
                    </div>
                </div>
                <!--- Login recaptcha  --->
                <div id="login_recaptcha" class="admintosh-login-page-recaptcha admintosh-hide">
                    
                    <?php
                        //
                        $this->switcher_field([
                            'title' => esc_html__( 'Active Login Captcha', 'admintosh' ),
                            'name' => 'active_login_captcha',
                        ]);
                        $this->select_field([
                            'title' => esc_html__( 'Captcha Type', 'admintosh' ),
                            'name' => 'captcha_type',
                            'options' => [
                                'google_captcha' => esc_html__( 'Google reCAPTCHA', 'admintosh' ),
                                'addition_captcha' => esc_html__( 'Addition Captcha', 'admintosh' ),
                                'random_number_captcha' => esc_html__( 'Random Number Captcha', 'admintosh' )
                            ]
                        ]);
                        $this->text_field([
                            'title' => esc_html__( 'Google reCAPTCHA Site Key', 'admintosh' ),
                            'name'  => 'grc_site_key',
                            'description' => sprintf( esc_html__( 'Register your site at Google reCAPTCHA Type V2 and %s Get V2 site Key and secret key %s', 'admintosh' ), '<a target="_blank" href="https://www.google.com/recaptcha/admin/create">', '</a>' ),
                            'condition'   => [ 'captcha_type' => ['google_captcha'] ]
                        ]);
                        $this->text_field([
                            'title' => esc_html__( 'Google reCAPTCHA Secret key', 'admintosh' ),
                            'name'  => 'grc_secret_key',
                            'description' => sprintf( esc_html__( 'Register your site at Google reCAPTCHA Type V2 and %s Get V2 site Key and secret key %s', 'admintosh' ), '<a target="_blank" href="https://www.google.com/recaptcha/admin/create">', '</a>' ),
                            'condition'   => [ 'captcha_type' => ['google_captcha'] ]
                        ]);
                    ?>

                </div>
                <!--- login attempts --->
                <div id="login_attempts" class="admintosh-login-attempts admintosh-hide">
                    <?php
                        //
                        $this->number_field([
                            'title' => esc_html__( 'Failed Login Limit', 'admintosh' ),
                            'name'  => 'ath_failed_login_limit',
                            'placeholder' => '3'
                        ]);
                        $this->number_field([
                            'title' => esc_html__( 'Lockout Duration', 'admintosh' ),
                            'description' => esc_html__( 'Duration In Minute', 'admintosh' ),
                            'name'  => 'ath_lockout_duration',
                            'placeholder' => '15'
                        ]);
                        
                    ?>

                </div>
                <!--- Hide login --->
                <div id="hide_login" class="admintosh-hide-login admintosh-hide">
                    <?php
                        //
                        $this->text_field([
                            'title' => esc_html__( 'New Login Slug', 'admintosh' ),
                            'name'  => 'login_slug',
                            'description' => esc_html__( 'Change the login URL to something other than "wp-admin" to protect your website. By customizing the login URL, you can prevent unauthorized access to the wp-login.php page and the wp-admin directory.', 'admintosh' ),
                            'placeholder' => 'E.g: login'
                        ]);
                        $this->text_field([
                            'title' => esc_html__( 'Redirection Page Slug', 'admintosh' ),
                            'description' => esc_html__( 'Redirect page slug when someone tries to access wp-admin and the wp-login.php page   directory while not logged in. Default 404 page', 'admintosh' ),
                            'name'  => 'redirection_page_slug',
                            'placeholder' => '404'
                        ]);
                        
                    ?>

                </div>
                <!--- Country Restriction --->
                <div id="country_restriction" class="admintosh-country-restriction admintosh-hide">
                    
                    <?php
                    echo '<h3 style="color:#ff0000;">'.esc_html__( 'PLEASE MAKE SURE THAT YOU CONFIGURE THE PLUGIN TO ALLOW YOUR OWN ACCESS.', 'admintosh' ).'</h3>';
                        //
                        $this->switcher_field([
                            'title' => esc_html__( 'Entire Site Country Restriction', 'admintosh' ),
                            'name' => 'active_entire_site_restriction',
                            'description' => esc_html__( 'Note: Please carefully, and make sure you select your country otherwise, you won\'t be able to access.', 'admintosh' )
                        ]);
                        //
                        $this->multi_select_field([
                            'title' => esc_html__( 'Entire Site Restriction Exclued Country', 'admintosh' ),
                            'name' => 'entire_site_exclued_country',
                            'condition' => [ 'active_entire_site_restriction' => [ 'on' ] ],
                            'options' => \Admintosh\Classes\Countries::getAllCountries(),
                            'description' => esc_html__( 'Block Entire Site for all countries except countries in selected', 'admintosh' )
                        ]);

                        //
                        $this->switcher_field([
                            'title' => esc_html__( 'Front-End Country Restriction', 'admintosh' ),
                            'name' => 'active_front_end_restriction',
                        ]);

                        //
                        $this->multi_select_field([
                            'title' => esc_html__( 'Front-End Restriction Exclued Country', 'admintosh' ),
                            'name' => 'front_end_exclued_country',
                            'condition' => [ 'active_front_end_restriction' => [ 'on' ] ],
                            'options' => \Admintosh\Classes\Countries::getAllCountries(),
                            'description' => esc_html__( 'Block Front-End for all countries except countries in selected', 'admintosh' )
                        ]);


                        //
                        $this->switcher_field([
                            'title' => esc_html__( 'wp-login page Country Restriction', 'admintosh' ),
                            'name' => 'active_wp_login_restriction',
                            'description' => esc_html__( 'Note: If you use Entire Site Restriction or Front-End Restriction you don\'t need this option.', 'admintosh' )
                        ]);

                        //
                        $this->multi_select_field([
                            'title' => esc_html__( 'wp-login page Restriction Exclued Country', 'admintosh' ),
                            'name' => 'wplogin_page_exclued_country',
                            'condition' => [ 'active_wp_login_restriction' => [ 'on' ] ],
                            'options' => \Admintosh\Classes\Countries::getAllCountries(),
                            'description' => esc_html__( 'Block wp-login page for all countries except countries in selected.', 'admintosh' )
                        ]);
                        $this->text_field([
                            'title' => esc_html__( 'Block Template Title', 'admintosh' ),
                            'name'  => 'block_temp_title',
                            'placeholder' => 'Sorry our services are not available in your country.'
                        ]);
                        $this->text_field([
                            'title' => esc_html__( 'Block Template description', 'admintosh' ),
                            'name'  => 'block_temp_description',
                            'placeholder' => 'description will go here.'
                        ]);
                                                
                    ?>

                </div>
                <?php 
                do_action( 'admintosh_admin_tab_content_block' );
                ?>
            <?php
            // Save Button                    
            submit_button(); 
            ?>
            </form>
        </div>
        <?php
    }
	
}



  