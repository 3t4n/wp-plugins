<?php
function formzard_menu() {
    if (!function_exists('add_menu_page')) {
        return;
    }
    
    add_menu_page(
        __('Formzard', 'formzard'),
        __('Formzard', 'formzard'),
        'manage_options',
        'formzard-templates',
        'formzard_page',
        'dashicons-feedback',
        29
    );
}
add_action('admin_menu', 'formzard_menu');

function formzard_page() {
    global $for_fs;
    $templates = formzard_get_templates();

    // Group templates by category
    $categories = [];
    foreach ($templates as $template) {
        // Add the template to its specific category
        $category = $template['category'] ?? __('All Templates', 'formzard');
        $categories[$category][] = $template;

        // Also add the template to the "All Templates" category
        $categories[__('All Templates', 'formzard')][] = $template;
    }

    // Ensure "All Templates" is the first category
    if (isset($categories[__('All Templates', 'formzard')])) {
        $allTemplates = $categories[__('All Templates', 'formzard')];
        unset($categories[__('All Templates', 'formzard')]);
        $categories = [__('All Templates', 'formzard') => $allTemplates] + $categories;
    }
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Formzard - Pre-designed Templates for Contact Form 7', 'formzard'); ?></h1>
        <p><?php esc_html_e('Select a template to import it into Contact Form 7.', 'formzard'); ?></p>

        <!-- Search Box -->
        <input type="text" id="formzard-template-search" placeholder="<?php esc_attr_e('Search templates...', 'formzard'); ?>" style="margin-bottom: 15px; padding: 10px; width: 100%;">

        <!-- Layout Container -->
        <div class="formzard-layout">
            <!-- Tabs -->
            <h2 class="nav-tab-wrapper">
                <?php foreach ($categories as $category => $templates) : ?>
                    <a href="#tab-<?php echo sanitize_title($category); ?>" class="nav-tab">
                        <?php echo esc_html($category); ?> (<?php echo count($templates); ?>)
                    </a>
                <?php endforeach; ?>
            </h2>

            <!-- Tab Contents -->
            <div class="formzard-tabs">
                <?php foreach ($categories as $category => $templates) : ?>
                    <div id="tab-<?php echo sanitize_title($category); ?>" class="formzard-tab-content" style="display: none;">
                        <h2><?php echo esc_html($category); ?></h2>
                        <div id="formzard-templates-grid">
                            <?php foreach ($templates as $template) : ?>
                                <div class="formzard-template" data-template-name="<?php echo esc_attr(strtolower($template['name'])); ?>">
                                    <h3><?php echo esc_html($template['name']); ?></h3>
                                    <p><?php echo esc_html($template['description']); ?></p>
                                    <?php if ( ! $template['is_premium'] || $for_fs->can_use_premium_code() ) : ?>
                                        <button class="button formzard-import-template" data-template-id="<?php echo esc_attr($template['id']); ?>">
                                            <?php esc_html_e('Import Template', 'formzard'); ?>
                                        </button>
                                    <?php else : ?>
                                        <button class="button button-primary" onclick="window.location.href='<?php echo esc_url( $for_fs->get_upgrade_url() ); ?>'">
                                            <?php esc_html_e('Upgrade to Premium', 'formzard'); ?>
                                        </button>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- JavaScript for Tabs and Search -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.nav-tab');
                const tabContents = document.querySelectorAll('.formzard-tab-content');

                // Show the first tab by default
                if (tabs.length > 0) {
                    tabs[0].classList.add('nav-tab-active');
                    tabContents[0].style.display = 'block';
                }

                tabs.forEach((tab, index) => {
                    tab.addEventListener('click', function (e) {
                        e.preventDefault();

                        // Remove active class from all tabs
                        tabs.forEach(tab => tab.classList.remove('nav-tab-active'));

                        // Hide all tab contents
                        tabContents.forEach(content => (content.style.display = 'none'));

                        // Add active class to the clicked tab
                        tab.classList.add('nav-tab-active');

                        // Show the associated tab content
                        tabContents[index].style.display = 'block';
                    });
                });

                // Search Functionality
                const searchInput = document.getElementById('formzard-template-search');
                searchInput.addEventListener('input', function () {
                    const searchValue = this.value.toLowerCase();
                    const templates = document.querySelectorAll('.formzard-template');

                    templates.forEach(function (template) {
                        const templateName = template.getAttribute('data-template-name');
                        if (templateName.includes(searchValue)) {
                            template.style.display = 'block';
                        } else {
                            template.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </div>
    <?php
}