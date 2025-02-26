<?php
/**
 * Server-side rendering for the form
 *
 * @package alpc
 */

/**
 * Register the block on server
 */
function alpc_form_init() {
    if ( ! function_exists( 'register_block_type' ) ) {
        return;
    }

    register_block_type(
        __DIR__,
        array(
            'render_callback' => function($attributes) {
                return wp_login_form(
                    array(
                        'echo' => false,
                        'label_username' => $attributes['settings']['username'] ?? 'Username or Email Address',
                        'label_password' => $attributes['settings']['password'] ?? 'Password',
                        'label_remember' => $attributes['settings']['remember'] ?? 'Remember Me',
                        'label_log_in' => $attributes['settings']['login'] ?? 'Log In'
                    )
                );
            },
        )
    );
}

add_action( 'init', 'alpc_form_init' );

function alpc_form_render_block( $block_content, $block ) {
    if ( ( isset( $block['blockName'] ) && 'alpc/login-form' !== $block['blockName'] ) || is_admin() || empty($block['blockName']) ) {
        return $block_content;
    }

    $css .= "#loginform {";

    // Text color
    $css .= "color: " . ($block['attrs']['styles']['form']['textColor'] ?? '#000') . ";";

    // Background color
    if ( isset( $block['attrs']['styles']['form']['backgroundColor'] ) ) {
        $css .= "background-color: " . $block['attrs']['styles']['form']['backgroundColor'] . ";";
    }

    // Margin
    $css .= generate_css_property('margin', $block['attrs']['styles']['form']['margin'] ?? '');

    // Padding
    $css .= generate_css_property('padding', $block['attrs']['styles']['form']['padding'] ?? '');

    // Borders
    if ( isset( $block['attrs']['styles']['form']['borders'] ) ) {
        $borders = $block['attrs']['styles']['form']['borders'];
        $borderDefaults = [
            'style' => 'solid'
        ];
        $borderColor = $borders['color'] ?? $borderDefaults['color'];
        $borderWidth = $borders['width'] ?? $borderDefaults['width'];
        $borderStyle = $borders['style'] ?? $borderDefaults['style'];

        $css .= "border: $borderWidth $borderStyle $borderColor;";

        // Handle individual borders
        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            if ( isset( $borders[$side] ) ) {
                $css .= "border-$side: " .
                    ($borders[$side]['width'] ?? $borderWidth) . ' ' .
                    ($borders[$side]['style'] ?? $borderStyle) . ' ' .
                    ($borders[$side]['color'] ?? $borderColor) . ";";
            }
        }
    }

    // Border radius
    if ( isset( $block['attrs']['styles']['form']['radius'] ) ) {
        $radius = $block['attrs']['styles']['form']['radius'];
        if ( is_string( $radius ) ) {
            $css .= "border-radius: $radius;";
        } elseif ( is_array( $radius ) ) {
            $css .= "border-radius: " .
                ($radius['topLeft'] ?? '0') . ' ' .
                ($radius['topRight'] ?? '0') . ' ' .
                ($radius['bottomRight'] ?? '0') . ' ' .
                ($radius['bottomLeft'] ?? '0') . ";";
        }
    }

    $css .= "}";

	$css .= '#loginform .login-username label, #loginform .login-password label{';

	// Text color
    $css .= "color: " . ($block['attrs']['styles']['label']['textColor'] ?? '#000') . ";";

    // Background color
    if ( isset( $block['attrs']['styles']['label']['backgroundColor'] ) ) {
        $css .= "background-color: " . $block['attrs']['styles']['label']['backgroundColor'] . ";";
    }

    // Margin
    $css .= generate_css_property('margin', $block['attrs']['styles']['label']['margin'] ?? '');

    // Padding
    $css .= generate_css_property('padding', $block['attrs']['styles']['label']['padding'] ?? '');

    // Borders
    if ( isset( $block['attrs']['styles']['label']['borders'] ) ) {
        $borders = $block['attrs']['styles']['label']['borders'];
        $borderDefaults = [
            'style' => 'solid'
        ];
        $borderColor = $borders['color'] ?? $borderDefaults['color'];
        $borderWidth = $borders['width'] ?? $borderDefaults['width'];
        $borderStyle = $borders['style'] ?? $borderDefaults['style'];

        $css .= "border: $borderWidth $borderStyle $borderColor;";

        // Handle individual borders
        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            if ( isset( $borders[$side] ) ) {
                $css .= "border-$side: " .
                    ($borders[$side]['width'] ?? $borderWidth) . ' ' .
                    ($borders[$side]['style'] ?? $borderStyle) . ' ' .
                    ($borders[$side]['color'] ?? $borderColor) . ";";
            }
        }
    }

    // Border radius
    if ( isset( $block['attrs']['styles']['label']['radius'] ) ) {
        $radius = $block['attrs']['styles']['label']['radius'];
        if ( is_string( $radius ) ) {
            $css .= "border-radius: $radius;";
        } elseif ( is_array( $radius ) ) {
            $css .= "border-radius: " .
                ($radius['topLeft'] ?? '0') . ' ' .
                ($radius['topRight'] ?? '0') . ' ' .
                ($radius['bottomRight'] ?? '0') . ' ' .
                ($radius['bottomLeft'] ?? '0') . ";";
        }
    }

	$css .= "}";

	$css .= '#loginform .login-username input, #loginform .login-password input{';

	// Text color
    $css .= "color: " . ($block['attrs']['styles']['textField']['textColor'] ?? '#000') . ";";

    // Background color
    if ( isset( $block['attrs']['styles']['textField']['backgroundColor'] ) ) {
        $css .= "background-color: " . $block['attrs']['styles']['textField']['backgroundColor'] . ";";
    }

    // Margin
    $css .= generate_css_property('margin', $block['attrs']['styles']['textField']['margin'] ?? '');

    // Padding
    $css .= generate_css_property('padding', $block['attrs']['styles']['textField']['padding'] ?? '');

    // Borders
    if ( isset( $block['attrs']['styles']['textField']['borders'] ) ) {
        $borders = $block['attrs']['styles']['textField']['borders'];
        $borderDefaults = [
            'style' => 'solid'
        ];
        $borderColor = $borders['color'] ?? $borderDefaults['color'];
        $borderWidth = $borders['width'] ?? $borderDefaults['width'];
        $borderStyle = $borders['style'] ?? $borderDefaults['style'];

        $css .= "border: $borderWidth $borderStyle $borderColor;";

        // Handle individual borders
        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            if ( isset( $borders[$side] ) ) {
                $css .= "border-$side: " .
                    ($borders[$side]['width'] ?? $borderWidth) . ' ' .
                    ($borders[$side]['style'] ?? $borderStyle) . ' ' .
                    ($borders[$side]['color'] ?? $borderColor) . ";";
            }
        }
    }

    // Border radius
    if ( isset( $block['attrs']['styles']['textField']['radius'] ) ) {
        $radius = $block['attrs']['styles']['textField']['radius'];
        if ( is_string( $radius ) ) {
            $css .= "border-radius: $radius;";
        } elseif ( is_array( $radius ) ) {
            $css .= "border-radius: " .
                ($radius['topLeft'] ?? '0') . ' ' .
                ($radius['topRight'] ?? '0') . ' ' .
                ($radius['bottomRight'] ?? '0') . ' ' .
                ($radius['bottomLeft'] ?? '0') . ";";
        }
    }

	$css .= "}";

	$css .= '#loginform .login-submit input{';

	// Text color
    $css .= "color: " . ($block['attrs']['styles']['button']['textColor'] ?? '#000') . ";";

    // Background color
    if ( isset( $block['attrs']['styles']['button']['backgroundColor'] ) ) {
        $css .= "background-color: " . $block['attrs']['styles']['button']['backgroundColor'] . ";";
    }

    // Margin
    $css .= generate_css_property('margin', $block['attrs']['styles']['button']['margin'] ?? '');

    // Padding
    $css .= generate_css_property('padding', $block['attrs']['styles']['button']['padding'] ?? '');

    // Borders
    if ( isset( $block['attrs']['styles']['button']['borders'] ) ) {
        $borders = $block['attrs']['styles']['button']['borders'];
        $borderDefaults = [
            'style' => 'solid'
        ];
        $borderColor = $borders['color'] ?? $borderDefaults['color'];
        $borderWidth = $borders['width'] ?? $borderDefaults['width'];
        $borderStyle = $borders['style'] ?? $borderDefaults['style'];

        $css .= "border: $borderWidth $borderStyle $borderColor;";

        // Handle individual borders
        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            if ( isset( $borders[$side] ) ) {
                $css .= "border-$side: " .
                    ($borders[$side]['width'] ?? $borderWidth) . ' ' .
                    ($borders[$side]['style'] ?? $borderStyle) . ' ' .
                    ($borders[$side]['color'] ?? $borderColor) . ";";
            }
        }
    }

    // Border radius
    if ( isset( $block['attrs']['styles']['button']['radius'] ) ) {
        $radius = $block['attrs']['styles']['button']['radius'];
        if ( is_string( $radius ) ) {
            $css .= "border-radius: $radius;";
        } elseif ( is_array( $radius ) ) {
            $css .= "border-radius: " .
                ($radius['topLeft'] ?? '0') . ' ' .
                ($radius['topRight'] ?? '0') . ' ' .
                ($radius['bottomRight'] ?? '0') . ' ' .
                ($radius['bottomLeft'] ?? '0') . ";";
        }
    }

	$css .= "}";

	$css .= '#loginform .login-remember label input{';

	// Text color
    $css .= "color: " . ($block['attrs']['styles']['checkbox']['textColor'] ?? '#000') . ";";

    // Background color
    if ( isset( $block['attrs']['styles']['checkbox']['backgroundColor'] ) ) {
        $css .= "background-color: " . $block['attrs']['styles']['checkbox']['backgroundColor'] . ";";
    }

    // Margin
    $css .= generate_css_property('margin', $block['attrs']['styles']['checkbox']['margin'] ?? '');

    // Padding
    $css .= generate_css_property('padding', $block['attrs']['styles']['checkbox']['padding'] ?? '');

    // Borders
    if ( isset( $block['attrs']['styles']['checkbox']['borders'] ) ) {
        $borders = $block['attrs']['styles']['checkbox']['borders'];
        $borderDefaults = [
            'style' => 'solid'
        ];
        $borderColor = $borders['color'] ?? $borderDefaults['color'];
        $borderWidth = $borders['width'] ?? $borderDefaults['width'];
        $borderStyle = $borders['style'] ?? $borderDefaults['style'];

        $css .= "border: $borderWidth $borderStyle $borderColor;";

        // Handle individual borders
        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            if ( isset( $borders[$side] ) ) {
                $css .= "border-$side: " .
                    ($borders[$side]['width'] ?? $borderWidth) . ' ' .
                    ($borders[$side]['style'] ?? $borderStyle) . ' ' .
                    ($borders[$side]['color'] ?? $borderColor) . ";";
            }
        }
    }

    // Border radius
    if ( isset( $block['attrs']['styles']['checkbox']['radius'] ) ) {
        $radius = $block['attrs']['styles']['checkbox']['radius'];
        if ( is_string( $radius ) ) {
            $css .= "border-radius: $radius;";
        } elseif ( is_array( $radius ) ) {
            $css .= "border-radius: " .
                ($radius['topLeft'] ?? '0') . ' ' .
                ($radius['topRight'] ?? '0') . ' ' .
                ($radius['bottomRight'] ?? '0') . ' ' .
                ($radius['bottomLeft'] ?? '0') . ";";
        }
    }

	$css .= "}";

    wp_add_inline_style( 'wp-block-library', $css );

    return $block_content;
}

add_action( 'render_block', 'alpc_form_render_block', 200, 2 );

function generate_css_property($property, $value) {
    if (is_string($value)) {
        return "$property: $value;";
    } elseif (is_array($value)) {
        $top = $value['top'] ?? '0';
        $right = $value['right'] ?? '0';
        $bottom = $value['bottom'] ?? '0';
        $left = $value['left'] ?? '0';
        return "$property: $top $right $bottom $left;";
    }
    return '';
}
