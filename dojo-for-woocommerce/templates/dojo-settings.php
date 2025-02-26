<?php

/**
 * Dojo for WooCommerce Template
 *
 * @package    Dojo_For_WooCommerce
 * @subpackage Dojo_For_WooCommerce/templates
 * @author     Dojo
 * @link       http://dojo.tech/
 */

/**
 * Exit if accessed directly
 */
if (!defined('ABSPATH')) {
	exit();
}

if (!empty($error_message)) {
	echo '<div class="notice notice-error"><p>' . esc_html($error_message) . '</p></div>';
}
echo '<div id="dojo_diagnostic_messages"></div>';
?>
<div style="margin-right: 20px;">
<svg width="146px" height="64px" viewBox="0 0 1092.72 299.31" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="max-width:146px;max-height: 64px;" reserveaspectratio="xMinYMin none">
	<title>Dojo</title>
	<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		<g id="Header" fill="#262626">
			<path d="M419.29,284.71c-74.42,0-134.97-60.55-134.97-134.97S344.87,14.77,419.29,14.77c74.42,0,134.97,60.55,134.97,134.97S493.71,284.71,419.29,284.71z M419.03,56.77c-51.31,0-93.06,41.75-93.06,93.06c0,51.31,41.75,93.06,93.06,93.06c51.31,0,93.06-41.75,93.06-93.06C512.09,98.52,470.35,56.77,419.03,56.77z M937.61,284.71c-74.42,0-134.97-60.55-134.97-134.97S863.18,14.77,937.61,14.77c74.42,0,134.97,60.55,134.97,134.97S1012.03,284.71,937.61,284.71z M937.35,56.77c-51.31,0-93.06,41.75-93.06,93.06c0,51.31,41.75,93.06,93.06,93.06c51.31,0,93.06-41.75,93.06-93.06C1030.41,98.52,988.66,56.77,937.35,56.77z M125.13,284.71H66.38c-25.5,0-46.24-20.74-46.24-46.24V61.01c0-25.5,20.74-46.24,46.24-46.24h58.75c74.42,0,134.97,60.55,134.97,134.97S199.55,284.71,125.13,284.71z M66.06,56.77c-2.21,0-4,1.79-4,4v178.12c0,2.21,1.79,4,4,4h57.87c51.23,0,93.74-40.91,94.24-92.14c0.5-51.73-41.44-93.98-93.05-93.98H66.06z M778.75,184.33L778.9,18.6c0-2.21-1.79-4-4-4h-34c-2.21,0-4,1.79-4,4l-0.15,165.92c0,32.49-26.68,58.87-59.29,58.37c-32.03-0.49-57.47-27.22-57.47-59.26v-29.98c0-2.21-1.79-4-4-4h-34c-2.21,0-4,1.79-4,4v29.57c0,55.39,44.4,101.16,99.79,101.48C733.4,285.03,778.75,239.88,778.75,184.33z" id="Combined-Shape-Copy-87"></path>
			</g>
		</g>
</svg>
</div>
<?php
echo '<h2>' . esc_html($title) . '</h2>';
echo wp_kses_post(wpautop($description));
?>
<table class="form-table">
	<?php $this_->generate_settings_html(); ?>
</table>
<script type="text/javascript">
	let dojo_plugin_version_text = document.createTextNode('<?php echo esc_html($plugin_version); ?>');
	let wrap_wc_divs = document.getElementsByClassName('wrap woocommerce');
	let wrap_wc_div = wrap_wc_divs[0];
	if (wrap_wc_div.tagName === 'DIV') {
		wrap_wc_div.appendChild(dojo_plugin_version_text);
	}
	if (typeof jQuery !== 'undefined') {
		jQuery(function() {
			jQuery.get(
				"<?php echo $admin_info_url; ?>", {},
				function(result) {
					jQuery.each(result, function(name, data) {
						if (data.hasOwnProperty("text") && data.hasOwnProperty("class")) {
							let div_id = "dojo_diagnostic_message_" + name;
							jQuery("<div>").attr("id", div_id).appendTo("#dojo_diagnostic_messages");
							jQuery("<p>").html(data.text).appendTo("#" + div_id);
							jQuery("#" + div_id).addClass(data.class);
						}
					});
				}
			);
		});
	} else {
		let err_text = document.createTextNode("jQuery not found. Please enable jQuery.");
		let err_para = document.createElement("p");
		let err_div = document.createElement("div");
		err_para.appendChild(err_text);
		err_div.appendChild(err_para);
		err_div.className = "<?php echo esc_html($this_::ERROR_CLASS_NAME); ?>";
		document.getElementById("dojo_diagnostic_messages").appendChild(err_div);
	}
</script>