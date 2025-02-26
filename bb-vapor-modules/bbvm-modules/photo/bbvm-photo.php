<?php // phpcs:ignore
class BBVapor_Photo extends FLBuilderModule {

	/**
	 * Editor for cropping images.
	 *
	 * @var object $editor The WordPress editor instance.
	 */
	private $editor = null;

	/**
	 * Class Constructor.
	 *
	 * @credit PowerPack for inspiration.
	 */
	public function __construct() {
		parent::__construct(
			array(
				'name'            => __( 'Photo', 'bb-vapor-modules' ),
				'description'     => __( 'Add a photo to your site', 'bb-vapor-modules' ),
				'category'        => __( 'Base', 'bb-vapor-modules' ),
				'group'           => apply_filters( 'bbvm_whitelabel_category', __( 'Vapor', 'bb-vapor-modules' ) ),
				'dir'             => BBVAPOR_BEAVER_BUILDER_DIR . 'bbvm-modules/photo/',
				'url'             => BBVAPOR_BEAVER_BUILDER_URL . 'bbvm-modules/photo/',
				'editor_export'   => true, // Defaults to true and can be omitted.
				'enabled'         => true, // Defaults to true and can be omitted.
				'partial_refresh' => true, // Defaults to false and can be omitted.
			)
		);

		$this->add_css( 'cssgram', BBVAPOR_BEAVER_BUILDER_URL . 'css/cssgram/cssgram.min.css', array(), BBVAPOR_BEAVER_BUILDER_VERSION, 'all' );
		$this->add_css( 'jquery-magnificpopup' );
		$this->add_js( 'jquery-magnificpopup' );
	}

	/**
	 * Crop a photo when necessary.
	 *
	 * @param object $settings Settings object.
	 */
	public function update( $settings ) {
		if ( ! empty( $settings->image ) && 'none' !== $settings->crop_type ) {
			$data = FLBuilderPhoto::get_attachment_data( $settings->image );

			if ( $data ) {
				$settings->data = $data;
			}
			$this->maybe_crop_image();
		}
		return $settings;
	}

	/**
	 * Retrieve WordPress' built-in editor.
	 *
	 * @return object Image Editor.
	 */
	private function get_editor() {
		if ( null === $this->editor ) {
			$url_path  = $this->get_original_image();
			$file_path = str_ireplace( home_url(), ABSPATH, $url_path );

			if ( file_exists( $file_path ) ) {
				$this->editor = wp_get_image_editor( $file_path );
			} else {
				$this->editor = wp_get_image_editor( $url_path );
			}
		}
		return $this->editor;
	}

	/**
	 * Crop an image if necessary.
	 *
	 * @return mixed false if no crop, image url if cropped
	 */
	private function maybe_crop_image() {
		$this->maybe_delete_crops();

		if ( 'none' !== $this->settings->crop_type ) {
			$src    = $this->get_original_image();
			$editor = $this->get_editor();

			if ( ! $editor || is_wp_error( $editor ) ) {
				return false;
			}

			$cropped_path = $this->get_cropped_path();
			$size         = $editor->get_size();
			$new_width    = $size['width'];
			$new_height   = $size['height'];

			// Get the crop ratios.
			if ( '1x1' === $this->settings->crop_type ) {
				$ratio_1 = 1;
				$ratio_2 = 1;
			} elseif ( '16x9' === $this->settings->crop_type ) {
				$ratio_1 = 1.77;
				$ratio_2 = .56;
			} elseif ( '3x2' === $this->settings->crop_type ) {
				$ratio_1 = 1.5;
				$ratio_2 = .66;
			} elseif ( '4x3' === $this->settings->crop_type ) {
				$ratio_1 = 1.33;
				$ratio_2 = .75;
			} elseif ( '9x16' === $this->settings->crop_type ) {
				$ratio_1 = .56;
				$ratio_2 = 1.77;
			} elseif ( '2x3' === $this->settings->crop_type ) {
				$ratio_1 = .66;
				$ratio_2 = 1.5;
			} elseif ( '3x4' === $this->settings->crop_type ) {
				$ratio_1 = .75;
				$ratio_2 = 1.33;
			} else {
				return $src;
			}

			// Get the new width or height.
			if ( $size['width'] / $size['height'] < $ratio_1 ) {
				$new_height = $size['width'] * $ratio_2;
			} else {
				$new_width = $size['height'] * $ratio_1;
			}

			// Make sure we have enough memory to crop.
			@ini_set('memory_limit', '300M'); // phpcs:ignore

			// Crop the photo.
			$editor->resize( $new_width, $new_height, true );

			// Save the photo.
			$editor->save( $cropped_path['path'] );

			// Return the new url.
			return $cropped_path['url'];
		}
		return false;
	}

	/**
	 * Get the original uncropped image src.
	 */
	private function get_original_image() {
		$url = '';
		if ( ! empty( $this->settings->image_src ) ) {
			$url = $this->settings->image_src;
		}
		return $url;
	}

	/**
	 * Delete previously cropped image.
	 */
	private function maybe_delete_crops() {
		$cropped_path = $this->get_cropped_path();

		if ( file_exists( $cropped_path['path'] ) ) {
			unlink( $cropped_path['path'] );
		}
	}

	/**
	 * Get a cropped image's path based on the original image.
	 */
	private function get_cropped_path() {
		$crop      = $this->settings->crop_type;
		$url       = $this->get_original_image();
		$cache_dir = FLBuilderModel::get_cache_dir();

		if ( empty( $url ) ) {
			$filename = uniqid(); // Return a uniqie file.
		} else {

			if ( stristr( $url, '?' ) ) {
				$parts = explode( '?', $url );
				$url   = $parts[0];
			}
			$pathinfo = pathinfo( $url );
			$dir      = $pathinfo['dirname'];
			$ext      = $pathinfo['extension'];
			$name     = wp_basename( $url, ".$ext" );
			$new_ext  = strtolower( $ext );
			$filename = "{$name}-{$crop}.{$new_ext}";
		}

		return array(
			'filename' => $filename,
			'path'     => $cache_dir['path'] . $filename,
			'url'      => $cache_dir['url'] . $filename,
		);
	}

	/**
	 * Return an image path to the frontend.
	 */
	public function get_image_src() {
		$src     = $this->get_original_image();
		$new_src = false;

		// Return a cropped photo.
		if ( 'none' !== $this->settings->crop_type ) {

			$cropped_path = $this->get_cropped_path();

			// See if the cropped photo already exists.
			if ( file_exists( $cropped_path['path'] ) ) {
				$new_src = $cropped_path['url'];
			} else {
				$new_src = $this->maybe_crop_image();
			}
		}
		if ( $new_src ) {
			return $new_src;
		}
		return $src;
	}
}
/**
 * Register the module and its form settings.
 */
FLBuilder::register_module(
	'BBVapor_Photo',
	array(
		'general'     => array(
			'title'    => __( 'General', 'bb-vapor-modules' ),
			'sections' => array(
				'general'   => array(
					'title'  => __( 'Photo', 'bb-vapor-modules' ),
					'fields' => array(
						'image'           => array(
							'type'        => 'photo',
							'label'       => __( 'Photo to display.', 'bb-vapor-modules' ),
							'show_remove' => true,
						),
						'display_caption' => array(
							'type'    => 'select',
							'label'   => __( 'Display Caption?', 'bb-vapor-modules' ),
							'default' => 'yes',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'caption',
									),
								),
							),
						),
						'display_title'   => array(
							'type'    => 'select',
							'label'   => __( 'Display Title?', 'bb-vapor-modules' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'yes' => array(
									'sections' => array(
										'image_title',
									),
								),
							),
						),
						'link_option'     => array(
							'type'    => 'select',
							'label'   => __( 'Enable a Photo Link?', 'bb-vapor-modules' ),
							'default' => 'no',
							'options' => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'yes' => array(
									'tabs' => array(
										'photo_link',
									),
								),
							),
						),
					),
				),
				'container' => array(
					'title'  => __( 'Container Options', 'bb-vapor-modules' ),
					'fields' => array(
						'container_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Background Color', 'bb-vapor-modules' ),
							'show_alpha' => true,
							'show_reset' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-wrapper',
								'property' => 'background-color',
							),
						),
						'container_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Container Padding', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'container_border'           => array(
							'type'    => 'border',
							'label'   => __( 'Container Border', 'bb-vapor-modules' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-wrapper',
								'property' => 'border',
							),
						),
						'container_width'            => array(
							'type'    => 'select',
							'label'   => __( 'Container Width', 'bb-vapor-modules' ),
							'default' => 'fit',
							'options' => array(
								'fit'        => __( 'Fit Content', 'bb-vapor-modules' ),
								'full_width' => __( 'Full Width', 'bb-vapor-modules' ),
							),
						),
						'container_alignment'        => array(
							'type'    => 'align',
							'label'   => __( 'Container Alignment', 'bb-vapor-modules' ),
							'default' => 'center',
						),
					),
				),
			),
		),
		'image_title' => array(
			'title'    => __( 'Title', 'bb-vapor-modules' ),
			'sections' => array(
				'caption' => array(
					'title'  => __( 'Title', 'bb-vapor-modules' ),
					'fields' => array(
						'title_custom'           => array(
							'type'        => 'text',
							'label'       => __( 'Title Text', 'bb-vapor-modules' ),
							'placeholder' => __( 'Please enter a title', 'bb-vapor-modules' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.bbvm-photo-title',
							),
						),
						'title_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-title',
								'property' => 'padding',
							),
						),
						'title_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Margin', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-title',
								'property' => 'margin',
							),
						),
						'title_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'title_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'title_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'title_border'           => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'bb-vapor-modules' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo-title',
							),
						),
					),
				),
			),
		),
		'caption'     => array(
			'title'    => __( 'Caption', 'bb-vapor-modules' ),
			'sections' => array(
				'caption'            => array(
					'title'  => __( 'Caption', 'bb-vapor-modules' ),
					'fields' => array(
						'caption_type'    => array(
							'type'    => 'select',
							'label'   => __( 'Caption Type', 'bb-vapor-modules' ),
							'default' => 'caption',
							'options' => array(
								'alt'     => __( 'Alt Text', 'bb-vapor-modules' ),
								'caption' => __( 'Image Caption', 'bb-vapor-modules' ),
								'custom'  => __( 'Custom Caption', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'custom' => array(
									'fields' => array(
										'caption_custom',
									),
								),
							),
						),
						'caption_custom'  => array(
							'type'        => 'text',
							'label'       => __( 'Caption Text', 'bb-vapor-modules' ),
							'placeholder' => __( 'Please enter a caption', 'bb-vapor-modules' ),
							'preview'     => array(
								'type'     => 'text',
								'selector' => '.bbvm-photo-caption',
							),
						),
						'caption_display' => array(
							'type'    => 'select',
							'label'   => __( 'Caption Display', 'bb-vapor-modules' ),
							'default' => 'below',
							'options' => array(
								'below'   => __( 'Below Image', 'bb-vapor-modules' ),
								'overlay' => __( 'Overlay Image', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'overlay' => array(
									'sections' => array(
										'overlay',
									),
								),
								'below'   => array(
									'sections' => array(
										'caption_appearance',
									),
								),
							),
						),
					),
				),
				'caption_appearance' => array(
					'title'  => __( 'Appearance', 'bb-vapor-modules' ),
					'fields' => array(
						'caption_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
								'property' => 'padding',
							),
						),
						'caption_margin'           => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Margin', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
								'property' => 'margin',
							),
						),
						'caption_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules' ),
							'default'    => 'FFFFFF',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'caption_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules' ),
							'default'    => '000000',
							'show_reset' => true,
						),
						'caption_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules' ),
							'responsive' => true,
						),
						'caption_border'           => array(
							'type'    => 'border',
							'label'   => __( 'Border', 'bb-vapor-modules' ),
							'preview' => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
							),
						),
					),
				),
				'overlay'            => array(
					'title'  => __( 'Overlay', 'bb-vapor-modules' ),
					'fields' => array(
						'overlay_type'             => array(
							'type'    => 'select',
							'label'   => __( 'Select an Overlay Type', 'bb-vapor-modules' ),
							'default' => 'horizontal',
							'options' => array(
								'none'       => __( 'Select an overlay type', 'bb-vapor-modules' ),
								'horizontal' => __( 'Horizontal', 'bb-vapor-modules' ),
								'full'       => __( 'Full Overlay', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'horizontal' => array(
									'fields' => array(
										'horizontal_overlay_type',
										'animation',
									),
								),
								'full'       => array(
									'fields' => array(
										'animation',
									),
								),
							),
						),
						'overlay_behavior'         => array(
							'type'    => 'select',
							'label'   => __( 'Overlay behavior', 'bb-vapor-modules' ),
							'options' => array(
								'default' => __( 'Overlay on initial display', 'bb-vapor-modules' ),
								'hover'   => __( 'Overlay on hover', 'bb-vapor-modules' ),
							),
						),
						'horizontal_overlay_type'  => array(
							'type'    => 'select',
							'label'   => 'Select an overlay position',
							'options' => array(
								'top'    => __( 'Top', 'bb-vapor-modules' ),
								'middle' => __( 'Middle', 'bb-vapor-modules' ),
								'bottom' => __( 'Bottom', 'bb-vapor-modules' ),
							),
						),
						'animation'                => array(
							'type'        => 'select',
							'label'       => __( 'Select an animation', 'bb-vapor-modules' ),
							'options'     => array(
								'regular'    => __( 'No animation', 'bb-vapor-modules' ),
								'fade'       => __( 'Fade in', 'bb-vapor-modules' ),
								'slideup'    => __( 'Slide up', 'bb-vapor-modules' ),
								'slidedown'  => __( 'Slide down', 'bb-vapor-modules' ),
								'slideleft'  => __( 'Slide left', 'bb-vapor-modules' ),
								'slideright' => __( 'Slide right', 'bb-vapor-modules' ),
							),
							'description' => __( 'For middle and full overlays, only fade will be able to be applied.', 'bb-vapor-modules' ),
						),
						'animation_duration'       => array(
							'type'    => 'unit',
							'label'   => __( 'Animation duraction in seconds', 'bb-vapor-modules' ),
							'default' => '3',
						),
						'overlay_padding'          => array(
							'type'       => 'dimension',
							'label'      => __( 'Select a Padding', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption',
								'property' => 'padding',
							),
						),
						'overlay_background_color' => array(
							'type'       => 'color',
							'label'      => __( 'Select a Background Color', 'bb-vapor-modules' ),
							'default'    => '#FF0000',
							'show_reset' => true,
							'show_alpha' => true,
						),
						'overlay_text_color'       => array(
							'type'       => 'color',
							'label'      => __( 'Select a Text Color', 'bb-vapor-modules' ),
							'default'    => '#FFFFFF',
							'show_reset' => true,
						),
						'overlay_typography'       => array(
							'type'       => 'typography',
							'label'      => __( 'Typography', 'bb-vapor-modules' ),
							'responsive' => true,
							'preview'    => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figcaption, .bbvm-photo figcaption *',
							),
						),
					),
				),
			),
		),
		'photo_link'  => array(
			'title'    => __( 'Photo Link', 'bb-vapor-modules' ),
			'sections' => array(
				'photo_link' => array(
					'title'  => __( 'Photo Link', 'bb-vapor-modules' ),
					'fields' => array(
						'photo_link_select'   => array(
							'type'    => 'select',
							'label'   => __( 'Link Type', 'bb-vapor-modules' ),
							'default' => 'regular',
							'options' => array(
								'lightbox' => __( 'Lightbox', 'bb-vapor-modules' ),
								'regular'  => __( 'Regular Link', 'bb-vapor-modules' ),
							),
							'toggle'  => array(
								'regular'  => array(
									'fields' => array(
										'photo_url',
									),
								),
								'lightbox' => array(
									'fields' => array(
										'photo_lightbox_size',
									),
								),
							),
						),
						'photo_lightbox_size' => array(
							'type'    => 'photo-sizes',
							'label'   => __( 'Photo Size For Lightbox', 'bb-vapor-modules' ),
							'default' => 'large',
						),
						'photo_url'           => array(
							'type'          => 'link',
							'label'         => __( 'Photo Link', 'bb-vapor-modules' ),
							'show_target'   => true,
							'show_nofollow' => true,
						),
					),
				),
			),
		),
		'effects'     => array(
			'title'    => __( 'Effects', 'bb-vapor-modules' ),
			'sections' => array(
				'overlay' => array(
					'title'  => __( 'Image Effects', 'bb-vapor-modules' ),
					'fields' => array(
						'filter_type'        => array(
							'type'    => 'select',
							'label'   => __( 'Select a Filter', 'bb-vapor-modules' ),
							'default' => 'none',
							'options' => array(
								'none'      => __( 'No Filter', 'bb-vapor-modules' ),
								'_1977'     => __( '1977', 'bb-vapor-modules' ),
								'aden'      => __( 'Aden', 'bb-vapor-modules' ),
								'brannan'   => __( 'Brannan', 'bb-vapor-modules' ),
								'clarendon' => __( 'Clarendon', 'bb-vapor-modules' ),
								'earlybird' => __( 'Early Bird', 'bb-vapor-modules' ),
								'gingham'   => __( 'Gingham', 'bb-vapor-modules' ),
								'hudson'    => __( 'Hudson', 'bb-vapor-modules' ),
								'inkwell'   => __( 'Inkwell', 'bb-vapor-modules' ),
								'kelvin'    => __( 'Kelvin', 'bb-vapor-modules' ),
								'lark'      => __( 'Lark', 'bb-vapor-modules' ),
								'lofi'      => __( 'Lo-Fi', 'bb-vapor-modules' ),
								'maven'     => __( 'Maven', 'bb-vapor-modules' ),
								'mayfair'   => __( 'Mayfair', 'bb-vapor-modules' ),
								'moon'      => __( 'Moon', 'bb-vapor-modules' ),
								'nashville' => __( 'Nashville', 'bb-vapor-modules' ),
								'perpetua'  => __( 'Perpetua', 'bb-vapor-modules' ),
								'reyes'     => __( 'Reyes', 'bb-vapor-modules' ),
								'rise'      => __( 'Rise', 'bb-vapor-modules' ),
								'slumber'   => __( 'Slumber', 'bb-vapor-modules' ),
								'stinson'   => __( 'Stinson', 'bb-vapor-modules' ),
								'Toaster'   => __( 'Toaster', 'bb-vapor-modules' ),
								'valencia'  => __( 'Valencia', 'bb-vapor-modules' ),
								'walden'    => __( 'Walden', 'bb-vapor-modules' ),
								'Willow'    => __( 'Willow', 'bb-vapor-modules' ),
								'xpro2'     => __( 'X-pro II', 'bb-vapor-modules' ),
							),
						),
						'background_image'   => array(
							'type'        => 'select',
							'label'       => __( 'Make Photo a Background Image?', 'bb-vapor-modules' ),
							'default'     => 'no',
							'options'     => array(
								'no'  => __( 'No', 'bb-vapor-modules' ),
								'yes' => __( 'Yes', 'bb-vapor-modules' ),
							),
							'toggle'      => array(
								'yes' => array(
									'fields' => array(
										'photo_min_height',
									),
								),
							),
							'description' => __( 'It is not recommended to do a circular appearance with a background image', 'bb-vapor-modules' ),
						),
						'photo_min_height'   => array(
							'type'         => 'unit',
							'label'        => __( 'Minimum Height of Photo', 'bb-vapor-modules' ),
							'default'      => 500,
							'preview'      => array(
								'type'     => 'css',
								'selector' => '.bbvm-photo figure',
								'property' => 'min-height',
							),
							'units'        => array( 'px', 'vh', '%' ),
							'default_unit' => 'px',
						),
						'image_appearance'   => array(
							'type'    => 'select',
							'label'   => __( 'Image Appearance', 'bb-vapor-modules' ),
							'default' => 'none',
							'options' => array(
								'appearance-none' => __( 'None', 'bb-vapor-modules' ),
								'cropped'         => __( 'Crop Image', 'bb-vapor-modulee-pro' ),
							),
							'toggle'  => array(
								'cropped' => array(
									'fields' => array(
										'crop_type',
									),
								),
							),
						),
						'crop_type'          => array(
							'type'    => 'select',
							'label'   => __( 'Crop Ratio', 'bb-vapor-modules' ),
							'default' => 'none',
							'options' => array(
								'none'         => __( 'No Crop', 'bb-vapor-modules' ),
								'1x1_circular' => __( '1:1 (Circular)', 'bb-vapor-modules' ),
								'1x1'          => __( '1:1 (Square)', 'bb-vapor-modules' ),
								'16x9'         => __( '16:9', 'bb-vapor-modules' ),
								'3x2'          => __( '3:2', 'bb-vapor-modules' ),
								'4x3'          => __( '4:3', 'bb-vapor-modules' ),
								'9x16'         => __( '9:16', 'bb-vapor-modules' ),
								'2x3'          => __( '2:3', 'bb-vapor-modules' ),
								'3x4'          => __( '3:4', 'bb-vapor-modules' ),
							),
						),
						'image_align'        => array(
							'type'    => 'align',
							'label'   => __( 'Image Alignment', 'bb-vapor-modules' ),
							'default' => 'center',
						),
						'image_border_color' => array(
							'type'  => 'color',
							'label' => __( 'Image Border Color', 'bb-vapor-modules' ),
						),
						'image_border_type'  => array(
							'type'    => 'select',
							'label'   => __( 'Image Border Type', 'bb-vapor-modules' ),
							'default' => 'none',
							'options' => array(
								'none'   => __( 'None', 'bb-vapor-modules' ),
								'solid'  => __( 'Solid', 'bb-vapor-modules' ),
								'dashed' => __( 'Dashed', 'bb-vapor-modules' ),
								'dotted' => __( 'Dotted', 'bb-vapor-modules' ),
								'double' => __( 'Double', 'bb-vapor-modules' ),
							),
						),
						'image_border_width' => array(
							'type'    => 'unit',
							'label'   => __( 'Image Border Width', 'bb-vapor-modules' ),
							'default' => 0,
						),
					),
				),
			),
		),
	)
);
