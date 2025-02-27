<?php
$id = wp_unique_id( 'bBlocksAdvancedImage-' );
extract( $attributes );

?>
<div <?php echo get_block_wrapper_attributes(); ?> id='<?php echo esc_attr( $id ); ?>' data-attributes='<?php echo esc_attr( wp_json_encode( $attributes ) ); ?>' data-featured_image_url='<?php echo esc_attr( has_post_thumbnail() ? get_the_post_thumbnail_url( $post->ID, $layout['size'] ?? 'full' ) : '' ); ?>'></div>