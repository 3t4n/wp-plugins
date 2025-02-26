<?php

/**
 * ModelFactory
 *
 * Factory class for creating AI model instances based on the selected model type.
 *
 * @category Plugin
 * @package  AI_Summarizer
 */

namespace AISummarizer\Factories;

use AISummarizer\Models\BedrockModel;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

class ModelFactory
{
    public static function AISummarizer_create($config)
    {
        return new BedrockModel($config);
    }
}
