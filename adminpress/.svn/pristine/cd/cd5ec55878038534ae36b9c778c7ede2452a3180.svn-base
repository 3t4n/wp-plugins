<?php

if( ! class_exists( 'MenuStyle' ) ){
	
	class MenuStyle extends AdminPress{
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		
		public function __construct() {
			global $adminPress;
			//parent::__construct();
			if( $adminPress ){
				$this->plugin_dir = $adminPress->plugin_dir;
		        $this->plugin_url = $adminPress->plugin_url;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
			}
			
			add_filter( 'adminpress_form', array( $this, 'MenuStyle_form' ), 12 );
			
		}
		
		public function MenuStyle_form( $form ) {
			
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Menu Style Settings', 'admp' ) ?></span></h3>
				<div class="inside">
					<table width="100%">
						<tr>
							<td width="50%" valign="top">
								<table class="form-table">
									<tr>
										<th><?php _e( 'Menu Panel Background Color', 'admp' ) ?></th>
										<td><input name="admp[menu_bg_color]" type="text" value="<?php echo isset( $this->options['menu_bg_color'] ) ? $this->options['menu_bg_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Menu Panel Opacity (between 1 and 10)', 'admp' ) ?></th>
										<td><input name="admp[menu_bg_op]" type="range" min="0" max="10" value="<?php echo isset( $this->options['menu_bg_op'] ) ? $this->options['menu_bg_op'] : 8 ?>" /><span class="rangeData"><?php echo isset( $this->options['menu_bg_op'] ) ? $this->options['menu_bg_op'] : 8 ?></span></td>
									</tr>
									<tr>
										<th><?php _e( 'Menu Item Hover Background Color', 'admp' ) ?></th>
										<td><input name="admp[menu_hover_bg_color]" type="text" value="<?php echo isset( $this->options['menu_hover_bg_color'] ) ? $this->options['menu_hover_bg_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Active Menu Item Background Color', 'admp' ) ?></th>
										<td><input name="admp[menu_active_bg_color]" type="text" value="<?php echo isset( $this->options['menu_active_bg_color'] ) ? $this->options['menu_active_bg_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Menu Font Color', 'admp' ) ?></th>
										<td><input name="admp[menu_font_color]" type="text" value="<?php echo isset( $this->options['menu_font_color'] ) ? $this->options['menu_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
								</table>
							</td>
							<td valign="top">
								<table class="form-table">
									<tr>
										<th><?php _e( 'Menu Hover Font Color', 'admp' ) ?></th>
										<td><input name="admp[menu_hover_font_color]" type="text" value="<?php echo isset( $this->options['menu_hover_font_color'] ) ? $this->options['menu_hover_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Active Menu Item Font Color', 'admp' ) ?></th>
										<td><input name="admp[menu_active_font_color]" type="text" value="<?php echo isset( $this->options['menu_active_font_color'] ) ? $this->options['menu_active_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Submenu Background Color', 'admp' ) ?></th>
										<td><input name="admp[submenu_bg_color]" type="text" value="<?php echo isset( $this->options['submenu_bg_color'] ) ? $this->options['submenu_bg_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									
									<tr>
										<th><?php _e( 'Admin Bar Background Color', 'admp' ) ?></th>
										<td><input name="admp[ad_bar_bg_color]" type="text" value="<?php echo isset( $this->options['ad_bar_bg_color'] ) ? $this->options['ad_bar_bg_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
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
	
	new MenuStyle();
	
}
