<li>
    <a href="<?php echo esc_url($item->get_permalink()); ?>"
       title="<?php printf(__('Posted %s', 'bits-codepen-list'), $item->get_date('j F Y | g:i a')); ?>"
       target="<?php echo $atts['target'] ?: '_blank'; ?>"
    >
        <?php echo esc_html($item->get_title()); ?>
    </a>
    <span class="meta">
        <?php echo date_i18n(get_option('date_format'), strtotime($item->get_date())); ?>
    </span>
</li>