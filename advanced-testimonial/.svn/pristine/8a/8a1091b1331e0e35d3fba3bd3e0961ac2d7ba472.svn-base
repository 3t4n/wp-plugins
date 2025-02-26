<?php


function bts_add_custom_box() {
        add_meta_box(
            'gs_box_id',                 // Unique ID
            'Slider shortcode',      // Box title
            'bts_custom_box_html',  // Content callback, must be of type callable
            'slider',              // Post type
            'side',
            'high'
        );
}
add_action( 'add_meta_boxes', 'bts_add_custom_box' );


function bts_custom_box_html( $slider ) {
    $value = get_post_meta( $slider->ID, '_gs_meta_key', true );
    ?>
    <label for="bts_field">Slider shortcode</label>
    <h2>Must use minimum 4 slide item</h2>

    <input type="text" id="bts_field" class="widefat" value='[advanced_testimonial id="<?php the_id(); ?>" loop="true" autoplay="false"]'>

    <?php
}



add_filter('manage_posts_columns', 'default_columns_head');

function default_columns_head($defaults) {
    global $current_screen;
    if (in_array($current_screen->post_type, array('slider','other_post_type'))) {
        $defaults['shortcode'] = 'shortcode';
        //$defaults['col2'] = 'col2 name';
    }
    return $defaults;
}
function gs_default_columns_content($shortcode, $post_ID) {

    if ($shortcode == 'shortcode') {
        $post = get_post($post_ID); ?>

       <input type="text" name="" class="widefat" value='[advanced_testimonial id="<?php the_id(); ?>" loop="true" arrows="true"]'>

       <?php
    }
}

add_action('manage_posts_custom_column', 'gs_default_columns_content', 10, 2);


