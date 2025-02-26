<?php
namespace AEFE;

use AEFE\Admin\Filter_Settings;

if (!defined('ABSPATH')) {
    exit;
}

class Validation {
    private $personal_domains = [];
    private $disposable_domains = [];

    public function __construct() {
        $this->init_personal_domains();
        $this->init_disposable_domains();
        add_action('elementor_pro/forms/validation/email', 
            [$this, 'validate_email'], 10, 3
        );
    }

    private function init_personal_domains() {
        $json_file = AEFE_PLUGIN_PATH . 'assets/data/personal-domains.json';
        if (file_exists($json_file)) {
            $json_content = file_get_contents($json_file);
            $data = json_decode($json_content, true);
            $this->personal_domains = $data['domains'] ?? [];
        }
    }

    private function init_disposable_domains() {
        $json_file = AEFE_PLUGIN_PATH . 'assets/data/disposable-email-domains.json';
        if (file_exists($json_file)) {
            $json_content = file_get_contents($json_file);
            $data = json_decode($json_content, true);
            $this->disposable_domains = $data['domains'] ?? [];
        }
    }

    public function validate_email($field, $record, $ajax_handler) {
        $email = sanitize_email($field['value']);
        $settings = $record->get('form_settings');

        // Get global and form-specific lists
        $global_blacklist = get_option(Filter_Settings::BLACKLIST_OPTION, '');
        $global_whitelist = get_option(Filter_Settings::WHITELIST_OPTION, '');
        $form_blacklist = $settings['aefe_blacklist'] ?? '';
        $form_whitelist = $settings['aefe_whitelist'] ?? '';

        // Combine lists
        $combined_whitelist = $this->combine_lists($global_whitelist, $form_whitelist);
        $combined_blacklist = $this->combine_lists($global_blacklist, $form_blacklist);

        // New validation order:
        // 1. Whitelist check
        // 2. Blacklist check
        // 3. Business email check
        // 4. Disposable email check
        // 5. Email format validation

        // Process whitelist first
        if (!empty($combined_whitelist)) {
            $whitelist_match = $this->check_patterns($email, $combined_whitelist);
            if (!$whitelist_match['matched']) {
                $this->add_validation_error(
                    sprintf(
                        /* translators: %s: email user input */
                        __('%s not allowed. ', 'advanced-email-filter-for-elementor-forms'),
                        $email
                    ),
                    $field,
                    $ajax_handler
                );
                return;
            }
        }

        // Process blacklist
        $blacklist_match = $this->check_patterns($email, $combined_blacklist);
        if ($blacklist_match['matched']) {
            $this->add_validation_error(
                sprintf(
                    /* translators: %s: email user input */
                    __('Error: %s is blocked', 'advanced-email-filter-for-elementor-forms'),
                    $email
                ),
                $field,
                $ajax_handler
            );
            return;
        }

        // Check business email if enabled (both global or form-specific)
        $global_business_only = get_option(Filter_Settings::BUSINESS_ONLY_OPTION, '');
        $form_business_only = $settings['aefe_business_email'] ?? '';

        if ($global_business_only || $form_business_only === 'yes') {
            $domain = substr(strrchr($email, "@"), 1);
            
            if (in_array($domain, $this->personal_domains)) {
                $this->add_validation_error(
                    __('Personal email domains are not allowed. Please use a company email.', 'advanced-email-filter-for-elementor-forms'),
                    $field,
                    $ajax_handler
                );
                return;
            }
        }

        // Check disposable email if enabled
        $global_block_disposable = get_option(Filter_Settings::DISPOSABLE_OPTION, '');
        $form_block_disposable = $settings['aefe_block_disposable'] ?? '';

        

        if ($global_block_disposable || $form_block_disposable === 'yes') {
            $domain = substr(strrchr($email, "@"), 1);
            
            if (in_array($domain, $this->disposable_domains)) {
                $this->add_validation_error(
                    __('Disposable email domains are not allowed.', 'advanced-email-filter-for-elementor-forms'),
                    $field,
                    $ajax_handler
                );
                return;
            }
        }

        // Validate email format
        if (!is_email($email)) {
            $ajax_handler->add_error(
                $field['id'], 
                __('Invalid email format', 'advanced-email-filter-for-elementor-forms')
            );
        }
    }

    private function combine_lists($global, $form) {
        return implode(',', array_filter([$global, $form], 'strlen'));
    }

    private function check_patterns($email, $list) {
        $patterns = $this->prepare_patterns($list);
        $result = [
            'matched' => false,
            'matched_pattern' => '',
            'patterns' => $patterns
        ];

        foreach ($patterns as $pattern) {
            if ($this->match_pattern($email, $pattern)) {
                $result['matched'] = true;
                $result['matched_pattern'] = $pattern;
                break;
            }
        }

        return $result;
    }

    private function prepare_patterns($list) {
        $patterns = array_filter(array_map('trim', explode(',', $list)));
        return array_map([$this, 'normalize_pattern'], $patterns);
    }

    private function normalize_pattern($pattern) {
        // Add wildcard for domain-only patterns
        if (strpos($pattern, '@') === 0) {
            return '*' . $pattern;
        }
        return $pattern;
    }

    private function match_pattern($email, $pattern) {
        $regex = str_replace('\*', '.*', preg_quote($pattern, '/'));
        return (bool) preg_match("/^{$regex}$/i", $email);
    }

    private function add_validation_error($message, $field, $ajax_handler) {
        $error_message = apply_filters(
            'aefe_validation_error',
            $message,
            $field['value']
        );

        $ajax_handler->add_error(
            $field['id'], 
            esc_html($error_message)
        );
    }
}