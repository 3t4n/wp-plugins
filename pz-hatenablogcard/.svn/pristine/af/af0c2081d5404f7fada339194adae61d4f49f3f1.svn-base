<?php
	if (!isset($this->options['style']) || !$this->options['style']) {

		// $css_file = plugin_dir_path(__FILE__).'style.css';
		// $css_url  = plugin_dir_url(__FILE__).'style.css';
		$wp_upload_dir	= wp_upload_dir();
		$css_dir		= $wp_upload_dir['basedir'].'/'.$this->slug;
		$css_path = $wp_upload_dir['basedir'].'/'.$this->slug.'/style.css';
		$css_url  = $wp_upload_dir['baseurl'].'/'.$this->slug.'/style.css';
		if (!is_dir($css_dir)) {
			if (!wp_mkdir_p($css_dir)) {
				$css_path = $wp_upload_dir['basedir'].'/'.$this->slug.'-style.css';
				$css_url  = $wp_upload_dir['baseurl'].'/'.$this->slug.'-style.css';
			}
		}
		if (!isset($this->options['css-path']) || !isset($this->options['css-url']) || $this->options['css-path'] <> $css_path || $this->options['css-url']  <> $css_url) {
			$this->options['css-path'] = $css_path;
			$this->options['css-url']  = $css_url;
//			update_option('Pz_HatenaBlogCard_options', $this->options);
		}

		$temp_name = $this->plugin_dir_path.'pz-hatenablogcard-style.tmp'; // 元となるテンプレート

		$file_text = file_get_contents($temp_name);
		if ($file_text) {

			// オマケ書式
			switch ($this->options['special-format']) {
			case '1': // Cellophane tape center
				$file_text = str_replace('/*WRAP*/', 'position:					relative;',$file_text );
				$file_text = str_replace('/*WRAP-BEFORE*/', 'content: "";display: block;position: absolute;left: 40%;top: -16px;width: 95px;height: 25px;z-index: 2;background-color: rgba(243,245,228,0.5);border: 2px solid rgba(255,255,255,0.5);-webkit-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-moz-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-webkit-transform: rotate(3deg);-moz-transform: rotate(3deg);-o-transform: rotate(3deg);', $file_text );
				$file_text = str_replace('/*SHADOW*/', 'box-shadow:				0px 0px 4px rgba(0, 0, 0, 0.2) , 0px 0px 16px rgba(0, 0, 0, 0.2) inset;', $file_text );
				break;
			case '2': // Cellophane tape left right
				$file_text = str_replace('/*WRAP*/',			'position:					relative;',$file_text );
				$file_text = str_replace('/*MARGIN-LEFT*/',		'margin-left:			40px;',$file_text );
				$file_text = str_replace('/*WRAP-BEFORE*/',		'content: "";display: block;position: absolute;left: -40px;top: -4px;width: 75px;height: 25px;z-index: 2;background-color: rgba(243,245,228,0.5);border: 2px solid rgba(255,255,255,0.5);-webkit-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-moz-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-webkit-transform: rotate(-45deg);-moz-transform: rotate(-45deg);-o-transform: rotate(-45deg);', $file_text );
				$file_text = str_replace('/*WRAP-AFTER*/',		'content: "";display: block;position: absolute;right: -20px;top: -2px;width: 75px;height: 25px;z-index: 2;background-color: rgba(243,245,228,0.5);border: 2px solid rgba(255,255,255,0.5);-webkit-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-moz-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-webkit-transform: rotate(14deg);-moz-transform: rotate(14deg);-o-transform: rotate(14deg);transform: rotate(14deg);', $file_text );
				$file_text = str_replace('/*MARGIN-RIGHT*/',	'margin-right:			25px;',$file_text );
				$file_text = str_replace('/*SHADOW*/',			'box-shadow:				0px 0px 2px rgba(0, 0, 0, 0.2) , 0px 0px 16px rgba(0, 0, 0, 0.2) inset;', $file_text );
				break;
			case '3': // Cellophane long
				$file_text = str_replace('/*WRAP*/', 'position:					relative;',$file_text );
				$file_text = str_replace('/*WRAP-BEFORE*/', 'content: "";display: block;position: absolute;left: -5%;top: -12px;width: 110%;height: 25px;z-index: 2;background-color: rgba(243,245,228,0.5);border: 2px solid rgba(255,255,255,0.5);-webkit-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-moz-box-shadow: 1px 1px 4px rgba(200,200,180,0.8);box-shadow: 1px 1px 4px rgba(200,200,180,0.8);-webkit-transform: rotate(-3deg);-moz-transform: rotate(-3deg);-o-transform: rotate(-3deg);', $file_text );
				$file_text = str_replace('/*MARGIN-LEFT*/', 'margin-left:			32px;',$file_text );
				$file_text = str_replace('/*MARGIN-RIGHT*/', 'margin-right:			32px;',$file_text );
				$file_text = str_replace('/*SHADOW*/', 'box-shadow:				0px 0px 2px rgba(0, 0, 0, 0.2) , 0px 0px 16px rgba(0, 0, 0, 0.2) inset;', $file_text );
				break;
			case '5': // Slanting
				$file_text = str_replace('/*WRAP*/', 'transform:skew(-10deg) rotate(1deg);-webkit-transform:	skew(-10deg) rotate(1deg);-moz-transform:skew(-10deg) rotate(1deg);', $file_text );
				$file_text = str_replace('/*MARGIN-LEFT*/', 'margin-left:			12px;',$file_text );
				$file_text = str_replace('/*MARGIN-RIGHT*/', 'margin-right:			30px;',$file_text );
				break;
			case '7': // 3D rotate
				$file_text = str_replace('/*WRAP*/', '-webkit-transform:perspective(150px) scale3d(0.84,0.9,1) rotate3d(1,0,0,12deg);', $file_text );
				$file_text = str_replace('/*SHADOW*/', 'box-shadow:				0 20px 16px rgba(0, 0, 0, 0.6) , 0px 32px 32px rgba(0, 0, 0, 0.2) inset;', $file_text );
				break;
			case '9': // Paper Curling
				$file_text = str_replace('/*WRAP*/', 'position:					relative;',$file_text );
				$file_text = str_replace('/*WRAP-AFTER*/', 'z-index:-1;content:"";height:10px;width:60%;position:absolute;right:16px;bottom:18px;left:auto;transform:skew(5deg) rotate(4deg);-webkit-transform:skew(5deg) rotate(4deg);-moz-transform:skew(5deg) rotate(4deg);box-shadow:0 16px 16px rgba(0,0,0,1);-webkit-box-shadow:0 16px 16px rgba(0,0,0,1);-moz-box-shadow:0 16px 12px rgba(0,0,0,1);', $file_text );
				$file_text = str_replace('/*SHADOW*/', 'box-shadow:				0px 2px 6px rgba(0, 0, 0, 0.8) , 0px 0px 16px rgba(0, 0, 0, 0.3) inset;', $file_text );
				$file_text = str_replace('/*OPTION*/',		'article { position: relative; z-index: 0; } article blockquote { position: relative; z-index: 0; }', $file_text );
				break;
			case '10': // Neutral
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #59fbea;',$file_text );
				$file_text = str_replace('/*COLOR-TITLE*/',		'color:					#59fbea;',$file_text );
				$file_text = str_replace('/*COLOR-URL*/',		'color:					#59fbea;',$file_text );
				$file_text = str_replace('/*COLOR-EXCERPT*/',	'color:					#59fbea;',$file_text );
				$file_text = str_replace('/*COLOR-INFO*/',		'color:					#59fbea;',$file_text );
				$file_text = str_replace('/*COLOR-PLUGIN*/',	'color:					#59fbea;',$file_text );
				$file_text = str_replace('/*EX-BGCOLOR*/', 'background-color:		rgba(89,251,234,0.4);',$file_text );
				$file_text = str_replace('/*IN-BGCOLOR*/', 'background-color:		rgba(89,251,234,0.1);',$file_text );
				$file_text = str_replace('/*TH-BGCOLOR*/', 'background-color:		rgba(89,251,234,0.05);',$file_text );
				break;
			case '11': // Orange
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #ebbc4a;',$file_text );
				$file_text = str_replace('/*COLOR-TITLE*/',		'color:					#ebbc4a;',$file_text );
				$file_text = str_replace('/*COLOR-URL*/',		'color:					#ebbc4a;',$file_text );
				$file_text = str_replace('/*COLOR-EXCERPT*/',	'color:					#ebbc4a;',$file_text );
				$file_text = str_replace('/*COLOR-INFO*/',		'color:					#ebbc4a;',$file_text );
				$file_text = str_replace('/*COLOR-PLUGIN*/',	'color:					#ebbc4a;',$file_text );
				$file_text = str_replace('/*EX-BGCOLOR*/', 'background-color:		rgba(235,188,74,0.4);',$file_text );
				$file_text = str_replace('/*IN-BGCOLOR*/', 'background-color:		rgba(235,188,74,0.1);',$file_text );
				$file_text = str_replace('/*TH-BGCOLOR*/', 'background-color:		rgba(235,188,74,0.05);',$file_text );
				break;
			case '12': // Green
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #28f428;',$file_text );
				$file_text = str_replace('/*COLOR-TITLE*/',		'color:					#28f428;',$file_text );
				$file_text = str_replace('/*COLOR-URL*/',		'color:					#28f428;',$file_text );
				$file_text = str_replace('/*COLOR-EXCERPT*/',	'color:					#28f428;',$file_text );
				$file_text = str_replace('/*COLOR-INFO*/',		'color:					#28f428;',$file_text );
				$file_text = str_replace('/*COLOR-PLUGIN*/',	'color:					#28f428;',$file_text );
				$file_text = str_replace('/*EX-BGCOLOR*/', 'background-color:		rgba(40,244,40,0.4);',$file_text );
				$file_text = str_replace('/*IN-BGCOLOR*/', 'background-color:		rgba(40,244,40,0.1);',$file_text );
				$file_text = str_replace('/*TH-BGCOLOR*/', 'background-color:		rgba(40,244,40,0.05);',$file_text );
				break;
			case '13': // Blue
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #00c2ff;',$file_text );
				$file_text = str_replace('/*COLOR-TITLE*/',		'color:					#00c2ff;',$file_text );
				$file_text = str_replace('/*COLOR-URL*/',		'color:					#00c2ff;',$file_text );
				$file_text = str_replace('/*COLOR-EXCERPT*/',	'color:					#00c2ff;',$file_text );
				$file_text = str_replace('/*COLOR-INFO*/',		'color:					#00c2ff;',$file_text );
				$file_text = str_replace('/*COLOR-PLUGIN*/',	'color:					#00c2ff;',$file_text );
				$file_text = str_replace('/*EX-BGCOLOR*/', 'background-color:		rgba(0,194,255,0.4);',$file_text );
				$file_text = str_replace('/*IN-BGCOLOR*/', 'background-color:		rgba(0,194,255,0.1);',$file_text );
				$file_text = str_replace('/*TH-BGCOLOR*/', 'background-color:		rgba(0,194,255,0.05);',$file_text );
				break;
			}

			// 文字色
			$file_text = str_replace('/*COLOR-TITLE*/',		'color:					'.$this->options['color-title'].';',$file_text );
			$file_text = str_replace('/*COLOR-URL*/',		'color:					'.$this->options['color-url'].';',$file_text );
			$file_text = str_replace('/*COLOR-EXCERPT*/',	'color:					'.$this->options['color-excerpt'].';',$file_text );
			$file_text = str_replace('/*COLOR-INFO*/',		'color:					'.$this->options['color-info'].';',$file_text );
			$file_text = str_replace('/*COLOR-PLUGIN*/',	'color:					'.$this->options['color-plugin'].';',$file_text );

			// 文字の大きさ
			$file_text = str_replace('/*SIZE-TITLE*/',		'font-size:				'.$this->options['size-title'].';',$file_text );
			$file_text = str_replace('/*SIZE-URL*/',		'font-size:				'.$this->options['size-url'].';',$file_text );
			$file_text = str_replace('/*SIZE-EXCERPT*/',	'font-size:				'.$this->options['size-excerpt'].';',$file_text );
			$file_text = str_replace('/*SIZE-INFO*/',		'font-size:				'.$this->options['size-info'].';',$file_text );
			$file_text = str_replace('/*SIZE-PLUGIN*/',		'font-size:				'.$this->options['size-plugin'].';',$file_text );

			// カードの周りへの余白
			if ($this->options['margin-top']) {
				$file_text = str_replace('/*MARGIN-TOP*/', 'margin-top:				'.$this->options['margin-top'].';',$file_text );
			}
			if ($this->options['margin-right']) {
				$file_text = str_replace('/*MARGIN-RIGHT*/', 'margin-right:			'.$this->options['margin-right'].';',$file_text );
			}
			if ($this->options['margin-bottom']) {
				$file_text = str_replace('/*MARGIN-BOTTOM*/', 'margin-bottom:			'.$this->options['margin-bottom'].';',$file_text );
			}
			if ($this->options['margin-left']) {
				$file_text = str_replace('/*MARGIN-LEFT*/', 'margin-left:			'.$this->options['margin-left'].';',$file_text );
			}

			// カードの余白等調整
			$file_text = str_replace('/*PADDING*/', 'padding:				6px 0px;',$file_text );

			// img のスタイルを強制リセット
			if (isset($this->options['style-reset-img'])) {
				$file_text = str_replace('/*RESET-IMG*/', 'margin: 0 !important; padding: 0; border: none;', $file_text );
				$file_text = str_replace('/*STATIC*/', 'position:				static !important;',$file_text );
				$file_text = str_replace('/*IMPORTANT*/', '!important',$file_text );
			}

			// 外部リンク背景
			if ($this->options['ex-bgcolor']) {
				$file_text = str_replace('/*EX-BGCOLOR*/', 'background-color:		'.$this->options['ex-bgcolor'].';',$file_text );
			}
			if ($this->options['ex-image']) {
				if (preg_match('/https?(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $this->options['ex-image'])) {
					$file_text = str_replace('/*EX-IMAGE*/', 'background-image:		url("'.$this->options['ex-image'].'");',$file_text );
				} else {
					$file_text = str_replace('/*EX-IMAGE*/', 'background-image:		'.$this->options['ex-image'].';',$file_text );
				}
			}

			// 内部リンク背景
			if ($this->options['in-bgcolor']) {
				$file_text = str_replace('/*IN-BGCOLOR*/', 'background-color:		'.$this->options['in-bgcolor'].';',$file_text );
			}
			if ($this->options['in-image']) {
				if (preg_match('/https?(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $this->options['in-image'])) {
					$file_text = str_replace('/*IN-IMAGE*/', 'background-image:		url("'.$this->options['in-image'].'");',$file_text );
				} else {
					$file_text = str_replace('/*IN-IMAGE*/', 'background-image:		'.$this->options['in-image'].';',$file_text );
				}
			}

			// 同ページリンク背景色
			if ($this->options['th-bgcolor']) {
				$file_text = str_replace('/*TH-BGCOLOR*/', 'background-color:		'.$this->options['th-bgcolor'].';',$file_text );
			}
			if ($this->options['th-image']) {
				if (preg_match('/https?(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $this->options['th-image'])) {
					$file_text = str_replace('/*TH-IMAGE*/', 'background-image:		url("'.$this->options['th-image'].'");',$file_text );
				} else {
					$file_text = str_replace('/*TH-IMAGE*/', 'background-image:		'.$this->options['th-image'].';',$file_text );
				}
			}

			// センタリング指定あり	
			if (isset($this->options['centering']) && $this->options['centering'] == '1') {
				$file_text = str_replace('/*LINKCARD-WRAP-MARGIN*/', 'margin:					0 auto;',$file_text );
				$file_text = str_replace('/*HATENA-WRAP-MARGIN*/', 'margin:	0 auto;',$file_text );
			} else {
				$file_text = str_replace('/*LINKCARD-WRAP-MARGIN*/', 'margin:					0;',$file_text );
				$file_text = str_replace('/*HATENA-WRAP-MARGIN*/', 'margin:					0;',$file_text );
			}

			// 角まる指定あり	
			if (isset($this->options['radius']) && $this->options['radius'] == '1') {
				$file_text = str_replace('/*RADIUS*/', 'border-radius:			8px; -webkit-border-radius: 8px; -moz-border-radius: 8px;',$file_text );
				$file_text = str_replace('/*THUMBNAIL-RADIUS*/', 'border-radius:			6px; -webkit-border-radius: 6px; -moz-border-radius: 6px;',$file_text );
			}

			// 影あり	
			if (isset($this->options['shadow']) && $this->options['shadow'] == '1') {
				if (isset($this->options['shadow-inset']) && $this->options['shadow-inset'] == '1') {
					$file_text = str_replace('/*SHADOW*/', 'box-shadow:				8px 8px 8px rgba(0, 0, 0, 0.5) , 0 0 16px rgba(0, 0, 0, 0.3) inset;',$file_text );
				} else {
					$file_text = str_replace('/*SHADOW*/', 'box-shadow:				8px 8px 8px rgba(0, 0, 0, 0.5);',$file_text );
				}
			} else {
				if (isset($this->options['shadow-inset']) && $this->options['shadow-inset'] == '1') {
					$file_text = str_replace('/*SHADOW*/', 'box-shadow:				0 0 16px rgba(0, 0, 0, 0.5) inset;',$file_text );
				}
			}

			// サムネイル影あり	
			if (isset($this->options['thumbnail-shadow']) && $this->options['thumbnail-shadow'] == '1') {
				$file_text = str_replace('/*THUMBNAIL-SHADOW*/', 'box-shadow:				3px 3px 6px rgba(0, 0, 0, 0.5);',$file_text );
			}

			// 左寄せ／右寄せ
			switch ($this->options['thumbnail-position']) {
			case '1':
				$file_text = str_replace('/*THUMBNAIL_POSITION*/', 'float:			right;;',$file_text );
				break;
			case '2':
				$file_text = str_replace('/*THUMBNAIL_POSITION*/', 'float:			left;',$file_text );
				break;
			}

			// 横幅
			if ($this->options['width'] == '') {
				$file_text = str_replace('/*WIDTH*/', 'max-width:				100%;',$file_text );
			} else {
				$file_text = str_replace('/*WIDTH*/', 'max-width:				'.$this->options['width'].';',$file_text );
			}

			// 記事情報の高さ
			if ($this->options['content-height'] == '') {
				$file_text = str_replace('/*CONTENT-HEIGHT*/', 'height:					108px;',$file_text );
			} else {
				$file_text = str_replace('/*CONTENT-HEIGHT*/', 'height:					'.$this->options['content-height'].';',$file_text );
			}

			// リンク先のURLを表示する
			if (isset($this->options['display-url']) && $this->options['display-url'] == '1') {
				$file_text = str_replace('/*DISPLAY-URL*/', 'display:				block;',$file_text );
			} else {
				$file_text = str_replace('/*DISPLAY-URL*/', 'display:				none;',$file_text );
			}

			// 枠線の太さ	
			switch ($this->options['border']) {
			case '1':
				$file_text = str_replace('/*BORDER*/', 'border:					1px solid #ddd;',$file_text );
				break;
			case '2':
				$file_text = str_replace('/*BORDER*/', 'border:					2px solid #ddd;',$file_text );
				break;
			case '4sg':
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #ddd;',$file_text );
				break;
			case '3':
				$file_text = str_replace('/*BORDER*/', 'border:					1px solid #444;',$file_text );
				break;
			case '4':
				$file_text = str_replace('/*BORDER*/', 'border:					2px solid #444;',$file_text );
				break;
			case '5':
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #444;',$file_text );
				break;
			case '6':
				$file_text = str_replace('/*BORDER*/', 'border:					8px solid #444;',$file_text );
				break;
			case '7':
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #1e90ff;',$file_text );
				break;
			case '8':
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #66cdaa;',$file_text );
				break;
			case '9':
				$file_text = str_replace('/*BORDER*/', 'border:					4px solid #ff69b4;',$file_text );
				break;
			case '10':
				$file_text = str_replace('/*BORDER*/', 'border:					4px double #444;',$file_text );
				break;
			case '11':
				$file_text = str_replace('/*BORDER*/', 'border:					1px dotted #444;',$file_text );
				break;
			default:
				$file_text = str_replace('/*BORDER*/', 'border:					none;',$file_text );
				break;
			}

			// 抜粋文の部分を凹ませる
			if (isset($this->options['content-inset']) && $this->options['content-inset'] == '1') {
				$file_text = str_replace('/*CONTENT-PADDING*/', 'padding:				6px;',$file_text );
				$file_text = str_replace('/*CONTENT-INSET*/', 'box-shadow:				4px 4px 4px rgba(0, 0, 0, 0.5) inset;',$file_text );
				$file_text = str_replace('/*CONTENT-BGCOLOR*/', 'background-color:		rgba(255, 255, 255, 0.8 );',$file_text );
			}

			// ぽぽづれ。へのリンクを表示する
			if (isset($this->options['plugin-link']) && $this->options['plugin-link'] == '1') {
				$file_text = str_replace('/*CREDIT*/', 'display:				block;',$file_text );
			} else {
				$file_text = str_replace('/*CREDIT*/', 'display:				none;',$file_text );
			}

			$result = file_put_contents($css_path,$file_text);
			global $pagenow;
			if (isset($pagenow) && $pagenow == 'options-general.php') {
				if ($result == true) {
					echo '<div class="updated fade"><p><strong>'.__('Style sheet saved.', $this->text_domain).'</strong></p></div>';
				} else {
					echo '<div class="error fade"><p><strong>'.__('Style sheet failed.', $this->text_domain).'</strong></p></div>';
				}
			}
		}
		unset($temp_name);
		unset($file_text);
		unset($result);
	}