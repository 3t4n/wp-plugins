<?php
    global $wpdb;
    $table_name = $wpdb->prefix . 'vform_userinput';
    $total_leads = $wpdb->get_var("
        SELECT COUNT(*)
        FROM $table_name
    ");

    $table_name = $wpdb->prefix . 'vform';
    $total_forms = $wpdb->get_var("
        SELECT COUNT(*)
        FROM $table_name
    ");


?>
<div class="css-18e3853-PageLayout--mobile-PageLayout--tablet-PageLayout--desktop">
        <main class="css-17sl3ck-PageLayout--mainStyle">
            <div>
                <div class="css-1dxorl-HistoryPage--mobile-HistoryPage--tablet"><span class="css-1131mgd-Text" data-zds="true">Vform Analytics</span></div>
                <div class="css-1bt4ztp-HistoryPage--mobile-HistoryPage--tablet">
                    <div class="css-85pk7a-HistoryTabNavigation--navStyle">
                        <nav data-zds="true" class="css-14tgpsv-Tabs">
                            <div data-zds="true" class="css-uzkwfh-Tabs__primary">
                                
                                    <a aria-current="page" class="css-xh4twp-Tabs__item " data-zds="true" href="admin.php?page=vform_entries"><span data-text="[object Object]" data-zds="true" class="css-7zaj10-Tabs__itemText"><span class="css-mq6vhk-Text" data-zds="true">Entries</span></span></a>
                                        
                                        <a class="css-1uspe5b-Tabs__item active" data-zds="true" href="admin.php?page=vform_entries&amp;frm_action=analytics"><span data-zds="true" class="css-7zaj10-Tabs__itemText"><span class="css-mq6vhk-Text" data-zds="true">Analytics</span></span></a>
                                        
                            </div>
                            <div data-zds="true" class="css-1nu6yqo-Tabs__indicatorTrack">
                                <div data-type="default" data-zds="true" class="css-bcq1s5-Tabs__indicator" style="left: 0px; width: 126px;"></div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div data-zds="true" class="css-xeniyz-Spacer-0-by-20"></div>
                <div>


                    <div class="css-1i7v3y3-TaskUsageTab--rootStyle">
                        <div class="css-1jkztph-TaskUsageTab--mobile-TaskUsageTab--tablet">
                            <div data-testid="UsageStat" class="css-ns1p8w-UsageStat--mobile-UsageStat--tablet-UsageStat--desktop"><span
                                    aria-hidden="true" data-testid="iconContainer" data-zds="true"
                                    class="css-1tjjda2-Icon--miscBoltAlt--animate--32x32--neutral800"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="32" width="32" size="32"
                                        color="neutral800" name="miscBoltAlt">
                                        <path fill="#2D2E2E"
                                            d="M11 12H7.75L13 5.75V12h3.25L11 18.25V16H9v7.75L20.54 10H15V.25L3.46 14H11v-2Z"></path>
                                    </svg></span>
                                <div class="css-12fzvzr-UsageStat--detailStyle"><span class="css-1lt25uj-Text" data-zds="true">Total
                                        forms</span><span class="css-i7tyte-Text" data-zds="true"><span><?php echo  $total_forms; ?></span></span></div>
                            </div>
                            <div data-testid="UsageStat" class="css-ns1p8w-UsageStat--mobile-UsageStat--tablet-UsageStat--desktop"><span
                                    aria-hidden="true" data-testid="iconContainer" data-zds="true"
                                    class="css-1799708-Icon--formCheckCircle--animate--32x32--neutral800"><svg
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" height="32" width="32" size="32"
                                        color="neutral800" name="formCheckCircle">
                                        <path fill="#2D2E2E"
                                            d="M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20ZM8.21 10.79l2.79 2.8 5.29-5.3 1.42 1.42-6.71 6.7-4.21-4.2 1.42-1.42Z">
                                        </path>
                                    </svg></span>
                                <div class="css-12fzvzr-UsageStat--detailStyle"><span class="css-1lt25uj-Text" data-zds="true">Total
                                        Leads</span><span class="css-i7tyte-Text" data-zds="true"><span><?php echo  $total_leads; ?></span></span></div>
                            </div>
                        </div>
                        <div class="css-1i65g83-TaskUsageTab--taskTrendStyle">
                                <span>
                                    <h3 class="css-lk1ene-Text" data-zds="true">Leads</h3><span class="css-howwmv-Text" data-zds="true">Past 30
                                    days</span>
                                </span>
                            <div class="graphmain">
                                <?php
                                    $table_name = $wpdb->prefix . 'vform_userinput';

                                    // Get data for the past 30 days
                                    $results = $wpdb->get_results("
                                        SELECT DATE_FORMAT(STR_TO_DATE(currentdate_part2, '%a %b %d %Y %H:%i:%s'), '%Y-%m-%d') AS lead_date, 
                                            COUNT(*) AS lead_count
                                        FROM $table_name
                                        WHERE STR_TO_DATE(currentdate_part2, '%a %b %d %Y %H:%i:%s') >= CURDATE() - INTERVAL 30 DAY
                                        GROUP BY lead_date
                                        ORDER BY lead_date ASC
                                    ");

                                    // Format results into an array
                                    $formatted_data = [];
                                    foreach ($results as $row) {
                                        $formatted_data[$row->lead_date] = $row->lead_count;
                                    }

                                    // Fill in missing days with zero leads
                                    $dates = [];
                                    for ($i = 29; $i >= 0; $i--) {
                                        $date = date('Y-m-d', strtotime("-$i days"));
                                        $dates[] = [
                                            'date' => $date,
                                            'leads' => $formatted_data[$date] ?? 0
                                        ];
                                    }
                                ?>
                                <div id="bar-chart-container">
                                    <div id="bar-chart">
                                        <?php foreach ($dates as $item): ?>
                                            <div class="bar" style="height: <?= $item['leads'] * 10 ?>px;" title="<?= $item['date'] ?>: <?= $item['leads'] ?> leads">
                                                <span class="bar-count"><?= $item['leads'] ?></span>
                                                <span class="bar-label"><?= date('M d', strtotime($item['date'])) ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>



                    
                </div>
                
                
            </div>
        </main>
    </div>

