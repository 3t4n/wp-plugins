<?php
?>

<div id="woocommerce-coupon-data">
	<div id="coupon_options" class="panel-wrap coupon_data">

		<div class="wc-tabs-back"></div>
		<ul class="coupon_data_tabs wc-tabs" style="display:none;">
			<?php
			$bump_data_tabs = array
			(
				'box' => array
				(
					'label'  => __( "Box", 'molongui-bump-offer' ),
					'target' => 'box_styling_tab',
					'class'  => '',
				),
				'lead' => array
				(
					'label'  => __( "Lead", 'molongui-bump-offer' ),
					'target' => 'lead_styling_tab',
					'class'  => '',
				),
				'intro' => array
				(
					'label'  => __( "Intro", 'molongui-bump-offer' ),
					'target' => 'intro_styling_tab',
					'class'  => '',
				),
				'body' => array
				(
					'label'  => __( "Body", 'molongui-bump-offer' ),
					'target' => 'body_styling_tab',
					'class'  => '',
				),
				'media' => array
				(
					'label'  => __( "Media", 'molongui-bump-offer' ),
					'target' => 'media_styling_tab',
					'class'  => '',
				),
			);
			$bump_data_tabs = apply_filters( 'mbo/bump/styling/tabs', $bump_data_tabs );

			foreach ( $bump_data_tabs as $key => $tab )
			{
				?>
				<li class="<?php echo $key; ?>_options <?php echo $key; ?>_tab <?php echo implode( ' ' , (array) $tab['class'] ); ?>">
					<a href="#<?php echo $tab['target']; ?>"><span><?php echo esc_html( $tab['label'] ); ?></span></a>
				</li>
				<?php
			}
			?>
		</ul>

		<!-- Box styles tab -->
		<div id="box_styling_tab" class="panel woocommerce_options_panel">

            <?php

            echo '<div class="options_group">';
			woocommerce_wp_select( array
            (
                'id'          => '_molongui_bump_box_border_style',
                'value'       => mbo_get_setting_value( $bump, 'box_border_style', $options, $defaults, true ),
                'label'       => __( "Border Style", 'molongui-bump-offer' ),
                'desc_tip'    => true,
                'description' => __( "Choose an style for the box border.", 'molongui-bump-offer' ),
                'options'     => array
                (
                    'solid'  => __( "Solid" , 'molongui-bump-offer' ),
                    'dashed' => __( "Dashed", 'molongui-bump-offer' ),
                    'dotted' => __( "Dotted", 'molongui-bump-offer' ),
                    'double' => __( "Double", 'molongui-bump-offer' ),
                ),
            ));
			woocommerce_wp_text_input( array
			(
				'id'                => '_molongui_bump_box_border_width',
                'value'             => mbo_get_setting_value( $bump, 'box_border_width', $options, $defaults, true ),
				'label'             => __( "Border Width", 'molongui-bump-offer' ),
				'desc_tip'          => true,
				'description'       => __( "Set the box border width.", 'molongui-bump-offer' ),
				'type'              => 'number',
				'custom_attributes' => array
				(
					'step' =>  1,
					'min'  =>  0,
					'max'  => 50,
				),
			));
            woocommerce_wp_text_input( array
            (
	            'id'          => '_molongui_bump_box_border_color',
                'value'       => mbo_get_setting_value( $bump, 'box_border_color', $options, $defaults, true ),
	            'label'       => __( "Border Color", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
	            'type'        => 'text',
	            'class'       => 'colorpicker',
            ));
            woocommerce_wp_text_input( array
            (
                'id'                => '_molongui_bump_box_border_radius',
                'value'             => mbo_get_setting_value( $bump, 'box_border_radius', $options, $defaults, true ),
                'label'             => __( "Border Radius", 'molongui-bump-offer' ),
                'desc_tip'          => true,
                'description'       => __( "Set the box border radius.", 'molongui-bump-offer' ),
                'type'              => 'number',
                'custom_attributes' => array
                (
                    'step' =>  1,
                    'min'  =>  0,
                    'max'  => 20,
                ),
            ));
            woocommerce_wp_select( array
            (
                'id'          => '_molongui_bump_box_border_animation',
                'value'       => mbo_get_setting_value( $bump, 'box_border_animation', $options, $defaults, true ),
                'label'       => __( "Border Animation", 'molongui-bump-offer' ) . mbo_premium_tag(),
                'desc_tip'    => true,
                'description' => __( "Choose an effect to animate the box border.", 'molongui-bump-offer' ),
                'options'     => array
                (
                    'none'     => __( "None"            , 'molongui-bump-offer' ),
                    'blink'    => __( "Blink"           , 'molongui-bump-offer' ),
                    'rotate'   => __( "Dashed Rotating" , 'molongui-bump-offer' ),
                    'toggle'   => __( "Color Toggle"    , 'molongui-bump-offer' ),
                    'gradient' => __( "Waving Gradient" , 'molongui-bump-offer' ),
                    'rainbow'  => __( "Rainbow Rotating", 'molongui-bump-offer' ),
                    'skewed'   => __( "Dancing Skewed"  , 'molongui-bump-offer' ),
                ),
            ));

            echo '</div><div class="options_group">';
            woocommerce_wp_text_input( array
            (
	            'id'          => '_molongui_bump_box_bg_color',
                'value'       => mbo_get_setting_value( $bump, 'box_bg_color', $options, $defaults, true ),
	            'label'       => __( "Background Color", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
	            'description' => '',
	            'type'        => 'text',
	            'class'       => 'colorpicker',
            ));
            woocommerce_wp_checkbox( array
            (
	            'id'          => '_molongui_bump_box_bg_transparent',
                'value'       => mbo_get_setting_value( $bump, 'box_bg_transparent', $options, $defaults, true ),
	            'label'       => __( "Transparent Background", 'molongui-bump-offer' ),
	            'description' => __( "Check this box to remove any color from the box background.", 'molongui-bump-offer' ),
	            'cbvalue'     => 1,
            ));

            echo '</div><div class="options_group">';
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_box_align',
                'value'       => mbo_get_setting_value( $bump, 'box_align', $options, $defaults, true ),
	            'label'       => __( "Alignment", 'molongui-bump-offer' ),
	            'desc_tip'    => true,
	            'description' => __( "How to align the box within its container if there is surrounding space.", 'molongui-bump-offer' ),
	            'options'     => array
	            (
		            'start'  => __( "Left"  , 'molongui-bump-offer' ),
		            'center' => __( "Center", 'molongui-bump-offer' ),
		            'end'    => __( "Right" , 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_box_width',
                'value'             => mbo_get_setting_value( $bump, 'box_width', $options, $defaults, true ),
	            'label'             => __( "Width", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Box width in %.", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>  10,
		            'max'  => 100,
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_box_vertical_margin',
                'value'             => mbo_get_setting_value( $bump, 'box_vertical_margin', $options, $defaults, true ),
	            'label'             => __( "Vertical Spacing", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Spacing to add above and below the box (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 300,
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_box_horizontal_margin',
                'value'             => mbo_get_setting_value( $bump, 'box_horizontal_margin', $options, $defaults, true ),
	            'label'             => __( "Horizontal Spacing", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Spacing to add on the sides of the box (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 300,
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_box_inner_padding',
                'value'             => mbo_get_setting_value( $bump, 'box_inner_padding', $options, $defaults, true ),
	            'label'             => __( "Inner Padding", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Space to add within the box (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 250,
	            ),
            ));

			echo '</div>';
			do_action( 'mbo/bump/box/settings', $bump->ID, $bump );

			?>

		</div><!-- !Box styles tab -->

		<!-- Lead styles tab -->
		<div id="lead_styling_tab" class="panel woocommerce_options_panel">

			<?php

    		echo '<div class="options_group">';
			woocommerce_wp_text_input( array
			(
				'id'          => '_molongui_bump_lead_bg_color',
                'value'       => mbo_get_setting_value( $bump, 'lead_bg_color', $options, $defaults, true ),
				'label'       => __( "Background color", 'molongui-bump-offer' ),
				'desc_tip'    => false,
	            'description' => '',
				'type'        => 'text',
				'class'       => 'colorpicker',
			));
			woocommerce_wp_checkbox( array
			(
				'id'          => '_molongui_bump_lead_bg_transparent',
                'value'       => mbo_get_setting_value( $bump, 'lead_bg_transparent', $options, $defaults, true ),
				'label'       => __( "Transparent background", 'molongui-bump-offer' ),
				'description' => __( "Check this box to remove any color from the lead background.", 'molongui-bump-offer' ),
				'cbvalue'     => 1,
			));

			echo '</div><div class="options_group">';
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_lead_arrow_icon',
                'value'       => mbo_get_setting_value( $bump, 'lead_arrow_icon', $options, $defaults, true ),
				'label'       => __( "Arrow icon", 'molongui-bump-offer' ),
				'desc_tip'    => 'true',
				'description' => __( "Choose the icon to be used as arrow.", 'molongui-bump-offer' ),
				'options'     => array
				(
					'arrow-none' => __( "None"   , 'molongui-bump-offer' ),
					'arrow-1'    => __( "Icon 1" , 'molongui-bump-offer' ),
					'arrow-2'    => __( "Icon 2" , 'molongui-bump-offer' ),
					'arrow-3'    => __( "Icon 3" , 'molongui-bump-offer' ),
					'arrow-4'    => __( "Icon 4" , 'molongui-bump-offer' ),
					'arrow-5'    => __( "Icon 5" , 'molongui-bump-offer' ),
					'arrow-6'    => __( "Icon 6" , 'molongui-bump-offer' ),
					'arrow-7'    => __( "Icon 7" , 'molongui-bump-offer' ),
					'arrow-8'    => __( "Icon 8" , 'molongui-bump-offer' ),
					'arrow-9'    => __( "Icon 9" , 'molongui-bump-offer' ),
					'arrow-10'   => __( "Icon 10", 'molongui-bump-offer' ),
					'arrow-11'   => __( "Icon 11", 'molongui-bump-offer' ),
					'arrow-12'   => __( "Icon 12", 'molongui-bump-offer' ),
					'arrow-13'   => __( "Icon 13", 'molongui-bump-offer' ),
					'arrow-14'   => __( "Icon 14", 'molongui-bump-offer' ),
					'arrow-15'   => __( "Icon 15", 'molongui-bump-offer' ),
					'arrow-16'   => __( "Icon 16", 'molongui-bump-offer' ),
					'arrow-17'   => __( "Icon 17", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_checkbox( array
			(
				'id'          => '_molongui_bump_lead_arrow_blink',
                'value'       => mbo_get_setting_value( $bump, 'lead_arrow_blink', $options, $defaults, true ),
				'label'       => __( "Make the arrow blink", 'molongui-bump-offer' ),
				'description' => __( "Check this box if you want the arrow blink to catch the attention of your customers.", 'molongui-bump-offer' ),
				'cbvalue'     => 1,
			));

			echo '</div><div class="options_group">';
			woocommerce_wp_checkbox( array
			(
				'id'          => '_molongui_bump_cb_shadow',
                'value'       => mbo_get_setting_value( $bump, 'cb_shadow', $options, $defaults, true ),
				'label'       => __( "Checkbox shadow", 'molongui-bump-offer' ),
				'description' => __( "Add a shadow to the checkbox.", 'molongui-bump-offer' ),
				'cbvalue'     => 1,
			));

			echo '</div><div class="options_group">';
			woocommerce_wp_text_input( array
			(
				'id'                => '_molongui_bump_lead_font_size',
                'value'             => mbo_get_setting_value( $bump, 'lead_font_size', $options, $defaults, true ),
				'label'             => __( "Font size", 'molongui-bump-offer' ),
				'desc_tip'          => true,
				'description'       => __( "The font size to use for the lead text.", 'molongui-bump-offer' ),
				'type'              => 'number',
				'custom_attributes' => array
				(
					'step' =>  1,
					'min'  =>  8,
					'max'  => 90,
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_lead_font_weight',
                'value'       => mbo_get_setting_value( $bump, 'lead_font_weight', $options, $defaults, true ),
				'label'       => __( "Font weight", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'normal'  => __( "Normal" , 'molongui-bump-offer' ),
					'bold'    => __( "Bold"   , 'molongui-bump-offer' ),
					'bolder'  => __( "Bolder" , 'molongui-bump-offer' ),
					'lighter' => __( "Lighter", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_lead_text_decoration',
                'value'       => mbo_get_setting_value( $bump, 'lead_text_decoration', $options, $defaults, true ),
				'label'       => __( "Text decoration", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'none'             => __( "None"            , 'molongui-bump-offer' ),
					'underline'        => __( "Underline"       , 'molongui-bump-offer' ),
					'underline wavy'   => __( "Underline wavy"  , 'molongui-bump-offer' ),
					'underline dotted' => __( "Underline dotted", 'molongui-bump-offer' ),
					'underline double' => __( "Underline double", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_lead_text_transform',
                'value'       => mbo_get_setting_value( $bump, 'lead_text_transform', $options, $defaults, true ),
				'label'       => __( "Text transform", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'none'       => __( "None"      , 'molongui-bump-offer' ),
					'uppercase'  => __( "Uppercase" , 'molongui-bump-offer' ),
					'lowercase'  => __( "Lowercase" , 'molongui-bump-offer' ),
					'capitalize' => __( "Capitalize", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_text_input( array
			(
				'id'          => '_molongui_bump_lead_text_color',
                'value'       => mbo_get_setting_value( $bump, 'lead_text_color', $options, $defaults, true ),
				'label'       => __( "Text color", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'type'        => 'text',
				'class'       => 'colorpicker',

			));

			echo '</div>';
			do_action( 'mbo/bump/lead/settings', $bump->ID, $bump );

			?>

		</div><!-- !Lead styles tab -->

		<!-- Intro styles tab -->
		<div id="intro_styling_tab" class="panel woocommerce_options_panel">

			<?php

			echo '<div class="options_group">';
			woocommerce_wp_text_input( array
			(
				'id'                => '_molongui_bump_intro_font_size',
                'value'             => mbo_get_setting_value( $bump, 'intro_font_size', $options, $defaults, true ),
				'label'             => __( "Font size", 'molongui-bump-offer' ),
				'desc_tip'          => true,
				'description'       => __( "The font size to use for the intro text.", 'molongui-bump-offer' ),
				'type'              => 'number',
				'custom_attributes' => array
				(
					'step' =>  1,
					'min'  =>  8,
					'max'  => 90,
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_intro_font_weight',
                'value'       => mbo_get_setting_value( $bump, 'intro_font_weight', $options, $defaults, true ),
				'label'       => __( "Font weight", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'normal'  => __( "Normal" , 'molongui-bump-offer' ),
					'bold'    => __( "Bold"   , 'molongui-bump-offer' ),
					'bolder'  => __( "Bolder" , 'molongui-bump-offer' ),
					'lighter' => __( "Lighter", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_intro_text_decoration',
                'value'       => mbo_get_setting_value( $bump, 'intro_text_decoration', $options, $defaults, true ),
				'label'       => __( "Text decoration", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'none'             => __( "None"            , 'molongui-bump-offer' ),
					'underline'        => __( "Underline"       , 'molongui-bump-offer' ),
					'underline wavy'   => __( "Underline wavy"  , 'molongui-bump-offer' ),
					'underline dotted' => __( "Underline dotted", 'molongui-bump-offer' ),
					'underline double' => __( "Underline double", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_intro_text_transform',
                'value'       => mbo_get_setting_value( $bump, 'intro_text_transform', $options, $defaults, true ),
				'label'       => __( "Text transform", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'none'       => __( "None"      , 'molongui-bump-offer' ),
					'uppercase'  => __( "Uppercase" , 'molongui-bump-offer' ),
					'lowercase'  => __( "Lowercase" , 'molongui-bump-offer' ),
					'capitalize' => __( "Capitalize", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_select( array
			(
				'id'          => '_molongui_bump_intro_text_align',
                'value'       => mbo_get_setting_value( $bump, 'intro_text_align', $options, $defaults, true ),
				'label'       => __( "Text alignment", 'molongui-bump-offer' ),
				'desc_tip'    => false,
				'description' => '',
				'options'     => array
				(
					'left'    => __( "Left"   , 'molongui-bump-offer' ),
					'center'  => __( "Center" , 'molongui-bump-offer' ),
					'right'   => __( "Right"  , 'molongui-bump-offer' ),
					'justify' => __( "Justify", 'molongui-bump-offer' ),
				),
			));
			woocommerce_wp_text_input( array
			(
				'id'          => '_molongui_bump_intro_text_color',
                'value'       => mbo_get_setting_value( $bump, 'intro_text_color', $options, $defaults, true ),
				'label'       => __( "Text color", 'molongui-bump-offer' ),
				'desc_tip'    => false,
	            'description' => '',
				'type'        => 'text',
				'class'       => 'colorpicker',
			));

			echo '</div><div class="options_group">';
			woocommerce_wp_text_input( array
			(
				'id'                => '_molongui_bump_intro_padding_top',
                'value'             => mbo_get_setting_value( $bump, 'intro_padding_top', $options, $defaults, true ),
				'label'             => __( "Top padding", 'molongui-bump-offer' ),
				'desc_tip'          => true,
				'description'       => __( "Space to add above the intro text (in 'px').", 'molongui-bump-offer' ),
				'type'              => 'number',
				'custom_attributes' => array
				(
					'step' => 1,
					'min'  => 0,
				),
			));
			woocommerce_wp_text_input( array
			(
				'id'                => '_molongui_bump_intro_padding_bottom',
                'value'             => mbo_get_setting_value( $bump, 'intro_padding_bottom', $options, $defaults, true ),
				'label'             => __( "Bottom padding", 'molongui-bump-offer' ),
				'desc_tip'          => true,
				'description'       => __( "Space to add below the intro text (in 'px').", 'molongui-bump-offer' ),
				'type'              => 'number',
				'custom_attributes' => array
				(
					'step' => 1,
					'min'  => 0,
				),
			));
            woocommerce_wp_text_input( array
            (
                'id'                => '_molongui_bump_intro_padding_left',
                'value'             => mbo_get_setting_value( $bump, 'intro_padding_left', $options, $defaults, true ),
                'label'             => __( "Left padding", 'molongui-bump-offer' ),
                'desc_tip'          => true,
                'description'       => __( "Space to add on the left of the intro text (in 'px').", 'molongui-bump-offer' ),
                'type'              => 'number',
                'custom_attributes' => array
                (
                    'step' => 1,
                    'min'  => 0,
                ),
            ));
            woocommerce_wp_text_input( array
            (
                'id'                => '_molongui_bump_intro_padding_right',
                'value'             => mbo_get_setting_value( $bump, 'intro_padding_right', $options, $defaults, true ),
                'label'             => __( "Right padding", 'molongui-bump-offer' ),
                'desc_tip'          => true,
                'description'       => __( "Space to add on the right of the intro text (in 'px').", 'molongui-bump-offer' ),
                'type'              => 'number',
                'custom_attributes' => array
                (
                    'step' => 1,
                    'min'  => 0,
                ),
            ));

			echo '</div>';
			do_action( 'mbo/bump/intro/settings', $bump->ID, $bump );

			?>

		</div><!-- !Intro styles tab -->

		<!-- Body styles tab -->
		<div id="body_styling_tab" class="panel woocommerce_options_panel">

            <?php

            echo '<div class="options_group">';
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_body_font_size',
                'value'             => mbo_get_setting_value( $bump, 'body_font_size', $options, $defaults, true ),
	            'label'             => __( "Font size", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "The font size to use for the body text.", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>  1,
		            'min'  =>  8,
		            'max'  => 90,
	            ),
            ));
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_body_font_weight',
                'value'       => mbo_get_setting_value( $bump, 'body_font_weight', $options, $defaults, true ),
	            'label'       => __( "Font weight", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
                'description' => '',
	            'options'     => array
	            (
                    'normal'  => __( "Normal" , 'molongui-bump-offer' ),
                    'bold'    => __( "Bold"   , 'molongui-bump-offer' ),
                    'bolder'  => __( "Bolder" , 'molongui-bump-offer' ),
                    'lighter' => __( "Lighter", 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_body_text_decoration',
                'value'       => mbo_get_setting_value( $bump, 'body_text_decoration', $options, $defaults, true ),
	            'label'       => __( "Text decoration", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
                'description' => '',
	            'options'     => array
	            (
                    'none'             => __( "None"            , 'molongui-bump-offer' ),
                    'underline'        => __( "Underline"       , 'molongui-bump-offer' ),
                    'underline wavy'   => __( "Underline wavy"  , 'molongui-bump-offer' ),
                    'underline dotted' => __( "Underline dotted", 'molongui-bump-offer' ),
                    'underline double' => __( "Underline double", 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_body_text_transform',
                'value'       => mbo_get_setting_value( $bump, 'body_text_transform', $options, $defaults, true ),
	            'label'       => __( "Text transform", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
                'description' => '',
	            'options'     => array
	            (
                    'none'       => __( "None"      , 'molongui-bump-offer' ),
                    'uppercase'  => __( "Uppercase" , 'molongui-bump-offer' ),
                    'lowercase'  => __( "Lowercase" , 'molongui-bump-offer' ),
                    'capitalize' => __( "Capitalize", 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_body_text_align',
                'value'       => mbo_get_setting_value( $bump, 'body_text_align', $options, $defaults, true ),
	            'label'       => __( "Text alignment", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
                'description' => '',
	            'options'     => array
	            (
                    'left'    => __( "Left"   , 'molongui-bump-offer' ),
                    'center'  => __( "Center" , 'molongui-bump-offer' ),
                    'right'   => __( "Right"  , 'molongui-bump-offer' ),
                    'justify' => __( "Justify", 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'          => '_molongui_bump_body_text_color',
                'value'       => mbo_get_setting_value( $bump, 'body_text_color', $options, $defaults, true ),
	            'label'       => __( "Text color", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
                'description' => '',
	            'type'        => 'text',
	            'class'       => 'colorpicker',
            ));

            echo '</div><div class="options_group">';
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_body_padding_top',
                'value'             => mbo_get_setting_value( $bump, 'body_padding_top', $options, $defaults, true ),
	            'label'             => __( "Top padding", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Space to add above the body text (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 300,
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_body_padding_bottom',
                'value'             => mbo_get_setting_value( $bump, 'body_padding_bottom', $options, $defaults, true ),
	            'label'             => __( "Bottom padding", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Space to add below the body text (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 300,
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_body_padding_left',
                'value'             => mbo_get_setting_value( $bump, 'body_padding_left', $options, $defaults, true ),
	            'label'             => __( "Left padding", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Space to add on the left of the body text (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 300,
	            ),
            ));
            woocommerce_wp_text_input( array
            (
	            'id'                => '_molongui_bump_body_padding_right',
                'value'             => mbo_get_setting_value( $bump, 'padding_right', $options, $defaults, true ),
	            'label'             => __( "Right padding", 'molongui-bump-offer' ),
	            'desc_tip'          => true,
	            'description'       => __( "Space to add on the right of the body text (in 'px').", 'molongui-bump-offer' ),
	            'type'              => 'number',
	            'custom_attributes' => array
	            (
		            'step' =>   1,
		            'min'  =>   0,
		            'max'  => 300,
	            ),
            ));

            echo '</div>';
			do_action( 'mbo/bump/body/settings', $bump->ID, $bump );

			?>

		</div><!-- !Body styles tab -->

		<!-- Media styles tab -->
		<div id="media_styling_tab" class="panel woocommerce_options_panel">

            <?php

            echo '<div class="options_group">';
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_image_position',
                'value'       => mbo_get_setting_value( $bump, 'image_position', $options, $defaults, true ),
	            'label'       => __( "Position", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
                'description' => '',
	            'options'     => array
	            (
		            'above' => __( "Above", 'molongui-bump-offer' ),
		            'right' => __( "Right", 'molongui-bump-offer' ),
		            'below' => __( "Below", 'molongui-bump-offer' ),
		            'left'  => __( "Left" , 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_image_align',
                'value'       => mbo_get_setting_value( $bump, 'image_align', $options, $defaults, true ),
	            'label'       => __( "Align", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
	            'description' => '',
	            'options'     => array
	            (
                    'start'  => __( "Start" , 'molongui-bump-offer' ),
                    'center' => __( "Center", 'molongui-bump-offer' ),
		            'end'    => __( "End"   , 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_text_input( array
            (
                'id'                => '_molongui_bump_image_size',
                'value'             => mbo_get_setting_value( $bump, 'image_size', $options, $defaults, true ),
                'label'             => __( "Size", 'molongui-bump-offer' ),
                'desc_tip'          => true,
                'description'       => '',
                'type'              => 'number',
                'custom_attributes' => array
                (
                    'step' =>  10,
                    'min'  =>  10,
                    'max'  => 100,
                ),
            ));
            woocommerce_wp_select( array
            (
	            'id'          => '_molongui_bump_image_color',
                'value'       => mbo_get_setting_value( $bump, 'image_color', $options, $defaults, true ),
	            'label'       => __( "Color", 'molongui-bump-offer' ),
	            'desc_tip'    => false,
	            'description' => '',
	            'options'     => array
	            (
                    'none'      => __( "Auto"     , 'molongui-bump-offer' ),
                    'grayscale' => __( "Grayscale", 'molongui-bump-offer' ),
                    'sepia'     => __( "Sepia"    , 'molongui-bump-offer' ),
	            ),
            ));
            woocommerce_wp_checkbox( array
            (
                'id'          => '_molongui_bump_image_responsive',
                'value'       => mbo_get_setting_value( $bump, 'image_responsive', $options, $defaults, true ),
                'label'       => __( "Responsiveness", 'molongui-bump-offer' ),
                'description' => __( "Automatically place media at the top/bottom when box container is smaller than 500px. This makes the bump offer look nice on every device", 'molongui-bump-offer' ),
                'cbvalue'     => true,
            ));

            echo '</div>';
			do_action( 'mbo/bump/image/settings', $bump->ID, $bump );

			?>

		</div><!-- !Image styles tab -->

		<?php
        do_action( 'mbo/bump/styling/panels', $bump->ID, $bump ); ?>

		<div class="clear"></div>

	</div><!-- !.panel-wrap -->
</div><!-- !#woocommerce-coupon-data -->