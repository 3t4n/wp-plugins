<?php
class DV_FLFont
{
    public static function initialize()
    {
        add_action( 'init', 'DV_FLFont::customize', 10, 3);
        add_action( 'wp_enqueue_scripts', 'DV_FLFont::add_stylesheets');
    }

    public static function customize()
    {
        $fonts = array(
            'IRANSans' => array(
                "fallback" => "IRANSans, Arial, sans-serif",
                'weights' => array(
                    "300",
                    "400",
                    "700",
                )
            )
        );

        foreach($fonts as $name => $settings){

            if ( class_exists('FLFontFamilies') && isset(FLFontFamilies::$system) ) {
                FLFontFamilies::$system[$name] = $settings;
            }

            if ( class_exists('FLFontFamilies') && isset(FLBuilderFontFamilies::$system) ) {
                FLBuilderFontFamilies::$system[$name] = $settings;
            }

        }

    }

    public static function add_stylesheets()
    {
        wp_enqueue_style( 'font-iran-sans', DADEVARZAN_COMMON_URL . 'public/css/IRANSansWeb.css');
    }

}