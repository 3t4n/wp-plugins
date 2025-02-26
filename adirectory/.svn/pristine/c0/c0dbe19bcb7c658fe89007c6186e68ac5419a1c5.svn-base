<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}
/**
 * Method adqs_listing_query_filter_args
 *
 * @param $queryArgs
 *
 * @return array
 */
if (!function_exists('adqs_listing_query_filter_args')) {


	function adqs_listing_query_filter_args($queryArgs = [])
	{


		$defaults = [
			'category' => sanitize_text_field($_REQUEST['category'] ?? ''),
			'location' => sanitize_text_field($_REQUEST['location'] ?? ''),
			'directory_type' => sanitize_text_field($_REQUEST['directory_type'] ?? ''),
			'tags' => sanitize_text_field($_REQUEST['tags'] ?? ''),
			'ls' => sanitize_text_field($_REQUEST['ls'] ?? ''),
			'minPrice' => sanitize_text_field($_REQUEST['minPrice'] ?? ''),
			'maxPrice' => sanitize_text_field($_REQUEST['maxPrice'] ?? ''),
			'rangePrice' => sanitize_text_field($_REQUEST['rangePrice'] ?? ''),
			'rating' => sanitize_text_field($_REQUEST['rating'] ?? ''),
			'display_listings' => sanitize_text_field($_REQUEST['display_listings'] ?? ''),
		];

		$args = wp_parse_args($queryArgs, $defaults);

		$category       = sanitize_text_field($args['category']);
		$location       = sanitize_text_field($args['location']);
		$directory_type = sanitize_text_field($args['directory_type']);
		$tags           = sanitize_text_field($args['tags']);
		$search         = sanitize_text_field($args['ls']);
		$minprice       = sanitize_text_field($args['minPrice']);
		$maxprice       = sanitize_text_field($args['maxPrice']);
		$rangePrice       = sanitize_text_field($args['rangePrice']);
		$rating         = floatval(sanitize_text_field($args['rating']));
		$display_listings = sanitize_text_field($args['display_listings']);




		$tax_query  = [];
		$meta_query = [];

		if (!empty($directory_type)) {
			$directory_type = explode(',', $directory_type);
			$directory_ids = [];
			if (is_array($directory_type)) {
				foreach ($directory_type as $d_type) {
					$directory_type_id = get_term_by('slug', $d_type, 'adqs_listing_types');
					$directory_ids[] = !empty($directory_type_id->term_id) ? $directory_type_id->term_id : 0;
				}
			}

			if (!empty($directory_ids)) {
				$meta_query[] = array(
					'key'     => 'adqs_directory_type',
					'value'   => $directory_ids,
					'compare' => 'IN'
				);
			}
		}

		if (!empty($search)) {
			$args['s'] = urlencode_deep(preg_replace('/[^a-zA-Z0-9\s]/', '', $search));
		}


		if (($minprice >= 0) && !empty($maxprice)) {
			$meta_query[] = array(
				'key'     => '_price',
				'value'   => array($minprice, $maxprice),
				'type'    => 'NUMERIC',
				'compare' => 'BETWEEN',
			);
		}
		if (!empty($rangePrice)) {
			$meta_query[] = array(
				'key'     => '_price_range',
				'value'   => $rangePrice,
				'compare' => '=',
			);
		}

		if (!empty($rating)) {
			$meta_query[] = array(
				'key'     => 'adqs_avg_ratings',
				'value'   => $rating,
				'type'    => 'NUMERIC',
				'compare' => '>=',
			);
		}


		if (!empty($display_listings) && ($display_listings === 'featured')) {
			$meta_query[] = array(
				'key'     => '_is_featured',
				'value'   => 'yes',
			);
		}

		adqs_search_filters_meta_query($meta_query, $args);


		if (!empty($category)) {
			$tax_query[] = array(
				'taxonomy' => 'adqs_category',
				'field'    => 'slug',
				'terms'    => explode(',', $category),
				'operator' => 'IN',
			);
		}

		if (!empty($location)) {
			$tax_query[] = array(
				'taxonomy' => 'adqs_location',
				'field'    => 'slug',
				'terms'    => explode(',', $location),
				'operator' => 'IN',
			);
		}

		if (!empty($tags)) {
			$tax_query[] = array(
				'taxonomy' => 'adqs_tags',
				'field'    => 'term_id',
				'terms'    => array_map('absint', explode(',', $tags)),
				'operator' => 'IN',
			);
		}

		if (count($tax_query) > 0) {
			if (count($tax_query) > 1) {
				$tax_query['relation'] = 'AND';
			}
			$args['tax_query'] = $tax_query;
		}

		if (count($meta_query) > 0) {
			if (count($meta_query) > 1) {
				$meta_query['relation'] = 'AND';
			}
			$args['meta_query'] = $meta_query;
		}
		return $args;
	}
} // end



/**
 * Method adqs_listing_query_sort_by
 *
 * @param $sort_by $sort_by [explicite description]
 *
 * @return array
 */
if (!function_exists('adqs_listing_query_sort_by')) {


	function adqs_listing_query_sort_by($sort_by = '')
	{
		if (!empty($_REQUEST['sort_by'] ?? '')) {
			$sort_by = $_REQUEST['sort_by'];
		}
		if (empty($sort_by)) {
			return false;
		}

		$sortBySet = [];

		switch ($sort_by) {
			case 'date-asc':
				$sortBySet['order'] = 'ASC';
				break;
			case 'review-count':
				$sortBySet['orderby'] = 'comment_count';
				break;
			case 'rating-desc':
				$sortBySet['meta_key'] = 'adqs_avg_ratings';
				$sortBySet['orderby']  = 'meta_value_num';
				$sortBySet['order']    = 'DESC';
				break;
			case 'title-asc':
				$sortBySet['orderby'] = 'title';
				$sortBySet['order']   = 'ASC';
				break;
			case 'title-desc':
				$sortBySet['orderby'] = 'title';
				$sortBySet['order']   = 'DESC';
				break;
			case 'price-asc':
				$sortBySet['meta_key'] = '_price';
				$sortBySet['orderby']  = 'meta_value_num';
				$sortBySet['order']    = 'ASC';
				break;
			case 'price-desc':
				$sortBySet['meta_key'] = '_price';
				$sortBySet['orderby']  = 'meta_value_num';
				$sortBySet['order']    = 'DESC';
				break;
			case 'rand':
				$sortBySet['orderby'] = 'rand';
				break;
			case 'views-desc':
				$sortBySet['meta_key'] = '_view_count';
				$sortBySet['orderby']  = 'meta_value_num';
				$sortBySet['order']    = 'DESC';
				break;
		}

		return !empty($sortBySet) ? $sortBySet : array();
	}
} // end

if (!function_exists('adqs_search_filters_meta_query')) {
	function adqs_search_filters_meta_query(&$meta_query = [], $args = [])
	{



		$allMetaFields = adqs_metafields_get_search_filters();
		if (!empty($allMetaFields) && is_array($allMetaFields)) {
			foreach ($allMetaFields as $metaData) {

				$input_type = $metaData['input_type'] ?? '';
				if (in_array($input_type, adqs_all_custom_filter_fields())) {
					$fieldid = $metaData['fieldid'] ?? '';
					$input_type =  "{$input_type}_{$fieldid}";
				}

				$get_val = $args[$input_type] ?? '';
				if (empty($get_val)) {
					$get_val = $_REQUEST[$input_type] ?? '';
				}

				switch ($input_type) {
					case "view_count":
						if ($get_val) {
							$meta_query[] = array(
								'key'     => "_{$input_type}",
								'value'   => sanitize_text_field($get_val),
								'type'    => 'NUMERIC',
								'compare' => '>=',
							);
						}
						break;
					default:
						if ($get_val) {
							$meta_query[] = array(
								'key'     => "_{$input_type}",
								'value'   => sanitize_text_field($get_val),
								'compare' => 'LIKE',
							);
						}
				}
			}
		}
	}
}


if (!function_exists('adqs_metafields_get_search_filters')) {
	function adqs_metafields_get_search_filters()
	{

		$directoryTypes = wp_list_pluck(adqs_get_directory_types(), 'term_id');
		$allMetaFields = [];
		if (!empty($directoryTypes)) {
			foreach ($directoryTypes as $dir_id) {
				$all_sections = adqs_get_listing_fields($dir_id);
				if (!empty($all_sections) && is_array($all_sections)) {
					foreach ($all_sections as $section) {


						if (!empty($section['fields'] ?? null) && is_array($section['fields'])) {
							foreach ($section['fields'] as $metaField) {
								if (!empty($metaField['in_search'] ?? null)) {
									if (!empty($metaField['input_type'] ?? '')) {
										$allMetaFields[] = $metaField;
									}
								}
							}
						}
					}
				}
			}
		}
		return $allMetaFields;
	}
}

if (!function_exists('adqs_exlude_preset_filter_fields')) {
	function adqs_exlude_preset_filter_fields()
	{
		return apply_filters('adqs_exlude_preset_filter_fields', [
			'index',
			'businesshour',
			'map',
			'pricing',
			'field_images',
			'checkbox',
		]);
	}
}

if (!function_exists('adqs_all_custom_filter_fields')) {
	function adqs_all_custom_filter_fields()
	{
		return apply_filters('adqs_all_custom_filter_fields', [
			'text',
			'textarea',
			'time',
			'url',
			'number',
			'date',
			'radio',
			'select'
		]);
	}
}

// add search filters builder fields
if (!function_exists('adqs_metafields_add_search_filters_html')) {
	function adqs_metafields_add_search_filters_html()
	{

		/* $templates = ADQS_DIRECTORY_DIR_PATH . 'templates/fields-template';
		$presetFields = array_map(function ($f) {
			if (!in_array(pathinfo($f, PATHINFO_FILENAME), adqs_exlude_preset_filter_fields())) {
				return pathinfo($f, PATHINFO_FILENAME);
			}
		}, glob("{$templates}/preset-fields/*.php") ?? []);
		$presetFields = array_filter($presetFields); */

		$allMetaFields = adqs_metafields_get_search_filters();

		if (!empty($allMetaFields)) {

			if (!empty(array_chunk($allMetaFields, 3) ?? null) && is_array(array_chunk($allMetaFields, 3))) {

				$allFiledsColumns = array_chunk($allMetaFields, 3);

				foreach ($allFiledsColumns as $fieldColumns):
?>
					<div class="qsd-prodcut-grid-with-side-bar">
						<?php
						if (!empty($fieldColumns) && is_array($fieldColumns)) {
							foreach ($fieldColumns as $data) {
								$input_type = $data['input_type'] ?? '';
								$get_val = $_REQUEST[$input_type] ?? '';

								switch ($input_type) {
									case "view_count":
										adqs_get_template_part('search-fields/number', null, compact('data', 'get_val'));
										break;
									case "address":
									case "tagline":
									case "zip":
									case "fax":
										adqs_get_template_part('search-fields/text', null, compact('data', 'get_val'));
										break;
									case "phone":
										adqs_get_template_part('search-fields/tel', null, compact('data', 'get_val'));
										break;
									case "email":
										adqs_get_template_part('search-fields/email', null, compact('data', 'get_val'));
										break;
									case "website":
									case "video":
										adqs_get_template_part('search-fields/url', null, compact('data', 'get_val'));
										break;
									default:
										adqs_get_template_part("search-fields/{$input_type}", null, compact('data', 'get_val'));
										break;
								}
							}
						}
						?>
					</div>
<?php
				endforeach;
			}
		}
	}
	add_action('adqs_after_advanced_top_filter', 'adqs_metafields_add_search_filters_html');
}
