<?php
class Concord_Script_Manager {
    private $project_id;

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_concord_script']);
    }

    public function enqueue_concord_script() {

        if (!get_option('concord_integration_enabled', true)) {
            return;
        }

        $project_id = get_option('concord_selected_project');
        if (!$project_id) return;

        wp_enqueue_script(
            'concord-site-client',
            "https://api.concord.tech/site-v1/{$project_id}/site-client",
            [],
            // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion
            null, // Version set to null as we don't support versioning for the script as we handle caching on the server and via AWS Cloudfront
            false
        );
    }
}