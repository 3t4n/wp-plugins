<?php

namespace RankologyFno\Services\GoogleSearchConsole;

defined('ABSPATH') or exit('Cheatin&#8217; uh?');

class RenderGSCInspectUrl {
    public function render($id) {
        $data = get_post_meta($id, '_rankology_gsc_inspect_url_data', true);
        if (is_string($data)) {
            $data = json_decode($data);
        }

        //Get Google API Key
        $options            = get_option('rankology_instant_indexing_option_name');
        $google_api_key     = isset($options['rankology_instant_indexing_google_api_key']) ? $options['rankology_instant_indexing_google_api_key'] : '';
        ?>

        <p>
            <?php esc_html_e('Inspect the current post URL with Google Search Console and get informations about your indexing, crawling, rich snippets and more.','wp-rankology'); ?>
        </p>

        <button id="rankology_inspect_url" type="button" class="<?php echo rankology_btn_secondary_classes(); ?>"><?php esc_html_e('Inspect URL with Google', 'wp-rankology'); ?></button>
        <span class="spinner"></span>

        <?php if (empty($google_api_key)) { ?>

            <p>
                <?php esc_html_e('No Google API key found.', 'wp-rankology'); ?>
                <a href="<?php echo admin_url('admin.php?page=rankology-fno-page#tab=tab_rankology_inspect_url'); ?>"><?php esc_html_e('Fix this!','wp-rankology'); ?></a>
            </p>

        <?php } elseif (empty($data)) {
            ?>
            <p>
                <?php esc_html_e('No data found, click Inspect URL button above.', 'wp-rankology'); ?>
            </p>
        <?php } else {
            if (isset($data->error)) {
                if (isset($data->error->message)) {
                ?>
                <p class="rankology-notice is-error"><?php echo '<strong>'.$data->error->code.'</strong>: '.$data->error->message; ?></p>
                <?php } elseif (isset($data->error_description)) { ?>
                    <p class="rankology-notice is-error"><?php echo '<strong>'.$data->error.'</strong>: '.$data->error_description; ?></p>
                <?php }
            } else {
                ?>
                <?php
                //Full report
                $inspectionResultLink = $data->inspectionResult->inspectionResultLink ? $data->inspectionResult->inspectionResultLink : '';
                if (!empty($inspectionResultLink)) {
                    echo '<a href="'.$inspectionResultLink.'" class="'.rankology_btn_secondary_classes().'" target="_blank">'.__('View Full Report','wp-rankology').'</a>';
                }

                //Indexing Verdict
                $verdict = $data->inspectionResult->indexStatusResult->verdict ? $data->inspectionResult->indexStatusResult->verdict : '';
                if (!empty($verdict)) {
                    switch ($verdict) {
                        case 'VERDICT_UNSPECIFIED':
                            $verdict_i18n = '<span class="dashicons dashicons-info"></span>'.__('Unknown verdict', 'wp-rankology');
                            $verdict_i18n_desc = __('The URL has been indexed, can appear in Google Search results, and no problems were found with any enhancements found in the page (structured data, linked AMP pages, and so on).', 'wp-rankology');
                            break;
                        case 'PASS':
                            $verdict_i18n = '<span class="dashicons dashicons-yes-alt"></span>'.__('URL is on Google', 'wp-rankology');
                            $verdict_i18n_desc = __('The URL has been indexed, can appear in Google Search results, and no problems were found with any enhancements found in the page (structured data, linked AMP pages, and so on).', 'wp-rankology');
                            $verdict_class = 'is-success';
                            break;
                        case 'PARTIAL':
                            $verdict_i18n = '<span class="dashicons dashicons-warning"></span>'.__('URL is on Google, but has issues', 'wp-rankology');
                            $verdict_i18n_desc = __('The URL has been indexed and can appear in Google Search results, but there are some problems that might prevent it from appearing with the enhancements that you applied to the page. This might mean a problem with an associated AMP page, or malformed structured data for a rich result (such as a recipe or job posting) on the page.', 'wp-rankology');
                            $verdict_class = 'is-warning';
                            break;
                        case 'FAIL':
                            $verdict_i18n = '<span class="dashicons dashicons-dismiss"></span>'.__('URL is not on Google: Indexing errors', 'wp-rankology');
                            $verdict_i18n_desc = __('There was at least one critical error that prevented the URL from being indexed, and it cannot appear in Google Search until those issues are fixed.', 'wp-rankology');
                            $verdict_class = 'is-error';
                            break;
                        case 'NEUTRAL':
                            $verdict_i18n = '<span class="dashicons dashicons-dismiss"></span>'.__('URL is not on Google', 'wp-rankology');
                            $verdict_i18n_desc = __('This URL won‘t appear in Google Search results, but we think that was your intention. Common reasons include that the page is password-protected or robots.txt protected, or blocked by a noindex directive.', 'wp-rankology');
                            $verdict_class = 'is-error';
                            break;
                    }
                }

                //Coverage State
                $coverageState = $data->inspectionResult->indexStatusResult->coverageState ? $data->inspectionResult->indexStatusResult->coverageState : '';

                //Indexing State
                $indexingState = $data->inspectionResult->indexStatusResult->indexingState ? $data->inspectionResult->indexStatusResult->indexingState : '';
                if (!empty($indexingState)) {
                    switch ($indexingState) {
                        case 'INDEXING_STATE_UNSPECIFIED':
                            $indexingState_i18n = '<span class="dashicons dashicons-info"></span>'.__('Unknown indexing status.', 'wp-rankology');
                            break;
                        case 'INDEXING_ALLOWED':
                            $indexingState_i18n = '<span class="dashicons dashicons-yes-alt"></span>'.__('Indexing allowed.', 'wp-rankology');
                            break;
                        case 'BLOCKED_BY_META_TAG':
                            $indexingState_i18n = '<span class="dashicons dashicons-warning"></span>'.__('Indexing not allowed, \'noindex\' detected in \'robots\' meta tag.', 'wp-rankology');
                            break;
                        case 'BLOCKED_BY_HTTP_HEADER':
                            $indexingState_i18n = '<span class="dashicons dashicons-dismiss"></span>'.__('Indexing not allowed, \'noindex\' detected in \'X-Robots-Tag\' http header.', 'wp-rankology');
                            break;
                        case 'BLOCKED_BY_ROBOTS_TXT':
                            $indexingState_i18n = '<span class="dashicons dashicons-dismiss"></span>'.__('Indexing not allowed, blocked to Googlebot with a robots.txt file.', 'wp-rankology');
                            break;
                    }
                }

                //Page Fetch State
                $pageFetchState = $data->inspectionResult->indexStatusResult->pageFetchState ? $data->inspectionResult->indexStatusResult->pageFetchState : '';
                if (!empty($pageFetchState)) {
                    switch ($pageFetchState) {
                        case 'PAGE_FETCH_STATE_UNSPECIFIED':
                            $pageFetchState_i18n = __('Unknown fetch state.', 'wp-rankology');
                            break;
                        case 'SUCCESSFUL':
                            $pageFetchState_i18n = __('Successful fetch.', 'wp-rankology');
                            break;
                        case 'SOFT_404':
                            $pageFetchState_i18n = __('Soft 404.', 'wp-rankology');
                            break;
                        case 'BLOCKED_ROBOTS_TXT':
                            $pageFetchState_i18n = __('Blocked by robots.txt.', 'wp-rankology');
                            break;
                        case 'NOT_FOUND':
                            $pageFetchState_i18n = __('Not found (404).', 'wp-rankology');
                            break;
                        case 'ACCESS_DENIED':
                            $pageFetchState_i18n = __('Blocked due to unauthorized request (401).', 'wp-rankology');
                            break;
                        case 'SERVER_ERROR':
                            $pageFetchState_i18n = __('Server error (5xx).', 'wp-rankology');
                            break;
                        case 'REDIRECT_ERROR':
                            $pageFetchState_i18n = __('Redirection error.', 'wp-rankology');
                            break;
                        case 'ACCESS_FORBIDDEN':
                            $pageFetchState_i18n = __('Blocked due to access forbidden (403).', 'wp-rankology');
                            break;
                        case 'BLOCKED_4XX':
                            $pageFetchState_i18n = __('Blocked due to other 4xx issue (not 403, 404).', 'wp-rankology');
                            break;
                        case 'INTERNAL_CRAWL_ERROR':
                            $pageFetchState_i18n = __('Internal error.', 'wp-rankology');
                            break;
                        case 'INVALID_URL':
                            $pageFetchState_i18n = __('Invalid URL.', 'wp-rankology');
                            break;
                    }
                }

                //Crawl
                $lastCrawlTime = $data->inspectionResult->indexStatusResult->lastCrawlTime ? date("F j, Y - h:i:s A", strtotime($data->inspectionResult->indexStatusResult->lastCrawlTime)) : '';
                $crawledAs = $data->inspectionResult->indexStatusResult->crawledAs ? $data->inspectionResult->indexStatusResult->crawledAs : '';
                if (!empty($crawledAs)) {
                    switch ($crawledAs) {
                        case 'CRAWLING_USER_AGENT_UNSPECIFIED':
                            $crawledAs_i18n = __('Unknown user agent.', 'wp-rankology');
                            break;
                        case 'DESKTOP':
                            $crawledAs_i18n = __('Googlebot desktop', 'wp-rankology');
                            break;
                        case 'MOBILE':
                            $crawledAs_i18n = __('Googlebot smartphone', 'wp-rankology');
                            break;
                    }
                }
                $robotsTxtState = $data->inspectionResult->indexStatusResult->robotsTxtState ? $data->inspectionResult->indexStatusResult->robotsTxtState : '';
                if (!empty($robotsTxtState)) {
                    switch ($robotsTxtState) {
                        case 'ROBOTS_TXT_STATE_UNSPECIFIED':
                            $robotsTxtState = __('Unknown robots.txt state, typically because the page wasn‘t fetched or found, or because robots.txt itself couldn‘t be reached.', 'wp-rankology');
                            break;
                        case 'ALLOWED':
                            $robotsTxtState = __('Yes', 'wp-rankology');
                            break;
                        case 'DISALLOWED':
                            $robotsTxtState = __('Crawl blocked by robots.txt.', 'wp-rankology');
                            break;
                    }
                }


                //Canonical URL
                $userCanonical = $data->inspectionResult->indexStatusResult->userCanonical ? $data->inspectionResult->indexStatusResult->userCanonical : '';
                $googleCanonical = $data->inspectionResult->indexStatusResult->googleCanonical ? $data->inspectionResult->indexStatusResult->googleCanonical : '';

                //Sitemap
                $sitemap = $data->inspectionResult->indexStatusResult->sitemap ? $data->inspectionResult->indexStatusResult->sitemap : __('N/A','wp-rankology');

                //Referring Urls
                $referringUrls = $data->inspectionResult->indexStatusResult->referringUrls ? $data->inspectionResult->indexStatusResult->referringUrls : '';

                //Mobile Verdict
                $verdict_mobile = '';
                if(\property_exists($data, 'inspectionResult') && \property_exists($data->inspectionResult, 'mobileUsabilityResult')) {
                    $verdict_mobile = $data->inspectionResult->mobileUsabilityResult->verdict ? $data->inspectionResult->mobileUsabilityResult->verdict : '';
                }

                $verdict_mobile_i18n = '';
                $verdict_mobile_i18n_desc = '';
                if (!empty($verdict_mobile)) {
                    switch ($verdict_mobile) {
                        case 'VERDICT_UNSPECIFIED':
                            $verdict_mobile_i18n = '<span class="dashicons dashicons-info"></span>'.__('No data available', 'wp-rankology');
                            $verdict_mobile_i18n_desc = __('For some reason we couldn‘t retrieve the page or test its mobile-friendliness. Please wait a bit and try again.', 'wp-rankology');
                            break;
                        case 'PASS':
                            $verdict_mobile_i18n = '<span class="dashicons dashicons-yes-alt"></span>'.__('Page is mobile friendly', 'wp-rankology');
                            $verdict_mobile_i18n_desc = __('The page should probably work well on a mobile device.', 'wp-rankology');
                            break;
                        case 'PARTIAL':
                        case 'FAIL':
                        case 'NEUTRAL':
                            $verdict_mobile_i18n = '<span class="dashicons dashicons-dismiss"></span>'.__('Page is not mobile friendly', 'wp-rankology');
                            $verdict_mobile_i18n_desc = __('The page won‘t work well on a mobile device because of a few issues.', 'wp-rankology');
                            break;
                    }
                }

                //Rich snippets Verdict
                $detectedItems = __('No detected schemas', 'wp-rankology');
                $verdict_rich_snippets_i18n = __('No data available', 'wp-rankology');
                if (property_exists($data->inspectionResult, 'richResultsResult')) {
                    $verdict_rich_snippets = $data->inspectionResult->richResultsResult->verdict ? $data->inspectionResult->richResultsResult->verdict : '';
                    if (!empty($verdict_rich_snippets)) {
                        switch ($verdict_rich_snippets) {
                            case 'VERDICT_UNSPECIFIED':
                                $verdict_rich_snippets_i18n = '<span class="dashicons dashicons-info"></span>'.__('No data available', 'wp-rankology');
                                break;
                            case 'PASS':
                                $verdict_rich_snippets_i18n = '<span class="dashicons dashicons-yes-alt"></span>'.__('Your Rich Snippets are valid', 'wp-rankology');
                                break;
                            case 'PARTIAL':
                            case 'FAIL':
                            case 'NEUTRAL':
                                $verdict_rich_snippets_i18n = '<span class="dashicons dashicons-dismiss"></span>'.__('Your Rich Snippets are not valid', 'wp-rankology');
                                break;
                        }
                    }
                    $detectedItems = $data->inspectionResult->richResultsResult->detectedItems ? $data->inspectionResult->richResultsResult->detectedItems : '';
                }

                //Render
                $render = [
                    'general' => [
                        'title' => $verdict_i18n,
                        'desc' => $verdict_i18n_desc
                    ],
                    'discovery' => [
                        'title' => __('Discovery','wp-rankology'),
                        'analysis' => [
                            __('Sitemaps','wp-rankology') => $sitemap,
                            __('Referring page','wp-rankology') => $referringUrls,
                        ]
                    ],
                    'crawl' => [
                        'title' => __('Crawl', 'wp-rankology'),
                        'desc' => $coverageState,
                        'analysis' => [
                            __('Last crawl', 'wp-rankology')         => $lastCrawlTime,
                            __('Crawled as', 'wp-rankology')         => $crawledAs_i18n,
                            __('Crawl allowed?', 'wp-rankology')     => $robotsTxtState,
                            __('Page fetch', 'wp-rankology')         => $pageFetchState_i18n,
                            __('Indexing allowed?','wp-rankology')   => $indexingState_i18n,
                        ]
                    ],
                    'indexing' => [
                        'title' => __('Indexing', 'wp-rankology'),
                        'analysis' => [
                            __('User-declared canonical','wp-rankology') => $userCanonical,
                            __('Google-selected canonical','wp-rankology') => $googleCanonical,
                        ]
                    ],
                    'enhancements' => [
                        'title' => __('Enhancements', 'wp-rankology'),
                        'analysis' => [
                            __('Mobile Usability','wp-rankology') => [
                                'verdict' => $verdict_mobile_i18n,
                                'desc' => $verdict_mobile_i18n_desc
                            ],
                            __('Rich Snippets detected','wp-rankology') => [
                                'verdict' => $verdict_rich_snippets_i18n,
                                'schemas' => $detectedItems,
                            ]
                        ]
                    ]
                ];

                if (!empty($render)) {
                    echo '<div class="rankology-gsc-render">';
                    foreach($render as $key_analysis => $analysis) {
                        if ($key_analysis === 'general') { ?>
                            <div class="rankology-gsc-analysis rankology-gsc-summary rankology-notice <?php echo $verdict_class; ?>">
                                <div class="rankology-gsc-verdict"><?php echo $analysis['title']; ?></div>
                                <p><?php echo $analysis['desc']; ?></p>
                            </div>
                        <?php } else {
                            if (!empty($analysis['title'])) { ?>
                                <div class="rankology-gsc-cat"><?php echo $analysis['title']; ?></div>
                            <?php }
                            if (!empty($analysis['desc'])) { ?>
                                <p><?php echo $analysis['desc']; ?></p>
                            <?php }
                            if (!empty($analysis['analysis'])) { ?>
                                <div class="rankology-gsc-analysis">
                                    <?php foreach($analysis['analysis'] as $key => $value) { ?>
                                        <div class="rankology-gsc-item">
                                        <div class="rankology-gsc-item-name"><?php echo $key; ?></div>
                                        <div class="rankology-gsc-item-value">
                                            <?php if (is_array($value)) {
                                                if (!empty($value)) { ?>
                                                    <ul>
                                                    <?php foreach($value as $key_element => $elements) {
                                                        if ($key_element === 'schemas') {
                                                            if (!empty($elements) && is_array($elements)) {
                                                                foreach($elements as $element) {
                                                                    echo '<ul>';
                                                                    if (!empty($element->richResultType)) {
                                                                        echo '<li><strong>' . $element->richResultType.'</strong>';
                                                                    }
                                                                    if (!empty($element->items)) {
                                                                        foreach($element->items as $schemas) {
                                                                            if (!empty($schemas)) {
                                                                                echo '<ul>';
                                                                                foreach($schemas as $schema) {
                                                                                    echo '<li><span class="dashicons dashicons-minus"></span>'.$schema.'</li>';
                                                                                }
                                                                                echo '</ul>';
                                                                            }
                                                                        }
                                                                    }
                                                                    echo '</li></ul>';
                                                                }
                                                            } else {
                                                                echo '<li>'.$elements.'</li>';
                                                            }
                                                        } else {
                                                        ?>
                                                        <li>
                                                            <?php echo $elements; ?>
                                                        </li>
                                                    <?php }
                                                } ?>
                                                </ul>
                                                <?php }
                                            } else {
                                                echo $value;
                                            } ?>
                                        </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php }
                        }
                    }
                    echo '</div>';
                }
            }
        }
    }
}
