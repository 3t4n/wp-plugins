<?php
/**
 * Plugin Name: Glofox
 * Plugin URI: http://glofox.com
 * Description: This plugin is for integrating Glofox with your site.
 * Version: 1.0.10
 * Author: Timmy Fisher
 * Author URI: http://glofox.com
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 *Glofox is distributed in the hope that it will be useful,
 *but WITHOUT ANY WARRANTY; without even the implied warranty of
 *MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *GNU General Public License for more details.
 *
 */


/*************************************************************************************************
*	Adding the scripts 
*
************************************************************************************************/
add_action( 'wp_enqueue_scripts', 'auto_height_adjuster' );

function auto_height_adjuster() {
	wp_enqueue_script( 'glofox-script-1', 'http://app.glofox.com/js/pages/websites/easyXDM.debug.js', '','1.0',true );
  wp_enqueue_script( 'glofox-script-2', 'http://app.glofox.com/js/pages/websites/iframe_client.js' , '','1.0',true);
	wp_enqueue_style( 'glofox-style', plugin_dir_url( __FILE__ ) . 'assets/css/glofox.css');
}

/************************************************************************************************
*	The settings page
*
************************************************************************************************/

add_action('admin_menu', 'glofox_menu'); // Initialising the menu


function glofox_menu() {
	add_menu_page('Glofox Settings', 'Glofox', 'administrator', 'glofox-settings', 'glofox_settings_page', plugin_dir_url( __FILE__ ) . 'assets/img/icon.png' );
}

add_action( 'admin_init', 'glofox_settings' );
function glofox_settings() { // telling wordpress the setting 
  register_setting( 'glofox-settings-group', 'branch_id' );
}


function glofox_settings_page() {
	?>
	<div class="wrap">

	<a href="https://glofox.com/" alt="glofox" target="_blank"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/img/logo.png'; ?>"></a>
	<hr>

<h2>Website Integration Settings</h2>
<h3>Set your Branch Id:</h3>
<form method="post" action="options.php">
    <?php settings_fields( 'glofox-settings-group' ); ?>
    <?php do_settings_sections( 'glofox-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Branch Id</th>
        <td><input type="text" name="branch_id" value="<?php echo esc_attr( get_option('branch_id') ); ?>" /></td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>

<p>You can find your Branch Id in Glofox by going to Settings -> Update Info -> Website Integration Settings. The Branch Id is found in the Wordpress section on that page.</p>
<hr>

<h3>Use the following shortcodes to integrate Glofox:</h3>
<table border="0"  cellpadding="3" cellspacing="6">
  <tr>
    <td>Timetable: </td>
    <td>[glofox-timetable]</td>
  </tr>
  <tr>
    <td>Memberships:</td>
    <td>[glofox-membership]</td>
  </tr>
  <tr>
    <td>Trainer Appointments:</td>
    <td>[glofox-trainers]</td>
  </tr>
  <tr>
    <td>Facilities Appointments:</td>
    <td>[glofox-facilities]</td>
  </tr>
  <tr>
    <td>Courses:</td>
    <td>[glofox-courses]</td>
  </tr>
</table>
<br><br><hr><br><br><br><br><br>
<p>This plugin is powered by <a href="https://glofox.com/" target="_blank" alt="glofox">Glofox.</a></p>
</div>

<?php
}

/************************************************************************************************
*	Shortcode setup and implementation
*
************************************************************************************************/

// Timetable 
add_shortcode("glofox-timetable", "glofox_timetable");

function glofox_timetable() {
  $timetable_code = get_timetable_code();
  return $timetable_code;
}


function get_timetable_code() {
  //process plugin
  $timetable = "<div id='iframe_container'><label id='client_branch' hidden>".esc_attr( get_option('branch_id') )."</label></div>";
  //send back text to calling function
  return $timetable;
}

// Membership
add_shortcode("glofox-membership", "glofox_membership");

function glofox_membership() {
  $membership_code = get_membership_code();
  return $membership_code;
}


function get_membership_code() {
  $membership = "<iframe src='https://app.glofox.com/websites/list_memberships/".esc_attr( get_option('branch_id') )."' class='glofox-iframe' ></iframe>";
  return $membership;
}

// Courses
add_shortcode("glofox-courses", "glofox_courses");

function glofox_courses() {
  $courses_code = get_courses_code();
  return $courses_code;
}


function get_courses_code() {
  $membership = "<iframe src='https://app.glofox.com/websites/schedule/".esc_attr( get_option('branch_id') )."/courses' class='glofox-iframe' ></iframe>";
  return $membership;
}

// Facilities
add_shortcode("glofox-facilities", "glofox_facilities");

function glofox_facilities() {
  $facilities_code = get_facilities_code();
  return $facilities_code;
}


function get_facilities_code() {
  $facility = "<iframe src='https://app.glofox.com/websites/schedule/".esc_attr( get_option('branch_id') )."/facilities' class='glofox-iframe' ></iframe>";
  return $facility;
}


// Trainers
add_shortcode("glofox-trainers", "glofox_trainers");

function glofox_trainers() {
  $trainers_code = get_trainers_code();
  return $trainers_code;
}


function get_trainers_code() {
  $trainer = "<iframe src='https://app.glofox.com/websites/schedule/".esc_attr( get_option('branch_id') )."/users' class='glofox-iframe' ></iframe>";
  return $trainer;
}