<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Quotes_Rest_Route
{
	function __construct()
	{
		add_action('rest_api_init', array($this, 'rest_api_init'));
	}

	/**
	 * Register my REST route
	 *
	 * @return void
	 */
	function rest_api_init($wp_rest_server)
	{
		$args = [
			'method'                => WP_REST_Server::READABLE,
			'callback'              => [$this, 'rest_route_callback_quote'],
			'permission_callback'   => '__return_true'
		];
		register_rest_route('layart/v1', '/quote', $args);

		$args['callback'] = [$this, 'rest_route_callback_quotes'];
        register_rest_route( 'layart/v1', '/quotes', $args );

		$args['callback'] = [$this, 'rest_route_callback_titles'];
		register_rest_route('layart/v1', '/titles', $args);

		$args['callback'] = [$this, 'rest_route_callback_categories'];
		register_rest_route('layart/v1', '/categories', $args);

		$args['callback'] = [$this, 'rest_route_callback_fonts'];
		register_rest_route('layart/v1', '/fonts', $args);

		$args['callback'] = [$this, 'rest_route_callback_fonts_categories'];
		register_rest_route('layart/v1', '/fonts-categories', $args);

		$args['callback'] = [$this, 'rest_route_callback_font_variants'];
		register_rest_route('layart/v1', '/font-variants', $args);
	}

	/**
	 * Response for layart/v1/quotes?id=6476&cat=5&mode=list&amount=0
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response
	 */
	function rest_route_callback_quotes(WP_REST_Request $request) {

		$id = $request->get_param('id');
		$id = isset($id) ? $id : "-1";

		$category = $request->get_param('cat');
		$category = isset($category) ? $category : "-1";

		$viewMode = $request->get_param('mode');
		$viewMode = isset($viewMode) ? $viewMode : "single";

		$listViewQuotesAmount = $request->get_param('amount');
		$listViewQuotesAmount = isset($listViewQuotesAmount) ? $listViewQuotesAmount : "-1";

		$quotes = [];

		switch ($viewMode) {
			case 'single':
				$quote = null;
				if ($id == -1)  // random
					$quote = Quotes_Data::get_random_quote($category);
				else if ($id == -2) // daily
					$quote = Quotes_Data::get_daily_quote($category);
				else // specific
					$quote = Quotes_Data::get_quote($id);
				if (!is_null($quote))
					$quotes = [$quote];
				break;
			case 'list':
				$quotes = Quotes_Data::get_quotes($category, $listViewQuotesAmount);
				break;
			case 'rotation':
				$quotes = Quotes_Data::get_quotes($category);
				break;
		}

		$response = [];
		if (count($quotes) > 0) {
			foreach ($quotes as $quote) {
				array_push($response, $this->convert_quote_to_response($quote));
			}
		} else {
			array_push($response, $this->get_no_quote());
		}
		return rest_ensure_response($response);
	}

	/**
	 * Response for layart/v1/quote?id=6476&cat=5
	 * 
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response Data
	 */
	function rest_route_callback_quote(WP_REST_Request $request)
	{
		$id = $request->get_param('id');
		$id = isset($id) ? $id : "-1";

		$category = $request->get_param('cat');
		$category = isset($category) ? $category : "-1";

		if ($id == "-1") {
			$post = Quotes_Data::get_random_quote($category);
		} else {
			$post = Quotes_Data::get_quote($id);
		}

		if ($post != null) {
			$response = $this->convert_quote_to_response($post);
			return rest_ensure_response($response);
		}

		$noQuote = $this->get_no_quote();
		return rest_ensure_response($noQuote);
	}

	/**
	 * Returns an empty Quote
	 *
	 * @return array empty Quote
	 */
	function get_no_quote() {
		return array(
			'post_id'	=> -1,
			'title'		=> __('There is no Quote', 'easy-quotes'),
			'rating'	=> '0',
			'content'	=> __('Please create a Quote at Main Menu->Quotes', 'easy-quotes'),
			'author'	=> 'JM',
			'date'		=> "1919"
		);
	}

	/**
	 * Response for layart/v1/titles?title=Mein&cat=6&per_page=5
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response Data
	 */
	function rest_route_callback_titles(WP_REST_Request $request)
	{
		$title = $request->get_param('title');
		$title = isset($title) ? $title : "";

		$category = $request->get_param('cat');
		$category = isset($category) ? $category : "-1";

		$per_page = $request->get_param('per_page');
		$per_page = isset($per_page) ? $per_page : "5";

		$posts = Quotes_Data::get_quotes_like_title($title, $category, $per_page);

		$response = [];
		foreach ($posts as $post) {
			array_push($response, ['label' => $post->post_title, 'value' => $post->ID]);
		}

		return rest_ensure_response($response);
	}

	/**
	 * Response for layart/v1/categories
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response Categories
	 */
	function rest_route_callback_categories(WP_REST_Request $request)
	{
		$categories = get_terms(['taxonomy' => 'quote-category']);

		$response = [['label' => __('All', 'easy-quotes'), 'value' => -1]];
		foreach ($categories as $category) {
			array_push($response, ['label' => $category->name, 'value' => $category->term_id]);
		}
		return rest_ensure_response($response);
	}

	/**
	 * Response for layart/v1/fonts   ?family=Font Name &cat=-1 &variant_id=4
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response fonts
	 */
	function rest_route_callback_fonts(WP_REST_Request $request)
	{
		$family = $request->get_param('family');
		$family = isset($family) ? $family : "";

		$category = $request->get_param('cat');
		$category = isset($category) ? intval($category) : -1;

		$variant = $request->get_param('variant_id');
		$variant = isset($variant) ? intval($variant) : 1;

		$response = [];

		if (empty($family)) {
			// Return list of all fonts
			$response = Quotes_Data::get_fonts($category);
		} else {
			// Return font family data with slug and variants
			$response = Quotes_Data::get_family($family, $variant);
		}

		return rest_ensure_response($response);
	}

	/**
	 * Response for layart/v1/fonts-categories
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response font-categories
	 */
	function rest_route_callback_fonts_categories(WP_REST_Request $request)
	{
		$categories = Quotes_Data::get_fonts_categories();
		$response = [['label' => __('All', 'easy-quotes'), 'value' => -1]];
		foreach ($categories as $category) {
			array_push($response, ['label' => ucfirst($category->category), 'value' => intval($category->category_id)]);
		}
		return rest_ensure_response($response);
	}

	/**
	 * Response for Response for layart/v1/font-variants ?family=Alumni Sans
	 *
	 * @param WP_REST_Request $request
	 * @return WP_REST_Response font variants
	 */
	function rest_route_callback_font_variants(WP_REST_Request $request)
	{
		$family = $request->get_param('family');
		$family = isset($family) ? $family : "Shadows Into Light";

		$response = Quotes_Data::get_font_variants($family);
		return rest_ensure_response($response);
	}

	/**
	 * Converts WP_Post Quote object and meta-data to Array with selected Values
	 *
	 * @param WP_Post $post
	 * @return array
	 */
	function convert_quote_to_response(WP_Post $post)
	{
		if ($post === null)
			return [];

		$author = get_post_meta($post->ID, 'quote_author', true);
		$date = get_post_meta($post->ID, 'quote_date', true);
		$rating = get_post_meta($post->ID, 'quote_rating', true);

		$content = wp_filter_post_kses($post->post_content);
		$content = stripslashes($content);
		$content = wpautop($content);

		$response = array(
			'post_id'	=> $post->ID,
			'title'		=> $post->post_title,
			'rating'	=> $rating,
			'content'	=> $content,
			'author'	=> $author,
			'date'		=> $date
		);
		return $response;
	}
}
