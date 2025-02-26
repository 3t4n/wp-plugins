<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpd_repair { function __construct($status,$url,$nonce) {		

$key='WP_ALLOW_REPAIR';

echo '
<div class="atec-btn-div">
	<div class="tablenav">';
		if ($status[$key]) echo '<div class="alignleft"><a href="' . esc_url(admin_url( '/maint/repair.php' )) . '" target="_blank" class="atec-nodeco"><button class="button button-secondary">Run WP database repair</button></a></div>';
		atec_checkbox_button_div(esc_attr($key),esc_attr($key),false,$status[$key],$url,'&action='.esc_attr($key).'&nav=Repair&set='.($status[$key]?'false':'true'),$nonce);
		echo '<div style="padding-top: 2px;">'; atec_info_msg('Enables WordPress native script for repairing database tables'); echo '</div>
	</div>
</div>';

}}
?>