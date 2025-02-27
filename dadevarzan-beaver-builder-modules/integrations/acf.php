<?php
// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// check if class already exists
if( !class_exists('dv_acf_field_fl_builder') ) :


    class dv_acf_field_fl_builder extends acf_field
    {

        /*
        *  __construct
        *
        *  This function will setup the field type data
        *
        *  @type	function
        *  @date	5/03/2014
        *  @since	5.0.0
        *
        *  @param	n/a
        *  @return	n/a
        */

        function __construct()
        {

            $this->name = 'acf_dvflbuilder';
            $this->label = __('Beaver Builder', 'dadevarzan-beaverbuilder-modules');

            /*
            *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
            */
            $this->category = 'choice';

            // do not delete!
            parent::__construct();

        }

        public static function init()
        {
            new dv_acf_field_fl_builder();
        }

        /*
        *  @param	$field (array) the $field being edited
        */
        function render_field_settings( $field ) {

            acf_render_field_setting( $field, array(
                'label'			=> __('Template','dadevarzan-beaverbuilder-modules'),
                'instructions'	=> __('Select Beaver Builder template','dadevarzan-beaverbuilder-modules'),
                'name'			=> 'fl_builder',
                'type'			=> 'select',
                'choices'		=> array(
                    'row' => __('Row','dadevarzan-beaverbuilder-modules'),
                    'module' => __('Module','dadevarzan-beaverbuilder-modules'),
                ),
            ));

        }

        public function render_field($field) {


            $choices = array();

            $args = array(
                'post_type'   => 'fl-builder-template',
                'orderby'   => 'menu_order',
                'numberposts'   => -1,
            );

            if ( !empty($field['fl_builder']) ) {
                $args['fl-builder-template-type'] =$field['fl_builder'];
            }

            $fl_builder_templates = get_posts( $args );

            if($fl_builder_templates) {
                foreach ( $fl_builder_templates AS $template ) {

                    $choices[$template->ID] = $template->post_title .'('.$template->post_name.')';
                }
            }
            ?>
            <table style="width:100%;border:0;">
                <tr>
                    <td style="width:100%;">
                        <select id="<?php echo $field['id']; ?>" class="<?php echo $field['class']; ?>" name="<?php echo $field['name']; ?>">
                            <?php if (!isset($field['required']) || !$field['required']): ?>
                                <option value=""><?php __('None', 'dadevarzan-beaverbuilder-modules'); ?></option>
                            <?php endif; ?>
                            <?php
                            if ( !empty($choices) ) {
                                foreach ($choices AS $id => $choice) {
                                    ?>
                                    <option <?php if ($id == $field['value']){ ?>selected <?php } ?>value="<?php echo $id; ?>"><?php echo $choice; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>
            <?php
        }

        function format_value( $value, $post_id, $field ) {

            if (is_admin()) {
                return $value;
            }

            if( empty($value) ) {
                return $value;
            }

            return do_shortcode('[fl_builder_insert_layout id="' . $value . '"]');
        }

    }

endif;
