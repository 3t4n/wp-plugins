<?php

// Set default options

$default = array( 'titles' => 'Instagram', 'id' => '', 'width' => '', 'height' => '', 'alt' => '', 'class' => '', 'style' => '', 'target' => '', 'rel' => '' );
$instance = wp_parse_args( ( array ) $instance, $default );

// Widget Title field

$field_id = $this -> get_field_id( 'titles' );
$field_name = $this -> get_field_name( 'titles' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Widget Title', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'titles' ] ).'" /></p>';

// Photo ID field

$field_id = $this -> get_field_id( 'id' );
$field_name = $this -> get_field_name( 'id' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Photo ID', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'id' ] ) . '" /></p>';

// Photo width

$field_id = $this -> get_field_id( 'width' );
$field_name = $this -> get_field_name( 'width' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Width', 'artiss-instagram-embed' ) . ': </label><input size=3 maxlength=3 type="text" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'width' ] ) . '" />px</p>';

// Photo height

$field_id = $this -> get_field_id( 'height' );
$field_name = $this -> get_field_name( 'height' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Height', 'artiss-instagram-embed' ) . ': </label><input size=3 maxlength=3 type="text" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'height' ] ) . '" />px</p>';

// ALT text field

$field_id = $this -> get_field_id( 'alt' );
$field_name = $this -> get_field_name( 'alt' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'ALT Text', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'alt' ] ) . '" /></p>';

// CLASS field

$field_id = $this -> get_field_id( 'class' );
$field_name = $this -> get_field_name( 'class' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Class', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'class' ] ) . '" /></p>';

// STYLE field

$field_id = $this -> get_field_id( 'style' );
$field_name = $this -> get_field_name( 'style' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Style', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'style' ] ) . '" /></p>';

// TARGET field

$field_id = $this -> get_field_id( 'target' );
$field_name = $this -> get_field_name( 'target' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'Target', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'target' ] ) . '" /></p>';

// REL field

$field_id = $this -> get_field_id( 'rel' );
$field_name = $this -> get_field_name( 'rel' );
echo "\r\n" . '<p><label for="' . $field_id . '">' . __( 'REL', 'artiss-instagram-embed' ) . ': </label><input type="text" class="widefat" id="' . $field_id . '" name="' . $field_name . '" value="' . attribute_escape( $instance[ 'rel' ] ) . '" /></p>';
?>