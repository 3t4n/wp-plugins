<?php

if( ! class_exists( 'DashboardWidget' ) ){
	
	class DashboardWidget extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $dash_widgets;
		public $widget_table;
		
		public function __construct() {
			global $adminPress, $wpdb;;
			//parent::__construct();
			
			if( $adminPress ){
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			$this->widget_table = $wpdb->prefix . 'widgets_table';
			$this->dash_widgets = $this->get_dash_widgets();
			
			add_filter( 'adminpress_form', array( $this, 'DashboardWidget_style_form' ), 15 );
			add_action( 'plg_tables_installed', array( $this, 'menu_tables_install' ), 14 );
			add_action( 'save_adminpress_data', array( $this, 'save_widget_data' ), 14  );
			add_action( 'admin_init', array( $this, 'setup_dashboard_widget' ) );
			
		}
		
		public function menu_tables_install() {
			global $wpdb;
			global $jal_db_version;
			
			$sql = "CREATE TABLE IF NOT EXISTS " . $this->widget_table . " (
				id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				widget_title VARCHAR(255) NOT NULL,
				widget_content TEXT
				);";
				
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
			add_option( "jal_db_version", $jal_db_version );
		}
		
		public function setup_dashboard_widget() {
			$this->dash_widgets = $this->get_dash_widgets();
			foreach( $this->dash_widgets as $widget ){
				$content = $widget['widget_content'];
				$title = $widget['widget_title'];
				add_action( 'wp_dashboard_setup', function() use($title, $content ) {
					wp_add_dashboard_widget(
		                 str_replace( ' ', '_', $title ),         // Widget slug.
		                 $title,         // Title.
		                 function() use($content)  {
		                 	echo stripslashes_deep( $content );
		                 }
		        	);	
				} );
			}
		}
		
		public function save_widget_data( $data ) {
			global $wpdb;
			if( isset( $_POST['admp'] ) ){
				if( $_POST['dash_widget_title'] != '' && $_POST['dash_widget_content'] != '' ) {
					if( $_POST['widget_id'] == '' )
						$q = $wpdb->insert( $this->widget_table, array( 'widget_title'=>$_POST['dash_widget_title'], 'widget_content'=>$_POST['dash_widget_content'] ) );
					else {
						$wpdb->update( $this->widget_table, array( 'widget_title'=>$_POST['dash_widget_title'], 'widget_content'=>$_POST['dash_widget_content'] ), array( 'id'=>$_POST['widget_id'] ) );
					}
				}
			}
			
			if( isset( $_REQUEST['adminpress_nonce_field'] ) ) {
				if( isset( $_REQUEST['action'] ) && isset( $_REQUEST['id'] ) && $_REQUEST['action'] == 'delete_widget' ) {
					$wpdb->delete( $this->widget_table, array( 'id' => sprintf( '%d', $_REQUEST['id'] ) ) );
				}
			}
		}
		
		public function get_dash_widgets() {
			global $wpdb;
			$sql = "SELECT * from " . $this->widget_table;
			return $wpdb->get_results( $sql, 'ARRAY_A' );
		}
		
		public function get_dash_widget_by_id( $id ) {
			global $wpdb;
			$sql = $wpdb->prepare( "SELECT * from " . $this->widget_table . " where id = '%s' ", $id );
			return $wpdb->get_results( $sql, 'ARRAY_A' );
		}
		
		public function DashboardWidget_style_form( $form ) {
			
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Dashboard Widget', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Create new Dashboard Widget', 'admp' ) ?></th>
							<?php
								$edit = false;
								if( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'edit_widget' ) {
									$widget = $this->get_dash_widget_by_id( $_REQUEST['id'] );
									$edit = true;
								}
							?>
							<td>
								<label><?php _e( 'Widget Title', 'admp' ) ?></label><br>
								<input type="text" name="dash_widget_title" size="60" value="<?php echo $edit ? $widget[0]['widget_title'] : ''; ?>" /><br><br>
								<label><?php _e( 'Widget Content - HTML allowed', 'admp' ) ?></label><br>
								<?php wp_editor( $edit ? stripslashes_deep( $widget[0]['widget_content'] ) : '', 'dash_widget_content' ); ?>
								<input type="hidden" name="widget_id" value="<?php echo $edit ? $widget[0]['id'] : ''; ?>" />
							</td>
						</tr>
						<?php
							$dash_widget_titles = explode( ',', get_option( 'dash_widget_title' ) );
							$dash_widget_contents = explode( ',', get_option( 'dash_widget_content' ) );
						?>
						<tr>
							<th><?php _e( 'Created Widgets', 'admp' ) ?></th>
							<td>
								<?php foreach( $this->dash_widgets as $widget ){ ?>
								<div class="widget_list">
									<?php echo isset($widget['widget_title']) ? $widget['widget_title'] : '' ?>
									<div>
										<a href="<?php echo admin_url( 'admin.php?page=adminpress&&action=edit_widget&&id=' . $widget['id'] ) ?>"><i class="fa fa-edit"></i></a>
										 | 
										<a href="<?php echo admin_url( 'admin.php?page=adminpress&&noheader=true&&action=delete_widget&&id=' . $widget['id'] . '&&adminpress_nonce_field=' . wp_create_nonce( 'adminpress_nonce_action' ) ) ?>"><i class="fa fa-times"></i></a>
									</div>
								</div>
								<?php } ?>
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
	
	new DashboardWidget();
	
}
