<?php

namespace DCL\Admin;

/**
 * Admin: settings.
 *
 * Registers plugin settings page.
 *
 * @package    DCL\Admin
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Settings extends DCL_Admin
{

    /**
     * Support link to get a login id.
     *
     * @var string
     */
    var $dcl_support_login_link = 'http://flexikon.doccheck.com/de/DocCheck:DocCheck_Login_f%C3%BCr_Ihre_Website';

    /**
     * Support link to cream.
     *
     * @var string
     */
    var $dcl_support_cream_link = 'https://crm.doccheck.com/';

    /**
     * Support link to industry.
     *
     * @var string
     */
    var $dcl_industry_link = 'https://more.doccheck.com/en/industry/';

    /**
     * Support link to industry.
     *
     * @var string
     */
    var $dcl_brochure_link = 'https://more.doccheck.com/fileadmin/user_upload/files/industry/b2b-landingpage/industry-erste-hilfe-kasten-login_licences_en.pdf';

    /**
     * Support email adresse to get client secret.
     *
     * @var string
     */
    var $dcl_support_client_secret_email = 'industry@doccheck.com';


    /**
     * Register settings page.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_register_settings_page()
    {
        add_options_page(
            esc_html__('DocCheck Login', 'doccheck-login'),
            esc_html__('DocCheck Login', 'doccheck-login'),
            'manage_options',
            $this->plugin_name,
            [$this, 'dcl_settings_page']
        );
    }

    /**
     * Render settings page.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_settings_page()
    { ?>
        <div class="wrap">
            <h1><?php esc_html_e('DocCheck Login', 'doccheck-login'); ?></h1>
            <form method="post" action="options.php"><?php

                // Display settings
                do_settings_sections($this->plugin_name);
                settings_fields('dcl-settings');
                submit_button();

                ?></form>

            <script>

                function getCookie(cname) {
                    var name = cname + "=";
                    var decodedCookie = decodeURIComponent(document.cookie);
                    var ca = decodedCookie.split(';');
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) == ' ') {
                            c = c.substring(1);
                        }
                        if (c.indexOf(name) == 0) {
                            return c.substring(name.length, c.length);
                        }
                    }
                    return "";
                }

                document.getElementById('dcl_general_profession_routing_active').addEventListener('change', function () {
                    // Setup siblings array
                    var siblings = [];

                    if (this.value === 1) {
                        this.value = 0;
                    } else {
                        this.value = 1;
                    }

                    elem = this.parentNode.parentNode.parentNode.nextElementSibling;

                    // As long as a sibling exists
                    while (elem) {
                        siblings.push(elem);
                        elem = elem.nextElementSibling;

                    }

                    siblings[0].style.display = 'none';

                    for (var i = 1; i < siblings.length - 1; i++) {
                        if (this.checked == true) {

                            if (siblings[i].className !== "ap-dc-none") {
                                siblings[i].style.display = 'table-row';

                                routine_first_jobs = document.getElementById("dcl_general_jobs");
                                //routine_first_jobs.parentNode.parentNode.parentNode.style.display = 'table-cell';
                                document.getElementById("add").parentNode.parentNode.style.display = 'table-cell';
                            }
                        } else {
                            siblings[i].style.display = 'none';
                        }

                    }

                });

            </script>

            <script>

                window.onload = function (e) {
                    current_val = 0

                    current_val = document.getElementById("dcl_general_add_profession_routing").value;

                    document.cookie = "currentNum = " + current_val;
                    document.cookie = "repeaterNum = 0";
                    value = current_val;
                    ap_dclogin_pages = document.querySelectorAll(".ap-dclogin--pages");
                    document.getElementById("dcl_general_add_profession_routing").parentNode.parentNode.style.display = 'none';

                    for (var i = 0; i < ap_dclogin_pages.length; i++) {
                        ap_dclogin_pages[i].parentNode.parentNode.style.display = 'none';
                        ap_dclogin_pages[i].parentNode.parentNode.className = 'ap-dc-none';
                    }

                    <?php if(!get_option('dcl_general_profession_routing_active')) { ?>
                    routine_first_jobs = document.getElementById("dcl_general_jobs");
                    routine_first_jobs.parentNode.parentNode.parentNode.style.display = 'none';
                    document.getElementById("dcl_general_add_profession_routing").parentNode.parentNode.style.display = 'none';
                    document.getElementById("add").parentNode.parentNode.style.display = 'none';
                    document.getElementById("dcl_general_redirect_page_id").parentNode.parentNode.style.display = 'none';

                    <?php } ?>
                }


            </script>


        </div>
    <?php }

    /**
     * Help box on settings page.
     */
    public function dcl_settings_page_help()
    {
        $screen = get_current_screen();
        /* translators: DocCheck Indsutry link */
        $dc_industry = esc_html__('In order for this plugin to work you\'ll need: # A DocCheck login (see <a href="%s" target="_blank">DocCheck Indsutry</a> for help).', 'doccheck-login');
        /* translators:  DocCheck Brochure link  */
        $dcl_brochure_link = esc_html__('To run the plugin an economy or business license is needed. Please check our <a href="%s" target="_blank">license brochure</a> for pricing and feature details.', 'doccheck-login');
        /* translators:  DocCheck Client Secret Email  */
        $dcl_support_client_secret_email = esc_html__('To request a license, please send an email to <a href="mailto:%1$s">%1$s</a> referencing your login ID.', 'doccheck-login');
        /* translators:  DocCheck Support Cream Link  */
        $dcl_support_cream_link = esc_html__('Fill in the form below according to the information given by the DocCheck login administration backend (see <a href="%1$s" target="_blank">%2$s</a>).', 'doccheck-login');
        // Help tab: first steps
        $screen->add_help_tab([
            'id' => 'first_steps',
            'title' => esc_html__('First steps', 'doccheck-login'),
            'content' =>
                '<p>' . sprintf($dc_industry, $this->dcl_industry_link) . '</p>'
                . '<ol>'
                . '<li>' . sprintf($dcl_brochure_link, $this->dcl_brochure_link) . '</li>'
                . '<li>' . sprintf($dcl_support_client_secret_email, $this->dcl_support_client_secret_email) . '<br/>'
                . esc_html__('Note that we recommend exchange of the secret via a secure communications channel, so make sure to include your phone number if desired.', 'doccheck-login')
                . '</li>'
                . '<li>' . sprintf($dcl_support_cream_link, $this->dcl_support_cream_link, 'CReaM') . '<br/>'
                . '</ol>'
        ]);

        // Help tab: shortcodes
        $screen->add_help_tab([
            'id' => 'shortcodes',
            'title' => esc_html__('Shortcodes', 'doccheck-login'),
            'content' =>
                '<p>' . esc_html__('There are a few shortcods available:', 'doccheck-login') . '</p>'

                . '<p><strong>' . esc_html__('Login form', 'doccheck-login') . '</strong></p>'
                . '<p><code>[dc-login]</code></p>'

                . '<p><strong>' . esc_html__('Logout link', 'doccheck-login') . '</strong></p>'
                . '<p><code>[dc-logout-link]</code></p>'

                . '<p><strong>' . esc_html__('HTML sitemap', 'doccheck-login') . '</strong></p>'
                . '<p><code>[dc-html-sitemap]</code></p>'
                . '<p>' . esc_html__('Displays sitemap with or without access restricted pages, depending on the users login state.', 'doccheck-login') . '</p>'

                . '<p><strong>' . esc_html__('Hide content', 'doccheck-login') . '</strong></p>'
                . '<p><code>[dc-hide-content]Hidden content[/dc-hide-content]</code></p>'
                . '<p>' . esc_html__('Hides content for users that are not logged in via DocCheck.', 'doccheck-login') . '</p>'
        ]);
    }


    public function test_0_callback()
    {
        printf(
            '<input class="regular-text" type="text" name="dclogin_option_name[test_0]" id="test_0" value="%s">',
            isset($this->dclogin_options['test_0']) ? esc_attr($this->dclogin_options['test_0']) : ''
        );
    }


    /**
     * Register settings.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_register_settings()
    {
        $settings_page = $this->plugin_name;
        $settings_section_general = $this->plugin_name . '-general-settings';
        $settings_section_form = $this->plugin_name . '-form-settings';
        $setting_number_current = get_option('dcl_general_add_profession_routing');
        if (isset($_COOKIE['repeaterNum'])) {
            // Sanitize and validate the input using absint()
            $setting_number_jobs = absint(sanitize_text_field($_COOKIE['repeaterNum']));

            // Escape the output for safe use in HTML attributes using esc_attr()
            $setting_number_jobs = esc_attr($setting_number_jobs);
        } else {
            $setting_number_jobs = 0;
        }


        // Sections
        add_settings_section(
            $settings_section_general,
            esc_html__('General', 'doccheck-login'),
            [$this, 'dcl_section_general_callback'],
            $settings_page
        );

        add_settings_section(
            $settings_section_form,
            esc_html__('Form presets', 'doccheck-login'),
            [$this, 'dcl_section_form_callback'],
            $settings_page
        );
        $group_array_job = [];
        $group_array_page = [];
        $group_array_job_current = [];
        $group_array_page_current = [];

        if ($setting_number_current !== 0 && get_option('dcl_general_profession_routing_active')) {
            for ($y = 0; $y < $setting_number_current; $y++) {

                if (get_option('dcl_general_jobs' . $y) != '' && get_option('dcl_general_jobs' . $y) != null) {


                    $group_array_job_current[$y] = array(
                        'name' => 'dcl_general_jobs' . $y,
                        'title' => '',
                        'section' => $settings_section_general,
                        'type' => 'repeater',
                        'atts' => [
                            'option_name_job' => 'dcl_general_jobs' . $y,
                            'select_options_job' => $this->dcl_get_form_occupational(),
                            'option_name_page' => 'dcl_general_pages' . $y,
                            'select_options_page' => $this->dcl_get_pages_for_select(),
                            'type' => 'job'
                        ]
                    );


                    $group_array_page_current[$y] = array(
                        'name' => 'dcl_general_pages' . $y,
                        'title' => '',
                        'section' => $settings_section_general,
                        'type' => 'repeater',
                        'atts' => [
                            'option_name_job' => 'dcl_general_jobs' . $y,
                            'select_options_job' => $this->dcl_get_form_occupational(),
                            'option_name_page' => 'dcl_general_pages' . $y,
                            'select_options_page' => $this->dcl_get_pages_for_select(),
                            'type' => 'page'
                        ]

                    );
                }
            }

        }
        if ($setting_number_jobs !== 0) {
            for ($i = $setting_number_current; $i < $setting_number_jobs; $i++) {
                $group_array_job[$i] = array(
                    'name' => 'dcl_general_jobs' . $i,
                    'title' => '',
                    'section' => $settings_section_general,
                    'type' => 'repeater',
                    'atts' => [
                        'option_name_job' => 'dcl_general_jobs' . $i,
                        'select_options_job' => $this->dcl_get_form_occupational(),
                        'option_name_page' => 'dcl_general_pages' . $i,
                        'select_options_page' => $this->dcl_get_pages_for_select(),
                        'type' => 'job'
                    ]
                );


                $group_array_page[$i] = array(
                    'name' => 'dcl_general_pages' . $i,
                    'title' => '',
                    'section' => $settings_section_general,
                    'type' => 'repeater',
                    'atts' => [
                        'option_name_job' => 'dcl_general_jobs' . $i,
                        'select_options_job' => $this->dcl_get_form_occupational(),
                        'option_name_page' => 'dcl_general_pages' . $i,
                        'select_options_page' => $this->dcl_get_pages_for_select(),
                        'type' => 'page'
                    ]

                );

            }
        }


        // Fields
        $settings1 = [
            // Section general
            [
                'name' => 'dcl_general_login_id',
                'title' => esc_html__('Login id', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'text',
            ],
            [
                'name' => 'dcl_general_login_id_debug',
                'title' => esc_html__('Login id (debug mode)', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'text'
            ],
            [
                'name' => 'dcl_client_secret',
                'title' => esc_html__('Client secret', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'text',
            ],
            [
                'name' => 'dcl_client_secret_debug',
                'title' => esc_html__('Client secret (debug mode)', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'text',
            ],
            [
                'name' => 'dcl_general_login_page_id',
                'title' => esc_html__('Login page', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'select',
                'atts' => [
                    'select_options' => $this->dcl_get_pages_for_select(),
                    'default' => $this->dcl_page_login_id,
                ]
            ],
            [
                'name' => 'dcl_general_professional_circles_page_id',
                'title' => esc_html__('Target page', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'select',
                'atts' => [
                    'select_options' => $this->dcl_get_pages_for_select(),
                    'default' => $this->dcl_page_professional_circles_id,
                ]
            ],


            [
                'name' => 'dcl_general_profession_routing_active',
                'title' => esc_html__('Profession routing', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'checkbox',
                'atts' => [
                    'label' => esc_html__('activated', 'doccheck-login'),
                ]
            ],

            [
                'name' => 'dcl_general_add_profession_routing',
                'title' => esc_html__('Add profession routing', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'repeater',
                'atts' => [
                    'option_name_job' => 'dcl_general_jobs',
                    'select_options' => $this->dcl_get_form_occupational(),
                    'option_name_page' => 'dcl_general_pages',
                    'select_options_page' => $this->dcl_get_pages_for_select(),
                    'type' => 'add'

                ]
            ],

            [
                'name' => 'dcl_general_jobs',
                'title' => '',
                'section' => $settings_section_general,
                'type' => 'repeater',
                'atts' => [
                    'option_name_job' => 'dcl_general_jobs',
                    'select_options_job' => $this->dcl_get_form_occupational(),
                    'option_name_page' => 'dcl_general_pages',
                    'select_options_page' => $this->dcl_get_pages_for_select(),
                    'type' => 'job'
                ]

            ],
            [
                'name' => 'dcl_general_pages',
                'title' => '',
                'section' => $settings_section_general,
                'type' => 'repeater',
                'atts' => [
                    'option_name_job' => 'dcl_general_jobs',
                    'select_options_job' => $this->dcl_get_form_occupational(),
                    'option_name_page' => 'dcl_general_pages',
                    'select_options_page' => $this->dcl_get_pages_for_select(),
                    'type' => 'page'
                ]
            ]


        ];

        $settings = [

            [
                'name' => 'dcl_general_redirect_page_id',
                'title' => esc_html__('\'Profession group restricted\' redirect page', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'select',
                'atts' => [
                    'select_options' => $this->dcl_get_pages_for_select(),
                    'default' => $this->dcl_page_redirect_id,
                ]
            ],

            [
                'name' => 'dcl_general_hide_menu_items',
                'title' => esc_html__('Menu items', 'doccheck-login'),
                'section' => $settings_section_general,
                'type' => 'checkbox',
                'atts' => [
                    'label' => esc_html__('Hide access restricted page from menus', 'doccheck-login'),
                ]
            ],

            // Section form
            [
                'name' => 'dcl_form_size',
                'title' => esc_html__('Size', 'doccheck-login'),
                'section' => $settings_section_form,
                'type' => 'select',
                'atts' => [
                    'select_options' => $this->dcl_get_form_sizes()
                ]
            ],
            [
                'name' => 'dcl_form_language',
                'title' => esc_html__('Language', 'doccheck-login'),
                'section' => $settings_section_form,
                'type' => 'select',
                'atts' => [
                    'select_options' => $this->dcl_get_form_languages()
                ]
            ],
            [
                'name' => 'dcl_general_set_language_by_wpml',
                'title' => esc_html__('Language (WPML)', 'doccheck-login'),
                'section' => $settings_section_form,
                'type' => 'checkbox',
                'atts' => [
                    'label' => esc_html__('Set language automatically using WPML', 'doccheck-login'),
                ]
            ],
            [
                'name' => 'dcl_form_custom_template',
                'title' => esc_html__('Custom template', 'doccheck-login'),
                'section' => $settings_section_form,
                'type' => 'text',
            ],
            [
                'name' => 'dcl_form_custom_template_width',
                'title' => esc_html__('Custom template width', 'doccheck-login'),
                'section' => $settings_section_form,
                'type' => 'text',
            ],
            [
                'name' => 'dcl_form_custom_template_height',
                'title' => esc_html__('Custom template height', 'doccheck-login'),
                'section' => $settings_section_form,
                'type' => 'text',
            ],
        ];

        $settings = array_merge($settings1, $group_array_job_current, $group_array_page_current, $group_array_job, $group_array_page, $settings);


        // Add and register settings
        foreach ($settings as $setting) {
            $setting['atts']['label_for'] = $setting['name'];
            $setting['atts']['option_name'] = $setting['name'];

            add_settings_field(
                $setting['name'],
                $setting['title'],
                [$this, 'dcl_render_' . $setting['type'] . '_field'],
                $settings_page,
                $setting['section'],
                $setting['atts']
            );

            $sanitze_callback = isset($setting['sanitize_callback']) ? $setting['sanitize_callback'] : '';

            register_setting('dcl-settings', $setting['name'], $sanitze_callback);
        }
    }

    /**
     * Display settings section general.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_section_general_callback()
    {
        // We currently have no intro text for this section.
    }

    /**
     * Display settings section form.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_section_form_callback()
    {
        // We currently have no intro text for this section.
    }

    /**
     * Render text field.
     *
     * @param   $atts
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_render_text_field($atts)
    {
        // Set attributes
        $option_name = $atts['option_name'];
        $placeholder = isset($atts['placeholder']) ? $atts['placeholder'] : '';
        $default = isset($atts['default']) ? $atts['default'] : false;
        $description = isset($atts['description']) ? $atts['description'] : false;

        // Get option value
        $value = get_option($option_name, $default);

        // Field markup
        ?><input type="text" class="regular-text"
                 id="<?php echo esc_attr($option_name); ?>"
                 name="<?php echo esc_attr($option_name); ?>"
                 value="<?php echo esc_attr($value) ?>"
                 placeholder="<?php echo esc_attr($placeholder) ?>" />

        <?php if ($description) : ?>
        <p class="description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
    <?php }

    /**
     * Render select field.
     *
     * @param   $atts
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_render_select_field($atts)
    {
        // Set attributes
        $option_name = $atts['option_name'];
        $select_options = isset($atts['select_options']) ? $atts['select_options'] : [];
        $default = isset($atts['default']) ? $atts['default'] : false;
        $description = isset($atts['description']) ? $atts['description'] : false;

        // Get option value
        $value = get_option($option_name, $default); ?>

        <select name="<?php echo esc_attr($option_name); ?>" id="<?php echo esc_attr($option_name); ?>">
            <?php foreach ($select_options as $option_key => $option_value) : ?>
                <option value="<?php echo esc_attr($option_key); ?>" <?php selected($value, $option_key); ?>><?php
                    echo esc_html($option_value);
                    ?></option>
            <?php endforeach; ?>
        </select>

        <?php if ($description) : ?>
        <p class="description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
    <?php }

    /**
     * Render checkbox.
     *
     * @param   $atts
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_render_checkbox_field($atts)
    {
        // Set attributes
        $option_name = $atts['option_name'];
        $label = isset($atts['label']) ? $atts['label'] : '';
        $default = isset($atts['default']) ? $atts['default'] : 0;
        $description = isset($atts['description']) ? $atts['description'] : false;

        // Get option value
        $value = get_option($option_name, $default);

        // Field markup
        ?><label for="<?php echo esc_attr($option_name); ?>">
        <input type="checkbox"
               id="<?php echo esc_attr($option_name); ?>"
               name="<?php echo esc_attr($option_name); ?>"
               value="1"
            <?php checked($value, 1, true); ?> />
        <?php echo esc_html($label); ?>
        </label>


        <?php if ($description) : ?>
        <p class="description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
    <?php }

    /**
     * Render select field.
     *
     * @param   $atts
     *
     * @since   1.0.7
     * @access  public
     */
    public function dcl_render_repeater_field($atts)
    {
        // Set attributes
        $option_name_job = $atts['option_name_job'];
        $option_name_add = $atts['option_name'];
        $option_name_page = $atts['option_name_page'];
        $option_type = isset($atts['type']) ? $atts['type'] : [];

        $select_options_job = isset($atts['select_options_job']) ? $atts['select_options_job'] : [];
        $select_options_page = isset($atts['select_options_page']) ? $atts['select_options_page'] : [];
        $default = isset($atts['default']) ? $atts['default'] : false;
        $description = isset($atts['description']) ? $atts['description'] : false;

        // Get option value
        $value_job = get_option($option_name_job, $default);
        $value_page = get_option($option_name_page, $default);
        $value_add = get_option($option_name_add, $default);
        // Get option value
        ?>


        <?php if ($option_type === 'add') { ?>

        <input type="number" hidden
               value="<?php echo get_option('dcl_general_profession_routing_active') ? esc_attr($value_add) : 0 ?>"
               name="<?php echo esc_attr($option_name_add); ?>"
               id="<?php echo esc_attr($option_name_add); ?>"/>

    <?php } elseif ($option_type === 'job') { ?>

        <div style="display: flex; align-items: center;">
            <select name="<?php echo esc_attr($option_name_job); ?>" id="<?php echo esc_attr($option_name_job); ?>">
                <?php foreach ($select_options_job as $option_key => $option_value) : ?>
                    <option value="<?php echo esc_attr($option_key); ?>" <?php selected($value_job, $option_key); ?>><?php
                        echo esc_html($option_value);
                        ?></option>
                <?php endforeach; ?>
            </select>


            <select name="<?php echo esc_attr($option_name_page); ?>" id="<?php echo esc_attr($option_name_page); ?>">
                <?php foreach ($select_options_page as $option_key => $option_value) : ?>
                    <option value="<?php echo esc_attr($option_key); ?>" <?php selected($value_page, $option_key); ?>><?php
                        echo esc_html($option_value);
                        ?></option>
                <?php endforeach; ?>
            </select>
            <?php if ($option_name_job == "dcl_general_jobs") { ?>
                <button type="button" id="add" onclick="incrementValue()"
                        style="background-color: #0073aa;border: 0;padding: 0 13px;color: white;
                            font-size: 26px;height: 40px;line-height: 35px; cursor: pointer; margin-left: 10px;">
                    +
                </button>


            <?php } ?>
            <?php if ($option_name_job != "dcl_general_jobs") { ?>
                <div class="ap-dc-delete" onclick="remove_routing(this);"
                     style="cursor:pointer; margin-left: 10px; color:red;">

                    delete?
                </div>
            <?php } ?>
        </div>

        <script>


            function remove_routing(element) {

                result = [],
                    node = element.parentNode.firstChild;

                while (node) {
                    if (node !== element && node.nodeType === Node.ELEMENT_NODE) {


                        result.push(node);

                    }

                    node = node.nextElementSibling || node.nextSibling;

                }

                result[0].selectedIndex = 0;
                result[1].selectedIndex = 0;

                element.parentNode.parentNode.parentNode.style.display = 'none';

            }

            function remove_dynamic_routing(element) {

                result = [],
                    node = element.parentNode.firstChild;

                while (node) {
                    if (node !== element && node.nodeType === Node.ELEMENT_NODE) {


                        result.push(node);

                    }

                    node = node.nextElementSibling || node.nextSibling;

                }

                result[0].selectedIndex = 0;
                result[1].selectedIndex = 0;

                element.parentNode.parentNode.parentNode.style.display = 'none';
                $repeaternumber = getCookie("repeaterNum");
                $repeaternumber = +$repeaternumber - 1;

                document.cookie = "repeaterNum = " + +$repeaternumber;

                value--;
            }


            function incrementValue() {

                value++;

                document.getElementById("dcl_general_add_profession_routing").value = value;

                document.cookie = "repeaterNum = " + value;
                diff = (+value - 1);


                var append = "<th scope=\"row\"></th> <td><div class=\"append_select\" id=\"append_select\" style=\"display: flex; align-items: center;\">\n" +
                    "<select name='dcl_general_jobs" + (diff) + "' id='dcl_general_jobs" + (diff) + "'>\n" +
                    "<?php foreach ( $select_options_job as $option_key => $option_value ) : ?>" +
                    "<option value='<?php echo esc_attr($option_key); ?>' >" +
                    "<?php echo esc_html($option_value); ?>" +
                    "</option>\n" +
                    "<?php endforeach; ?>\n" +
                    "</select>\n" +
                    "\n" +
                    "\n" +
                    "<select name='dcl_general_pages" + diff + "' id='dcl_general_pages" + diff + "'>\n" +
                    "<?php foreach ( $select_options_page as $option_key => $option_value ) : ?>" +
                    "<option value='<?php echo esc_attr($option_key); ?>' >" +
                    "<?php echo esc_html($option_value); ?>" +
                    "</option>\n" +
                    "<?php endforeach; ?>\n" +
                    "</select>" +
                    "<div class=\"ap-dc-delete\" onclick=\"remove_dynamic_routing(this);\"\n" +
                    "                     style=\"cursor:pointer; margin-left: 10px; color:red;\">\n" +
                    "\n" +
                    "                    delete?\n" +
                    "                </div>"
                "</div></td>";

                ap_dclogin_pages = document.querySelectorAll(".ap-dc-none");
                var el = document.createElement("tr");
                el.innerHTML = append;
                ap_dclogin_pages[ap_dclogin_pages.length - 1].parentNode.insertBefore(el, ap_dclogin_pages[ap_dclogin_pages.length - 1].nextSibling);


            }


        </script>


    <?php } elseif ($option_type === 'page') { ?>
        <div class="ap-dclogin--pages" style="display: none"></div>
    <?php } ?>


        <?php if ($description) : ?>
        <p class="description"><?php echo esc_html($description); ?></p>
    <?php endif; ?>
    <?php }


    /**
     * Get pages for select.
     *
     * @return  array $options With available pages.
     * @since   1.0.0
     * @access  public
     */
    private function dcl_get_pages_for_select()
    {
        $options = [];
        $pages = get_pages();

        // Add front page as default
        $options[0] = esc_html__('Front Page', 'doccheck-login');

        foreach ($pages as $page) {
            if ($page->post_parent > 0) {
                $options[$page->ID] = '- ' . $page->post_title;
                continue;
            }

            $options[$page->ID] = $page->post_title;
        }

        return $options;
    }

    /**
     * Get pages for select.
     *
     * @return  array $options With available pages.
     * @since   1.0.7
     * @access  public
     */

    private function dcl_get_form_occupational()
    {

        $dcl_form_occupational_groups = $this->dcl_get_occupational_group();

        return $dcl_form_occupational_groups;
    }


    /**
     * get profession grousp list.
     *
     *
     * @return array|mixed|object
     * @since   1.0.7
     */
    private function dcl_get_occupational_group()
    {


        $dcl_form_occupational_groups_en = [
            '' => 'Please choose a professional group',
            '19' => 'Alternative / Non-medical practitioner',
            '24' => 'Bio technican | Medical technican',
            '17' => 'Biochemist',
            '45' => 'Biological / Chemical / Physical technical assistant',
            '14' => 'Biologist',
            '100112' => 'Biomedical Scientist',
            '100108' => 'Biomedical Scientist',
            '1005' => 'Business/ Management/ Economy',
            '15' => 'Chemist',
            '73' => 'Children\'s nurse',
            '69' => 'Chiropractic',
            '100099' => 'Clinical trial assistant',
            '59' => 'Company Password',
            '66' => 'Dental assistant',
            '99116' => 'Dental care profession (other)',
            '100119' => 'Dental care profession (other)',
            '70' => 'Dental hygienist',
            '65' => 'Dental technician / Mechanic',
            '4' => 'Dentist',
            '67' => 'Diabetes Advisor',
            '39' => 'Dietetic Assistant',
            '5016' => 'Dietician',
            '100238' => 'DocCheck Blogger',
            '99999' => 'DocCheck Team',
            '10' => 'Doctor\'s Receptionist/ Assistant',
            '68' => 'Druggist (CH)',
            '35' => 'Emergency medical technician [EMT]',
            '34' => 'Emergency Paramedic',
            '99998' => 'Employee DocCheck Shop',
            '100113' => 'Epidemiologist',
            '18' => 'Ergotherapist',
            '11' => 'Geriatric nurse',
            '3002' => 'Health economist',
            '5007' => 'Health official',
            '100040' => 'Hearing Care Professional',
            '104' => 'Industry employee',
            '38' => 'Insurance Company Employee',
            '1003' => 'Intern pharmacist',
            '5100' => 'Journalist',
            '42' => 'Lawyer',
            '13' => 'Librarian',
            '36' => 'Management Consultant',
            '30' => 'Medical advertising agency employee',
            '100115' => 'Medical Assistant (other)',
            '99110' => 'Medical Assistant (other)',
            '46' => 'Medical dealer',
            '41' => 'Medical documentalist',
            '100098' => 'Medical educator',
            '100109' => 'Medical Engineer',
            '100114' => 'Medical Engineer',
            '22' => 'Medical information scientist',
            '23' => 'Medical journalist',
            '28' => 'Medical laboratory assistant',
            '2004' => 'Medical laboratory scientist (MLS)',
            '5014' => 'Medical laboratory scientist radiology',
            '5019' => 'Medical Photographer / Designer',
            '16' => 'Medical physicist',
            '20' => 'Midwife',
            '9999' => 'Non-medical professions',
            '21' => 'Nurse / Hospital nurse',
            '75' => 'Nurse anesthetist',
            '3010' => 'Nurse without degree',
            '58' => 'Nursing and care management with diploma',
            '2003' => 'Nursing Home Manager',
            '99112' => 'Nursing profession (other)',
            '100116' => 'Nursing profession (other)',
            '5018' => 'Nursing scientist',
            '100100' => 'Nursing teacher/ educationist',
            '100097' => 'Nutrition consultant',
            '53' => 'Optician / Orthoptist',
            '72' => 'Orderly / Ward assistant / Nurse assistant',
            '71' => 'Orthoptics',
            '37' => 'Other medical professions',
            '1008' => 'Other (non-medical profession)',
            '10000' => 'Patient',
            '2005' => 'Pharmaceutical Assistant',
            '99113' => 'Pharmaceutical profession (other)',
            '100096' => 'Pharmaceutical sales representative',
            '26' => 'Pharmaceutical-Commercial employee',
            '25' => 'Pharmaceutical-technical assistant',
            '2' => 'Pharmacist',
            '1002' => 'Pharmacist (employee)',
            '27' => 'Pharmacy engineer',
            '1001' => 'Pharmacy owner',
            '12' => 'Pharmacy technician',
            '1004' => 'Physical scientist',
            '1' => 'Physician',
            '100111' => 'Physician Assistant',
            '100107' => 'Physician Assistant',
            '33' => 'Physiotherapist',
            '100101' => 'Physiotherapist for animals',
            '3006' => 'Podiatrist',
            '5013' => 'Psychiatric nurse / Mental health nurse',
            '57' => 'Psychological technical assistant',
            '31' => 'Psychologist',
            '5020' => 'Psychomotoric therapist',
            '32' => 'Psychotherapist',
            '29' => 'Publishing Company Employee',
            '3004' => 'Radiology assistant',
            '1006' => 'Scholar',
            '63' => 'Speech therapist',
            '5' => 'Student',
            '54' => 'Student of animal health',
            '106' => 'Student of dentistry',
            '105' => 'Student of human medicine',
            '56' => 'Student of pharmacy',
            '100073' => 'Student: Other study courses',
            '76' => 'Surgical nurse',
            '5021' => 'Surgical technician assistant',
            '1007' => 'Technician',
            '99114' => 'Therapist (other)',
            '100117' => 'Therapist (other)',
            '44' => 'Toxicologist',
            '3' => 'Veterinary',
            '5010' => 'Veterinary healer',
            '100118' => 'Veterinary profession (other)',
            '99115' => 'Veterinary profession (other)',
            '5017' => 'Veterinary\'s assistant'
        ];


        $dcl_form_occupational_groups_de = [
            '' => 'Bitte w&#228;hlen Sie eine Berufsgruppe',
            '11' => 'Altenpfleger/in',
            '75' => 'An&#228;sthesiepfleger/in',
            '1002' => 'Angestellte/r Apotheker/in',
            '42' => 'Anwalt',
            '12' => 'Apothekenhelfer/in',
            '2' => 'Apotheker/in',
            '1' => 'Arzt | &#196;rztin',
            '100107' => 'Arztassistent/in',
            '100111' => 'Arztassistent/in (Physician Assistant)',
            '53' => 'Augenoptiker/in | Orthoptist/in',
            '5007' => 'Beamter im Gesundheitswesen',
            '13' => 'Bibliothekar',
            '17' => 'Biochemiker/in | Pharmakologe/in | Toxikologe/in',
            '14' => 'Biologe',
            '1004' => 'Biologe/in | Chemiker/in | Naturwissenschaftler/in',
            '2004' => 'Biologie-Laborant/in | Chemie-Laborant/in',
            '45' => 'Biologisch- | Chemisch- | Physikalisch-technische/r Assistent/in',
            '100112' => 'Biomediziner/in',
            '100108' => 'Biomediziner/in',
            '24' => 'Biotechniker/in | Medizintechniker/in',
            '15' => 'Chemiker',
            '69' => 'Chiropraktiker/in | Osteopath/in',
            '70' => 'Dentalhygieniker',
            '67' => 'Diabetesberater/in',
            '39' => 'Di&#228;tassistent/in',
            '100238' => 'DocCheck Blogger',
            '99998' => 'DocCheck Shop Team',
            '99999' => 'DocCheck Team',
            '68' => 'Drogist/in (CH)',
            '100113' => 'Epidemiologe/in',
            '18' => 'Ergotherapeut/in',
            '100097' => 'Ern&#228;hrungsberater/in',
            '5016' => 'Ern&#228;hrungswissenschaftler/in | &#214;kotrophologe/in',
            '59' => 'Firmenpasswort',
            '1006' => 'Geisteswissenschaftler/in',
            '73' => 'Gesundheits- und Kinderkrankenpfleger/in',
            '21' => 'Gesundheits- und Krankenpfleger/in',
            '3002' => 'Gesundheits&#246;konom/in | Gesundheitsmanager/in | Gesundheitswissenschaftler/in',
            '20' => 'Hebamme | Entbindungspfleger',
            '19' => 'Heilpraktiker/in',
            '100040' => 'H&#246;rakustiker/in',
            '5100' => 'Journalist',
            '100099' => 'Klinischer Monitor | Mitarbeiter/in klinische Studien',
            '72' => 'Krankenpflegehelfer',
            '3010' => 'Krankenpfleger ohne Abschluss',
            '5013' => 'Krankenpfleger/in Psychiatrie',
            '63' => 'Logop&#228;de/in | Sprachtherapeut/in',
            '5019' => 'Medizinfotograf/in | Designer/in',
            '22' => 'Medizininformatiker/in',
            '100114' => 'Mediziningenieur/in',
            '100109' => 'Mediziningenieur/in',
            '99110' => 'Medizinische(r)      Assistent/in (sonstige)',
            '100115' => 'Medizinische/r Assistent/in (sonstige)',
            '41' => 'Medizinische/r Dokumentar/in',
            '10' => 'Medizinische/r Fachangestellte/r',
            '46' => 'Medizinische/r Fachh&#228;ndler/in (Arzneimittel)',
            '28' => 'Medizinisch-technische/r Assistent/in',
            '5014' => 'Medizinisch-technischer Radiologieassistent',
            '23' => 'Medizinjournalist/in',
            '100098' => 'Medizinp&#228;dagoge/in',
            '16' => 'Medizinphysiker/in',
            '104' => 'Mitarbeiter/in Industrie | Agentur',
            '29' => 'Mitarbeiter/in medizinische Verlage',
            '30' => 'Mitarbeiter/in Pharmaagentur',
            '38' => 'Mitarbeiter/in Versicherung',
            '5020' => 'Motop&#228;de/in | Mototherapeut/in',
            '9999' => 'Nichtmedizinischer Beruf',
            '34' => 'Notfallsanit&#228;ter/in',
            '5021' => 'Operationstechnische/r Assistent/in | Chirurgische/r Assistent/in',
            '76' => 'OP-Pfleger/in',
            '71' => 'Orthoptist',
            '10000' => 'Patient',
            '100116' => 'Pflegeberuf (sonstige)',
            '99112' => 'Pflegeberuf (sonstige)',
            '2003' => 'Pflegedienstleiter/in | Pflegeheimleiter/in',
            '5018' => 'Pflegemanager/in | Pflegewissenschaftler/in',
            '100100' => 'Pflegep&#228;dagoge',
            '58' => 'Pflegewirt/in',
            '2005' => 'Pharmaassistent/in',
            '100096' => 'Pharmaberater/in | Pharmareferent/in',
            '1003' => 'Pharmazeut/in | Pharmazie-Praktikant/in',
            '26' => 'Pharmazeutisch-kaufm&#228;nnische/r Angestellte/r (PKA)',
            '25' => 'Pharmazeutisch-technische/r Assistent/in (PTA)',
            '40' => 'Pharmazieberuf (sonstige)',
            '99113' => 'Pharmazieberuf (sonstige)',
            '27' => 'Pharmazieingenieur/in',
            '33' => 'Physiotherapeut/in',
            '3006' => 'Podologe/in | Medizinische/r Fu&#223;pfleger/in',
            '3007' => 'Profession d\'appareillage',
            '31' => 'Psychologe/in',
            '57' => 'Psychologische/r Assistent/in | Psychologische/r Berater/in',
            '32' => 'Psychotherapeut/in',
            '3004' => 'Radiologieassistent',
            '35' => 'Rettungssanit&#228;ter/in',
            '1001' => 'Selbstst. Apotheker/in',
            '1008' => 'Sonstige (nichtmedizinischer Beruf)',
            '5' => 'Student/in',
            '100073' => 'Student/in (andere F&#228;cher)',
            '105' => 'Student/in der Humanmedizin',
            '56' => 'Student/in der Pharmazie',
            '54' => 'Student/in der Tiermedizin',
            '106' => 'Student/in der Zahnmedizin',
            '1007' => 'Techniker/in, IT',
            '99114' => 'Therapeut (sonstige)',
            '100117' => 'Therapeutischer Beruf (sonstige)',
            '3' => 'Tierarzt | Tier&#228;rztin',
            '5010' => 'Tierheilpraktiker/in',
            '100118' => 'Tiermedizinischer Beruf (sonstige)',
            '99115' => 'Tiermedizinischer Beruf (sonstige)',
            '5017' => 'Tiermedizinische/r Fachangestellte/r',
            '100101' => 'Tierphysiotherapeut/in',
            '44' => 'Toxikologe',
            '36' => 'Unternehmensberater/in',
            '37' => 'Weitere medizinische Berufe',
            '1005' => 'Wirtschaftswissenschaftler/in',
            '4' => 'Zahnarzt | Zahn&#228;rztin',
            '100119' => 'Zahnmedizinischer Beruf (sonstige)',
            '99116' => 'Zahnmedizinischer Beruf (sonstige)',
            '66' => 'Zahnmedizinische/r Fachangestellte/r | Dentalhygieniker/in',
            '65' => 'Zahn'
        ];

        if (get_locale() === 'de_DE') {
            $array = $dcl_form_occupational_groups_de;
        } else {
            $array = $dcl_form_occupational_groups_en;
        }

        return $array;
    }

}