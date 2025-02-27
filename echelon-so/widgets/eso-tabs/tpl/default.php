<ul class="<?php echo esc_attr(implode(' ', $tabs_class)); ?> uk-margin-remove" uk-tab="animation: <?php echo esc_attr($animation_in); ?>, <?php echo esc_attr($animation_out); ?>">

    <?php foreach ($tabs_repeater as $k => $v) : ?>
        <li class="uk-padding-remove">
            <a href="#" class="<?php echo esc_attr(implode(' ', $link_class)); ?>">

                <?php echo $v['title']; ?>

            </a>
        </li>
    <?php endforeach; ?>

</ul>

<ul class="uk-switcher uk-overflow-hidden">

    <?php foreach ($tabs_repeater as $k => $v) : ?>
        <li>
            <?php
            if( function_exists( 'siteorigin_panels_render' ) ) {
                $content_builder_id = substr( md5( json_encode( $v['content'] ) ), 0, 8 );
                echo siteorigin_panels_render( 'w'.$content_builder_id, true, $v['content'] );
            }
            ?>
        </li>
    <?php endforeach; ?>

</ul>
