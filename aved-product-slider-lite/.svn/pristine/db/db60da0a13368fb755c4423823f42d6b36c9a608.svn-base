<?php
/*
*
* 	Init file system and main functions
*	Core Aved Soft
*
*
*/
?>

<?php 
//** Main Init classess and functions **//


function AVS_active_files()
{
	//** Init classess **//
	require_once(AVS_SLIDER_DIR.'includes/class-admin-functions.php');
	require_once(AVS_SLIDER_DIR.'includes/class-base-operation.php');
	require_once(AVS_SLIDER_DIR.'includes/class-data-library.php');
	require_once(AVS_SLIDER_DIR.'includes/class-slider-db-api.php');
	require_once(AVS_SLIDER_DIR.'includes/class-slide-editor.php');
	require_once(AVS_SLIDER_DIR.'includes/class-shortcode-generator.php');
	require_once(AVS_SLIDER_DIR.'includes/class-script-loader.php');
	require_once(AVS_SLIDER_DIR.'includes/class-slider-products-codes.php');

	//** Init main options **//
	AVS_main_init();
	//** Active functions **//
	AVS_slider_admin::init_pages();
	//** Create Table **//
	AVS_base_install::create_table('avs_sliders_data_S');
	//** Init Shortcodes **//
	AVS_shortcode_generator::init_base_shortcodes();
}

function AVS_init_admin_scripts(){
	wp_enqueue_script('AVS_SLIDER_ADMIN_SCRIPTS',AVS_SLIDER_URL.'/AVED-Slider-Plugin/assets/js/admin-scripts.js');
	wp_enqueue_style('AVS_SLIDER_ADMIN_CSS',AVS_SLIDER_URL.'/AVED-Slider-Plugin/assets/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'AVS_init_admin_scripts' );
add_action('wp_enqueue_scripts',array('AVS_scripts_loader','load_default_scripts'));

//** Active main settings **//
function AVS_main_init(){
	AVS_base_operation::is_init();
}

//** Start init process **//
AVS_active_files();

//** Register Ajax Functions  **//


add_action('wp_ajax_AVS_edit_slider', 'AVS_edit_slider');
function AVS_edit_slider()
{
	$id = $_POST['slider_id'];
	AVS_slider_editor::edit_page($id);
	die();
}

add_action('wp_ajax_AVS_delete_slider', 'AVS_delete_slider');
function AVS_delete_slider()
{
	$id = $_POST['slider_id'];
	echo 'alert("asdasd")';
	AVS_data_op_API::delete_slider_by_id($id);
	die();
}

?>