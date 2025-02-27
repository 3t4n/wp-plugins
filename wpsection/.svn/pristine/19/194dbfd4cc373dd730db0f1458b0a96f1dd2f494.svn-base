<?php
if (!class_exists('Icon')) {
    class Icon
    {
        public function __construct()
        {
            add_filter('elementor/icons_manager/additional_tabs', array($this, 'custom_icon'));
        }

        public function custom_icon($array)
        {
            $theme_assets_dir = get_template_directory_uri() . '/assets/customicon';

            return array(
                'custom-icon' => array(
                    'name'          => 'custom-icon',
                    'label'         => 'Elementor E-Icon',
                    'url'           => '',
				
					'enqueue'       => array(
                        $theme_assets_dir . '/eicons.css', // Enqueue the CSS file for Eicons.
                    ),
                    'prefix'        => '',
                    'displayPrefix' => '',
                    'labelIcon'     => 'eicon-elementor',
                    'ver'           => '',
                    'fetchJson'     => $theme_assets_dir . '/eicons.json',
                    'native'        => 1,
                ),
						
				
			   'flaticon' => array(
                    'name'          => 'flaticon',
                    'label'         => 'Flaticon',
                    'url'           => '',
			
					'enqueue'       => array(
                        $theme_assets_dir . '/flaticon/flaticon.css', // Enqueue the CSS file for Eicons.
                    ),
                    'prefix'        => '',
                    'displayPrefix' => '',
                    'labelIcon'     => 'eicon-menu-toggle',
                    'ver'           => '',
                    'fetchJson'     => $theme_assets_dir . '/flaticon/flaticon.json', // Make sure the path to your JSON file is correct.
                    'native'        => 1,
                ),	
				
				
			'icomoon_custom' => array(
                    'name'          => 'icomoon_custom',
                    'label'         => 'Icomoon Icons',
                    'url'           => '',
            
                    'enqueue'       => array(
                        $theme_assets_dir . '/icomoon.css', // Enqueue the CSS file for Eicons.
                    ),
                    'prefix'        => '',
                    'displayPrefix' => '',
                    'labelIcon'     => 'eicon-animation-text',
                    'ver'           => '',
                    'fetchJson'     => $theme_assets_dir . '/icomoon.json', // Make sure the path to your JSON file is correct.
                    'native'        => 1,
                ),
			
				
            );
        }
    }

    new Icon();
}
