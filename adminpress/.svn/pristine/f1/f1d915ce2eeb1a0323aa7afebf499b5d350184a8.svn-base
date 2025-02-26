<?php

if( ! class_exists( 'FooterText' ) ){
	
	class FooterText extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		
		public function __construct() {
			global $adminPress;
			//parent::__construct();
			if( $adminPress ) {
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			
			add_filter( 'adminpress_form', array( $this, 'FooterText_form' ), 17 );
			add_filter( 'admin_footer_text', array( $this, 'change_footer_admin' ) ); 
			add_filter( 'update_footer', array( $this, 'footer_version' ), 999 );
			add_filter( 'submitted_data', array( $this, 'footer_text_add' ) );
			
		}
		
		public function change_footer_admin( $text ) {
			if( isset( $this->options['footer_text'] ) && $this->options['footer_text'] != '' ) {
				return stripslashes_deep( $this->options['footer_text'] );
			}
			return $text;
		}
		
		public function footer_version( $text ) {
			return isset( $this->options['hide_version'] ) && $this->options['hide_version'] == 1 ? '' : $text;
		}
		
		public function footer_text_add( $data ){
			$data['admp']['footer_text'] = $data['footer_text'];
			return $data;
		}
		
		public function FooterText_form( $form ) {
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Footer Text', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Footer Text', 'admp' ) ?></th>
							<td><?php wp_editor( isset( $this->options['footer_text'] ) ? stripslashes( $this->options['footer_text'] ) : "" ? stripslashes( $this->options['footer_text'] ) : '', 'footer_text' ); ?></td>
						</tr>
						<tr>
							<th><?php _e( 'Hide version in footer', 'admp' ) ?></th>
							<td>
								<input id="v_on" <?php echo isset( $this->options['hide_version'] ) && $this->options['hide_version'] == 1 ? 'checked="checked"' : '' ?> type="radio" name="admp[hide_version]" value="1" class="toggle-radio" /> <label for="v_on"><?php _e( 'Yes', 'admp' ) ?></label>
								<input id="v_off" <?php echo isset( $this->options['hide_version'] ) && $this->options['hide_version'] == 0 ? 'checked="checked"' : '' ?> type="radio" name="admp[hide_version]" value="0" class="toggle-radio" /> <label for="v_off"><?php _e( 'No', 'admp' ) ?></label>
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
	
	new FooterText();
	
}
