<?php

namespace ExactLinks\App\Http\Controllers;

use ExactLinks\App\Models\Link;
use ExactLinks\App\Traits\Settings;
use ExactLinks\App\Models\LinkAnalytics;
use ExactLinks\Framework\Request\Request;
use ExactLinks\App\Libs\Browser\BrowserDetection;
use ExactLinks\App\Hooks\Handlers\FrontendHandler;


class SettingsController extends Controller
{
    use Settings;
    public function updateSettings(Request $request)
    {
        $settings = wp_unslash($request->get('data'));
      
        if (get_option('exactlinks_settings')) {
            update_option('exactlinks_settings', $settings);
        } 
        
        return $this->sendSuccess([
            'message'  => __('Settings Successfully Updated', 'exact-links'),
        ], 200);
    }

    public function getSettings()
    {   // traits settings 
        $settings = get_option('exactlinks_settings', static::globalSettings());

        return $this->sendSuccess([
            'settings' => $settings
        ]);
    }
}
