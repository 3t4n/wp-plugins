<?php

// Prevent direct access to the file
defined('ABSPATH') || exit;

add_action('admin_enqueue_scripts', function ($hook) {
    error_log('Admin Page Hook: ' . $hook);
});



// Define the setup wizard page content
function autocontent_setup_wizard_page() {
    
     // Handle navigation (intro or setup based on query parameter or form submission)
    $current_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'setup';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['autocontent_setup_complete'])) {
            // Check if activation key is set, or set a default
            $activation_key = isset($_POST['activation_key']) ? sanitize_text_field($_POST['activation_key']) : '';
            update_option('autocontent_activation_key', $activation_key);
    
            // Check if keywords are set and handle properly
            $keywords = isset($_POST['keywords']) && is_array($_POST['keywords']) ? array_map('sanitize_text_field', $_POST['keywords']) : [];
            update_option('autocontent_keywords', $keywords);
    
            // Check if tone is set, or set a default
            $tone = isset($_POST['tone']) ? sanitize_text_field($_POST['tone']) : '';
            update_option('autocontent_tone', $tone);
    
            // Check if image type is set, or set a default
            $image_type = isset($_POST['image_type']) ? sanitize_text_field($_POST['image_type']) : '';
            update_option('autocontent_image_type', $image_type);
    
            // Mark the setup wizard as completed
            update_option('autocontent_setup_completed', true);
    
            // Redirect to the plugin settings page
            autocontent_custom_log('Setup Completed Option Updated: ' . (get_option('autocontent_setup_completed') ? 'Yes' : 'No'));
            wp_redirect(admin_url('admin.php?page=autocontent-settings'));
            exit;
        }

    ?>
     <!-- Banner Section -->
    <div class="autocontent-banner" style="position: relative; padding: 20px; background-color: #f8f8f8; border: 1px solid #ddd; overflow: hidden;">
        <?php
            $plugin_url = plugins_url('images/logo-retina.png', __FILE__);
        ?>
        <img src="<?php echo esc_url($plugin_url); ?>" alt="Logo" style="max-width: 200px; border: 1px solid #fff; border-radius: 5px; float: left; margin-right: 20px;">
        <div style="float: left;">
            <h1 style="font-weight: bold; font-size: 24px;"></h1>
        </div>
        <div style="clear: both;"></div> <!-- Clear float to ensure proper layout -->
        
    </div>
    
    <div class="wrap">
        
       

        <div class="tab-content">
            <?php
            if ($current_tab === 'intro') {
                autocontent_render_intro();
            } elseif ($current_tab === 'setup') {
                autocontent_render_setup();
            }
            ?>
        </div>
    </div>
        
        
   

    <?php
}

function autocontent_render_intro() {
    ?>
    <div class="wrap"> 
     <div class="intro-container">
            <!-- Header -->
            <h1 class="intro-header">CONGRATULATIONS. You've got Autocontent!</h1>
            
            <!-- Progress Line -->
            <div class="progress-line">
                <div class="progress-circle completed">✓</div>
                <div class="progress-bar"></div>
                <div class="progress-circle incomplete">
                    <div class="progress-inner-circle"></div>
                </div>
            </div>
        
            <!-- Boxes -->
            <div class="intro-boxes">
                <!-- Left Box -->
                <div class="intro-box left-box" style="align-items: center; ">
                    <div class="animation-container">
                        <div class="robot"></div>
                        <div class="base"></div>
                    </div>
                </div>
                
                <!-- Right Box -->
                <div class="intro-box right-box">
                    <p class="intro-text">
                        <br />
                        <span style="font-size: 32px;">THANK YOU FOR INSTALLING AUTOCONTENT!</span>
                        <br />
                        <br />
                        <br />
                        <span style="font-size: 28px; font-weight: normal; line-height: 1.0;">Welcome to the world of automatically generating fresh, engaging content! <br />
                            Click below to get started.</span>
                    </p>
                    <!--<div class="button-container">-->
                    <!--    <button class="intro-button" onclick="location.href='admin.php?page=autocontent-setup&tab=setup';">-->
                    <!--        <span style="width: 50%;">Go to Setup Wizard</span><br/>-->
                    <!--        <span style="width: 50%;">→</span>-->
                    <!--    </button>-->
                    <!--</div>-->
                    <div class="button-container">
                        <button class="intro-button" onclick="location.href='admin.php?page=autocontent-setup&tab=setup';">
                            Proceed to Setup Wizard
                        </button>
                    </div>
                </div>
            </div>
        </div>  
       </div>
<?php
}


function autocontent_render_setup() {
    ?>
     <div class="wrap">
        <h1>
            <center><strong><span style="font-size: 1.6em;">Welcome to the Setup Wizard</span></strong></center>
        </h1>
        <div class="wizard-box">
            <h2>
                <!--<strong>Setup Wizard</strong> &nbsp;&nbsp;&nbsp;-->
                <center><span style="font-size: 1.3em; color: #006E9C;">Get Autocontent working beautifully and make your first post!</span></center>
            </h2>
            <br />
            <div id="wizardActivationStatus" style="display: none; margin-top: 10px;"></div>
            
            <div class="wizard-container">
                <!-- Step 1 -->
                <div class="wizard-step active" id="step-1">
                    <div class="wizard-step-marker">
                        <div class="circle"></div>
                        <div class="line"></div>
                    </div>
                    <div class="wizard-step-content">
                        <h2 style="display:inline;">Step 1: Activation Key
                        <span class="info-bubble" tabindex="0" aria-label="More information">
                            <div class="info-icon">?</div>
                            <div class="info-tooltip">
                                <span>You can get your <strong>Activation Key</strong> in two ways:</span>
                                <ul>
                                    <li><strong>FREE PLAN:</strong> When you activated your plugin, we populated here an Activation Key for the Free Plan.</li>
                                    <li><strong>PREMIUM PLAN:</strong> When you purchase a Premium Plan, an activation key is emailed to you, or you can also find it in your <a href="https://autocontent.com/dashboard/" target="_blank">dashboard</a>.</li>
                                </ul>
                            </div>
                        </span>
                    </h2>
                        <form id="step-1-form">
                            <input type="text" id="autocontent_activation_key" name="autocontent_activation_key" required
                                value="<?php echo esc_attr(get_option('autocontent_activation_key')); ?>" >
                            <button type="button" id="step-1-continue" class="button button-primary">Verify</button>
                        </form>
                    </div>
                    <div id="wizardActivationStatus" style="display: none; margin-top: 10px;"></div>
                </div>

                <!-- Step 2 -->
                <div class="wizard-step disabled" id="step-2">
                    <div class="wizard-step-marker">
                        <div class="circle"></div>
                        <div class="line"></div>
                    </div>
                    <div class="wizard-step-content">
                        <h2>Step 2: Enter a topic</h2>
                        <form id="step-2-form" style="display: none;">
                            <input type="text" id="autocontent_subject" name="autocontent_subject" class="wide-input" placeholder="Enter a subject" required value="<?php echo esc_attr(get_option('autocontent_subject')); ?>" >
                            <button type="button" class="button button-primary" onclick="goToNextStep(2)">Continue</button>
                        </form>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="wizard-step disabled" id="step-3">
                    <div class="wizard-step-marker">
                        <div class="circle"></div>
                        <div class="line"></div>
                    </div>
                    <div class="wizard-step-content">
                        <h2>Step 3: Enter Keywords <span style="font-size: 13px; font-weight: normal;">(at least 1)</span></h2>
                        <form id="step-3-form" style="display: none;">
                            <input type="text" name="autocontent_keyword_1" placeholder="Keyword 1" required
                                value="<?php echo esc_attr(get_option('autocontent_keyword_1')); ?>">
                            <input type="text" name="autocontent_keyword_2" placeholder="Keyword 2"
                                value="<?php echo esc_attr(get_option('autocontent_keyword_2')); ?>">
                            <input type="text" name="autocontent_keyword_3" placeholder="Keyword 3"
                                value="<?php echo esc_attr(get_option('autocontent_keyword_3')); ?>">
                            <input type="text" name="autocontent_keyword_4" placeholder="Keyword 4"
                                value="<?php echo esc_attr(get_option('autocontent_keyword_4')); ?>">
                            <input type="text" name="autocontent_keyword_5" placeholder="Keyword 5"
                                value="<?php echo esc_attr(get_option('autocontent_keword_5')); ?>">
                            <button type="button" class="button button-primary" onclick="goToNextStep(3)">Continue</button>
                        </form>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="wizard-step disabled" id="step-4">
                    <div class="wizard-step-marker">
                        <div class="circle"></div>
                        <div class="line"></div>
                    </div>
                    <div class="wizard-step-content">
                        <h2>Step 4: Select Tone</h2>
                        <form id="step-4-form" style="display: none;">
                            <select name="autocontent_tone" required>
                                <?php
                                // Retrieve the saved option from the database
                                $saved_tone = get_option('autocontent_tone', ''); // Default to an empty string if not set
                    
                                // List of options
                                $tones = [
                                    'Friendly or Approachable',
                                    'Optimistic or Positive',
                                    'Persuasive',
                                    'Educational',
                                    'Reflective or Thoughtful',
                                    'Narrative or Storytelling',
                                    'Concise or Summarized',
                                    'Formal or Business',
                                    'Empathetic',
                                    'Instructive',
                                ];
                    
                                // Generate the options dynamically
                                foreach ($tones as $tone) {
                                    $selected = ($saved_tone === $tone) ? 'selected="selected"' : '';
                                    echo '<option value="' . esc_attr($tone) . '" ' . $selected . '>' . esc_html($tone) . '</option>';
                                }
                                ?>
                            </select>
                            <button type="button" class="button button-primary" onclick="goToNextStep(4)">Continue</button>
                        </form>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="wizard-step disabled" id="step-5">
                    <div class="wizard-step-marker">
                        <div class="circle"></div>
                        <div class="line"></div>
                    </div>
                    <div class="wizard-step-content">
                        <h2>Step 5: Select Image Style</h2>
                        <form id="step-5-form" style="display: none;">
                            <select name="autocontent_image_style" required>
                                <?php
                                // Retrieve the saved option from the database
                                $saved_image_style = get_option('autocontent_image_style', ''); // Default to an empty string if not set
                    
                                // List of image styles
                                $image_styles = [
                                    'Photo',
                                    'Fantasy',
                                    'Anime',
                                    'Comic book',
                                    'Cyberpunk',
                                    'Surrealism',
                                    'Pixel art',
                                    'Abstract art',
                                    'Minimalistic',
                                    'Watercolor'
                                ];
                                // $image_styles = [
                                //     'Photo',
                                //     'Fantasy',
                                //     'Abstract art',
                                //     'Pixel art',
                                //     'Anime',
                                //     'Neon punk',
                                //     'Comic book',
                                //     'Rococo Pop',
                                //     'Surrealism',
                                //     'Psychedelic',
                                //     'Glitch art',
                                //     'Watercolor',
                                //     'Cyberpunk',
                                //     'Impressionism',
                                //     'Minimalistic',
                                //     'Renaissance art',
                                //     'Street art',
                                //     'Woodcut print',
                                //     'Stencil',
                                //     'Pointillism',
                                // ];
                    
                                // Generate the options dynamically
                                foreach ($image_styles as $style) {
                                    $selected = ($saved_image_style === $style) ? 'selected="selected"' : '';
                                    echo '<option value="' . esc_attr($style) . '" ' . $selected . '>' . esc_html($style) . '</option>';
                                }
                                ?>
                            </select>
                            <button type="button" class="button button-primary" onclick="completeSetup()">Finish</button>
                        </form>
                    </div>
                </div>
                
                <div id="wizard-completion-buttons" style="display: none; margin-left: 40px; margin-top: 20px; width: 90%;">
                    <br/>
                    <div class="completion-buttons-container">
                        <button id="generate-post-button" class="button button-primary completion-button">Generate Post</button>
                        <button id="reset-wizard-button" class="button button-secondary completion-button">Start Over</button>
                    </div>
                    <span>This takes a moment — but it will be worth the wait!</span>
                    <br /><br />
                    <a href="" id="goto-settings-link">Go to Autocontent Settings Page</a>
                </div>
            </div>
        </div>
    </div>

    <div class="wrap">
        <div class="wizard-box">
            <div class="wizard-footer">
                <h3>Need Assistance?</h3>
                <p>Follow the steps above to complete your setup. If you need further help, contact us at <a href="mailto:support@autocontent.com">support@autocontent.com</a>.</p>
                <p>You can also modify these settings later in the <a href="admin.php?page=autocontent-settings">plugin settings page</a>.</p>
            </div>
        </div>
    </div>
    <?php
}



// Enqueue JavaScript for the accordion functionality
add_action('admin_enqueue_scripts', 'autocontent_enqueue_scripts');
function autocontent_enqueue_scripts($hook) {
    if ($hook === 'toplevel_page_autocontent-setup') {
        wp_enqueue_script('autocontent-setup-script', plugins_url('js/setup-wizard.js?id=3', __FILE__), ['jquery'], null, true);
    }
}

// Enqueue CSS for styling the wizard
add_action('admin_enqueue_scripts', 'autocontent_enqueue_styles');
function autocontent_enqueue_styles($hook) {
    if ($hook === 'toplevel_page_autocontent-setup') {
        wp_enqueue_style('autocontent-intro-style', plugins_url('css/intro-style.css?id=3', __FILE__));
        wp_enqueue_style('autocontent-setup-style', plugins_url('css/setup-style.css?id=3', __FILE__));
    }
}

/**
 * Log messages to a custom error_log.txt file in the plugin directory.
 *
 * @param string $message The message to log.
 */
function autocontent_custom_log($message) {
    $log_file = plugin_dir_path(__FILE__) . 'error_log.txt';
    $formatted_message = "[" . date("Y-m-d H:i:s") . "] " . $message . PHP_EOL;
    
    // Append the message to the log file
    file_put_contents($log_file, $formatted_message, FILE_APPEND);
}
