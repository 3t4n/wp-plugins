<?php

namespace SixStorageOnline\Base;

use SixStorageOnline\helper\Six_Storage_Logger;
use SixStorageOnline\models\Six_Storage_LeadTable;

class Six_Storage_EnquiryControllerSixStorage extends Six_Storage_BaseController {
	public function Six_Storage_EnquiryController_register() {

		add_action('wp_ajax_six_storage_inquiry_now', [$this, 'sixstorageinquirynow']);
        add_action('wp_ajax_nopriv_six_storage_inquiry_now', [$this, 'sixstorageinquirynow']);

		add_shortcode('six-storage-enquiry-form', [ $this, 'six_storage_online_enquiry' ] );
	}

	public function six_storage_online_enquiry() {

		wp_enqueue_style( 'materialize', $this->six_storage_plugin_url . 'assets/css/materialize/materialize.css', array(), $this->six_storage_plugin_version );
		wp_enqueue_style('cc-enquiry-model-style', $this->six_storage_plugin_url . 'assets/css/cc-move-in-style.css' ,array(), $this->six_storage_plugin_version);
		wp_enqueue_style( 'icon', $this->six_storage_plugin_url . 'assets/fonts/icon.css' );
		

		require_once $this->six_storage_plugin_path . 'template/portal/Enquiry.php';
		//wp_localize_script('six-storage-move-in.min', 'wordpress_vars', $this->six_storage_getPluginvars($this->six_storage_autoPaymentsEnabled));

		wp_enqueue_script( 'enquiry-js', $this->six_storage_plugin_url . 'assets/js/six-storage-enquiry.min.js', array(), $this->six_storage_plugin_version );
		wp_localize_script('enquiry-js', 'wordpress_vars', $this->six_storage_getPluginvars());
	}

	public function sixstorageinquirynow()
	{
		$sixStorageEnquiry = sanitize_text_field($_POST['sixStorageEnquiry']);
		$sixStorageEnquiry = json_decode(str_replace('\"', '"', $sixStorageEnquiry));


		( new Six_Storage_LeadTable() )->create( (array) $sixStorageEnquiry );

		wp_send_json('Success');

	}

}