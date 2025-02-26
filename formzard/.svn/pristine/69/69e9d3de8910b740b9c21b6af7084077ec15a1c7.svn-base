<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/*
 * Adds a CodeMirror-based Custom CSS Panel with auto-completion for closing tags,
 * saves the custom CSS to post meta, and injects it inline after the form HTML.
 */

/*
 * Sets up the Custom CSS Editor inside our new panel.
 * @param WPCF7_ContactForm $post - modified post type object from Contact Form 7 containing information about the current contact form.
 */
function wpcf7_custom_css_panel($post) {
    // Check if the user has access to premium features
    // if ( function_exists( 'for_fs' ) && ! for_fs()->can_use_premium_code() ) {
    //     return; // Do not add the meta box if the user doesn't have a premium license
    // }
    // Add a nonce field for security.
    wp_nonce_field('wpcf7_custom_css_nonce', 'wpcf7_custom_css_nonce_field');

    // Retrieve the saved CSS code.
    $custom_css = get_post_meta($post->id(), 'wpcf7_custom_css', true);
    if ( for_fs()->is_not_paying() ) {
        // Adds a marketing sections with a link to in-dashboard pricing page.
        echo '<div><h2>Custom CSS Editor is an Awesome Feature</h2>';
        echo sprintf( '<a href="%s">Upgrade Now!</a>', for_fs()->get_upgrade_url() );
        echo '</div>';
    } else {
        ?>
        <h2><?php echo esc_html(__('Custom CSS Editor', 'contact-form-7')); ?></h2>
        <fieldset>
            <legend><?php echo esc_html(__('Write custom CSS rules to style this form specifically.', 'contact-form-7')); ?></legend>
            <textarea id="wpcf7-custom-css" name="wpcf7-custom-css" rows="10" style="width: 100%;"><?php echo esc_textarea($custom_css); ?></textarea>
        </fieldset>
        <style>
            #wpcf7-custom-css {
                visibility: hidden;
                position: absolute;
            }
            .CodeMirror {
                height: auto;
                border: 1px solid #ddd;
                font-size: 14px;
            }
        </style>
        <?php
    }
}

/*
 * Adds our new Custom CSS Editor panel to the Contact Form 7 editor screen.
 * @param array $panels - an array of all the panels currently displayed on the Contact Form 7 edit screen.
 */
function add_cf7_css_panel($panels) {
    $panels['custom-css'] = array(
        'title' => __('Custom CSS', 'contact-form-7'),
        'callback' => 'wpcf7_custom_css_panel',
    );
    return $panels;
}
add_filter('wpcf7_editor_panels', 'add_cf7_css_panel');

/*
 * Hooks into the save_post method and saves the custom CSS to the post meta.
 * @param int $post_id - post ID of the current post being saved.
 */
function save_wpcf7_custom_css($post_id) {
    // Check if the user has access to premium features
    if ( function_exists( 'for_fs' ) && ! for_fs()->can_use_premium_code() ) {
        return; // Do not add the meta box if the user doesn't have a premium license
    }

    // Verify nonce.
    if (!isset($_POST['wpcf7_custom_css_nonce_field']) || !wp_verify_nonce($_POST['wpcf7_custom_css_nonce_field'], 'wpcf7_custom_css_nonce')) {
        return;
    }

    // Check if this is an autosave.
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check if the current user can edit the post.
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the custom CSS.
    if (isset($_POST['wpcf7-custom-css'])) {
        $custom_css = wp_strip_all_tags($_POST['wpcf7-custom-css']); // Sanitize CSS.
        update_post_meta($post_id, 'wpcf7_custom_css', $custom_css);
    }
}
add_action('save_post', 'save_wpcf7_custom_css');

/*
 * Enqueue CodeMirror and initialize it for the Custom CSS field with auto-completion enabled.
 */
function enqueue_codemirror_editor() {
    // Enqueue CodeMirror styles and scripts from WordPress core.
    wp_enqueue_script('code-editor');
    wp_enqueue_style('code-editor');

    // Custom script to initialize CodeMirror on our textarea with auto-completion for CSS and tag completion.
    wp_add_inline_script('code-editor', "
        document.addEventListener('DOMContentLoaded', function () {
            var textarea = document.getElementById('wpcf7-custom-css');
            if (textarea) {
                wp.codeEditor.initialize(textarea, {
                    codemirror: {
                        mode: 'css',
                        lineNumbers: true,
                        indentUnit: 2,
                        tabSize: 2,
                        theme: 'default',
                        autoCloseTags: true,  // Automatically close tags (for HTML-like tags).
                        autoCloseBrackets: true, // Automatically close curly braces and parentheses.
                        hintOptions: {
                            completeSingle: false
                        }
                    }
                });
            }
        });
    ");
}
add_action('admin_enqueue_scripts', 'enqueue_codemirror_editor');

function inject_custom_css_after_form($content) {
    // Get the global $contact_form
    $contact_form = WPCF7_ContactForm::get_current();

    // Ensure $contact_form is available
    if ( ! $contact_form instanceof WPCF7_ContactForm ) {
        return $content;
    }

    // Get the form ID
    $form_id = $contact_form->id();

    // Retrieve the custom CSS for this form
    $custom_css = get_post_meta($form_id, 'wpcf7_custom_css', true);

    if ($custom_css) {
        // Wrap the custom CSS in a <style> tag with a unique ID based on the form ID
        $style_tag = sprintf('<style id="wpcf7-form-id-%d">%s</style>', $form_id, wp_strip_all_tags($custom_css));

        // Append the style tag after the form content
        $content .= $style_tag;
    }

    return $content;
}

// Hook into 'wpcf7_form_elements' to inject custom CSS after the form content
add_filter('wpcf7_form_elements', 'inject_custom_css_after_form', 10, 1);