<?php

namespace MuzaPayDeps;

// Don't redefine the functions if included multiple times.
if (!\function_exists('MuzaPayDeps\GuzzleHttp\describe_type')) {
    require __DIR__ . '/functions.php';
}
