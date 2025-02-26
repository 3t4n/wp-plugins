<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include 'header.php';
?>

<div id="azo-ads-overview">
    <div class="overview-col-1">
        <div class="overview-row">
            <div class="overview-card overview-statistics">
                <h3>
                    <?php esc_html_e( 'Overviews', 'azo-ads' ); ?>
                    <small><?php esc_html_e( 'Your Ad Statistics', 'azo-ads' ); ?></small>
                </h3>
                <div class="overview-ads">
                    <span class="overview-ads-active">
                        <span class="overview-ads-indicator active"></span>
                        <span class="overview-ads-label">
                            <?php esc_html_e( 'Active Ads', 'azo-ads' ); ?>
                            <span class="overview-ads-number"><?php $statistics = azoads_get_dashboard_statistics(); echo esc_html( $statistics['active'] ); ?></span>
                        </span>
                    </span>
                    <span class="overview-ads-inactive">
                        <span class="overview-ads-indicator in-active"></span>
                        <span class="overview-ads-label">
                            <?php esc_html_e( 'In-Active Ads', 'azo-ads' ); ?>
                            <span class="overview-ads-number"><?php echo esc_html( $statistics['inactive'] ); ?></span>
                        </span>
                    </span>
                    <span class="overview-ads-total">
                        <span class="overview-ads-indicator total"></span>
                        <span class="overview-ads-label">
                            <?php esc_html_e( 'Total Ads', 'azo-ads' ); ?>
                            <span class="overview-ads-number"><?php echo esc_html( $statistics['total'] ); ?></span>
                        </span>
                    </span>
                </div>
            </div>
            <div class="overview-card overview-quick">
                <h3>
                    <?php esc_html_e( 'Quick Action', 'azo-ads' ); ?>
                    <small><?php esc_html_e( 'Manage Ads', 'azo-ads' ); ?></small>
                </h3>
                <div class="overview-quick-btn">
                    <a href="admin.php?page=azo-ads-manage" class="azo-ads-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M112 32c8.8 0 16 7.2 16 16s-7.2 16-16 16H88c-30.9 0-56 25.1-56 56v24c0 8.8-7.2 16-16 16s-16-7.2-16-16V120C0 71.4 39.4 32 88 32h24zM0 304V208c0-8.8 7.2-16 16-16s16 7.2 16 16v96c0 8.8-7.2 16-16 16s-16-7.2-16-16zm16 48c8.8 0 16 7.2 16 16v24c0 30.9 25.1 56 56 56h24c8.8 0 16 7.2 16 16s-7.2 16-16 16H88c-48.6 0-88-39.4-88-88V368c0-8.8 7.2-16 16-16zM433.3 192.6c-9.1 .8-17.3-6.1-17.3-15.3V120c0-30.9-25.1-56-56-56H336c-8.8 0-16-7.2-16-16s7.2-16 16-16h24c48.6 0 88 39.4 88 88v57.4c0 8.1-6.7 14.6-14.7 15.2zM160 464c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H176c-8.8 0-16-7.2-16-16zM272 64H176c-8.8 0-16-7.2-16-16s7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16zM544 368a112 112 0 1 0 -224 0 112 112 0 1 0 224 0zm-256 0a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm160-64v48h48c8.8 0 16 7.2 16 16s-7.2 16-16 16H448v48c0 8.8-7.2 16-16 16s-16-7.2-16-16V384H368c-8.8 0-16-7.2-16-16s7.2-16 16-16h48V304c0-8.8 7.2-16 16-16s16 7.2 16 16z"></path></svg>
                        <?php esc_html_e( 'Create Ads', 'azo-ads' ); ?>
                    </a>
                    <a href="admin.php?page=azo-ads-ads" class="azo-ads-btn manage-ads">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M223.3 37.8c.4-1.5 1.3-2.8 2.4-3.8c9.9-1.3 20-2 30.3-2s20.4 .7 30.3 2c1.1 1 1.9 2.3 2.4 3.8l13.7 47.7c3.5 12.1 12.2 21.1 22.5 26.1c7.6 3.6 14.8 7.8 21.7 12.5c9.4 6.5 21.7 9.5 33.9 6.5l48.2-12c1.5-.4 3-.3 4.4 .2c5.4 6.9 10.4 14.2 14.9 21.8l4.3 7.4c4.2 7.5 7.9 15.3 11.2 23.3c-.3 1.5-1 2.9-2.1 4L426.8 211c-8.7 9-12.2 21.1-11.3 32.5c.3 4.1 .5 8.3 .5 12.5s-.2 8.4-.5 12.5c-.9 11.4 2.6 23.5 11.3 32.5l34.5 35.7c1.1 1.1 1.8 2.5 2.1 4c-3.3 8-7 15.8-11.2 23.4l-4.2 7.3c-4.6 7.6-9.6 14.8-14.9 21.8c-1.4 .5-2.9 .5-4.4 .2l-48.2-12c-12.2-3-24.4 0-33.9 6.5c-6.9 4.7-14.1 8.9-21.7 12.5c-10.3 4.9-19.1 14-22.5 26.1l-13.7 47.7c-.4 1.5-1.3 2.8-2.4 3.8c-9.9 1.3-20 2-30.3 2s-20.4-.7-30.3-2c-1.1-1-1.9-2.3-2.4-3.8l-13.7-47.7c-3.5-12.1-12.2-21.1-22.5-26.1c-7.6-3.6-14.8-7.8-21.7-12.5c-9.4-6.5-21.7-9.5-33.9-6.5l-48.2 12c-1.5 .4-3 .3-4.4-.2c-5.4-7-10.4-14.2-15-21.8l-4.2-7.3c-4.2-7.5-7.9-15.3-11.2-23.4c.3-1.5 1-2.9 2.1-4L85.2 301c8.7-9 12.2-21.1 11.3-32.5c-.3-4.1-.5-8.3-.5-12.5s.2-8.4 .5-12.5c.9-11.4-2.6-23.5-11.3-32.5L50.7 175.2c-1.1-1.1-1.8-2.5-2.1-4c3.3-8 7-15.8 11.2-23.4l4.2-7.3c4.6-7.6 9.6-14.8 15-21.8c1.4-.5 2.9-.5 4.4-.2l48.2 12c12.2 3 24.4 0 33.9-6.5c6.9-4.7 14.1-8.9 21.7-12.5c10.3-4.9 19.1-14 22.5-26.1l13.7-47.7zM256 0c-13 0-25.9 1-38.4 2.9c-1.7 .3-3.4 .8-5 1.6c-9.5 4.9-16.9 13.6-20 24.5L178.9 76.7c-.6 2.2-2.5 4.5-5.6 6c-9.1 4.3-17.8 9.4-26 15c-2.8 1.9-5.8 2.4-8 1.8l-48.2-12C80.2 84.8 69 86.9 60 92.6c-1.5 .9-2.8 2.1-3.9 3.5C49 105 42.4 114.3 36.5 124.1l-.1 .3L32 132l-.1 .3c-5.4 9.8-10.2 19.9-14.3 30.4c-.6 1.6-1 3.3-1.1 5c-.5 10.8 3.3 21.6 11.2 29.8l34.5 35.7c1.6 1.7 2.7 4.4 2.4 7.8c-.4 5-.6 10-.6 15s.2 10.1 .6 15c.3 3.4-.8 6.2-2.4 7.8L27.7 314.6c-7.9 8.2-11.7 19-11.2 29.8c.1 1.7 .5 3.4 1.1 5c4.1 10.5 8.9 20.6 14.3 30.4l.1 .3 4.4 7.6 .1 .3c5.9 9.8 12.4 19.2 19.6 28.1c1.1 1.4 2.4 2.6 3.9 3.5c9 5.7 20.2 7.8 31.1 5.1l48.2-12c2.2-.6 5.2-.1 8 1.8c8.2 5.7 16.9 10.7 26 15c3.1 1.5 4.9 3.8 5.6 6L192.6 483c3.1 10.8 10.5 19.5 20 24.5c1.6 .8 3.2 1.4 5 1.6C230.1 511 243 512 256 512s25.9-1 38.4-2.9c1.7-.3 3.4-.8 5-1.6c9.5-4.9 16.9-13.6 20-24.5l13.7-47.7c.6-2.2 2.5-4.5 5.6-6c9.1-4.3 17.8-9.4 26-15c2.8-1.9 5.8-2.4 8-1.8l48.2 12c10.9 2.7 22.1 .7 31.1-5.1c1.5-.9 2.8-2.1 3.9-3.5c7.1-8.9 13.6-18.2 19.5-28l.1-.3L480 380l.1-.3c5.4-9.7 10.2-19.9 14.3-30.4c.6-1.6 1-3.3 1.1-5c.5-10.8-3.3-21.6-11.2-29.8l-34.5-35.7c-1.6-1.7-2.7-4.4-2.4-7.8c.4-5 .6-10 .6-15s-.2-10.1-.6-15c-.3-3.4 .8-6.2 2.4-7.8l34.5-35.7c7.9-8.2 11.7-19 11.2-29.8c-.1-1.7-.5-3.4-1.1-5c-4.1-10.5-8.9-20.6-14.3-30.4l-.1-.3-4.4-7.6-.1-.3c-5.9-9.8-12.4-19.2-19.5-28c-1.1-1.4-2.4-2.6-3.9-3.5c-9-5.7-20.2-7.8-31.1-5.1l-48.2 12c-2.2 .6-5.2 .1-8-1.8c-8.2-5.7-16.9-10.7-26-15c-3.1-1.5-4.9-3.8-5.6-6L319.4 29c-3.1-10.8-10.5-19.5-20-24.5c-1.6-.8-3.2-1.4-5-1.6C281.9 1 269 0 256 0zM200 256a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm144 0a88 88 0 1 0 -176 0 88 88 0 1 0 176 0z"/></svg>
                        <?php esc_html_e( 'Manage Ads', 'azo-ads' ); ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="overview-row">
            <div class="overview-card overview-news">
                <h3>
                    <?php esc_html_e( 'AZO News', 'azo-ads' ); ?>
                    <small><?php esc_html_e( 'Latest News From AZO Team', 'azo-ads' ); ?></small>
                </h3>
                <div class="overview-news-data">
                    <span class="overview-news-loader"><span class="azo-spinner spinner-dark spinner-left"><?php esc_html_e( 'Loading...', 'azo-ads' ); ?></span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="overview-col-2">
        <div class="overview-row">
            <div class="overview-card overview-reports">
                <h3>
                    <?php esc_html_e( 'Reports', 'azo-ads' ); ?>
                    <small><?php esc_html_e( 'Impression & Click Last 7 Days', 'azo-ads' ); ?></small>
                </h3>
                <div class="over-view-reports-chart">
                    <?php
                    $reports = azoads_get_reports_data( 'all', 'last-7-days' );
                    $total_impression = 0;
                    $total_click = 0;
                    if ( $reports['impression'] ) {
                        foreach ( $reports['impression'] as $impression ) {
                            $total_impression += $impression;
                        }
                    }
                    if ( $reports['click'] ) {
                        foreach ( $reports['click'] as $click ) {
                            $total_click += $click;
                        }
                    }
                    ?>
                    <div class="reports-statistics">
                        <div class="reports-data reports-impression">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM229.5 173.3l72 144c5.9 11.9 1.1 26.3-10.7 32.2s-26.3 1.1-32.2-10.7L253.2 328H162.8l-5.4 10.7c-5.9 11.9-20.3 16.7-32.2 10.7s-16.7-20.3-10.7-32.2l72-144c4.1-8.1 12.4-13.3 21.5-13.3s17.4 5.1 21.5 13.3zM208 237.7L186.8 280h42.3L208 237.7zM392 256a24 24 0 1 0 0 48 24 24 0 1 0 0-48zm24-43.9V184c0-13.3 10.7-24 24-24s24 10.7 24 24v96 48c0 13.3-10.7 24-24 24c-6.6 0-12.6-2.7-17-7c-9.4 4.5-19.9 7-31 7c-39.8 0-72-32.2-72-72s32.2-72 72-72c8.4 0 16.5 1.4 24 4.1z"/></svg>
                            <span class="reports-number"><?php echo number_format( $total_impression ); ?></span>
                        </div>
                        <div class="reports-data reports-click">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 448c106 0 192-86 192-192s-86-192-192-192S64 150 64 256c0 3.9 .1 7.8 .4 11.7L1.8 286.1C.6 276.2 0 266.2 0 256C0 114.6 114.6 0 256 0S512 114.6 512 256s-114.6 256-256 256c-10.2 0-20.2-.6-30.1-1.8l18.4-62.6c3.9 .2 7.8 .4 11.7 .4zm2.3-48l19.7-67c33.5-9.6 58-40.4 58-76.9c0-44.2-35.8-80-80-80c-36.5 0-67.4 24.5-76.9 58L112 253.7C113.2 175.2 177.2 112 256 112c79.5 0 144 64.5 144 144c0 78.8-63.2 142.8-141.7 144zM39 308.5l204.8-60.2c12.1-3.6 23.4 7.7 19.9 19.9L203.5 473c-4.1 13.9-23.2 15.6-29.7 2.6l-28.7-57.3c-.7-1.3-1.5-2.6-2.5-3.7l-88 88c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l88-88c-1.1-1-2.3-1.9-3.7-2.5L36.4 338.2c-13-6.5-11.3-25.6 2.6-29.7z"/></svg>
                            <span class="reports-number"><?php echo number_format( $total_click ); ?></span>
                        </div>
                    </div>
                    <div id="azo-ads-chart" style="width: 100%;"></div>
                    <script type="text/javascript">
                    var options = {
                        series: [
                            {
                                name: 'Impression',
                                data: [<?php echo esc_html( implode( ',', $reports['impression'] ) ); ?>]
                            },
                            {
                                name: 'Click',
                                data: [<?php echo esc_html( implode( ',', $reports['click'] ) ); ?>]
                            },
                        ],
                        chart: {
                            type: 'area',
                            height: 450,
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#00e396', '#0080ff'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                            dashArray: 0,
                        },
                        legend: {
                            position: 'top',
                            horizontalAlign: 'left'
                        },
                        xaxis: {
                            type: 'category',
                            categories: ['<?php echo wp_kses( implode( "','", $reports['categories'] ), [] ); ?>']
                        },
                        tooltip: {
                            style: {
                                fontSize: '12px',
                                fontFamily: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif'
                            },
                        }
                    };
                    var azoads_chart = new ApexCharts( document.querySelector( '#azo-ads-chart' ), options );
                    azoads_chart.render();
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>