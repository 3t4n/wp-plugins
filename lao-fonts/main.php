<?php
/*
  Plugin Name: Lao Fonts
  Plugin URI: https://facebook.com/frankxayachack
  Description: Plugin ສໍາລັບປ່ຽນຟ້ອນໃນເວັບໄຊ້ຂອງທ່ານໃຫ້ໄປໃຊ້ຟ້ອນທີ່ສາມາດສະແດງຜົນກັບພາສາລາວໄດ້ດີ ເຊັ່ນ: Phetsarath OT, Saysettha OT, Lao Sans Pro...
  Version: 2.3.1
  Author: Sengxay XAYACHACK
  Author URI: https://facebook.com/frankxayachack
  License: GPL
*/

/* 2016-2021 Sengxay XAYACHACK
Email : frank.xayachack@gmail.com
Facebook : www.facebook.com/frank.xayachack
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
 //Menu
 add_action( 'admin_menu', 'LFS_wp_lao' );
 
 function LFS_wp_lao()
 {
	 add_menu_page( 'ຕັ້ງຄ່າ ຟັ້ອນລາວ', 'Lao Fonts', 'manage_options', 'lao-fonts', 'LFS_lao_fonts_options' );
	 
 }
 
 function LFS_lao_fonts_options()
 {
	 if(!current_user_can('manage_options'))
	 {
		 wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	 }
	// import jquery
	function enqueue_script(){
		$locate = plugins_url('assets/jquery-3.3.1.min.js',dirname(__FILE__));
		wp_enqueue_script('my-js', $locate, array("jquery") );
	}
	add_action('admin_enqueue_scripts', 'enqueue_script');
	include __DIR__."/options.php";
 }

global $wpdb;
$tbl = $wpdb->options;
$chosen = $wpdb->get_row( "SELECT * FROM $tbl WHERE option_name='LFS_lao_font'");
$setFont = $chosen->option_value;

 // Action
switch ($setFont)
{
	case $setFont=='phetsarath':
		LFS_phetsarath();
		break;
	case $setFont=='LaoSansPro':
		LFS_LaoSansPro();
		break;
	case $setFont=='saysettha':
		LFS_saysettha();
		break;
	case $setFont=='Dhyana':
		LFS_Dhyana();
		break;
	case $setFont=='Souliyo':
		LFS_Souliyo();
		break;
	case $setFont=='NotoSerifLao':
		LFS_NotoSerifLao();
		break;
	case $setFont=='NotoSansLao':
		LFS_NotoSansLao();
		break;
	case $setFont=='DefagoNotoSansLao':
		LFS_DefagoNotoSansLao();
		break;
	case $setFont=='Custom':
		LFS_Custom();
		break;
	default:
		LFS_phetsarath();
		break;
}

function LFS_phetsarath()
{
	add_action('wp_enqueue_scripts','LFS_phetsarath_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_phetsarath_f');
	function LFS_phetsarath_f()
	{
		$locate = plugins_url('phetsarath/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function LFS_saysettha()
{
	add_action('wp_enqueue_scripts','LFS_saysettha_ot_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_saysettha_ot_f');
	function LFS_saysettha_ot_f()
	{
		$locate = plugins_url('saysettha_ot/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function LFS_LaoSansPro()
{
	add_action('wp_enqueue_scripts','LFS_LaoSansPro_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_LaoSansPro_f');
	function LFS_LaoSansPro_f()
	{
		$locate = plugins_url('Lao_Sans_Pro/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function LFS_Dhyana()
{
	add_action('wp_enqueue_scripts','LFS_Dhyana_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_Dhyana_f');
	function LFS_Dhyana_f()
	{
		$locate = plugins_url('Dhyana/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function LFS_Souliyo()
{
	add_action('wp_enqueue_scripts','LFS_Souliyo_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_Souliyo_f');
	function LFS_Souliyo_f()
	{
		$locate = plugins_url('souliyo-key/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function LFS_NotoSerifLao()
{
	add_action('wp_enqueue_scripts','LFS_NotoSerifLao_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_NotoSerifLao_f');
	function LFS_NotoSerifLao_f()
	{
		$locate = plugins_url('NotoSerifLao/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function LFS_NotoSansLao()
{
	add_action('wp_enqueue_scripts','LFS_NotoSansLao_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'LFS_NotoSansLao_f');
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	function LFS_NotoSansLao_f()
	{
		$locate = plugins_url('NotoSansLao/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');

	}
}

function LFS_DefagoNotoSansLao()
{
	add_action('wp_enqueue_scripts','LFS_DefagoNotoSansLao_f');
	add_action( 'admin_enqueue_scripts', 'LFS_DefagoNotoSansLao_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	function LFS_DefagoNotoSansLao_f()
	{
		$locate = plugins_url('Defago_Noto_Sans_Laos/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');

	}
}

function LFS_Custom()
{
	add_action('wp_enqueue_scripts','LFS_Custom_f');
	add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
	add_action( 'admin_enqueue_scripts', 'enqueue_load_fa');
	add_action( 'admin_enqueue_scripts', 'LFS_Custom_f');
	function LFS_Custom_f()
	{
		$locate = plugins_url('Custom/style.css',__FILE__);
		wp_register_style( 'lao_fonts',$locate);
		wp_enqueue_style('lao_fonts');
	}
}

function enqueue_load_fa() {
	wp_enqueue_style( 'load-fa', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css' );
}
?>