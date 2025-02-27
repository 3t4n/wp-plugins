<div id="<?php echo esc_attr($canvas_id) ;?>" uk-offcanvas="mode: <?php echo esc_attr($mode); ?>; overlay: <?php echo esc_attr($overlay); ?>; flip: <?php echo esc_attr($flip); ?>; bg-close: <?php echo esc_attr($bg_close); ?>">

    <div class="uk-offcanvas-bar uk-padding-remove <?php echo esc_attr($icon_class); ?> <?php echo esc_attr($background); ?>">

        <a class="uk-offcanvas-close" type="button" uk-close></a>

        <?php
        if( function_exists( 'siteorigin_panels_render' ) ) {
            $content_builder_id = substr( md5( json_encode( $content ) ), 0, 8 );
            echo siteorigin_panels_render( 'w'.$content_builder_id, true, $content );
        }
        ?>

    </div>

</div>

<style type="text/css">
#<?php echo $canvas_id; ?>:before {
    background: <?php echo esc_attr($overlay_color); ?>;
}

#<?php echo $canvas_id; ?> .uk-offcanvas-bar {
    background: <?php echo esc_attr($background); ?>;

}

#<?php echo $canvas_id; ?> .uk-offcanvas-close {
    color: <?php echo esc_attr($close_icon); ?>;
}
</style>
