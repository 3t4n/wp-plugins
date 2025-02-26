<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

Container::make( 'post_meta', 'side_shortcode', esc_html__( 'Shortcode', 'accordion-awesome' ) )
	->where( 'post_type', '=', 'accordion-awesome' )
	->set_context( 'side' )
	->set_priority( 'default' )
	->add_fields( array(

	Field::make( 'html', 'accordion_style', esc_html__( 'Section Description', 'accordion-awesome' ) )
		->set_html( sprintf( '<div class="shortcode-wrap-ta"><code id="shortcode_accordion_to_copy"></code></div>', __( 'Here, you can add some useful description for the fields below / above this text.' ) ) ),
));
