<?php

add_action('wp_ajax_lsnh_summit_profile', 'lsnh_handle_submit_profile');
add_action('wp_ajax_nopriv_lsnh_summit_profile', 'lsnh_handle_submit_profile');

function lsnh_handle_submit_profile(){
	$user_name = isset($_POST['user_name']) ? sanitize_text_field($_POST['user_name']) : '';
	
	$user_phone = isset($_POST['user_phone']) ? sanitize_text_field($_POST['user_phone']) : '';
	$user_email = isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
	
	if(!$user_name || !$user_phone || !$user_email){
		echo "Vui lòng nhập đầy đủ thông tin!";
		die();
	}
	//update_option('lsnh_profiles', '');
	$db = get_option('lsnh_profiles');
	if(!$db){
		$db = array();
	}

	$db[]= array($user_name, $user_phone, $user_email);
	update_option('lsnh_profiles', $db);

	$to = get_option('admin_email');
	$subject = 'Khách Để Lại Thông Tin Trên Công Cụ Tính Lãi - ' . home_url();
	$body = "Thông tin gồm: <br>Họ tên: $user_name <br>Số ĐT: $user_phone <br>Email: $user_email";
	//thong tin khach vay bao nhieu proo

	$headers = array('Content-Type: text/html; charset=UTF-8');
	 
	wp_mail( $to, $subject, $body, $headers );

	echo 1; die();
	
}


add_action('admin_menu', 'lsnh_register_settings_page');
add_action('admin_init', 'lsnh_options_init');

function lsnh_options_init() {
	register_setting('lsnh_options','lsnh_settings');
}
function lsnh_update_options(){
	global $lsnh_settings;
	update_option('lsnh_settings', $lsnh_settings);
}

function lsnh_get_options(){
	$default_options = array(
							  'tieu_de_chuc_mung' => 'Chúc mừng Anh/Chị sở hữu nhà ở đẹp với:',
							  'tieu_de_tren_bang_chi_tiet' => 'Thời gian và số tiền bắt đầu thanh toán:',
							);

	if(!get_option('lsnh_settings')) { // Doesn't exist -> set defaults
		
		add_option('lsnh_settings',$default_options);
	}

	$options =  get_option('lsnh_settings');
	return array_merge($default_options, $options);
}

function lsnh_register_settings_page() {

	$page = add_submenu_page('options-general.php', LSNH_PLUGIN_TITLE, LSNH_PLUGIN_TITLE, 'manage_options', 'lsnh', 'lsnh_settings_page');
	//add_action( 'admin_print_styles-' . $page , 'cnb_admin_styling' );
}

function lsnh_settings_page() { 
	if(!current_user_can('administrator')){
		echo "you can not access this page!";
		return;
	}

	global $lsnh_settings;
	
	//wp_enqueue_script('wp-color-picker');
	//wp_enqueue_style('wp-color-picker');

	lsnh_config_tab();

	

}


function lsnh_config_tab(){
	global $lsnh_settings;
	
	$db = get_option('lsnh_profiles');

	?>
	<h1><?php echo LSNH_PLUGIN_TITLE; ?> <span class="version">v<?php echo LSNH_VERSION;?></span></h1>
		
	
	<?php //lsnh_display_table_csv($db); ?>

	<form method="post" action="options.php" class="lsnh-container" >
		<?php settings_fields('lsnh_options'); ?>
		
		<table class="form-table" >
	    	<tr valign="top">
				<th scope="row">Tiêu đề chúc mừng</th>
		    	<td >
		        	<input  name="lsnh_settings[tieu_de_chuc_mung]" type="text" value="<?php echo $lsnh_settings['tieu_de_chuc_mung']; ?>" />
		        	
		        </td>
		    </tr>
		    <tr valign="top">
				<th scope="row">Tiêu đề trên bảng lãi suất</th>
		    	<td >
		        	<input  name="lsnh_settings[tieu_de_tren_bang_chi_tiet]" type="text" value="<?php echo $lsnh_settings['tieu_de_tren_bang_chi_tiet']; ?>" />
		        	
		        </td>
		    </tr>
			
			
		</table>
		<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>

		

		
	</form>

	
	<?php
}

function lsnh_display_table_csv($data){
	
	if(is_array($data) && count($data) > 0){
		echo "<div class='csv-table'><table class='wp-list-table fixed striped posts'>";
		
		

		echo "<tr><th>Họ Tên</th><th>Số Điện Thoại</th><th>Email</th></tr>";
		for ($i=0; $i < count($data); $i++) { 
			$body = $data[$i];
			
			echo "<tr>";
			foreach ($body as $item) {
				echo "<td>$item</td>";
			}
			echo "</tr>";
		}
		echo '</table></div>';
	}else{
		echo "table not exist!";
	}
}