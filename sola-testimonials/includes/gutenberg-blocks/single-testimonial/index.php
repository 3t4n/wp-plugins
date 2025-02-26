<?php
if(version_compare(get_bloginfo('version'),'5.0', '>=') ){
	/**
	* Registers gutenberg block for Single Testimonials
	**/
	function sola_t_single_testimonial_block_editor_assets() {
 
		if(is_admin())
		{
			wp_register_style(
			'sola_t_single_testimonial-gutenberg-editor',
			SOLA_T_PLUGIN_DIR.'/includes/gutenberg-blocks/single-testimonial/editor.css',
			array( 'wp-edit-blocks' )
			);
		}
		 
		if(is_admin())
		{
			wp_register_script(
			'sola-t-single-testimonial-gutenberg-registration',
			SOLA_T_PLUGIN_DIR. '/includes/gutenberg-blocks/single-testimonial/block.js',
			array(
				'wp-blocks', 
				'wp-element', 
				'wp-components', 
				'wp-editor'
			)
			);
		}

		register_block_type( 'sola-t-single-testimonial-gutenberg-block/sola-t-single-testimonial-gutenberg-registration', array(
    		'attributes' => array(
				'testimonial_single' => array(
					'type' => 'string'
				),
				'testimonial_random' => array(
					'type' => 'boolean'
				),
				'alignment' => array(
					'type' => 'string',
					'default' => 'center'
				),
			),

			'style' => 'sola_t_single_testimonial-gutenberg-style',
			'editor_style' => 'sola_t_single_testimonial-gutenberg-editor',
			'editor_script' => 'sola_t_single_testimonial-gutenberg-js',
			'render_callback' => 'sola_t_single_testimonial_gutenberg_render'
		));
	

		//Testimonials Array
		$args = array(
		'posts_per_page'   => -1,
		'post_type'        => 'testimonials',
		);

		$testimonials = get_posts( $args );
		$testimonial_array[] = array(
			'value' => 0,
			'label' => 'Select Testimonial'
		);

		//Loops through each testimonial
		foreach ($testimonials as $testimonial) {
			$testimonial_array[] = array(
				'value' => $testimonial->ID,
				'label' => $testimonial->post_title
			);
		}

		//Localize this array
		wp_localize_script('sola-t-single-testimonial-gutenberg-registration', 'single_testimonial', $testimonial_array);
		wp_enqueue_script( 'sola-t-single-testimonial-gutenberg-registration' );

	}

	//Render Function
	function sola_t_single_testimonial_gutenberg_render($attributes){

		//Text allign
		$txt_align = '';
		if(!empty($attributes['alignment'])){
		$txt_align = 'style = "text-align:' . $attributes['alignment'] . ';"';
		}

		if(empty($attributes['testimonial_single'])){

			//allow the user to enable the random option before selecting a testimonial
			if(isset($attributes['testimonial_random']) && $attributes['testimonial_random'] == 'true'){
				return "<div $txt_align>" . do_shortcode('[sola_t_all_testimonials random=yes]') . "</div>";
			} 

			//else let them know to selecta testimonial
			return "<p>Please Select a Testimonial in the settings block</p>";
		}

		//checks if the user enabled the random feature
		if(isset($attributes['testimonial_random']) && $attributes['testimonial_random'] == 'true'){
			return "<div $txt_align>" . do_shortcode('[sola_t_all_testimonials random=yes]') . "</div>";
		}

		else{
			return "<div $txt_align>" . do_shortcode('[sola_testimonial id="' . $attributes['testimonial_single'] . '"]') . "</div>";
		}

	}

	add_action( 'wp_enqueue_scripts', 'sola_t_single_enqueue_styles' );

	function sola_t_single_enqueue_styles() {
 
		// Register script
		wp_register_style(
			'sola_t_single_testimonial-gutenberg-style',
			SOLA_T_PLUGIN_DIR. '/includes/gutenberg-blocks/single-testimonial/style.css',
			array( )   
			);
			
		//Only load style if the block is present
		if(has_block('sola-t-single-testimonial-gutenberg-block/sola-t-single-testimonial-gutenberg-registration')){
			wp_enqueue_style( 'sola_t_single_testimonial-gutenberg-style' );
		} 
	}
}
add_action( 'init', 'sola_t_single_testimonial_block_editor_assets' );



