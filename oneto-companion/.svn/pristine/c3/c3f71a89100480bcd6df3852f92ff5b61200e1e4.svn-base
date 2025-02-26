<?php
/** 
 * Page editor control
 *
 * @package oneto
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class to create a custom tags control
 */
class Oneto_Page_Editor extends WP_Customize_Control {

	/**
	 * Flag to include sync scripts if needed
	 *
	 * @var bool|mixed
	 */
	private $needsync = false;

	/**
	 * Oneto_Page_Editor constructor.
	 *
	 * @param WP_Customize_Manager $manager Manager.
	 * @param string               $id Id.
	 * @param array                $args Constructor args.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		parent::__construct( $manager, $id, $args );
		if ( ! empty( $args['needsync'] ) ) {
			$this->needsync = $args['needsync'];
		}
	}

	/**
	 * Enqueue scripts
	 *
	 * @since   1.1.0
	 * @access  public
	 * @updated Changed wp_enqueue_scripts order and dependencies.
	 */
	public function enqueue() {
		wp_enqueue_style( 'oneto_text_editor_css', oneto_companion_plugin_url . '/inc/oneto/customizer/customizer-page-editor/css/oneto-page-editor.css', array(), 999 );
		wp_enqueue_script(
			'oneto_text_editor', oneto_companion_plugin_url . '/inc/oneto/customizer/customizer-page-editor/js/oneto-text-editor.js', array(
				'jquery',
				'customize-preview',
			), 999, true
		);
		if ( $this->needsync === true ) {
			wp_enqueue_script( 'oneto_controls_script', oneto_companion_plugin_url . '/inc/oneto/customizer/customizer-page-editor/js/oneto-update-controls.js', array( 'jquery', 'oneto_text_editor' ), 999, true );
			wp_localize_script(
				'oneto_controls_script', 'requestpost', array(
					'ajaxurl'           => admin_url( 'admin-ajax.php' ),
					'thumbnail_control' => 'oneto_feature_thumbnail', // name of image control that needs sync
					'editor_control'    => 'oneto_page_editor', // name of control (theme_mod) that needs sync
					'thumbnail_label'   => esc_html__( 'About background', 'oneto' ), // name of thumbnail control
				)
			);
		}
	}

	/**
	 * Render the content on the theme customizer page
	 */
	public function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>" id="<?php echo esc_attr( $this->id ); ?>" class="editorfield">
			<a onclick="javascript:WPEditorWidget.toggleEditor('<?php echo esc_attr($this->id); ?>');" class="button edit-content-button"><?php _e( '(Edit)', 'oneto' ); ?></a>
		</label>
		<?php
	}
}
