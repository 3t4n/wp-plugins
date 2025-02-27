<?php

/**
 * This source code is licensed under the license found in
 * the LICENSE file in the root directory of this source tree.
 */

use Elementor\Controls_Manager;

/**
 * Add a custom control to reorder columns
 */
function sc_rce_add_display_order_control($el, $args)
{
    $el->add_responsive_control('sc_rce_display_order', [
        'label' => esc_html__('Display Order', 'columns-reordering-for-elementor'),
        'type' => Controls_Manager::NUMBER,
        'min' => -10,
        'max' => 10,
        'step' => 1,
        'render_type' => 'ui',
        'separator' => 'before',
        'selectors' => [
            '{{WRAPPER}}' => 'order:{{VALUE}} !important'
        ]
    ]);
}
add_action('elementor/element/common/_section_style/before_section_end', 'sc_rce_add_display_order_control', PHP_INT_MAX, 2);
add_action('elementor/element/column/layout/before_section_end', 'sc_rce_add_display_order_control', PHP_INT_MAX, 2);
add_action('elementor/element/section/section_layout/before_section_end', 'sc_rce_add_display_order_control', PHP_INT_MAX, 2);
