<?php
if (!defined('ABSPATH')) { exit(); }

class ATEC_wpb_settings { function __construct($url,$nonce,$nav) {

global $atec_wpb_settings;

atec_little_block('Scheduled backups with WP cron');
atec_reg_inline_style('wpb_settings', '.form-table:nth-of-type(1), form h2:nth-of-type(1), .form-table:nth-of-type(2), form h2:nth-of-type(2) { display: block; }');

echo '
<div class="atec-g atec-g-50">
	<div class="atec-border-white">
		<form class="atec-form" method="post" action="options.php">
		<input type="hidden" name="atec_WPB_settings[path]" value="', esc_attr($atec_wpb_settings['path']??''), '">
		<input type="hidden" name="atec_WPB_settings[random]" value="', esc_attr($atec_wpb_settings['random']??''), '">';
		$slug = 'atec_WPB_options';
	  	settings_fields($slug); do_settings_sections($slug); submit_button('Save');
		echo '
		</form>
	</div>';
	
	echo '
	<div class="atec-border-white">
		<h4>Exclude rules</h4>
		<div class="atec-box-white">
			DB: Table names or part of names.<br>
			FILES/CONTENT: Relative paths only.<br><br>
			Multiple entries, separated by line break. No wildcards.<br>
			Comparison uses the „string-contains“ function.<br><br>
			If you run FILES & CONTENT backups on a schedule, it might be a good idea to exclude the „wp-content“ folder in the FILES backup.<br>
			A clean WordPress installation is ≈ 75 MB in size, including ≈ 17 MB for „wp-content“. 
		</div>
		<br>
		<h4>Manual trigger</h4>
		<div class="atec-btn-div atec-fit">
			<div class="tablenav">'; atec_nav_button($url,$nonce,'backupNow','Backup','Run manual backup now'); 	echo '</div>
		</div>
	</div>';
	
	echo '
</div>';

}}
?>