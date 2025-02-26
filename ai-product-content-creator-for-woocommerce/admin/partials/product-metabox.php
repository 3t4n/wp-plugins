<?php
/**
 * Add Metabox for product
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

$product_title = get_the_title($post->ID);
$is_existing_product = isset($post->ID) && get_post_status($post->ID) !== 'auto-draft';

// Fetch the UPC value
$WC_Product = new WC_Product($post->ID);
$upc = method_exists($WC_Product, 'get_global_unique_id') ? $WC_Product->get_global_unique_id('view') : '';

$target_audience = get_option('spwai_target_audience', 'general audience');
$tone = get_option('spwai_tone', 'neutral');
$style = get_option('spwai_style', 'informative');

?>
<div class="spwai-meta-box">
    <h2 class="nav-tab-wrapper">
        <a href="#tab-generated" class="nav-tab nav-tab-active">Generate New Content</a>
        <?php if ($is_existing_product) : ?>
        <a href="#tab-rewrite" class="nav-tab">Rewrite Existing Content</a> <!-- New tab for rewriting -->
        <?php endif; ?>
    </h2>

    <!-- Generated Tab Content -->
    <div id="tab-generated" class="spwai-tab-content">
        <h3>Generate New Content</h3>
        <label for="spwai-prompt" class="spwai-prompt-label">AI Generation Prompt (Use product title, SEO keywords or a
            combination of both)</label>

        <input type="text" id="spwai-prompt" class="spwai-prompt" name="spwai_prompt"
            value="<?php echo esc_attr($product_title); ?>" />

        <input type="hidden" id="spwai-product-title" value="<?php echo esc_attr($product_title); ?>" />

        <?php // if ($upc) : ?>
        <!-- <div style="padding-bottom:10px;">
            <input type="checkbox" id="spwai-use-upc" />
            <label for="spwai-use-upc">Use UPC as prompt</label></br>
            <input type="hidden" id="spwai-use-upc-value" value="<?php // echo esc_attr($upc); ?>" />
        </div> -->
        <?php // endif; ?>

        <div class="spwai-dropdowns">
            <label for="spwai_target_audience">Target Audience:</label>
            <select id="spwai_target_audience" name="spwai_target_audience">
                <?php
                $audience_options = array(
                    'General Public' => 'General Public',
                    'Professionals' => 'Professionals',
                    'Beginners' => 'Beginners',
                    'Students' => 'Students',
                    'Children' => 'Children',
                    'Tech Enthusiasts' => 'Tech Enthusiasts',
                    'Business Owners' => 'Business Owners',
                    'Academics' => 'Academics',
                    'Gamers' => 'Gamers',
                    'Marketers' => 'Marketers'
                );
                foreach ($audience_options as $key => $option) {
                    $selected = selected($target_audience, $key, false);
                    echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
                }
                ?>
            </select>

            <label for="spwai_tone">Tone:</label>
            <select id="spwai_tone" name="spwai_tone">
                <?php
                $tone_options = array(
                    'Professional' => 'Professional',
                    'Casual' => 'Casual',
                    'Persuasive' => 'Persuasive',
                    'Humorous' => 'Humorous',
                    'Inspiring' => 'Inspiring',
                    'Serious' => 'Serious',
                    'Empathetic' => 'Empathetic',
                    'Optimistic' => 'Optimistic',
                    'Witty' => 'Witty',
                    'Educational' => 'Educational'
                );
                foreach ($tone_options as $key => $option) {
                    $selected = selected($tone, $key, false);
                    echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
                }
                ?>
            </select>

            <label for="spwai_style">Style:</label>
            <select id="spwai_style" name="spwai_style">
                <?php
                $style_options = array(
                    'Descriptive' => 'Descriptive',
                    'Concise' => 'Concise',
                    'Storytelling' => 'Storytelling',
                    'Technical' => 'Technical',
                    'Conversational' => 'Conversational',
                    'Persuasive' => 'Persuasive',
                    'Poetic' => 'Poetic',
                    'Journalistic' => 'Journalistic',
                    'Analytical' => 'Analytical',
                    'Satirical' => 'Satirical'
                );
                foreach ($style_options as $key => $option) {
                    $selected = selected($style, $key, false);
                    echo '<option value="' . esc_attr($key) . '" ' . esc_attr($selected) . '>' . esc_html($option) . '</option>';
                }
                ?>
            </select>
            <button type="button" id="spwai-save-settings" class="button button-primary">Save</button>
        </div>

        <div class="spwai-button-container">
            <button type="button" id="spwai-generate" class="spwai-generate">Generate</button>
            <div id="spwai-loader" class="spwai-loader" style="display: none;">
                <img src="<?php echo esc_url(SPWAI_URL . 'admin/images/loading.gif'); ?>" alt="Loading...">
            </div>
        </div>

        <div class="spwai-error-message" id="spwai-error-message"></div>

        <div class="spwai-output">
            <label><b>Generated Outputs</b></label>
        </div>

        <!-- Output Data -->
        <div class="spwai-output">
            <input type="checkbox" id="spwai-check-title" checked />
            <label for="spwai-check-title">Title: <button type="button" class="copy-icon"
                    data-copy-target="#spwai-title"
                    title="<?php echo !$is_existing_product ? 'You have to manually copy and paste this on appropriate fields' : 'Copy'; ?>"><i
                        class="fa-regular fa-copy"></i></button></label>
            <input type="text" id="spwai-title" name="spwai_title" />
        </div>
        <div class="spwai-output">
            <input type="checkbox" id="spwai-check-description" checked />
            <label for="spwai-check-description">Description: <button type="button" class="copy-icon"
                    data-copy-target="#spwai-description"
                    title="<?php echo !$is_existing_product ? 'You have to manually copy and paste this on appropriate fields' : 'Copy'; ?>"><i
                        class="fa-regular fa-copy"></i></button></label>
            <textarea id="spwai-description" name="spwai_description" rows="8"></textarea>
        </div>
        <div class="spwai-output">
            <input type="checkbox" id="spwai-check-shortdescription" checked />
            <label for="spwai-check-shortdescription">Short Description: <button type="button" class="copy-icon"
                    data-copy-target="#spwai-shortdescription"
                    title="<?php echo !$is_existing_product ? 'You have to manually copy and paste this on appropriate fields' : 'Copy'; ?>"><i
                        class="fa-regular fa-copy"></i></button></label>
            <textarea id="spwai-shortdescription" name="spwai_shortdescription" rows="5"></textarea>
        </div>
        <input type="hidden" name="spwai_nonce" id="spwai-nonce"
            value="<?php echo esc_attr(wp_create_nonce('spwai_nonce')); ?>" />

        <!-- Apply Button -->
        <div class="spwai-output">
            <?php if ($is_existing_product) : ?>
            <button type="button" id="spwai-apply" class="button button-primary button-large">Save Generated
                Values</button>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($is_existing_product) : ?>
    <!-- Rewrite Tab Content -->
    <div id="tab-rewrite" class="spwai-tab-content" style="display:none;">
        <h3>Rewrite Existing Content</h3>

        <!-- Radio Buttons to Select Title, Description, or Short Description -->
        <?php  if(!empty(get_the_title($post->ID))){ ?>
        <label>
            <input type="radio" name="rewrite_field" value="title" />
            <?php esc_html_e('Title', 'ai-product-content-creator-for-woocommerce'); ?><br />
        </label><br />
        <?php    }else{
            echo "Title is empty";echo "</br>";
         }  ?>
        <?php  if(!empty(get_the_content(null, false, $post->ID))){ ?>
        <label>
            <input type="radio" name="rewrite_field" value="description" />
            <?php esc_html_e('Description', 'ai-product-content-creator-for-woocommerce'); ?><br />
        </label><br />
        <?php    }else{
            echo "Description is empty";
            echo "</br>";
         }  ?>
        <?php  if(!empty(get_post_field("post_excerpt", $post->ID))){ ?>

        <label>
            <input type="radio" name="rewrite_field" value="shortdescription" />
            <?php esc_html_e('Short Description', 'ai-product-content-creator-for-woocommerce'); ?><br />
        </label><br />
        <?php    }else{
            echo "Short Description is empty";echo "</br>";
         }  ?>


        <div id="current-content"></div>
        <input type="hidden" name="spwai_nonce" id="spwai_nonce"
            value="<?php echo esc_attr(wp_create_nonce('spwai_nonce')); ?>" />

        <br><input type="button" class="button"
            value="<?php esc_html_e('Rewrite', 'ai-product-content-creator-for-woocommerce'); ?>"
            id="spwai-rewrite-button" />
        <div id="new-content"></div>
        </br><input type="button" class="button-primary"
            value="<?php esc_html_e('Save', 'ai-product-content-creator-for-woocommerce'); ?>" id="spwai-save-button"
            style="display:none;" />
    </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
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

    // Handle tab switching
    $('.nav-tab').click(function(e) {
        e.preventDefault();
        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');

        $('.spwai-tab-content').hide();
        $($(this).attr('href')).show();
    });

    function typeWriterEffect(element, text, delay = 5) {
        let i = 0;
        element.val(''); // Clear the textarea before typing

        function type() {
            if (i < text.length) {
                element.val(element.val() + text.charAt(i)); // Append each character
                i++;
                setTimeout(type, delay); // Call the function again after the delay
            }
        }
        type(); // Start typing
    }

    // Handle the rewrite button click event
    function rewrite_text_from_openai() {
        var nonce = spwai_vars.nonce;
        var postId = spwai_vars.post_id;
        var ajaxurl = spwai_vars.ajaxurl;

        let selectedField = $('input[name="rewrite_field"]:checked').val();
        if (!selectedField) {
            alert('Please select a field to rewrite.');
            logToErrorLog('No field selected for rewriting.');
            return;
        }

        let currentContent = '';
        if (selectedField === 'title') {
            currentContent = '<?php echo esc_js(get_the_title($post->ID)); ?>';
            $('#current-content').html('</br><label><b>Current Title:</b></label><p>' + currentContent +
            '</p>');
        } else if (selectedField === 'description') {
            currentContent = '<?php echo esc_js(get_the_content(null, false, $post->ID)); ?>';
            $('#current-content').html('</br><label><b>Current Description:</b></label><p>' + currentContent +
                '</p>');
        } else if (selectedField === 'shortdescription') {
            currentContent = '<?php echo esc_js(get_post_field("post_excerpt", $post->ID)); ?>';
            $('#current-content').html('</br><label><b>Current Short Description:</b></label><p>' +
                currentContent + '</p>');
        }

        logToConsole(`Rewriting content for field: ${selectedField}`);

        $('#spwai-loader').show(); // Show loader

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            dataType: 'json',
            data: {
                action: 'spwai_generate_new_content',
                current_content: currentContent,
                field: selectedField,
                post_id: postId,
                security: nonce
            },
            beforeSend: function() {
                $('#spwai-loader').show();
                $('#spwai-error-message').html('');
                logToConsole('Sending AJAX request to generate new content.');
            },
            success: function(response) {
                if (response.success) {
                    if (response.data.new_content && response.data.new_content.message) {
                        let newText = response.data.new_content.message;
                        $('#new-content').html('</br><label><b>New ' + selectedField.charAt(0)
                            .toUpperCase() + selectedField.slice(1) +
                            ':</b></label></br></br><textarea rows="10" cols="120" id="new-content-textarea"></textarea>'
                            );
                        let textarea = $('#new-content-textarea');
                        typeWriterEffect(textarea, newText, 5);
                        logToConsole(`New content generated for field: ${selectedField}`);
                    } else {
                        $('#spwai-error-message').html('Error: New content is missing or invalid.');
                        logToErrorLog('New content is missing or invalid.');
                    }
                    $('#spwai-save-button').show();
                } else {
                    $('#spwai-error-message').html(response.data.message ||
                        'Error generating new content.');
                    logToErrorLog(response.data.message || 'Error generating new content.');
                }
                $('#spwai-loader').hide();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#spwai-error-message').html('Error: Unable to fetch data.');
                $('#spwai-loader').hide();
                logToErrorLog(`AJAX error: ${textStatus}, ${errorThrown}`);
            }
        });
    }

    $('#spwai-rewrite-button').on('click', function() {
        rewrite_text_from_openai();
    });

    $('#spwai-save-button').on('click', function() {
        let newContent = $('#new-content-textarea').val();
        let selectedField = $('input[name="rewrite_field"]:checked').val();

        $.post(ajaxurl, {
            action: 'spwai_save_new_content',
            field: selectedField,
            new_content: newContent,
            post_id: spwai_vars.post_id,
            security: spwai_ajax.nonce
        }, function(response) {
            if (response.success) {
                alert('Content saved successfully!');
                logToConsole('Content saved successfully.');
                location.reload();
            } else {
                alert('Error saving content.');
                logToErrorLog('Error saving content.');
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert('Error during save request.');
            logToErrorLog(`Error during save request: ${textStatus}, ${errorThrown}`);
        });
    });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#spwai-save-settings').on('click', function() {
        var targetAudience = $('#spwai_target_audience').val();
        var tone = $('#spwai_tone').val();
        var style = $('#spwai_style').val();

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'spwai_update_customization_settings',
                target_audience: targetAudience,
                tone: tone,
                style: style,
                nonce: '<?php echo wp_create_nonce('spwai_nonce'); ?>'
            },
            success: function(response) {
                if (response.success) {
                    alert('Settings saved successfully!');
                } else {
                    alert('Error saving settings.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error during save request: ' + textStatus + ', ' + errorThrown);
            }
        });
    });
});
</script>