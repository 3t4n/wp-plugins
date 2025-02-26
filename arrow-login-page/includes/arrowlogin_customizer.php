<?php

function arrowlogin_hideOthers(){
    $firstTime= get_option('arrowPluginFirstTime');

	$GLOBALS['clickPlugin']="false";

	if($_GET['call']!='arrow-login-customizer'){

		?>
        <style>
            #accordion-panel-arrowlogin_panel{
                display: none !important;
            }

        </style>
		<?php
	}
	//hide others
	else{
	    ?>

        <script type="text/javascript">

            window.onload = function() {
            //
            //    var element1=document.getElementById('save');
            //    element1.onclick = function () {
            //
            //        //use ajx here
            //        jQuery(document).ready(function ($) {
            //
            //            var data = {
            //                'action': 'arrowlogin_save_meta_values_on_publish_click',
            //                'bg_color': '<?php //echo $GLOBALS['clickitlp_bg_color'];?>//'
            //            };
            //
            //            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            //            jQuery.post(ajaxurl, data, function (response) {
            //                // alert('Got this from the server: ' + response);
            //                //location.reload();
            //            });
            //
            //        });
            //
            //
            //    };





                var list = document.getElementById("customize-theme-controls").getElementsByClassName('customize-pane-parent');
                var lis=list[0].getElementsByTagName("li");
                //console.log("here");
                //console.log(lis.length);

                for (var i = 0; i < lis.length; i++) {
                  //  console.log(lis[i].id);
                    var element=document.getElementById(lis[i].id);
                    //Do something
                    if(lis[i].id!='accordion-panel-arrowlogin_panel')
                        element.setAttribute('style', 'display:none !important');

                }

            }
        </script>
		<?php

	}

}
//add_action('wp_loaded','arrowlogin_hideOthers2');
function arrowlogin_hideOthers2(){
?>
    <script>
        window.onload=function() {

           var elem123= document.getElementsByClassName('wp-full-overlay-sidebar-content');
            console.log(elem123.length);


        }
    </script>
<?php
}
function arrowlogin_customize_register($wp_customize){
	if($_GET['call']=='arrow-login-customizer')
		arrowlogin_hideOthers();
	$wp_customize->add_panel( 'arrowlogin_panel', array(
		'priority' => 25,
		'capability' => 'edit_theme_options',
		'title' => __('Arrow Login Page Customizer', 'arrowlogin'),
		'description' => __('This sections allows you to customize your login pgae', 'arrowlogin')
	));

	/* ---------------------------
|                            |
| Section for Theme      |
|                            |
-----------------------------*/

	$wp_customize->add_section( 'arrowlogin_theme_section', array(
		'priority' => 5,
		'title' => __('Theme', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',
	));
	$wp_customize->add_setting( 'arrowlogin_theme', array(
		'type' => 'option',
		'default' => 'one',
		'capability' => 'edit_theme_options',
	));
	/*
		$wp_customize->add_control( 'arrowlogin_theme', array(
			'label' => __('Theme:', 'arrowlogin'),
			'type' => 'radio',
			'choices'  => array(
				'left'  => 'left',
				'right' => 'right', ),
			'section' => 'arrowlogin_theme_section',
			'priority' => 15,
			'settings' => 'arrowlogin_theme',
		));
	*/
	arrowlogin_register_customizer_control_custom_radio_image($wp_customize);

	    arrowlogin_logo_customizer_settings($wp_customize);
        arrowlogin_background_customizer_settings($wp_customize);
        arrowlogin_form_customizer_settings($wp_customize);
        arrowlogin_field_customizer_settings($wp_customize);
        arrowlogin_button_customizer_settings($wp_customize);
        arrowlogin_Label_customizer_settings($wp_customize);

	/*
	$wp_customize->add_setting(  'arrowlogin_form_style_padding', array(
		'default' => '26 24px 46px',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'arrowlogin_form_style_padding', array(
		'label' => __('Form Padding:', 'arrowlogin'),
		'section' => 'arrowlogin_form_bg_section',
		'priority' => 25,
		'settings' => 'arrowlogin_form_style_padding',
	));
	*/
//	$wp_customize->add_setting( 'arrowlogin_form_style_border', array(
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//	$wp_customize->add_control( 'arrowlogin_form_style_border', array(
//		'label' => __('Border (Example: 2px Dotted Black):', 'arrowlogin'),
//		'section' => 'arrowlogin_form_bg_section',
//		'priority' => 30,
//		'settings' => 'arrowlogin_form_style_border',
//	));




	/* ---------------------------
    |                            |
    | Section for Themes      |
    |                            |
    -----------------------------*/

	$wp_customize->add_section( 'arrowlogin_custom_css_section', array(
		'priority' => 50 ,
		'title' => __('Custom CSS', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',
	));

	$wp_customize->add_setting( 'arrowlogin_custom_css', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'arrowlogin_custom_css', array(
		'label' => __('Custom CSS:', 'arrowlogin'),
		'type' => 'textarea',
		'section' => 'arrowlogin_custom_css_section',
		'priority' => 15,
		'settings' => 'arrowlogin_custom_css',
	));



}

function arrowlogin_logo_customizer_settings($wp_customize){

	$wp_customize->add_section( 'arrowlogin_logo_section', array(
		'priority' => 5,
		'title' => __('Logo', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',

	));
	$wp_customize->add_setting( 'arrowlogin_logo_enable', array(
		'default'=>"1",
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'arrowlogin_sanitize_checkbox',

	));
	function arrowlogin_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? "show" : "hide" );
	}
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arrowlogin_logo_enable', array(
		'label' => __('Enable Logo:', 'arrowlogin'),
		'section' => 'arrowlogin_logo_section',
		'priority' => 5,
		'type'=>'checkbox',
		'settings' => 'arrowlogin_logo_enable',
	)));



	$wp_customize->add_setting( 'arrowlogin_logo', array(
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arrowlogin_logo', array(
            'label' => __('Logo Image:', 'arrowlogin'),
            'section' => 'arrowlogin_logo_section',
            'priority' => 5,
            'settings' => 'arrowlogin_logo',
        )));

        $wp_customize->add_setting( 'arrowlogin_logo_width', array(
            'default' => '84',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control( 'arrowlogin_logo_width', array(
            'label' => __('Logo Width:', 'arrowlogin'),
            'section' => 'arrowlogin_logo_section',
            'priority' => 10,
            'type' => "number",
            'settings' => 'arrowlogin_logo_width',
        ));
        $wp_customize->add_setting( 'arrowlogin_logo_height', array(
            'default' => '84',
            'type' => 'option',
            'capability' => 'edit_theme_options',
        ));
        $wp_customize->add_control( 'arrowlogin_logo_height', array(
            'label' => __('Logo Height:', 'arrowlogin'),
            'section' => 'arrowlogin_logo_section',
            'priority' => 15,
            'type' => "number",
            'settings' => 'arrowlogin_logo_height',
        ));

	class Clicklogin_Customizer_Number_Inline_Control extends WP_Customize_Control {
		public $fieldwidth = 'text';
		public $type = 'number';

		protected function render() {
			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
			$class = 'customize-control customize-control-' . $this->type; ?>
            <li id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>" style="clear:none;display:inline-block;max-width:<?php echo $this->fieldwidth . "%"; ?>">
				<?php $this->render_content(); ?>
            </li>
		<?php }

		public function render_content() { ?>
            <label class="inline">
                <span class="customize-control-title" style="font-size:10px;line-height:10px;height:20px;"><?php echo esc_html( $this->label ); ?></span>
                <input type="number" <?php $this->link(); ?> value="<?php echo intval( $this->value() ); ?>" />
            </label>
		<?php }
	}
//
//
//	$wp_customize->add_setting(  'arrowlogin_logo_margin_right', array(
//            'default' => '5',
//            'type' => 'option',
//            'capability' => 'edit_theme_options',
//        ));
//
//	$wp_customize->add_control( new Clicklogin_Customizer_Number_Inline_Control( $wp_customize, 'arrowlogin_logo_margin_right', array (
//		'label'     => 'Right',
//		'type'      => 'number',
//		'section'   => 'arrowlogin_logo_section',
//		'priority'  => 20,
//		'fieldwidth'=> '25', //set the field to 50% width so that we can display a second one next to it
//	) ) );
//	$wp_customize->add_setting(  'arrowlogin_logo_margin_left', array(
//		'default' => '5',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//
//	$wp_customize->add_control( new Clicklogin_Customizer_Number_Inline_Control( $wp_customize, 'arrowlogin_logo_margin_left', array (
//		'label'     => 'Left',
//		'type'      => 'number',
//		'section'   => 'arrowlogin_logo_section',
//		'priority'  => 20,
//		'fieldwidth'=> '25', //set the field to 50% width so that we can display a second one next to it
//	) ) );
//
//
//
//	$wp_customize->add_setting(  'arrowlogin_logo_margin_up', array(
//		'default' => '5',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//
//	$wp_customize->add_control( new Clicklogin_Customizer_Number_Inline_Control( $wp_customize, 'arrowlogin_logo_margin_up', array (
//		'label'     => 'Up',
//		'type'      => 'number',
//		'section'   => 'arrowlogin_logo_section',
//		'priority'  => 20,
//		'fieldwidth'=> '25', //set the field to 50% width so that we can display a second one next to it
//	) ) );
//	$wp_customize->add_setting(  'arrowlogin_logo_margin_down', array(
//		'default' => '5',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//
//	$wp_customize->add_control( new Clicklogin_Customizer_Number_Inline_Control( $wp_customize, 'arrowlogin_logo_margin_down', array (
//		'label'     => 'Down',
//		'type'      => 'number',
//		'section'   => 'arrowlogin_logo_section',
//		'priority'  => 20,
//		'fieldwidth'=> '25', //set the field to 50% width so that we can display a second one next to it
//	) ) );



}
function arrowlogin_background_customizer_settings($wp_customize){

	$wp_customize->add_section( 'arrowlogin_bg_section', array(
		'priority' => 10,
		'title' => __('Background', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',
	));
	$wp_customize->add_setting( 'arrowlogin_bg', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arrowlogin_bg', array(
		'label' => __('Background Image:', 'arrowlogin'),
		'section' => 'arrowlogin_bg_section',
		'priority' => 5,
		'id'=>'arrowlogin_bg_color_control',
		'settings' => 'arrowlogin_bg',
	)));
//
//	$wp_customize->add_setting( 'arrowlogin_bg_video', array(
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arrowlogin_bg_video', array(
//		'label' => __('Background Video:', 'arrowlogin'),
//		'section' => 'arrowlogin_bg_section',
//		'priority' => 10,
//		'id'=>'arrowlogin_bg_color_control',
//		'settings' => 'arrowlogin_bg_video',
//	)));
//
//
$wp_customize->add_setting( 'arrowlogin_bg_video',
   array(
      'default' => '',
      'transport' => 'refresh',
      //'type' => 'theme_mod',
      'type' => 'option',
	'capability' => 'edit_theme_options'

   )
);

$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'arrowlogin_bg_video',
   array(
      'label' => __( 'Background Video' ),
      'section' => 'arrowlogin_bg_section',
      'mime_type' => 'video',  // Required. Can be image, audio, video, application, text
      'button_labels' => array( // Optional
         'select' => __( 'Select Video' ),
         'change' => __( 'Change Video' ),
         'default' => __( 'Default' ),
         'remove' => __( 'Remove' ),
         'placeholder' => __( 'No file selected' ),
         'frame_title' => __( 'Select File' ),
         'frame_button' => __( 'Choose File' ),

      )
   )
) );




	$wp_customize->add_setting( 'arrowlogin_bg_color', array(
		'default' => '',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_bg_color', array(
		'label' => __('Background Color:', 'arrowlogin'),
		'section' => 'arrowlogin_bg_section',
		'priority' => 15,
		'settings' => 'arrowlogin_bg_color',
	)));
	$wp_customize->add_setting( 'arrowlogin_bg_image_size', array(
		'default' => 'cover',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Control(
 $wp_customize, //Pass the $wp_customize object (required)
 'arrowlogin_bg_image_size', //Set a unique ID for the control
 array(
    'label'      => 'Background Image Size', //Admin-visible name of the control
    'settings'   => 'arrowlogin_bg_image_size', //Which setting to load and manipulate (serialized is okay)
    'priority'   => 20, //Determines the order this control appears in for the specified section
    'section'    => 'arrowlogin_bg_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
    'type'    => 'select',
    'choices' => array(
        'auto' => 'auto',
        'cover' => 'cover',
        'contain' => 'contain',
        'intial' => 'intial',
     	'inherit' => 'inherit',
           
    )
)
) );
	$wp_customize->add_setting( 'arrowlogin_bg_repeat', array(
		'default' => 'no-repeat',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Control(
 $wp_customize, //Pass the $wp_customize object (required)
 'arrowlogin_bg_repeat', //Set a unique ID for the control
 array(
    'label'      => 'Background Repeat', //Admin-visible name of the control
    'settings'   => 'arrowlogin_bg_repeat', //Which setting to load and manipulate (serialized is okay)
    'priority'   => 25, //Determines the order this control appears in for the specified section
    'section'    => 'arrowlogin_bg_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
    'type'    => 'select',
    'choices' => array(
        'no-repeat' => 'no-repeat',
        'repeat' => 'repeat',
        'repeat-x' => 'repeat-x',
        'repeat-y' => 'repeat-y',
        'intial' => 'intial',
     	'inherit' => 'inherit',
           
    )
)
) );

	// $wp_customize->add_setting( 'arrowlogin_bg_size', array(
	//     'type' => 'option',
	//     'capability' => 'edit_theme_options'
	// ));
	// $wp_customize->add_control( 'arrowlogin_bg_size', array(
	//     'label' => __('Background Size:', 'arrowlogin'),
	//     'section' => 'arrowlogin_bg_section',
	//     'priority' => 15,
	//     'settings' => 'arrowlogin_bg_size',
	// ));

}
function arrowlogin_field_customizer_settings($wp_customize){

	/* ---------------------------
	|                            |
	|  Section for field styling |
	|                            |
	-----------------------------*/


	$wp_customize->add_section( 'arrowlogin_field_style', array(
		'priority' => 25,
		'title' => __('Fields', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',
	));
//	$wp_customize->add_setting( 'arrowlogin_other_textColor', array(
//		'default' => '#999',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_other_textColor', array(
//		'label' => __('Text Color:', 'arrowlogin'),
//		'section' => 'arrowlogin_field_style',
//		'priority' => 5,
//		'settings' => 'arrowlogin_other_textColor',
//	)));
//	$wp_customize->add_setting( 'arrowlogin_other_textColorH', array(
//		'default' => '#2EA2CC',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_other_textColorH', array(
//		'label' => __('Text Color Hover:', 'arrowlogin'),
//		'section' => 'arrowlogin_field_style',
//		'priority' => 5,
//		'settings' => 'arrowlogin_other_textColorH',
//	)));
//
//	$wp_customize->add_setting( 'arrowlogin_field_style_width', array(
//		'default' => '100%',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//	$wp_customize->add_control( 'arrowlogin_field_style_width', array(
//		'label' => __('Input Field Width:', 'arrowlogin'),
//		'section' => 'arrowlogin_field_style',
//		'priority' => 5,
//		'settings' => 'arrowlogin_field_style_width',
//	));
//	$wp_customize->add_setting( 'arrowlogin_field_style_margin', array(
//		'default' => '2px 6px 16px 0px',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//	$wp_customize->add_control( 'arrowlogin_field_style_margin', array(
//		'label' => __('Input Field Margin:', 'arrowlogin'),
//		'section' => 'arrowlogin_field_style',
//		'priority' => 10,
//		'settings' => 'arrowlogin_field_style_margin',
//	));

	$wp_customize->add_setting( 'arrowlogin_field_style_ifbg', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_field_style_ifbg', array(
		'label' => __('Input Field Background:', 'arrowlogin'),
		'section' => 'arrowlogin_field_style',
		'priority' => 15,
		'settings' => 'arrowlogin_field_style_ifbg',
	)));
	$wp_customize->add_setting( 'arrowlogin_field_style_ifc', array(
		'default' => '#333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_field_style_ifc', array(
		'label' => __('Input Field Color:', 'arrowlogin'),
		'section' => 'arrowlogin_field_style',
		'priority' => 20,
		'settings' => 'arrowlogin_field_style_ifc',
	)));
	$wp_customize->add_setting( 'arrowlogin_field_style_lc', array(
		'default' => '#777',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_field_style_lc', array(
		'label' => __('Label Color:', 'arrowlogin'),
		'section' => 'arrowlogin_field_style',
		'priority' => 25,
		'settings' => 'arrowlogin_field_style_lc',
	)));


}
function arrowlogin_button_customizer_settings($wp_customize){

	$wp_customize->add_section( 'arrowlogin_button_section', array(
		'priority' => 30,
		'title' => __('Button', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',
	));

	$wp_customize->add_setting('arrowlogin_button_bg', array(
		'default' => '#2EA2CC',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_button_bg', array(
		'label' => __('Button Background:', 'arrowlogin'),
		'section' => 'arrowlogin_button_section',
		'priority' => 5,
		'settings' => 'arrowlogin_button_bg'
	)));

//	$wp_customize->add_setting('arrowlogin_button_border', array(
//		'default' => '#0074A2',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//
//	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_button_border', array(
//		'label' => __('Button Border:', 'arrowlogin'),
//		'section' => 'arrowlogin_button_section',
//		'priority' => 10,
//		'settings' => 'arrowlogin_button_border'
//	)));

	$wp_customize->add_setting('arrowlogin_button_hover_bg', array(
		'default' => '#1E8CBE',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_button_hover_bg', array(
		'label' => __('Button Background (Hover):', 'arrowlogin'),
		'section' => 'arrowlogin_button_section',
		'priority' => 15,
		'settings' => 'arrowlogin_button_hover_bg'
	)));

//	$wp_customize->add_setting('arrowlogin_button_hover_border', array(
//		'default' => '#0074A2',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));
//
//	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_button_hover_border', array(
//		'label' => __('Button Border (Hover):', 'arrowlogin'),
//		'section' => 'arrowlogin_button_section',
//		'priority' => 20,
//		'settings' => 'arrowlogin_button_hover_border'
//	)));

//	$wp_customize->add_setting('arrowlogin_button_shadow', array(
//		'default' => '#78C8E6',
//		'type' => 'option',
//		'capability' => 'edit_theme_options',
//	));

//	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_button_shadow', array(
//		'label' => __('Button Box Shadow:', 'arrowlogin'),
//		'section' => 'arrowlogin_button_section',
//		'priority' => 25,
//		'settings' => 'arrowlogin_button_shadow'
//	)));

	$wp_customize->add_setting('arrowlogin_button_color', array(
		'default' => '#FFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_button_color', array(
		'label' => __('Text Color:', 'arrowlogin'),
		'section' => 'arrowlogin_button_section',
		'priority' => 30,
		'settings' => 'arrowlogin_button_color'
	)));

}
function arrowlogin_form_customizer_settings($wp_customize){
$wp_customize->add_section( 'arrowlogin_form_bg_section', array(
	'priority' => 15,
	'title' => __('Login Form', 'arrowlogin'),
	'panel' => 'arrowlogin_panel',
));
$wp_customize->add_setting( 'arrowlogin_form_bg', array(
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'arrowlogin_form_bg', array(
	'label' => __('Background Image:', 'arrowlogin'),
	'section' => 'arrowlogin_form_bg_section',
	'priority' => 5,
	'settings' => 'arrowlogin_form_bg',
)));
$wp_customize->add_setting( 'arrowlogin_form_bg_color', array(
	'default' => '#FFF',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( new WP_Customize_Color_Control ($wp_customize, 'arrowlogin_form_bg_color', array(
	'label' => __('Background Color:', 'arrowlogin'),
	'section' => 'arrowlogin_form_bg_section',
	'priority' => 10,
	'settings' => 'arrowlogin_form_bg_color',
)));
$wp_customize->add_setting( 'arrowlogin_form_style_width', array(
	'default' => '272',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'arrowlogin_form_style_width', array(
	'label' => __('Form Width:', 'arrowlogin'),
	'section' => 'arrowlogin_form_bg_section',
	'priority' => 15,
	'type' => "number",
	'settings' => 'arrowlogin_form_style_width',
));
$wp_customize->add_setting( 'arrowlogin_form_style_height', array(
	'default' => '188',
	'type' => 'option',
	'capability' => 'edit_theme_options',
));
$wp_customize->add_control( 'arrowlogin_form_style_height', array(
	'label' => __('Form Height:', 'arrowlogin'),
	'section' => 'arrowlogin_form_bg_section',
	'priority' => 20,
	'type' => "number",
	'settings' => 'arrowlogin_form_style_height',
));

}
function arrowlogin_Label_customizer_settings($wp_customize){

	$wp_customize->add_section( 'arrowlogin_label_section', array(
		'priority' => 30,
		'title' => __('Label', 'arrowlogin'),
		'panel' => 'arrowlogin_panel',
	));

	$wp_customize->add_setting('arrowlogin_lablel_remember_me_color', array(
		'default' => '#72777c',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_lablel_remember_me_color', array(
		'label' => __('<font size="3">Remember Me</font> <br/> Text Color:', 'arrowlogin'),
		'section' => 'arrowlogin_label_section',
		'priority' => 5,
		'settings' => 'arrowlogin_lablel_remember_me_color'
	)));


	$wp_customize->add_setting('arrowlogin_lablel_remember_me_hover_color', array(
		'default' => '#72777c',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_lablel_remember_me_hover_color', array(
		'label' => __('Hover Color:', 'arrowlogin'),
		'section' => 'arrowlogin_label_section',
		'priority' => 10,
		'settings' => 'arrowlogin_lablel_remember_me_hover_color'
	)));




	$wp_customize->add_setting('arrowlogin_lablel_lost_password_color', array(
		'default' => '#72777c',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_lablel_lost_password_color', array(
		'label' => __('<font size="3">Lost Password</font> <br/> Text Color:', 'arrowlogin'),
		'section' => 'arrowlogin_label_section',
		'priority' => 15,
		'settings' => 'arrowlogin_lablel_lost_password_color'
	)));

	$wp_customize->add_setting('arrowlogin_lablel_lost_password_hover_color', array(
		'default' => '#72777c',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_lablel_lost_password_hover_color', array(
		'label' => __('Hover Color:', 'arrowlogin'),
		'section' => 'arrowlogin_label_section',
		'priority' => 15,
		'settings' => 'arrowlogin_lablel_lost_password_hover_color'
	)));





	$wp_customize->add_setting('arrowlogin_lablel_back_color', array(
		'default' => '#72777c',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_lablel_back_color', array(
		'label' => __('<font size="3">Back to </font> <br/> Text Color:', 'arrowlogin'),
		'section' => 'arrowlogin_label_section',
		'priority' => 15,
		'settings' => 'arrowlogin_lablel_back_color'
	)));


	$wp_customize->add_setting('arrowlogin_lablel_back_hover_color', array(
		'default' => '#72777c',
		'type' => 'option',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'arrowlogin_lablel_back_hover_color', array(
		'label' => __('Hover Color:', 'arrowlogin'),
		'section' => 'arrowlogin_label_section',
		'priority' => 20,
		'settings' => 'arrowlogin_lablel_back_hover_color'
	)));





}

function arrowlogin_customizer(){

    //Logo
    $clickitlp_logo_path = get_option('arrowlogin_logo');
	$clickitlp_logo_width = get_option('arrowlogin_logo_width');
	$clickitlp_logo_height = get_option('arrowlogin_logo_height');
	//$clickitlp_logo_padding = get_option('arrowlogin_logo_padding');
	$clickitlp_logo_enable = get_option('arrowlogin_logo_enable');


	//Background
	$clickitlp_bg = get_option('arrowlogin_bg');
	$clickitlp_bg_color = get_option('arrowlogin_bg_color');
	$clickitlp_bg_video = get_option('arrowlogin_bg_video');



	$clickitlp_bg_video = wp_get_attachment_url( $clickitlp_bg_video );


	//Form
	$clickitlp_form_bg_img = get_option('arrowlogin_form_bg');
	$clickitlp_form_bg_color = get_option('arrowlogin_form_bg_color');
	$clickitlp_form_style_width =  get_option('arrowlogin_form_style_width');
	$clickitlp_form_style_height = get_option('arrowlogin_form_style_height');

//	$clickitlp_form_style_padding = get_option('arrowlogin_form_style_padding');
//	$clickitlp_form_style_border = get_option('arrowlogin_form_style_border');

	//input fields
	$clickitlp_field_style_width = get_option('arrowlogin_field_style_width');
	$clickitlp_field_style_margin = get_option('arrowlogin_field_style_margin');
	$clickitlp_field_style_ifbg = get_option('arrowlogin_field_style_ifbg');
	$clickitlp_field_style_ifc = get_option('arrowlogin_field_style_ifc');
	$clickitlp_field_style_lc = get_option('arrowlogin_field_style_lc');

	//submit button
	$clickitlp_button_bg = get_option('arrowlogin_button_bg');
	$clickitlp_button_color = get_option('arrowlogin_button_color');
	$clickitlp_button_hover_bg = get_option('arrowlogin_button_hover_bg');
//	$clickitlp_button_hover_border = get_option('arrowlogin_button_hover_border');
//	$clickitlp_button_border = get_option('arrowlogin_button_border');
//	$clickitlp_button_shadow = get_option('arrowlogin_button_shadow');
//	$clickitlp_other_textColor = get_option('arrowlogin_other_textColor');
//	$clickitlp_other_textColorH = get_option('arrowlogin_other_textColorH');


    //Label

	$arrowlogin_lablel_remember_me_color = get_option('arrowlogin_lablel_remember_me_color');
	$arrowlogin_lablel_remember_me_hover_color = get_option('arrowlogin_lablel_remember_me_hover_color');
	$arrowlogin_lablel_lost_password_color = get_option('arrowlogin_lablel_lost_password_color');
	$arrowlogin_lablel_lost_password_hover_color = get_option('arrowlogin_lablel_lost_password_hover_color');
	$arrowlogin_lablel_back_color = get_option('arrowlogin_lablel_back_color');
	$arrowlogin_lablel_back_hover_color = get_option('arrowlogin_lablel_back_hover_color');



	$clickitlp_other_css = get_option('arrowlogin_custom_css');

	$clickitlp_theme = get_option('arrowlogin_theme');
	$clickitlp_apply_theme = get_option('arrowlogin_apply_theme');
	update_option('arrowlogin_temp_theme',$clickitlp_theme);


	if($clickitlp_logo_enable=="hide"):
	?>
        <style>
            #login h1{
                display: none !important;
            }
        </style>
    <?php
    endif;


//    if($clickitlp_apply_theme=="theme1") {
//        ?>
<!--        <script>-->
<!--            console.log("the fuck happens here");-->
<!--        </script>-->
<!--        --><?php
//        delete_option( 'arrowlogin_apply_theme' );
//	    delete_option('arrowlogin_bg');
//	    delete_option('arrowlogin_bg_color');
//	    delete_option('arrowlogin_bg_video');
//
//    }
   	  	if($clickitlp_theme=="two") {

            ?>

            <style>

                <?php if($clickitlp_bg!=""||$clickitlp_bg_color!=""||$clickitlp_bg_video!=""):
				  arrowlogin_apply_custom_background_css($clickitlp_bg,$clickitlp_bg_color,$clickitlp_bg_video);
                 else:
    			?>

                html, html > body {
                    background: url(<?php echo plugins_url('images/template2_surreal_sunset_uhd.jpg',__FILE__)?>) center center repeat !important ;
                    background-size: cover  !important  ;
                }
                <?php endif;?>
                body{
                    background-size: cover !important ;
                    display: flex !important ;
                    align-items: stretch !important ;
                }
                <?php if($clickitlp_logo_path!=""):
			        arrowlogin_apply_custom_logo_css($clickitlp_logo_path,$clickitlp_logo_width,$clickitlp_logo_height);
			    endif;
                ?>
                #login{
                    display: block !important ;
                    box-sizing: border-box !important ;
                    padding: 20px 20px 0 20px !important ;
                    width: auto !important ;
                    max-width: 400px !important ;
                    margin: 0 !important ;
                    background: #fff !important ;
                    text-align: center !important ;
                }
                .login form{
                    border: none !important ;
                    box-shadow: none  !important  ;
                }

                .login form #wp-submit{
                    float: none !important ;
                    display: block !important ;
                    width: 100% !important ;
                    padding: 6px !important ;
                    border: none !important ;
                    box-shadow: none !important ;
                    border-radius: 30px !important ;
                    margin: 20px 0 !important ;
                    height: 40px !important ;
                    margin-top: 20px !important ;
                    background: #fff !important ;
                    color: #280112 !important ;
                    text-shadow: none !important ;
                    font-weight:bold !important ;

                    /*transition: background-color 0.2s ease !important ;*/

                    background: #eeeeee !important ; /* Old browsers */
                    background: -moz-linear-gradient(top, #eeeeee 0%, #cccccc 100%) !important ; /* FF3.6-15 */
                    background: -webkit-linear-gradient(top, #eeeeee 0%,#cccccc 100%) !important ; /* Chrome10-25,Safari5.1-6 */
                    background: linear-gradient(to bottom, #eeeeee 0%,#cccccc 100%) !important ; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                }

                .login form #wp-submit:hover{
                    background: #2f2e2f !important ;
                    color: #ffffff !important ;
                    box-shadow: none !important ;
                    border-bottom: none !important ;
                }

                .login form .forgetmenot{
                    float: none !important ;
                    display: block !important ;
                }

                .login form .forgetmenot input{
                    box-shadow: none !important ;

                }
                .login form{
                    text-align: center !important ;
                }
                .login form .input, .login form input[type=checkbox], .login input[type=text]{
                    text-align: center !important ;
                }


            </style>

        <?php
    }

	else if($clickitlp_theme=="one"){
		?>
        <style type = "text/css">

            <?php
            	arrowlogin_apply_custom_background_css($clickitlp_bg,$clickitlp_bg_color,$clickitlp_bg_video);
	        	arrowlogin_apply_custom_logo_css($clickitlp_logo_path,$clickitlp_logo_width,$clickitlp_logo_height);
	        ?>

            #loginform {
            <?php if ( !empty($clickitlp_form_bg_img) ): ?>
                background-image: url(<?php echo $clickitlp_form_bg_img; ?> ) !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_form_bg_color) ): ?>
                background-color: <?php echo $clickitlp_form_bg_color; ?> !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_form_style_height) ): ?>
                height: <?php echo $clickitlp_form_style_height; ?>px !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_form_style_padding) ): ?>
                padding: <?php echo $clickitlp_form_style_padding; ?> !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_form_style_border) ): ?>
                border: <?php echo $clickitlp_form_style_border; ?> !important;
            <?php endif; ?>

            }

            #login {
            <?php if ( !empty($clickitlp_form_style_width) ): ?>
                width: <?php echo $clickitlp_form_style_width; ?>px !important;
            <?php endif; ?>
            }

            .login form .input, .login input[type="text"] {
            <?php if ( !empty($clickitlp_field_style_width) ): ?>
                width: <?php echo $clickitlp_field_style_width; ?>px !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_field_style_margin) ): ?>
                margin: <?php echo $clickitlp_field_style_margin; ?> !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_field_style_ifbg) ): ?>
                background: <?php echo $clickitlp_field_style_ifbg; ?> !important;
            <?php endif; ?>

            <?php if ( !empty($clickitlp_field_style_ifc) ): ?>
                color: <?php echo $clickitlp_field_style_ifc; ?> !important;
            <?php endif; ?>

            }

            .login label {
            <?php if ( !empty($clickitlp_field_style_lc) ): ?>
                color: <?php echo $clickitlp_field_style_lc; ?> !important;
            <?php endif; ?>

            }



            .wp-core-ui .button-primary {
            <?php if( !empty($clickitlp_button_bg)) : ?>
                background: <?php echo $clickitlp_button_bg; ?> !important;
            <?php endif; ?>
            <?php if( !empty($clickitlp_button_border)) : ?>
                border-color: <?php echo $clickitlp_button_border; ?> !important;
            <?php endif; ?>
            <?php if( !empty($clickitlp_button_shadow)) : ?>
                box-shadow: 0px 1px 0px <?php echo $clickitlp_button_shadow; ?> inset, 0px 1px 0px rgba(0, 0, 0, 0.15);
            <?php endif; ?>
            <?php if( !empty($clickitlp_button_color)) : ?>
                color: <?php echo $clickitlp_button_color; ?> !important;
            <?php endif; ?>
            }

            .wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
            <?php if( !empty($clickitlp_button_hover_bg)) : ?>
                background: <?php echo $clickitlp_button_hover_bg; ?> !important;
            <?php endif; ?>
            <?php if( !empty($clickitlp_button_hover_border)) : ?>
                border-color: <?php echo $clickitlp_button_hover_border; ?> !important;
            <?php endif; ?>
            }








            .login #backtoblog a, .login #nav a {
            <?php if ( !empty($clickitlp_other_textColor) ): ?>
                color: <?php echo $clickitlp_other_textColor; ?> !important;
            <?php endif; ?>

            }

            .login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {
            <?php if ( !empty($clickitlp_other_textColorH) ): ?>
                color: <?php echo $clickitlp_other_textColorH; ?> !important;
            <?php endif; ?>

            }



            <?php if ( !empty($clickitlp_other_css) ): ?>
            <?php echo $clickitlp_other_css; ?>
            <?php endif; ?>

            #backtoblog a{
                color:<?php echo $arrowlogin_lablel_back_color?> !important;
            }

            #backtoblog a:hover{
                color:<?php echo $arrowlogin_lablel_back_hover_color?> !important;
            }


            label[for=rememberme]{
                color:<?php echo $arrowlogin_lablel_remember_me_color?> !important;
            }

            label[for=rememberme]:hover{
                color:<?php echo $arrowlogin_lablel_remember_me_hover_color?> !important;
            }

            #nav a{
                color:<?php echo $arrowlogin_lablel_lost_password_color?> !important;
            }

            #nav a:hover{
                color:<?php echo $arrowlogin_lablel_lost_password_hover_color?> !important;
            }



        </style>
		<?php

	}else{
		$clickitlp_theme="one";

	}

//	$arr=array(
//	    "arrowlogin_bg"=>$clickitlp_bg,
//		"arrowlogin_bg_color"=>$clickitlp_bg_color,
//		 "arrowlogin_field_style_width"=>$clickitlp_field_style_width,
//	    "arrowlogin_field_style_margin"=>$clickitlp_field_style_margin,
//	    "arrowlogin_field_style_ifc"=>$clickitlp_field_style_ifc,
//        "arrowlogin_field_style_ifbg"=>$clickitlp_field_style_ifbg,
//        "arrowlogin_button_bg"=>$clickitlp_button_bg,
//        "arrowlogin_button_color"=>$clickitlp_button_color,
//        "arrowlogin_button_hover_bg"=>$clickitlp_button_hover_bg,
//        "arrowlogin_form_bg"=>$clickitlp_form_bg_img,
//        "arrowlogin_form_bg_color"=>$clickitlp_form_bg_color,
//        "arrowlogin_form_style_width"=>$clickitlp_form_style_width,
//        "arrowlogin_form_style_height"=>arrowlogin_form_style_height,
//        "arrowlogin_lablel_remember_me_color"=>$arrowlogin_lablel_remember_me_color,
//        "arrowlogin_lablel_remember_me_hover_color"=>$arrowlogin_lablel_remember_me_hover_color,
//        "arrowlogin_lablel_lost_password_color"=>$arrowlogin_lablel_lost_password_color,
//        "arrowlogin_lablel_lost_password_hover_color"=>$arrowlogin_lablel_lost_password_hover_color,
//        "arrowlogin_lablel_back_color"=>$arrowlogin_lablel_back_color,
//        "arrowlogin_lablel_back_hover_color"=>$arrowlogin_lablel_back_hover_color,
//        "arrowlogin_bg_video"=>$clickitlp_bg_video,
//	    "arrowlogin_logo_enable"=>$clickitlp_logo_enable
//
//
//
//	);
//	update_option('arrowlogin_temp_changes',$arr);


}
function arrowlogin_apply_custom_form_css($clickitlp_form_bg_img,$clickitlp_form_bg_color,$clickitlp_form_style_width,$clickitlp_form_style_height){
	if($clickitlp_form_bg_img!=""):
		?>
        #loginform{
            background-image: url(<?php echo $clickitlp_form_bg_img?>) !important;
            width: <?php echo $clickitlp_form_style_width; ?>px !important;
            height: <?php echo $clickitlp_form_style_height; ?>px !important;

        }
        <?php
        else:
            ?>
	        #loginform{
	         background: <?php echo $clickitlp_form_bg_color?> !important;
             width: <?php echo $clickitlp_form_style_width; ?>px !important;
             height: <?php echo $clickitlp_form_style_height; ?>px !important;

            }
            <?php
            ;endif;

}
function arrowlogin_apply_custom_background_css($clickitlp_bg,$clickitlp_bg_color,$clickitlp_bg_video){
	$arrowlogin_bg_image_size = get_option('arrowlogin_bg_image_size');
	$arrowlogin_bg_repeat = get_option('arrowlogin_bg_repeat');

	if($clickitlp_bg!=""):
		?>

        html,body{
            background-image: url(<?php echo $clickitlp_bg?>) !important;
            background-size: <?php echo $arrowlogin_bg_image_size; ?> !important;
            background-repeat: <?php echo $arrowlogin_bg_repeat; ?> !important;
        }

    <?php endif;if($clickitlp_bg==""&&$clickitlp_bg_video!=""):
    ?>
            </style>
            <script>
              window.onload = function() {
                      document.body.innerHTML="<video autoplay loop id=\"arrowlogin_video-background\" muted plays-inline>\n"+
                         "  <source src=\"<?php echo $clickitlp_bg_video;?>\">\n"+
                         "</video>\n"+document.body.innerHTML;

              }
            </script>
            <style>
           body {
              margin: 0 !important ;
              padding: 0 !important ;
            /*  Background fallback in case of IE8 & down, or in case video doens't load, such as with slower connections  */
              background: #333 !important ;
              background-attachment: fixed !important ;
              background-size: <?php echo $arrowlogin_bg_image_size; ?> !important ;
            }

            /* The only rule that matters */
            #arrowlogin_video-background {
            /*  making the video fullscreen  */
              position: fixed !important ;
              right: 0 !important ;
              bottom: 0 !important ;
              min-width: 100% !important ;
              min-height: 100% !important ;
              width: auto !important ;
              height: auto !important ;
              z-index: -100 !important ;
            }

    <?php

    endif;if($clickitlp_bg==""&&$clickitlp_bg_video==""):?>

        html,body{
            background: <?php echo $clickitlp_bg_color?> !important;
        }

	    <?php endif;
}
function arrowlogin_apply_custom_logo_css($clickitlp_logo_path,$clickitlp_logo_width,$clickitlp_logo_height){
	?>
        body.login div#login h1 a {
            <?php if( !empty($clickitlp_logo_path)) : ?>
                background-image: url(<?php echo $clickitlp_logo_path; ?>) !important;
            <?php endif; ?>

            <?php if (!empty($clickitlp_logo_width)) :?>
                width: <?php echo $clickitlp_logo_width; ?>px !important;
            <?php endif; ?>

            <?php if (!empty($clickitlp_logo_height)) :?>
                height: <?php echo $clickitlp_logo_height; ?>px !important;
            <?php endif; ?>

            <?php if( !empty($clickitlp_logo_width) || !empty($clickitlp_logo_height)) : ?>
                background-size: <?php echo $clickitlp_logo_width; ?>px <?php echo $clickitlp_logo_height; ?>px !important;
            <?php endif; ?>

        }
	<?php
}



function arrowlogin_register_customizer_control_custom_radio_image( $wp_customize ){
	/*
	 * Failsafe is safe
	 */
	if ( ! isset( $wp_customize ) ) {
		return;
	}

	/**
	 * Create a Radio-Image control
	 *
	 * This class incorporates code from the Kirki Customizer Framework and from a tutorial
	 * written by Otto Wood.
	 *
	 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
	 * is licensed under the terms of the GNU GPL, Version 2 (or later).
	 *
	 * @link https://github.com/reduxframework/kirki/
	 * @link http://ottopress.com/2012/making-a-custom-control-for-the-theme-customizer/
	 */
	class arrowlogin_Custom_Radio_Image_Control extends WP_Customize_Control {

		/**
		 * Declare the control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'radio-image';

		/**
		 * Enqueue scripts and styles for the custom control.
		 *
		 * Scripts are hooked at {@see 'customize_controls_enqueue_scripts'}.
		 *
		 * Note, you can also enqueue stylesheets here as well. Stylesheets are hooked
		 * at 'customize_controls_print_styles'.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_script( 'jquery-ui-button' );
		}

		/**
		 * Render the control to be displayed in the Customizer.
		 */
		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;
			?>
            <span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
				<?php if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
			</span>
            <div id="input_<?php echo $this->id; ?>" class="image">
                <?php 
                	$count=0;
                	foreach ( $this->choices as $value => $label ) : ?>
                    <input class="image-select" onclick="clickFunction(event)" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo $this->id . $value; ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
                    <label for="<?php echo $this->id . $value; ?>">
                    <?php if($count>=2):?>
                    
                    <section id="arrowlogin_images_section">
  					<div class="arrowlogin_wrapper_div">
                       <div>
                    <?php 
					?>
					<a href="https://www.arrowplugins.com/login-page-customizer/" target="_blank">
					<?php
                	endif; ?>
                    
                        <img src="<?php echo esc_html( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
                    <?php if($count>=2):?>

                        <span class="arrowlogin_unlockpremimum_span">Unlock Premimum Features</span>
                   		</a>
                   		</div>
                    </div>
                	</section>
                	<?php 
                		endif;
                		$count=$count+1;
                	?>
                    </label>
                    </input>
				<?php endforeach; ?>
            </div>
            <script>
                function clickFunction(e){
                }
            </script>
            <script>jQuery(document).ready(function($) {
                    $( '[id="input_<?php echo $this->id; ?>"]' ).buttonset();

                });</script>
			<?php
		}
	}


	/**
	 * Radio Image control.
	 *
	 * - Control: Radio Image
	 * - Setting: Blog Layout
	 * - Sanitization: select
	 *
	 * Register "Theme_Slug_Custom_Radio_Image_Control" to be  used to configure
	 * the Blog Posts Index Layout setting.
	 *
	 * @uses $wp_customize->add_control() https://developer.wordpress.org/reference/classes/wp_customize_manager/add_control/
	 * @link $wp_customize->add_control() https://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
	 */
	$wp_customize->add_control(
		new arrowlogin_Custom_Radio_Image_Control(
		// $wp_customize object
			$wp_customize,
			// $id
			'arrowlogin_theme_selection',
			// $args
			array(
				'settings'		=> 'arrowlogin_theme',
				'section'		=> 'arrowlogin_theme_section',
				'label' => __('Theme:', 'arrowlogin'),
				'choices'		=> array(
					'one' 		=>  plugins_url('images/thumbnails/default.jpg',__FILE__) ,
					'two' 	=>  plugins_url('images/thumbnails/2.jpg',__FILE__),
					'three'	=>  plugins_url('images/thumbnails/3.jpg',__FILE__),
					'four' 		=> plugins_url('images/thumbnails/4.jpg',__FILE__),
					'five' 		=> plugins_url('images/thumbnails/5.jpg',__FILE__),
					'six' 		=>  plugins_url('images/thumbnails/6.jpg',__FILE__) ,
					'seven' 	=>  plugins_url('images/thumbnails/7.jpg',__FILE__),
					'eight'	=>  plugins_url('images/thumbnails/8.jpg',__FILE__)


				)
			)
		)

	);
	?>
	<?php

}

//add_action( 'wp_ajax_my_action', 'arrowlogin_update_theme_meta_value ' );
add_action('wp_ajax_arrowlogin_update_theme_meta_value', 'arrowlogin_update_theme_meta_value');
add_action('wp_ajax_nopriv_arrowlogin_update_theme_meta_value', 'arrowlogin_update_theme_meta_value');
function arrowlogin_update_theme_meta_value() {
	add_option('arrowlogin_apply_theme',"theme1");

//	arrowlogin_customizer();


	echo "asdasd";

	wp_die(); // this is required to terminate immediately and return a proper response
}

function arrowlogin_customizer_custom_control_css() {
	?>
    <style>
        .customize-control-radio-image .image.ui-buttonset input[type=radio] {
            height: auto;
        }
        .customize-control-radio-image .image.ui-buttonset label {
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .customize-control-radio-image .image.ui-buttonset label.ui-state-active {
            background: none;
        }
        .customize-control-radio-image .customize-control-radio-buttonset label {
            padding: 5px 10px;
            background: #f7f7f7;
            border-left: 1px solid #dedede;
            line-height: 35px;
        }
        .customize-control-radio-image label img {
            border: 1px solid #bbb;
            opacity: 1;
        }
        
        section#arrowlogin_images_section {
		  display: block;
		}

		section#arrowlogin_images_section .arrowlogin_wrapper_div {
		  text-align: center;
		  margin: 0 auto;
		}

		section#arrowlogin_images_section .arrowlogin_wrapper_div div {
		  display: inline-block;
		  position: relative;
		  background: black;
		}

		section#arrowlogin_images_section .arrowlogin_wrapper_div div span {
		  display: none;
		  position: absolute;
		  left: 50%;
		  top: 50%;
		  transform: translate(-50%,-50%);
		}

		section#arrowlogin_images_section .arrowlogin_wrapper_div div:hover span {
		    display: inline-block;
		}

		section#arrowlogin_images_section .arrowlogin_wrapper_div div img span {
		  font-size: 24px;
		  font-weight: 900;
		  font-family: Helvetica;
		  color: green;
		  display: table-cell;
		  text-align: center;
		  vertical-align: middle;
		}

		section#arrowlogin_images_section .arrowlogin_wrapper_div div img span.text {
		  color: white;
		  cursor: pointer;
		  height: 150px;
		  position: absolute;
		  opacity: 0;
		  left: 0;
		  top: 0;
		  display: table-cell;
		  text-align: center;
		  vertical-align: middle;
		}

        #customize-controls .customize-control-radio-image label img {
            width: 250px;
            height: auto;
            display: block;

        }


	 	.arrowlogin_unlockpremimum_span {
		  display: none;
		  color: white;
		  position: relative;
		  left: 50%;
		  top:	50%;
		  font-size: 24px;
		  transform: translate(-50%,-50%);		
	
		}
		
        .customize-control-radio-image label.ui-state-active img {
            background: #dedede;
            border-color: #000;
            opacity: 1;
        }
        .customize-control-radio-image label.ui-state-hover img {
            opacity: 0.2;
            border-color: #999;
           	display: inline-block;

        }
        .customize-control-radio-buttonset label.ui-corner-left {
            border-radius: 3px 0 0 3px;
            border-left: 0;
        }
        .customize-control-radio-buttonset label.ui-corner-right {
            border-radius: 0 3px 3px 0;
        }
    </style>
	<?php
}
add_action( 'customize_register', 'arrowlogin_customize_register' );
add_action( 'customize_controls_print_styles', 'arrowlogin_customizer_custom_control_css' );


add_action('wp_ajax_arrowlogin_save_meta_values_on_publish_click', 'arrowlogin_save_meta_values_on_publish_click');
add_action('wp_ajax_nopriv_arrowlogin_save_meta_values_on_publish_click', 'arrowlogin_save_meta_values_on_publish_click');


function arrowlogin_save_meta_values_on_publish_click(){
	$arr=get_option('arrowlogin_temp_changes');

	foreach($arr as $x => $x_value) {
		update_option($x,$x_value);

	}

	echo $arr['arrowlogin_bg'];

	wp_die();
}


add_action( 'login_enqueue_scripts', 'arrowlogin_customizer' );

function arrowlogin_login_logo_url() {
	//arrowlogin_hideOthers();

	return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'arrowlogin_login_logo_url' );

function arrowlogin_login_logo_url_title() {
	$title = get_bloginfo( 'name', 'display' );
	//arrowlogin_hideOthers();

	return $title;
}
add_filter( 'login_headertitle', 'arrowlogin_login_logo_url_title' );

add_action( 'customize_controls_enqueue_scripts', function(){

	wp_enqueue_script( 'arrowlogin-customizer-controls', plugins_url('arrowlogin-customize-controls.js',__FILE__), array( 'jquery' ), '20170412', true );

} );

?>