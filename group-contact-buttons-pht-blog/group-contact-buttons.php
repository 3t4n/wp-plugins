<?php
/* 
Plugin Name: 	Call Now - Group Contact Buttons
Plugin URI: 	https://www.phamhuuthanh.com
Description: 	Insert call now buttons, chat Facebook, quick contact via Zalo, Viber, Skype, Line, Contact Form 7 ... all wrapped up in a Group Contact button neatly displayed. The plugin is completely free for Wordpress websites.
Tags: 			group contact, quick call button, call now button, facebook chat, zalo chat, viber chat, line chat, skype chat, google map, contact form, email, ipad, mobile, responsive, buttons, phone, call, contact
Author: 		Pham Huu Thanh
Author URI: 	https://me.phamhuuthanh.com
Version: 		2.4
License: 		GPL2
Text Domain:    group-contact-buttons
*/
	add_action('admin_menu', 'pht_adminPageConfig');
	
	// TAO DUONG DAN TREN MENU TRANG QUAN TRI
	if (!function_exists('pht_adminPageConfig')) { 
		function pht_adminPageConfig(){
				add_menu_page( 'Group Contact Buttons Setup - PHT Blog', 'Group Contact', 'manage_options', 'pht-click-to-action', 'pht_contentOfPageConfig' );
		}
	}
	// NOI DUNG TRANG TUY CHINH
	if (!function_exists('pht_contentOfPageConfig')) { 
		function pht_contentOfPageConfig() {
		?>
		<div class="wrap">
		<h1>Group Contact Buttons - PHT Blog</h1>

		<form method="post" action="options.php">
			<?php settings_fields( 'plugin_options' ); ?>
			<?php do_settings_sections( 'plugin_options' ); ?>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Displayed on the left</th>
				<td><input type="checkbox" name="lienhe_trai" <?php if(get_option('lienhe_trai') != "" ) echo 'checked'; ?> value="1" />
				<br>
				<p class="description">Check to show the buttons in the left corner. Leaving blank will display the default in the right corner</p>
				</td>
				</tr>
			</table>
			<hr/>
			<h2>Customize the call button</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable on desktop</th>
				<td><input type="checkbox" name="phonedisable" <?php if(get_option('phonedisable') != "" ) echo 'checked'; ?> value="1" />
				<br>
				<p class="description">If checked, call now button will be hide on desktop</p>
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Phone number</th>
				<td><input type="text" name="phoneNumberpht" value="<?php echo esc_attr( get_option('phoneNumberpht') ); ?>" />
				<br>
				<p class="description">Leaving this field blank will not display a call icon right on the web page.</p>
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Call to action</th>
				<td><input type="text" name="textOnButtonpht" value="<?php echo esc_attr( get_option('textOnButtonpht') ); ?>" placeholder="Call now!" />
				<br>
				<p class="description">You can enter any text or phone number here. Example: <code>Call now!</code>, <code>0123456789</code></p>
				</td>
				</tr>
			</table>
			<hr />
			<!--<h2>Thiết lập TawkTo</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Tawkto Code</th>
				<td><textarea name="tawktocodepht" rows="5" cols="40"><?php echo esc_attr( get_option('tawktocodepht') ); ?></textarea>
				<br>
				<p class="description">Nhập toàn bộ code nhúng ứng dụng Tawkto vào đây. Để trống sẽ không hiển thị biểu tượng Tawkto trên website</p>
				</td>
				</tr>
			</table>
			<hr />-->
			<h2>Messenger setup</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Messenger</th>
				<td><input type="checkbox" name="fbdisable" <?php if(get_option('fbdisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Facebook ID</th>
				<td><input type="text" name="fanpageIDpht" value="<?php echo esc_attr( get_option('fanpageIDpht') ); ?>" />
				<br>
				<p class="description">Personal facebook page or facebook fanpage looks like: <code>facebook.com/xxxxx</code> - Please enter <code>xxxxx</code>.</p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="fanpagecaptpht" value="<?php echo esc_attr( get_option('fanpagecaptpht') ); ?>" placeholder="Facebook message" />
				<br>
				<p class="description">The caption is displayed next to the icon Messenger</p>
				</td>
				</tr>
			</table>
			<hr />
			<h2>Zalo setup</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Zalo</th>
				<td><input type="checkbox" name="zalodisable" <?php if(get_option('zalodisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Phone number Zalo</th>
				<td><input type="text" name="zaloPhonepht" value="<?php echo esc_attr( get_option('zaloPhonepht') ); ?>" />
				<br>
				<p class="description">Enter the phone number corresponding to the Zalo account used to contact the customer. For example: <code>0981797xxx</code></p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="zalocaptpht" value="<?php echo esc_attr( get_option('zalocaptpht') ); ?>" placeholder="Zalo Chat" />
				<br>
				<p class="description">The caption is displayed next to the icon Zalo</p>
				</td>
				</tr>
			</table>
			<hr />
			<h2>Skype setup</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Skype</th>
				<td><input type="checkbox" name="skypedisable" <?php if(get_option('skypedisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Skype ID</th>
				<td><input type="text" name="skypepht" value="<?php echo esc_attr( get_option('skypepht') ); ?>" />
				<br>
				<p class="description">Enter the Skype ID to associate with the Skype application. For example: <code>abc_123</code></p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="skypecaptpht" value="<?php echo esc_attr( get_option('skypecaptpht') ); ?>" placeholder="Skype chat" />
				<br>
				<p class="description">The caption is displayed next to the icon Skype</p>
				</td>
				</tr>
			</table>
			<hr />
			<h2>Viber setup</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Viber</th>
				<td><input type="checkbox" name="viberdisable" <?php if(get_option('viberdisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Phone number Viber</th>
				<td><input type="text" name="viberPhonepht" value="<?php echo esc_attr( get_option('viberPhonepht') ); ?>" />
				<br>
				<p class="description">Enter the phone number corresponding to the Viber account used to contact the customer. For example: <code>0981797xxx</code></p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="vibercaptpht" value="<?php echo esc_attr( get_option('vibercaptpht') ); ?>" placeholder="Viber chat" />
				<br>
				<p class="description">The caption is displayed next to the icon Viber</p>
				</td>
				</tr>
			</table>
			<hr />
			<h2>Email setup</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Email</th>
				<td><input type="checkbox" name="emaildisable" <?php if(get_option('emaildisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Email</th>
				<td><input type="text" name="emailpht" value="<?php echo esc_attr( get_option('emailpht') ); ?>" />
				<br>
				<p class="description">Enter email here to let customers proactively email you. For example: <code>abc@gmail.com</code> hoặc <code>ontact@xyz.com</code></p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="emailcaptpht" value="<?php echo esc_attr( get_option('emailcaptpht') ); ?>" placeholder="Send Mail" />
				<br>
				<p class="description">The caption is displayed next to the icon Email</p>
				</td>
				</tr>
			</table>
			<hr />
			<h2>Google Map setup</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Google Map</th>
				<td><input type="checkbox" name="mapdisable" <?php if(get_option('mapdisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Link Google Map</th>
				<td><input type="text" name="googlemap" value="<?php echo esc_attr( get_option('googlemap') ); ?>" />
				<br>
				<p class="description">Copy the entire map link here. For example: <code>https://goo.gl/maps/bG9mVizgyBAMiYkJA</code></p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="googlemapcapt" value="<?php echo esc_attr( get_option('googlemapcapt') ); ?>" placeholder="Google My Maps" />
				<br>
				<p class="description">The caption is displayed next to the icon Google Map</p>
				</td>
				</tr>
			</table>
			<hr />
			<h2>Leave us information</h2>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Disable Contact</th>
				<td><input type="checkbox" name="contactdisable" <?php if(get_option('contactdisable') != "" ) echo 'checked'; ?> value="1" />
				</td>
				</tr>
				<tr valign="top">
				<th scope="row">Shortcode Contact</th>
				<td><input type="text" name="contactFormpht" value="<?php echo esc_attr( get_option('contactFormpht') ); ?>" />
				<br>
				<p class="description">Enter the Shortcode of the contact form here. For example: <code>[contact-form-7 id="123" title="Contact"]<code></p>
				</td>
				</tr>
				<tr>
				<th scope="row">Caption</th>
				<td><input type="text" name="contactcaptpht" value="<?php echo esc_attr( get_option('contactcaptpht') ); ?>" placeholder="Leave us information" />
				<br>
				<p class="description">The caption is displayed next to the icon Contact us</p>
				</td>
				</tr>
			</table>
			<hr/>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Enter the embed code</th>
				<td><textarea name="manhungpht" rows="8" cols="60"><?php echo esc_attr( get_option('manhungpht') ); ?></textarea>
				<br>
				<p class="description">Enter the embed code here. For example: Google Analytics, verification tag, embed code css, js, script code, meta tags....</p>
				</td>
				</tr>
			</table>
			<hr/>
			<table class="form-table">
				<tr valign="top">
				<th scope="row">Hide caption?</th>
				<td><input type="checkbox" name="hienchuthich" <?php if(get_option('hienchuthich') != "" ) echo 'checked'; ?> value="1" />
				<br>
				<p class="description">If checked, the caption next to the icons zalo, fb, viber ... will be hidden</p>
				</td>
				</tr>
			</table>
			<?php submit_button(); ?>
<p class="description">See more installation instructions at: <a href="https://www.phamhuuthanh.com" target="_blank">hướng dẫn sử dụng Group Contact Buttons</a></p>
		</form>
		</div>
		<?php } 
	}
	// KHAI BAO CAC BIEN
	add_action('admin_init', 'pht_plugin_admin_init');
	if (!function_exists('pht_plugin_admin_init')) { 
		function pht_plugin_admin_init(){
			register_setting( 'plugin_options', 'phoneNumberpht', 'pht_only_number_validate' );
			register_setting( 'plugin_options', 'phonedisable');
			register_setting( 'plugin_options', 'textOnButtonpht');
			register_setting( 'plugin_options', 'tawktocodepht');
			register_setting( 'plugin_options', 'fanpageIDpht');
			register_setting( 'plugin_options', 'fbdisable');
			register_setting( 'plugin_options', 'fanpagecaptpht');
			register_setting( 'plugin_options', 'contactFormpht');
			register_setting( 'plugin_options', 'contactdisable');
			register_setting( 'plugin_options', 'contactcaptpht');
			register_setting( 'plugin_options', 'googlemap');
			register_setting( 'plugin_options', 'mapdisable');
			register_setting( 'plugin_options', 'googlemapcapt');
			register_setting( 'plugin_options', 'hienchuthich');
			register_setting( 'plugin_options', 'lienhe_trai');
			register_setting( 'plugin_options', 'zaloPhonepht', 'pht_only_number_validate' );
			register_setting( 'plugin_options', 'zalodisable');
			register_setting( 'plugin_options', 'zalocaptpht');
			register_setting( 'plugin_options', 'viberPhonepht', 'pht_only_number_validate' );
			register_setting( 'plugin_options', 'viberdisable');
			register_setting( 'plugin_options', 'vibercaptpht');
			register_setting( 'plugin_options', 'emailpht');
			register_setting( 'plugin_options', 'emaildisable');
			register_setting( 'plugin_options', 'emailcaptpht');
			register_setting( 'plugin_options', 'manhungpht');
			register_setting( 'plugin_options', 'skypepht');
			register_setting( 'plugin_options', 'skypedisable');
			register_setting( 'plugin_options', 'skypecaptpht');
		}
	}
	// validate our options
	if (!function_exists('pht_only_number_validate')) { 
		function pht_only_number_validate($input) {
			if( !preg_match( '/[^a-zA-Z]/', $input ) ){ // CHI CHO PHEP LA SO
				add_settings_error(
					'plugin_options',
					esc_attr( 'plugin_options' ), //becomes part of id attribute of error message
					__( 'Number must be a positive integer', 'wordpress' ), //default text zone
					'error'
				);
				$input = get_option( 'plugin_options' ); //keep old value
			}
		
			return $input;
			
		}
	}
	if (!function_exists('pht_only_text_validate')) { 
		// validate our options
		function pht_only_text_validate($input) {
			if( !preg_match( '/[^0-9]/', $input ) ){ // CHI CHO PHEP LA CHU
				add_settings_error(
					'plugin_options',
					esc_attr( 'plugin_options' ), //becomes part of id attribute of error message
					__( 'Number must be a positive integer', 'wordpress' ), //default text zone
					'error'
				);
				$input = get_option( 'plugin_options' ); //keep old value
			}
		
			return $input;
			
		}
	}
	// HIEN THI RA NGOAI WEBSITE
	add_action('template_redirect', 'pht_showRaNutDienthoai'); // template_redirect nghĩa la chỉ show ra trong template, ko show trong admin
	if (!function_exists('pht_showRaNutDienthoai')) { 
		function pht_showRaNutDienthoai(){
			// Them CSS vao Web
			wp_register_style( 'callNowpht',  plugin_dir_url( __FILE__ ) . 'css/callNow.css' );
			wp_enqueue_style( 'callNowpht' );
			add_action('wp_footer', 'pht_footerContent');
		}
	}
	if (!function_exists('pht_footerContent')) { 
		function pht_footerContent() {
			if (get_option('phonedisable') != "") {
				echo '<style> @media screen and (min-width: 800px) { .hotline-phone-ring-wrap {display: none;}} </style>';
			}
			
			if(get_option('phoneNumberpht') != "") {
				echo '<div onclick="window.location.href= \'tel:'.esc_attr( get_option('phoneNumberpht') ).'\'" class="hotline-phone-ring-wrap">
					<div class="hotline-phone-ring">
					<div class="hotline-phone-ring-circle"></div>
					<div class="hotline-phone-ring-circle-fill"></div>
					<div class="hotline-phone-ring-img-circle">
					<a href="tel:'.esc_attr( get_option('phoneNumberpht') ).'" class="pps-btn-img">
						<img src="'.plugin_dir_url( __FILE__ ) .'image/phone.png" alt="Gọi điện thoại" width="50">
					</a>
					</div>
				</div>
				<a href="tel:'.esc_attr( get_option('phoneNumberpht') ).'">
				<div class="hotline-bar">
						<a href="tel:'.esc_attr( get_option('phoneNumberpht') ).'">
						<span class="text-hotline">'.esc_attr( get_option('textOnButtonpht') ).'</span>
						</a>
				</div>
				</a>
			</div>';
			}
			
			//echo esc_attr( get_option('new_option_name') );
		}
	}
	/** SHOW TAWKTO **/
	add_action('template_redirect', 'pht_showRaTawkTo'); 
	if (!function_exists('pht_showRaTawkTo')) { 
		function pht_showRaTawkTo(){
			add_action('wp_footer', 'pht_tawktoFooter');
		}
	}
	if (!function_exists('pht_tawktoFooter')) { 
		function pht_tawktoFooter() {
			echo wp_specialchars_decode( get_option('tawktocodepht') );
		}
	}
	/** Thêm mã nhúng **/
	add_action('template_redirect', 'pht_Addmanhung'); 
	if (!function_exists('pht_Addmanhung')) { 
		function pht_Addmanhung(){
			add_action('wp_head', 'pht_manhungHeader');
		}
	}
	if (!function_exists('pht_manhungHeader')) { 
		function pht_manhungHeader() {
			echo wp_specialchars_decode( get_option('manhungpht') );
		}
	}
	/** HIEN THI CAC NUT **/
	add_action('template_redirect', 'pht_showRaCacNut'); 
	if (!function_exists('pht_showRaCacNut')) { 
		function pht_showRaCacNut(){
			wp_register_script( 'phtScript', plugin_dir_url( __FILE__ ) . 'main.js','','1.1', true );
			wp_enqueue_script( 'phtScript' );
				
			wp_register_style( 'floatingbutton',  plugin_dir_url( __FILE__ ) . 'css/style.css' );
			wp_enqueue_style( 'floatingbutton' );
			
			add_action('wp_footer', 'pht_codeCacNut');
		}
	}
	if (!function_exists('pht_codeCacNut')) {
		function pht_codeCacNut() {
			
		if(get_option('hienchuthich') != ""){
			echo '<style>.inner-fabs.show .fab::before {display: none;} </style>';
		}
		if(get_option('lienhe_trai') != ""){
			wp_register_style( 'floatingbutton-left',  plugin_dir_url( __FILE__ ) . 'css/style-left.css' );
			wp_enqueue_style( 'floatingbutton-left' );
		}
		if(get_option('lienhe_trai') == ""){
			wp_register_style( 'floatingbutton-right',  plugin_dir_url( __FILE__ ) . 'css/style-right.css' );
			wp_enqueue_style( 'floatingbutton-right' );
		}

			echo '<!-- Fab Buttons -->
		<div class="inner-fabs">';
		if(get_option('fanpageIDpht') != "" && get_option('fbdisable') == "") {
			echo '<a target="blank" href="https://m.me/'.esc_attr( get_option('fanpageIDpht') ).'" class="fab roundCool" id="activity-fab" data-tooltip="'.esc_attr( get_option('fanpagecaptpht') ).'">
			<img class="inner-fab-icon"  src="'.plugin_dir_url( __FILE__ ) .'image/messenger.png" alt="icons8-exercise-96" border="0">
		  </a>';
		}
		if(get_option('googlemap') != "" && get_option('mapdisable') == ""){
			echo '<a target="blank" href="'.wp_specialchars_decode( get_option('googlemap') ).'" class="fab roundCool" id="challenges-fab" data-tooltip="'.esc_attr( get_option('googlemapcapt') ).'">
			<img class="inner-fab-icon" src="'.plugin_dir_url( __FILE__ ) .'image/map.png" alt="challenges-icon" border="0">
		  </a>';
		}
		if(get_option('zaloPhonepht') != "" && get_option('zalodisable') == ""){
			echo '<a target="blank" href="https://zalo.me/'.esc_attr( get_option('zaloPhonepht') ).'" class="fab roundCool" id="chat-fab" data-tooltip="'.esc_attr( get_option('zalocaptpht') ).'">
			<img class="inner-fab-icon" src="'.plugin_dir_url( __FILE__ ) .'image/zalo.png" alt="chat-active-icon" border="0">
		  </a>';
		}
		if(get_option('viberPhonepht') != "" && get_option('viberdisable') == ""){
			echo '<a target="blank" href="viber://add?number='.esc_attr( get_option('viberPhonepht') ).'" class="fab roundCool" id="chat-fab" data-tooltip="'.esc_attr( get_option('vibercaptpht') ).'">
			<img class="inner-fab-icon" src="'.plugin_dir_url( __FILE__ ) .'image/viber.png" alt="chat-active-icon" border="0">
		  </a>';
		}
		if(get_option('skypepht') != "" && get_option('skypedisable') == ""){
			echo '<a target="blank" href="skype:'.esc_attr( get_option('skypepht') ).'?chat" class="fab roundCool" id="chat-fab" data-tooltip="'.esc_attr( get_option('skypecaptpht') ).'">
			<img class="inner-fab-icon" src="'.plugin_dir_url( __FILE__ ) .'image/skype.png" alt="chat-active-icon" border="0">
		  </a>';
		}
		if(get_option('emailpht') != "" && get_option('emaildisable') == ""){
			echo '<a target="blank" href="mailto:'.esc_attr( get_option('emailpht') ).'" class="fab roundCool" id="chat-fab" data-tooltip="'.esc_attr( get_option('emailcaptpht') ).'">
			<img class="inner-fab-icon" src="'.plugin_dir_url( __FILE__ ) .'image/email.png" alt="chat-active-icon" border="0">
		  </a>';
		}
		if(get_option('contactFormpht') != "" && get_option('contactdisable') == ""){
			echo '<div id="myBtnn" class="fab roundCool" id="ok" data-tooltip="'.esc_attr( get_option('contactcaptpht') ).'">
			<img class="inner-fab-icon" src="'.plugin_dir_url( __FILE__ ) .'image/support.png" alt="chat-active-icon" border="0">
		  </div>';
		}
		  
		echo '</div>
		<div class="fab roundCool contact-gr" id="main-fab">
		 <img class="img-circle" src="'.plugin_dir_url( __FILE__ ) .'image/contact.png" alt="" width="135"/>
		</div>';
		}
	
	}
	
	/** show nut de lai tu van **/
	add_action('template_redirect', 'pht_showRaNutTuvan');
	if (!function_exists('pht_showRaNutTuvan')) { 
		function pht_showRaNutTuvan(){
			// Them CSS vao Web
			wp_register_style( 'modal',  plugin_dir_url( __FILE__ ) . 'css/modal.css' );
			wp_enqueue_style( 'modal' );
			add_action('wp_footer', 'pht_footerNutTuvan');
		}
	}
	if (!function_exists('pht_footerNutTuvan')) {
		function pht_footerNutTuvan() {
			
			echo '
			<!-- The Modal -->
			<div id="myModal" class="modal">

			  <!-- Modal content -->
			  <div class="modal-content">
				<div class="modal-header">
				<span style="color: black;font-size: 22px;text-align: center;font-family: Roboto Condensed;">'.esc_attr( get_option('contactcaptpht') ).'</span>
				  <span onclick="closeModal()" class="close">&times;</span>
				  </div>
				 <BR />
				<div class="modal-body">';
				echo do_shortcode(wp_specialchars_decode( get_option('contactFormpht') ));
			echo '</div>
				<div class="modal-footer">
				</div>
			  </div>

			</div>';
			
			echo '<script>
			// Get the modal
			var modal = document.getElementById("myModal");

			// Get the button that opens the modal
			var btn = document.getElementById("myBtnn");

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks the button, open the modal 
			btn.onclick = function() {
			  modal.style.display = "block";
			}

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() {
			  modal.style.display = "none";
			}

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
			  if (event.target == modal) {
				modal.style.display = "none";
			  }
			}
			</script>';
			//echo esc_attr( get_option('new_option_name') );
		}
	}