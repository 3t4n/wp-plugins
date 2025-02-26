<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('ABSPATH') or die( 'J....' );
if ( ( defined('ABSPATH') ) && !defined('JOOBI_SECURE') ) define( 'JOOBI_SECURE', true );
class install_joobi {
	var $cmsName = ''; 	var $htdocsPath = '';
	var $joobi = 'joobi';	var $appName ="";
	var $redirectURL = ""; 	var $redirectToAppDashboard = false;
	var $playSoundOnCompletion = false;
	private $distribServer ="";
	private $licenseURL = "";
	public static $configurationA = array();
	private static $languagesUsed = array();	
	private $_useCMSmethods = true; 	private $_joobiFolderExists = false;
	private $_nodesListPackageTXTA = array();
	private $_newNodesListFolderA = array();
	private $_cmsLogFolder = "joobiInstallLogs";
	private $_errLogFileName = "joobi-errors.log";
	private $_infoLogFileName = "joobi-info.log";
	private $_errLogFilePath = "";
	private $_infoLogFilePath = "";
	private $_joobiInfoLogsPath = "logs/offline_install_info.log";
	private $_joobiErrLogsPath = "logs/offline_install_err.log";
	private $_joobiLogs = false;
	private $_joobiTarGzSourcePath = "";
	private $_joobiFolderDestinationPath = "";
	private $_libPackagesPath = "";
	private $_libPackagesPathPP = "";
	private $_deleteLogs = false;
	private $_timeLimit = 200 ;	private $_memoryLimit = "128M";
	private $_dataSQLFilePath = "";
	private $_alterSQLFilePath = "";
	private $_tableSQLFilePath = "";
	private $_uninstallSQLFilePath = "";
	private $_joobiUninstallSQLPath = "";
	private $_joobiFolderFilesA = array( 'entry.php','config.php','index.php','list.txt');	
	private $_recordLogs = true;
	public function setCMS($cmsName="",$appName="") {
		$this->cmsName = $cmsName;
		$lcCMSName = strtolower($cmsName);
		$lcAppName = strtolower($appName);
		$this->joobi = 'joobi';
		$this->appName = $appName;
		if($lcCMSName == 'wordpress')
		{
			$this->htdocsPath = get_home_path();
			$this->redirectURL = '';
		}
		else if($lcCMSName == 'joomla')
		{
			$this->htdocsPath = JPATH_ROOT. DIRECTORY_SEPARATOR;
			$this->redirectURL = 'index.php?option=com_'.$lcAppName.'&controller='.$lcAppName;
		}
	}
	public function setDistribServer($distribServer="") {
		$this->_joobiInfoLog( "Set distrib site : " . $distribServer );
		$this->distribServer = $distribServer;
	}
	public function setLicense($licenseURL="")
	{
		$this->licenseURL = $licenseURL;
	}
	public function setRedirect($url="")
	{
		$this->redirectToAppDashboard = true;
		$this->redirectURL = $url;
	}
	public function setSound() {
		$this->playSoundOnCompletion = true;
	}
	public function installJoobi() {
				if ( ! $this->_beforeInstallation() ) return false ;
				if( ! $this->_settingUp() ) return false;
				if( ! $this->_postProcessing() ) return false;
		return true;
	}
	public function deleteJoobi() {
		try {
			$this->_firstDefines();
						$this->_defineConstants();
			$this->_defineLocals();
			$this->_usefullInitialInfo();
			$this->_joobiInfoLog( "_deleteJoobi()" );
						$this->_getAppDetails();
			if(empty($this->appName)) throw new Exception("appName is empty");
			$this->_deleteLogs = true;
						if($this->_removeTempFiles()) $this->_joobiUserMessage("joobi logs removed") ;
		}		catch (fileException $e) { $this->_joobiUserMessage("Joobi Deletion Stopped ! <br>".$e->getMessage()); $this->_joobiErrorLog("_deleteJoobi() : ".$e->getMessage()); $this->_joobiInfoLog( "_deleteJoobi() : --- File Exception Trace---");  $this->_joobiInfoLog( "_deleteJoobi() : ".$e->getTraceAsString());  return false ; }
		catch (databaseException $e) { $this->_joobiUserMessage("Joobi Deletion Stopped ! <br>".$e->getMessage()); $this->_joobiErrorLog("_deleteJoobi() : ".$e->getMessage());	$this->_joobiInfoLog( "_deleteJoobi() : --- Database Exception Trace---");  $this->_joobiInfoLog( "_deleteJoobi() : ".$e->getTraceAsString());  return true ; }
		catch (outsideCallException $e) { $this->_joobiUserMessage("Joobi Deletion Stopped ! <br> Please Contact Joobi Support with the following <br>".$e->getMessage());$this->_joobiInfoLog( "_deleteJoobi() : --- Outside Call Exception Trace---");  $this->_joobiInfoLog( "_deleteJoobi() : ".$e->getTraceAsString()); return false ; }
		catch (Exception $e) { $this->_joobiUserMessage("Joobi Deletion Stopped ! <br>".$e->getMessage()); $this->_joobiErrorLog("_deleteJoobi() : ".$e->getMessage());	$this->_joobiInfoLog( "_deleteJoobi() : --- Exception Trace---");  $this->_joobiInfoLog( "_deleteJoobi() : ".$e->getTraceAsString());  return false ; }
		return true;
	}
	private function _beforeInstallation()
	{
		ob_start();
		try {
			$this->_firstDefines();
						$this->_createLogFolder();
						$this->_checkPublicParams();
						$this->_defineConstants();
			$this->_defineLocals();
			$this->_usefullInitialInfo();
						$this->_improvePerformance();
						$this->_importFiles();
		}		catch (fileException $e) { $this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_beforeInstallation() : ".$e->getMessage()); $this->_joobiInfoLog( "_beforeInstallation() : --- File Exception Trace---");  $this->_joobiInfoLog( "_beforeInstallation() : ".$e->getTraceAsString());  return false ; }
		catch (Exception $e) { $this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_beforeInstallation() : ".$e->getMessage());	$this->_joobiInfoLog( "_beforeInstallation() : --- Exception Trace---");  $this->_joobiInfoLog( "_beforeInstallation() : ".$e->getTraceAsString());  return false ; }
		return true;
	} 
	private function _settingUp() {
		try {
			$this->_joobiInfoLog( "_settingUp()" );
						$this->_joobiFolderExists = $this->_checkExistingJoobi();
			$this->_joobiInfoLog( "Joobi Folder Exists (1 for Yes , empty for No) : " .$this->_joobiFolderExists );
						if ( $this->_joobiFolderExists ) $this->_scanFolder();
			else $this->_extractAndMoveJoobi( $this->_joobiFolderDestinationPath );
						$this->_runSQL();
		} catch (fileException $e) { 
			$this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_settingUp() : ".$e->getMessage()); $this->_joobiInfoLog( "_settingUp() : --- File Exception Trace---");  $this->_joobiInfoLog( "_settingUp() : ".$e->getTraceAsString());  return false ; }
		catch (databaseException $e) { 
			$this->_joobiErrorLog("_settingUp() : ".$e->getMessage());	
			$this->_joobiInfoLog( "_settingUp() : --- Database Exception Trace---");  
			$this->_joobiInfoLog( "_settingUp() : ".$e->getTraceAsString());  return true ; 
		} catch (outsideCallException $e) {
			$this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_settingUp() : ".$e->getMessage());	$this->_joobiInfoLog( "_settingUp() : --- Outside Call Exception Trace---");  $this->_joobiInfoLog( "_settingUp() : ".$e->getTraceAsString()); return false ; 
		} catch (Exception $e) {
			$this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_settingUp() : ".$e->getMessage());	$this->_joobiInfoLog( "_settingUp() : --- Exception Trace---");  $this->_joobiInfoLog( "_settingUp() : ".$e->getTraceAsString());  return false ;
		}		
		return true;
	}
	private function _postProcessing() {
			try {
				$this->_joobiInfoLog( "_postProcessing()" );
								$this->_prepareForJoobi();
								$this->_nodeInstallFunctions();
								$this->_updatePreferences();
				$this->_resetUser();
								if (empty($this->appName))  throw new Exception("_appName is empty");
				$appID = WExtension::get( $this->appName.'.application', 'wid' );
				$this->_updateVersionAndTime($appID);
				$this->_MainAppPatch($appID);
								$this->_refreshApps();
								$this->_clearCache();
								$this->_moveLogsToJoobi();
								if ($this->playSoundOnCompletion) $this->_completionSound();
								if($this->redirectToAppDashboard) $this->_redirectToURL();
			}
			catch (fileException $e) { $this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_postProcessing() : ".$e->getMessage()); $this->_joobiInfoLog( "_postProcessing() : --- File Exception Trace---");  $this->_joobiInfoLog( "_postProcessing() : ".$e->getTraceAsString());  return false ; }
			catch (outsideCallException $e) { $this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_postProcessing() : ".$e->getMessage());	$this->_joobiInfoLog( "_postProcessing() : --- Outside CallException Trace---");  $this->_joobiInfoLog( "_postProcessing() : ".$e->getTraceAsString());  return false ; }
			catch (Exception $e) { $this->_joobiUserMessage("Looks like Joobi encountered some errors while installation! <br> Please Contact Joobi Support with the following <br>".$e->getMessage()); $this->_joobiErrorLog("_postProcessing() : ".$e->getMessage());	$this->_joobiInfoLog( "_postProcessing() : --- Exception Trace---");  $this->_joobiInfoLog( "_postProcessing() : ".$e->getTraceAsString());  return false ; }
			return true;
		}
	private function _MainAppPatch($appID) {
		try {
			$this->_joobiInfoLog( "_MainAppPatch()" );
			$mainAppID = WExtension::get ( JOOBI_MAIN_APP . '.application', 'wid' );
			if ( ! empty( $mainAppID ) && ($appID != $mainAppID) ) $this->_updateVersionAndTime ( $mainAppID );
									if( $this->cmsName == 'wordpress' ) {
			}
		} catch ( Exception $e ) {
			throw new Exception ( "JOOBI_MAIN_APP patching has some issue" );
		}	}
		private function _improvePerformance()
		{
			try {
			$this->_joobiInfoLog( "_improvePerformance()" );
			if (empty($this->_timeLimit))  throw new Exception("_timeLimit is empty");
			if (empty( $this->_memoryLimit))  throw new Exception("_memoryLimit is empty");
			@set_time_limit($this->_timeLimit);
			@ini_set("memory_limit", $this->_memoryLimit);
			@ini_set('max_execution_time', $this->_timeLimit );
			} catch ( Exception $e ) {
				throw new Exception("Could not increase performance");
			}
		}
		private function _importFiles()
		{
			try {
				$this->_joobiInfoLog( "_importFiles()" );
				if($this->cmsName == 'wordpress') {
					$this->_joobiInfoLog("importing wordpress library files");
									}
			} catch ( Exception $e ) {
				throw new Exception("Failed importing files");
			}
		}
	private function _createLogFolder() {
		try {
			if (! file_exists ( $this->htdocsPath . 'tmp/' . $this->_cmsLogFolder ) ) {
				mkdir ( $this->htdocsPath . 'tmp/' . $this->_cmsLogFolder, 0777, true );
			}
		} catch ( Exception $e ) {
			throw new Exception ( "Problem while creating log folder" );
		}
	}
	private function _checkPublicParams() {
		$this->_joobiInfoLog ( "_checkPublicParams()" );
		if ( empty($this->cmsName) ) throw new Exception("cmsName is empty");
		if ( empty($this->htdocsPath) ) throw new Exception("htdocsPath is empty");
		if ( empty($this->joobi)) throw new Exception("joobi is empty");
		if ( empty($this->distribServer) ) throw new Exception("distribServer is empty");
		if ( empty($this->licenseURL) ) throw new Exception("licenseURL is empty");
		if ( empty($this->appName) ) throw new Exception("appName is empty");
		if ( $this->redirectToAppDashboard && empty($this->redirectURL) ) throw new Exception("redirectURL is empty");
	}
	private function _firstDefines() {
		if ( ! defined( 'DS' ) ) define( 'DS', DIRECTORY_SEPARATOR );
		$this->_errLogFilePath = 'tmp/' . $this->_cmsLogFolder . '/' . $this->_errLogFileName;
		$this->_infoLogFilePath = 'tmp/' . $this->_cmsLogFolder . '/' . $this->_infoLogFileName;
		if ( file_exists( dirname( __FILE__ ) . '/tar.php' ) ) require_once( dirname( __FILE__ ) . '/tar.php' );
	}
	private function _defineConstants() {
		try {
			$this->_joobiInfoLog ( "_defineConstants()" );
			if (! defined( 'JOOBI_DS_ROOT' ) ) define( 'JOOBI_DS_ROOT', $this->htdocsPath );
			define( 'JOOBI_DS_INSTALLFOLDER', dirname( __FILE__ ).'/');
			if (! defined( 'JOOBI_FOLDER' ))
				define( 'JOOBI_FOLDER', $this->joobi );
			if (! defined( 'JOOBI_DS_ROOT' ))
				throw new Exception ( 'The Root folder is not defined ' );
			if (! defined( 'JOOBI_DS_NODE' ))
				define( 'JOOBI_DS_NODE', JOOBI_DS_ROOT . JOOBI_FOLDER . '/node/' );
			if (! defined( 'JOOBI_LIB_CORE' ))
				define( 'JOOBI_LIB_CORE', JOOBI_DS_NODE . 'library/' ); 
		} catch ( Exception $e ) {
			throw new Exception ( "Problem while defining constants" );
		}
	}
	private function _defineLocals() {
		try {
			$this->_joobiInfoLog ( "_defineLocals()" );
			$this->_joobiTarGzSourcePath = dirname( __FILE__ ) . '/admin/joobi.tar.gz';
			$this->_joobiTarSourcePath = dirname( __FILE__ ) . '/admin/joobi.tar';
			$this->_joobiFolderTemporary = dirname( __FILE__ ) . '/joobi';
			$this->_dataSQLFilePath = dirname( __FILE__ ) . '/admin/data.sql';
			$this->_alterSQLFilePath = dirname( __FILE__ ) . '/admin/alter.sql';
			$this->_tableSQLFilePath = dirname( __FILE__ ) . '/admin/tables.sql';
			$this->_uninstallSQLFilePath = dirname( __FILE__ ) . '/admin/uninstall.sql';
			$this->_joobiFolderDestinationPath = $this->htdocsPath . 'joobi';
			$this->_libPackagesPath = $this->_joobiFolderTemporary . '/list.txt';
			$this->_libPackagesPathPP = JOOBI_DS_ROOT . $this->joobi . '/list.txt';
			$this->_joobiUninstallSQLPath = JOOBI_DS_ROOT . $this->joobi . '/uninstall.sql';
		} catch ( Exception $e ) {
			throw new Exception ( "Problem while defining locals" );
		}
	}
	private function _usefullInitialInfo() {
		try {
			$this->_joobiInfoLog ( "_usefullInitialInfo()" );
			$this->_joobiInfoLog ( "---- START OF NEW INFO LOGS ----" );
			$this->_joobiInfoLog ( "PHP ver : " . PHP_VERSION );
			$this->_joobiInfoLog ( "_joobiTarGzSourcePath : " . $this->_joobiTarGzSourcePath );
			$this->_joobiInfoLog ( "_joobiFolderTemporary : " . $this->_joobiFolderTemporary );
			$this->_joobiInfoLog ( "_joobiFolderDestinationPath : " . $this->_joobiFolderDestinationPath );
			$this->_joobiInfoLog ( "_libPackagesPath : " . $this->_libPackagesPath );
			$this->_joobiInfoLog ( "htdocsPath : " . $this->htdocsPath );
			$this->_joobiInfoLog ( "appName : " . $this->appName );
			$this->_joobiInfoLog ( "cmsName : " . $this->cmsName );
		} catch ( Exception $e ) {
			throw new Exception ( "Problem while recording usefull info" );
		}
	}
	private function _checkExistingJoobi() {
		$this->_joobiInfoLog( "_checkExistingJoobi()" );
		if( empty($this->_joobiFolderDestinationPath) ) throw new Exception("_joobiFolderDestinationPath is empty");
		if ( !file_exists($this->_joobiFolderDestinationPath ) && !is_dir($this->_joobiFolderDestinationPath) ) return false;
		else return true;
	}
		private function _folderExists($folderPath="")
		{
			try{
				if(!empty($folderPath))
				{
					if ( !file_exists($folderPath ) && !is_dir($folderPath) ) return false;
					else return true ;
				}
				else throw new Exception("folderPath is empty");
			}			catch (Exception $e) { throw new outsideCallException("_folderExists() : Something went wrong during checking whether the folder exists"); }
		}
		private function _scanFolder() {
			$this->_joobiInfoLog( "_scanFolder()" );
			if( empty($this->_joobiFolderTemporary) ) throw new Exception("_joobiFolderTemporary is empty");
			try {
					$this->_extractAndMoveJoobi( $this->_joobiFolderTemporary );
					$nodePath = $this->_joobiFolderTemporary . '/node';
					$allNodeA = $this->_readFolder( $nodePath );
					foreach( $allNodeA as $foldr ) {
						if(!$this->_folderExists($this->htdocsPath . 'joobi/node/' . $foldr)){
							$this->_newNodesListFolderA[$foldr] = $foldr;
							$this->_moveFileorFolder( $nodePath . '/' . $foldr, $this->htdocsPath . 'joobi/node/' . $foldr );
							$this->_joobiInfoLog("moved :".$foldr);
						} else {
							if ( !file_exists($this->htdocsPath . 'joobi/node/' . $foldr) ) rmdir($this->htdocsPath . 'joobi/node/' . $foldr);
							$this->_moveFileorFolder( $nodePath . '/' . $foldr, $this->htdocsPath . 'joobi/node/' . $foldr );
							$this->_joobiInfoLog("deleted and moved :".$foldr);
						}
					}
					$incPath = $this->_joobiFolderTemporary . '/inc';
					$allIncA = $this->_readFolder($incPath);
					foreach( $allIncA as $foldr ) {
						if ( !$this->_folderExists( $this->htdocsPath . 'joobi/inc/' . $foldr ) ) {
							$this->_moveFileorFolder( $incPath . '/' . $foldr, $this->htdocsPath . 'joobi/inc/' . $foldr );
							$this->_joobiInfoLog( "moved :" . $foldr );
						}						else {
							if ( !file_exists($this->htdocsPath . 'joobi/inc/' . $foldr) ) rmdir( $this->htdocsPath . 'joobi/inc/' . $foldr );
							$this->_moveFileorFolder( $incPath . '/' . $foldr, $this->htdocsPath . 'joobi/inc/' . $foldr );
							$this->_joobiInfoLog( "deleted and moved :".$foldr );
						}
					}
					if ( !empty($this->_joobiFolderFilesA) ) {
						$destinationFIlePath = "";
						foreach( $this->_joobiFolderFilesA as $fileName ) {
							if ( file_exists($this->_joobiFolderTemporary. '/' . $fileName) ) {
								unlink($this->_joobiFolderDestinationPath. '/' . $fileName);
								$this->_moveFileorFolder($this->_joobiFolderTemporary. '/' . $fileName,$this->_joobiFolderDestinationPath. '/' . $fileName);
								$this->_joobiInfoLog( "overwritten : ".$fileName );
							} 							
						} 						
					}
			} catch (Exception $e) {
				throw new outsideCallException( "1. _scanFolder() : Something went wrong during moving code " . $e->getMessage() );
			}
		}
		private function _moveFileorFolder($folderSrcPath="",$folderDstPath="") {
			try
			{
				if ( !empty($folderSrcPath) && !empty($folderDstPath) )
				{
										if ( file_exists($folderSrcPath) && ! file_exists($folderDstPath) ) @rename( $folderSrcPath, $folderDstPath );
				}
				else throw new Exception("folderSrcPath or folderDstPath is empty");
			}
			catch (Exception $e) { throw new outsideCallException("_moveFileorFolder() : Something went wrong during moving the folders");  }
		}
		private function _readFolder($folderPath="")
		{
			$this->_joobiInfoLog( "_readFolder()" );
			try {
				if(!empty($folderPath))
				{
				$folderNameA = array();
				if ($handle = opendir($folderPath))
				{
					while (false !== ($folderName = readdir($handle))) {
						if (strpos($folderName, '.') !== FALSE) ;						else  $folderNameA[] = $folderName;
					}
					closedir($handle);
				}
				return $folderNameA ;
				}
				else throw new Exception("folderPath is empty");
			}			catch (Exception $e) { throw new outsideCallException("_readFolder() : Something went wrong during reading the folders");  }
		}
		private function _extractAndMoveJoobi($destinationPath="") {
			$this->_joobiInfoLog( "_extractAndMoveJoobi ()" );
			if(empty($this->_joobiTarGzSourcePath)) throw new Exception("_joobiTarGzSourcePath is empty");
			if(empty($this->_joobiTarSourcePath)) throw new Exception("_joobiTarSourcePath is empty");
			if( empty($destinationPath) ) throw new Exception("destinationPath is empty");
			try {
								if ( ! file_exists( $this->_joobiTarGzSourcePath ) ) {
					rename( dirname( __FILE__ ) . '/admin/joobi', $destinationPath );
					$this->_joobiInfoLog( "no untar, moved joobi folder" );
					return true;
				}				
				if( PHP_VERSION > '5.3' && class_exists( 'PharData' ) ) {
					try{
						$this->_usePhar( $destinationPath );
					} catch (Exception $e) {
						$this->_joobiInfoLog( "...Problem while extracting using Phar : " . $e->getMessage() );
						$this->_joobiInfoLog( "...trying with CMS extracter" );
						$this->useCMSExtraction( $destinationPath );
																	}
				} elseif ( $this->cmsName == 'wordpress' ) {
					$this->_joobiInfoLog( "5. using wordpress function for extracting joobi folder" );
				}
								@unlink( $this->_joobiTarGzSourcePath );
			}			catch (Exception $e) { throw new Exception( "1. _extractAndMoveJoobi () : Problem while extracting " . $e->getMessage() );  }
		}
	private function _usePhar($destinationPath) {
		$this->_joobiInfoLog("using PharData for extracting joobi folder");
		$this->_joobiInfoLog("step1");
		$p = new PharData($this->_joobiTarGzSourcePath);
		$p->decompress(); 		$this->_joobiInfoLog("step2");
				$phar = new PharData($this->_joobiTarSourcePath);
		if(!$phar->extractTo($destinationPath)) throw new Exception("Joobi folder extraction failed using Phar");
	}
	private function useCMSExtraction($destinationPath) {
		if ( $this->cmsName == 'wordpress') {
			$this->_joobiInfoLog( "3. using wordpress function for extracting joobi folder" );
		}
	}
	private function _runSQL() {
		$this->_joobiInfoLog( "_runSQL()" );
		$this->_createTables();
		$this->_alterTables();
		$this->_insertData();
	}
		private function _createTables() {
			$this->_joobiInfoLog( "_createTables()" );
			$this->_checkFile($this->_tableSQLFilePath);
			$table = file_get_contents( $this->_tableSQLFilePath );
			if ( $this->cmsName == 'wordpress' ) {
 				global $wpdb;
 				$dbPrefix = $wpdb->prefix ;
 				$this->_joobiInfoLog( "_createTables() ".$dbPrefix);
 				$tableWithPrefix = str_replace( "#__", $dbPrefix, $table );
			}
			$array =  $this->_splitSql( $tableWithPrefix, ';', null, true );
			$this->_importQueries( $array);
		}
	private function _alterTables() {
		$this->_joobiInfoLog( "_alterTables()" );
		$this->_checkFile($this->_alterSQLFilePath);
						$alter = file_get_contents( $this->_alterSQLFilePath );
		if ( $this->cmsName == 'wordpress' ) {
			global $wpdb;
			$dbPrefix = $wpdb->prefix ;
			$this->_joobiInfoLog( "_alterTables() ".$dbPrefix);
			$alterWithPrefix = str_replace( "#__", $dbPrefix, $alter );
		}
		$alterA = $this->_splitSql( $alterWithPrefix, ';', null, true );
		if(!empty($alterA))
		{
			foreach($alterA as $sqlString)
			{
				$this->_importQueries($sqlString);
			}
		}
			}
		private function _insertData()
		{
			$this->_joobiInfoLog( "_insertData()" );
			$this->_checkFile($this->_dataSQLFilePath);
			$data = file_get_contents( $this->_dataSQLFilePath );
			if($this->cmsName == 'joomla')
			{
				$dataWithPrefix = $data;
			}
			else if($this->cmsName == 'wordpress')
			{
				global $wpdb;
				$dbPrefix = $wpdb->prefix ;
				$this->_joobiInfoLog( "_insertData() ".$dbPrefix);
				$dataWithPrefix = str_replace("#__",$dbPrefix,$data);
			}
			$this->_importQueries( $this->_splitSql( $dataWithPrefix, ';', null, true ) );
		}
		private function _prepareForJoobi() {
			$this->_joobiInfoLog( "_prepareForJoobi()" );
			if( !defined( 'JOOBI_DS_ROOT' ) )  throw new Exception("JOOBI_DS_ROOT is not defined");
			try {
				if( !defined( 'JOOBI_FRAMEWORK' ) ) define( 'JOOBI_FRAMEWORK', 'wp4' );
								if( !defined( 'JOOBI_FRAMEWORK' ) )  throw new Exception("JOOBI_FRAMEWORK is not defined");
				if( !class_exists( 'APIPage' ) ){
					$apiFramework = JOOBI_DS_ROOT. $this->joobi .'/node/api/addon/'. JOOBI_FRAMEWORK . '/' . JOOBI_FRAMEWORK . '.php';
					if($this->_checkFile($apiFramework,false)) require_once($apiFramework);
				}
				$libraryDefine = JOOBI_DS_ROOT. $this->joobi .'/node/library/' . 'define.php' ;
				if($this->_checkFile($libraryDefine,false)) require_once($libraryDefine );
				if( !defined( 'PLIBRARY_NODE_CACHING' ) ) define( 'PLIBRARY_NODE_CACHING', 0 );
			}			catch (Exception $e) { throw new Exception("Could not prepare joobi for post processing");  }
			$this->_joobiLogs = true;
		}
	private function _nodeInstallFunctions() {
		try{
			$this->_joobiInfoLog( "_nodeInstallFunctions()" );
			$installClass = JOOBI_DS_ROOT . $this->joobi . '/node/install/class/install.php';
			if ( $this->_checkFile( $installClass, false ) ) {
				include_once( $installClass );
				if ( !defined( 'JOOBI_DB_TYPE' ) ) define( 'JOOBI_DB_TYPE', 'mysqli' );
				$this->_joobiInfoLog( "before _getPackageListArray()" );
				$this->_getPackageListArray();
				$this->_joobiInfoLog( "after _getPackageListArray() :" );
				$this->_runCustomInstall();
				$this->_joobiInfoLog( "after _runCustomInstall() :" );
			} else {
				$this->_joobiInfoLog("Since there was no install node in the package we skip running custom install functions");
			}
		} catch ( Exception $e ) {
			throw new Exception ( "Problem in _nodeInstallFunctions. " . $e->getMessage() );
		}
	}
	private function _getPackageListArray() {
		$this->_joobiInfoLog( "_getPackageListArray()" );
		if ( ! $this->_checkFile( $this->_libPackagesPathPP, false ) ) return true;
		$libPackageListA = file( $this->_libPackagesPathPP, FILE_IGNORE_NEW_LINES );
		if ( !empty( $libPackageListA ) ) {
			foreach( $libPackageListA as $packageNames ) {
								$pos = strrpos( $packageNames, "_" );
				$sub = substr( $packageNames, 0, $pos );
								if ( strpos($sub, 'node') !== false || strpos($sub, 'application') !== false ) {
					$pos = strrpos( $sub, "_" );
					$subShort = substr( $sub, 0, $pos );
					$this->_nodesListPackageTXTA[$subShort] = $sub;
										$this->_createExtensionEntry( $sub );
				}
			}
		} else throw new Exception( "libPackageListA is empty" );
	}
	private function _createExtensionEntry($sub) {
		$this->_joobiInfoLog( 'Create each extension entry in DB: ' . $sub );		
				$nameky = str_replace( '_', '.', $sub );
		$data = WGet::loadData( $nameky , 'extension' );
				$libraryReaddata = WClass::get( 'library.readdata' );
		$libraryReaddata->populateExtension( $data );
	}		
	private function _runCustomInstall() {
		$this->_joobiInfoLog( "1. _runCustomInstall()" );
		$nameOfNode = "";
		if( !empty($this->_nodesListPackageTXTA) ) {
			try{
				foreach( $this->_nodesListPackageTXTA as $nodeName => $completeName ) {
					$this->_joobiInfoLog( "2. _runCustomInstall() : " . $completeName );
					$customObj = new stdClass;
					$nameOfNode = $nodeName;
					$nodeInstallC = WInstall::get( $completeName );
					if ( !empty($nodeInstallC) ) {
												if ( $nodeName == 'install' ) {
							Install_Node_install::generateFirstDefines();
							Install_Node_install::loadLib();
						}
						$customObj->newInstall = $this->_decideNewInstall( $nameOfNode );
						$this->_joobiInfoLog( "calling install function for node :" . $nodeName . " with newInstall flag :" . $customObj->newInstall );
						if ( method_exists( $nodeInstallC, 'install') ) $nodeInstallC->install( $customObj );
						if ( method_exists( $nodeInstallC, 'addExtensions') ) {
							$this->_joobiInfoLog( "Installing plugin module and widget node :" . $nodeName );
							$nodeInstallC->addExtensions();
						}						
					}
				} 
			} 			catch (Exception $e) {
				throw new Exception( "_runCustomInstall() : Something went wrong in the joobi call for ".$nameOfNode." node custom install function");
			}
		} 
	}
		private function _createMenus() {
			return false;
		}
	private function _updatePreferences() {
		try {
		$this->_joobiInfoLog( "_updatePreferences()" );
		if ( class_exists( 'WPref' ) ) {
			$this->_joobiInfoLog( "updating preferences... : " . $this->distribServer );
			$this->_joobiInfoLog( "updating preferences... : " . $this->licenseURL );
			$pref = WPref::get( 'install.node', false, false );
			$pref->updatePref( 'distrib_website', $this->distribServer );
			$pref->updatePref( 'license', $this->licenseURL );
		}
		} catch ( Exception $e ) {
			throw new Exception ( "Problem while updating preferences" );
		}
	}
	private function _resetUser(){
		try {
		$this->_joobiInfoLog( "_resetUser()" );
		$uid = WUser::get( 'uid' );
		if ( empty($uid) ) {
						WUser::get( null, 'reset' );
			$usersSessionC = WUser::session();
			$usersSessionC->resetUser();
		}		} catch ( Exception $e ) {
			throw new Exception ( "Problem while resetting user" );
		}
	}
		private function _updateVersionAndTime($appID=0) {
			try{
			$this->_joobiInfoLog( "_updateVersionAndTime()" );
			if (!isset($appID)) throw new Exception('Could not retirive wid also known as the application id for '.$this->appName.' application installation');
			$this->_joobiInfoLog("appID : ".$appID);
			$appsM = WModel::get( 'apps' );
			$appsM->setVal( 'publish', 1 );
									$appsM->setVal( 'modified', time() );
			$appsM->setVal( 'created',time() );
			$appsM->whereE( 'wid',$appID );
			$appsM->update();
			} catch ( Exception $e ) {
				throw new Exception ( "Problem while updating version and time" );
			}
		}
		private function _removeTempFiles() {
			$this->_joobiInfoLog( "_removeTempFiles()" );
			if (empty($this->_errLogFilePath))  throw new Exception("_errLogFilePath is empty");
			if (empty($this->_infoLogFilePath))  throw new Exception("_infoLogFilePath is empty");
			if(!defined('JOOBI_DS_ROOT') ) throw new Exception("JOOBI_DS_ROOT is not defined");
			if($this->_deleteLogs) unlink(JOOBI_DS_ROOT.$this->_errLogFilePath);
			if($this->_deleteLogs) unlink(JOOBI_DS_ROOT.$this->_infoLogFilePath);
			unlink($this->_libPackagesPathPP);
			return true;
		}
	private function _refreshApps() {
		$this->_joobiInfoLog( "Do not refresh any more for offline pack _refreshApps()" );
		return true;
		$this->_joobiInfoLog( "Start _refreshApps()" );
		try{
			$refresh = WClass::get( 'apps.refresh' );
			$this->_joobiInfoLog( "class exit _refreshApps()" );
			$refresh->getDataAndRefresh();
		} catch (Exception $e) {
			$this->_joobiInfoLog( "Error _refreshApps()" );
			throw new Exception ( "Problem while refreshing the apps" );
		}	
		$this->_joobiInfoLog( "End _refreshApps()" );
	}
	private function _moveLogsToJoobi() {
		$this->_joobiInfoLog( "_moveLogsToJoobi()" );
		try{
			$this->_joobiInfoLog( "END OF INSTALLATION" );
			$this->_joobiInfoLog("Logs successfully moved");
			$this->_moveFileorFolder(JOOBI_DS_ROOT.$this->_errLogFilePath,JOOBI_DS_USER.$this->_joobiErrLogsPath);
			$this->_moveFileorFolder(JOOBI_DS_ROOT.$this->_infoLogFilePath,JOOBI_DS_USER.$this->_joobiInfoLogsPath);
			$this->_recordLogs = false;
			$this->_joobiInfoLog("Logs successfully moved");
		} catch (Exception $e) {
			throw new Exception ( "Problem while moving the logs to joobi" );
		}
	}
		private function _clearCache() {
			$this->_joobiInfoLog( "_clearCache()" );
			try{
				$ext=WCache::get();
				$ext->resetCache();
			}
			catch (Exception $e) {throw new Exception ( "Problem while clearing the cache" ); }
			$this->_joobiInfoLog("Done with reseting Cache....");
		}
		private function _completionSound() {
			$this->_joobiInfoLog( "_completionSound()" );
			try{
				$browser = WPage::browser( 'namekey' );
				$extension = ( $browser=='safari' || $browser=='msie' ) ? 'mp3' : 'ogg';
				$URLBeep = WPref::load( 'PLIBRARY_NODE_CDNSERVER' ) . '/joobi/user/media/sounds/finish.' . $extension;
				echo '<audio autoplay="true" src="' . $URLBeep . '" preload="auto" autobuffer></audio>';
			}
			catch (Exception $e) {throw new Exception ( "Problem while playing music" );}
			$this->_joobiInfoLog("Time for some music ....");
		}
		private function _redirectToURL() {
			$this->_joobiInfoLog( "_redirectToURL()" );
			try {
				$lcAppName = strtolower($this->appName);
				if(empty($this->redirectURL)) $this->redirectURL = 'index.php?option=com_' . $lcAppName . '&controller=' . $lcAppName;
				$this->_joobiInfoLog("Now redirecting ....");
				WPages::redirect( $this->redirectURL );
			} catch (Exception $e) {throw new Exception ( "Problem whileredirecting to url:".$this->redirectURL ); }
		}
	private function _joobiErrorLog($msg="") {
		if ( ! $this->_recordLogs || empty($msg) || empty($this->htdocsPath) || empty($this->_errLogFilePath) ) return false;
		try{
						if(empty($this->_errLogFilePath)) throw new Exception("_errLogFilePath is empty hence could write to the log file <br> The actuall error message was :".$msg);
						@file_put_contents( $this->htdocsPath . $this->_errLogFilePath, "\n <br> " . $msg );
		}
		catch (Exception $e)
		{
			$this->_joobiUserMessage($e->getMessage());
		}
	}
	private function _joobiInfoLog($msg="") {
		if ( ! $this->_recordLogs || empty($msg) || empty($this->htdocsPath) || empty($this->_errLogFilePath) ) return false;
		static $ct = 0;
		try{
						if ( empty($this->_infoLogFilePath) ) throw new Exception("_infoLogFilePath is empty hence could write to the log file <br> The actuall info message was :".$msg);
			$ct++;
						if ( ! is_string($msg) ) $msg = print_r( $msg, true );
			@file_put_contents( $this->htdocsPath . $this->_infoLogFilePath, "\n " . $ct . ': ' . $msg );
		} catch( Exception $e ) {
			$this->_joobiUserMessage( $e->getMessage() );
		}
	}
		private function _joobiUserMessage($msg="") {
			if($this->cmsName == 'joomla')
			{
				echo "<br> ".$msg;
			}
			else if($this->cmsName == 'wordpress')
			{
				echo "<div class='updated'><p>".$msg."</p></div>";
			}
		}
		private function _checkFile($filePath="",$throwErr=true) {
			if ( empty($filePath) )  throw new Exception("filePath is empty");
			elseif (!file_exists($filePath)) { if($throwErr) throw new fileException("file does not exist at ".$filePath); else return false;}
			elseif (!is_readable($filePath)) { if($throwErr) throw new fileException("file is not readable at ".$filePath); else return false;}
			return true;
		}
		private function _decideNewInstall($nameOfNode) {
			$newInstall = false;
			if(!$this->_joobiFolderExists) return true;
						if (!empty($this->_newNodesListFolderA))
			{
				if(array_key_exists($nameOfNode, $this->_newNodesListFolderA)) $newInstall = true;
			}
			return $newInstall;
	}
	private function _importQueries($array) {	
				if ( empty($array) ) return true;
		try {
			if ( !is_array( $array ) ) $array = array( $array );
			if ( $this->cmsName == 'wordpress' ) {
					global $wpdb;
					if ( count($array) >0 ) {
						foreach($array as $query) {
							$query = trim($query);
							if ( !empty($query) ) {
																if ( '/* CONDITION' == substr( $query, 0, 12 ) ) {
									$exQueryA = explode( ' */', substr( $query, 3 ) );
									$conditionA = explode( '||', $exQueryA[0] );
									if ( 'CONDITIONCOLUMN' == $conditionA[0] ) {
										$has = $wpdb->get_var( "SHOW TABLES LIKE '" . $wpdb->prefix . $conditionA[1] . "'" );
										if ( ! $has ) continue;
										$checkQuery = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . DB_NAME . "' AND TABLE_NAME = '" . $wpdb->prefix . $conditionA[1] . "' AND COLUMN_NAME = '" . $conditionA[2] . "'";
										$columnsA = $wpdb->get_var( $checkQuery );
										if ( $columnsA ) continue;
																																$query = $exQueryA[1];
									} elseif ( 'CONDITIONCOLUMNDELETE' == $conditionA[0] ) {
										$has = $wpdb->get_var( "SHOW TABLES LIKE '" . $wpdb->prefix . $conditionA[1] . "'" );
										if ( ! $has ) continue;
										$checkQuery = "SELECT `COLUMN_NAME` FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . DB_NAME . "' AND TABLE_NAME = '" . $wpdb->prefix . $conditionA[1] . "' AND COLUMN_NAME = '" . $conditionA[2] . "'";
										$columnsA = $wpdb->get_var( $checkQuery );
										if ( $columnsA ) continue;
										if ( isset( $columnsA[$conditionA[2]] ) ) {
																						$query = $exQueryA[1];
										}											
									} elseif ( 'CONDITIONINDEX' == $conditionA[0] ) {
										$has = $wpdb->get_var( "SHOW TABLES LIKE '" . $wpdb->prefix . $conditionA[1] . "'" );
										if ( ! $has ) continue;
										$indexA = $wpdb->get_results( "SHOW INDEX FROM `" . $wpdb->prefix . $conditionA[1]. "`" );
										if ( empty( $indexA ) ) continue;
										$has = false;
										foreach ( $indexA as $index ) {
											if ( $conditionA[2] == $index->Key_name ) {
												$has = true;
												break;
											}										}										
										if ( ! $has ) continue;
											$query = $exQueryA[1];
																			} elseif ( 'CONDITIONTABLE' == $conditionA[0] ) {
										$allTablesA = explode( ',', $conditionA[1] );
										if ( !empty($allTablesA) ) {
											$tableExist = true;
											foreach( $allTablesA as $oTable ) {
												$has = $wpdb->get_var( "SHOW TABLES LIKE '" . $wpdb->prefix . $oTable . "'" );
												if ( ! $has ) $tableExist = false;
											}						
											if ( ! $tableExist ) continue;
										} else {
											continue;
										}						
																			} else {
																				continue;
									}								}						
							if ( !empty($query) ) {
								$wpdb->query( $query );
							}							
						}
					}
				} 
			}			
		}		catch (Exception $e) { $this->_joobiErrorLog("Error in _importQueries() . Here is the error...<br>".$e->getMessage()); return false ;  }
		return true;
	}
	private function _splitSql($content,$limit=';',$avoid=null,$comments=true) {
		$this->_joobiInfoLog( "_splitSql()" );
		if ($content === false) return false;
		if ($avoid == null) $avoid = array('"','`',"'");
		$array = array();
		$len = strlen($content);
		$h=0;		$stack = 0;
		$stringuse='';
		for($i=0;$i<$len;$i++)
		{
			switch($stack)
			{
								case 0:
					switch($content[$i])
					{
												case $limit:
														$array[]=trim(substr($content,$h,$i+1-$h));
														$h=$i+1;
						default:
														if (in_array($content[$i],$avoid)) {
								$stack++;
								$stringuse = $content[$i];
							}
							break;
					}
					break;
									case 1:
					if ($content[$i] == $stringuse && $content[$i-1]!="\\")
					{
												$stack--;
					}
				default:
					break;
			}
		}
		global $wpdb;
		$dbPrefix = $wpdb->prefix ;		
				foreach( $array as $k => $v ) $array[$k] = str_replace( '#__', $dbPrefix, $v );
		return $array;
	}
	private function _getAppDetails() {
		$this->_joobiInfoLog( "_getAppDetails()" );
		if ( $this->_cmsName == 'joomla' ) {
			$this->_appVersion = $this->_parentClass->get( "manifest" )->version;
			$this->_appName = $this->_parentClass->get( "manifest" )->name;
			$this->_joobiInfoLog( "_appVersion : ".$this->_appVersion);
			$this->_joobiInfoLog( "_appName : ".$this->_appName);
		}
	}
}
class fileException extends Exception{}
class databaseException extends Exception{}
class outsideCallException extends Exception{}