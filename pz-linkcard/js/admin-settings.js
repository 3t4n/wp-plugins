jQuery(function($) {
	// Pz-LinkCardの設定画面のときのみ動作
	if	($('.pz-dashboard').is('*') ) {

		// タブを初期選択（表示速度のため、ロードを待たない）
		$('input[name="tab-now"]').change(tab_open_last() );

		// スクロール位置の調整
		$(window).scrollTop($('input[name="scroll-now"]').val());
	}

	// 画面表示された時に実行
	$(window).load(function() {

		// Pz-LinkCard画面
		if	($('.pz-dashboard').is('*') ) {
			// WordPress標準のカラーピッカー
			// $('.wp-color-picker').wpColorPicker();
			$('.pz-wp-color-picker').wpColorPicker();

			// エラーモード・調査モード・管理者モード・開発者モードの切り替え
			var rs = switch_mode();

			// 最後に開いていたタブを開く
			var rs = tab_open_last();

			// 項目の有効化／無効化
			var rs = switch_enabled();

			// イベント：キーによる操作（タブ移動）
			$(window).on('keydown', key_down);

			// 一番上に行くボタンをクリック
			$('.pz-button-top').on('click', button_top_click);

			// 一番上に行くボタンをスクロール位置で「TOP」ボタンを表示／非表示
			$(window).scroll(top_button_scroll);

			// イベント：タブが切り替わった
			$('.pz-tab').on('click', tab_open);

			// イベント：ショートコードをコピーする
			$('.pz-shortcode-1').on('keyup', copy_shortcode);

			// イベント：ショートコードの入力チェック
			$('input[name="properties[code1]"]:text').on('keydown', check_shortcode_key);
			$('input[name="properties[code2]"]:text').on('keydown', check_shortcode_key);
			$('input[name="properties[code3]"]:text').on('keydown', check_shortcode_key);
			$('input[name="properties[code4]"]:text').on('keydown', check_shortcode_key);

			// イベント：すべてのWP-Cronスケジュールを表示する
			$('.pz-cron-all').on('change', show_all_cron);

			// submitをクリックしたら
			$('form').submit( function() {
				$('input[name="scroll-now"]').val($(window).scrollTop());
				if	($('input[name="properties[flg-inhibit]"]:checkbox').prop('checked') == true) {
					$('#pz-overlay-proc').show();
				}
			});

			// クリックしたらテキスト全選択
			$('.pz-click-all-select').on('click', all_select);

			// イベント：ReadOnlyになったチェックボックスを動作させなくする
			$('input:checkbox').on('click', checkbox_readonly);

			// イベント：カラーピッカーとテキストボックスの同期
			$('.pz-sync-text').on('keyup change', sync_color);

			// 自動変換のチェックが入っているときだけ、オプション設定を有効化
			$('.pz-sync-check,.pz-show').on('change', switch_enabled);

			// エラータブ
			$('input[name="properties[error-mode]"]:checkbox').on('change', switch_mode);

			// マルチサイトタブ
			$('input[name="properties[multi-mode]"]:checkbox').on('change', switch_mode);

			// 初期化タブ
			$('input[name="properties[flg-initialize]"]:checkbox').on('change', switch_mode);

			// デバグモード（調査モード）
			$('input[name="properties[debug-mode]"]:checkbox').on('change', switch_mode);

			// 管理者モード
			$('input[name="properties[admin-mode]"]:checkbox').on('change', switch_mode);

			// 開発者モード
			$('input[name="properties[develop-mode]"]:checkbox').on('change', switch_mode);

			// デバグモード（調査モード）
			$('input[name="debug-mode"]').on('change', switch_mode);

			// 管理者モード
			$('input[name="admin-mode"]').on('change', switch_mode);

			// 開発者モード
			$('input[name="develop-mode"]').on('change', switch_mode);

			// 設定画面＆管理画面
			if	($('.pz-man-count-list').is('*') != false) {
				// イベント：カラーピッカーとテキストボックスの同期
				$('.pz-sync-text').on('keyup change', sync_color);
			}

			// 画面表示する
			$('#pz-overlay-proc').hide();

		}
	});

	// 最後に開いていたタブを開く
	function tab_open_last() {
		var name = $('input[name="tab-now"]').val();
		if	(($(`a[name="${name}"]`).is('*') == false) || ($(`a[name="${name}"]`).css('display') == 'none')) {
			$('.pz-tab').each(function() {
				if	($(this).css('display') != 'none') {
					name = $(this).attr('name');
					return false;
				}
			})
		}
		$(`a[name="${name}"]`).addClass('pz-tab-active');
		$(`#${name}`).addClass('pz-page-active');
	}

	// タブの切り替え
	function tab_open() {
		$('.pz-page').removeClass('pz-page-active');
		$('.pz-tab').removeClass('pz-tab-active');
		$(this).addClass('pz-tab-active');
		$($(this).attr('href')).addClass('pz-page-active');
		$('input[name="tab-now"]').val($(this).attr('name'));
		return false;
	}

	// スクロールしていた位置
	function to_scroll() {
		var pos_y = $('input[name="scroll-now"]').val();
		$(window).scrollTop(pos_y);
	}

	// イベント：キー操作でタブを移動
	function key_down(e) {
		switch (true) {
		case	e.shiftKey:
			break;
		case	e.ctrlKey:
			switch (e.keyCode) {
			case 37:						// [Ctrl] + [←]
				tab_select(-1);
				return	false;
			case 39:						// [Ctrl] + [→]
				tab_select(+1);
				return	false;
			case 83:						// [Ctrl] + [S]
				$('#submit').trigger('click');
				return	false;
			}
		case	e.altKey:
			break;
		default:
			if	($('.pz-tab-active').is(':focus')) {
				switch (e.keyCode) {
				case 37:					// [←]
					tab_select(-1);
					$('.pz-tab-active').focus();
					return	false;
				case 39:					// [→]
					tab_select(+1);
					$('.pz-tab-active').focus();
					return	false;
				}
			}
		}
	}

	// イベント：タブを移動
	function tab_select(m) {
		var scrollNow = $(window).scrollTop();
		var tabNow    = $('.pz-tab-active')[0];
		$('.pz-tab').each(function() {
			if	($(this).css('display') != 'none') {
				$(this).addClass('pz-show');
			}
		})
		var tabList   = $('.pz-tab.pz-show');

		for (var i = 0; i < tabList.length; i++) {
			if	(tabList[i] === tabNow) {
				break;
			}
		}

		$(tabList[i]).removeClass('pz-tab-active');

		$($(tabList[i]).attr('href')).removeClass('pz-page-active');
		if	((m === -1) && (i > 0)) {
			i--;
		}
		if	((m === +1) && (i < (tabList.length - 1))) {
			i++;
		}
		$(tabList[i]).addClass('pz-tab-active');
		$($(tabList[i]).attr('href')).addClass('pz-page-active');
		$('input[name="tab-now"]').val($(tabList[i]).attr('name'));
	}

	// textarea で Tab 入力
	function textarea_ex(e) {
		if	(e.key == 'Tab' && !e.shiftKey && !e.ctrlKey && !e.altKey) {
			e.preventDefault();
			document.execCommand('insertText', false, '\t');
		}
	}

	// 一番上へ行くボタンをクリック
	function button_top_click() {
		$('body, html').animate({ scrollTop: 0 }, 200);
		return false;
	}

	// 一番上へ行くボタンの表示・非表示
	function top_button_scroll() {
		if	($(window).scrollTop() > 80) {
			$('.pz-button-top').fadeIn('slow');
		} else {
			$('.pz-button-top').fadeOut('slow');
		}
	}

	// 調査モード・管理者モード・開発者モードの切り替え
	function switch_mode() {

		if	($('.pz-settings').is('*') != false) {

			// エラータブの表示
			if	($('input[name="properties[error-mode]"]:checkbox').prop('checked') == true) {
				$('a[name="pz-error"]').show();
				$('a[name="pz-error"]').removeClass('pz-hide');
				$('a[name="pz-error"]').addClass('pz-show');
			} else {
				$('a[name="pz-error"]').hide();
				$('a[name="pz-error"]').removeClass('pz-show');
				$('a[name="pz-error"]').addClass('pz-hide');
			}

			// 初期化タブの表示
			if	($('input[name="properties[flg-initialize]"]:checkbox').prop('checked') == true) {
				$('a[name="pz-initialize"]').show();
				$('a[name="pz-initialize"]').removeClass('pz-hide');
				$('a[name="pz-initialize"]').addClass('pz-show');
			} else {
				$('a[name="pz-initialize"]').hide();
				$('a[name="pz-initialize"]').removeClass('pz-show');
				$('a[name="pz-initialize"]').addClass('pz-hide');
			}

			// タブのマルチサイトタブの表示
			if	($('input[name="properties[multi-mode]"]:checkbox').prop('checked') == true) {
				$('a[name="pz-multisite"]').show();
				$('a[name="pz-multisite"]').removeClass('pz-hide');
				$('a[name="pz-multisite"]').addClass('pz-show');
			} else {
				$('a[name="pz-multisite"]').hide();
				$('a[name="pz-multisite"]').removeClass('pz-show');
				$('a[name="pz-multisite"]').addClass('pz-hide');
			}

			// デバグモード（調査モード）
			if	($('input[name="properties[debug-mode]"]:checkbox').prop('checked') == true) {
				$('input[name="debug-mode"]').val(1 );
				$('.pz-debug-only').show;
				$('.pz-admin-only').show;
			} else {
				$('input[name="debug-mode"]').val(0 );
				$('.pz-debug-only').hide;
				$('input[name="properties[admin-mode]"]:checkbox').prop('checked', false);
			}

			// 管理者モード
			if	($('input[name="properties[admin-mode]"]:checkbox').prop('checked') == true) {
				$('input[name="admin-mode"]').val(1 );
			} else {
				$('input[name="admin-mode"]').val(0 );
				$('input[name="properties[multi-mode]"]:checkbox').prop('checked', false);
			}

			// 開発者モード
			if	($('input[name="properties[develop-mode]"]:checkbox').prop('checked') == true) {
				$('input[name="develop-mode"]').val(1 );
			} else {
				$('input[name="develop-mode"]').val(0 );
			}
		}

		// デバグモード（調査モード）
		if	($('input[name="debug-mode"]').val() == '1' ) {
			$('.pz-debug-only').show();
			$('.pz-debug-only').removeClass('pz-hide');
			$('.pz-debug-only').addClass('pz-show');
		} else {
			$('.pz-debug-only').hide();
			$('.pz-debug-only').removeClass('pz-show');
			$('.pz-debug-only').addClass('pz-hide');
		}

		// 管理者モード
		if	($('input[name="admin-mode"]').val() == '1' ) {
			$('a[name="pz-admin"]').show();
			$('a[name="pz-admin"]').removeClass('pz-hide');
			$('a[name="pz-admin"]').addClass('pz-show');
			$('.pz-admin-only').show();
			$('.pz-admin-only').removeClass('pz-hide');
			$('.pz-admin-only').removeClass('pz-show');
		} else {
			$('a[name="pz-admin"]').hide();
			$('a[name="pz-admin"]').removeClass('pz-show');
			$('a[name="pz-admin"]').addClass('pz-hide');
			$('.pz-admin-only').hide();
			$('.pz-admin-only').removeClass('pz-show');
			$('.pz-admin-only').removeClass('pz-hide');
		}

		// 開発者モード
		if	($('input[name="develop-mode"]').val() == '1' ) {
			$('.pz-develop-only').show();
			$('.pz-develop-only').removeClass('pz-hide');
			$('.pz-develop-only').addClass('pz-show');
		} else {
			$('.pz-develop-only').hide();
			$('.pz-develop-only').removeClass('pz-show');
			$('.pz-develop-only').addClass('pz-hide');
		}
	}

	// 特定の項目の値によって、連動する項目を有効化／無効化する
	function switch_enabled() {
		// 記事取得方法によってカスタムフィールドを有効／無効
		if	($('select[name="properties[in-get]"]').val() == 3) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('input[name="properties[in-field-title]"]').prop('disabled', flags);
		$('input[name="properties[in-field-excerpt]"]').prop('disabled', flags);
		
		// 外部サイト・サムネイル選択によって、サムネイルサイズを有効／無効
		if	($('select[name="properties[ex-thumbnail]"]').val() == 1 || $('select[name="properties[ex-thumbnail]"]').val() == 13) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('select[name="properties[ex-thumbnail-size]"]').prop('disabled', flags);
		
		// 内部サイト・サムネイル選択によって、サムネイルサイズを有効／無効
		if	($('select[name="properties[in-thumbnail]"]').val() == 1 || $('select[name="properties[in-thumbnail]"]').val() == 13) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('select[name="properties[in-thumbnail-size]"]').prop('disabled', flags);
		
		// リンク検査：ユーザーエージェント使用選択によってユーザーエージェント文字列を有効／無効
		if	($('input[name="properties[flg-agent]"]:checkbox').prop('checked') == true) {
			var flags = false;
		} else {
			var flags = true;
		}
		$('input[name="properties[user-agent]"]').prop('readonly', flags);
		
		// エディタまたは自動変換選択によって、外部のみとショートコード実行を有効／無効
		if	($('input[name="properties[auto-atag]"]:checkbox').prop('checked') == true  || $('input[name="properties[auto-url]"]:checkbox').prop('checked') == true) {
			var flags = false;
			var color = '#444';
		} else {
			var flags = true;
			var color = '#ddd';
		}
		$('input[name="properties[auto-external]"]').prop('disabled', flags);
		$('input[name="properties[auto-external]"]').prop('readonly', flags);
		$('input[name="properties[auto-external]"]').parent().css('color', color);
		$('input[name="properties[flg-do-shortcode]"]').prop('disabled', flags);
		$('input[name="properties[flg-do-shortcode]"]').prop('readonly', flags);
		$('input[name="properties[flg-do-shortcode]"]').parent().css('color', color);

		// ふちどりの色（文字）
		$('input[name="properties[title-outline-color]"]').prop('disabled', $('input[name="properties[title-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[url-outline-color]"]').prop('disabled', $('input[name="properties[url-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[excerpt-outline-color]"]').prop('disabled', $('input[name="properties[excerpt-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[date-outline-color]"]').prop('disabled', $('input[name="properties[date-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[info-outline-color]"]').prop('disabled', $('input[name="properties[info-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[added-outline-color]"]').prop('disabled', $('input[name="properties[added-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[heading-outline-color]"]').prop('disabled', $('input[name="properties[heading-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[more-outline-color]"]').prop('disabled', $('input[name="properties[more-outline]"]:checkbox').prop('checked') == false );
		$('input[name="properties[cat-outline-color]"]').prop('disabled', $('input[name="properties[cat-outline]"]:checkbox').prop('checked') == false );

		// 背景色（文字）
		$('input[name="properties[title-bg-color]"]').prop('disabled', $('input[name="properties[title-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[url-bg-color]"]').prop('disabled', $('input[name="properties[url-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[excerpt-bg-color]"]').prop('disabled', $('input[name="properties[excerpt-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[date-bg-color]"]').prop('disabled', $('input[name="properties[date-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[info-bg-color]"]').prop('disabled', $('input[name="properties[info-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[added-bg-color]"]').prop('disabled', $('input[name="properties[added-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[heading-bg-color]"]').prop('disabled', $('input[name="properties[heading-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[more-bg-color]"]').prop('disabled', $('input[name="properties[more-bg]"]:checkbox').prop('checked') == false );
		$('input[name="properties[cat-bg-color]"]').prop('disabled', $('input[name="properties[cat-bg]"]:checkbox').prop('checked') == false );

		// 背景色（リンク種別別）
		$('input[name="properties[ex-bg-color]"]').prop('disabled', $('input[name="properties[ex-bg]"]:checkbox').prop('checked') == false );
	}

	// ショートコードをコピーする
	function copy_shortcode() {
		var t = $(this).val();
		$('.pz-shortcode-copy').each(function() {
			$(this).text(t);
			if	(t.length == 0) {
				$('.pz-shortcode-enabled').prop('disabled', true);
			} else {
				$('.pz-shortcode-enabled').prop('disabled', false);
			}
		})
	}

	// ショートコードの入力チェック
	function check_shortcode_key(e) {
		switch (e.keyCode) {
		case 32:						// [Space]
			return	false;
		}
	}

	// すべてのWP-Cronスケジュールを表示する
	function show_all_cron() {
		if	($(this).prop('checked') == true) {
			$('.pz-cron-list-other').show();
			$('.pz-cron-list-other').removeClass('pz-hide');
			$('.pz-cron-list-other').addClass('pz-show');
		} else {
			$('.pz-cron-list-other').hide();
			$('.pz-cron-list-other').removeClass('pz-show');
			$('.pz-cron-list-other').addClass('pz-hide');
		}
	}

	// カラーピッカーとテキストボックスの同期
	function sync_color() {
		var name = $(this).attr('name');
		var value = $(this).val();
		$('input[name="' + name + '"]').each(function() {$(this).val(value);});
	}

	// readonlyのチェックボックスを動作させない
	function checkbox_readonly() {
		if	($(this).prop('readonly') == true) {
			return false;
		}
	}

	// テキストを全選択
	function all_select() {
		switch ($(this).prop('tagName')) {
		case 'INPUT':
			$(this).select();
			break;
		case 'DIV':
			var range = document.createRange();
			range.selectNodeContents(this);
			var selection = window.getSelection();
			selection.removeAllRanges();
			selection.addRange(range);
			break;
		}
	}

});
