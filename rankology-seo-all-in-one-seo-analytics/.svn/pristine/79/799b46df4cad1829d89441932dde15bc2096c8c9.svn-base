<?php

namespace RankologyFno\Actions\FiltersFree;

if ( ! defined('ABSPATH')) {
    exit;
}

use Rankology\Core\Hooks\ExecuteHooks;

class MetaRobotSettings implements ExecuteHooks {
    public function hooks() {
        add_filter('rankology_api_meta_robot_settings', [$this, 'addSetting'], 10, 2);
    }

    /**
     * 
     *
     * @param array $data
     * @param mixed $id
     *
     * @return array
     */
    public function addSetting($data, $id) {

        $data[] =  [
            'key'         => '_rankology_robots_breadcrumbs',
            'type'        => 'input',
            'use_default' => '',
            'default'     => true,
            'label'       => __('Custom breadcrumbs', 'wp-rankology'),
            'description' => __('Enter a custom value, useful if your title is too long', 'wp-rankology'),
            'placeholder' => sprintf(__('Current breadcrumbs: %s', 'wp-rankology'), get_the_title($id)),
            'visible'     => true,
        ];

        return $data;
    }
}
