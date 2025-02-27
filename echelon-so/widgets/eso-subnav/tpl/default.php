<?php if ( !empty($links) ) : ?>
    <ul class="uk-subnav uk-margin-remove-bottom <?php echo esc_attr(implode(' ', $nav_class)); ?>" uk-margin>
        <?php foreach ($links as $k => $v) : ?>
            <li>
                <a class="<?php echo esc_attr(implode(' ', $link_class)); ?>" href="<?php echo sow_esc_url($v['target']); ?>">
                    <?php echo esc_html($v['text']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
