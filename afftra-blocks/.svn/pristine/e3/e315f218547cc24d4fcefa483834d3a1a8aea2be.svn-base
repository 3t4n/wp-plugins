<?php 
/**
 * Dashboard Class 
 */

if( ! defined('ABSPATH') ) {
    exit;
}

class Afftra_Dashboard {

    public function __construct() {
        // Hook to add menu item in admin dashboard
        add_action('admin_menu', array($this, 'add_menu'));
        // Hook to enqueue admin scripts and styles
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        // Hook to handle user redirection after plugin activation
        add_action('admin_init', array($this, 'user_redirect'));
    }

    /**
     * Add menu item to the WordPress admin dashboard
     */
    public function add_menu() {
        add_menu_page(
            __('Afftra', 'afftra-blocks'),
            __('Afftra', 'afftra-blocks'),
            'manage_options',
            'afftra_dashboard',
            array($this, 'dashboard_page'),
            'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzQiIGhlaWdodD0iMjQiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTkuMzQ1IDUuMTIuNzM0LTEuNDk3Yy43MjgtMS40ODYgMi44NDItMS40OTYgMy41ODMtLjAxN2w4LjY4NiAxNy4zMjFhMiAyIDAgMCAxLTEuNzg4IDIuODk3aC0xLjY3YTIgMiAwIDAgMS0xLjc5NS0xLjEyTDkuMzQ1IDYuODhhMiAyIDAgMCAxIDAtMS43NnpNMjkuNzkzIDBIMTguMjQ3Yy0xLjQ5NCAwLTIuNDYxIDEuNTgtMS43OCAyLjkxbC40MzUuODUzYTIgMiAwIDAgMCAxLjc4MSAxLjA5aDEwLjQxNWEyIDIgMCAwIDAgMS41NS0uNzM3bC42OTUtLjg1M0MzMi40MDcgMS45NTYgMzEuNDc3IDAgMjkuNzkzIDB6TTI2LjQ4NiA5Ljc5NGgtMy4zNzhjLTEuNTE0IDAtMi40OCAxLjYxNy0xLjc2IDIuOTVsLjUwNy45NGEyIDIgMCAwIDAgMS43NiAxLjA1MWgyLjg3MmEyIDIgMCAwIDAgMi0ydi0uOTRhMiAyIDAgMCAwLTItMnpNNS40OTMgMTIuODUgMS40NSAyMS4wNThjLS42NjIgMS4zNDMuMzMzIDIuOTEgMS44MyAyLjg4NGw4LjEzNy0uMTQ4YTIgMiAwIDAgMCAxLjc0Ny0yLjkwNWwtNC4wOTQtOC4wNmMtLjc0Ni0xLjQ2OC0yLjg0OS0xLjQ1NS0zLjU3Ny4wMjN6IiBmaWxsPSIjMTk2N0ZGIi8+PC9zdmc+',
            50
        );
    }

    /**
     * Enqueue admin scripts and styles
     *
     * @param string $screen The current admin screen
     */
    public function enqueue_scripts($screen) {
        if ('toplevel_page_afftra_dashboard' !== $screen) {
            return;
        }
        wp_enqueue_style('afftra-dashboard', AFFTRA_URL_FILE . 'inc/dashboard/assets/css/dashboard.css', array(), '1.0.0', 'all');
    }

    /**
     * Render the dashboard page
     */
    public function dashboard_page() {
        ?>
        <div id="afftra-dashboard">
            <div class="header">
                <div class="container">
                    <div class="inner-header">
                        <div class="logo">
                            <svg width="45" height="45" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="45" height="45" rx="22.5" fill="#1967FF"/><path d="m15.581 15.936.499-1.06c.717-1.524 2.881-1.534 3.612-.016l7.718 16.03a2 2 0 0 1-1.802 2.868h-1.177a2 2 0 0 1-1.81-1.15l-7.04-14.97a2 2 0 0 1 0-1.702zM34.014 11.074H23.935a2 2 0 0 0-1.795 2.882l.305.62a2 2 0 0 0 1.795 1.119h9.289a2 2 0 0 0 1.575-.768l.485-.62c1.027-1.314.092-3.233-1.575-3.233zM31.075 20.4h-2.693c-1.5 0-2.465 1.588-1.776 2.92l.365.704a2 2 0 0 0 1.776 1.08h2.328a2 2 0 0 0 2-2V22.4a2 2 0 0 0-2-2zM11.888 23.659 8.411 31.01a2 2 0 0 0 1.845 2.855l7-.132a2 2 0 0 0 1.759-2.877l-3.522-7.219c-.735-1.507-2.888-1.494-3.605.022z" fill="#fff"/></svg>
                            <div class="logo-title">
                                <?php echo esc_html('Affiliate Marketing Blocks', 'afftra-blocks'); ?>
                            </div>
                        </div>
                        <div class="header-info">
                            <button class="version">
                                <?php echo esc_html('Version 1.1.0', 'afftra-blocks'); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body-area">
                <div class="container">
                    <div class="welcome-area">
                        <div class="welcome-text">
                            <h2 class="welcome-title">
                                <?php echo esc_html('Welcome to Afftra Blocks', 'afftra-blocks'); ?>
                            </h2>
                            <p class="welcome-desc">
                                <?php echo esc_html("A powerful collection of custom Gutenberg blocks designed to help you showcase affiliate products in a sleek, modern, and eye-catching style directly within the WordPress editor.", 'afftra-blocks'); ?>
                            </p>
                            <a href="https://gutenbergkits.com/contact" target="_blank" class="share-idea-btn">
                                <?php echo esc_html('Get Started', 'afftra-blocks'); ?>
                            </a>
                        </div>
                        <div class="welcome-msg">
                            <div class="welcome-box">
                                <h3 class="box-title">
                                    <?php echo esc_html('Share your design idea', 'afftra-blocks'); ?>
                                </h3>
                                <p class="box-desc">
                                    <?php echo esc_html('We are always looking for new ideas to improve our products. Share your design idea with us.', 'afftra-blocks'); ?>
                                </p>
                                <a href="https://gutenbergkits.com/contact" target="_blank" class="share-idea-btn">
                                    <?php echo esc_html('Share Idea', 'afftra-blocks'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="content-area">
                        <div class="video-area">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/bz3_KQmWkgc?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                        <div class="plugin-info">
                            <div class="afftra-card">
                                <h4 class="card-title">
                                    <?php echo esc_html('Rate Plugin', 'afftra-blocks'); ?>
                                </h4>
                                <p class="card-desc">
                                    <?php echo esc_html('Enjoying Afftra Blocks? Please consider leaving a 5-star review to help others discover the plugin.', 'afftra-blocks'); ?>
                                </p>
                                <a href="https://wordpress.org/support/plugin/afftra-blocks/reviews/" target="_blank" class="card-btn">
                                    <?php echo esc_html('Support Us', 'afftra-blocks'); ?>
                                </a>
                            </div>
                            <div class="afftra-card">
                                <h4 class="card-title">
                                    <?php echo esc_html('Get Support', 'afftra-blocks'); ?>
                                </h4>
                                <p class="card-desc">
                                    <?php echo esc_html('Need help with Afftra Blocks? Our support team is here to help you.', 'afftra-blocks'); ?>
                                </p>
                                <a href="https://wordpress.org/support/plugin/afftra-blocks/" target="_blank" class="card-btn">
                                    <?php echo esc_html('Get Support', 'afftra-blocks'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }

    /**
     * Redirect user to the plugin's admin page after activation
     */
    public function user_redirect() {
        if (get_option('afftra_do_activation_redirect', false) && current_user_can('manage_options')) {
            delete_option('afftra_do_activation_redirect');
            wp_safe_redirect(admin_url('admin.php?page=afftra_dashboard'));
            exit;
        }
    }
}

// Initialize the dashboard class
new Afftra_Dashboard();
