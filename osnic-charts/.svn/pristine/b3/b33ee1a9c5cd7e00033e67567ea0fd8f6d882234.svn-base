<?php
/**
 * Plugin Name: Osnic Charts
 * Plugin URI: http://www.osnictech.com
 * Description: Create interactive charts using HTML5 canvas, Supports 6 types of charts, Save at backend and add shortcode as [osnic_charts id="id"] to add chart in your post.
 * Version: 1.2
 * Author: Yashan Mittal
 * Author URI: http://www.osnictech.com
 * License: GPLv2 or later
 */

/*  Copyright 2014  PLUGIN_AUTHOR_NAME  (email : yashanmittal@gmail.com)

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

define( 'OSNIC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'OSNIC_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
include_once OSNIC_PLUGIN_DIR.'includes/class.charts.php';

add_action('admin_menu', 'osnic_add_pages');
function osnic_add_pages() {
    add_menu_page("Osnic Charts", "Osnic Charts", 'manage_options', "osnic_charts","main_page");
    
    add_submenu_page('osnic_charts', 'Add Charts', 'Add Charts', 'manage_options', 'osnic_add_charts', 'osnic_add_new');
}

function main_page(){
    include_once OSNIC_PLUGIN_DIR.'/includes/my_charts.php';
}

function osnic_add_new(){
    include_once OSNIC_PLUGIN_DIR.'/includes/create_chart.php';
}

function osnic_install(){
    $sql = "CREATE TABLE os_charts (
   id int(11) NOT NULL AUTO_INCREMENT,
   data text NOT NULL,
   type varchar(25) NOT NULL,
   dateCreated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
   title varchar(255) NOT NULL,
   PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'osnic_charts_version', '1.0' );
}

register_activation_hook(__FILE__, 'osnic_install');

add_action( 'admin_head', 'only_admin_scripts' );
function only_admin_scripts(){
    wp_enqueue_style("osnic_chartsMain", OSNIC_PLUGIN_URL."static/css/osnic_chartsMain.css", array(), '1.0.0');
}

wp_register_script( 'osnic_canvasjs', OSNIC_PLUGIN_URL."static/js/canvasjs.min.js", array(), '1.0.0', FALSE );
wp_register_script( 'osnic_charts', OSNIC_PLUGIN_URL."static/js/osnic_charts.js", array(), '1.0.0', FALSE );
wp_register_script( 'osnic_frontcharts',OSNIC_PLUGIN_URL."static/js/osnic_frontcharts.js", array(), '1.0.0', FALSE);

$toJS = array(
    'plugin_url'=>OSNIC_PLUGIN_URL,
    'plugin_dir'=>OSNIC_PLUGIN_DIR
    );
wp_localize_script('osnic_charts', 'jscons', $toJS);
wp_localize_script( 'osnic_frontcharts', 'ajaxObj', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
add_action( 'wp_ajax_displayOsChart', 'frontend_chart_display' );
add_action( 'wp_ajax_nopriv_displayOsChart', 'frontend_chart_display' );

function frontend_chart_display(){
    $chartsObj = new Charts();
    $response = array();
    foreach($_POST['chartId'] as $chartId){
        $chartId = intval($chartId);
        $chartD = $chartsObj->getChartById($chartId);
        $dataPoints = json_decode(stripslashes($chartD->data),TRUE);
        $res['id'] = $chartD->id;
        $res['type'] = $chartD->type;
        $res['title'] = $chartD->title;
        $res = array_merge($res,$dataPoints);
        $response[] = $res;
    }
    echo json_encode($response);
    die();
}

add_shortcode( 'osnic_charts', array('Charts','Charts_shortcode') );


function osnic_charts_admin_notice() {
if( $_GET['type'] == 'edit' && $_POST['title']!='' && ($_POST['xaxis']!='' && $_POST['yaxis']!='')) {
?>
<div class="updated">
    <p><?php _e( 'Chart has been successfully updated', 'osnic_charts' ); ?></p>
</div>
<?php
}elseif($_POST['title']!='' && ($_POST['xaxis']!='' && $_POST['yaxis']!='')){ ?>
    <div class="updated">
    <p><?php _e( ' The chart has been successfully created', 'osnic_charts' ); ?></p>
    </div>
<?php
}

}
add_action( 'admin_notices', 'osnic_charts_admin_notice' );

?>
