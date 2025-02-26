<?php


add_action( 'customize_register', function( $wp_customize ) {
    if (class_exists('WP_Customize_Control')) {
        class Customize_ACF_Control extends WP_Customize_Control
        {

            public $type = 'render_field_acf';

            public function enqueue()
            {
                if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
                    $version = PLUGIN_NAME_VERSION;
                } else {
                    $version = '1.0.0';
                }
                $plugin_name = 'acf-customizer-etc';

                acf_form_head();

                wp_enqueue_script( $plugin_name, ACF_CUSTOMIZER_URL . 'public/js/acf-customizer-setting.js', array( 'jquery' ), $version, false );
            }

            public function render_content()
            {
                $input_id = '_acf-customizer-' . $this->id;

                $classWrap = 'wrapFieldAcfCustomizer';
                if ( isset($this->json['acf_type']) && $this->json['acf_type'] != 'wysiwyg') {
                    $classWrap .= ' appendAcf';
                }

                echo "<div class='{$classWrap}'>";
                ?>
                <textarea style="display: none"
                        class="acf-customizer-receiver-data"
                        id="<?php echo esc_attr($input_id); ?>"
                        type="hidden"
                    <?php $this->input_attrs(); ?>
                    <?php $this->link(); ?>
                >
                    <?php echo get_theme_mod($this->id) ?>
                </textarea>
                <?php

                acf_form(array(
                    "fields" => [$this->json['key']],
                    "form" => false
                ));

                echo "</div>";
            }
        }
    }
} );



class acf_render_customizer {
    private $fields_layout = array("group", "repeater");

    private $fields_simple = array(
        'text',
        'textarea',
        'number',
        'email',
        'url',
        'file',
        'password',
        'range',
        'image',
        'wysiwyg',
        'oembed',
        'date_picker',
        'time_picker',
        'date_time_picker',
        'color_picker',
        'radio',
        'link',
        'select',
        'gallery',
        'checkbox',
        'true_false',
        'relationship',
        'button_group',
        'taxonomy',
        'post_object',
        'page_link',
        'user',
        'google_map'
    );

    function  __construct()
    {
        add_action( 'customize_register', array($this, 'renderField') );
        add_filter('acf/pre_render_fields', array($this, 'addValueToField'), 10, 1);
    }

    private function recursiveGroupField(&$fields) {
        foreach ($fields as $key => &$field) {
            $field['name'] = $field['_name'];
            $field['key'] = $field['_name'];

            $get_theme_mod = get_theme_mod($field['_name']);
            $valueUnser = @unserialize($get_theme_mod);

            if (in_array($field['type'], $this->fields_simple)) {
                if (!$valueUnser) {
                    $field['value'] = $get_theme_mod;
                } else{
                    $field['value'] = $valueUnser;
                }
            } else if (in_array($field['type'], $this->fields_layout) && is_array($valueUnser) && isset($field['sub_fields'])) {
                $field['value'] = $valueUnser;
                foreach ($field['sub_fields'] as $subKey => &$subField) {
                    $subField['key'] = $subField['_name'];
                    $subField['name'] = $subField['_name'];
                }
            }
        }
    }

    public function addValueToField($fields)
    {
        $currentScreen = get_current_screen();
        if ($currentScreen->id == 'customize') {
            $this->recursiveGroupField($fields);
        }

        return $fields;
    }

    public function renderField(WP_Customize_Manager $wp_customize) {
        $fieldData = self::get_acf_field_groups_by_rules(acf_customizer_admin_setting::$location);

        $panel = 'acf-customizer';
        $section = 'acf-section';
        $wp_customize->add_panel( $panel, array(
            'priority'       => 1,
            'theme_supports' => '',
            'title'          => "ACF Customizer",
        ) );
        $wp_customize->add_section( $section , array(
            'title'      => 'ACF Section',
            'priority'   => 1,
            'panel'    => $panel
        ) );

        foreach ($fieldData as $group_id => $groupField) {
            foreach ($groupField as $key => $field) {

                if ($field['type'] == 'panel') {
                     $wp_customize->add_panel( $field['name'], array(
                         'priority'       => 1,
                         'theme_supports' => '',
                         'title'          => $field['label'],
                     ) );
                    $panel = $field['name'];
                } else if ($field['type'] == 'section') {
                    $wp_customize->add_section( $field['name'] , array(
                        'title'      => $field['label'],
                        'priority'   => 1,
                        'panel'    => $panel
                    ) );
                    $section = $field['name'];
                } else {
                    $wp_customize->add_setting($field['name'], array(
                        'default'   => '',
                    ));

                    $wp_customize->selective_refresh->add_partial($field['name'], array(
                        'selector' => "#acf-customizer-{$field['name']}",
                    ));

                    $field['acf_type'] = $field['type'];

                    $wp_customize->add_control(
                        new Customize_ACF_Control(
                            $wp_customize,
                            $field['name'],
                            array(
                                "type" => "render_field_acf",
                                "id" => $field['name'],
                                "setting" => $field['name'],
                                "section" => $section,
                                "label" => '',
                                "json" =>$field
                            )
                        )
                    );
                }
            }
        }
    }

    public static function get_acf_field_groups_by_rules($location) {
        $result = array();
        $acf_field_groups = acf_get_field_groups();
        foreach($acf_field_groups as $acf_field_group) {
            foreach($acf_field_group['location'] as $group_locations) {
                foreach($group_locations as $rule) {
                    if($rule['param'] == $location) {
                        $result[$acf_field_group['ID']] = acf_get_fields( $acf_field_group );
                    }
                }
            }
        }
        return $result;
    }

}

new acf_render_customizer();