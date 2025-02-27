<?php
namespace ThePackKitThemeBuilder\Modules\DynamicTags\Tags;

use Elementor\Controls_Manager;
use ThePackKitThemeBuilder\Modules\DynamicTags\Tags\Base\Tag;
use ThePackKitThemeBuilder\Modules\DynamicTags\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class User_Info extends Tag {

	public function get_name() {
		return 'user-info';
	}

	public function get_title() {
		return esc_html__( 'User Info', 'news-element' );
	}

	public function get_group() {
		return Module::SITE_GROUP;
	}

	public function get_categories() {
		return [ Module::TEXT_CATEGORY ];
	}

	public function render() {
		$type = $this->get_settings( 'type' );
		$user = wp_get_current_user();
		if ( empty( $type ) || 0 === $user->ID ) {
			return;
		}

		$value = '';
		switch ( $type ) {
			case 'login':
			case 'email':
			case 'url':
			case 'nicename':
				$field = 'user_' . $type;
				$value = isset( $user->$field ) ? $user->$field : '';
				break;
			case 'id':
				$value = $user->ID;
				break;
			case 'description':
			case 'first_name':
			case 'last_name':
			case 'display_name':
				$value = isset( $user->$type ) ? $user->$type : '';
				break;
			case 'meta':
				$key = $this->get_settings( 'meta_key' );
				if ( ! empty( $key ) ) {
					$value = get_user_meta( $user->ID, $key, true );
				}
				break;
		}

		echo wp_kses_post( $value );
	}

	public function get_panel_template_setting_key() {
		return 'type';
	}

	protected function register_controls() {
		$this->add_control(
			'type',
			[
				'label' => esc_html__( 'Field', 'news-element' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Choose', 'news-element' ),
					'id' => esc_html__( 'ID', 'news-element' ),
					'display_name' => esc_html__( 'Display Name', 'news-element' ),
					'login' => esc_html__( 'Username', 'news-element' ),
					'first_name' => esc_html__( 'First Name', 'news-element' ),
					'last_name' => esc_html__( 'Last Name', 'news-element' ),
					'description' => esc_html__( 'Bio', 'news-element' ),
					'email' => esc_html__( 'Email', 'news-element' ),
					'url' => esc_html__( 'Website', 'news-element' ),
					'meta' => esc_html__( 'User Meta', 'news-element' ),
				],
			]
		);

		$this->add_control(
			'meta_key',
			[
				'label' => esc_html__( 'Meta Key', 'news-element' ),
				'condition' => [
					'type' => 'meta',
				],
			]
		);
	}
}
