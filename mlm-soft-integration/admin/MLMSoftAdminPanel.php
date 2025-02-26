<?php

namespace MLMSoft\admin;

use MLMSoft\core\MLMSoftPlugin;

/**
 * @since 3.6.6
 */
use MLMSoft\integrations\woocommerce\WCIntegrationOptions;
use MLMSoft\core\MLMSoftOptions;

class MLMSoftAdminPanel
{
    /**
     * Nonce.
     * 
     * @since 3.6.6
     *
     * @var string
     */
    const NONCE_ACTION = 'mlmsoft-nonce';
    
    /**
     * @since 3.6.6
     *
     * @var string
     */
    const CHECKOUT_CSS_PAGE_SUFFIX = '_checkout_css';
    
    /**
     * @since 3.6.6
     *
     * @var string
     */
    const USE_CHECKOUT_CSS_ID = 'use-checkout-css';

    /**
     * @since 3.6.6
     *
     * @var string
     */
    const ACE_EDITOR_CONTENT_ID = 'ace-editor-css-content';

    /**
     * @since 3.7.0
     *
     * @var string
     */
    const ONLINE_OFFICE_PAGE_SUFFIX = '_online_office';

    /**
     * @since 3.7.0
     *
     * @var string
     */
    const USE_ONLINE_OFFICE_ID = 'use_online_office';
    
    /**
     * @since 3.7.0
     *
     * @var string
     */
    const ONLINE_OFFICE_AUTH_SECRET_KEY_ID = 'online_office_auth_secret_key';

    /**
     * @since 3.7.0
     *
     * @var string
     */    
    const ONLINE_OFFICE_MENU_TITLE_ID = 'online_office_menu_title';
    
    /**
     * @var MLMSoftAdminFrontend
     */
    private $frontend;

    public function __construct()
    {
        $this->frontend = MLMSoftAdminFrontend::getInstance();
        $this->registerHooks();
        $this->init();
    }

    private function init()
    {
        MLMSoftAdminApi::getInstance();
    }

    public function registerHooks()
    {
        /**
         * @since 3.6.6
         * @since 3.7.0 Rename callback function.
         */
        add_action('mlmsoft_admin_panel_register_pages', [$this, 'registerAdminPanelPages'], 5);
        
        /**
         * @since 3.6.6
         */
        add_action('admin_print_scripts', [$this, 'printScripts']); 
        
        /**
         * @since 3.8.2
         */
        add_action('admin_print_scripts', [$this, 'optionsPagePrintScripts']);
        
        /**
         * @since 3.6.6
         */        
        add_action('admin_init', [$this, 'checkFormSubmit']);
        
        //
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'registerPages']);
        
        /**
         * @since 3.8.0
         */
        add_action('admin_print_styles', [$this, 'printStyles']);        
    }

    /**
     * @since 3.8.0
     * @since 3.8.2 Added class `deprecated-api2`.
     */
    public function printStyles()
    {
        /**
         * Hide API2 related options.
         */
        if ( isset($_GET['page']) && MLMSoftPlugin::PLUGIN_PREFIX.'options_page' === $_GET['page'] ) {
            $key = 'woocommerce_admin_menu_styles';
            $styles  = '.deprecated-api2 .v-application--wrap .v-form .container .v-subheader:nth-child(2) {display: none;}';
            $styles .= '.deprecated-api2 .v-application--wrap .v-form .container .v-text-field:nth-child(4) {display: none;}';
            wp_add_inline_style($key, $styles);            
        }
    }

    /**
     * @since 3.8.2
     */
    public function optionsPagePrintScripts()
    {
        global $pagenow;
        
        if ( 'admin.php' !== $pagenow ) {
            return;
        }
        
        $slug = MLMSoftPlugin::PLUGIN_PREFIX.'options_page';
        
        if ( ! isset($_GET['page']) || $_GET['page'] !== $slug ) {
            return;
        }
        
?><script type='text/javascript'>
/* <![CDATA[ */
window.addEventListener('DOMContentLoaded', function() {
    let container = jQuery('body');
    const hash = '#/api';
    const addClass = function(){
        container.addClass('deprecated-api2');
    }
    if ( location.hash == hash ) {
        addClass();
    }
    jQuery(document).on('click', '.v-list-item--link', function(e){
        let $t = jQuery(this);
        if ( hash == $t.attr('href') ) {
            addClass();
        } else {
            container.removeClass('deprecated-api2');
        }
    });
});
/* ]]> */
</script><?php
    }
    
    /**
     * @since 3.6.6
     */
    public function printScripts()
    {
        global $pagenow;
        
        if ( 'admin.php' !== $pagenow ) {
            return;
        }
        
        $slug = MLMSoftPlugin::PLUGIN_PREFIX.'options_page'.self::CHECKOUT_CSS_PAGE_SUFFIX;
        
        if ( ! isset($_GET['page']) || $_GET['page'] !== $slug ) {
            return;
        }
        
        $plugin_url = plugin_dir_url(MLMSOFT_V3_PLUGIN_FILE);
        
        // @see https://ace.c9.io/#nav=embedding
        wp_register_script(
            'ace-editor',
            $plugin_url.'admin/assets/js/ace/ace.js',
            array('jquery'),
            '1.35.2',
            true
        );
        wp_enqueue_script('ace-editor');

        wp_register_script(
            'mlmsoft-ace-editor',
            $plugin_url.'admin/assets/js/ace/mlmsoft-ace-editor-admin.js',
            array('ace-editor'),
            '1.0.0',
            true
        );
        wp_enqueue_script('mlmsoft-ace-editor');
        wp_localize_script(
            'mlmsoft-ace-editor', 
            'MLMSoftAceEditorAdmin', 
            array(
                'data' => [
                    'checkoutCssFormSelector' => '#mlmsoft-checkout-css-form',
                    'aceEditorCssID'          => 'ace-editor-css',
                    'aceEditorContentID'      => self::ACE_EDITOR_CONTENT_ID,
                ]
            )
        );
    }
 
    /**
     * @since 3.6.6
     * @since 3.7.0 Added `Online Office` submenu page.
     */
    public function registerAdminPanelPages($args)
    {
        add_submenu_page( 
            $args['menu_slug'], 
            'Online Office', 
            'Online Office', 
            $args['capability'], 
            $args['menu_slug'].self::ONLINE_OFFICE_PAGE_SUFFIX,
            [$this, 'onlineOfficePageContent'],
        );        
        
        add_submenu_page( 
            $args['menu_slug'], 
            'Checkout CSS', 
            'Checkout CSS', 
            $args['capability'], 
            $args['menu_slug'].self::CHECKOUT_CSS_PAGE_SUFFIX,
            [$this, 'checkoutCssPageContent'],
        );
    }
    
    /**
     * @since 3.6.6
     * @since 3.7.0 Added Online Office options submit handler.
     */
    public function checkFormSubmit()
    {
        // Handle the options form submit.
        // If data posted, the options will be updated, and page reloaded (so no continue to the next line).
        if ( empty($_GET['page']) ) {
            return;
        }
        
        $page = sanitize_text_field($_GET['page']);
        
        if ( false !== strpos($page, self::CHECKOUT_CSS_PAGE_SUFFIX ) ) {
            $this->handleCheckoutCssOptionsSubmit();        
        } else if ( false !== strpos($page, self::ONLINE_OFFICE_PAGE_SUFFIX ) ) {
            $this->handleOnlineOfficeOptionsSubmit();        
        } 
    }

    /**
     * Handle the `Save Changes` form submit.
     *
     * @since 3.7.0
     */
    protected function handleOnlineOfficeOptionsSubmit() 
    {
        // Check if there were any posted data before nonce verification.
        if ( ! isset( $_POST[self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID] ) ) {
            // No data.
            return;
        }
        
        // WP anti-hacks.
        if ( ! current_user_can('manage_options') ) {
            wp_die( 'Unauthorized user' );
        }

        check_admin_referer(self::NONCE_ACTION);

        $secretKey = sanitize_text_field($_POST[self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID]);
        $secretKey = trim($secretKey);
        MLMSoftOptions::getInstance()->__set('onlineOfficeAuthSecretKey', $secretKey);

        $menuItem = sanitize_text_field($_POST[self::ONLINE_OFFICE_MENU_TITLE_ID]);
        $menuItem = trim($menuItem);
        MLMSoftOptions::getInstance()->__set('onlineOfficeMenuTitle', $menuItem);
        
        $useOnlineOffice = false;
        if ( isset($_POST[self::USE_ONLINE_OFFICE_ID]) && 'on' === $_POST[self::USE_ONLINE_OFFICE_ID] ) {
            $useOnlineOffice = true;
        }
        MLMSoftOptions::getInstance()->__set('useOnlineOffice', $useOnlineOffice);        
    }

    /**
     * Handle the `Save Changes` form submit.
     *
     * @since 3.6.6
     * @since 3.7.0 Rename function.
     */
    protected function handleCheckoutCssOptionsSubmit() 
    {
        // Check if there were any posted data before nonce verification.
        $css_content_id = self::ACE_EDITOR_CONTENT_ID;
        if ( ! isset( $_POST[$css_content_id] ) ) {
            // No data.
            return;
        }

        // WP anti-hacks.
        if ( ! current_user_can('manage_options') ) {
            wp_die( 'Unauthorized user' );
        }

        check_admin_referer(self::NONCE_ACTION);

        $cssContent = $_POST[$css_content_id];
        $cssContent = trim($cssContent);

        WCIntegrationOptions::getInstance()->__set('checkoutCss', $cssContent);
        
        $useCheckoutCss = false;
        if ( isset($_POST[self::USE_CHECKOUT_CSS_ID]) && 'on' === $_POST[self::USE_CHECKOUT_CSS_ID] ) {
            $useCheckoutCss = true;
        }
        WCIntegrationOptions::getInstance()->__set('useCheckoutCss', $useCheckoutCss);
	}    

    /**
     * @since 3.7.0
     */    
    public function onlineOfficePageContent()
    {
        $useOnlineOffice = MLMSoftOptions::getInstance()->useOnlineOffice;
        $onlineOfficeAuthSecretKey = MLMSoftOptions::getInstance()->onlineOfficeAuthSecretKey;
        $onlineOfficeMenuTitle = MLMSoftOptions::getInstance()->onlineOfficeMenuTitle;
        
        $checked = $useOnlineOffice ? 'checked="checked"' : '';
        
        $content  = '<div class="wrap">';
        $content .=     '<h1>MLMSoft Integration: Online Office.</h1>';
        $content .=     '<div id="mlmsoft-online-office-integration" style="margin-top: 1rem;" class="mlmsoft-options-page mlmsoft-online-office-integration">';
        $content .=         '<form id="mlmsoft-online-office-form" method="post">';
        $content .=             '<div class="field-wrapper use-online-office-field" style="font-size: 18px;margin-bottom: 16px;">';
        $content .=                 '<input type="checkbox" name="'.self::USE_ONLINE_OFFICE_ID.'" id="'.self::USE_ONLINE_OFFICE_ID.'" '.$checked.' />';
        $content .=                 'Enable integration with Online Office.';
        $content .=             '</div>';
        $content .=             '<div class="field-wrapper secret-key-field" style="display:flex;flex-direction:column;width:50%;margin-bottom: 16px;">';
        $content .=                 '<label for="'.self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID.'" style="font-size: 1rem;">';
        $content .=                 'Secret Key';
        $content .=                 '</label>';
        $content .=                 '<input type="password" name="'.self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID.'" id="'.self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID.'" value="'.$onlineOfficeAuthSecretKey.'" style="width: 600px;" />';
        // $content .=                 '<input type="text" name="'.self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID.'" id="'.self::ONLINE_OFFICE_AUTH_SECRET_KEY_ID.'" value="'.$onlineOfficeAuthSecretKey.'" style="width: 600px;" />';
        $content .=             '</div>';
        $content .=             '<div class="field-wrapper menu-title-field" style="display:flex;flex-direction:column;width:50%;margin-bottom: 16px;">';
        $content .=                 '<label for="'.self::ONLINE_OFFICE_MENU_TITLE_ID.'" style="font-size: 1rem;">';
        $content .=                 'My Account menu title';
        $content .=                 '</label>';
        $content .=                 '<input type="text" name="'.self::ONLINE_OFFICE_MENU_TITLE_ID.'" id="'.self::ONLINE_OFFICE_MENU_TITLE_ID.'" value="'.$onlineOfficeMenuTitle.'" style="width: 600px;" placeholder="Online Office" />';
        $content .=             '</div>';        
        $content .=             '<div class="field-wrapper nonce-field">';
        $content .=                 wp_nonce_field(self::NONCE_ACTION, '_wpnonce', true, false);
        $content .=             '</div>';
        $content .=             '<div class="submit-button" style="">';
        $content .=                 get_submit_button(__('Save'));
        $content .=             '</div>';
        $content .=         '</form>';
        $content .=     '</div><!-- .mlmsoft-online-office-integration -->';
        $content .= '</div><!-- .wrap -->';
        
        echo $content;        
    }
    
    /**
     * @since 3.6.6
     */
    public function checkoutCssPageContent()
    {
        $checkoutCss = WCIntegrationOptions::getInstance()->checkoutCss;
        $useCheckoutCss = WCIntegrationOptions::getInstance()->useCheckoutCss;
        
        $checked = $useCheckoutCss ? 'checked="checked"' : '';
        
        $content  = '<div class="wrap">';
        $content .=     '<h1>MLMSoft Integration: CSS for checkout page.</h1>';
        $content .=     '<div id="mlmsoft-checkout-css" style="margin-top: 1rem;" class="mlmsoft-options-page mlmsoft-checkout-css">';
        $content .=         '<form id="mlmsoft-checkout-css-form" method="post">';
        $content .=             '<div style="font-size: 18px;">';
        $content .=                 '<input type="checkbox" name="'.self::USE_CHECKOUT_CSS_ID.'" id="'.self::USE_CHECKOUT_CSS_ID.'" '.$checked.' />';
        $content .=                 'Enable the use of custom CSS on the checkout page.';
        $content .=             '</div>';
        $content .=             '<div id="ace-editor-css" style="top:1rem;width:50%;height:600px;">';
        $content .=                 $checkoutCss;
        $content .=             '</div>';
        $content .=             '<div class="">';
        $content .=                 '<input type="hidden" id="'.self::ACE_EDITOR_CONTENT_ID.'" name="'.self::ACE_EDITOR_CONTENT_ID.'" value="" />';
        $content .=             '</div>';
        $content .=             '<div class="nonce-field">';
        $content .=                 wp_nonce_field(self::NONCE_ACTION, '_wpnonce', true, false);
        $content .=             '</div>';
        $content .=             '<div class="submit-button" style="">';
        $content .=                 get_submit_button(__('Save'));
        $content .=             '</div>';
        $content .=         '</form>';
        $content .=     '</div><!-- .mlmsoft-checkout-css -->';
        $content .= '</div><!-- .wrap -->';
        
        echo $content;
    }
    
    public function registerPages()
    {
        /**
         * Revising of the function with the addition of an action.
         *
         * @since 3.4.13
         */
		 
        /**
        add_menu_page('MLM Soft', 'MLM Soft', 'manage_options', MLMSoftPlugin::PLUGIN_PREFIX . 'options_page', [$this, 'showAdminPage'], '', 5);
        // */

        $menu_slug = MLMSoftPlugin::PLUGIN_PREFIX . 'options_page';
        $capability = 'manage_options';

        $page_hook = add_menu_page(
            'MLM Soft', 
            'MLM Soft', 
            $capability, 
            $menu_slug,
            [$this, 'showAdminPage'], 
            '',
            5
        );

        $args = array(
            'menu_slug'  => $menu_slug,
            'page_hook'  => $page_hook,
            'capability' => $capability,
        );

        /**
         * Fires after a top-level menu page is added.
         *
         * @since 3.4.13
         *
         * @param array $args Array of arguments.
         */		
        do_action_ref_array('mlmsoft_admin_panel_register_pages', array( &$args ));
    }

    public function registerSettings()
    {
        add_settings_section(MLMSoftPlugin::PLUGIN_PREFIX . 'admin_panel', '', '', MLMSoftPlugin::PLUGIN_PREFIX . 'options_page');
    }

    public function showAdminPage()
    {
        $this->frontend->addScriptParams('adminParams', [
            'locale' => get_locale()
        ]);
        $this->frontend->enqueue();
        echo '<div id="app"></div>';
    }
}