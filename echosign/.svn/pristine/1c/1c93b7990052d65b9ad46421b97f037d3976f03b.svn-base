<?php
/**
 * EchoSign.
 *
 * EchoSign plugin file.
 *
 * @package   Smackcoders\EchoSign
 * @copyright Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 * @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
 *
 * @wordpress-plugin
 * Plugin Name: EchoSign
 * Version:     1.4.1
 * Plugin URI:  https://www.smackcoders.com/wp-ultimate-csv-importer-pro.html
 * Description: Since Echo Sign was acquired and migrated as Adobe Esign, the plugin is discontinued and no longer supported.
 * Author:      Smackcoders
 * Author URI:  https://www.smackcoders.com/wordpress.html
 * Text Domain: echosign
 * Domain Path: /languages
 * License:     GPL v3
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

// Exit if accessed directly
if(!defined('ABSPATH'))
exit;

define('WP_ECHOSIGN_NAME', 'EchoSign');
define('WP_ECHOSIGN_VERSION', '1.4.1');
define('WP_ECHOSIGN_DIR', plugin_dir_path(__FILE__));

global $echosign;
class wp_echosign
{
	private static $instance;

	public $echosign_api;

	public $api_key;

	public static $option_name = 'wp_options_echosign_';

	public static $default_button_label = 'Sign NDA before placing order';

	/**
	 * create new instance of echosign
	 * @return object
	 */
	public static function instance()       {
		if(!isset(self::$instance))     {
			self::$instance = new wp_echosign();
			if ((isset($_REQUEST['page']) == 'wp-echosign-settings') || (isset($_REQUEST['page']) == 'wp-echosign-templates')) {
				add_action( 'admin_notices', array(self::$instance,'admin_notice_echosign'));
			}
			require_once(WP_ECHOSIGN_DIR . 'libs/echosign/Autoloader.php');
			require_once(WP_ECHOSIGN_DIR . 'inc.php');
			$loader = new SplClassLoader('EchoSign', WP_ECHOSIGN_DIR . 'libs/echosign/lib');
			$loader->register();

			$soap_client = new SoapClient(EchoSign\API::getWSDL());
			self::$instance->api_key = get_option('echosign_apikey');
			self::$instance->echosign_api = new EchoSign\API($soap_client, self::$instance->api_key);
			self::$instance->echosign_api->url_options = new EchoSign\Options\GetDocumentUrlsOptions;
			add_action('admin_menu', array('wp_echosign', 'wp_echosign_menu'));

			// enqueue scripts
			add_action('admin_init', array('wp_echosign', 'echosign_scripts'));
			add_action('wp_enqueue_scripts', array('wp_echosign', 'echosign_frontend_scripts'));
			add_action('wp_ajax_echosign_return_script', array('wp_echosign', 'echosign_return_script'));
		}
		return self::$instance;
	}

	/**
	 * enqueue frontend scripts
	 */
	public static function echosign_frontend_scripts()	{
		$admin_url = admin_url( 'admin-ajax.php' );
		// passing admin url to frontend script
		$data = array('admin_url' => $admin_url);

		wp_register_style('echosign_fontawesome', plugins_url('public/css/css/font-awesome.css', __FILE__));
		wp_enqueue_style('echosign_fontawesome');

		wp_register_style('echosign_style_frontend', plugins_url('public/css/echosign-frontend.css', __FILE__));
		wp_enqueue_style('echosign_style_frontend');
	}

	public  static function admin_notice_echosign() {
		global $pagenow;
		$active_plugins = get_option( "active_plugins" );
		if ( in_array('echosign/echosign.php', $active_plugins) ) {
			?>
			<div class="notice notice-warning is-dismissible" >
				<p> <b> Since Echo Sign was acquired and migrated as Adobe Esign, the plugin is discontinued and no longer supported.  </b> </p>
				<p>
			</div>
			<?php 
	   }
	}


	/**
	 * enqueue styles and scripts for admin end
	 */
	public static function echosign_scripts()	{

		$echosign_slugs = array('wp-echosign-settings', 'wp-echosign-templates', 'echosign_view');
		$slug = isset($_REQUEST['page']) ? sanitize_title($_REQUEST['page']) : '';
		// include scripts when echosign slug matches. no need to include on all pages
		if(in_array($slug, $echosign_slugs))	{
			// enqueue styles
			wp_register_style('echosign_bootstrap', plugins_url('public/css/bootstrap.css', __FILE__));
			wp_enqueue_style('echosign_bootstrap');

			wp_register_style('echosign_fontawesome', plugins_url('public/css/css/font-awesome.css', __FILE__));
			wp_enqueue_style('echosign_fontawesome');

			wp_register_style('echosign_style_adminend', plugins_url('public/css/echosign-adminend.css', __FILE__));
			wp_enqueue_style('echosign_style_adminend');

			// enqueue js scripts	
			wp_register_script('smack-echosign-js', plugins_url('public/js/echosign.js', __FILE__));
			wp_enqueue_script('smack-echosign-js');

			wp_register_script('validator-echosign-js', plugins_url('public/js/validator.js', __FILE__));
			wp_enqueue_script('validator-echosign-js');

		}
	}

	public static function echoSignLoader($class)	{
		if(file_exists(WP_ECHOSIGN_DIR . 'libs/echosign/' . str_replace('EchoSign', '', $class) . '.php'))
			require_once(WP_ECHOSIGN_DIR . 'libs/echosign/' . str_replace('EchoSign', '', $class) . '.php');

	}

	public static function wp_echosign_menu() {
		add_menu_page(WP_ECHOSIGN_NAME, WP_ECHOSIGN_NAME, 'manage_options', 'wp-echosign-templates', array('EchoSign', 'eor_hr_forms_section'));
		add_submenu_page('wp-echosign-templates', 'Settings', 'Settings', 'manage_options', 'wp-echosign-settings', array('wp_echosign', 'echosign_settings'));
	}

	/** 
	 * return embedded script for nonce
	 * @return string $script
	 */
	public function echosign_return_script()	{
		global $echosign;
		$response = array('result' => 'success');
		$wpnonce = sanitize_key($_REQUEST['wpnonce']);

		// TODO remove below document_id after testing
                $setting_info = get_option('__wp_echosign_settings_info');
		$document_name = $setting_info['woo_template'];
                list($document_id, $document_name) = explode('_',$document_name);
		$document_info = get_option('_echosign_document_details_of_' . $wpnonce);
		if($document_info)	{
			if($document_info['status'] == 'SIGNED')	
				$response['script'] = "<div class = 'alert alert-success'> You signed this document already. Download Signed document using this <a href ='" . esc_url($document_info['document_download_url']) . "'> link </a> </div>";
			else
				$response['script'] = $echosign->eor_getIframeContent($document_info['widget_id']);

		}
		else	{
			$user_id = get_current_user_id(); 
			$user_data = get_userdata( $user_id ); 
			// generate document for this nonce
			$document_info = $echosign->createEmbeddedWidget($document_id, $user_data);		
			if($document_info)	{
				update_option('_echosign_document_details_of_' . $wpnonce, $document_info);
				$response['script'] = $echosign->eor_getIframeContent($document_info['widget_id']);		
			}
			else	{
				$response['result'] = 'fail';
			}
		}
		$response['title'] = $document_info['document_name'];
		wp_send_json($response);
	}

	/**
	 * get iframe content from the echosign widget
	 * @param array $echosign_widget_info
	 * @return string $js_content
	 */
	public function eor_getIframeContent($echosign_widget_info)    {
		$dom = new DOMDocument();
		$dom->loadHTML($echosign_widget_info);
		$scripts = $dom->getElementsByTagName('script');
		for($i = 0; $i < $scripts->length; $i++)       {
			$script = $scripts->item($i);
			$js_content = file_get_contents($script->getAttribute('src'));
			$js_content = str_replace("document.write('", '', $js_content);
			$js_content = substr($js_content, 0, -3);
		}
		return $js_content;
	}

	/**
	 * return document information
	 * @param string $document_key
	 * @return array $doc_info
	 */
	public function get_document_information($document_key)	{
		global $echosign;
		$result  = $echosign->getFormData($document_key);
		$csv_data = $result->getFormDataResult->formDataCsv;
		$user_id = get_current_user_id();
		$user_data = get_userdata($user_id);
		$user_email = $user_data->user_email;

		$doc_info = array();
		$child_document_key = $echosign->getWidgetChildDocumentKey($user_email, $document_key, $csv_data);
		if(empty($child_document_key))
			return false;

		// getting document info
		$documentInfo = $echosign->echosign_api->getDocumentInfo($child_document_key);

		$doc_info['status'] = $documentInfo->documentInfo->status;
		$doc_info['child_document_key'] = $child_document_key;
		$doc_url_info = $echosign->echosign_api->getDocumentUrls($child_document_key, $echosign->echosign_api->url_options);
		if($doc_url_info->getDocumentUrlsResult->errorCode == 'OK')     {
			$doc_info['document_download_url'] = $doc_url_info->getDocumentUrlsResult->urls->DocumentUrl->url;
		}
		return $doc_info;
	}

	/**
	 * get form data 
	 * @param string $document_key
	 * @return array $result
	 */
	public function getFormData($document_key)  {
		global $wpdb; global $echosign;
		try	{
			$result = $this->echosign_api->getFormData($document_key);
			return $result;
		}
		catch(Exception $e)	{
			return $e;
		}
	}

	/**
	 * check document key and return status
	 * doc information will be updated in the option table
	 * @param string $doc_key
	 * @param string $template_name
	 * @param string $product_id
	 * @return string $child_key
	 */
	public function checkEchosignDocumentStatus($doc_key, $template_name, $product_id = null)  {
		global $echosign;
		$result  = $echosign->getFormData($doc_key);
		$csv_data = $result->getFormDataResult->formDataCsv;

		$user_id = get_current_user_id();
		$user_data = get_userdata($user_id);
		$user_email = $user_data->user_email;

		if(!empty($product_id))
			$option_name = "_eor_echosign_template_{$user_id}_{$product_id}_{$template_name}";
		else
			$option_name = "_eor_echosign_template_{$user_id}_{$template_name}";

		$doc_info = get_option($option_name);
		$child_document_key = $echosign->getWidgetChildDocumentKey($user_email, $doc_key, $csv_data);
		if(empty($child_document_key))
			return $doc_info;

		// getting document info
		$documentInfo = $echosign->echosign_api->getDocumentInfo($child_document_key);
		$doc_info['status'] = $documentInfo->documentInfo->status;
		$doc_info['child_document_key'] = $child_document_key;
		$doc_url_info = $echosign->echosign_api->getDocumentUrls($child_document_key, $echosign->echosign_api->url_options);
		if($doc_url_info->getDocumentUrlsResult->errorCode == 'OK')     {
			$doc_info['document_download_url'] = $doc_url_info->getDocumentUrlsResult->urls->DocumentUrl->url;
		}
		return $doc_info;
	}

	/**
	 * return widget child document key
	 * @param string $user_email
	 * @param string $document_key
	 * @param string $csv_data
	 */
	public function getWidgetChildDocumentKey($user_email, $document_key, $csv_data)       {
		$response = array();
		$exploded_csv = explode(PHP_EOL, $csv_data);
		foreach($exploded_csv as $single_row)   {
			$response[] = str_getcsv($single_row);
		}

		$document_array_key = array_search('Document Key', $response[0]);
		// if document key not present, then form is not signed
		if(empty($document_array_key))
			return false;

		$email_array_key = array_search('email', $response[0]);
		foreach($response as $row_key => $single_row_data)      {
			if($single_row_data[$email_array_key] == $user_email)   {
				if(!empty($single_row_data[$document_array_key]))
					return $single_row_data[$document_array_key];

			}
		}
		return false;
	}

	/**
	 * create embedded widget using given information
	 * @param integer $document_id
	 * @param array $user_data
	 */
	public function createEmbeddedWidget($document_id, $user_data)  	{
		global $echosign;
		$user_id = $user_data->ID;
		$document_info = get_option('_eor_echosign_template_info');
		$document_name = $document_info[$document_id]['document_name'];
		$merge_fields = $document_info[$document_id]['merge_fields'];
		try	{
			$widget_document = EchoSign\Info\FileInfo::createFromFile($document_info[$document_id]['document_info']['location']);
			$widget = new EchoSign\Info\WidgetCreationInfo($document_name, $widget_document);
			$widget->setMergeFields(new EchoSign\Info\MergeFieldInfo($merge_fields));
			$personalization = new EchoSign\Info\WidgetPersonalizationInfo($user_data->user_email);

			$widget_response = $echosign->echosign_api->createEmbeddedWidget($widget);
			$js = $widget_response->embeddedWidgetCreationResult->javascript;

			$result = $echosign->echosign_api->personalizeEmbeddedWidget($js, $personalization);
			$document_key = $result->embeddedWidgetCreationResult->documentKey;
			$widget_id = $result->embeddedWidgetCreationResult->javascript;

			$doc_info = array();
			$doc_info['document_key'] = $document_key;
			$doc_info['widget_id'] = $widget_id;
			$doc_info['template_name'] = $document_name;
			$doc_info['status'] = null;
		}
		catch(Exception $e)	{
			// TODO catch exception and show it to user
			print_r($e);
		}
		return $doc_info;
	}

	/**
	 * send echosign document to given email
	 * @param string $recipient_email
	 * @param string $template_name
	 * @param string $document_name
	 */
	public function sendDocument($recipient_email, $template_name, $document_name)	{
		global $echosign, $wpdb;
		#return true;
		$user_id = get_current_user_id();
		$recipients = new EchoSign\Info\RecipientInfo;
		$recipients->addRecipient($recipient_email);
		$upload_dir = wp_upload_dir();
		$template_dir = $upload_dir ['basedir'] . '/echosign-templates';
		$fileInfo = EchoSign\Info\FileInfo::createFromFile($template_dir . '/' . $template_name . '.pdf');

		$document = new EchoSign\Info\DocumentCreationInfo($document_name, $fileInfo);
		$document->setRecipients($recipients);

		try	{
			$result = $this->echosign_api->sendDocument($document);
			$document_id = $result->documentKeys->DocumentKey->documentKey;
			$document_status = 'created';
			$created_at = date('Y-m-d H:i:s');
		}
		catch(Exception $e)	{
			print '<h3> An exception occurred: </h3>';
			var_dump($e);
		}
	}
	public static function echosign_settings()	{
		require_once(WP_ECHOSIGN_DIR . 'templates/settings.php');
	}

	// To get user email  
	public static function userDetails() {
		global $wpdb;
		$user_id = get_current_user_id();
		$get_user_data = get_userdata($user_id);
		$user_email    = $get_user_data->user_email;
		return $user_email;
	}

	public function processCreateEmbeddedWidget($document_name,$template_location,$merge_fields,$user_id)   {
		global $wpdb; global $echosign;
		$user_id = $user_id;
		$file = EchoSign\Info\FileInfo::createFromFile($template_location);
		$widget = new EchoSign\Info\WidgetCreationInfo($document_name,$file);
		$widget->setMergeFields(new EchoSign\Info\MergeFieldInfo($merge_fields));
		try     {
			$result = $this->echosign_api->createEmbeddedWidget($widget);
			if(!empty($result->embeddedWidgetCreationResult->errorCode) && $result->embeddedWidgetCreationResult->errorCode != 'OK')    {
				$error_message = $result->embeddedWidgetCreationResult->errorMessage;
				return;
			}
			$document_key = $result->embeddedWidgetCreationResult->documentKey;
			$widget_id    = $result->embeddedWidgetCreationResult->javascript;
			$temp_info = array();
			$temp_info['document_key'] = $document_key;
			$temp_info['widget_id'] = $widget_id;
			$temp_info['template_name'] = $document_name;
			$temp_info['status'] = null;
			update_option("_eor_echosign_template_widget_{$user_id}_{$document_name}", $temp_info);
		}
		catch(Exception $e){
			print '<h3>An exception occurred:</h3>';
			var_dump($e);
		}
	}

}

function echosign_init()        {
	return wp_echosign::instance();
}

function process_echosign_template($atts) {
	global $wpdb;global $echosign;
	$user_id = get_current_user_id();
	$form_fields = array();
	$get_widget = array();
	$atts = shortcode_atts( array(
		'id' => ''
	), $atts );
	$doc_id  = $atts['id'];
	$template_info = get_option('_eor_echosign_template_info');

	// Merge Fields
	$get_merge_fields    = $template_info[$doc_id]['merge_fields'];
	$get_merge_values    = $template_info[$doc_id]['merge_values'];
	$get_cf_merge_values = $template_info[$doc_id]['cf_merge_values'];
	$document_name       = $template_info[$doc_id]['document_name'];
	$template_location   = $template_info[$doc_id]['document_info']['location'];
	// Form Merge Field Array
	if(is_array($get_merge_fields)) {
		foreach ( $get_merge_fields as $ckey => $mval ) {
			if ( ! empty( $get_merge_values[ $ckey ] ) ) {
				if ( $get_merge_values[ $ckey ] == 'user_email' ) {
					$get_user_val         = wp_echosign::userDetails();
					$form_fields[ $mval ] = $get_user_val;
				} else {
					$get_user_val         = get_user_meta( $user_id, $get_merge_values[ $ckey ], true );
					$form_fields[ $mval ] = $get_user_val;
				}
			} else {
				$form_fields[ $mval ] = $get_cf_merge_values[ $ckey ];
			}
		}
	}


	$get_widget  = get_option("_eor_echosign_template_widget_{$user_id}_{$document_name}");
	if(empty($get_widget)) {
		$result = $echosign->processCreateEmbeddedWidget($document_name,$template_location,$form_fields,$user_id);
		$get_widget  = get_option("_eor_echosign_template_widget_{$user_id}_{$document_name}");
		return $get_widget['widget_id'];
	}
	else {
		$get_widget  = get_option("_eor_echosign_template_widget_{$user_id}_{$document_name}");
		$doc_key = $get_widget['document_key'];
		$doc_status = $echosign->get_document_information($doc_key);
		if($doc_status['status'] == 'SIGNED') {
			$get_widget['status'] = 'SIGNED';
			$get_widget['download_url'] = $doc_status['document_download_url'];
			update_option("_eor_echosign_template_widget_{$user_id}_{$document_name}",$get_widget);
		}
		$download_url = '';
		if(isset($get_widget['download_url'])) {
			$download_url = $get_widget['download_url'];
		}
		return '<div class = "alert alert-success">  You Signed this document <a href = "' . esc_url($download_url) . '"> Click Here</a> to download </div>';
	}
}
add_shortcode('echosign_template','process_echosign_template');

$echosign = echosign_init();

function echosignaddNewRow() {
     global $wpdb; 
     $temp_info = get_option('_eor_echosign_template_info');
     $row = sanitize_text_field($_REQUEST['row']);
     $user_data = array('' => '-- Select --','first_name'=>'First Name','last_name' => 'Last Name','billing_address_1' => 'Address1','billing_address_2' => 'Address2','billing_city' => 'City','billing_postcode' => 'Postcode','billing_country' => 'Country','billing_state' => 'State','billing_phone' => 'Phone','user_email' => 'Email');
     $html = '';
     $html .=  '<tr id="row-'.$row.'" >';
     $html .= '<td data-name="merge_fields['.$row.']" class = "">
                           <input type="text" name="merge_fields['.$row.']"  placeholder="Enter value" class="form-control" required  value = "" />
                </td>';
     $html .= '<td data-name="merge_values['.$row.']" class = "">
                                                    <select name="merge_values['.$row.']" class = "form-control" required>';
                                                   
                                                      foreach($user_data as $ukey => $uval ) { 
    $html .= '                                                    <option value = "'.$ukey.'"  >  '. $uval .' </option>';
                                                     }
    $html .= '                                                </select>
                                 </td>';
   $html .= ' <td data-name="del-'.$row.'">';
   $html .= '     <button name = "del" id = "del-'.$row.'" class="btn btn-danger fa fa-times fa-1x row-remove" onclick = "echosign_removeRow(this.id);"></button>
                                   </td>
                                        </tr>';

   echo $html; 

 }
add_action('wp_ajax_echosignaddNewRow','echosignaddNewRow');

function echosignaddNewCustomRow() {
	$temp_info = get_option('_eor_echosign_template_info');
	$row = sanitize_text_field($_REQUEST['row']);
	$html = '';
	$html .=  '<tr id="row-'.$row.'" >';
	$html .= '<td data-name="merge_fields['.$row.']" class = "">
		<input type="text" name="merge_fields['.$row.']"  placeholder="Enter value" class="form-control" required  value = "" />
		</td>';
	$html .= '  <td data-name="cf_merge_values['.$row.']" class = "">
		<input type="text" name="cf_merge_values['.$row.']"  placeholder="Enter value" class="form-control" required  value = "" />
		</td>';
	$html .= '<td data-name="del-'.$row.'">';
	$html .= '                         <button name = "del" id = "del-'.$row.'" class="btn btn-danger fa fa-times fa-1x row-remove" onclick = "echosign_removeRow(this.id);"></button>
		</td>
		</tr>';

	echo $html; 


}
add_action('wp_ajax_echosignaddNewCustomRow','echosignaddNewCustomRow');
