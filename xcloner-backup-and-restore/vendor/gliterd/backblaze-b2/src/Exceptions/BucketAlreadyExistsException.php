<?php

namespace BackblazeB2\Exceptions;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


class BucketAlreadyExistsException extends B2Exception
{
}
