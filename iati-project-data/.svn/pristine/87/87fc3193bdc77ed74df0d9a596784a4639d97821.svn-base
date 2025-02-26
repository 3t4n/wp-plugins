<?php
global $wpdb;
$project_opts      = get_option( 'iati_project_opts' );
?>

<div class="iati-row">
    <div class="iati-col main-col">
        <h3><span class="dashicons dashicons-category"></span> <?php esc_html_e( 'No data', 'iatiproject' ); ?></h3>
        <p>
            <?php esc_html_e( 'You have not yet retrieved the data of your project. Click the button below to fetch data from the d-portal website and populate your database. Make sure you have provided the identifier of the project you want to retrieve data.', 'iatiproject' ); ?>
        </p>
        <p>
            <form method="post" action="admin-post.php">
                <input type="hidden" name="action" value="iati_fetch_project_data">
                <?php wp_nonce_field( 'fetch_data_verify' ); ?>
                <input type="text" name="project-id" class="all-options" value="<?php echo $project_opts['project_id']; ?>" />
                <input type="submit" class="button" value="<?php esc_attr_e( "Fetch project data", 'iatiproject' ); ?>" />
            </form>
        </p>
    </div><div class="iati-col side-col">
        <div class="sticky-col">
            <div class="sticky-social-box">
                    <h3><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'About IATA Project Data', 'iatiproject' ); ?></h3>
                    <p>
                        <?php _e( 'This plugin retrieves information about a specific IATI project from <a href="https://d-portal.org" target="_blank">d-portal.org</a> website and stores it in a database. The information stored will be updated as soon as d-portal updates the data on their own platform.', 'iatiproject' ); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>