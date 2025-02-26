<?php

namespace FancyProductForElementor\Traits;

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

trait Helper
{

    /**
     * WooCommerce Product Query
     *
     * @return array
     */
    public function fancy_product_for_elementor_product_cats() {
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
        ));

        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $options[$term->slug] = $term->name;
            }
            return $options;
        }
    }

    /**
     * Description trimmer
     *
     * @return string
     */

    function fancy_product_for_elementor_limit_text($text, $limit) {
        if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        return $text;
      }


    //Show Product Tags List
    function fancy_product_for_elementor_product_tags() {

        $terms = get_terms( array(
            'taxonomy'   => 'product_tag',
            'hide_empty' => false,
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            foreach ( $terms as $term ) {
                $options[ $term->slug ] = $term->name;
            }
            return $options;
        }


    }


}
