<?php

if( ! class_exists( 'AjaxSearch' ) ){
	
	class AjaxSearch extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $submenus;
		
		public function __construct() {
			global $adminPress;
			//parent::__construct();
			if( $adminPress ) {
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			
			
			add_filter( 'adminpress_form', array( $this, 'AjaxSearch_style_form' ), 19 );
			add_action( 'admin_enqueue_scripts', array( $this, 'search_admin_theme_style' ) );
		}
		
		public function search_admin_theme_style() {
			if( isset( $this->options['enable_ajax'] ) && $this->options['enable_ajax'] == 1 ){
				wp_enqueue_style( 'ajaxcss', $this->plugin_url . 'modules/ajax_search/ajax.css' );
				wp_enqueue_script( 'ajaxjs', $this->plugin_url . 'modules/ajax_search/ajax.js', array( 'jquery' ) );
			}
		}
		
		public function AjaxSearch_style_form( $form ) {
			
			ob_start();
			
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Ajax Search', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Enable Ajax Search in Admin', 'admp' ) ?></th>
							<td>
				                <input id="ajax_on" <?php echo isset( $this->options['enable_ajax'] ) && $this->options['enable_ajax'] == 1 ? 'checked="checked"' : '' ?> type="radio" name="admp[enable_ajax]" value="1" class="toggle-radio" /> <label for="ajax_on"><?php _e( 'Yes', 'admp' ) ?></label>
				                <input id="ajax_off" <?php echo isset( $this->options['enable_ajax'] ) && $this->options['enable_ajax'] == 0 ? 'checked="checked"' : '' ?> type="radio" name="admp[enable_ajax]" value="0" class="toggle-radio" /> <label for="ajax_off"><?php _e( 'No', 'admp' ) ?></label>
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
	
	new AjaxSearch();
	
}
