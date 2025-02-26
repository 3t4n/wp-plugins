<?php

class AccountmanagerApi
{
	protected $serverUrl = "https://accounts.edelpaper.com/api";
	protected $sDefaultRssFeed = "https://www.edelpaper.com/e/feed/?tag=wp_plugin";
	protected $appCode = "edelpaper";
	protected $curlTimeout = 30;
	protected $accountmanagerApiOptionIndex = 'edelpaper_plugin';
	protected $settings = NULL;

	public function __construct(){
		$this->checkDebugmode();
		$this->loadSettings();
	}

	public function getOptionIndex(){
		return $this->accountmanagerApiOptionIndex;
	}

	public function checkDebugmode(){
		try{
			$file = sprintf('%s/../config_local.json', __DIR__);
			if(file_exists($file)){
				//delete_option($this->accountmanagerApiOptionIndex);
				$settings = json_decode(file_get_contents($file));
				foreach($settings as $var => $value){
					$this->{$var} = $value;
				}
			}
		}catch(Exception $e){
			return false;
		}
	}

	private function loadSettings($force = false){

		$this->settings = get_option($this->accountmanagerApiOptionIndex);
        if($this->settings == false || $force == true):
			try{
		        $apiCall = sprintf("getAppClientSettings/%s", $this->appCode);
		        $sJsonReturn = $this->sendRequest($apiCall);
		        $oSettings = json_decode($sJsonReturn);
		        $this->settings = isset($oSettings->response->params)?$oSettings->response->params:false;

		    }catch(Exception $e){
		    	$this->settings = NULL;
		    }

            update_option($this->accountmanagerApiOptionIndex, $this->settings);

        endif;
	}

	public function getAppUrl(){
		return isset($this->settings->app_url)?$this->settings->app_url:false;
	}

	public function getRssUrl(){
		if(!isset($this->settings->rss_feed)){
			$this->loadSettings(true);
			return isset($this->settings->rss_feed)?$this->settings->rss_feed:$this->sDefaultRssFeed;
		}else return $this->settings->rss_feed;
	}

	public function getApiUrl(){
		return isset($this->settings->api_url)?$this->settings->api_url:false;
	}

	public function getDefaultEpaperUrl(){
		return isset($this->settings->fallback_url)?$this->settings->fallback_url:"http://www.1kcloud.com/ep1KSpot/";
	}

	public function getRegisterUrl(){
		//http://***/wordpress_plugin/requireApiKey?callback_url=http://***/wp-admin/admin.php?page=epaper_apikey
		if(!isset($this->settings->register_url) || empty($this->settings->register_url)){
			$this->loadSettings(true);
		}
		$callbackUrl = (sprintf('%sadmin.php?page=epaper_apikey', get_admin_url()));
		return sprintf('%s?callback_url=%s', $this->settings->register_url, $callbackUrl);
	}

	public function getManageAccountUrl(){
		return isset($this->settings->manage_account)?sprintf('%s?return_to=%s',$this->settings->manage_account, get_admin_url()):false;
	}

	public function getPPButtonCode(){
		return false;
	}

    private function sendRequest($apiCall = NULL){
        $oCurl = curl_init();
        $sCurlUrl = sprintf('%s/%s',$this->serverUrl, $apiCall);
        curl_setopt($oCurl, CURLOPT_URL, $sCurlUrl);
        curl_setopt($oCurl, CURLOPT_TIMEOUT, $this->curlTimeout);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($oCurl, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($oCurl, CURLOPT_SSLVERSION, 6);
        if(OPENSSL_VERSION_NUMBER < 0x012080bf) {
            add_action( 'admin_notices', 'tgd_admin_notice_version_is_to_low' );
        }
        $sResponse = curl_exec($oCurl);
        $iStatus = curl_getinfo($oCurl, CURLINFO_HTTP_CODE);
        $sErrorMessage = curl_error($oCurl);
        curl_close($oCurl);
        return ($iStatus == 200) ? $sResponse : json_encode(array('Status' => $iStatus, 'Message' => $sErrorMessage));
    }

}

function tgd_admin_notice_version_is_to_low() {
    $class = 'notice notice-error';
    $message = __( 'Your server didn\'n support this plugin-version. Please update your php and ssl.', 'sample-text-domain' );

    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}
