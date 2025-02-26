<?php
/* CUSTOM FUNCTIONS FOR ADs PLUGIN*/

/*Function for Creating Shortcodes*/
	function metaads($atts) {
	 
	 extract(shortcode_atts(array(
                'ad' => 'default'
       ), $atts));
	   
	   global $wpdb;
		 $table_name = $wpdb->prefix . "METAAPP_ADS"; 
		 global $wpdb;
	$res = $wpdb->get_results("SELECT METAAPP_AD_CODE,METAAPP_AD_STYLE FROM $table_name WHERE METAAPP_AD_NAME = '$ad'");
	foreach ($res as $rs) 
 	return '<div class="'.$rs->METAAPP_AD_STYLE.'" id="'.$ad.'" >'.stripslashes($rs->METAAPP_AD_CODE).'</div>';
	}
	
	/*Function for reading ads from saved database*/
	function readmetaads()
	{
		global $wpdb;
		 $table_name = $wpdb->prefix . "METAAPP_ADS"; 
		 global $wpdb;
		 $res = $wpdb->get_results("SELECT METAAPP_AD_NAME FROM $table_name");
		 $count = 0;
		 foreach ($res as $rs) 
		 {
			 $DATA[$count]=$rs->METAAPP_AD_NAME;
			 $count++;
			 }
		return $DATA;
		}

	/*Function for inserting Ads data into Database*/
	function insert($IN_AD_NAME,$IN_AD_CODE,$IN_AD_STYLE)
	{
		global $wpdb;
   		$table_name = $wpdb->prefix . "METAAPP_ADS"; 
  		global $wpdb;
		$AD_NAME = $IN_AD_NAME;
		$AD_CODE = $IN_AD_CODE;
		$AD_STYLE = $IN_AD_STYLE;

  	$rows_affected = $wpdb->insert( $table_name, array( 'METAAPP_AD_NAME' => $AD_NAME, 'METAAPP_AD_CODE' => $AD_CODE, 'METAAPP_AD_STYLE' => $AD_STYLE ) );
	}

	/*Function for Updating Ads data after modifying into database table*/
	function update($IN_AD_ID,$IN_AD_CODE,$IN_AD_STYLE)	{
	
		global $wpdb;
 		$table_name = $wpdb->prefix . "METAAPP_ADS"; 
  		global $wpdb;
		$wpdb->update($table_name, 
		array( 
			'METAAPP_AD_CODE' => $IN_AD_CODE,
			'METAAPP_AD_STYLE' => $IN_AD_STYLE
		),
		array(
			'METAAPP_AD_ID' => $IN_AD_ID
		)
 
	);

}

	/*Function for Deleting data from database table*/
	function delete($IN_AD_ID)	{
		global $wpdb;
 		$table_name = $wpdb->prefix . "METAAPP_ADS"; 
  		global $wpdb;
		$wpdb->query('DELETE FROM '.$table_name.' WHERE METAAPP_AD_ID = '.$IN_AD_ID);
}

		/*Registering Styles for Plugin's Setting Option Page*/
    	function add_stylesheet() {
       
            wp_register_style('base-style', plugins_url('style.css',__FILE__), array(), '1', 'screen'); 
			wp_enqueue_style('base-style');
    }
	
	/*Funtion to Load JS (JavaScript) File*/
	function pw_load_scripts() {
	wp_enqueue_script('custom-js', plugins_url('script.js',__FILE__));
	wp_localize_script('custom-js', 'pw_script_vars', array(
			'ad' => __(readmetaads())
		));
}

 	/*Function for Deleting database while uninstall the plugin*/
	function uninstall() {

		global $wpdb;
   		$table_name = $wpdb->prefix . "METAAPP_ADS"; 
  		global $wpdb;
		$wpdb->query('DROP TABLE '.$table_name);
}

/*Funtion for Adding Button on Plugin's setting option page*/
function Adsbutton() {
    global $typenow;
    /*checking for user permissions*/
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    /*verifying post type*/
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
	/*checking if WYSIWYG is enabled*/
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "add_tinymce_plugin");
		add_filter('mce_buttons', 'register_my_tc_button');
	}
}
/*Funtion for Changing Button Script*/
function add_tinymce_plugin($plugin_array) {
   	$plugin_array['AP_tc_button'] = plugins_url( '/button.js', __FILE__ );
   	return $plugin_array;
}
/*Function to Register Buttons with WordPress*/
function register_my_tc_button($buttons) {
   array_push($buttons, "AP_tc_button");
   return $buttons;
}
/*Meta App Opting Menu Starts Here (Part 1)*/
function METAAPP_menu() {
	add_menu_page( 'Ads Plugin Options', 'Ads', 'manage_options', 'METAAPP', 'METAAPP_options', 'dashicons-universal-access' );
}
?>