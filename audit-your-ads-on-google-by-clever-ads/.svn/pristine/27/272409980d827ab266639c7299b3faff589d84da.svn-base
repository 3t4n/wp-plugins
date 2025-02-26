<?php
final class CLEVERADS_AUDIT {
    public function __construct() {
        add_action('admin_menu', array($this, 'clever_audit_add_menu'), 9999);
        add_action('audit_settings_tabs_array', array($this, 'audit_settings_tabs_array'), 9999);
        add_action('audit_settings_tabs_cleverads', array($this, 'print_plugin_options'), 9999);
        add_action('admin_enqueue_scripts', array($this,'agac_wpdocs_selectively_enqueue_admin_script'));
    }
    public function init() {
        
    }
    function clever_audit_add_menu() {
        add_menu_page(__('Audit Google Ads','clever-audit'), __('Audit Google Ads','clever-audit'), 'manage_options', 'clever_audit', array($this, 'print_plugin_options'), 'https://res.cloudinary.com/cleverppc/image/upload/v1583320431/slack_app_logo_squared_white_xrb2hg.svg' );
    }

    function agac_wpdocs_selectively_enqueue_admin_script() {
        wp_enqueue_style( 'my_custom_styles', plugin_dir_url( __FILE__ ) . 'styles.css', array(), '1.0' );
        wp_enqueue_style( 'my_custom_font', plugin_dir_url( __FILE__ ) . 'font.css', array(), '1.0' );
        wp_enqueue_style( 'bootstrap_css', plugin_dir_url( __FILE__ ) . 'bootstrap.min.css', array(), '1.0' );
        wp_enqueue_script( 'bootstrap_js', plugin_dir_url( __FILE__ ) . 'bootstrap.min.js', array(), '1.0' );
    }
    public function audit_settings_tabs_array($tabs) {
        $tabs['cleverads'] = __('WC Clever Google Ads', 'audit-currency');
        return $tabs;
    }
    public function render_html($pagepath, $data = array()) {
        @extract($data);
        ob_start();
        include($pagepath);
        return ob_get_clean();
    }
    public function print_plugin_options() {
        $data = array(
            'headline1' => __("Your campaigns always on point",'clever-audit'),
            'headline2' => __("with Clever Ads Google Ads Audit",'clever-audit'),
            'tip1' => __("Get a free, instant Google Ads Audit on your account.",'clever-audit'),
            'tip2' => __("Optimize your Google Ads account automatically with actionable tips.",'clever-audit'),
            'tip3' => __("Find out where you stand and learn how to reach the top with your Wordpress website.",'clever-audit'),
            'button' => __("GET MY FREE GOOGLE ADS AUDIT",'clever-audit'),
            'blue1_title' => __("Let us in",'clever-audit'),
            'blue1_text' => __("Give us access so we can perform a complete Google Ads Audit of your campaigns. (See <a class=\"link\" href=\"https://cleverads.com/privacy-policy\">privacy policy</a>)",'clever-audit'),
            'blue2_title' => __("Learn",'clever-audit'),
            'blue2_text' => __("Understand where you stand thanks to the insights, comparisons & tailor-made suggestions on your dashboard.",'clever-audit'),
            'blue3_title' => __("Improve",'clever-audit'),
            'blue3_text' => __("Our tips are actionable, take action! Save money & improve your ROI directly from Clever Ads dashboard.",'clever-audit'),
            'footer' => __("Created with love by Clever Ads, a Premier Google Partner",'clever-audit')
        );

        echo $this->render_html(GGADS_PATH_AUDIT . 'views/plugin_options.tpl', $data );
    }
}