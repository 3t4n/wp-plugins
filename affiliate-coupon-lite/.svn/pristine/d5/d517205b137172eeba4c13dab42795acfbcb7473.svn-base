<?php
/**
 * Helper Functions
 *
 * Package  AffiliateCoupon\Custom\Helpers;
 * @since   1.0.0
 * @author  Mission 14
 * @link    https://couponplugin.co
 * @license GNU General Public License 2.0+
 */

namespace AffiliateCoupon\Custom\Helpers;

/**
 * Actions..
 */
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\admin_enqueue_scripts');
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts');
add_action('manage_coupon_posts_custom_column', __NAMESPACE__ . '\cp_column_content', 10, 2);
add_action('wp_footer', __NAMESPACE__ . '\coupon_click', 100);
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\cp_enqueue_inline_styles');
add_action('cp_code_box', __NAMESPACE__ . '\cp_function_code_box', 10, 7);

/**
 * Filters..
 */
if (!function_exists('CouponPluginPro\affiliate_coupon_lite_pro_init')) {
	add_filter('plugin_action_links_' . AFFILIATE_COUPON_LITE_BASENAME, __NAMESPACE__ . '\upgrade_add_action_links');
	add_action('admin_notices', __NAMESPACE__ . '\cp_admin_notices');
}
add_filter('enter_title_here', __NAMESPACE__ . '\change_coupon_title_text');
add_filter('manage_coupon_posts_columns', __NAMESPACE__ . '\cp_column_heading');

/**
 * Activation Hook
 */
register_activation_hook(AFFILIATE_COUPON, __NAMESPACE__ . '\activation_hook');


/**
 * Enqueue The Admin Scripts Required For Coupon Plugin
 *
 * @since 1.0.0
 *
 * @param string $hook wordpress page part like post-edit.php etc.
 *
 * @return void
 */
function admin_enqueue_scripts($hook)
{
	if ($hook == 'term.php') {
		wp_enqueue_media();
		wp_enqueue_script('coupon-term-js', AFFILIATE_COUPON_LITE_URL . 'assets/js/term-uploader-min.js', array(
			'jquery'
		), '1.0.0', true);
	}
	if ($hook == 'coupon_page_coupon-plugin-setting') {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style(
			'coupon-plugin-admin-css',
			AFFILIATE_COUPON_LITE_URL . 'assets/css/coupon-plugin-admin-min.css'
		);
		add_action('admin_footer', __NAMESPACE__ . '\colors_print_scripts');
	}
	if ($hook != 'post-new.php' && $hook != 'post.php') {
		return;
	}

	wp_enqueue_style('jquery-ui-datepicker-css', AFFILIATE_COUPON_LITE_URL . 'assets/css/jquery-ui.min.css', array(), '1.0.0');
	wp_enqueue_style('coupon-plugin-expiry-css', AFFILIATE_COUPON_LITE_URL . 'assets/css/jquery-datetimepicker-min.css', array(), '1.0.0');
	wp_enqueue_script('coupon-plugin-expiry-js', AFFILIATE_COUPON_LITE_URL . 'assets/js/jquery-ui-timepicker-addon.min-min.js', array(
		'jquery',
		'jquery-ui-core',
		'jquery-ui-datepicker'
	), '1.0.0', true);
}


/**
 * Enqueue The FrontEnd Scripts Required For Coupon Plugin
 *
 * @since 1.0.0
 *
 * @param void
 *
 * @return void
 */
function enqueue_scripts()
{
	wp_enqueue_script('dashicons');
	wp_register_style(
		'couponplugin-css',
		AFFILIATE_COUPON_LITE_URL . 'assets/css/coupon-plugin-min.css',
		array(),
		'1.0.0'
	);
	wp_enqueue_style('couponplugin-css');
	wp_register_script(
		'couponplugin-js',
		AFFILIATE_COUPON_LITE_URL . 'assets/js/coupon-plugin-min.js',
		array('jquery'),
		'1.0.0',
		true
	);
}


/**
 * Shortcode Name Genertor For Coupon Admin Panel
 *
 * @since 1.0.0
 *
 * @param array $defaults column names
 *
 * @return array merge array with new data
 */
function cp_column_heading($defaults)
{
	$defaults['single_coupon_shortcode'] = __('Shortcode', 'affiliate-coupon-lite');
	$defaults['single_coupon_image']     = __('Coupon Store Image', 'affiliate-coupon-lite');

	return $defaults;
}

/**
 * Shortcode Content Genertor For Coupon Admin Panel
 *
 * @since 1.0.0
 *
 * @param string $column_name column name
 * @param string $post_ID the id of the current post
 *
 * @return void
 */
function cp_column_content($column_name, $post_ID)
{
	switch ($column_name) {
		case 'single_coupon_shortcode':
			echo '[couponplugin id="' . esc_html($post_ID) . '" h="h2"]<br/><strong>' . __("You can use any of the h1, h2, h3, h4 etc", 'affiliate-coupon-lite') . '</strong>';
			break;

		case 'single_coupon_image':
			$stores = get_the_terms($post_ID, 'coupon-store');
			if ($stores) {
				$store         = $stores[0];
				$store_img_url = get_term_meta($store->term_id, 'cp_store_image', true);
				echo '<img src="' . esc_url($store_img_url) . '" style="width:100px; border: solid 1px #efefef;">';
			}
			break;
	}
}


/**
 * Coupon Title Placeholder
 *
 * @since 1.0.0
 *
 * @param string $input placeholder text
 *
 *
 * @return string placeholder text
 */
function change_coupon_title_text($input)
{
	if (!(is_admin() && 'coupon' === get_post_type())) {
		return $input;
	}

	return __('Enter The Coupon Title', 'affiliate-coupon-lite');
}

/**
 * Setting Page Color Picker
 *
 * @since 1.0.0
 *
 *
 * @return void
 */
function colors_print_scripts()
{
	echo '<script type="text/javascript">
        	jQuery( document ).ready( function( $ ) {
            $( ".cp-color-field").wpColorPicker();
        	} );
    	 </script>';
}

/**
 * Coupon Click Behaviour
 *
 * @since 1.0.0
 *
 * @return void
 */
function coupon_click()
{
	if (!isset($_GET['cid'])) {
		return;
	}
	$id = sanitize_key(intval($_GET['cid']));
	?>
	<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery("#cp-hide-<?php echo esc_attr($id); ?>").hide();
			jQuery("#cp-deal-<?php echo esc_attr($id); ?>").css('position', 'unset').css('display', 'block').css('text-align', 'center').css('font-size', '12px');
			jQuery("#cp-code-<?php echo esc_attr($id); ?>").css('position', 'unset').css('display', 'block').css('text-align', 'center');
		});
	</script>
<?php
}

/**
 * Upgrade Link
 *
 * @since 1.0.0
 *
 * @param array $links
 *
 * @return array merged links
 */
function upgrade_add_action_links($links)
{
	$mylinks = array(
		'<a target="_blank" style="color:#3db634; font-weight: bold;" href="https://couponplugin.co/?utm_source=plugin-list&utm_medium=upgrade-link&utm_campaign=plugin-list&utm_content=action-link">Upgrade</a>',
	);

	return array_merge($links, $mylinks);
}

/**
 * On Activation Show Notice Once
 *
 * @since 1.0.0
 *
 *
 * @return void
 */
function activation_hook()
{
	set_transient('cp_admin_notice', true, 3600);
	$options = array(
		'coupon_hover_text'   => __('SHOW COUPON', 'affiliate-coupon-lite'),
		'expiry_msg'          => __('Expired On', 'affiliate-coupon-lite'),
		'expiry_no_msg'       => __('On Going Offer', 'affiliate-coupon-lite'),
		'deal_hover_text'     => __('ACTIVATE DEAL', 'affiliate-coupon-lite'),
		'deal_activated_text' => __('DEAL ACTIVATED', 'affiliate-coupon-lite'),
		'coupon_btn_color'        => '#741fa2',
		'coupon_code_bg_color'    => '#741fa2',
		'deal_button_color'       => '#741fa2',
		'deal_button_hover_color' => '#9726d4',
		'deal_activated_bg_color' => '#9726d4',
	);
	update_option('affiliate_coupon_lite_settings', $options);
}

/**
 * Dissmissible Notice
 *
 * @since 1.0.0
 *
 * @return void
 */
function cp_admin_notices()
{
	if (get_transient('cp_admin_notice')) {
		?>
		<div class="updated notice is-dismissible">
			<p style="text-align: center;"><?php _e('Check Coupon Plugin', 'affiliate-coupon-lite'); ?>
				<b><?php _e(' Pro Version', 'affiliate-coupon-lite'); ?></b>
				<?php _e('Features', 'affiliate-coupon-lite'); ?>
				<a href="<?php echo esc_url(admin_url('edit.php?post_type=coupon&page=coupon-plugin-setting&tab=pro_settings')); ?>">
					<?php _e('Here', 'affiliate-coupon-lite'); ?></a></p>
		</div>
		<?php
		delete_transient('cp_admin_notice');
	}
}

/**
 * Change Coupon Buttons Colors through setting
 *
 * @since 1.0.0
 *
 *
 * @return void
 */
function cp_enqueue_inline_styles()
{
	$css                        = '';
	$option                     = get_option('affiliate_coupon_lite_settings');
	$color                      = array();
	$color['code_button']       = $option['coupon_btn_color'];
	$color['code_bg']           = $option['coupon_code_bg_color'];
	$color['deal_button']       = $option['deal_button_color'];
	$color['deal_button_hover'] = $option['deal_button_hover_color'];
	$color['deal_bg']           = $option['deal_activated_bg_color'];
	if ($color['code_button']) {
		$css .= '
			#coupon-plugin .coupon-reveal { background:' . $color['code_button'] . ';}
		';
	}
	if ($color['code_bg']) {
		$css .= '
			#coupon-plugin .coupon-code  { background:' . $color['code_bg'] . ';}
		';
	}
	if ($color['deal_button']) {
		$css .= '
			#coupon-plugin .coupon-reveal.deal-top   { background:' . $color['deal_button'] . ';}
		';
	}
	if ($color['deal_bg']) {
		$css .= '
			#coupon-plugin .coupon-code.deal-top   { background:' . $color['deal_bg'] . ';}
		';
	}
	if ($color['deal_button_hover']) {
		$css .= '
			#coupon-plugin .coupon-reveal.deal-top:hover   { background:' . $color['deal_button_hover'] . ';}
		';
	}
	if (!empty($css)) {
		wp_add_inline_style('couponplugin-css', $css);
	}
}

/**
 * Coupon Button Creation
 *
 * @since 1.0.0
 *
 *
 * @return void
 */
function cp_function_code_box($id, $code, $affiliatelink, $coupon_button_text, $deal_class, $deal_activated_text, $deal_button_text)
{
	if ($code) {
		printf('<span id="cp-code-%d">%s</span>', $id, $code);
		printf('<div id="cp-hide-%d" class="coupon-reveal coupon-click" data-id="%d"
             data-link="%s">%s</div>', $id, $id, $affiliatelink, $coupon_button_text);
	} else {
		printf('<span id="cp-deal-%d" style="display: none;">%s</span>', $id, $deal_activated_text);
		printf('<div id="cp-hide-%d" class="coupon-reveal%s deal-reveal" data-id="%d"
             data-link="%s">%s</div>', $id, $deal_class, $id, $affiliatelink, $deal_button_text);
	}
}
