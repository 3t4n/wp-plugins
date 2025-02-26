<?php
/*
	Plugin Name: APK Downloader
	Plugin URI: https://wordpress.org/plugins/apk-downloader
	Description: Direct download APK file and install the app manually onto your Android devices.
	Author: APK.Support
	Version: 1.0.0
	Author URI: https://apk.support
	Stable tag: 3.0.0
	License: GPL2+
*/


include_once ('includes/apk-option-page.php');

class APK_Downloader{

	public function __construct(){
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this, 'add_action_links') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );

		add_shortcode( 'apk_downloader_form', array($this, 'downloader_form') );
	
		
	}


	public function add_action_links ( $links ) {

		$mylinks = array(
			'<a href="' . admin_url( 'admin.php?page=apk-downloader' ) . '"><img src="'.plugins_url( 'images/favicon@2x.png', __FILE__).'" />Settings</a>'
		);
		
		return array_merge( $links, $mylinks );

	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'mdc_custom', plugins_url('css/style.css?v=8', __FILE__) );
		wp_enqueue_script( 'mdc_custom', plugins_url('js/custom.js', __FILE__), array(), '1.2', true );
		
	}


	public function downloader_form($atts){

		$atts = shortcode_atts(
			array(
				'placeholder'		=>	get_option('apk_form_placeholder_text'),
				'button_label'		=>	get_option('apksupport_form_button_text'),
				'shortdsc'=>get_option('apksupport_shortdsc_text'),
				'shortdsc_yourdevice'=>get_option('apksupport_shortdsc_yourdevice'),
				'apksupport_dsc'=>get_option('apksupport_dsc'),
				
			),
			$atts
		);
		$placeholder = $atts['placeholder'];
		$button_label = $atts['button_label'];
		$shortdsc = $atts['shortdsc'];
		$shortdsc_yourdevice = $atts['shortdsc_yourdevice'];
		$apksupport_dsc = $atts['apksupport_dsc'];
		$output = '
		
		<div class="download-box">
	<div class="down-wrap">
		<div class="static_s">			
			<p>'.$shortdsc.'</p>
<form id="apkdownloader" action="" method="post" autocomplete="off">
<div class="down-form"> <span class="text-box1">

<input autofocus="autofocus" title="'.$placeholder.'" id="region-package" name="package" type="text" placeholder="'.$placeholder.'" value="" required=""> 

</span>
</div>	

<div style="margin-left: 5px; padding-top: 20px;">
<ul id="countrytabs" class="shadetabs">
<li><a id="b1" class="selected">Config</a></li>
<li><a id="b2" class="">Your Device ID</a></li>
</ul>
</div>
<div class="apk_op" id="yid" style="display: none;">
<ul>
<ul>
<li>'.$shortdsc_yourdevice.'</li>
</ul>

<li><div>Android</div>
<div class="android_se">
<select name="av_u" id="av_u" aria-label="Select Android version">
<option value="0" selected="">Default</option>
<option value="10">Android 10</option>
<option value="9.0">Android 9.0</option>
<option value="8.1">Android 8.1</option>
<option value="8.0">Android 8.0</option>
<option value="7.1">Android 7.1</option>
<option value="7.0">Android 7.0</option>
<option value="6.0">Android 6.0</option>
<option value="5.1">Android 5.1</option>						
<option value="5.0">Android 5.0</option>
<option value="4.4W">Android 4.4W</option>		
<option value="4.4">Android 4.4</option>			
<option value="4.3">Android 4.3</option>
<option value="4.2">Android 4.2</option>
<option value="4.1">Android 4.1</option>
<option value="4.0.3">Android 4.0.3</option>
<option value="4.0">Android 4.0</option>
<option value="3.2">Android 3.2</option>
<option value="3.1">Android 3.1</option>
<option value="3.0">Android 3.0</option>
<option value="2.3.3">Android 2.3.3</option>
<option value="2.3">Android 2.3</option>
						</select>
</div>
</li>
<li>
<div>Device ID</div>
<input type="text" id="device_id" name="device_id" placeholder="123456...">
</li>
</ul>
<ul>
<li><span><a target="_blank" href="https://apk.support/download-app/com.redphx.deviceid/1475121600_vs-1.1.3">get your GSF ID (Android ID) →</a></span></li>
</ul>
</div>
<div class="apk_op" id="opd" style="display: bock;">
<ul>
<li><div>Android</div>
<div>
<select name="av" id="av" aria-label="Select Android version">
<option value="0" selected="">Default</option>
<option value="10">Android 10</option>
<option value="9.0">Android 9.0</option>
<option value="8.1">Android 8.1</option>
<option value="8.0">Android 8.0</option>
<option value="7.1">Android 7.1</option>
<option value="7.0">Android 7.0</option>
<option value="6.0">Android 6.0</option>
<option value="5.1">Android 5.1</option>						
<option value="5.0">Android 5.0</option>
<option value="4.4W">Android 4.4W</option>			
<option value="4.4">Android 4.4</option>			
<option value="4.3">Android 4.3</option>
<option value="4.2">Android 4.2</option>
<option value="4.1">Android 4.1</option>
<option value="4.0.3">Android 4.0.3</option>
<option value="4.0">Android 4.0</option>
<option value="3.2">Android 3.2</option>
<option value="3.1">Android 3.1</option>
<option value="3.0">Android 3.0</option>
<option value="2.3.3">Android 2.3.3</option>
<option value="2.3">Android 2.3</option>		
						
						</select>
</div>
</li>
<li><div>Device</div>
<div>
		<select name="tbi" id="tbi" aria-label="Select Device">
	<option value="0" selected="">Default</option>
			<option value="samsung">Samsung phones</option>
			<option value="huawei">Huawei phones</option> 
			<option value="xiaomi">Xiaomi phones</option>	
            <option value="oppo">Oppo phones</option>			
			<option value="sony">Sony phones</option>	
			<option value="motorola">Motorola phones</option>
			<option value="lg">LG phones</option>
			<option value="htc">HTC phones</option>	 
			<option value="oneplus">OnePlus phones</option>
			<option value="asus">Asus phones</option>	
			<option value="google">Google phones</option>
			<option value="nokia">Nokia phones</option>
            <option value="other">Other phones</option>
		<option value="tv">TV</option>
		<option value="wear">Wear</option>	
		<option value="tablet">Tablet</option>
			 
		</select>
</div>
</li>
<li id="mdl" style="display: none;">
<div>Model</div>

<div>
		<select name="model" id="model" aria-label="Select Model">
		<option value="" selected="selected">Default</option>
		</select>
</div>
</li>
</ul>
	
<div style="padding: 5px 0 0 0px;font-size: 12px;" id="status"></div>
</div>
	
<div style="text-align: center;padding: 5px 0px 20px 5px;">		
<input class="w-button" id="apksubmit" type="submit" value="'.$button_label.'">		
</div>
						 
</form>
				
				<div class="downloader_area" id="ddea" style="display: none;">
					<div id="downloader_area">
					</div>
				
				</div>
		</div>
	</div>
</div>
	<div style="float: right;"><a title="apk downloader" href="https://apk.support/apk-downloader" style="font-size: 12px;" rel="nofollow">APK.Support</a></div>
	
	<div class="fulldesc">'.$apksupport_dsc.'</div>
	';

		return $output;
	}


}

new APK_Downloader;