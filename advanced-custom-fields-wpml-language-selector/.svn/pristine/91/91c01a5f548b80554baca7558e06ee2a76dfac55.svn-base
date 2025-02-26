<?php

class acf_field_wpml_language_selector extends acf_field {


    /*
    *  __construct
    *
    *  This function will setup the field type data
    *
    *  @type    function
    *  @since   5.0.0
    *
    *  @param   n/a
    *  @return  n/a
    */

    function __construct() {

        /*
        *  name (string) Single word, no spaces. Underscores allowed
        */

        $this->name = 'wpml_language_selector';


        /*
        *  label (string) Multiple words, can include spaces, visible when selecting a field type
        */

        $this->label = __('WPML Language Selector', 'acf-wpml_language_selector');


        /*
        *  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
        */

        $this->category = 'choice';



        // do not delete!
        parent::__construct();

    }


    /*
    *  render_field_settings()
    *
    *  Create extra settings for your field. These are visible when editing a field
    *
    *  @type    action
    *  @since   3.6
    *
    *  @param   $field (array) the $field being edited
    *  @return  n/a
    */

    function render_field_settings( $field ) {

        /*
        *  acf_render_field_setting
        *
        *  This function will create a setting for your field. Simply pass the $field parameter and an array of field settings.
        *  The array of settings does not require a `value` or `prefix`; These settings are found from the $field array.
        *
        *  More than one setting can be added by copy/paste the above code.
        *  Please note that you must also have a matching $defaults value for the field name (font_size)
        */


        acf_render_field_setting( $field, array(
            'label'         => __('Type of selector','acf-wpml_language_selector'),
            'instructions'  => __('Choose the type of input field','acf-wpml_language_selector'),
            'type'          => 'select',
            'name'          => 'type_of_selector',
            'choices'           =>  array(
                'select' =>  __('Select', 'acf-wpml_language_selector'),
                'radio'  =>  __('Radio Button', 'acf-wpml_language_selector'),
                'checkbox'  =>  __('Checkbox (multiple select)', 'acf-wpml_language_selector')
            ),
        ));

    }



    /*
    *  render_field()
    *
    *  Create the HTML interface for your field
    *
    *  @param   $field (array) the $field being rendered
    *
    *  @type    action
    *  @since   3.6
    *
    *  @param   $field (array) the $field being edited
    *  @return  n/a
    */

    function render_field( $field ) {

        $atts = array(
            'id'    => $field['id'],
            'class' => $field['class'],
        );


        // check does WPML function exitst
        if(!function_exists('icl_get_languages')) {
            return;
        }

        // WPML languages used on website
        $langs  = icl_get_languages('skip_missing=0&orderby=name') ?
        icl_get_languages('skip_missing=0&orderby=name') : array();

        if(empty($langs)) {
            return;
        }

        switch ($field['type_of_selector']) {
            case 'select':
                ?>
                <select <?php echo acf_esc_attr($atts); ?> name="<?php echo esc_attr($field['name']); ?>[]" >
                    <option value=""></option>
                    <?php foreach($langs as $lang) { ?>
                        <option value="<?php echo esc_attr($lang['language_code']); ?>"
                            <?php echo $this->checked($lang['language_code'], $field['value'], 'selected'); ?> >
                            <?php echo esc_attr($lang['native_name']); ?></option>
                    <?php } ?>
                </select>
                <?php
                break;

            case 'radio':
                ?>
                <ul class="acf-radio-list  acf-hl">
                <?php foreach($langs as $lang) { ?>
                        <li>
                            <label><?php echo esc_attr($lang['native_name']); ?></label>
                            <input type="radio" value="<?php echo esc_attr($lang['language_code']); ?>"
                            name="<?php echo esc_attr($field['name']); ?>[]"
                            <?php echo $this->checked($lang['language_code'], $field['value']); ?>  />
                        </li>
                <?php } ?>
                </ul>
                <?php
                break;

            case 'checkbox':
            ?>
            <ul class="acf-radio-list  acf-hl">
            <?php foreach($langs as $lang) { ?>
                    <li>
                        <label><?php echo esc_attr($lang['native_name']); ?></label>
                        <input type="checkbox" value="<?php echo esc_attr($lang['language_code']); ?>"
                         name="<?php echo esc_attr($field['name']); ?>[]"
                        <?php echo $this->checked($lang['language_code'], $field['value']); ?>  />
                    </li>
            <?php } ?>
            </ul>
            <?php
                break;

        }

    }

    /*
     * Helper function for HTML
     *
     */
    public function checked($current, $check, $type= "checked")
    {
        $checked = "";

        if( is_array($check) && in_array((string) $current, $check) ) {
                $checked = " $type='$type' ";
        } elseif(is_string($check) && ((string) $current == $check)) {
              $checked = " $type='$type' ";
        }

            return $checked;
    }


}


// create field
new acf_field_wpml_language_selector();

?>
