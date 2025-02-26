<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

class ATBS_Widgets {

    public static function atbs_get_star_rating_widget($rating = 1)
    {
        print('<div class="vocalreferences-rating">');
        $max = 5;
        for ($i = 1; $i <= $max; $i++) {
            if ($i <= $rating) {
                print('<span class="vocalreferences-star vocalreferences-star-active" data-value="' . esc_attr($i) . '">&#9733;</span>');
            } else {
                print('<span class="vocalreferences-star" data-value="' . esc_attr($i) . '">&#9733;</span>');
            }
        }
        print('</div>');
    }
}
