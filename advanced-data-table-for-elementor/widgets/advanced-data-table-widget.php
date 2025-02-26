<?php

defined('ABSPATH') || exit;

use Elementor\Widget_Base;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;

class ADTE extends Widget_Base {

    public function get_name() {
        return 'advanced-data-table';
    }

    public function get_title() {
        return esc_html__('Advanced Data Table', 'advanced-data-table-for-elementor');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-table';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories() {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['table', 'advanced', 'table widget', 'data table', 'data'];
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url() {
        return 'https://pluginscafe.com/documentation/advanced-data-table-for-elementor/';
    }


    /**
     * Register Advanced Table widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'table_header_section',
            [
                'label' => esc_html__('Table Header', 'advanced-data-table-for-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater_header = new Repeater();

        $repeater_header->add_control(
            'text',
            [
                'label' => __('Text', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('Table header', 'advanced-data-table-for-elementor'),
                'default' => __('Table header', 'advanced-data-table-for-elementor'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'table_header',
            [
                'label' => __('Table Header Cell', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_header->get_controls(),
                'default' => [
                    [
                        'text' => __('Table Header', 'advanced-data-table-for-elementor'),
                    ],
                    [
                        'text' => __('Table Header', 'advanced-data-table-for-elementor'),
                    ]
                ],
                'title_field' => '{{{ text }}}'
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'table_body_section',
            [
                'label' => __('Table Body', 'advanced-data-table-for-elementor'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater_body = new Repeater();

        $repeater_body->add_control(
            'row',
            [
                'label' => __('New Row', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'advanced-data-table-for-elementor'),
                'label_on' => __('Yes', 'advanced-data-table-for-elementor'),
            ]
        );

        $repeater_body->add_control(
            'body_content_type',
            [
                'label' => esc_html__('Content Type/View', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'default',
                'options' => [
                    'default' => [
                        'title' => esc_html__('Default', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-text',
                    ],
                    'editor' => [
                        'title' => esc_html__('Editor', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-editor-paragraph',
                    ],

                ],
                'render_type' => 'template',
                'classes' => 'elementor-control-start-end',
                'style_transfer' => true,
                'prefix_class' => 'elementor-icon-list--layout-',
                'label_block' => true,
                'separator' => 'before',
            ]
        );

        $repeater_body->add_control(
            'text',
            [
                'label' => __('Text', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('Table Data', 'advanced-data-table-for-elementor'),
                'default' => __('Table Data', 'advanced-data-table-for-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'body_content_type' => 'default',
                ]
            ]
        );

        $repeater_body->add_control(
            'text_editor',
            [
                'label' => __('Editor', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::WYSIWYG,
                'label_block' => true,
                'placeholder' => __('Table Data', 'advanced-data-table-for-elementor'),
                'default' => __('Table Data', 'advanced-data-table-for-elementor'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'body_content_type' => 'editor',
                ]
            ]
        );

        $repeater_body->add_control(
            'advance',
            [
                'label' => __('Advance Settings', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => __('No', 'advanced-data-table-for-elementor'),
                'label_on' => __('Yes', 'advanced-data-table-for-elementor'),
            ]
        );

        $repeater_body->add_control(
            'col_span',
            [
                'label' => __('colSpan', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'advance' => 'yes',
                ],
                'label_off' => __('No', 'advanced-data-table-for-elementor'),
                'label_on' => __('Yes', 'advanced-data-table-for-elementor'),
            ]
        );

        $repeater_body->add_control(
            'col_span_number',
            [
                'label' => __('Col Span Number', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::NUMBER,
                'condition' => [
                    'advance' => 'yes',
                    'col_span' => 'yes',
                ],
                'placeholder' => __('1', 'advanced-data-table-for-elementor'),
                'default' => __('1', 'advanced-data-table-for-elementor'),
            ]
        );

        $repeater_body->add_control(
            'row_span',
            [
                'label' => __('rowSpan', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::SWITCHER,
                'condition' => [
                    'advance' => 'yes',
                ],
                'label_off' => __('No', 'advanced-data-table-for-elementor'),
                'label_on' => __('Yes', 'advanced-data-table-for-elementor'),
            ]
        );

        $repeater_body->add_control(
            'row_span_number',
            [
                'label' => __('Row Span Number', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::NUMBER,
                'condition' => [
                    'advance' => 'yes',
                    'row_span' => 'yes',
                ],
                'placeholder' => __('1', 'advanced-data-table-for-elementor'),
                'default' => __('1', 'advanced-data-table-for-elementor'),
            ]
        );

        $this->add_control(
            'table_body',
            [
                'label' => __('Table Body Cell', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_body->get_controls(),
                'default' => [
                    [
                        'text' => __('Table Data', 'advanced-data-table-for-elementor'),
                    ],
                    [
                        'text' => __('Table Data', 'advanced-data-table-for-elementor'),
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __('General Style', 'advanced-data-table-for-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'table_padding',
            [
                'label' => __('Inner Cell Padding', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} table.adte_table td,{{WRAPPER}} table.adte_table th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'table_header_style',
            [
                'label' => __('Table Header Style', 'advanced-data-table-for-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_responsive_control(
            'header_align',
            [
                'label' => __('Alignment', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-stretch',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_header tr th' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_vertical_align',
            [
                'label' => __('Vertical Alignment', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => __('Top', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __('Middle', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __('Bottom', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_header tr th' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'header_text_color',
            [
                'label' => __('Text Color', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_header tr th' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => __('Typography', 'advanced-data-table-for-elementor'),
                'name' => 'header_typography',
                'selector' => '{{WRAPPER}} table.adte_table .adte_table_header tr th',
            ]
        );

        $this->add_control(
            'header_bg_color',
            [
                'label' => __('Background Color', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_header tr th' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'table_body_style',
            [
                'label' => __('Table Body Style', 'advanced-data-table-for-elementor'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'body_align',
            [
                'label' => __('Alignment', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-right',
                    ],
                    'justify' => [
                        'title' => __('Justified', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-h-align-stretch',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_body tr td' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'body_vertical_align',
            [
                'label' => __('Vertical Alignment', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => __('Top', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => __('Middle', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => __('Bottom', 'advanced-data-table-for-elementor'),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_body tr td' => 'vertical-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'body_text_color',
            [
                'label' => __('Text Color', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_body tr td' => 'color: {{VALUE}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'body_typography',
                'selector' => '{{WRAPPER}} table.adte_table .adte_table_body',
                'global' => [
                    'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
                ],
            ]
        );

        $this->add_control(
            'body_bg_color',
            [
                'label' => __('Background Color', 'advanced-data-table-for-elementor'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} table.adte_table .adte_table_body tr td' => 'background-color: {{VALUE}};',
                ]
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

?>

        <table class="adte_table">
            <thead class="adte_table_header">
                <tr>
                    <?php
                    foreach ($settings['table_header'] as $key => $item) {
                        echo '<th>' . esc_attr($item['text']) . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody class="adte_table_body">
                <tr>
                    <?php
                    foreach ($settings['table_body'] as $key => $item) {
                        if ($item['row'] == 'yes') {
                            echo '</tr><tr>';
                        }

                        $col_span = ($item['col_span'] == 'yes' && $item['advance'] == 'yes') ? 'colSpan="' . esc_attr($item['col_span_number']) . '"' : '';

                        $row_span = ($item['row_span'] == 'yes' & $item['advance'] == 'yes') ? 'rowSpan="' . esc_attr($item['row_span_number']) . '"' : '';

                        echo '<td ' . $col_span . ' ' . $row_span . '>';

                        switch ($item['body_content_type']) {
                            case 'editor':
                                echo wp_kses_post($item['text_editor']);
                                break;
                            default:
                                echo wp_kses_post($item['text']);
                                break;
                        }
                        echo '</td>';
                    }
                    ?>
                </tr>
            </tbody>
        </table>
<?php
    }
}
