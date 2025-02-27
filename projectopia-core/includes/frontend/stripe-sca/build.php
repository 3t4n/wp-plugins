#!/usr/bin/env php
<?php
\chdir(__DIR__);

$autoload = (int) $argv[1];
$returnStatus = null;

if (!$autoload) {
    // Modify composer to not autoload Stripe
    // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
    $composer = \json_decode(\file_get_contents('composer.json'), true);
    unset($composer['autoload'], $composer['autoload-dev']);
    // phpcs:ignore WordPress.WP.AlternativeFunctions.file_system_operations_file_put_contents, WordPress.WP.AlternativeFunctions.json_encode_json_encode
    \file_put_contents('composer.json', \json_encode($composer, \JSON_PRETTY_PRINT));
}

// phpcs:ignore Generic.PHP.ForbiddenFunctions.Found
\passthru('composer update', $returnStatus);
if (0 !== $returnStatus) {
    exit(1);
}

$config = $autoload ? 'phpunit.xml' : 'phpunit.no_autoload.xml';
// phpcs:ignore Generic.PHP.ForbiddenFunctions.Found
\passthru("./vendor/bin/phpunit -c {$config}", $returnStatus);
if (0 !== $returnStatus) {
    exit(1);
}
