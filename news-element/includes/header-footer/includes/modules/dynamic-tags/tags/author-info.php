<?php
namespace ThePackKitThemeBuilder\Modules\DynamicTags\Tags;

use Elementor\Controls_Manager;
use ThePackKitThemeBuilder\Modules\DynamicTags\Tags\Base\Tag;
use ThePackKitThemeBuilder\Modules\DynamicTags\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Author_Info extends Tag {

	public function get_name() {
		return 'author-info';
	}

	public function get_title() {
		return esc_html__( 'Author Info', 'news-element' );
	}

	public function get_group() {
		return Module::AUTHOR_GROUP;
	}

	public function get_categories() {
		return [ Module::TEXT_CATEGORY ];
	}

	public function render() {
		$key = $this->get_settings( 'key' );

		if ( empty( $key ) ) {
			return;
		}

		$value = get_the_author_meta( $key );

		echo wp_kses_post( $value );
	}

	public function get_panel_template_setting_key() {
		return 'key';
	}

	protected function register_controls() {
		$this->add_control(
			'key',
			[
				'label' => esc_html__( 'Field', 'news-element' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'description',
				'options' => [
					'description' => esc_html__( 'Bio', 'news-element' ),
					'email' => esc_html__( 'Email', 'news-element' ),
					'url' => esc_html__( 'Website', 'news-element' ),
				],
			]
		);
	}
}
