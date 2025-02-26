<?php

// Prevent direct access to the file
defined('ABSPATH') || exit;

add_action('admin_enqueue_scripts', function ($hook) {
    error_log('Admin Page Hook: ' . $hook);
});



// Define the setup wizard page content
function autocontent_intro_page() {
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
    
    <div class="intro-container">
            <!-- Header -->
            <h1 class="intro-header">Congratulations! You've got Autocontent</h1>
            
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
                <div class="intro-box left-box">
                    <!--<img src="images/bouncing-robot.gif" alt="Bouncing Robot" class="intro-gif">-->
                    <video width="640" height="360" controls>
                        <source src="images/autocontent.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                
                <!-- Right Box -->
                <div class="intro-box right-box">
                    <p class="intro-text">
                        Thank you for installing Autocontent. <br>
                        Say goodbye to writer's block and say hello to fresh content produced automatically!
                    </p>
                    <div class="button-container">
                        <button class="intro-button" onclick="location.href='admin.php?page=autocontent-setup';">
                            Start First-Time Configuration! →
                        </button>
                    </div>
                </div>
            </div>
        </div>        

    <

    <?php
}





// Enqueue CSS for styling the wizard
add_action('admin_enqueue_scripts', 'autocontent_enqueue_styles');
function autocontent_enqueue_styles($hook) {
    if ($hook === 'toplevel_page_autocontent-setup') {
        wp_enqueue_style('autocontent-setup-style', plugins_url('css/intro-style.css?id=1', __FILE__));
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

