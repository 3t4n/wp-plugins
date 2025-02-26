<div class="o-wrap">
    <canvas id="hourly-usage-chart"></canvas>
</div>

<?php if (!empty($labels) && !empty($hits) && !empty($pages)) { ?>
    <script>
        const hourlyUsageData = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [
                {
                    label: '<?php esc_html_e('Pages', 'rankology-stats-detailed-data'); ?>',
                    data: <?php echo json_encode($pages); ?>,
                    backgroundColor: 'rgba(252, 226, 230, 1)',
                    borderColor: 'rgba(238, 110, 133, 1)',
                    borderWidth: 1,
                    borderSkipped: false,
                    fill: false,
                },
                {
                    label: '<?php esc_html_e('Traffic', 'rankology-stats-detailed-data'); ?>',
                    data: <?php echo json_encode($hits); ?>,
                    backgroundColor: 'rgba(221, 236, 250, 1)',
                    borderColor: 'rgba(83, 161, 229, 1)',
                    borderWidth: 1,
                    borderSkipped: false,
                    fill: false,
                }
            ]
        };
    </script>
<?php } ?>