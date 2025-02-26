<?php 
    /*
    Plugin Name: Go Animate
    Plugin URI: http://www.animatelements.com
    Description: Plugin for css3 animation of elements.
    Author: Antonio Gocaj
    Version: 1.0
    Author URI:  http://www.animatelements.com
    */



// Create tables in database
register_activation_hook( __FILE__, 'jal_install' );
register_activation_hook( __FILE__, 'jal_install_data' );

global $jal_db_version;
$jal_db_version = '1.1';

function jal_install() {
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'da_goanimate';
	$table_name_effects = $wpdb->prefix . 'da_ga_effects';
        $table_name_settings = $wpdb->prefix . 'da_ga_settings';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		element varchar(150) DEFAULT '' NOT NULL,
		animation varchar(150) DEFAULT '' NOT NULL,
		duration varchar(50) DEFAULT '' NOT NULL,
                delay varchar(50) DEFAULT '' NOT NULL,
		iteration varchar(50) DEFAULT '' NOT NULL,
		time TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;
                
                    INSERT INTO $table_name (id, element,animation,duration,delay,iteration) VALUES
(1, '#example','bounceInDown','2','1','1');";

	$sql2 = "CREATE TABLE $table_name_effects (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		effect varchar(150) DEFAULT '' NOT NULL,
		
		UNIQUE KEY id (id)
	) $charset_collate;
	
	INSERT INTO $table_name_effects (id, effect) VALUES
(1, 'bounce'),
(2,'flash'),
(3, 'pulse'),
(4,'rubberBand'),
(5,'shake'),
(6,'swing'),
(7,'tada'),
(10,'wobble'),
(11,'jello'),
(12,'bounceIn'),
(13, 'bounceInDown'),
(14, 'bounceInLeft'),
(15, 'bounceInRight'),
(16, 'bounceInUp'),
(17, 'bounceOut'),
(18, 'bounceOutDown'),
(19, 'bounceOutLeft'),
(20, 'bounceOutRight'),
(21, 'bounceOutUp'),
(22, 'fadeIn'),
(23, 'fadeInDown'),
(24, 'fadeInDown'),
(25, 'fadeInDownBig'),
(26, 'fadeInLeft'),
(27, 'fadeInLeftBig'),
(28, 'fadeInRight'),
(29, 'fadeInRightBig'),
(30, 'fadeInUp'),
(31, 'fadeInUpBig'),
(32, 'fadeOut'),
(33, 'fadeOutDown'),
(34, 'fadeOutDownBig'),
(35, 'fadeOutLeft'),
(36, 'fadeOutLeftBig'),
(37, 'fadeOutRight'),
(38, 'fadeOutRightBig'),
(39, 'fadeOutUp'),
(40, 'fadeOutUpBig'),
(41, 'flipInX'),
(42, 'flipInY'),
(43, 'flipOutX'),
(44, 'flipOutY'),
(45, 'lightSpeedIn'),
(46, 'lightSpeedOut'),
(47, 'rotateIn'),
(48, 'rotateInDownLeft'),
(49, 'rotateInDownRight'),
(50, 'rotateInUpLeft'),
(51, 'rotateInUpRight'),
(52, 'rotateOut'),
(53, 'rotateOutDownLeft'),
(54, 'rotateOutDownRight'),
(55, 'rotateOutUpLeft'),
(56, 'rotateOutUpRight'),
(57, 'hinge'),
(58, 'rollIn'),
(59, 'rollOut'),
(60, 'zoomIn'),
(61, 'zoomInDown'),
(62, 'zoomInLeft'),
(63, 'zoomInRight'),
(64, 'zoomInUp'),
(65, 'zoomOut'),
(66, 'zoomOutDown'),
(67, 'zoomOutLeft'),
(68, 'zoomOutRight'),
(69, 'zoomOutUp'),
(70, 'slideInDown'),
(71, 'slideInLeft'),
(72, 'slideInRight'),
(73, 'slideInUp'),
(74, 'slideOutDown'),
(75, 'slideOutLeft'),
(76, 'slideOutRight'),
(77, 'slideOutUp');";
        
    $sql3 = "CREATE TABLE $table_name_settings (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		jquery tinyint(1) DEFAULT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;
                
                    INSERT INTO $table_name_settings (id, jquery) VALUES
(1,'1');";
        
        

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	dbDelta( $sql2 );
        dbDelta( $sql3 );

	add_option( 'jal_db_version', $jal_db_version );
}

// congratulations message
function jal_install_data() {
	global $wpdb;
	
	$welcome_name = 'User';
	$welcome_text = 'Congratulations, you just completed the installation!';
	
	$table_name = $wpdb->prefix . 'goanimate';
	
	$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	);
}


// ne header-in ne backend te plugin-it vendosim file-at js dhe css
add_action('admin_head', 'cssandjs');

function cssandjs() {
    $backend_css_path = plugins_url( 'css/backend.css', __FILE__ );
    $backend_js_path = plugins_url( 'js/main.js', __FILE__ );
    echo "<link rel='stylesheet' type='text/css' href='$backend_css_path'/>"
            . "<script src='$backend_js_path'></script>";
}	
	
//therrasim file-in goanimate.php per funksione extra kur klikojme te tabi "Go Animate" ne backend
function go_animate() {
    include('goanimate.php');
}
	
function oscimp_admin_actions() {
    add_menu_page("Go Animate", "Go Animate", 'manage_options', "Go Animate", "go_animate",plugins_url("icon.png" , __FILE__));
}
 
add_action('admin_menu', 'oscimp_admin_actions');	


// vendosim file-at css dhe js ne frontend ku gjenerohet animacioni css3 i elementeve

function hook_css(){

    global $wpdb;
    $myrows = $wpdb->get_results( "SELECT * FROM wp_da_goanimate" ,OBJECT );
    $settings = $wpdb->get_results( "SELECT jquery FROM wp_da_ga_settings" ,OBJECT );
    foreach($settings as $setting){
        $jqinclude = $setting->jquery;
    }
    $jqLib = ($jqinclude == 1) ? "<script src='//code.jquery.com/jquery-1.11.3.min.js'></script>" : "";
    $hookcss = "";
    $hookjs = "";
    foreach($myrows as $animrow){
        
            $ad = ($animrow->duration == 0) ? $animrow->duration : $animrow->duration."s";
            $ade = ($animrow->delay == 0) ? $animrow->delay :  $animrow->delay."s";
            $hookcss .= $animrow->element."{
                    animation-duration: $ad;
                    animation-delay: $ade;
                    animation-iteration-count: $animrow->iteration ;
            }";

            $hookjs .= "jQuery('$animrow->element').addClass('animated $animrow->animation');";

    }

            $ani_path = plugins_url( 'css/animate.min.css', __FILE__ );
            $output ="<link rel='stylesheet' href='$ani_path'></link>".
            "$jqLib".
            "<style>$hookcss</style>
            <script type='text/javascript'>
            jQuery(window).load(function(){

            $hookjs
            });
            </script>";

            echo $output;
}

add_action('wp_head','hook_css');

?>