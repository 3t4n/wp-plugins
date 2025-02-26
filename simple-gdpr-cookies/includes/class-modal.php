<?php

namespace Smeechos\Simple_GDPR_Cookies\Includes;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Modal
{
    private $content, $modal;

    /**
     * Modal constructor.
     */
    public function __construct()
    {
        $this->content = get_option( 'simple_gdpr_cookies_content_settings' );
        $this->modal = get_option( 'simple_gdpr_cookies_modal_settings' );

        // Actions
        if ( isset($_COOKIE['sgc_user_consent']) === false ) {
            add_action( 'wp_footer', array( $this, 'display_modal') );
        }
    }

    /**
     * Display the modal.
     */
    public function display_modal() {

        $user_default_consent = isset($this->content['user_consent']) === false || ( isset($this->content['user_consent']) && $this->content['user_consent'] == '0' );

        $html =     '<div id="simple-gdpr-cookies-banner">';

        if ( $user_default_consent ) {
            $class = 'simple-gdpr-cookies-full-width';
        } else {
            $class = 'simple-gdpr-cookies-flex-width';
        }
        $html .= '<div id="simple-gdpr-cookies-body" class="' . $class . '">';

        if ( isset($this->content['heading_text']) && $this->content['heading_display'] == 1 ) {
            $html .= '<h4>' . $this->content['heading_text'] . '</h4>';
        }

        if ( isset($this->content['body_text']) ) {
            $html .= $this->content['body_text'];
        }

        $html .= '</div>';

        if ( $user_default_consent ) {
            $html .= '<div id="simple-gdpr-cookies-close"><a href="#">&#10005;</a></div>';
        } else {
            if ( isset($this->content['accept_button']['text']) && isset($this->content['decline_button']['text']) ) {
                $html .= '<div id="simple-gdpr-cookies-buttons">
                        <button id="simple-gdpr-cookies-accept" type="button" data-simple-gdpr-cookies="true">' . $this->content['accept_button']['text'] . '</button>
                        <button id="simple-gdpr-cookies-decline" type="button" data-simple-gdpr-cookies="false">' . $this->content['decline_button']['text'] . '</button>
                      </div>';
            }
        }

        $html .=    '</div>';

        echo $html;

        $this->display_styles();
    }

    /**
     * Output embedded stylesheet from admin selections.
     */
    public function display_styles()
    {
        $style = '
        <style>
        #simple-gdpr-cookies-banner {
            background-color: ' . $this->modal['background_color'] .';
            color: ' . $this->content['text_color'] .';
        }
        
        #simple-gdpr-cookies-accept {
            background-color: ' . $this->content['accept_button']['back_color'] . ';
            color: ' . $this->content['accept_button']['text_color'] . ';
        }
        
        #simple-gdpr-cookies-accept:hover,
        #simple-gdpr-cookies-accept:focus {
            background-color: ' . $this->content['accept_button']['hover_back'] . ';
            color: ' . $this->content['accept_button']['hover_text'] . ';
        }
        
        #simple-gdpr-cookies-decline {
            background-color: ' . $this->content['decline_button']['back_color'] . ';
            color: ' . $this->content['decline_button']['text_color'] . ';
        }
        
        #simple-gdpr-cookies-decline:hover,
        #simple-gdpr-cookies-decline:focus {
            background-color: ' . $this->content['decline_button']['hover_back'] . ';
            color: ' . $this->content['decline_button']['hover_text'] . ';
        }
        
        #simple-gdpr-cookies-close a {
            color: ' . $this->content['close_button_color'] . ';
        }
        
        #simple-gdpr-cookies-close a:hover,
        #simple-gdpr-cookies-close a:focus {
            color: ' . $this->content['close_button_hover'] . ';
        }';

        if ( $this->modal['background_opacity'] == '1' ) {
            $style .= '
            #simple-gdpr-cookies-banner {
                opacity: 0.9;
            }
            ';
        }

        $style .= '</style>';

        echo $style;
    }
}

new Modal();