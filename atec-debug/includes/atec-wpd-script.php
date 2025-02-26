<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpd_script { function __construct($status,$url,$nonce) {		

$key='SCRIPT_DEBUG';

echo '
<div class="atec-btn-div">
	<div class="tablenav">';
		atec_checkbox_button_div(esc_attr($key),esc_attr($key),false,$status[$key],$url,'&action='.esc_attr($key).'&nav=Script&set='.($status[$key]?'false':'true'),$nonce);
		echo '<div style="padding-top: 2px;">'; atec_info_msg('SCRIPT_DEBUG forces WordPress to use the „dev” versions of core CSS and JavaScript files'); echo '</div>
	</div>
</div>';

}}
?>