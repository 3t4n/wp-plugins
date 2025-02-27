<style type="text/css">
#<?php echo $int_id; ?> .twentytwenty-before-label:before {
    content: "<?php echo esc_attr($before_label); ?>";
}
#<?php echo $int_id; ?> .twentytwenty-after-label:before {
    content: "<?php echo esc_attr($after_label); ?>";
}
</style>

<div id="<?php echo esc_attr($int_id); ?>" class="eso-before-after twentytwenty-container">
    <img src="<?php echo $image_1; ?>">
    <img src="<?php echo $image_2; ?>">
</div>

<script type="text/javascript">
(function($) {
    $(document).ready(function() {
        $('#<?php echo esc_attr($int_id); ?>').imagesLoaded( function() {
            $('#<?php echo esc_attr($int_id); ?>').twentytwenty({
                default_offset_pct: <?php echo esc_attr($initial_offset); ?>,
                orientation: '<?php echo esc_attr($orientation); ?>',
            });
        });
    })
})(jQuery)
</script>
