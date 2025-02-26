<?php
/*
Plugin Name: AZRULAT
Plugin URI: https://redaksiya.az/plugins
Description: Converts Azerbaijani and Russian characters, symbols, and special punctuation in post slugs to Latin characters for SEO-friendly and readable permalinks.
Version: 1.1
Requires at least: 5.0
Requires PHP: 7.0
Author: Redaksiya
Author URI: https://redaksiya.az
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Prevent direct file access
if (!defined('ABSPATH')) exit;

class AZRULAT {
    private $symbols_cache;

    public function __construct() {
        // Hook into WordPress filters
        add_filter('sanitize_title', [$this, 'sanitizeTitle'], 9);
        add_filter('sanitize_file_name', [$this, 'sanitizeTitle']);
    }

    public function transliterate($title, $ignore_special_symbols = false) {
        // Decode HTML entities to prevent issues with special symbols
        $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // Ensure UTF-8 encoding
        $title = mb_convert_encoding($title, 'UTF-8', 'auto');

        // Replace known Azerbaijani and Russian symbols
        $iso9_table = $this->getSymbols();
        $title = strtr($title, $iso9_table);

        // Use iconv to remove incompatible characters
        if (function_exists('iconv')) {
            $title = iconv('UTF-8', 'UTF-8//TRANSLIT//IGNORE', $title);
        }

        // Replace spaces with hyphens
        $title = preg_replace('/\s+/', '-', $title); // Replace any whitespace with a single hyphen

        // Remove any non-URL-safe characters
        if (!$ignore_special_symbols) {
            $title = preg_replace("/[^A-Za-z0-9\-_\.]/u", '', $title); // Keep only letters, numbers, -, _, .
            $title = preg_replace('/\-+/', '-', $title); // Replace multiple hyphens with a single one
            $title = preg_replace('/^-+/', '', $title); // Trim leading hyphens
            $title = preg_replace('/-+$/', '', $title); // Trim trailing hyphens
        }

        return $title;
    }

    public function sanitizeTitle($title) {
        // Check if this is for a term slug
        $is_term = did_action('edit_terms') || did_action('create_term');

        if ($is_term) {
            $terms = get_terms([
                'name'        => $title,
                'fields'      => 'slugs',
                'hide_empty'  => false,
            ]);

            if (is_array($terms) && !empty($terms) && !is_wp_error($terms)) {
                $title = reset($terms); // Use the first matched slug
            } else {
                $title = $this->transliterate($title);
            }
        } else {
            $title = $this->transliterate($title);
        }

        return $title;
    }

    private function getSymbols() {
        // Cache the symbols table to avoid redundant calculations
        if (!$this->symbols_cache) {
            $az = [
                'ə' => 'e', 'ü' => 'u', 'і' => 'i', 'ğ' => 'g', 'ö' => 'o', 
                'ı' => 'i', 'ç' => 'c', 'ş' => 's', 'Ə' => 'E', 'Ü' => 'U', 
                'İ' => 'I', 'Ğ' => 'G', 'Ö' => 'O', 'I' => 'I', 'Ç' => 'C', 'Ş' => 'S'
            ];

            $ru = [
                'А' => 'A', 'а' => 'a', 'Б' => 'B', 'б' => 'b', 'В' => 'V', 'в' => 'v', 
                'Г' => 'G', 'г' => 'g', 'Д' => 'D', 'д' => 'd', 'Е' => 'E', 'е' => 'e', 
                'Ё' => 'Jo', 'ё' => 'jo', 'Ж' => 'Zh', 'ж' => 'zh', 'З' => 'Z', 'з' => 'z', 
                'И' => 'I', 'и' => 'i', 'Й' => 'J', 'й' => 'j', 'К' => 'K', 'к' => 'k', 
                'Л' => 'L', 'л' => 'l', 'М' => 'M', 'м' => 'm', 'Н' => 'N', 'н' => 'n', 
                'О' => 'O', 'о' => 'o', 'П' => 'P', 'п' => 'p', 'Р' => 'R', 'р' => 'r', 
                'С' => 'S', 'с' => 's', 'Т' => 'T', 'т' => 't', 'У' => 'U', 'у' => 'u', 
                'Ф' => 'F', 'ф' => 'f', 'Х' => 'H', 'х' => 'h', 'Ц' => 'C', 'ц' => 'c', 
                'Ч' => 'Ch', 'ч' => 'ch', 'Ш' => 'Sh', 'ш' => 'sh', 'Щ' => 'Shh', 'щ' => 'shh', 
                'Ъ' => '', 'ъ' => '', 'Ы' => 'Y', 'ы' => 'y', 'Ь' => '', 'ь' => '', 
                'Э' => 'Ye', 'э' => 'ye', 'Ю' => 'Yu', 'ю' => 'yu', 'Я' => 'Ya', 'я' => 'ya', 
                'Ґ' => 'G', 'ґ' => 'g', 'Є' => 'Ie', 'є' => 'ie', 'І' => 'I', 'і' => 'i', 
                'Ї' => 'I', 'ї' => 'i', 'Ї' => 'i', 'ї' => 'i', 'Ё' => 'Yo', 'ё' => 'yo', 
                'й' => 'i', 'Й' => 'I'
            ];

            $this->symbols_cache = array_merge($az, $ru);
        }

        return $this->symbols_cache;
    }
}

// Initialize the plugin
new AZRULAT();
