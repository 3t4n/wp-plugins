<?php

if( ! class_exists( 'TextChange' ) ){
	
	global $jal_db_version;
	
	class TextChange extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $texts;
		public $text_table;
		
		public function __construct() {
			global $adminPress, $wpdb;
			//parent::__construct();
			if( $adminPress ){
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			
			$this->text_table = $wpdb->prefix . 'text_table';
			
			
			add_action( 'plg_tables_installed', array( $this, 'plg_tables_install' ) );
			add_filter( 'adminpress_form', array( $this, 'TextChange_form' ), 18 );
			add_filter( 'gettext', array( $this, 'admp_text_change' ), 20, 3 );
			add_filter( 'ngettext', array( $this, 'admp_text_change' ), 20, 3 );
			add_action( 'save_adminpress_data', array( $this, 'save_text_data' ), 20 );
			
			if( isset( $_REQUEST['action'] ) && isset( $_REQUEST['id'] ) && $_REQUEST['action'] == 'delete_text' ) {
				global $wpdb;
				$wpdb->delete( $this->text_table, array( 'id' => sprintf( '%d', $_REQUEST['id'] ) ) );
				$this->texts = $this->get_all_domain_table_data();
			}
			
		}
		
		public function plg_tables_install() {
			global $wpdb;
			global $jal_db_version;
			$sql = "CREATE TABLE IF NOT EXISTS " . $this->text_table . " (
				id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				find_text VARCHAR(255) NOT NULL,
				find_domain VARCHAR(255),
				replace_text VARCHAR(255)
				);";
				
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
			add_option( "jal_db_version", $jal_db_version );
		}

		public function save_text_data( $data ){
			global $wpdb;
			if( $_POST['find_text'] != '' && $_POST['change_text'] != '' ) {
				$wpdb->insert( $this->text_table, array( 'find_text'=>$_POST['find_text'], 'find_domain'=>$_POST['find_domain'], 'replace_text' => $_POST['change_text'] ) );
			}
		}
		
		
		public function get_all_domain_table_data() {
			global $wpdb;
			return $wpdb->get_results( "SELECT * from " . $this->text_table, 'ARRAY_A' );
		}
		
		public function admp_text_change( $translated_text, $untranslated_text, $domain ) {
			$this->texts = $this->get_all_domain_table_data();
			foreach( $this->texts as $text ) {
				
				if( $text['find_domain'] != '' && $text['find_domain'] == $domain ){
					if( $text['find_text'] == $untranslated_text ){
						$translated_text = __( $text['replace_text'], 'admp' );
					}
				}
				else{
					$translated_text = str_ireplace( $text['find_text'], $text['replace_text'], $translated_text );
				}
				
			}
			
    		return $translated_text;
		}
		
		public function TextChange_form( $form ) {
			$this->texts = $this->get_all_domain_table_data();
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Text Change', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Add text for change', 'admp' ) ?></th>
							<td>
								<table class="form-table">
									<tr>
										<th><?php _e( 'Find Text', 'admp' ) ?></th>
										<td><input size="40" type="text" name="find_text"></td>
									</tr>
									<tr>
										<th><?php _e( 'Text Domain (leave blank for global change)', 'admp' ) ?></th>
										<td><input size="40" type="text" name="find_domain"></td>
									</tr>
									<tr>
										<th><?php _e( 'Change to', 'admp' ) ?></th>
										<td><input size="40" type="text" name="change_text"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Added texts', 'admp' ) ?></th>
							<td>
								<table cellpadding="5" cellspacing="5">
									<tr>
										<th><?php _e( 'Find Text', 'admp' ) ?></th>
										<th><?php _e( 'Domain', 'admp' ) ?></th>
										<th><?php _e( 'Change to', 'admp' ) ?></th>
										<th><?php _e( 'Action', 'admp' ) ?></th>
									</tr>
									<?php foreach( $this->texts as $text ){ ?>
									<tr>
										<td><?php echo $text['find_text'] ?></td>
										<td><?php echo $text['find_domain'] ?></td>
										<td><?php echo $text['replace_text'] ?></td>
										<td><a title="Delete" href="<?php echo admin_url( 'admin.php?page=adminpress&&action=delete_text&&id=' . $text['id'] ) ?>"><i class="fa fa-times"></i></a></td>
									</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php
			$output = $form . ob_get_contents();
			ob_end_clean();
			return $output; 
		}
		
	}
	
	new TextChange();
	
}
