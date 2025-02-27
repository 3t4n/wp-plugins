<div class="eso-card <?php echo esc_attr(implode(' ', $card_class)); ?>">

    <?php if (!empty($title)) : ?>
        <div class="eso-card-title <?php echo esc_attr(implode(' ', $title_class)); ?>">
            <?php echo esc_html($title); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($body)) : ?>
        <div class="eso-card-body <?php echo esc_attr(implode(' ', $body_class)); ?>">
            <?php echo esc_html($body); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($link_text) && !empty($link_target)) : ?>
        <div class="eso-card-footer <?php echo esc_attr(implode(' ', $footer_class)); ?>">
            <a href="<?php echo $link_target; ?>" class="uk-button uk-button-text"><?php echo esc_html($link_text); ?></a>
        </div>
    <?php endif; ?>

</div>
