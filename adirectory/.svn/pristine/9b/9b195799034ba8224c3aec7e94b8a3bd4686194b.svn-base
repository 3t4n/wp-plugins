<?php

use ADQS_Directory\Admin\Setting;

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

/**
 * Method adqs_templates_location
 *
 * @return string
 */
if (!function_exists('adqs_templates_location')) {

	function adqs_templates_location()
	{
		return apply_filters('adqs_templates_location', ADQS_DIRECTORY_DIR_PATH . 'templates/');
	}
}


if (!function_exists('adqs_get_directory_types_available')) {
	function adqs_get_directory_types_available()
	{
		$dir_types_obj  = get_terms(
			array(
				'taxonomy'   => 'adqs_listing_types',
				'hide_empty' => false,
			)
		);

		if (is_wp_error($dir_types_obj)) {
			return [];
		}

		$terms = array_map(function ($term) {
			return [
				"id" => $term->term_id,
				"name" => $term->name,
			];
		}, $dir_types_obj);

		return $terms;
	}
}


/**
 * Method adqs_listing_classes
 *
 * @param $classes $classes [explicite description]
 *
 * @return void
 */
if (!function_exists('adqs_listing_class')) {

	function adqs_listing_classes($classes = array())
	{
		echo esc_html(apply_filters('adqs_listing_classes', 'class="' . join(' ', $classes) . '"'));
	}
}

if (!function_exists('adqs_get_template_part')) {

	function adqs_get_template_part($slug, $name = null, $args = [])
	{
		// Trigger action before loading template part
		do_action("adqs_get_template_part_{$slug}", $slug, $name);

		// Create an array of template names to look for
		$templates = [];
		if ($name) {
			$templates[] = "{$slug}-{$name}.php";
		}
		$templates[] = "{$slug}.php";

		// Locate and load the template
		adqs_get_template_path($templates, true, false, $args);
	}
}

if (!function_exists('adqs_get_template_path')) {

	function adqs_get_template_path($template_names, $load = false, $require_once = true, $args = [])
	{
		$located = '';

		// Check if the template is overridden in the child theme or parent theme
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}

			// Check in the child theme
			$theme_file = get_stylesheet_directory() . '/adirectory/' . $template_name;
			if (file_exists($theme_file)) {
				$located = $theme_file;
				break;
			}

			// Check in the parent theme
			$theme_file = get_template_directory() . '/adirectory/' . $template_name;
			if (file_exists($theme_file)) {
				$located = $theme_file;
				break;
			}

			// Check in the plugin template directory
			$plugin_file = adqs_templates_location() . $template_name;
			if (file_exists($plugin_file)) {
				$located = $plugin_file;
				break;
			}
		}

		// Load the template if required
		if ($load && '' != $located) {
			load_template($located, $require_once, $args);
		}

		return $located;
	}
}



/**
 * Method adqs_get_directory_types
 *
 * @param $taxonomy
 *
 * @return void
 */
if (!function_exists('adqs_get_directory_types')) {
	function adqs_get_directory_types($taxonomy = 'adqs_listing_types', $hide_empty = false)
	{
		$directory_type = get_terms(
			array(
				'taxonomy'   => $taxonomy,
				'hide_empty' => $hide_empty,
			)
		);
		return $directory_type;
	}
} // end


/**
 * Method adqs_get_listing_fields
 *
 * @param $term_id
 *
 * @return void
 */
if (!function_exists('adqs_get_listing_fields')) {
	function adqs_get_listing_fields($term_id = 0)
	{
		$term_vals = get_term_meta($term_id, 'adqs_metafields_types', true);
		return $term_vals;
	}
}

/**
 * Method adqs_fetch_listing_default_image
 *
 * @param $termid
 *
 * @return string
 */
if (!function_exists('adqs_fetch_listing_default_image')) {

	function adqs_fetch_listing_default_image($termid)
	{
		$default_image = get_term_meta($termid, 'adqs_term_preview_img', true);
		return $default_image;
	}
}


/**
 * Method adqs_get_theme_slug_for_templates
 *
 * @return string
 */
if (!function_exists('adqs_get_theme_slug_for_templates')) {
	function adqs_get_theme_slug_for_templates()
	{
		return apply_filters('adqs_theme_slug_for_templates', get_option('template'));
	}
}


/**
 * Method adqs_get_current_page_url
 *
 * @param $query_arg $query_arg [explicite description]
 * @param $remove $remove [explicite description]
 *
 * @return string
 */
if (!function_exists('adqs_get_current_page_url')) {

	function adqs_get_current_page_url($query_arg = [], $remove = null)
	{
		global $wp;
		$querystring = $_SERVER['QUERY_STRING'] ?? [];
		wp_parse_str($querystring, $output);
		$queryArgs = wp_parse_args(array_filter($query_arg), $output);
		if (!empty($remove)) {
			return remove_query_arg($remove, add_query_arg($output, home_url($wp->request)));
		}
		if (!empty($query_arg)) {
			return add_query_arg($queryArgs, home_url($wp->request));
		}
		return home_url($wp->request);
	}
}

/**
 * Method adqs_get_base_page_url
 *
 * @param $url $url [explicite description]
 *
 * @return void
 */
if (!function_exists('adqs_get_base_page_url')) {

	function adqs_get_base_page_url($url = '')
	{

		// Parse the URL
		$parsed_url = parse_url($url);

		// Get the path part of the URL
		$path = $parsed_url['path'] ?? '';

		// Remove the pagination part if it exists
		$base_path = preg_replace('#/page/[^/]+/?$#', '', $path);

		// Rebuild the URL without the pagination part
		$base_url = ($parsed_url['scheme'] ?? '') . '://' . ($parsed_url['host'] ?? '') . $base_path;

		// Append the query string if it exists
		if (isset($parsed_url['query'])) {
			$base_url .= '?' . $parsed_url['query'];
		}

		return trailingslashit($base_url);
	}
}

/**
 * Method adqs_single_file_upload
 *
 * @param $file
 *
 * @return string
 */
if (!function_exists('adqs_single_file_upload')) {

	function adqs_single_file_upload($file)
	{
		$filename = sanitize_file_name($file['name']);
		$filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
		$trimfilename = ucwords(preg_replace('/[-_]/', ' ', $filenameWithoutExtension)); //
		$uniquename = wp_unique_filename(wp_upload_dir()['path'], $filename);
		$uploads = move_uploaded_file($file['tmp_name'], wp_upload_dir()['path'] . '/' . $uniquename);

		if ($uploads) {
			$file_url = wp_upload_dir()['url'] . '/' . $uniquename;
			return $file_url;
		}

		return  false;
	}
}

/**
 * Method adqs_get_setting_option
 *
 * @param $option_name
 * @param $default
 *
 * @return string|boolean|array
 */
if (!function_exists('adqs_get_setting_option')) {

	function adqs_get_setting_option($option_name = null, $default = '')
	{
		if (empty($option_name)) {
			return $default;
		}

		$getSetting = Setting::get_single_setting($option_name) ?? false;

		return !empty($getSetting) ? $getSetting : $default;
	}
}

/**
 * Method adqs_get_setting_currency
 *
 * @param $type
 *
 * @return string
 */
if (!function_exists('adqs_get_setting_currency')) {

	function adqs_get_setting_currency($type = 'code')
	{
		$getCurrency = adqs_get_setting_option('select_currency');

		if (empty($getCurrency) || strpos($getCurrency, '__') === false) {
			return '';
		}

		list($c_code, $c_symbol, $c_postion) = explode('__', $getCurrency);
		if ($type === 'symbol') {
			$c_symbol = !empty($c_symbol  ?? '') ? $c_symbol : '$';
			return apply_filters('adqs_currency_symbol', $c_symbol  ?? '');
		}
		if ($type === 'postion') {
			return apply_filters('adqs_currency_postion', $c_postion  ?? '');
		}

		return apply_filters('adqs_currency_code', $c_code ?? '');
	}
}

/**
 * Method adqs_get_price_ws
 *
 * @param $price
 *
 * @return string
 */
if (!function_exists('adqs_get_price_ws')) {

	function adqs_get_price_ws($price = '')
	{
		if (empty($price)) {
			return;
		}

		if (!empty($price)) {
			$price = number_format(floatval($price), 2, '.', '');
		}


		$symbol = adqs_get_setting_currency('symbol');
		if (adqs_get_setting_currency('postion') == 'after') {
			return "{$price}{$symbol}";
		}
		return "{$symbol}{$price}";
	}
}

/**
 * Method adqs_obj_to_arr
 *
 * @param $obj
 *
 * @return array
 */
if (!function_exists('adqs_obj_to_arr')) {

	function adqs_obj_to_arr($obj = null)
	{
		if (empty($obj)) {
			return false;
		}
		return json_decode(json_encode($obj), true);
	}
}

/**
 * Method get_default_preview_image
 *
 * @param $list_id
 * @param $size
 *
 * @return string
 */
if (!function_exists('get_default_preview_image')) {

	function get_default_preview_image($list_id = 0, $size = 'post-thumbnail')
	{
		$preview_image = get_the_post_thumbnail_url($list_id, $size);
		if (!empty($preview_image)) {
			return $preview_image;
		}
		return AD()->Helper->get_setting('default_preview_image');
	}
}

/**
 * Method adqs_get_permalink_by_key
 *
 * @param $pagekey $pagekey [explicite description]
 *
 * @return string
 */
if (!function_exists('adqs_get_permalink_by_key')) {

	function adqs_get_permalink_by_key($pagekey)
	{
		$pages = get_option('adqs_onboarding_pages', array());
		$permalink = get_permalink($pages[$pagekey] ?? '');
		return $permalink ?? '#';
	}
}

/**
 * Method add_preset_fields_lists
 *
 * @return array
 */
if (!function_exists('add_preset_fields_lists')) {

	function add_preset_fields_lists()
	{
		$presetField_list = apply_filters('add_preset_fields_lists', ['address', 'businesshour', 'fax', 'map', 'phone', 'pricing', 'tagline', 'video', 'view_count', 'website', 'zip', 'badges']);
		return array_unique($presetField_list);
	}
}

/**
 * Method g rchacha
 *
 * @return array
 */
if (!function_exists('add_grecaptcha_input_field')) {

	function add_grecaptcha_input_field()
	{
?>
		<div class="adqs-form-fields adqs-gRecaptcha-wrap">
			<div class="g-recaptcha" data-sitekey="<?php echo esc_attr(adqs_get_setting_option('reCAPTCHA_site_key')); ?>">
			</div>
		</div>
		<?php
	}
}

if (!function_exists('is_pricing_available')) {
	function is_pricing_available()
	{
		$plugins = get_option("active_plugins", []);
		$enable_pricing = get_option("adqs_enable_pricing", "0");
		$pricing_order = get_post_meta(isset($_GET['postid']) ? $_GET['postid'] : 0, 'adqs_pricing_order_no', true);

		if (empty($pricing_order) && isset($_GET['postid'])) {
			return false;
		}
		if (!in_array('ad-pricing-package/ad-pricing-package.php', $plugins) && !in_array('ad-wc-pricing-package/ad-wc-pricing-package.php', $plugins)) {
			return false;
		}
		return true;
	}
}

// convert slug terms id
if (!function_exists('adqs_covertTerm_slug_to_id')) {
	function adqs_covertTerm_slug_to_id($terms = '', $taxonomy = 'adqs_tags')
	{
		if (empty($terms)) {
			return $terms;
		}

		$terms_array = explode(',', $terms);

		$are_terms_numeric = array_reduce($terms_array, function ($carry, $tag) {
			return $carry && ctype_digit(trim($tag));
		}, true);


		if (!$are_terms_numeric) {
			$converted_terms = [];
			foreach ($terms_array as $t) {
				$t = trim($t);
				$term = get_term_by('slug', $t, $taxonomy);
				if ($term && !is_wp_error($term)) {
					$converted_terms[] = $term->term_id;
				}
			}

			$terms =  implode(',', array_filter($converted_terms));
		}
		return $terms;
	}
}

// render tax lists
if (!function_exists('adqs_render_tax_lists')) {
	function adqs_render_tax_lists($args = array(), $options = array())
	{

		$has_input     = $options['has_input'] ?? false;
		$has_name     = $options['has_name'] ?? true;
		$has_directory = $options['has_directory'] ?? false;
		$directory_id  = isset($options['directory_id']) ? absint($options['directory_id']) : 0;
		$has_children  = $options['has_children'] ?? true;
		$saved_data    = $options['saved_data'] ?? array();
		$display_count = $options['display_count'] ?? true;

		$default_args = array(
			'taxonomy'     => 'adqs_category',
			'hide_empty'   => false,
			'hierarchical' => true,
			'parent'       => 0
		);
		$args         = array_merge($default_args, $args);
		$terms        = get_terms($args);
		$taxonomy     = $args['taxonomy'] ?? 'adqs_category';
		if ($terms) {
			foreach ($terms as $term) {
				$value_type = (($options['value_type'] ?? '') == 'slug') ? $term->slug : $term->term_id;
				$directory_types = get_term_meta($term->term_id, 'listing_types', true);
				$directory_types = !empty($directory_types) ? array_map('intval', $directory_types) : array();
				$checked         = in_array($value_type, $saved_data) ? 'checked' : '';
				if ($has_directory ? in_array($directory_id, $directory_types, true) : true) :
					$child_terms = get_term_children($term->term_id, $taxonomy);


		?>
					<li id="<?php echo esc_attr($taxonomy); ?>-<?php echo esc_attr($term->term_id); ?>" class="<?php echo !empty($child_terms) ? 'has-children' : 'no-children'; ?>">
						<?php if (!empty($has_input)) : ?>
							<label class="adqs-checkbox">
								<input value="<?php echo esc_attr($value_type); ?>" type="checkbox"
									<?php if (!empty($has_name)): ?>
									name="tax_input[<?php echo esc_attr($taxonomy); ?>][]"
									<?php endif; ?>
									id="in-<?php echo esc_attr($taxonomy); ?>-<?php echo esc_attr($term->term_id); ?>" <?php echo !empty($checked) ? esc_attr($checked) : ''; ?>>
								<?php echo esc_html($term->name); ?>
							</label>
						<?php
						else :
							$icon = get_term_meta($term->term_id, 'adqs_category_icon_id', true);
							$icon = !empty($icon) ? "<i class='{$icon}'></i>" : '';
						?>
							<a href="<?php echo esc_url(get_term_link($term->term_id)); ?>">

								<span>
									<?php if (!empty($icon)) : ?>
										<span class="icon">
											<?php echo wp_kses_post($icon); ?>
										</span>
									<?php endif; ?>
									<span class="txt">
										<?php echo esc_html($term->name); ?>
									</span>
								</span>
								<?php if (!empty($display_count)) : ?>
									(<?php echo !empty($term->count) ? esc_html($term->count) : '0'; ?>)
								<?php endif; ?>
							</a>

						<?php endif; ?>
						<?php

						if (!empty($child_terms) && !empty($has_children)) :
						?>
							<ul class="children">

								<?php
								adqs_render_tax_lists(
									array(
										'taxonomy' => $taxonomy,
										'parent'   => $term->term_id,
									),
									$options
								);
								?>
							</ul>

						<?php endif; ?>
					</li>
<?php
				endif;
			}
		}
	}
}
