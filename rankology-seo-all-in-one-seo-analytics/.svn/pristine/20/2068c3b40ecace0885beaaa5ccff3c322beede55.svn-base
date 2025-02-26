<?php

namespace Rankology\Helpers\Metas;

if ( ! defined('ABSPATH')) {
    exit;
}

abstract class RedirectionSettings {
    /**
     * 
     *
     * @param int|null $id
     *
     * @return array[]
     *
     *    key: string post meta
     *    use_default: default value need to use
     *    default: default value
     *    label: string label
     *    placeholder
     */
    public static function getMetaKeys($id = null) {
        $defaultStatus = rankology_get_service('RedirectionMeta')->getPostMetaStatus($id);
        if($defaultStatus === null || empty($defaultStatus)){
            $defaultStatus = 'both';
        }

        $defaultType = rankology_get_service('RedirectionMeta')->getPostMetaType($id);
        if($defaultType === null || empty($defaultType)){
            $defaultType = 301;
        }

        $data = apply_filters('rankology_api_meta_redirection_settings', [
            [
                'key'         => '_rankology_redirections_enabled',
                'type'        => 'checkbox',
                'placeholder' => '',
                'use_default' => '',
                'default'     => '',
                'label'       => __('Enabled redirection?', 'wp-rankology'),
                'visible'     => true,
            ],
            [
                'key'         => '_rankology_redirections_logged_status',
                'type'        => 'select',
                'placeholder' => '',
                'use_default' => true,
                'default'     => $defaultStatus,
                'label'       => __('Select a login status:', 'wp-rankology'),
                'options'     => [
                    ['value' => 'both', 'label' =>  __('All', 'wp-rankology')],
                    ['value' => 'only_logged_in', 'label' =>  __('Only Logged In', 'wp-rankology')],
                    ['value' => 'only_not_logged_in', 'label' =>  __('Only Not Logged In', 'wp-rankology')],
                ],
                'visible'     => true,
            ],
            [
                'key'         => '_rankology_redirections_type',
                'type'        => 'select',
                'placeholder' => '',
                'use_default' => true,
                'default'     => $defaultType,
                'label'       => __('Select a redirection type:', 'wp-rankology'),
                'options'     => [
                    ['value' => 301, 'label' =>  __('301 Moved Permanently', 'wp-rankology')],
                    ['value' => 302, 'label' =>  __('302 Found / Moved Temporarily', 'wp-rankology')],
                    ['value' => 307, 'label' =>  __('307 Moved Temporarily', 'wp-rankology')]
                ],
                'visible'     => true,
            ],
            [
                'key'         => '_rankology_redirections_value',
                'type'        => 'input',
                'placeholder' => __('Enter your new URL in absolute (e.g. https://www.example.com/)', 'wp-rankology'),
                'label'       => __('URL redirection', 'wp-rankology'),
                'description' => __('Enter some keywords to auto-complete this field against your content', 'wp-rankology'),
                'use_default' => '',
                'default'     => '',
                'visible'     => true,
            ],
        ], $id);

        return $data;
    }
}
