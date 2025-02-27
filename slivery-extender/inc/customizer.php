<?php 

add_action('init',"wpb_load_file",100);
function wpb_load_file(){
    if (! function_exists( 'Kirki' )) {
        return;
    }
    global $themetype;
    $theme = wp_get_theme(); // gets the current theme
    if ( 'Goldy Silver' == $theme->name || 'Goldy Silver Pro' == $theme->name) {
        global $goldy_silver_themetype;
        $themetype = $goldy_silver_themetype;
        $themetype['plugiformname']='goldy_silver';
    }
    if ( 'Goldy Mex' == $theme->name || 'Goldy Mex Pro' == $theme->name) {
        global $goldy_mex_themetype;
        $themetype = $goldy_mex_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Fly' == $theme->name || 'Goldy Fly Pro' == $theme->name) {
        global $goldy_fly_themetype;
        $themetype = $goldy_fly_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Grocery Market' == $theme->name || 'Goldy Grocery Market Pro' == $theme->name) {
        global $goldy_grocery_market_themetype;
        $themetype = $goldy_grocery_market_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Restaurant' == $theme->name || 'Goldy Restaurant Pro' == $theme->name) {
        global $goldy_restaurant_themetype;
        $themetype = $goldy_restaurant_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Fitness' == $theme->name || 'Goldy Fitness Pro' == $theme->name) {
        global $goldy_fitness_themetype;
        $themetype = $goldy_fitness_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Construction' == $theme->name || 'Goldy Construction Pro' == $theme->name) {
        global $goldy_construction_themetype;
        $themetype = $goldy_construction_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Corporate' == $theme->name || 'Goldy Corporate Pro' == $theme->name) {
        global $goldy_corporate_themetype;
        $themetype = $goldy_corporate_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Business' == $theme->name || 'Goldy Business Pro' == $theme->name) {
        global $goldy_business_themetype;
        $themetype = $goldy_business_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Ekart' == $theme->name || 'Goldy Ekart Pro' == $theme->name) {
        global $goldy_ekart_themetype;
        $themetype = $goldy_ekart_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Cloud' == $theme->name || 'Goldy Cloud Pro' == $theme->name) {
        global $goldy_cloud_themetype;
        $themetype = $goldy_cloud_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Home' == $theme->name || 'Goldy Home Pro' == $theme->name) {
        global $goldy_home_themetype;
        $themetype = $goldy_home_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Shopkeeper' == $theme->name || 'Goldy Shopkeeper Pro' == $theme->name) {
        global $goldy_shopkeeper_themetype;
        $themetype = $goldy_shopkeeper_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Tech' == $theme->name || 'Goldy Tech Pro' == $theme->name) {
        global $goldy_tech_themetype;
        $themetype = $goldy_tech_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Cafe' == $theme->name || 'Goldy Cafe Pro' == $theme->name) {
        global $goldy_cafe_themetype;
        $themetype = $goldy_cafe_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Market Pro' == $theme->name || 'Goldy Market' == $theme->name) {
        global $goldy_market_themetype;
        $themetype = $goldy_market_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Books Pro' == $theme->name || 'Goldy Books' == $theme->name) {
        global $goldy_books_themetype;
        $themetype = $goldy_books_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Furniture Pro' == $theme->name || 'Goldy Furniture' == $theme->name) {
        global $goldy_furniture_themetype;
        $themetype = $goldy_furniture_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Deep Pro' == $theme->name || 'Goldy Deep' == $theme->name) {
        global $goldy_deep_themetype;
        $themetype = $goldy_deep_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Brisk Pro' == $theme->name || 'Goldy Brisk' == $theme->name) {
        global $goldy_brisk_themetype;
        $themetype = $goldy_brisk_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Prime Pro' == $theme->name || 'Goldy Prime' == $theme->name) {
        global $goldy_prime_themetype;
        $themetype = $goldy_prime_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Animal Pro' == $theme->name || 'Goldy Animal' == $theme->name) {
        global $goldy_animal_themetype;
        $themetype = $goldy_animal_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Jewelry Pro' == $theme->name || 'Goldy Jewelry' == $theme->name) {
        global $goldy_jewelry_themetype;
        $themetype = $goldy_jewelry_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Sport Pro' == $theme->name || 'Goldy Sport' == $theme->name) {
        global $goldy_sport_themetype;
        $themetype = $goldy_sport_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Clinic Pro' == $theme->name || 'Goldy Clinic' == $theme->name) {
        global $goldy_clinic_themetype;
        $themetype = $goldy_clinic_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Champ Pro' == $theme->name || 'Goldy Champ' == $theme->name) {
        global $goldy_champ_themetype;
        $themetype = $goldy_champ_themetype;
        $themetype['plugiformname']='goldy_mex';
    }
    if ( 'Goldy Soler Pro' == $theme->name || 'Goldy Soler' == $theme->name) {
       global $goldy_soler_themetype;
       $themetype = $goldy_soler_themetype;
       $themetype['plugiformname']='goldy_mex';
    }
    include_once( 'customize_option/social_sections.php' );
    include_once( 'customize_option/header.php' );
    include_once( 'customize_option/footer.php' );
    include_once( 'customize_option/global.php' );
    include_once( 'customize_option/sidebar_section.php' );
    include_once( 'customize_option/breadcrumb_section.php' );
    include_once( 'customize_option/featured_slider.php' );
    include_once( 'customize_option/featured_section.php' );
    include_once( 'customize_option/about_section.php' );
    include_once( 'customize_option/our_portfolio.php' );
    include_once( 'customize_option/our_team.php' );
    include_once( 'customize_option/our_testmonial.php' );
    include_once( 'customize_option/our_sponsors.php' );
    include_once( 'customize_option/our_services.php' );
    include_once( 'customize_option/book_an_appoinment.php' );
    include_once( 'customize_option/home_page_ordering.php' );
    include_once( 'customize_option/design.php' );
    include_once( 'customize_option/extras.php' );
}

include_once( 'customize_option/SFT_admin_side.php' );

?>
