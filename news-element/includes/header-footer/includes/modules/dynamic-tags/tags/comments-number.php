<?php
namespace ThePackKitThemeBuilder\Modules\DynamicTags\Tags;

use Elementor\Controls_Manager;
use ThePackKitThemeBuilder\Modules\DynamicTags\Tags\Base\Tag;
use ThePackKitThemeBuilder\Modules\DynamicTags\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Comments_Number extends Tag {

	public function get_name() {
		return 'comments-number';
	}

	public function get_title() {
		return esc_html__( 'Comments Number', 'news-element' );
	}

	public function get_group() {
		return Module::COMMENTS_GROUP;
	}

	public function get_categories() {
		return [
			Module::TEXT_CATEGORY,
			Module::NUMBER_CATEGORY,
		];
	}

	protected function register_controls() {
		$this->add_control(
			'format_no_comments',
			[
				'label' => esc_html__( 'No Comments Format', 'news-element' ),
				'default' => esc_html__( 'No Responses', 'news-element' ),
			]
		);

		$this->add_control(
			'format_one_comments',
			[
				'label' => esc_html__( 'One Comment Format', 'news-element' ),
				'default' => esc_html__( 'One Response', 'news-element' ),
			]
		);

		$this->add_control(
			'format_many_comments',
			[
				'label' => esc_html__( 'Many Comment Format', 'news-element' ),
				'default' => esc_html__( '{number} Responses', 'news-element' ),
			]
		);

		$this->add_control(
			'link_to',
			[
				'label' => esc_html__( 'Link', 'news-element' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'None', 'news-element' ),
					'comments_link' => esc_html__( 'Comments Link', 'news-element' ),
				],
			]
		);
	}

	public function render() {
		$settings = $this->get_settings();

		$comments_number = get_comments_number();

		if ( ! $comments_number ) {
			$count = $settings['format_no_comments'];
		} elseif ( 1 === $comments_number ) {
			$count = $settings['format_one_comments'];
		} else {
			$count = strtr( $settings['format_many_comments'], [
				'{number}' => number_format_i18n( $comments_number ),
			] );
		}

		if ( 'comments_link' === $this->get_settings( 'link_to' ) ) {
			$count = sprintf( '<a href="%s">%s</a>', get_comments_link(), $count );
		}

		echo wp_kses_post( $count );
	}
}
