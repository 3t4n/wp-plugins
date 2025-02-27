<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

require FMCF_DIR_PATH.'/classes/fmcf_stylish_font.php';
require FMCF_DIR_PATH.'/includes/fmcf-stylish-fonts-functions.php';
use FMCF\FMCF_Stylish_Fonts;

function fmcf_admin_scripts()
{
    wp_enqueue_script('FMCFJs',FMCF_DIR_URL.'assests/js/fmcf_mini.js');
}

function fmcf_common_css()
{
    if(!is_admin())
    {
        fmcf_add_css();
        wp_register_style('FMCFUploadCss', FMCF_UPLOAD_CSS_URL,array(), time());
        wp_enqueue_style('FMCFUploadCss');
    }
}

function fmcf_admin_css()
{
    fmcf_add_admin_css();
    wp_enqueue_style('FMCFUploadAdminCss',FMCF_UPLOAD_ADMIN_CSS_URL,array(), time());
    add_editor_style(FMCF_UPLOAD_ADMIN_CSS_URL);  
    wp_enqueue_style('FMCFCss',FMCF_DIR_URL.'assests/css/fmcf_main_mini.css');
}

add_action('admin_init', 'fmcf_admin_scripts');
add_action('admin_init', 'fmcf_admin_css');
add_action('init', 'fmcf_common_css');
add_action( 'login_init', function() {
    wp_deregister_style( 'FMCFUploadCss' );    
} );
add_filter('mce_buttons_2', 'fmcf_add_font_button_on_editor');
add_filter('tiny_mce_before_init', 'fmcf_add_font_on_editor' );

function fmcf_add_font_on_editor( $dataArray ) {
	$customFonts = '';
	$getFmcfData = fmcf_font_list_table_data();
	foreach($getFmcfData['fmcf_tbl_data'] as $fmcfTblVal) {
			 $customFonts .= ucfirst(str_replace('_',' ', $fmcfTblVal['org_name'])) .'='.$fmcfTblVal['org_name'].';'; 
				
	}
	
	$dataArray['font_formats'] = $customFonts.'Andale Mono=Andale Mono, Times;Arial=Arial, Helvetica, sans-serif;Arial Black=Arial Black, Avant Garde;Book Antiqua=Book Antiqua, Palatino;Comic Sans MS=Comic Sans MS, sans-serif;Courier New=Courier New, Courier;Georgia=Georgia, Palatino;Helvetica=Helvetica;Impact=Impact, Chicago;Symbol=Symbol;Tahoma=Tahoma, Arial, Helvetica, sans-serif;Terminal=Terminal, Monaco;Times New Roman=Times New Roman, Times;Trebuchet MS=Trebuchet MS, Geneva;Verdana=Verdana, Geneva;Webdings=Webdings;Wingdings=Wingdings';
	return $dataArray;
}
function fmcf_add_font_button_on_editor( $options ) {
	array_unshift( $options, 'fontsizeselect');
	array_unshift( $options, 'fontselect');
	return $options;
}


function fmcf_menu()
{
	add_menu_page('Upload Fonts', 'Fonts Manager | Custom Fonts','manage_options' , 'fmcf-upload-fonts-page', 'fmcf_upload_fonts_page',FMCF_PLUGIN_URL.'assests/images/icon.png');
	add_submenu_page('fmcf-upload-fonts-page', 'Upload Fonts', 'Upload Fonts', 'manage_options' , 'fmcf-upload-fonts-page', 'fmcf_upload_fonts_page');
	add_submenu_page('fmcf-upload-fonts-page', 'Google Fonts', 'Google Fonts', 'manage_options' , 'fmcf-google-fonts', 'fmcf_google_fonts_page');
	add_submenu_page('fmcf-upload-fonts-page', 'Local Fonts', 'Local Fonts', 'manage_options' , 'fmcf-predefined-fonts', 'fmcf_predefined_fonts_page');
	add_submenu_page('fmcf-upload-fonts-page', 'Assign Fonts', 'Assign Fonts', 'manage_options' , 'fmcf-assign-fonts', 'fmcf_assign_fonts_page');
    add_submenu_page('fmcf-upload-fonts-page', 'Color Settings', 'Color Settings', 'manage_options' , 'fmcf-set-color', 'fmcf_set_color_page');
	
    
}

function fmcf_upload_fonts_page() {
    require FMCF_DIR_PATH.'views/fmcf-upload-fonts.php';
}
function fmcf_assign_fonts_page() {
    require FMCF_DIR_PATH.'views/fmcf-assign-fonts.php';
}
function fmcf_set_color_page() {
    require FMCF_DIR_PATH.'views/fmcf-set-color.php';
}
function fmcf_predefined_fonts_page() {
    require FMCF_DIR_PATH.'views/fmcf-predefined-fonts.php';
}
function fmcf_google_fonts_page(){
    require FMCF_DIR_PATH.'views/fmcf-google-fonts.php';   
}


function fmcf_add_css()
{
     if (! is_dir(FMCF_UPLOAD_PATH)) {
        mkdir( FMCF_UPLOAD_PATH, 0755);
     }

     if ( ! file_exists( FMCF_UPLOAD_CSS_PATH ) ) {
        $fmcfOutPut = fopen(FMCF_UPLOAD_CSS_PATH, 'w');
        fclose($fmcfOutPut);
    }
}

function fmcf_add_admin_css()
{
    if (! is_dir(FMCF_UPLOAD_PATH)) {
        mkdir( FMCF_UPLOAD_PATH, 0755);
     }

     if ( ! file_exists( FMCF_UPLOAD_ADMIN_CSS_PATH ) ) {
        $fmcfOutPut = fopen(FMCF_UPLOAD_ADMIN_CSS_PATH, 'w');
        fclose($fmcfOutPut);
    }
}


add_action('admin_menu', 'fmcf_menu');

$fmcfClsObj = new FMCF_Stylish_Fonts();