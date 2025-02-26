<?php

/*
 * Class file for main styling of the theme
 */
 
 if( ! class_exists( 'AdminStyle' ) ){
 	
	class AdminStyle extends AdminPress {
		
		public $plugin_url;
	    public $plugin_dir;
		public $version;
		public $options;
		public $google_fonts;
		
		/*
		 * Defining constructor
		 */
		public function __construct() {
			
			global $adminPress;
			if( $adminPress ){
				$this->plugin_url = $adminPress->plugin_url;
				$this->plugin_dir = $adminPress->plugin_dir;
				$this->version = $adminPress->version;
				$this->options = $adminPress->options;
				$this->google_fonts = $this->wp_get_google_webfonts_list( 'alpha' );
			}
			
			add_filter( 'adminpress_form', array( $this, 'style_form' ), 11 );
			
		}
		
		
		/*
		 * Load google fonts
		 */ 
		public function wp_get_google_webfonts_list( $sort='' ) {
		    /*
		    $key = Web Fonts Developer API
		    $sort=
		    alpha: Sort the list alphabetically
		    date: Sort the list by date added (most recent font added or updated first)
		    popularity: Sort the list by popularity (most popular family first)
		    style: Sort the list by number of styles available (family with most styles first)
		    trending: Sort the list by families seeing growth in usage (family seeing the most growth first)
		    */
		    if( isset( $this->options['google_api'] ) && $this->options['google_api'] != '' ) {
				$key = $this->options['google_api'];
				$http = (!empty($_SERVER['HTTPS'])) ? "https" : "http";
				
				$google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $key . '&sort=' . $sort;
				//lets fetch it
				$response = wp_remote_get($google_api_url, array('sslverify' => false ));
				
				$data = json_decode($response['body'], true);
				$items = $data['items'];
				$font_list = array();
				foreach ($items as $item) {
					$font_list[] .= $item['family'];
				}
	
				//Return the saved lit of Google Web Fonts
				return $font_list;
			}
			else {
				return array();
			}
		}
		
		
		/*
		 * Form module for main style
		 */
		public function style_form( $form ) {
			ob_start();
			?>
			<div class="postbox ">
				<h3 class="hndle"><span><?php _e( 'Style Settings', 'admp' ) ?></span></h3>
				<div class="inside">
					<table class="form-table">
						<tr>
							<th><?php _e( 'Google Font API', 'admp' ) ?></th>
							<td>
								<input size="60" name="admp[google_api]" type="text" value="<?php echo isset( $this->options['google_api'] ) ? $this->options['google_api'] : "" ?>" /><br>
								<em><?php _e( 'This is important! To enable google font you must provide your google font API', 'admp' ) ?></em>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Select background image (To use background image, clear the field for background color)', 'admp' ) ?></th>
							<td>
				                <input class="media_url" type="text" name="admp[header_logo]" size="60" value="<?php echo $this->options['header_logo']; ?>">
				                <a href="#" class="media_url_btn header_logo_upload button button-primary"><i class="fa fa-upload"></i> <?php _e( 'Upload', 'admp' ) ?></a>
				                <br><br>
				                <?php if( ! isset( $this->options['header_logo'] ) || $this->options['header_logo'] == '' ) $style = 'display:none'; ?>
				                <img style="<?php echo $style; ?>" class="media_url_img header_logo" src="<?php echo $this->options['header_logo']; ?>" height="100" width="100"/>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Select Background Color (Background color will take precendence over background image)', 'admp' ) ?></th>
							<td><input name="admp[main_bg_col]" type="text" value="<?php echo isset( $this->options['main_bg_col'] ) ? $this->options['main_bg_col'] : "" ?>" class="my-color-field" /></td>
						</tr>
					</table>
					<table width="100%">
						<tr>
							<td width="50%" valign="top">
								<table class="form-table">
									<tr>
										<th><?php _e( 'Primary Button color', 'admp' ) ?></th>
										<td><input name="admp[pr_btn_color]" type="text" value="<?php echo isset( $this->options['pr_btn_color'] ) ? $this->options['pr_btn_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Primary Button Hover color', 'admp' ) ?></th>
										<td><input name="admp[pr_btn_hover_color]" type="text" value="<?php echo isset( $this->options['pr_btn_hover_color'] ) ? $this->options['pr_btn_hover_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Primary Button Font color', 'admp' ) ?></th>
										<td><input name="admp[pr_btn_font_color]" type="text" value="<?php echo isset( $this->options['pr_btn_font_color'] ) ? $this->options['pr_btn_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Primary Button Font Hover color', 'admp' ) ?></th>
										<td><input name="admp[pr_btn_font_hover_color]" type="text" value="<?php echo isset( $this->options['pr_btn_font_hover_color'] ) ? $this->options['pr_btn_font_hover_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									
									<tr>
										<th><?php _e( 'Secondary Button color', 'admp' ) ?></th>
										<td><input name="admp[se_btn_color]" type="text" value="<?php echo isset( $this->options['se_btn_color'] ) ? $this->options['se_btn_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Secondary Button Hover color', 'admp' ) ?></th>
										<td><input name="admp[se_btn_hover_color]" type="text" value="<?php echo isset( $this->options['se_btn_hover_color'] ) ? $this->options['se_btn_hover_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Secondary Button Font color', 'admp' ) ?></th>
										<td><input name="admp[se_btn_font_color]" type="text" value="<?php echo isset( $this->options['se_btn_font_color'] ) ? $this->options['se_btn_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Secondary Button Font Hover color', 'admp' ) ?></th>
										<td><input name="admp[se_btn_font_hover_color]" type="text" value="<?php echo isset( $this->options['se_btn_font_hover_color'] ) ? $this->options['se_btn_font_hover_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									
									<tr>
										<th><?php _e( 'Widget Header Background', 'admp' ) ?></th>
										<td><input name="admp[wid_hd_bg]" type="text" value="<?php echo isset( $this->options['wid_hd_bg'] ) ? $this->options['wid_hd_bg'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Widget Header Font Color', 'admp' ) ?></th>
										<td><input name="admp[wid_hd_font_color]" type="text" value="<?php echo isset( $this->options['wid_hd_font_color'] ) ? $this->options['wid_hd_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									
									<tr>
										<th><?php _e( 'Widget Background', 'admp' ) ?></th>
										<td><input name="admp[wid_bg]" type="text" value="<?php echo isset( $this->options['wid_bg'] ) ? $this->options['wid_bg'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Widget Background Opacity (between 1 and 10)', 'admp' ) ?></th>
										<td><input name="admp[wid_bg_op]" type="range" min="0" max="10" value="<?php echo isset( $this->options['wid_bg_op'] ) ? $this->options['wid_bg_op'] : 8 ?>" /> <span class="rangeData"><?php echo isset( $this->options['wid_bg_op'] ) ? $this->options['wid_bg_op'] : 8 ?></span></td>
									</tr>
									<tr>
										<th><?php _e( 'Widget Font Color', 'admp' ) ?></th>
										<td><input name="admp[wid_font_color]" type="text" value="<?php echo isset( $this->options['wid_font_color'] ) ? $this->options['wid_font_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
								</table>
							</td>
							<td width="50%" valign="top">
								<table class="form-table">
									<tr>
										<th><?php _e( 'Link color', 'admp' ) ?></th>
										<td><input name="admp[link_color]" type="text" value="<?php echo isset( $this->options['link_color'] ) ? $this->options['link_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Link hover color', 'admp' ) ?></th>
										<td><input name="admp[link_hover_color]" type="text" value="<?php echo isset( $this->options['link_hover_color'] ) ? $this->options['link_hover_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Current Link color', 'admp' ) ?></th>
										<td><input name="admp[link_cur_color]" type="text" value="<?php echo isset( $this->options['link_cur_color'] ) ? $this->options['link_cur_color'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Update Notice Background', 'admp' ) ?></th>
										<td><input name="admp[up_ntc_bg]" type="text" value="<?php echo isset( $this->options['up_ntc_bg'] ) ? $this->options['up_ntc_bg'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Update Notice Font', 'admp' ) ?></th>
										<td><input name="admp[up_ntc_font]" type="text" value="<?php echo isset( $this->options['up_ntc_font'] ) ? $this->options['up_ntc_font'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Update Notice Border', 'admp' ) ?></th>
										<td><input name="admp[up_ntc_brd]" type="text" value="<?php echo isset( $this->options['up_ntc_brd'] ) ? $this->options['up_ntc_brd'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Error Notice Background', 'admp' ) ?></th>
										<td><input name="admp[err_ntc_bg]" type="text" value="<?php echo isset( $this->options['err_ntc_bg'] ) ? $this->options['err_ntc_bg'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Error Notice Font', 'admp' ) ?></th>
										<td><input name="admp[err_ntc_font]" type="text" value="<?php echo isset( $this->options['err_ntc_font'] ) ? $this->options['err_ntc_font'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Error Notice Border', 'admp' ) ?></th>
										<td><input name="admp[err_ntc_brd]" type="text" value="<?php echo isset( $this->options['err_ntc_brd'] ) ? $this->options['err_ntc_brd'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Nag Notice Background', 'admp' ) ?></th>
										<td><input name="admp[nag_ntc_bg]" type="text" value="<?php echo isset( $this->options['nag_ntc_bg'] ) ? $this->options['nag_ntc_bg'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Nag Notice Font', 'admp' ) ?></th>
										<td><input name="admp[nag_ntc_font]" type="text" value="<?php echo isset( $this->options['nag_ntc_font'] ) ? $this->options['nag_ntc_font'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Nag Notice Border', 'admp' ) ?></th>
										<td><input name="admp[nag_ntc_brd]" type="text" value="<?php echo isset( $this->options['nag_ntc_brd'] ) ? $this->options['nag_ntc_brd'] : "" ?>" class="my-color-field" /></td>
									</tr>
									<tr>
										<th><?php _e( 'Font Color', 'admp' ) ?></th>
										<td><input name="admp[font_col]" type="text" value="<?php echo isset( $this->options['font_col'] ) ? $this->options['font_col'] : "" ?>" class="my-color-field" /></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					<table class="form-table">
						<tr>
							<th><?php _e( 'Select font for heading', 'admp' ) ?></th>
							<td>
								<select name="admp[head_font]">
									<option value=""><?php _e( 'Default Font', 'admp' ) ?></option>
									<?php foreach( $this->google_fonts as $font ) { ?>
									<option <?php echo isset( $this->options['head_font'] ) && $this->options['head_font'] == str_replace( ' ', '+', $font ) ? 'selected' : '' ?> value="<?php echo str_replace( ' ', '+', $font ) ?>"><?php echo $font; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Select font for paragraph', 'admp' ) ?></th>
							<td>
								<select name="admp[para_font]">
									<option value=""><?php _e( 'Default Font', 'admp' ) ?></option>
									<?php foreach( $this->google_fonts as $font ) { ?>
									<option <?php echo isset( $this->options['para_font'] ) && $this->options['para_font'] == str_replace( ' ', '+', $font ) ? 'selected' : '' ?> value="<?php echo str_replace( ' ', '+', $font ) ?>"><?php echo $font; ?></option>
									<?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<th><?php _e( 'Body font size', 'admp' ) ?></th>
							<td>
				                <input type="text" name="admp[body_font_size]" size="60" value="<?php echo isset( $this->options['body_font_size'] ) && $this->options['body_font_size'] != '' ? $this->options['body_font_size'] : '13'; ?>"> px
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

	new AdminStyle();
	
	
 }
