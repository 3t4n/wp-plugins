<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

class Quotes_Data
{
	function __construct()
	{
		add_filter('posts_where', array($this, 'posts_where'), 10, 2);
	}

	/**
	 * Add a filter to WP_Query value like 'easy_quotes_quote_title'
	 *
	 * @param [type] $where
	 * @param [type] $wp_query
	 * @return void
	 */
	function posts_where($where, $wp_query)
	{
		global $wpdb;
		if ($quote_title = $wp_query->get('easy_quotes_quote_title')) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql($wpdb->esc_like($quote_title)) . '%\'';
		}
		else if ($quote_date = $wp_query->get('easy_quotes_quote_date')) {
			$parts = explode("-", $quote_date);
			$where .= ' AND extract(month from ' . $wpdb->posts . '.post_date) = '.$parts[0].' AND extract(day from ' . $wpdb->posts . '.post_date) = '.$parts[1];
		}
		return $where;
	}

	/**
	 * Returns Quote Query args
	 *
	 * @param string $category
	 * @param integer $per_page
	 * @return array
	 */
	static function get_query_args($category = "-1", $per_page = -1) {
		$args = [
			'post_type' => 'quote'
		];
		if ($category != '-1') {
			$categoryTerm = get_term((int)$category, 'quote-category');
			if (isset($categoryTerm->slug))
				$args['quote-category'] = $categoryTerm->slug;
		}
		if (is_numeric($per_page)) {
			if ($per_page == 0) {
				$per_page = -1;
			}
			$args['posts_per_page'] = $per_page;
		}
		return $args;
	}

	/**
	 * Returns Quotes from a category
	 *
	 * @param string $category 		-1 returns all categories
	 * @param integer $per_page		-1 returns all quotes
	 * @return array of WP_Post Objects 
	 */
	public static function get_quotes($category = "-1", $per_page = -1) {
		$args = self::get_query_args($category, $per_page);
		$query = new WP_Query($args);
		return $query->posts;
	}

	/**
	 * Returns Random Quotes
	 *
	 * @param string $category
	 * @param integer $per_page
	 * @return array of WP_Post Objects
	 */
	public static function get_random_quotes($category = "-1", $per_page = 1)
	{
		$args = self::get_query_args($category, $per_page);
		$args['orderby'] = 'rand';

		$query = new WP_Query($args);
		return $query->posts;
	}

	/**
	 * Return a Random Quote
	 *
	 * @param string $category
	 * @return WP_Post|null
	 */
	public static function get_random_quote($category = "-1")
	{
		$quotes = self::get_random_quotes($category);
		if (count($quotes) > 0)
			return $quotes[0];
		
		return null;
	}

	/**
	 * Return the Daily Quote
	 *
	 * @param string $category
	 * @return WP_Post|null
	 */
	public static function get_daily_quote($category = "-1")
	{
		$now = current_time('m-d');
		$args = self::get_query_args($category, 1);
		$args['easy_quotes_quote_date'] = $now;

		$query = new WP_Query($args);
		if (count($query->posts) > 0)
			return $query->posts[0];

		// else get the latest published quote from this category
		else {
			$args = self::get_query_args($category, 1);
			$query = new WP_Query($args);
			if (count($query->posts) > 0)
				return $query->posts[0];
		}

		return null;
	}

	/**
	 * Returns Quotes like Title
	 *
	 * @param string $title
	 * @param string $category
	 * @param integer $per_page
	 * @return array of WP_Post Objects
	 */
	public static function get_quotes_like_title($title = "", $category = "-1", $per_page = 5)
	{
		$args = [
			'post_type' => 'quote'
		];

		if (!empty($title))
			$args['easy_quotes_quote_title'] = $title;

		if ($category != '-1') {
			$categoryTerm = get_term((int)$category, 'quote-category');
			if (isset($categoryTerm->slug))
				$args['quote-category'] = $categoryTerm->slug;
		}

		if (is_numeric($per_page)) {
			$args['posts_per_page'] = $per_page;
		} else {
			$args['posts_per_page'] = 5;
		}

		$query = new WP_Query($args);
		return $query->posts;
	}

	/**
	 * Returns a specific Quote
	 *
	 * @param integer $post_id
	 * @return WP_Post|null
	 */
	public static function get_quote($post_id)
	{
		if (empty($post_id))
			return null;

		$args = [
			'post_type' => 'quote',
			'p' => $post_id
		];

		$query = new WP_Query($args);
		return $query->post;
	}

	/**
	 * Returns all Fonts
	 *
	 * @return array [family]
	 */
	public static function get_fonts($category = -1) {

		/** @var wpdb $wpdb */
		global $wpdb;
		$tablename = $wpdb->prefix . 'easy-quotes-families';
		$sql = "SELECT `family` FROM `".$tablename."` ORDER BY `family` ASC";
		if ($category > -1) {
			$sql = $wpdb->prepare("SELECT `family` FROM %i WHERE `category_id` = %d ORDER BY `family` ASC", $tablename, $category);
		}
		$result = $wpdb->get_col($sql);
		return $result;
	}

	/**
	 * Returns all font categories
	 *
	 * @return object fonts-categories
	 */
	public static function get_fonts_categories() {
		/** @var wpdb $wpdb */
		global $wpdb;
		$tablename = $wpdb->prefix . 'easy-quotes-categories';
		$sql = $wpdb->prepare(
			"SELECT `category_id`, `category` FROM %i",
			$tablename
		);
		return $wpdb->get_results($sql);
	}

	/**
	 * Returns an object with all font variants of this family incl. matching font files
	 *
	 * @param string $family
	 * @return array
	 */
	public static function get_font_variants($family) {
		$familyData = self::get_family_data($family);
		/** @var wpdb $wpdb */
		global $wpdb;
		$tableFiles = $wpdb->prefix . 'easy-quotes-files';
		$tableVariants = $wpdb->prefix . 'easy-quotes-variants'; 
		$sql = $wpdb->prepare(
			"SELECT b.variant as label, a.variant_id as value FROM %i a INNER JOIN %i b ON a.variant_id = b.variant_id WHERE a.family_id = %d ORDER BY b.variant DESC",
			$tableFiles, $tableVariants, $familyData->family_id
		);
		$results = $wpdb->get_results($sql);
		return $results;
	}

	/**
	 * Returns filename by family_id and variant_id
	 *
	 * @param integer $family_id
	 * @param integer $variant_id
	 * @return array filename
	 */
	public static function get_font_variant($family_id, $variant_id) {
		/** @var wpdb $wpdb */
		global $wpdb;
		$tableFiles = $wpdb->prefix . 'easy-quotes-files';
		$sql = $wpdb->prepare(
			"SELECT file FROM %i WHERE family_id = %d AND variant_id = %d",
			$tableFiles, $family_id, $variant_id
		);
		$result['variant'] = ['id' => $variant_id, 'file' => $wpdb->get_var($sql)];
		return $result;
	}

	/**
	 * Return all family data incl variant and files
	 *
	 * @param string $family
	 * @param integer $variant_id
	 * @return array
	 */
	public static function get_family($family, $variant_id) {
		$family_data = (array)self::get_family_data($family);
		$family_slug = self::get_font_family_slug($family);
		$font_variant = self::get_font_variant($family_data['family_id'], $variant_id);
		unset($family_data['family_id']);
		unset($family_data['lastModified']);
		return array_merge(
			$family_data,
			['family_slug' => $family_slug],
			$font_variant);
	}

	/**
	 * Convert Family Name to familyslug
	 *
	 * @param string $family
	 * @return string
	 */
	public static function get_font_family_slug($family)
	{
		return strtolower(preg_replace('/\s?/', '', $family));
	}

	/**
	 * Returns object with data for Font Family
	 *
	 * @param string	$family
	 * @return object	Font Data
	 */
	private static function get_family_data($family) {
		/** @var wpdb $wpdb */
		global $wpdb;
		$tablename = $wpdb->prefix . 'easy-quotes-families';
		$sql = $wpdb->prepare(
			"SELECT * FROM %i WHERE `family` = %s",
			$tablename, $family
		);
		return $wpdb->get_row($sql);
	}
}
