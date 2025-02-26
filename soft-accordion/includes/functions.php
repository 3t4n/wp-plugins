<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
function soft_accordion_post_fetch(  $type  ) {
    $posts = get_posts( array(
        'post_type'      => $type,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ) );
    $result = array();
    foreach ( $posts as $post ) {
        $result[] = array(
            'id'    => $post->ID,
            'title' => get_the_title( $post->ID ),
        );
    }
    return $result;
}

/**
 * Add `rel="nofollow"` attribute to links in content.
 *
 * @param string $content The content containing links.
 *
 * @return string Modified content with nofollow links.
 * @since 1.0.0
 */
function soft_accordion_add_nofollow_to_links(  $content  ) {
    $dom = new DOMDocument();
    libxml_use_internal_errors( true );
    $dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
    libxml_clear_errors();
    $links = $dom->getElementsByTagName( 'a' );
    foreach ( $links as $link ) {
        $rel = $link->getAttribute( 'rel' );
        if ( strpos( $rel, 'nofollow' ) === false ) {
            $rel = trim( $rel . ' nofollow' );
        } else {
            $rel = trim( $rel );
        }
        $link->setAttribute( 'rel', $rel );
    }
    return $dom->saveHTML();
}

/**
 * Schema Markup
 *
 * @since 1.0.0
 */
function soft_accordion_generate_faq_schema_markup(  $accordion_data  ) {
    $faq_schema = array(
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array(),
    );
    foreach ( $accordion_data as $item ) {
        $faq_schema['mainEntity'][] = array(
            '@type'          => 'Question',
            'name'           => $item['title'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text'  => strip_tags( $item['content'] ),
            ),
        );
    }
    return '<script type="application/ld+json">' . json_encode( $faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>';
}

/**
 * Get Accordion data
 *
 * @since 1.0.0
 */
function soft_accordion_get_accordion_data() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'soft_accordion';
    $results = $wpdb->get_results( "SELECT * FROM {$table_name}", ARRAY_A );
    foreach ( $results as &$row ) {
        $row['is_active'] = intval( $row['is_active'] );
        $row['title'] = stripslashes( $row['title'] );
        $row['type'] = stripslashes( $row['type'] );
        $row['custom_data'] = json_decode( $row['custom_data'], true );
        $row['post_data'] = json_decode( $row['post_data'], true );
        $row['settings'] = json_decode( $row['settings'], true );
    }
    return $results;
}

/**
 * Sanitize array
 *
 * @since 1.0.0
 */
function soft_accordion_sanitize_array(  $array  ) {
    if ( !is_array( $array ) ) {
        return $array;
    }
    foreach ( $array as $key => &$value ) {
        if ( $key === 'title' ) {
            $value = sanitize_text_field( $value );
        } elseif ( is_array( $value ) ) {
            $value = soft_accordion_sanitize_array( $value );
        } elseif ( in_array( $value, array('true', 'false') ) ) {
            $value = filter_var( $value, FILTER_VALIDATE_BOOLEAN );
        } elseif ( is_numeric( $value ) ) {
            if ( strpos( $value, '.' ) !== false ) {
                $value = floatval( $value );
            } elseif ( filter_var( $value, FILTER_VALIDATE_INT ) !== false && $value <= PHP_INT_MAX ) {
                $value = intval( $value );
            } else {
                // Keep large integers or non-integer values as string
                $value = $value;
            }
        } else {
            $value = wp_kses_post( $value );
        }
    }
    return $array;
}

/**
 * Soft accordion get setttings
 */
function soft_accordion_get_settings() {
    $default_settings = array(
        'customCSS'   => '',
        'customJS'    => '',
        'wooFaqTab'   => false,
        'faqTabLabel' => "FAQs",
        'tabPriority' => 50,
        'faqTabs'     => [],
        'autoSave'    => false,
    );
    $saved_settings = get_option( 'soft_accordion_settings', array() );
    $settings = array_merge( $default_settings, $saved_settings );
    return ( !empty( $settings ) ? $settings : $default_settings );
}

/**
 * Get setting
 *
 * @param string $key setting key.
 * @param string $default default value.
 */
function soft_accordion_get_setting(  $key, $default = ''  ) {
    $settings = soft_accordion_get_settings();
    if ( isset( $settings[$key] ) ) {
        return $settings[$key];
    }
    return $default;
}

/**
 * Get formated accordion data
 *
 * @param array $accordion accordion data.
 * @return array
 */
function soft_accordion_get_formatted_accordion(  $accordion  ) {
    if ( empty( $accordion ) ) {
        return array();
    }
    $accordion['id'] = intval( $accordion['id'] );
    $accordion['is_active'] = intval( $accordion['is_active'] );
    $accordion['type'] = sanitize_text_field( $accordion['type'] );
    $accordion['custom_data'] = maybe_unserialize( $accordion['custom_data'] );
    $accordion['post_data'] = maybe_unserialize( $accordion['post_data'] );
    $accordion['settings'] = maybe_unserialize( $accordion['settings'] );
    return $accordion;
}

/**
 * Get Accordions
 *
 * @param boolean $id id.
 * @return array
 */
function soft_accordion_get_accordions(  $id = false  ) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'soft_accordion';
    if ( $id ) {
        $accordion = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM {$table_name} WHERE id = %d", $id ), ARRAY_A );
        return soft_accordion_get_formatted_accordion( $accordion );
    }
    $accordions = $wpdb->get_results( "SELECT * FROM {$table_name}", ARRAY_A );
    $formatted_accordions = array();
    if ( !empty( $accordions ) ) {
        foreach ( $accordions as $accordion ) {
            $formatted_accordions[] = soft_accordion_get_formatted_accordion( $accordion );
        }
    }
    if ( 0 === $id ) {
        return $formatted_accordions[0];
    }
    return $formatted_accordions;
}
