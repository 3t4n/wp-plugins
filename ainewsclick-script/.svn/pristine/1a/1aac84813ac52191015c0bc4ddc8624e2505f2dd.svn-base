<?php

function ainews_click_head_script_init(): void {
    $script_url = 'https://b2b.ainews.kz/script/v2/ainews-click.js';
    $project_id = get_option('ainews_click_project_id');

    ?>
    <!-- AinewsClick script -->
    <script  type="text/javascript">
        window.ainewsClickDataLayer = window.ainewsClickDataLayer || [];
        function ainewsClick() {
            ainewsClickDataLayer.push(arguments);
        }
        ainewsClick(
            'config',
            '<?php echo esc_html($project_id) ?>',
        );
    </script>

    <script
        type="text/javascript"
        src="<?php echo esc_url($script_url) ?>"
        async
    ></script>
    <!-- /AinewsClick script  -->
    <?php
}
