<?php
/*
Widget Name: RA Image
Description: A simple image widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RAWB_Image_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rawb-image',
			__( 'RA Image', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'A simple image widget.', 'ra-widgets-bundle' ),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'ra-widgets-bundle' )
				),
				'image' => array(
					'type' => 'media',
					'label' => __( 'Choose an image', 'ra-widgets-bundle' ),
					'choose' => __( 'Choose image', 'ra-widgets-bundle' ),
					'update' => __( 'Set image', 'ra-widgets-bundle' ),
					'library' => 'image'
				),
				'settings' => array(
					'type' => 'section',
					'label' => __( 'Settings', 'ra-widgets-bundle' ),
					'hide' => true,
					'fields' => array(
						'width' => array(
							'type' => 'number',
							'label' => __( 'Width', 'ra-widgets-bundle' ),
							'default' => ''
						),
						'height' => array(
							'type' => 'number',
							'label' => __( 'Height', 'ra-widgets-bundle' ),
							'default' => ''
						),
						'alignment' => array(
							'type' => 'select',
							'label' => __( 'Alignment', 'ra-widgets-bundle' ),
							'options' => array(
								'alignnone' => __( 'None', 'ra-widgets-bundle' ),
								'aligncenter' => __( 'Center', 'ra-widgets-bundle' ),
								'alignright' => __( 'Right', 'ra-widgets-bundle' ),
								'alignleft' => __( 'Left', 'ra-widgets-bundle' )
							),
							'default' => 'alignnone'
						)
					)
				),
				'seo' => array(
					'type' => 'section',
					'label' => __( 'SEO Settings', 'ra-widgets-bundle' ),
					'hide' => true,
					'fields' => array(
						'class' => array(
							'type' => 'text',
							'label' => __( 'Class', 'ra-widgets-bundle' )
						),
						'alt' => array(
							'type' => 'text',
							'label' => __( 'Alt text', 'ra-widgets-bundle' )
						),
						'id' => array(
							'type' => 'text',
							'label' => __( 'ID', 'ra-widgets-bundle' )
						)
					)
				),
				'link' => array(
					'type' => 'section',
					'label' => __( 'Image Link', 'ra-widgets-bundle' ),
					'hide' => true,
					'fields' => array(
						'url' => array(
							'type' => 'link',
							'label' => __( 'URL', 'ra-widgets-bundle' ),
						),
						'title' => array(
							'type' => 'text',
							'label' => __( 'Title', 'ra-widgets-bundle' )
						),
						'target' => array(
							'type' => 'checkbox',
							'label' => __( 'Open in new tab', 'ra-widgets-bundle' ),
							'default' => false
						),
					)
				),
				'content' => array(
					'type' => 'section',
					'label' => __( 'Before &amp; After Content', 'ra-widgets-bundle' ),
					'hide' => true,
					'fields' => array(
						'before' => array(
							'type' => 'textarea',
							'label' => __( 'Before Content', 'ra-widgets-bundle' )
						),
						'after' => array(
							'type' => 'textarea',
							'label' => __( 'After Content', 'ra-widgets-bundle' )
						),
						'autop' => array(
							'type' => 'checkbox',
							'label' => __( 'Add paragraphs?', 'ra-widgets-bundle' ),
							'default' => true
						)
					)
				),
				'template' => array(
					'type' => 'select',
					'label' => __( 'Image Template', 'ra-widgets-bundle' ),
					'options' => array(
						'default' => 'Default',
					),
					'default' => 'default'
				)
			),
			plugin_dir_path( __FILE__ ) . 'widgets/'

		);
	}

	function get_template_name( $instance ) {
		switch ( $instance['template'] ) {
            case 'default':
            default:
                return 'default';
                break;
        }
	}

	function get_style_name( $instance ) {
		return false;
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'image' => $instance['image'],
			'title' => $instance['title'],
			'width' => $instance['settings']['width'],
			'height' => $instance['settings']['height'],
			'alignment' => $instance['settings']['alignment'],
			'url' => $instance['link']['url'],
			'target' => $instance['link']['target'],
			'url_title' => $instance['link']['title'],
			'class' => $instance['seo']['class'],
			'id' => $instance['seo']['id'],
			'alt' => $instance['seo']['alt'],
			'before' => $instance['content']['before'],
			'after' => $instance['content']['after'],
			'autop' => $instance['content']['autop']
		);
	}
}

siteorigin_widget_register( 'rawb-image', __FILE__, 'RAWB_Image_Widget' );
