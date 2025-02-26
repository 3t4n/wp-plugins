<?php
if( !class_exists('Aeiwooc_helper') ):
	class Aeiwooc_helper{
		
		const TEMPLATES_ARR = array(	'template-1.php',
										'template-2.php'
										//'template-3.xlsx'
										);
		
		function __construct() {
			add_action( 'wp_ajax_js_aeiwooc_download_excel_init', array($this, 'js_aeiwooc_download_excel_init_display') );
			add_action('wp_ajax_nopriv_js_aeiwooc_download_excel_init', array($this, 'js_aeiwooc_download_excel_init_display'));
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
			$this->order_bulk_actions();
			$this->order_add_file_download();
		}
		
		static function get_arr_templates(){
			return self::TEMPLATES_ARR;
		}
		
		public function load_textdomain(){
			load_plugin_textdomain( WPSHARE247_AEIWOOC_TEXTDOMAIN, false, dirname( plugin_basename( WPSHARE247_AEIWOOC ) ) . '/languages/' ); 
		}
		
		static function get_arr_border_style(){
			$arr_border = array(
								'none' => __("None", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'thin' => __("Style 1", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'dashDotDot' => __("Style 2", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'dashed' => __("Style 3", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'dotted' => __("Style 4", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'double' => __("Style 5", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'hair' => __("Style 6", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'medium' => __("Style 7", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'mediumDashDot' => __("Style 8", WPSHARE247_AEIWOOC_TEXTDOMAIN), 
								'mediumDashDotDot' => __("Style 9", WPSHARE247_AEIWOOC_TEXTDOMAIN),
								'mediumDashed' => __("Style 10", WPSHARE247_AEIWOOC_TEXTDOMAIN),
								'slantDashDot' => __("Style 11", WPSHARE247_AEIWOOC_TEXTDOMAIN),
								'thick' => __("Style 12", WPSHARE247_AEIWOOC_TEXTDOMAIN),
								'dashDot' => __("Style 13", WPSHARE247_AEIWOOC_TEXTDOMAIN)
								);
			return $arr_border;
		}
		
		public function js_aeiwooc_download_excel_init_display(){
			header("Content-Type: application/json", true);
    		
			$message = ''; $res = 0; $file_url = ''; $order_file_name = '';
			$arr_response = array();
			
			//_REQUEST - 1
			$order_id = absint( wp_unslash( $_REQUEST['order_id'] ) );
			
			//_ACTION - 2
			$order = wc_get_order( $order_id );
			if(!is_a( $order, 'WC_Order' )){
				$message = __("Order not exist", WPSHARE247_AEIWOOC_TEXTDOMAIN);
			}else{
				$file_path = wpshare247_aeiwooc_create_invoice_file( $order, '' );
				if($file_path){
					$res = 1;
					$order_file_name = wpshare247_aeiwooc_create_file_name_from_order( $order_id );
					$file_url = Aeiwooc::get_wp_upload_url_file() . '/' . $order_file_name;
				}
			}
			
			//_RESPONSE - 3
			$arr_response = array(
									'res' => $res,
									'message' => $message,
									'file_url' => $file_url,
									'order_file_name' => $order_file_name
								);
			wp_send_json($arr_response);
			die();
		}
		
		static function template_img_html($attachment_id, $container_id){
			if($attachment_id){
				$src_attachment = wp_get_attachment_image_url($attachment_id, 'thumbnail');
				?>
                <li id="<?php echo $attachment_id;?>" data-id="<?php echo $attachment_id;?>" class="attachment save-ready">
                	<a class="dashicons dashicons-no wpshare247_aeiwooc_removeit" container="#<?php echo $container_id; ?>"></a>
                    <div class="attachment-preview js--select-attachment type-image subtype-png landscape">
                    	<div class="thumbnail">
                            <div class="centered">
                                <img src="<?php echo $src_attachment;?>" draggable="false">
                            </div>
                    	</div>
                    </div>
                </li>
                <?php
			}
		}
		
		public function order_bulk_actions(){
			add_filter('bulk_actions-edit-shop_order', array($this, 'wooc_order_bulk_actions'));
			add_filter('handle_bulk_actions-edit-shop_order', array($this, 'wooc_handle_bulk_actions'), 10, 3);
		}
		
		public function wooc_order_bulk_actions(){
			$bulk_actions['aeiwooc-order-download-zip'] = __('Download Zip', WPSHARE247_AEIWOOC_TEXTDOMAIN);
			$bulk_actions['aeiwooc-order-export-excel-file'] = __('Export order to excel', WPSHARE247_AEIWOOC_TEXTDOMAIN);
			return $bulk_actions;
		}
		
		public function wooc_handle_bulk_actions($redirect_url, $action, $post_ids){
			
			switch($action){
				case 'aeiwooc-order-download-zip':
						//Download ZIP-----------------------------
						$file_dir = wpshare247_aeiwooc_create_zip_file_from_order_ids($post_ids);
						if($file_dir){
							header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
							header("Content-Type: application/zip");
							header("Content-Transfer-Encoding: Binary");
							header("Content-Length: ".filesize($file_dir));
							header("Content-Disposition: attachment; filename=\"".basename($file_dir)."\"");
							readfile($file_dir);
							unlink($file_dir);
							exit;
						}else{
							$redirect_url = add_query_arg('aeiwooc-order-download-zip', count($post_ids), $redirect_url);
						}
					break;
				
				case 'aeiwooc-order-export-excel-file':
						//Export excel file and download-----------------------------
						$file_dir = wpshare247_aeiwooc_export_excel_file($post_ids, '');
						if($file_dir){
							header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
							header("Content-Type: application/vnd.ms-excel; charset=utf-8");
							//header("Content-Transfer-Encoding: Binary");
							header("Content-Length: ".filesize($file_dir));
							header("Content-Disposition: attachment; filename=\"".basename($file_dir)."\"");
							readfile($file_dir);
							unlink($file_dir);
							exit;
						}else{
							$redirect_url = add_query_arg('aeiwooc-order-export-excel-file', count($post_ids), $redirect_url);
						}
					break;
				
			}
			return $redirect_url;
		}
		
		public function order_add_file_download(){ 
			if( is_admin() ){
				add_filter('manage_shop_order_posts_columns', array($this,'file_download_head'), 999999);
				add_action('manage_shop_order_posts_custom_column', array($this,'file_download_content'), 999999, 2);
			}
		}
		
		public function file_download_head($defaults){ 
			$defaults['wpshare247_aeiwooc_order_download']  = 'Download';
			return $defaults;
		}
		
		public function file_download_content($column_name, $post_ID){
			if ($column_name == 'wpshare247_aeiwooc_order_download') {
				echo '<a href="#" data-id="'.$post_ID.'" class="js_aeiwooc_download_excel">Download</a>';
			}
		}
		
	
	// end class-------------------------------------------------------------------------
	}
	
	new Aeiwooc_helper();
endif;