<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class AIEA_Control extends Base_Data_Control {

	public function get_type() {
		return 'aiea_prompt';
	}
	
	public function enqueue() {
		
		wp_enqueue_style( 'ai-control-helper', AIEA_URL . 'assets/css/editor/control-helper.css', [], '1.0' );
		wp_enqueue_script( 'ai-control-helper', AIEA_URL . 'assets/js/editor/control-helper.js', [ 'jquery', 'jqueryui' ], '1.0.0' );
		
	}
	
	/**
	 * Get textarea control default settings.
	 *
	 * Retrieve the default settings of the textarea control. Used to return the
	 * default settings while initializing the textarea control.
	 *
	 * @since 1.0.0
	 * @access protected
	 *
	 * @return array Control default settings.
	 */
	protected function get_default_settings() {
		return [
			'label_block' => true,
			'rows' => 5,
			'placeholder' => ''
		];
	}
	
	public function content_template() {
		
		$control_uid = $this->get_control_uid();
		
		add_action( 'aiea_addons_ai', [ $this, 'aiea_addons_aiea_frame' ], 10 );
		
		?>
		<div class="elementor-control-field">		
			<a href="#" class="ai-addons-ai-trigger" data-forwhich="{{ data.forwhich }}"><?php esc_html_e( 'Generate with AI', 'ai-addons' ); ?></a>		
			<textarea id="<?php echo esc_attr( $control_uid ); ?>" data-setting="{{ data.name }}" class="ai-addons-ai-dummy"></textarea>			
			<?php do_action( 'aiea_addons_ai' ); ?>
			
			
		</div>

		<?php
		
			
	}
	
	public function aiea_addons_aiea_frame() {
	?>
		<div class="ai-addons-ai-wrap">
			<div class="ai-addons-ai-inner">
				<div class="ai-addons-ai-header">
					<div class="ai-addons-ai-logo">
						<img src="<?php echo esc_url( AIEA_URL . 'assets/images/logo.png' ); ?>" alt="<?php esc_html_e( 'AI Addons', 'ai-addons' ) ?>" />
					</div>
					<div class="ai-addons-ai-close">
						<span class="dashicons dashicons-no-alt"></span>
					</div>
				</div>
				
				<div class="ai-addons-ai-body">
					<div class="ai-input-group">
						<span class="ai-input-group-text" id="basic-addon1"><i class="dashicons dashicons-search"></i></span>
						<input type="text" class="ai-form-control" placeholder="<?php esc_html_e( 'Enter prompt text...', 'ai-addons' ) ?>">
					</div>
					<p><strong><?php esc_html_e( 'Suggested prompts:', 'ai-addons' ) ?></strong></p>
					<ul class="ai-suggested-prompts">
						<li data-key="Suggest title for mars" class="for-ai-title"><?php esc_html_e( 'Suggest title for mars', 'ai-addons' ) ?></li>
						<li data-key="Suggest title about" class="for-ai-title"><?php esc_html_e( 'Suggest title about...', 'ai-addons' ) ?></li>
						<li data-key="Write tagline about"><?php esc_html_e( 'Write tagline about...', 'ai-addons' ) ?></li>
						<li data-key="Write a paragraph about"><?php esc_html_e( 'Write a paragraph about...', 'ai-addons' ) ?></li>
						<li data-key="Write an article about"><?php esc_html_e( 'Write an article about...', 'ai-addons' ) ?></li>
						<li data-key="Write 50 words about"><?php esc_html_e( 'Write 50 words about...', 'ai-addons' ) ?></li>
					</ul>
					<a href="#" class="ai-addons-ai-submit"><?php esc_html_e( 'Generate', 'ai-addons' ) ?></a><span class="ai-addons-ai-loader"><img src="<?php echo esc_url( AIEA_URL . 'assets/images/ajax-loader.gif' ); ?>" alt="<?php esc_html_e( 'AI Addons', 'ai-addons' ) ?>" /></span>
				</div>
				
			</div>
		</div>
	<?php
	}
	
}