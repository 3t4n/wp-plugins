<?php

// Registration

function dark_visitors_register_settings() {
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_ACCESS_TOKEN);
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_IS_ANALYTICS_ENABLED);
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_IS_ENFORCE_ROBOTS_TXT_ENABLED);
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_IS_BLOCK_AI_ASSISTANTS_ENABLED);
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_IS_BLOCK_AI_DATA_SCRAPERS_ENABLED);
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_IS_BLOCK_AI_SEARCH_CRAWLERS_ENABLED);
    register_setting(DARK_VISITORS_SETTINGS_GROUP, DARK_VISITORS_IS_BLOCK_UNDOCUMENTED_AI_AGENTS_ENABLED);
}

add_action('admin_init', 'dark_visitors_register_settings');

// Menu Item

function dark_visitors_menu() {
    add_menu_page(
        // Page title
        'Dark Visitors',
        // Menu title
        'Dark Visitors',
        // Capability required to access the menu
        'manage_options',
        // Menu slug
        'dark-visitors',
        // Callback function to display the page
        'dark_visitors_page',
         // Menu icon
        'data:image/svg+xml;base64,' . base64_encode(file_get_contents(DARK_VISITORS_LOGO_PATH))
    );
}

add_action('admin_menu', 'dark_visitors_menu');

// Settings Page

function dark_visitors_page() {
    $is_robots_txt_enforcement_disallowed = dark_visitors_get_user_is_robots_txt_enforcement_disallowed();

    ?>
    <style>
        .fake-header {
            display: none;
        }

        .container {
            max-width: 40rem;
            margin-left: auto;
            margin-right: auto;
        }

        .header-container {
            display: flex;
            gap: 1rem;
            align-items: center;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .header-container img {
            height: 2rem;
        }

        .header-container h1 {
            padding: 0;
        }

        .header-container a {
            margin-left: auto;
        }

        h1 {
            font-weight: bold !important;
        }

        h2 {
            font-weight: bold;
        }

        hr {
            border: none;
            height: 1px;
            background-color: rgba(0, 0, 0, 0.2);
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        input[type="text"] {
            width: 100%;
        }

        input[type="checkbox"]:disabled {
            border-color: revert;
            opacity: revert;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        table, th, td {
            border: 1px solid rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 1rem;
        }

        th {
            background-color: rgba(0, 0, 0, 0.05);
        }

        td p {
            color: rgba(0, 0, 0, 0.5);
        }

        td p:first-child {
            margin-top: 0;
        }

        td p:last-child {
            margin-bottom: 0;
        }

        .table-header-step-number-label {
            margin-bottom: 0.5rem;
        }
        
        .table-header-step-text-label {
            font-weight: normal;
        }

        .premium-feature {
            background-color: rgba(52, 199, 89, 0.05);
            border: 1px solid #35C759;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .premium-feature .title {
            color: #35C759;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .premium-feature .description {
            font-style: italic;
            margin-bottom: 1rem;
        }

        .premium-feature label {
            vertical-align: revert;
            font-weight: bold;
        }
    </style>
    <div class="wrap">
        <h1 class="fake-header"></h1>
        <div class="container">
            <div class="header-container">
                <img src="<?php echo esc_url(DARK_VISITORS_LOGO_URL); ?>">
                <h1>Dark Visitors</h1>
                <a href="https://darkvisitors.com" target="_blank">Open the Dark Visitors Website →</a>
            </div>
            <p>Get realtime insight into the hidden ecosystem of artificial agents browsing, scraping, crawling, and gathering intelligence on your website. Protect your content from unwanted AI training with a robots.txt that stays up to date with the latest bots automatically.</p>
            <h2>Configuration</h2>
            <form method="post" action="options.php" class="dark-visitors-form">
                <?php settings_fields(DARK_VISITORS_SETTINGS_GROUP); ?>
                <table>
                    <tr>
                        <th scope="row">
                            <div class="table-header-step-number-label">Step 1:</div>
                            <div class="table-header-step-text-label">Get Started</div>
                        </th>
                        <td>
                            <p><a href="https://darkvisitors.com/sign-up" target="_blank">Sign up</a> for Dark Visitors and <a href="https://darkvisitors.com/projects" target="_blank">create a new project</a> for this website. This will take less than 30 seconds.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="table-header-step-number-label">Step 2:</div>
                            <div class="table-header-step-text-label">Connect Your Project</div>
                        </th>
                        <td>
                            <input type="text"
                                placeholder="Paste your project's access token here"
                                id="<?php echo esc_attr(DARK_VISITORS_ACCESS_TOKEN); ?>" 
                                name="<?php echo esc_attr(DARK_VISITORS_ACCESS_TOKEN); ?>" 
                                value="<?php echo esc_attr(get_option(DARK_VISITORS_ACCESS_TOKEN, '')); ?>"
                            />
                            <p>Copy your access token from the project's settings page.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="table-header-step-number-label">Step 3:</div>
                            <div class="table-header-step-text-label">Set Up Agent Analytics</div>
                        </th>
                        <td>
                            <input
                                type="checkbox"
                                id="<?php echo esc_attr(DARK_VISITORS_IS_ANALYTICS_ENABLED); ?>"
                                name="<?php echo esc_attr(DARK_VISITORS_IS_ANALYTICS_ENABLED); ?>"
                                <?php checked(get_option(DARK_VISITORS_IS_ANALYTICS_ENABLED, '1') == '1'); ?>
                                value="1"
                            />
                            <label for="dark_visitors_is_analytics_enabled">Enable Agent Analytics</label><br>
                            <p>Track the activity of <a href="https://darkvisitors.com/agents" target="_blank">all known artificial agents</a> crawling your website. Insights will appear on your project page. You can test this by following the instructions in the <a href="https://darkvisitors.com/docs/analytics" target="_blank">docs</a>.</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <div class="table-header-step-number-label">Step 4:</div>
                            <div class="table-header-step-text-label">Set Up Automatic Robots.txt</div>
                        </th>
                        <td>
                            <input
                                type="checkbox"
                                id="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_AI_ASSISTANTS_ENABLED); ?>"
                                name="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_AI_ASSISTANTS_ENABLED); ?>"
                                <?php checked(get_option(DARK_VISITORS_IS_BLOCK_AI_ASSISTANTS_ENABLED, '0') == '1'); ?>
                                value="1"
                            />
                            <label for="dark_visitors_is_block_ai_assistants_enabled">Block AI Assistants</label><br>
                            <input
                                type="checkbox"
                                id="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_AI_DATA_SCRAPERS_ENABLED); ?>"
                                name="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_AI_DATA_SCRAPERS_ENABLED); ?>"
                                <?php checked(get_option(DARK_VISITORS_IS_BLOCK_AI_DATA_SCRAPERS_ENABLED, '0') == '1'); ?>
                                value="1"
                            />
                            <label for="dark_visitors_is_block_ai_data_scrapers_enabled">Block AI Data Scrapers</label><br>
                            <input
                                type="checkbox"
                                id="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_AI_SEARCH_CRAWLERS_ENABLED); ?>"
                                name="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_AI_SEARCH_CRAWLERS_ENABLED); ?>"
                                <?php checked(get_option(DARK_VISITORS_IS_BLOCK_AI_SEARCH_CRAWLERS_ENABLED, '0') == '1'); ?>
                                value="1"
                            />
                            <label for="dark_visitors_is_block_ai_search_crawlers_enabled">Block AI Search Crawlers</label><br>
                            <input
                                type="checkbox"
                                id="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_UNDOCUMENTED_AI_AGENTS_ENABLED); ?>"
                                name="<?php echo esc_attr(DARK_VISITORS_IS_BLOCK_UNDOCUMENTED_AI_AGENTS_ENABLED); ?>"
                                <?php checked(get_option(DARK_VISITORS_IS_BLOCK_UNDOCUMENTED_AI_AGENTS_ENABLED, '0') == '1'); ?>
                                value="1"
                            />
                            <label for="dark_visitors_is_block_undocumented_ai_agents_enabled">Block Undocumented AI Agents</label><br>
                            <p>Keep your robots.txt up to date with the <a href="https://darkvisitors.com/agents" target="_blank">agent list</a> automatically. Checking each box will block all known agents of that type by adding disallow rules to your virtual robots.txt. This will not work if you already maintain a physical robots.txt file. For more detail, read the <a href="https://darkvisitors.com/docs/robots-txt" target="_blank">docs</a>.</p>
                            <div class="premium-feature">
                                <div class="title">Premium Feature</div>
                                <?php if ($is_robots_txt_enforcement_disallowed) { ?>
                                    <p class="description"><a href="https://darkvisitors.com/pricing" target="_blank">Upgrade for free</a> to enable this. If you recently upgraded, click "Save Changes" to sync your account.</p>
                                <?php } ?>
                                <input
                                    type="checkbox"
                                    id="<?php echo esc_attr(DARK_VISITORS_IS_ENFORCE_ROBOTS_TXT_ENABLED); ?>"
                                    name="<?php echo esc_attr(DARK_VISITORS_IS_ENFORCE_ROBOTS_TXT_ENABLED); ?>"
                                    <?php checked(get_option(DARK_VISITORS_IS_ENFORCE_ROBOTS_TXT_ENABLED, '0') == '1' && !$is_robots_txt_enforcement_disallowed); ?>
                                    <?php disabled($is_robots_txt_enforcement_disallowed); ?>
                                    value="1"
                                />
                                <label for="dark_visitors_is_enforce_robots_txt_enabled">Enforce Your Robots.txt</label><br>
                                <p>Block agents who try to ignore your robots.txt rules. They'll see an HTTP 403 Forbidden response rather than your web page. Make sure any caching respects the standard Cache-Control HTTP header.</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
    <?php
}
