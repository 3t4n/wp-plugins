<?php
/*
Widget Name: RA Button
Description: A simple button widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RAWB_Button_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'rawb-button',
            __( 'RA Button', 'ra-widgets-bundle' ),
            array(
                'description' => __( 'A simple button widget', 'ra-widgets-bundle' ),
            ),
            array(),
            array(
				'text' => array(
					'type' => 'text',
					'label' => __( 'Button text', 'ra-widgets-bundle' ),
				),
				'class' => array(
					'type' => 'text',
					'label' => __( 'Button class', 'ra-widgets-bundle' ),
				),
				'url' => array(
					'type' => 'link',
					'label' => __( 'URL', 'ra-widgets-bundle' )
				),
				'target' => array(
					'type' => 'select',
					'label' => __( 'Target', 'ra-widgets-bundle' ),
					'default' => '_self',
					'options' => array(
						'_self' => __( 'Self', 'ra-widgets-bundle' ),
						'_blank' => __( 'Blank', 'ra-widgets-bundle' )
					)
				),
				'attributes' => array(
					'type' => 'repeater',
					'label' => __('Add Attribute', 'ra-widgets-bundle'),
					'item_name' => __('Attribute', 'ra-widgets-bundle'),
					'item_label' => array(
						'selector' => "[id*='attribute']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'attribute' => array(
							'type' => 'text',
							'label' => __( 'Attribute', 'ra-widgets-bundle' ),
							'default' => ''
						),
						'value' => array(
							'type' => 'text',
							'label' => __('Value', 'ra-widgets-bundle'),
							'default' => '',
						)
					)
				),
				'settings' => array(
					'type' => 'section',
					'label' => __( 'Button Settings', 'ra-widgets-bundle' ),
					'hide' => true,
					'fields' => array(
						'design' => array(
							'type' => 'select',
							'label' => __( 'Design', 'ra-widgets-bundle' ),
							'options' => array(
								'flat' => __( 'Flat', 'ra-widgets-bundle' ),
								'wire' => __( 'Wire', 'ra-widgets-bundle' ),
								'rounded' => __( 'Rounded', 'ra-widgets-bundle' ),
								'none' => __( 'None', 'ra-widgets-bundle' )
							),
							'default' => 'rounded'
						),
						'background' => array(
							'type' => 'color',
							'label' => __( 'Background color', 'ra-widgets-bundle' ),
						),
						'background_hover' => array(
							'type' => 'color',
							'label' => __( 'Background hover color', 'ra-widgets-bundle' )
						),
						'text_size' => array(
							'type' => 'number',
							'label' => __( 'Text size', 'ra-widgets-bundle' ),
							'default' => '16'
						),
						'text_color' => array(
							'type' => 'color',
							'label' => __( 'Text color', 'ra-widgets-bundle' ),
							'default' => '#fff'
						),
						'text_hover' => array(
							'type' => 'color',
							'label' => __( 'Text hover color', 'ra-widgets-bundle' ),
							'default' => '#fff'
						),
						'border' => array(
							'type' => 'number',
							'label' => __( 'Border Size', 'ra-widgets-bundle' ),
							'default' => '1'
						),
						'border_radius' => array(
							'type' => 'number',
							'label' => __( 'Border radius', 'ra-widgets-bundle' ),
							'default' => '3'
						),
						'padding' => array(
							'type' => 'number',
							'label' => __( 'Top &amp; Bottom Padding', 'ra-widgets-bundle' ),
							'default' => ''
						),
						'width' => array(
							'type' => 'number',
							'label' => __( 'Width', 'ra-widgets-bundle' )
						)
					)
				),
				'icon' => array(
					'type' => 'section',
					'label' => __( 'Icon settings', 'ra-widgets-bundle' ),
					'hide' => true,
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __( 'Button icon', 'ra-widgets-bundle' )
						),
						'size' => array(
							'type' => 'number',
							'label' => __( 'Icon size', 'ra-widgets-bundle' ),
							'default' => '16'
						),
						'color' => array(
							'type' => 'color',
							'label' => __( 'Color', 'ra-widgets-bundle' ),
							'default' => '#fff'
						),
						'color_hover' => array(
							'type' => 'color',
							'label' => __( 'Color hover', 'ra-widgets-bundle' ),
							'default' => '#fff'
						),
						'position' => array(
							'type' => 'select',
							'label' => __( 'Icon position', 'ra-widgets-bundle' ),
							'default' => 'left',
							'options' => array(
								'left' => __( 'Left', 'ra-widgets-bundle' ),
								'right' => __( 'Right', 'ra-widgets-bundle' ),
								'center' => __( 'Center', 'ra-widgets-bundle' )
							)
						)
					)
				),
				'template' => array(
					'type' => 'select',
					'label' => __( 'Template', 'ra-widgets-bundle' ),
					'default' => 'none',
					'options' => array(
						'default' => __( 'Default', 'ra-widgets-bundle' ),
					)
				)
			),
            plugin_dir_path( __FILE__ ) . 'widgets/'
        );
    }

	function get_template_variables( $instance, $args ) {
		$variables = array(
			'title' => $instance['text'],
			'class' => $instance['class'],
			'target' => $instance['target'],
			'url' => $instance['url'],
			'design' => $instance['settings']['design'],
			'background' => $instance['settings']['background'],
			'background_hover' => $instance['settings']['background_hover'],
			'text_color' => $instance['settings']['text_color'],
			'text_hover' => $instance['settings']['text_hover'],
            'text_size' => $instance['settings']['text_size'],
			'border' => $instance['settings']['border'],
			'border_radius' => $instance['settings']['border_radius'],
			'padding' => $instance['settings']['padding'],
			'width' => $instance['settings']['width'],
			'icon' => $instance['icon']['icon'],
			'icon_size' => $instance['icon']['size'],
            'icon_color' => $instance['icon']['color'],
			'icon_position' => $instance['icon']['position'],
			'attrs' => $instance['attributes']
		);

		return $variables;
	}

    function get_template_name( $instance ) {
		return 'default';
    }

    function get_style_name( $instance ) {
		switch( $instance['settings']['design'] ) {
			case 'rounded':
			default:
				return 'default';
				break;
			case 'flat':
				return 'flat';
				break;
			case 'wire':
				return 'wire';
				break;
            case 'none':
                return '';
                break;
		}
    }

	function get_less_variables( $instance ) {
		return array(
			'background' => $instance['settings']['background'],
			'background_hover' => $instance['settings']['background_hover'],
			'text_color' => $instance['settings']['text_color'],
			'text_hover' => $instance['settings']['text_hover'],
			'text_size' => $instance['settings']['text_size'] . 'px',
			'border' => $instance['settings']['border'] . 'px',
			'border_radius' => $instance['settings']['border_radius'] . 'px',
			'padding' => $instance['settings']['padding'] . 'px',
			'width' => $instance['settings']['width'] . 'px',
			'icon' => $instance['icon']['icon'],
			'icon_size' => $instance['icon']['size'] . 'px',
            'icon_color' => $instance['icon']['color'],
            'icon_hover' => $instance['icon']['color_hover'],
			'icon_position' => $instance['icon']['position'],
            'text_size' => $instance['settings']['text_size'] . 'px'
		);
	}

    function modify_instance( $instance ) {
        if ( empty( $instance['text'] ) ) {
            if ( isset( $instance['title'] ) ) $instance['text'] = $instance['title'];

            unset( $instance['title'] );
        }
        return $instance;
    }
}

siteorigin_widget_register( 'rawb-button', __FILE__, 'RAWB_Button_Widget' );
