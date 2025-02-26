<?php
namespace AEFE;

use Elementor\Controls_Manager;

class Form_Controls {
    public function __construct() {
        add_action('elementor/element/form/section_form_fields/after_section_end', 
            [$this, 'add_filter_controls'], 20
        );
    }

    public function add_filter_controls($widget) {
        $widget->start_controls_section(
            'aefe_filter_section',
            [
                'label' => __('Email Filtering', 'advanced-email-filter-for-elementor-forms'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        // Whitelist Control
        $widget->add_control(
            'aefe_whitelist',
            [
                'label' => __('Whitelist Patterns', 'advanced-email-filter-for-elementor-forms'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __(
                    'Whitelisted emails will override all blacklist rules. ,<br/>Format: 
                    <ul style="margin-top: 5px; margin-bottom: 5px;">
                        <li>Full email: user@domain.com</li>
                        <li>Domain wildcard: *@domain.com</li>
                        <li>TLD block: *.org</li>
                        <li>Partial match: admin@</li>
                    </ul>
                    Separate multiple patterns with commas. Example: *@company.com, ceo@, *.trusted-domain.org',
                    'advanced-email-filter-for-elementor-forms'
                ),
                'placeholder' => __('Example: *@trusted.com, admin@, *.org', 'advanced-email-filter-for-elementor-forms'),
            ]
        );
        
        $widget->add_control(
            'aefe_blacklist',
            [
                'label' => __('Blocked Patterns', 'advanced-email-filter-for-elementor-forms'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => __(
                    'Blacklist takes effect unless whitelisted. 
                    <br>
                    Format: 
                     <ul style="margin-top: 5px; margin-bottom: 5px;">
                        <li>Full email: spam@domain.com</li>
                        <li>Domain block: @spamdomain.com</li>
                        <li>TLD block: *.ru</li>
                        <li>Partial match: temp-</li>
                    </ul>
                    Separate multiple patterns with commas. Example: @spam.com, *.xyz, fake@',
                    'advanced-email-filter-for-elementor-forms'
                ),
                'placeholder' => __('Example: @spamdomain.com, *.ru, baduser@', 'advanced-email-filter-for-elementor-forms'),
                'separator' => 'before',
            ]
        );

        $widget->add_control(
            'aefe_business_email',
            [
                'label' => __('Business Email Only', 'advanced-email-filter-for-elementor-forms'),
                'type' => Controls_Manager::SWITCHER,
                'description' => __('Only allow business/company email addresses (blocks free email providers like gmail.com, yahoo.com, etc.) Note: Our database is updated every 7 days, but some domains might still pass through as new business email services appear daily.', 'advanced-email-filter-for-elementor-forms'),
                'default' => '',
                'separator' => 'before',
            ]
        );

        $widget->add_control(//aefe_block_disposable
            'aefe_block_disposable',
            [
                'label' => __('Block Disposable Emails', 'advanced-email-filter-for-elementor-forms'),
                'type' => Controls_Manager::SWITCHER,
                'description' => __('Block temporary/disposable email addresses. Note: Our database is updated every 7 days, but some domains might still pass through as new disposable email services appear daily.', 'advanced-email-filter-for-elementor-forms'),
                'default' => '',
                'separator' => 'before',
            ]
        );

        $widget->end_controls_section();
    }
}