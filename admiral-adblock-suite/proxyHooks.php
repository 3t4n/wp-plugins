<?php

require_once("AdmiralAdBlockAnalytics.php");

add_action('init', function() {
    if (!\wp\AdmiralAdBlockAnalytics::isProxyAdmiralEnabled()) {
        return;
    }

    $linkStructure = get_option('permalink_structure');
    // if the link structure is empty, we can't proxy since they may not support it
    if (empty($linkStructure)) {
        return;
    }

    $requestURI = $_SERVER['REQUEST_URI'];
    $siteURL = get_site_url();
    $path = parse_url($siteURL, PHP_URL_PATH);
    if (!empty($path) && strpos($requestURI, $path) === 0) {
        // remove the path from the request URI
        $requestURI = substr($requestURI, strlen($path));
    }

    // remove the slash from the start of the request URI
    $requestURI = substr($requestURI, 1);

    // does the current request start with a prefix we support?
    $proxy = \wp\AdmiralAdBlockAnalytics::getHttpHandlerInstance();
    $prefix = $proxy->getProxyPrefixForURI($requestURI);
    if ($prefix) {
        // remove the prefix from the request and proxy it
        $proxyRequest = substr($requestURI, strlen($prefix));
        $res = $proxy->proxyRequest($proxyRequest, $_SERVER);
        if (!empty($res['statusCode'])) {
            http_response_code($res['statusCode']);
        }
        foreach ($res['headers'] as $header => $value) {
            header($header . ": " . $value);
        }
        if (isset($res['error'])) {
            echo "Error: " . $res['error']['str'];
        } else {
            echo $res['source'];
        }
        exit;
    }
});
