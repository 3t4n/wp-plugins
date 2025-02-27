<?php

namespace ThePackKitThemeBuilder\Modules\Popup\DisplaySettings;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Timing extends Base {

	/**
	 * Get element name.
	 *
	 * Retrieve the element name.
	 *
	 * @since  2.4.0
	 * @access public
	 *
	 * @return string The name.
	 */
	public function get_name() {
		return 'popup_timing';
	}

	protected function register_controls() {
		$this->start_controls_section( 'timing' );

		$this->start_settings_group( 'page_views', esc_html__( 'Show after X page views', 'news-element' ) );

		$this->add_settings_group_control(
			'views',
			[
				'type' => Controls_Manager::NUMBER,
				'label' => esc_html__( 'Page Views', 'news-element' ),
				'default' => 3,
				'min' => 1,
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'sessions', esc_html__( 'Show after X sessions', 'news-element' ) );

		$this->add_settings_group_control(
			'sessions',
			[
				'type' => Controls_Manager::NUMBER,
				'label' => esc_html__( 'Sessions', 'news-element' ),
				'default' => 2,
				'min' => 1,
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'times', esc_html__( 'Show up to X times', 'news-element' ) );

		$this->add_settings_group_control(
			'times',
			[
				'type' => Controls_Manager::NUMBER,
				'label' => esc_html__( 'Times', 'news-element' ),
				'default' => 3,
				'min' => 1,
			]
		);

		$this->add_settings_group_control(
			'count',
			[
				'type' => Controls_Manager::SELECT,
				'label' => esc_html__( 'Count', 'news-element' ),
				'options' => [
					'' => esc_html__( 'On Open', 'news-element' ),
					'close' => esc_html__( 'On Close', 'news-element' ),
				],
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'url', esc_html__( 'When arriving from specific URL', 'news-element' ) );

		$this->add_settings_group_control(
			'action',
			[
				'type' => Controls_Manager::SELECT,
				'default' => 'show',
				'options' => [
					'show' => esc_html__( 'Show', 'news-element' ),
					'hide' => esc_html__( 'Hide', 'news-element' ),
					'regex' => esc_html__( 'Regex', 'news-element' ),
				],
			]
		);

		$this->add_settings_group_control(
			'url',
			[
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'URL', 'news-element' ),
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'sources', esc_html__( 'Show when arriving from', 'news-element' ) );

		$this->add_settings_group_control(
			'sources',
			[
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => [ 'search', 'external', 'internal' ],
				'options' => [
					'search' => esc_html__( 'Search Engines', 'news-element' ),
					'external' => esc_html__( 'External Links', 'news-element' ),
					'internal' => esc_html__( 'Internal Links', 'news-element' ),
				],
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'logged_in', esc_html__( 'Hide for logged in users', 'news-element' ) );

		$this->add_settings_group_control(
			'users',
			[
				'type' => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => [
					'all' => esc_html__( 'All Users', 'news-element' ),
					'custom' => esc_html__( 'Custom', 'news-element' ),
				],
			]
		);

		global $wp_roles;

		$roles = array_map( function( $role ) {
			return $role['name'];
		}, $wp_roles->roles );

		$this->add_settings_group_control(
			'roles',
			[
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => [],
				'options' => $roles,
				'select2options' => [
					'placeholder' => esc_html__( 'Select Roles', 'news-element' ),
				],
				'condition' => [
					'users' => 'custom',
				],
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'devices', esc_html__( 'Show on devices', 'news-element' ) );

		$this->add_settings_group_control(
			'devices',
			[
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => [ 'desktop', 'tablet', 'mobile' ],
				'options' => [
					'desktop' => esc_html__( 'Desktop', 'news-element' ),
					'tablet' => esc_html__( 'Tablet', 'news-element' ),
					'mobile' => esc_html__( 'Mobile', 'news-element' ),
				],
			]
		);

		$this->end_settings_group();

		$this->start_settings_group( 'browsers', esc_html__( 'Show on browsers', 'news-element' ) );

		$this->add_settings_group_control(
			'browsers',
			[
				'type' => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => [
					'all' => esc_html__( 'All Browsers', 'news-element' ),
					'custom' => esc_html__( 'Custom', 'news-element' ),
				],
			]
		);

		$this->add_settings_group_control(
			'browsers_options',
			[
				'type' => Controls_Manager::SELECT2,
				'multiple' => true,
				'default' => [],
				'options' => [
					'ie' => esc_html__( 'Internet Explorer', 'news-element' ),
					'chrome' => esc_html__( 'Chrome', 'news-element' ),
					'edge' => esc_html__( 'Edge', 'news-element' ),
					'firefox' => esc_html__( 'Firefox', 'news-element' ),
					'safari' => esc_html__( 'Safari', 'news-element' ),
				],
				'condition' => [
					'browsers' => 'custom',
				],
			]
		);

		$this->end_settings_group();

		$this->end_controls_section();
	}
}
