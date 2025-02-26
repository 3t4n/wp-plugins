<?php

	$args = array (
		'p'              => $accordion_awesome_select_accordion,     // GET POST BY SLUG  // IGNORE IF YOU ARE GETTING ERROR ON THIS LINE IN YOUR EDITOR
		'post_type'         => 'accordion-awesome', // YOUR POST TYPE

	);

	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() && $accordion_awesome_select_accordion != '' ) {

		wp_enqueue_style( 'ta-accordion-awesome-fontawesome', plugin_dir_url('README.txt') . ACCORDION_AWESOME_NAME . '/public/css/fontawesome.min.css', array(), '', 'all' );
		wp_enqueue_style( 'ta-accordion-awesome-thaw-flexgrid', plugin_dir_url('README.txt') . ACCORDION_AWESOME_NAME . '/public/css/thaw-flexgrid.css', array(), '', 'all' );
		wp_enqueue_style( 'ta-accordion-awesome', plugin_dir_url('README.txt') . ACCORDION_AWESOME_NAME . '/public/css/accordion-awesome-public.css', array(), '', 'all' );

		while ( $query->have_posts() ) {

			$query->the_post();

			$accordion_style = carbon_get_post_meta( get_the_ID(), 'accordion_style_choice' );

			if($accordion_style == 'accordion-style-2') {
				$accordion_style_part = ACCORDION_AWESOME_DIR .'/public/accordion-styles/accordion-style-2.php';
			}
			elseif($accordion_style == 'accordion-style-7') {
				$accordion_style_part = ACCORDION_AWESOME_DIR .'/public/accordion-styles/accordion-style-7.php';
			}
			elseif($accordion_style == 'accordion-style-9') {
				$accordion_style_part = ACCORDION_AWESOME_DIR .'/public/accordion-styles/accordion-style-9.php';
			}
			elseif($accordion_style == 'accordion-style-13-checkboxes') {
				$accordion_style_part = ACCORDION_AWESOME_DIR .'/public/accordion-styles/accordion-style-13-checkboxes.php';
			}
			elseif($accordion_style == 'accordion-style-13-radiobuttons') {
				$accordion_style_part = ACCORDION_AWESOME_DIR .'/public/accordion-styles/accordion-style-13-radiobuttons.php';
			}

			include $accordion_style_part;


		} wp_reset_postdata();
	} else {
		// no posts found
		return esc_html__( 'Sorry You have set no html for this slug...', 'accordion-awesome' );

	}