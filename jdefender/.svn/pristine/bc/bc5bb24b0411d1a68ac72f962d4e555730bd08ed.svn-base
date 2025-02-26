<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Twitter_class extends WClasses {
	private $_active = false;
	public function __construct() {
		$this_active = WLoadFile( 'twitter.autoload', JOOBI_DS_INC, true, false );
		if ( ! $this_active ) return false;
	}
	public function postWall($post=null,$crednetialO=null) {
		if ( ! $this->_active ) return false;
		$twitter = $this->_getTwitter( $crednetialO );
		if ( ! $this_active ) return false;
		$content = $twitter->get( "account/verify_credentials" );
		if ( isset($content->errors) ) {
			return false;
		}		
		if ( preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $post->content,$matches) ) {
			$mparams['media'] = $matches[1];
			$media = $twitter->upload('media/upload',$mparams);
			if ( isset($media->errors) ) {
				return false;
			}			$params['media_ids'] = $media->media_id;
		}	
		$params['status'] = strip_tags($post->content);
		if(strlen($params['status']) > 140){
			$params['status'] = substr($params['status'], 0,140);
		}
		$content = $twitter->post("statuses/update",$params);
		if(isset($content->errors)){
			return false;
		}	
		return true;
	}
	private function _getTwitter($credentials) {
		static $tw = null;
		if ( empty($tw) ) {
			$consumer_key = $credentials->username;			$consumer_secret = $credentials->passcode;			$accessToken = $credentials->accesstoken;				$tokenSecret = $credentials->accesstokensecret;		
			$tw = new \Abraham\TwitterOAuth\TwitterOAuth( $consumer_key, $consumer_secret, $accessToken, $tokenSecret );
			if ( empty($tw) ) $this_active = false;
		}		
		return $tw;
	}		
}