<?php

namespace As247\CloudStorages\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use InvalidArgumentException;

class InvalidStreamProvided extends InvalidArgumentException implements FilesystemException
{
}
