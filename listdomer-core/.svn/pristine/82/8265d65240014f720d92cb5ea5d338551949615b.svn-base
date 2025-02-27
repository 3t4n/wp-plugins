<?php
// no direct access
defined('ABSPATH') || die();

class LSDRC_Settings_PreLoader extends LSDRC_Settings
{
    /**
     * Sets the preloader section and fields in Redux Framework.
     * @return void
     */
    public function register()
    {
        Redux::set_section(
            $this->opt_name,
            [
                'title' => esc_html__('PreLoader', 'listdomer-core'),
                'id' => 'listdomer-preloader',
                'desc' => esc_html__('settings preloader.', 'listdomer-core'),
                'customizer_width' => '400px',
                'icon' => 'el el-repeat',
                'fields' => $this->get_preloader_fields(),
            ]
        );
    }

    /**
     * Returns the fields for the preloader settings.
     * @return array Fields array.
     */
    private function get_preloader_fields(): array
    {
        $icon = plugins_url() . '/' . LSDRC_DIRNAME . '/assets/img/pre-loader.gif';

        return [
            [
                'id' => 'listdomer_activate_preloader',
                'type' => 'switch',
                'title' => esc_html__('Display Preloader', 'listdomer-core'),
                'default' => false,
                'on' => esc_html__('Show', 'listdomer-core'),
                'off' => esc_html__('Hide', 'listdomer-core'),
            ],
            [
                'id' => 'listdomer_preloader_icon',
                'type' => 'media',
                'title' => esc_html__('Icon', 'listdomer-core'),
                'subtitle' => esc_html__('Upload an icon for the pre-loader.', 'listdomer-core'),
                'default' => [
                    'url' => $icon,
                ],
                'required' => [
                    ['listdomer_activate_preloader', '=', '1'],
                ],
            ],
        ];
    }
}
