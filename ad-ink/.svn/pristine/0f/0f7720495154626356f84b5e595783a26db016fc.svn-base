<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ad.ink
 * @since      1.0.0
 *
 * @package    Ad_Ink
 * @subpackage Ad_Ink/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ad_Ink
 * @subpackage Ad_Ink/public
 * @author     Ad.Ink <contact@ad.ink>
 */
class Ad_Ink_Public
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	const ACTIVE_POST_TYPES_OPTION_NAME = 'ad-ink-post-types';
	const TAG_ID_OPTION_NAME = 'ad-ink-tag-id';
	const POSITION_OPTION_NAME = 'ad-ink-position';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function insert_automatic_tag()
	{
		$position = get_option(self::POSITION_OPTION_NAME, "automatic");
		if ($position === "automatic") {
			$tag = get_option(self::TAG_ID_OPTION_NAME, null);
			if ($tag !== null && in_array(get_post_type(), get_option(self::ACTIVE_POST_TYPES_OPTION_NAME, []))) {
?>
				<script async src="https://cdn.clap.ink/dist/adink.js?id=<?php echo $tag; ?>"></script>
			<?php
			}
		}
	}

	public function insert_manual_tag()
	{
		$position = get_option(self::POSITION_OPTION_NAME, "automatic");

		if ($position === "manual") {
			$tag = get_option(self::TAG_ID_OPTION_NAME, null);
			return '<script async src="https://cdn.clap.ink/dist/adink.js?id=' . $tag . '"></script>';
		}
	}
}
