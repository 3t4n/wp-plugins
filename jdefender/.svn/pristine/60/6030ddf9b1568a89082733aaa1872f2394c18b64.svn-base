<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
class Security_Lookup_class extends WClasses {
	var $country = null;
	var $language = null;
	var $currency = null;
	var $ipAddress = null;
	public function detectIP($myip='') {
		$memberSessionC = WUser::session();
		if ( empty($myip) ) {
			$myip = $memberSessionC->getIP();
		}
		if ( ! $memberSessionC->validateIP( $myip, true ) ) return false;
		$this->ipAddress = $myip;
		$this->_queryIP( $myip, true );				
		$localization = new stdClass;
		$localization->country = $this->country;
		$localization->language = $this->language;
		$localization->currency = $this->currency;
		$localization->ip = $this->ipAddress;
		WGlobals::setSession( 'secureip', 'ip', $myip );
		if ( !empty($this->country->ctyid) ) WGlobals::setSession( 'secureip', 'countryId', $this->country->ctyid );
		else WGlobals::setSession( 'secureip','countryId', 0 );
		if ( !empty($this->currency[0]->curid) ) WGlobals::setSession( 'secureip','currencyId',$this->currency[0]->curid);
		else WGlobals::setSession( 'secureip','currencyId', 0 );
		if ( !empty($this->language[0]->lgid) ) WGlobals::setSession( 'secureip','languageId',$this->language[0]->lgid);
		else WGlobals::setSession( 'secureip','languageId', 0 );
		WGlobals::setSession( 'secureip', 'localization', $localization );
		return $localization;
	}
public function ipInfo($ip=null,$key='all') {
	$memberSessionC = WUser::session();
	if ( empty($ip) ) {
		$ip = $memberSessionC->getIP();
	}
	if ( ! $memberSessionC->validateIP( $ip, true ) ) return false;
	$this->_queryIP( $ip, false );
	switch( strtolower($key) ) {
		case 'flag':
			if ( isset($this->country->isocode2) ) {
				$img=$this->country->isocode2;
				$data = '<img align="absmiddle" title="' . WGlobals::filter( $img, 'string' ) . '" src="'. JOOBI_URL_MEDIA .'images/flags/' .strtolower($img).'.gif">';
			} else $data='';
			break;
		case 'country':
			$data = isset($this->country->name) ? $this->country->name : '';
			break;
		case 'isocode2':
			$data = isset($this->country->isocode2) ? $this->country->isocode2 : '';
			break;
		case 'isocode3':
			$data = isset($this->country->isocode3) ? $this->country->isocode3 : '';
			break;
		case 'timezone':
			$timeMin = isset($this->country->timezone) ? $this->country->timezone : '';
			$hours=floor((abs($timeMin)/60))*100;
			$rminute=$timeMin%60;
			if ($timeMin<0) {
				$rminute=($rminute*(-1));
				$sign='-';
			} else {
				$sign='+';
			}
			$data=$sign.($hours+$rminute);
			break;
		case 'ctyid':	
			$data = isset($this->country->ctyid) ? $this->country->ctyid : '';
			break;
		case 'stateid':	
			$data = isset($this->country->stateid) ? $this->country->stateid : '';
			break;
		case 'ip':
			$data = $ip;
			break;
		case 'currency-symbol':
			if (isset($this->currency)) {
				$data=$this->currency[0]->symbol;
			}else $data= null;
			break;
		case 'currency-name':
			if (isset($this->currency)) {
				$data=$this->currency[0]->title;
			}else $data= null;
			break;
		case 'language':
			$data = isset($this->language) ? $this->language :  null;
			break;
		case 'mainlanguage':
			if (isset($this->language) ) {
				$data= isset($this->language[0]->name)? $this->language[0]->name :  null;
			}else $data= null;
			break;
		case 'curid':
			if ( isset($this->currency) ) {
				$data = isset($this->currency[0]->curid) ? $this->currency[0]->curid:  0;
			}else $data = null;
			break;			
		case 'currency':
			$data = isset($this->currency) ? $this->currency :  null;
			break;
		case 'maincurrency':
			if (isset($this->currency)) {
				$data = isset($this->currency[0]->title) ? $this->currency[0]->title:  null;
			}else $data= null;
			break;
		case 'symbol':
			if (isset($this->currency)) {
				$data = isset($this->currency[0]->symbol) ? $this->currency[0]->symbol:  null;
			}else $data= null;
			break;
		case 'all':
			$data = new stdClass;
			$data->country = $this->country;
			$data->language = $this->language;
			$data->currency = $this->currency;
			$data->ip = $ip;
			break;
		default:
			$data = '';
			break;
	}
	return $data;
}
	public function getLanguageData($whereValueA,$whereColumn='lgid',$columnRetrievedA='lgid',$load='lra',$modelName='languages',$indexResult=true,$alwaysUnset=false) {
		if ( empty($whereValueA) ) return null;
		static $resultA = array();
		$key = ( is_array($whereValueA) ) ? implode( '-', $whereValueA) : $whereValueA;
		$key = $modelName . '-' . $whereColumn;
		if ( $alwaysUnset && isset($resultA[$key]) ) unset( $resultA[$key] );
		if ( !isset($resultA[$key]) ) {
			$languageM = WModel::get( $modelName );
			if ( is_array( $whereValueA ) ) $languageM->whereIn( $whereColumn, $whereValueA );
			else $languageM->whereE( $whereColumn, $whereValueA );
			$languageM->indexResult( $indexResult );
			$resultA[$key] = $languageM->load( $load, $columnRetrievedA );
		}
		return $resultA[$key];
	}
	public function getFlagFromCountry($ctryid) {
		if ( empty($ctryid) ) return $ctryid;
		$isocode2 = WModel::getElementData( 'countries', $ctryid, 'isocode2' );
		return '<img align="absmiddle" src="' . JOOBI_URL_MEDIA . 'images/flags/' . strtolower($isocode2) . '.gif">';
	}
	private function _queryIP($ipx,$saveSession=false) {
		static $ipsA = array();
		$this->country = null;
		$this->language = null;
		$this->currency = null;
		$sessionIPLIstA = WGlobals::getSession( 'secureip', 'iplist', array() );
		if ( !empty($sessionIPLIstA[$ipx]) ) {
			if ( !empty($sessionIPLIstA[$ipx]->country) ) $this->country = $sessionIPLIstA[$ipx]->country;
			if ( !empty($sessionIPLIstA[$ipx]->country) ) {
				$this->language  = ( isset($sessionIPLIstA[$ipx]->languages) ? $sessionIPLIstA[$ipx]->languages : 0 );
				$this->currency  = ( isset($sessionIPLIstA[$ipx]->currencies) ? $sessionIPLIstA[$ipx]->currencies : 0 );
			}
			return $sessionIPLIstA[$ipx];
		}
		if ( isset($ipsA[$ipx]) ) {
			if (!empty($ipsA[$ipx]->country) ) $this->country = $ipsA[$ipx]->country;
			if ( !empty($ipsA[$ipx]->country) ) {
				$this->language = ( isset($ipsA[$ipx]->languages) ? $ipsA[$ipx]->languages : 0 );
				$this->currency = ( isset($ipsA[$ipx]->currencies) ? $ipsA[$ipx]->currencies : 0 );
			}
			return $ipsA[$ipx];
		}
		$ipM = WModel::get( 'security.ip', 'object', null, false );
		if ( empty($ipM) ) return false;
			$sessionIPLIstA[$ipx] = new stdClass;
		if ( !isset($ipsA[$ipx]) ) $ipsA[$ipx] = new stdClass;
		$ipM->makeLJ( 'countries', 'ctyid', 'ctyid', 0, 1 );
		$ipM->rememberQuery( true );
		$ipM->select('ctyid',1);
		$ipM->select('name',1);						
		$ipM->select('namekey',1);					
		$ipM->select('isocode3',1);					
		$ipM->select('isocode2',1);
		$ipM->select('timezone',1);
		$ipM->where( 'from', '<=', $ipx, 0, null,0,0,0, 'ip' );
		$ipM->where( 'to', '>=',  $ipx, 0, null,0,0,0, 'ip' );
		$months3 = time() - 7862400;	
		$ipM->where( 'created', '>', $months3 );
		$ipData = $ipM->load( 'o' );
		if ( empty($ipData) ) {
			$ipData = $this->_queryAlternaticeSource( $ipx );
			if ( empty($ipData) ) return false;
			$sessionIPLIstA[$ipx]->country = $ipData->country;
			$sessionIPLIstA[$ipx]->languages = $ipData->language;
			$sessionIPLIstA[$ipx]->currencies = $ipData->currency;
			if ( $saveSession ) {				
				WGlobals::setSession( 'secureip', 'iplist', $sessionIPLIstA );
			}
			$ipsA[$ipx] = $sessionIPLIstA;
			$this->country = $ipData->country;
			$this->language = $ipData->language;
			$this->currency = $ipData->currency;
			return true;
		}
		if ( empty($ipData) ) {
			return false;
		}
		if ( $saveSession ) {
			$sessionIPLIstA[$ipx]->country = $ipData;
		}
		$ipsA[$ipx]->country = $ipData;
		$this->country = $ipData;
		if ( !empty($ipData) && !empty($ipData->ctyid) ) {
			static $langDataA=array();
			static $crncyDataA=array();
			if ( !isset($langDataA[$ipData->ctyid]) ) {
				static $langM=null;
				if ( !isset($langM) ) $langM = WModel::get('countries.language');
				$langM->whereE('ctyid',$ipData->ctyid);
				$langM->makeLJ( 'library.languages','lgid','lgid',0,1);		
				$langM->select('lgid',1);				
				$langM->select('name',1);
				$langM->select('code',1);
				$langM->orderBy('ordering','ASC',0);
				$langM->setLimit( 5000 );
				$langDataA[$ipData->ctyid]=$langM->load('ol');
			}
			$this->language = $langDataA[$ipData->ctyid];
			if ( $saveSession ) {
				$sessionIPLIstA[$ipx]->languages = new stdClass;
				$sessionIPLIstA[$ipx]->languages = $this->language;
			}
			$ipsA[$ipx]->languages = new stdClass;
			$ipsA[$ipx]->languages = $this->language;
			if ( !isset($crncyDataA[$ipData->ctyid]) ) {
				static $crncyM=null;
				if ( !isset($crncyM) ) $crncyM = WModel::get('currency.country');
				$crncyM->makeLJ( 'currency', 'curid', 'curid', 0, 1);
				$crncyM->whereE( 'ctyid', $ipData->ctyid );
				$crncyM->where( 'ctyid', '!=', 0 );	
				$crncyM->select('curid',1);
				$crncyM->select('title',1);				
				$crncyM->select('symbol',1);				
				$crncyM->orderBy('ordering','ASC',0);
				$crncyM->setLimit( 5000 );
				$crncyDataA[$ipData->ctyid] = $crncyM->load('ol');
			}
			$this->currency = $crncyDataA[$ipData->ctyid];
			if ( $saveSession ) {
				$sessionIPLIstA[$ipx]->currencies = new stdClass;
				$sessionIPLIstA[$ipx]->currencies = $this->currency;
				WGlobals::setSession( 'secureip', 'iplist', $sessionIPLIstA );
			}
			$ipsA[$ipx]->currencies = new stdClass;
			$ipsA[$ipx]->currencies = $this->currency;
		}
		return true;
	}
	private function _queryAlternaticeSource($ip) {
		$server = WPref::load( 'PAPPS_NODE_SERVICE' );
		$appsInfoC = WCLass::get( 'apps.info' );
		$token = $appsInfoC->possibleUpdate( 0, false, false, false );
		if ( empty($token) || true === $token ) {
			WMessage::log( 'IP tracker is only available with an API Key!', 'IP-tracking' );
			return false;
		}
		$appsInfoC = WClass::get( 'apps.info' );
		$url = $appsInfoC->myURL();
		$sendData = new stdClass();
		$sendData->ip = $ip;
		$sendData->token = $token;
		$sendData->url = $url;
		$netcom = WNetcom::get();
		$resultO = $netcom->send( $server, 'serviceprovider', 'getIPInfo', $sendData );
		$recordIP = true;
		$ctyid = 0;
		$allIPInofO = null;
		if ( empty($resultO) || empty($resultO->status) ) {
			$recordIP = false;
		} else {
			$allIPInofO = unserialize( $resultO->result );
			if ( !empty( $allIPInofO->country ) ) {
				if ( !empty($allIPInofO->country->ctyid) ) {
					$ctyid = $allIPInofO->country->ctyid;
				}
			}
		}
		$ctyid = (int)$ctyid;
		$ctyid = (string)$ctyid;
		$longIP = ip2long( $ip );
		$ipM = WModel::get( 'security.ip', 'object', null, false );
		$ipM->setVal( 'from', $longIP );
		$ipM->setVal( 'to', $longIP );
		$ipM->setVal( 'ctyid', $ctyid );
		$ipM->setVal( 'created', time() );
		$ipM->replace();
		if ( $recordIP && !empty($ctyid) ) {
			if ( !empty($allIPInofO->language) && WExtension::exist( 'countries.node' ) ) {
				foreach( $allIPInofO->language as $i => $oneLGID ) {
					$langM = WModel::get( 'countries.language' );
					$langM->setVal( 'ctyid', $ctyid );
					$langM->setVal( 'lgid', $oneLGID->lgid );
					$langM->setVal( 'ordering', $i+1 );
					$langM->insertIgnore();
				}
			}
			if ( !empty($allIPInofO->currency) && WExtension::exist( 'currency.node' ) ) {
				foreach( $allIPInofO->currency as $i => $oneCURID ) {
					$crncyM = WModel::get( 'currency.country' );
					$crncyM->setVal( 'ctyid', $ctyid );
					$crncyM->setVal( 'curid', $oneCURID->curid );
					$crncyM->setVal( 'ordering', $i+1 );
					$crncyM->insertIgnore();
			}
			}
		}
		return $allIPInofO;
	}
}
