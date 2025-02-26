<?php

/**
 * Shortcode: [aio_redirect]
 * Description: Creates a redirect button with an optional countdown. 
 * You can customize the URL, countdown time, and text displayed before/after the countdown.
 *
 * Example usage:
 * [aio_redirect url="https://youtube.com/" countdown="yes" sec="5" before_text="Redirecting in" after_text="please wait!"]
 * [aio_redirect url="https://youtube.com/" countdown="no" sec="4" before_text="Redirecting in a few moments."]
 *
 * Attributes:
 * - url (required): URL to redirect to.
 * - sec (optional): Seconds before redirect (default 0).
 * - before_text (optional): Text before countdown.
 * - after_text (optional): Text after countdown.
 * - countdown (optional): Show countdown ("yes" or "no").
 * - button_text (optional): Button text (default "Click to Redirect").
 * - new_window (optional): Open URL in new tab ("yes" or "no").
 */


// Enqueue the JS file only if the [aio_redirect] shortcode is used
add_action('wp_enqueue_scripts', 'aiosc_redirect_enqueue_script');

function aiosc_redirect_enqueue_script() {
    // Get the current post object
    $post = get_post();

    // Check if the post object exists and if the shortcode is used
    if ($post && has_shortcode($post->post_content, 'aio_redirect')) {
        // Enqueue the script for countdown functionality
        wp_register_script('aiosc_redirect_js', '', [], null, true);
        wp_enqueue_script('aiosc_redirect_js');
    }
}

// Define the [aio_redirect] shortcode
add_shortcode('aio_redirect', 'aiosc_do_redirect');

function aiosc_do_redirect($atts) {
    ob_start();

    // Define default attributes for the shortcode
    $atts = shortcode_atts(
        array(
            'url' => '',  // URL for redirection
            'sec' => '0',  // Seconds to wait before redirect
            'sec_text' => '', // Custom text after seconds numbers
            'before_text' => '', // Custom before text
            'after_text' => '', // Custom after text
            'countdown' => 'yes', // Display countdown ("yes" or "no")
            'sec_class' => '', // Custom class for the seconds element
            'sec_text_class' => '', // Custom class for the sec_text element
            'before_text_class' => '', // Custom class for the before_text element
            'after_text_class' => '', // Custom class for the after_text element
            'class' => '', // Custom class for the entire shortcode output
        ), $atts, 'aio_redirect'
    );

    // Extract the attributes for easy access
    $myURL = esc_url($atts['url']);
    $mySEC = (int)$atts['sec'];
    $mySECtext = esc_html($atts['sec_text']);
    $mybeforetext = esc_html($atts['before_text']);
    $myafteretext = esc_html($atts['after_text']);
    $show_countdown = ($atts['countdown'] === 'yes');
    $sec_class = esc_attr($atts['sec_class']);
    $sec_text_class = esc_attr($atts['sec_text_class']);
    $before_text_class = esc_attr($atts['before_text_class']);
    $after_text_class = esc_attr($atts['after_text_class']);
    $class = esc_attr($atts['class']);
    
    // Check if URL is empty, and return a message if it is
    if (empty($myURL)) {
        return 'No redirect URL provided.';
    }

    // Output the HTML content for the redirect inside a <span> tag
    ?>
    <span class="<?php echo trim($class); ?>">

    <?php if (!empty($mybeforetext)) : ?>
        <span class="<?php echo $before_text_class; ?>"><?php echo trim($mybeforetext); ?></span>
    <?php endif; ?>

    <?php if ($show_countdown) : ?>
        <span id="countdown" class="<?php echo $sec_class; ?>" data-seconds="<?php echo esc_attr($mySEC); ?>"><?php echo $mySEC; ?></span>
    <?php endif; ?>

    <?php if (!empty($mySECtext)) : ?>
        <span class="<?php echo $sec_text_class; ?>"><?php echo trim($mySECtext); ?></span>
    <?php endif; ?>

    <?php if (!empty($myafteretext)) : ?>
        <span class="<?php echo $after_text_class; ?>"><?php echo trim($myafteretext); ?></span>
    <?php endif; ?>

    </span>

    <?php

    // Add the countdown JavaScript functionality inline
    wp_add_inline_script('aiosc_redirect_js', '
        document.addEventListener("DOMContentLoaded", function () {
            var countdownElem = document.getElementById("countdown");
            var secText = "' . esc_js($mySECtext) . '"; // Dynamically pass sec_text
            var redirectURL = "' . esc_js($myURL) . '"; // Dynamically pass URL
            if (countdownElem) {
                var countdown = parseInt(countdownElem.getAttribute("data-seconds"));
                // Ensure countdown starts immediately after page load
                countdownElem.innerText = countdown ;

                var countdownInterval = setInterval(function () {
                    if (countdown <= 0) {
                        clearInterval(countdownInterval);
                        // Trigger redirect using JavaScript
                        window.location.href = redirectURL;
                    } else {
                        countdownElem.innerText = countdown ; // Add dynamic sec_text
                        countdown--;
                    }
                }, 1000);
            }

            // If countdown is not enabled, directly redirect after the set time
            if ("' . esc_js($atts['countdown']) . '" === "no") {
                // Hide the countdown element if countdown is "no"
                if (countdownElem) {
                    countdownElem.style.display = "none";
                }
                // Redirect after specified time (sec)
                setTimeout(function() {
                    window.location.href = redirectURL;
                }, ' . ($mySEC * 1000) . ');
            }
        });
    ');

    return ob_get_clean();
}
