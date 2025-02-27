<div id="<?php echo $int_id; ?>_spy" uk-scrollspy="cls: eso; hidden: false; offset-top: -<?php echo esc_attr($offset); ?>; delay: 10;" class="<?php echo esc_attr(implode(' ', $wrapper_class)); ?>">
    <div id="<?php echo $int_id; ?>" class="eso-counter <?php echo esc_attr(implode(' ', $class)); ?>">
        <?php echo esc_html($startVal); ?>
    </div>
</div>

<script type="text/javascript">

UIkit.util.on('#<?php echo $int_id; ?>_spy', 'inview', function (item) {
    var options = {
        useEasing: <?php echo $easing; ?>,
        decimal: '<?php echo esc_attr($decimal); ?>',
        useGrouping: <?php echo esc_attr($grouping); ?>,
        separator: '<?php echo esc_attr($separator); ?>'
    };

    var <?php echo $int_id; ?> = new CountUp('<?php echo $int_id; ?>', <?php echo esc_attr($startVal); ?>, <?php echo esc_attr($endVal); ?>, <?php echo esc_attr($decimal_places); ?>, <?php echo esc_attr($duration); ?>, options).start();

});
</script>
