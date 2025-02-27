<?php

namespace As247\CloudStorages\Exception;

if (!defined('ABSPATH') && PHP_SAPI !== 'cli') { die(); }


use InvalidArgumentException;

class InvalidVisibilityProvided extends InvalidArgumentException implements FilesystemException
{
	public static function withVisibility(string $visibility, string $expectedMessage): InvalidVisibilityProvided
	{
		$provided = var_export($visibility, true);
		$message = "Invalid visibility provided. Expected {$expectedMessage}, received {$provided}";

		throw new InvalidVisibilityProvided($message);
	}
}
