<?php
namespace Admintosh\Inc;
 /**
  * 
  * @package    Admintosh
  * @version    1.0.0
  * @author     wpmobo
  * @Websites: http://wpmobo.com
  *
  */
 
 class Login_Page_Customize
{

    /**
     * Start up
     */
    public function __construct()
    {
        
        $admintoshrev_options = get_option( ADMINTOSH_OPTION_NAME );
        add_action( 'login_enqueue_scripts', [ $this, 'login_page_style' ] );
        add_filter( 'login_headertext', [ $this, 'login_page_header_title' ] );
        add_filter( 'logo_headerurl', [ $this, 'custom_logo_url' ] );
    }

    public function login_page_style() {
        $opt = get_option(ADMINTOSH_OPTION_NAME);

        // Page 
        $bodyBgImg = !empty( $opt['login_page_bg_img'] ) ? 'background-image: url('.esc_url( $opt['login_page_bg_img'] ).');background-repeat: no-repeat;background-size: cover;background-position: center center;' : '';
        $bodyBgColor = !empty( $opt['login_page_bg_color'] ) ? 'background-color: '.esc_attr( $opt['login_page_bg_color'] ).';' : '';
        $bodyTextColor = !empty( $opt['login_page_text_color'] ) ? 'color:'.esc_attr( $opt['login_page_text_color'] ).';' : '';
        $bodyLinkColor = !empty( $opt['login_page_link_color'] ) ? 'color:'.esc_attr( $opt['login_page_link_color'] ).' !important;' : '';
        $bodyLinkHoverColor = !empty( $opt['login_page_link_hover_color'] ) ? 'color:'.$opt['login_page_link_hover_color'].' !important;' : '';
        $logo       = !empty( $opt['login_page_logo'] ) ? 'background-image: url('.esc_url( $opt['login_page_logo'] ).');' : '';
        $logoWidth       = !empty( $opt['logo_width'] ) ?  'width:'.esc_attr( $opt['logo_width'] ).'px;' : '';
        $logoHeight      = !empty( $opt['logo_height'] ) ? 'height:'.esc_attr( $opt['logo_height'] ).'px;' : '';
        $logoSize        = !empty( $opt['logo_size'] ) ? 'background-size: '.esc_attr( $opt['logo_size'] ).'px;' : '';
        $logoMarginBottom = !empty( $opt['logo_margin_bottom'] ) ? 'margin-bottom: '.esc_attr( $opt['logo_margin_bottom'] ).'px;' : '';
        // Form
        $formBgImg    = !empty( $opt['login_form_bg_img'] ) ? 'background-image: url('.esc_url( $opt['login_form_bg_img'] ).');background-repeat: no-repeat;background-size: cover;background-position: center center;' : '';
        $formBgColor  = !empty( $opt['login_form_bg_color'] ) ? 'background-color:'.esc_attr( $opt['login_form_bg_color'] ).' !important;' : '';
        $formTextColor  = !empty( $opt['login_form_text_color'] ) ? 'color:'.esc_attr( $opt['login_form_text_color'] ).';' : '';

        $formBorder  = !empty( $opt['login_form_border'] ) && $opt['login_form_border']['style'] != 'none' ? 'border: '.esc_attr( $opt['login_form_border']['width'] ).'px '.esc_attr( $opt['login_form_border']['style'] ).' '.esc_attr( $opt['login_form_border']['color'] ).'!important;' : '';

        $formBorderRadius  = !empty( $opt['login_form_border_radius'] ) ? 'border-radius:'.esc_attr( $opt['login_form_border_radius'] ).'px;' : '';

        
        // Input field
        $inputBgColor  = !empty( $opt['input_field_bg_color'] ) ? 'background:'.esc_attr( $opt['input_field_bg_color'] ).' !important;' : '';
        $inputTextColor  = !empty( $opt['input_field_text_color'] ) ? 'color:'.esc_attr( $opt['input_field_text_color'] ).' !important;' : '';
        $inputBorder  = !empty( $opt['input_field_border'] ) && $opt['input_field_border']['style'] != 'none' ? 'border: '.esc_attr( $opt['input_field_border']['width'] ).'px '.esc_attr( $opt['input_field_border']['style'] ).' '.esc_attr( $opt['input_field_border']['color'] ).'!important;' : '';
        // Button
        $buttonBgColor  = !empty( $opt['btn_bg_color'] ) ? 'background:'.esc_attr( $opt['btn_bg_color'] ).' !important;' : '';
        $buttonTextColor  = !empty( $opt['btn_text_color'] ) ? 'color:'.esc_attr( $opt['btn_text_color'] ).' !important;' : '';

        $buttonBorder  = !empty( $opt['btn_border'] ) && $opt['btn_border']['style'] != 'none' ? 'border: '.esc_attr( $opt['btn_border']['width'] ).'px '.esc_attr( $opt['btn_border']['style'] ).' '.esc_attr( $opt['btn_border']['color'] ).'!important;' : '';

        $buttonHoverBgColor  = !empty( $opt['btn_hover_bg_color'] ) ? 'background:'.esc_attr( $opt['btn_hover_bg_color'] ).' !important;' : '';
        $buttonHoverTextColor  = !empty( $opt['btn_hover_text_color'] ) ? 'color:'.esc_attr( $opt['btn_hover_text_color'] ).' !important;' : '';
        $buttonHoverBorderColor  = !empty( $opt['btn_hover_border_color'] ) ? 'border-color:'.esc_attr( $opt['btn_hover_border_color'] ).'!important;' : '';
    ?>
    <style type="text/css">
        #login h1 a {
            <?php echo esc_attr( $logo.$logoWidth.$logoHeight.$logoSize.$logoMarginBottom ); ?>
        }
        /** Login page body style ***/
        body.login  {
            <?php echo esc_attr( $bodyBgImg.$bodyBgColor.$bodyTextColor ); ?>            
        }
        body.login a {
            <?php echo esc_attr( $bodyLinkColor ); ?>
        }
        body.login a:hover {
            <?php echo esc_attr( $bodyLinkHoverColor ); ?>
        }
        /** Login Form style ***/
        .login form {
            <?php 
            echo esc_attr( $formBgImg.$formBgColor.$formTextColor.$formBorder.$formBorderRadius );
            ?>
        }
        /*** Login Form input field ****/
        .login form .input, 
        .login form input[type=checkbox], 
        .login input[type=text] {
            <?php 
            echo esc_attr( $inputBgColor.$inputTextColor.$inputBorder );
            ?>
        }
        .login .button-primary {
            <?php 
            echo esc_attr( $buttonBgColor.$buttonTextColor.$buttonBorder );
            ?>
        }
        .login .button-primary:hover {
            <?php 
            echo esc_attr( $buttonHoverBgColor.$buttonHoverTextColor.$buttonHoverBorderColor );
            ?>
        }
        .login .button-primary,
        .login form .forgetmenot {
            float: none !important;
        }
   </style>
    <?php }



    public function custom_logo_url() {
        // home_url();
        return admin_url();
    }


    public function login_page_header_title() {
        $opt = get_option( ADMINTOSH_OPTION_NAME );
        return !empty( $opt['login_page_site_name'] ) ? esc_html( $opt['login_page_site_name'] ) : '';
    }

	
}



  