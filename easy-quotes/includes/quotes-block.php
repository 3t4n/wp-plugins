<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Quotes_Block
{
	// Title
	private $isCustomTitle;
	private $customTitle;
	private $headerTag;

	// Rating
	private $isShowStars;
	private $isShowRating;

	// Quote
	private $selectedCategory;
	private $specificQuote;
	private $viewMode;
	private $listViewQuotesAmount;
	private $rotationSpeed;
	private $isRandomViewingOrder;
	private $isAvoidCache;

	//Typoghraphy
	private $fontFamily;
	private $fontSize;
	private $lineHeight;

	// Advanced CSS
	private $classNameTitle;
	private $classNameRating;
	private $classNameQuote;
	private $classNameCitation;
	private $className;

	private $quotes;
	private $isWidget;
	private $widgetId;
	private $currentScreen;

	private $uniqId;

	function __construct()
	{
		add_action( 'init', [$this, 'register_block'] );
		add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
		add_action( 'current_screen', [$this, 'current_screen'] );
		add_filter( 'widget_display_callback', [$this, 'widget_display_callback'], 10, 3 );
		$this->isWidget = false;
	}

	function register_block()
	{
		register_block_type(
			QUOTES_DIR . 'build',   // folder of block.json
			array(
				'render_callback' => array($this, 'render_quote_block')
			)
		);

		// Frontend Script see block.json "viewScript"
		wp_register_script(
			'quotes_block_script',
			QUOTES_PLUGIN_URL . 'public/js/script.js',
			array('jquery', 'wp-i18n'),
			filemtime(QUOTES_DIR . 'public/js/script.js'),
			false
		);

		wp_set_script_translations(
			'layart-quotes-block-editor-script',
			'easy-quotes',
			QUOTES_DIR . 'languages/'
		);
		
	}

	function enqueue_scripts()
	{
		wp_enqueue_script('quotes_block_script');

		wp_set_script_translations(
			'quotes_block_script',
			'easy-quotes',
			QUOTES_DIR . 'languages/'
		);

		$locale = str_replace('_', '-', get_locale());
		wp_localize_script('quotes_block_script', 'locale', ['lang' => $locale]);
	}


	function current_screen()
	{
		$this->currentScreen = get_current_screen();
	}

	/**
	 * Populate Member Variables with attribute Values
	 *
	 * @param [array] $attributes
	 * @return void
	 */
	function init_attributes($attributes)
	{
		//Title
		$this->isCustomTitle		= (isset($attributes['isCustomTitle'])) ? $attributes['isCustomTitle'] : false;
		$this->customTitle			= trim($attributes['customTitle']);
		$this->headerTag			= $this->validate_header_tag($attributes['headerTag']);

		//Rating
		$this->isShowStars			= (isset($attributes['isShowStars'])) ? $attributes['isShowStars'] : false;
		$this->isShowRating			= (isset($attributes['isShowRating'])) ? $attributes['isShowRating'] : false;

		//Quote
		$this->selectedCategory		= $attributes['selectedCategory'];
		$this->specificQuote		= (isset($attributes['specificQuote'])) ? $attributes['specificQuote'] : array('value' => -1);
		$this->viewMode				= (isset($attributes['viewMode'])) ? $attributes['viewMode'] : 'single';
		$this->listViewQuotesAmount = (isset($attributes['listViewQuotesAmount'])) ? $attributes['listViewQuotesAmount'] : 10;
		$this->rotationSpeed		= (isset($attributes['rotationSpeed'])) ? $attributes['rotationSpeed'] : 5000;
		$this->isRandomViewingOrder = (isset($attributes['isRandomViewingOrder'])) ? $attributes['isRandomViewingOrder'] : false;
		$this->isAvoidCache			= (isset($attributes['isAvoidCache'])) ? $attributes['isAvoidCache'] : false;

		//Typography
		$this->fontFamily			= $attributes['fontFamily'];
		$this->fontSize				= $attributes['fontSize'];
		$this->lineHeight			= $attributes['lineHeight'];

		//Advanced
		$this->classNameTitle		= $this->sanitize_html_classes($attributes['classNameTitle']);
		$this->classNameRating		= $this->sanitize_html_classes($attributes['classNameRating']);
		$this->classNameQuote		= $this->sanitize_html_classes($attributes['classNameQuote']);
		$this->classNameCitation	= $this->sanitize_html_classes($attributes['classNameCitation']);
		$this->className			= (isset($attributes['className'])) ? $this->sanitize_html_classes($attributes['className']) : array();

		$this->quotes				= $this->get_quotes();
	}

	/**
	 * Render function for Dynamic Block
	 *
	 * @return string
	 */
	function render_quote_block($attributes, $content, $block)
	{
		if ($this->currentScreen)
			return "";

		if (defined('REST_REQUEST') && REST_REQUEST)
			return "";

		// All attributes to Class Member Variables
		$this->init_attributes($attributes);
		if (is_null($this->quotes))
			return __("<h2>No Quote availabe!</h2><p>Add a Quote at your backend :) (Main Menu->Quotes)</p>", "easy-quotes");
		
		$font = new Quotes_Font($this->fontFamily);

		$attributes['uniqId'] = "easy-quotes-" . md5(uniqid());
		$this->uniqId = $attributes['uniqId'];

		ob_start();
		$fontClassName = $font->add_font_style($this->widgetId);
		array_push($this->classNameQuote, $fontClassName);

		if ($this->viewMode === "rotation") {
			if ($this->isCustomTitle) {
				echo $this->get_title_html($this->quotes[0]);
			}
			echo '<div id="' . $this->uniqId . 
				 '" class="easy-quotes-rotation" data-rotation-speed="' .
				 intval($this->rotationSpeed) . '" data-random-viewing-order="' .
				 $this->isRandomViewingOrder . '">';
		}

		foreach ($this->quotes as $quote) {
			$this->render_quote($quote);
		}

		if ($this->viewMode === "rotation") {
			echo '</div>';
			echo '<script>startRotation(' . json_encode($this->uniqId) . ')</script>';
		}

		if ($this->viewMode === "single" && $this->isAvoidCache) {
			if ($this->specificQuote['value'] == -1 || $this->specificQuote['value'] == -2) {   // random / daily
				echo '<script>fetchQuote(' . json_encode($attributes) . ')</script>';
			}
		}
		return ob_get_clean();
	}

	/**
	 * Renders the Quote as HTML
	 *
	 * @param WP_Post $quote
	 * @return void
	 */
	function render_quote($quote)
	{
		echo $this->get_quote_outer_div_html();
		if (!($this->isCustomTitle && $this->viewMode === "rotation"))
			echo $this->get_title_html($quote);
		echo $this->get_rating_html($quote);
		echo $this->get_quote_html($quote);
		echo $this->get_citation_html($quote);
		echo "</div>";  // block_outer_div closing div
	}

	/**
	 * Returns the HTML for the outer/main with div class(es)
	 *
	 * @return string
	 */
	function get_quote_outer_div_html()
	{
		$classes = [];
		$classes[] = 'easy-quotes-quote';

		$uniqId = '';
		if ($this->viewMode === 'single') {
			$uniqId = ' id="' . $this->uniqId . '" ';
		}

		$classes = array_merge($classes, $this->className);
		return '<div'.$uniqId.' class="' . esc_attr(trim(implode(" ", $classes))).'">';
	}

	/**
	 * Returns the Title as HTML with div class(es)
	 *
	 * @param WP_Post $quote
	 * @return string HTML
	 */
	function get_title_html($quote)
	{
		$title = $this->get_title($quote);
		if (empty($title))
			return "";

		if (empty($this->classNameTitle)) {
			return '<' . $this->headerTag . '>' . esc_html($title) . '</' . $this->headerTag . '>';
		}
		return '<' . $this->headerTag . ' class="' . esc_attr(implode(" ", $this->classNameTitle)) . '">' . esc_html($title) . '</' . $this->headerTag . '>';
	}

	/**
	 * Returns the Stars and Rating with div class(es)
	 *
	 * @param WP_Post $quote
	 * @return string HTML
	 */
	function get_rating_html($quote)
	{
		if (!$this->isShowStars && !$this->isShowRating)
			return "";

		$rating = get_post_meta($quote->ID, 'quote_rating', true);
		if (empty($rating))
			$rating = 0;

		$stars_html = "";
		if ($this->isShowStars) {
			$stars_html = Quotes_Stars::get_stars($rating);
		}

		$rating_html = "";
		if ($this->isShowRating) {
			$rating_html = '<span>' . esc_html(number_format_i18n($rating, 1)) . ' ' . __('out of 5', 'easy-quotes') . '</span>';
		}

		return '<div class="' . esc_attr(implode(" ", $this->classNameRating)) . '">' .
			$stars_html . $rating_html . '</div>';
	}

	/**
	 * Return the Quote as HTML with div class(es)
	 *
	 * @param WP_Post $quote
	 * @return string HTML
	 */
	function get_quote_html($quote)
	{
		$content = $quote->post_content;
		if (empty($content))
			return "";

		$content = wp_filter_post_kses($content);
		$content = stripslashes($content);
		$content = wpautop($content);

		$style = 'style="'
			. 'font-size: ' . floatval($this->fontSize) . 'em; '
			. 'line-height: ' . floatval($this->lineHeight) . 'em;"';

		if (empty($this->classNameQuote)) {
			return '<div ' . $style . '>' . $content . '</div>';
		}
		return '<div class="' . esc_attr(implode(" ", $this->classNameQuote)) . '" ' . $style . '>' . $content . '</div>';
	}

	/**
	 * Return the Citation as HTML with div class(es)
	 *
	 * @param WP_Post $quote
	 * @return string HTML
	 */
	function get_citation_html($quote)
	{
		$author = get_post_meta($quote->ID, 'quote_author', true);
		$date = get_post_meta($quote->ID, 'quote_date', true);

		$citation = "";
		if (empty($author))
			$citation = $date;
		else if (empty($date))
			$citation = $author;
		else $citation = $author . ' - ' . $date;

		if ($this->classNameCitation === '') {
			return '<div>' . esc_html($citation) . '</div>';
		}
		return '<div class="' . esc_attr(implode(" ", $this->classNameCitation)) . '">' . esc_html($citation) . '</div>';
	}

	/**
	 * Return the Quotes
	 *
	 * @return array|null WP_Post object
	 */
	function get_quotes()
	{
		switch ($this->viewMode) {
			case 'single':
				$quote = null;
				if ($this->specificQuote['value'] == -1) // random
					$quote = Quotes_Data::get_random_quote($this->selectedCategory);
				else if ($this->specificQuote['value'] == -2) // daily
					$quote = Quotes_Data::get_daily_quote($this->selectedCategory);
				else // specific
					$quote = Quotes_Data::get_quote($this->specificQuote['value']);

				if (!is_null($quote))
					return [$quote];
				break;
			case 'list':
				return Quotes_Data::get_quotes($this->selectedCategory, $this->listViewQuotesAmount);
			case 'rotation':
				return Quotes_Data::get_quotes($this->selectedCategory);
		}
		return null;
	}

	/**
	 * Return the regular or custom title
	 *
	 * @param WP_Post $quote
	 * @return string
	 */
	function get_title($quote)
	{
		if ($this->isCustomTitle)
			return $this->customTitle;
		return $quote->post_title;
	}

	/**
	 * Sanitizes HTML classnames to ensure it only contains valid characters.
	 *
	 * @param string $classes	Separated multiple classes with spaces -> see Block-Options
	 * @return array|null 			Array of strings – sanitized_html_class 
	 */
	function sanitize_html_classes($classes)
	{
		if (!isset($classes))
			return null;

		preg_match_all('/\S+/', $classes, $output_array);

		$result = [];
		foreach ($output_array[0] as $class) {
			array_push($result, sanitize_html_class($class));
		}
		return $result;
	}

	/**
	 * Validate HeaderTag
	 *
	 * @param string $headerTag
	 * @return string
	 */
	function validate_header_tag($headerTag)
	{
		if (preg_match('/\Ah[1-6]\z/', $headerTag))
			return $headerTag;
		return 'h3';
	}

	/**
	 * Helper function to get "className" 
	 * from Block instance['content']
	 * before Block is rendered in Widget
	 *
	 * @param array $instance
	 * @param WP_Widget $widget
	 * @param array $args
	 * @return array $instance without changes
	 */
	function widget_display_callback($instance, $widget, $args)
	{
		if (!isset($instance['content']))
			return $instance;

		$blocks = parse_blocks($instance['content']);
		if (isset($blocks[0]['blockName']) && $blocks[0]['blockName'] === 'layart/quotes-block') {
			$this->isWidget = true;
			if (isset($blocks[0]['attrs']['className'])) {
				$this->className = $this->sanitize_html_classes($blocks[0]['attrs']['className']);
			}
			if (isset($widget->id)) {
				$this->widgetId = $widget->id;
			}
		}
		return $instance;
	}
}
