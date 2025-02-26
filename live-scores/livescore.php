<?php 
    /*
    Plugin Name: Live Scores
    Plugin URI: http://livescores.website/wordpress-plugin/
    Description: Livescores with NO ADS! Display our free livescore widget for Soccer, American Football (NFL,CFL), Tennis (APT,WTA), Basketball, Handball, Volleyball or Ice Hockey in English, Italian, French & Spanish. More languages will be added soon!
    Author: lswjohn
    Version: 2.1.2
    Author URI: http://livescores.website/
    */

add_shortcode('livescores-tennis', 'tennis1');
add_shortcode('livescores-basketball', 'basketball1');
add_shortcode('livescores-icehockey', 'icehockey1');
add_shortcode('livescores-americanfootball', 'football1');
add_shortcode('livescores-baseball', 'baseball1');
add_shortcode('livescores-handball', 'handball1');
add_shortcode('livescores-green', 'lswstyle1');
add_shortcode('livescores-red', 'lswstyle2');
add_shortcode('livescores-blue', 'lswstyle3');
add_shortcode('livescores-gray', 'lswstyle4');
add_shortcode('livescores-orange', 'lswstyle5');
add_shortcode('livescores-white', 'lswstyle6');
add_shortcode('livescores-black', 'lswstyle7');

add_shortcode('soccerblue', 'soccerblue');
add_shortcode('basketballblue', 'basketballblue');
add_shortcode('handballblue', 'handballblue');
add_shortcode('tennisblue', 'tennisblue');
add_shortcode('hockeyblue', 'hockeyblue');
add_shortcode('volleyballblue', 'volleyballblue');
add_shortcode('americanfootballblue', 'americanfootballblue');

add_shortcode('baloncestoes', 'baloncestoes');
add_shortcode('balonmanoes', 'balonmanoes');
add_shortcode('futbolamericanes', 'futbolamericanes');
add_shortcode('tenises', 'tenises');
add_shortcode('hockeyes', 'hockeyes');
add_shortcode('voleiboles', 'voleiboles');
add_shortcode('futboles', 'futboles');

add_shortcode('calcioit', 'calcioit');
add_shortcode('basketballit', 'basketballit');
add_shortcode('pallamanoit', 'pallamanoit');
add_shortcode('tennisit', 'tennisit');
add_shortcode('hockeyit', 'hockeyit');
add_shortcode('pallavoloit', 'pallavoloit');
add_shortcode('footballit', 'footballit');

add_shortcode('footballbluefr', 'footballbluefr');
add_shortcode('basketballbluefr', 'basketballbluefr');
add_shortcode('hockeybluefr', 'hockeybluefr');
add_shortcode('handballbluefr', 'handballbluefr');
add_shortcode('volleyballbluefr', 'volleyballbluefr');
add_shortcode('tennisbluefr', 'tennisbluefr');
add_shortcode('americanfootballbluefr', 'americanfootballbluefr');

function live_scores_plugin_menu(){
    	add_options_page('Live Scores Options', 'Live Scores', 'manage_options', 'live-scores-plugin-menu', 'lsw_plugin_options');
}

add_action('admin_menu','live_scores_plugin_menu');

function lsw_plugin_options(){
    	include('infot.php');
}


register_activation_hook( __FILE__,'lswplugin_activate');
add_action('admin_init', 'lswredirect_redirect');

function lswredirect_redirect() {
if (get_option('lswredirect_do_activation_redirect', false)) { 
delete_option('lswredirect_do_activation_redirect'); 
wp_redirect('../wp-admin/options-general.php?page=live-scores-plugin-menu');
}
}

function lswplugin_activate() { 
add_option('lswredirect_do_activation_redirect', true); wp_redirect('../wp-admin/options-general.php?page=live-scores-plugin-menu');
 }

// Include Files
$files = array(
    '/classes/wls-module',
    '/classes/wls-main',
    '/classes/wls-show',
    '/classes/wls-setting',
    '/includes/admin-notice-helper/admin-notice-helper'
);

foreach ($files as $file) {
    require_once plugin_dir_path( __FILE__ ).$file.'.php';
}
if ( class_exists( 'WLS_Main' ) ) {
    WLS_Main::get_instance();
 }


function futboles(){
?>
<center><iframe src="http://es.livescores.website/res-futbol" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><small><a href="http://es.livescores.website/resultados-de-futbol/" target="_blank">http://es.livescores.website/resultados-de-futbol/</a></small></div>' . "\n";
                }
}

function balonmanoes(){
?>
<center><iframe src="http://es.livescores.website/res-balonmano" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://es.livescores.website/resultados-de-balonmano/" target="_blank">http://es.livescores.website/resultados-de-balonmano/</a></small></center></div>' . "\n";
                }
}

function tenises(){
?>
<center><iframe src="http://es.livescores.website/res-tenis" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://es.livescores.website/resultados-de-tenis/" target="_blank">http://es.livescores.website/resultados-de-tenis/</a></small></center></div>' . "\n";
                }}

function baloncestoes(){
?>
<center><iframe src="http://es.livescores.website/res-baloncesto" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://es.livescores.website/resultados-de-baloncesto/" target="_blank">http://es.livescores.website/resultados-de-baloncesto/</a></small></center></div>' . "\n";
                }}

function hockeyes(){
?>
<center><iframe src="http://es.livescores.website/res-hockey" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://es.livescores.website/resultados-de-hockey/" target="_blank">http://es.livescores.website/resultados-de-hockey/</a></small></center></div>' . "\n";
                }}

function voleiboles(){
?>
<center><iframe src="http://es.livescores.website/res-voleibol" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://es.livescores.website/resultados-de-voleibol/" target="_blank">http://es.livescores.website/resultados-de-voleibol/</a></small></center></div>' . "\n";
                }
}

function futbolamericanes(){
?>
<center><iframe src="http://es.livescores.website/res-futbol-americano" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://es.livescores.website/resultados-de-futbol-american/" target="_blank">http://es.livescores.website/resultados-de-futbol-american/</a></small></center></div>' . "\n";
                }
}

function footballbluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-foot" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/foot-en-direct/" target="_blank">http://fr.livescores.website/foot-en-direct/</a></small></center></div>' . "\n";
                }
}

function handballbluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-handball" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/handball-en-direct/" target="_blank">http://fr.livescores.website/handball-en-direct/</a></small></center></div>' . "\n";
                }
}

function tennisbluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-tennis" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/tennis-en-direct/" target="_blank">http://fr.livescores.website/tennis-en-direct/</a></small></center></div>' . "\n";
                }}

function basketballbluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-basket" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/basket-en-direct/" target="_blank">http://fr.livescores.website/basket-en-direct/</a></small></center></div>' . "\n";
                }}

function hockeybluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-hockey" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/hockey-en-direct/" target="_blank">http://fr.livescores.website/hockey-en-direct/</a></small></center></div>' . "\n";
                }}

function volleyballbluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-volley" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/volley-en-direct/" target="_blank">http://fr.livescores.website/volley-en-direct/</a></small></center></div>' . "\n";
                }
}

function americanfootballbluefr(){
?>
<center><iframe src="http://fr.livescores.website/res-football-americain" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://fr.livescores.website/football-americain-en-direct/" target="_blank">http://fr.livescores.website/football-americain-en-direct/</a></small></center></div>' . "\n";
                }
}


 
function soccerblue(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><small><center><a href="http://livescores.website/" target="_blank">http://livescores.website/</a></center></small></div>' . "\n";
                }
}

function handballblue(){
?>
<center><iframe src="http://livescores.website/handballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/handball/" target="_blank">http://livescores.website/handball/</a></small></center></div>' . "\n";
                }
}

function tennisblue(){
?>
<center><iframe src="http://livescores.website/tennisblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/tennis/" target="_blank">http://livescores.website/tennis/</a></small></center></div>' . "\n";
                }}

function basketballblue(){
?>
<center><iframe src="http://livescores.website/basketballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/basketball/" target="_blank">http://livescores.website/basketball/</a></small></center></div>' . "\n";
                }}

function hockeyblue(){
?>
<center><iframe src="http://livescores.website/hockeyblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/ice-hockey/" target="_blank">http://livescores.website/ice-hockey/</a></small></center></div>' . "\n";
                }}

function volleyballblue(){
?>
<center><iframe src="http://livescores.website/volleyballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/volleyball/" target="_blank">http://livescores.website/volleyball/</a></small></center></div>' . "\n";
                }
}

function americanfootballblue(){
?>
<center><iframe src="http://livescores.website/americanfootballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/american-football/" target="_blank">http://livescores.website/american-football/</a></small></center></div>' . "\n";
                }
}

function tennis1(){
?>
<center><iframe src="http://livescores.website/tennisblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/tennis/" target="_blank">Tennis live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }}
function basketball1(){
?>
<center><iframe src="http://livescores.website/basketballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/basketball/" target="_blank">Basketball live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }}
function icehockey1(){
?>
<center><iframe src="http://livescores.website/hockeyblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/ice-hockey/" target="_blank">Hockey live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }}
function football1(){
?>
<center><iframe src="http://livescores.website/americanfootballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/american-football/" target="_blank">American football live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}

function baseball1(){
?>
<p>We no longer provide live score results for Baseball, check out live scores plugin settings to see what is available.</p>
<?php
}
function handball1(){
?>
<center><iframe src="http://livescores.website/handballblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/handball/" target="_blank">Handball live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle1(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle2(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle3(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle4(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle5(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle6(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}
function lswstyle7(){
?>
<center><iframe src="http://livescores.website/soccerblue" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://livescores.website/soccer/" target="_blank">Soccer live scores & results for today or yesterday</a></small></center></div>' . "\n";
                }
}


function calcioit(){
?>
<center><iframe src="http://it.livescores.website/res-calcio" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-calcio/" target="_blank">http://it.livescores.website/risultati-calcio/</a></small></center></div>' . "\n";
                }
}

function pallavoloit(){
?>
<center><iframe src="http://it.livescores.website/res-pallavolo" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-pallavolo/" target="_blank">http://livescores.website/risultati-pallavolo/</a></small></center></div>' . "\n";
                }
}

function tennisit(){
?>
<center><iframe src="http://it.livescores.website/res-tennis" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-tennis/" target="_blank">http://it.livescores.website/risultati-tennis/</a></small></center></div>' . "\n";
                }}

function basketballit(){
?>
<center><iframe src="http://it.livescores.website/res-basketball" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-basketball/" target="_blank">http://it.livescores.website/risultati-basketball/</a></small></center></div>' . "\n";
                }}

function hockeyit(){
?>
<center><iframe src="http://it.livescores.website/res-hockey" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-hockey/" target="_blank">http://it.livescores.website/risultati-hockey/</a></small></center></div>' . "\n";
                }}

function pallamanoit(){
?>
<center><iframe src="http://it.livescores.website/res-pallamano" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-pallamano/" target="_blank">http://it.livescores.website/pallamano/</a></small></center></div>' . "\n";
                }
}

function footballit(){
?>
<center><iframe src="http://it.livescores.website/res-football-americano" scrolling="no" frameborder="0" style="border:none;width:610px;min-height:1080px;overflow: scroll"></iframe></center>
<?php  if (WLS_Main::$settings['wls_author_linking'] == '1') {
                    echo '<div><center><small><a href="http://it.livescores.website/risultati-football-americano/" target="_blank">http://it.livescores.website/risultati-football-americano/</a></small></center></div>' . "\n";
                }
}

?>