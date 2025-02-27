<?php

namespace BitApps\Pi\HTTP\Controllers;

use BitApps\Pi\Config;
use BitApps\Pi\Deps\BitApps\WPKit\Http\Request\Request;
use BitApps\Pi\Deps\BitApps\WPKit\Http\Response;

class GlobalSettingsController
{
    private $defaultSettings = [
        'preserve_logs' => 7,
    ];

    public function getGlobalDefaultSettings()
    {
        return $this->defaultSettings;
    }

    public function getSettings()
    {
        $settings = Config::getOption('global_settings');

        if (!$settings) {
            return Response::success($this->defaultSettings);
        }

        $settings = array_merge($this->defaultSettings, $settings);

        return Response::success($settings);
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate(
            [
                'preserve_logs'      => ['required', 'integer'],
                'notify_user'        => ['nullable', 'boolean'],
                'notification_email' => ['nullable', 'email'],
            ],
            null,
            [
                'preserve_logs'      => 'preserve logs',
                'notify_user'        => 'notify user',
                'notification_email' => 'notification email',
            ]
        );

        if (Config::updateOption('global_settings', $validated)) {
            return Response::success($validated);
        }

        return Response::error('Failed to update settings');
    }
}
