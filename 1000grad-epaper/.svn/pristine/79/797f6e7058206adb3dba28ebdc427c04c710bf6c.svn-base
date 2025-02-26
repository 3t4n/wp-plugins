<?php


class RestApi
{
	private $apiPrefix = NULL;
	private $curlTimeout = 30;
	protected $epaperOptions;
	protected $apiKey;
	protected $apiUrl;

	public function __construct($apiPrefix = NULL){
        	$this->apiPrefix = $apiPrefix;
        	$this->epaperOptions = get_option("plugin_epaper_options");
        	if(isset($this->epaperOptions['apikey']))
        	    $this->apiKey = $this->epaperOptions['apikey'];
            if(isset($this->epaperOptions['url']))
        	$this->apiUrl = $this->epaperOptions['url'];
	}

	public function doRequest($method = NULL, $params = NULL){
                $oCurl = curl_init();
                $params['method'] = $method;
                $params['apikey'] = $this->apiKey;
                $curlServerUri = preg_replace("(^https?://)", "", $this->apiUrl );
                $sCurlUrl = preg_replace('/(\/+)/','/',sprintf('%s/%s-rest?%s',$curlServerUri, $this->apiPrefix, http_build_query($params)));

                curl_setopt($oCurl, CURLOPT_URL, $sCurlUrl);
                curl_setopt($oCurl, CURLOPT_TIMEOUT, $this->curlTimeout);
                curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($oCurl, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
                curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($oCurl, CURLOPT_FOLLOWLOCATION, true);
                $sResponse = curl_exec($oCurl);
                $iStatus = curl_getinfo($oCurl, CURLINFO_HTTP_CODE);
                $sErrorMessage = curl_error($oCurl);
                curl_close($oCurl);
                if(!empty($sErrorMessage)){
                        //
                }
                $oXML = new SimpleXMLElement($sResponse);

                return ($iStatus == 200) ? $oXML->{$method}->response : json_encode(array('Status' => $iStatus, 'Message' => $sErrorMessage));
	}

        public function getRestUploadUrl(){
                return sprintf('%spdf-upload?apikey=%s', $this->apiUrl, $this->apiKey);
        }
}
