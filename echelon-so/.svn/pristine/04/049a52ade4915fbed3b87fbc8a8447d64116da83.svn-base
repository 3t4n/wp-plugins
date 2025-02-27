<div class="eso-typewriter-wrap <?php echo esc_attr(implode(' ', $wrap_class)); ?>">
    <span class="eso-typewriter-before <?php echo esc_attr(implode(' ', $before_class)); ?>" style="color: <?php echo $text_color_before; ?>;"><?php echo esc_html($before); ?> </span>
    <span class="eso-typewriter <?php echo esc_attr(implode(' ', $typed_class)); ?>" id="<?php echo $int_id; ?>" style="color: <?php echo $text_color_typed; ?>;"></span>
    <span class="eso-typewriter-after <?php echo esc_attr(implode(' ', $after_class)); ?>" style="color: <?php echo $text_color_after; ?>;"> <?php echo esc_html($after); ?></span>
</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {

        var app = document.getElementById('<?php echo $int_id; ?>');

        var typewriter = new Typewriter(app, {
            cursor: '<?php echo esc_attr($cursor); ?>',
            loop: <?php echo esc_attr($loop); ?>,
            delay: <?php echo esc_attr($delay); ?>,
        });

        <?php echo ( !empty($s) ? $s : '' ); ?>

    })
})(jQuery)
</script>
