<?php

namespace AIReviewScanner\Http\Controllers\Dashboard;

if (!defined('ABSPATH')) {
    exit;
}

use AIReviewScanner\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function optionsView()
    {
        return AIReviewScanner()
            ->view('dashboard.index')
            ->withAdminScripts('ai-review-scanner-custom')
            ->withAdminStyles('ai-review-scanner-dashboard');
    }

    public function saveOptions()
    {
        $view = AIReviewScanner()->view('dashboard.index')
            ->withAdminScripts('ai-review-scanner-custom')
            ->withAdminStyles('ai-review-scanner-dashboard');

        if ($this->request->verifyNonce('ars_request_settings')) {

            $data = $this->request->getAsOptions();

            // Retrieve and sanitize input
            $ars_token = isset($data['ars_request_settings']['ars_api_token']) ? sanitize_text_field($data['ars_request_settings']['ars_api_token']) : null;
            $ars_enable_auto_approve = $data['ars_request_settings']['ars_enable_auto_approve'] ?? false;
            $rating_threshold = isset($data['ars_request_settings']['rating_threshold']) ? (int)$data['ars_request_settings']['rating_threshold'] : 0;
            $rule_conditions = isset($data['ars_request_settings']['rule_conditions']) ? sanitize_title($data['ars_request_settings']['rule_conditions']) : null;

            // Validation logic
            if (strlen($ars_token) < 32) {
                set_transient('ars_settings_error', 'Error: The AI Review Scanner token must be at least 32 characters long.', 5);
                $view->with('error', 'Error: The AI Review Scanner token must be at least 32 characters long.');
            }

            if ($ars_enable_auto_approve && ($rating_threshold == 0 || empty($rule_conditions))) {
                $view->with('error', 'Error: Rating threshold and rule conditions are required when auto approve is enabled.');
            }

            if (!$ars_enable_auto_approve) {
                $rating_threshold = 4;
                $rule_conditions = null;
            }

            // Collect all settings in an array
            $ars_settings['ars_request_settings'] = [
                'ars_api_token' => $ars_token,
                'ars_enable_auto_approve' => $ars_enable_auto_approve,
                'rating_threshold' => $rating_threshold,
                'rule_conditions' => $rule_conditions
            ];
            AIReviewScanner()->options->update($ars_settings);
            $view->with('success', 'AI Review Scanner settings has been updated !');
        } else {
            $view->with('error', 'Request is not allowed.');
        }

        return $view;
    }
}
