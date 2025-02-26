<?php

class Inceptive500pxImageShowcaseShortcode {
	
	/* -------------------------------------------------- */
	/* Constructor
	/*-------------------------------------------------- */

	private $consumerKey_500px;
	
	private $height;
	private $width;
	private $feature;
	private $username;
	private $num;
	private $tag;
	private $term;
	
	private $caption;
	private $post_or_page;

	public function __construct($consumerKey) {

		$this->consumerKey_500px = $consumerKey;

		// Gallery shortcode
		add_action('init', array(&$this, 'register_inceptive_500px_image_showcase_shortcode'));
	}

// end constructor


	/* -------------------------------------------------- */
	/* Shortcode Functions
	  /*-------------------------------------------------- */

	/**
	 * Creates the shortcode
	 */
	function inceptive_500px_image_showcase_shortcode($atts) {
		
		$this->width = (isset($atts['width'])) ? $atts['width'] : 600;
		$this->height = (isset($atts['height'])) ? $atts['height'] : 400;
		$this->feature = (isset($atts['feature'])) ? $atts['feature'] : '';
		$this->username = (isset($atts['username'])) ? $atts['username'] : '';
		$this->num = (isset($atts['num'])) ? $atts['num'] : 10;
		$this->tag = (isset($atts['tag'])) ? str_replace(" ","&nbsp;",$atts['tag']) : '';
		$this->term = (isset($atts['term'])) ? str_replace(" ","&nbsp;",$atts['term']) : '';
		
		$this->caption = (isset($atts['caption'])) ? $atts['caption'] : 'on';
		$this->post_or_page = (isset($atts['post_or_page'])) ? $atts['post_or_page'] : '1';
		
		if($this->feature=='tag'){
			$url= 'https://api.500px.com/v1/photos/search?consumer_key=' . $this->consumerKey_500px . '&tag='.$this->tag.'&rpp=' . $this->num;
		}
		else
			$url = 'https://api.500px.com/v1/photos?consumer_key=' . $this->consumerKey_500px . '&feature=' . $this->feature . '&username=' . $this->username . '&rpp=' . $this->num;
		
		$json = file_get_contents($url);
		$photos = json_decode($json, TRUE);
		
		if($this->post_or_page && (!is_single() && !is_page()))
			return;
				
		return $this->inceptive_500px_image_showcase_shortcode_gallery($photos, $this->caption);
	}
	
	
	function inceptive_500px_image_showcase_shortcode_gallery($photos,$caption='on') {
	
		$return_string = '<div id="inceptive-500px-image-showcase-gallery" class="inceptive-500px-image-showcase-gallery">';
			
		foreach ($photos['photos'] as $photo) {
			$return_string .= '<div class="inceptive-500px-image-showcase-gallery-image">';
			$photourl = substr($photo['image_url'], 0, -5) . "4.jpg";
			$photourl_thumb = substr($photo['image_url'], 0, -5) . "1.jpg";
			$photolink = 'http://500px.com/photo/'.$photo['id'];
			
			$return_string .= '<img alt="' . $photo['name'] . '" title="' . $photo['name'] . '" src="' . $photourl . '" />';
			$return_string .= '<div class="inceptive-500px-image-showcase-gallery-caption">';
			
			if($caption!='off')
				$return_string .= '<strong><a href="'.$photolink.'" target="_blank">' . $photo['name'] . '</a></strong><br/><em>' . substr($photo['description'],0,130). '</em>';
					
			$return_string .= '</div>';
			$return_string .= '</div>';
		}
				
		$return_string .= '</div>';

		return $return_string;
	}

	function register_inceptive_500px_image_showcase_shortcode() {
		add_shortcode('500px', array(&$this, 'inceptive_500px_image_showcase_shortcode'));
	}

}

?>
