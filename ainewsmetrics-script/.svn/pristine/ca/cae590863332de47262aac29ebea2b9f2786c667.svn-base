<?php

function ainews_metrics_head_script_init(): void {
    $script_url = 'https://script.metrics.ainews.kz/v1/metrics-track.js';
    $project_id = get_option('ainews_metrics_project_id');

    ?>
    <!-- AinewsMetrics script -->
    <script type="text/javascript">
        window.metricsTrackDataLayer = window.metricsTrackDataLayer || [];
        function metricsTrack(){
            metricsTrackDataLayer.push(...arguments);
        }
        metricsTrack({
            service: 'config',
            projectID: '<?php echo esc_html($project_id); ?>',
        });
    </script>
    
    <script
        type="text/javascript"
        src="<?php echo esc_url($script_url) ?>"
        async
    >
    </script>
    <!-- /AinewsMetrics script  -->
    <?php
}