<?php

$mapping = array(
    'Elvez\AIAPI' => __DIR__ . '/AIAPI.php',
    'Elvez\AuthUtil' => __DIR__ . '/AuthUtil.php',
    'Elvez\LoginUtil' => __DIR__ . '/LoginUtil.php',
    'Elvez\PhoneNumberUtil' => __DIR__ . '/PhoneNumberUtil.php',
    'Elvez\SubscriptionAPI' => __DIR__ . '/SubscriptionAPI/SubscriptionAPI.php',
);

spl_autoload_register(function ($class) use ($mapping) {
    if (isset($mapping[$class])) {
        require $mapping[$class];
    }
}, true);