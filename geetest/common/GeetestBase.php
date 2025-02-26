<?php

namespace GEETEST;

defined('ABSPATH') || exit; // Exit if accessed directly.

$VersionOption = get_option('geetest_options')['version_options'];
if ($VersionOption == 'v4') {
    require_once 'GeetestContactForm7Captcha.php';
    \GeetestContactForm7Captcha::init();

    require_once 'GeetestbbPressCaptcha.php';
    \GeetestbbPressCaptcha::init();

    require_once 'GeetestWooCommerceCaptcha.php';
    \GeetestWooCommerceCaptcha::init();

    require_once 'GeetestWpforms.php';
    \GeetestWpforms::init();
}

require_once 'GeetestGformCaptcha.php';
\GeetestGformCaptcha::init();
