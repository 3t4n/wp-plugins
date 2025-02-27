<div class="<?php echo esc_attr(implode(' ', $wrap_class)); ?>">

    <span style="color: <?php echo esc_attr($before_color); ?>" class="<?php echo esc_attr(implode(' ', $before_text_class)); ?>">
        <?php echo esc_html($before); ?>&nbsp;
    </span>

    <span class="<?php echo esc_attr(implode(' ', $rotated_text_class)); ?>" style="color: <?php echo esc_attr($inner_color); ?>; white-space: nowrap;" id="<?php echo $int_id; ?>">
        <?php echo esc_html(implode('|', $words)); ?>
    </span>

    <span style="color: <?php echo esc_attr($after_color); ?>" class="<?php echo esc_attr(implode(' ', $after_text_class)); ?>">
        &nbsp;<?php echo esc_html($after); ?>
    </span>

</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {
        $("#<?php echo $int_id; ?>").textrotator({
            animation: "<?php echo esc_attr($effect) ;?>",
            separator: "|",
            speed: <?php echo $speed ;?>
        });
    })
})(jQuery)
</script>
