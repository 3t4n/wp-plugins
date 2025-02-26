<?php
	// To prevent calling the plugin directly
	if (! function_exists('add_action')) {
		echo 'Please don&rsquo;t call the plugin directly. Thanks :)';
		exit;
	}

	//add_action('rankology_dashboard_insights', 'rankology_fno_dashboard_insights');
	function rankology_fno_dashboard_insights($current_tab) {
		if (defined('RANKOLOGY_WL_ADMIN_HEADER') && RANKOLOGY_WL_ADMIN_HEADER === false) {
			//do nothing
		} else {
			$hide_site_overview = method_exists( rankology_get_service('AdvancedOption'), 'getAppearanceHideSiteOverview') ? rankology_get_service('AdvancedOption')->getAppearanceHideSiteOverview() : '';
			$class = '1' !== $hide_site_overview ? 'is-active' : '';
		?>

		<div id="notice-insights-alert" class="rankology-card <?php echo $class; ?>" style="display: none">
			<div class="rankology-card-title">
				<h2><?php esc_html_e('Site overview', 'wp-rankology'); ?></h2>
			</div>
			<div class="rankology-card-content">
				<div id="rankology-admin-tabs" class="wrap">
					<?php
						$dashboard_settings_tabs = [
							'tab_rankology_analytics' => __('Google Analytics', 'wp-rankology'),
							'tab_rankology_ps' => __('PageSpeed', 'wp-rankology'),
							'tab_rankology_gsc' => __('Search Console', 'wp-rankology'),
						];

						//GA
						if (rankology_get_toggle_option('google-analytics') !=='1' || (function_exists('rankology_google_analytics_dashboard_widget_option') && rankology_google_analytics_dashboard_widget_option() === '1')) {
							unset($dashboard_settings_tabs['tab_rankology_analytics']);
						}

                        //Get Google API Key
                        $options = get_option('rankology_instant_indexing_option_name');
                        $google_api_key = isset($options['rankology_instant_indexing_google_api_key']) ? $options['rankology_instant_indexing_google_api_key'] : '';

                        if (rankology_get_toggle_option('inspect-url') !=='1' || empty($google_api_key)) {
                            unset($dashboard_settings_tabs['tab_rankology_gsc']);
                        }
					?>

					<div class="nav-tab-wrapper">
						<?php foreach ($dashboard_settings_tabs as $tab_key => $tab_caption) { ?>
						<a id="<?php echo $tab_key; ?>-tab" class="nav-tab"
							href="?page=rankology-option#tab=<?php echo $tab_key; ?>"><?php echo $tab_caption; ?></a>
						<?php } ?>
					</div>

					<?php
						$rankology_page_speed_results     = [];
						$rankology_page_speed_results     = json_decode(get_transient('rankology_results_page_speed'), true);
						$rankology_page_speed_desktop_results     = [];
						$rankology_page_speed_desktop_results     = json_decode(get_transient('rankology_results_page_speed_desktop'), true);
						$cwv_svg = '<svg enable-background="new 0 0 24 24" focusable="false" height="15" viewBox="0 0 24 24" width="15" style="fill:#06f;vertical-align:middle"><g><g><path d="M0,0h24v24H0V0z" fill="none"></path></g></g><g><path d="M17,3H7C5.9,3,5,3.9,5,5v16l7-3l7,3V5C19,3.9,18.1,3,17,3z"></path></g></svg>';

						$fetchTime = '';

						$ps_score = '';
						$core_web_vitals_score = '';
						if (! empty($rankology_page_speed_results)) {
							$ps_score = rankology_fno_get_ps_score($rankology_page_speed_results, true);
							$ps_score_desktop = rankology_fno_get_ps_score($rankology_page_speed_desktop_results);
							$core_web_vitals_score = rankology_fno_get_cwv_score($rankology_page_speed_results);
						}
					?>

					<div class="wrap-rankology-tab-content">
						<?php if (rankology_get_toggle_option('google-analytics')) { ?>
							<div id="tab_rankology_analytics" class="rankology-tab rankology-analytics <?php if ('tab_rankology_analytics' == $current_tab) { echo 'active'; } ?>">
								<?php if (function_exists('rankology_google_analytics_dashboard_widget_option') && '1' !== rankology_google_analytics_dashboard_widget_option()) {
									if (function_exists('rankology_ga_dashboard_widget_display')) {
										rankology_ga_dashboard_widget_display();
									}
								} ?>
							</div>
						<?php } ?>

						<div id="tab_rankology_ps" class="rankology-tab rankology-page-speed inside<?php if ('tab_rankology_ps' == $current_tab) {
						echo 'active';
					}?>">
							<h3><?php esc_html_e('Google Page Speed Score','wp-rankology'); ?></h3>
							</p>
							<?php if ($ps_score && $ps_score_desktop) { ?>
								<div class="rankology-cwv rankology-summary-item-data">
									<?php echo $ps_score; ?>
									<?php echo $ps_score_desktop; ?>
									<p class="wrap-scale">
										<?php esc_html_e('<span><span class="score red"></span>0-49</span><span><span class="score yellow"></span>50-89</span><span><span class="score green"></span>90-100</span>','wp-rankology') ?>
									</p>
								</div>
								<div class="rankology-cwv">
									<div>
										<h3>
											<?php esc_html_e('Core Web Vitals Assessment: ', 'wp-rankology'); ?>

											<?php if ($core_web_vitals_score === true) { ?>
											<span class="green"><?php esc_html_e('Passed', 'wp-rankology'); ?></span>
											<?php } elseif ($core_web_vitals_score === null) { ?>
											<span class="red"><?php esc_html_e('No data found', 'wp-rankology'); ?></span>
											<?php } else { ?>
											<span class="red"><?php esc_html_e('Failed', 'wp-rankology'); ?></span>
											<?php } ?>
										</h3>
										<p><?php printf(__('Computed from the %s Core Web Vitals metrics over the latest 28-day collection period.', 'wp-rankology'), $cwv_svg); ?></p>
									</div>
								</div>
							<?php } else {  ?>
								<p><?php esc_html_e('No data available.','wp-rankology'); ?></p>
							<?php } ?>
							<p>
								<a href="<?php echo admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_page_speed'); ?>"
									class="rankology-btn">
									<?php esc_html_e('See full report', 'wp-rankology'); ?>
								</a>
							</p>
						</div>

						<?php
                            if (rankology_get_toggle_option('inspect-url')) {
                                if (!empty($google_api_key)) {
							        $date_range = rankology_fno_get_service('OptionPro')->getGSCDateRange() ? rankology_fno_get_service('OptionPro')->getGSCDateRange() : '- 3 months';
						            ?>

                                    <div id="tab_rankology_gsc" class="rankology-tab rankology-gsc inside<?php if ('tab_rankology_gsc' == $current_tab) {
                                    echo 'active';
                                }?>">

                                <?php
                                    $keywords = rankology_fno_get_service('SearchConsole')->getKeywords();

                                    if (!empty($keywords)) { ?>
                                        <div class="rankology-card-title">
                                            <div>
                                                <span class="dashicons dashicons-google"></span>
                                            </div>
                                            <div>
                                                <h3><?php esc_html_e('Most searched queries','wp-rankology'); ?></h3>
                                                <p><?php printf(__('How visitors find your site on Google','wp-rankology'), $date_range); ?></p>
                                            </div>
                                        </div>

                                        <div class="rankology-card-content">
                                            <?php
                                                echo '<ol>';
                                                foreach($keywords['data'] as $keyword){
                                                    echo '<li><div class="gsc-item">';
                                                    echo '<div><div class="rankology-summary-item-data">' . $keyword['keyword'] . '</div>';
                                                    echo '<div class="rankology-summary-item-label">' . __('Avg. position: ', 'wp-rankology') . round($keyword['position'], 1);
                                                    if ($keyword['position'] <= 5) {
                                                        echo '<span class="top-results">' . __('Top 5 results', 'wp-rankology') . '</span>';
                                                    }
                                                    echo '</div></div>';

                                                    echo '<div><div class="rankology-summary-item"><div class="rankology-summary-item-label">' . __(' Clicks', 'wp-rankology') . '</div><div class="rankology-summary-item-data">' . $keyword['clicks'] . '</div></div></div>';
                                                    echo '</div></li>';
                                                }
                                                echo '</ol>';
                                            ?>
                                        </div>
                                    <?php } ?>

                                        <div class="rankology-card-title">
                                            <div>
                                                <span class="dashicons dashicons-awards"></span>
                                            </div>
                                            <div>
                                                <h3><?php esc_html_e('Your most popular content','wp-rankology'); ?></h3>
                                                <p><?php printf(__('By clicks in the past %s','wp-rankology'), $date_range); ?></p>
                                            </div>
                                        </div>

                                        <?php
                                            global $wpdb;

                                            // Define the meta key
                                            $meta_key = '_rankology_search_console_analysis_clicks';

                                            // Query the database to get the post IDs
                                            $results = $wpdb->get_results(
                                                $wpdb->prepare(
                                                    "SELECT post_id, meta_value
                                                    FROM $wpdb->postmeta
                                                    WHERE meta_key = %s
                                                    ORDER BY CAST(meta_value AS UNSIGNED) DESC
                                                    LIMIT %d",
                                                    $meta_key,
                                                    5
                                                )
                                            );

                                            // Store the post IDs in an array
                                            $post_ids = [];
                                            if (!empty($results)) {
                                                foreach ($results as $result) {
                                                    $post_ids[] = $result->post_id;
                                                }
                                            }

                                            // Output the post IDs
                                            if (!empty($post_ids)) {
                                                echo '<div class="rankology-card-content">';
                                                    echo '<ol>';
                                                    foreach ($post_ids as $post_id) {
                                                        echo '<li>';
                                                            echo '<div class="gsc-item">';
                                                                echo '<div>';
                                                                    echo '<a href="' . get_the_permalink($post_id) . '" title="' . __('Open in a new tab', 'wp-rankology') . '" target="_blank">' . get_the_title($post_id) . '</a>';
                                                                echo '</div>';

                                                                echo '<div><div class="rankology-summary-item"><div class="rankology-summary-item-label">' . __(' Clicks', 'wp-rankology') . '</div><div class="rankology-summary-item-data">' . get_post_meta( $post_id, '_rankology_search_console_analysis_clicks', true) . '</div></div></div>';


                                                            echo '</div>';
                                                        echo '</li>';
                                                    }
                                                    echo '</ol>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                <?php }
                            }
                        ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}
