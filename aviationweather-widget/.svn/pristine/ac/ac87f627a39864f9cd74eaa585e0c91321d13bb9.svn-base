<?php
/*
Plugin Name: AviationWeather Plugin
Plugin URI: http://wordpress.org/extend/plugins/aviationweather-widget/
Description: Plugin to show the latest METAR and TAF information from AviationWeather.org for any ICAO Code.
Version: 1.1
Author: Alessio Bravi
Author URI: http://blog.bravi.org/
License: GPL3
*/

class AviationWeatherWidget extends WP_Widget {

 public function __construct() {
   parent::__construct(
     'aviationweather-widget',
     'Aviation Weather Widget',
     array( 'description' => __( 'Show the latest METAR and TAF information from AviationWeather.org Aviation Digital Data Service (ADDS) for any ICAO Code.', 'text_domain' ), )
   );
 }

 function widget($args, $instance) {
  extract ($args);
  $title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );
  $ICAO_Code = $instance["ICAO_Code"];
  $printlink = $instance['printlink'];
  $AviationWeatherURL = 'http://aviationweather.gov/adds/metars/index.php?station_ids='.$ICAO_Code.'&chk_metars=on&chk_tafs=on&std_trans=standard&submit=1';

  $handle = curl_init();
  curl_setopt($handle, CURLOPT_URL, $AviationWeatherURL);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  $curl_response = curl_exec($handle);
  curl_close($handle);

  $StartStrPos = strpos($curl_response, $ICAO_Code);
  $RawBulletin = substr($curl_response, $StartStrPos, (strlen($curl_response)-$startStrPos));

  echo $before_widget;
  echo $before_title;
  echo $title;
  if ($printlink == true) {
    echo ' (<a href="'.htmlspecialchars($AviationWeatherURL).'" target="_blank">'.$ICAO_Code.'</a>)';
  }
  echo $after_title;
  echo '<div class="aviationweather-widget" id="'.$args['widget_id'] .'-bulletin">';
  if (preg_match('/no data available for your request/', $RawBulletin)) {
    echo 'Weather Data Not Available.';
  }
  else {
    $WeatherBulletin = preg_replace('/\s+/', ' ',strip_tags($RawBulletin));
    if (preg_match('/TAF/', $WeatherBulletin)) {
      $WeatherBulletin = preg_replace('/TAF/', '<br>TAF',$WeatherBulletin);
    }
    else {
      $WeatherBulletin = preg_replace('/'.$ICAO_Code.'/', '<br>'.$ICAO_Code,$WeatherBulletin);
    }
    $WeatherBulletin = preg_replace('/FM /', '<br>FM ',$WeatherBulletin);
    $WeatherBulletin = preg_replace('/BECMG /', '<br>BECMG ',$WeatherBulletin);
    $WeatherBulletin = preg_replace('/TEMPO /', '<br>TEMPO ',$WeatherBulletin);
    echo preg_replace('/^(<br>)+/', '', $WeatherBulletin);
  }
  echo '</div>';
  echo $after_widget;
 }

 function update($new_instance, $old_instance) {
  $instance = array();
  $instance['title'] = strip_tags($new_instance['title']);
  $instance["ICAO_Code"] = strtoupper(substr(strip_tags($new_instance["ICAO_Code"]), 0, 4));
  $instance['printlink'] = strip_tags($new_instance['printlink']);
  return $instance;
 }

 public function form( $instance ) {
   if (isset($instance['title'])) {
     $title = strip_tags($instance['title']);
   }
   else {
     $title = __( 'Weather Bulletin', 'text_domain' );
   }
   if (isset($instance['ICAO_Code'])) {
     $ICAO_Code = strip_tags($instance['ICAO_Code']);
   }
   else {
     $ICAO_Code = __( 'LIRZ', 'text_domain' );
   }
   $tableId = $this->get_field_id("ICAO_Code");
   $tableName = $this->get_field_name("ICAO_Code");
   $printlink = esc_attr($instance['printlink']);
   ?>
   <p>
   <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
   </p>
   <p>
   <label for="<?php echo $this->get_field_id( 'ICAO_Code' ); ?>"><?php _e( 'ICAO Identification Code:' ); ?></label>
   <input class="widefat" id="<?php echo $this->get_field_id( 'ICAO_Code' ); ?>" name="<?php echo $this->get_field_name( 'ICAO_Code' ); ?>" type="text" value="<?php echo esc_attr( $ICAO_Code ); ?>" />
   </p>
   <p>
   <input id="<?php echo $this->get_field_id('printlink'); ?>" name="<?php echo $this->get_field_name('printlink'); ?>" type="checkbox" value="1" <?php checked( '1', $printlink); ?>/>
   <label for="<?php echo $this->get_field_id('printlink'); ?>"><?php _e('Print AeroWeather Link to ICAO Code.'); ?></label>
   </p>
   <?php
 }

}

add_action('widgets_init', create_function('', 'return register_widget("AviationWeatherWidget");'));

?>

