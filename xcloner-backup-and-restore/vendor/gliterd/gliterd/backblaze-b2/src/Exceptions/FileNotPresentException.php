<?php

namespace BackblazeB2\Exceptions;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


class FileNotPresentException extends B2Exception
{
}
