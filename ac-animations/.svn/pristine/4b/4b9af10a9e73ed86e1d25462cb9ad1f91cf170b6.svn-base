<?php
// Add the plugin settings page to the WordPress admin under the "Settings" menu
function acanimations_add_settings_page() {
    add_options_page(
        'AC Animations',          // Page Title
        'AC Animations',          // Menu Title
        'manage_options',         // Capability required to access the page
        'ac-animations',          // Menu slug
        'acanimations_settings_page_content'  // Callback function to display the content
    );
}

add_action('admin_menu', 'acanimations_add_settings_page');

// The content of the AC Animations settings page
function acanimations_settings_page_content() {
    // Check if the current tab is set and default to 'settings'
    $active_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'settings';
    ?>
    <div class="wrap acanimations-admin">
        <h1 class="full-width-title">AC Animations</h1>
        <div class="admin-title">
            <h2 class="subtitle"><strong>Animate Conversions</strong><br>Add Animations to your website and increase Conversions.</h2>
        </div>

        <div class="acanimations-container">
            <!-- Sidebar for navigation -->
            <div class="acanimations-sidebar">
                <ul>
                    <li><a href="?page=ac-animations&tab=settings" class="<?php echo esc_attr($active_tab == 'settings' ? 'active' : ''); ?>">Settings</a></li>
                    <li><a href="?page=ac-animations&tab=why-animations" class="<?php echo esc_attr($active_tab == 'why-animations' ? 'active' : ''); ?>">Why Animations?</a></li>
                    <li><a href="?page=ac-animations&tab=license" class="<?php echo esc_attr($active_tab == 'license' ? 'active' : ''); ?>">License</a></li>
                </ul>
            </div>

            <!-- Main content area -->
            <div class="acanimations-content">
                <?php if ($active_tab == 'settings') {
                    acanimations_tab_settings();
                }

                elseif ($active_tab == 'why-animations') {
                    acanimations_tab_why();
                }

                elseif ($active_tab == 'license') {
                    acanimations_tab_license();
                }
                 ?>
            </div>
        </div>
    </div>
    <?php
}
