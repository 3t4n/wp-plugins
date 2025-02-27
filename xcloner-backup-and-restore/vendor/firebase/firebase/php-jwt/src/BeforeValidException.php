<?php

namespace Firebase\JWT;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


class BeforeValidException extends \UnexpectedValueException
{
}
