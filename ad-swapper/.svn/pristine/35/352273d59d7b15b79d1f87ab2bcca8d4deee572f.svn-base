<?php

// *****************************************************************************
// DATASET-MANAGER / ADD-EDIT-RECORD_CREATE-ZEBRA-FORM_ADD-FIELD-OBJ.PHP
// (C) 2013 Peter Newman. All Rights Reserved.
// *****************************************************************************

    namespace greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager ;

// =============================================================================
// add_field_to_zebra_form_object_instance()
// =============================================================================

function add_field_to_zebra_form_object_instance(
    $home_page_title                        ,
    $caller_apps_includes_dir               ,
    $all_application_dataset_definitions    ,
    $dataset_slug                           ,
    $selected_datasets_dmdd                 ,
    $dataset_title                          ,
    $dataset_records                        ,
    $record_indices_by_key                  ,
    $question_adding                        ,
    $the_record                             ,
    $the_records_index                      ,
    $array_storage_field_slugs              ,
    &$zebra_form                            ,
    $field_title                            ,
    $zebra_form_field_number                ,
    $zebra_form_field_details               ,
    $zebra_form_field_label_args            ,
    $zebra_form_field_note_args             ,
    $zebra_form_add_field_args
    ) {

    // -------------------------------------------------------------------------
    // \greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\
    // add_field_to_zebra_form_object_instance(
    //      $home_page_title                        ,
    //      $caller_apps_includes_dir               ,
    //      $all_application_dataset_definitions    ,
    //      $dataset_slug                           ,
    //      $selected_datasets_dmdd                 ,
    //      $dataset_title                          ,
    //      $dataset_records                        ,
    //      $record_indices_by_key                  ,
    //      $question_adding                        ,
    //      $the_record                             ,
    //      $the_records_index                      ,
    //      $array_storage_field_slugs              ,
    //      &$zebra_form                            ,
    //      $field_title                            ,
    //      $zebra_form_field_number                ,
    //      $zebra_form_field_details               ,
    //      $zebra_form_field_label_args            ,
    //      $zebra_form_field_note_args             ,
    //      $zebra_form_add_field_args
    //      )
    // - - - - - - - - - - - - - - - - - - - -
    // Adds the specified field to the $zebra_form object.
    //
    // NOTE!
    // =====
    // This field value - and pretty much all the other data needed to
    // create the Zebra Form field - has already been obtained on entry to
    // this routine.
    //
    // So this routine is mainly an interface to the Zebra Form field adding
    // routines.
    //
    // RETURNS:-
    //      o   On SUCCESS
    //              TRUE
    //
    //      o   On FAILURE
    //              $error_message STRING
    // -------------------------------------------------------------------------

    // =========================================================================
    // Init...
    // =========================================================================

    $ns = __NAMESPACE__ ;
    $fn = __FUNCTION__  ;

    // -------------------------------------------------------------------------

    if (    array_key_exists( 'storage_method' , $selected_datasets_dmdd )
            &&
            $selected_datasets_dmdd['storage_method'] === 'mysql'
        ) {
        $storage_method = 'mysql' ;

    } else {
        $storage_method = 'array-storage' ;

    }

    // =====================================================================
    // ADD the FIELD proper (overridding any of the default Zebra Form
    // field properties, as required)...
    // =====================================================================

    if ( $zebra_form_field_details['zebra_control_type'] === 'text' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // TEXT...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // ---------------------------------------------------------------------
        // void __construct ( string $id , [ string $default = ''] , [ array $attributes = ''] )
        //  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -  -
        // Adds an <input type="text"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be the same as the id
        //          attribute!
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is
        //          submitted.
        //
        //          This is also the name of the variable to be used in custom
        //          template files, in order to display the control.  Ie; in a
        //          template file, in order to print the generated HTML for a
        //          control named "my_text", one would use:
        //
        //              echo $my_text;
        //
        //      string  $default
        //          (Optional) Default value of the text box.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for input controls
        //          (size, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //          There's a special data-prefix attribute that you can use to
        //          add uneditable prefixes to input fields (text, images, or
        //          plain HTML), as seen in the image below. It works by
        //          injecting an absolutely positioned element into the DOM,
        //          right after the parent element, and then positioning it on
        //          the left side of the parent element and adjusting the width
        //          and the left padding of the parent element, so it looks like
        //          the prefix is part of the parent element.
        //
        //          If the prefix is plain text or HTML code, it will be
        //          contained in a <div> tag having the class
        //          Zebra_Form_Input_Prefix; if the prefix is a path to an
        //          image, it will be an <img> tag having the class
        //          Zebra_Form_Input_Prefix.
        //
        //          For anything other than plain text, you must use CSS to set
        //          the width and height of the prefix, or it will not be
        //          correctly positioned because when the image is not cached by
        //          the browser the code taking care of centering the image will
        //          be executed before the image is loaded by the browser and it
        //          will not know the image's width and height!
        //
        //          // add simple text
        //          // style the text through the Zebra_Form_Input_Prefix class
        //          $form->add('text', 'my_text', '', array('data-prefix' => 'http://'));
        //          $form->add('text', 'my_text', '', array('data-prefix' => '(+1 917)'));
        //
        //          // add images
        //          // set the image's width and height through the img.Zebra_Form_Input_Prefix class
        //          // in your CSS or the image will not be correctly positioned!
        //          $form->add('text', 'my_text', '', array('data-prefix' => 'img:path/to/image'));
        //
        //          // add html - useful when using sprites
        //          // again, make sure that you set somewhere the width and height of the prefix!
        //          $form->add('text', 'my_text', '', array('data-prefix' => '<div class="sprite image1"></div>'));
        //          $form->add('text', 'my_text', '', array('data-prefix' => '<div class="sprite image2"></div>'));
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the
        //          control is created and should not be altered manually:
        //
        //              type, id, name, value, class
        // ---------------------------------------------------------------------

        // -----------------------------------------------------------------
        // ADD the FIELD...
        // -----------------------------------------------------------------

        $zebra_form->add(   'label'                                         ,
                            $zebra_form_field_label_args['id']              ,
                            $zebra_form_field_label_args['attach_to']       ,
                            $zebra_form_field_label_args['caption']         ,
                            $zebra_form_field_label_args['attributes']
                            ) ;

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_note_args ) ) {

            $zebra_form->add(   'note'                                          ,
                                $zebra_form_field_note_args['id']               ,
                                $zebra_form_field_note_args['attach_to']        ,
                                $zebra_form_field_note_args['caption']          ,
                                $zebra_form_field_note_args['attributes']
                                ) ;

        }

        // -----------------------------------------------------------------

        $field_obj = $zebra_form->add(  'text'                                      ,
                                        $zebra_form_add_field_args['id']            ,
                                        $zebra_form_add_field_args['default']       ,
                                        $zebra_form_add_field_args['attributes']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'password' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // PASSWORD...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // -------------------------------------------------------------------------
        // void __construct ( string $id , [ string $default = ''] , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <input type="password"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be the same as the id attribute!
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is submitted.
        //
        //          This is also the name of the variable to be used in custom
        //          template files, in order to display the control.
        //
        //          // in a template file, in order to print the generated HTML
        //          // for a control named "my_password", one would use:
        //              echo $my_password;
        //
        //      string  $default    (Optional) Default value of the password field.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for input controls
        //          (size, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //              // setting the "disabled" attribute
        //              $obj = $form->add(
        //                  'password',
        //                  'my_password',
        //                  '',
        //                  array(
        //                      'disabled' => 'disabled'
        //                  )
        //              );
        //
        //          There's a special data-prefix attribute that you can use to add
        //          uneditable prefixes to input fields (text, images, or plain
        //          HTML), as seen in the image below. It works by injecting an
        //          absolutely positioned element into the DOM, right after the
        //          parent element, and then positioning it on the left side of the
        //          parent element and adjusting the width and the left padding of
        //          the parent element, so it looks like the prefix is part of the
        //          parent element.
        //
        //          If the prefix is plain text or HTML code, it will be contained
        //          in a <div> tag having the class Zebra_Form_Input_Prefix; if the
        //          prefix is a path to an image, it will be an <img> tag having the
        //          class Zebra_Form_Input_Prefix.
        //
        //          For anything other than plain text, you must use CSS to set the
        //          width and height of the prefix, or it will not be correctly
        //          positioned because when the image is not cached by the browser
        //          the code taking care of centering the image will be executed
        //          before the image is loaded by the browser and it will not know
        //          the image's width and height!
        //
        //              // add simple text
        //              // style the text through the Zebra_Form_Input_Prefix class
        //              $form->add('password', 'my_password', '', array('data-prefix' => 'Hash:'));
        //
        //              // add images
        //              // set the image's width and height through the img.Zebra_Form_Input_Prefix class
        //              // in your CSS or the image will not be correctly positioned!
        //              $form->add('password', 'my_password', '', array('data-prefix' => 'img:path/to/image'));
        //
        //              // add html - useful when using sprites
        //              // again, make sure that you set somewhere the width and height of the prefix!
        //              $form->add('password', 'my_password', '', array('data-prefix' => '<div class="sprite image1"></div>'));
        //              $form->add('password', 'my_password', '', array('data-prefix' => '<div class="sprite image2"></div>'));
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //
        //              type, id, name, value, class
        // -------------------------------------------------------------------------

        // -----------------------------------------------------------------
        // ADD the FIELD...
        // -----------------------------------------------------------------

        $zebra_form->add(   'label'                                         ,
                            $zebra_form_field_label_args['id']              ,
                            $zebra_form_field_label_args['attach_to']       ,
                            $zebra_form_field_label_args['caption']         ,
                            $zebra_form_field_label_args['attributes']
                            ) ;

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_note_args ) ) {

            $zebra_form->add(   'note'                                          ,
                                $zebra_form_field_note_args['id']               ,
                                $zebra_form_field_note_args['attach_to']        ,
                                $zebra_form_field_note_args['caption']          ,
                                $zebra_form_field_note_args['attributes']
                                ) ;

        }

        // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_add_field_args ) ;

        $field_obj = $zebra_form->add(  'password'                                  ,
                                        $zebra_form_add_field_args['id']            ,
                                        $zebra_form_add_field_args['default']       ,
                                        $zebra_form_add_field_args['attributes']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'textarea' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // TEXTAREA...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // ---------------------------------------------------------------------
        // void __construct ( string $id , [ string $default = ''] , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <textarea> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be the same as the id
        //          attribute!
        //
        //          This is the name to be used when referring to the
        //          control's value in the POST/GET superglobals, after the
        //          form is submitted.
        //
        //          This is also the name of the variable to be used in
        //          custom template files, in order to display the control.
        //          Ie; in a template file, in order to print the generated
        //          HTML for a control named "my_textarea", one would use:
        //
        //              echo $my_textarea;
        //
        //      string  $default
        //          (Optional) Default value of the textarea.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for textarea
        //          controls (rows, cols, style, etc)
        //
        //          Must be specified as an associative array, in the form
        //          of attribute => value.
        //
        //          See set_attributes() on how to set attributes, other
        //          than through the constructor.
        //
        //          The following attributes are automatically set when the
        //          control is created and should not be altered manually:
        //
        //              id, name, class
        // ---------------------------------------------------------------------

        $zebra_form->add(   'label'                                         ,
                            $zebra_form_field_label_args['id']              ,
                            $zebra_form_field_label_args['attach_to']       ,
                            $zebra_form_field_label_args['caption']         ,
                            $zebra_form_field_label_args['attributes']
                            ) ;

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_note_args ) ) {

            $zebra_form->add(   'note'                                          ,
                                $zebra_form_field_note_args['id']               ,
                                $zebra_form_field_note_args['attach_to']        ,
                                $zebra_form_field_note_args['caption']          ,
                                $zebra_form_field_note_args['attributes']
                                ) ;

        }

        // -----------------------------------------------------------------

        $field_obj = $zebra_form->add(  'textarea'                                  ,
                                        $zebra_form_add_field_args['id']            ,
                                        $zebra_form_add_field_args['default']       ,
                                        $zebra_form_add_field_args['attributes']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'checkbox' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // CHECKBOX...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // -----------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $zebra_form_field_details = array(
        //          [form_field_name]       => enabled
        //          [zebra_control_type]    => checkbox
        //          [label]                 => Enabled ?
        //          [help_text]             => You can disable the use of this Gadget, if you want to.
        //          [attributes]            => Array()
        //          [rules]                 => Array()
        //          [type_specific_args]    => Array(
        //                                          [defaults_checked]  =>  TRUE    //  Defaults to FALSE
        //                                          [value]             =>  'on'    //  Defaults to "1"
        //                                          )
        //          [value_from]            => Array(
        //              [add] => Array(
        //                          [method] => literal
        //                          [args]   =>
        //                          )
        //              [edit] => Array(
        //                          [method] => array-storage-field-slug
        //                          [args]   => enabled
        //                          )
        //              )
        //          [constraints]           => Array()
        //          )
        //
        //      $zebra_form_add_field_args = Array(
        //          [id]         => enabled
        //          [default]    =>
        //          [attributes] => Array(
        //              [onfocus] => greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onfocus(this)
        //              [onblur]  => greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager_addEditRecord_zebraForm_onblur(this)
        //              )
        //          )
        //
        // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;
//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_add_field_args ) ;

        // -------------------------------------------------------------------------
        // void __construct ( string $id , mixed $value , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <input type="checkbox"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        //      // single checkbox
        //      $obj = $form->add('checkbox', 'my_checkbox', 'my_checkbox_value');
        //
        //      // multiple checkboxes
        //      // notice that is "checkboxes" instead of "checkbox"
        //      // checkboxes values will be "0", "1" and "2", respectively, and will be available in a custom template like
        //      // "mycheckbox_0", "mycheckbox_1" and "mycheckbox_2".
        //      // label controls will be automatically created having the names "label_mycheckbox_0", "label_mycheckbox_1" and
        //      // "label_mycheckbox_2" (label + underscore + control name + underscore + value with anything else other than
        //      // letters and numbers replaced with an underscore)
        //      // $obj is a reference to the first checkbox
        //      $obj = $form->add('checkboxes', 'mycheckbox',
        //          array(
        //              'Value 1',
        //              'Value 2',
        //              'Value 3'
        //          )
        //      );
        //
        //      // multiple checkboxes with specific indexes
        //      // checkboxes values will be "v1", "v2" and "v3", respectively, and will be available in a custom template like
        //      // "mycheckbox_v1", "mycheckbox_v2" and "mycheckbox_v3".
        //      // label controls will be automatically created having the names "label_mycheckbox_v1", "label_mycheckbox_v2" and
        //      // "label_mycheckbox_v3" (label + underscore + control name + underscore + value with anything else other than
        //      // letters and numbers replaced with an underscore)
        //      $obj = $form->add('checkboxes', 'mycheckbox',
        //          array(
        //              'v1' => 'Value 1',
        //              'v2' => 'Value 2',
        //              'v3' => 'Value 3'
        //          )
        //      );
        //
        //      // multiple checkboxes with preselected value
        //      // "Value 2" will be the preselected value
        //      // note that for preselecting values you must use the actual indexes of the values, if available, (like
        //      // in the current example) or the default, zero-based index, otherwise (like in the next example)
        //      $obj = $form->add('checkboxes', 'mycheckbox',
        //          array(
        //              'v1'    =>  'Value 1',
        //              'v2'    =>  'Value 2',
        //              'v3'    =>  'Value 3'
        //          ),
        //          'v2'    // note the index!
        //      );
        //
        //      // "Value 2" will be the preselected value.
        //      // note that for preselecting values you must use the actual indexes of the values, if available, (like
        //      // in the example above) or the default, zero-based index, otherwise (like in the current example)
        //      $obj = $form->add('checkboxes', 'mycheckbox',
        //          array(
        //              'Value 1',
        //              'Value 2',
        //              'Value 3'
        //          ),
        //          1    // note the index!
        //      );
        //
        //      // multiple checkboxes with multiple preselected values
        //      $obj = $form->add('checkboxes', 'mycheckbox[]',
        //          array(
        //              'v1'    =>  'Value 1',
        //              'v2'    =>  'Value 2',
        //              'v3'    =>  'Value 3'
        //          ),
        //          array('v1', 'v2')
        //      );
        //
        //      // custom classes (or other attributes) can also be added to all of the elements by specifying a 4th argument;
        //      // this needs to be specified in the same way as you would by calling <a href="../Generic/Zebra_Form_Control.html#methodset_attributes">set_attributes()</a> method:
        //      $obj = $form->add('checkboxes', 'mycheckbox[]',
        //          array(
        //              '1' =>  'Value 1',
        //              '2' =>  'Value 2',
        //              '3' =>  'Value 3',
        //          ),
        //          '', // no default value
        //          array('class' => 'my_custom_class')
        //      );
        //
        // By default, for checkboxes, radio buttons and select boxes, the library
        // will prevent the submission of other values than those declared when
        // creating the form, by triggering the error: "SPAM attempt detected!".
        // Therefore, if you plan on adding/removing values dynamically, from
        // JavaScript, you will have to call the disable_spam_filter() method to
        // prevent that from happening!
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          $id needs to be suffixed with square brackets if there are more
        //          checkboxes sharing the same name, so that PHP treats them as an
        //          array!
        //
        //          The control's name attribute will be as indicated by $id
        //          argument while the control's id attribute will be $id, stripped
        //          of square brackets (if any), followed by an underscore and
        //          followed by $value with all the spaces replaced by underscores.
        //
        //          So, if the $id arguments is "my_checkbox" and the $value
        //          argument is "value 1", the control's id attribute will be
        //          my_checkbox_value_1.
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is submitted.
        //
        //          This is also the name of the variable to be used in custom
        //          template files, in order to display the control.
        //
        //              // in a template file, in order to print the generated HTML
        //              // for a control named "my_checkbox" and having the value of
        //              // "value 1", one would use:
        //              echo $my_checkbox_value_1;
        //
        //          Note that when adding the required rule to a group of checkboxes
        //          (checkboxes sharing the same name), it is sufficient to add the
        //          rule to the first checkbox!
        //
        //      mixed   $value  Value of the checkbox.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for input controls
        //          (disabled, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //              // setting the "checked" attribute
        //              $obj = $form->add(
        //                          'checkbox',
        //                          'my_checkbox',
        //                          'v1',
        //                          array(
        //                              'checked' => 'checked'
        //                          )
        //                      ) ;
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //
        //              type, id, name, value, class
        //
        // -------------------------------------------------------------------------

        $zebra_form->add(   'label'                                         ,
                            $zebra_form_field_label_args['id']              ,
                            $zebra_form_field_label_args['attach_to']       ,
                            $zebra_form_field_label_args['caption']         ,
                            $zebra_form_field_label_args['attributes']
                            ) ;

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_note_args ) ) {

            $zebra_form->add(   'note'                                          ,
                                $zebra_form_field_note_args['id']               ,
                                $zebra_form_field_note_args['attach_to']        ,
                                $zebra_form_field_note_args['caption']          ,
                                $zebra_form_field_note_args['attributes']
                                ) ;

        }

        // -----------------------------------------------------------------
        // NOTE!
        // -----
        // 1.   CHECKBOX VALUES:-
        //      o   Are stored in the ARRAY STORAGE RECORD as:-
        //              TRUE or FALSE
        //      o   Have the value "1" in the submitted form - but only if
        //          the checkbox IS checked.  If the checkbox ISN'T checked,
        //          then the checkbox ISN'T returned in the submitted form.
        //
        // 2.   The field value currently stored in:-
        //          $zebra_form_add_field_args['default']
        //
        //      is the TRUE/FALSE value from the ARRAY STORAGE RECORD.
        // -----------------------------------------------------------------

//pr( $zebra_form_add_field_args ) ;

        if ( ! $question_adding ) {

            if ( $storage_method === 'mysql' ) {

                if ( ! in_array( $zebra_form_add_field_args['default'] , array( 0 , 1 ) , FALSE ) ) {

                    return <<<EOT
PROBLEM: Bad "{$field_title}" field (in array storage record) (0 or 1 expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

            } else {

                if ( ! is_bool( $zebra_form_add_field_args['default'] ) ) {

                    return <<<EOT
PROBLEM: Bad "{$field_title}" field (in array storage record) (TRUE or FALSE expected)
For dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

            }

        }

        // -----------------------------------------------------------------

        $question_checkbox_checked = FALSE ;    //  Default
        $checkbox_value            = '1'   ;    //  Default

        // -----------------------------------------------------------------

        if ( $question_adding ) {

            // -------------------------------------------------------------
            // Adding...
            // -------------------------------------------------------------

            if ( array_key_exists( 'type_specific_args' , $zebra_form_field_details ) ) {

                // ---------------------------------------------------------

                if ( ! is_array( $zebra_form_field_details['type_specific_args'] ) ) {

                    return <<<EOT
PROBLEM: Bad Zebra Form field "type_specific_args" (array expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                }

                // ---------------------------------------------------------
                // defaults_checked ?
                // ---------------------------------------------------------

                if ( array_key_exists( 'defaults_checked' , $zebra_form_field_details['type_specific_args'] ) ) {

                    // -----------------------------------------------------

                    if ( ! is_bool( $zebra_form_field_details['type_specific_args']['defaults_checked'] ) ) {

                        return <<<EOT
PROBLEM: Bad Zebra Form field "type_specific_args" + "defaults_checked" (TRUE or FALSE expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // -----------------------------------------------------

                    if ( $zebra_form_field_details['type_specific_args']['defaults_checked'] === TRUE ) {
                        $question_checkbox_checked = TRUE ;
                    }

                    // -----------------------------------------------------

                }

                // ---------------------------------------------------------
                // value ?
                // ---------------------------------------------------------

                if ( array_key_exists( 'value' , $zebra_form_field_details['type_specific_args'] ) ) {

                    // -----------------------------------------------------

                    if ( ! is_string( $zebra_form_field_details['type_specific_args']['value'] ) ) {

                        return <<<EOT
PROBLEM: Bad Zebra Form field "type_specific_args" + "value" (string expected)
For dataset:&nbsp; "{$dataset_title}"
and Zebra Form field:&nbsp; {$field_title}
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

                    }

                    // -----------------------------------------------------

                    $checkbox_value = $zebra_form_field_details['type_specific_args']['value'] ;

                    // -----------------------------------------------------

                }

                // ---------------------------------------------------------

            }

            // -------------------------------------------------------------

        } else {

            // -------------------------------------------------------------
            // Editing...
            // -------------------------------------------------------------

            if ( $storage_method === 'mysql' ) {

                if ( $zebra_form_add_field_args['default'] == 1 ) {
                    $question_checkbox_checked = TRUE;
                }

            } else {

                if ( $zebra_form_add_field_args['default'] === TRUE ) {
                    $question_checkbox_checked = TRUE;
                }

            }

            // -------------------------------------------------------------

        }

        // -----------------------------------------------------------------

        if ( $question_checkbox_checked === TRUE ) {
            $zebra_form_add_field_args['attributes']['checked'] = 'checked' ;
        }

        // -----------------------------------------------------------------

        $field_obj = $zebra_form->add(  'checkbox'                                  ,
                                        $zebra_form_add_field_args['id']            ,
                                        $checkbox_value                             ,
                                        $zebra_form_add_field_args['attributes']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'radios' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // RADIOS...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // -------------------------------------------------------------------------
        // void __construct ( string $id , mixed $value , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <input type="radio"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        //      // single radio button
        //      $obj = $form->add('radio', 'myradio', 'my_radio_value');
        //
        //      // multiple radio buttons
        //      // notice that is "radios" instead of "radio"
        //      // radio buttons' values will be "0", "1" and "2", respectively, and will be available in a custom template like
        //      // "myradio_0", "myradio_1" and "myradio_2".
        //      // label controls will be automatically created having the names "label_myradio_0", "label_myradio_1" and
        //      // "label_myradio_2" (label + underscore + control name + underscore + value with anything else other than
        //      // letters and numbers replaced with an underscore)
        //      // $obj is a reference to the first radio button
        //      $obj = $form->add('radios', 'myradio',
        //          array(
        //              'Value 1',
        //              'Value 2',
        //              'Value 3'
        //          )
        //      );
        //
        //      // multiple radio buttons with specific indexes
        //      // radio buttons' values will be "v1", "v2" and "v3", respectively, and will be available in a custom template
        //      // like "myradio_v1", "myradio_v2" and "myradio_v3".
        //      // label controls will be automatically created having the names "label_myradio_v1", "label_myradio_v2" and
        //      // "label_myradio_v3" (label + underscore + control name + underscore + value with anything else other than
        //      // letters and numbers replaced with an underscore)
        //      $obj = $form->add('radios', 'myradio',
        //          array(
        //              'v1' => 'Value 1',
        //              'v2' => 'Value 2',
        //              'v3' => 'Value 3'
        //          )
        //      );
        //
        //      // multiple radio buttons with preselected value
        //      // "Value 2" will be the preselected value
        //      // note that for preselecting values you must use the actual indexes of the values, if available, (like
        //      // in the current example) or the default, zero-based index, otherwise (like in the next example)
        //      $obj = $form->add('radios', 'myradio',
        //          array(
        //              'v1'    =>  'Value 1',
        //              'v2'    =>  'Value 2',
        //              'v3'    =>  'Value 3'
        //          ),
        //          'v2'    // note the index!
        //      );
        //
        //      // "Value 2" will be the preselected value.
        //      // note that for preselecting values you must use the actual indexes of the values, if available, (like
        //      // in the example above) or the default, zero-based index, otherwise (like in the current example)
        //      $obj = $form->add('radios', 'myradio',
        //          array(
        //              'Value 1',
        //              'Value 2',
        //              'Value 3'
        //          ),
        //          1    // note the index!
        //      );
        //
        //      // custom classes (or other attributes) can also be added to all of the elements by specifying a 4th argument;
        //      // this needs to be specified in the same way as you would by calling <a href="../Generic/Zebra_Form_Control.html#methodset_attributes">set_attributes()</a> method:
        //      $obj = $form->add('radios', 'myradio',
        //          array(
        //              '1' =>  'Value 1',
        //              '2' =>  'Value 2',
        //              '3' =>  'Value 3',
        //          ),
        //          '', // no default value
        //          array('class' => 'my_custom_class')
        //      );
        //
        // By default, for checkboxes, radio buttons and select boxes, the library
        // will prevent the submission of other values than those declared when
        // creating the form, by triggering the error: "SPAM attempt detected!".
        // Therefore, if you plan on adding/removing values dynamically, from
        // JavaScript, you will have to call the disable_spam_filter() method to
        // prevent that from happening!
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be as indicated by $id
        //          argument while the control's id attribute will be $id followd by
        //          an underscore and followed by $value with all the spaces
        //          replaced by underscores.
        //
        //          So, if the $id arguments is "my_radio" and the $value argument
        //          is "value 1", the control's id attribute will be
        //          my_radio_value_1.
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is submitted.
        //
        //          This is also the name of the variable to be used in custom
        //          template files, in order to display the control.
        //
        //              // in a template file, in order to print the generated HTML
        //              // for a control named "my_radio" and having the value of
        //              // "value 1", one would use:
        //              echo $my_radio_value_1;
        //
        //          Note that when adding the required rule to a group of radio
        //          buttons (radio buttons sharing the same name), it is sufficient
        //          to add the rule to the first radio button!
        //
        //      mixed   $value
        //          Value of the radio button.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for input controls
        //          (disabled, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //              // setting the "checked" attribute
        //              $obj = $form->add(
        //                  'radio',
        //                  'my_radio',
        //                  'v1',
        //                  array(
        //                      'checked' => 'checked'
        //                  )
        //              );
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //
        //              type, id, name, value, class
        // -------------------------------------------------------------------------

        $zebra_form->add(   'label'                                         ,
                            $zebra_form_field_label_args['id']              ,
                            $zebra_form_field_label_args['attach_to']       ,
                            $zebra_form_field_label_args['caption']         ,
                            $zebra_form_field_label_args['attributes']
                            ) ;

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_note_args ) ) {

            $zebra_form->add(   'note'                                          ,
                                $zebra_form_field_note_args['id']               ,
                                $zebra_form_field_note_args['attach_to']        ,
                                $zebra_form_field_note_args['caption']          ,
                                $zebra_form_field_note_args['attributes']
                                ) ;

        }

        // -----------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $zebra_form_field_details['type_specific_args'] = Array(
        //          [radios] => Array(
        //                          [post] => Post
        //                          [page] => Page
        //                          )
        //                      )
        //
        // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_standardDatasetManager\pr( $zebra_form_field_details['type_specific_args'] ) ;

        // -----------------------------------------------------------------
        // We use the following "value" format:-
        //
        //      // multiple radio buttons with preselected value
        //      // "Value 2" will be the preselected value
        //      // note that for preselecting values you must use the actual indexes of the values, if available, (like
        //      // in the current example) or the default, zero-based index, otherwise (like in the next example)
        //      $obj = $form->add('radios', 'myradio',
        //          array(
        //              'v1'    =>  'Value 1',
        //              'v2'    =>  'Value 2',
        //              'v3'    =>  'Value 3'
        //          ),
        //          'v2'    // note the index!
        //      );
        //
        // -----------------------------------------------------------------

        $field_obj = $zebra_form->add(  'radios'                                                    ,
                                        $zebra_form_add_field_args['id']                            ,
                                        $zebra_form_field_details['type_specific_args']['radios']   ,
                                        $zebra_form_add_field_args['default']                       ,
                                        $zebra_form_add_field_args['attributes']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'submit' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // SUBMIT...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // -------------------------------------------------------------------------
        // void __construct ( string $id , string $caption , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <input type="submit"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be the same as the id attribute!
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is submitted.
        //
        //          This is also the name of the variable to be used in custom
        //          template files, in order to display the control.  Ie; in a
        //          template file, in order to print the generated HTML for a
        //          control named "my_submit", one would use:
        //
        //              echo $my_submit;
        //
        //      string  $caption
        //          Caption of the submit button control.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for input controls
        //          (size, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //
        //              type, id, name, value, class
        // -------------------------------------------------------------------------

        if ( isset( $zebra_form_field_details['type_specific_args']['caption'] ) ) {

            if ( $zebra_form_field_details['type_specific_args']['caption'] === NULL ) {

                $zebra_form_add_field_args['caption'] =
                    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                        $zebra_form_field_details['form_field_name']
                        ) ;

            } elseif (  ! is_string( $zebra_form_field_details['type_specific_args']['caption'] )
                        ||
                        trim( $zebra_form_field_details['type_specific_args']['caption'] ) === ''
                ) {

                return <<<EOT
PROBLEM: Bad "cape_specific_args" + "caption" - for field# {$zebra_form_field_number} (non-empty string or NULL expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            $zebra_form_add_field_args['caption'] =
                $zebra_form_field_details['type_specific_args']['caption']
                ;

        } else {

            $zebra_form_add_field_args['caption'] =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                    $zebra_form_field_details['form_field_name']
                    ) ;

        }

        // -----------------------------------------------------------------

        $zebra_form->add(   'submit'                                    ,
                            $zebra_form_add_field_args['id']            ,
                            $zebra_form_add_field_args['caption']       ,
                            $zebra_form_add_field_args['attributes']
                            ) ;
                            //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'button' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // BUTTON...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // -------------------------------------------------------------------------
        // void __construct ( string $id , string $caption , [ string $type = 'button'] , [ array $attributes = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <input type="button"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be the same as the id
        //          attribute!
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is submitted.
        //
        //          This is also the name of the variable to be used in custom
        //          template files, in order to display the control.  Ie; In a
        //          template file, in order to print the generated HTML for a
        //          control named "my_button", one would use:
        //
        //              echo $my_button;
        //
        //      string  $caption
        //          Caption of the button control.
        //
        //          Can be HTML.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for input controls
        //          (size, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //
        //              id, name, class
        //
        //      string  $type
        //          (Optional) Type of the button: button, submit or reset.
        //
        //          Default is "button".
        // -------------------------------------------------------------------------

        if (    array_key_exists(
                    'caption'                                           ,
                    $zebra_form_field_details['type_specific_args']
                    )
            ) {

            if ( $zebra_form_field_details['type_specific_args']['caption'] === NULL ) {

                $zebra_form_add_field_args['caption'] =
                    \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                        $zebra_form_field_details['form_field_name']
                        ) ;

            } elseif ( is_array( $zebra_form_field_details['type_specific_args']['caption'] ) ) {

                if (    $question_adding
                        &&
                        array_key_exists(
                            'add'                                                       ,
                            $zebra_form_field_details['type_specific_args']['caption']
                            )
                        &&
                        is_string( $zebra_form_field_details['type_specific_args']['caption']['add'] )
                        &&
                        trim( $zebra_form_field_details['type_specific_args']['caption']['add'] ) !== ''
                    ) {
                    $zebra_form_add_field_args['caption'] =
                        $zebra_form_field_details['type_specific_args']['caption']['add']
                        ;

                } else {

                    if (    array_key_exists(
                                'edit'                                                       ,
                                $zebra_form_field_details['type_specific_args']['caption']
                                )
                            &&
                            is_string( $zebra_form_field_details['type_specific_args']['caption']['edit'] )
                            &&
                            trim( $zebra_form_field_details['type_specific_args']['caption']['edit'] ) !== ''
                        ) {
                        $zebra_form_add_field_args['caption'] =
                            $zebra_form_field_details['type_specific_args']['caption']['edit']
                            ;

                    } else {

                        $zebra_form_add_field_args['caption'] =
                            \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                                $zebra_form_field_details['form_field_name']
                                ) ;

                    }

                }

            } elseif (  ! is_string( $zebra_form_field_details['type_specific_args']['caption'] )
                        ||
                        trim( $zebra_form_field_details['type_specific_args']['caption'] ) === ''
                ) {

                return <<<EOT
PROBLEM: Bad "type_specific_args" + "caption" - for field# {$zebra_form_field_number} (non-empty string, array("add"=>"xxx","edit"=>"yyy") or NULL expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            } else {

                $zebra_form_add_field_args['caption'] =
                    $zebra_form_field_details['type_specific_args']['caption']
                    ;

            }

        } else {

            $zebra_form_add_field_args['caption'] =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                    $zebra_form_field_details['form_field_name']
                    ) ;

        }

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_details['type_specific_args']['type'] ) ) {

            if ( $zebra_form_field_details['type_specific_args']['type'] === NULL ) {

                $zebra_form_add_field_args['type'] = 'button' ;

            } elseif (  ! is_string( $zebra_form_field_details['type_specific_args']['type'] )
                        ||
                        ! in_array(
                                $zebra_form_field_details['type_specific_args']['type']    ,
                                array( 'submit' , 'reset' , 'button' )          ,
                                TRUE
                                )
                ) {

                return <<<EOT
PROBLEM: Bad "type_specific_args" + "type" - for field# {$zebra_form_field_number} ("submit", "reset" or "button" expected)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            $zebra_form_add_field_args['type'] = $zebra_form_field_details['type_specific_args']['type'] ;

        } else {

            $zebra_form_add_field_args['type'] =
                \greatKiwi_byFernTec_adSwapper_local_v0x1x211_stringUtils\to_title(
                    $zebra_form_field_details['form_field_name']
                    ) ;

        }

        // -----------------------------------------------------------------

        $zebra_form->add(   'button'                                    ,
                            $zebra_form_add_field_args['id']            ,
                            $zebra_form_add_field_args['caption']       ,
                            $zebra_form_add_field_args['type']          ,
                            $zebra_form_add_field_args['attributes']
                            ) ;
                            //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'select' ) {

        // =================================================================
        // SELECT...
        // =================================================================

        // -------------------------------------------------------------------------
        // void __construct ( string $id , [ mixed $default = ''] , [ array $attributes = ''] , [ string $default_other = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds a <SELECT> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method instead!
        //
        // By default, unless the multiple attribute is set, the control will have a
        // default first option added automatically inviting users to select one of
        // the available options. Default value for English is "- select -" taken
        // from the language file - see the language() method. If you don't want it
        // or want to set it at runtime, set the overwrite argument to TRUE when
        // calling the add_options() method.
        //
        //      // create a new form
        //      $form = new Zebra_Form('my_form');
        //
        //      // single-option select box
        //      $obj = $form->add('select', 'my_select');
        //
        //      // add selectable values with default indexes
        //      // values will be "0", "1" and "2", respectively
        //      // a default first value, "- select -" (language dependent) will also be added
        //      $obj->add_options(array(
        //          'Value 1',
        //          'Value 2',
        //          'Value 3'
        //      ));
        //
        //      // single-option select box
        //      $obj = $form->add('select', 'my_select2');
        //
        //      // add selectable values with specific indexes
        //      // values will be "v1", "v2" and "v3", respectively
        //      // a default first value, "- select -" (language dependent) will also be added
        //      $obj->add_options(array(
        //          'v1' => 'Value 1',
        //          'v2' => 'Value 2',
        //          'v3' => 'Value 3'
        //      ));
        //
        //      // single-option select box with the second value selected
        //      $obj = $form->add('select', 'my_select3', 'v2');
        //
        //      // add selectable values with specific indexes
        //      // values will be "v1", "v2" and "v3", respectively
        //      // also, overwrite the language-specific default first value (notice the boolean TRUE at the end)
        //      $obj->add_options(array(
        //          ''   => '- select a value -',
        //          'v1' => 'Value 1',
        //          'v2' => 'Value 2',
        //          'v3' => 'Value 3'
        //      ), true);
        //
        //      // multi-option select box with the first two options selected
        //      $obj = $form->add('select', 'my_select4[]', array('v1', 'v2'), array('multiple' => 'multiple'));
        //
        //      // add selectable values with specific indexes
        //      // values will be "v1", "v2" and "v3", respectively
        //      $obj->add_options(array(
        //          'v1' => 'Value 1',
        //          'v2' => 'Value 2',
        //          'v3' => 'Value 3'
        //      ));
        //
        // By default, for checkboxes, radio buttons and select boxes, the library
        // will prevent the submission of other values than those declared when
        // creating the form, by triggering the error: "SPAM attempt detected!".
        // Therefore, if you plan on adding/removing values dynamically, from
        // JavaScript, you will have to call the disable_spam_filter() method to
        // prevent that from happening!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be as specified by the $id
        //          argument. The id attribute will be as specified by the $id
        //          argument but with square brackets trimmed off (if any).
        //
        //          This is the name to be used when referring to the control's
        //          value in the POST/GET superglobals, after the form is submitted.
        //
        //          This is also the name of the variable (again, with square
        //          brackets trimmed off if it's the case) to be used in the
        //          template file, containing the generated HTML for the control.
        //
        //          Ie, in a template file, in order to print the generated HTML for
        //          a control named "my_select", one would use:
        //              echo $my_select;
        //
        //      mixed   $default
        //          (Optional) Default selected option.
        //
        //          This argument can also be an array in case the multiple
        //          attribute is set and multiple options need to be preselected by
        //          default.
        //
        //      array   $attributes
        //          (Optional) An array of attributes valid for select controls
        //          (multiple, readonly, style, etc)
        //
        //          Must be specified as an associative array, in the form of
        //          attribute => value.
        //
        //              // setting the "multiple" attribute
        //              $obj = $form->add(
        //                  'select',
        //                  'my_select',
        //                  '',
        //                  array(
        //                      'multiple' => 'multiple'
        //                  )
        //              );
        //
        //          SPECIAL ATTRIBUTE
        //
        //          When setting the special attribute other to true, a textbox
        //          control will be automatically created having the name [id]_other
        //          where [id] is the select control's id attribute. The text box
        //          will be hidden until the user selects the automatically added
        //          Other... option (language dependent) from the selectable
        //          options. The option's value will be other. If the template is
        //          not automatically generated you will have to manually add the
        //          automatically generated control to the template.
        //
        //          See set_attributes() on how to set attributes, other than
        //          through the constructor.
        //
        //          The following attributes are automatically set when the control
        //          is created and should not be altered manually:
        //              id, name
        //
        //      string  $default_other
        //          The default value in the "other" field (if the "other" attribute
        //          is set to true, see above)
        //
        // METHODS
        //
        //      void add_options ( array $options , [ boolean $overwrite = false] )
        //
        //          Adds options to the select box control
        //
        //          If the "multiple" attribute is not set, the first option will be
        //          always considered as the "nothing is selected" state of the
        //          control!
        //
        //      Parameters:
        //
        //          array   $options
        //              An associative array of options where the key is the value
        //              of the option and the value is the actual text to be
        //              displayed for the option.
        //
        //              OPTION GROUPS can be set by giving an array of associative
        //              arrays as argument:
        //
        //                  // add as groups:
        //                  $obj->add_options(array(
        //                      'group' => array('option 1', 'option 2')
        //                  ));
        //
        //          boolean     $overwrite
        //              (Optional) By default, succesive calls of this method will
        //              appended the options given as arguments to the already
        //              existing options.
        //
        //              Setting this argument to TRUE will instead overwrite the
        //              previously existing options.
        //
        //              Default is FALSE
        // -------------------------------------------------------------------------

        // ---------------------------------------------------------------------------------
        // Here we should have (eg):-
        //
        //      $zebra_form_field_details = array(
        //              'form_field_name'       =>  'category_key'              ,
        //              'zebra_control_type'    =>  'select'                    ,
        //              'label'                 =>  'Project &amp; Category'    ,
        //              'value_from'            =>  NULL                        ,
        //              'attributes'            =>  array()                     ,
        //              'rules'                 =>  array(
        //                  'required'  =>  array(
        //                                      'error'             ,   // variable to add the error message to
        //                                      'Field is required'     // error message if value doesn't validate
        //                                      )
        //                  )   ,
        //              'type_specific_args'    =>  array(
        //                  'options_getter_function'   =>  array(
        //                      'function_name' =>  '\\researchAssistant_byFernTec_datasetManagerDatasetDefs_reference_urls\\get_options_for_project_selector'  ,
        //                      'extra_args'    =>  NULL
        //                      )
        //                  )
        //              )
        //
        // ---------------------------------------------------------------------------------

        // -------------------------------------------------------------------------
        // <options_getter_function>(
        //      $home_page_title                        ,
        //      $caller_apps_includes_dir               ,
        //      $all_application_dataset_definitions    ,
        //      $dataset_slug                           ,
        //      $selected_datasets_dmdd                 ,
        //      $dataset_title                          ,
        //      $dataset_records                        ,
        //      $record_indices_by_key                  ,
        //      $question_adding                        ,
        //      $zebra_form_field_number                           ,
        //      $zebra_form_field_details                          ,
        //      $the_record                             ,
        //      $the_records_index                      ,
        //      $array_storage_field_slugs              ,
        //      $extra_args
        //      )
        // - - - - - - - - - - - - - - - - - - - - - - -
        // Returns the SELECT tag options for the specified record and field
        //
        // NOTE!
        // -----
        // $the_record and $the_records_index are both NULL when
        // $question_adding is TRUE
        //
        // RETURNS
        //      o   On SUCCESS!
        //          - - - - - -
        //          array(
        //              $ok = TRUE                      ,
        //              $field_value <any PHP type>
        //              )
        //
        //      o   On FAILURE!
        //          - - - - - -
        //          array(
        //              $ok = FALSE             ,
        //              $error_message STRING
        //              )
        // -------------------------------------------------------------------------

        $options = array() ;

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['type_specific_args'] )
                &&
                is_array( $zebra_form_field_details['type_specific_args'] )
                &&
                isset( $zebra_form_field_details['type_specific_args']['options_getter_function'] )
                &&
                is_array( $zebra_form_field_details['type_specific_args']['options_getter_function'] )
                &&
                isset( $zebra_form_field_details['type_specific_args']['options_getter_function']['function_name'] )
                &&
                is_string( $zebra_form_field_details['type_specific_args']['options_getter_function']['function_name'] )
            ) {

            // -------------------------------------------------------------

            if ( ! function_exists( $zebra_form_field_details['type_specific_args']['options_getter_function']['function_name'] ) ) {

                return <<<EOT
PROBLEM: Bad "zebra_form" + "type_specific_args" + "options_getter_function" + "function_name" - for field# {$zebra_form_field_number} (function not found)
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

            }

            // -------------------------------------------------------------

            $extra_args = array() ;

            // -------------------------------------------------------------

            if (    isset( $zebra_form_field_details['type_specific_args']['options_getter_function']['extra_args'] )
                    &&
                    is_array( $zebra_form_field_details['type_specific_args']['options_getter_function']['extra_args'] )
                ) {
                $extra_args = $zebra_form_field_details['type_specific_args']['options_getter_function']['extra_args'] ;
            }

            // -------------------------------------------------------------

            $result = $zebra_form_field_details['type_specific_args']['options_getter_function']['function_name'](
                            $home_page_title                        ,
                            $caller_apps_includes_dir               ,
                            $all_application_dataset_definitions    ,
                            $dataset_slug                           ,
                            $selected_datasets_dmdd                 ,
                            $dataset_title                          ,
                            $dataset_records                        ,
                            $record_indices_by_key                  ,
                            $question_adding                        ,
                            $zebra_form_field_number                ,
                            $zebra_form_field_details               ,
                            $the_record                             ,
                            $the_records_index                      ,
                            $array_storage_field_slugs              ,
                            $extra_args
                            ) ;

            // -------------------------------------------------------------

            list( $ok , $options ) = $result ;

            // -------------------------------------------------------------

            if ( $ok !== TRUE ) {
                return $options ;
            }

            // -------------------------------------------------------------

        }

        // -------------------------------------------------------------------------

        $zebra_form_add_field_args['default_other'] = '' ;

        // -----------------------------------------------------------------

        $zebra_form->add(   'label'                                         ,
                            $zebra_form_field_label_args['id']              ,
                            $zebra_form_field_label_args['attach_to']       ,
                            $zebra_form_field_label_args['caption']         ,
                            $zebra_form_field_label_args['attributes']
                            ) ;

        // -----------------------------------------------------------------

        if ( isset( $zebra_form_field_note_args ) ) {

            $zebra_form->add(   'note'                                          ,
                                $zebra_form_field_note_args['id']               ,
                                $zebra_form_field_note_args['attach_to']        ,
                                $zebra_form_field_note_args['caption']          ,
                                $zebra_form_field_note_args['attributes']
                                ) ;

        }

        // -----------------------------------------------------------------
        // NOTE!
        // =====
        //      <zebra_form_field_details> +
        //          "type_specific_args" +
        //          "selected_value_conversions_for_select_control"
        //
        // This should be set when an array storage field valid should
        // be converted to some other "selected value" for the select
        // control.
        //
        // FOR EXAMPLE:-
        //
        // The select control's "options_getter_function" creates a
        // select control like (eg):-
        //
        //      <select name="favourite_colour">
        //          <option value=""        >Please choose your favourite colour...</option>
        //          <option value="none"    >(none)</option>
        //          <option value="red"     >Red</option>
        //          <option value="green"   >Green</option>
        //          <option value="blue"    >Blue</option>
        //      </select>
        //
        // And we define:-
        //
        //      <zebra_form_field_details>['type_specific_args']['selected_value_conversions_for_select_control'] =
        //
        //          array(
        //              'add'   =>  array()     ,
        //              'edit'  =>  array(
        //                              ''  =>  'none'
        //                              )
        //              )
        //
        // So when the array storage record is being ADDED, the selected
        // option is:-
        //      "Please choose your favourite colour..."
        //
        // But if we now EDIT the record, and the array storage field
        // has the value "", the selected value will be:-
        //      "(none)"
        //
        // NOTE that the array storage field should have a "value_from"
        // function defined - that converts the submitted value "none"
        // back to "" for storage in the dataset.
        // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_field_details ) ;

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_add_field_args ) ;

        if (    array_key_exists( 'type_specific_args' , $zebra_form_field_details )
                &&
                is_array( $zebra_form_field_details['type_specific_args'] )
                &&
                array_key_exists(
                    'selected_value_conversions_for_select_control'     ,
                    $zebra_form_field_details['type_specific_args']
                    )
                &&
                is_array( $zebra_form_field_details['type_specific_args']['selected_value_conversions_for_select_control'] )
            ) {

            // -------------------------------------------------------------

            if ( $question_adding ) {
                $add_edit = 'add' ;

            } else {
                $add_edit = 'edit' ;

            }

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $add_edit ) ;

            // -------------------------------------------------------------

            if (    array_key_exists(
                        $add_edit           ,
                        $zebra_form_field_details['type_specific_args']['selected_value_conversions_for_select_control']
                        )
                    &&
                    array_key_exists(
                        $zebra_form_add_field_args['default']       ,
                        $zebra_form_field_details['type_specific_args']['selected_value_conversions_for_select_control'][ $add_edit ]
                        )
                ) {

                $zebra_form_add_field_args['default'] =
                    $zebra_form_field_details['type_specific_args']['selected_value_conversions_for_select_control'][ $add_edit ][
                        $zebra_form_add_field_args['default']
                        ] ;

            }

            // -------------------------------------------------------------

        }

        // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $zebra_form_add_field_args ) ;

        $field_obj = $zebra_form->add(  'select'                                        ,
                                        $zebra_form_add_field_args['id']                ,
                                        $zebra_form_add_field_args['default']           ,
                                        $zebra_form_add_field_args['attributes']        ,
                                        $zebra_form_add_field_args['default_other']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

//\greatKiwi_byFernTec_adSwapper_local_v0x1x211_testDebug\pr( $options ) ;

        $field_obj->add_options( $options ) ;

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } elseif ( $zebra_form_field_details['zebra_control_type'] === 'hidden' ) {

        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
        // HIDDEN...
        // :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

        // ---------------------------------------------------------------------
        // void __construct ( string $id , [ string $default = ''] )
        // - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        // Adds an <input type="hidden"> control to the form.
        //
        // Do not instantiate this class directly! Use the add() method
        // instead!
        //
        // PARAMETERS
        //
        //      string  $id
        //          Unique name to identify the control in the form.
        //
        //          The control's name attribute will be the same as the id
        //          attribute!
        //
        //          This is the name to be used when referring to the
        //          control's value in the POST/GET superglobals, after the
        //          form is submitted.
        //
        //          Hidden controls are automatically rendered when the
        //          render() method is called!
        //
        //          Do not print them in template files!
        //
        //      string  $default
        //          (Optional) Default value of the text box.
        // ---------------------------------------------------------------------

        // -----------------------------------------------------------------
        // ADD the FIELD...
        // -----------------------------------------------------------------

        $field_obj = $zebra_form->add(  'hidden'                                    ,
                                        $zebra_form_add_field_args['id']            ,
                                        $zebra_form_add_field_args['default']
                                        ) ;
                                        //  Returns a reference to the newly created object

        // -----------------------------------------------------------------

        if (    isset( $zebra_form_field_details['rules'] )
                &&
                is_array( $zebra_form_field_details['rules'] )
            ) {
            $field_obj->set_rule( $zebra_form_field_details['rules'] ) ;
        }

        // -----------------------------------------------------------------

    } else {

        // =================================================================
        // ERROR
        // =================================================================

        return <<<EOT
PROBLEM: Unrecognised/unsupported "zebra_control_type" ("{$zebra_form_field_details['zebra_control_type']}") - for field# {$zebra_form_field_number}
For field:&nbsp; {$zebra_form_field_details['form_field_name']}
Of dataset:&nbsp; "{$dataset_title}"
Detected in:&nbsp; \\{$ns}\\{$fn}()
EOT;

        // -----------------------------------------------------------------

    }

    // =====================================================================
    // SUCCESS!
    // =====================================================================

    return TRUE ;

    // =====================================================================
    // That's that!
    // =====================================================================

}

// =============================================================================
// That's that!
// =============================================================================

