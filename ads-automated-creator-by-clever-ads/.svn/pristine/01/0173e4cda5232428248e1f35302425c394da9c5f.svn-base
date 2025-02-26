<?php
final class CLEVERADS_CREATOR {
    public function __construct() {
        add_action('admin_menu', array($this, 'google_add_admin_menu'), 9999);
        add_action('creator_settings_tabs_array', array($this, 'creator_settings_tabs_array'), 9999);
        add_action('creator_settings_tabs_cleverads', array($this, 'print_plugin_options'), 9999);
        add_action('admin_enqueue_scripts', array($this,'wpdocs_selectively_enqueue_admin_script'));
    }
    public function init() {
        
    }
    public function google_add_admin_menu() { 
        add_menu_page( __('Google Ads Creator','google-ads-automated-creator-by-clever-ads'), __('Google Ads Creator','google-ads-automated-creator-by-clever-ads'), 'manage_options', 'clever_ads_on_google_for_creator', array($this, 'print_plugin_options'),'https://res.cloudinary.com/cleverppc/image/upload/v1583320431/slack_app_logo_squared_white_xrb2hg.svg' );
    }
    
    function wpdocs_selectively_enqueue_admin_script() {
        wp_enqueue_style( 'my_custom_styles', plugin_dir_url( __FILE__ ) . 'styles.css', array(), '1.0' );
        wp_enqueue_style( 'my_custom_font', plugin_dir_url( __FILE__ ) . 'font.css', array(), '1.0' );
        wp_enqueue_style( 'bootstrap_css', plugin_dir_url( __FILE__ ) . 'bootstrap.min.css', array(), '1.0' );
        wp_enqueue_script( 'bootstrap_js', plugin_dir_url( __FILE__ ) . 'bootstrap.min.js', array(), '1.0' );
    }
    public function creator_settings_tabs_array($tabs) {
        $tabs['cleverads'] = __('WC Clever Google Ads', 'creator-currency');
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
            'headline' => __("Have your Google Ads created for free by Clever Ads",'google-ads-automated-creator-by-clever-ads'),
            'tip1' => __("Advertise your Wordpress website on Google.",'google-ads-automated-creator-by-clever-ads'),
            'tip2' => __("Simple, hassle-free campaign creation flow.",'google-ads-automated-creator-by-clever-ads'),
            'tip3' => __("Doesn't matter what your business is about, reach the right people with Clever Ads.",'google-ads-automated-creator-by-clever-ads'),
            'button' => __("CREATE MY GOOGLE ADS FOR FREE",'google-ads-automated-creator-by-clever-ads'),
            'blue1_title' => __("Let us in",'google-ads-automated-creator-by-clever-ads'),
            'blue1_text' => __("Give us access so we can create and upload your Google Ads campaigns to your account. (See <a class=\"link\" href=\"https://cleverads.com/privacy-policy\">privacy policy</a>)",'google-ads-automated-creator-by-clever-ads'),
            'blue2_title' => __("Help us build your ads",'google-ads-automated-creator-by-clever-ads'),
            'blue2_text' => __("Answer some questions about your business & Google Ads preferences. Clever Ads will create tailor-made ads for you.",'google-ads-automated-creator-by-clever-ads'),
            'blue3_title' => __("Voilà!",'google-ads-automated-creator-by-clever-ads'),
            'blue3_text' => __("Have your Google Ads running! Your budget will be fully spent on your ads, we won't charge you a penny.",'google-ads-automated-creator-by-clever-ads'),
            'footer' => __("Created with love by Clever Ads, a Premier Google Partner",'google-ads-automated-creator-by-clever-ads')
        );

        echo $this->render_html(GGADS_PATH . 'views/plugin_options.tpl', $data );
    }
}