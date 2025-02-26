<?php

/**
 * HTML parser class.
 *
 * @since 1.0.0
 */
class Embed_Extended_Parser {
	/**
	 * Constructor.
	 *
	 * @param string $url
	 * @param string $html
	 */
	public function __construct($url, $html) {
		$this->url = $url;
		$this->html = $html;
	}

	/**
	 * Parse current html data for embed content.
	 *
	 * @since 1.0.0
	 *
	 * @return object
	 */
	public function parse() {
		$author = $this->get_author($this->url, $this->html);
		$provider = $this->get_provider($this->url, $this->html);

		// oembed data
		return (object) [
			'version' => '1.0',
			'type' => 'rich',
			'url' => $this->get_canonical_url($this->url, $this->html),
			'title' => $this->get_title($this->html),
			'description' => $this->get_description($this->html),
			'thumbnail_url' => $this->get_thumbnail($this->html),
			'provider_name' => $provider['name'],
			'provider_url' => $provider['url'],
			'author_name' => $author['name'],
			'author_url' => $author['url'],
			'html' => '',
		];
	}

	/**
	 * Get canonical URL from a html string. Return the original URL if canonical URL tag can't be found.
	 *
	 * @since 1.0.0
	 *
	 * @param string $url
	 * @param string $html
	 * @return string
	 */
	private function get_canonical_url($url, $html = '') {
		$url = esc_url($url);

		/**
		 * Filters the canonical URL.
		 *
		 * @since 1.0.1
		 *
		 * @param string $url
		 * @param string $html
		 */
		$url = apply_filters('embed_extended_canonical_url', $url, $html);

		return $url;
	}

	/**
	 * Get title information from a html string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html
	 * @return string
	 */
	private function get_title($html = '') {
		$title = '';

		// Check og:title content.
		if (preg_match('#<meta[^>]+property=([\'"])og:title\1[^>]*>#is', $html, $matches)) {
			if (preg_match('# content=([\'"])(.*?)\1#is', $matches[0], $matches)) {
				$title = $this->trim($matches[2]);
			}
		}

		// Fallback to title tag.
		if (!$title && preg_match('#<title[^>]*>(.*?)</title>#is', $html, $matches)) {
			$title = $this->trim($matches[1]);
		}

		$title = sanitize_text_field($title);

		/**
		 * Filters the embed title.
		 *
		 * @since 1.0.1
		 *
		 * @param string $title
		 * @param string $html
		 */
		$title = apply_filters('embed_extended_title', $title, $html);

		return $title;
	}

	/**
	 * Get description information from a html string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html
	 * @return string
	 */
	private function get_description($html = '') {
		$description = '';

		// Check og:description content.
		if (preg_match('#<meta[^>]+property=([\'"])og:description\1[^>]*>#is', $html, $matches)) {
			if (preg_match('# content=([\'"])(.*?)\1#is', $matches[0], $matches)) {
				$description = $this->trim($matches[2]);
			}
		}

		// Check meta description content.
		if (!$description) {
			if (preg_match('#<meta[^>]+name=([\'"])description\1[^>]*>#is', $html, $matches)) {
				if (preg_match('# content=([\'"])(.*?)\1#is', $matches[0], $matches)) {
					$description = $this->trim($matches[2]);
				}
			}
		}

		// Fallback to content parsing.
		if (!$description && preg_match_all('#<p[^>]*>.*?</p>#is', $html, $matches)) {
			// Try to get the first paragraph tag with more that 100 characters length.
			// If not found, use the first non-empty paragraph tag.
			foreach ($matches[0] as $match) {
				$content = trim(html_entity_decode(strip_tags($match)));
				if ($content) {
					if (!$description) {
						$description = trim(htmlentities($content));
					}
					if (strlen($content) > 100) {
						$description = trim(htmlentities($content));
						break;
					}
				}
			}
		}

		$description = sanitize_text_field($description);

		/**
		 * Filters the embed description.
		 *
		 * @since 1.0.1
		 *
		 * @param string $description
		 * @param string $html
		 */
		$description = apply_filters('embed_extended_description', $description, $html);

		return $description;
	}

	/**
	 * Get thumbnail information from a html string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html
	 * @return string
	 */
	private function get_thumbnail($html = '') {
		$thumbnail = '';

		if (preg_match('#<meta[^>]+property=([\'"])og:image\1[^>]*>#is', $html, $matches)) {
			if (preg_match('# content=([\'"])(.*?)\1#is', $matches[0], $matches)) {
				$thumbnail = $matches[2];
			}
		}

		$thumbnail = esc_url($thumbnail);

		/**
		 * Filters the thumbnail URL.
		 *
		 * @since 1.0.1
		 *
		 * @param string $thumbnail
		 * @param string $html
		 */
		$thumbnail = apply_filters('embed_extended_thumbnail_url', $thumbnail, $html);

		return $thumbnail;
	}

	/**
	 * Get provider information from a url and html string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $url
	 * @param string $html
	 * @return array
	 */
	private function get_provider($url, $html = '') {
		$provider_name = '';
		$provider_url = '';

		// Get provider name.
		if (preg_match('#<meta[^>]+property=([\'"])og:site_name\1[^>]*>#is', $html, $matches)) {
			if (preg_match('# content=([\'"])(.*?)\1#is', $matches[0], $matches)) {
				$provider_name = $matches[2];
			}
		} elseif (preg_match('#^https?://([^/:]+)#is', $url, $matches)) {
			$provider_name = $matches[1];
		}

		$provider_name = sanitize_text_field($provider_name);

		/**
		 * Filters the provider name.
		 *
		 * @since 1.0.1
		 *
		 * @param string $provider_name
		 * @param string $html
		 */
		$provider_name = apply_filters('embed_extended_provider_name', $provider_name, $html);

		// Get provider url.
		if (preg_match('#^https?://(([^/]+))#i', $url, $matches)) {
			$provider_url = $matches[0];
		}

		$provider_url = esc_url($provider_url);

		/**
		 * Filters the provider URL.
		 *
		 * @since 1.0.1
		 *
		 * @param string $provider_url
		 * @param string $html
		 */
		$provider_url = apply_filters('embed_extended_provider_url', $provider_url, $html);

		return [
			'name' => $provider_name,
			'url' => $provider_url,
		];
	}

	/**
	 * Get provider information from a url and html string.
	 *
	 * @since 1.0.0
	 *
	 * @param string $url
	 * @param string $html
	 * @return array
	 */
	private function get_author($url, $html = '') {
		$author_name = '';
		$author_url = '';

		// Get author name.
		if (preg_match('#<meta[^>]+name=([\'"])author\1[^>]*>#is', $html, $matches)) {
			if (preg_match('# content=([\'"])(.*?)\1#is', $matches[0], $matches)) {
				$author_name = $matches[2];
			}
		}

		$author_name = sanitize_text_field($author_name);

		/**
		 * Filters the provider name.
		 *
		 * @since 1.0.1
		 *
		 * @param string $author_name
		 * @param string $html
		 */
		$author_name = apply_filters('embed_extended_author_name', $author_name, $html);

		$author_url = esc_url($author_url);

		/**
		 * Filters the provider URL.
		 *
		 * @since 1.0.1
		 *
		 * @param string $author_url
		 * @param string $html
		 */
		$author_url = apply_filters('embed_extended_author_url', $author_url, $html);

		return [
			'name' => $author_name,
			'url' => $author_url,
		];
	}

	/**
	 * Trim HTML content.
	 *
	 * @since 1.3.1
	 *
	 * @param string $html
	 * @return string
	 */
	private function trim($html) {
		$max_loops = 4;

		do {
			$decoded = html_entity_decode($html);

			// Fix trimming &nbsp; problem.
			// https://stackoverflow.com/questions/6275380/does-html-entity-decode-replaces-nbsp-also-if-not-how-to-replace-it#comment28611595_6275467
			$decoded = trim(str_replace("\xC2\xA0", ' ', $decoded));

			if ($decoded === $html) {
				$html = $decoded;
				break;
			}

			$html = $decoded;
			$max_loops--;
		} while (0 <= $max_loops);

		return $html;
	}
}
