<?php

/**
 * Set languages of sentenses in app.
 */
class Language {
	/**
	 * Store language code.

	 * @var string $language
	 */
	private $language = 'en_US';

	/**
	 * Set language code with Constructor

	 * @param string $language is language code.
	 */
	public function __construct( $language ) {

		// Set language code to the property.
		$this->language = $language;

		// Get all language settings.
		$lans = $this->settings();

		// Loop all sentences.
		foreach ( $lans as $key => $lan ) {
			// If language code exists in language sentences, add it to public properties.
			if ( array_key_exists( $this->language, $lan ) ) {
				$this->{$key} = $lan[ $this->language ];
			} else {
				// If it doesn't exist set the en_US sentense.
				$this->{$key} = $lan['en_US'];
			}
		}
	}


	/**
	 * Set setences for each languages.
	 */
	private function settings() {

		$lan_words = array(
			'app_name' => array(
				'en_US' => 'Zumi Ad Shortcode',
				'ja'    => 'Zumi Ad Shortcode',
			),
			'app_description' => array(
				'en_US' => 'You can place your Ads anywhere you want.',
				'ja'    => '自由に広告を配置する事ができます。',
			),
			'dashboard' => array(
				'en_US' => 'Dashboard',
				'ja'    => 'ダッシュボード',
			),
			'manage_ads' => array(
				'en_US' => 'Manage Ads',
				'ja'    => '広告管理',
			),
			'manage_ad_shortcode' => array(
				'en_US' => 'Manage Ad Shortcode',
				'ja'    => 'ショートコード管理',
			),
			'manage_fixed_ads' => array(
				'en_US' => 'Manage Fixed Ads',
				'ja'    => '配置広告管理',
			),
			'settings' => array(
				'en_US' => 'Settings',
				'ja'    => '設定',
			),
			'ad_id' => array(
				'en_US' => 'Ad ID',
				'ja'    => '広告ID',
			),
			'shortcode_tag' => array(
				'en_US' => 'Shortcode Tag',
				'ja'    => 'ショートコードタグ',
			),
			'code' => array(
				'en_US' => 'Code',
				'ja'    => 'コード',
			),
			'description' => array(
				'en_US' => 'Description',
				'ja'    => '概要',
			),
			'edit' => array(
				'en_US' => 'Edit',
				'ja'    => '編集',
			),
			'ad_id_cannot_be_empty' => array(
				'en_US' => 'Ad ID cannot be empty.',
				'ja'    => '広告IDを入力してください。',
			),
			'ad_id_has_unavailable_characters' => array(
				'en_US' => 'Ad ID has unavaialbe characters',
				'ja'    => '広告IDに使えない文字列が含まれています。',
			),
			'ad_id_exists' => array(
				'en_US' => 'Ad ID already exiests in your Ad table',
				'ja'    => '指定した広告IDはすでに存在します。',
			),
			'tag_cannot_be_empty' => array(
				'en_US' => 'Tag cannot be empty.',
				'ja'    => 'タグを入力してください。',
			),
			'tag_has_unavailable_characters' => array(
				'en_US' => 'Tag has unavaialbe characters',
				'ja'    => 'タグに使えない文字列が含まれています。',
			),
			'tag_exists' => array(
				'en_US' => 'Tag already exiests in your Ad table',
				'ja'    => '指定したタグはすでに存在します。',
			),
			'back_to_manage_ads' => array(
				'en_US' => 'Back to the Ad List',
				'ja'    => '広告一覧へ戻る',
			),
			'back_to_manage_ad_shortcode' => array(
				'en_US' => 'Back to the Shortcode List',
				'ja'    => '広告ショートコード一覧へ戻る',
			),
			'back_to_manage_fixed_ads' => array(
				'en_US' => 'Back to the Fixed Ad List',
				'ja'    => '配置広告一覧へ戻る',
			),
			'saved' => array(
				'en_US' => 'Saved',
				'ja'    => '保存完了',
			),
			'save' => array(
				'en_US' => 'Save',
				'ja'    => '保存',
			),
			'make_new' => array(
				'en_US' => 'Make New',
				'ja'    => '新規作成',
			),
			'content' => array(
				'en_US' => 'Content',
				'ja'    => 'コンテンツ',
			),
			'position' => array(
				'en_US' => 'Position',
				'ja'    => '配置場所',
			),
			'before_content' => array(
				'en_US' => 'Before Content',
				'ja'    => 'コンテンツの前',
			),
			'after_content' => array(
				'en_US' => 'After Content',
				'ja'    => 'コンテンツの後',
			),
			'widget' => array(
				'en_US' => 'Widget',
				'ja'    => 'ウィジェット',
			),
			'name' => array(
				'en_US' => 'Name',
				'ja'    => '名前',
			),
			'import' => array(
				'en_US' => 'Import',
				'ja'    => 'インポート',
			),
			'export' => array(
				'en_US' => 'Export',
				'ja'    => 'エクスポート',
			),
			'shortcode_tag_explain' => array(
				'en_US' => 'You can change the tag for using shortcode.<br>Usage: [tag {Ad id}]',
				'ja'    => 'ショートコード用のタグを変更できます。使用方法： [tag {広告ID}]',
			),
			'delete' => array(
				'en_US' => 'Delete',
				'ja'    => '削除',
			),
			'delete_confirm' => array(
				'en_US' => 'Are you sure you want to delete below?<br>[id]',
				'ja'    => '以下を削除してもよろしいですか？<br>[id]',
			),
			'max_explain' => array(
				'en_US' => 'The maximum record is [number].',
				'ja'    => '最大[number]件まで登録可',
			),
			'exceed_max' => array(
				'en_US' => 'You can\'t add a new record, it exceeds [number].',
				'ja'    => '[number]件を超えているため新規登録できません。',
			),
		);

		return $lan_words;
	}


	/**
	 * Convert variables.

	 * @param string $key is name of language key.
	 * @param array  $words is a array, a combination variable name and value.
	 */
	public function getModified( $key, $words = array() ) {

		$sentence = $this->{$key};

		foreach ( $words as $key => $word ) {
			$sentence = str_replace( $key, $word, $sentence );
		}

		return $sentence;
	}
}
