<?php
/* @ includes/carbon-fields-setup.php */

namespace AdBlockGuard;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


use Carbon_Fields\Container;
use Carbon_Fields\Field;


class CarbonFieldsSetup
{
    const CACHE_KEY = 'wuadblockguard_settings_cache';
    const CONTAINER_ID = 'carbon_fields_container_adblock_guard';


    public static function get_cache_key()
    {
        return self::CACHE_KEY;
    }
    
public function save_settings_cache($container)
{
    // Convert the container to an array
    $settings = $this->container_to_frontend_array($container);

    if (empty($settings)) {
        // Log an error if the settings are null
        PluginLogger::log('error', __CLASS__ . ': Settings cache is null post save', [
            'settings' => $settings,
        ]);
        return;
    }

    // Delete the transient first to avoid stale cache issues
    delete_transient(self::CACHE_KEY);

    // Save the updated transient with a long expiration time
    set_transient(self::CACHE_KEY, $settings, 0);

    // Save the updated settings to the database (disable autoload)
    update_option(self::CACHE_KEY, $settings, false);

    // Optional logging for debugging
    PluginLogger::log('debug', __CLASS__ . ': Settings cache updated successfully', [
        'transient' => get_transient(self::CACHE_KEY),
        'option' => get_option(self::CACHE_KEY),
    ]);
}


public function container_to_frontend_array($container)
{
    $settings = [];

    if ($container) {
        $fields = $container->get_fields();

        foreach ($fields as $field) {
            $field_type = $field->get_type();
            $field_id = preg_replace('/^wuadblockguard_/', '', $field->get_base_name());
            $value = $field->get_value();

            // Handle complex fields
            if ($field_type === 'complex' && is_array($value)) {
                continue;
            }

            // Skip HTML fields
            if ($field_type === 'html') {
                continue;
            }

            // Process other field types
            $settings[$field_id] = $this->process_field_value($field_type, $value);
        }
    }

    // quick clean up
	$settings['usergroup_settings'] = array_map(function ($usergroup) {
	    // Cast overlay_delay to float if it exists
	    if (isset($usergroup['overlay_delay'])) {
	        $usergroup['overlay_delay'] = (int) $usergroup['overlay_delay'];
	    }

	    // Remove _type if it exists
	    if (isset($usergroup['_type'])) {
	        unset($usergroup['_type']);
	    }

	    // Flatten buttons if they exist
	    if (isset($usergroup['buttons']) && is_array($usergroup['buttons'])) {
	        $usergroup['buttons'] = array_map(function ($button) {
	            return [
	                'link' => $button['link'] ?? null,
	                'background_color' => $button['background_color'] ?? null,
	                'foreground_color' => $button['foreground_color'] ?? null,
	            ];
	        }, $usergroup['buttons']);
	    }

	    return $usergroup;
	}, carbon_get_theme_option('wuadblockguard_usergroup_settings'));



	// return settings for cache
    return $settings;
}


private function process_complex_field($complexField)
{
    $processedComplex = [];
    $complexItems = $complexField->get_value(); // Get the array of complex field items

    // Loop through each complex item
    foreach ($complexItems as $complexKey => $complexItem) {
        $flattenedComplexItem = [];

        // Iterate through subfields in the complex item
        foreach ($complexItem as $key => $value) {
            // Special handling for "buttons" sub-complex
            if ($key === 'buttons' && is_array($value)) {
                $flattenedComplexItem['buttons'] = $this->process_buttons_subcomplex($value);
            } else {
                // Process other field values
                $flattenedComplexItem[$key] = $this->process_field_value(null, $value);
            }
        }

        $processedComplex[$complexKey] = $flattenedComplexItem;
    }

    return $processedComplex;
}




	private function process_buttons_subcomplex($buttons)
	{
	    $processedButtons = [];

	    foreach ($buttons as $button) {
	        $flattenedButton = [];

	        foreach ($button as $key => $value) {
	            if (is_array($value)) {
	                if (isset($value[0])) {
	                    $flattenedButton[$key] = $value[0];
	                } elseif (isset($value[0]['value'])) {
	                    $flattenedButton[$key] = $value[0]['value'];
	                }
	            } else {
	                $flattenedButton[$key] = $value;
	            }
	        }

	        $processedButtons[] = $flattenedButton;
	    }

	    return $processedButtons;
	}

	private function process_field_value($field_type, $value)
	{
	    // Convert "yes"/"" to boolean for checkbox fields
	    if ($field_type === 'checkbox') {
	        if ($value === 'yes') {
	            return true;
	        } elseif ($value === '') {
	            return false;
	        }
	    }

	    // Handle empty arrays as false
	    if (is_array($value) && empty($value)) {
	        return false;
	    }

	    // Handle multiselect fields
	    if ($field_type === 'multiselect') {
	        if (is_array($value)) {
	            $serialized_array = [];
	            foreach ($value as $index => $item) {
	                $serialized_array[$index] = $item;
	            }
	            return $serialized_array;
	        } else {
	            return []; // Fallback to an empty array
	        }
	    }

	    // Ensure empty string for text and textarea fields
	    if (($field_type === 'text' || $field_type === 'textarea') && !$value) {
	        return '';
	    }

	    // Return the value as-is for other field types
	    return $value;
	}









	public function register_fields()
	{
	    if (LicenseChecker::getInstance()->isLicenseValid()) {
	        $this->enableVersion();
	    }

	    // Define and retrieve the container
	    $container = $this->get_container();

	    // Sync user groups with WordPress roles
	    $this->sync_user_groups();

	    // Save settings cache for front-end when Carbon Fields options are saved
	    add_action('carbon_fields_theme_options_container_saved', function () use ($container) {
	        $this->save_settings_cache($container);
	    });
	}


	private static function get_all_non_woo_pages() {
	    // Retrieve all published pages
	    $pages = get_pages(['post_status' => 'publish']);

	    // Initialize an array for non-WooCommerce pages
	    $non_woo_pages = [];

	    // Check if WooCommerce is active
	    if (class_exists('WooCommerce')) {
	        // Get WooCommerce page IDs
	        $excluded_page_ids = [
	            wc_get_page_id('shop'),
	            wc_get_page_id('cart'),
	            wc_get_page_id('checkout'),
	            wc_get_page_id('myaccount'),
	        ];

	        // Remove invalid page IDs (-1 indicates the WooCommerce page is not set)
	        $excluded_page_ids = array_filter($excluded_page_ids, function ($id) {
	            return $id !== -1;
	        });
	    } else {
	        // No pages to exclude if WooCommerce is not active
	        $excluded_page_ids = [];
	    }

	    // Populate non-WooCommerce pages
	    foreach ($pages as $page) {
	        if (!in_array($page->ID, $excluded_page_ids, true)) {
	            $non_woo_pages[$page->ID] = $page->post_title;
	        }
	    }

	    return $non_woo_pages;
	}



    public function get_container()
    {

        // Get dynamic options for categories, tags, and pages
        $categories = get_categories(array('hide_empty' => false));
        $tags = get_tags(array('hide_empty' => false));
        $pages = get_pages(array('sort_column' => 'post_title', 'sort_order' => 'asc'));

        $category_options = [];
        $tag_options = [];
        $non_woo_pages = [];
        // Populate categories
        foreach ($categories as $category) {
            $category_options[$category->term_id] = $category->name;
        }

        // Populate tags
        foreach ($tags as $tag) {
            $tag_options[$tag->term_id] = $tag->name;
        }

        // Populate pages
        $non_woo_pages = self::get_all_non_woo_pages();

        // create nonce
        $nonce = wp_create_nonce('wuadblockguard_demo_action');

        // Retrieve available WordPress user roles and prepend "Guest"
        $roles = wp_roles()->get_names();
        $roles = ['guest' => 'Guest'] + $roles; // Ensure "Guest" is the first choice

        /* General Settings Tab */
        $container_id = Container::make('theme_options', __('AdBlock Guard', 'ad-block-guard'))
            ->set_page_file('wuadblockguard_settings')
            ->set_icon('dashicons-shield')
            ->set_layout('tabbed-horizontal')
            ->add_tab(__('Detection options', 'ad-block-guard'), [
                            	////////////////////////////////////////////////////////////////////////////
            	////////////////////////////////////////////////////////////////////////////
                // General settings fields

                Field::make('html', 'wuadblockguard_enable_text')
                    ->set_html('<h1>' . __('Detection options', 'ad-block-guard') . '</h1><p>' . __('The AdBlock Guard system must be enabled below.', 'ad-block-guard') . '</p>'),
                Field::make('checkbox', 'wuadblockguard_enable', __('Enable AdBlock Guard System', 'ad-block-guard'))
                    ->set_default_value(false),

                Field::make('checkbox', 'wuadblockguard_fast_detection', __('Fast Detection - Effective against the majority of AdBlock browser extensions', 'ad-block-guard'))
                    ->set_default_value(true)
                    ->set_help_text(__('<p>At least one detection method must be selected.  This detection method is required in the free version.</p><p>Effectively, efficiently, and safely detects the majority of AdBlock extensions that are installed as browser extensions. This method alone is the safest choice because users detected should be aware, and have the means, to quickly disable their AdBlock extension.</p>', 'ad-block-guard')),
				
				Field::make('text', 'wuadblockguard_custom_css_class', __('Custom [CSS Class] Detection', 'ad-block-guard'))
				    ->set_help_text(__('Separate with a space, do not add the leading period (.)', 'ad-block-guard'))
				    ->set_width(50)
				    ->set_attribute('maxLength', '50')
    				->set_classes('ad-block-guard-short-field')
    				->set_attribute('pattern', '^[a-zA-Z_][a-zA-Z0-9_\-]*$')
				    ->set_conditional_logic([
				        [
				            'field' => 'wuadblockguard_fast_detection',
				            'value' => true,
				        ],
				    ])
				    ->set_default_value(''),

				Field::make('text', 'wuadblockguard_custom_css_id', __('Custom [CSS ID] Detection', 'ad-block-guard'))
				    ->set_help_text(__('Do not add the leading #', 'ad-block-guard'))
				    ->set_attribute('pattern', '^(https?:\/\/[^\s]+\.js)$') 
				    ->set_width(50)
				    ->set_attribute('maxLength', '50')
    				->set_classes('ad-block-guard-short-field')
    				->set_attribute('pattern', '^[a-zA-Z_][a-zA-Z0-9_\-]*$')
				    ->set_conditional_logic([
				        [
				            'field' => 'wuadblockguard_fast_detection',
				            'value' => true,
				        ],
				    ])
				    ->set_default_value(''),


                Field::make('checkbox', 'wuadblockguard_custom_load_js_enable', __('Custom Domain Advertisement JavaScript Url', 'ad-block-guard'))
                    ->set_default_value(false)
                    ->set_help_text(__('<p>Overcome custom AdBlock filters by adding a local or remote advertisement JavaScript Url that is used on your website sitewide</p>', 'ad-block-guard')),

				Field::make('text', 'wuadblockguard_custom_load_js_url', __('Custom JavaScript URL', 'ad-block-guard'))
				    ->set_help_text(__('Provide the fully qualified URL of the JavaScript file (must end with .js)', 'ad-block-guard'))
				    ->set_conditional_logic([
				        [
				            'field' => 'wuadblockguard_custom_load_js_enable',
				            'value' => true,
				        ],
				    ])
				    ->set_attribute('maxLength', '255')
				    ->set_attribute('pattern', '^(https?:\/\/[^\s]+\.js)$') 
				    ->set_default_value(''),

                Field::make('checkbox', 'wuadblockguard_remote_detection', __('Remote Loading Detection (caution)', 'ad-block-guard'))
                    ->set_help_text('<p>' . __('Required for detection of certain types of DNS level AdBlockers.<p>WARNING: Some visitors may not realize they have DNS level AdBlocking enabled, but none the less, they are AdBlocking.</p><p>This method effectively uses script loading behavior as an adblock detection mechanism, capitalizing on the fact that many ad blockers block scripts from ad-serving domains like googlesyndication.com. It\'s a straightforward method but might miss certain types of ad blocking that don\'t trigger script errors.</p>', 'ad-block-guard') .  '</p>'),
                Field::make('checkbox', 'wuadblockguard_network_detection', __('Network Loading Detection (caution)', 'ad-block-guard'))
                    ->set_help_text('<p>' . __('WARNING: Some visitors may not realize they have DNS level AdBlocking enabled, but none the less, they are AdBlocking.
<p>This method directly monitors the success or failure of a network request and examines the content of the response. This method can catch more nuanced ad blocking techniques, such as those that block or alter network requests without affecting script execution in the DOM.</p>', 'ad-block-guard') . '</p><p>' . __('An example of a VPN with DNS level ABlocking:', 'ad-block-guard') . ' <a href="https://www.privateinternetaccess.com/ad-blocking-vpn/?invite=U2FsdGVkX18EO0hlzOn5V3VRWZF159w5yyh3upsIOBA%2CEToutli2vIrWvLDOFoK567ppC3Q" target="_blank">' . __('Private Internet Access: MACE', 'ad-block-guard') . '</a>.</p>'),
            ])



        	////////////////////////////////////////////////////////////////////////////
        	////////////////////////////////////////////////////////////////////////////
            // Usergroup Role Settings

            ->add_tab(__('Overlay settings per role', 'ad-block-guard'), [
                Field::make('html', 'wuadblockguard_general_text')
                    ->set_html(
                        '<h1>' . __('Overlay settings per role', 'ad-block-guard') . '</h1>' .
                        '<p>' . __('Modify overlays per user role below. Don\'t forget to Save your changes.', 'ad-block-guard') . '</p>'

                    ),
                Field::make('complex', 'wuadblockguard_usergroup_settings', __('User Role Overlay', 'ad-block-guard'))

                    ->set_attribute('data-id', 'usergroup')
                    ->set_max(count($roles))
                    ->set_layout('tabbed-horizontal')
                    ->set_duplicate_groups_allowed(false)
                    ->add_fields([
                        // Start User Group Panel

                        // Row #1
                        Field::make('text', 'usergroup', __('Current user role', 'ad-block-guard'))
                            ->set_width(50)
                            ->set_attribute('readOnly', true),

                        // Demo buttons

                        Field::make('html', 'overlay_demo_button', 'ad-block-guard')
                            ->set_html('<p>' . sprintf(
                                /* translators: %s is the URL for the Mobile Demo link. */
                            __('<a href="%s" class="button thickbox">Tablet Demo</a>', 'ad-block-guard'),
                            esc_url(add_query_arg(
                                array(
                                    'page' => 'wuadblockguard_demo_page',
                                    'wuadblockguard_demo_nonce' => $nonce,
                                    'overlay' => '1',
                                    'TB_iframe' => 'true',
                                    'width' => '1028',
                                    'height' => '768',
                                ),
                                admin_url('admin.php')
                            ))) . ' &nbsp; <a href="admin.php?page=wuadblockguard_demo_page">Overlay Demo Page</a></p>')
                            ->set_width(50),  
                        

                        Field::make('checkbox', 'overlay_enabled', __('Enable this overlay for this role', 'ad-block-guard'))
                            ->set_default_value(false)
                            ->set_help_text(__('Enabling this overlay will guard your content against AdBlockers with this user role.', 'ad-block-guard'))



                            ->set_width(35),

                        Field::make('checkbox', 'allow_close', __('Allow overlay close', 'ad-block-guard'))
                            ->set_help_text(__('Uncheck to force users to disable their AdBlocker', 'ad-block-guard'))
                            ->set_width(20),

                        Field::make('checkbox', 'allow_scroll', __('Allow content scrolling', 'ad-block-guard'))
                            ->set_help_text(__('Uncheck to disable content scrolling while overlay is active', 'ad-block-guard'))
                            ->set_width(20),

                        Field::make('number', 'overlay_delay', __('Overlay delay in seconds after page load', 'ad-block-guard'))
                            ->set_min(0)
                            ->set_max(99)
                            ->set_step(1)
                            ->set_default_value(0)
                            ->set_width(25),

                        Field::make('radio', 'theme', __('Overlay Theme', 'ad-block-guard'))
                            ->set_options([
                                'Compact' => __('Compact', 'ad-block-guard'),
                                'Medium' => __('Medium', 'ad-block-guard'),
                                'Large' => __('Large', 'ad-block-guard'),
                            ])
                            ->set_width(20),

                        // Overlay Coloring
                        Field::make('color', 'background_color', __('Page Opacity', 'ad-block-guard'))
                            ->set_default_value('#000000D9')
                            ->set_alpha_enabled(true)
                            ->set_help_text(__('Color of the page opacity', 'ad-block-guard'))
                            ->set_width(20),

                        Field::make('color', 'foreground_color', __('Overlay Color', 'ad-block-guard'))
                            ->set_default_value('#AC0000D9')
                            ->set_alpha_enabled(true)
                            ->set_help_text(__('Primary popup color', 'ad-block-guard'))
                            ->set_width(20),

                        Field::make('color', 'window_color', __('Overlay Background', 'ad-block-guard'))
                            ->set_default_value('#FFFFFFFF')
                            ->set_alpha_enabled(true)
                            ->set_help_text(__('Popup text background color', 'ad-block-guard'))
                            ->set_width(20),

                        // Overlay Title
                        Field::make('text', 'overlay_title', __('Overlay Title', 'ad-block-guard'))
                            ->set_attribute('type', 'string')
                            ->set_attribute('max', 75)
                            ->set_attribute('min', 5)
                            ->set_width(50)
                            ->set_default_value(__('AdBlock Detected', 'ad-block-guard'))
                            ->set_help_text(__('Minimum 5 and maximum 75 characters.', 'ad-block-guard')),

                        Field::make('color', 'title_text_color', __('Overlay Title Color', 'ad-block-guard'))
                            ->set_default_value('#FFFFFF')
                            ->set_alpha_enabled(false)
                            ->set_help_text(__('Overlay title text color', 'ad-block-guard'))
                            ->set_width(25),

                        Field::make('color', 'message_text_color', __('Message Text Color', 'ad-block-guard'))
                            ->set_default_value('#111111')
                            ->set_alpha_enabled(false)
                            ->set_help_text(__('Overlay message text color', 'ad-block-guard'))
                            ->set_width(25),

                        // Overlay Message
						Field::make('rich_text', 'overlay_message', __('Overlay Message', 'ad-block-guard'))
						    ->set_attribute('maxLength', 2000)
						    ->set_width(100)
						    ->set_classes('ad-block-guard-rich-text')
						    ->set_settings(array(
						        'media_buttons' => false,  // Disable the "Add Media" button
						        'tinymce' => array(
						            'toolbar1' => 'bold italic | fontsizeselect forecolor | link unlink | alignleft aligncenter alignright alignjustify',
						            'toolbar2' => '',
						            'plugins' => 'link lists textcolor paste',
						            'fontsize_formats' => '15px 16px 17px 18px 20px',
						            'content_style' => 'body { font-size: 16px; }',
						            'height' => 180,
						            'paste_as_text' => true, // Paste content as plain text
						            'paste_remove_styles' => true, // Remove all inline styles
						            'paste_remove_spans' => true,  // Remove span tags
						            'paste_strip_class_attributes' => 'all', // Remove all class attributes
						            'valid_elements' => 'a[href|target],strong/b,em/i,p[style],br,font,span[style]', // Allow only specific elements
						            'extended_valid_elements' => 'p[style],span[style]', // Specifically allow span with inline styles if needed
						            'content_css' => ADBLOCKGUARD_PLUGIN_URL . 'assets/css/editor-style.css',
						        ),
						    ))
                            ->set_help_text(__('Careful adding too much content.  This needs to render nicely for mobile.', 'ad-block-guard')),

                        // Buttons logic
                        Field::make('complex', 'buttons', __('Buttons', 'ad-block-guard'))
                            ->set_attribute('data-id', 'buttons')
                            ->set_layout('tabbed-vertical')
                            ->set_max(4)
                            ->add_fields([
                                Field::make('urlpicker', 'link', __('Link', 'ad-block-guard')),
                                Field::make('color', 'background_color', __('Button Color', 'ad-block-guard'))
                                    ->set_default_value('#007cba'),
                                Field::make('color', 'foreground_color', __('Text Color', 'ad-block-guard'))
                                    ->set_default_value('#ffffff'),
                            ])
                            ->set_header_template('<%- link.anchor ? link.anchor : "Unlinked Button" %>'),

                    ])
                    ->set_header_template('<%- usergroup.charAt(0).toUpperCase() + usergroup.slice(1).toLowerCase() %>')
                    ->set_attribute('data-tab-general', 'general'),
            ])


        	////////////////////////////////////////////////////////////////////////////
        	////////////////////////////////////////////////////////////////////////////
            // Exclusions

            ->add_tab(__('AdBlock exclusions', 'ad-block-guard'), [
                Field::make('html', 'wuadblockguard_exclude_text')
                    ->set_html('<h1>' . __('AdBlock exclusions', 'ad-block-guard') . '</h1><p>' . __('You must enable the exclusion category in order for your exclusions to be recognize and implemented.', 'ad-block-guard') . '</p>'),

                // Special Pages section
                Field::make('checkbox', 'wuadblockguard_exclude_special_pages_check', __('Exclude AdBlock on Special Pages & Page Types', 'ad-block-guard'))
                    ->set_default_value(defined('ADBLOCKGUARD_IS_PRO')),
                Field::make('multiselect', 'wuadblockguard_exclude_special_pages', __('Exclude on Specific Special Pages:', 'ad-block-guard'))
                    ->add_options([
                        'is_front_page' => __('Front Page', 'ad-block-guard'),
                        'is_home' => __('Blog Posts Index', 'ad-block-guard'),
                        'is_singular' => __('Singular Post/Page/Custom Post Type', 'ad-block-guard'),
                        'is_single' => __('Single Posts', 'ad-block-guard'),
                        'is_archive' => __('Archive Pages', 'ad-block-guard'),
                        'is_category' => __('Category Archive', 'ad-block-guard'),
                        'is_tag' => __('Tag Archive', 'ad-block-guard'),
                        'is_tax' => __('Custom Taxonomy Archive', 'ad-block-guard'),
                        'is_search' => __('Search Results Page', 'ad-block-guard'),
                        'is_404' => __('404 Not Found Page', 'ad-block-guard'),
                        'login_page' => __('Login Page', 'ad-block-guard'),
                        'registration_page' => __('Registration Page', 'ad-block-guard'),
                    ])
                    ->set_default_value(['login_page'])
                    ->set_conditional_logic(defined('ADBLOCKGUARD_IS_PRO') ? [
                            [
                                'field' => 'wuadblockguard_exclude_special_pages_check',
                                'value' => true,
                                'compare' => '=',
                            ],
                        ] : []),

                // Pages section
                Field::make('checkbox', 'wuadblockguard_exclude_pages_check', __('Exclude AdBlock on Specific Pages', 'ad-block-guard'))
                    ->set_default_value(false),
                Field::make('multiselect', 'wuadblockguard_exclude_pages', __('Exclude on Specific Pages:', 'ad-block-guard'))
                    ->add_options($non_woo_pages)
                    ->set_conditional_logic(defined('ADBLOCKGUARD_IS_PRO') ? [
                            [
                                'field' => 'wuadblockguard_exclude_pages_check',
                                'value' => true,
                                'compare' => '=',
                            ],
                        ] : []),

                // Posts section
                Field::make('checkbox', 'wuadblockguard_exclude_posts', __('Exclude AdBlock on Specific Types of Posts (Categories/Tags)', 'ad-block-guard'))
                    ->set_default_value(false),
                Field::make('multiselect', 'wuadblockguard_exclude_categories', __('Exclude on Specific Categories:', 'ad-block-guard'))
                    ->add_options($category_options)
                    ->set_conditional_logic(defined('ADBLOCKGUARD_IS_PRO') ? [
                            [
                                'field' => 'wuadblockguard_exclude_posts',
                                'value' => true,
                                'compare' => '=',
                            ],
                        ] : []),

                Field::make('multiselect', 'wuadblockguard_exclude_tags', __('Exclude on Specific Tags:', 'ad-block-guard'))
                    ->add_options($tag_options)
                    ->set_conditional_logic(defined('ADBLOCKGUARD_IS_PRO') ? [
                            [
                                'field' => 'wuadblockguard_exclude_posts',
                                'value' => true,
                                'compare' => '=',
                            ],
                        ] : []),

                // WooCommerce Pages section
                Field::make('checkbox', 'wuadblockguard_exclude_woocommerce', __('Exclude AdBlock on WooCommerce Pages', 'ad-block-guard'))
                    ->set_default_value(false),
                Field::make('multiselect', 'wuadblockguard_exclude_woocommerce_pages', __('Exclude on Specific WooCommerce Pages:', 'ad-block-guard'))
                    ->add_options([
                        'is_shop' => __('[WooCommerce] Shop Page', 'ad-block-guard'),
                        'is_product_category' => __('[WooCommerce] Product Category Archive', 'ad-block-guard'),
                        'is_product_tag' => __('[WooCommerce] Product Tag Archive', 'ad-block-guard'),
                        'is_product' => __('[WooCommerce] Single Product Page', 'ad-block-guard'),
                        'is_cart' => __('[WooCommerce] Cart Page', 'ad-block-guard'),
                        'is_checkout' => __('[WooCommerce] Checkout Page', 'ad-block-guard'),
                        'is_account_page' => __('[WooCommerce] My Account Page', 'ad-block-guard'),
                        'is_order_received_page' => __('[WooCommerce] Order Received Page', 'ad-block-guard'),
                    ])
                    ->set_default_value([
                        'is_shop',
                        'is_cart',
                        'is_checkout',
                    ])
                    ->set_conditional_logic(defined('ADBLOCKGUARD_IS_PRO') ? [
                            [
                                'field' => 'wuadblockguard_exclude_woocommerce',
                                'value' => true,
                                'compare' => '=',
                            ],
                        ] : []),

                Field::make('textarea', 'wuadblockguard_ignore_urls', __('Exclude the following relative URLs', 'ad-block-guard'))
                    ->set_default_value('/wp-login.php')
                    ->set_attribute('placeholder', "/my-custom-wordpress-url
/matching-wildcard*")
                    ->set_help_text(__('Enter page paths separated by newline, supports wildcards *, example:<br/><br/>/some-page/here<br/>/allpages-here/*<br/>/another-page/', 'ad-block-guard')),
            ])

        	


        	////////////////////////////////////////////////////////////////////////////
        	////////////////////////////////////////////////////////////////////////////
            // Advanced Settings Tab


            ->add_tab(__('Advanced settings', 'ad-block-guard'), [
                Field::make('html', 'wuadblockguard_advanced_text')
                    ->set_html('<h1>' . __('Advanced settings', 'ad-block-guard') . '</h1>'),                
                

/*
                Field::make('checkbox', 'wuadblockguard_exclude_user_roles_check', __('Exclude roles from AdBlock Guard', 'ad-block-guard'))
                    ->set_default_value(false),

		        Field::make('multiselect', 'wuadblockguard_exclude_user_roles', __('Select roles you want to hide and delete from AdBlock Guard (overlay settings will be lost)', 'ad-block-guard'))
		            ->set_options(function() {
		                // Get all roles dynamically
		                $roles = wp_roles()->get_names();
		                $formatted_roles = [];
		                foreach ($roles as $key => $name) {
		                    $formatted_roles[$key] = $name;
		                }
		                return $formatted_roles;
		            })
                    ->set_conditional_logic(defined('ADBLOCKGUARD_IS_PRO') ? [
                            [
                                'field' => 'wuadblockguard_exclude_user_roles_check',
                                'value' => true,
                                'compare' => '=',
                            ],
                        ] : []),

*/
                Field::make('checkbox', 'wuadblockguard_hide_from_crawlers', __('Hide from robots and crawlers (recommended)', 'ad-block-guard'))
                    ->set_default_value(true),
                Field::make('checkbox', 'wuadblockguard_prevent_masquerading', __('Prevent users from masquerading as crawlers (recommended)', 'ad-block-guard'))
                    ->set_default_value(false),
                Field::make('checkbox', 'wuadblockguard_disable_demo_reminder', __('Disable the reminder that demo mode always re-enables the overlay close link', 'ad-block-guard'))
                    ->set_default_value(false),
                Field::make('checkbox', 'wuadblockguard_live_easylist', __('Process from live Easy List (recommended)', 'ad-block-guard')),
                Field::make('text', 'wuadblockguard_easylist_url', __('uBlock or EasyList Url', 'ad-block-guard'))
                    ->set_attribute('type', 'url')
                    ->set_attribute('maxLength', 256)
                    ->set_attribute('placeholder', 'https://easylist.to/easylist/easylist.txt')
                    ->set_default_value('https://easylist.to/easylist/easylist.txt'),
                    /*
                    ->set_help_text(__('Default: https://easylist.to/easylist/easylist.txt', 'ad-block-guard') . 
                        '<br><br>' . 
                        __('Acceptable alternate lists:', 'ad-block-guard') . 
                        '<br><br>' . 
                        '<div class="wu-ad-block-guard-scrollable-content">' . 
                        $this->getEasyListUrls() . '</div>'),
                    */
                Field::make('checkbox', 'wuadblockguard_debug', __('Enable debugging', 'ad-block-guard')),
       ]);

       return $container_id;

    }

    public function get_usergroups_by_key() {
    	$db_usergroups = carbon_get_theme_option('wuadblockguard_usergroup_settings');

    	if (empty($db_usergroups)) {
    		return false;
    	}

    	$key_usergroups = [];

    	foreach ($db_usergroups as $usergroup) {
    		$key_usergroups[$usergroup['usergroup']] = $usergroup;
    	}

    	return $key_usergroups;

    }


    private function sync_user_groups()
    {

    	$changes_made = 0;

        // Get the current roles in WordPress
        $current_roles = wp_roles()->get_names();
   
   		// are we excluding roles check
        $exclude_user_roles_check = carbon_get_theme_option('wuadblockguard_exclude_user_roles_check');

        // Get the existing user group settings
        $existing_groups = carbon_get_theme_option('wuadblockguard_usergroup_settings');

        if (empty($existing_groups)) {
			PluginLogger::log('debug', __CLASS__ . ': DEFAULT INSTALL: No existing user groups found.', [
			    'bypass' => true,
			]);
        }
        
        // Create administrator role
        $administrator = ['administrator' => $current_roles['administrator']];

        // Create guest role
        $guest = ['guest' => 'Guest'];

        // removes excluded roles from our list of current roles
		if ($exclude_user_roles_check && false) {

			$keys_usergroups = $this->get_usergroups_by_key();

		    $ignored_roles = carbon_get_theme_option('wuadblockguard_exclude_user_roles');
		    foreach ($ignored_roles as $ignored_role) {
		        if (isset($current_roles[$ignored_role])) {
		            unset($current_roles[$ignored_role]);
		            $changes_made++;
		        }
		    }
		}

		// Order roles with guest and admin first
        $current_roles = $guest + $current_roles;

        // Map existing groups by usergroup key
        $existing_groups_map = [];
        foreach ($existing_groups as $group) {
            $existing_groups_map[$group['usergroup']] = $group;
        }

        // Prepare the updated groups array
        $updated_groups = [];

        // Add or update roles that exist in WordPress, maintaining the desired order
        foreach ($current_roles as $role_key => $role_name) {
            if (isset($existing_groups_map[$role_key])) {
                // Role exists, use the existing settings
                $updated_groups[] = $existing_groups_map[$role_key];
            } else {
                // Role is new, use default settings
                $updated_groups[] = $this->generate_default_group_for_role($role_key, $role_name);

	            PluginLogger::log('debug', "Adding role: $role_name", [
	                'bypass' => true,
	            ]);
	            $changes_made++;
            }
        }

        // ONLY RE_SAVE if changes have been made
        if ($changes_made) {

			PluginLogger::log('debug', __CLASS__ . ': sync_user_groups(): carbon_set_theme_option()', [
				'$updated_groups' => $updated_groups,
			    'bypass' => true,
			]);

        	carbon_set_theme_option('wuadblockguard_usergroup_settings', $updated_groups);
        }
        
    }

    private function generate_default_group_for_role($role_key, $role_name)
    {
    	
        $defaults =  [
            'usergroup' => $role_key,
            'overlay_enabled' => in_array($role_key, ['guest', 'administrator']),
            'theme' => 'Compact',
            'background_color' => '#000000D9',
            'window_color' => '#FFFFFFFF',
            'title_text_color' => '#FFFFFF',
            'message_text_color' => '#111111',
            'foreground_color' => '#AC0000D9',
            'allow_close' => true,
            'allow_scroll' => false,
            'overlay_delay' => 0,
            'overlay_title' => __('AdBlock Detected', 'ad-block-guard'),
            'overlay_message' => __('<p style="text-align: center;">We rely on ads to keep our website running and provide the content you enjoy.</p><p style="text-align: center;">Please consider disabling your ad blocker to support us. Thank you!</p>', 'ad-block-guard'),
        ];

        if ($this->is_registration_enabled() && $role_key == 'guest') {

	        $guest_buttons = [
	            [
	                'link' => [
	                    'url' => wp_registration_url(),
	                    'anchor' => __('Register Now', 'ad-block-guard'),
	                    'blank' => false,
	                ],
	                'background_color' => '#005fba',
	                'foreground_color' => '#ffffff',
	            ],
	            [
	                'link' => [
	                    'url' => wp_login_url(),
	                    'anchor' => __('Login Now', 'ad-block-guard'),
	                    'blank' => false,
	                ],
	                'background_color' => '#ba007c',
	                'foreground_color' => '#ffffff',
	            ]
	        ];

	        $defaults['buttons'] = $guest_buttons;
	    }

	    return $defaults;

    }

	private function is_registration_enabled() {
	    return (bool) get_option('users_can_register');
	}

    private function getEasyListUrls() {
        $urls = [
            'https://easylist-downloads.adblockplus.org/easylist.txt',
            'https://easylist-downloads.adblockplus.org/abpindo+easylist.txt',
            'https://easylist-downloads.adblockplus.org/abpvn+easylist.txt',
            'https://easylist-downloads.adblockplus.org/bulgarian_list+easylist.txt',
            'https://easylist-downloads.adblockplus.org/dandelion_sprouts_nordic_filters+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistchina+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistchina.txt',
            'https://easylist-downloads.adblockplus.org/easylistczechslovak+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistdutch+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistdutch.txt',
            'https://easylist-downloads.adblockplus.org/easylistgermany+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistgermany.txt',
            'https://easylist-downloads.adblockplus.org/israellist+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistitaly+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistitaly.txt',
            'https://easylist-downloads.adblockplus.org/easylistlithuania+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistpolish+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistpolish.txt',
            'https://easylist-downloads.adblockplus.org/easylistportuguese+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistportuguese.txt',
            'https://easylist-downloads.adblockplus.org/easylistspanish+easylist.txt',
            'https://easylist-downloads.adblockplus.org/easylistspanish.txt',
            'https://easylist-downloads.adblockplus.org/global-filters+easylist.txt',
            'https://easylist-downloads.adblockplus.org/global-filters.txt',
            'https://easylist-downloads.adblockplus.org/hufilter+easylist.txt',
            'https://easylist-downloads.adblockplus.org/indianlist+easylist.txt',
            'https://easylist-downloads.adblockplus.org/indianlist.txt',
            'https://easylist-downloads.adblockplus.org/japanese-filters+easylist.txt',
            'https://easylist-downloads.adblockplus.org/japanese-filters.txt',
            'https://easylist-downloads.adblockplus.org/koreanlist+easylist.txt',
            'https://easylist-downloads.adblockplus.org/koreanlist.txt',
            'https://easylist-downloads.adblockplus.org/latvianlist+easylist.txt',
            'https://easylist-downloads.adblockplus.org/liste_fr+easylist.txt',
            'https://easylist-downloads.adblockplus.org/liste_fr.txt',
            'https://easylist-downloads.adblockplus.org/liste_ar+liste_fr+easylist.txt',
            'https://easylist-downloads.adblockplus.org/Liste_AR.txt',
            'https://easylist-downloads.adblockplus.org/rolist+easylist.txt',
            'https://easylist-downloads.adblockplus.org/ruadlist+easylist.txt',
            'https://easylist-downloads.adblockplus.org/advblock.txt',
            'https://easylist-downloads.adblockplus.org/turkish-filters+easylist.txt',
            'https://easylist-downloads.adblockplus.org/turkish-filters.txt',
            'https://easylist-downloads.adblockplus.org/abp-filters-anti-cv.txt',
            'https://easylist-downloads.adblockplus.org/fanboy-notifications.txt',
            'https://easylist-downloads.adblockplus.org/easyprivacy.txt',
            'https://easylist-downloads.adblockplus.org/easyprivacy+easylist.txt',
            'https://easylist-downloads.adblockplus.org/fanboy-social.txt'
        ];

        return implode("\n", $urls);
    }


    private function enableVersion()
    {
        if (defined('ADBLOCKGUARD_IS_PRO')) exit; else define( 'ADBLOCKGUARD_IS_PRO', true);
    }
}




