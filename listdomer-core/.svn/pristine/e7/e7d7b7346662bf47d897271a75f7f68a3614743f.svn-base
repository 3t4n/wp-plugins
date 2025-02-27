<?php
// no direct access
defined('ABSPATH') || die();

class LSDRC_Settings_Listdom extends LSDRC_Settings
{
    /**
     * Sets the Blog section and fields in Redux Framework.
     * @return void
     */
    public function register()
    {
        Redux::set_section(
            $this->opt_name,
            [
                'title' => esc_html__('Listdom', 'listdomer-core'),
                'id' => 'listdomer-listing',
                'desc' => esc_html__('Listdom settings for various elements.', 'listdomer-core'),
                'customizer_width' => '400px',
                'icon' => 'el el-adjust-alt',
                'fields' => $this->get_listing_fields(),
            ]
        );

        (new LSDRC_Settings_Listdom_Forms())->register();
        (new LSDRC_Settings_Listdom_Search())->register();
        (new LSDRC_Settings_Listdom_Dashboard())->register();
        (new LSDRC_Settings_Listdom_Widgets())->register();
    }

    /**
     * Returns the fields for the Blog settings.
     * @return array Fields array.
     */
    private function get_listing_fields(): array
    {
        return [];
    }
}
