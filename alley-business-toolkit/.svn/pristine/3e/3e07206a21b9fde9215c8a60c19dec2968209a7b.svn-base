<?php
function alley_business_toolkit_get_current_theme_author(){
    $current_theme = wp_get_theme();
    return $current_theme->get('Author');
}
function alley_business_toolkit_plugin_check_activated(){
    $pluginList = get_option( 'active_plugins' );
    $alley_business_toolkit_plugin = 'advanced-import/advanced-import.php'; 
    $checkPlugin = in_array( $alley_business_toolkit_plugin , $pluginList );
    return $checkPlugin;
}
function alley_business_toolkit_plugin_file_exists(){
    $alley_business_toolkit_plugin = 'advanced-import/advanced-import.php'; 
    $pathpluginurl = WP_PLUGIN_DIR .'/'. $alley_business_toolkit_plugin;
    $isinstalled = file_exists( $pathpluginurl );
    return $isinstalled;
}
function alley_business_toolkit_get_current_theme_slug(){
    $current_theme = wp_get_theme();
    return $current_theme->stylesheet;
}
function alley_business_toolkit_get_theme_screenshot(){
    $current_theme = wp_get_theme();
    return $current_theme->get_screenshot();
}
function alley_business_toolkit_get_theme_name(){
    $current_theme = wp_get_theme();
    return $current_theme->get('Name');
}

function alley_business_toolkit_get_templates_lists( $theme_slug ){
    
    switch ( $theme_slug ):
        case "home-services":
            $demo_templates_lists = array(

        'home-services' =>array(
            'title' => esc_html__( 'Home Services - Customizer Version', 'alley-business-toolkit' ),/*Title*/
            'is_pro' => false,  /*Premium*/
            'type' => 'free',
            'author' => esc_html__( 'Alley Themes', 'alley-business-toolkit' ),    /*Author Name*/
            'keywords' => array( 'home-services' , 'alley-themes'),  /*Search keyword*/
            'categories' => array( 'free' ), /*Categories*/
            'template_url' => array(
                'content' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/1/content.json',
                'options' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/1/options.json',
                'widgets' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/1/widgets.json'
            ),
            'screenshot_url' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/1/screenshot.jpg',
            'demo_url' => 'https://alleythemes.com/preview/?product_id=home-services',
            'plugins' => ''
        ),
        
        'hvac-basic' =>array(
            'title' => esc_html__( 'Home Services Basic', 'alley-business-toolkit' ),/*Title*/
            'is_pro' => false,  /*Premium*/
            'type' => 'free',
            'author' => esc_html__( 'Alley Themes', 'alley-business-toolkit' ),    /*Author Name*/
            'keywords' => array( 'home-services' , 'alley-themes'),  /*Search keyword*/
            'categories' => array( 'free' ), /*Categories*/
            'template_url' => array(
                'content' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/2/content.json',
                'options' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/2/options.json',
                'widgets' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/2/widgets.json'
            ),
            'screenshot_url' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/free/2/screenshot.jpg',
            'demo_url' => 'https://alleythemes.com/preview/?product_id=home-services-free',
            'plugins' => ''
        ),

        'alley-home-services' =>array(
            'title' => esc_html__( 'Home Services - Customizer Version', 'alley-business-toolkit' ),/*Title*/
            'is_pro' => true,  /*Premium*/
            'pro_url' => 'https://demo.alleythemes.com/hvac-smart/',
            'type' => 'pro',
            'author' => esc_html__( 'Alley Themes', 'alley-business-toolkit' ),    /*Author Name*/
            'keywords' => array( 'home-services' , 'alley-themes'),  /*Search keyword*/
            'categories' => array( 'pro' ), /*Categories*/
            'template_url' => array(
                'content' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/3/content.json',
                'options' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/3/options.json',
                'widgets' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/3/widgets.json'
            ),
            'screenshot_url' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/3/screenshot.png',
            'demo_url' => 'https://alleythemes.com/preview/?product_id=alley-home-services',
            'plugins' => ''
        ),
        

//        'hvac-smart' =>array(
//            'title' => esc_html__( 'HVAC Smart - Elementor Version', 'alley-business-toolkit' ),/*Title*/
//            'is_pro' => true,  /*Premium*/
//            'pro_url' => 'https://demo.alleythemes.com/hvac-smart/',
//            'type' => 'pro',
//            'author' => esc_html__( 'Alley Themes', 'alley-business-toolkit' ),    /*Author Name*/
//            'keywords' => array( 'home-services' , 'alley-themes'),  /*Search keyword*/
//            'categories' => array( 'pro' ), /*Categories*/
//            'template_url' => array(
//                'content' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/1/content.json',
//                'options' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/1/options.json',
//                'widgets' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/1/widgets.json'
//            ),
//            'screenshot_url' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/1/screenshot.jpg',
//            'demo_url' => 'https://alleythemes.com/preview/?product_id=hvac-smart',
//            'plugins' => ''
//        ),
//        'alley-plumbing' =>array(
//            'title' => esc_html__( 'Alley Plumbing - Elementor Version', 'alley-business-toolkit' ),/*Title*/
//            'is_pro' => true,  /*Premium*/
//            'pro_url' => 'https://demo.alleythemes.com/alley-plumbing/',
//            'type' => 'pro',
//            'author' => esc_html__( 'Alley Themes', 'alley-business-toolkit' ),    /*Author Name*/
//            'keywords' => array( 'home-services' , 'alley-themes','alley-plumbing'),  /*Search keyword*/
//            'categories' => array( 'pro' ), /*Categories*/
//            'template_url' => array(
//                'content' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/2/content.json',
//                'options' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/2/options.json',
//                'widgets' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/2/widgets.json'
//            ),
//            'screenshot_url' => ALLEY_BUSINESS_TOOLKIT_TEMPLATE_URL.'/pro/2/screenshot.jpg',
//            'demo_url' => 'https://alleythemes.com/preview/?product_id=Alley-plumbing',
//            'plugins' => ''
//        ),

        
    );
        break;
        
        default:
            $demo_templates_lists = array();
    endswitch;

    return $demo_templates_lists;

}
if ( abt_fs()->can_use_premium_code() ) {
    if(get_theme_mod('custom_header_scripts')){
        add_action( 'wp_head', 'abt_header_custom_scripts' );
        if(!function_exists('abt_header_custom_scripts')){
            function abt_header_custom_scripts(){?>
                <script type="text/javascript">
                    <?php echo wp_kses_post(get_theme_mod('custom_header_scripts'));?>
                </script>
            <?php
            }
        }
    }

    if(get_theme_mod('custom_footer_scripts')){
        add_action( 'wp_footer', 'abt_footer_custom_scripts' );
        if(!function_exists('abt_footer_custom_scripts')){
            function abt_footer_custom_scripts(){?>
                <script type="text/javascript">
                    <?php echo wp_kses_post(get_theme_mod('custom_footer_scripts'));?>
                </script>
            <?php
            }
        }
    }
}



if ( abt_fs()->can_use_premium_code() ) {
    add_action( 'advanced_import_is_pro_active','alley_business_toolkit_set_active' );
    function alley_business_toolkit_set_active( $is_pro_active ) {
        return true;
    }
}
