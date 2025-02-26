<?php

namespace Elementor;

use Elementor\Icons_Manager;
use Elementor\Controls_Manager;
use Elementor\Frontend;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Datamentor_Data_Table_Widget extends Widget_Base {

    public function get_name() {
        return 'datamentor_table';
    }

    public function get_title() {
        return __('DM Data Table', 'datamentor');
    }

    public function get_icon() {
        return 'eicon-table';
    }

    //Function for include element into the category.
    public function get_categories() {
        return ['datamentor'];
    }

    /*
     * Adding the controls fields for the Blog Layout
     */

    protected function register_controls() {

        $this->start_controls_section(
                'section_layout', array(
            'label' => __('Header', 'datamentor'),
                )
        );
        $repeater = new \Elementor\Repeater();
        
            $repeater->add_control(
                'dmele_data_table_header_col', [
                    'label' => __('Column Name', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Table Header', 'datamentor'),
                    'label_block' => false,
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_col_span', [
                    'label' => __('Column Span', 'datamentor'),
                    'default' => '',
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_col_icon_enabled', [
                    'label' => __('Enable Header Icon', 'datamentor'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __('Yes', 'datamentor'),
                    'label_off' => __('No', 'datamentor'),
                    'default' => 'false',
                    'return_value' => 'true',
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_icon_type', [
                    'label' => __('Header Icon Type', 'datamentor'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'none' => [
                            'title' => __('None', 'datamentor'),
                            'icon' => 'fa fa-ban',
                        ],
                        'icon' => [
                            'title' => __('Icon', 'datamentor'),
                            'icon' => 'fa fa-star',
                        ],
                        'image' => [
                            'title' => __('Image', 'datamentor'),
                            'icon' => 'eicon-image',
                        ],
                    ],
                    'default' => 'icon',
                    'condition' => [
                        'dmele_data_table_header_col_icon_enabled' => 'true'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_col_icon_new', [
                    'label'         => __('Icon', 'datamentor'),
                    'type'          => Controls_Manager::ICONS,
                    'default'       => [
                        'value'     => 'fas fa-circle',
                        'library'   => 'fa-solid',
                    ],
                    'recommended'   => [
                        'fa-solid'  => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition'     => [
                        'dmele_data_table_header_col_icon_enabled' => 'true',
                        'dmele_data_table_header_icon_type' => 'icon'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_col_img', [
                    'label' => __('Image', 'datamentor'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'dmele_data_table_header_icon_type' => 'image'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_col_img_size', [
                    'label' => __('Image Size(px)', 'datamentor'),
                    'default' => '25',
                    'type' => Controls_Manager::NUMBER,
                    'label_block' => false,
                    'condition' => [
                        'dmele_data_table_header_icon_type' => 'image'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_header_col_svg_img_size', [
                    'label' => __('SVG Image Size(px)', 'datamentor'),
                    'default' => '15',
                    'type' => Controls_Manager::NUMBER,
                    'label_block' => false,
                    'condition' => [
                        'dmele_data_table_header_icon_type' => 'icon',
                        'dmele_data_table_header_col_icon_new' => '',
                    ]
                ]
            );

            $repeater->add_control(
                'dmele_data_table_header_css_class', [
                    'label' => __('CSS Class', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ]
                );
            $repeater->add_control(
                'dmele_data_table_header_css_id', [
                    'label' => __('CSS ID', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                ]
            );

            $this->add_control(
                'dmele_data_table_header_cols_data', [
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'separator' => 'before',
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        ['dmele_data_table_header_col' => __('Table Header', 'datamentor')],
                        ['dmele_data_table_header_col' => __('Table Header', 'datamentor')],
                        ['dmele_data_table_header_col' => __('Table Header', 'datamentor')],
                        ['dmele_data_table_header_col' => __('Table Header', 'datamentor')],
                    ],
                    'title_field' => '{{dmele_data_table_header_col}}', 
                ]       
            );

        $this->end_controls_section();

        /**
         * Data Table Content
         */
        $this->start_controls_section(
            'dmele_section_data_table_cotnent', [
                'label' => __('Content', 'datamentor')
            ]
        );
        $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'dmele_data_table_content_row_type', [
                    'label' => __('Row Type', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'row',
                    'label_block' => false,
                    'options' => [
                        'row' => __('Row', 'datamentor'),
                        'col' => __('Column', 'datamentor'),
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_colspan', [
                    'label' => __('Col Span', 'datamentor'),
                    'type' => Controls_Manager::NUMBER,
                    'description' => __('Default: 1 (optional).'),
                    'default' => 1,
                    'min' => 1,
                    'label_block' => true,
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_rowspan', [
                    'label' => __('Row Span', 'datamentor'),
                    'type' => Controls_Manager::NUMBER,
                    'description' => __('Default: 1 (optional).'),
                    'default' => 1,
                    'min' => 1,
                    'label_block' => true,
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_type', [
                    'label' => __('Content Type', 'datamentor'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'textarea' => [
                            'title' => __('Textarea', 'datamentor'),
                            'icon' => 'fa fa-text-width',
                        ],
                        'editor' => [
                            'title' => __('Editor', 'datamentor'),
                            'icon' => 'eicon-edit',
                        ],
                        'template' => [
                            'title' => __('Templates', 'datamentor'),
                            'icon' => 'fa fa-file',
                        ],
                        'button' => [
                            'title' => __('Button', 'datamentor'),
                            'icon' => 'eicon-button',
                        ]
                    ],
                    'default' => 'textarea',
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col'
                    ]
                ]
            );

            $repeater->add_control(
                'dmele_data_table_custom_button_text', [
                    'label' => __('Button Text', 'datamentor'),
                    'default' => __('Click here', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'condition' => [
                        'dmele_data_table_content_type' => 'button',
                    ],
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_link', [
                    'label' => __('Button Link', 'datamentor'),
                    'type' => Controls_Manager::URL,
                    'label_block' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => '',
                    ],
                    'show_external' => true,
                    'separator' => 'before',
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ],
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_align', [
                    'label' => __('Button Alignment', 'datamentor'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __('Left', 'elementor'),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __('Center', 'elementor'),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __('Right', 'elementor'),
                            'icon' => 'eicon-text-align-right',
                        ],
                        'justify' => [
                            'title' => __('Justified', 'elementor'),
                            'icon' => 'eicon-text-align-justify',
                        ],
                    ],
                    'prefix_class' => 'elementor%s-align-',
                    'default' => 'left',
                    'selectors' => [
                        '{{WRAPPER}} .dmele-data-table {{CURRENT_ITEM}} .dmele-content-button' => 'text-align: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ],
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_color', [
                    'label' => __('Button Text Color', 'datamentor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'color: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_bg_color', [
                    'label' => __('Button Background Color', 'datamentor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#61ce70',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'background-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );

            $repeater->add_control(
                'dmele_data_table_custom_button_border', [
                    'label' => __('Button Border', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => false,
                    'default' => 'none',
                    'options' => [
                        'none' => __('None', 'datamentor'),
                        'solid' => __('Solid', 'datamentor'),
                        'double' => __('Double', 'datamentor'),
                        'dotted' => __('Dotted', 'datamentor'),
                        'dashed' => __('Dashed', 'datamentor'),
                        'groove' => __('Groove', 'datamentor'),
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_border_radius', [
                    'label' => __('Button Border Radius', 'datamentor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'default' => [
                        'top' => 3,
                        'right' => 3,
                        'bottom' => 3,
                        'left' => 3,
                        'isLinked' => true,
                        'unit' => 'px'
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );

            $repeater->add_control(
                'dmele_data_table_custom_button_border_width', [
                    'label' => __('Button Border Width', 'datamentor'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 50,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'border-width: {{VALUE}}px;'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_border_color', [
                    'label' => __('Button Border Color', 'datamentor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'border-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_hover_color', [
                    'label' => __('Button Text Hover Color', 'datamentor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#fff',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a:hover' => 'color: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_hover_bg_color', [
                    'label' => __('Button Hover Background Color', 'datamentor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a:hover' => 'background-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_hover_border_color', [
                    'label' => __('Button Hover Border Color', 'datamentor'),
                    'type' => Controls_Manager::COLOR,
                    'default' => '#333',
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a:hover' => 'border-color: {{VALUE}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_text_padding', [
                    'label' => __('Button Padding', 'datamentor'),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', 'em'],
                    'default' => [
                        'top' => 12,
                        'right' => 24,
                        'bottom' => 12,
                        'left' => 24,
                        'isLinked' => true,
                        'unit' => 'px'
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                    ],
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_icon_type', [
                    'label' => __('Button Icon Type', 'datamentor'),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'none' => [
                            'title' => __('None', 'datamentor'),
                            'icon' => 'fa fa-ban',
                        ],
                        'icon' => [
                            'title' => __('Icon', 'datamentor'),
                            'icon' => 'fa fa-star',
                        ],
                        'image' => [
                            'title' => __('Image', 'datamentor'),
                            'icon' => 'eicon-image',
                        ],
                    ],
                    'default' => 'icon',
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_icon_value', [
                    'label'         => __('Button Icon', 'datamentor'),
                    'type'          => Controls_Manager::ICONS,
                    'default'       => [
                        'value'     => 'fas fa-circle',
                        'library'   => 'fa-solid',
                    ],
                    'recommended'   => [
                        'fa-solid'  => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                        'fa-regular' => [
                            'circle',
                            'dot-circle',
                            'square-full',
                        ],
                    ],
                    'condition'     => [
                        'dmele_data_table_custom_button_icon_type' => 'icon',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );

            $repeater->add_control(
                'dmele_data_table_custom_button_image_value', [
                    'label' => __('Button Image', 'datamentor'),
                    'type' => Controls_Manager::MEDIA,
                    'default' => [
                        'url' => Utils::get_placeholder_image_src(),
                    ],
                    'condition' => [
                        'dmele_data_table_custom_button_icon_type' => 'image',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_image_size', [
                    'label' => __('Button Image Size(px)', 'datamentor'),
                    'default' => '25',
                    'type' => Controls_Manager::NUMBER,
                    'label_block' => false,
                    'condition' => [
                        'dmele_data_table_custom_button_icon_type' => 'image',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_icon_align', [
                    'label' => __('Button Icon Position', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'left',
                    'options' => [
                        'left' => __('Before', 'datamentor'),
                        'right' => __('After', 'datamentor'),
                    ],
                    'condition' => [
                        'dmele_data_table_custom_button_icon_type' => 'icon',
                        'dmele_data_table_custom_button_icon_value' => '',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );

            $repeater->add_control(
                'dmele_data_table_custom_button_icon_indent', [
                    'label' => __('Button Icon Spacing', 'datamentor'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 50,
                    'selectors' => [
                        '{{WRAPPER}} .dmele-content-button .elementor-align-icon-right' => 'margin-left: {{SIZE}}px;',
                        '{{WRAPPER}} .dmele-content-button .elementor-align-icon-left' => 'margin-right: {{SIZE}}px;',
                    ],
                    'condition' => [
                        'dmele_data_table_custom_button_icon_type' => 'icon',
                        'dmele_data_table_custom_button_icon_value' => '',
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_text_decoration', [
                    'label' => __('Button Text Decoration', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => __('Default', 'datamentor'),
                        'underline' => __('Underline', 'datamentor'),
                        'overline' => __('Overline', 'datamentor'),
                        'line-through' => __('Line Through', 'datamentor'),
                        'none' => __('None', 'datamentor'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'text-decoration: {{VALUE}};',
                    ],
                    'condition' => [
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_text_transform', [
                    'label' => __('Button Text Transform', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '' => __('Default', 'datamentor'),
                        'uppercase' => __('Uppercase', 'datamentor'),
                        'lowercase' => __('Lowercase', 'datamentor'),
                        'capitalize' => __('Capatilize', 'datamentor'),
                        'none' => __('Normal', 'datamentor'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'text-transform: {{VALUE}};',
                    ],
                    'condition' => [
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_font_weight', [
                    'label' => __('Button Font Weight', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'default' => '500',
                    'options' => [
                        '' => __('Default', 'datamentor'),
                        '100' => __('100', 'datamentor'),
                        '200' => __('200', 'datamentor'),
                        '300' => __('300', 'datamentor'),
                        '400' => __('400', 'datamentor'),
                        '500' => __('500', 'datamentor'),
                        '600' => __('600', 'datamentor'),
                        '700' => __('700', 'datamentor'),
                        '800' => __('800', 'datamentor'),
                        '900' => __('900', 'datamentor'),
                        'normal' => __('Normal', 'datamentor'),
                        'bold' => __('Bold', 'datamentor'),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .dmele-content-button a' => 'font-weight: {{VALUE}};',
                    ],
                    'condition' => [
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_custom_button_id', [
                    'label' => __('Button Id', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => '',
                    'title' => __('Add your custom id WITHOUT the Pound key. e.g: my-button-id', 'datamentor'),
                    'label_block' => false,
                    'description' => __('Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows <code>A-z 0-9</code> & underscore chars without spaces.', 'datamentor'),
                    'separator' => 'before',
                    'condition' => [
                        'dmele_data_table_content_type' => 'button'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_primary_templates_for_tables', [
                    'label' => __('Choose Template', 'datamentor'),
                    'type' => Controls_Manager::SELECT,
                    'options' => dmele_get_page_templates(),
                    'condition' => [
                        'dmele_data_table_content_type' => 'template',
                    ],
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_title', [
                    'label' => __('Cell Text', 'datamentor'),
                    'type' => Controls_Manager::TEXTAREA,
                    'label_block' => true,
                    'default' => __('Content', 'datamentor'),
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'textarea'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_content',
                [
                    'label' => __('Cell Text', 'datamentor'),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                    'default' => __('Content', 'datamentor'),
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'editor'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_title_link', [
                    'label' => __('Link', 'datamentor'),
                    'type' => Controls_Manager::URL,
                    'label_block' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => '',
                    ],
                    'show_external' => true,
                    'separator' => 'before',
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col',
                        'dmele_data_table_content_type' => 'textarea'
                    ],
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_css_class', [
                    'label' => __('CSS Class', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col'
                    ]
                ]
            );
            $repeater->add_control(
                'dmele_data_table_content_row_css_id', [
                    'label' => __('CSS ID', 'datamentor'),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => false,
                    'condition' => [
                        'dmele_data_table_content_row_type' => 'col'
                    ]
                ]
                
            );
            
            $this->add_control(
                'dmele_data_table_content_rows', [
                    'type' => \Elementor\Controls_Manager::REPEATER ,
                    'seperator' => 'before',
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        ['dmele_data_table_content_row_type' => 'row'],
                        ['dmele_data_table_content_row_type' => 'col'],
                        ['dmele_data_table_content_row_type' => 'col'],
                        ['dmele_data_table_content_row_type' => 'col'],
                        ['dmele_data_table_content_row_type' => 'col'],
                    ],
                    'title_field' => '<span style="text-transform:capitalize; font-weight:600;">{{dmele_data_table_content_row_type}}</span>::{{dmele_data_table_content_row_title || dmele_data_table_content_row_content || dmele_data_table_custom_button_text}}',
                ]
            );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Data Table Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'dmele_section_data_table_style_settings', [
                'label' => __('General Style', 'datamentor'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'table_width', [
                'label' => __('Width', 'datamentor'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'table_alignment', [
                'label' => __('Table Alignment', 'datamentor'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'datamentor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'datamentor'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'datamentor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' 		=> [
					'{{WRAPPER}} .dmele-data-table-wrap' => 'justify-content: {{VALUE}};',
				],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Data Table Header Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'dmele_section_data_table_title_style_settings', [
                'label' => __('Header Style', 'datamentor'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );


        $this->add_control(
            'dmele_section_data_table_header_radius', [
                'label' => __('Header Border Radius', 'datamentor'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table thead tr th:first-child' => 'border-radius: {{SIZE}}px 0px 0px 0px;',
                    '{{WRAPPER}} .dmele-data-table thead tr th:last-child' => 'border-radius: 0px {{SIZE}}px 0px 0px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'dmele_data_table_each_header_padding', [
                'label' => __('Padding', 'datamentor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table .table-header th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .dmele-data-table tbody tr td .th-mobile-screen' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('dmele_data_table_header_title_clrbg');

        $this->start_controls_tab('dmele_data_table_header_title_normal', ['label' => __('Normal', 'datamentor')]);

        $this->add_control(
            'dmele_data_table_header_title_color', [
                'label' => __('Color', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table thead tr th' => 'color: {{VALUE}};',
                    '{{WRAPPER}} table.dataTable thead .sorting:after' => 'color: {{VALUE}};',
                    '{{WRAPPER}} table.dataTable thead .sorting_asc:after' => 'color: {{VALUE}};',
                    '{{WRAPPER}} table.dataTable thead .sorting_desc:after' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_header_title_bg_color', [
                'label' => __('Background Color', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#4a4893',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table thead tr th' => 'background-color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'dmele_data_table_header_border',
                'label' => __('Border', 'datamentor'),
                'selector' => '{{WRAPPER}} .dmele-data-table thead tr th'
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('dmele_data_table_header_title_hover', ['label' => __('Hover', 'datamentor')]);

        $this->add_control(
            'dmele_data_table_header_title_hover_color', [
                'label' => __('Color', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table thead tr th:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} table.dataTable thead .sorting:after:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} table.dataTable thead .sorting_asc:after:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} table.dataTable thead .sorting_desc:after:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_header_title_hover_bg_color', [
                'label' => __('Background Color', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table thead tr th:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'dmele_data_table_header_hover_border',
                'label' => __('Border', 'datamentor'),
                'selector' => '{{WRAPPER}} .dmele-data-table thead tr th:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'dmele_data_table_header_title_typography',
                'selector' => '{{WRAPPER}} .dmele-data-table thead > tr th',
            ]
        );

        $this->add_responsive_control(
            'dmele_data_table_header_title_alignment', [
                'label' => __('Title Alignment', 'datamentor'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'datamentor'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'datamentor'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'datamentor'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'center',
                'prefix_class' => 'dmele-dt-th-align-',
                'selectors' 		=> [
					'{{WRAPPER}} .dmele-data-table .table-header th .elementor-button-content-wrapper' => 'justify-content: {{VALUE}};',
				],
            ]
        );

        $this->end_controls_section();

        /**
         * -------------------------------------------
         * Tab Style (Data Table Content Style)
         * -------------------------------------------
         */
        $this->start_controls_section(
            'dmele_section_data_table_content_style_settings', [
                'label' => __('Content Style', 'datamentor'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );

        $this->start_controls_tabs('dmele_data_table_content_row_cell_styles');

        $this->start_controls_tab('dmele_data_table_odd_cell_style', ['label' => __('Normal', 'datamentor')]);

        $this->add_control(
            'dmele_data_table_content_odd_style_heading', [
                'label' => __('ODD Cell', 'datamentor'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'dmele_data_table_content_color_odd', [
                'label' => __('Color ( Odd Row )', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6d7882',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n) td' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_content_bg_odd', [
                'label' => __('Background ( Odd Row )', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f2f2f2',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n) td' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_content_even_style_heading', [
                'label' => __('Even Cell', 'datamentor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'dmele_data_table_content_even_color', [
                'label' => __('Color ( Even Row )', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6d7882',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n+1) td' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_content_bg_even_color', [
                'label' => __('Background Color (Even Row)', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n+1) td' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'dmele_data_table_cell_border',
                'label' => __('Border', 'datamentor'),
                'selector' => '{{WRAPPER}} .dmele-data-table tbody tr td',
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'dmele_data_table_each_cell_padding', [
                'label' => __('Padding', 'datamentor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab('dmele_data_table_odd_cell_hover_style', ['label' => __('Hover', 'datamentor')]);

        $this->add_control(
            'dmele_data_table_content_hover_color_odd', [
                'label' => __('Color ( Odd Row )', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n) td:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_content_hover_bg_odd', [
                'label' => __('Background ( Odd Row )', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n) td:hover' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_content_even_hover_style_heading', [
                'label' => __('Even Cell', 'datamentor'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'dmele_data_table_content_hover_color_even', [
                'label' => __('Color ( Even Row )', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6d7882',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n+1) td:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'dmele_data_table_content_bg_even_hover_color', [
                'label' => __('Background Color (Even Row)', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody > tr:nth-child(2n+1) td:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'dmele_data_table_content_typography',
                'selector' => '{{WRAPPER}} .dmele-data-table tbody tr td'
            ]
        );

        $this->add_control(
            'dmele_data_table_content_link_typo', [
                'label' => __('Link Color', 'datamentor'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        /* Table Content Link */
        $this->start_controls_tabs('dmele_data_table_link_tabs');

        // Normal State Tab
        $this->start_controls_tab(
            'dmele_data_table_link_normal', [
                'label' => __('Normal', 'datamentor')
            ]
        );

        $this->add_control(
            'dmele_data_table_link_normal_text_color', [
                'label' => __('Text Color', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#c15959',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table-wrap table td a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // Hover State Tab
        $this->start_controls_tab(
            'dmele_data_table_link_hover', [
                'label' => __('Hover', 'datamentor')
            ]
        );

        $this->add_control(
            'dmele_data_table_link_hover_text_color', [
                'label' => __('Text Color', 'datamentor'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6d7882',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table-wrap table td a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'dmele_data_table_content_alignment', [
                'label' => __('Content Alignment', 'datamentor'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'datamentor'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'datamentor'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'datamentor'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .dmele-data-table tbody tr td' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

    }

    /**
     * Render Datamentor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings();
        
        $table_td = [];
        $row_id = null;
    
        // Collect table cells
        foreach ($settings['dmele_data_table_content_rows'] as $content_row) {
            if ($content_row['dmele_data_table_content_row_type'] === 'row') {
                // Store the row ID for later use
                $row_id = uniqid();
            } elseif ($content_row['dmele_data_table_content_row_type'] === 'col' && $row_id) {
                $target = $content_row['dmele_data_table_content_row_title_link']['is_external'] ? 'target="_blank"' : '';
                $nofollow = $content_row['dmele_data_table_content_row_title_link']['nofollow'] ? 'rel="nofollow"' : '';
    
                $tbody_content = $content_row['dmele_data_table_content_type'] === 'button' ?
                    $content_row['dmele_data_table_custom_button_text'] :
                    ($content_row['dmele_data_table_content_type'] === 'editor' ?
                    $content_row['dmele_data_table_content_row_content'] :
                    $content_row['dmele_data_table_content_row_title']);
    
                $table_td[] = [
                    '_id' => $content_row['_id'],
                    'row_id' => $row_id,
                    'content_type' => $content_row['dmele_data_table_content_type'],
                    'title' => $tbody_content,
                    'link_url' => $content_row['dmele_data_table_content_row_title_link']['url'],
                    'link_target' => $target,
                    'nofollow' => $nofollow,
                    'colspan' => $content_row['dmele_data_table_content_row_colspan'],
                    'rowspan' => $content_row['dmele_data_table_content_row_rowspan'],
                    'tr_class' => $content_row['dmele_data_table_content_row_css_class'],
                    'tr_id' => $content_row['dmele_data_table_content_row_css_id'],

                    'template' => $content_row['dmele_primary_templates_for_tables'],
                    'button_text' => $content_row['dmele_data_table_custom_button_text'],
                    'button_link' => $content_row['dmele_data_table_custom_button_link']['url'],
                    'button_icon_type' => $content_row['dmele_data_table_custom_button_icon_type'],
                    'button_icon' => $content_row['dmele_data_table_custom_button_icon_value']['value'],
                    'button_image' => $content_row['dmele_data_table_custom_button_image_value'],
                    'button_size' => $content_row['dmele_data_table_custom_button_image_size'],
                    'button_align' => $content_row['dmele_data_table_custom_button_icon_align'],
                    'button_id' => $content_row['dmele_data_table_custom_button_id'],
                    'button_alignment' => $content_row['dmele_data_table_custom_button_align'],
                    'button_border' => $content_row['dmele_data_table_custom_button_border'],
                    'editor_text' => $content_row['dmele_data_table_content_row_content'],
                ];
            }
        }
        
        // Prepare render attributes
        $this->add_render_attribute('dmele_data_table_wrap', [
            'class' => 'dmele-data-table-wrap',
            'data-table_id' => esc_attr($this->get_id()),
        ]);
    
        if (isset($settings['dmele_section_data_table_enabled']) && $settings['dmele_section_data_table_enabled']) {
            $this->add_render_attribute('dmele_data_table_wrap', 'data-table_enabled', 'true');
        }
    
        $this->add_render_attribute('dmele_data_table', [
            'class' => 'tablesorter dmele-data-table',
            'id' => 'dmele-data-table-' . esc_attr($this->get_id())
        ]);

        $this->add_render_attribute('td_content', [
            'class' => 'td-content'
        ]);
        ?>

        <div <?php echo wp_kses_post($this->get_render_attribute_string('dmele_data_table_wrap')); ?>>
            <table <?php echo wp_kses_post($this->get_render_attribute_string('dmele_data_table')); ?>>
                <thead>
                    <tr class="table-header">
                        <?php foreach ($settings['dmele_data_table_header_cols_data'] as $i => $header_title): ?>
                            <?php
                            $this->add_render_attribute('th_class' . $i, [
                                'class' => [$header_title['dmele_data_table_header_css_class']],
                                'id' => $header_title['dmele_data_table_header_css_id'],
                                'colspan' => $header_title['dmele_data_table_header_col_span']
                            ]);
                            ?>
                            <th <?php echo wp_kses_post($this->get_render_attribute_string('th_class' . $i)); ?>>
                                <span class="elementor-header-section">
                                <span class="elementor-button-content-wrapper">
                                        <span class="elementor-button-icon">
                                            <?php if ($header_title['dmele_data_table_header_col_icon_enabled'] == 'true' && $header_title['dmele_data_table_header_icon_type'] == 'icon') : ?>
                                                <?php if (( empty($header_title['dmele_data_table_header_col_icon']) || isset($header_title['__fa4_migrated']['dmele_data_table_header_col_icon_new']) ) && empty($header_title['dmele_data_table_header_col_icon_new']['value']['url'])) { ?>
                                                    <i class="<?php echo esc_attr( $header_title['dmele_data_table_header_col_icon_new']['value'] ); ?> dmele-data-header-icon"></i>
                                                <?php } else if ($header_title['dmele_data_table_header_col_icon_new']['value']['url'] != "") { ?>
                                                    <img width="<?php echo esc_attr($header_title["dmele_data_table_header_col_svg_img_size"]); ?>" class="data-header-svg" src="<?php echo esc_url($header_title['dmele_data_table_header_col_icon_new']['value']['url']); ?>" />
                                                <?php } else { ?>
                                                    <i class="<?php echo esc_attr($header_title['dmele_data_table_header_col_icon']); ?> dmele-data-header-icon"></i>
                                                <?php } ?>
                                            <?php endif; ?>
                                            <?php
                                            if ($header_title['dmele_data_table_header_col_icon_enabled'] == 'true' && $header_title['dmele_data_table_header_icon_type'] == 'image') :
                                                $this->add_render_attribute('data_table_th_img' . $i, [
                                                    'src' => esc_url($header_title['dmele_data_table_header_col_img']['url']),
                                                    'class' => 'dmele-data-table-th-img',
                                                    'style' => "width:{$header_title['dmele_data_table_header_col_img_size']}px;",
                                                    'alt' => esc_attr(get_post_meta($header_title['dmele_data_table_header_col_img']['id'], '_wp_attachment_image_alt', true))
                                                ]);
                                                ?>

                                                <img <?php echo wp_kses_post($this->get_render_attribute_string('data_table_th_img' . $i)); ?>>
                                            <?php endif; ?>
                                        </span>
                                        <span class="elementor-button-text elementor-inline-editing">
                                            <?php echo esc_html($header_title['dmele_data_table_header_col']); ?>
                                        </span>
                                    </span>
                                </span>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $current_row_id = null;
                    foreach ($table_td as $index => $cell):
                        if ($current_row_id !== $cell['row_id']):
                            if ($current_row_id !== null):
                                echo '</tr>'; // Close previous row
                            endif;
                            $current_row_id = $cell['row_id'];
                            echo '<tr>'; // Open new row
                        endif;
                        
                        $this->add_render_attribute('table_inside_td' . $index, [
                            'colspan' => $cell['colspan'] > 1 ? $cell['colspan'] : '',
                            'rowspan' => $cell['rowspan'] > 1 ? $cell['rowspan'] : '',
                            'class' => $cell['tr_class'],
                            'id' => $cell['tr_id']
                        ]);
                        ?>
                        <td <?php echo wp_kses_post($this->get_render_attribute_string('table_inside_td' . $index)); ?>>
                            <div class="td-content-wrapper">
                                <?php if ($cell['content_type'] === 'textarea' && !empty($cell['link_url'])): ?>
                                    <a href="<?php echo esc_url($cell['link_url']); ?>" <?php echo esc_attr($cell['link_target']); ?> <?php echo esc_attr($cell['nofollow']); ?>>
                                        <?php echo wp_kses_post($cell['title']); ?>
                                    </a>
                                    <?php elseif ($cell['content_type'] === 'editor'): ?>
                                        <?php echo wp_kses_post($cell['editor_text']); ?>
                                    <?php elseif ($cell['content_type'] === 'template' && !empty($cell['template'])): ?>
                                    <div <?php echo wp_kses_post($this->get_render_attribute_string('td_content')); ?>>
                                        <?php
                                        $dmele_frontend = new Frontend;
                                        $editor_content = $dmele_frontend->get_builder_content(intval($cell['template']), true);
                                        echo $editor_content;
                                        ?>
                                    </div>
                                <?php elseif ($cell['content_type'] === 'button' && !empty($cell['button_text'])): ?>                                    
                                    <div class="elementor-button-wrapper  elementor-repeater-item-<?php echo wp_kses_post($cell['_id']); ?> elementor-repeater-item-<?php echo wp_kses_post($cell['button_id']); ?>">
                                        <div class="dmele-content-button <?php echo esc_attr($cell['button_alignment']); ?> <?php echo esc_attr($cell['button_border']); ?>">
                                            <a id="<?php echo esc_attr($cell['button_id']); ?>" class="elementor-button-link elementor-button" href="<?php echo esc_url($cell['button_link']); ?>">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-icon elementor-align-icon-<?php echo esc_attr($cell['button_align']); ?>">
                                                        <?php if (!empty($cell['button_icon']) && $cell['button_icon_type'] === "icon" && empty($cell['button_icon']['url'])): ?>
                                                            <i class="<?php echo esc_attr($cell['button_icon']); ?> button-icon"></i>
                                                        <?php elseif (!empty($cell['button_icon']['url']) && $cell['button_icon_type'] === "icon"): ?>
                                                            <img width="15" class="elementor-svg-button elementor-button-img" src="<?php echo esc_url($cell['button_icon']['url']); ?>" />
                                                        <?php elseif (!empty($cell['button_image']['url']) && $cell['button_icon_type'] === "image"): ?>
                                                            <img class="elementor-button-img" width="<?php echo esc_attr($cell['button_size']); ?>" src="<?php echo esc_url($cell['button_image']['url']); ?>" />
                                                        <?php endif; ?>
                                                    </span>
                                                    <span class="elementor-button-text elementor-inline-editing">
                                                        <?php echo wp_kses_post($cell['button_text']); ?>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php echo wp_kses_post($cell['title']); ?>
                                <?php endif; ?>
                            </div>
                        </td>
                        <?php
                    endforeach;
                    
                    // Close the last row if it was opened
                    if ($current_row_id !== null):
                        echo '</tr>';
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register(new Datamentor_Data_Table_Widget());
