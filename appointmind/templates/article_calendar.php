<iframe
    src="<?php echo esc_html($appointmindUrlDomain.$appointmindUrlPath).$appointmindUrlParameters ?>"
    style="border:none;width:<?php echo esc_html($view->iframeWidth) ?>;height:<?php echo esc_html($view->iframeHeight) ?>;padding:0;margin:0;"
    class="
        <?php if (wp_get_theme()->get_template() == 'twentytwentythree'):?>is-layout-flex wp-container-7 wp-block-columns<?php endif?>
        <?php if (wp_get_theme()->get_template() == 'twentytwentytwo'):?>is-layout-flex wp-container-8 wp-block-columns<?php endif?>
	"
    frameborder="0">
</iframe>