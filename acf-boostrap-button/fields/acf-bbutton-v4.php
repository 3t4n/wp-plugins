<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_field_bbutton') ) :


class acf_field_bbutton extends acf_field {
	
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
	
	function __construct( $settings )
	{
		// vars
		$this->name = 'bbutton';
		$this->label = __('Button','acf-bbutton');
		$this->category = __('Bootstrap','acf-bbutton'); // Basic, Content, Choice, etc
		$this->defaults = array(
			'default_text'	=> '',
			'allow_advanced'=> array(
				'tag', 'option', 'size', 'active', 'disabled', 'class'
			),
			'default_tag'	=> 'a',
			'default_option'	=> 'default',
			'default_size'	=> '',
			'default_active'	=> 0,
			'default_disabled'	=> 0,
			'default_class'	=> '',
		);
		
		
		// do not delete!
    	parent::__construct();
    	
    	
    	// settings
		$this->settings = $settings;

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

		$field = array_merge($this->defaults, $field);

		
		// key is needed in the field names to correctly save the data
		$key = $field['name'];


		// Create Field Options HTML
		?>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Allow Advanced Options",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Display advanced button options (tag, option, size, active, disabled and class).",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'checkbox',
					'name'		=>	'fields['.$key.'][allow_advanced]',
					'value'		=>	$field['allow_advanced'],
					'layout'	=>	'horizontal',
					'choices'		=> array(
						'tag'	    => __("Tag",'acf-bbutton'),
						'option'	=> __("Option",'acf-bbutton'),
						'size'		=> __("Size",'acf-bbutton'),
						'active'	=> __("Active",'acf-bbutton'),
						'disabled'	=> __("Disabled",'acf-bbutton'),
						'class'		=> __("Class",'acf-bbutton'),
					)
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Button Text",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set the default text of the button when you create a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'text',
					'name'		=>	'fields['.$key.'][default_text]',
					'value'		=>	$field['default_text'],
					'layout'	=>	'horizontal',
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Tag",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set the default button tag when creating a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'select',
					'name'		=>	'fields['.$key.'][default_tag]',
					'value'		=>	$field['default_tag'],
					'layout'	=>	'horizontal',
					'choices'		=> array(
						'a'		=> __("Link",'acf-bbutton'),
						'button'		=> __("Button",'acf-bbutton'),
						'input' 		=> __("Input",'acf-bbutton'),
						'submit'		=> __("Submit",'acf-bbutton'),
					)
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Option",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set the default button option when creating a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'select',
					'name'		=>	'fields['.$key.'][default_option]',
					'value'		=>	$field['default_option'],
					'layout'	=>	'horizontal',
					'choices'		=> array(
						'default'		=> __("Default",'acf-bbutton'),
						'primary'		=> __("Primary",'acf-bbutton'),
						'success'		=> __("Success",'acf-bbutton'),
						'info'			=> __("Info",'acf-bbutton'),
						'warning'		=> __("Warning",'acf-bbutton'),
						'danger'		=> __("Danger",'acf-bbutton'),
						'link'		    => __("Link",'acf-bbutton'),
					)
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Size",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set the default size when creating a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'select',
					'name'		=>	'fields['.$key.'][default_size]',
					'value'		=>	$field['default_size'],
					'layout'	=>	'horizontal',
					'choices'		=> array(
						''			=> __("Default",'acf-bbutton'),
						'lg'		=> __("Large",'acf-bbutton'),
						'sm'		=> __("Small",'acf-bbutton'),
						'xs'		=> __("Extra Small",'acf-bbutton'),
					)
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Active",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set the default button active when creating a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'radio',
					'name'		=>	'fields['.$key.'][default_active]',
					'value'		=>	$field['default_active'],
					'layout'	=>	'horizontal',
					'choices'		=> array(
						1	=>	__( 'Yes', 'acf-bbutton' ),
						0	=>	__( 'No', 'acf-bbutton' ),
					)
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Disabled",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set the default button disabled when creating a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'radio',
					'name'		=>	'fields['.$key.'][default_disabled]',
					'value'		=>	$field['default_disabled'],
					'layout'	=>	'horizontal',
					'choices'		=> array(
						1	=>	__( 'Yes', 'acf-bbutton' ),
						0	=>	__( 'No', 'acf-bbutton' ),
					)
				));

				?>
            </td>
        </tr>
        <tr class="field_option field_option_<?php echo $this->name; ?>">
            <td class="label">
                <label><?php _e("Default Button Class",'acf-bbutton'); ?></label>
                <p class="description"><?php _e("Set default button class when creating a new button.",'acf-bbutton'); ?></p>
            </td>
            <td>
				<?php

				do_action('acf/create_field', array(
					'type'		=>	'text',
					'name'		=>	'fields['.$key.'][default_class]',
					'value'		=>	$field['default_class'],
					'layout'	=>	'horizontal',
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
		// defaults?
		$field = array_merge($this->defaults, $field);

		// perhaps use $field['preview_size'] to alter the markup?

		// create Field HTML
		if ( ! isset( $field['value']['text'] ) ) {
			if ( isset( $field['default_text'] ) ) {
				$field['value']['text'] = $field['default_text'];
			} else {
				$field['value']['text'] = '';
			}
		}

		$url_exists = true;
		if ( ! isset($field['value']['url']) )
		{
			$url_exists = false;
		}

		if ( ! isset( $field['value']['tag'] ) ) {
			if ( isset( $field['default_tag'] ) ) {
				$field['value']['tag'] = $field['default_tag'];
			} else {
				$field['value']['tag'] = '';
			}
		}

		if ( ! isset( $field['value']['option'] ) ) {
			if ( isset( $field['default_option'] ) ) {
				$field['value']['option'] = $field['default_option'];
			} else {
				$field['value']['option'] = '';
			}
		}

		if ( ! isset( $field['value']['size'] ) ) {
			if ( isset( $field['default_size'] ) ) {
				$field['value']['size'] = $field['default_size'];
			} else {
				$field['value']['size'] = '';
			}
		}

		if ( ! isset( $field['value']['active'] ) ) {
			if ( isset( $field['default_active'] ) ) {
				$field['value']['active'] = $field['default_active'];
			} else {
				$field['value']['active'] = '';
			}
		}

		if ( ! isset( $field['value']['disabled'] ) ) {
			if ( isset( $field['default_disabled'] ) ) {
				$field['value']['disabled'] = $field['default_disabled'];
			} else {
				$field['value']['disabled'] = '';
			}
		}
		if ( ! isset( $field['value']['class'] ) ) {
			if ( isset( $field['default_class'] ) ) {
				$field['value']['class'] = $field['default_class'];
			} else {
				$field['value']['class'] = '';
			}
		}
		?>

        <div class="acf-bbutton-fild" id="acf-<?php echo esc_attr($field['key']); ?>" data-key="<?php echo esc_attr($field['key']); ?>">

            <div class="acf-bbutton-subfield acf-bbutton-text">
                <div class="acf-label">
                    <label for="<?php echo esc_attr($field['id']); ?>_text"><?php _e("Text",'acf-bbutton'); ?></label>
                </div>
                <div class="acf-input">
                    <input  type="text"
                            name="<?php echo esc_attr($field['name']); ?>[text]"
                            id="<?php echo esc_attr($field['id']); ?>_text"
                            value="<?php echo esc_attr($field['value']['text']); ?>"
                    />
                </div>
            </div>

	        <?php if ( in_array('tag', $field['allow_advanced'] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-tag">
                    <div class="acf-label">
                        <label for="<?php echo esc_attr($field['id']) ?>_tag"><?php _e("Tag",'acf-bbutton'); ?></label>
                    </div>
                    <div class="acf-input">
                        <select
                                name="<?php echo esc_attr($field['name']) ?>[tag]"
                                id="<?php echo esc_attr($field['id']) ?>_tag"
                        >
                            <option value="a" <?php if ( $field['value']['tag'] == 'a' ) echo 'selected'; ?>><?php _e("Link",'acf-bbutton'); ?></option>
                            <option value="button" <?php if ( $field['value']['option'] == 'button' ) echo 'selected'; ?>><?php _e("Button",'acf-bbutton'); ?></option>
                            <option value="input" <?php if ( $field['value']['option'] == 'input' ) echo 'selected'; ?>><?php _e("Input",'acf-bbutton'); ?></option>
                            <option value="submit" <?php if ( $field['value']['option'] == 'submit' ) echo 'selected'; ?>><?php _e("Submit",'acf-bbutton'); ?></option>
                        </select>
                    </div>
                </div>

	        <?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[tag]" value="<?php echo esc_attr($field['value']['tag']); ?>" />
	        <?php } ?>

            <div class="acf-bbutton-subfield acf-bbutton-url">
                <div class="acf-label">
                    <label for="<?php echo esc_attr($field['id']) ?>_url"><?php _e("URL",'acf-bbutton'); ?></label>
                </div>
                <div class="acf-input">
					<?php if ($url_exists) : ?>
						<?php _e("Currently selected page",'acf-bbutton'); ?>:
					<?php endif; ?>

                    <input type="hidden" name="<?php echo $field['name']; ?>[url]" id="<?php echo $field['id']; ?>_url" value="<?php echo $field['value']['url']; ?>">
                    <input type="hidden" name="<?php echo $field['name']; ?>[title]" id="<?php echo $field['id']; ?>_title" value="<?php echo $field['value']['title']; ?>">
                    <input type="hidden" name="<?php echo $field['name']; ?>[target]" id="<?php echo $field['id']; ?>_target" value="<?php echo ( isset($field['value']['target']) ) ? $field['value']['target'] : ''; ?>">

                    <div id="<?php echo esc_attr($field['id']); ?>_url-exists"<?php if (!$url_exists) { echo ' style="display:none;"'; } ?>>
						<?php _e('URL', 'acf-bbutton') ?>: <em id="<?php echo $field['id']; ?>_url-label"><a href="<?php echo $field['value']['url']; ?>" target="_blank"><?php echo $field['value']['url']; ?></a></em><br>
						<?php _e('Title', 'acf-bbutton') ?>: <em id="<?php echo $field['id']; ?>_title-label"><?php echo $field['value']['title']; ?></em><br>
						<?php _e('Open in new window', 'acf-bbutton') ?>: <em id="<?php echo $field['id']; ?>_target-label"><?php if (isset($field['value']['target']) && $field['value']['target'] == '_blank') { _e('Yes', 'acf-bbutton'); } else { _e('No', 'acf-bbutton'); } ?></em>
                    </div>
                </div>
                <div id="<?php echo $field['id']; ?>_none"<?php if ($url_exists) { echo ' style="display:none;"'; } ?>>
                    <em><?php _e('No link selected yet', 'acf-bbutton') ?></em>
                </div>
                <p>
                    <a href="" class="url-btn acf-button grey" id="<?php echo $field['id']; ?>"><?php if (!$url_exists) { _e('Insert Link', 'acf-bbutton'); }else{ _e('Edit Link', 'acf-bbutton'); } ?></a>
                    <a href="" class="url-remove-btn acf-button grey" id="<?php echo $field['id']; ?>_remove"<?php if (!$url_exists) { echo ' style="display:none;"'; } ?>><?php _e('Remove Link', 'acf-bbutton'); ?></a>
                </p>
            </div>

			<?php if ( in_array('option', $field['allow_advanced'] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-option">
                    <div class="acf-label">
                        <label for="<?php echo esc_attr($field['id']) ?>_option"><?php _e("Option",'acf-bbutton'); ?></label>
                    </div>
                    <div class="acf-input">
                        <select
                                name="<?php echo esc_attr($field['name']) ?>[option]"
                                id="<?php echo esc_attr($field['id']) ?>_option"
                        >
                            <option value="default" <?php if ( $field['value']['option'] == 'default' ) echo 'selected'; ?>><?php _e("Default",'acf-bbutton'); ?></option>
                            <option value="primary" <?php if ( $field['value']['option'] == 'primary' ) echo 'selected'; ?>><?php _e("Primary",'acf-bbutton'); ?></option>
                            <option value="success" <?php if ( $field['value']['option'] == 'success' ) echo 'selected'; ?>><?php _e("Success",'acf-bbutton'); ?></option>
                            <option value="info" <?php if ( $field['value']['option'] == 'info' ) echo 'selected'; ?>><?php _e("Info",'acf-bbutton'); ?></option>
                            <option value="warning" <?php if ( $field['value']['option'] == 'warning' ) echo 'selected'; ?>><?php _e("Warning",'acf-bbutton'); ?></option>
                            <option value="danger" <?php if ( $field['value']['option'] == 'danger' ) echo 'selected'; ?>><?php _e("Danger",'acf-bbutton'); ?></option>
                            <option value="link" <?php if ( $field['value']['option'] == 'link' ) echo 'selected'; ?>><?php _e("Link",'acf-bbutton'); ?></option>
                        </select>
                    </div>
                </div>

			<?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[option]" value="<?php echo esc_attr($field['value']['option']); ?>" />

			<?php } if ( in_array('size', $field['allow_advanced'] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-size">
                    <div class="acf-label">
                        <label for="<?php echo esc_attr($field['id']) ?>_size"><?php _e("Size",'acf-bbutton'); ?></label>
                    </div>
                    <div class="acf-input">
                        <select
                                name="<?php echo esc_attr($field['name']) ?>[size]"
                                id="<?php echo esc_attr($field['id']) ?>_size"
                        >
                            <option value="" <?php if ( $field['value']['size'] == '' ) echo 'selected'; ?>><?php _e("Default",'acf-bbutton'); ?></option>
                            <option value="lg" <?php if ( $field['value']['size'] == 'lg' ) echo 'selected'; ?>><?php _e("Large",'acf-bbutton'); ?></option>
                            <option value="sm" <?php if ( $field['value']['size'] == 'sm' ) echo 'selected'; ?>><?php _e("Small",'acf-bbutton'); ?></option>
                            <option value="xs" <?php if ( $field['value']['size'] == 'xs' ) echo 'selected'; ?>><?php _e("Extra Small",'acf-bbutton'); ?></option>
                        </select>
                    </div>
                </div>

			<?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[size]" value="<?php echo esc_attr($field['value']['size']); ?>" />

			<?php } if ( in_array('active', $field['allow_advanced'] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-active">
                    <div class="acf-label">
                        <label for="<?php echo esc_attr($field['id']) ?>_active"><?php _e('Active','acf-bbutton'); ?></label>
                    </div>
                    <div class="acf-input">
                        <label>
                            <input  type="radio"
                                    name="<?php echo esc_attr($field['name']) ?>[active]"
                                    id="<?php echo esc_attr($field['id']) ?>_active_yes"
                                    value="1"
                                <?php if ( $field['value']['active'] == 1 ) echo 'checked'; ?>
                            />
                            Yes
                        </label>
                        <label>
                            <input  type="radio"
                                    name="<?php echo esc_attr($field['name']) ?>[active]"
                                    id="<?php echo esc_attr($field['id']) ?>_active_no"
                                    value="0"
			                    <?php if ( $field['value']['active'] == 0 ) echo 'checked'; ?>
                            />
                            No
                        </label>
                    </div>
                </div>

			<?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[active]" value="<?php echo esc_attr($field['value']['active']); ?>" />

			<?php } if ( in_array('disabled', $field['allow_advanced'] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-disabled">
                    <div class="acf-label">
                        <label for="<?php echo esc_attr($field['id']) ?>_disabled"><?php _e('Disabled','acf-bbutton'); ?></label>
                    </div>
                    <div class="acf-input">
                        <label>
                            <input  type="radio"
                                    name="<?php echo esc_attr($field['name']) ?>[disabled]"
                                    id="<?php echo esc_attr($field['id']) ?>_disabled_yes"
                                    value="1"
								<?php if ( $field['value']['disabled'] == 1 ) echo 'checked'; ?>
                            />
                            Yes
                        </label>
                        <label>
                            <input  type="radio"
                                    name="<?php echo esc_attr($field['name']) ?>[disabled]"
                                    id="<?php echo esc_attr($field['id']) ?>_disabled_no"
                                    value="0"
								<?php if ( $field['value']['disabled'] == 0 ) echo 'checked'; ?>
                            />
                            No
                        </label>
                    </div>
                </div>

			<?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[disabled]" value="<?php echo esc_attr($field['value']['disabled']); ?>" />

			<?php } if ( in_array('class', $field['allow_advanced'] ) ) { ?>

                <div class="acf-bbutton-subfield acf-bbutton-class">
                    <div class="acf-label">
                        <label for="<?php echo esc_attr($field['id']) ?>_class"><?php _e("Custom Class(es)",'acf-bbutton'); ?></label>
                    </div>
                    <div class="acf-input">
                        <input  type="text"
                                name="<?php echo esc_attr($field['name']) ?>[class]"
                                id="<?php echo esc_attr($field['id']) ?>_class"
                                value="<?php echo esc_attr($field['value']['class']) ?>"
                        />
                    </div>
                </div>

			<?php } else { ?>
                <input type="hidden" name="<?php echo esc_attr($field['name']) ?>[class]" value="<?php echo esc_attr($field['value']['class']); ?>" />
			<?php } ?>
        </div>
		<?php
	}
	
	
	/*
	*  input_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
	*  Use this action to add CSS + JavaScript to assist your create_field() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function input_admin_enqueue_scripts()
	{
		// Note: This function can be removed if not used

		// register & include JS
		wp_register_script( 'acf-input-bbutton', $this->settings['url'] . 'assets/js/input.js', array('acf-input'), $this->settings['version'] );

		$translations = array(
			'insert_link' => __('Insert Link', 'acf-bbutton'),
			'edit_link' => __('Edit Link', 'acf-bbutton'),
			'yes' => __('Yes', 'acf-bbutton'),
			'no' => __('No', 'acf-bbutton')
		);

		wp_localize_script('acf-input-bbutton', 'translations', $translations);
		wp_enqueue_script('acf-input-bbutton');


		// register & include CSS
		wp_register_style( 'acf-input-bbutton', $this->settings['url'] . 'assets/css/input.css', array('acf-input') );
		wp_enqueue_style('acf-input-bbutton');
		
	}
	
	
	/*
	*  input_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is created.
	*  Use this action to add CSS and JavaScript to assist your create_field() action.
	*
	*  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function input_admin_head()
	{
		// Note: This function can be removed if not used
	}
	
	
	/*
	*  field_group_admin_enqueue_scripts()
	*
	*  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
	*  Use this action to add CSS + JavaScript to assist your create_field_options() action.
	*
	*  $info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function field_group_admin_enqueue_scripts()
	{
		// Note: This function can be removed if not used
	}

	
	/*
	*  field_group_admin_head()
	*
	*  This action is called in the admin_head action on the edit screen where your field is edited.
	*  Use this action to add CSS and JavaScript to assist your create_field_options() action.
	*
	*  @info	http://codex.wordpress.org/Plugin_API/Action_Reference/admin_head
	*  @type	action
	*  @since	3.6
	*  @date	23/01/13
	*/

	function field_group_admin_head()
	{
		// Note: This function can be removed if not used
	}


	/*
	*  load_value()
	*
		*  This filter is applied to the $value after it is loaded from the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value found in the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$value - the value to be saved in the database
	*/
	
	function load_value( $value, $post_id, $field )
	{
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  update_value()
	*
	*  This filter is applied to the $value before it is updated in the db
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value - the value which will be saved in the database
	*  @param	$post_id - the $post_id of which the value will be saved
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$value - the modified value
	*/
	
	function update_value( $value, $post_id, $field )
	{
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  format_value()
	*
	*  This filter is applied to the $value after it is loaded from the db and before it is passed to the create_field action
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value( $value, $post_id, $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the $value?
		
		
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  format_value_for_api()
	*
	*  This filter is applied to the $value after it is loaded from the db and before it is passed back to the API functions such as the_field
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$value	- the value which was loaded from the database
	*  @param	$post_id - the $post_id from which the value was loaded
	*  @param	$field	- the field array holding all the field options
	*
	*  @return	$value	- the modified value
	*/
	
	function format_value_for_api( $value, $post_id, $field )
	{
		// defaults?
		/*
		$field = array_merge($this->defaults, $field);
		*/
		
		// perhaps use $field['preview_size'] to alter the $value?
		
		
		// Note: This function can be removed if not used
		return $value;
	}
	
	
	/*
	*  load_field()
	*
	*  This filter is applied to the $field after it is loaded from the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*
	*  @return	$field - the field array holding all the field options
	*/
	
	function load_field( $field )
	{
		// Note: This function can be removed if not used
		return $field;
	}
	
	
	/*
	*  update_field()
	*
	*  This filter is applied to the $field before it is saved to the database
	*
	*  @type	filter
	*  @since	3.6
	*  @date	23/01/13
	*
	*  @param	$field - the field array holding all the field options
	*  @param	$post_id - the field group ID (post_type = acf)
	*
	*  @return	$field - the modified field
	*/

	function update_field( $field, $post_id )
	{
		// Note: This function can be removed if not used
		return $field;
	}

}


// initialize
new acf_field_bbutton( $this->settings );


// class_exists check
endif;

?>