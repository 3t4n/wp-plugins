<?php

/**
 * This is an example module with only the basic
 * setup necessary to get it working.
 *
 * @class FLBasicExampleModule
 */
class DGImageCarousel extends FLBuilderModule {

	/**
	 * Constructor function for the module. You must pass the
	 * name, description, dir and url in an array to the parent class.
	 *
	 * @method __construct
	 */
	public function __construct() {
		parent::__construct( array(
			'name'          => __( 'Image Carousel', 'bb-image-carousel' ),
			'description'   => __( 'Horizontal carousel of images.', 'bb-image-carousel' ),
			'category'      => __( 'Add-ons', 'bb-image-carousel' ),
			'dir'           => BB_IMAGE_CAROUSEL_DIR . 'modules/image-carousel/',
			'url'           => BB_IMAGE_CAROUSEL_URL . 'modules/image-carousel/',
			'editor_export' => true, // Defaults to true and can be omitted.
			'enabled'       => true, // Defaults to true and can be omitted.
		) );

		/**
		 * Use these methods to enqueue css and js already
		 * registered or to register and enqueue your own.
		 */
		// Already registered
		$this->add_css( 'font-awesome' );
		$this->add_css( 'jquery-bxslider' );
		$this->add_js( 'jquery-bxslider' );
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module( 'DGImageCarousel', array(
	'general' => array( // Tab
		'title'    => __( 'General', 'bb-image-carousel' ), // Tab title
		'sections' => array( // Tab Sections
			'general'   => array( // Section
				'title'  => '',
				'fields' => array( // Section Fields
					'min_slides'    => array(
						'type'        => 'text',
						'label'       => __( 'Min. Slides', 'bb-image-carousel' ),
						'default'     => '1',
						'maxlength'   => '2',
						'size'        => '3',
						'placeholder' => '1',
						'class'       => 'min-slides',
						'description' => '',
						'help'        => __( 'Minimun slides to display in small screens.', 'bb-image-carousel' ),
					),
					'max_slides'    => array(
						'type'        => 'text',
						'label'       => __( 'Max. Slides', 'bb-image-carousel' ),
						'default'     => '4',
						'maxlength'   => '2',
						'size'        => '3',
						'placeholder' => '4',
						'class'       => 'max-slides',
						'description' => '',
						'help'        => __('Maximum slides to display in large screens.','bb-image-carousel' ),
					),
					'move_slides'   => array(
						'type'        => 'text',
						'label'       => __( 'Move Slides', 'bb-image-carousel' ),
						'default'     => '4',
						'maxlength'   => '2',
						'size'        => '3',
						'placeholder' => '4',
						'class'       => 'move-slides',
						'description' => '',
						'help'        => __('Amount of slides to move.','bb-image-carousel' ),
					),
					'slide_width'   => array(
						'type'        => 'text',
						'label'       => __( 'Slide Width', 'bb-image-carousel' ),
						'default'     => '200',
						'maxlength'   => '4',
						'size'        => '6',
						'placeholder' => '200',
						'class'       => 'slide-width',
						'description' => 'px',
						'help'        => __('Each slide initial width.','bb-image-carousel' ),
					),
					'columns_space' => array(
						'type'        => 'text',
						'label'       => __( 'Columns space', 'bb-image-carousel' ),
						'default'     => '20',
						'maxlength'   => '2',
						'size'        => '3',
						'placeholder' => '20',
						'class'       => 'columns-space',
						'description' => 'px',
						'help'        => __('Space between columns.','bb-image-carousel' ),
					),
					'shrink_items'  => array(
						'type'        => 'select',
						'label'       => __( 'Slide Width Behaviour', 'bb-image-carousel' ),
						'default'     => 'true',
						'options'     => array(
							'true'  => __( 'Adjust width dinamicaly', 'bb-image-carousel' ),
							'false' => __( 'Fixed width', 'bb-image-carousel' )
						),
						'class'       => 'shrink-items',
						'description' => '',
						'help'        => __('Specify slider width behave based on screen width.','bb-image-carousel' ),
					)
				)
			),
			'behaviour' => array( // Section
				'title'  => __( 'Behaviour', 'bb-image-carousel' ),
				'fields' => array( // Section Fields
					'auto_play'     => array(
						'type'        => 'select',
						'label'       => __( 'Autoplay', 'bb-image-carousel' ),
						'default'     => 'true',
						'options'     => array(
							'true'  => __( 'Yes', 'bb-image-carousel' ),
							'false' => __( 'No', 'bb-image-carousel' )
						),
						'class'       => 'auto-play',
						'description' => '',
						'help'        => __('Enable or disable carousel auto advance.','bb-image-carousel' ),
					),
					'pager'         => array(
						'type'        => 'select',
						'label'       => __( 'Dots', 'bb-image-carousel' ),
						'default'     => 'true',
						'options'     => array(
							'true'  => __( 'Enabled', 'bb-image-carousel' ),
							'false' => __( 'Disabled', 'bb-image-carousel' )
						),
						'class'       => 'pager',
						'description' => '',
						'help'        => __('Enable or disable carousel dots.','bb-image-carousel' ),
					),
					'auto_controls' => array(
						'type'        => 'select',
						'label'       => __( 'Play/Pause Controls', 'bb-image-carousel' ),
						'default'     => 'true',
						'options'     => array(
							'true'  => __( 'Enabled', 'bb-image-carousel' ),
							'false' => __( 'Disabled', 'bb-image-carousel' )
						),
						'class'       => 'auto-controls',
						'description' => '',
						'help'        => __('Enable or disable carousel controls.','bb-image-carousel' ),
					),
					'speed'         => array(
						'type'        => 'text',
						'label'       => __( 'Move Slides', 'bb-image-carousel' ),
						'default'     => '500',
						'maxlength'   => '4',
						'size'        => '6',
						'placeholder' => '500',
						'class'       => 'speed',
						'description' => __( 'miliseconds', 'bb-image-carousel' ),
						'help'        => __('Transition speed.','bb-image-carousel' ),
					)
				)
			)
		)
	),
	'content' => array(
		'title'    => __( 'Content', 'bb-image-carousel' ),
		'sections' => array(
			'general' => array(
				'fields' => array(
					'images' => array(
						'type'         => 'form',
						'label'        => __( 'Image', 'bb-image-carousel' ),
						'form'         => 'form_image_field', // ID of a registered form.
						'preview_text' => 'label', // ID of a field to use for the preview text.
						'multiple'     => true,
					)
				)
			),
		),
	)
) );

FLBuilder::register_settings_form( 'form_image_field', array(
	'title' => __( 'Images with links', 'bb-image-carousel' ),
	'tabs'  => array(
		'general' => array(
			'title'    => __( 'General', 'bb-image-carousel' ),
			'sections' => array(
				'general' => array(
					'title'  => '',
					'fields' => array(
						'label'         => array(
							'type'  => 'text',
							'label' => __( 'Label', 'bb-image-carousel' )
						),
						'photo'         => array(
							'type'        => 'photo',
							'label'       => __( 'Photo', 'bb-image-carousel' ),
							'show_remove' => false,
						),
						'link'          => array(
							'type'  => 'link',
							'label' => __( 'Link', 'bb-image-carousel' )
						),
						'link_target'   => array(
							'type'        => 'select',
							'label'       => __( 'Link Target', 'bb-image-carousel' ),
							'default'     => '_self',
							'options'     => array(
								'_self'  => __( 'Same Window', 'bb-image-carousel' ),
								'_blank' => __( 'New Window', 'bb-image-carousel' )
							),
							'class'       => 'link-target',
							'description' => ''
						),
						'link_nofollow' => array(
							'type'        => 'select',
							'label'       => __( 'Link No Follow', 'bb-image-carousel' ),
							'default'     => 'no',
							'options'     => array(
								'yes' => __( 'Yes', 'bb-image-carousel' ),
								'no'  => __( 'No', 'bb-image-carousel' )
							),
							'class'       => 'link-nofollow',
							'description' => ''
						),
					)
				),
			)
		)
	)
) );