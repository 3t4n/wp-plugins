<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

class Quotes_Stars
{
    function __construct()
    {
        add_action('init', [$this, 'register_star_svg_script'] );
        add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    function register_star_svg_script() {
        // Front and Backend-Script see block.json "script"
		wp_register_script(
			'quotes_star_script',
			QUOTES_PLUGIN_URL . 'public/js/star.js',
			array(),
			filemtime(QUOTES_DIR . 'public/js/star.js'),
            ['strategy' => 'defer']
		);
    }

    function enqueue_scripts($hook) {
        $screen = get_current_screen();
        if ($screen->id ==="edit-quote" || $screen->id ==="quote") {
            wp_enqueue_script('quotes_star_script');
        }  
    }

    /**
     * Returns the svg Code for a Star
     *
     * @param integer $index
     * @param float $rating
     * @return string SVG Code
     */
    private static function get_star($index, $rating)
    {
        $fill = "";
        if ($index < floor($rating))
            $fill = "rgb(229,187,79)";
        else if (($index == floor($rating)) && ($rating - floor($rating) > 0)) {
            $fraction = round(($rating - floor($rating)) * 10, 0);
            $fill = "url(#partialFill-" . $fraction . ")";
        } else if ($index >= $rating)
            $fill = "rgb(255,255,255)";

        return '
        <use xlink:href="#star"
            class="star"
            x = "' . esc_attr($index * 100) . '"
            fill = "' . esc_attr($fill) . '"
        ></use>';
    }

    /**
     * Returns all Stars SVG Code
     *
     * @return string SVG Code
     */
    public static function get_stars($rating)
    {
        // clamp 0 to 5
        $rating = max(0, min(5, $rating));

        $stars = "";
        for ($i = 0; $i < 5; $i++) {
            $stars .= self::get_star($i, $rating);
        }
        return '
        <svg class="la-rating-stars" viewBox="0 0 500 100">
            ' . $stars . '
            />
            Sorry, your browser does not support inline SVG.
        </svg>';
    }
}
