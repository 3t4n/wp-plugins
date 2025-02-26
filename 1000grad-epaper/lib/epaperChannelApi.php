<?php
/**
 * Class wraps functions for communiction with the 1000grad channel API
 * @copyright (c) 2013, 1000grad DIGITAL Leipzig GmbH
 * @author Karsten Lemme <karsten.lemme@1000grad.de>
 */
class EpaperChannelApi extends RestApi
{
    private $channelApiClient;

    private $isRegistered;
    private $apiPrefix = "channels";

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
     * Abfrage der Kanal Liste
     */
    public function getChannelsList()
    {
        try {
            $list = $this->doRequest('channelsGetList');
            return $list;
        } catch (Exception $e) {
            _e("Error with API Key Authentification.",'1000grad-epaper');
            echo $e->getMessage();
            return false;
        }
    }

     /**
     * Api Version
     */
    public function getChannelApiVersion ()
    {
        try {
            $version = $this->doRequest('getVersion');
            return $version;
        } catch (Exception $e) {
            _e('Error with Channel API Handling, please register your plugin!','1000grad-epaper')
            . $e->getMessage();
            return false;
        }
    }

     /**
     * Api Funktionen
     */
    public function getChannelApiFunctions()
    {
        try {
            $functions = $this->doRequest('__getFunctions');
            return $functions;
        } catch (Exception $e) {
            _e('Error with Channel API Handling, please register your plugin!','1000grad-epaper') . $e->getMessage();
            return false;
        }
    }

     /**
     * ePaper Loeschen aus einem Kanal
     */
    public function removeEpaperFromChannel ($apiKey, $id)
    {
        try {
            $this->doRequest('channelsRemoveEpaperFromChannel', array('channelId' => (string)$id));
            return true;
        } catch (Exception $e) {
            echo "<br />";
            _e("Error: could not remove edelpaper.",'1000grad-epaper');
            echo $e->getMessage();
            return false;
        }
    }

     /**
     * Publikation eines ePaper in einen Kanal
     */
    public function publishEpaperToChannel ($apiKey, $epaperId, $id)
    {
        try {
            $res = $this->doRequest('channelsPublishEpaperToChannel', array('epaperId' => (string)$epaperId, 'channelId' => (string)$id));
            return $res;
        } catch (Exception $e) {
            echo "<br />";
            _e("Error while Channelizing.",'1000grad-epaper');
            echo $e->getMessage();
            return false;
        }
    }

     /**
     * Kanal Infos
     */
    public function getChannelInfo($apiKey, $channelId)
    {
        try {
            $res = $this->doRequest('channelsGetChannelInfo', array('channelId' => (string)$channelId));
            return $res;
        } catch (Exception $e) {
            echo "<br />";
            _e("Error with edelpaper Channel.",'1000grad-epaper');
            echo $e->getMessage();
            return false;
        }
    }


     /**
     * Kanal Name
     */
    public function setChannelTitle($apiKey, $iChannelId, $sTitle)
    {
        try {
            $res = $this->doRequest('channelsSetChannelTitle', array('channelId' => (string)$iChannelId, 'title' => (string)$sTitle));
            return $res;
        } catch (Exception $e) {
            echo "<br />";
            _e("Error with edelpaper Channel.",'1000grad-epaper');
            echo $e->getMessage();
            return false;
        }
    }






}
