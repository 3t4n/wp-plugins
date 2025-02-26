<?php

/**
 * Embed fetcher class.
 *
 * @since 1.0.0
 */
class Embed_Extended_Fetcher {
	/**
	 * User-agent used for HTTP requests.
	 */
	const USER_AGENT = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';

	/**
	 * Singleton pattern instance.
	 *
	 * @var Embed_Extended_Fetcher
	 */
	private static $instance = null;

	/**
	 * Singleton pattern method.
	 *
	 * @return Embed_Extended_Fetcher
	 */
	public static function instance() {
		if (null === self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Constructor.
	 */
	private function __construct() {
		$providers = [
			'bilibili_video' => [
				'#https?://www\.bilibili\.com/video/([^/\?]+)#i',
				[$this, 'embed_bilibili_video'],
			],
			'google_maps' => [
				'#https?://www\.google\.(com|[a-z]{2,3}\.[a-z]{2})/maps/(.+)#i',
				[$this, 'embed_google_maps'],
			],
			'github_code' => [
				'#(https?)://github\.com/(([^/]+/){2})blob/(([^/]+/){1,}.+)$#i',
				[$this, 'embed_github_code'],
			],
			'github_gist' => [
				'#(https?://gist\.github\.com/[^/]+/[a-fA-F0-9]+)(\#file-(.+))?#i',
				[$this, 'embed_github_gist'],
			],
			'gitlab_code' => [
				'#(https?://gitlab\.com/([^/]+/){2,})blob/(([^/]+/){1,}.+)$#i',
				[$this, 'embed_gitlab_code'],
			],
			'iqiyi_video' => [
				'#https?://www\.iq\.com/play/([^/\?]+)#i',
				[$this, 'embed_iqiyi_video'],
			],
			'tencent_video' => [
				'#https?://v\.qq\.com/x/(page|cover(/[^/]+)?)/(.+)\.html#i',
				[$this, 'embed_tencent_video'],
			],
			'twitch' => [
				'#https?://www\.twitch\.tv/((video|collection)s/)?([^/\?]+)#i',
				[$this, 'embed_twitch'],
			],
			'waze' => [
				'#https?://www\.waze\.com/([^/]+/)?livemap/directions[/\?](.+)#i',
				[$this, 'embed_waze'],
			],
			'youku' => [
				'#https?://v\.youku\.com/v_show/id_(.+)\.html#i',
				[$this, 'embed_youku_video'],
			],
			'file_audio' => [
				'#^https?://.+?\.(' . join('|', wp_get_audio_extensions()) . ')$#i',
				[$this, 'embed_file_audio'],
			],
			'file_video' => [
				'#^https?://.+?\.(' . join('|', wp_get_video_extensions()) . ')$#i',
				[$this, 'embed_file_video'],
			],
			'file_code' => [
				'#^https?://.+?\.(' . join('|', $this->file_code_extensions()) . ')$#i',
				[$this, 'embed_file_code'],
			],
			'file_pdf' => ['#^https?://.+?\.pdf$#i', [$this, 'embed_file_pdf']],
			'html' => ['#^https?://.+$#i', [$this, 'embed_html']],
		];

		/**
		 * Filters known provider handlers.
		 *
		 * @since 1.0.2
		 *
		 * @param array $providers
		 */
		$this->providers = apply_filters('embed_extended_providers', $providers);

		add_filter('embed_extended_cache_patterns', [$this, 'embed_patterns'], 10, 1);
	}

	/**
	 * Fetch embed data from the URL.
	 *
	 * @param string $url
	 * @return object|false
	 */
	public function fetch($url) {
		// Included/excluded URL patterns.
		$patterns = get_option('embed_extended_url_patterns', '');
		$patterns = preg_split('/,|\r\n|\r|\n/', $patterns);
		$patterns = array_filter(array_map('trim', $patterns));
		if (!empty($patterns)) {
			$mode = get_option('embed_extended_url_patterns_mode', 'exclude');
			$skip = 'include' === $mode ? true : false;
			foreach ($patterns as $pattern) {
				if (false !== stripos($url, $pattern)) {
					$skip = !$skip;
					break;
				}
			}
			if ($skip) {
				return false;
			}
		}

		$data = $this->check_known_provider($url);
		if ($data) {
			return $data;
		}

		return false;
	}

	/**
	 * Check the URL against known providers.
	 *
	 * @since 1.0.2
	 *
	 * @param string $url
	 * @return object|false
	 */
	private function check_known_provider($url) {
		$data = false;

		foreach ($this->providers as $provider) {
			if (preg_match($provider[0], $url, $matches)) {
				$cache_key = 'embed_extended_' . md5($url);
				$data = get_transient($cache_key);

				if (!$data && is_callable($provider[1])) {
					$data = call_user_func($provider[1], $url, $matches);
					$ttl = apply_filters('rest_oembed_ttl', DAY_IN_SECONDS, $url);
					set_transient($cache_key, $data, $ttl);
				}

				break;
			}
		}

		if ($data) {
			if (is_string($data)) {
				$data = (object) ['html' => $data];
			}

			return $data;
		}

		return false;
	}

	/**
	 * Get text content of a URL.
	 *
	 * @since 1.3.0
	 *
	 * @param string $url
	 * @param array $opts
	 * @return array
	 */
	public function get_url_contents($url, $opts = []) {
		$request_args = ['user-agent' => self::USER_AGENT, 'timeout' => 20];

		// Try to sniff header informations to avoid fetching full content if not necessary.
		$sniff_head = isset($opts['sniff_head']) ? $opts['sniff_head'] : true;

		// Get the content type.
		if ($sniff_head) {
			$request = wp_safe_remote_head($url, $request_args);
			$content_type_raw = wp_remote_retrieve_header($request, 'content-type');
			$content_type = preg_replace('#^([^/]+/[^;]+).*$#i', '$1', $content_type_raw);
			$content = '';
		} else {
			$request = wp_safe_remote_get($url, $request_args);
			$content_type_raw = wp_remote_retrieve_header($request, 'content-type');
			$content_type = preg_replace('#^([^/]+/[^;]+).*$#i', '$1', $content_type_raw);
			$content = wp_remote_retrieve_body($request);
		}

		// Only fetch text content.
		$is_text = preg_match('#^(text/|application/javascript)#i', $content_type);
		if ($is_text && $sniff_head) {
			$request = wp_safe_remote_get($url, $request_args);
			$content = wp_remote_retrieve_body($request);

			// Convert encoding if necessary.
			if (preg_match('#;\s*charset\s*=(.+)$#i', $content_type_raw, $matches)) {
				$content_charset = strtoupper(trim($matches[1]));
				if ('UTF-8' !== $content_charset) {
					$content = mb_convert_encoding($content, 'UTF-8', $content_charset);
				}
			}
		}

		return [
			'content_type' => $content_type,
			'content' => $content,
		];
	}

	/**
	 * Add embed cache patterns generated by this plugin.
	 *
	 * @since 1.3.0
	 *
	 * @param array $patterns
	 * @return array
	 */
	public function embed_patterns($patterns) {
		$patterns[] = 'www.google.com/maps/embed/v1';
		$patterns[] = 'player.twitch.tv';
		$patterns[] = 'embed.waze.com/iframe';
		$patterns[] = 'docs.google.com/viewer?';

		return $patterns;
	}

	/**
	 * Embed Bilibili videos.
	 *
	 * @since 1.4.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_bilibili_video($url, $matches) {
		$id = $matches[1];

		$attr = wp_embed_defaults($url);

		$src = '//player.bilibili.com/player.html?bvid=' . $id . '&page=1';

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" scrolling="no" border="0" frameborder="no" framespacing="0" allowfullscreen="true"></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed Google Maps.
	 *
	 * @link https://developers.google.com/maps/documentation/embed/guide
	 *
	 * @since 1.1.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_google_maps($url, $matches) {
		$tld = $matches[1];
		$path = $matches[2];
		$mode = false;
		$params = [];

		// Detect embed mode from the provided URL.
		if (preg_match('#place/([^/]+)/@#', $path, $_matches)) {
			$mode = 'place';
			$params['q'] = $_matches[1];
		} elseif (preg_match('#dir/((?:[^/]+/){2,})@#', $path, $_matches)) {
			$mode = 'directions';

			// Parse the waypoints.
			preg_match_all('#([^/]+)/#', $_matches[1], $_matches);
			$steps = $_matches[1];
			$params['origin'] = array_shift($steps);
			$params['destination'] = array_pop($steps);
			if (count($steps)) {
				$params['waypoints'] = implode('|', $steps);
			}

			// Parse selected direction mode.
			if (preg_match('#/data=.*\!3e([01234])#', $path, $_matches)) {
				$dir_modes = ['driving', 'bicycling', 'walking', 'transit', 'flying'];
				$params['mode'] = $dir_modes[(int) $_matches[1]];
			}

			// Parse avoid parameter.
			if (preg_match('#/data=.*\!([123])b1.*$#', $path, $_matches)) {
				preg_match_all('#\!([123])b1#', $_matches[0], $_matches);
				$avoid_modes = [null, 'highways', 'tolls', 'ferries'];
				$params['avoid'] = [];
				foreach ($_matches[1] as $avoid) {
					$params['avoid'][] = $avoid_modes[(int) $avoid];
				}
				$params['avoid'] = implode('|', array_unique($params['avoid']));
			}
		} elseif (preg_match('#search/([^/]+)/@(-?\d+.\d+,-?\d+.\d+),(\d+)z#', $path, $_matches)) {
			$mode = 'search';
			$params['q'] = $_matches[1];
			$params['center'] = $_matches[2];
			$params['zoom'] = $_matches[3];
		} elseif (preg_match('#@(-?\d+.\d+,-?\d+.\d+),(\d+)z#', $path, $_matches)) {
			$mode = 'view';
			$params['center'] = $_matches[1];
			$params['zoom'] = $_matches[2];
		} elseif (
			preg_match(
				// Street view URL pattern.
				'#@(-?\d+.\d+,-?\d+.\d+),(\d+)a,(\d+)y,([\d\.]+)h,([\d\.]+)t#',
				$path,
				$_matches
			)
		) {
			// Convert 1-179 pitch value into -90+90 degree pitch value.
			$pitch = (int) $_matches[5] - 90;

			// Satisfy parameter value requirements described here:
			// https://developers.google.com/maps/documentation/embed/guide#street_view_mode
			$fov = min(max((int) $_matches[3], 10), 100);
			$heading = min(max((int) $_matches[4], -180), 360);
			$pitch = min(max($pitch, -90), 90);

			$mode = 'streetview';
			$params['location'] = $_matches[1];
			$params['heading'] = $heading;
			$params['fov'] = $fov;
			$params['pitch'] = $pitch;
		}

		// Quit early if mode cannot be detected, which means that the URL is not supported.
		if (!$mode) {
			return false;
		}

		$api_key = get_option('embed_extended_gmaps_api_key', '');
		$attr = wp_embed_defaults($url);

		$src = 'https://www.google.com/maps/embed/v1/' . $mode . '?key=' . $api_key;
		$src .= '&' . http_build_query($params);

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" frameborder="0" style="border:0" allowfullscreen></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed code from github.com
	 *
	 * @since 1.3.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_github_code($url, $matches) {
		$file_url = $matches[1] . '://raw.githubusercontent.com/' . $matches[2] . $matches[4];
		$provider = $this->providers['file_code'];

		if (preg_match($provider[0], $file_url, $matches)) {
			if (is_callable($provider[1])) {
				return call_user_func($provider[1], $file_url, $matches, ['url' => $url]);
			}
		}

		return false;
	}

	/**
	 * Embed code from gist.github.com
	 *
	 * @link https://help.github.com/en/github/writing-on-github/creating-gists#about-gists
	 *
	 * @since 1.0.2
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_github_gist($url, $matches) {
		$src = $matches[1] . '.js';

		// Handle file-specific embed.
		if (isset($matches[3])) {
			try {
				$request = wp_safe_remote_get($src);
				$html = wp_remote_retrieve_body($request);

				preg_match('#\\' . $matches[2] . '\\\">([^<]+)<\\\/a>#i', $html, $matches_file);
				if ($matches_file && isset($matches_file[1])) {
					$src .= '?file=' . $matches_file[1];
				}
			} catch (Exception $e) {
				// Do nothing.
			}
		}

		$html = sprintf('<script src="%1$s"></script>', esc_attr($src));

		return $html;
	}

	/**
	 * Embed code from gitlab.com
	 *
	 * @since 1.3.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_gitlab_code($url, $matches) {
		$file_url = $matches[1] . 'raw/' . $matches[3];
		$provider = $this->providers['file_code'];

		if (preg_match($provider[0], $file_url, $matches)) {
			if (is_callable($provider[1])) {
				return call_user_func($provider[1], $file_url, $matches, ['url' => $url]);
			}
		}

		return false;
	}

	/**
	 * Embed iQiyi videos.
	 *
	 * @since 1.4.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_iqiyi_video($url, $matches) {
		$data = $this->get_url_contents($url, ['sniff_head' => false]);
		if (isset($data['content']) && is_string($data['content'])) {
			$canonical_pattern = '#<link[^>]+rel=([\'"])canonical\1[^>]*>#is';
			if (preg_match($canonical_pattern, $data['content'], $matches)) {
				if (preg_match('# href=([\'"])(.*?)\1#is', $matches[0], $matches)) {
					if (preg_match('#/([^/]+)-([^/-]+)#i', $matches[2], $matches)) {
						$id = $matches[2];
					}
				}
			}
		}

		if (!isset($id)) {
			return;
		}

		$attr = wp_embed_defaults($url);

		$src = 'https://em.iq.com/player.html?id=' . $id . '&mod=id&lang=en_us';

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed Tencent videos.
	 *
	 * @since 1.4.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_tencent_video($url, $matches) {
		// Handle cover URL with video ID.
		if ('cover' === $matches[1] && empty($matches[2])) {
			$data = $this->get_url_contents($url);
			if (isset($data['content']) && is_string($data['content'])) {
				$canonical_pattern = '#<link[^>]+rel=([\'"])canonical\1[^>]*>#is';
				if (preg_match($canonical_pattern, $data['content'], $matches)) {
					if (preg_match('# href=([\'"])(.*?)\1#is', $matches[0], $matches)) {
						if (preg_match('#/([^/]+)\.html#i', $matches[2], $matches)) {
							$id = $matches[1];
						}
					}
				}
			}
		} else {
			$id = $matches[3];
		}

		if (!isset($id)) {
			return;
		}

		$attr = wp_embed_defaults($url);

		$src = 'https://v.qq.com/txp/iframe/player.html?vid=' . $id;

		$html = sprintf(
			'<iframe src="%1$s" allowfullscreen="true" frameborder="0" style="width: %2$dpx; height: %3$dpx; max-width: 100%%"></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed Twitch videos, channels, and collections.
	 *
	 * @link https://dev.twitch.tv/docs/embed/video-and-clips
	 *
	 * @since 1.0.2
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_twitch($url, $matches) {
		$types = ['channel', 'video', 'collection'];
		$type = in_array($matches[2], $types) ? $matches[2] : $types[0];
		$id = $matches[3];
		$parent = $_SERVER['HTTP_HOST'];

		$src = sprintf(
			'https://player.twitch.tv/?%1$s=%2$s&parent=%3$s&autoplay=false',
			$type,
			$id,
			$parent
		);

		$attr = wp_embed_defaults($url);

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" frameborder="0" scrolling="no" allowfullscreen="true"></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed Waze Maps.
	 *
	 * @link https://developers.google.com/waze/iframe
	 *
	 * @since 1.1.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_waze($url, $matches) {
		$locale = $matches[1];
		$path = urldecode($matches[2]);
		$lat = false;
		$lon = false;

		// Detect latitude and longitude.
		if (preg_match('#latlng=(-?\d+.\d+),(-?\d+.\d+)#', $path, $_matches)) {
			$lat = $_matches[1];
			$lon = $_matches[2];
		}

		// Quit early if latitude and longitude cannot be detected.
		if (!($lat && $lon)) {
			return false;
		}

		$attr = wp_embed_defaults($url);

		$src = 'https://embed.waze.com/iframe?zoom=14&pin=1&desc=1';
		$src .= '&lat=' . $lat . '&lon=' . $lon;

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" frameborder="0" style="border:0" allowfullscreen></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed Youku videos.
	 *
	 * @since 1.4.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_youku_video($url, $matches) {
		$id = $matches[1];

		$attr = wp_embed_defaults($url);

		$src = 'https://player.youku.com/embed/' . $id;

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" frameborder="0" allowfullscreen></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed audio file directly.
	 *
	 * Wrapper for {@see 'wp_embed_handler_audio'}
	 * @link https://developer.wordpress.org/reference/functions/wp_embed_handler_audio/
	 *
	 * @since 1.1.1
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_file_audio($url, $matches) {
		$user_func = apply_filters('wp_audio_embed_handler', 'wp_embed_handler_audio');

		$attr = wp_embed_defaults($url);
		$attr['height'] = round(($attr['width'] * 9) / 16);
		$rawattr = $attr;

		$shortcode = call_user_func($user_func, $matches, $attr, $url, $rawattr);

		return do_shortcode($shortcode);
	}

	/**
	 * Embed video file directly.
	 *
	 * Wrapper for {@see 'wp_embed_handler_video'}
	 * @link https://developer.wordpress.org/reference/functions/wp_embed_handler_video/
	 *
	 * @since 1.1.1
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_file_video($url, $matches) {
		$user_func = apply_filters('wp_video_embed_handler', 'wp_embed_handler_video');

		$attr = wp_embed_defaults($url);
		$attr['height'] = round(($attr['width'] * 9) / 16);
		$rawattr = $attr;

		$shortcode = call_user_func($user_func, $matches, $attr, $url, $rawattr);

		return do_shortcode($shortcode);
	}

	/**
	 * Embed PDF file directly.
	 *
	 * @since 1.2.0
	 *
	 * @param string $url
	 * @param array $matches
	 * @return string
	 */
	private function embed_file_pdf($url, $matches) {
		$attr = wp_embed_defaults($url);
		$src = 'https://docs.google.com/viewer?embedded=true&url=' . urlencode($url);

		$html = sprintf(
			'<iframe src="%1$s" width="%2$d" height="%3$d" frameborder="0" style="border:0" allowfullscreen></iframe>',
			esc_attr($src),
			esc_attr($attr['width']),
			esc_attr(round(($attr['width'] * 9) / 16))
		);

		return $html;
	}

	/**
	 * Embed code file directly.
	 *
	 * @since 1.3.0
	 *
	 * @param string $file_url
	 * @param array $matches
	 * @param array $extra
	 * @return string
	 */
	private function embed_file_code($file_url, $matches, $extra = []) {
		$data = $this->get_url_contents($file_url);

		// Use embed_html parser for html content.
		$is_html = preg_match('#^text/html#i', $data['content_type']);
		if ($is_html) {
			return $this->embed_html($file_url);
		}

		// Get the requested URL.
		$url = isset($extra['url']) ? $extra['url'] : $file_url;

		// Get title from the file name.
		preg_match('#([^/]+)$#is', $url, $title_matches);
		$title = $title_matches[1];

		// Get provider information from the domain.
		preg_match('#^https?://([^/:]+)#is', $url, $provider_matches);
		$provider_name = $provider_matches[1];
		$provider_url = $provider_matches[0];

		$html = Embed_Extended()->get_template('embed-iframe', ['url' => $url, 'title' => $title]);

		$attr = wp_embed_defaults($url);
		$width = $attr['width'];
		$height = max(ceil(($width / 16) * 9), 200);

		// oembed data
		return (object) [
			'version' => '1.0',
			'type' => 'rich',
			'html' => $html,
			'width' => $width,
			'height' => $height,
			'title' => $title,
			'provider_name' => $provider_name,
			'provider_url' => $provider_url,

			// Custom oEmbed response parameters.
			'embed_extended_data' => [
				'type' => 'code',
				'url' => $url,
				'content_type' => $data['content_type'],
				'content' => $data['content'],
			],
		];
	}

	/**
	 * List of available file code extensions.
	 *
	 * @since 1.3.0
	 *
	 * @return array
	 */
	private function file_code_extensions() {
		$extensions = array_merge(
			['html', 'htm', 'xhtml', 'xml'],
			['js', 'jsx', 'ts', 'tsx', 'coffee', 'json'],
			['css', 'scss', 'sass', 'less', 'styl'],
			['php', 'py', 'pl', 'asp', 'aspx', 'rb', 'java', 'sql'],
			['java', 'c', 'cpp', 'c\+\+'],
			['sh', 'bash', 'zsh'],
			['conf', 'ini', 'md', 'yml', 'yaml', 'toml']
		);

		/**
		 * Filter allowed file code extensions.
		 *
		 * @since 1.3.0
		 *
		 * @param array $extensions
		 */
		return apply_filters('embed_extended_file_code_extensions', $extensions);
	}

	/**
	 * Embed general web pages.
	 *
	 * @since 1.3.0
	 *
	 * @param string $url
	 * @return string|false
	 */
	private function embed_html($url) {
		$parse_html = get_option('embed_extended_parse_html_content', true);
		if (!$parse_html) {
			return false;
		}

		$data = $this->get_url_contents($url);

		// Skip non-html content.
		$is_html = preg_match('#^text/html#i', $data['content_type']);
		if (!$is_html) {
			return false;
		}

		// Skip empty content.
		if (!$data['content']) {
			return false;
		}

		$parser = new Embed_Extended_Parser($url, $data['content']);
		$data = $parser->parse();
		if (!$data) {
			return false;
		}

		return $data;
	}
}
