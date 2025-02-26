<?php
namespace Adminz\Helper\Logs;

class HttpPostRequest {
	function __construct() {

	}

	private $table_name = 'adminz_http_post_request_logs';
	function init() {

		// create data base table
		$args  = [ 
			'table_name' => $this->table_name,
			'menu_title' => 'Request logs',
			'fields'     => [ 
				'id INT(11) NOT NULL AUTO_INCREMENT,',
				'timestamp DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,',
				'url VARCHAR(255) NOT NULL,',
				'request TEXT NOT NULL,',
				'response TEXT NOT NULL,',
				'PRIMARY KEY (id)',
			],
		];
		$table = \WpDatabaseHelper\Init::WpDatabase();
		$table->init_table( $args );


		// save logs

		add_action( 'http_api_debug', function ($response, $context, $class, $args, $url) {
			// bỏ qua wp-cron.php
			if(str_contains( $url, 'wp-cron.php' )){
				return;
			}


			// Chỉ xử lý các yêu cầu POST
			if ( isset( $args['method'] ) && strtoupper( $args['method'] ) === 'POST' ) {
				// Chuẩn bị dữ liệu để lưu vào bảng
				$log_data = array(
					'timestamp' => current_time( 'mysql' ),
					'url'       => $url,
					'request'   => json_encode( $args, JSON_PRETTY_PRINT ), // Chuyển đổi request thành JSON
					'response'  => json_encode( $response, JSON_PRETTY_PRINT ), // Chuyển đổi response thành JSON
				);

				// Chèn dữ liệu vào bảng
				global $wpdb;
				$wpdb->insert(
					$wpdb->prefix . $this->table_name, // Tên bảng (có tiền tố prefix)
					$log_data // Dữ liệu cần chèn
				);

				// Kiểm tra lỗi (nếu có)
				if ( $wpdb->last_error ) {
					error_log( 'Failed to save log: ' . $wpdb->last_error );
				}
			}
		}, 10, 5 );
	}
}