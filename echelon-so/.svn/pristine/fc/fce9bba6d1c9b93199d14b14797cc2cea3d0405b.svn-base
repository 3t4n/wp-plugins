<div uk-lightbox="animation: <?php echo esc_attr($animation); ?>">
    <?php
    if (function_exists('siteorigin_panels_render')) {
        $content_builder_id = substr( md5( json_encode( $lightbox ) ), 0, 8 );
        echo siteorigin_panels_render( 'w'.$content_builder_id, true, $lightbox );
    }
    ?>
</div>
