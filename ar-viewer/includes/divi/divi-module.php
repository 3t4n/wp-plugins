<?php
function ar_viewer_divi_register_modules() {
	if ( class_exists( 'ET_Builder_Module' ) ) {
		class Ar_Viewer_Divi_Module extends ET_Builder_Module {

			public $slug = 'ep_module_ar_viewer';

			protected $module_credits = array(
				'module_uri' => '',
				'author'     => 'Bdthemes Ltd.',
				'author_uri' => 'https://bdthemes.com/',
			);

			public function init() {
				$this->name             = esc_html__( 'AR 360 Viewer', 'ar-viewer' );
				$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
				$this->main_css_element = '%%order_class%%';
			}

			public function get_fields() {
				return array(
					'poster_source_type'     => array(
						'label'           => esc_html__( 'Poster Source', 'ar-viewer' ),
						'type'            => 'select',
						'option_category' => 'basic_option',
						'options'         => array(
							'self'   => esc_html__( 'Self Media', 'ar-viewer' ),
							'remote' => esc_html__( 'Remote URL', 'ar-viewer' ),
						),
						'default'         => 'remote',
						'description'     => esc_html__( 'Choose the source of the poster image.', 'ar-viewer' ),
					),
					'poster'                 => array(
						'label'           => esc_html__( 'Poster URL', 'ar-viewer' ),
						'type'            => 'text',
						'option_category' => 'basic_option',
						'show_if'         => array( 'poster_source_type' => 'remote' ),
						'description'     => esc_html__( 'Enter the URL of the poster image.', 'ar-viewer' ),
					),
					'poster_image'           => array(
						'label'           => esc_html__( 'Poster Image', 'ar-viewer' ),
						'type'            => 'upload',
						'option_category' => 'basic_option',
						'show_if'         => array( 'poster_source_type' => 'self' ),
						'description'     => esc_html__( 'Upload the poster image.', 'ar-viewer' ),
					),
					'env_source_type'        => array(
						'label'           => esc_html__( 'Environment Image Source', 'ar-viewer' ),
						'type'            => 'select',
						'option_category' => 'basic_option',
						'options'         => array(
							'self'   => esc_html__( 'Self Media', 'ar-viewer' ),
							'remote' => esc_html__( 'Remote URL', 'ar-viewer' ),
						),
						'default'         => 'remote',
						'description'     => esc_html__( 'Choose the source of the environment image.', 'ar-viewer' ),
					),
					'environment_image'      => array(
						'label'           => esc_html__( 'Environment Image URL', 'ar-viewer' ),
						'type'            => 'text',
						'option_category' => 'basic_option',
						'show_if'         => array( 'env_source_type' => 'remote' ),
						'description'     => esc_html__( 'Enter the URL of the environment image.', 'ar-viewer' ),
					),
					'environment_image_self' => array(
						'label'           => esc_html__( 'Environment Image', 'ar-viewer' ),
						'type'            => 'upload',
						'option_category' => 'basic_option',
						'show_if'         => array( 'env_source_type' => 'self' ),
						'description'     => esc_html__( 'Upload the environment image.', 'ar-viewer' ),
					),
					'src_source_type'        => array(
						'label'           => esc_html__( 'Model Source', 'ar-viewer' ),
						'type'            => 'select',
						'option_category' => 'basic_option',
						'options'         => array(
							'self'   => esc_html__( 'Self Media', 'ar-viewer' ),
							'remote' => esc_html__( 'Remote URL', 'ar-viewer' ),
						),
						'default'         => 'remote',
						'description'     => esc_html__( 'Choose the source of the model.', 'ar-viewer' ),
					),
					'model_url'              => array(
						'label'           => esc_html__( 'Model URL', 'ar-viewer' ),
						'type'            => 'text',
						'option_category' => 'basic_option',
						'show_if'         => array( 'src_source_type' => 'remote' ),
						'description'     => esc_html__( 'Enter the URL of the model.', 'ar-viewer' ),
					),
					'model'                  => array(
						'label'           => esc_html__( 'Model', 'ar-viewer' ),
						'type'            => 'upload',
						'option_category' => 'basic_option',
						'show_if'         => array( 'src_source_type' => 'self' ),
						'description'     => esc_html__( 'Upload the model.', 'ar-viewer' ),
						'filetype'        => 'application/octet-stream',
					),
					'canvas_height'          => array(
						'label'           => esc_html__( 'Canvas Height', 'ar-viewer' ),
						'type'            => 'range',
						'option_category' => 'basic_option',
						'default'         => '320px',
						'range_settings'  => array(
							'min'  => '1',
							'max'  => '2000',
							'step' => '1',
						),
						'description'     => esc_html__( 'Set the height of the canvas.', 'ar-viewer' ),
					),
					'canvas_width'           => array(
						'label'           => esc_html__( 'Canvas Width', 'ar-viewer' ),
						'type'            => 'range',
						'option_category' => 'basic_option',
						'default'         => '320px',
						'range_settings'  => array(
							'min'  => '1',
							'max'  => '2000',
							'step' => '1',
						),
						'description'     => esc_html__( 'Set the width of the canvas.', 'ar-viewer' ),
					),
					'auto_rotate'            => array(
						'label'       => esc_html__( 'Auto Rotate', 'ar-viewer' ),
						'type'        => 'yes_no_button',
						'options'     => array(
							'yes' => esc_html__( 'Yes', 'ar-viewer' ),
							'no'  => esc_html__( 'No', 'ar-viewer' ),
						),
						'default'     => 'no',
						'description' => esc_html__( 'Enable auto-rotation of the model.', 'ar-viewer' ),
					),
					'shadow_intensity'       => array(
						'label'           => esc_html__( 'Shadow Intensity', 'ar-viewer' ),
						'type'            => 'range',
						'option_category' => 'basic_option',
						'default'         => '1',
						'range_settings'  => array(
							'min'  => '0',
							'max'  => '10',
							'step' => '1',
						),
						'description'     => esc_html__( 'Set the intensity of the shadows.', 'ar-viewer' ),
					),
					'camera_orbit'           => array(
						'label'       => esc_html__( 'Camera Orbit', 'ar-viewer' ),
						'type'        => 'text',
						'default'     => '45deg 55deg 4m',
						'description' => esc_html__( 'Set the initial angle and position of the camera.', 'ar-viewer' ),
					),
					'disable_zoom'           => array(
						'label'       => esc_html__( 'Disable Zoom', 'ar-viewer' ),
						'type'        => 'yes_no_button',
						'options'     => array(
							'yes' => esc_html__( 'Yes', 'ar-viewer' ),
							'no'  => esc_html__( 'No', 'ar-viewer' ),
						),
						'default'     => 'no',
						'description' => esc_html__( 'Disable zooming in and out of the model.', 'ar-viewer' ),
					),
					'disable_tap'            => array(
						'label'       => esc_html__( 'Disable Tap', 'ar-viewer' ),
						'type'        => 'yes_no_button',
						'options'     => array(
							'yes' => esc_html__( 'Yes', 'ar-viewer' ),
							'no'  => esc_html__( 'No', 'ar-viewer' ),
						),
						'default'     => 'no',
						'description' => esc_html__( 'Disable tap to rotate the model.', 'ar-viewer' ),
					),
					'skybox_source_type'     => array(
						'label'           => esc_html__( 'Skybox Source', 'ar-viewer' ),
						'type'            => 'select',
						'option_category' => 'basic_option',
						'options'         => array(
							'self'   => esc_html__( 'Self Media', 'ar-viewer' ),
							'remote' => esc_html__( 'Remote URL', 'ar-viewer' ),
						),
						'default'         => 'remote',
						'description'     => esc_html__( 'Choose the source of the skybox image.', 'ar-viewer' ),
					),
					'skybox_image'           => array(
						'label'           => esc_html__( 'Skybox Image URL', 'ar-viewer' ),
						'type'            => 'text',
						'option_category' => 'basic_option',
						'show_if'         => array( 'skybox_source_type' => 'remote' ),
						'description'     => esc_html__( 'Enter the URL of the skybox image.', 'ar-viewer' ),
					),
					'skybox_image_self'      => array(
						'label'           => esc_html__( 'Skybox Image', 'ar-viewer' ),
						'type'            => 'upload',
						'option_category' => 'basic_option',
						'show_if'         => array( 'skybox_source_type' => 'self' ),
						'description'     => esc_html__( 'Upload the skybox image.', 'ar-viewer' ),
					),
				);
			}

			public function render( $attrs, $render_slug, $content = null ) {

				wp_enqueue_script_module(
					'model-viewer',
					AR_VIEWER_ASSETS . 'app/vendor/model-viewer.min.js',
					array(),
					'3.4.0'
				);
				
				$poster_url       = $this->props['poster_source_type'] === 'self' ? wp_get_attachment_url( $this->props['poster_image'] ) : $this->props['poster'];
				$env_image_url    = $this->props['env_source_type'] === 'self' ? wp_get_attachment_url( $this->props['environment_image_self'] ) : $this->props['environment_image'];
				$model_url        = $this->props['src_source_type'] === 'self' ? wp_get_attachment_url( $this->props['model'] ) : $this->props['model_url'];
				$skybox_image_url = $this->props['skybox_source_type'] === 'self' ? wp_get_attachment_url( $this->props['skybox_image_self'] ) : $this->props['skybox_image'];
				$canvas_height    = $this->props['canvas_height'];
				$canvas_width     = $this->props['canvas_width'];
				$auto_rotate      = $this->props['auto_rotate'] === 'yes' ? 'true' : 'false';
				$shadow_intensity = $this->props['shadow_intensity'];
				$camera_orbit     = $this->props['camera_orbit'];
				$disable_zoom     = $this->props['disable_zoom'] === 'yes' ? 'true' : 'false';
				$disable_tap      = $this->props['disable_tap'] === 'yes' ? 'true' : 'false';

				ob_start(); ?>

				<div class="et_pb_module et_pb_ar_viewer">
					<model-viewer
						style="height: <?php echo esc_attr( $canvas_height ); ?>; width: <?php echo esc_attr( $canvas_width ); ?>;"
						src="<?php echo esc_url( $model_url ); ?>" <?php if ( $poster_url ) : ?>poster="<?php echo esc_url( $poster_url ); ?>" <?php endif; ?> 				<?php if ( $env_image_url ) : ?>environment-image="<?php echo esc_url( $env_image_url ); ?>" <?php endif; ?> 				<?php if ( $skybox_image_url ) : ?>skybox-image="<?php echo esc_url( $skybox_image_url ); ?>" <?php endif; ?>
						shadow-intensity="<?php echo esc_attr( $shadow_intensity ); ?>"
						camera-orbit="<?php echo esc_attr( $camera_orbit ); ?>" auto-rotate="<?php echo esc_attr( $auto_rotate ); ?>"
						disable-zoom="<?php echo esc_attr( $disable_zoom ); ?>" disable-tap="<?php echo esc_attr( $disable_tap ); ?>">
					</model-viewer>
				</div>

				<?php
				return ob_get_clean();
			}
		}

		new Ar_Viewer_Divi_Module;
	}
}

add_action( 'et_builder_ready', 'ar_viewer_divi_register_modules' );
