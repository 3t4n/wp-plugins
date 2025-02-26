<?php
namespace Brickdots\AdminTodotastic\Helpers;

// @codeCoverageIgnoreStart
defined('ABSPATH') or die('No script kiddies please!'); // Avoid direct file request
// @codeCoverageIgnoreEnd

/**
 * Fucntions that help deal with strings
 *
 */
class StrHelper {
    protected static $allowedMention = [
        'span' => [
            'style' => [],
            'data-id' => []
        ]
    ];

    /**
     * Sanitize mention input
     * @param string $input
     * @return string
     */
    public static function sanitizeMentionInput(string $input): string {
        return wp_kses($input, static::$allowedMention);
    }
}
