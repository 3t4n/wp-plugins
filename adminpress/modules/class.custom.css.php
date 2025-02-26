<?php

if( ! class_exists( 'CustomCSS' ) ){
	
	global $jal_db_version;
	
	class CustomCSS extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		
		public function __construct() {
			global $adminPress, $wpdb;
			//parent::__construct();
			if( $adminPress ){
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			
			add_filter( 'adminpress_form', array( $this, 'CustomCSS_form' ), 20 );
			add_action( 'admin_footer', array( $this, 'add_css_js_admin' ) );
			add_action( 'wp_footer', array( $this, 'add_css_js_front' ) );
			
		}
		
		public function add_css_js_admin() {
			?>
			<style>
			<?php echo stripslashes( $this->options['admin_css'] ); ?>
			</style>
			<script type="text/javascript">
			<?php echo stripslashes( $this->options['admin_js'] ); ?>
			</script>
			<?php
		}
		
		public function add_css_js_front() {
			?>
			<style>
			<?php echo stripslashes( $this->options['front_css'] ); ?>
			</style>
			<script type="text/javascript">
			<?php echo stripslashes( $this->options['front_js'] ); ?>
			</script>
			<?php
		}
		
		public function CustomCSS_form( $form ) {
			
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Custom CSS and JS', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Add CSS for admin pages', 'admp' ) ?></th>
							<td>
								<textarea class="widget_content" name="admp[admin_css]"><?php echo isset( $this->options['admin_css'] ) ? stripslashes( $this->options['admin_css'] ) : '' ?></textarea>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Add JS for admin pages', 'admp' ) ?></th>
							<td>
								<textarea class="widget_content" name="admp[admin_js]"><?php echo isset( $this->options['admin_js'] ) ? stripslashes( $this->options['admin_js'] ) : '' ?></textarea>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Add CSS for front pages', 'admp' ) ?></th>
							<td>
								<textarea class="widget_content" name="admp[front_css]"><?php echo isset( $this->options['front_css'] ) ? stripslashes( $this->options['front_css'] ) : '' ?></textarea>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Add JS for front pages', 'admp' ) ?></th>
							<td>
								<textarea class="widget_content" name="admp[front_js]"><?php echo isset( $this->options['front_js'] ) ? stripslashes( $this->options['front_js'] ) : '' ?></textarea>
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
	
	new CustomCSS();
	
}
