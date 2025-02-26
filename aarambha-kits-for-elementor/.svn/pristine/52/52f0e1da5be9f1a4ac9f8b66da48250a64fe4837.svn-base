<?php
/**
 * The admin term fields.
 *
 * @link       https://aarambhathemes.com/
 * @since      1.0.0
 *
 * @package    Aarambha_Kits
 * @subpackage Aarambha_Kits/admin
 * @author     Aarambha Themes <aarambhathemes@gmail.com>
 */

class Aarambha_Kits_Admin_Term {

	/**
	 * Instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance;

	/**
	 * Returns the instance.
	 *
	 * @access public
	 * @return object
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor method.
	 *
	 * @access private
	 * @return void
	 */
	private function __construct() {

		// Add form filds
		add_action( 'category_add_form_fields', array( $this, 'add_term_meta' ), 10, 2 );

		// Edit form filds
		add_action( 'category_edit_form_fields', array( $this, 'edit_term_meta' ), 10, 2 );

		// Save extra taxonomy fields callback function.
		add_action( 'edited_category', array( $this, 'update_term_meta' ), 10, 2 );
		add_action( 'create_category', array( $this, 'update_term_meta' ), 10, 2 );

		// Load scripts for the meta-box
		add_action( 'admin_enqueue_scripts', array( $this, 'load_scripts' ) );

	}

	/**
	 * Add term page
	 *
	 * this will add the custom meta field to the add new term page
	 */
	public function add_term_meta() {
		?>
		<!-- Image Uploader -->
		<div class="form-field term-imageupload-wrap">
			
			<label><?php esc_html_e( 'Feature Image', 'aarambha-kits' ); ?></label>

			<div class="image-fields-wrap">
				<div class="attachment-media-view">
					<div class="image-fields-wrap">
						<div class="attachment-media-view">

							<div class="attachment-child image-uploader">

								<button type="button" class="image-upload-button">
									<span class="dashicons dashicons-upload twp-icon twp-icon-large"></span>
								</button>

								<input class="upload-id" name="_term_image" type="hidden"/>

							</div>

							<div class="attachment-child thumbnail-image">

								<button type="button" class="image-delete-button">
									<span class="dashicons dashicons-no-alt twp-icon"></span>
								</button>

								<div class="image-container">
								</div>

							</div>

						</div>
					</div>
				</div>
			</div>
			
		</div>

		<!-- Color Picker -->
		<div class="form-field term-colorpicker-wrap">

			<label for="term-colorpicker"><?php esc_html_e( 'Background Color', 'aarambha-kits' ); ?></label>
			
			<div class="color-fields-wrap">

				<input name="_term_bg_color" value="" class="colorpicker" id="term-colorpicker" data-alpha-enabled="true" />

			</div>
			
		</div>

		<?php
	}

	/**
	 * Edit term page
	 *
	 * @param $term
	 */
	public function edit_term_meta( $term ) {
		$term_image = get_term_meta( $term->term_id, '_term_image', true );
		$term_bg    = get_term_meta( $term->term_id, '_term_bg_color', true );
		?>
		<tr>
			
			<th scope="row" valign="top"><label><?php esc_html_e( 'Feature Image', 'aarambha-kits' ); ?></label></th>

			<td>

				<div class="image-fields-wrap">
					<div class="attachment-media-view">
						<div class="image-fields-wrap">
							<div class="attachment-media-view">

								<div class="attachment-child image-uploader">

									<button type="button" class="image-upload-button">
										<span class="dashicons dashicons-upload twp-icon twp-icon-large"></span>
									</button>

									<input class="upload-id" name="_term_image" type="hidden" value="<?php echo esc_url( $term_image ); ?>"/>

								</div>

								<div class="attachment-child thumbnail-image">

									<button type="button" class="image-delete-button 
									<?php
									if ( $term_image ) {
										echo 'image-show'; }
									?>
									">
										<span class="dashicons dashicons-no-alt twp-icon"></span>
									</button>

									<div class="image-container">

										<?php if ( $term_image ) { ?>

											<img src="<?php echo esc_url( $term_image ); ?>" style="width:200px;height:auto;">

										<?php } ?>

									</div>

								</div>

							</div>
						</div>
					</div>
				</div>

			</td>

		</tr>

		<tr class="form-field term-colorpicker-wrap">
			<th scope="row"><label for="term-colorpicker"><?php esc_html_e( 'Background Color', 'aarambha-kits' ); ?></label></th>
			<td>
				<div class="color-fields-wrap">
					<input name="_term_bg_color" value="<?php echo esc_attr( $term_bg ); ?>" class="colorpicker" id="term-colorpicker" data-alpha-enabled="true" />
				</div>
			</td>
		</tr>
		
		<?php
	}

	/**
	 * Update Term
	 *
	 * @param $term_id
	 */
	public function update_term_meta( $term_id ) {
		// Save Image
		if ( isset( $_POST['_term_image'] ) ) {
			update_term_meta(
				$term_id,
				'_term_image',
				esc_url_raw( wp_unslash( $_POST['_term_image'] ) )
			);
		}

		// Save Background Color
		if ( isset( $_POST['_term_bg_color'] ) ) {
			update_term_meta(
				$term_id,
				'_term_bg_color',
				self::get_instance()->sanitize_color( $_POST['_term_bg_color'] )
			);
		}
	}

	/**
	 * Loads the required media files for the media manager and scripts for media widgets.
	 */
	public function load_scripts() {

		wp_enqueue_media();

		// Enqueue Style
		wp_enqueue_style( 'aarambha-kits-term', AARAMBHA_KITS_URL . 'assets/build/css/term.css', array( 'wp-color-picker' ), AARAMBHA_KITS_VERSION, 'all' );

		// Enqueue Script
		wp_enqueue_script( 'wp-color-picker-alpha', AARAMBHA_KITS_URL . 'assets/build/library/wp-color-picker-alpha/wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), '3.0.2', true );
		wp_enqueue_script( 'aarambha-kits-term', AARAMBHA_KITS_URL . 'assets/build/js/term.js', array( 'wp-color-picker-alpha' ), AARAMBHA_KITS_VERSION, true );

		$locale = apply_filters(
			'aarambha_kits_term_var',
			array(
				'upload_image' => esc_html__( 'Choose Image', 'aarambha-kits' ),
				'use_image'    => esc_html__( 'Select', 'aarambha-kits' ),
			)
		);

		wp_localize_script( 'aarambha-kits-term', 'AARAMBHA_KITS', $locale );
	}

	/**
	 * Sanitize the color.
	 *
	 * @param string $color Input from the term colorpicker field
	 *
	 * @return string
	 */
	public function sanitize_color( $color ) {

		if ( '' === $color ) {
			return '';
		}

		// To allow hex, rgba(), and var() values or custom values like transparent run through custom preg_replace to remove most special characters and spaces.
		if ( strpos( $color, '#' ) === 0 ) {
			return sanitize_hex_color( $color );
		} else {
			return preg_replace( '/[^A-Za-z0-9_)(\-,.]/', '', $color );
		}

	}
}

// Class needed only in the admin
if ( is_admin() ) {

	Aarambha_Kits_Admin_Term::get_instance();
}
