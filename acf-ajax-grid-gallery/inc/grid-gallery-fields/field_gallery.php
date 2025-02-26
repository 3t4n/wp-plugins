<?php

#Grid Gallery
acf_add_local_field_group(array(
    'key' => 'optionAAGGallery_grid_key',
    'title' => 'Grid Gallery',
    'fields' => array (),
    'position' => 'acf_after_title',
    'menu_order' => 1,
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'aagg-settings',
            ),
        ),
    ),
));

        #Grid Gallery Row
        acf_add_local_field(array(
            'key' => 'optionAAGGallery_main_flexible_field_key',
            'label' => '',
            'instructions' => 'shortcode: [acf_ajax_grid_gallery id="1"]',
            'name' => 'optionAAGGallery_main_flexible_field1',
            'type' => 'flexible_content',
            'button_label' => 'Add Grid Gallery',
            'parent' => 'optionAAGGallery_grid_key',
            'layouts' => array(
                array(
                    'key'           => 'optionAAGGallery_main_flexible_layout1_key',
                    'name'          => 'optionAAGGallery_main_flexible_layout1',
                    'label'         => 'Grid Gallery',
                    'display'       => 'block',
                    'min' => '',
                    'max' => '',
                    ),
            )
        ));

                //Tab1 Gallery
                acf_add_local_field(array(
                    'key'           => 'optionAAGGallery_grid_tab1_key',
                    'label'         => 'Gallery',
                    'name'          => 'optionAAGGallery_grid_tab1',
                    'type'          => 'tab',
                    'parent'        => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout' => 'optionAAGGallery_main_flexible_layout1_key', // layout key
                ));

                #Grid Gallery Image Row Fields
                acf_add_local_field(array(
                    'key' => 'optionAAGGallery_grid_flexible_field_key',
                    'label' => '',
                    'name' => 'optionAAGGallery_grid_flexible_field1',
                    'type' => 'flexible_content',
                    'button_label' => 'Add Image',
                    'parent' => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key

                    'layouts' => array(
                        array(
                            'key'           => 'optionAAGGallery_grid_flexible_layout1_key',
                            'name'          => 'optionAAGGallery_grid_flexible_layout1',
                            'label'         => 'Image',
                            'display'       => 'block',
                            'min' => '',
                            'max' => '',
                            ),
                    )
                ));
                            //Image
                            acf_add_local_field(array(
                                'key'          => 'optionGallery_grid_layout1_subfield1_key',
                                'label'        => 'Image',
                                'name'         => 'optionGallery_grid_layout1_subfield1',
                                'type'         => 'image',
                                'parent'       => 'optionAAGGallery_grid_flexible_field_key', //flexible field key
                                'parent_layout'=> 'optionAAGGallery_grid_flexible_layout1_key', // layout key
                            ));

                //Tab2 Setting
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_tab2_key',
                    'label'        => 'Setting',
                    'name'         => 'optionAAGGallery_grid_tab2',
                    'type'         => 'tab',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout' => 'optionAAGGallery_main_flexible_layout1_key',
                ));

                // Enable Lightbox
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_subfield1_tab2_key',
                    'label'        => 'Switch Lightbox',
                    'instructions' => 'Enable lightbox for each images.',
                    'name'         => 'optionAAGGallery_grid_subfield1_tab2',
                    'type'         => 'true_false',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                ));
                
                // Lightbox Unique Name
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_subfield2_tab2_key',
                    'label'        => 'Add Unique Name',
                    'instructions' => 'Make sure the unique name that you will input is not the same in the other grid gallery ',
                    'required' => 1,
                    'name'         => 'optionAAGGallery_grid_subfield2_tab2',
                    'type'         => 'text',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'optionAAGGallery_grid_subfield1_tab2_key',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                ));

                // Lightbox Title
                acf_add_local_field(array(
                    'key'           => 'optionAAGGallery_grid_lightbox_title_tab2_key',
                    'label'         => 'Lightbox Title',
                    'instructions'  => 'Show the title for each images in lightbox',
                    'name'          => 'optionAAGGallery_grid_lightbox_title_tab2',
                    'type'          => 'true_false',
                    'default_value' => '1',
                    'parent'        => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout' => 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'     => 'optionAAGGallery_grid_subfield1_tab2_key',
                                'operator'  => '==',
                                'value'     => '1',
                            ),
                        ),
                    ),
                ));

                // Lightbox Spinner
                acf_add_local_field(array(
                    'key'           => 'optionAAGGallery_grid_lightbox_spinner_tab2_key',
                    'label'         => 'Lightbox Spinner',
                    'instructions'  => 'Loader animation for lightbox',
                    'name'          => 'optionAAGGallery_grid_lightbox_spinner_tab2',
                    'type'          => 'select',
                    'default_value' => 'double-bounce',
                    'parent'        => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout' => 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'choices'       => array(
                        'rotating-plane'    => 'Rotating Plane',
                        'double-bounce'     => 'Double Bounce',
                        'wave'              => 'Wave',
                        'wandering-cubes'   => 'Wandering Cubes',
                        'spinner-pulse'     => 'Spinner Pulse',
                        'three-bounce'      => 'Three Bounce',
                        'cube-grid'         => 'Cube Grid',
                    ),
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'     => 'optionAAGGallery_grid_subfield1_tab2_key',
                                'operator'  => '==',
                                'value'     => '1',
                            ),
                        ),
                    ),
                ));

                // Infinite Scroll Ajax
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_subfield3_tab2_key',
                    'label'        => 'Switch Ajax Loadmore',
                    'instructions' => 'Turn on this loadmore will divide photos into the number you input in the "Limit Image Per Page Field" and show the view more button.',
                    'name'         => 'optionAAGGallery_grid_subfield3_tab2',
                    'type'         => 'true_false',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                ));

                // Infinite Scroll Limit Image Per Page
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_subfield4_tab2_key',
                    'label'        => 'Limit Image Per Page',
                    'instructions' => 'Enter the number you want to load the image per view',
                    'name'         => 'optionAAGGallery_grid_subfield4_tab2',
                    'type'         => 'number',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'min'          => '1',
                    'max'          => '12',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'optionAAGGallery_grid_subfield3_tab2_key',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ));

                // Infinite Scroll Button Label
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_ajax_buttonLabel_tab2_key',
                    'label'        => 'Button Label',
                    'name'         => 'optionAAGGallery_grid_ajax_buttonLabel_tab2',
                    'type'         => 'text',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'min'          => '1',
                    'max'          => '12',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'optionAAGGallery_grid_subfield3_tab2_key',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ));

                // Infinite Scroll Button Color
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_ajax_buttonColor_tab2_key',
                    'label'        => 'Button Color',
                    'instructions' => 'Select color of the button',
                    'name'         => 'optionAAGGallery_grid_ajax_buttonColor_tab2',
                    'type'         => 'color_picker',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'min'          => '1',
                    'max'          => '12',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'optionAAGGallery_grid_subfield3_tab2_key',
                                'operator' => '==',
                                'value' => '1',
                            ),
                        ),
                    ),
                ));

                // Infinite Scroll Spinner
                acf_add_local_field(array(
                    'key'           => 'optionAAGGallery_grid_ajax_spinner_tab2_key',
                    'label'         => 'Ajax Loadmore Spinner',
                    'instructions'  => 'Loader animation for ajax loadmore',
                    'name'          => 'optionAAGGallery_grid_ajax_spinner_tab2',
                    'type'          => 'select',
                    'default_value' => 'spinner1',
                    'parent'        => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout' => 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'choices'       => array(
                        'spinner1'    => 'Loader Ellips',
                        'spinner2'    => 'Loader Wheel',
                    ),
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'     => 'optionAAGGallery_grid_subfield3_tab2_key',
                                'operator'  => '==',
                                'value'     => '1',
                            ),
                        ),
                    ),
                ));

                // Number of column
                acf_add_local_field(array(
                    'key'           => 'optionAAGGallery_grid_ajax_column_tab2_key',
                    'label'         => 'Column',
                    'instructions'  => 'Select how many columns will display per row',
                    'name'          => 'optionAAGGallery_grid_ajax_column_tab2',
                    'type'          => 'select',
                    'default_value' => 'column3',
                    'parent'        => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout' => 'optionAAGGallery_main_flexible_layout1_key', // layout key
                    'choices'       => array(
                        'column2'    => '2',
                        'column3'    => '3',
                    ),
                ));

                // Add Class
                acf_add_local_field(array(
                    'key'          => 'optionAAGGallery_grid_subfield5_tab2_key',
                    'label'        => 'Additional Class',
                    'instructions' => 'Add class in the grid-gallery-row',
                    'name'         => 'optionAAGGallery_grid_subfield5_tab2',
                    'type'         => 'text',
                    'parent'       => 'optionAAGGallery_main_flexible_field_key', //flexible field key
                    'parent_layout'=> 'optionAAGGallery_main_flexible_layout1_key', // layout key
                ));