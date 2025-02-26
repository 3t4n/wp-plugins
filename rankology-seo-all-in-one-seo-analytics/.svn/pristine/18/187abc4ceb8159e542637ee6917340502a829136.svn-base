<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//XML

//Headers
rankology_get_service('SitemapHeaders')->printHeaders();

//Remove primary category
remove_filter('post_link_category', 'rankology_titles_primary_cat_hook', 10, 3);

//WPML - Home URL
if ( 2 == apply_filters( 'wpml_setting', false, 'language_negotiation_type' ) ) {
	add_filter('rankology_sitemaps_home_url', function($home_url) {
		$home_url = apply_filters( 'wpml_home_url', get_option( 'home' ));
		return trailingslashit($home_url);
	});
} else {
	add_filter('wpml_get_home_url', 'rankology_remove_wpml_home_url_filter', 20, 5);
}

add_filter('rankology_sitemaps_single_gnews_query', function ($args) {
	global $sitepress, $sitepress_settings;

	$sitepress_settings['auto_adjust_ids'] = 0;
	remove_filter('terms_clauses', [$sitepress, 'terms_clauses']);
	remove_filter('category_link', [$sitepress, 'category_link_adjust_id'], 1);

	//If multidomain setup
	if ( 2 == apply_filters( 'wpml_setting', false, 'language_negotiation_type' ) ) {
		$args['suppress_filters'] = false;
	}

	return $args;
});

function rankology_xml_sitemap_news() {
	//Publication Name
	function rankology_xml_sitemap_news_name_option() {
		$rankology_xml_sitemap_news_name_option = get_option('rankology_fno_option_name');
		if ( ! empty($rankology_xml_sitemap_news_name_option)) {
			foreach ($rankology_xml_sitemap_news_name_option as $key => $rankology_xml_sitemap_news_name_value) {
				$options[$key] = $rankology_xml_sitemap_news_name_value;
			}
			if (isset($rankology_xml_sitemap_news_name_option['rankology_news_name'])) {
				return $rankology_xml_sitemap_news_name_option['rankology_news_name'];
			}
		}
	}
	//Include Custom Post Types
	function rankology_xml_sitemap_news_cpt_option() {
		$rankology_xml_sitemap_news_cpt_option = get_option('rankology_fno_option_name');
		if ( ! empty($rankology_xml_sitemap_news_cpt_option)) {
			foreach ($rankology_xml_sitemap_news_cpt_option as $key => $rankology_xml_sitemap_news_cpt_value) {
				$options[$key] = $rankology_xml_sitemap_news_cpt_value;
			}
			if (isset($rankology_xml_sitemap_news_cpt_option['rankology_news_name_post_types_list'])) {
				return $rankology_xml_sitemap_news_cpt_option['rankology_news_name_post_types_list'];
			}
		}
	}
	if ('' != rankology_xml_sitemap_news_cpt_option()) {
		$rankology_xml_sitemap_news_cpt_array = [];
		foreach (rankology_xml_sitemap_news_cpt_option() as $cpt_key => $cpt_value) {
			foreach ($cpt_value as $_cpt_key => $_cpt_value) {
				if ('1' == $_cpt_value) {
					array_push($rankology_xml_sitemap_news_cpt_array, $cpt_key);
				}
			}
		}
	}

	$home_url = home_url() . '/';

	if (function_exists('pll_home_url')) {
		$home_url = site_url() . '/';
	}

	$home_url = apply_filters('rankology_sitemaps_home_url', $home_url);

	$rankology_sitemaps = '<?xml version="1.0" encoding="UTF-8"?>';
	$rankology_sitemaps .= '<?xml-stylesheet type="text/xsl" href="' . $home_url . 'sitemaps_xsl.xsl"?>';
	$rankology_sitemaps .= "\n";
	$rankology_sitemaps_urlset = apply_filters('rankology_sitemaps_urlset', '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd http://www.google.com/schemas/sitemap-news/0.9 http://www.google.com/schemas/sitemap-news/0.9/sitemap-news.xsd" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">');
	$rankology_sitemaps .= $rankology_sitemaps_urlset;
	$rankology_sitemaps .= "\n";

	$args = [
		'exclude' => '',
		'posts_per_page' => 1000,
		'order' => 'DESC',
		'orderby' => 'date',
		'post_type' => $rankology_xml_sitemap_news_cpt_array,
		'post_status' => 'publish',
		'meta_query' => [
			'relation' => 'OR',
			[
				'key' => '_rankology_robots_index',
				'value' => '',
				'compare' => 'NOT EXISTS',
			],
			[
				'key' => '_rankology_robots_index',
				'value' => 'yes',
				'compare' => '!=',
			],
		],
		'date_query' => [
			[
				'after' => '2 days ago',
			],
		],
		'post__not_in' => get_option('sticky_posts'),
		'lang' => '',
		'has_password' => false,
	];

	$args = apply_filters('rankology_sitemaps_single_gnews_query', $args);

	$postslist = get_posts($args);
	foreach ($postslist as $post) {
		setup_postdata($post);
		if ('yes' != get_post_meta($post->ID, '_rankology_news_disabled', true)) {
			// Extract lang
			$lang = explode('_', get_locale());
			$lang = $lang[0];

			// Extract mod
			if (get_the_modified_date('c', $post)) {
				$rankology_mod = get_the_modified_date('c', $post);
			} else {
				$rankology_mod = get_post_modified_time('c', false, $post);
			}

			// Extract keywords
			$rankology_keywords = false;
			$rankology_keywords = apply_filters('rankology_sitemaps_news_keywords', $rankology_keywords);
			if ($rankology_keywords) {
				$rankology_keywords = get_post_meta($post->ID, '_rankology_analysis_target_kw', true);
				$rankology_keywords = apply_filters('rankology_sitemaps_news_keywords_value', $rankology_keywords);
			}

			// Extract image
			$images_array = [];
			if ('1' === rankology_get_service('SitemapOption')->imageIsEnable()) {
				//noimageindex?
				if ('yes' != get_post_meta($post, '_rankology_robots_imageindex', true)) {
					//Standard images
					if ('' != get_post_field('post_content', $post)) {
						$dom = new domDocument();
						$internalErrors = libxml_use_internal_errors(true);
						$run_shortcodes = apply_filters('rankology_sitemaps_single_shortcodes', true);

						if (true === $run_shortcodes) {
							$post_content = do_shortcode(get_post_field('post_content', $post));
						} else {
							$post_content = get_post_field('post_content', $post);
						}

						if ('' != $post_content) {
							if (function_exists('mb_convert_encoding')) {
								$dom->loadHTML(mb_convert_encoding($post_content, 'HTML-ENTITIES', 'UTF-8'));
							} else {
								$dom->loadHTML('<?xml encoding="utf-8" ?>' . $post_content);
							}

							$dom->preserveWhiteSpace = false;

							if ('' != $dom->getElementsByTagName('img')) {
								$images = $dom->getElementsByTagName('img');
							}
						}
						libxml_use_internal_errors($internalErrors);
					}

					//Woocommerce images
					global $product;
					if ('' != $product && method_exists($product, 'get_gallery_image_ids')) {
						$product_img = $product->get_gallery_image_ids();
					}

					//Post Thumbnail
					$post_thumbnail = get_the_post_thumbnail_url($post, 'full');
					$post_thumbnail_id = get_post_thumbnail_id($post);

					//Images
					if ((isset($images) && ! empty($images) && $images->length >= 1) || (isset($product) && ! empty($product_img)) || '' != $post_thumbnail) {
						$i = 0;
						//Standard img
						if (isset($images) && ! empty($images)) {
							if ($images->length >= 1) {
								foreach ($images as $img) {
									$url = $img->getAttribute('src');
									$url = apply_filters('rankology_sitemaps_single_img_url', $url);
									if ('' != $url) {
										//Exclude Base64 img
										if (false === strpos($url, 'data:image/')) {
											/*
											*  Initiate $rankology_url['images] and needed data for the sitemap image template
											*/

											if (true === rankology_is_absolute($url)) {
												//do nothing
											} else {
												$url = $home_url . $url;
											}

											//cleaning url
											$url = htmlspecialchars(urldecode(esc_attr(wp_filter_nohtml_kses($url))));

											//remove query strings
											$parse_url = wp_parse_url($url);

											if ( ! empty($parse_url['scheme']) && ! empty($parse_url['host']) && ! empty($parse_url['path'])) {
												$images_array[$i]['loc'] = '<![CDATA[' . $parse_url['scheme'] . '://' . $parse_url['host'] . $parse_url['path'] . ']]>';
											} else {
												$images_array[$i]['loc'] = '<![CDATA[' . $url . ']]>';
											}
											++$i;
										}
									}
								}
							}
						}
						//WooCommerce img
						if ('' != $product && '' != $product_img) {
							foreach ($product_img as $product_attachment_id) {
								$images_array[$i]['loc'] = '<![CDATA[' . esc_attr(wp_filter_nohtml_kses(wp_get_attachment_url($product_attachment_id))) . ']]>';
								++$i;
							}
						}
						//Post thumbnail
						if ('' != $post_thumbnail) {
							$images_array[$i]['loc'] = '<![CDATA[' . $post_thumbnail . ']]>';
							++$i;
						}
					} //...end extract image
				} //... end noimageindex?
			} // ... end rankology_get_service('SitemapOption')->imageIsEnable()

			// Init return sitemap
			$rankology_sitemap_url = '';

			// array with all the information needed for a sitemap url
			$rankology_url = [
				'loc' => htmlspecialchars(urldecode(get_permalink($post))),
				'mod' => $rankology_mod,
				'images' => $images_array,
				'news' => [
					'name' => htmlspecialchars(urldecode(esc_attr(html_entity_decode(rankology_xml_sitemap_news_name_option())))),
					'language' => $lang,
					'publication_date' => get_the_date('c', $post),
					'title' => htmlspecialchars(urldecode(esc_attr(html_entity_decode(get_the_title($post))))),
					'keywords' => $rankology_keywords,
				],
			];

			$rankology_sitemap_url .= '<url>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '<loc>';
			$rankology_sitemap_url .= $rankology_url['loc'];
			$rankology_sitemap_url .= '</loc>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '<lastmod>';
			$rankology_sitemap_url .= $rankology_url['mod'];
			$rankology_sitemap_url .= '</lastmod>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '<news:news>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '<news:publication>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '<news:name>' . $rankology_url['news']['name'] . '</news:name>';
			$rankology_sitemap_url .= "\n";

			$rankology_sitemap_url .= '<news:language>' . $rankology_url['news']['language'] . '</news:language>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '</news:publication>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '<news:publication_date>';
			$rankology_sitemap_url .= $rankology_url['news']['publication_date'];
			$rankology_sitemap_url .= '</news:publication_date>';
			$rankology_sitemap_url .= "\n";
			if ($rankology_url['news']['keywords']) {
				$rankology_sitemap_url .= '<news:keywords>';
				$rankology_sitemap_url .= $rankology_url['news']['keywords'];
				$rankology_sitemap_url .= '</news:keywords>';
				$rankology_sitemap_url .= "\n";
			}
			$rankology_sitemap_url .= '<news:title>';
			$rankology_sitemap_url .= $rankology_url['news']['title'];
			$rankology_sitemap_url .= '</news:title>';
			$rankology_sitemap_url .= "\n";
			$rankology_sitemap_url .= '</news:news>';
			$rankology_sitemap_url .= "\n";
			if ($rankology_url['images']) {
				foreach ($rankology_url['images'] as $img) {
					$rankology_sitemap_url .= '<image:image>';
					$rankology_sitemap_url .= "\n";

					if ('' != $img['loc']) {
						$rankology_sitemap_url .= '<image:loc>';
						$rankology_sitemap_url .= $img['loc'];
						$rankology_sitemap_url .= '</image:loc>';
						$rankology_sitemap_url .= "\n";
					}

					$rankology_sitemap_url .= '</image:image>';
					$rankology_sitemap_url .= "\n";
				}
			}
			$rankology_sitemap_url .= '</url>';
			$rankology_sitemap_url .= "\n";

			$rankology_sitemaps .= apply_filters('rankology_sitemaps_url', $rankology_sitemap_url, $rankology_url);
		}
	}
	wp_reset_postdata();

	$rankology_sitemaps .= '</urlset>';

	$rankology_sitemaps = apply_filters('rankology_sitemaps_xml_news', $rankology_sitemaps);

	return $rankology_sitemaps;
}
echo rankology_xml_sitemap_news();
