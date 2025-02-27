<div class="eso-comment uk-comment <?php echo esc_attr(implode(' ', $wrap_class)); ?>">
    <div class="uk-comment-header uk-margin-remove-bottom uk-grid-small uk-flex-middle" uk-grid>

        <?php if ( !empty($image) ) : ?>
            <div class="uk-width-auto">
                <img class="uk-comment-avatar <?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image; ?>" width="80" height="80" alt="">
            </div>
        <?php endif; ?>

        <div class="uk-width-expand">
            <div class="uk-comment-title uk-margin-remove <?php echo esc_attr(implode(' ', $name_class)); ?>">
                <?php echo esc_html($name); ?>
            </div>
            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                <li class="<?php echo esc_attr(implode(' ', $company_class)); ?>"><?php echo esc_html($company); ?></li>
                <?php if (!empty($icon)) : ?>
                    <li class="uk-margin-remove-last-child">
                        <?php $x = 1;  while ( $x <= $rating ) : ?>
                            <div class="uk-inline <?php echo esc_attr(implode(' ', $icon_class)); ?>">
                                <?php echo siteorigin_widget_get_icon( $icon, $icon_styles ); ?>
                                <?php $x++; ?>
                            </div>
                        <?php endwhile; ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="uk-comment-body <?php echo esc_attr(implode(' ', $body_class)); ?>">
        <?php echo esc_html($comment); ?>
    </div>
</div>
