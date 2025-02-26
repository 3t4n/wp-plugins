<?php
/**
 * Import / export CSV tool
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="postbox section-tool">
    <div class="rkseo-section-header">
        <h2>
            <?php esc_html_e('Data', 'wp-rankology'); ?>
        </h2>
    </div>
    <div class="inside">
        <h3>
            <?php esc_html_e('Import data from a CSV', 'wp-rankology'); ?>
        </h3>
        <p>
            <?php esc_html_e('Upload a CSV file to quickly import post (post, page, single post type) and term metadata.', 'wp-rankology'); ?>
        </p>
        <ul>
            <li>
                <?php esc_html_e('Slug', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Meta title', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Meta description', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Meta robots (noindex, nofollow...)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Facebook Open Graph tags (title, description, image)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Twitter cards tags (title, description, image)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Redirection (enable, login status, type, URL)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Primary category', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Canonical URL', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Target keywords', 'wp-rankology'); ?>
            </li>
        </ul>
        <p>
            <a class="btn btnTertiary"
                href="<?php echo admin_url('admin.php?page=rankology_csv_importer'); ?>">
                <?php esc_html_e('Run the importer', 'wp-rankology'); ?>
            </a>
        </p>
    </div><!-- .inside -->
</div><!-- .postbox -->
<div id="metadata-migration-tool" class="postbox section-tool">
    <div class="inside">
        <h3>
            <?php esc_html_e('Export metadata to a CSV', 'wp-rankology'); ?>
        </h3>
        <p>
            <?php esc_html_e('Export your post (post, page, single post type) and term metadata for this site as a .csv file.', 'wp-rankology'); ?>
        </p>
        <ul>
            <li>
                <?php esc_html_e('ID', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Permalink', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Slug', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Meta title', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Meta description', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Meta robots (noindex, nofollow...)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Facebook Open Graph tags (title, description, image)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Twitter cards tags (title, description, image)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Redirection (enable, login status, type, URL)', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Primary category', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Canonical URL', 'wp-rankology'); ?>
            </li>
            <li>
                <?php esc_html_e('Target keywords', 'wp-rankology'); ?>
            </li>
        </ul>
        <form method="post">
            <input type="hidden" name="rankology_action" value="export_csv_metadata" />
            <?php wp_nonce_field('rankology_export_csv_metadata_nonce', 'rankology_export_csv_metadata_nonce'); ?>

            <button id="rankology-metadata-migrate" type="button" class="btn btnTertiary">
                <?php esc_html_e('Export', 'wp-rankology'); ?>
            </button>

            <span class="spinner"></span>

            <div class="log"></div>
        </form>
    </div><!-- .inside -->
</div><!-- .postbox -->
