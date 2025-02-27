<div id="<?php echo $int_id;?>" class="eso-radial uk-text-center uk-position-relative" uk-scrollspy="cls: eso; hidden: false; offset-top: -<?php echo $trigger_distance; ?>;">

    <?php if (!empty($icon)) : ?>
        <div class="eso-radial-title uk-position-center <?php echo esc_attr(implode(' ', $title_class)); ?>">
            <?php echo siteorigin_widget_get_icon( $icon, $icon_styles ); ?>
        </div>
    <?php endif; ?>

    <svg class="radial-progress" data-percentage="<?php echo $percent; ?>" viewBox="0 0 80 80">
        <circle class="incomplete" cx="40" cy="40" r="35"></circle>
        <circle class="complete" cx="40" cy="40" r="35" style="stroke-dashoffset: <?php echo $strokeDashOffset; ?>;" stroke-linecap="<?php echo esc_attr($line_cap); ?>"></circle>
    </svg>

</div>

<?php if ($animate == 'true') : ?>
    <script type="text/javascript">
    (function($) {

        $(document).on('inview', '#<?php echo $int_id; ?>', function() {
            var percent = $('#<?php echo $int_id; ?> .radial-progress').data('percentage');
            var radius = $('#<?php echo $int_id; ?> circle.complete').attr('r');
            var circumference = 2 * Math.PI * radius;
            var strokeDashOffset = circumference - ((percent * circumference) / 100);
            $('#<?php echo $int_id; ?> svg.radial-progress circle.complete').animate({'stroke-dashoffset': strokeDashOffset}, 750);
        });

    })(jQuery)
</script>
<?php endif; ?>
