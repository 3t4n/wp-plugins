<?php defined('ABSPATH' ) || wp_die; ?>
<?php
	// 「内部リンクの設定を参照」
	define('LIST_INTERNAL',	array(''	=>	__('It is common with setting Internal-card', TEXT_DOMAIN ), ) );

	// 「枠線の幅」
	define('LIST_PX',		array('1px' => __('1px', TEXT_DOMAIN ), '2px' => __('2px', TEXT_DOMAIN ), '3px' => __('3px', TEXT_DOMAIN ), '4px' => __('4px', TEXT_DOMAIN ), '5px' => __('5px', TEXT_DOMAIN ), '6px' => __('6px', TEXT_DOMAIN ), '7px' => __('7px', TEXT_DOMAIN ), '8px' => __('8px', TEXT_DOMAIN ), '9px' => __('9px', TEXT_DOMAIN ), '10px' => __('10px', TEXT_DOMAIN ), '11px' => __('11px', TEXT_DOMAIN ), '12px' => __('12px', TEXT_DOMAIN ), '13px' => __('13px', TEXT_DOMAIN ), '14px' => __('14px', TEXT_DOMAIN ), '15px' => __('15px', TEXT_DOMAIN ), '16px' => __('16px', TEXT_DOMAIN ), '17px' => __('17px', TEXT_DOMAIN ), '18px' => __('18px', TEXT_DOMAIN ), '19px' => __('19px', TEXT_DOMAIN ), '20px' => __('20px', TEXT_DOMAIN ), '21px' => __('21px', TEXT_DOMAIN ), '22px' => __('22px', TEXT_DOMAIN ), '23px' => __('23px', TEXT_DOMAIN ), '24px' => __('24px', TEXT_DOMAIN ), '25px' => __('25px', TEXT_DOMAIN ), '26px' => __('26px', TEXT_DOMAIN ), '27px' => __('27px', TEXT_DOMAIN ), '28px' => __('28px', TEXT_DOMAIN ), '29px' => __('29px', TEXT_DOMAIN ), '30px' => __('30px', TEXT_DOMAIN ), '31px' => __('31px', TEXT_DOMAIN ), '32px' => __('32px', TEXT_DOMAIN ), '33px' => __('33px', TEXT_DOMAIN ), '34px' => __('34px', TEXT_DOMAIN ), '35px' => __('35px', TEXT_DOMAIN ), '36px' => __('36px', TEXT_DOMAIN ), '37px' => __('37px', TEXT_DOMAIN ), '38px' => __('38px', TEXT_DOMAIN ), '39px' => __('39px', TEXT_DOMAIN ), '40px' => __('40px', TEXT_DOMAIN ), '41px' => __('41px', TEXT_DOMAIN ), '42px' => __('42px', TEXT_DOMAIN ), '43px' => __('43px', TEXT_DOMAIN ), '44px' => __('44px', TEXT_DOMAIN ), '45px' => __('45px', TEXT_DOMAIN ), '46px' => __('46px', TEXT_DOMAIN ), '47px' => __('47px', TEXT_DOMAIN ), '48px' => __('48px', TEXT_DOMAIN ), '49px' => __('49px', TEXT_DOMAIN ), '50px' => __('50px', TEXT_DOMAIN ), '51px' => __('51px', TEXT_DOMAIN ), '52px' => __('52px', TEXT_DOMAIN ), '53px' => __('53px', TEXT_DOMAIN ), '54px' => __('54px', TEXT_DOMAIN ), '55px' => __('55px', TEXT_DOMAIN ), '56px' => __('56px', TEXT_DOMAIN ), '57px' => __('57px', TEXT_DOMAIN ), '58px' => __('58px', TEXT_DOMAIN ), '59px' => __('59px', TEXT_DOMAIN ), '60px' => __('60px', TEXT_DOMAIN ), '61px' => __('61px', TEXT_DOMAIN ), '62px' => __('62px', TEXT_DOMAIN ), '63px' => __('63px', TEXT_DOMAIN ), '64px' => __('64px', TEXT_DOMAIN ), ) );
	
	// 「余白」の書式
	define('LIST_MARGIN',	array(
		''				=>		__('Not defined',		TEXT_DOMAIN ),
		'0'				=>		__('0',					TEXT_DOMAIN ),
		'4px'			=>		__('4px',				TEXT_DOMAIN ),
		'8px'			=>		__('8px',				TEXT_DOMAIN ),
		'12px'			=>		__('12px',				TEXT_DOMAIN ),
		'16px'			=>		__('16px',				TEXT_DOMAIN ),
		'20px'			=>		__('20px',				TEXT_DOMAIN ),
		'24px'			=>		__('24px',				TEXT_DOMAIN ),
		'32px'			=>		__('32px',				TEXT_DOMAIN ),
		'40px'			=>		__('40px',				TEXT_DOMAIN ),
		'48px'			=>		__('48px',				TEXT_DOMAIN ),
		'56px'			=>		__('56px',				TEXT_DOMAIN ),
		'64px'			=>		__('64px',				TEXT_DOMAIN ),
	) );

	// 「角丸め」の書式
	define('LIST_RADIUS',	array(
		''				=>		__('None',				TEXT_DOMAIN ),
		'2px'			=>		__('2px',				TEXT_DOMAIN ),
		'4px'			=>		__('4px',				TEXT_DOMAIN ),
		'6px'			=>		__('6px',				TEXT_DOMAIN ),
		'8px'			=>		__('8px',				TEXT_DOMAIN ),
		'12px'			=>		__('12px',				TEXT_DOMAIN ),
		'16px'			=>		__('16px',				TEXT_DOMAIN ),
		'20px'			=>		__('20px',				TEXT_DOMAIN ),
		'24px'			=>		__('24px',				TEXT_DOMAIN ),
		'32px'			=>		__('32px',				TEXT_DOMAIN ),
		'64px'			=>		__('64px',				TEXT_DOMAIN ),
		'50%'			=>		__('50%',				TEXT_DOMAIN ),
	) );

	// 「枠線」の書式
	define('LIST_BORDER',	array(
		'none'			=>		__('None',				TEXT_DOMAIN ),
		'solid'			=>		__('Solid',				TEXT_DOMAIN ),
		'dotted'		=>		__('Dotted',			TEXT_DOMAIN ),
		'dashed'		=>		__('Dashed',			TEXT_DOMAIN ),
		'double'		=>		__('Double',			TEXT_DOMAIN ),
		'groove'		=>		__('Groove',			TEXT_DOMAIN ),
		'ridge'			=>		__('Ridge',				TEXT_DOMAIN ),
		'inset'			=>		__('Inset',				TEXT_DOMAIN ),
		'outset'		=>		__('Outset',			TEXT_DOMAIN ),
	) );

	// 「新しいタブで開く」の書式
	define('LIST_NEWTAB',	array(
		''				=>		__('None',				TEXT_DOMAIN ),
		'1'				=>		__('All Client',		TEXT_DOMAIN ),
		'2'				=>		__('Other Than Mobile',	TEXT_DOMAIN ),
	) );

	// 引数・変数の設定
	$page				=	'pz-linkcard-settings';						// 設定画面のページ
	$action				=	isset($_POST['action'] )					?	esc_attr($_POST['action'] )					:	null ;
	$submit				=	isset($_POST['submit'] )					?	esc_attr($_POST['submit'] )					:	null ;
	$tab_now			=	isset($_POST['tab-now'] )					?	esc_attr($_POST['tab-now'] )				:	null ;
	$scroll_now			=	isset($_POST['scroll-now'] )				?	esc_attr($_POST['scroll-now'] )				:	null ;

	// 変更の保存ボタンを押したとき
	if	(!$action	&&	$submit ) {
		$action			=	'save-changed';
	}

	// nonceチェック
	if	($action ) {
		check_admin_referer('pz-settings' );
	}

	// デバグモード・管理モード
	$debug_mode			=	isset($this->options['debug-mode'] )		?	intval($this->options['debug-mode'] )		:	0 ;
	$survey_mode		=	isset($this->options['survey-mode'] )		?	intval($this->options['survey-mode'] )		:	0 ;
	$admin_mode			=	isset($this->options['admin-mode'] )		?	intval($this->options['admin-mode'] )		:	0 ;
	$develop_mode		=	isset($this->options['develop-mode'] )		?	intval($this->options['develop-mode'] )		:	0 ;
	$menu_error			=	isset($this->options['error-mode'] )		?	intval($this->options['error-mode'] )		:	0 ;
	$menu_multi			=	isset($this->options['multi-mode'] )		?	intval($this->options['multi-mode'] )		:	0 ;
	$menu_initialize	=	isset($this->options['flg-initialize'] )	?	intval($this->options['flg-initialize'] )	:	0 ;
	$inhibit			=	isset($this->options['flg-inhibit'] )		?	intval($this->options['flg-inhibit'] )		:	0 ;

	// 入力値
	$prop		=	null;
	if	(isset($_POST['properties'] ) ) {
		$prop		=	self::DEFAULTS;
		foreach	($_POST['properties']	as	$key => $value ) {
			$prop[$key]	=	stripslashes($value );
		}
		ksort($prop );

		// 管理者モードの解除
		if	(!$prop['debug-mode'] ) {
			$prop['survey-mode']			=	0;
			$prop['admin-mode']				=	0;
		}
		if	(!$prop['admin-mode'] ) {
			$prop['initialize-exception']	=	0;
		}
	} 

	// 画面入力値で修正
	$debug_mode			=	isset($prop['debug-mode'] )					?	intval($prop['debug-mode'] )				:	$debug_mode ;
	$survey_mode		=	isset($prop['survey-mode'] )				?	intval($prop['survey-mode'] )				:	$survey_mode ;
	$admin_mode			=	isset($prop['admin-mode'] )					?	intval($prop['admin-mode'] )				:	$admin_mode ;
	$develop_mode		=	isset($prop['develop-mode'] )				?	intval($prop['develop-mode'] )				:	$develop_mode ;
	$menu_error			=	isset($prop['error-mode'] )					?	intval($prop['error-mode'] )				:	$menu_error ;
	$menu_multi			=	isset($prop['multi-mode'] )					?	intval($prop['multi-mode'] )				:	$menu_multi ;
	$menu_initialize	=	isset($prop['flg-initialize'] )				?	intval($prop['flg-initialize'] )			:	$menu_initialize ;
	$inhibit			=	isset($prop['flg-inhibit'] )				?	intval($prop['flg-inhibit'] )				:	$inhibit ;

	// 暗転（準備中）
	if	($inhibit ) {
		echo		'<div id="pz-overlay-proc" style="display: inline;"></div>';
	} else {
		echo		'<div id="pz-overlay-proc" style="display: none;"></div>';
	}

	// マルチサイト
	$is_multisite	=	function_exists('is_multisite' )			?	is_multisite()								:	false ;
	$is_subdomain	=	function_exists('is_subdomain_install' )	?	is_subdomain_install()						:	false ;
	$multi_myid		=	function_exists('get_current_blog_id' )		?	get_current_blog_id()						:	0 ;
	$multi_count	=	0;
	if	($is_multisite ) {
		$menu_multi		=	1;
		$j				=	0;
		for ($i = 1; $i <= 1000; $i++ ) {
			$multi_detail	=	get_blog_details($i );
			if	(!$multi_detail ) {
				break;
			}
			if	(!$multi_detail->deleted ) {
				$j++;
				$multi_count			=	$j;
				$multi[$j]['id']		=	$multi_detail->blog_id;		// ブログID
				$multi[$j]['name']		=	$multi_detail->blogname;	// ブログ名
				$multi[$j]['url']		=	$multi_detail->home;		// ブログURL（Home_URL）
				$multi[$j]['domain']	=	preg_replace('/.*\/\/(.*)/', '$1', $multi_detail->home );	// ドメイン名
			}
		}
	}
	if	(!$is_multisite && $menu_multi &&  (!$debug_mode || !$admin_mode ) ) {
		$menu_multi	=	0;
	}

	// 出力するHTML
	$html_style		=	'';
	$html_plugin	=	'';
	$html_title		=	'';
	$html_input		=	'';
	$html_notice	=	'';

	// スタイルシート再生成の有無
	$flg_style		=	false;			// スタイルシートを再生成するか

	// プラグイン名・バージョン・環境表示
	$html_plugin		=	'<div class="pz-plugin">'.self::PLUGIN_NAME.' ver.'.PLUGIN_VERSION.$html_plugin.
			($debug_mode			?	'<span class="pz-plugin-env pz-plugin-env-debug">'.__('Debug Mode', TEXT_DOMAIN ).'</span>'				:	'' ).
			($survey_mode			?	'<span class="pz-plugin-env pz-plugin-env-survey">'.__('Survey Mode', TEXT_DOMAIN ).'</span>'			:	'' ).
			($develop_mode	==	1	?	'<span class="pz-plugin-env pz-plugin-env-develop">'.__('Develop Environment', TEXT_DOMAIN ).'</span>'	:	'' ).
			($develop_mode	==	2	?	'<span class="pz-plugin-env pz-plugin-env-product">'.__('Product Environment', TEXT_DOMAIN ).'</span>'	:	'' ).
			'</div>';

	// ページの見出し表示（設定）
	$page_class	=	' pz-settings';
	$switch_link	=	esc_url($this->cacheman_url );
	$switch_icon	=	__('&#x1f5c3;&#xfe0f;', TEXT_DOMAIN );
	$switch_label	=	__('Manager', TEXT_DOMAIN );
	$title_icon		=	__('&#x2699;&#xfe0f;', TEXT_DOMAIN );
	$title_label	=	__('Pz-LinkCard Settings', TEXT_DOMAIN );
	$help_page		=	self::AUTHOR_URL.'/pz-linkcard-manager';
	$html_title		=	'<div class="pz-header"><a class="pz-header-switch" href="'.$switch_link.'"><span class="pz-header-switch-icon">'.$switch_icon.'</span><span class="pz-header-switch-label">'.$switch_label.'</span></a><h1><span class="pz-header-title"><span class="pz-header-title-icon">'.$title_icon.'</span><span class="pz-header-title-text">'.$title_label.'</span><a class="pz-help-icon" href="'.$help_page.'" rel="external noopener help" target="_blank"><img src="'.$this->plugin_dir_url.'img/help.png" width="16" height="16" title="'.__('Help', TEXT_DOMAIN ).'" alt="help" /></a></span></h1></div>';

	// POSTする値 INPUT要素
	$temp_param		=
		array(
			'debug-mode'		=>		intval($debug_mode ),
			'survey-mode'		=>		intval($survey_mode ),
			'admin-mode'		=>		intval($admin_mode ),
			'develop-mode'		=>		intval($develop_mode ),
			'multi-mode'		=>		intval($menu_multi ),
			'tab-now'			=>		esc_attr($tab_now ),
			'scroll-now'		=>		esc_attr($scroll_now ),
		);
	foreach		($temp_param		as	$temp_name => $temp_value ) {
		$html_input	.=	'<input type="hidden" name="'.$temp_name.'" value="'.$temp_value.'" title="'.$temp_name.'" size="4" />';
	}

	// モードによって表示させる
	$html_style		.=	$debug_mode		==	0	?	'.pz-debug-only { display: none; } '	:	'';
	$html_style		.=	$admin_mode		==	0	?	'.pz-admin-only { display: none; } '	:	'';
	$html_style		.=	$develop_mode	==	0	?	'.pz-develop-only { display: none; } '	:	'';
	if	($html_style ) {
		$html_style	=	'<style>'.$html_style.'</style>';
	}

	// 記述エラー
	if	($this->options['error-mode'] ) {
		if	(!$this->options['error-mode-hide'] ) {
			$html_notice	.=	'<div class="notice notice-error is-dismissible"><p><strong>'.self::PLUGIN_NAME.': '.__('Invalid URL parameter in ', TEXT_DOMAIN ).'<a href="'.$this->options['error-url'].'#lkc-error" target="_blank">'.$this->options['error-url'].'</a></strong><br/>'.__('*', TEXT_DOMAIN ).' '.__('You can cancel this message from <a href="./options-general.php?page=pz-linkcard-settings">the setting screen</a>.', TEXT_DOMAIN ).'</p></div>';
		}
	}

	// プラグインのバージョンが違っている
	if	($this->options['plugin-version']	<>	PLUGIN_VERSION ) {
		$html_notice		.=	'<div class="notice notice-info is-dismissible"><p><strong>'.__('The plugin may have been updated.', TEXT_DOMAIN ).'</strong></p></div>';
		$flg_style			=	true;
	}

	// 定義漏れチェック
	if	( ($this->options['admin-mode'] ) && ($prop ) ) {
		foreach	(self::DEFAULTS as $key => $value ) {
			if	(!array_key_exists($key, $prop ) ) {
				$html_notice	.=	'<div class="notice notice-error is-dismissible">'.sprintf(__('Undefined key "%s" in Properties.<br/>It may be a glitch. Please inform the developer. (%s)', TEXT_DOMAIN ), $key, '<a href="https://x.com/'. self::AUTHOR_TWITTER .'" target="_blank">@'.self::AUTHOR_TWITTER.'</a>' ).'</div>';
			}
		}
		foreach	($prop as $key => $value ) {
			if	(!array_key_exists($key, self::DEFAULTS ) ) {
				$html_notice	.=	'<div class="notice notice-error is-dismissible">'.sprintf(__('Undefined key "%s" in DEFAULTS.<br/>It may be a glitch. Please inform the developer. (%s)', TEXT_DOMAIN ), $key, '<a href="https://x.com/'. self::AUTHOR_TWITTER .'" target="_blank">'.self::AUTHOR_TWITTER.'</a>' ).'</div>';
			}
		}
	}

	// アクションの指示があったとき
	if	($action ) {
		switch	($action ) {
		case	'save-changed':								// 変更を保存ボタン
			$flg_change			=	false;
			if	(isset($_POST['properties'] ) ) {
				$prop	=	self::DEFAULTS;
				foreach	($_POST['properties']	as	$key => $value ) {
					$prop[$key]	=	stripslashes($value );
					if	(array_key_exists($key, $this->options ) ) {
						if	($value		!==	$this->options[$key] ) {
							$flg_change	=	true;			// 変更あり
						}
					}
				}
			} else {
				$html_notice	.=	'<div class="notice notice-error is-dismissible"><p><strong>'.__('Could not retrieve the content to be changed.', TEXT_DOMAIN ).'</strong></p></div>';
			}
			
			// パラメーターに変更があった場合
			if	($flg_change ) {
				$this->options			=	$prop;
				$flg_error				=	false;						// エラーの有無
				require_once ('pz-linkcard-settings-validate.php' );	// 値の検証
				if	(!$flg_error ) {
					$result	=	$this->pz_SaveOptions();				// オプションの更新
					if	($result ) {
						$html_notice	.=	'<div class="notice notice-success is-dismissible"><p><strong>'.__('Succeeded in saving the settings.', TEXT_DOMAIN ).'</strong></p></div>';
					} else {
						$html_notice	.=	'<div class="notice notice-info is-dismissible"><p><strong>'.__('The settings have not changed.', TEXT_DOMAIN ).'</strong></p></div>';
					}
				}
			}
			$flg_style			=	true;				// スタイルシートの再生成
			break;

		case	'init-plugin':							// プラグインの再起動
			$this->activate();
			$flg_style			=	true;				// スタイルシートの再生成
			break;

		case	'init-settings':						// 設定の初期化
			$result		=	$this->pz_InitializeOptions();
			if	($result ) {
				$flg_style		=	true;				// スタイルシートの再生成
				$prop		=	$this->options;
				$html_notice	.=	'<div class="notice notice-success is-dismissible"><p><strong>'.__('Succeeded in initialize the settings.', TEXT_DOMAIN ).'</strong></p></div>';
			} else {
				$html_notice	.=	'<div class="notice notice-error is-dismissible"><p><strong>'.__('Failed to initialize the settings.', TEXT_DOMAIN ).'</strong></p></div>';
			}
			break;

		case	'clear-error':
			$flg_style			=	false;
			$menu_error			=	0;		
			$this->options['error-mode']	=	0;
			$result	=	$this->pz_SaveOptions();	// オプションの更新
			break;

		case	'run-pz_linkcard_check':
			$flg_style			=	false;
			break;

		case	'run-pz_linkcard_alive':
			$flg_style			=	false;
			break;

		default:

		}
	}

	// スタイルシート生成
	if	($flg_style ) {
		$result		=	$this->pz_SetStyle();
		switch		($result ) {
		case	1:
			$html_notice	.=	'<div class="notice notice-success is-dismissible"><p><strong>'.__('Updated the appearance of the LinkCard.', TEXT_DOMAIN).'</strong></p></div>';
			break;
		case	2:
			$html_notice	.=	'<div class="notice notice-error is-dismissible"><p><strong>'.__('Failed to save CSS-File.', TEXT_DOMAIN).'</strong></p></div>';
			break;
		case	9:
			$html_notice	.=	'<div class="notice notice-error is-dismissible"><p><strong>'.__('Failed to call CSS-Template.', TEXT_DOMAIN).'</strong></p></div>';
		default:
		}
	}

	// ぽぽづれ。のURL
	$pz_url			=	self::AUTHOR_URL;
	$pz_url_info	=	$this->Pz_GetURLInfo($pz_url );
	$pz_domain		=	$pz_url_info['domain'];				// ドメイン名
	$pz_domain_url	=	$pz_url_info['domain_url'];			// ドメインURL

	// Pz-LinkCardのURL
	$plugin_url			=	self::AUTHOR_URL.self::PLUGIN_PATH;

	// HELPアイコン
	$help_open			=	'&nbsp;<a href="'.$pz_url.'/pz-linkcard-settings-';
	$help_close			=	'" rel="external noopener help" target="_blank"><img src="'.$this->plugin_dir_url.'img/help.png" class="pz-help-icon" title="'.__('Help', TEXT_DOMAIN ).'" alt="help"></a>';

	// 各種ロゴ
	$logo_pz		=	'<img src="'.$this->plugin_dir_url.'img/icon_popozure.ico"    width="16" height="16" alt="'.__('Popozure Logo',		TEXT_DOMAIN ).'">';
	$logo_pz_lkc	=	'<img src="'.$this->plugin_dir_url.'img/icon-pz-linkcard.png" width="16" height="16" alt="'.__('Pz-LinkCard Logo',	TEXT_DOMAIN ).'">';
	$logo_wp		=	'<img src="'.$this->plugin_dir_url.'img/icon_WordPress.png"   width="16" height="16" alt="'.__('WordPress.org Logo',TEXT_DOMAIN ).'">';
	$logo_tw		=	'<img src="'.$this->plugin_dir_url.'img/icon_twitter.svg"     width="16" height="16" alt="'.__('Twitter Logo',		TEXT_DOMAIN ).'">';
	$logo_x			=	'<img src="'.$this->plugin_dir_url.'img/icon_x.svg"           width="16" height="16" alt="'.__('X Logo',			TEXT_DOMAIN ).'">';
	$logo_az		=	'<img src="'.$this->plugin_dir_url.'img/icon_amazon.png"      width="16" height="16" alt="'.__('Amazon Logo',		TEXT_DOMAIN ).'">';

	// 修正履歴
	$changelog		=	'';
	if	(!function_exists('wp_is_mobile' ) || !wp_is_mobile() ) {
		$changelog	=	file_get_contents($this->plugin_dir_path.'/readme.txt' );											// readme.txt を読み込み
		preg_match('/== Changelog ==[^=]*(=\s*[^=]*\s*=[^=]*=\s*[^=]*\s*=[^=]*=\s*[^=]*\s*=[^=]*=\s*[^=]*\s*=[^=]*=\s*[^=]*\s*=[^=]*)/m', $changelog, $m );
		$changelog	=	$m[1];
		$changelog	=	trim($changelog );
		$changelog	=	esc_html($changelog );
		$changelog	=	preg_replace('/^\* (.*)$/mi',				'<span class="pz-log-ja">*&ensp;$1</span>',								$changelog);	// 日本語文の行のインデント調整
		$changelog	=	preg_replace('/^  (.*)$/mi',				'<span class="pz-log-en">&ensp;&ensp;$1</span>',						$changelog);	// 英文の行のインデント調整
		$changelog	=	preg_replace('/= (.*) =\n/i',				'<h4>'.__('Version', TEXT_DOMAIN ).' $1</h4>',							$changelog);	// バージョン番号の表記調整

		$changelog	=	preg_replace('/\[added\]\s*/i',				'<span class="pz-log-added">Added</span>&ensp;',						$changelog);	// 追加
		$changelog	=	preg_replace('/\[fixed\]\s*/i',				'<span class="pz-log-fixed">Fixed</span>&ensp;',						$changelog);	// 修正
		$changelog	=	preg_replace('/\[modified\]\s*/i',			'<span class="pz-log-modified">Modified</span>&ensp;',					$changelog);	// 変更
		$changelog	=	preg_replace('/\[removed\]\s*/i',			'<span class="pz-log-removed">Removed</span>&ensp;',					$changelog);	// 修正
		$changelog	=	preg_replace('/\[tested\]\s*/i',			'<span class="pz-log-tested">Tested</span>&ensp;',						$changelog);	// テスト
		$changelog	=	preg_replace('/\[pending\]\s*/i',			'<span class="pz-log-pending">Pending</span>&ensp;',					$changelog);	// 保留事項

		$changelog	=	preg_replace('/&ensp;&ensp;added:\s*/i',	'&ensp;&ensp;<span class="pz-log-added">Added</span>&ensp;',			$changelog);	// 追加
		$changelog	=	preg_replace('/&ensp;&ensp;fixed:\s*/i',	'&ensp;&ensp;<span class="pz-log-fixed">Fixed</span>&ensp;',			$changelog);	// 修正
		$changelog	=	preg_replace('/&ensp;&ensp;modified:\s*/i',	'&ensp;&ensp;<span class="pz-log-modified">Modified</span>&ensp;',		$changelog);	// 変更
		$changelog	=	preg_replace('/&ensp;&ensp;removed:\s*/i',	'&ensp;&ensp;<span class="pz-log-removed">Removed</span>&ensp;',		$changelog);	// 修正
		$changelog	=	preg_replace('/&ensp;&ensp;tested:\s*/i',	'&ensp;&ensp;<span class="pz-log-tested">Tested</span>&ensp;',			$changelog);	// テスト
		$changelog	=	preg_replace('/&ensp;&ensp;pending:\s*/i',	'&ensp;&ensp;<span class="pz-log-pending">Pending</span>&ensp;',			$changelog);	// テスト
//		$changelog	=	preg_replace('/^.*（thanks ([0-9]+#comment-[0-9]+).*）$/i',						' (Thanks <a href="'.$pz_url.'/?p=$1" rel="external noopener noreferrer" target="_blank">'.$logo_pz.'$1</a>)', $changelog);						// Popozure.info のコメントへのリンク
//		$changelog	=	preg_replace('/（thanks [^@]*@([A-Za-z]+[A-Za-z0-9_]+).* wordpress.*）/i',	' (Thanks <a href="https://wordpress.org/support/users/$1/" rel="external noopener noreferrer" target="_blank">'.$logo_wp.'@$1</a>)', $changelog);	// WordPress.orgアカウントへのリンク
//		$changelog	=	preg_replace('/^[^(（]*（thanks ([^@]*)@([A-Za-z]+[A-Za-z0-9_]+).*\s*on\s*x\.com\s*）\s*$/im',			'<span class="pz-thx">Thanks&ensp;<span class="pz-thx-name">$2</span>&ensp;<a href="https://www.x.com/$2" rel="external noopener noreferrer" target="_blank" class="pz-thx-account">'.$logo_x.'@$2</a></span>', $changelog);	// Xアカウントへのリンク
//		$changelog	=	preg_replace('/^[^(（]*（thanks ([^@]*)@([A-Za-z]+[A-Za-z0-9_]+).*\s*on\s*twitter\.com\s*）\s*$/im',	'<span class="pz-thx">Thanks&ensp;<span class="pz-thx-name">$2</span>&ensp;<a href="https://www.x.com/$2" rel="external noopener noreferrer" target="_blank" class="pz-thx-account">'.$logo_x.'@$2</a></span>', $changelog);	// Twitterアカウントへのリンク
		$changelog	=	preg_replace('/（Thanks\s+([^\s@]*)\s*(@[^\s]*)\s+on x.com）/i',					'<a href="https://x.com/$2" class="pz-thx" rel="external noopener noreferrer" target="_blank">'.						'Thanks<span class="pz-thx-name">$1</span>'.$logo_x. '<span class="pz-thx-account">$2</span></a>', $changelog);	
		$changelog	=	preg_replace('/（Thanks\s+([^\s@]*)\s*(@[^\s]*)\s+on wordpress.org）/i',			'<a href="https://wordpress.org/support/users/$2" class="pz-thx" rel="external noopener noreferrer" target="_blank">'.	'Thanks<span class="pz-thx-name">$1</span>'.$logo_wp.'<span class="pz-thx-account">$2</span></a>', $changelog);	
		$changelog	=	preg_replace('/（Thanks\s+([^\s@]*)\s*(#[^\s]*)\s+on popozure.info）/i',			'<a href="'.$pz_url.'" class="pz-thx" rel="external noopener noreferrer" target="_blank">'.								'Thanks<span class="pz-thx-name">$1</span>'.$logo_pz.'<span class="pz-thx-account">$2</span></a>', $changelog);	
		$changelog	=	str_replace(PHP_EOL, '<br/>', $changelog );															// 改行をBRタグに変換
		$changelog	=	'<div class="pz-basic-changelog">'.$changelog.'</div>';
	}

	// カスタムフィールドの一覧
	global	$wpdb;
	$query			=	"SELECT meta_key FROM $wpdb->postmeta WHERE SUBSTRING(meta_key, 1, 1 ) <> '_'  GROUP BY meta_key ORDER BY meta_key ASC";
	$result			=	$wpdb->get_results($query, ARRAY_N );
	$meta_list		=	null;
	$meta_list['']	=	'';
	foreach	($result as $item ) {
		$meta_list[$item[0]]	=	$item[0];
	}
	ksort($meta_list );

	// プロパティーズにコピー
	$prop		=	$this->options;

	// [DEBUG] 暫定対応
	$show_error			=	($menu_error		==	0	?	'style="display: none;"' : '' );
	$show_basic			=	'';
	$show_position		=	'';
	$show_display		=	'';
	$show_letter		=	'';
	$show_external		=	'';
	$show_internal		=	'';
	$show_samepage		=	'';
	$show_check			=	'';
	$show_editor		=	'';
	$show_multisite		=	($menu_multi		==	0	?	'style="display: none;"' : '' );
	$show_advanced		=	'';
	$show_etc			=	'';
	$show_initialize	=	($menu_initialize	==	0	?	'style="display: none;"' : '' );
	$show_admin			=	($admin_mode		==	0	?	'style="display: none;"' : '' );
	// [DEBUG] 暫定対応


// 画面描画
echo	$html_style;
?>
<div class="pz-dashboard<?php echo $page_class; ?> wrap">
	<header class="pz-header">
		<?php
			echo	$html_plugin;
			echo	$html_title;
			echo	$html_notice;
		?>
		<div class="pz-tabs">
			<a class="pz-tab pz-red"		name="pz-error"			href="#pz-error"		<?php echo $show_error;			?>><?php _e('Error', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab pz-hide"		name="pz-basic"			href="#pz-basic"		<?php echo $show_basic;			?>><?php _e('Basic', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-position"		href="#pz-position"		<?php echo $show_position;		?>><?php _e('Position', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-display"		href="#pz-display"		<?php echo $show_display;		?>><?php _e('Display', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-letter"		href="#pz-letter"		<?php echo $show_letter;		?>><?php _e('Letter', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-external"		href="#pz-external"		<?php echo $show_external;		?>><?php _e('External Link', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-internal"		href="#pz-internal"		<?php echo $show_internal;		?>><?php _e('Internal Link', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-samepage"		href="#pz-samepage"		<?php echo $show_samepage;		?>><?php _e('Same Page Link', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-check"			href="#pz-check"		<?php echo $show_check;			?>><?php _e('Link Check', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-editor"		href="#pz-editor"		<?php echo $show_editor;		?>><?php _e('Editor', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab pz-orange"		name="pz-multisite"		href="#pz-multisite"	<?php echo $show_multisite;		?>><?php _e('Multi Site', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-advanced"		href="#pz-advanced"		<?php echo $show_advanced;		?>><?php _e('Advanced', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-etc"			href="#pz-etc"			<?php echo $show_etc;			?>><?php _e('etc.', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab"				name="pz-initialize"	href="#pz-initialize"	<?php echo $show_initialize;	?>><?php _e('Initialize', TEXT_DOMAIN ); ?></a>
			<a class="pz-tab pz-purple"		name="pz-admin"			href="#pz-admin"		<?php echo $show_admin;			?>><?php _e('Admin', TEXT_DOMAIN ); ?></a>
		</div>
	</header>
	<article>
		<form action="" method="post">
			<?php wp_nonce_field('pz-settings' ); ?>
			<?php echo $html_input; ?>
			<div class="pz-submit-hide"><?php submit_button(); ?></div>
			<?php
				require_once('pz-linkcard-settings-error.php' );			// 「エラー」タブ
				require_once('pz-linkcard-settings-basic.php' );			// 「基本」タブ
				require_once('pz-linkcard-settings-position.php' );			// 「配置」タブ
				require_once('pz-linkcard-settings-display.php' );			// 「表示」タブ
				require_once('pz-linkcard-settings-letter.php' );			// 「文字」タブ
				require_once('pz-linkcard-settings-card.php' );				// 「外部リンク」「内部リンク」「同ページ」タブ
				require_once('pz-linkcard-settings-check.php' );			// 「リンク先の検査」タブ
				require_once('pz-linkcard-settings-editor.php' );			// 「エディター」タブ
				require_once('pz-linkcard-settings-multisite.php' );		// 「マルチサイト」タブ
				require_once('pz-linkcard-settings-advanced.php' );			// 「上級者向け」タブ
				require_once('pz-linkcard-settings-etc.php' );				// 「その他」タブ
				require_once('pz-linkcard-settings-initialize.php' );		// 「初期化」タブ
				require_once('pz-linkcard-settings-admin.php' );			// 「管理者」タブ
			?>
			<div class="pz-button-top" title="<?php _e('Scroll to the top', TEXT_DOMAIN ); ?>"><?php _e('^<br/>Top', TEXT_DOMAIN ); ?></div>
		</form>
		</article>
</div>
<?php

// 数値にする
function	pz_TrimNum($val ) {
	$val		=	mb_convert_kana($val, 'n' );
	$val		=	strtolower($val );
	$val		=	preg_replace('/[^0-9]/', '', $val );
	if	($val	<>	null) {
		$val	=	intval($val );
	}
	return	$val;
}

// 数値にする
function	pz_TrimNumPx($val, $unit_percent = false ) {
	$val		=	mb_convert_kana($val, 'n' );			// 半角にする
	$val		=	strtolower($val );						// 小文字にする
	$unit		=	'px';									// 単位 px
	if (($unit_percent == true ) && (substr($val, -1 ) == '%' ) ) {
		$unit	=	'%';									// 単位 %
	}
	$val		=	preg_replace('/[^0-9]/', '', $val );	// 数字だけにする

	switch	($val ) {
	case	null:
	case	0:
		return	$val;
		break;
	}
	return		$val.$unit;
}

// HTMLカラーコード
function	pz_CheckColorCode($val ) {
	if	(preg_match('/^#([0-9A-F]{6}|[0-9A-F]{3})$/i', $val ) ) {
		return true;
	}
}

// ディレクトリ配下の使用サイズ
function	pz_GetDirSize($dir ) {
	$size		=	0;
	$handle		=	opendir($dir );
	if	(!$handle ) {
		return	null;
	}
	while ($file = readdir($handle ) ) {
		$fullpath = $dir.'/'.$file;
		if	(is_dir($fullpath ) ) {
			if	($file	!==	'..' && $file !== '.' ) {
				$size	+=	pz_GetDirSize($fullpath );
			}
		} else {
			$size		+=	filesize($fullpath );
		}
	}
	return	$size;
}

// 数値をKB、MB、TBの単位に変換
function	pz_GetSizeStringSi($val ) {
	$label	=	array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB' );
	for($i = 0; $val >= 1024 && $i < (count($label ) -1 ); $val /= 1024, $i++ );
	return	(round($val, 2 ).' '.$label[$i] );
}

// 数値をKB、MB、TBの単位に変換
function	pz_GetStringBytes($val ) {
	if	($val	==	1 ) {
		return	number_format($val ).' byte';
	} else {
		return	number_format($val ).' bytes';
	}
}

// 
function		pz_Select($prop, $name, $items ) {
	echo		'<select name="properties['.$name.']">';
	foreach		($items				as	$key => $value ) {
		echo	'<option value="'.$key.'" '.($prop[$name] == $key ? 'selected=selected' : '' ).'>'.$value.'</option>';
	}
	echo		'</select>';
}

//
function		pz_Checkbox($prop, $name, $explanatory_text ) {
	echo		'<label>';
	echo		'<input type="hidden"   name="properties['.$name.']" value="" />';
	echo		'<input type="checkbox" name="properties['.$name.']" value="1" '.($prop[$name] == '1' ? 'checked="checked" ' : '' ).'/>';
	echo		$explanatory_text;
	echo		'</label>';
}

//
function		pz_Option($prop, $name, $explanatory_text, $item_list ) {
	echo		'<label>'.$explanatory_text.'<select name="properties['.$name.']">';
	foreach		($item_list		as $item_value => $item_desc ) {
		echo	'<option value="'.$item_value.'"'.($prop[$name] == $item_value ? ' selected="selected"' : '' ).'">'.$item_desc.'</option>';
	}
	echo		'</select></label>';
}
// テキスト項目
function		echo_text($item_name, $item_value, $item_title, $item_notice, $item_class , $item_maxlength , $item_disabled, $item_only = false ) {
	$item_maxlength			=	intval(esc_attr($item_maxlength ) );
	if		($item_maxlength	<=	0 ) {
		$item_maxlength		=	'';
	}
	$html_result	=	'<input type="text" name="properties['.esc_attr($item_name ).']" value="'.esc_attr($item_value ).'" maxlength="'.esc_attr($item_maxlength ).'" class="'.esc_attr($item_class ).'" '.esc_attr($item_disabled ).' /><br /><span class="pz-note">'.esc_attr($item_notice ).'</span></td>';
	$html_result	=	'<tr><th scope="row">'.$item_title.'</th><td>'.$html_result.'</tr>';
	echo			$html_result;
}

// チェックボックス
function		echo_checkbox($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled = true ) {
	if			($item_enabled		==	false ) {
		echo		'<label>';
		echo		'<input type="checkbox" disabled="disabled" />';
		echo		$item_notice;
		echo		'</label>';
	} else {
		echo		'<label>';
		echo		'<input type="hidden"   name="properties['.$item_name.']" value="" />';
		echo		'<input type="checkbox" name="properties['.$item_name.']" value="1" '.($item_value == '1' ? 'checked="checked" ' : '' ).'/>';
		echo		$item_notice;
		echo		'</label>';
	}
}

// リスト項目
function		echo_list($item_name, $item_value, $item_list, $item_title, $item_notice, $item_enabled = true ) {
	$html_result		=	'<tr><th scope="row">'.esc_attr($item_title ).'</th><td>';
	if	($item_enabled	==	true ) {
		$html_result	.=	'<select name="properties['.esc_attr($item_name ).']">';
	} else {
		$html_result	.=	'<select name="" disabled="disabled">';
	}
	foreach		($item_list	as	$key => $value ) {
		$html_result	.=	'<option value="'.esc_attr($key ).'" '.(esc_attr($key ) == esc_attr($item_value ) ? 'selected="selected"' : '' ).'>'.esc_attr($value ).'</option>';
	}
	$html_result		.=	'</select>';
	if	($item_notice ) {
		$html_result	.=	'<br/><span class="pz-note">'.esc_attr($item_notice ).'</span>';
	}
	$html_result		.=	'</td></tr>';
	echo					$html_result;
}

// コンボボックス項目
function	echo_combo($item_name, $item_value, $item_list, $item_title, $item_notice, $item_class, $item_maxlength, $item_disabled ) {
	$html_result		=	'<tr><th scope="row">'.esc_attr($item_title ).'</th><td>';
	if	($item_disabled ) {
		$html_result	.=	'<input type="text" name="" value="'.$item_value.'" disabled="disabled" class="pz-combo" />';
	} else {
		$html_result	.=	'<input type="text" name="properties['.esc_attr($item_name ).']" value="'.esc_attr($item_value ).'" maxlength="'.esc_attr($item_maxlength ).'" list="datalist-'.esc_attr($item_name ).'" class="pz-combo" />';
	}
	$html_result		.=	'<datalist id="datalist-'.$item_name.'">';
	foreach		($item_list	as	$key => $value ) {
		$html_result	.=	'<option value="'.esc_attr($key ).'" '.(esc_attr($key ) == esc_attr($item_value ) ? 'selected="selected"' : '' ).'>'.esc_attr($value ).'</option>';
	}
	$html_result		.=	'</datalist>';
	if	($item_notice ) {
		$html_result	.=	'<br/><span class="pz-note">'.esc_attr($item_notice ).'</span>';
	}
	$html_result		.=	'</td></tr>';
	echo					$html_result;
}

