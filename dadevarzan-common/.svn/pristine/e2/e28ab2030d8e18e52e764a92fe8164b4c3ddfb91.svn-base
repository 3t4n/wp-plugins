<?php
/**
 * Class DV_Font
 *
 * This class add IRANSans to list of available system and beaver builder fonts.
 */

class DV_Font
{
    public static function initialize()
    {
        //add_action( 'init', 'DV_Font::customize', 10, 3);
		add_filter( 'fl_theme_system_fonts', 'DV_Font::customize' );
		add_filter( 'fl_builder_font_families_system', 'DV_Font::customize' );
        
		add_action( 'wp_enqueue_scripts', 'DV_Font::add_stylesheets');
        add_action( 'admin_enqueue_scripts', 'DV_Font::add_stylesheets');
		
    }

    public static function customize($system_fonts)
    {
        $fonts = array(
            'IRANSans' => array(
                "fallback" => "IRANSans, sans-serif, Arial",
                'weights' => array(
                    "200",
                    "300",
                    "400",
                    "500",
                    "700",
                    "900",
                )
            ),
            'IRANSansOnlyNumeral' => array(
                "fallback" => "IRANSansOnlyNumeral, sans-serif, Arial",
                'weights' => array(
                    "200",
                    "300",
                    "400",
                    "500",
                    "700",
                )
            ),
            'IRANSansEnNum' => array(
                "fallback" => "IRANSansEnNum, sans-serif, Arial",
                'weights' => array(
                    "200",
                    "300",
                    "400",
                    "500",
                    "700",
                    "900",
                )
            ),
            'IRANYekanFanum' => array(
                "fallback" => "IRANYekanFanum, sans-serif, Arial",
                'weights' => array(
                    "100",
                    "300",
                    "400",
                    "500",
                    "700",
                    "800",
                    "900",
                )
            ),
            'IRANYekanWeb' => array(
                "fallback" => "IRANYekanWeb, sans-serif, Arial",
                'weights' => array(
                    "100",
                    "300",
                    "400",
                    "500",
                    "700",
                    "800",
                    "900",
                )
            ),
            'YekanBakhFaNum' => array(
                "fallback" => "YekanBakhFaNum, IRANYekanWeb, sans-serif",
                'weights' => array(
                    "100",
                    "300",
                    "400",
                    "600",
                    "700",
                    "800",
                    "900",
                )
            ),
            'YekanBakh' => array(
                "fallback" => "YekanBakh, IRANYekanWeb, sans-serif",
                'weights' => array(
                    "100",
                    "300",
                    "400",
                    "600",
                    "700",
                    "800",
                    "900",
                )
            ),
            'IRANYekanXWeb' => array(
                "fallback" => "IRANYekanXWeb, IRANYekanWeb, sans-serif",
                'weights' => array(
                    "400",
                    "700",
                )
            ),
            'IRANYekanXFanum' => array(
                "fallback" => "IRANYekanXFanum, IRANYekanWeb, sans-serif",
                'weights' => array(
                    "400",
                    "700",
                )
            ),
            'IRANSansDN' => array(
                "fallback" => "IRANSansDN, sans-serif, Arial",
                'weights' => array(
                    "300",
                    "400",
                    "800",
                )
            ),
            'Aviny' => array(
                "fallback" => "Aviny, sans-serif, Arial",
                'weights' => array(
                    "400",
                )
            ),
            'Morabba' => array(
                "fallback" => "Morabba, sans-serif, Arial",
                'weights' => array(
                    "200",
                    "300",
                    "400",
                    "500",
                    "600",
                    "700",
                    "800",
                    "900",
                )
            ),
            'Peyda' => array(
                "fallback" => "Peyda, sans-serif, Arial",
                'weights' => array(
                    "200",
                    "300",
                    "400",
                    "500",
                    "600",
                    "700",
                    "800",
                    "900",
                )
            ),
            'AnjomanMax' => array(
                "fallback" => "AnjomanMax, sans-serif, Arial",
                'weights' => array(
                    "100",
                    "200",
                    "300",
                    "400",
                    "500",
                    "600",
                    "700",
                    "800",
                    "900",
                )
            ),
            'Pelak' => array(
                "fallback" => "Pelak, sans-serif, Arial",
                'weights' => array(
                    "200",
                    "300",
                    "400",
                    "500",
                    "600",
                    "700",
                    "800",
                    "900",
                )
            ),
        );

        foreach($fonts as $name => $settings){

            if ( class_exists('FLFontFamilies') && isset(FLFontFamilies::$system) ) {
                FLFontFamilies::$system[$name] = $settings;
            }

            if ( class_exists('FLBuilderFontFamilies') && isset(FLBuilderFontFamilies::$system) ) {
                FLBuilderFontFamilies::$system[$name] = $settings;
            }
			
			$system_fonts[$name] = $settings;
		}
	 
		return $system_fonts;

    }

    public static function add_stylesheets()
    {
        wp_enqueue_style( 'font-iran-sans', DADEVARZAN_COMMON_URL . 'public/IRANSans/css/IRANSansWeb.css');
        wp_enqueue_style( 'font-iran-sans-only-numeral', DADEVARZAN_COMMON_URL . 'public/IRANSans/css/IRANSansOnlyNumeral.css');
        wp_enqueue_style( 'font-iran-sans-en-num', DADEVARZAN_COMMON_URL . 'public/IRANSans/css/IRANSansEnNum.css');
        wp_enqueue_style( 'font-iran-yekan-fa-num', DADEVARZAN_COMMON_URL . 'public/IRANYekan/css/IRANYekanFaNum.css');
        wp_enqueue_style( 'font-yekan-bakh-fa-num', DADEVARZAN_COMMON_URL . 'public/YekanBakhFaNum/css/YekanBakhFaNum.css');
        wp_enqueue_style( 'font-yekan-x', DADEVARZAN_COMMON_URL . 'public/IRANYekanX/css/IRANYekanXWeb.css');
        wp_enqueue_style( 'font-yekan-xfanum', DADEVARZAN_COMMON_URL . 'public/IRANYekanX/css/IRANYekanXFaNum.css');
        wp_enqueue_style( 'font-yekan-bakh', DADEVARZAN_COMMON_URL . 'public/YekanBakh/css/YekanBakh.css');
        wp_enqueue_style( 'font-iran-yekan', DADEVARZAN_COMMON_URL . 'public/IRANYekan/css/IRANYekanWeb.css');
        wp_enqueue_style( 'font-iran-sans-dn', DADEVARZAN_COMMON_URL . 'public/IRANSansDN/css/IRANSansDN.css');
        wp_enqueue_style( 'font-aviny', DADEVARZAN_COMMON_URL . 'public/Aviny/css/Aviny.css');
        wp_enqueue_style( 'font-morabba', DADEVARZAN_COMMON_URL . 'public/Morabba/css/Morabba.css');
        wp_enqueue_style( 'font-peyda', DADEVARZAN_COMMON_URL . 'public/Peyda/css/Peyda.css');
        wp_enqueue_style( 'font-anjoman-max', DADEVARZAN_COMMON_URL . 'public/AnjomanMax/css/AnjomanMax.css');
        wp_enqueue_style( 'font-pelak', DADEVARZAN_COMMON_URL . 'public/Pelak/css/Pelak.css');
        wp_enqueue_style( 'font-dadevarzan', DADEVARZAN_COMMON_URL . 'public/dadevarzan/style.css');
    }
}