<?php
namespace ThePackKitThemeBuilder\Modules\DynamicTags;

use Elementor\Modules\DynamicTags\Module as TagsModule;
use ThePackKitThemeBuilder\Modules\DynamicTags\ACF;
use ThePackKitThemeBuilder\Modules\DynamicTags\Toolset;
use ThePackKitThemeBuilder\Modules\DynamicTags\Pods;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Module extends TagsModule {

	const AUTHOR_GROUP = 'author';

	const POST_GROUP = 'post';

	const COMMENTS_GROUP = 'comments';

	const SITE_GROUP = 'site';

	const ARCHIVE_GROUP = 'archive';

	const MEDIA_GROUP = 'media';

	const ACTION_GROUP = 'action';

	public function __construct() {
		parent::__construct();
	}

	public function get_name() {
		return 'tags';
	}

	public function get_tag_classes_names() {
		return [

		];
	}

	public function get_groups() {
		return [
			self::POST_GROUP => [
				'title' => esc_html__( 'Post', 'news-element' ),
			],
			self::ARCHIVE_GROUP => [
				'title' => esc_html__( 'Archive', 'news-element' ),
			],
			self::SITE_GROUP => [
				'title' => esc_html__( 'Site', 'news-element' ),
			],
			self::MEDIA_GROUP => [
				'title' => esc_html__( 'Media', 'news-element' ),
			],
			self::ACTION_GROUP => [
				'title' => esc_html__( 'Actions', 'news-element' ),
			],
			self::AUTHOR_GROUP => [
				'title' => esc_html__( 'Author', 'news-element' ),
			],
			self::COMMENTS_GROUP => [
				'title' => esc_html__( 'Comments', 'news-element' ),
			],
		];
	}
}
