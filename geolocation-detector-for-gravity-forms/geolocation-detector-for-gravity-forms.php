<?php
/*
Plugin Name: Geolocation Detector for Gravity Forms
Plugin URI: http://dcgws.com/resources/plugins-software/geolocation-detector-for-gravity-forms/
Description: Provides a dynamic country detection for Gravity Forms . Requires GeoIP Detect Plugin.
Donate link: https://www.paypal.me/DCGWS/
Version: 1.0.3
Author: DCGWS Internet Solutions
Author URI: http://dcgws.com
*/

add_action('init','requirements_check');
function requirements_check() {
	if (!class_exists('GFCommon') || !defined('GEOIP_DETECT_VERSION')) {
		add_action( 'admin_notices', 'requirements_failed' );
	}
}
function requirements_failed() {
	$class = 'notice notice-error';
	$message = 'Geolocation Detector for Gravity Forms: Gravity Forms and GeoIP Detection should be installed and activated in order to use this plugin.';

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}
// Add a custom field button to the advanced to the field editor
add_filter( 'gform_add_field_buttons', 'wps_add_getip_field' );
function wps_add_getip_field( $field_groups ) {
    foreach( $field_groups as &$group ){
        if( $group["name"] == "advanced_fields" ){ // to add to the Advanced Fields
        //if( $group["name"] == "standard_fields" ){ // to add to the Standard Fields
        //if( $group["name"] == "post_fields" ){ // to add to the Standard Fields
            $group["fields"][] = array(
                "class"=>"button",
                "value" => __("Geolocation", "gravityforms"),
                "onclick" => "StartAddField('getip');"
            );
            break;
        }
    }
    return $field_groups;
}

// Adds title to GF custom field
add_filter( 'gform_field_type_title' , 'wps_getip_title' );
function wps_getip_title( $type ) {
    if ( $type == 'getip' )
        return __( "Get user's geolocation by IP adress" , 'gravityforms' );
}


 // Adds the input area to the external side
add_action( "gform_field_input" , "wps_getip_field_input", 10, 5 );
function wps_getip_field_input ( $input, $field, $value, $lead_id, $form_id ){

    if ( $field["type"] == "getip" ) {
        $max_chars = "";
        if(!IS_ADMIN && !empty($field["maxLength"]) && is_numeric($field["maxLength"]))
            $max_chars = GFCommon::get_counter_script($form_id, $field_id, $field["maxLength"]);

        $input_name = $form_id .'_' . $field["id"];
        $tabindex = GFCommon::get_tabindex();
        $css = isset( $field['cssClass'] ) ? $field['cssClass'] : '';
        return sprintf("<input type='hidden' name='input_%s' id='%s' value='%s'/>", $field["id"], 'getip-'.$field['id'] , esc_html($value));

    }

    return $input;
}

// Now we execute some javascript technicalitites for the field to load correctly
add_action( "gform_editor_js", "wps_gform_editor_js" );
function wps_gform_editor_js(){
?>

<script type='text/javascript'>

    jQuery(document).ready(function($) {
        fieldSettings["getip"] = ".label_setting, .default_value_setting, .prepopulate_field_setting, .visibility_setting"; //this will show all the fields of the Paragraph Text field minus a couple that I didn't want to appear.
        //binding to the load field settings event to initialize the checkbox
        $(document).bind("gform_load_field_settings", function(event, field, form){
            jQuery("#field_getip").attr("checked", field["field_getip"] == true);
            $("#field_getip_value").val(field["getip"]);
        });
    });

</script>
<?php
}

add_filter("gform_field_value_ipcountry", "populate_country");
function populate_country($value){
    $country =  do_shortcode('[geoip_detect2 property="country"]');
   return $country;
}

add_filter("gform_field_value_ipcity", "populate_city");
function populate_city($value){
    $city =  do_shortcode('[geoip_detect2 property="city"]');
   return $city;
}
add_filter("gform_field_value_ipprovince", "populate_province");
function populate_province($value){
    $province =  do_shortcode('[geoip_detect2 property="mostSpecificSubdivision"]');
   return $province;
}

add_filter("gform_field_value_iplongitude", "populate_longitude");
function populate_longitude($value){
    $longitude =  do_shortcode('[geoip_detect2 property="location.longitude"]');
   return $longitude;
}

add_filter("gform_field_value_iplatitude", "populate_latitude");
function populate_latitude($value){
    $latitude =  do_shortcode('[geoip_detect2 property="location.latitude"]');
   return $latitude;
}

add_filter("gform_field_value_iptimezone", "populate_timezone");
function populate_timezone($value){
    $latitude =  do_shortcode('[geoip_detect2 property="location.timeZone"]');
   return $latitude;
}

add_filter("gform_field_value_ipcontinent", "populate_continent");
function populate_continent($value){
    $continent =  do_shortcode('[geoip_detect2 property="continent"]');
   return $continent;
}
