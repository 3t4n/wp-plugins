<?php
  /*
   Plugin Name: App Store TopCharts
   Plugin URI: http://www.leomarco.it/appstore_topcharts/
   Description: A widget to show the top lists of the App Store
   Version: 1.0.1
   License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
   Author: Cattani Simone & Leo Marco
   Author URI: http://cattanisimone.it
   */
	
   /*
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
	
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
	
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
   */
	
	
	$country_data = array( 0 => array( 'iso3166' => 'AR' , 'code' => 143505 , 'country' => 'Argentina' ) ,
								array( 'iso3166' => 'AU' , 'code' => 143460 , 'country' => 'Australia' ) ,
								array( 'iso3166' => 'AT' , 'code' => 143445 , 'country' => 'Austria' ) ,
								array( 'iso3166' => 'BE' , 'code' => 143446 , 'country' => 'Belgium' ) ,
								array( 'iso3166' => 'BR' , 'code' => 143503 , 'country' => 'Brazil' ) ,
								array( 'iso3166' => 'CA' , 'code' => 143455 , 'country' => 'Canada' ) ,
								array( 'iso3166' => 'CL' , 'code' => 143483 , 'country' => 'Chile' ) ,
								array( 'iso3166' => 'CN' , 'code' => 143465 , 'country' => 'China' ) ,
								array( 'iso3166' => 'CO' , 'code' => 143501 , 'country' => 'Colombia' ) ,
								array( 'iso3166' => 'CR' , 'code' => 143495 , 'country' => 'Costa Rica' ) ,
								array( 'iso3166' => 'HR' , 'code' => 143494 , 'country' => 'Croatia' ) ,
								array( 'iso3166' => 'CZ' , 'code' => 143189 , 'country' => 'Czech Reoublic' ) ,
								array( 'iso3166' => 'DK' , 'code' => 143458 , 'country' => 'Denmark' ) ,
								array( 'iso3166' => 'SV' , 'code' => 143506 , 'country' => 'El Salvador' ) ,
								array( 'iso3166' => 'FI' , 'code' => 143447 , 'country' => 'Finland' ) ,
								array( 'iso3166' => 'FR' , 'code' => 143442 , 'country' => 'France' ) ,
								array( 'iso3166' => 'DE' , 'code' => 143443 , 'country' => 'Germany' ) ,
								array( 'iso3166' => 'GR' , 'code' => 143448 , 'country' => 'Greece' ) ,
								array( 'iso3166' => 'GT' , 'code' => 143504 , 'country' => 'Guatemala' ) ,
								array( 'iso3166' => 'HK' , 'code' => 143463 , 'country' => 'Honk Kong' ) ,
								array( 'iso3166' => 'HU' , 'code' => 143482 , 'country' => 'Hungary' ) ,
								array( 'iso3166' => 'IN' , 'code' => 143467 , 'country' => 'India' ) ,
								array( 'iso3166' => 'ID' , 'code' => 143476 , 'country' => 'Indonesia' ) ,
								array( 'iso3166' => 'IE' , 'code' => 143449 , 'country' => 'Ireland' ) ,
								array( 'iso3166' => 'IL' , 'code' => 143491 , 'country' => 'Israel' ) ,
								array( 'iso3166' => 'IT' , 'code' => 143450 , 'country' => 'Italy' ) ,
								array( 'iso3166' => 'JP' , 'code' => 143462 , 'country' => 'Japan' ) ,
								array( 'iso3166' => 'KR' , 'code' => 143466 , 'country' => 'South Korea' ) ,
								array( 'iso3166' => 'KW' , 'code' => 143493 , 'country' => 'Kuwait' ) ,
								array( 'iso3166' => 'LB' , 'code' => 143497 , 'country' => 'Lebanon' ) ,
								array( 'iso3166' => 'LU' , 'code' => 143451 , 'country' => 'Luxembourg' ) ,
								array( 'iso3166' => 'MY' , 'code' => 143473 , 'country' => 'Malaysia' ) ,
								array( 'iso3166' => 'MX' , 'code' => 143468 , 'country' => 'Mexico' ) ,
								array( 'iso3166' => 'NL' , 'code' => 143452 , 'country' => 'Netherlands' ) ,
								array( 'iso3166' => 'NZ' , 'code' => 143461 , 'country' => 'New Zealand' ) ,
								array( 'iso3166' => 'NO' , 'code' => 143457 , 'country' => 'Norway' ) ,
								array( 'iso3166' => 'PK' , 'code' => 143477 , 'country' => 'Pakistan' ) ,
								array( 'iso3166' => 'PA' , 'code' => 143485 , 'country' => 'Panama' ) ,
								array( 'iso3166' => 'PE' , 'code' => 143507 , 'country' => 'Peru' ) ,
								array( 'iso3166' => 'PH' , 'code' => 143474 , 'country' => 'Philippines' ) ,
								array( 'iso3166' => 'PL' , 'code' => 143478 , 'country' => 'Poland' ) ,
								array( 'iso3166' => 'PT' , 'code' => 143453 , 'country' => 'Portugal' ) ,
								array( 'iso3166' => 'QA' , 'code' => 143498 , 'country' => 'Qatar' ) ,
								array( 'iso3166' => 'RO' , 'code' => 143487 , 'country' => 'Romania' ) ,
								array( 'iso3166' => 'RU' , 'code' => 143469 , 'country' => 'Russia' ) ,
								array( 'iso3166' => 'SA' , 'code' => 143479 , 'country' => 'Saudi Arabia' ) ,
								array( 'iso3166' => 'SG' , 'code' => 143464 , 'country' => 'Singapore' ) ,
								array( 'iso3166' => 'SK' , 'code' => 143496 , 'country' => 'Slovakia' ) ,
								array( 'iso3166' => 'SI' , 'code' => 143499 , 'country' => 'Slovenia' ) ,
								array( 'iso3166' => 'ZA' , 'code' => 143472 , 'country' => 'South Africa' ) ,
								array( 'iso3166' => 'ES' , 'code' => 143454 , 'country' => 'Spain' ) ,
								array( 'iso3166' => 'LK' , 'code' => 143486 , 'country' => 'Sri Lanka' ) ,
								array( 'iso3166' => 'SE' , 'code' => 143456 , 'country' => 'Sweden' ) ,
								array( 'iso3166' => 'CH' , 'code' => 143459 , 'country' => 'Switzerland' ) ,
								array( 'iso3166' => 'TW' , 'code' => 143470 , 'country' => 'Taiwan' ) ,
								array( 'iso3166' => 'TH' , 'code' => 143475 , 'country' => 'Thailand' ) ,
								array( 'iso3166' => 'TR' , 'code' => 143480 , 'country' => 'Turkey' ) ,
								array( 'iso3166' => 'GB' , 'code' => 143444 , 'country' => 'UK' ) ,
								array( 'iso3166' => 'US' , 'code' => 143441 , 'country' => 'USA' ) ,
								array( 'iso3166' => 'AE' , 'code' => 143481 , 'country' => 'United Arab Emirates' ) ,
								array( 'iso3166' => 'VE' , 'code' => 143502 , 'country' => 'Venezuela' ) ,
								array( 'iso3166' => 'VN' , 'code' => 143471 , 'country' => 'Vietnam' ) );
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	// THEMES
	
	function icwTap_theme_default($icwTap_link){
		$doc = new DOMDocument();
		$doc->load($icwTap_link);
		foreach ($doc->getElementsByTagName('entry') as $node) {
			$app_title = htmlspecialchars($node->getElementsByTagName('name')->item(0)->nodeValue);
			$app_image = utf8_encode($node->getElementsByTagName('image')->item(0)->nodeValue);
			$app_price = htmlspecialchars($node->getElementsByTagName('price')->item(0)->nodeValue);
			$app_category = htmlspecialchars($node->getElementsByTagName('category')->item(0)->getAttribute('label'));
			$app_artist = htmlspecialchars($node->getElementsByTagName('artist')->item(0)->nodeValue);
			$app_link = htmlspecialchars($node->getElementsByTagName('link')->item(0)->getAttribute('href'));
			
			echo "<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\"><tr><td style=\"padding:0px;margin:0px;border:0px;\">";
			echo "<div style=\"width:100%;font-size:10px;font-family: Tahoma, Verdana, Serif;margin-bottom:13px;margin-top:12px;\">";
			echo "<a href=\"".$app_link."\"><img style=\" width: 53px; height: 53px; -webkit-border-radius: 11px; -moz-border-radius: 11px;position:relative; float:left;\" border=\"0\" src=\"".$app_image."\"></img></a>";
			echo "<div style=\"margin-left:60px;padding-right:10px;\">";
			echo "<div style=\"\"><a href=\"".$app_link."\"><b>" . $app_title . "</b></a></div>";
			echo "<div style=\"\">" . $app_artist . "</div>";
			echo "<div style=\"\">" . $app_category . "</div>";
			echo "<div><b>" . $app_price . "</b></div>";
			echo "</div>";
			echo "</div>";
			echo "</td></tr></table>";
		}
		
	}
	
	
	function icwTap_theme_onlyimg($icwTap_link){
		$doc = new DOMDocument();
		$doc->load($icwTap_link);
		foreach ($doc->getElementsByTagName('entry') as $node) {
			$app_image = utf8_encode($node->getElementsByTagName('image')->item(0)->nodeValue);
			$app_link = htmlspecialchars($node->getElementsByTagName('link')->item(0)->getAttribute('href')); 
			
			echo "<a href=\"".$app_link."\"><img style=\" width: 53px; height: 53px; -webkit-border-radius: 11px; -moz-border-radius: 11px; margin:5px;margin-right:10px;margin-left:0px;\" border=\"0\" src=\"".$app_image."\"></img></a>";
		}
	}
	
	
	function icwTap_theme_appstore($icwTap_link){
		$doc = new DOMDocument();
		$doc->load($icwTap_link);
		$counterKey = 1;
		foreach ($doc->getElementsByTagName('entry') as $node) {
			$app_title = htmlspecialchars($node->getElementsByTagName('name')->item(0)->nodeValue);
			$app_image = utf8_encode($node->getElementsByTagName('image')->item(2)->nodeValue);
			$app_price = htmlspecialchars($node->getElementsByTagName('price')->item(0)->nodeValue);
			$app_category = htmlspecialchars($node->getElementsByTagName('category')->item(0)->getAttribute('label'));
			$app_link = htmlspecialchars($node->getElementsByTagName('link')->item(0)->getAttribute('href'));
			if($counterKey == 1){
				echo "<a href=\"".$app_link."\"><img style=\" width: 80px; height: 80px; -webkit-border-radius: 17px; -moz-border-radius: 17px;margin-top:5px;margin-left:10px;margin-bottom:5px;\" border=\"0\" src=\"".$app_image."\"></img></a>";
			}
			echo "<div style=\"width:100%;font-size:10px;font-family: Tahoma, Verdana, Serif;margin-bottom:10px;margin-top:5px;\">";
			echo "<div style=\"float:left;width:20px;text-align:right;\">".$counterKey.".</div>";
			echo "<div style=\"margin-left:23px;padding-right:10px;\">";
			echo "<div style=\"float:right;font-size:9px;width:75px;height:18px;text-align:right;padding-top:1px;margin-top:0px;padding-right:23px;color:#000000;background: url(" . WP_PLUGIN_URL . "/app-store-topcharts/img/price_bg.png\) no-repeat right top;\">";
			echo "<b>" . $app_price . "</b></div>";
			echo "<div style=\"\"><a href=\"".$app_link."\"><b>" . $app_title . "</b></a></div>";
			echo "<div style=\"\">" . $app_category . "</div>";
			echo "</div>";
			echo "</div>";
			$counterKey++;
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function icwTap_content($instance){
		global $country_data;
		// Link Creation
		$list_type = $instance['list_type'] . "/";
		
		$country_iso = $instance['country'];
		if($country_iso == "geo"){
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			$url = "http://api.hostip.info/country.php?ip=" . $ipAddress;
			$country_iso = file_get_contents($url);
		}
		
		$country_control = 0;
		foreach( $country_data as $id_country => $country ){
			if($country['iso3166'] == $country_iso){
				$country_control = 1;
				$country_code = $country['code'];
			}
		}
		if($country_control != 1){
			$country_code = "143441";
		}
		$country_code = "sf=" . $country_code . "/";
		
		$list_limit = $instance['number'];
		$list_limit = "limit=" . $list_limit . "/";
		
		$category = $instance['category'];
		if($category != ""){
			$category = "genre=" . $category . "/";
		}
		else{
			$category = "";
		}
		
		$icwTap_link = "http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/" . $list_type . $country_code . $list_limit . $category . "xml";
		
		switch ($instance['theme']){
			case 'default':
				icwTap_theme_default($icwTap_link);
				break;
			case 'onlyimg':
				icwTap_theme_onlyimg($icwTap_link);
				break;
			case 'appstore':
				icwTap_theme_appstore($icwTap_link);
				break;
			default:
				icwTap_theme_default($icwTap_link);
				break;
		}
		
	}
	
	function icwTap_list_type_select($instance){ 
		echo "<option value=\"topfreeapplications\""; if($instance['list_type']=="topfreeapplications"){echo " selected";}  echo " >Top Free Apps</option>";
		echo "<option value=\"toppaidapplications\""; if($instance['list_type']=="toppaidapplications"){echo " selected";}  echo " >Top Paid Apps</option>";
		echo "<option value=\"topgrossingapplications\""; if($instance['list_type']=="topgrossingapplications"){echo " selected";}  echo " >Top Grossing Apps</option>";
		echo "<option value=\"topfreeipadapplications\""; if($instance['list_type']=="topfreeipadapplications"){echo " selected";}  echo " >Top Free Apps for iPad</option>";
		echo "<option value=\"toppaidipadapplications\""; if($instance['list_type']=="toppaidipadapplications"){echo " selected";}  echo " >Top Paid Apps for iPad</option>";
		echo "<option value=\"topgrossingipadapplications\""; if($instance['list_type']=="topgrossingipadapplications"){echo " selected";}  echo " >Top Grossing Apps for iPad</option>";
	}
	
	function icwTap_category_select($instance){
		echo "<option value=\"\""; if($instance['category']==""){echo " selected";}  echo " >All Categories</option>";
		echo "<option value=\"6018\""; if($instance['category']=="6018"){echo " selected";}  echo " >Books</option>";
		echo "<option value=\"6000\""; if($instance['category']=="6000"){echo " selected";}  echo " >Business</option>";
		echo "<option value=\"6017\""; if($instance['category']=="6017"){echo " selected";}  echo " >Education</option>";
		echo "<option value=\"6016\""; if($instance['category']=="6016"){echo " selected";}  echo " >Enterainment</option>";
		echo "<option value=\"6015\""; if($instance['category']=="6015"){echo " selected";}  echo " >Finance</option>";
		echo "<option value=\"6014\""; if($instance['category']=="6014"){echo " selected";}  echo " >Games</option>";
		echo "<option value=\"6013\""; if($instance['category']=="6013"){echo " selected";}  echo " >Healthcare & Fitness</option>";
		echo "<option value=\"6012\""; if($instance['category']=="6012"){echo " selected";}  echo " >Lifestyle</option>";
		echo "<option value=\"6020\""; if($instance['category']=="6020"){echo " selected";}  echo " >Medical</option>";
		echo "<option value=\"6011\""; if($instance['category']=="6011"){echo " selected";}  echo " >Music</option>";
		echo "<option value=\"6010\""; if($instance['category']=="6010"){echo " selected";}  echo " >Navigation</option>";
		echo "<option value=\"6009\""; if($instance['category']=="6009"){echo " selected";}  echo " >News</option>";
		echo "<option value=\"6008\""; if($instance['category']=="6008"){echo " selected";}  echo " >Photography</option>";
		echo "<option value=\"6007\""; if($instance['category']=="6007"){echo " selected";}  echo " >Productivity</option>";
		echo "<option value=\"6006\""; if($instance['category']=="6006"){echo " selected";}  echo " >Reference</option>";
		echo "<option value=\"6005\""; if($instance['category']=="6005"){echo " selected";}  echo " >Social Networking</option>";
		echo "<option value=\"6004\""; if($instance['category']=="6004"){echo " selected";}  echo " >Sports</option>";
		echo "<option value=\"6003\""; if($instance['category']=="6003"){echo " selected";}  echo " >Travel</option>";
		echo "<option value=\"6002\""; if($instance['category']=="6002"){echo " selected";}  echo " >Utilities</option>";
		echo "<option value=\"6001\""; if($instance['category']=="6001"){echo " selected";}  echo " >Weather</option>";
	}
	
	function icwTap_number_select($instance){
		echo "<option value=\"10\""; if($instance['number']=="10"){echo " selected";}  echo " >10</option>";
		echo "<option value=\"25\""; if($instance['number']=="25"){echo " selected";}  echo " >25</option>";
		echo "<option value=\"50\""; if($instance['number']=="50"){echo " selected";}  echo " >50</option>";
		echo "<option value=\"100\""; if($instance['number']=="100"){echo " selected";}  echo " >100</option>";
		echo "<option value=\"300\""; if($instance['number']=="300"){echo " selected";}  echo " >300</option>";
	}
	
	function icwTap_theme_select($instance){
		echo "<option value=\"default\""; if($instance['theme']=="default"){echo " selected";}  echo " >Default</option>";
		echo "<option value=\"appstore\""; if($instance['theme']=="appstore"){echo " selected";}  echo " >App Store</option>";
		echo "<option value=\"onlyimg\""; if($instance['theme']=="onlyimg"){echo " selected";}  echo " >Only Images</option>";
	}
	
	function icwTap_country_select($instance){
		global $country_data;
		echo "<option value=\"geo\""; if($instance['country']=="geo"){echo " selected";}  echo " >Geo Lacalization</option>";
		foreach( $country_data as $id_country => $country ){
			echo "<option value=\"".$country['iso3166']."\"";
			if( $instance['country'] == $country['iso3166'] ){
				echo " selected";
			}  
			echo " >".$country['country']."</option>";
		}
	}
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	class icwTap extends WP_Widget {
		
		function icwTap(){
			$widget_ops = array( 'classname' => 'app-store-topcharts', 'description' => 'A widget to show the top lists of the App Store.' );
			$this->WP_Widget( 'app-store-topcharts', 'App Store TopCharts', $widget_ops );
		}
		
		function widget( $args,$instance ) {
			extract( $args );
			$title = apply_filters('widget_title',$instance['title']);
			
			echo $before_widget;
			echo $before_title . $title . $after_title;
			icwTap_content($instance);
			echo $after_widget;
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			// Istance Update
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['list_type'] = $new_instance['list_type'];
			$instance['category'] = $new_instance['category'];
			$instance['country'] = $new_instance['country'];
			$instance['number'] = $new_instance['number'];
			$instance['theme'] = $new_instance['theme'];
			
			return $instance;
		}
		
		function form($instance){	
			$defaults = array( 'title' => 'App Store TopCharts' , 'list_type' => 'topfreeapplications' , 'category' => '' , 'country' => 'geo' , 'number' => '10' , 'theme' => 'default' );
			$instance = wp_parse_args( (array) $instance, $defaults );
			
			echo "<label for=\"".$this->get_field_id( 'title' )."\">Widget's Title</label>";
			echo "<input id=\"".$this->get_field_id( 'title' )."\" name=\"".$this->get_field_name( 'title' )."\" value=\"".$instance['title']."\" style=\"width:213px;margin-bottom:10px;\" />";
			echo "<label for=\"".$this->get_field_id( 'list_type' )."\">List Type</label>";
			echo "<select id=\"".$this->get_field_id( 'list_type' )."\" name=\"".$this->get_field_name( 'list_type' )."\" style=\"width:100%;margin-bottom:10px;\" >";
			icwTap_list_type_select($instance);
			echo "</select>";
			echo "<label for=\"".$this->get_field_id( 'category' )."\">Category</label>";
			echo "<select id=\"".$this->get_field_id( 'category' )."\" name=\"".$this->get_field_name( 'category' )."\" style=\"width:100%;margin-bottom:10px;\" >";
			icwTap_category_select($instance);
			echo "</select>";
			echo "<label for=\"".$this->get_field_id( 'country' )."\">Store's Country</label>";
			echo "<select id=\"".$this->get_field_id( 'country' )."\" name=\"".$this->get_field_name( 'country' )."\" style=\"width:100%;margin-bottom:10px;\" >";
			icwTap_country_select($instance);
			echo "</select>";
			echo "<label for=\"".$this->get_field_id( 'number' )."\">Items' Number</label>";
			echo "<select id=\"".$this->get_field_id( 'number' )."\" name=\"".$this->get_field_name( 'number' )."\" style=\"width:100%;margin-bottom:10px;\" >";
			icwTap_number_select($instance);
			echo "</select>";
			echo "<label for=\"".$this->get_field_id( 'theme' )."\">Widget Theme</label>";
			echo "<select id=\"".$this->get_field_id( 'theme' )."\" name=\"".$this->get_field_name( 'theme' )."\" style=\"width:100%;margin-bottom:10px;\" >";
			icwTap_theme_select($instance);
			echo "</select>";
		}

	}

	
	function icwTap_reg() {
		register_widget( 'icwTap' );
	}
	
	add_action( 'widgets_init', 'icwTap_reg' );

	
?>