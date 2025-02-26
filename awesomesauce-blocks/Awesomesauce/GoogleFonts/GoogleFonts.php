<?php

namespace Awesomesauce\GoogleFonts;

use Awesomesauce\Functions;
use Awesomesauce\Awesomesauce;
use Awesomesauce\Frontend\Frontend;
use Awesomesauce\GoogleFonts\GoogleFontsList;

if (!defined('ABSPATH')) {
    exit;
}

class GoogleFonts {

    private $used_fonts = array();
    private $used_font_weights = array(
        array(
            'italic' => 0,
            'weight' => '400'
        )
    );
    private $user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36';

    static $all_fonts = '';
    static $local_fonts_css = '';

    public function store_font($value) {
        if (!empty($value)) {
            if (Functions::string_contains($value, ',')) {
                $fonts = explode(',', $value);
            } else {
                $fonts = array($value);
            }
            foreach ($fonts as $font) {
                //By default, Google font names should be entered as capitalized, but we will capitalize too, which works at most fonts.
                $font = trim(ucwords($font));
                Functions::call_in_file('GoogleFonts/GoogleFontsList.php');
                if (in_array($font, GoogleFontsList::$fonts)) {
                    $this->used_fonts[] = str_replace(' ', '+', $font);
                }
            }
        }
    }

    public function google_font_found() {
        return !empty($this->used_fonts);
    }

    public function store_font_weight($font_weight) {
        if (!empty($font_weight)) {
            $helper = array();
            if (Functions::string_contains($font_weight, 'italic')) {
                //remove from 'italic' string to have proper weight values + store italic state
                $font_weight      = str_replace('italic', '', $font_weight);
                $helper['italic'] = 1;
            } else {
                $helper['italic'] = 0;
            }
            $helper['weight']          = $font_weight;
            $this->used_font_weights[] = $helper;
        }
    }

    public function store_all_fonts() {
        $this->used_font_weights = $this->multi_unique($this->used_font_weights);

        usort($this->used_font_weights, array(
            $this,
            'sort_by_weight'
        ));

        usort($this->used_font_weights, array(
            $this,
            'sort_by_italic'
        ));

        $font_weights = '';
        foreach ($this->used_font_weights as $extra) {
            $font_weights .= $extra['italic'] . ',' . $extra['weight'] . ';';
        }
        $font_weights = rtrim($font_weights, ';');

        $fonts = '';
        foreach ($this->used_fonts as $font) {
            $fonts .= 'family=' . $font . ':ital,wght@' . $font_weights . '&';
        }
        $fonts = rtrim($fonts, '&');

        if (!empty(self::$all_fonts)) {
            self::$all_fonts .= '&';
        }

        self::$all_fonts .= $fonts;
    }

    static function get_url($reset_fonts = true) {
        //'auto' is equal to not adding font-display, that is why it is not on the list
        $allowed_display_values = array(
            'block',
            'swap',
            'fallback',
            'optional'
        );

        $display = Functions::get_option('google_fonts_display', 'auto');
        if (in_array($display, $allowed_display_values)) {
            $display = '&display=' . $display;
        } else {
            $display = '';
        }

        if (!empty(self::$all_fonts)) {
            $url = 'https://fonts.googleapis.com/css2?' . self::$all_fonts . $display;
            if ($reset_fonts) {
                self::$all_fonts = '';
            }

            return $url;
        } else {
            return '';
        }
    }

    private function multi_unique($array) {
        if (!empty($array)) {
            $new = array();
            foreach ($array as $k => $na) {
                $new[$k] = serialize($na);
            }
            $uniq = array_unique($new);
            $new1 = array();
            foreach ($uniq as $k => $ser) {
                $new1[$k] = unserialize($ser);
            }

            return ($new1);
        } else {
            return $array;
        }
    }

    public function sort_by_italic($a, $b) {
        if ($a['italic'] > $b['italic']) {
            return 1;
        } elseif ($a['italic'] < $b['italic']) {
            return -1;
        }

        return 0;
    }

    public function sort_by_weight($a, $b) {
        if ($a['weight'] > $b['weight']) {
            return 1;
        } elseif ($a['weight'] < $b['weight']) {
            return -1;
        }

        return 0;
    }

    private function fonts_from_url() {
        $url = self::get_url(false);
        if (!empty($url)) {
            //use local file, when exists
            $file_contents = $this->get_file_from_path(Awesomesauce::$uploads_folder_path . '/awesomesauce_google_fonts/css/' . md5($url) . '.css');
            if (empty($file_contents)) {
                $file_contents = $this->get_file($url);
            }

            if (!empty($file_contents)) {
                $fonts     = array();
                $fonts_css = $this->get_text_between('/', '}', $file_contents);

                foreach ($fonts_css as $font_css) {

                    $font_css = str_replace([
                        "\n\r",
                        "\n",
                        "\r"
                    ], '', $font_css);
                    $comment  = str_replace('-', '_', $this->get_text_between_first("* ", " *", $font_css));
                    $family   = $this->get_text_between_first("font-family: '", "';", $font_css);
                    $style    = $this->get_text_between_first("font-style: ", ";", $font_css);
                    $weight   = $this->get_text_between_first("font-weight: ", ";", $font_css);
                    $src      = $this->get_text_between_first("url(", ")", $font_css);
                    $folder   = $this->get_text_between_first("/s/", "/", $src);
                    $format   = $this->get_text_between_first("format('", "');", $font_css);
                    $range    = $this->get_text_between_first("unicode-range: ", ";", $font_css);

                    $name                    = $folder . '_' . $comment . '_' . $style . '_' . $weight;
                    $fonts[$name]['family']  = $family;
                    $fonts[$name]['folder']  = $folder;
                    $fonts[$name]['style']   = $style;
                    $fonts[$name]['weight']  = $weight;
                    $fonts[$name]['comment'] = $comment;
                    $fonts[$name]['format']  = $format;
                    $fonts[$name]['range']   = $range;
                    $fonts[$name]['src']     = $src;
                }

                return $fonts;

            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public function store_fonts_locally() {
        $fonts = $this->fonts_from_url();
        if (!empty($fonts)) {
            $main_folder = $this->create_folder(Awesomesauce::$uploads_folder_path, 'awesomesauce_google_fonts');
            foreach ($fonts as $name => $font) {
                $current_folder = $this->create_folder($main_folder, $font['folder']);
                $current_folder = $this->create_folder($current_folder, $font['style']);
                $current_folder = $this->create_folder($current_folder, $font['weight']);
                $current_folder = $this->create_folder($current_folder, $font['comment']);
                $this->create_file($current_folder, 'font.' . $font['format'], $font['src']);
                $fonts[$name]['url'] = Awesomesauce::$uploads_folder_url . '/awesomesauce_google_fonts/' . $font['folder'] . '/' . $font['style'] . '/' . $font['weight'] . '/' . $font['comment'] . '/' . 'font.' . $font['format'];
            }
            $this->create_local_fonts_css($fonts);

            $this->store_css_file_locally($main_folder);
        }
    }

    private function store_css_file_locally($main_folder) {
        $current_folder = $this->create_folder($main_folder, 'css');
        $url            = self::get_url();
        $this->create_file($current_folder, md5($url) . '.css', $url);
    }

    private function create_local_fonts_css($fonts) {
        $allowed_display_values = array(
            'block',
            'swap',
            'fallback',
            'optional'
        );

        $display = Functions::get_option('google_fonts_display', 'auto');
        if (in_array($display, $allowed_display_values)) {
            $display = "  font-display: " . $display . ";" . PHP_EOL;
        } else {
            $display = "";
        }

        foreach ($fonts as $name => $font) {
            if (!in_array($name, Frontend::$loaded_fonts)) {
                Frontend::$loaded_fonts[] = $name;

                self::$local_fonts_css .= "@font-face {" . PHP_EOL;
                self::$local_fonts_css .= "  font-family: '" . $font['family'] . "';" . PHP_EOL;
                self::$local_fonts_css .= "  font-style: " . $font['style'] . ";" . PHP_EOL;
                self::$local_fonts_css .= "  font-weight: " . $font['weight'] . ";" . PHP_EOL;
                self::$local_fonts_css .= $display;
                self::$local_fonts_css .= "  src: url(" . $font['url'] . ") format('" . $font['format'] . "');" . PHP_EOL;
                self::$local_fonts_css .= "  unicode-range: " . $font['range'] . ";" . PHP_EOL;
                self::$local_fonts_css .= "}" . PHP_EOL . PHP_EOL;
            }
        }
    }

    private function wp_get_contents($url) {
        $request = wp_remote_get($url, array(
            'timeout' => 30,
            'headers' => array(
                'User-Agent' => $this->user_agent
            ),
        ));

        $header = wp_remote_retrieve_header($request, 'content-type');

        if (Functions::string_contains($header, 'text/html')) {
            return '';
        } else {
            return wp_remote_retrieve_body($request);
        }
    }

    private function get_file($url) {
        $contents = $this->wp_get_contents($url);
        if (empty($contents)) {
            //file_get_contents is only being used, if wp_remote_get fails
            $contents = @file_get_contents($url); //phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
            if ($contents === false) {
                return '';
            }
        }
        if (empty($contents)) {
            return '';
        } else {
            return $contents;
        }
    }

    private function get_file_from_path($file_path) {
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        if ($wp_filesystem->exists($file_path)) {
            $contents = $wp_filesystem->get_contents($file_path);
            if ($contents !== false) {
                return $contents;
            }
        }

        return '';
    }

    //returns array
    private function get_text_between($startDelimiter, $endDelimiter, $str = '') {
        $contents             = array();
        $startDelimiterLength = strlen($startDelimiter);
        $endDelimiterLength   = strlen($endDelimiter);
        $startFrom            = $contentStart = $contentEnd = 0;
        while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
            $contentStart += $startDelimiterLength;
            $contentEnd   = strpos($str, $endDelimiter, $contentStart);
            if (false === $contentEnd) {
                break;
            }
            $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
            $startFrom  = $contentEnd + $endDelimiterLength;
        }

        return $contents;
    }

    //returns string
    private function get_text_between_first($startDelimiter, $endDelimiter, $str = '') {
        $plus   = strlen($startDelimiter);
        $start  = strrpos($str, $startDelimiter);
        $start  = $start + $plus;
        $result = substr($str, $start);
        $end    = strpos($result, $endDelimiter);

        return substr($result, 0, $end);
    }

    private function create_folder($path, $folder) {
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        if (!file_exists($path . '/' . $folder)) {
            $wp_filesystem->mkdir($path . '/' . $folder, 0755);
        }

        return $path . '/' . $folder;
    }

    private function create_file($path, $name, $src) {
        global $wp_filesystem;

        if (!function_exists('WP_Filesystem')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        if (!$wp_filesystem->is_dir($path)) {
            $wp_filesystem->mkdir($path);
        }

        $full_path = trailingslashit($path) . $name;

        if (!$wp_filesystem->exists($full_path)) {
            $file_contents = $this->get_file($src);

            $wp_filesystem->put_contents($full_path, $file_contents, FS_CHMOD_FILE);
        }

        return $full_path;
    }

    static function delete_local_fonts() {
        global $wp_filesystem;

        if (empty($wp_filesystem)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
        }

        if (Awesomesauce::$is_admin) {
            $directory = Awesomesauce::$uploads_folder_path . '/awesomesauce_google_fonts';

            if (file_exists($directory)) {
                $fonts = glob($directory . "/*");
                foreach ($fonts as $font) {
                    $styles = glob($font . "/*");
                    foreach ($styles as $style) {
                        $weights = glob($style . "/*");
                        foreach ($weights as $weight) {
                            $comments = glob($weight . "/*");
                            foreach ($comments as $comment) {
                                $files = glob($comment . "/*");
                                foreach ($files as $file) {
                                    wp_delete_file($file);
                                }
                                $wp_filesystem->rmdir($comment);
                            }
                            $wp_filesystem->rmdir($weight);
                        }
                        $wp_filesystem->rmdir($style);
                    }
                    $wp_filesystem->rmdir($font);
                }
                $wp_filesystem->rmdir($directory);
            }
        }
    }
}