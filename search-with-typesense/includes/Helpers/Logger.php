<?php

namespace Codemanas\Typesense\Helpers;

use Codemanas\Typesense\Backend\Admin;

class Logger {
	private string $logBaseDir = '';
	private string $logBaseDirName = '/cm-typesense/';
	private $settings = [];

	public function __construct() {
		$this->settings = Admin::get_default_settings();
		//any time
		$this->mayBeMakeBaseDir();
//		get_option('cm')
	}

	public function mayBeMakeBaseDir() {
		try {
			$uploads_folder = wp_get_upload_dir();
			$baseDir        = $uploads_folder['basedir'] . $this->logBaseDirName;
			if ( ! is_dir( $uploads_folder['basedir'] . $this->logBaseDirName ) ) {
				//Create our directory if it does not exist
				mkdir( $baseDir, 0700, true ); // Recursive creation with secure permissions

				// Secure .htaccess file to deny access
				$htaccessFile = $baseDir . '.htaccess';
				file_put_contents( $htaccessFile, 'deny from all', LOCK_EX ); // Prevent access
				chmod( $htaccessFile, 0600 ); // Secure file permissions

				// Create an empty index.html to block directory listing
				$indexFile = $baseDir . 'index.html';
				file_put_contents( $indexFile, '', LOCK_EX );
				chmod( $indexFile, 0600 );
			}
			$this->logBaseDir = $baseDir;
		} catch ( \Exception $e ) {
			error_log( esc_html( $e->getMessage() ) );
		}

	}

	/**
	 * @return string
	 */
	public function getFormattedNameForLog(): string {
		return gmdate( 'Y-m-d', strtotime( 'now' ) );
	}

	/**
	 * @param $logType
	 * @param $filename
	 *
	 * @return bool|void
	 */
	public function deleteFile( $logType, $filename ) {

		//verify that current user has the permisssions
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		if ( $logType == 'error' ) {
			$logDir = $this->logBaseDir . 'error/';
		} elseif ( $logType == 'debug' ) {
			$logDir = $this->logBaseDir . 'debug/';
		} else {
			return false;
		}

		// Remove any directory traversal from the filename
		$sanitizedFilename = basename( $filename );
		// Allow only .txt files for deletion
		if ( ! preg_match( '/\.txt$/', $sanitizedFilename ) ) {
			return false;
		}
		// Build the full file path
		$filePath = $logDir . $sanitizedFilename;


		if ( file_exists( $filePath ) ) {
			return unlink( $filePath );
		}

		return false;
	}

	public function deleteAllFiles( $logType ) {
		//verify that current user has the permisssions
		if ( ! current_user_can( 'manage_options' ) ) {
			return false;
		}

		if ( $logType == 'error' ) {
			$logDir = $this->logBaseDir . 'error/';
		} elseif ( $logType == 'debug' ) {
			$logDir = $this->logBaseDir . 'debug/';
		} else {
			return false;
		}

		$files = glob( $logDir . '*.txt' );


		try {
			if ( ! empty( $files ) ) {
				foreach ( $files as $file ) {
					if ( is_file( $file ) ) {
						unlink( $file );
					}
				}

				return true;
			}
		} catch ( \Exception $e ) {
			return false;
		}


		return false;
	}

	private function createLogDirectory( $type ) {
		$logDir = $this->logBaseDir . $type . '/';
		if ( ! is_dir( $logDir ) ) {
			mkdir( $logDir, 0700, true );
			// Secure .htaccess file to deny access
			$htaccessFile = $logDir . '.htaccess';
			file_put_contents( $htaccessFile, 'deny from all', LOCK_EX ); // Prevent access
			chmod( $htaccessFile, 0600 ); // Secure file permissions
			// Create an empty index.html to block directory listing
			$indexFile = $logDir . 'index.html';
			file_put_contents( $indexFile, '', LOCK_EX );
			chmod( $indexFile, 0600 );
		}
	}

	/**
	 * @param $data
	 */
	public function logError( $data ) {
		if ( ! $this->settings['error_log'] ) {
			return;
		}

		$fileName = $this->getFormattedNameForLog() . '.txt';
		if ( $this->logBaseDirName != '' && ! is_dir( $this->logBaseDir . 'error/' ) ) {
			$this->createLogDirectory( 'error' );
		}
		$timestamp = gmdate( 'Y-m-d::H:i:s', strtotime( 'now' ) ) . '-UTC';
		$logData   = '=== START ====' . PHP_EOL . '::Time:: ' . $timestamp . PHP_EOL . var_export( $data, true ) . PHP_EOL . '===END===' . PHP_EOL . PHP_EOL;
		file_put_contents( $this->logBaseDir . 'error/' . $fileName, $logData, FILE_APPEND );
	}

	public function logDebugData( $data ) {
		if ( ! $this->settings['debug_log'] ) {
			return;
		}
		$fileName = $this->getFormattedNameForLog() . '.txt';
		if ( $this->logBaseDirName != '' && ! is_dir( $this->logBaseDir . 'debug/' ) ) {
			$this->createLogDirectory( 'debug' );
		}
		$timestamp = gmdate( 'Y-m-d::H:i:s', strtotime( 'now' ) ) . '-UTC';
		$logData   = '=== START ====' . PHP_EOL . '::Time:: ' . $timestamp . PHP_EOL . var_export( $data, true ) . PHP_EOL . '===END===' . PHP_EOL . PHP_EOL;
		file_put_contents( $this->logBaseDir . 'debug/' . $fileName, $logData, FILE_APPEND );
	}

	public function readAllErrorLogFiles( $log_type ): array {
		$files     = ( $log_type == 'error' ) ? glob( $this->logBaseDir . 'error/*.txt' ) : glob( $this->logBaseDir . 'debug/*.txt' );
		$fileNames = [];
		if ( count( $files ) > 0 ) {
			foreach ( $files as $filePath ) {
				$strPosLength = strrpos( $filePath, '/' );
				$fileName     = substr( substr( $filePath, $strPosLength + 1 ), '0' );
				$fileNames[]  = [ 'name' => $fileName ];
			}
		}

		return array_reverse( $fileNames );
	}

	public function readFile( $filePath ) {
		if ( ! file_exists( $filePath ) ) {
			return null;
		}

		return file_get_contents( $filePath );

	}

	public function readErrorFile( $filename ) {
		return $this->readFile( $this->logBaseDir . 'error/' . $filename );
	}

	public function readDebugFile( $filename ) {
		return $this->readFile( $this->logBaseDir . 'debug/' . $filename );
	}
}