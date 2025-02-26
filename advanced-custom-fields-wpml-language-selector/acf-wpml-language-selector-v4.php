<?php

class acf_field_wpml_language_selector_v4 extends acf_field {

	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options


	/*
	*  __construct
	*
	*  Set name / label needed for actions / filters
	*
	*  @since	3.6
	*  @date	23/01/13
	*/

	function __construct()
	{
		// vars
		$this->name = 'wpml_language_selector';
		$this->label = 'WPML Language Selector';
		$this->category = __("Choice",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array(
			// add default here to merge into your field.
			// This makes life easy when creating the field options as you don't need to use any if( isset('') ) logic. eg:
			//'preview_size' => 'thumbnail'
		);


		// do not delete!
    	parent::__construct();


    	// settings
		$this->settings = array(
			'path' => apply_filters('acf/helpers/get_path', __FILE__),
			'dir' => apply_filters('acf/helpers/get_dir', __FILE__),
			'version' => '1.0.0'
		);

	}


	/*
	*  create_options()
	*
	*  Create extra options for your field. This is rendered when editing a field.
	*  The value of $field['name'] can be used (like below) to save extra data to the $field
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field	- an array holding all the field's data
	*/

	function create_options( $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/

		// key is needed in the field names to correctly save the data
		$key = $field['name'];
        $value = isset($field['type_of_selector']) ? $field['type_of_selector'] : '';


		// Create Field Options HTML
		?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
        	<td class="label">
        		<label><?php _e('Type of selector','acf-wpml_language_selector'); ?></label>
        		<p class="description"><?php _e('Choose the type of input field','acf-wpml_language_selector'); ?></p>
        	</td>
        	<td>
        		<?php

        		do_action('acf/create_field', array(
        			'type'		=>	'select',
        			'name'		=>	'fields['.$key.'][type_of_selector]',
        			'value'		=>	$value,
        			'layout'	=>	'horizontal',
        			'choices'	=>	array(
                        'select'    =>  __('Select', 'acf-wpml_language_selector'),
                        'radio'     =>  __('Radio Button', 'acf-wpml_language_selector'),
                        'checkbox'  =>  __('Checkbox (multiple select)', 'acf-wpml_language_selector')
        			)
        		));

        		?>
        	</td>
        </tr>
		<?php

	}


	/*
	*  create_field()
	*
	*  Create the HTML interface for your field
	*
	*  @param	$field - an array holding all the field's data
	*
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function create_field( $field )
	{

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
                <select id="<?php echo esc_attr($field['id']); ?>" class="<?php echo esc_attr($field['class']); ?>" name="<?php echo esc_attr($field['name']); ?>[]" >
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
new acf_field_wpml_language_selector_v4();

?>
