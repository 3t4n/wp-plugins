<?php

require_once("AdmiralAdBlockAnalytics.php");
require_once("AdmiralTokenHandler.php");

add_action('init', function() {
    if (isset($_GET['adm_get_token'])) {
        $nonce = sanitize_text_field($_SERVER['HTTP_X_WP_NONCE']);
        if (!wp_verify_nonce($nonce, 'wp_rest')) {
            echo json_encode(array('success' => false, 'error' => 'Invalid nonce'));
            exit;
        }

        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header('Access-Control-Allow-Headers: X-WP-Nonce');
        header('Access-Control-Allow-Credentials: true');
        $propertyID = \wp\AdmiralAdBlockAnalytics::getPropertyID();
        $tokenResult = \wp\AdmiralTokenHandler::getTokenForUser($propertyID);
        echo json_encode($tokenResult);
        exit;
    }
    if (isset($_GET['adm_retrieve_post'])) {
        $propertyID = \wp\AdmiralAdBlockAnalytics::getPropertyID();
        if (isset($_COOKIE['adm_efstok']) && \wp\AdmiralTokenHandler::verifySignedToken($propertyID)) {
            $post = get_post($_GET['adm_retrieve_post']);
            $output = apply_filters('the_content', $post->post_content);
            echo $output;
            exit;
        }
        exit;
    }
    if (isset($_GET['adm_reset_cookie'])) {
        setcookie('adm_efstok', '', -1, COOKIEPATH, COOKIE_DOMAIN, is_ssl(), true);
        exit;
    }
});

add_action('template_redirect', function() {
    if (is_single() && !is_user_logged_in() && isset($_COOKIE['adm_efstok'])) {
       $propertyID = \wp\AdmiralAdBlockAnalytics::getPropertyID();
        \wp\AdmiralTokenHandler::verifySignedToken($propertyID);
    }
});

function bot_check($useragent) {
    $t = strtolower($useragent);
    $t = " " . $t;
    switch ($t) {
        case (bool) strpos($t, 'google'):
        case (bool) strpos($t, 'bing'):
        case (bool) strpos($t, 'slurp'):
        case (bool) strpos($t, 'duckduckgo'):
        case (bool) strpos($t, 'baidu'):
        case (bool) strpos($t, 'yandex'):
        case (bool) strpos($t, 'sogou'):
        case (bool) strpos($t, 'msn'):
        case (bool) strpos($t, 'naver'):
            return true;
        default:
            return false;
    }
}

function detection_check($candidateIDs, $requirement, $benefits = null) {
    $tokenUrl = add_query_arg('adm_get_token', '1', get_permalink());
    $postId = get_the_ID();
    $retrieveUrl = add_query_arg('adm_retrieve_post', $postId, get_permalink());
    $nonce = wp_create_nonce('wp_rest');
    $jsonBenefits = json_encode($benefits);
    $jsonCandidateIDs = json_encode($candidateIDs);
    return <<<EOF
    <script>
        function setTokenAndReload() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '$tokenUrl', true);
            xhr.setRequestHeader('X-WP-Nonce', '$nonce');
            xhr.addEventListener('readystatechange', function () {
                var authMsg = document.getElementById('adm-auth-message');
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Fetch the full article content
                    var contentXhr = new XMLHttpRequest();
                    contentXhr.open('GET', '$retrieveUrl', true);
                    contentXhr.addEventListener('readystatechange', function () {
                        if (contentXhr.readyState === 4 && contentXhr.status === 200) {
                            // Replace the article content
                            authMsg.parentNode.innerHTML = contentXhr.responseText;
                        } else if (contentXhr.readyState === 4) {
                            // Handle error
                            authMsg.innerText = 'Failed to load content. Please refresh the page.';
                        }
                    });
                    contentXhr.send();
                } else if (xhr.readyState === 4) {
                    // Handle error
                    authMsg.innerText = 'Authentication failed. Please try again.';
                }
            });
            xhr.send();
        }
        function evalAndGroup(arr1,arr2) {
            for (var i = 0; i < arr1.length; i++) {
                var found = false;
                for (var j = 0; j < arr2.length; j++) {
                    if (arr2[j].indexOf("admbenefits=") !== -1) {
                        arr2[j] = arr2[j].replace("admbenefits=", "");
                    }
                    if (arr1[i] === arr2[j]) {
                        found = true;
                    }
                }
                if (!found) {
                    return false;
                }
            }
            return true;
        }
        window.admiral = window.admiral || function() { (admiral.q = admiral.q || []).push(arguments) };
        window.admiral("after", "measure.detected", function(user) {
            var authMsg = document.getElementById('adm-auth-message');
            if (user.adblocking && '$requirement' == 'abr') {
                authMsg.innerText = 'Remove your adblocker.';
                window.admiral("targeting", "force", { candidateIDs: $jsonCandidateIDs });
            } else if ('$requirement' == 'account') {
                shownCandidate = false
                window.admiral("after", "visitor.latest", function(v) {
                    if (!v.status.registered && !shownCandidate) {
                        authMsg.innerText = 'You must be logged in to access this content.';
                        window.admiral("targeting", "force", { candidateIDs: $jsonCandidateIDs });
                        shownCandidate = true;
                    } else if (!shownCandidate) {
                        setTokenAndReload();
                        shownCandidate = true;
                    }
                });
            } else if ('$requirement' == 'benefits') {
                var reqb = $jsonBenefits;
                var bcookie = document.cookie.split(";");
                var uben = [];
                if (bcookie) {
                    for (var i = 0; i < bcookie.length; i++) {
                        var bc = bcookie[i].trim()
                        if (bc.indexOf("admbenefits=") !== -1) {
                            uben = bc.split(',');
                            break;
                        }
                    }
                }
                if (uben.length > 0) {
                      if (!reqb) {
                        setTokenAndReload();
                        return;
                    } else {
                        for (var i = 0; i < reqb.length; i++) {
                           var met = evalAndGroup(reqb[i], uben);
                            if (met) {
                                setTokenAndReload();
                                return;
                            }
                        }
                    }
                }
                window.admiral("targeting", "force", { candidateIDs: $jsonCandidateIDs });
                authMsg.innerText = 'You do not have permission to view this content.';
            } else {
                setTokenAndReload();
            }
        });
    </script>
EOF;
}

function get_loading_style() {
    return <<<EOF
    <style>
    .spinner {
        margin: 10px auto;
        width: 50px;
        height: 50px;
        position: relative;
        text-align: center;
        animation: sk-rotate 2.0s infinite linear;
    }

    .dot1, .dot2 {
        width: 60%;
        height: 60%;
        display: inline-block;
        position: absolute;
        top: 0;
        background-color: #333;
        border-radius: 100%;
        animation: sk-bounce 2.0s infinite ease-in-out;
    }

    .dot2 {
        top: auto;
        bottom: 0;
        animation-delay: -1.0s;
    }

    @keyframes sk-rotate { 100% { transform: rotate(360deg) }}

    @keyframes sk-bounce {
        0%, 100% { transform: scale(0.0) }
        50% { transform: scale(1.0) }
    }
</style>
EOF;
}

function get_loading_message() {
    return <<<EOF
<div id="adm-auth-message" style="text-align: center;">
    <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
    </div>
</div>
EOF;
}

function get_best_candidate() {
    $candidates = \wp\AdmiralAdBlockAnalytics::getProtectCandidates();

    if (count($candidates) == 0) {
        return null;
    }

    $tags = array();
    $fetchTags = get_the_tags();

    if ($fetchTags) {
        $tags = array_column(get_the_tags(), "name");
    } else {
        return null;
    }

    $winners = array();
    foreach($candidates as $pcand) {
        if (isset($pcand["payload"]["protect"]["tags"])) {
            $ctags = $pcand["payload"]["protect"]["tags"];
            foreach($ctags as $group) {
                $hasTags = array_column(array_filter($group, function($tag) {
                    return $tag["shouldNegate"] == false;
                }), "value");
                $notTags = array_column(array_filter($group, function($tag) {
                    return $tag["shouldNegate"] == true;
                }), "value");

                if (count(array_intersect($tags, $hasTags)) == count($hasTags) && count(array_intersect($notTags, $tags)) == 0) {
                    array_push($winners, $pcand);
                    break;
                }
            }
        } else {
            // case: any/all tags targeted
            array_push($winners, $pcand);
        }
    }

    if (count($winners) == 0) {
        return null;
    }

    $bestMatch = $winners[0];
    if (count($winners) > 1) {
        usort($winners, function($a,$b) {
            return $b["weight"] - $a["weight"];
        });
        $bestMatch = $winners[0];
         // if we have multiple applicable candidates with the same weight, prefer non-ABR
        if ($winners[0]["weight"] == $winners[1]["weight"] && $winners[0]["requirement"] == "abr") {
            $highestWeight = $winners[0]["weight"];
            foreach($winners as $w) {
                if ($w["weight"] == $highestWeight && $w["payload"]["protect"]["requirement"] !== "abr"){
                    return $w;
                } else if ($w["weight"] != $highestWeight) {
                    break;
                }
            }
        }
    }
    return $bestMatch;
}

add_filter('wp_headers', function($headers) {
    if (!isset($_COOKIE['adm_efstok'])) {
        $headers['Cache-Control'] = 'no-cache, must-revalidate, max-age=0';
        $headers['Pragma'] = 'no-cache';
    }
    return $headers;
});

add_filter('wp_head', function() {
    $env = (defined('VIP_GO_APP_ENVIRONMENT') && VIP_GO_APP_ENVIRONMENT) || 'production';
    $didInitialize = \wp\AdmiralAdBlockAnalytics::initialize("wp", "1.9.6", $env);
    if ($didInitialize && is_singular() && is_main_query() && !is_user_logged_in() && !\wp\AdmiralTokenHandler::getVerifiedEFSToken()) {
        define('DONOTCACHEPAGE', true);
        echo get_loading_style();
    }
});

add_filter('the_content', function($content) {
    $useragent = sanitize_text_field($_SERVER['HTTP_USER_AGENT']);
    if (bot_check($useragent)) {
        return $content;
    }

    try {
        $env = (defined('VIP_GO_APP_ENVIRONMENT') && VIP_GO_APP_ENVIRONMENT) || 'production';
        $didInitialize = \wp\AdmiralAdBlockAnalytics::initialize("wp", "1.9.6", $env);
        if ($didInitialize && is_single() && !is_user_logged_in() && !\wp\AdmiralTokenHandler::getVerifiedEFSToken()) {
            $embed = \wp\AdmiralAdBlockAnalytics::getEmbed();
            if (empty($embed)) {
                return;
            }

            $bestMatch = get_best_candidate();
            if (!$bestMatch) {
                return $content;
            }

            // there is no easy way to count paragraphs in wordpress so just trim words for now
            // avg optimized-for-SEO paragraph is 40-55 words
            $excerpt = wp_trim_words($content, 50);

            $candidateIDs = [$bestMatch["candidateID"]];
            $requirement = $bestMatch["payload"]["protect"]["requirement"];
            $benefits = isset($bestMatch["payload"]["protect"]["benefits"]) ? $bestMatch["payload"]["protect"]["benefits"] : null;

            if (isset($bestMatch["transactIDs"])) {
                $candidateIDs = array_merge($candidateIDs, $bestMatch["transactIDs"]);
            }

            echo detection_check($candidateIDs, $requirement, $benefits);

            return $excerpt . "\n" . get_loading_message();
        }
    } catch (Exception $e) {
        error_log("Error loading settings: " . $e->getMessage());
    }
    return $content;
}, 1);
