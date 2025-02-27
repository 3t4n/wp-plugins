<?php

/**
 *
 * @class FLDadevarzanIranMapModule
 */
class FLDadevarzanIranMapModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Iran Map', 'dadevarzan-beaverbuilder-modules'),
            'description'   => __('AAdd Iran map with provinces to beaver builder.', 'dadevarzan-beaverbuilder-modules'),
            'category'		=> __('Dadevarzan Modules', 'dadevarzan-beaverbuilder-modules'),
            'dir'           => FL_MODULE_DADEVARZAN_DIR . 'iran-map/',
            'url'           => FL_MODULE_DADEVARZAN_URL . 'iran-map/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
		
		$this->add_js('jquery-ui-core');
		// Register and enqueue your own
		global $wp_scripts;

		// get the jquery ui object
		$queryui = $wp_scripts->query('jquery-ui-core');
		$this->add_js('jquery-ui-tooltip');
	 
		// load the jquery ui theme
		$url = "https://code.jquery.com/ui/".$queryui->ver."/themes/smoothness/jquery-ui.min.css";
		$this->add_css('jquery-ui-smoothness', $url);
    }
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('FLDadevarzanIranMapModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Links', 'dadevarzan-beaverbuilder-modules'), // Section Title
                'fields'        => array( // Section Fields
                    'alborz_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Abborz', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'alborz_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Abborz Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'ardabil_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Ardabil', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'ardabil_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Ardabil Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'azarbayejan_sharghi_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Azarbayejan Sharghi', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'azarbayejan_sharghi_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Azarbayejan Sharghi Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'azarbayejan_gharbi_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Azarbayejan Gharbi', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'azarbayejan_gharbi_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Azarbayejan Gharbi Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'boushehr_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Boushehr', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'boushehr_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Boushehr Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'chaharmahal_bakhtyari_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Chaharmahal Bakhtyari', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'chaharmahal_bakhtyari_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Chaharmahal Bakhtyari Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'fars_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Fars', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'fars_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Fars Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'gilan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Gilan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'gilan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Gilan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'golestan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Golestan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'golestan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Golestan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'hamedan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Hamedan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'hamedan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Hamedan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'hormozgan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Hormozgan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'hormozgan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Hormozgan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'ilam_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Ilam', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> true,
						'show_nofollow'	=> true,
					),
                    'ilam_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Ilam Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'isfahan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Isfahan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'isfahan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Isfahan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'kerman_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Kerman', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'kerman_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Kerman Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'kermanshah_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Kermanshah', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'kermanshah_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Kermanshah Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'khorasan_shomalali_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Khorasan Shomalali', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'khorasan_shomalali_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Khorasan Shomalali Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'khorasan_razavi_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Khorasan Razavi', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'khorasan_razavi_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Khorasan Razavi Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'khorasan_jonoubi_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Khorasan Jonoubi', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'khorasan_jonoubi_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Khorasan Jonoubi Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'khouzestan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Khouzestan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'khouzestan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Khouzestan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'kohgiluyeh_boyer_ahmad_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Kohgiluyeh Boyer Ahmad', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'kohgiluyeh_boyer_ahmad_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Kohgiluyeh Boyer Ahmad Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'kurdistan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Kurdistan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'kurdistan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Kurdistan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'lorestan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Lorestan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'lorestan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Lorestan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'markazi_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Markazi', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'markazi_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Markazi Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'mazandaran_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Mazandaran', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'mazandaran_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Mazandaran Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'qazvin_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Qazvin', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'qazvin_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Qazvin Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'qom_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Qom', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'qom_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Qom Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'semnan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Semnan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'semnan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Semnan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'sistan_baluchestan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Sistan Baluchestan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'sistan_baluchestan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Sistan Baluchestan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'tehran_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Tehran', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'tehran_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Tehran Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'yazd_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Yazd', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'yazd_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Yazd Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                    'zanjan_link'     => array(
                        'type'          => 'link',
                        'label'         => __('Zanjan', 'dadevarzan-beaverbuilder-modules'),
						'show_target'	=> false,
						'show_nofollow'	=> false,
					),
                    'zanjan_tooltip'     => array(
                        'type'          => 'text',
                        'label'         => __('Zanjan Title', 'dadevarzan-beaverbuilder-modules'),
                    ),
                )
            )
        )
    ),
    'style'       => array( // Tab
        'title'         => __('Style', 'dadevarzan-beaverbuilder-modules'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Color Styles', 'dadevarzan-beaverbuilder-modules'), // Section Title
                'fields'        => array( // Section Fields
                    'border_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Borders Color', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => '000000',
                        'show_reset'    => true,
					),
                    'sea_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Sea Color', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => '004268',
                        'show_reset'    => true,
					),
                    'province_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Province Color', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => 'FFFFFF',
                        'show_reset'    => true,
					),
                    'disabled_province_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Disabled Province Color', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => 'DDDDDD',
                        'show_reset'    => true,
					),
                    'island_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Island Color', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => '004268',
                        'show_reset'    => true,
					),
                    'hover_color'     => array(
                        'type'          => 'color',
                        'label'         => __('Hover Color', 'dadevarzan-beaverbuilder-modules'),
                        'default'       => 'FFFFFF',
                        'show_reset'    => true,
					),
                    'tooltip_typography'     => array(
						'type'       => 'typography',
						'label'         => __( 'Tooltip Font', 'dadevarzan-beaverbuilder-modules' ),
						'responsive' => false,
					),
                )
            )
        )
    ),
));
