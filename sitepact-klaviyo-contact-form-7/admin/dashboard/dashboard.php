<?php

    add_action( 'admin_menu', 'klcf7_add_settings_page' );
    add_action( 'admin_enqueue_scripts', 'enqueue_admin_assets' );


    /**
     * Hook into admin_menu to create our custom menu
     */
    function klcf7_add_settings_page() {

        // TOP-LEVEL MENU: "Klaviyo CF7" -> leads directly to CPT listing
        add_menu_page(
            __( 'Klaviyo Contact Form 7', 'sitepact-klaviyo-contact-form-7' ),   // Page title
            __( 'Klaviyo CF7', 'sitepact-klaviyo-contact-form-7' ), // Menu title
            'manage_options',                                // Capability
            'klcf7_dashboard',                 // Menu slug
            'klcf7_render_dashboard_page',     // Callback
            'dashicons-flag',                                // Icon (dashicons)
            56                                               // Position in the menu
        );

        //
        add_submenu_page(
            'klcf7_dashboard',
            __( 'Features', 'sitepact-klaviyo-contact-form-7' ),
            __( 'Features', 'sitepact-klaviyo-contact-form-7' ),
            'manage_options',
            'klcf7_dashboard_features', // <--- no &tab= here
            'klcf7_render_dashboard_page'
        );

        add_submenu_page(
            'klcf7_dashboard',
            __( 'Help', 'sitepact-klaviyo-contact-form-7' ),
            __( 'Help', 'sitepact-klaviyo-contact-form-7' ),
            'manage_options',
            'klcf7_dashboard_help',     // <--- unique slug
            'klcf7_render_dashboard_page'
        );
    }



     function klcf7_render_dashboard_page() {
        // phpcs:disable WordPress.Security.NonceVerification.Recommended
        $page = isset($_GET['page']) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';
        // phpcs:enable
    
        switch ( $page ) {
            case 'klcf7_dashboard_features':
                $active_tab = 'basic';
                break;
            case 'klcf7_dashboard_help':
                $active_tab = 'welcome';
                break;
            case 'klcf7_dashboard_pro':
                $active_tab = 'pro';
                break;
            default:
                $active_tab = 'welcome';
                break;
        }

        ?>
        <div class="wrap">
            <div class="plugin-logo-header">
                <?php
                    // Determine the image URL based on whether WCAN_PRO_NOTICE_VERSION is defined
                    if ( skcf7_fs()->can_use_premium_code() ) {
                        $image_url = plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/plugin-logo-klcf-pro.png';
                    } else {
                        $image_url = plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/plugin-logo-klcf.png';
                    }
                   
                ?>
                <img src="<?php echo esc_url( $image_url ); ?>" alt="Sitepact's Contact Form 7 Extension For Klaviyo">
                <p>
                    <a href="https://sitepact.com" target="_blank" rel="noopener noreferrer">
                        <?php esc_html_e( 'By Sitepact', 'sitepact-klaviyo-contact-form-7' ); ?>
                    </a>
                </p>
            </div>
            
            <!-- Here is where we place our tabbed interface -->
            <div id="spactplugin-container" class="spactplugin-container">
                <!-- Tabs Navigation (We can rely on JS for switching or we can do a "server-based" approach) -->
                <div class="spactplugin-tabs">
                    <button 
                        class="spactplugin-tab-link <?php echo $active_tab === 'welcome' ? 'spactplugin-active' : ''; ?>" 
                        data-tab="spactplugin-welcome"
                    >
                        <?php esc_html_e('Welcome / Help', 'sitepact-klaviyo-contact-form-7'); ?>
                    </button>
                    <button 
                        class="spactplugin-tab-link <?php echo $active_tab === 'basic' ? 'spactplugin-active' : ''; ?>" 
                        data-tab="spactplugin-basic"
                    >
                        <?php esc_html_e('Basic Features', 'sitepact-klaviyo-contact-form-7'); ?>
                    </button>
                    <button 
                        class="spactplugin-tab-link <?php echo $active_tab === 'pro' ? 'spactplugin-active' : ''; ?>" 
                        data-tab="spactplugin-pro"
                    >
                        <?php esc_html_e('Pro Features', 'sitepact-klaviyo-contact-form-7'); ?>
                    </button>
                </div><!-- .spactplugin-tabs -->

                <!-- Tab Content: Welcome -->
                <div id="spactplugin-welcome" class="spactplugin-tab-content <?php echo $active_tab === 'welcome' ? 'spactplugin-active' : ''; ?>">
                    <div class="spactplugin-banner" style="background-image:url('<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/klaviyo-contact-form-7-banner.png') ?>');"></div>
                    <div class="spactplugin-icon-boxes">
                        <div class="spactplugin-icon-box">
                            <!-- Dashicon Example -->
                            <span class="dashicons dashicons-book"></span>
                            <div>
                                <h3><?php esc_html_e('Documentation', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                                <p><?php esc_html_e('We\'ve organized the documentation and kept it up to date on a regular basis. This manual will assist you in using our plugin effectively.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                                <a href="https://sitecare.sitepact.com/hc/categories/1/contact-form-7-klaviyo-integration" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Read Documentation', 'sitepact-klaviyo-contact-form-7'); ?></a>

                            </div>
                        </div>
                        <div class="spactplugin-icon-box">
                            <span class="dashicons dashicons-video-alt2"></span>
                            <div>
                                <h3><?php esc_html_e('Video Tutorials', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                                <p><?php esc_html_e('We create videos to make our customers comprehend the product quickly. Using video tutorials is a fantastic method to learn how to use our plugins. We\'ve compiled a list of videos for you.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                                <a href="https://sitepact.com/klcf-playlist" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Watch Videos', 'sitepact-klaviyo-contact-form-7'); ?></a>
                            </div>
                        </div>
                        <div class="spactplugin-icon-box">
                            <span class="dashicons dashicons-lightbulb"></span>
                            <div>
                                <h3><?php esc_html_e('Support', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                                <p><?php esc_html_e('Please do not hesitate to contact us if you require assistance or want a free store set-up. We will assist you within 12-24 hours of receiving your inquiry.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                                <a href="https://sitecare.sitepact.com/hc/categories/1/contact-form-7-klaviyo-integration" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Access Support Desk', 'sitepact-klaviyo-contact-form-7'); ?></a>
                            </div>
                        </div>
                        <div class="spactplugin-icon-box">
                            <span class="dashicons dashicons-hammer"></span>
                            <div>
                                <h3><?php esc_html_e('Missing any Feature?', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                                <p><?php esc_html_e('Have you ever noticed any missing features? Please notify us if you do. As soon as possible, our team will consider all reasonable requests for development. ', 'sitepact-klaviyo-contact-form-7'); ?></p>
                                <a href="https://sitecare.sitepact.com/" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Tell us', 'sitepact-klaviyo-contact-form-7'); ?></a>

                            </div>
                        </div>
                    </div>
                </div><!-- #spactplugin-welcome -->

                <!-- Tab Content: Basic Features -->
                <div id="spactplugin-basic" class="spactplugin-tab-content <?php echo $active_tab === 'basic' ? 'spactplugin-active' : ''; ?>">
                    <div class="tab-section-intro">
                        <h3><?php esc_html_e('Thank you for choosing Contact Form 7 Klaviyo Integration', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                        <p><?php esc_html_e('WordPress Extension for Klaviyo. Integrate Contact form 7 With Klaviyo. This plugin allows you to send form submissions into Klaviyo. This form data is added to profiles (leads, contacts, audience) in preconfigured lists.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                    </div>
                    <div class="spactplugin-row">
                        <div class="spactplugin-image-col">
                            <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/klcf-contact-form-basic1.png') ?>" alt="WCAN Free Features" />
                        </div>
                        <div class="spactplugin-text-col">
                            <h3><?php esc_html_e('Easy To Use', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                            <ol>
                                <li><?php esc_html_e('Enter your Klaviyo API Key (private key)', 'sitepact-klaviyo-contact-form-7'); ?></li>
                                <li><?php esc_html_e('Fetch your lists.', 'sitepact-klaviyo-contact-form-7'); ?></li>
                                <li><?php esc_html_e('The lists will appear below in the "Select Audience Dropdown.', 'sitepact-klaviyo-contact-form-7'); ?></li>
                                <li><?php esc_html_e('You can now move to mapping fields. On the left side are the field in your contact form and on the right are predefined fields from Klaviyo.', 'sitepact-klaviyo-contact-form-7'); ?></li>
                                <li><?php esc_html_e('Click the "Add Field" button to map more fields and "Remove" if you need to get rid of any.', 'sitepact-klaviyo-contact-form-7'); ?></li>
                                <li><?php esc_html_e('Enable GDPR if you need to setup user consent. You can edit the text displayed to the user on the checkbox.', 'sitepact-klaviyo-contact-form-7'); ?></li>
                            </ol>
                            <a href="https://sitecare.sitepact.com/hc/categories/1/contact-form-7-klaviyo-integration" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Learn More', 'sitepact-klaviyo-contact-form-7'); ?></a>
                        </div>
                    </div>

                    <div class="spactplugin-row">
                        <div class="spactplugin-text-col">
                            <h3><?php esc_html_e('Additional Dev Settings', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                            <p><?php esc_html_e('You have the option to set a subscription source. You can do this to help with organizing and understanding your audience.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                            <p><?php esc_html_e('Klaviyo requires phone numbers in E.164 format. You can use the option here to mask the input field.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                            <p><?php esc_html_e('Feel free to log Klaviyo requests for debugging purposes.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                            <a href="<?php echo esc_url(skcf7_fs()->get_upgrade_url()); ?>" class="spactplugin-cta-btn"><?php esc_html_e('Get Pro Plugin', 'sitepact-klaviyo-contact-form-7'); ?></a>

                        </div>
                        <div class="spactplugin-image-col">
                            <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/klcf-contact-form-basic2.png') ?>" alt="Anything can be a notice" />
                        </div>
                    </div>
                </div><!-- #spactplugin-basic -->

                <!-- Tab Content: Pro -->
                <div id="spactplugin-pro" class="spactplugin-tab-content <?php echo $active_tab === 'pro' ? 'spactplugin-active' : ''; ?>">
                    <div class="tab-section-intro">
                        <h3><?php esc_html_e('Contact Form 7 Extension For Klaviyo PRO Plans', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                        <p>
                            <?php
                                /* translators: 1: Personal, 2: Freelancer, 3: Agency */
                                printf(
                                    /* translators: 1: Personal, 2: Freelancer, 3: Agency */
                                    esc_html__(
                                        'Choose from a PRO Plan that suits your requirements and budget: %1$s or %2$s',
                                        'sitepact-klaviyo-contact-form-7'
                                    ),
                                    /* The plan names wrapped in <strong> tags, properly escaped */
                                    '<strong>' . esc_html__('Personal, Freelancer', 'sitepact-klaviyo-contact-form-7') . '</strong>',
                                    '<strong>' . esc_html__('Agency', 'sitepact-klaviyo-contact-form-7') . '</strong>'
                                );
                            ?>
                        </p>
                    </div>
                    <div class=spactplugin-inline-btn-wrap>
                        <a href="<?php echo esc_url(skcf7_fs()->get_upgrade_url()); ?>" class="spactplugin-cta-btn"><?php esc_html_e('Get Pro Plugin', 'sitepact-klaviyo-contact-form-7'); ?></a>
                        <a href="https://sitepact.com/contact-form-7-klaviyo-integration/" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Learn More', 'sitepact-klaviyo-contact-form-7'); ?></a>
                    </div>
                    <!--Schedule Notices-->
                    <div class="spactplugin-row">
                        <div class="spactplugin-image-col">
                            <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/klcf-pro-feat-1.png') ?>" alt="Schedule notices" />
                        </div>
                        <div class="spactplugin-text-col">
                            <h3><?php esc_html_e('Unlimited Custom Fields', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                            <p><?php esc_html_e('Send as many custom field to Klaviyo as you need to streamline your data. Enable the feature and map your fields, its no different from mapping regular fields.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                        </div>
                    </div>
                    <!--Display notice on a single product-->
                    <div class="spactplugin-row">
                        <div class="spactplugin-text-col">
                            <h3><?php esc_html_e('SMS Subscription', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                            <p><?php esc_html_e('SMS subscription is great if you need to send clients or prospects informatin, notifications or quick updates. By enabling this feature you subscribe the user to your Klaviyo list. You can even select a different list than the one you used for regular subscription.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                            <p><?php esc_html_e('Enable Intl. Phone Formatting if you want to ensure users enter phone number in the correct format. Klaviyo will only accept E.164 formtting.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                        </div>
                        <div class="spactplugin-image-col">
                            <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/klcf-pro-feat-2.png') ?>" alt="Display notice on a single product" />
                        </div>
                    </div>

                    <!--Schedule Notices-->
                    <div class="spactplugin-row">
                        <div class="spactplugin-image-col">
                            <img src="<?php echo esc_url(plugin_dir_url( __FILE__ ) . '../../includes/assets/images/dashboard/klcf-pro-feat-3.png') ?>" alt="single by taxonomy" />
                        </div>
                        <div class="spactplugin-text-col">
                            <h3><?php esc_html_e('Unsubscribe Form', 'sitepact-klaviyo-contact-form-7'); ?></h3>
                            <p><?php esc_html_e('Create your unsubscribe page. This is great to maintain branding and personalize the experience when users are unsubscribing.', 'sitepact-klaviyo-contact-form-7'); ?></p>
                            <a href="https://sitepact.com/contact-form-7-klaviyo-integration/" class="spactplugin-cta-btn" target="_blank"><?php esc_html_e('Get Pro Plugin', 'sitepact-klaviyo-contact-form-7'); ?></a>
                        </div>
                    </div>

                    <!-- Repeat rows as needed -->
                </div><!-- #spactplugin-pro -->

            </div><!-- #spactplugin-container -->
        </div><!-- .wrap -->
        <?php
    }

     function enqueue_admin_assets( $hook_suffix ) {

        // If 'wcan_dashboard' appears anywhere in the hook suffix,
        // then enqueue our CSS/JS for that admin page.
        if ( false !== strpos( $hook_suffix, 'klcf7_dashboard' ) ) {

            wp_enqueue_style(
                'wcan-dashboard-css',
                plugin_dir_url( __FILE__ ) . '../../includes/assets/css/plugin-dashboard.css',
                array(),
                time()
            );

            wp_enqueue_script(
                'wcan-dashboard-js',
                plugin_dir_url( __FILE__ ) . '../../includes/assets/js/plugin-dashboard.js',
                array( 'jquery' ),
                time(),
                true
            );
        }
    }


 
