<?php
/**
 * Page editor control
 *
 * @package AI ChatGPT Content And Image Generator
 * @since   AI ChatGPT Content And Image Generator 1.0
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Class to create a custom tags control
 */
class opaigpt_Page_Editor extends WP_Customize_Control {

	/**
	 * Flag to include sync scripts if needed
	 *
	 * @var bool|mixed
	 */
	private $needsync = false;

	/**
	 * opaigpt_Page_Editor constructor.
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
		wp_enqueue_style( 'opaigpt_text_editor_css', get_template_directory_uri() . '/inc/editor/css/webdzier-page-editor.css', array(),'ai-chatgpt-content-and-image-generator');
		wp_enqueue_script(
			'opaigpt_text_editor', get_template_directory_uri() . '/inc/editor/js/webdzier-text-editor.js', array(
				'jquery',
				'customize-preview',
			),'ai-chatgpt-content-and-image-generator', true
		);
		if ( $this->needsync === true ) {
			wp_enqueue_script( 'opaigpt_controls_script', get_template_directory_uri() . '/inc/editor/js/webdzier-update-controls.js', array( 'jquery', 'opaigpt_text_editor' ),'ai-chatgpt-content-and-image-generator', true );
			wp_localize_script(
				'opaigpt_controls_script', 'requestpost', array(
					'ajaxurl'           =>  esc_js( admin_url( 'admin-ajax.php' ) ),
					'thumbnail_control' => 'opaigpt_feature_thumbnail', // name of image control that needs sync
				'editor_control'    => 'opaigpt_Page_Editor', // name of control (theme_mod) that needs sync
				'thumbnail_label'   => esc_html__( 'About background', 'ai-chatgpt-content-and-image-generator' ), // name of thumbnail control
				)
			);
		}
	}
}