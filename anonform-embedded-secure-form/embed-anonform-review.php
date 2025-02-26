<?php
/**
 * Review and new install notices popup file.
 */

// register actions and hooks
register_activation_hook(ANONFORM_PLUGIN_PATH, 'anon_activation');
register_deactivation_hook(ANONFORM_PLUGIN_PATH, 'anon_deactivation');
add_action('admin_init', 'anon_check_installation_time');
add_action('admin_init', 'anon_spare_me', 5);
add_action('admin_enqueue_scripts', 'anon_embed_anonform_admin_styles');
add_action('admin_notices', 'anon_display_admin_activation_notice');

// add the CSS-lib
function anon_embed_anonform_admin_styles() {
	wp_enqueue_style('embed-anonform-css', plugin_dir_url(__FILE__).'css/embed-anonform-admin.css');
}

// add plugin activation
function anon_activation() {
	update_option('embed_anonform', array('version'=>ANONFORM_EMBEDDED_SECURE_FORM_VERSION, 'activation_time'=>strtotime("now"), 'no_disturb'=>FALSE));
	set_transient('embed_anonform_activated', true, 5);
}

// clean up on deactivation
function anon_deactivation() {
	delete_option('embed_anonform');
}

// check if review notice should be shown or not, reset if plugin is updated
function anon_check_installation_time() {
	$options = get_option('embed_anonform', array());
	if (empty($options['version']) || (!empty($options['version']) && $options['version'] !== ANONFORM_EMBEDDED_SECURE_FORM_VERSION)) {
		$options = array('version'=>ANONFORM_EMBEDDED_SECURE_FORM_VERSION, 'activation_time'=>strtotime("now"), 'no_disturb'=>FALSE);
		update_option('embed_anonform', $options);
		set_transient('embed_anonform_activated', true, 5);
	}
	if (!$options['no_disturb']) {
		$past_date = strtotime('-7 days');
		if (!$options['activation_time'] || $past_date >= $options['activation_time']) {
			add_action( 'admin_notices', 'anon_display_admin_notice' );
			add_action('admin_print_footer_scripts', 'anon_add_script');
		}
	}
}

// display admin notice on dashboard only asking for a review
function anon_display_admin_notice() {
	global $pagenow;
	if($pagenow == 'index.php') {
		$plugin_info = get_plugin_data(ANONFORM_PLUGIN_PATH, true, true);
		$reviewurl = esc_url('https://wordpress.org/support/plugin/'.sanitize_title($plugin_info['Name']).'/reviews/');
		$logo_url = esc_url(plugin_dir_url(ANONFORM_PLUGIN_PATH).'img/logo.png');
?>
<div class="anon-admin-notice">
	<div class="anon-admin-notice-content">
		<div class="anon-admin-notice-message">
			<div class="anon-col-12">
				<div class="anon-admin-notice-header" style="margin-right:15px;"><img width="100" src="<?php echo $logo_url ?>" alt=""></div>
				<p style="margin-top: 15px; margin-bottom:5px;"><?php echo wp_kses_post(sprintf(__('Hey, we at %1$s ANON::form %2$s would like to thank you for using our plugin. We would really appreciate if you could take a moment to drop a quick review that will inspire us to keep going.', 'anonform-embedded-secure-form' ), '<b>', '</b>')); ?></p>
			</div>
			<div class="anon-col-12">
				<div class="anon-flex" style="margin-top: 10px;">
					<button class="anon-button anon-button-review"><?php echo esc_html__('Review now', 'anonform-embedded-secure-form'); ?> &#9733;&#9733;&#9733;&#9733;&#9733;</button>
					<button class="anon-button anon-button-stop anon-button-outline-secondary"><?php echo esc_html__('Already Done!', 'anonform-embedded-secure-form'); ?></button>
				</div>
			</div>
		</div>
	</div>
	<div class="anon-admin-notice-close"><button type="button" aria-label="Close" class="anon-close anon-button-cancel"><span aria-hidden="true">×</span></button></div>
</div>
<?php
	}
}

// add js
function anon_add_script() {
	$review_url = 'https://wordpress.org/support/plugin/anonform-embedded-secure-form/reviews/?filter=5#new-post';
	$cancel_url = esc_url(get_admin_url().'?spare_me='.strtotime("now"));
	$stop_url = esc_url(get_admin_url().'?spare_me=1');
?>
<script type="text/javascript">
(function($) {
	$(document).on('click', '.anon-button-cancel', function(e){
		e.preventDefault();
		location.href="<?php echo esc_js($cancel_url); ?>";
	});
	$(document).on('click', '.anon-button-stop', function(e){
		e.preventDefault();
		location.href="<?php echo esc_js($stop_url); ?>";
	});
	$(document).on('click', '.anon-button-review', function(e){
		e.preventDefault();
		window.open('<?php echo esc_js($review_url); ?>');
		location.href="<?php echo esc_js($cancel_url); ?>";
	});
})(jQuery)
</script>
<?php
}

// display admin notice when plugin is activated
function anon_display_admin_activation_notice() {
	if (get_transient('embed_anonform_activated')){
		$logo_url = esc_url(plugin_dir_url(ANONFORM_PLUGIN_PATH).'img/logo.png');
?>
<div class="anon-admin-notice">
	<div class="anon-admin-notice-content">
		<div class="anon-admin-notice-message">
			<div class="anon-col-12">
				<div class="anon-admin-notice-header" style="margin-right:15px;"><img width="100" src="<?php echo $logo_url ?>" alt=""></div>
				<div id="anon-copy-content" style="margin-top: 15px; margin-bottom:5px;">
					<?php echo wp_kses_post(sprintf(__('%3$sHey, we at %1$sANON::form%2$s would like to thank you for using our plugin.%4$s%3$sHINT! Create a safe experience by telling your visitors that you use secure forms from ANON::form.%4$s%3$sText example above the form: %1$s "We protect our communication with secure forms, read more about this on the ANON::forms website.%2$s"%4$s%3$sPlease use the link: https://anonform.com/en/docs/compliant-with-gdpr-pci-dss-nist-hipaa/ (and please use "Open in new tab" checked and "Mark as nofollow" unchecked in the page/post editor when creating the link)%4$s', 'anonform-embedded-secure-form' ), '<b>', '</b>', '<p>', '</p>')); ?>
				</div>
			</div>
			<div class="anon-col-12">
				<div class="anon-flex" style="margin-top: 10px;">
					<button class="anon-button anon-button-copy"><?php echo esc_html__('Copy this text to clipboard', 'anonform-embedded-secure-form'); ?></button>
				</div>
			</div>
		</div>
	</div>
	<div class="anon-admin-notice-close"><button type="button" aria-label="Close" class="anon-close anon-button-cancel"><span aria-hidden="true">×</span></button></div>
</div>
<script type="text/javascript">
(function($) {
	$(document).on('click', '.anon-button-cancel', function(e){
		e.preventDefault();
		$(".anon-admin-notice").hide();
	});
	$(document).on('click', '.anon-button-copy', function(e){
		e.preventDefault();
		copyDivToClipboard();
	});
})(jQuery)
function copyDivToClipboard() {
	var range = document.createRange();
	range.selectNode(document.getElementById("anon-copy-content"));
	window.getSelection().removeAllRanges();
	window.getSelection().addRange(range);
	document.execCommand("copy");
	window.getSelection().removeAllRanges();
	alert("<?php echo esc_js(__('The text was copied', 'anonform-embedded-secure-form')); ?>");
}
</script>
<?php
	}
}

// remove the notice for the user if review already done or if the user does not want to
function anon_spare_me(){    
	if (isset($_GET['spare_me']) && !empty($_GET['spare_me'])) {
		$spare_me = intval($_GET['spare_me']);
		if ($spare_me == 1) {
			update_option('embed_anonform', array('version'=>ANONFORM_EMBEDDED_SECURE_FORM_VERSION, 'activation_time'=>FALSE, 'no_disturb'=>TRUE));
		} elseif($spare_me > 1) {
			update_option('embed_anonform', array('version'=>ANONFORM_EMBEDDED_SECURE_FORM_VERSION, 'activation_time'=>$spare_me, 'no_disturb'=>FALSE));
		}
	}
}

