<?php
namespace AcademyEA\Widgets;

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use AcademyEA\Traits\CommonStyle;

class Dashboard extends Widget_Base {
	use CommonStyle;

	public function get_name() {
		return 'academyea-dashboard';
	}

	public function get_title() {
		return esc_html__( 'User Dashboard', 'academy-elementor-addons' );
	}

	public function get_icon() {
		return 'eicon-dashboard';
	}

	public function get_categories() {
		return [ 'academyea-widgets' ];
	}

	public function get_keywords() {
		return [ 'course', 'dashboard', 'academy', 'lms' ];
	}

	protected function register_controls() {

		// Dashboard Menu
		$this->start_controls_section(
			'dashboard_menu',
			[
				'label' => __( 'Dashboard Menu Wrap', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->normal_element(
			'dashboard_menu_normal_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-sidebar',
			[ 'background', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);

		$this->end_controls_section();

		// User Info
		$this->start_controls_section(
			'dashboard_user_info',
			[
				'label' => __( 'Dashboard Menu User Info', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'dashboard_user_thumbnail',
			[
				'label' => esc_html__( 'User Thumbnail', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'dashboard_user_thumbnail_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-user__thumbnail',
			[ 'border', 'radius' ]
		);

		$this->size_element(
			'dashboard_user_thumbnail_style',
			'_dashboard_user_thumbnail_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-user__thumbnail',
			[ 'width', 'height' ]
		);

		$this->add_control(
			'user_name_typography',
			[
				'label' => esc_html__( 'User Name', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'user_name_typography_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-user__content .user-profile-name',
			[ 'typography', 'color' ]
		);

		$this->add_control(
			'user_designation_typography',
			[
				'label' => esc_html__( 'User designation', 'academy-elementor-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'after',
			]
		);

		$this->normal_element(
			'user_designation_typography_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-user__content .user-designation',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

		// Menu Item
		$this->start_controls_section(
			'dashboard_menu_item',
			[
				'label' => __( 'Dashboard Menu Item', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'dashboard_menu_item_tabs_style' );

		$this->start_controls_tab(
			'dashboard_menu_item_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'academy-elementor-addons' ),
			]
		);
		$this->normal_element(
			'dashboard_menu_item_normal_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-menu li a',
			[ 'typography', 'color', 'icon_color', 'icon_size', 'background', 'border', 'radius', 'padding', 'margin' ]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'dashboard_menu_item_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'academy-elementor-addons' ),
			]
		);

		$this->hover_element(
			'dashboard_menu_item_hover_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-menu li:hover a',
			[ 'color', 'icon_color', 'background', 'border', 'radius' ]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Menu Item Separator
		$this->start_controls_section(
			'menu_item_separator',
			[
				'label' => __( 'Menu Item Separator', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->normal_element(
			'menu_item_separator_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-menu .academy-dashboard-menu__divider',
			[ 'typography', 'color', 'background', 'margin', 'padding' ]
		);

		$this->end_controls_section();

		// Dashboard top bar
		$this->start_controls_section(
			'dashboard_top_bar',
			[
				'label' => __( 'Dashboard Top Bar', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->normal_element(
			'dashboard_top_bar_normal_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-entry-content .academy-topbar',
			[ 'background', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);

		$this->normal_element(
			'dashboard_top_bar_heading_normal_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-topbar__entry-left .academy-topbar-heading',
			[ 'typography', 'color' ]
		);

		$this->end_controls_section();

		// Dashboard Content
		$this->start_controls_section(
			'dashboard_content',
			[
				'label' => __( 'Dashboard Content Wrap', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->normal_element(
			'dashboard_content_normal_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-entry-content',
			[ 'background', 'border', 'radius', 'box_shadow', 'padding', 'margin' ]
		);

		$this->end_controls_section();

		// Dashboard Content Heading
		$this->start_controls_section(
			'dashboard_content_heading',
			[
				'label' => __( 'Dashboard Content Heading', 'academy-elementor-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->normal_element(
			'dashboard_content_heading_style',
			'{{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-entry-content .academy-dashboard-header, {{WRAPPER}} .academyFrontendDashWrap .academy-dashboard-entry-content .academy-mycourse-heading',
			[ 'typography', 'color', 'margin', 'padding' ]
		);

		$this->end_controls_section();

	}


	protected function render() {
		?>
		<div class="academyea-widget-dashboard"><?php echo do_shortcode( '[academy_dashboard]' ); ?></div>
		<?php
	}

}
