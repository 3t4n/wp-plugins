<?php

/**
 * @link       https://www.suments.com
 * @since      1.0.0
 *
 * @package    Metawash 
 * @author     Suments Data <hola@metawash.me>
 */
class METAWASH_Admin
{

	private $Metawash;
	
	private $version;
	private $totalFiles, $convertedFiles;
	private $S_URL_PREFIX = "https://api.metawash.me/api";
	private $S_URL_POST = "";
	private $S_URL_TARGET = "";
	private $S_URL_HOST = "";

	private $S_PATH_TOKEN = "";
	private $S_PATH_FT = "";
	private $S_PATH_VERSION = "";
	private $S_PATH_LOGS = "";
	private $S_PATH_LOGS_ERRORS_STREAMS = "";

	private $S_PATH_CONFIG_AUTO = "";


	public function __construct($Metawash, $version)
	{

		$this->Metawash = $Metawash;
		$this->version = $version;

		$this->S_PATH_TOKEN =  plugin_dir_path( __DIR__ ).'config/token.suments';
		$this->S_PATH_FT =  plugin_dir_path( __DIR__ ).'config/ft.suments';
		$this->S_PATH_VERSION = plugin_dir_path( __DIR__ ).'config/version.suments';
		$this->S_PATH_LOGS = plugin_dir_path( __DIR__ ).'logs/last.log';
		$this->S_PATH_LOGS_ERRORS_STREAMS = plugin_dir_path( __DIR__ ).'logs/error_stream.log';

		$this->S_PATH_CONFIG_AUTO =  plugin_dir_path( __DIR__ ).'config/auto.suments';
	}


	public function enqueue_styles()
	{


		wp_enqueue_style($this->Metawash, plugin_dir_url(__FILE__) . 'css/metawash-admin.css', array(), $this->version, 'all');
		//wp_enqueue_style( $this->Metawash, plugin_dir_url( __FILE__ ) . 'css/styles.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->Metawash, plugin_dir_url( __FILE__ ) . 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), $this->version, 'all' );
	}


	public function enqueue_scripts()
	{

		wp_enqueue_script($this->Metawash, plugin_dir_url(__FILE__) . 'js/metawash-admin.js', array('jquery'), $this->version, false);
		wp_localize_script($this->Metawash, 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
	}

	public function dirFileCon_options_page()
	{
		add_menu_page(
			'meta-wash',
			'Metawash',
			'manage_options',
			'dfcon',
			array($this, 'template_dash'),
			plugin_dir_url( __FILE__ ).'/img/metawash_logo.svg'

		);
	}

	public function template_dash(){
		include_once(plugin_dir_path(__DIR__).'/template/dashboard.php' );
	}

	

	public function getDirectories()
	{
		$path_target = WP_CONTENT_DIR . '/uploads/';
		$directories = [];
		$filecount = 0;
		$seen = [];
		foreach (new RecursiveIteratorIterator (new RecursiveDirectoryIterator ($path_target)) as $x){

			if (is_dir($x->getPathname())){
								
				$name = str_replace($path_target, "", $x->getPathname());

				if ($name != "/uploads/." || $name != "/uploads/.."){
					$name = str_replace("/..", "", $name);
					$name = str_replace("/.", "", $name);

					if (!in_array($name, $seen)){
						$filecount = count( glob($x->getPathname() ."/*" ));
						array_push($seen, $name);	
						array_push($directories, [$name, $filecount]);
					}					
				}
			}
		}
		return array_slice($directories, 2);
	}

	public function config_update_automatic(){
	
		$current = $this->s_config_auto_get();

		if ($current == "0"){
			$this->s_config_auto_set("1");
		} else{
			$this->s_config_auto_set("0");
		}	
		echo "CACACACACACA";
		die();
	}
	

	public function directory_files_connvert()
	{
		$this->s_stream_set_params();
		$plan_limits = $this->s_plan_limits_get();

		$plan_limits->consumed = intval($plan_limits->consumed);
		$plan_limits->filesize = intval($plan_limits->filesize);
		$plan_limits->traffic = intval($plan_limits->traffic);

		$ft = $this->s_ft_get();
		$log_process = [
			"extension_not_supported" => [],
			"filesize_exceeded" => [],
			"traffic_exceeded" => [],
			"success" => [],
			"user_plan" => $plan_limits,
		];

		$path_taget = ($_POST['directory'] == "all") ? WP_CONTENT_DIR.'/uploads/' : WP_CONTENT_DIR.'/uploads/'.$_POST['directory'];
		foreach (new RecursiveIteratorIterator (new RecursiveDirectoryIterator ($path_taget)) as $x)
		{
			if (!is_file($x->getPathname())){
				continue;
			}
			
			$fileInfo = pathinfo($x->getPathname());
			//echo "fileextension:  ".  strtoupper($fileInfo["extension"]) ;
			if (!in_array( strtoupper( $fileInfo["extension"] ), $ft)){
				array_push($log_process["extension_not_supported"], str_replace(WP_CONTENT_DIR, "", $x->getPathname()));
				continue;
			}

			$filesize = filesize($x->getPathname());
			if ( $filesize > $plan_limits->filesize){
				array_push($log_process["filesize_exceeded"],str_replace(WP_CONTENT_DIR, "", $x->getPathname()));
				continue;
			}
			
			if ($plan_limits->consumed > $plan_limits->traffic){
				array_push($log_process["traffic_exceeded"], str_replace(WP_CONTENT_DIR, "", $x->getPathname()));
				break;
			}
			$plan_limits->consumed = $plan_limits->consumed + $filesize;
			
			$this->apiCall_debug($x->getPathname(), $fileInfo["extension"]);
			array_push($log_process["success"], str_replace(WP_CONTENT_DIR, "", $x->getPathname()));
		}
		
		$json_data = json_encode($log_process);
		$this->s_log_results($json_data);
		echo $json_data;
		die();

	}

	private function s_log_results($results){
		file_put_contents($this->S_PATH_LOGS, $results);
	}

	public function apiCall_debug($filename, $fileext){
		$fp = fsockopen($this->S_URL_TARGET, 443, $errno, $errstr, 30);
		if (!$fp)                                                      
		{	
			echo "$errstr ($errno)<br />\n";
		}
		$file=fopen($filename,'rb');   
		$vars = array(
			'file' => '',
			'token' => $this->s_token_get(),
			'filename'=> $filename,
			'ext' => $fileext
		);
		$l = fread($file,1);           
		while(strlen($l) !== 0)        
			{
				$vars['file'] .= $l;   
				$l = fread($file,1024);
			}

		$content = http_build_query($vars);
		fwrite($fp, "POST ".$this->S_URL_POST." HTTP/1.1\r\n");
		fwrite($fp, "Host: ".$this->S_URL_HOST."\r\n");
		fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
		fwrite($fp, "Content-Length: ".strlen($content)."\r\n"); 
		fwrite($fp, "Connection: close\r\n");
		fwrite($fp, "\r\n");
		fwrite($fp, $content);
		header('Content-type: text/plain');
		
		while (!feof($fp))  
		{
			$input = fgets($fp);     
			if($input == "Start\n")  
			{                        
				$input = '';         
				break;
			} 
		}
		unlink($filename);           
		$fout = fopen($filename,'x');
		$output ='';                 
		while (!feof($fp))           
			{
			$output .= fgets($fp);   
			}
		fwrite($fout,$output,strlen($output)); 
		#sleep(1);
		fclose($fp);                 
		fclose($fout);               
		chmod($filename, 0666);
		
	}

	public function mc_catch_uploaded($array){

		if ($this->s_config_auto_get() == "0"){
			return $array;
		}

		if ( empty($array['file']))
			return false;

		$this->mc_local($array);

		return $array;
	}

	private function mc_local($array)
	{
		$fileInfo = pathinfo($array['file']);
				
		$filePath = $fileInfo['dirname'] . '/'.$fileInfo['basename'];
		$extension = $fileInfo['extension'];
		
		
		
		return 	$this->mc_local_clear($filePath, $extension);
	}

	private function mc_local_clear($imagePath, $extension){
		$extension = strtoupper($extension);
		$token_validation = $this->s_token_validate();
		
		if($token_validation->plan_name == "free"){
			if ( $extension != 'JPG' && $extension != 'JPEG' && $extension != 'PNG' && $extension != 'GIF'){	
				return $imagePath;
			}
		}
		
		$this->s_stream_set_params();
		$this->apiCall_debug($imagePath, $extension);
		chmod($imagePath, 0666);
		return $imagePath;

	}


	public function mc_save_token(){


		if (empty($_POST['input_token']) || strlen($_POST['input_token']) != 32 || !ctype_alnum($_POST['input_token'])){
			echo "failure";
			die();
		} else {
			$this->s_token_set($_POST['input_token']);
		}
		
	}

	public function mc_delete_token(){

		$file = plugin_dir_path(__DIR__) . '/config/token.suments';
		$handle = fopen($file, 'w');
		ftruncate($handle, 0);
		fclose($handle);   
		return ;
}

public function mc_contact_mail(){

	if(!$_POST['email'] === ''){
		$to = 'hola@suments.com'; 
		$fromName = 'Meta wash'; 
		$subject = "Contact Us"; 
		$message = "Email: ".$_POST['email']; 
		$message = "\n"; 
		$message = "Message: ".$_POST['msg']; 
		$headers = 'From: '. $_POST['email'] . "\r\n" . 'Reply-To: ' . $_POST['email'] . "\r\n";             
		// Send email 
		if(wp_mail($to, $subject, $message, $headers)){ 
				 $res = 1; 
			}else{
				$res = 0; 
			}
	}else{
		$res = 0;
	}
	echo $res;
	die;
}

	private function s_stream_set_params(){
		$url = $this->S_URL_PREFIX."/mc_ur_get_params";
		$stream_params = $this->s_api_call_generic($url)->payload;
		$this->S_URL_POST = $stream_params->post;
		$this->S_URL_TARGET = $stream_params->target;
		$this->S_URL_HOST = $stream_params->host;
		return;
	}

	private function s_version_get_remote(){
		$url = $this->S_URL_PREFIX."/mc_current_version";
		return  $this->s_api_call_generic($url)->payload->version;
	}

	private function s_version_get_local(){
		return  file_get_contents($this->S_PATH_VERSION);
	}

	private function s_plan_limits_get(){
		$url = $this->S_URL_PREFIX."/mc_plan_limits";
		$data = array("rup" => $this->s_token_get());
		return $this->s_api_call_generic($url, $data)->payload;
	}

	private function s_ft_get(){
		$ft = file_get_contents($this->S_PATH_FT);

		return explode(",", $ft);

	}

	private function s_ft_update(){
		$url = $this->S_URL_PREFIX."/mc_files_supported";
		//echo $url;
		
		$tmp = "";
		$tmp_ft = "";
		foreach(  $this->s_api_call_generic($url)->payload->ft as $current){
			$current = str_replace(".", "", $current);

			$tmp_ft = $tmp_ft . strtoupper($current).",";
		}
		file_put_contents($this->S_PATH_FT, substr($tmp_ft, 0, -1) );
		return ;
	}

	private function s_api_call_generic($url, $data = false, $method="POST")	{
		$curl = curl_init();

		$data["token"] = $this->s_token_get();
		
		switch ($method)
		{
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_PUT, 1);
				break;
			default:
				if ($data)
					$url = sprintf("%s?%s", $url, http_build_query($data));
		}

		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($curl);

		curl_close($curl);
		return json_decode($result);
	}

	private function s_token_validate(){
		
		$url = $this->S_URL_PREFIX."/mc_token_validate";
		$token_info = $this->s_api_call_generic($url, $data)->payload;
		return $token_info;

	}

	private function s_token_get(){
		return file_get_contents($this->S_PATH_TOKEN);
	}

	private function s_token_set($token){
		return file_put_contents($this->S_PATH_TOKEN, $token);
	}

	private function s_config_auto_get(){
		return file_get_contents($this->S_PATH_CONFIG_AUTO);
	}

	private function s_config_auto_set($value){
		return file_put_contents($this->S_PATH_CONFIG_AUTO, $value);
	}

}