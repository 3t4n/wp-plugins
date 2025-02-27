<?php
namespace Aws\S3\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


class PermanentRedirectException extends S3Exception {}
