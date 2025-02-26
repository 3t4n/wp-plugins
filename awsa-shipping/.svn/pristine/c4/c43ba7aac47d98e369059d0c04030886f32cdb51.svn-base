<?php

namespace AWSA_Core\Excel;

use Ellumilel\ExcelWriter;

class Excel_Writer {

	private static $instance;

	/**
	 * @return \AWSA_Core\Excel\Excel_Writer
	 */
	public static function getInstance(): Excel_Writer {

		if ( is_null( self::$instance ) ) {

			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Create Excel
	 *
	 *
	 * @param string $name
	 * @param array  $header
	 * @param array  $rows
	 * @param string $author
	 *
	 * @since   1.0.0
	 * @version 1.0.0
	 * @return string
	 */
	public function create_excel( string $name, array $header, array $rows, $author = 'Sajjad Aslani' ): string {

		$wExcel = new ExcelWriter();
		$wExcel->writeSheetHeader( 'Sheet1', $header );
		$wExcel->setAuthor( $author );
		foreach ( $rows as $row ) {
			$wExcel->writeSheetRow(
				'Sheet1',
				$row
			);
		}

		$upload_dir = wp_upload_dir();
		$filename   = $upload_dir['basedir'] . '/' . $name . '.xlsx';
		$wExcel->writeToFile( $filename );

		return $upload_dir['baseurl'] . '/' . $name . '.xlsx';
	}

}