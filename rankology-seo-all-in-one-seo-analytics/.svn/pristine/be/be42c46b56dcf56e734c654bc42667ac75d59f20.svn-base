<?php
namespace WPRankologyElementorAddon\Controls;

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

class Text_Letter_Counter_Control extends \Elementor\Base_Data_Control {
	public function get_type() {
		return 'rankologytextlettercounter';
	}

	public function enqueue() {
		wp_enqueue_style(
			'rkseo-el-text-letter-counter-style',
			RANKOLOGY_ELEMENTOR_ADDON_URL . 'assets/css/text-letter-counter.css'
		);

		wp_enqueue_script(
			'rkseo-el-text-letter-counter-script',
			RANKOLOGY_ELEMENTOR_ADDON_URL . 'assets/js/text-letter-counter.js',
			array('jquery'),
			11,
			true
		);
	}

	protected function get_default_settings() {
		return [
			'field_type' => 'text',
			'description' => '',
			'rows' => 7
		];
	}

	public function content_template() {
		$control_uid = $this->get_control_uid();
		?>
		<div class="elementor-control-field rankology-text-letter-counter">
            <?php do_action('rankology_elementor_seo_titles_before'); ?>

            <label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label }}}</label>
			<div class="elementor-control-input-wrapper">
				<# if ( data.field_type === 'text' ) { #>
					<input type="text" id="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-tag-area" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}" />
				<# } else { #>
					<textarea id="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-tag-area" rows="{{ data.rows }}" data-setting="{{ data.name }}" placeholder="{{ data.placeholder }}"></textarea>
				<# } #>
			<div>
			<div class="rkseo-progress">
				<div class="rankology_counters_progress rkseo-progress-bar" role="progressbar" style="width: 2%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">1%</div>
			</div>
			<div class="wrap-rankology-counters">
				<div class="rankology_pixel"></div>
				<strong>
					<# if ( data.field_type === 'text' ) { #>
						<?php esc_html_e(' / 568 pixels - ','wp-rankology'); ?>
					<# } else { #>
						<?php esc_html_e(' / 940 pixels - ','wp-rankology'); ?>
					<# } #>
				</strong>
				<div class="rankology_counters"></div>
				<?php esc_html_e(' (maximum recommended limit)','wp-rankology'); ?>
			</div>

			<div class="wrap-tags">
				<# if ( data.field_type === 'text' ) { #>
					<span class="rankology-tag-single-title tag-title" data-tag="%%post_title%%" ><span class="dashicons dashicons-tag"></span><?php esc_html_e( 'Post Title','wp-rankology' ); ?></span>
					<span class="rankology-tag-single-sep tag-title" data-tag="%%sep%%"><span class="dashicons dashicons-tag"></span><?php esc_html_e( 'Separator','wp-rankology' ); ?></span>
					<span class="rankology-tag-single-site-title tag-title" data-tag="%%sitetitle%%"><span class="dashicons dashicons-tag"></span><?php esc_html_e( 'Site Title','wp-rankology' ); ?></span>
				<# } else { #>
					<span class="rankology-tag-single-excerpt tag-title" data-tag="%%post_excerpt%%"><span class="dashicons dashicons-tag"></span><?php esc_html_e( 'Post Excerpt', 'wp-rankology' ); ?></span>
				<# } #>
			</div>
		</div>
		<# if ( data.description ) { #>
			<div class="elementor-control-field-description">{{{ data.description }}}</div>
		<# } #>
		<?php
	}
}
