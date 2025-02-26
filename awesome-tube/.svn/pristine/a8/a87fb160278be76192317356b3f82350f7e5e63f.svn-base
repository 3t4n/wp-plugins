<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'awetube_field_in_category' );
function awetube_field_in_category() {
    Container::make( 'term_meta', 'category_features' , __( 'Category Properties', 'awetube' ) )
    ->where( 'term_taxonomy', '=', 'video-category' )
    ->add_fields( array(
        Field::make( 'image', 'awetube_featured_image', __( 'Category Featured Image' ) )
            ->set_value_type('url'),
    ) );
}