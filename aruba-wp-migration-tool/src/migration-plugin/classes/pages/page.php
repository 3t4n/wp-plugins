<?php

abstract class AWMT_Page
{
    abstract protected function draw();
    private function loadStyles()
    {
        wp_register_style(
            'aruba-migrator-style', // handle name
            plugins_url('../assets/css/aruba-migrator.css', dirname(__FILE__)),
            [],
            "1.0.0"
        );
        wp_enqueue_style('aruba-migrator-style');
    }

    public function buildPage()
    {
        $this->loadStyles();

        echo "<div id='wp2wp' class='wrap'> <img style='float:left;' src='".esc_attr(plugin_dir_url( __DIR__ ))."../assets/images/admin-icon.svg"."'>
            <h1>".esc_html(__("Aruba Migration Tool","aruba-wp-migration-tool"))." - " . esc_html(get_admin_page_title()) . "</h1>";
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        if(isset($_GET['page']) && esc_attr(sanitize_text_field($_GET['page']))!=="aruba-wp-migration-tool"){
            echo "<div class='notice notice-warning '> <!-- is-dismissible-->
        <p>".esc_html(__("Before migrating using Aruba Migration Tool, we recommend you check the",'aruba-wp-migration-tool')).
        "&nbsp;<a href='".esc_url(AWMT_ARUBA_HELP_URL)."' target='_blank'>".esc_html(__("system compatibility requirements",'aruba-wp-migration-tool'))."</a></p>
        </div>";

        }
        $this->draw();
        echo "</div>";
    }
}
