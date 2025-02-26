<?php

/**
 * Template for the LinkCentral Insights page in the WordPress admin.
 *
 * This template displays various statistics and data about link usage,
 * including total clicks, most popular links, and recent click activity.
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
// Exit if accessed directly
do_action( 'linkcentral_admin_header' );
?>

<div class="wrap linkcentral-insights">
    <h1><?php 
esc_html_e( 'Insights', 'linkcentral' );
?></h1>
    
    <?php 
/**
 * Total Clicks Section
 * 
 * Displays a chart showing total clicks over time.
 */
?>
    <div id="linkcentral-total-clicks-container">
        <h2><?php 
esc_html_e( 'Total Clicks', 'linkcentral' );
?></h2>
        <div id="linkcentral-stats-controls">
            <div id="linkcentral-total-clicks-container-left-controls">
                <button id="linkcentral-stats-all-links" class="button"><?php 
esc_html_e( 'All Links', 'linkcentral' );
?></button>
                <p class="linkcentral-or-text"><?php 
esc_html_e( 'or', 'linkcentral' );
?></p>
                <?php 
?>
                    <div class="linkcentral-premium-feature">
                        <input type="text" id="linkcentral-link-search" placeholder="<?php 
esc_attr_e( 'Search for a specific link', 'linkcentral' );
?>" disabled>
                        <a href="<?php 
echo esc_url( admin_url( 'admin.php?page=linkcentral-settings#linkcentral-premium' ) );
?>" class="linkcentral-premium-tag linkcentral-premium-tag-to-input-field"><?php 
esc_html_e( 'Premium', 'linkcentral' );
?></a>
                    </div>
                <?php 
?>
            </div>
            <div id="linkcentral-total-clicks-container-right-controls">
                <select id="linkcentral-timeframe">
                    <option value="7"><?php 
esc_html_e( 'Last 7 days', 'linkcentral' );
?></option>
                    <option value="30"><?php 
esc_html_e( 'Last 30 days', 'linkcentral' );
?></option>
                    <option value="365"><?php 
esc_html_e( 'Last year', 'linkcentral' );
?></option>
                    <?php 
?>
                        <option value="since_start" disabled><?php 
esc_html_e( 'Since start (Premium)', 'linkcentral' );
?></option>
                    <?php 
?>

                    <option value="custom"><?php 
esc_html_e( 'Custom range', 'linkcentral' );
?></option>
                </select>
                <div id="linkcentral-custom-range" style="display:none;">
                    <div class="linkcentral-custom-range-inputs">
                        <input type="date" id="linkcentral-date-from" aria-label="<?php 
esc_attr_e( 'From date', 'linkcentral' );
?>">
                        <input type="date" id="linkcentral-date-to" aria-label="<?php 
esc_attr_e( 'To date', 'linkcentral' );
?>">
                        <button id="linkcentral-apply-custom" class="button"><?php 
esc_html_e( 'Apply', 'linkcentral' );
?></button>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 300px;">
            <div id="linkcentral-total-clicks-chart"></div>
        </div>
    </div>

    <?php 
/**
 * Most Popular Links Section
 * 
 * Displays a table of the most clicked links.
 */
?>
    <div id="linkcentral-top-links-container">
        <h2><?php 
esc_html_e( 'Most Popular Links', 'linkcentral' );
?></h2>
        <div id="linkcentral-top-links-controls">
            <select id="linkcentral-top-links-timeframe">
                <option value="1"><?php 
esc_html_e( 'Last 24 hours', 'linkcentral' );
?></option>
                <option value="7" selected><?php 
esc_html_e( 'Last 7 days', 'linkcentral' );
?></option>
                <option value="30"><?php 
esc_html_e( 'Last 30 days', 'linkcentral' );
?></option>
                <option value="365"><?php 
esc_html_e( 'Last year', 'linkcentral' );
?></option>
                <option value="all"><?php 
esc_html_e( 'All time', 'linkcentral' );
?></option>
            </select>
        </div>
        <?php 
$track_unique_visitors = get_option( 'linkcentral_track_unique_visitors', false );
?>
        <table class="wp-list-table widefat fixed striped" id="linkcentral-top-links-table">
            <thead>
                <tr>
                    <th class="linkcentral-column-title"><?php 
esc_html_e( 'Name', 'linkcentral' );
?></th>
                    <th class="linkcentral-column-slug"><?php 
esc_html_e( 'Slug', 'linkcentral' );
?></th>
                    <th class="linkcentral-column-destination_url"><?php 
esc_html_e( 'Destination URL', 'linkcentral' );
?></th>
                    <th class="linkcentral-column-total-clicks"><?php 
esc_html_e( 'Total Clicks', 'linkcentral' );
?></th>
                    <?php 
if ( $track_unique_visitors ) {
    ?>
                        <th class="linkcentral-column-unique-clicks"><?php 
    esc_html_e( 'Unique Clicks', 'linkcentral' );
    ?></th>
                    <?php 
}
?>
                </tr>
            </thead>
            <tbody>
                <tr class="linkcentral-loading">
                    <td colspan="<?php 
echo ( $track_unique_visitors ? '5' : '4' );
?>">
                        <span class="spinner is-active"></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="tablenav bottom">
            <div class="tablenav-pages">
                <span class="displaying-num">
                    <?php 
$start = ($initial_top_links_data['current_page'] - 1) * $initial_top_links_data['items_per_page'] + 1;
$end = min( $initial_top_links_data['current_page'] * $initial_top_links_data['items_per_page'], $initial_top_links_data['total_items'] );
echo esc_html( "{$start}-{$end} of {$initial_top_links_data['total_items']} items" );
?>
                </span>
                <span class="pagination-links">
                    <a class="first-page button <?php 
echo ( $initial_top_links_data['current_page'] <= 1 ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'First page', 'linkcentral' );
?></span><span aria-hidden="true">&laquo;</span></a>
                    <a class="prev-page button <?php 
echo ( $initial_top_links_data['current_page'] <= 1 ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'Previous page', 'linkcentral' );
?></span><span aria-hidden="true">&lsaquo;</span></a>
                    <span class="paging-input">
                        <label for="top-links-current-page" class="screen-reader-text"><?php 
esc_html_e( 'Current Page', 'linkcentral' );
?></label>
                        <input class="current-page" id="top-links-current-page" type="text" name="paged" value="<?php 
echo esc_attr( $initial_top_links_data['current_page'] );
?>" size="1" aria-describedby="table-paging">
                        <span class="tablenav-paging-text"> of <span class="total-pages"><?php 
echo esc_html( $initial_top_links_data['total_pages'] );
?></span></span>
                    </span>
                    <a class="next-page button <?php 
echo ( $initial_top_links_data['current_page'] >= $initial_top_links_data['total_pages'] ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'Next page', 'linkcentral' );
?></span><span aria-hidden="true">&rsaquo;</span></a>
                    <a class="last-page button <?php 
echo ( $initial_top_links_data['current_page'] >= $initial_top_links_data['total_pages'] ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'Last page', 'linkcentral' );
?></span><span aria-hidden="true">&raquo;</span></a>
                </span>
            </div>
        </div>
    </div>

    <?php 
/**
 * Recent Clicks Section
 * 
 * Displays a table of recent click activity.
 */
?>
    <div id="linkcentral-recent-clicks-container">
        <h2><?php 
esc_html_e( 'Recent Clicks', 'linkcentral' );
?></h2>
        <table class="wp-list-table widefat fixed striped" id="linkcentral-recent-clicks-table">
            <thead>
                <tr>
                    <th class="linkcentral-column-title"><?php 
esc_html_e( 'Name', 'linkcentral' );
?></th>
                    <th class="linkcentral-column-slug"><?php 
esc_html_e( 'Slug', 'linkcentral' );
?></th>
                    <th class="linkcentral-column-referring_url"><?php 
esc_html_e( 'Referring URL', 'linkcentral' );
?></th>
                    <th class="linkcentral-column-destination_url"><?php 
esc_html_e( 'Destination URL', 'linkcentral' );
?></th>
                    <?php 
if ( $track_user_agent ) {
    ?>
                        <th class="linkcentral-column-user-agent"><?php 
    esc_html_e( 'User Agent', 'linkcentral' );
    ?></th>
                    <?php 
}
?>
                    <th class="linkcentral-column-timestamp"><?php 
esc_html_e( 'Click Timestamp', 'linkcentral' );
?></th>
                </tr>
            </thead>
            <tbody>
                <tr class="linkcentral-loading">
                    <td colspan="<?php 
echo ( $track_user_agent ? '6' : '5' );
?>">
                        <span class="spinner is-active"></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="tablenav bottom">
            <div class="tablenav-pages">
                <span class="displaying-num">
                    <?php 
$start = ($initial_recent_clicks_data['current_page'] - 1) * $initial_recent_clicks_data['items_per_page'] + 1;
$end = min( $initial_recent_clicks_data['current_page'] * $initial_recent_clicks_data['items_per_page'], $initial_recent_clicks_data['total_items'] );
echo esc_html( "{$start}-{$end} of {$initial_recent_clicks_data['total_items']} items" );
?>
                </span>
                <span class="pagination-links">
                    <a class="first-page button <?php 
echo ( $initial_recent_clicks_data['current_page'] <= 1 ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'First page', 'linkcentral' );
?></span><span aria-hidden="true">&laquo;</span></a>
                    <a class="prev-page button <?php 
echo ( $initial_recent_clicks_data['current_page'] <= 1 ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'Previous page', 'linkcentral' );
?></span><span aria-hidden="true">&lsaquo;</span></a>
                    <span class="paging-input">
                        <label for="recent-clicks-current-page" class="screen-reader-text"><?php 
esc_html_e( 'Current Page', 'linkcentral' );
?></label>
                        <input class="current-page" id="recent-clicks-current-page" type="text" name="paged" value="<?php 
echo esc_attr( $initial_recent_clicks_data['current_page'] );
?>" size="1" aria-describedby="table-paging">
                        <span class="tablenav-paging-text"> of <span class="total-pages"><?php 
echo esc_html( $initial_recent_clicks_data['total_pages'] );
?></span></span>
                    </span>
                    <a class="next-page button <?php 
echo ( $initial_recent_clicks_data['current_page'] >= $initial_recent_clicks_data['total_pages'] ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'Next page', 'linkcentral' );
?></span><span aria-hidden="true">&rsaquo;</span></a>
                    <a class="last-page button <?php 
echo ( $initial_recent_clicks_data['current_page'] >= $initial_recent_clicks_data['total_pages'] ? 'disabled' : '' );
?>" href="#"><span class="screen-reader-text"><?php 
esc_html_e( 'Last page', 'linkcentral' );
?></span><span aria-hidden="true">&raquo;</span></a>
                </span>
            </div>
        </div>
    </div>
</div>
