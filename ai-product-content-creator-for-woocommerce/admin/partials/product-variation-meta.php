<?php
/**
 * Add extra field for product variation
 *
 * @link       https://storepro.io/
 * @since      1.1.0
 * @package    ai-product-content-creator-for-woocommerce
 */
if (!defined('ABSPATH')) {
    die; // Exit if accessed directly
}

// Include the logging functions
require_once SPWAI_PATH . 'includes/logging.php'; 

// Global post variable to get the current product ID and status
global $post;

// Determine if the product is existing by checking its post status
$is_existing_product = isset($post->ID) && get_post_status($post->ID) !== 'auto-draft';

// Fetch title, excerpt, and description for the variation
$title = get_the_title($variation);
$excerpt = get_the_excerpt($variation);
$description = get_post_meta($variation->ID, '_variation_description', true);
?>

<div class="spwai-variation-meta-box spwai-meta-box">
    <h2>AI Product Content Generate</h2>

    <?php if (!empty($description)) : ?>
    <div class="spwai-rewrite-option" style="margin:20px 0px;">
        <input type="checkbox" id="spwai-rewrite-description_<?php echo esc_attr($loop); ?>"
            class="spwai-rewrite-checkbox" data-loop="<?php echo esc_attr($loop); ?>" />
        <label for="spwai-rewrite-description_<?php echo esc_attr($loop); ?>">Use existing description as prompt</label>
    </div>
    <div class="spwai-existing-description" style="display: none;">
        <label>Existing Description:</label>
        <textarea id="spwai-existing-description_<?php echo esc_attr($loop); ?>"
            readonly><?php echo esc_textarea($description); ?></textarea>
    </div>
    <?php endif; ?>

    <label for="spwai-var-prompt_<?php echo esc_attr($loop); ?>" class="spwai-prompt-label">AI Generation Prompt (Use
        product title, SEO keywords or a combination of both along with variation) Product Keywords</label>
    <input type="text" class="spwai-prompt" id="spwai-var-prompt_<?php echo esc_attr($loop); ?>"
        value="<?php echo esc_attr($title . ' (' . $excerpt . ')'); ?>" />

    <div class="spwai-button-container">
        <button type="button" class="spwai-generate" data-loop="<?php echo esc_attr($loop); ?>">Generate</button>
        <div class="spwai-loader" style="display: none;">
            <img src="<?php echo esc_url(SPWAI_URL . 'admin/images/loading.gif'); ?>" alt="Loading...">
        </div>
    </div>

    <div class="spwai-error-message" id="spwai-var-error-message_<?php echo esc_attr($loop); ?>"></div>

    <div class="spwai-output">
        <label for="spwai-var-description_<?php echo esc_attr($loop); ?>">Generated Description:
            <button type="button" class="copy-icon"
                data-copy-target="#spwai-var-description_<?php echo esc_attr($loop); ?>" title="Copy">
                <i class="fa-regular fa-copy"></i>
            </button>
        </label>

        <textarea id="spwai-var-description_<?php echo esc_attr($loop); ?>" class="spwai-description"
            name="spwai_var_description[<?php echo esc_attr($loop); ?>]" rows="4"></textarea>
    </div>

    <?php if ($is_existing_product) : ?>
    <div class="spwai-output">
        <button type="button" data-loop="<?php echo esc_attr($loop); ?>"
            class="spwai-apply button button-primary button-large">Save Data</button>
    </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
(function() {
    // Helper functions for logging
    function logToConsole(message) {
        if (spwai_vars.enableConsoleLog === 'yes') {
            console.log(message);
        }
    }

    function logToErrorLog(message) {
        if (spwai_vars.enableErrorLog === 'yes') {
            console.error(message);
            conditional_log(message); // Log to debug.log if enabled
        }
    }

    logToConsole('Script started');

    function initializeRewriteCheckbox() {
        logToConsole('Initializing rewrite checkbox');
        var checkbox = document.getElementById('spwai-rewrite-description_<?php echo esc_js($loop); ?>');
        var existingDescriptionDiv = document.querySelector('.spwai-existing-description');
        logToConsole('Checkbox element:', checkbox);

        if (checkbox) {
            checkbox.addEventListener('change', function() {
                logToConsole('Checkbox changed');
                var loop = this.getAttribute('data-loop');
                logToConsole('Loop:', loop);
                var promptInput = document.getElementById('spwai-var-prompt_' + loop);
                var existingDescriptionTextarea = document.getElementById('spwai-existing-description_' +
                    loop);

                logToConsole('Prompt input:', promptInput);
                logToConsole('Existing description textarea:', existingDescriptionTextarea);

                if (promptInput && existingDescriptionTextarea) {
                    if (this.checked) {
                        logToConsole('Checkbox is checked');
                        promptInput.value = existingDescriptionTextarea.value.trim();
                        if (existingDescriptionDiv) {
                            existingDescriptionDiv.style.display = 'block';
                        }
                    } else {
                        logToConsole('Checkbox is unchecked');
                        promptInput.value = <?php echo wp_json_encode($title . ' (' . $excerpt . ')'); ?>;
                        if (existingDescriptionDiv) {
                            existingDescriptionDiv.style.display = 'none';
                        }
                    }
                    logToConsole('New prompt value:', promptInput.value);
                } else {
                    logToErrorLog('Failed to find prompt input or existing description textarea');
                }
            });
        } else {
            logToErrorLog('Rewrite checkbox not found');
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeRewriteCheckbox);
    } else {
        initializeRewriteCheckbox();
    }
})();
</script>