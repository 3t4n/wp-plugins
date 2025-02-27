<?php if (!empty($list_items)) : ?>

    <div class="eso-icon-list uk-margin-remove-last-child <?php echo esc_attr(implode(' ', $wrap_class)); ?>">

        <?php foreach ($list_items as $k => $v) : ?>

            <div class="uk-flex uk-flex-middle uk-flex-left uk-margin-small-bottom">

                <div class="uk-width-auto uk-margin-small-right uk-text-center">
                    <?php
                    if ( empty($v['image']) && !empty($v['icon']) ) {
                        $icon_styles['color'] = 'color: ' . $v['icon_color'];
                        $icon_styles['size'] = 'font-size: ' . $icon_size;
                        $icon_styles['width'] = 'width: 1.25em;';
                        echo siteorigin_widget_get_icon($v['icon'], $icon_styles);
                    } elseif( !empty($v['image']) ) {
                        $attachment = wp_get_attachment_image_src( $v['image'], 'full' );
                        ?>
                        <img src="<?php echo $attachment[0]; ?>">
                        <?php
                    }
                    ?>
                </div>

                <div class="uk-width-expand <?php echo esc_attr(implode(' ', $text_class)); ?>" style="color: <?php echo esc_attr($v['text_color']); ?>;">
                    <?php if (!empty($v['link_target'])) : ?>
                        <a href="<?php echo sow_esc_url($v['link_target']); ?>">
                        <?php endif; ?>
                        <?php echo esc_html($v['text']); ?>
                        <?php if (!empty($v['link_target'])) : ?>
                        </a>
                    <?php endif; ?>
                </div>

            </div>

        <?php endforeach; ?>

    </div>

<?php endif; ?>
