#!/usr/bin/env php
<?php
\chdir(__DIR__);

// phpcs:ignore Squiz.PHP.DiscouragedFunctions.Discouraged
\set_time_limit(0); // unlimited max execution time

// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fopen
$fp = \fopen(__DIR__ . '/data/ca-certificates.crt', 'w+b');

$options = [
    \CURLOPT_FILE => $fp,
    \CURLOPT_TIMEOUT => 3600,
    \CURLOPT_URL => 'https://curl.se/ca/cacert.pem',
];

// phpcs:ignore WordPress.WP.AlternativeFunctions.curl_curl_init
$ch = \curl_init();
// phpcs:ignore WordPress.WP.AlternativeFunctions.curl_curl_setopt_array
\curl_setopt_array($ch, $options);
// phpcs:ignore WordPress.WP.AlternativeFunctions.curl_curl_exec
\curl_exec($ch);
// phpcs:ignore WordPress.WP.AlternativeFunctions.curl_curl_close
\curl_close($ch);
// phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_fclose
\fclose($fp);
