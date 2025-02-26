<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Quotes_Font
{
    private $fontFamily;
	private $fontClassName;
    private $fontPath;
    private $fontURL;
    
    function __construct($fontFamily)
	{
        $this->fontFamily           = $fontFamily;
		$this->fontClassName		= $this->get_font_class_name();
        $this->fontPath				= $this->get_font_path();
		$this->fontURL				= $this->get_font_url();
    }

	/**
	 * Calls Javascript Function to add style @font-face url to document
	 *
	 * @return string fontClassName
	 */
	public function add_font_style($widgetId = null) {
		$jsdata = array(
			'fontURL'		=> $this->fontURL,
			'fontClassName'	=> $this->fontClassName,
			'isCustomizer'	=> is_customize_preview(),
			'widgetId'		=> $widgetId
		);
		?>
			<script>
				var JSDATA = <?php echo wp_json_encode( $jsdata, JSON_HEX_TAG | JSON_HEX_AMP ) ?>;
				createStyleForFont(JSDATA.fontURL, JSDATA.fontClassName, JSDATA.isCustomizer, JSDATA.widgetId);
			</script>
		<?php

		return $this->fontClassName;
	}

	/**
	 * Return a "css classname" (the same name as the font filename)
	 *
	 * @return string	font_class_name
	 */
	private function get_font_class_name() {
		return $this->fontFamily['family_slug'] . "-"
			. $this->fontFamily['variant']['id'];
	}

	/**
	 * Returns the local directory structure to the file and filename.ttf
	 *
	 * @return string directory
	 */
	private function get_font_path() {
		return "fonts/"
		. $this->fontFamily['family_slug'] . "/"
		. $this->fontFamily['version'] . "/"
		. $this->fontClassName . "."
		. pathinfo($this->fontFamily['variant']['file'], PATHINFO_EXTENSION);
	}

    /**
	 * Returns the local URL to the Font
	 *
	 * @return string local url to font file
	 */
	private function get_font_url() {
		$font_local_path = QUOTES_DIR . $this->fontPath;
		if (!file_exists($font_local_path)) {

			if (is_customize_preview())
				return $this->get_font_google_url();

			// if directory doesn't exist – create it
			$font_local_directory = pathinfo($font_local_path, PATHINFO_DIRNAME);
			if (!file_exists($font_local_directory)) {
				wp_mkdir_p($font_local_directory);
			}
			
			$this->download_google_font();
		}
		return QUOTES_PLUGIN_URL . $this->fontPath;
	}

	/**
	 * Download the Google Font to a local Directory
	 *
	 * @return bool success
	 */
	private function download_google_font() {
		if ( !function_exists( 'download_url' ) ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
		}
		$tmpFile = download_url($this->get_font_google_url());
		$result = copy($tmpFile, QUOTES_DIR . $this->fontPath);
		wp_delete_file($tmpFile);
		return $result;
	}

	/**
	 * Returns the URL of the Font on Google Fonts
	 *
	 * @return string	url
	 */
	private function get_font_google_url() {
		return "https://fonts.gstatic.com/s/"
			. $this->fontFamily['family_slug'] . "/"
			. $this->fontFamily['version'] . "/"
			. $this->fontFamily['variant']['file'];
	}

}
