<?php


// Define the namespace for the AI Summarizer plugin
namespace AISummarizer\GlobalFunction;

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Class SpellingHelper
 * Provides methods to get the correct spelling of 'summarizer' and 'summarize' based on the locale.
 */
class AISummarizer_SpellingHelper
{
    /**
     * Returns the correct spelling of 'summarizer' based on the locale.
     *
     * @return string 'Summarizer' or 'Summariser' depending on the locale.
     */
    public static function AISummarizer_getSummarizerSpelling(): string
    {
        $locale = get_locale();

        // Use 'Summarizer' for US English, 'Summariser' for other locales
        if (strpos($locale, 'en_US') === 0) {
            return 'Summarizer';
        }

        return 'Summariser';
    }

    /**
     * Returns the correct spelling of 'summarize' based on the locale.
     *
     * @return string 'Summarize' or 'Summarise' depending on the locale.
     */
    public static function AISummarizer_getSummarizeSpelling(): string
    {
        $locale = get_locale();

        // Use 'Summarize' for US English, 'Summarise' for other locales
        if (strpos($locale, 'en_US') === 0) {
            return 'Summarize';
        }

        return 'Summarise';
    }
}
