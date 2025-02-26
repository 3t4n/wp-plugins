<?php

if( ! class_exists( 'LoginStyle' ) ){
	
	class LoginStyle extends AdminPress{
		
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
			
			add_filter( 'adminpress_form', array( $this, 'login_style_form' ), 13 );
			add_action( 'login_head', array( $this, 'reset_remember_option' ), 99 );
			add_action( 'login_form', array( $this, 'start_login_form_cache' ), 99 );
			add_filter( 'gettext', array( $this, 'disable_password_reset' ) );
			add_filter( 'login_message', array( $this, 'custom_login_message' ) );
			add_filter( 'login_headerurl', array( $this, 'custom_login_header_url' ) );
			add_filter( 'login_redirect', array( $this, 'custom_login_redirect' ), 10, 3 );
			add_filter( 'logout_url', array( $this, 'custom_logout_url' ), 10, 2 );
			
		}
		
		public function disable_password_reset( $text ) {
			if ($text == 'Lost your password?'){$text = '';}
			return $text;
		}
		
		public function reset_remember_option() {
			if( $this->options['rem_me'] == 1 )
				if( isset($_POST['rememberme']) ) {
					unset( $_POST['rememberme'] );
				}
		}
		
		public function start_login_form_cache() {
			ob_start( array( $this, 'process_login_form_cache' ) );
		}
		
		public function process_login_form_cache( $content ) {
			$content = preg_replace( '/<p class="forgetmenot">(.*)<\/p>/', '', $content);
			return $content;
		}
		
		public function custom_login_message( $message ) {
			return isset( $this->options['login_msg'] ) && $this->options['login_msg'] != '' ? $this->options['login_msg'] . '<br><br>' : $message;
		}
		
		public function custom_login_header_url( $url ) {
			if( isset( $this->options['login_image_link'] ) ){
				if( $this->options['login_image_link'] == 'site_url' ){
					return home_url();
				}else{
					return $this->options['login_ext_url'];
				}
			}
			return $url;
		}
		
		public function custom_login_redirect( $redirect_to, $request, $user ) {
			return isset( $this->options['login_redirect'] ) && $this->options['login_redirect'] != '' ? $this->options['login_redirect'] : $redirect_to;
		}
		
		public function custom_logout_url( $logout_url, $redirect ) {
			return isset( $this->options['logout_redirect'] ) && $this->options['logout_redirect'] != '' ? $logout_url . '&redirect_to=' . $this->options['logout_redirect'] : $logout_url . '&redirect_to=' . $redirect;
		}
		
		public function login_style_form( $form ) {
			
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Login Page Settings', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Select login logo', 'admp' ) ?></th>
							<td>
				                <input class="media_url" type="text" name="admp[login_logo]" size="60" value="<?php echo isset( $this->options['login_logo'] ) ?$this->options['login_logo'] : ''; ?>">
				                <a href="#" class="media_url_btn header_logo_upload button button-primary"><i class="fa fa-upload"></i> <?php _e( 'Upload', 'admp' ) ?></a>
				                <br><br>
				                <?php if( ! isset( $this->options['login_logo'] ) || $this->options['login_logo'] == '' ) $style = 'display:none'; ?>
				                <img style="<?php echo $style; ?>" class="media_url_img header_logo" src="<?php echo $this->options['login_logo']; ?>" height="100" width="100"/>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Select Background Image (To use background image, clear the field for background color)', 'admp' ) ?></th>
							<td>
				                <input class="media_url" type="text" name="admp[login_bg_img]" size="60" value="<?php echo isset( $this->options['login_bg_img'] ) ?$this->options['login_bg_img'] : ''; ?>">
				                <a href="#" class="media_url_btn header_logo_upload button button-primary"><i class="fa fa-upload"></i> <?php _e( 'Upload', 'admp' ) ?></a>
				                <br><br>
				                <?php if( ! isset( $this->options['login_bg_img'] ) || $this->options['login_bg_img'] == '' ) $style2 = 'display:none'; ?>
				                <img style="<?php echo $style2 ?>" class="media_url_img header_logo" src="<?php echo $this->options['login_bg_img']; ?>" height="100" width="100"/>
							</td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td width="50%" valign="top">
								<table class="form-table">
									<tr>
										<th><?php _e( 'Select Background Color (Background color will take precendence over background image)', 'admp' ) ?></th>
										<td>
							                <input class="my-color-field" type="text" name="admp[login_bg_col]" size="60" value="<?php echo isset( $this->options['login_bg_col'] ) ?$this->options['login_bg_col'] : ''; ?>">
										</td>
									</tr>
									<tr>
										<th><?php _e( 'Select Font Color', 'admp' ) ?></th>
										<td>
							                <input class="my-color-field" type="text" name="admp[login_font_col]" size="60" value="<?php echo isset( $this->options['login_font_col'] ) ?$this->options['login_font_col'] : ''; ?>">
										</td>
									</tr>
									<tr>
										<th><?php _e( 'Select Form Background Color', 'admp' ) ?></th>
										<td>
							                <input class="my-color-field" type="text" name="admp[login_form_bg_col]" size="60" value="<?php echo isset( $this->options['login_form_bg_col'] ) ?$this->options['login_form_bg_col'] : ''; ?>">
										</td>
									</tr>
								</table>
							</td>
							<td width="50%" valign="top">
								<table class="form-table">
									<tr>
										<th><?php _e( 'Remove Remember Me', 'admp' ) ?></th>
										<td>
											<input id="rem_on" <?php echo isset( $this->options['rem_me'] ) && $this->options['rem_me'] == 1 ? 'checked="checked"' : '' ?> type="radio" name="admp[rem_me]" value="1" class="toggle-radio" /> <label for="rem_on"><?php _e( 'Yes', 'admp' ) ?></label>
											<input id="rem_off" <?php echo isset( $this->options['rem_me'] ) && $this->options['rem_me'] == 0 ? 'checked="checked"' : '' ?> type="radio" name="admp[rem_me]" value="0" class="toggle-radio" /> <label for="rem_off"><?php _e( 'No', 'admp' ) ?></label>
										</td>
									</tr>
									<tr>
										<th><?php _e( 'Remove Lost Password', 'admp' ) ?></th>
										<td>
											<input id="lost_on" <?php echo isset( $this->options['lost_pw'] ) && $this->options['lost_pw'] == 1 ? 'checked="checked"' : '' ?> type="radio" name="admp[lost_pw]" value="1" class="toggle-radio" /> <label for="lost_on"><?php _e( 'Yes', 'admp' ) ?></label>
											<input id="lost_off" <?php echo isset( $this->options['lost_pw'] ) && $this->options['lost_pw'] == 0 ? 'checked="checked"' : '' ?> type="radio" name="admp[lost_pw]" value="0" class="toggle-radio" /> <label for="lost_off"><?php _e( 'No', 'admp' ) ?></label>
										</td>
									</tr>
									<tr>
										<th><?php _e( 'Remove Back to... Link', 'admp' ) ?></th>
										<td>
											<input id="back_on" <?php echo isset( $this->options['back_to'] ) && $this->options['back_to'] == 1 ? 'checked="checked"' : '' ?> type="radio" name="admp[back_to]" value="1" class="toggle-radio" /> <label for="back_on"><?php _e( 'Yes', 'admp' ) ?></label>
											<input id="back_off" <?php echo isset( $this->options['back_to'] ) && $this->options['back_to'] == 0 ? 'checked="checked"' : '' ?> type="radio" name="admp[back_to]" value="0" class="toggle-radio" /> <label for="back_off"><?php _e( 'No', 'admp' ) ?></label>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table class="form-table">
						<tr>
							<th><?php _e( 'Select login image link URL', 'admp' ) ?></th>
							<td>
								<input id="site_url" <?php echo isset( $this->options['login_image_link'] ) ? ( $this->options['login_image_link'] == 'site_url' ? 'checked="checked"' : '' ) : 'checked="checked"'; ?> type="radio" name="admp[login_image_link]" value="site_url" class="toggle-radio" /> <label for="site_url"><?php _e( 'Site URL', 'admp' ) ?></label>
								<input id="ext_url" <?php echo isset( $this->options['login_image_link'] ) && $this->options['login_image_link'] == 'ext_url' ? 'checked="checked"' : ''; ?> id="ext_url" type="radio" name="admp[login_image_link]" value="ext_url" class="toggle-radio" /> <label for="ext_url"><?php _e( 'External URL', 'admp' ) ?></label><br><br>
								<input id="ext_url_link" disabled="disabled" value="<?php echo isset( $this->options['login_ext_url'] ) ? $this->options['login_ext_url'] : '' ?>" type="text" name="admp[login_ext_url]" size="60" />
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Add messagae over the login box', 'admp' ) ?></th>
							<td>
								<textarea class="widget_content" name="admp[login_msg]"><?php echo isset( $this->options['login_msg'] ) ? $this->options['login_msg'] : '' ?></textarea>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Login redirect URL', 'admp' ) ?></th>
							<td>
								<input type="text" name="admp[login_redirect]" value="<?php echo isset( $this->options['login_redirect'] ) ? $this->options['login_redirect'] : '' ?>" size="60" />
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Logout redirect URL', 'admp' ) ?></th>
							<td>
								<input type="text" name="admp[logout_redirect]" value="<?php echo isset( $this->options['logout_redirect'] ) ? $this->options['logout_redirect'] : '' ?>" size="60" />
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
	
	new LoginStyle();
	
}
