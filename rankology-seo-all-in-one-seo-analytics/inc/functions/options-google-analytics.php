<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google Analytics
//=================================================================================================

function rankology_cookies_user_consent_html() {
    if (!empty(rankology_get_service('GoogleAnalyticsOption')->getOptOutMsg())) {
        $msg = rankology_get_service('GoogleAnalyticsOption')->getOptOutMsg();
    } elseif (get_option('wp_page_for_privacy_policy')) {
        $msg = __('By visiting our site, you agree to our privacy policy regarding cookies, tracking statistics, etc.&nbsp;<a href="[rankology_privacy_page]">Read more</a>', 'wp-rankology');
    } else {
        $msg = __('By visiting our site, you agree to our privacy policy regarding cookies, tracking statistics, etc.', 'wp-rankology');
    }

    if (get_option('wp_page_for_privacy_policy') && '' != $msg) {
        $rankology_privacy_page = esc_url(get_permalink(get_option('wp_page_for_privacy_policy')));
        $msg                   = str_replace('[rankology_privacy_page]', $rankology_privacy_page, $msg);
    }

    $msg = apply_filters('rankology_rgpd_message', $msg);


    $consent_btn = rankology_get_service('GoogleAnalyticsOption')->getOptOutMessageOk();
    if (empty($consent_btn) || !$consent_btn) {
        $consent_btn = __('Accept', 'wp-rankology');
    }

    $close_btn = rankology_get_service('GoogleAnalyticsOption')->getOptOutMessageClose();
    if (empty($close_btn) || !$close_btn) {
        $close_btn = __('X', 'wp-rankology');
    }

    $user_msg = '<div data-nosnippet class="rankology-user-consent rankology-user-message rankology-user-consent-hide">
        <p>' . $msg . '</p>
        <p>
            <button id="rankology-user-consent-accept" type="button">' . $consent_btn . '</button>
            <button type="button" id="rankology-user-consent-close">' . $close_btn . '</button>
        </p>
    </div>';

    $backdrop = '<div class="rankology-user-consent-backdrop rankology-user-consent-hide"></div>';

    $user_msg = apply_filters('rankology_rgpd_full_message', $user_msg, $msg, $consent_btn, $close_btn, $backdrop);

    echo $user_msg . $backdrop;
}

function rankology_cookies_edit_choice_html() {
    $optOutEditChoice = rankology_get_service('GoogleAnalyticsOption')->getOptOutEditChoice();
    if ('1' !== $optOutEditChoice) {
        return;
    }

    $edit_cookie_btn = rankology_get_service('GoogleAnalyticsOption')->getOptOutMessageEdit();
    if (empty($edit_cookie_btn) || !$edit_cookie_btn) {
        $edit_cookie_btn = __('Manage cookies', 'wp-rankology');
    }

    $user_msg = '<div data-nosnippet class="rankology-user-consent rankology-edit-choice">
        <p>
            <button id="rankology-user-consent-edit" type="button">' . $edit_cookie_btn . '</button>
        </p>
    </div>';

    $user_msg = apply_filters('rankology_rgpd_full_message', $user_msg, $edit_cookie_btn);

    echo $user_msg;
}

function rankology_cookies_user_consent_styles() {
    $styles = '<style>.rankology-user-consent {left: 50%;position: fixed;z-index: 8000;padding: 20px;display: inline-flex;justify-content: center;border: 1px solid #CCC;max-width:100%;';

    //Width
    $width = rankology_get_service('GoogleAnalyticsOption')->getCbWidth();
    if (!empty($width)) {
        $needle = '%';

        if (false !== strpos($width, $needle)) {
            $unit = '';
        } else {
            $unit = 'px';
        }

        $styles .= 'width: ' . $width . $unit . ';';
    } else {
        $styles .= 'width:100%;';
    }

    //Position
    $position = rankology_get_service('GoogleAnalyticsOption')->getCbPos();
    if ('top' === $position) {
        $styles .= 'top:0;';
        $styles .= 'transform: translate(-50%, 0%);';
    } elseif ('center' === $position) {
        $styles .= 'top:45%;';
        $styles .= 'transform: translate(-50%, -50%);';
    } else {
        $styles .= 'bottom:0;';
        $styles .= 'transform: translate(-50%, 0);';
    }

    //Text alignment
    $txtAlign = rankology_get_service('GoogleAnalyticsOption')->getCbTxtAlign();
    if ('left' === $txtAlign) {
        $styles .= 'text-align:left;';
    } elseif ('right' === $position) {
        $styles .= 'text-align:right;';
    } else {
        $styles .= 'text-align:center;';
    }

    //Background color
    $bgColor = rankology_get_service('GoogleAnalyticsOption')->getCbBg();
    if (!empty($bgColor)) {
        $styles .= 'background:' . $bgColor . ';';
    } else {
        $styles .= 'background:#F1F1F1;';
    }

    $styles .= '}@media (max-width: 782px) {.rankology-user-consent {display: block;}}.rankology-user-consent.rankology-user-message p:first-child {margin-right:20px}.rankology-user-consent p {margin: 0;font-size: 0.8em;align-self: center;';

    //Text color
    $txtColor = rankology_get_service('GoogleAnalyticsOption')->getCbTxtCol();
    if (!empty($txtColor)) {
        $styles .= 'color:' . $txtColor . ';';
    }

    $styles .= '}.rankology-user-consent button {vertical-align: middle;margin: 0;font-size: 14px;';

    //Btn background color
    $btnBgColor = rankology_get_service('GoogleAnalyticsOption')->getCbBtnBg();
    if (!empty($btnBgColor)) {
        $styles .= 'background:' . $btnBgColor . ';';
    }

    //Btn text color
    $btnTxtColor = rankology_get_service('GoogleAnalyticsOption')->getCbBtnCol();
    if (!empty($btnTxtColor)) {
        $styles .= 'color:' . $btnTxtColor . ';';
    }

    $styles .= '}.rankology-user-consent button:hover{';

    //Background hover color
    $bgHovercolor = rankology_get_service('GoogleAnalyticsOption')->getCbBtnBgHov();
    if (!empty($bgHoverColor)) {
        $styles .= 'background:' . $bgHoverColor . ';';
    }

    //Text hover color
    $txtHovercolor = rankology_get_service('GoogleAnalyticsOption')->getCbBtnColHov();
    if (!empty($txtHoverColor)) {
        $styles .= 'color:' . $txtHoverColor . ';';
    }

    $styles .= '}#rankology-user-consent-close{margin: 0;position: relative;font-weight: bold;border: 1px solid #ccc;';

    //Background secondary button
    $bgSecondaryBtn = rankology_get_service('GoogleAnalyticsOption')->getCbBtnSecBg();
    if (!empty($bgSecondaryBtn)) {
        $styles .= 'background:' . $bgSecondaryBtn . ';';
    } else {
        $styles .= 'background:none;';
    }

    //Color secondary button
    $colorSecondaryBtn = rankology_get_service('GoogleAnalyticsOption')->getCbBtnSecCol();
    if (!empty($colorSecondaryBtn)) {
        $styles .= 'color:' . $colorSecondaryBtn . ';';
    } else {
        $styles .= 'color:inherit;';
    }

    $styles .= '}#rankology-user-consent-close:hover{cursor:pointer;';

    //Background secondary button hover
    $bgSecondaryBtnHover = rankology_get_service('GoogleAnalyticsOption')->getCbBtnSecBgHov();
    if (!empty($bgSecondaryBtnHover)) {
        $styles .= 'background:' . $bgSecondaryBtnHover . ';';
    } else {
        $styles .= 'background:#222;';
    }

    //Color secondary button hover
    $colorSecondaryBtnHover = rankology_get_service('GoogleAnalyticsOption')->getCbBtnSecColHov();
    if (!empty($colorSecondaryBtnHover)) {
        $styles .= 'color:' . $colorSecondaryBtnHover . ';';
    } else {
        $styles .= 'color:#fff;';
    }

    $styles .= '}';

    //Link color
    $linkColor = rankology_get_service('GoogleAnalyticsOption')->getCbLkCol();
    if (!empty($linkColor)) {
        $styles .= '.rankology-user-consent a{';
        $styles .= 'color:' . $linkColor;
        $styles .= '}';
    }

    $styles .= '.rankology-user-consent-hide{display:none;}';

    $cbBackdrop = rankology_get_service('GoogleAnalyticsOption')->getCbBackdrop();
    if (!empty($cbBackdrop)) {
        $bg_backdrop = rankology_get_service('GoogleAnalyticsOption')->getCbBackdropBg();
        if (empty($bg_backdrop) || !$bg_backdrop) {
            $bg_backdrop = 'rgba(0,0,0,.65)';
        }

        $styles .= '.rankology-user-consent-backdrop{-webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            background: ' . $bg_backdrop . ';
            bottom: 0;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            left: 0;
            -webkit-overflow-scrolling: touch;
            overflow-y: auto;
            position: fixed;
            right: 0;
            -webkit-tap-highlight-color: transparent;
            top: 0;
            z-index: 100;}';
    }

    $styles .= '.rankology-edit-choice{
        background: none;
        justify-content: start;
        z-index: 7500;
        border: none;
        width: inherit;
        transform: none;
        left: inherit;
        bottom: 0;
        top: inherit;
    }';

    $styles .= '</style>';

    $styles = apply_filters('rankology_rgpd_full_message_styles', $styles);

    echo $styles;
}

function rankology_cookies_user_consent_render() {
    $hook = rankology_get_service('GoogleAnalyticsOption')->getHook();
    if (empty($hook) || !$hook) {
        $hook = 'wp_head';
    }

    add_action($hook, 'rankology_cookies_user_consent_html');
    add_action($hook, 'rankology_cookies_edit_choice_html');
    add_action($hook, 'rankology_cookies_user_consent_styles');
}

if ('1' === rankology_get_service('GoogleAnalyticsOption')->getDisable()) {
    if (is_user_logged_in()) {
        global $wp_roles;

        //Get current user role
        if (isset(wp_get_current_user()->roles[0])) {
            $rankology_user_role = wp_get_current_user()->roles[0];
            //If current user role matchs values from Rankology GA settings then apply
            if (!empty(rankology_get_service('GoogleAnalyticsOption')->getRoles())) {
                if (array_key_exists($rankology_user_role, rankology_get_service('GoogleAnalyticsOption')->getRoles())) {
                    //do nothing
                } else {
                    rankology_cookies_user_consent_render();
                }
            } else {
                rankology_cookies_user_consent_render();
            }
        } else {
            rankology_cookies_user_consent_render();
        }
    } else {
        rankology_cookies_user_consent_render();
    }
}

//Build Custom GA
function rankology_google_analytics_js($echo) {
    if ('' !== rankology_get_service('GoogleAnalyticsOption')->getGA4() && '1' === rankology_get_service('GoogleAnalyticsOption')->getEnableOption()) {
        //Init
        $tracking_id = rankology_get_service('GoogleAnalyticsOption')->getGA4();
        $rankology_google_analytics_config = [];
        $rankology_google_analytics_event  = [];

        $rankology_google_analytics_html = "\n";
        $rankology_google_analytics_html .=
        "<script async src='https://www.googletagmanager.com/gtag/js?id=" . $tracking_id . "'></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}";
        $rankology_google_analytics_html .= "gtag('js', new Date());\n";

        //Cross domains
        $crossDomains = rankology_get_service('GoogleAnalyticsOption')->getCrossDomain();
        if ('1' == rankology_get_service('GoogleAnalyticsOption')->getCrossEnable() && $crossDomains) {
            $domains = array_map('trim', array_filter(explode(',', $crossDomains)));

            if ( ! empty($domains)) {
                $domains_count = count($domains);

                $link_domains = '';

                foreach ($domains as $key => $domain) {
                    $link_domains .= "'" . $domain . "'";
                    if ($key < $domains_count - 1) {
                        $link_domains .= ',';
                    }
                }
                $rankology_google_analytics_config['linker'] = "'linker': {'domains': [" . $link_domains . ']},';
                $rankology_google_analytics_config['linker'] = apply_filters('rankology_gtag_linker', $rankology_google_analytics_config['linker']);
            }
        }

        //Remarketing
        $remarketingOption = rankology_get_service('GoogleAnalyticsOption')->getRemarketing();
        if ('1' != $remarketingOption) {
            $rankology_google_analytics_config['allow_display_features'] = "'allow_display_features': false,";
            $rankology_google_analytics_config['allow_display_features'] = apply_filters('rankology_gtag_allow_display_features', $rankology_google_analytics_config['allow_display_features']);
        }

        //Link attribution
        if ('1' == rankology_get_service('GoogleAnalyticsOption')->getLinkAttribution()) {
            $rankology_google_analytics_config['link_attribution'] = "'link_attribution': true,";
            $rankology_google_analytics_config['link_attribution'] = apply_filters('rankology_gtag_link_attribution', $rankology_google_analytics_config['link_attribution']);
        }

        //Dimensions
        $rankology_google_analytics_config['cd']['cd_hook'] = apply_filters('rankology_gtag_cd_hook_cf', isset($rankology_google_analytics_config['cd']['cd_hook']));
        if ( ! has_filter('rankology_gtag_cd_hook_cf')) {
            unset($rankology_google_analytics_config['cd']['cd_hook']);
        }

        $rankology_google_analytics_event['cd_hook'] = apply_filters('rankology_gtag_cd_hook_ev', isset($rankology_google_analytics_event['cd_hook']));
        if ( ! has_filter('rankology_gtag_cd_hook_ev')) {
            unset($rankology_google_analytics_config['cd']['cd_hook']);
        }

        $cdAuthorOption = rankology_get_service('GoogleAnalyticsOption')->getCdAuthor();
        $cdCategoryOption = rankology_get_service('GoogleAnalyticsOption')->getCdCategory();
        $cdTagOption = rankology_get_service('GoogleAnalyticsOption')->getCdTag();
        $cdPostTypeOption = rankology_get_service('GoogleAnalyticsOption')->getCdPostType();
        $cdLoggedInUserOption = rankology_get_service('GoogleAnalyticsOption')->getCdLoggedInUser();
        if ((!empty($cdAuthorOption) && 'none' != $cdAuthorOption)
                || (!empty($cdCategoryOption) && 'none' != $cdCategoryOption)
                || (!empty($cdTagOption) && 'none' != $cdTagOption)
                || (!empty($cdPostTypeOption) && 'none' != $cdPostTypeOption)
                || (!empty($cdLoggedInUserOption) && 'none' != $cdLoggedInUserOption)
                || ('' != isset($rankology_google_analytics_config['cd']['cd_hook']) && '' != isset($rankology_google_analytics_event['cd_hook']))
            ) {
            $rankology_google_analytics_config['cd']['cd_start'] = '{';
        } else {
            unset($rankology_google_analytics_config['cd']);
        }

        if (!empty($cdAuthorOption)) {
            if ('none' != $cdAuthorOption) {
                if (is_singular()) {
                    $rankology_google_analytics_config['cd']['cd_author'] = "'" . $cdAuthorOption . "': 'cd_author',";

                    $rankology_google_analytics_event['cd_author'] = "gtag('event', '" . __('Authors', 'wp-rankology') . "', {'cd_author': '" . get_the_author() . "', 'non_interaction': true});";

                    $rankology_google_analytics_config['cd']['cd_author'] = apply_filters('rankology_gtag_cd_author_cf', $rankology_google_analytics_config['cd']['cd_author']);

                    $rankology_google_analytics_event['cd_author'] = apply_filters('rankology_gtag_cd_author_ev', $rankology_google_analytics_event['cd_author']);
                }
            }
        }
        if (!empty($cdCategoryOption)) {
            if ('none' != $cdCategoryOption) {
                if (is_single() && has_category()) {
                    $categories = get_the_category();

                    if ( ! empty($categories)) {
                        $get_first_category = esc_html($categories[0]->name);
                    }

                    $rankology_google_analytics_config['cd']['cd_categories'] = "'" . $cdCategoryOption . "': 'cd_categories',";

                    $rankology_google_analytics_event['cd_categories'] = "gtag('event', '" . __('Categories', 'wp-rankology') . "', {'cd_categories': '" . $get_first_category . "', 'non_interaction': true});";

                    $rankology_google_analytics_config['cd']['cd_categories'] = apply_filters('rankology_gtag_cd_categories_cf', $rankology_google_analytics_config['cd']['cd_categories']);

                    $rankology_google_analytics_event['cd_categories'] = apply_filters('rankology_gtag_cd_categories_ev', $rankology_google_analytics_event['cd_categories']);
                }
            }
        }

        if (!empty($cdTagOption) && 'none' != $cdTagOption) {
            if (is_single() && has_tag()) {
                $tags = get_the_tags();
                if ( ! empty($tags)) {
                    $rankology_comma_count = count($tags);
                    $get_tags             = '';
                    foreach ($tags as $key => $value) {
                        $get_tags .= esc_html($value->name);
                        if ($key < $rankology_comma_count - 1) {
                            $get_tags .= ', ';
                        }
                    }
                }

                $rankology_google_analytics_config['cd']['cd_tags'] = "'" . $cdTagOption . "': 'cd_tags',";

                $rankology_google_analytics_event['cd_tags'] = "gtag('event', '" . __('Tags', 'wp-rankology') . "', {'cd_tags': '" . $get_tags . "', 'non_interaction': true});";

                $rankology_google_analytics_config['cd']['cd_tags'] = apply_filters('rankology_gtag_cd_tags_cf', $rankology_google_analytics_config['cd']['cd_tags']);

                $rankology_google_analytics_event['cd_tags'] = apply_filters('rankology_gtag_cd_tags_ev', $rankology_google_analytics_event['cd_tags']);
            }
        }

        if (!empty($cdPostTypeOption) && 'none' != $cdPostTypeOption) {
            if (is_single()) {
                $rankology_google_analytics_config['cd']['cd_cpt'] = "'" . $cdPostTypeOption . "': 'cd_cpt',";

                $rankology_google_analytics_event['cd_cpt'] = "gtag('event', '" . __('Post types', 'wp-rankology') . "', {'cd_cpt': '" . get_post_type() . "', 'non_interaction': true});";

                $rankology_google_analytics_config['cd']['cd_cpt'] = apply_filters('rankology_gtag_cd_cpt_cf', $rankology_google_analytics_config['cd']['cd_cpt']);

                $rankology_google_analytics_event['cd_cpt'] = apply_filters('rankology_gtag_cd_cpt_ev', $rankology_google_analytics_event['cd_cpt']);
            }
        }

        if (!empty($cdLoggedInUserOption) && 'none' != $cdLoggedInUserOption) {
            if (wp_get_current_user()->ID) {
                $rankology_google_analytics_config['cd']['cd_logged_in'] = "'" . $cdLoggedInUserOption . "': 'cd_logged_in',";

                $rankology_google_analytics_event['cd_logged_in'] = "gtag('event', '" . __('Connected users', 'wp-rankology') . "', {'cd_logged_in': '" . wp_get_current_user()->ID . "', 'non_interaction': true});";

                $rankology_google_analytics_config['cd']['cd_logged_in'] = apply_filters('rankology_gtag_cd_logged_in_cf', $rankology_google_analytics_config['cd']['cd_logged_in']);

                $rankology_google_analytics_event['cd_logged_in'] = apply_filters('rankology_gtag_cd_logged_in_ev', $rankology_google_analytics_event['cd_logged_in']);
            }
        }

        if ( ! empty($rankology_google_analytics_config['cd']['cd_logged_in']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_cpt']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_tags']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_categories']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_author']) ||
                ( ! empty($rankology_google_analytics_config['cd']['cd_hook']) && ! empty($rankology_google_analytics_event['cd_hook']))) {
            $rankology_google_analytics_config['cd']['cd_end'] = '}, ';
        } else {
            $rankology_google_analytics_config['cd']['cd_start'] = '';
        }

        //External links
        if (!empty(rankology_get_service('GoogleAnalyticsOption')->getLinkTrackingEnable())) {
            $rankology_google_analytics_click_event['link_tracking'] =
"window.addEventListener('load', function () {
var links = document.querySelectorAll('a');
for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function(e) {
        var n = this.href.includes('" . wp_parse_url(get_home_url(), PHP_URL_HOST) . "');
        if (n == false) {
            gtag('event', 'click', {'event_category': 'external links','event_label' : this.href});
        }
    });
    }
});
";
            $rankology_google_analytics_click_event['link_tracking'] = apply_filters('rankology_gtag_link_tracking_ev', $rankology_google_analytics_click_event['link_tracking']);
            $rankology_google_analytics_html .= $rankology_google_analytics_click_event['link_tracking'];
        }

        //Downloads tracking
        if (!empty(rankology_get_service('GoogleAnalyticsOption')->getDownloadTrackingEnable())) {
            $downloadTrackingOption = rankology_get_service('GoogleAnalyticsOption')->getDownloadTracking();
            if (!empty($downloadTrackingOption)) {
                $rankology_google_analytics_click_event['download_tracking'] =
"window.addEventListener('load', function () {
	var donwload_links = document.querySelectorAll('a');
	for (let j = 0; j < donwload_links.length; j++) {
		donwload_links[j].addEventListener('click', function(e) {
			var down = this.href.match(/.*\.(" . $downloadTrackingOption . ")(\?.*)?$/);
			if (down != null) {
				gtag('event', 'click', {'event_category': 'downloads','event_label' : this.href});
			}
		});
		}
	});
";
                $rankology_google_analytics_click_event['download_tracking'] = apply_filters('rankology_gtag_download_tracking_ev', $rankology_google_analytics_click_event['download_tracking']);
                $rankology_google_analytics_html .= $rankology_google_analytics_click_event['download_tracking'];
            }
        }

        //Affiliate tracking
        if (!empty(rankology_get_service('GoogleAnalyticsOption')->getAffiliateTrackingEnable())) {
            $affiliateTrackingOption = rankology_get_service('GoogleAnalyticsOption')->getAffiliateTracking();
            if (!empty($affiliateTrackingOption)) {
                $rankology_google_analytics_click_event['outbound_tracking'] =
"window.addEventListener('load', function () {
	var outbound_links = document.querySelectorAll('a');
	for (let k = 0; k < outbound_links.length; k++) {
		outbound_links[k].addEventListener('click', function(e) {
			var out = this.href.match(/(?:\/" . $affiliateTrackingOption . "\/)/gi);
			if (out != null) {
				gtag('event', 'click', {'event_category': 'outbound/affiliate','event_label' : this.href});
			}
		});
		}
	});";
                $rankology_google_analytics_click_event['outbound_tracking'] = apply_filters('rankology_gtag_outbound_tracking_ev', $rankology_google_analytics_click_event['outbound_tracking']);
                $rankology_google_analytics_html .= $rankology_google_analytics_click_event['outbound_tracking'];
            }
        }

        //Phone tracking
        if (!empty(rankology_get_service('GoogleAnalyticsOption')->getPhoneTracking())) {
            $rankology_google_analytics_click_event['phone_tracking'] =
"window.addEventListener('load', function () {
    var links = document.querySelectorAll('a');
    for (let i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function(e) {
            var n = this.href.includes('tel:');
            if (n === true) {
                gtag('event', 'click', {'event_category': 'phone','event_label' : this.href.slice(4)});
            }
        });
    }
});";
            $rankology_google_analytics_click_event['phone_tracking'] = apply_filters('rankology_gtag_phone_tracking_ev', $rankology_google_analytics_click_event['phone_tracking']);
            $rankology_google_analytics_html .= $rankology_google_analytics_click_event['phone_tracking'];
        }

        // Google Enhanced Ecommerce
        require_once dirname(__FILE__) . '/options-google-ecommerce.php';

        //Anonymize IP
        $ipAnonymize = rankology_get_service('GoogleAnalyticsOption')->getIpAnonymization();
        if ('1' == $ipAnonymize) {
            $rankology_google_analytics_config['anonymize_ip'] = "'anonymize_ip': true,";
            $rankology_google_analytics_config['anonymize_ip'] = apply_filters('rankology_gtag_anonymize_ip', $rankology_google_analytics_config['anonymize_ip']);
        }

        //Send data
        $features = '';
        if ( ! empty($rankology_google_analytics_config['cd']['cd_logged_in']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_cpt']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_tags']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_categories']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_author']) ||
                ! empty($rankology_google_analytics_config['cd']['cd_hook'])) {
            $rankology_google_analytics_config['cd']['cd_start'] = "'custom_map': {";
        }
        if ( ! empty($rankology_google_analytics_config)) {
            if ( ! empty($rankology_google_analytics_config['cd']['cd_start'])) {
                array_unshift($rankology_google_analytics_config['cd'], $rankology_google_analytics_config['cd']['cd_start']);
                unset($rankology_google_analytics_config['cd']['cd_start']);
            }
            $features = ', {';
            foreach ($rankology_google_analytics_config as $key => $feature) {
                if ('cd' == $key) {
                    foreach ($feature as $_key => $cd) {
                        $features .= $cd;
                    }
                } else {
                    $features .= $feature;
                }
            }
            $features .= '}';
        }

        //Measurement ID
        if ('' !== rankology_get_service('GoogleAnalyticsOption')->getGA4()) {
            $rankology_gtag_ga4 = "gtag('config', '" . rankology_get_service('GoogleAnalyticsOption')->getGA4() . "' " . $features . ');';
            $rankology_gtag_ga4 = apply_filters('rankology_gtag_ga4', $rankology_gtag_ga4);
            $rankology_google_analytics_html .= $rankology_gtag_ga4;
            $rankology_google_analytics_html .= "\n";
        }

        //Ads
        $adsOptions = rankology_get_service('GoogleAnalyticsOption')->getAds();
        if (!empty($adsOptions)) {
            $rankology_gtag_ads = "gtag('config', '" . $adsOptions . "');";
            $rankology_gtag_ads = apply_filters('rankology_gtag_ads', $rankology_gtag_ads);
            $rankology_google_analytics_html .= $rankology_gtag_ads;
            $rankology_google_analytics_html .= "\n";
        }

        $events = '';
        if ( ! empty($rankology_google_analytics_event)) {
            foreach ($rankology_google_analytics_event as $event) {
                $rankology_google_analytics_html .= $event;
                $rankology_google_analytics_html .= "\n";
            }
        }

        // E-commerce
        if (isset($rankology_google_analytics_click_event['purchase_tracking'])) {
            $rankology_google_analytics_html .= $rankology_google_analytics_click_event['purchase_tracking'];
        }

        $rankology_google_analytics_html .= '</script>';
        $rankology_google_analytics_html .= "\n";

        //Optimize
        $optimizeOption = rankology_get_service('GoogleAnalyticsOption')->getOptimize();
        if (!empty($optimizeOption)) {
            $rankology_google_analytics_html .= '<script async src="https://www.googleoptimize.com/optimize.js?id='.$optimizeOption.'"></script>';
            $rankology_google_analytics_html .= "\n";
        }

        $rankology_google_analytics_html = apply_filters('rankology_gtag_html', $rankology_google_analytics_html);

        if (true == $echo) {
            echo $rankology_google_analytics_html;
        } else {
            return $rankology_google_analytics_html;
        }
    }
}
add_action('rankology_google_analytics_html', 'rankology_google_analytics_js', 10, 1);

function rankology_google_analytics_js_arguments() {
    $echo = true;
    do_action('rankology_google_analytics_html', $echo);
}

function rankology_custom_tracking_hook() {
    $data['custom'] = '';
    $data['custom'] = apply_filters('rankology_custom_tracking', $data['custom']);
    echo $data['custom'];
}

//Build custom code after body tag opening
function rankology_google_analytics_body_code($echo) {
    $rankology_html_body = rankology_get_service('GoogleAnalyticsOption')->getOtherTrackingBody();
    if (empty($rankology_html_body) || !$rankology_html_body) {
        return;
    }

    $rankology_html_body = apply_filters('rankology_custom_body_tracking', $rankology_html_body);
    if (true == $echo) {
        echo "\n" . $rankology_html_body;
    } else {
        return "\n" . $rankology_html_body;
    }
}
add_action('rankology_custom_body_tracking_html', 'rankology_google_analytics_body_code', 10, 1);

function rankology_custom_tracking_body_hook() {
    $echo = true;
    do_action('rankology_custom_body_tracking_html', $echo);
}

//Build custom code before body tag closing
function rankology_google_analytics_footer_code($echo) {
    $rankology_html_footer = rankology_get_service('GoogleAnalyticsOption')->getOtherTrackingFooter();
    if(empty($rankology_html_footer) || !$rankology_html_footer) {
        return;
    }

    $rankology_html_footer = apply_filters('rankology_custom_footer_tracking', $rankology_html_footer);
    if (true == $echo) {
        echo "\n" . $rankology_html_footer;
    } else {
        return "\n" . $rankology_html_footer;
    }
}
add_action('rankology_custom_footer_tracking_html', 'rankology_google_analytics_footer_code', 10, 1);

function rankology_custom_tracking_footer_hook() {
    $echo = true;
    do_action('rankology_custom_footer_tracking_html', $echo);
}

//Build custom code in head
function rankology_google_analytics_head_code($echo) {
    $rankology_html_head = rankology_get_service('GoogleAnalyticsOption')->getOtherTracking();
    if (empty($rankology_html_head) || !$rankology_html_head) {
        return;
    }

    $rankology_html_head = apply_filters('rankology_gtag_after_additional_tracking_html', $rankology_html_head);

    if (true == $echo) {
        echo "\n" . $rankology_html_head;
    } else {
        return "\n" . $rankology_html_head;
    }
}
add_action('rankology_custom_head_tracking_html', 'rankology_google_analytics_head_code', 10, 1);

function rankology_custom_tracking_head_hook() {
    $echo = true;
    do_action('rankology_custom_head_tracking_html', $echo);
}


