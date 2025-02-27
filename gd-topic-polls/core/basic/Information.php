<?php

namespace Dev4Press\Plugin\TopicPolls\Basic;

use Dev4Press\v53\Core\Plugins\Information as BaseInformation;
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
class Information extends BaseInformation {
    public string $code = 'gd-topic-polls';

    public string $version = '4.3';

    public int $build = 4300;

    public string $edition = 'pro';

    public string $status = 'stable';

    public string $updated = '2025.01.29';

    public string $released = '2017.04.17';

    public bool $is_bbpress_plugin = true;

    public function __construct() {
        parent::__construct();
    }

}
