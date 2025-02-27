<?php
/*
Plugin Name: Pz-HatenaBlogCard
Plugin URI: http://poporon.poponet.jp/pz-hatenablogcard
Description: リンクを「はてなブログカード」で表示します。
Version: 1.3.0
Author: poporon
Author URI: http://poporon.poponet.jp
License: GPLv2 or later
*/

class Pz_HatenaBlogCard {

	public $slug;			// slug
	public $text_domain;	// as slug

	public $plugin_dir_path;
	public $plugin_dir_url;

	public $options;
	public $defaults;

	public $plugin_link;	// link to plugin page

	public function __construct() {
		$this->slug			= basename(dirname(__FILE__));
		$this->text_domain	= $this->slug;

		$this->plugin_dir_path	= plugin_dir_path(__FILE__);
		$this->plugin_dir_url	= plugin_dir_url(__FILE__);

		$this->defaults	 = array(
			'code1' => 'blogcard',
			'code2' => 'BLOGCARD',
			'code3' => null,
			'code4' => null,
			'border' => '1',
			'width' => '480px',
			'content-height' => '108px',
			'margin-top' => '',
			'margin-bottom' => '16px',
			'margin-left' => '',
			'margin-right' => '16px',
			'centering' => null,
			'radius' => null,
			'shadow' => null,
			'shadow-inset' => null,
			'special-format' => null,
			'use-inline' => null,
			'use-sitename' => null,
			'use-hatena-in' => null,
			'use-hatena' => '1',
			'display-url' => null,
			'display-excerpt' => '1',
			'info-position' => '2',
			'size-title' => '16px',
			'size-url' => '9px',
			'size-excerpt' => '11px',
			'size-info' => '10px',
			'size-plugin' => '7px',
			'color-plugin' => '#888',
			'color-title' => '#111',
			'color-url' => '#468',
			'color-excerpt' => '#333',
			'color-info' => '#444',
			'color-plugin' => '#888',
			'ex-bgcolor' => '#fff',
			'in-bgcolor' => '#fff',
			'th-bgcolor' => '#eee',
			'ex-image' => null,
			'in-image' => null,
			'th-image' => null,
			'ex-info' => '',
			'in-info' => '（このサイト内）',
			'th-info' => '（このページ）',
			'ex-target' => '1',
			'in-target' => null,
			'ex-thumbnail' => null,
			'in-thumbnail' => '1',
			'ex-favicon' => '3',
			'in-favicon' => '3',
			'favicon-api' => 'https://favicon.hatena.ne.jp/?url=%URL%',
			'thumbnail-api' => 'https://s.wordpress.com/mshots/v1/%URL%?w=100',
			'thumbnail-position' => '1',
			'thumbnail-shadow' => null,
			'style-reset-img' => '1',
			'style' => null,
			'css-file' => null,
			'css-path' => null,
			'css-url' => null,
			'use-snscache' => '1',
			'sns-position' => '2',
			'sns-hatena' => '1',
			'sns-facebook' => null,
			'sns-twitter' => null,
			'link-all' => null,
			'blockquote' => null,
			'nofollow' => null,
			'plugin-link' => null,
			'plugin-name' => 'Pz-HatenaBlogCard',
			'plugin-version' => '1.3.0',
			'plugin-url' => 'https://popozure.info/pz-hatenablogcard',
			'debug-time' => null,
			'saved-date' => time()
		);
		$this->options = get_option( 'Pz_HatenaBlogCard_options', $this->defaults );
		foreach ($this->defaults as $key => $value) {
			if (!isset($this->options[$key])) {
				$this->options[$key] = null;
			}
		}

		// バージョンが上がっていたら、オプションを更新する
		if ($this->options['plugin-version'] < $this->defaults['plugin-version']) {
			if ($this->options['plugin-version'] == '1.2.0') {
				$this->options['sns-hatena'] = '1';
			}
			$this->options += $this->defaults;
			$this->options['plugin-version'] = $this->defaults['plugin-version'];
			update_option( 'Pz_HatenaBlogCard_options', $this->options );
			require_once( 'pz-hatenablogcard-style.php' );
		}

		// CSS URLが空だったら生成
		if (!isset($this->options['style']) || is_null($this->options['style'])) {
			if (!isset($this->options['css-url']) || is_null($this->options['css-url'])) {
				require_once ('pz-hatenablogcard-style.php');
			}
		}

		// プラグインページへのリンクを生成
		if (isset($this->options['plugin-link']) && $this->options['plugin-link'] == '1') {
			$this->plugin_link = '<span class="linkcard-name"><a href="'.$this->options['plugin-url'].'" target="_blank" rel="nofollow">'.$this->options['plugin-name'].'</a></span>';
		} else {
			$this->plugin_link = '';
		}

		// ショートコードの設定
		if (isset($this->options['code1']) && $this->options['code1'] <> '') {
			add_shortcode($this->options['code1'], array($this, 'Pz_HatenaBlogCard_ShortCode'));
		}
		if (isset($this->options['code2']) && $this->options['code2'] <> '') {
			add_shortcode($this->options['code2'], array($this, 'Pz_HatenaBlogCard_ShortCode'));
		}
		if (isset($this->options['code3']) && $this->options['code3'] <> '') {
			add_shortcode($this->options['code3'], array($this, 'Pz_HatenaBlogCard_ShortCode'));
		}
		if (isset($this->options['code4']) && $this->options['code4'] <> '') {
			add_shortcode($this->options['code4'], array($this, 'Pz_HatenaBlogCard_ShortCode'));
		}

		// 管理画面のとき
		if (is_admin()) {
			load_plugin_textdomain		($this->text_domain, false, basename( dirname( __FILE__ ) ).'/languages' );		// 管理画面のみ日本語化
			register_activation_hook	(__FILE__,					array($this, 'Pz_HatenaBlogCard_activation'));		// 有効化したときの処理
//			register_deactivation_hook	(__FILE__,					array($this, 'Pz_HatenaBlogCard_deactivation'));	// 無効化したときの処理
//			add_action					('activated_plugin',		array($this, 'Pz_HatenaBlogCard_activation'));		// 有効化したときの処理
			add_action					('admin_menu',				array($this, 'Pz_HatenaBlogCard_add_menu'));		// 設定メニュー
			add_action					('admin_enqueue_scripts',	array($this, 'Pz_HatenaBlogCard_scripts_admin'));			// 設定メニュー用スクリプト
			add_filter	('plugin_action_links_'.plugin_basename(__FILE__),	array($this, 'Pz_HatenaBlogCard_action_links'));	// プラグイン画面
			if (!isset($this->options['style']) || is_null($this->options['style'])) {
				if (!isset($this->options['css-path']) || !file_exists($this->options['css-path'])) {
					require_once ('pz-hatenablogcard-style.php');
				}
			}
		} else {
			if (!isset($this->options['style'])) {
				if (!isset($this->options['css-url'])) {
					require_once ('pz-hatenablogcard-style.php');
				}
			}
			add_action				('wp_enqueue_scripts',				array($this, 'Pz_HatenaBlogCard_scripts'));
		}
	}

	public function Pz_HatenaBlogCard_scripts_admin($hook) {
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('colorpicker-script', plugins_url('color-picker.js', __FILE__), array('wp-color-picker'), false, true);
	}

	public function Pz_HatenaBlogCard_scripts($hook) {
		if (!isset($this->options['style'])) {
			wp_enqueue_style	('Pz-HatenaBlogCard', $this->options['css-url']);
		} else {
			if (isset($this->options['css-file'])) {
				wp_enqueue_style('Pz-HatenaBlogCard', $this->options['css-file']);
			}
		}
	}

	public function Pz_HatenaBlogCard_add_menu() {
		add_options_page(__('HatenaBlogCard Settings', $this->text_domain),__('HatenaBlogCard', $this->text_domain),'manage_options', 'Pz_HatenaBlogCard_settings', array($this, 'Pz_HatenaBlogCard_option_page') );
	}

	public function Pz_HatenaBlogCard_activation() {
		$this->options = get_option('Pz_HatenaBlogCard_options', $this->defaults);
		if ($this->options['plugin-version'] <> $this->defaults['plugin-version']) {
			foreach ($this->defaults as $key => $value) {
				if (!isset($this->options[$key])) {
					$this->options[$key] = null;
				}
			}
			$this->options['plugin-version'] = $this->defaults['plugin-version'];
		}
		update_option('Pz_HatenaBlogCard_options', $this->options);

//		require_once ('pz-hatenablogcard-style.php');
	}

	public function Pz_HatenaBlogCard_deactivation() {
	}

	public function Pz_HatenaBlogCard_option_page() {
		require_once('pz-hatenablogcard-options.php');
	}

	public function Pz_HatenaBlogCard_action_links($links) {
		$links = array( '<a href="options-general.php?page=Pz_HatenaBlogCard_settings">'.__('Settings', $this->text_domain).'</a>' ) + $links;
		return $links;
	}

	public function Pz_HatenaBlogCard_ShortCode($atts, $content = null ) {
		$url			= null;
		$title			= null;
		$excerpt		= null;
		$sns			= null;
		$sns_title		= null;
		$sns_info		= null;
		$thumbnail		= null;
		$thumbnail_url	= null;

		if (is_user_logged_in()) {
			// 時間計測
			$start_time = microtime(true);
		}

		// HTMLタグ（結果）
		$tag = '';

		// リンク先URL
		$url = isset($atts['url']) ? $atts['url'] : null;
		$url_esc = esc_url($url);

		// リンク先URLからドメイン名を抽出
		preg_match('{https?://(.+?)/}i', $url.'/',$m);
		$domain_url = $m[0];
		$domain = $m[1];

		// 自サイトチェック
		if (preg_match('{'.home_url().'\/.*?}', $url.'/')) {
			if (preg_match('{'.get_permalink().'\/*}',$url)) {
				$link_type = 2;				// 自ページ
			} else {
				$link_type = 1;				// 自サイト内
			}
			if (isset($this->options['in-target']) && $this->options['in-target'] == '1') {
				$target = ' target="_blank"';	// 新しいページで開く
			} else {
				$target = '';					// 新しいページで開かない
			}
				$nofollow = '';
		} else {
			$link_type = 3;					// 外部サイト
			$target = ' target="_blank"';	// 新しいページで開く
			$nofollow = isset($this->options['nofollow']) ? ' rel="nofollow"' : null;
		}

		// パラメータ取得（タイトル・抜粋文）
		switch (isset($this->options['use-inline']) ? $this->options['use-inline'] : null) {
		case '1':
			$excerpt = isset($content) ? $content : null;
			break;
		case '2':
			$title = isset($content) ? $content : null;
			break;
		}
		if ($title == '' && isset($atts['title'])) {
			$title = $atts['title'];
		}
		if ($excerpt == '') {
			if (isset($atts['content'])) {
				$excerpt = $atts['content'];
			} elseif (isset($atts['description'])) {
				$excerpt = $atts['description'];
			}
		}

		if ($link_type == 3) {
			if (!$title && $this->options['use-hatena'] == '1') {
				// 「はてなブログカード」をそのまま利用する
				$tag = '<div class="hatena-webcard-wrapper"><iframe src="https://hatenablog-parts.com/embed?url='. $url .'" class="hatena-webcard-iframe" scrolling="no" frameborder="0"></iframe></div>';
			} else {
				$domain_info = isset($this->options['ex-info']) ? $this->options['ex-info'] : null ;	// サイト情報
				$site_name = $domain;
				// サムネイル取得
				if ($this->options['thumbnail-position'] <> '0') {
					switch ($this->options['ex-thumbnail']) {
					case '1':
						$thumbnail = null;
						break;
					case '3':
						// 画像取得
						if (isset($this->options['thumbnail-api'])) {
							$thumbnail = preg_replace('/%DOMAIN_URL%/', $domain_url, $this->options['thumbnail-api'] );
							$thumbnail = preg_replace('/%DOMAIN%/', $domain, $thumbnail);
							$thumbnail = preg_replace('/%URL%/', $url_esc, $thumbnail);
							$thumbnail = '<img class="linkcard-thumbnail-image" src="'.$thumbnail.'">';
						}
						break;
					}
				}
				// ファビコン取得
				switch ($this->options['ex-favicon']) {
				case '3':
					if (isset($this->options['favicon-api']) && $this->options['favicon-api']<>'') {
						$favicon = preg_replace('/%DOMAIN_URL%/', $domain_url, $this->options['favicon-api'] );
						$favicon = preg_replace('/%DOMAIN%/', $domain, $favicon);
						$favicon = preg_replace('/%URL%/', $url_esc, $favicon);
						$favicon = '<img class="linkcard-favicon" src="'.$favicon.'" />';
					}
					break;
				default:
					$favicon = null;
				}
			}
		} else {												// 自サイト
			// 自サイト内処理
			if (isset($this->options['use-sitename']) && $this->options['use-sitename'] == '1') {
				$site_name = get_bloginfo('name');		  // サイト名
			} else {
				$site_name = $domain;
			}
			$id = url_to_postid(strip_tags($url));	  // 記事ID
			$post = get_post($id);					  // 記事情報

			// タイトル取得
			if ($title == '' ) {
				if ($id == 0) {
					$title = get_bloginfo('name');
				} else {
					$title = $post->post_title; // タイトル
				}
				// 抜粋文取得
				if ($excerpt == '' ) {
					if ($id == 0) {
						$excerpt = get_bloginfo('description');
					} else{
						$excerpt = $post->post_content; // 記事内容
					}
					$excerpt = preg_replace('/<!--more-->.+/is','',$excerpt);   //moreタグ以降削除
					$excerpt = preg_replace('/\[[^]]*\]/','',$excerpt);	 // ショートコードすべて除去
					$excerpt = strip_tags($excerpt);				//タグの除去
					$excerpt = str_replace('&nbsp;','',$excerpt);		   //特殊文字の削除（今回はスペースのみ）
					$excerpt = mb_strimwidth($excerpt, 0, 130, '...');
				}
			}

			// サムネイル取得
			if ($this->options['thumbnail-position'] <> '0') {
				switch ($this->options['in-thumbnail']) {
				case '1':
					$thumbnail = get_the_post_thumbnail($id, 'thumbnail' , array('class' => 'linkcard-thumbnail-image'));
					break;
				case '3':
					// 画像取得
					if (isset($this->options['thumbnail-api'])) {
						$thumbnail = preg_replace('/%DOMAIN_URL%/', $domain_url, $this->options['thumbnail-api'] );
						$thumbnail = preg_replace('/%DOMAIN%/', $domain, $thumbnail);
						$thumbnail = preg_replace('/%URL%/', $url, $thumbnail);
						$thumbnail = '<img class="linkcard-thumbnail-image" src="'.$thumbnail.'">';
					}
					break;
				}
			}

			// ファビコン取得
			switch ($this->options['in-favicon']) {
			case '1':
				if (function_exists('has_site_icon')) {
					$favicon = get_site_icon_url(16, '', 0);
					$favicon = '<img class="linkcard-favicon" src="'.$favicon.'" />';
				}
				break;
			case '3':
				if (isset($this->options['favicon-api']) && $this->options['favicon-api']<>'') {
					$favicon = preg_replace('/%DOMAIN_URL%/', $domain_url, $this->options['favicon-api'] );
					$favicon = preg_replace('/%DOMAIN%/', $domain, $favicon);
					$favicon = preg_replace('/%URL%/', $url_esc, $favicon);
					$favicon = '<img class="linkcard-favicon" src="'.$favicon.'" />';
				}
				break;
			default:
				$favicon = null;
			}
		}

		if ($tag == '') {
			switch ($link_type) {
			case 1:			// 内部リンク
				$info	= $this->options['in-info'];		// サイト情報
				$wrap	= '<div class="linkcard-internal-wrapper">';	// ラッピング

				break;
			case 2:			// この記事
				$info	= $this->options['th-info'];		// サイト情報
				$wrap	= '<div class="linkcard-this-wrapper">';	// ラッピング
				break;
			default:		// 外部リンク
				$info	= $this->options['ex-info'];		// サイト情報
				$wrap	= '<div class="linkcard-external-wrapper">';	// ラッピング
				break;
			}

			if (!isset($this->options['display-excerpt']) || is_null($this->options['display-excerpt'])) {
				$excerpt = '';
			}

			// リンク先URL
			$a_op = '<a class="no_icon" href="'.$url.'"'.$target.$nofollow.'>';
			$a_cl = '</a>';
			if ((isset($this->options['link-all']) ? $this->options['link-all'] : null) == '1') {
				$a_op_all = $a_op;
				$a_cl_all = $a_cl;
				$a_op = '';
				$a_cl = '';
			} else {
				$a_op_all = '';
				$a_cl_all = '';
			}

			// ソーシャルカウント
			if (isset($this->options['sns-position'])) {
				$opt = array( 'timeout' => 1 );
				$sns = '<span class="linkcard-share">';
				if (isset($this->options['sns-hatena'])) {
					$array = wp_remote_get( 'http://api.b.st-hatena.com/entry.count?url=' .rawurlencode($url), $opt);
					if (isset($array) && !is_wp_error($array)) {
						$count = $array['body'] - 0;
						if ($count > 0 ) {
							if ($a_op == '') {
								$sns .= ' <span class="linkcard-sns-hatena no_icon">'.$count.'&nbsp;user'.(($count > 1) ? 's' : '').'</span>';
							} else {
								$sns .= ' <a class="linkcard-sns-hatena no_icon" href="http://b.hatena.ne.jp/entry/' .rawurlencode($url).'" target="_blank">'.$count.'&nbsp;user'.(($count > 1) ? 's' : '').'</a>';
							}
						}
					}
				}

				if (isset($this->options['sns-facebook'])) {
					$array = wp_remote_get( 'http://graph.facebook.com/?id=' .rawurlencode($url), $opt );
					if (isset($array) && !is_wp_error($array)) {
						$json = json_decode($array['body']);
						$count = (isset($json->shares) ? $json->shares : 0) - 0;
						if ($count > 0 ) {
							if ($a_op == '') {
								$sns .= ' <span class="linkcard-sns-facebook no_icon">'.$count.'&nbsp;share'.(($count > 1) ? 's' : '').'</span>';
							} else {
								$sns .= ' <a class="linkcard-sns-facebook no_icon" href="https://www.facebook.com/sharer/sharer.php?u="' .rawurlencode($url).' target="_blank">'.$count.'&nbsp;share'.(($count > 1) ? 's' : '').'</a>';
							}
						}
					}
				}
				if (isset($this->options['sns-twitter'])) {
					$array = wp_remote_get( 'http://jsoon.digitiminimi.com/twitter/count.json?url=' .rawurlencode($url), $opt );
					if (isset($array) && !is_wp_error($array)) {
						$count = json_decode($array['body'])->count - 0;
						if ($count > 0 ) {
							if ($a_op == '') {
								$sns .= ' <span class="linkcard-sns-twitter no_icon">'.$count.'&nbsp;tweet'.(($count > 1) ? 's' : '').'</span>';
							} else{
								$sns .= ' <a class="linkcard-sns-twitter no_icon" href="https://twitter.com/intent/tweet?url=' .rawurlencode($url).'&text='.$title.'" target="_blank">'.$count.'&nbsp;tweet'.(($count > 1) ? 's' : '').'</a>';
							}
						}
					}
				}
				$sns .= '</span>';
				if ($this->options['sns-position'] == '1') {
					$sns_title = $sns;
				} else {
					$sns_info = $sns;
				}
			}

			// サイト情報
			$domain_info = '<div class="linkcard-info">'.$a_op.'<span class="linkcard-domain">'.$favicon.'&nbsp;'.$site_name.$info.'</span>'.$a_cl.'&nbsp;'.$sns_info.$this->plugin_link.'</div>';

			// 記事内容
			$content = '<div class="linkcard-content">'.$a_op.'<span class="linkcard-thumbnail">'.$thumbnail.'</span><span class="linkcard-title">'.$title.$a_cl.'</span>'.$sns_title.'<div class="linkcard-url"><cite>'.$a_op.$url.$a_cl.'</cite></div><div class="linkcard-excerpt">'.$excerpt.'</div></div>';

			// HTMLタグ作成
			switch (isset($this->options['info-position']) ? $this->options['info-position'] : null) {
			case '1':
				$tag = $a_op_all.$wrap.$domain_info.$content.'<div class="clear"></div></div>'.$a_cl_all;
				break;
			case '2':
				$tag = $a_op_all.$wrap.$content.$domain_info.'<div class="clear"></div></div>'.$a_cl_all;
				break;
			default:
				$tag = $a_op_all.$wrap.$content.'<div class="clear"></div></div>'.$a_cl_all;
			}
		}

		// 引用文扱い
		if (isset($this->options['blockquote']) ? $this->options['blockquote'] : null == '1') {
			$tag = '<div class="linkcard"><blockquote class="linkcard-quote">'.$tag.'</blockquote></div>';
		} else {
			$tag = '<div class="linkcard">'.$tag.'</div>';
		}

		// 実行時間
		if (is_user_logged_in()) {
			if (isset($this->options['debug-time'])) {
				$end_time = microtime(true);
				$tag = '<!-- Pz-HBC ('.number_format($end_time - $start_time, 8, '.', ',').'sec) -->'.$tag.'<!-- /Pz-HBC -->';
			}
		}
		return $tag;
	}
}
$Pz_HatenaBlogCard = new Pz_HatenaBlogCard;