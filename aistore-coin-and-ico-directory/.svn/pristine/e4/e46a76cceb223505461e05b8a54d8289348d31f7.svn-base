<?php
/*
  Plugin Name: Aistore Coin and ICO Directory
  Version: 4.1.1
  Plugin URI: #
  Author: susheelhbti
  Author URI: http://www.aistore2030.com/
  Description: Aistore Coin and ICO Directory. Just post this shortcode where you want to show  [AistoreCoinCurrDirectory]
 */
 

//[AistoreCoinCurrDirectory]
function aistore_directory_func($atts)
{
    
    
    $url= plugin_dir_url( __FILE__ )."coins.json";
    
    
    $response = wp_remote_get($url);
    $dt = wp_remote_retrieve_body( $response );
    $html = "
     


<table border='1' class='aistore_ico'>";
    
    $json_decoded = json_decode($dt);
    
    foreach ($json_decoded as $result) {
        $html .= '<tr>';
        
        $explorer = implode("<br/>", $result->explorer);
        
        
        
        $html .= "<td>
        <h3><a target='_blank' href='" . esc_url($result->website) . "' > " .esc_attr( $result->name) . "</a></h3>
        " . esc_attr($result->description->en ). "<hr/>   
        " .esc_attr( $explorer ). "<br> 
        <b>Max Supply</b> " . esc_attr($result->network->t_max_supply) . "  <br/>
        <b>Total Supply</b> " .esc_attr( $result->network->t_total_supply) . "</td>";
        
        
        $html .= '</tr>';
    }
    $html .= '</table>';
    
    
    return $html;
    
}
add_shortcode('AistoreCoinCurrDirectory', 'aistore_directory_func');




 


