<?php
/**
 * add styles and js to plugin
 * @param $atts
 * @return string
 * <?php echo do_shortcode("[e_strix_allegro_symc]"); ?>
 */
function e_strix_allegro_symc_shortcode_func( $atts ) {	
    
    if (isset($_GET['code'])){
        $url_code = $_GET['code'];
        
        $settings = new EStrixAllegroSymcSettings();
        $setParam = $settings->get_settings();
        
        $allegroApi = new EStrixAllegroRESTApi($setParam['allegro_client_id'],$setParam['allegro_client_secret'],$setParam['allegro_client_id'],$setParam['woocommerce_url']);
        
        $settings -> update('allegro_username',$url_code);
        
        $allegroApi->getNewAccessToken($url_code);
                
        $settings -> update('access_token', $allegroApi->getAccessToken());
        $settings -> update('refresh_token', $allegroApi->getRefreshToken());
        
        $helper = new EStrixHelper($allegroApi->getAccessToken());
        $settings -> update('allegro_seller_id', $helper->getUserName());
                
        $allegroApi->refreshAccessToken();
                
        $settings -> update('access_token', $allegroApi->getAccessToken());
        $settings -> update('refresh_token', $allegroApi->getRefreshToken());
        
        $datetime = new DateTime();
        $datetime->setTimezone(new DateTimeZone('Europe/Warsaw'));
        $settings -> update('allegro_last_updated',$datetime->format('Y-m-d H:i:s'));
    }	

	return '';
}
add_shortcode( 'e_strix_allegro_symc', 'e_strix_allegro_symc_shortcode_func' );