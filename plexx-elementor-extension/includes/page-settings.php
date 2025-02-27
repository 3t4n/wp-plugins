<?php

function add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ) {

  $page->add_control(
    'more_options',
    [
      'label' => __( 'Plexx Page Settings', 'plexx' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $page->add_control(
    'show_title',
    [
      'label' => __( 'Show Title', 'plexx' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'block',
      'options' => [
        'block'  => __( 'Show', 'plexx' ),
        'none' => __( 'Hide', 'plexx' ),
      ],
      'selectors' => [
        '{{WRAPPER}} #page-title, {{WRAPPER}} .title-container' => 'display: {{VALUE}} !important',
      ],
    ]
  );
  $page->add_control(
    'show_menu',
    [
      'label' => __( 'Show Menu & Logo', 'plexx' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'block',
      'options' => [
        'block'  => __( 'Show', 'plexx' ),
        'none' => __( 'Hide', 'plexx' ),
      ],
      'selectors' => [
        '{{WRAPPER}} .nav_container' => 'display: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'show_footer',
    [
      'label' => __( 'Show Footer', 'plexx' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'block',
      'options' => [
        'block'  => __( 'Show', 'plexx' ),
        'none' => __( 'Hide', 'plexx' ),
      ],
      'selectors' => [
        '{{WRAPPER}} #footer' => 'display: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'menu_padding',
    [
      'label' => __( 'Gap between Navigation & Content', 'plexx' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => '35px',
      'options' => [
        '35px'  => __( 'Default', 'plexx' ),
        '0px' => __( 'Hide', 'plexx' ),
      ],
      'selectors' => [
        '{{WRAPPER}} .portfolio-text, {{WRAPPER}} .elementor-column-gap-default>.elementor-row>.elementor-column>.elementor-element-populated' => 'padding-top: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'page_margin',
    [
      'label' => __( 'Negative margin-top', 'plexx' ),
      'type' => \Elementor\Controls_Manager::SLIDER,
      'size_units' => [ 'px' ],
      'range' => [
        'px' => [
          'max' => 250,
        ],
      ],
      'selectors' => [
        '{{WRAPPER}} .content-wrapper' => 'margin-top: -{{SIZE}}px',
        '.nav_container' => 'z-index: 999; position: relative;'
      ],
    ]
  );
  $page->add_control(
    'more_options2',
    [
      'label' => __( 'Plexx Color Settings', 'plexx' ),
      'type' => \Elementor\Controls_Manager::HEADING,
      'separator' => 'before',
    ]
  );
  $page->add_control(
    'menu_item_color',
    [
      'label' => __( 'Menu Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .top-navigation li a' => 'color: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'menu_underline',
    [
      'label' => __( 'Menu Line Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .nav-menu a::before' => 'background: {{VALUE}};',
      ],
    ]
  );
  $page->add_control(
    'mobile_icon_color',
    [
      'label' => __( 'Mobile Menu Icon Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .menu-dropdown span, {{WRAPPER}} .menu-dropdown span:before, {{WRAPPER}} .menu-dropdown span:after' => 'background: {{VALUE}};',
        '{{WRAPPER}} .menu-dropdown.toggled-on span' => 'background: transparent;',
      ],
    ]
  );
  $page->add_control(
    'dropdown_color',
    [
      'label' => __( 'Dropdown Menu Text', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .top-navigation ul ul li a' => 'color: {{VALUE}} !important;'
      ],
    ]
  );
  $page->add_control(
    'dropdown_bg_color',
    [
      'label' => __( 'Dropdown Menu Background', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .top-navigation ul ul' => 'background: {{VALUE}};',
        '{{WRAPPER}} .top-navigation ul.sub-menu::before' => 'border-color: transparent transparent {{VALUE}};',
      ],
    ]
  );
  $page->add_control(
    'logo_color',
    [
      'label' => __( 'Logo Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} #logo a' => 'color: {{VALUE}}',
        '{{WRAPPER}} .cls-1' => 'fill: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'title_color',
    [
      'label' => __( 'Page Title Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} #page-title h1' => 'color: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'floating_social_color',
    [
      'label' => __( 'Floating Social links Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} .floating-social a' => 'color: {{VALUE}}',
        '{{WRAPPER}} .floating-social a::before' => 'background: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'footer_color',
    [
      'label' => __( 'Footer Background Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} #footer' => 'background: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'footer_title_color',
    [
      'label' => __( 'Footer Titles Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} h6.widget-title, {{WRAPPER}} .description h3' => 'color: {{VALUE}}; opacity: 1;',
      ],
    ]
  );
  $page->add_control(
    'footer_text_color',
    [
      'label' => __( 'Footer Text Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} #footer .author-bio, {{WRAPPER}} .copyright, {{WRAPPER}} #footer li, {{WRAPPER}} #footer p' => 'color: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'footer_links_color',
    [
      'label' => __( 'Footer Links & Icons Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} #footer .widget a, {{WRAPPER}} #footer .nosearch-results.nosearch-cats a' => 'color: {{VALUE}}',
      ],
    ]
  );
  $page->add_control(
    'preloader_bg_color',
    [
      'label' => __( 'Preloader Background Color', 'plexx' ),
      'type' => \Elementor\Controls_Manager::COLOR,
      'selectors' => [
        '{{WRAPPER}} #loader' => 'background: {{VALUE}}',
      ],
    ]
  );
}

add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'add_elementor_page_settings_controls' );
