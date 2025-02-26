<?php 
/** @copyright Copyright (c) 2007-2017 Joobi. All rights reserved.

* @license GNU GPLv3 */
defined('JOOBI_SECURE') or die('J....');
require JOOBI_DS_INC . '/azure/vendor/autoload.php';
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
WLoadFile( 'library.storage.class', JOOBI_DS_NODE );
class Main_Azure_class extends Library_Storage_class {
	var $name = 'azure';
	var $azure = null;
	private $account = null;
	private $container = '';
	private $secretKey = null;
	private $services = null;
	private $useSSL = 'http';
	private $url = '';
	private $sas = '';
	protected $fileInfoO = null;
	private function _setAccess() {
		if ( empty($this->azure) ) {
			if ( !empty($this->storageID) ) {
								$mainCredentialsC = WClass::get( 'main.credentials' );
				$storageS3O = $mainCredentialsC->loadFromID( $this->storageID );
			} else {
				$mainCredentialsC = WClass::get( 'main.credentials' );
				$storageS3O = $mainCredentialsC->loadFromType( 'azure' );
			}
			$this->container = $storageS3O->directory;				$this->account = $storageS3O->username;				$this->secretKey = $storageS3O->passcode;
			$this->services = ( !empty($storageS3O->services) ? $storageS3O->services : 0 );
			$this->useSSL = ( !empty($storageS3O->ssl)  ? 'https' : 'http' );
			$this->url = ( !empty($storageS3O->url)  ? $storageS3O->url : '' );
			$this->sas = ( !empty($storageS3O->sas)  ? $storageS3O->sas : '' );
			if ( empty($this->account) ) {
				$message = WMessage::get();
				$message->userE('1484683605BVFV');
			}
		}
	}
	private function _initializeAzure() {
		if ( !isset($this->azure) ) {
			if ( empty($this->account) ) $this->_setAccess();
			if ( empty($this->account) ) return false;
			$connectionString = '';
			if ( !empty($this->secretKey) ) {
				$connectionString = "DefaultEndpointsProtocol=" . $this->useSSL . ";AccountName=" . $this->account . ";";
				$connectionString .= "AccountKey=" . $this->secretKey . ";";
			} else {
								if ( empty($this->services) ) {						$connectionString .= "QueueEndpoint=" . $this->url . ";";
				} else {						$connectionString .= "BlobEndpoint=" . $this->url . ";";
				}				$connectionString .= "SharedAccessSignature=" . $this->sas . "";
			}			
WMessage::log( $connectionString  , 'Main_Azure_class' );
			if ( empty($this->services) ) {					$this->azure = ServicesBuilder::getInstance()->createQueueService( $connectionString );
			} else {					$this->azure = ServicesBuilder::getInstance()->createBlobService( $connectionString );
			}				
		}
		return true;
	}
	public function fileURL($thumbnail=false) {
		return false;
	}
	public function checkExist() {
		return false;
	}
	public function exist($path,$file=false) {
		if ( $file ) {
			return false;
		}
				return true;
	}
	public function copy($src,$dst,$file=false,$filter=null,$backup=false,$exclude=array()) {
		$fileS = WGet::file();
		$content = $fileS->read( $src );
		if ( !empty($content) ) {
			$this->write( $dst, $content );
		}
		return true;
	}
	public function move($src,$dst) {
		$fileS = WGet::file();
		$content = $fileS->read( $src );
		$fileS->delete( $src );
		if ( !empty($content) ) {
			$this->write( $dst, $content );
		}
		return true;
	}
	public function retreive($path) {
	}
	public function write($path,$content,$append=false,$chmod='0644') {
		if ( ! $this->_initializeAzure() ) return false;
		$blob_name = basename( $path );
		try {
						if ( empty($this->services) ) {					
				$this->azure->createMessage( $blob_name, base64_encode( $content ) );
			} else {					$this->azure->createBlockBlob( $this->container, $blob_name, $content );
			}					
			return true;
		} catch(Exception $e){
			$code = $e->getCode();
			$error_message = $e->getMessage();
			$message = $code . ": " . $error_message;
			$messC = WMessage::get();
			$messC->adminE( $message );
			return false;
		}		
		return false;
  }
	public function read($path) {
		if ( ! $this->_initializeAzure() ) return false;
				$blob_name = basename( $path );
		try {
						if ( empty($this->services) ) {					$resultPeek = $this->azure->peekMessages( $blob_name );
				$result = $resultPeek->getQueueMessages();
				return $result;
			} else {				}					
			return true;
		} catch(Exception $e) {
			$code = $e->getCode();
			$error_message = $e->getMessage();
			$message = $code . ": " . $error_message;
			$messC = WMessage::get();
			$messC->adminE( $message );
			return false;
		}
		return false;
	}  
public function upload($src,$dst,$file=false) {
	if ( empty( $this->fileInfoO ) ) return false;
	if ( !$this->_initializeAzure() ) return false;
		$fileAccess = S3::ACL_PUBLIC_READ;
		if ( !empty( $this->fileInfoO->secure ) ) $fileAccess = S3::ACL_AUTHENTICATED_READ;
		$tmpPath = JOOBI_DS_TEMP . 's3/' . $this->fileInfoO->folder . '/' . $this->fileInfoO->path . '/' . $this->fileInfoO->name . '.' . $this->fileInfoO->type;
		$tmpSource = str_replace( array( '|', '\\'), '/', $tmpPath );
		$fileC = WGet::file( 'local' );
		if ( $fileC->exist($tmpSource) ) {
						$src = $tmpSource;
		}
				if ( $this->s3->putObjectFile( $src, $this->bucket, $this->_createAmazonS3BucketName(), $fileAccess, array(), $this->classType ) ) {
						$fileC = WGet::file( 'local' );
			$fileC->delete( $src );
									if ( !empty($this->fileInfoO->thumbnail) && in_array( $this->fileInfoO->type, array( 'jpg', 'png', 'gif' ) ) ) {
				$thumbnailsPath = JOOBI_DS_TEMP . 's3/' . $this->fileInfoO->folder . '/' . $this->fileInfoO->path . '/thumbnails/' . $this->fileInfoO->name . '.' . $this->fileInfoO->type;
				$thumbnailSource = str_replace( array( '|', '\\'), '/', $thumbnailsPath );
				$this->s3->putObjectFile( $thumbnailSource, $this->bucket, $this->_createAmazonS3BucketName( true ), $fileAccess, array(), $this->classType );
				$fileC->delete( $thumbnailSource );
			}
			return true;
		}
		$message = WMessage::get();
		$message->userE('1360711865IYJX');
		return false;
  }
	public function download() {
		if ( empty($this->fileInfoO->secure) ) {
			$url = $this->fileURL();
		} else {
			$url = $this->_s3_getTemporaryLink();
			$fileName = $this->fileInfoO->name . '.' . $this->fileInfoO->type;
			$url = $this->useSSL . '://' . $this->account . '.blob.core.windows.net/' . $this->container . '/' . $fileName;
		}
		if ( !empty($url) ) {
			WPages::redirect( $url );
		}
	}
	public function delete($path,$file=true) {
		if ( empty( $path ) ) return false;
		if ( ! $this->_initializeAzure() ) return false;
		$blob_name = basename( $path );
		try {
						if ( empty($this->services) ) {					
				$expA = explode( '/', $path );
				$messageA = explode( '.', $expA[1] );
				$messageId = $messageA[0];
			} else {					$this->azure->deleteBlob( $this->container, $blob_name );
			}					
						return true;
		} catch(Exception $e){
			$code = $e->getCode();
			$error_message = $e->getMessage();
			$message = $code . ": " . $error_message;
			$messC = WMessage::get();
			$messC->adminE( $message );
						return false;
		}		
	}
 	public function makePath($folder,$path='') {
 		return JOOBI_DS_TEMP . 'azure/' . $folder . ( !empty($path) ? '/' . $path : '' );
 	}
}