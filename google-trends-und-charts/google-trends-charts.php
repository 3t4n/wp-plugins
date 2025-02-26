<?php

/**
 * Plugin Name: Google Trends & Charts
 * Plugin URI:  http://internet-pr-beratung.de/google-trends-wordpress/ 
 * Description: Das Plugin gibt Google Trends Graphen per Shortcode aus, zudem kannst Du die Top-Suchanfragen bei Google in einem Widget und im Dashboard ausgeben.
 * Version:     2.0
 * Author:      Sammy Zimmermanns
 * Author URI:  http://internet-pr-beratung.de
 * License:     GPL-2.0+
 */
 /*  Copyright 2021  Sammy Zimmermanns  (email : zimmermanns@internet-pr-beratung.de)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//The Google Trends Shortcode

function google_trends_charts_sc($atts){
        extract( shortcode_atts( array(
                'w' => '500',           // width of the graph
                'h' => '500',           // height of the graph
                'q' => '',  			// query separated by comas
                'geo' => 'DE',          // location
        ), $atts ) );
        
        //format input
        
        $h=(int)$h;
        $w=(int)$w;
        $q=esc_attr($q);
        $geo=esc_attr($geo);
        ob_start();
?>
<div style="height:<?php echo $h;?>px; width:<?php echo $w?>px; margin-bottom: 5px;">
<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/2578_RC02/embed_loader.js"></script> 
<script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", 
{"comparisonItem":[
{"keyword":"<?php echo $q;?>","geo":"<?php echo $geo;?>","time":"today 12-m"}
],
"category":0,"property":""
}, 
{
	"exploreQuery":"q=<?php echo $q;?>&geo=<?php echo $geo;?>&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"
	}
	); 
</script>
</div>
<?php
return ob_get_clean();
}
add_shortcode("trend","google_trends_charts_sc");
?>

<?php
function google_trendvergleich_charts_sc($atts){
        extract( shortcode_atts( array(
                'w' => '500',           // width of the graph
                'h' => '500',           // height of the graph
                'q1' => '',  
				'q2' => '', 
				// query separated by comas
                'geo' => 'DE',          // location
        ), $atts ) );
        
        //format input
        
        $h=(int)$h;
        $w=(int)$w;
        $q1=esc_attr($q1);
		$q2=esc_attr($q2);
        $geo=esc_attr($geo);
        ob_start();
?>
<div style="height:<?php echo $h;?>px; width:<?php echo $w?>px; margin-bottom: 5px;">
<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/2578_RC02/embed_loader.js"></script> 
<script type="text/javascript"> trends.embed.renderExploreWidget("TIMESERIES", 
{"comparisonItem":[
{"keyword":"<?php echo $q1;?>","geo":"<?php echo $geo;?>","time":"today 12-m"},
{"keyword":"<?php echo $q2;?>","geo":"<?php echo $geo;?>","time":"today 12-m"}
],
"category":0,"property":""
}, 
{
	"exploreQuery":"q=<?php echo $q1;?>,<?php echo $q2;?>&geo=<?php echo $geo;?>&date=today 12-m","guestPath":"https://trends.google.com:443/trends/embed/"
	}
	); 
</script>
</div>
<?php
return ob_get_clean();
}
add_shortcode("trendvergleich","google_trendvergleich_charts_sc");
?>

<?php
//The Google Trends Top-Searches Shortcode

function topsearches($atts, $content = null) {
       extract( shortcode_atts( array(
	   'w' => '250',           // width of the graph
       'h' => '413',           // height of the graph
       'geo' => 'DE',
								// query separated by comas

        ), $atts ) );
		
		//format input
        
        $h=(int)$h;
        $w=(int)$w;
        $geo=esc_attr($geo);
        
?>
<div style="height:<?php echo $h;?>px; width:<?php echo $w?>px; margin-bottom: 5px;">
<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/2578_RC02/embed_loader.js"></script> 
<script type="text/javascript"> trends.embed.renderWidget("dailytrends", "", {"geo":"<?php echo $geo?>","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>
 </div>
 <?php

}

add_shortcode('topsearches', 'topsearches' );
add_filter('widget_text', 'do_shortcode', 11);
?>
<?php
//The widget code starts here
function widget_topsearches($args) {
    extract($args);
?>	
        <?php echo $before_widget; ?>
            <?php echo $before_title
                . 'Google Top-Suchanfragen'
                . $after_title; ?>
           <script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/2578_RC02/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderWidget("dailytrends", "", {"geo":"DE","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>

        <?php echo $after_widget; ?>
<?php
}
register_sidebar_widget('Google Trends & Charts',
    'widget_topsearches');
?>
<?php
/**Google Trends Top-Searches Dashboard Widget */
if (is_admin()){
  add_action('wp_dashboard_setup', 'add_topsearches_widget');
}

function add_topsearches_widget() {
   wp_add_dashboard_widget('topsearches_dashboard_widget',
                           'Google Trends Top-Suchbegriffe des Tages',
                           'insert_topsearches_dashboard_widget_data'
                          );
}
function insert_topsearches_dashboard_widget_data() {
  // Informationen über den aktuellen Benutzer ermitteln.
  echo '<script type="text/javascript" src="https://ssl.gstatic.com/trends_nrtr/2578_RC02/embed_loader.js"></script> <script type="text/javascript"> trends.embed.renderWidget("dailytrends", "", {"geo":"DE","guestPath":"https://trends.google.com:443/trends/embed/"}); </script>';
}
?>
<?php
/** Admin Panel */
add_action( 'admin_menu', 'google_trends_charts_menu' );

function google_trends_charts_menu() {
	add_options_page( 'Google Trends & Charts Options', 'Google & Trends Charts', 'manage_options', 'google-trends-charts', 'google_trends_charts_options' );
}

function google_trends_charts_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
        echo '<h1>Shortcode Beispiele:</h1>';
        echo '<code>[trend h="500" w="500" q="katzen" geo="DE"]</code><br/>';
		echo '<code>[trendvergleich h="500" w="500" q1="katzen" q2="hunde" geo="DE"]</code>';
	echo '</div>';      
        echo '<table>
<tbody>
<tr>
<td>
<h2>Shortcode für Top Suchbegriffe des Tages</h2>
</td>
</tr>
<tr>
<td><code>[topsearches h=826 w=400 geo=DE]</code></td>
</tr>
<tr>
<td>h = Höhe in Pixeln
W = Breite in Pixeln
geo = Das Land
</td>
</tr>
<tr>
<td>
<h3>Länder Variablen</h3>
</td>
</tr>
</tbody>
</table>
<table>
<tbody>
<tr>
<td>
geo=DE Deutschland<br />
geo=AT Österreich<br />
geo=CH Schweiz<br />
geo=US USA<br />
geo=GB Vereinigtes Königreich<br />
geo=FR Frankreich<br />
geo=NL Niederlande<br />
geo=JP Japan<br />
geo=SG Singapur<br />
geo=IL Israel<br />
geo=AU Australien<br />
geo=HK Hongkong<br />
geo=TW Taiwan<br />
geo=CA Kanada<br />
geo=RU Russland<br />
geo=BR Brasilien<br />
geo=ID Indonesien<br />
</td>
<td>
geo=GR Griechenland<br />
geo=NZ Neuseeland<br />
geo=MX Mexiko<br />
geo=IE Irland<br />
geo=TR Türkei<br />
geo=PH Philippinen<br />
geo=26 Spanien<br />
geo=IT Italien<br />
geo=VN Vietnam<br />
geo=EG Ägypten<br />
geo=AR Argentinien<br />
geo=PL Polen<br />
geo=CO Kolumbien<br />
geo=MY Malaysia<br />
geo=UA Ukraine<br />
geo=SA Saudi-Arabien<br />
geo=KE Kenia<br /></td>
<td>
geo=CL Chile<br />
geo=RO Rumänien<br />
geo=ZA Südafrika<br />
geo=BE Belgien<br />
geo=SE Schweden<br />
geo=CZ Tschechien<br />
geo=45 Ungarn<br />
geo=IN Indien<br />
geo=PT Portugal<br />
geo=DK Dänemark<br />
geo=FI Finnland<br />
geo=NO Norwegen<br />
geo=NG Nigeria<br />
geo=KR Südkorea<br />
geo=TH Thailand<br />
<br />
<br />
</td>

</tr>
</tbody>
</table>';
        echo '<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><h2>Autor</h2></th>
					<td>
						<p>
							<a href="https://internet-pr-beratung.de">
								<img class="sgnde-about-logo" src="/wp-content/plugins/simple-google-news-de/images/internet-pr-beratung-logo.png" alt="Zimmermanns Internet & PR-Beratung">
							</a>
						</p>
						<p>
							Sammy Zimmermanns<br>Waldheimer Str. 16a<br>01159 Dresden						</p>
						<p>
							E-Mail: <a href="mailto:info@internet-pr-beratung.de">info@internet-pr-beratung.de</a><br>Website: <a title="internet-pr-beratung.de" href="https://internet-pr-beratung.de">internet-pr-beratung.de</a>						</p>
					</td>
				</tr>
			

			</tbody>
		</table>';
	echo '</div>';
}
?>