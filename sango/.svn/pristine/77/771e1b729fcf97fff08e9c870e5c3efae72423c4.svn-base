<?php

/**
 * Wp_customize
 */
function sangoplus_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'my_theme_origin_scheme',
		array(
			'title'    => '✈️ SANGO＋の設定',
			'priority' => 200,
		)
	);
	/* セクション */
	$wp_customize->add_section(
		'my_theme_section',
		array(
			'title'    => '追従する目次のボタン',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 1,
		)
	);
	/* TOCCheckbox セッティング1 */
	$wp_customize->add_setting(
		'my_theme_options[originCheckbox1]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* TOCCheckbox コントロール1 */
	$wp_customize->add_control(
		'my_theme_options_origin_checkbox1',
		array(
			'settings'    => 'my_theme_options[originCheckbox1]',
			'label'       => '【モバイル表示】目次ボタンを表示する',
			'description' => '<small>記事ページにのみ表示されます。※jQuery本体が必要です。</small>',
			'section'     => 'my_theme_section',
			'type'        => 'checkbox',
		)
	);

	/* TOCCheckbox セッティング2 */
	$wp_customize->add_setting(
		'my_theme_options[originCheckbox2]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* TOCCheckbox コントロール2 */
	$wp_customize->add_control(
		'my_theme_options_origin_checkbox2',
		array(
			'settings'    => 'my_theme_options[originCheckbox2]',
			'label'       => '【PC表示】目次ボタンを表示する',
			'description' => '<small>記事ページにのみ表示されます。※jQuery本体が必要です。</small>',
			'section'     => 'my_theme_section',
			'type'        => 'checkbox',
		)
	);

	/* TOCCheckbox セッティング3 */
	$wp_customize->add_setting(
		'my_theme_options[originCheckbox3]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* TOCCheckbox コントロール3 */
	$wp_customize->add_control(
		'my_theme_options_origin_checkbox3',
		array(
			'settings'    => 'my_theme_options[originCheckbox3]',
			'label'       => 'プラグインのCSSを利用',
			'description' => '<small>プラグインのCSSを適用させる場合はチェックを入れてください。</small>',
			'section'     => 'my_theme_section',
			'type'        => 'checkbox',
		)
	);

	/* TOC背景色 */
	$wp_customize->add_setting(
		'toc_background_color',
		array(
			'default' => '#6bb6ff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'toc_background_color',
			array(
				'label'       => 'ボタンの背景色',
				'description' => '<small>追従するボタンの背景色</small>',
				'section'     => 'my_theme_section',
				'settings'    => 'toc_background_color',
				'priority'    => 20,
			)
		)
	);

	/* TOCアイコン色 */
	$wp_customize->add_setting(
		'toc_icon_color',
		array(
			'default' => '#FFF',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'toc_icon_color',
			array(
				'label'       => 'アイコンの色',
				'section'     => 'my_theme_section',
				'description' => '<small>追従するボタンのアイコン色</small>',
				'settings'    => 'toc_icon_color',
				'priority'    => 20,
			)
		)
	);

	/* セクション */
	$wp_customize->add_section(
		'tagcloud_section',
		array(
			'title'    => 'タグの設定',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 2,
		)
	);
	/* Checkbox セッティング1 */
	$wp_customize->add_setting(
		'tagcloud_options[tagcloudCheckbox1]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* Checkbox コントロール1 */
	$wp_customize->add_control(
		'tagcloud_options_origin_checkbox1',
		array(
			'settings'    => 'tagcloud_options[tagcloudCheckbox1]',
			'label'       => '固定ページでタグを利用',
			'description' => '<small>固定ページでタグを利用可能にします。</small>',
			'section'     => 'tagcloud_section',
			'type'        => 'checkbox',
		)
	);

	/* セクション */
	$wp_customize->add_section(
		'pagedesign_section',
		array(
			'title'    => '投稿・固定ページの設定',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 3,
		)
	);
	/* ページ設定Checkbox セッティング1 */
	$wp_customize->add_setting(
		'pagecss_options[pagecssCheckbox1]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* ページ設定Checkbox コントロール1 */
	$wp_customize->add_control(
		'pagecss_options_origin_checkbox1',
		array(
			'settings'    => 'pagecss_options[pagecssCheckbox1]',
			'label'       => 'アイキャッチ画像を全幅',
			'description' => '<small>アイキャッチ画像にある左右の余白を削除します。</small>',
			'section'     => 'pagedesign_section',
			'type'        => 'checkbox',
		)
	);

	/* ページ設定Checkbox セッティング2 */
	$wp_customize->add_setting(
		'pagecss_options[pagecssCheckbox2]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* ページ設定Checkbox コントロール2 */
	$wp_customize->add_control(
		'pagecss_options_origin_checkbox2',
		array(
			'settings'    => 'pagecss_options[pagecssCheckbox2]',
			'label'       => 'リンクカードをフェードイン',
			'description' => '<small>リンクカードを下から上にフェードインさせます。</small>',
			'section'     => 'pagedesign_section',
			'type'        => 'checkbox',
		)
	);

	/* ローディングアニメセクション */
	$wp_customize->add_section(
		'loadinganime_section',
		array(
			'title'    => 'ローディングアニメーションの設定',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 1,
		)
	);
	/* ローディングアニメ 画像セッティング */
	$wp_customize->add_setting( 'loadinganime_img' ); /* 設定項目を追加 */
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'loadinganime_img',
			array(
				'label'       => 'ロゴ画像', /* 設定項目のタイトル */
				'section'     => 'loadinganime_section', /* 追加するセクションのID */
				'settings'    => 'loadinganime_img', /* 追加する設定項目のID */
				'priority'    => 1,
				'description' => '<small>ローディング時に表示させる画像を選択しましょう。登録するとローディングアニメーションが表示されます。</small>', /* 設定項目の説明 */
			)
		)
	);

	/* ローディングアニメ背景色1 */
	$wp_customize->add_setting(
		'loadinganime_background_color1',
		array(
			'default' => '#6bb6ff',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'loadinganime_background_color1',
			array(
				'label'       => '背景色の右側',
				'description' => '<small>背景グラデーションの片側の色です。</small>',
				'section'     => 'loadinganime_section',
				'settings'    => 'loadinganime_background_color1',
				'priority'    => 3,
			)
		)
	);

	/* ローディングアニメ背景色2 */
	$wp_customize->add_setting(
		'loadinganime_background_color2',
		array(
			'default' => '#85e3ec',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'loadinganime_background_color2',
			array(
				'label'       => '背景色の左側',
				'description' => '<small>背景グラデーションのもう片側の色です。グラデーションにしない場合には、両方の色を同じにしてください。</small>',
				'section'     => 'loadinganime_section',
				'settings'    => 'loadinganime_background_color2',
				'priority'    => 4,
			)
		)
	);

	/* ローディングアニメの線の色 */
	$wp_customize->add_setting(
		'loadinganime_background_color3',
		array(
			'default' => '#FFF',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'loadinganime_background_color3',
			array(
				'label'       => 'ローディング線の色',
				'description' => '<small>ローディングバーの色です。</small>',
				'section'     => 'loadinganime_section',
				'settings'    => 'loadinganime_background_color3',
				'priority'    => 5,
			)
		)
	);

	/* ローディングアニメのテキスト */
	$wp_customize->add_setting( 'loadinganime_text' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'loadinganime_text',
			array(
				'label'       => 'ロゴ下のテキスト',
				'description' => '<small>ローディング中、ロゴ下に表示されるテキストです。未入力の場合テキストは出力しません。</small>',
				'section'     => 'loadinganime_section',
				'settings'    => 'loadinganime_text',
				'type'        => 'text',
				'priority'    => 6,
			)
		)
	);

	/* ページ設定Checkbox セッティング2 */
	$wp_customize->add_setting(
		'loadinganime_options[loadinganimeCheckbox1]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* ページ設定Checkbox コントロール2 */
	$wp_customize->add_control(
		'loadinganime_options_origin_checkbox1',
		array(
			'settings'    => 'loadinganime_options[loadinganimeCheckbox1]',
			'label'       => 'ロゴ画像のアニメーションを有効にする。',
			'description' => '<small>ロゴ画像をふわふわさせる場合チェックをつけてください。</small>',
			'section'     => 'loadinganime_section',
			'type'        => 'checkbox',
		)
	);

	/* セクション */
	$wp_customize->add_section(
		'cardtype_section',
		array(
			'title'    => '記事一覧レイアウト',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 2,
		)
	);
	/* 記事一覧のレイアウトトリガーチェックボックス */
	$wp_customize->add_setting(
		'cardtype_options[cardtypeCheckbox1]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* 記事一覧のレイアウトトリガーチェックボックス */
	$wp_customize->add_control(
		'cardtype_options_origin_checkbox1',
		array(
			'settings'    => 'cardtype_options[cardtypeCheckbox1]',
			'label'       => '記事一覧のカードにタグを表示します。',
			'section'     => 'cardtype_section',
			'description' => '<small>横長カードが適用の場合はチェックを入れても有効になりません。</small>',
			'type'        => 'checkbox',
			'priority'    => 1,
		)
	);

	/* 記事一覧のfontawesomeテキスト */
	$wp_customize->add_setting( 'cardtype_text' );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'cardtype_text',
			array(
				'label'       => 'タグのアイコン',
				'description' => '<small>タグにアイコンを表示させる場合、fontawesomeの4桁のコードを記述ください。例）「タグ」の場合 f02b</small>',
				'section'     => 'cardtype_section',
				'settings'    => 'cardtype_text',
				'type'        => 'text',
				'priority'    => 20,
			)
		)
	);

	$wp_customize->add_setting(
		'cardtype_background_color1',
		array(
			'default' => '#f4f4f4',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cardtype_background_color1',
			array(
				'label'       => 'タグの背景色',
				'description' => '<small>タグ背景色の設定です。</small>',
				'section'     => 'cardtype_section',
				'settings'    => 'cardtype_background_color1',
				'priority'    => 3,
			)
		)
	);

	/* 記事一覧のテキスト色 */
	$wp_customize->add_setting(
		'cardtype_textcolor1',
		array(
			'default' => '#666',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cardtype_textcolor1',
			array(
				'label'       => 'タグのテキスト色',
				'description' => '<small>タグテキスト色の設定です。</small>',
				'section'     => 'cardtype_section',
				'settings'    => 'cardtype_textcolor1',
				'priority'    => 4,
			)
		)
	);

	/* タグのアイコン色 */
	$wp_customize->add_setting(
		'cardtype_iconcolor1',
		array(
			'default' => '#999',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cardtype_iconcolor1',
			array(
				'label'       => 'タグのアイコンの色',
				'description' => '<small>タグにアイコンを使う場合の色</small>',
				'section'     => 'cardtype_section',
				'settings'    => 'cardtype_iconcolor1',
				'priority'    => 21,
			)
		)
	);

	/* セクション */
	$wp_customize->add_section(
		'sangoplusfont_section',
		array(
			'title'    => 'フォント',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 2,
		)
	);

	$wp_customize->add_setting(
		'sangoplusfont_options',
		array(
			'default' => 'value1',
			'type'    => 'option',
		)
	);
	$wp_customize->add_control(
		'this_theme_radio_control',
		array(
			'label'       => 'フォントの種類',
			'section'     => 'sangoplusfont_section',
			'settings'    => 'sangoplusfont_options',
			'type'        => 'radio',
			'description' => '<small>使用するフォントを選択してください。</small>',
			'choices'     => array(
				'value1'            => 'デフォルト',
				'mplus1p'           => 'M PLUS 1p',
				'notoserifjapanese' => 'Noto Serif Japanese',
				'kaiseitokumin'     => 'Kaisei Tokumin',
				'kaiseiopti'        => 'Kaisei Opti',
				'shipporimincho'    => 'Shippori Mincho',
				'kiwimaru'          => 'Kiwi Maru',
				'shipporiminchob1'  => 'Shippori Mincho B1',
			),
		)
	);
	/* セクション */
	$wp_customize->add_section(
		'copyprotect_section',
		array(
			'title'    => 'コピープロテクト',
			'panel'    => 'my_theme_origin_scheme',
			'priority' => 8,
		)
	);
	/* コピープロテクトのチェックボックス */
	$wp_customize->add_setting(
		'copyprotect_options[copyprotectCheckbox1]',
		array(
			'default'   => false,
			'type'      => 'option',
			'transport' => 'refresh',
		)
	);
	/* コピープロテクトのチェックボックス */
	$wp_customize->add_control(
		'copyprotect_options_origin_checkbox1',
		array(
			'settings'    => 'copyprotect_options[copyprotectCheckbox1]',
			'label'       => 'コピープロテクトの機能を有効にします。',
			'section'     => 'copyprotect_section',
			'description' => '<small>チェックを入れるとコピープロテクトが有効になります。</small>',
			'type'        => 'checkbox',
			'priority'    => 1,
		)
	);

	/* 権限セクション */
	$wp_customize->add_setting(
		'protectuser_options',
		array(
			'type' => 'option',
		)
	);
	$wp_customize->add_control(
		'this_theme_radio_control2',
		array(
			'label'       => '対象にするユーザー',
			'section'     => 'copyprotect_section',
			'settings'    => 'protectuser_options',
			'type'        => 'radio',
			'description' => '<small>コピープロテクトを有効にした場合、対象にするユーザーを設定できます。</small>',
			'choices'     => array(
				'loginuser' => 'ログインユーザーは対象外',
				'alluser'   => '全ユーザー対象',
			),
		)
	);

	/* コピープロテクトの機能 */
	$wp_customize->add_setting(
		'protectfunction_options',
		array(
			'type' => 'option',
		)
	);
	$wp_customize->add_control(
		'this_theme_radio_control3',
		array(
			'label'       => '有効にするコピープロテクトの機能',
			'section'     => 'copyprotect_section',
			'settings'    => 'protectfunction_options',
			'type'        => 'radio',
			'description' => '<small>コピープロテクトを有効にした場合、選択した機能が有効になります。</small>',
			'choices'     => array(
				'rightclick' => '右クリック禁止',
				'textdrag'   => 'テキストの選択(ドラッグ)禁止',
				'imgkeep'    => '画像の保存禁止',
			),
		)
	);

}
add_action( 'customize_register', 'sangoplus_customize_register' );
