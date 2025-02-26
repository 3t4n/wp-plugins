<?php
/**
 * Handles all Admin access functionality.
 */
class wdshare_PublicPages {

	var $data;

	function wdshare_PublicPages () { $this->__construct(); }

	function __construct () {
		$this->data = new wdshare_Options;
	}

	/**
	 * Main entry point.
	 *
	 * @static
	 */
	function serve () {
		$me = new wdshare_PublicPages;
		$me->add_hooks();
	}


	function js_load_scripts () {
		wp_enqueue_script('jquery');
		wp_enqueue_script('wdshare', wdshare_PLUGIN_URL . '/js/wdshare.js', array('jquery'));

		$horizontal_position = $this->data->get_option('horizontal_relative');
		$horizontal_position = $horizontal_position ? $horizontal_position : "page";

		$horizontal_direction = $this->data->get_option('horizontal_direction');
		$horizontal_direction = $horizontal_direction ? $horizontal_direction : "left";

		$top_position = $this->data->get_option('top_relative');
		$top_position = $top_position ? $top_position : "page-bottom";

		$zidx = $this->data->get_option('z-index');
		$zidx = $zidx ? $zidx : 10000000;
		printf(
			'<script type="text/javascript">
				var _wdshare_data = {
					"min_width": %d,
					"horizontal_selector": "%s",
					"top_selector": "%s",
					"z_index": %d,
					"allow_fixed": %d,
					"offset": {"htype": "%s", "hdir": "%s", "hoffset": %d, "vtype": "%s", "voffset": %d}
				};
			</script>',
			(int)$this->data->get_option('min_width'),
			$this->data->get_option('horizontal_selector'),
			$this->data->get_option('top_selector'),
			(int)$zidx,
			(int)$this->data->get_option('allow_fixed'),

			$horizontal_position,
			$horizontal_direction,
			(int)$this->data->get_option('horizontal_offset'),
			$top_position,
			(int)$this->data->get_option('top_offset')
		);
	}

	function css_load_styles () {
		if (!current_theme_supports('wdshare')) {
			wp_enqueue_style('wdshare', wdshare_PLUGIN_URL . '/css/wdshare.css');
		}
	}

	function inject_box_markup ($markup) {
		if (!is_singular()) return $markup;
		if (is_front_page()) return $markup;
		$style = '';

		$services = $this->data->get_option('services');
		$services = is_array($services) ? $services : array();

		$custom_services = $this->data->get_option('custom_services');

		$skip_script = $this->data->get_option('skip_script');
		$skip_script = is_array($skip_script) ? $skip_script : array();

		$background = $this->data->get_option('background');
		$style .= $background ? "background:{$background};" : '';

		$border = $this->data->get_option('border');
		$style .= $border ? "border:{$border};" : '';

		$css = $this->data->get_option('css');

		ob_start();
		include wdshare_PLUGIN_BASE_DIR . '/lib/forms/box_template.php';
		$box = ob_get_contents();
		ob_end_clean();
		$box = preg_replace("/\n|\r/", '', $box); // Don't trigger wpautop, if possible
		return preg_replace("/\s\s*/", ' ', $box) . $markup;
	}


	function add_hooks () {
		// Step0: Register options and menu
		add_action('wp_print_scripts', array($this, 'js_load_scripts'));
		add_action('wp_print_styles', array($this, 'css_load_styles'));

		add_filter('the_content', array($this, 'inject_box_markup'), 1); // Do this VERY early in content processing
	}
}