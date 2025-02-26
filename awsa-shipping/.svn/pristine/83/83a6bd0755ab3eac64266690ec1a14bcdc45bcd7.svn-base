<?php

namespace AWSA_Core\Excel;

use Asan\PHPExcel;

class Excel_Reader {

	private static $instance;

	private        $reader;

	/**
	 * @return \AWSA_Core\Excel\Excel_Reader
	 */
	public static function getInstance(): Excel_Reader {

		if ( is_null( self::$instance ) ) {

			self::$instance = new self();
		}

		return self::$instance;
	}

	public function read_file( string $filename ): void {

		try {

			$this->reader = PHPExcel\Excel::load( $filename , function ($reader) {
				// Ignore empty row
				$reader->ignoreEmptyRow(true);
			});

		} catch ( PHPExcel\Exception\ReaderException $e ) {

		}
	}

	/**
	 * @return int
	 */
	public function get_rows_count(): int {

		return $this->reader->count();
	}

	public function sheets_info() {

		return $this->reader->sheets();
	}


	/**
	 * @param                  $filename
	 * @param array|string     $allowed_columns
	 * @param string|int|false $sheet_id
	 *
	 * @return array|null
	 */
	public function get_sheet_rows( string $filename, $allowed_columns = 'all', $sheet_id = false ): ?array {

		if ( !file_exists( $filename ) ) {

			return null;
		}

		$this->read_file( $filename );

		if ( empty( $this->reader ) ) {

			return null;
		}

		$columns = array_flip( $this->reader->current() );
		if ( 'all' !== $allowed_columns && is_array( $allowed_columns ) ) {

			foreach ( $columns as $column_key => $column_number ) {

				$id = array_search( $column_key, $allowed_columns, false );
				if ( false !== $id ) {

					unset( $columns[ $column_number ] );
				}
			}
		}

		$rows      = array();
		$row_count = $this->get_rows_count();
		for ( $i = 2; $i <= $row_count; $i++ ) {

			$row = array();
			$this->reader->seek( $i );
			$rv = $this->reader->current();
			foreach ( $columns as $key => $number ) {

				$row[ $key ] = $rv[ $number ];
			}

			$rows[] = $row;
		}

		return $rows;
	}

}