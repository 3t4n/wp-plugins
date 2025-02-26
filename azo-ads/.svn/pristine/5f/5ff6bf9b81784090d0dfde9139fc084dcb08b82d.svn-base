<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include 'header.php';
?>
<div class="azo-ads-main">
    <div id="azo-ads-reports">
        <div class="azo-ads-card">
            <h3><?php esc_html_e( 'Reports', 'azo-ads' ); ?></h3>
            <div class="azo-ads-row">
                <div class="azo-ads-row-inner">
                    <div class="azo-ads-reports-head">
                        <div class="azo-ads-reports-head-select">
                            <select id="reports-ad" name="reports-ad" class="azo-ads-dropdown" data-control="select2" data-hide-search="true" data-placeholder="Select Option" data-azo-ads-filter="<?php esc_html_e( 'Select Option', 'azo-ads' ); ?>">
                                <option value="all" selected><?php esc_html_e( 'All', 'azo-ads' ); ?></option>
                                <?php
                                global $azoads_options;
                                if ( isset( $azoads_options['ads'] ) && ! empty( $azoads_options['ads'] ) ) :
                                    foreach ( $azoads_options['ads'] as $ad ) :
                                ?>
                                <option value="<?php echo esc_attr( $ad['ID'] ); ?>"><?php echo esc_html( $ad['post_title'] ); ?></option>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                        <div class="azo-ads-reports-head-select">
                            <select id="reports-time" name="reports-time" class="azo-ads-dropdown" data-control="select2" data-hide-search="true" data-placeholder="Select Option" data-azo-ads-filter=""<?php esc_html_e( 'Select Option', 'azo-ads' ); ?>">
                                <option value="last-7-days" selected><?php esc_html_e( 'Last 7 days', 'azo-ads' ); ?></option>
                                <option value="this-month"><?php esc_html_e( 'This month', 'azo-ads' ); ?></option>
                                <option value="last-month"><?php esc_html_e( 'Last month', 'azo-ads' ); ?></option>
                                <option value="this-year"><?php esc_html_e( 'This year', 'azo-ads' ); ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="azo-ads-row">
                <div class="azo-ads-row-inner">
                    <?php $reports = azoads_get_reports_data( 'all', 'last-7-days' ); ?>
                    <div id="azo-ads-chart" style="width: 100%;"></div>
                </div>
                <script>
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
                    },
                    colors: ['#00e396', '#0080ff'],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth'
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

        <h3><?php esc_html_e( 'Impression & Click', 'azo-ads' ); ?></h3>
        <?php
        $aa_position = azoads_get_list_position();
        $aa_type = azoads_get_list_type();
        ?>
        <div class="azo-ads-card">

            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <span class="search-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"/><path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"/></svg>
                    </span>
                    <input type="text" data-azo-ads-filter="search" class="search-text azo-ads-form-control" placeholder="<?php esc_html_e( 'Search Ads', 'azo-ads' ); ?>" />
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Table-->
                <table id="azo-ads-table-reports" class="azo-ads-table azo-ads-table-reports">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="azo-ads-text-400">
                            <th><?php esc_html_e( 'Name', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Impression', 'azo-ads' ); ?><br /><?php esc_html_e( 'Mobile', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Impression', 'azo-ads' ); ?><br /><?php esc_html_e( 'Tablet', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Impression', 'azo-ads' ); ?><br /><?php esc_html_e( 'Desktop', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Impression', 'azo-ads' ); ?><br /><?php esc_html_e( 'Total', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Click', 'azo-ads' ); ?><br /><?php esc_html_e( 'Mobile', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Click', 'azo-ads' ); ?><br /><?php esc_html_e( 'Tablet', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Click', 'azo-ads' ); ?><br /><?php esc_html_e( 'Desktop', 'azo-ads' ); ?></th>
                            <th><?php esc_html_e( 'Click', 'azo-ads' ); ?><br /><?php esc_html_e( 'Total', 'azo-ads' ); ?></th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody class="azo-ads-text-600">

                        <?php
                        $aa_args = array(
                            'post_type'             => 'azo-ads',
                            'posts_per_page'        => -1,
                            'orderby'               => 'ID',
                            'order'                 => 'DESC'
                        );
                        $aa_query = new WP_Query( $aa_args );
                        if ( $aa_query->have_posts() ) :
                            while ( $aa_query->have_posts() ) :
                                $aa_query->the_post();

                                $position = get_post_meta( get_the_ID(), 'aa_position', true );
                                $type = get_post_meta( get_the_ID(), 'aa_type', true );
                                $impression_desktop = 0;
                                $impression_tablet = 0;
                                $impression_mobile = 0;
                                $click_desktop = 0;
                                $click_tablet = 0;
                                $click_mobile = 0;
                        ?>
                        <tr data-id="<?php the_ID(); ?>">

                            <td>
                                <div class="ads-name-wrapper">
                                    <a href="admin.php?page=azo-ads-manage&id=<?php the_ID(); ?>" class="ads-name" data-azo-ads-filter="product_name"><?php the_title(); ?></a>
                                </div>
                            </td>

                            <td>
                                <?php
                                if ( isset( $reports['ad'][get_the_ID()][1][1] ) ) $impression_mobile = $reports['ad'][get_the_ID()][1][1];
                                else $impression_mobile = 0;
                                echo esc_html( $impression_mobile );
                                ?>
                            </td>
                            
                            <td>
                                <?php
                                if ( isset( $reports['ad'][get_the_ID()][1][2] ) ) $impression_tablet = $reports['ad'][get_the_ID()][1][2];
                                else $impression_tablet = 0;
                                echo esc_html( $impression_tablet );
                                ?>
                            </td>

                            <td>
                                <?php
                                if ( isset( $reports['ad'][get_the_ID()][1][3] ) ) $impression_desktop = $reports['ad'][get_the_ID()][1][3];
                                else $impression_desktop = 0;
                                echo esc_html( $impression_desktop );
                                ?>
                            </td>

                            <td>
                                <?php echo esc_html( ( $impression_desktop + $impression_tablet + $impression_mobile ) ); ?>
                            </td>

                            <td>
                                <?php
                                if ( isset( $reports['ad'][get_the_ID()][2][1] ) ) $click_mobile = $reports['ad'][get_the_ID()][2][1];
                                else $click_mobile = 0;
                                echo esc_html( $click_mobile );
                                ?>
                            </td>
                            
                            <td>
                                <?php
                                if ( isset( $reports['ad'][get_the_ID()][2][2] ) ) $click_tablet = $reports['ad'][get_the_ID()][2][2];
                                else $click_tablet = 0;
                                echo esc_html( $click_tablet );
                                ?>
                            </td>

                            <td>
                                <?php
                                if ( isset( $reports['ad'][get_the_ID()][2][3] ) ) $click_desktop = $reports['ad'][get_the_ID()][2][3];
                                else $click_desktop = 0;
                                echo esc_html( $click_desktop );
                                ?>
                            </td>

                            <td>
                                <?php echo esc_html( ( $click_desktop + $click_tablet + $click_mobile ) ); ?>
                            </td>
                        </tr>
                        
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>

                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <!--end::Card body-->
            <?php wp_nonce_field( 'azoads-report-ad', '_wpnonce' ); ?>

        </div>

    </div>
    
</div>

<?php include 'footer.php'; ?>