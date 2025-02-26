<?PHP
/**
 * @package Maha Salat Times
 * @version 1.0.0
 */
/*
Plugin Name: Maha Salat Times
Plugin URI:  wordpress.org/plugins/maha-salat-times/
Description: Simple way to add your Masjids Salat Times on your wordpress website. To use, navigate to Settings/MST Options. Change settings to your requirements. Then use the following shortcode anywhere on your site [maha-salat-times] 
Author: Qamar Ramzan
Version: 1.0.0
Author URI: http://www.qamarramzan.com/
License: GPLv2 or later
*/

/*

Maha Salat Times is a free software; you can re-distribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or any later version.

Maha Salat Times is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

Copyright: Qamar Ramzan 2018

*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );






/*
 * Load scripts and styles.
 */
 
function maha_salat_scripts() {
	
    // CSS
   
    wp_enqueue_style( 'mst-css', plugins_url( 'css/mst.css', __FILE__ ) );	
    
	// SCRIPTS
	//wp_enqueue_script('jquery');
	//wp_enqueue_script( 'mft-js', plugins_url( 'js/mft.js', __FILE__ ), true);

}


/**
 *CREATE ADMIN OPTIONS
 */
 
 
function mst_menu() {

    add_options_page( 'Maha\'s Salat Times', 'MST Options', 'manage_options', 'mst_options', 'mst_options' );
} 
 


if ( is_admin() ){ // admin actions

    add_action( 'admin_menu', 'mst_menu' );
    add_action( 'admin_init', 'register_mst_settings' );
}

    
// non-admin enqueues, actions, and filters
add_action( 'wp_enqueue_scripts', 'maha_salat_scripts',10000);


function register_mst_settings() { // whitelist options


    register_setting( 'mst-group', 'salat_method' );
    register_setting( 'mst-group', 'salat_juristic' );
    register_setting( 'mst-group', 'salat_longitude' );
    register_setting( 'mst-group', 'salat_latitude' );
    register_setting( 'mst-group', 'salat_timezone' );
    register_setting( 'mst-group', 'salat_timeformat' );
    register_setting( 'mst-group', 'salat_highlatsmethod' );
    

    register_setting( 'mst-group', 'fajr_rename' );
    register_setting( 'mst-group', 'zuhur_rename' );
    register_setting( 'mst-group', 'asr_rename' );
    register_setting( 'mst-group', 'maghrib_rename' );
    register_setting( 'mst-group', 'isha_rename' );
    register_setting( 'mst-group', 'jumah_rename' );
    register_setting( 'mst-group', 'sunrise_rename' );
    
    
    register_setting( 'mst-group', 'fajr_jamat' );
    register_setting( 'mst-group', 'zuhur_jamat' );
    register_setting( 'mst-group', 'asr_jamat' );
    register_setting( 'mst-group', 'maghrib_jamat' );
    register_setting( 'mst-group', 'isha_jamat' );
    register_setting( 'mst-group', 'jumah_jamat' );
    
    
    register_setting( 'mst-group', 'salat_blurb' );
   
    
}

 
function mst_options() {

	if ( !current_user_can( 'manage_options' ) )  {
    
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        
	}
    
?>    
    
<div class="wrap">
    
	<h1>Maha's Salat Times - Settings</h1>
    <p>This plugin allows you to add your masjids daily prayer timetable on your website.</p>
    <p>To use just enter your settings below and add the following shortcode to any page or widget on your site  <strong><pre>[maha-salat-times]</pre></strong> </p>
    <p>IMPORTANT: Please ensure you clear any cache if you are using a cache plugin.</p>
    <p>Special thanks you to Hamid Zarrabi-Zadeh at PrayTimes.org for the use of his prayer calculation script.</p> 

    
    
    
    <div class="card">
        <h2 class="title">Extending the shortcode</h2>
        <p>You can further customise by passing your own values  e.g. <strong><pre>[maha-salat-times heading="My Own Heading", show_jamat="yes"]</pre></strong></p>
        <h2 class="title">Attributes</h2>
        <p>
            heading // To change the heading<br />
            start // To change the default 'Start' title'<br />
            jamat // To change the default 'Jamat' title'<br />
            show_blurb // yes/no<br /> 
            show_heading // yes/no <br />
            show_date // yes/no<br />
            show_jamat // yes/no<br />

    </p>
    </div>
    <hr />
    <form method="post" action="options.php">
        
        
<?PHP        
    settings_fields( 'mst-group' );
    do_settings_sections( 'mst-group' );
    

    // add default
    $salat_method_selected = get_option('salat_method'); 
    if ($salat_method_selected == false ) {
        $salat_method_selected = 'MWL' ;   
    }


?>
    <h2 class="title">Calculation Settings</h2>
    <p>To ensure you get accurate salat times please make sure you enter the correct timezone, latitude and Longitude values. The other settings are optional and you should change them to tune the calculations to your preferences. Visit <a  target="new" href="http://www.praytimes.org">www.praytimes.org</a> for full details on these settings</p>
    
    <table class="form-table">
       <tr>
            <th scope="row">
                <label for="salat_method">Calculation Methods </label>
            </th>

            <td>

                <select name="salat_method" autocomplete="off">                    

                    <option value="Jafari" <?PHP if ( $salat_method_selected == 'Jafari' )  { echo 'selected'; };  ?> >Ithna Ashari</option>
                    <option value="Karachi" <?PHP if ( $salat_method_selected == 'Karachi' )  { echo 'selected'; };  ?> >University of Islamic Sciences, Karachi</option>
                    <option value="ISNA" <?PHP if ( $salat_method_selected == 'ISNA')  { echo 'selected'; };  ?> >Islamic Society of North America (ISNA)</option>
                    <option value="MWL" <?PHP if ( $salat_method_selected == 'MWL' )  { echo 'selected'; };  ?> >Muslim World League (MWL)</option>
                    <option value="Makkah" <?PHP if ( $salat_method_selected == 'Makkah' )  { echo 'selected'; };  ?> >Umm al-Qura, Makkah</option>
                    <option value="Egypt" <?PHP if ( $salat_method_selected == 'Egypt' )  { echo 'selected'; };  ?> >Egyptian General Authority of Survey</option>
                    <option value="Custom" <?PHP if ( $salat_method_selected == 'Custom' )  { echo 'selected'; };  ?> >Custom Setting</option>
                    <option value="Tehran" <?PHP if ( $salat_method_selected == 'Tehran' )  { echo 'selected'; };  ?> >Institute of Geophysics, University of Tehran</option>

                </select>
                
            </td>
        </tr>
    

    
<?PHP
    
    // add default
    $salat_juristic_selected = get_option('salat_juristic'); 
    if ( $salat_juristic_selected == false ) {
        $salat_juristic_selected = 'Shafii';   
    }
    
?>  
    
        <tr>
     
            <th scope="row">
                <label for="salat_juristic">Juristic Methods for Asr Time</label>
            </th>

            <td>

                <select name="salat_juristic" autocomplete="off" >     

                    <option value="Shafii" <?PHP if ( $salat_juristic_selected == 'Shafii' )  { echo 'selected'; };  ?> >Shafii</option>
                    <option value="Hanafi" <?PHP if ( $salat_juristic_selected == 'Hanafi' )  { echo 'selected'; };  ?> >Hanafi</option>

                </select>
                
            </td>
    
        </tr>
    
  <?PHP
    
    // add default
    $salat_timeformat_selected = get_option('salat_timeformat'); 
    if ( $salat_timeformat_selected == false ) {
        $salat_timeformat_selected = 'Time12NS';
    }
    
?>  
    
        <tr>
        
            <th scope="row">
                <label for="salat_timeformat">Time Formats</label>
            </th>

            <td>

                <select name="salat_timeformat" autocomplete="off">     

                    <option value="Time24" <?PHP if ( $salat_timeformat_selected == 'Time24' )  { echo 'selected'; };  ?> >24-hour format</option>
                    <option value="Time12" <?PHP if ( $salat_timeformat_selected == 'Time12' )  { echo 'selected'; };  ?> >12-hour format</option>
                    <option value="Time12NS" <?PHP if ( $salat_timeformat_selected == 'Time12NS' )  { echo 'selected'; };  ?> >12-hour format with no suffix</option>
                    <option value="Float" <?PHP if ( $salat_timeformat_selected == 'Float' )  { echo 'selected'; };  ?> >floating point number</option>

                </select>

            </td>

        </tr>
    
    
<?PHP
    
    // add default
    $salat_highlatsmethod_selected = get_option('salat_highlatsmethod'); 
    if ( $salat_highlatsmethod_selected == false ) {
        $salat_highlatsmethod_selected = 'AngleBased'; 
    }
    
?>  
    
        <tr>
    
            <th scope="row">
                <label for="salat_highlatsmethod">Adjust method for higher latitudes</label>
            </th>
            
            <td>

                <select name="salat_highlatsmethod" autocomplete="off">     

                    <option value="None" <?PHP if ( $salat_highlatsmethod_selected == 'None' )  { echo 'selected'; };  ?> >No adjustment</option>
                    <option value="MidNight" <?PHP if ( $salat_highlatsmethod_selected == 'MidNight' )  { echo 'selected'; };  ?> >Middle of night</option>
                    <option value="OneSeventh" <?PHP if ( $salat_highlatsmethod_selected == 'OneSeventh' )  { echo 'selected'; };  ?> >1/7th of night</option>
                    <option value="AngleBased" <?PHP if ( $salat_highlatsmethod_selected == 'AngleBased' )  { echo 'selected'; };  ?> >Angle/60th of night</option>

                </select>

            </td>
    
        </tr>
    
<?PHP
    
    // add default
    $salat_timezone_selected = get_option('salat_timezone'); 
    if ( $salat_timezone_selected == false ) {
        $salat_timezone_selected = 0; 
    }
    
?>
    
        <tr>
    
 
            <th scope="row">
                <label for="salat_timezone">Timezone</label>
            </th>
            
            <td>

                <select name="salat_timezone" autocomplete="off">     

                    <option value="-12" <?PHP if ( $salat_timezone_selected == -12 )  { echo 'selected'; };  ?> >GMT -12</option>
                    <option value="-11" <?PHP if ( $salat_timezone_selected == -11 )  { echo 'selected'; };  ?>>GMT -11</option>
                    <option value="-10" <?PHP if ( $salat_timezone_selected == -10 )  { echo 'selected'; };  ?>>GMT -10</option>
                    <option value="-9" <?PHP if ( $salat_timezone_selected == -9 )  { echo 'selected'; };  ?>>GMT -9</option>
                    <option value="-8" <?PHP if ( $salat_timezone_selected == -8 )  { echo 'selected'; };  ?>>GMT -8</option>
                    <option value="-7" <?PHP if ( $salat_timezone_selected == -7 )  { echo 'selected'; };  ?>>GMT -7</option>
                    <option value="-6" <?PHP if ( $salat_timezone_selected == -6 )  { echo 'selected'; };  ?>>GMT -6</option>
                    <option value="-5" <?PHP if ( $salat_timezone_selected == -5 )  { echo 'selected'; };  ?>>GMT -5</option>
                    <option value="-4.5" <?PHP if ( $salat_timezone_selected == -4.5 )  { echo 'selected'; };  ?>>GMT -4:30</option>
                    <option value="-4" <?PHP if ( $salat_timezone_selected == -4 )  { echo 'selected'; };  ?>>GMT -4</option>
                    <option value="-3.5" <?PHP if ( $salat_timezone_selected == -3.5 )  { echo 'selected'; };  ?>>GMT -3:30</option>
                    <option value="-3" <?PHP if ( $salat_timezone_selected == -3 )  { echo 'selected'; };  ?>>GMT -3</option>
                    <option value="-2" <?PHP if ( $salat_timezone_selected == -2 )  { echo 'selected'; };  ?>>GMT -2</option>
                    <option value="-1" <?PHP if ( $salat_timezone_selected == -1 )  { echo 'selected'; };  ?>>GMT -1</option>
                    <option value="0" <?PHP if ( $salat_timezone_selected == 0 )  { echo 'selected'; };  ?>>GMT 0</option>
                    <option value="1" <?PHP if ( $salat_timezone_selected == 1 )  { echo 'selected'; };  ?>>GMT +1</option>
                    <option value="2" <?PHP if ( $salat_timezone_selected == 2 )  { echo 'selected'; };  ?>>GMT +2</option>
                    <option value="3" <?PHP if ( $salat_timezone_selected == 3 )  { echo 'selected'; };  ?>>GMT +3</option>
                    <option value="3.5" <?PHP if ( $salat_timezone_selected == 3.5 )  { echo 'selected'; };  ?>>GMT +3:30</option>
                    <option value="4"<?PHP if ( $salat_timezone_selected == 4 )  { echo 'selected'; };  ?> >GMT +4</option>
                    <option value="4.5"<?PHP if ( $salat_timezone_selected == 4.5 )  { echo 'selected'; };  ?> >GMT +4:30</option>
                    <option value="5"<?PHP if ( $salat_timezone_selected == 5 )  { echo 'selected'; };  ?> >GMT +5</option>
                    <option value="5.5" <?PHP if ( $salat_timezone_selected == 5.5 )  { echo 'selected'; };  ?>>GMT +5:30</option>
                    <option value="5.75" <?PHP if ( $salat_timezone_selected == 5.75 )  { echo 'selected'; };  ?>>GMT +5:45</option>
                    <option value="6" <?PHP if ( $salat_timezone_selected == 6 )  { echo 'selected'; };  ?>>GMT +6</option>
                    <option value="6.5" <?PHP if ( $salat_timezone_selected == 6.5 )  { echo 'selected'; };  ?> >GMT +6:30</option>
                    <option value="7" <?PHP if ( $salat_timezone_selected == 7 )  { echo 'selected'; };  ?>>GMT +7</option>
                    <option value="8" <?PHP if ( $salat_timezone_selected == 8 )  { echo 'selected'; };  ?>>GMT +8</option>
                    <option value="9" <?PHP if ( $salat_timezone_selected == 9 )  { echo 'selected'; };  ?>>GMT +9</option>
                    <option value="9.5" <?PHP if ( $salat_timezone_selected == 9.5 )  { echo 'selected'; };  ?>>GMT +9:30</option>
                    <option value="10" <?PHP if ( $salat_timezone_selected == 10 )  { echo 'selected'; };  ?>>GMT +10</option>
                    <option value="10.5" <?PHP if ( $salat_timezone_selected == 10.5 )  { echo 'selected'; };  ?>>GMT +10:30</option>
                    <option value="11" <?PHP if ( $salat_timezone_selected == 11 )  { echo 'selected'; };  ?>>GMT +11</option>
                    <option value="12" <?PHP if ( $salat_timezone_selected == 12 )  { echo 'selected'; };  ?>>GMT +12</option>
                    <option value="13" <?PHP if ( $salat_timezone_selected == 13 )  { echo 'selected'; };  ?>>GMT +13</option>

                </select>

            </td>
        </tr>
       
        <tr>
            <th scope="row">
                <label for="salat_latitude">Latitude</label>
            </th>
            <td>
                <input type="text" name="salat_latitude" value="<?php echo get_option('salat_latitude'); ?>" />
                <p class="description">e.g. 51.509865</p>
            </td>
            
        </tr>
        
        <tr>
            <th scope="row">
                <label for="salat_longitude">Longitude</label>
            </th>
            
            <td>
                <input type="text" name="salat_longitude" value="<?php echo get_option('salat_longitude'); ?>" />
                <p class="description">e.g. -0.118092</p>
            </td>
            
        </tr>
        
    </table>

    <hr />
        
        
  
        
    <h2>Add Jamat times and change prayer spellings if required</h2> 
    <p>You may have different ways of spelling the prayer times. You can change them here. Add your Jamat times in the right Column</p>
    
    <table class="form-table">
        
        <tr>
            <th align="left"><strong>Prayer</strong></th>
            <th align="left"><strong>Change Prayer Spelling</strong></th>
            <th align="left"><strong>Jamat Times</strong></th>
        </tr>
        <tr valign="top">
                <th align="left" scope="row">Fajr</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="fajr_rename" value="<?php echo get_option('fajr_rename'); ?>" /></td>
                <td align="left"><input type="text" maxlength="5" size="5"  name="fajr_jamat" value="<?php echo get_option('fajr_jamat'); ?>" /></td>
        </tr>

        <tr valign="top">
                <th scope="row" align="left">Zuhur</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="zuhur_rename" value="<?php echo get_option('zuhur_rename'); ?>" /></td>
                <td><input type="text"  maxlength="5" size="5" name="zuhur_jamat" value="<?php echo get_option('zuhur_jamat'); ?>" /></td>
        </tr> 
        <tr valign="top">
                <th scope="row" align="left">Asr</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="asr_rename" value="<?php echo get_option('asr_rename'); ?>" /></td>
                <td><input type="text"  maxlength="5" size="5" name="asr_jamat" value="<?php echo get_option('asr_jamat'); ?>" /></td>
        </tr> 
        <tr valign="top">
                <th scope="row" align="left">Maghrib</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="maghrib_rename" value="<?php echo get_option('maghrib_rename'); ?>" /></td>
                <td><input type="text" maxlength="5" size="5"  name="maghrib_jamat" value="<?php echo get_option('maghrib_jamat'); ?>" /></td>
        </tr> 
        <tr valign="top">
                <th scope="row" align="left">Isha</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="isha_rename" value="<?php echo get_option('isha_rename'); ?>" /></td>
                <td><input type="text"  maxlength="5" size="5" name="isha_jamat" value="<?php echo get_option('isha_jamat'); ?>" /></td>
        </tr>
    
        <tr valign="top">
                <th scope="row" align="left">Jumah Time</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="jumah_rename" value="<?php echo get_option('jumah_rename'); ?>" /></td>
                <td><input type="text"  maxlength="5" size="5" name="jumah_jamat" value="<?php echo get_option('jumah_jamat'); ?>" /></td>
        </tr>
        
        <tr valign="top">
                <th scope="row" align="left">Sunrise</th>
                <td align="left"><input type="text" maxlength="20" size="20" name="sunrise_rename" value="<?php echo get_option('sunrise_rename'); ?>" /></td>
                <td></td>
        </tr>

        <tr valign="top">
                <th scope="row" align="left">Blurb (Additional Text)</th>
                <td ><textarea rows="4" cols="50" name="salat_blurb"><?php echo get_option('salat_blurb'); ?></textarea>
                <p class-"description">This text will appear as a note at the bottom of the timetable</p>
                
                </td>
        </tr> 
    
    </table>
    
    
    <hr />
    <p><?PHP submit_button(); ?></p>
    
        
    </form>
 <hr /> 


    
    
    
    
	</div>

<?PHP 

} 
 
/*** END OF WP ADMIN FORM ***/


/*
 * DISPLAY FRONTEND
 */




function maha_salat_display( $atts ) {
    
    $error = 0; 
    $data = "";
    $data = shortcode_atts( array(
        
        // structure and styling
        'structure' => 'maha_classic', // type of layout. (classic = default)
        'style' => 'classic', // css used for styling the structure
        'class' => '', // extra class if we need it
       
        // settings
        'heading' => "Salat Times", // default heading
        'start' => "Start", // default name for start title
        'jamat' => "Jamat", // default name for Jamat title
		'show_blurb' => "no", // do we show the blurb yes/no
        'show_heading' => "yes", // do we show the heading yes/no
        'show_date' => "yes", // do we show the date yes/no
        'show_jamat' => "yes", // do we show the jamat times yes/no
        
       
	
	), $atts, 'maha-salat-times' );
    
    // declare vars
    
    $fajr_name = 'Fajr';
    $zuhur_name = 'Zuhur';
    $asr_name = 'Asr';
    $maghrib_name = 'Maghrib';
    $isha_name = 'Isha';
    $jumah_name = 'Jumah';
    $sunrise_name = 'Sunrise';
    
    $fajr_jamat = '';
    $zuhur_jamat = '';
    $asr_jamat = '';
    $maghrib_jamat = '';
    $isha_jamat = '';
    $jumah_jamat = '';
    

    
    if ( !empty( get_option( 'fajr_rename' ) ) ) { $fajr_name = get_option('fajr_rename'); };
    if ( !empty( get_option( 'zuhur_rename' ) ) ) { $zuhur_name = get_option('zuhur_rename'); };
    if ( !empty( get_option( 'asr_rename' ) ) ) { $asr_name = get_option('asr_rename'); };
    if ( !empty( get_option( 'maghrib_rename' ) ) ) { $maghrib_name = get_option('maghrib_rename'); };
    if ( !empty( get_option( 'isha_rename' ) ) ) { $isha_name = get_option('isha_rename'); };
    if ( !empty( get_option( 'jumah_rename' ) ) ) { $jumah_name = get_option('jumah_rename'); };
    if ( !empty( get_option( 'jumah_rename' ) ) ) { $sunrise_name = get_option('jumah_rename'); };
    
    if ( !empty( get_option( 'fajr_jamat' ) ) ) { $fajr_jamat = get_option('fajr_jamat'); };
    if ( !empty( get_option( 'zuhur_jamat' ) ) ) { $zuhur_jamat = get_option('zuhur_jamat'); };
    if ( !empty( get_option( 'asr_jamat' ) ) ) { $asr_jamat = get_option('asr_jamat'); };
    if ( !empty( get_option( 'maghrib_jamat' ) ) ) { $maghrib_jamat = get_option('maghrib_jamat'); };
    if ( !empty( get_option( 'isha_jamat' ) ) ) { $isha_jamat = get_option('isha_jamat'); };
    if ( !empty( get_option( 'jumah_jamat' ) ) ) { $jumah_jamat = get_option('jumah_jamat'); };
    
    
    $salat_blurb = get_option('salat_blurb');
    
   
    
    
    // calculate prayer times
    
    // classes to make the prayertime work.
    
    $dir = plugin_dir_path( __FILE__ );
    
    
    include_once( $dir . 'includes/prayertime.php' );

   
    if ( class_exists('prayTime') ) {
    
        $prayTime = new PrayTime();
        
    
        $salat_method = esc_attr( get_option('salat_method') ); 
        $salat_juristic = esc_attr( get_option('salat_juristic') );
        $salat_timeformat = esc_attr( get_option('salat_timeformat') );
        $salat_highlatsmethod = esc_attr( get_option('salat_highlatsmethod') );
        $salat_timezone = esc_attr( get_option('salat_timezone') ); 
        
        $salat_latitude = get_option('salat_latitude');
        $salat_longitude = get_option('salat_longitude');    
        
        // make sure we have longitude and latitude or throw error
        
        if ( empty( $salat_latitude ) ) { $error = 2;  }
        if ( empty( $salat_longitude ) ) { $error = 2; }
        
        // make sure latitude and longitude are numbers
        
        if ( is_numeric( $salat_latitude ) )  {  } else { $error = 3;  }
        if ( is_numeric( $salat_longitude ) )  {  } else { $error = 3;  }
        
        
        
        if ( is_object($prayTime) && $error == 0 ) {

           if (!empty( $salat_method ) ) { $prayTime->setCalcMethod( $prayTime->$salat_method ); };
           if (!empty( $salat_juristic ) ) {  $prayTime->setAsrMethod( $prayTime->$salat_juristic ); };
           if (!empty( $salat_highlatsmethod ) ) { $prayTime->setHighLatsMethod( $prayTime->$salat_highlatsmethod ); };
           if (!empty( $salat_timeformat ) ) { $prayTime->setTimeFormat( $prayTime->$salat_timeformat ); };

           $times = $prayTime->getPrayerTimes( time(), $salat_latitude, $salat_longitude, $salat_timezone );

        }   
    
    
    
    } else {
    
        $error = 1;
    
    }
      
  
    
?>
    
    
<!-- MAHA SALAT TIMES DISPLAY BEGINS -->


<div class="mst-wrapper">   

        <div class="mst-inner <?PHP echo esc_attr($data['class']); ?>">
            
            <?php if ( $error == 1 ) { ?>
            
                <h3>Salat Table</h3>
                <p>Error! Class failed to load!</p>
           
           <?php } elseif ( empty( $salat_latitude ) || empty( $salat_longitude ) || $error == 2   || $error == 3 ) { ?>
           
                <h3>Salat Table</h3>
                <p>Please ensure you have added Latitude and Longitude data correctly!</p>
           
           <?PHP } else { //show table ?>
            
            
            <?PHP if ($data['show_heading'] == 'yes'  ) { ?>
            
                <div class="mst-title"><h2><?PHP echo esc_html($data['heading']); ?></h2></div>
            
            <?PHP } ?>
            
            <?PHP if ($data['show_date'] == 'yes'  ) { ?>
            
                <div class="mst-date">
                    <script language="JavaScript">
        var fixd;
        function isGregLeapYear(year)
        {
            return year%4 == 0 && year%100 != 0 || year%400 == 0;
        }

        function gregToFixed(year, month, day)
        {
            var a = Math.floor((year - 1) / 4);
            var b = Math.floor((year - 1) / 100);
            var c = Math.floor((year - 1) / 400);
            var d = Math.floor((367 * month - 362) / 12);
            if (month <= 2)
                e = 0;
            else if (month > 2 && isGregLeapYear(year))
                e = -1;
            else
                e = -2;
            return 1 - 1 + 365 * (year - 1) + a - b + c + d + e + day;
        }
        function Hijri(year, month, day)
        {
            this.year = year;
            this.month = month;
            this.day = day;
            this.toFixed = hijriToFixed;
            this.toString = hijriToString;
        }
        function hijriToFixed()
        {
            return this.day + Math.ceil(29.5 * (this.month - 1)) + (this.year - 1) * 354 +
                Math.floor((3 + 11 * this.year) / 30) + 227015 - 1;
        }
        function hijriToString()
        {
            var months = new Array("Muharram","Safar","Rabi-AlAwwal","Rabi-AlThani","Jumada Al-Ula","Jumada Al-Thani","Rajab","Shaban","Ramadan","Shawwal","Dhul Qadah","Dhul Hijjah");
            return this.day + " " + months[this.month - 1]+ " " + this.year;
        }
        function fixedToHijri(f)
        {
            var i=new Hijri(1100, 1, 1);
            i.year = Math.floor((30 * (f - 227015) + 10646) / 10631);
            var i2=new Hijri(i.year, 1, 1);
            var m = Math.ceil((f - 29 - i2.toFixed()) / 29.5) + 1;
            i.month = Math.min(m, 12);
            i2.year = i.year;
            i2.month = i.month;
            i2.day = 1;
            i.day = f - i2.toFixed() + 1;
            return i;
        }
        var tod=new Date();
        var weekday=new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        var monthname=new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        var y = tod.getFullYear();
        var m = tod.getMonth();
        var d = tod.getDate();
        var dow = tod.getDay();
        document.write(weekday[dow] + " " + d + " " + monthname[m] + " " + y);
        m++;
        fixd=gregToFixed(y, m, d);
        var h=new Hijri(1421, 11, 28);
        h = fixedToHijri(fixd);
        document.write("<br /> " + h.toString() + "");
    </script>
    
                    <script>
        var dayarray=new Array("","","","","","","")
        var montharray=new Array("","","","","","","","","","","","")
        function getthedate(){
            var mydate=new Date()
            var year=mydate.getYear()
            if (year < 1000)
                year+=1900
            var day=mydate.getDay()
            var month=mydate.getMonth()
            var daym=mydate.getDate()
            if (daym<10)
                daym="0"+daym
            var hours=mydate.getHours()
            var minutes=mydate.getMinutes()
            var seconds=mydate.getSeconds()
            var dn="H:i"
            if (hours>=12)
                dn="PM"
            if (hours>12){
                hours=hours-12
            }
            if (hours==0)
                hours=12
            if (minutes<=9)
                minutes="0"+minutes
            if (seconds<=9)
                seconds="0"+seconds
            var cdate="<small><font color='3F6F97' face='MS Sans Serif'>"+hours+":"+minutes+":"+seconds+"</font></small>"
            if (document.all)
                document.all.clock.innerHTML=cdate
            else if (document.getElementById)
                document.getElementById("clock").innerHTML=cdate
            else
                document.write(cdate)
        }
        if (!document.all&&!document.getElementById)
            getthedate()
        function goforit(){
            if (document.all||document.getElementById)
                setInterval("getthedate()",1000)
        }
    </script>  
                
                </div>
            
            <?PHP  }; ?>

            <table>
                
                <tr>
                    <th class="mst_salat_col"></th>
                    <th class="mst_start_col"><?PHP echo esc_html( $data['start'] ); ?></th>
                    
                    <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <th class="mst_jamat_col"><?PHP echo esc_html( $data['jamat'] ); ?></th>
                    <?PHP }; ?>
                    
                </tr>
                
                <tr>
                    <td class="mst_salat_col"><?PHP echo esc_html( $fajr_name ); ?></td>
                    <td class="mst_start_col"><?PHP echo esc_html( $times[0] ); ?></td>
                    
                    <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <td class="mst_jamat_col"><?PHP echo esc_html( $fajr_jamat ); ?></td>  
                    <?PHP }; ?>
                    
                </tr>
                
                <tr>
                    <td class="mst_salat_col"><?PHP echo esc_html( $sunrise_name ); ?></td>
                    <td class="mst_start_col"><?PHP echo esc_html( $times[1] ); ?></td>
                    
                    <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <td class="mst_jamat_col">-</td>  
                    <?PHP }; ?>
                    
                </tr>
                
                <tr>
                    <td class="mst_salat_col"><?PHP echo esc_html( $zuhur_name ); ?></td>
                    <td class="mst_start_col"><?PHP echo esc_html( $times[2] ); ?></td>
                    
                    <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <td class="mst_jamat_col"><?PHP echo esc_html( $zuhur_jamat ); ?></td> 
                    <?PHP }; ?>
                    
                </tr>
                
                <tr>
                    <td class="mst_salat_col"><?PHP echo esc_html( $asr_name ); ?></td>
                    <td class="mst_start_col"><?PHP echo esc_html( $times[3] ); ?></td>
                   
                    <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <td class="mst_jamat_col"><?PHP echo esc_html( $asr_jamat ); ?></td> 
                    <?PHP }; ?>
                    
                </tr>
                
                <tr>
                    <td class="mst_salat_col"><?PHP echo esc_html( $maghrib_name ); ?></td>
                    <td class="mst_start_col"><?PHP echo esc_html( $times[4] ); ?></td>
                    
                    <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <td class="mst_jamat_col"><?PHP echo esc_html( $maghrib_jamat ); ?></td>  
                    <?PHP }; ?>
                    
                </tr>   
                
                 <tr>
                    <td class="mst_salat_col"><?PHP echo esc_html( $isha_name ); ?></td>
                    <td class="mst_start_col"><?PHP echo esc_html( $times[6] ); ?></td>
                   
                     <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                        <td class="mst_jamat_col"><?PHP echo esc_html( $isha_jamat ); ?></td> 
                    <?PHP }; ?>
                     
                </tr> 
                <?PHP if ( $data['show_jamat'] == "yes" ) { //show jamat? ?>
                    <tr>
                        <td class="mst_salat_col"><?PHP echo esc_html( $jumah_name ); ?></td>
                        <td class="mst_start_col">-</td>
                        <td class="mst_jamat_col"><?PHP echo esc_html( $jumah_jamat ); ?></td>                  

                    </tr> 
                <?PHP } else { ?>
                    <tr>
                        <td class="mst_salat_col"><?PHP echo esc_html( $jumah_name ); ?></td>
                        <td class="mst_start_col"><?PHP echo esc_html( $jumah_jamat ); ?></td>                                        

                    </tr>
                
                <?PHP }; ?>
                
            </table>
            
            <?PHP
            $allowedtags = array ('br' => array(),'em' => array(),'strong' => array(),'p' => array() );
            if ($data['show_blurb'] == 'yes'  ) { ?>
                
                <div class="mst-blurb"><?PHP echo wp_kses( $salat_blurb, $allowedtags ); ?></div>
            
            <?PHP  }; ?>
          
         <?PHP }; // end elseif longitude or latitude ?> 
         
        </div>       
</div>
<!-- MAHA SALAT TIMES DISPLAY ENDS -->

    <?PHP
    
    
          
};



add_shortcode( 'maha-salat-times', 'maha_salat_display' );



?>