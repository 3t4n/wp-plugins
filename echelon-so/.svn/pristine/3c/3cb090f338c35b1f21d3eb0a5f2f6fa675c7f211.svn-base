<div class="eso-pricing uk-position-relative uk-text-center">

    <?php if ( !empty($label) ) : ?>
        <span class="uk-display-inline-block uk-position-top-right uk-position-small eso-pricing-label <?php echo esc_attr(implode(' ', $label_class)); ?>"><?php echo esc_html($label); ?></span>
    <?php endif; ?>

    <div class="eso-pricing-inner <?php echo esc_attr(implode(' ', $inner_class)); ?>">

        <?php if ( !empty($title) ) : ?>

            <div class="eso-pricing-title <?php echo esc_attr(implode(' ', $title_class)); ?>">
                <?php echo $title; ?>
            </div>

        <?php endif; ?>

        <?php if ( !empty($price) ) : ?>

            <div class="uk-flex uk-flex-middle uk-flex-center eso-pricing-price <?php echo esc_attr(implode(' ', $price_wrap_class)); ?>">
                <div class="uk-margin-micro-right <?php echo esc_attr(implode(' ', $symbol_class)); ?>"><?php echo $symbol; ?></div>
                <div class="<?php echo esc_attr(implode(' ', $price_class)); ?>"><?php echo $price; ?></div>
            </div>

        <?php endif; ?>

        <?php if ( !empty($image) ) : ?>
            <div class="uk-margin-medium-bottom">
                <img src="<?php echo $image; ?>">
            </div>
        <?php endif; ?>

        <?php if ( !empty($sub_title) ) : ?>

            <div class="eso-pricing-sub-title <?php echo esc_attr(implode(' ', $sub_title_class)); ?>">
                <?php echo $sub_title; ?>
            </div>

        <?php endif; ?>

    </div>

    <a href="<?php echo $link_target; ?>" class="uk-display-block eso-pricing-button <?php echo esc_attr(implode(' ', $button_class)); ?>">
        <?php echo esc_html($link_text); ?>
    </a>

</div>
