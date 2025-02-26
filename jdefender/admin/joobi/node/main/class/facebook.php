<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Main_Facebook_class extends WClasses {
	static $fb;
	public function editSocial() {
					$pages = new stdClass();
			$code = WGlobals::get( 'code' );
			$crdid = WGlobals::get('eid');
			if(!empty($code)){
				if(!empty($crdid)){
					if($this->loginRedirect($crdid)){
					}				}			}			
			$pages = $this->getPages($crdid);
			return $pages;
	}	
	public function checkSocialToken($crdid) {
		$credentialO = WModel::getElementData( 'main.credential', $crdid );
		if ( empty($credentialO) ) return true;
		if ( empty( $credentialO->username ) || empty( $credentialO->passcode ) ) {
			$this->adminW( 'To get token you need to first specify ID and password!' );				return true;
		}		
		$exit = WLoadFile( 'Facebook.autoload', JOOBI_DS_INC, true, false );
		if ( ! $exit ) return false;
		$fb = new Facebook\Facebook([
				'app_id' => $credentialO->username,				
				'app_secret' => $credentialO->passcode,				
				'default_graph_version' => 'v2.4',
		]);
		$helper = $fb->getRedirectLoginHelper();
				$userdata = json_decode($credentialO->apisecret);
				if(empty($userdata)){
					$permissions = ['publish_actions','manage_pages','publish_pages']; 		
					$loginUrl = $helper->getLoginUrl( JURi::current().'?option=com_japps&controller=main-credentials&task=edit&eid='.$crdid, $permissions );
					header('location:'.$loginUrl);die;
				}else{
					$app = $fb->getApp();
					$apptoken = (string)$app->getAccessToken();
					$check = $this->checkPermissions($fb, $userdata->access_token, $apptoken);
					if(!$check){
						$permissions = ['publish_actions','manage_pages','publish_pages']; 		
						$loginUrl = $helper->getLoginUrl( JURi::current().'?option=com_japps&controller=main-credentials&task=edit&eid='.$crdid, $permissions );
						header('location:'.$loginUrl);die;
					}
										$longAT = $fb->getOAuth2Client()->getLongLivedAccessToken($userdata->access_token)->getValue();
					$apisecret = new stdClass();
					$apisecret->user_id = $userdata->user_id;
					$apisecret->access_token = $longAT;
					$mainCredentialM = WModel::get( 'main.credential' );
					$mainCredentialM->whereE( 'crdid', $crdid );
					$mainCredentialM->setVal( 'apisecret', json_encode($apisecret) );
					$mainCredentialM->update();
					return true;
				}
		return true;
	}
	public function loginRedirect($crdid){
		$credentialO = WModel::getElementData( 'main.credential', $crdid );
		if(strtolower($credentialO->alias) != 'facebook'){
					return;
				}
		if ( empty($credentialO) ) return true;
		if ( empty( $credentialO->username ) || empty( $credentialO->passcode ) ) {
			$this->adminW( 'To get token you need to first specify ID and password!' );				return true;
		}
		$exit = WLoadFile( 'Facebook.autoload', JOOBI_DS_INC, true, false );
		if ( ! $exit ) return false;
		$fb = new Facebook\Facebook([
				'app_id' => $credentialO->username,				
				'app_secret' => $credentialO->passcode,				
				'default_graph_version' => 'v2.4',
		]);
				$app = $fb->getApp();
				$apptoken = (string)$app->getAccessToken();
		$helper = $fb->getRedirectLoginHelper();
				try {
				$accessToken = $helper->getAccessToken();
				} catch(Exception $e) {
					echo 'Facebook SDK returned an error: ' . $e->getMessage();
					return false;
				}
				if (isset($accessToken)) {
						$app = $fb->getApp();
						$apptoken = (string)$app->getAccessToken();
						if(!$user_id = $this->checkPermissions($fb, $accessToken, $apptoken)){
							return false;
						}
						$apisecret = new stdClass();
						$apisecret->user_id = $user_id;
						$apisecret->access_token = $fb->getOAuth2Client()->getLongLivedAccessToken($accessToken)->getValue();
						$mainCredentialM = WModel::get( 'main.credential' );
						$mainCredentialM->whereE( 'crdid', $crdid );
						$mainCredentialM->setVal( 'apisecret', json_encode($apisecret) );
						$mainCredentialM->update();
						return true;
				}
				return false;
		}
	public function postWall($post=null,$credentialO=null) {
		$title = '';
				$exit = WLoadFile( 'Facebook.autoload', JOOBI_DS_INC, true, false );
		if ( ! $exit ) return false;
				if(is_null(self::$fb)){
					self::$fb = new Facebook\Facebook([
						'app_id' => $credentialO->username,
						'app_secret' => $credentialO->passcode,
						'default_graph_version' => 'v2.4',
						]);
				}
				$fb = self::$fb;
				$app = $fb->getApp();
				$token = (string)$app->getAccessToken();
				$userdata = json_decode($credentialO->apisecret);
				if(empty($userdata)){
					$this->adminW( 'To get token you need to first specify ID and password!' );
					return false;
				}
				if(!$this->checkPermissions($fb, $userdata->access_token, $token)){
					return false;	
				};
				$page = $this->getUserPage($userdata->user_id,$userdata->access_token);
				if(!$page){
				return false;
				}
				$pageID = $page->id;
				$pageAToken = $page->access_token;
				try {
					$result = $fb->sendRequest('POST', '/'.$pageID.'/feed',(array)$post,$pageAToken);
				}catch(Exception $e){
					echo $e->getMessage();
					exit();
				}
	}
		private function getUserdata($crdid){
			static $user = null;
			if(!isset($user[$crdid])){
				$user[$crdid] = WModel::getElementData( 'main.credential', $crdid, 'apisecret' );
			}
			return $user[$crdid];
		}
		private function getUserPage($userID,$userAToken) {
			static $pages = null;
			if(is_null($pages)){
				$fb = self::$fb;
				try{
					$result = $fb->sendRequest('GET','/'.$userID.'/accounts',array(),$userAToken);
					$body = json_decode($result->getbody());
				}  catch (Exception $ex){
					echo $ex->getMessage();
					return false;
				}
				if(!count($body->data)){
					return false;
				}
				$pages = $body->data[0];
			}
			return $pages;
		}
	public function getPages($crdid) {
		$exit = WLoadFile( 'Facebook.autoload', JOOBI_DS_INC, true, false );
		if ( ! $exit ) return false;
		$credentialO = WModel::getElementData( 'main.credential', $crdid );
		if ( empty( $credentialO->username ) || empty( $credentialO->passcode ) ) return false;
		if(is_null(self::$fb)){
			self::$fb = new Facebook\Facebook([
				'app_id' => $credentialO->username,
				'app_secret' => $credentialO->passcode,
				'default_graph_version' => 'v2.4',
				]);
		}
		$fb = self::$fb;
		$userdata = json_decode($credentialO->apisecret);
		if(empty($userdata)){
			return false;
		}
		try{
			$result = $fb->sendRequest('GET','/'.$userdata->user_id.'/accounts',array(),$userdata->access_token);
			$body = json_decode($result->getbody());
		}  catch (Exception $ex){
			echo $ex->getMessage();
			return false;
		}
		if(isset($body)){
			return $body->data;
		}
	}
	private function checkPermissions($fb,$Uaccess_token,$appToken){
		$permissions = array('publish_actions','manage_pages','publish_pages');
		$debug = $fb->sendRequest( 'GET', '/debug_token',array('input_token'=>(string)$Uaccess_token,'access_token'=>$appToken),$appToken);
		$debug_result = json_decode( $debug->getBody() );
		if(!$debug_result->data->is_valid){
			return false;
		}
		$needed_p = array();
		foreach($permissions as $perm){
			if(!in_array($perm, $debug_result->data->scopes)){
				$needed_p[] = $perm;
			}
		}
		if(!empty($needed_p)){
			$warn = 'facebook permissions missing  "'.implode(', ',$needed_p).'"';
			return FALSE;
		}
		return $debug_result->data->user_id;
	}
}