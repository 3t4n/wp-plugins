<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://peprojects.nl
 * @since      1.0.0
 *
 * @package    Apostle_Social_Wall
 * @subpackage Apostle_Social_Wall/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Apostle_Social_Wall
 * @subpackage Apostle_Social_Wall/public
 * @author     Door PE Projects <info@peprojects.nl>
 */
class Apostle_Social_Wall_Public {

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

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apostle_Social_Wall_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apostle_Social_Wall_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apostle-social-wall-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apostle_Social_Wall_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apostle_Social_Wall_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apostle-social-wall-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'-masonry', plugin_dir_url( __FILE__ ) . 'js/apostle-social-wall-masonry.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * Add short code of 'social_wall' Post Type.
	 *
	 * @since    1.0.0
	 */
	public function apostle_social_wall_shortcode() {
		add_shortcode('ASW_RSS_Feed', array($this,'apostle_social_wall_shortcode_callback'));
	}
	/**
	 * Run feed url's feed
	 *
	 * @since    1.0.0
	 */
	public function apostle_social_wall_shortcode_callback($atts) {
		$post_ID  = $atts['id'];
		$feed_url = get_post_meta($post_ID, 'feed_url', true);
		$html     = "";
		if ($feed_url != "") {
			$xmlDoc = new DOMDocument();
			$xmlDoc->load($feed_url);
			$x = $xmlDoc->getElementsByTagName('item');
			$html .= "<div class='social_wall_div'>";
			for ($i = 0; $i < $x->length; $i++) {
				$item_title    = $x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
				$item_link     = $x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
				$item_desc     = $x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
				$pubDate       = $x->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
				$item_category = $x->item($i)->getElementsByTagName('category')->item(0)->childNodes->item(0)->nodeValue;
				$img           = $x->item($i)->getELementsByTagName('enclosure')->item(0)->getAttribute('url');
				$img           = $type = array();
				foreach ($x->item($i)->getELementsByTagName('enclosure') as $enclosure) {
					$img  = $enclosure->getAttribute('url');
					$type = $enclosure->getAttribute('type');
					if (isset($img) && $img != "" && ($type == "image/jpeg+attachment" || $type == "image/jpg+attachment" || $type == "image/png+attachment")) {
						$blog_thumbnail = "<img src='" . $img . "'>";
					} elseif (isset($img) && $img != "" && $type == "video/mp4+attachment") {
						$blog_thumbnail = '<video controls=""  name="media"><source src="' . $img . '?autoplay=0" type="video/mp4"></video>';
					}elseif (isset($img) && $img != "" && ($type == "image/jpeg+avatar" || $type == "image/jpg+avatar" || $type == "image/png+avatar")) {
						$avatar = $img;
					} else {
						$blog_thumbnail = '<img src="' . plugin_dir_url( __FILE__ ) . '/public/images/blog_default.png">';
					}
				}
				$date = "";
				if ($pubDate != "") {
					$date = date('d/m/Y', strtotime($pubDate));
				}
				if ($item_desc != "") {
					$item_desc = implode(' ', array_slice(explode(' ', $item_desc), 0, 30));
				}
				$html .= "
						<div class='rss_feed_column rss_feed_column_1_3 rss_feed'>
							<div class='blog_post_shortcode top case'>
								<div class='blog_thumbnail'><a  target='_blank' href='" . $item_link . "'>" . $blog_thumbnail . "</a></div>
								" . $img_echo . "
								<div class='rss_author_img'><img src='" . $avatar . "'></div>
								<div class='rss_title'><b><a target='_blank' href='" . $item_link . "'>" . $item_title . "</a></b> <span> on </span> <b>" . $item_category . "</b><br>" . $date . "</div>
								<div class='rss_desc'>" . $item_desc . "</div>
							</div>
						</div>";
			}
			$html .= "</div>";
		}
		return $html;
	}

}
