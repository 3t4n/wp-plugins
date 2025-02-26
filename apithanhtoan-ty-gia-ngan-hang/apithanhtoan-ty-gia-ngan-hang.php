<?php
/*
Plugin Name: Apithanhtoan Ty gia ngan hang
Plugin URI: http://wordpress.org/plugins/apithanhtoan-ty-gia-ngan-hang/
Description: [iframe src="https://apithanhtoan.com/iframe/ty-gia-ngan-hang" width="100%" height="600"] shortcode
Version: 1.0
Author: Apithanhtoan Team
Author URI: https://apithanhtoan.com
License: GPLv3
*/

if (!defined('ABSPATH')) { // Avoid direct calls to this file and prevent full path disclosure
	exit;
}

define('APITHANHTOAN_IFRAME_PLUGIN_VERSION', '1.0');


function apithanhtoan_ty_gia_ngan_hang_plugin_add_shortcode_callback($atts)
{

	$defaults = array(
		'src' => 'https://apithanhtoan.com/iframe/ty-gia-ngan-hang',
		'width' => '100%',
		'height' => '100%',
		'scrolling' => 'no',
		'class' => 'iframe-class',
		'frameborder' => '0'
	);

	foreach ($defaults as $default => $value) { // add defaults
		if (!@array_key_exists($default, $atts)) { // mute warning with "@" when no params at all
			$atts[$default] = $value;
		}
	}

	$html = "\n" . '<!-- iframe plugin v.' . APITHANHTOAN_IFRAME_PLUGIN_VERSION . ' wordpress.org/plugins/apithanhtoan-iframe-ty-gia-ngan-hang/ -->' . "\n";
	$html .= '<iframe';
	foreach ($atts as $attr => $value) {
		if (strtolower($attr) == 'src') { // sanitize url
			$value = esc_url($value);
		}
		if (
			strtolower($attr) != 'same_height_as' and strtolower($attr) != 'onload'
			and strtolower($attr) != 'onpageshow' and strtolower($attr) != 'onclick'
		) { // remove some attributes
			if ($value != '') { // adding all attributes
				$html .= ' ' . esc_attr($attr) . '="' . esc_attr($value) . '"';
			} else { // adding empty attributes
				$html .= ' ' . esc_attr($attr);
			}
		}
	}
	$html .= '></iframe>' . "\n";

	if (isset($atts["same_height_as"])) {
		$html .= '
			<script>
			document.addEventListener("DOMContentLoaded", function(){
				var target_element, iframe_element;
				iframe_element = document.querySelector("iframe.' . esc_attr($atts["class"]) . '");
				target_element = document.querySelector("' . esc_attr($atts["same_height_as"]) . '");
				iframe_element.style.height = target_element.offsetHeight + "px";
			});
			</script>
		';
	}

	return $html;
}

add_shortcode('iframe', 'apithanhtoan_ty_gia_ngan_hang_plugin_add_shortcode_callback');


function apithanhtoan_ty_gia_ngan_hang_plugin_row_meta_callback($links, $file)
{
	if ($file == plugin_basename(__FILE__)) {
		$row_meta = array(
			'support' => '<a href="https://apithanhtoan.com" target="_blank">' . __('Iframe', 'iframe') . '</a>',
			'donate' => '<a href="https://apithanhtoan.com" target="_blank">' . __('Donate', 'iframe') . '</a>'
		);
		$links = array_merge($links, $row_meta);
	}
	return (array) $links;
}

add_filter('plugin_row_meta', 'apithanhtoan_ty_gia_ngan_hang_plugin_row_meta_callback', 10, 2);

// Define folder include img
define('API_THANH_TOAN_URL', plugin_dir_url(__FILE__));
define('API_THANH_TOAN_IMGURL', API_THANH_TOAN_URL . 'img');

add_action('media_buttons', function ($editor_id) {
	echo '<select title="Bước 1: Chọn ngân hàng" class="button" id="select-bank-apithanhtoan" style="max-width: 200px;">';
	echo '	<option value="">B1: Chọn Ngân hàng - Tất cả </option>';
	echo '	<option value="BFTV">Ngân hàng TMCP Ngoại Thương Việt Nam (VIETCOMBANK) - Vietcombank</option> ';
	echo '	<option value="VTCB">TMCP Kỹ thương Việt Nam - Techcombank</option> ';
	echo '	<option value="BIDV">Đầu tư và Phát triển Việt Nam - BIDV</option> ';
	echo '	<option value="VBAA">Nông nghiệp và Phát triển Nông thôn Việt Nam - AGRIBANK</option> ';
	echo '	<option value="ICBV">TMCP Công Thương Việt Nam - VIETINBANK</option> ';
	echo '	<option value="VPBK">TMCP Việt Nam Thịnh Vượng - VP BANK</option> ';
	echo '	<option value="SGTT">TMCP Sài Gòn Thương Tín - SACOMBANK</option> ';
	echo '	<option value="ASCB">TMCP Á Châu - ACB</option> ';
	echo '	<option value="MSCB">TMCP Quân Đội - MB</option> ';
	echo '	<option value="EACB">TMCP Đông Á - DongA Bank - DONG A BANK</option> ';
	echo '	<option value="TPBV">TMCP Tiên Phong - TIEN PHONG</option> ';
	echo '	<option value="LVBK">TMCP Bưu điện Liên Việt - LIEN VIET POST</option> ';
	echo '	<option value="VNIB">TMCP Quốc tế Việt Nam - VIB</option> ';
	echo '	<option value="VNTT">TMCP Việt Nam Thương Tín - VIETBANK</option> ';
	echo '	<option value="ABBK">TMCP An Bình - ABBANK</option> ';
	echo '	<option value="EBVI">TMCP Xuất Nhập khẩu Việt Nam - EXIMBANK</option> ';
	echo '	<option value="NASC">NGÂN HÀNG TMCP BẮC Á - BAC A</option> ';
	echo '	<option value="VCBC">TMCP Bản Việt - VIET CAPITAL</option> ';
	echo '	<option value="BVBV">TMCP Bảo Việt - BAOVIET Bank - BAO VIET</option> ';
	echo '	<option value="CIBB">Ngân hàng CIMB Việt Nam - CIMB</option> ';
	echo '	<option value="WBVN">TMCP Đại Chúng Việt Nam - PVCOMBANK</option> ';
	echo '	<option value="OJBA">TM TNHH MTV Đại Dương - OCEANBANK</option> ';
	echo '	<option value="GBNK">TM TNHH MTV Dầu Khí Toàn Cầu - GPBANK</option> ';
	echo '	<option value="SEAV">TMCP Đông Nam Á - SEABANK</option> ';
	echo '	<option value="MCOB">TMCP Hàng Hải Việt Nam - MARITIME</option> ';
	echo '	<option value="HLBB">Hong Leong Việt Nam - HONG LEONG VN</option> ';
	echo '	<option value="IABB">TNHH Indovina - INDOVINA</option> ';
	echo '	<option value="IBKO">Industrial Bank of Korea - INDUSTRIAL BANK OF KOREA</option> ';
	echo '	<option value="KLBK">TMCP Kiên Long - KIEN LONG</option> ';
	echo '	<option value="VRB">Liên doanh Việt - Nga - VRB</option> ';
	echo '	<option value="NAMA">TMCP Nam Á - NAM A</option> ';
	echo '	<option value="GTBA">TNHH MTV Xây dựng Việt Nam - CBBank</option> ';
	echo '	<option value="NACF">Nonghyup - Chi nhánh Hà Nội (NHB - Chi nhánh Hà Nội) - Nonghyup</option> ';
	echo '	<option value="HDBC">TMCP Phát triển Nhà TP. Hồ Chí Minh - HD BANK</option> ';
	echo '	<option value="ORCO">TMCP Phương Đông - OCB</option> ';
	echo '	<option value="VIDP">TNHH MTV Public Việt Nam - PUBLIC BANK VN</option> ';
	echo '	<option value="NVBA">TMCP Quốc Dân - NCB</option> ';
	echo '	<option value="SACL">TMCP Sài Gòn - SCB</option> ';
	echo '	<option value="SHBA">TMCP Sài Gòn - Hà Nội - SHB</option> ';
	echo '	<option value="SBIT">TMCP Sài Gòn Công Thương - SAIGONBANK</option> ';
	echo '	<option value="SHBK">SHINHAN Bank (Vietnam)  - SHINHAN VN</option> ';
	echo '	<option value="HSBC">HSBC Việt Nam - HSBC</option> ';
	echo '	<option value="SCBL">TNHH MTV Standard Chartered Việt Nam (SCVN) - SCVN</option> ';
	echo '	<option value="UOVB">UOB Việt Nam - UOB VN</option> ';
	echo '	<option value="VNAC">TMCP Việt Á - VIET A</option> ';
	echo '	<option value="HVBK">Ngân hàng Woori Việt Nam - WOORI BANK VIET NAM</option> ';
	echo '	<option value="PGBL">TMCP Xăng dầu Petrolimex - PGBANK</option> ';
	echo '</select>';
});

// Add button "Add iframe"
add_action('media_buttons', function ($editor_id) {
	echo '<a title="Insert API-thanh-toan iFrame" class="button" id="insert-iframe-apithanhtoan-button" href="#">';
	echo '	<img style="padding-bottom:3px;" src="' . API_THANH_TOAN_IMGURL . '/apithanhtoan-icon.png" />';
	echo '	B2: Thêm Tỷ giá ngân hàng';
	echo '</a>';
});


// Declare script for button add iframe
function addScriptApithanhtoan()
{
	wp_enqueue_script('my_custom_script', plugin_dir_url(__FILE__) . '/js/apithanhtoan.js');
}
add_action('admin_enqueue_scripts', 'addScriptApithanhtoan');
