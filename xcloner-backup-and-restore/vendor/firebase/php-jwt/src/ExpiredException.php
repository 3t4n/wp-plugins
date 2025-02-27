<?php

namespace Firebase\JWT;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


class ExpiredException extends \UnexpectedValueException
{
}
