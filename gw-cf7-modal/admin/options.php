<?php

// options for gw_cf7_modal


class GWCF7Popup {
    	public function __construct() {
    	// Hook into the admin menu
    	add_action( 'admin_menu', array( $this, 'gw_cf7_modal_create_settings_page' ) );
      add_action( 'admin_init', array( $this, 'gw_cf7_modal_setup_sections' ) );
      add_action( 'admin_init', array( $this, 'gw_cf7_modal_setup_fields' ) );

    }


    public function gw_cf7_modal_create_settings_page() {
      	// Add the menu item and page
      	$page_title = 'GW CF7 Modal Settings Page';
      	$menu_title = 'GW CF7 Modal Plugin';
      	$capability = 'manage_options';
      	$slug = 'gw_cf7_modal';
      	$callback = array( $this, 'gw_cf7_modal_settings_page_content' );
      	$icon = 'dashicons-admin-plugins';
      	$position = 100;

	    add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );

    }

    public function gw_cf7_modal_settings_page_content() { ?>


      	<div class="wrap">
      		<h2>GW CF7 Modal Settings Page</h2>

          <br>
          <h2>Set Background Image</h2>
           <?php gw_cf7_modal_media_selector(); ?>

      		<form method="post" action="options.php">


                  <?php
                      settings_fields( 'gw_cf7_modal' );
                      do_settings_sections( 'gw_cf7_modal' );
                      submit_button();
                  ?>
      		</form>
      	</div> <?php
    }

    public function gw_cf7_modal_setup_sections() {
      add_settings_section( 'set_modal_bg', 'Modal Background Color', array( $this, 'gw_cf7_modal_section_callback' ), 'gw_cf7_modal' );
	    add_settings_section( 'set_form', 'Choose Contact 7 Form', array( $this, 'gw_cf7_modal_section_callback' ), 'gw_cf7_modal' );

      add_settings_section( 'set_form_bg', 'Set Form Background Color and Text', array( $this, 'gw_cf7_modal_section_callback' ), 'gw_cf7_modal' );
      add_settings_section( 'set_bottom_text', 'Set Bottom Text', array( $this, 'gw_cf7_modal_section_callback' ), 'gw_cf7_modal' );
      add_settings_section( 'set_left_area_text', 'Set Left Area Text', array( $this, 'gw_cf7_modal_section_callback' ), 'gw_cf7_modal' );
    }

    public function gw_cf7_modal_section_callback( $arguments ) {
	      switch( $arguments['id'] ){
              case 'set_modal_bg':
          			echo '';
          			break;
          		case 'set_form':
          			echo '';
          			break;
          		case 'set_form_bg':
          			echo '';
          			break;
              case 'set_left_area_text':
          			echo '';
          			break;
	      }
    }


    public function gw_cf7_modal_setup_fields() {

      $args  =  array('post_type'=> 'wpcf7_contact_form', 'suppress_filters' => false , 'numberposts' => '-1');
      $forms = get_posts($args);
      $form_id = array();
      $form_name = array();
      foreach($forms as $form) {
        $form_id[] =  $form->ID;
        $form_name[] = $form->post_name;
        $form_list = array_combine($form_id, $form_name);
            }
        $fields = array(

        array(
          'uid' => 'main_background_color',
          'label' => 'Set main Background Color',
          'section' => 'set_modal_bg',
          'type' => 'text',
          'options' => false,
          'placeholder' => '',
          'helper' => '',
          'supplemental' => '',
          'default' => '',
          'color_picker'  => 'yes'
        ),
        //  end form bg

        array(
          'uid' => 'close_button_color',
          'label' => 'Set Close Button Color',
          'section' => 'set_modal_bg',
          'type' => 'text',
          'options' => false,
          'placeholder' => '',
          'helper' => '',
          'supplemental' => '',
          'default' => '',
          'color_picker'  => 'yes'
        ),
        //  end form bg

        array(
          'uid' => 'onload_or_click',
          'label' => 'Show Form on First Page Load?',
          'section' => 'set_form',
          'type' => 'radio',
          'class' => 'onload_or_click',
          'options' => array(
          'yes' => 'Yes',
          'no' => 'No',

          ),
              'default' => array()
        ), // end set onload or click

          // set selector for click
          array(
            'uid' => 'click_selector',
            'label' => 'Set Selector For Click',
            'section' => 'set_form',
            'type' => 'text',
            'options' => false,
            'class' => 'set_selector',
            'supplemental' => 'Can be class (.my_class) or ID (#my_id)',
            'default' => '',
            'color_picker'  => 'no'
          ),

          // end selector for click

          array(
        		'uid' => 'select_form',
        		'label' => 'Select Form',
        		'section' => 'set_form',
        		'type' => 'select',
        		'options' => $form_list,
                'default' => array()
        	), // end select form

          array(
            'uid' => 'form_background',
            'label' => 'Set Form Background Color',
            'section' => 'set_form_bg',
            'type' => 'text',
            'options' => false,
            'placeholder' => '',
            'helper' => '',
            'supplemental' => '',
            'default' => '',
            'color_picker'  => 'yes'
          ),
          //  end form bg

          array(
            'uid' => 'label_color',
            'label' => 'Set Form Label Color',
            'section' => 'set_form_bg',
            'type' => 'text',
            'options' => false,
            'placeholder' => '',
            'helper' => '',
            'supplemental' => '',
            'default' => '',
            'color_picker'  => 'yes'
          ),
          //  end form bg

          // end set bottom text

          array(
            'uid' => 'left_textarea',
            'label' => 'Left Text Area',
            'section' => 'set_left_area_text',
            'type' => 'textarea'

          ),

          array(
        		'uid' => 'leftarea_content_position',
        		'label' => 'Select Vertical Content position',
        		'section' => 'set_left_area_text',
        		'type' => 'select',
        		'options' => array(
              'flex-start' => 'Top',
        			'center' => 'Center',
        			'flex-end' => 'Bottom'
        		),
                'default' => array()
        	),

          array(
            'uid' => 'leftarea_text_align',
            'label' => 'Select Text Alignment',
            'section' => 'set_left_area_text',
            'type' => 'select',
            'options' => array(
              'left' => 'Left',
              'center' => 'Center',
              'right' => 'Right'
            ),
                'default' => array()
          ),

          array(
             'uid' => 'text_background',
             'label' => 'Set Left Area Background Color',
             'section' => 'set_left_area_text',
             'type' => 'text',
             'options' => false,
             'placeholder' => '',
             'helper' => '',
             'supplemental' => '',
             'default' => '',
             'color_picker'  => 'yes'
           ),
           //  end leftarea bg

            array(
              'uid' => 'leftarea_text_color',
              'label' => 'Set Left Area Text Color',
              'section' => 'set_left_area_text',
              'type' => 'text',
              'options' => false,
              'placeholder' => '',
              'helper' => '',
              'supplemental' => '',
              'default' => '',
              'color_picker'  => 'yes'
              ),
              //  end leftarea bg









        );//end fields array

        foreach( $fields as $field ){
        	add_settings_field( $field['uid'], $field['label'], array( $this, 'gw_cf7_modal_field_callback' ), 'gw_cf7_modal', $field['section'], $field );
            register_setting( 'gw_cf7_modal', $field['uid'] );
    	  }
      }// end setup fields

        public function gw_cf7_modal_field_callback( $arguments ) {
              // we can set some variables
              if ($arguments['color_picker'] == 'yes') {
                $color_picker_field = "color-picker";
              } else {
                $color_picker_field = "";
              }


          	  $value = get_option( $arguments['uid'] ); // Get the current value, if there is one
              if( ! $value ) { // If no value exists
                  $value = $arguments['default']; // Set to our default
              }

	// Check which type of field we want
            switch( $arguments['type'] ){
              case 'text': // If it is a text field
                		printf( '<input name="%1$s" id="%1$s" type="%2$s" class="'.$color_picker_field.'" data-alpha="true" placeholder="%3$s" value="%4$s"  />', $arguments['uid'], $arguments['type'],$arguments['placeholder'], $value , $arguments['class'] );
                    
                		break;

            case 'textarea': // If it is a textarea
              		printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
              		break;

            case 'select': // If it is a select dropdown
            		if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
              			$options_markup = '';
              			foreach( $arguments['options'] as $key => $label ){
              				$options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
            			   }
            			printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );
            		}
        		      break;

                    case 'radio':
            case 'checkbox':
                if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
                    $options_markup = '';
                    $iterator = 0;
                    foreach( $arguments['options'] as $key => $label ){
                        $iterator++;
                        $options_markup .= sprintf( '<label for="%1$s_%6$s"><input id="%1$s_%6$s" name="%1$s[]" type="%2$s" value="%3$s" %4$s /> %5$s</label><br/>', $arguments['uid'], $arguments['type'], $key, checked( $value[ array_search( $key, $value, true ) ], $key, false ), $label, $iterator );
                    }
                    printf( '<fieldset>%s</fieldset>', $options_markup );
                }
                break;




            }

          	// If there is help text
              if( $helper = $arguments['helper'] ){
                  printf( '<span class="helper"> %s</span>', $helper ); // Show it
              }

          	// If there is supplemental text
              if( $supplimental = $arguments['supplemental'] ){
                  printf( '<p class="description">%s</p>', $supplimental ); // Show it
              }

      }





}
new GWCF7Popup();
