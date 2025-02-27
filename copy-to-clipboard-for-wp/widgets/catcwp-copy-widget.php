<?php

class CATCWP_COPY_WIDGET extends \Elementor\Widget_Base {

    public function get_name() {
        return 'Copy-to-Clipboard';
    }

    public function get_title() {
        return esc_html__('Copy to Clipboard', 'catcwp');
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return ['basic'];
    }

    public function get_keywords() {
        return ['copy', 'clipboard'];
    }

	protected function register_controls() {
		$args = array(
			'post_type'      => 'copy_to_clipboard',
			'posts_per_page' => -1,
		);
	
		$query = new \WP_Query($args);
	
		$meta = [];
		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				$meta[] = get_post_meta(get_the_ID(), 'copy_to_clipboard_options', true);
			}
			wp_reset_postdata();
		}
	
		$copy_clipboard_selector = [];
		foreach ($meta as $meta_item) {
			$copy_clipboard_selector[] = strtolower($meta_item['copy_clipboard_selector']);
		}
	
		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__('Copy to Clipboard', 'catcwp'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'tag_selector',
			[
				'label'       => esc_html__('Selector', 'catcwp'),
				'type'        => \Elementor\Controls_Manager::SELECT2,
				'options'     => array_combine($copy_clipboard_selector, $copy_clipboard_selector),
				'default'     => ! empty($copy_clipboard_selector) ? current($copy_clipboard_selector) : '',
				'description' => esc_html__('Please select your clipboard selector.', 'catcwp'),
			]
		);
	
		$this->end_controls_section();
	}
	

    protected function render() {
        $settings = $this->get_settings_for_display();
        $tag = isset($settings['tag_selector']) ? strtolower($settings['tag_selector']) : '';

        echo do_shortcode('[copy_clipboard tag="' . $tag . '"]');
    }
}
