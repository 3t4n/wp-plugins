<div class="eso-feature eso-feature-large uk-position-relative <?php echo esc_attr(implode(' ', $feature_class)); ?>">

    <?php if ( empty($image) && !empty($icon) ) : ?>

        <div class="<?php echo esc_attr(implode(' ', $icon_class_large)); ?>">
            <?php echo siteorigin_widget_get_icon($icon, $icon_styles); ?>
        </div>

    <?php endif; ?>

    <?php if ( !empty($image) ) : ?>

        <div class="<?php echo esc_attr(implode(' ', $icon_class_large)); ?>">

            <img  class="<?php echo esc_attr(implode(' ', $image_class)); ?>" src="<?php echo $image; ?>">

        </div>

    <?php endif; ?>

    <div class="eso-feature-title <?php echo esc_attr(implode(' ', $title_class)); ?>">
        <?php echo esc_html($title); ?>
    </div>

    <div class="eso-feature-body <?php echo esc_attr(implode(' ', $body_class)); ?>">
        <?php echo esc_html($body); ?>
    </div>

    <?php if (!empty($link_target) && !empty($link_text) ) : ?>
        <div>
            <a class="eso-feature-link uk-button uk-button-text <?php echo esc_attr(implode(' ', $link_class)); ?>" href="<?php echo $link_target; ?>"><?php echo $link_text; ?></a>
        </div>
    <?php endif; ?>

</div>
