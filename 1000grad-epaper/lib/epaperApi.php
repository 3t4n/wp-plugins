<?php
/**
 * Class wraps functions for communiction with the edelpaper API
 * @copyright (c) 2013, 1000grad Digital GmbH, Germany
 * @author Karsten Lemme <karsten.lemme@1000grad.de>
 */
class EpaperApi extends RestApi
{
    //set vars for epaper api
    private $epaperApiWsdl;
    private $epaperApiClient;
    
    private $isRegistered;
    private $apiPrefix = "epaper";    
    
    
    public function __construct() 
    {
        parent::__construct($this->apiPrefix);
        $this->_isRegistered();
    }
    
    /**
     *  Shall validate if plugin is registered
     */
    private function _isRegistered ()
    {
        if (isset($this->apiKey) && ($this->apiKey != "")) {
            $this->isRegistered = true;
        } else {
            $this->isRegistered = false;
        }        
    }
    
     /**
     * Infos ueber ePaper
     */
    public function returnEpaperInfos ($apiKey, $id) 
    {     
        try {
            return $this->doRequest('epaperGetInfos', array('epaperId' => (string)$id));
        } catch (Exception $e) {
            return  new WP_Error('ePaper read fault (1)', $e->getMessage() ); 
        }
    }
    
    /**
     * ePaper List
     */
    public function returnEpaperList ($apiKey)
    {
        try {
            return $this->doRequest('epaperGetList');
        } catch (Exception $e) {
            _e("ePaper read fault (2).",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;            
        }
    }
    
     /**
     * API Version
     */
    public function getEpaperApiVersion() 
    {  
        try {
            return $this->doRequest('getVersion');         
        } catch (Exception $e) {
            _e('Error with API Handling, please register your plugin!','1000grad-epaper')
            . $e->getMessage(); 
            return false;         
        }
    }
    
     /**
     * API Funktionen
     */
    public function getEpaperApiFunctions() 
    {  
        try {
            return $this->doRequest('__getFunctions');          
        } catch (Exception $e) {
            _e('Error with API Handling, please register your plugin!','1000grad-epaper') . $e->getMessage();
            return false;
        }
    }

     /**
     * Client Info
     */
    public function getEpaperApiClientInfos($apiKey) 
    {  
        try {
            return $this->doRequest('clientGetInfos');        
        } catch (Exception $e) {
            _e('Error with API Handling, please register your plugin!','1000grad-epaper') . $e->getMessage();
            return false;
        }
    }
    
     /**
     * Loeschen von einem ePaper
     */
    public function epaperDelete ($apiKey, $epaperId) 
    {
        try {
            $this->doRequest('epaperDelete', array('epaperId' => (string)$epaperId));
            return true;
        } catch (Exception $e) {
            _e("ePaper deletion fault.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        }   
    }
    
    /**
    * Publizierung des pdf
    */
    public function epaperCreateFromPdf($apiKey,$pdfId) 
    {
        try {
            return $this->doRequest('epaperCreateFromPdf', array('pdfId' => (string)$pdfId));
            
        } catch (Exception $e) {
            _e("ePaper creation fault.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        } 
    }
    
     /**
     * Rendering Prozess zur Publikation starten
     */
    public function epaperStartRenderprocess($apikey,$uploadId)
    {
        try {
            $this->doRequest('epaperStartRenderprocess', array('epaperId' => (string)$uploadId));
            return true;
        } catch (Exception $e) {
            _e("Error: Could not start render process.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        } 
    }
    
     /**
     * Setzen von ePaper Variablen
     */
    public function epaperSetVar($apikey, $uploadId , $key, $value)
    {
        try {
            $this->doRequest('epaperSetVar', array('epaperId' => (string)$uploadId, 'key' => (string)$key, 'value' => (string)$value));
            return true;
        } catch (Exception $e) {
            _e("Error: Could not set attribute.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        } 
    }

      /**
     * Abfragen von ePaper Variablen
     */
     public function epaperGetInfos($apikey, $uploadId)
    {
        try {
            return json_decode($this->doRequest('epaperGetInfos', array('epaperId' => (string)$uploadId)));
        } catch (Exception $e) {
            _e("Error: Could not set attribute.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        } 
    }

   /**
    * Verschieben bzw. Umbenennen von einem ePaper
    */
    public function epaperMove($apikey, $uploadId , $targetPath, $overwrite)
    {
        try {
            $this->doRequest('epaperMove', array('epaperId' => (string)$uploadId, (string)$targetPath, (boolean)$overwrite)); 
            return true;
        } catch (Exception $e) {
            _e("Error: Could not set attribute.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        } 
    }
    
    public function getEpaperPlayerLanguages($sLanguage){
        try {
            return json_decode($this->doRequest('getPlayerLanguages', array(
                'api_key' => $this->apiKey, 
                'player_version' => 'ng2', 
                'trans_language' => (string)$sLanguage)),
                true
            );

        } catch (Exception $e) {
            _e("Error: Could not fetch player languages.",'1000grad-epaper');
            echo $e->getMessage(); 
            return false;
        } 
    }
    
}
