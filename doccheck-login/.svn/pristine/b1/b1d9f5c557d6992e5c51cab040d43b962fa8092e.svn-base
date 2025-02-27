<?php

namespace DCL\Client;

/**
 * Client: shortcodes.
 *
 * Registers plugin shortcodes and their functionality.
 *
 * @package    DCL\Client
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Shortcodes extends DCL_Client
{

    /**
     * Register shortcodes.
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_register_shortcodes()
    {
        add_shortcode('dc-login', [$this, 'dcl_shortcode_dc_login']);
        add_shortcode('dc-logout-link', [$this, 'dcl_shortcode_logout_link']);
        add_shortcode('dc-hide-content', [$this, 'dcl_shortcode_hide_content']);
        add_shortcode('dc-html-sitemap', [$this, 'dcl_shortcode_html_sitemap']);
    }

    /**
     * Shortcode: login form.
     *
     * Displays DocCheck login form.
     *
     * [dc-login
     *   size="s_red|m_red|l_red|xl_red"
     *   language="de|com|fr|it|nl|es"
     *   template=""
     *   template_width=""
     *   template_height=""
     *   id="your_login_id"
     * ]
     *
     * @param   $atts
     *
     * @return  string
     * @since   1.0.0
     * @access  public
     */
    public function dcl_shortcode_dc_login($atts)
    {

        $atts = shortcode_atts([
            'size' => get_option('dcl_form_size', 'm_red'),
            'language' => get_option('dcl_form_language', 'en'),
            'template' => get_option('dcl_form_custom_template'),
            'template_width' => get_option('dcl_form_custom_template_width'),
            'template_height' => get_option('dcl_form_custom_template_height')
        ], $atts);

        $use_wpml = get_option('dcl_general_set_language_by_wpml');

        // if wpml plugin is active and ICL_LANGUAGE_CODE is defined, set language of iframe accordingly
        if (defined('ICL_LANGUAGE_CODE') && $use_wpml) {
            switch (ICL_LANGUAGE_CODE) {
                case 'de':
                    $atts['language'] = 'de';
                    break;
                case 'en':
                    $atts['language'] = 'com';
                    break;
                case 'fr':
                    $atts['language'] = 'fr';
                    break;
                case 'nl':
                    $atts['language'] = 'nl';
                    break;
                case 'it':
                    $atts['language'] = 'it';
                    break;
                case 'es':
                    $atts['language'] = 'es';
                    break;
            }
        }

        // Set login id
        $login_id = get_option('dcl_general_login_id');

        if (true === WP_DEBUG) {
            $login_id = get_option('dcl_general_login_id_debug');
        }

        // Check id
        if (empty($login_id)) {
            return esc_html__('No DocCheck login id given.', 'doccheck-login');
        }

        // Is there a custom template set?
        if (!empty($atts['template'])) {
            $template = $atts['template'];

            $dimensions['width'] = esc_attr($atts['template_width']);
            $dimensions['height'] = esc_attr($atts['template_height']);
        } else {
            $template = $atts['size'];
            $dimensions = $this->dcl_get_form_dimensions_for_size($atts['size']);
        }

        // Retrieve return URI from URL parameter "redirect"
        $param = isset($_GET['redirect']) ? sanitize_text_field($_GET["redirect"]) : null;
        $redirect_var = wp_http_validate_url($param) !== null ? $param : null;

        $redirect_params = '';

        if ($redirect_var) {
            unset($_GET["redirect"]);

            $utm_parameters = $this->dcl_get_sanitized_utm_parameters();

            if (!empty($utm_parameters)) {
                $redirect_params = http_build_query($utm_parameters, '', '/');
            }

            $return_uri = $this->dcl_escape_return_uri(wp_http_validate_url($redirect_var));
            $return_uri_param = $return_uri ? 'return_uri=' . $return_uri : null;
        } else if ((int)$this->dcl_page_professional_circles_id > 0) {
            // Via options chosen target page will be used
            $return_uri = $this->dcl_escape_return_uri(get_permalink($this->dcl_page_professional_circles_id));
            $return_uri_param = $return_uri ? 'return_uri=' . $return_uri : null;
        }

        // Build iframe url
        $iframe_url = self::DCL_URL
            . $atts['language'] . '/'
            . $login_id . '/'
            . $template . '/';
        $iframe_url = esc_url($iframe_url) . (isset($return_uri_param) && $return_uri_param ? $return_uri_param . '/' : '') . (!empty($utm_parameters) ? $redirect_params . '/' : '');

        ob_start();

        if ($this->dcl_has_logged_in_user()) : ?>
            <div class="dc-login-wrapper">
                <p>
                    <?php esc_html_e('You\'re already logged in.', 'doccheck-login'); ?><br/>
                    <?php echo esc_url(do_shortcode('[dc-logout-link]')); ?>
                </p>
            </div>
        <?php else: ?>
            <div class="dc-login-wrapper">
                <iframe frameborder="0" scrolling="no" name="dc-login-iframe" id="dc-login-iframe"
                    <?php echo (isset($dimensions['width'])) ? 'width="' . esc_attr($dimensions['width']) . '"' : ''; ?>
                    <?php echo (isset($dimensions['height'])) ? 'height="' . esc_attr($dimensions['height']) . '"' : ''; ?>
                        src="<?php echo esc_html($iframe_url); ?>">
                    <a href="<?php echo esc_html($iframe_url); ?>"
                       target="_blank"><?php esc_html__('Login', 'doccheck-login'); ?></a>
                </iframe>
            </div>
        <?php endif;

        return ob_get_clean();
    }

    /**
     * Shortcode: logout link.
     *
     * Displays logout link.
     *
     * [dc-logout-link]
     *
     * @return  string
     * @since   1.0.0
     * @access  public
     */
    public function dcl_shortcode_logout_link()
    {
        if ($this->dcl_has_logged_in_user()) {
            $logout_url = wp_nonce_url(
                admin_url('admin-post.php?action=dcl_logout'),
                'dcl_logout_nonce',
                'dcl_logout_nonce'
            );

            return '<a href="' . esc_url($logout_url) . '" class="dc-login-logout">' . esc_html__('Logout', 'doccheck-login') . '</a>';
        }

        return '';
    }

    /**
     * Shortcode: hide content.
     *
     * Hides content between brackets from non DocCheck users.
     *
     * [dc-hide-content]Hidden content[/dc-hide-content]
     *
     * @param   $atts
     * @param null $content
     *
     * @return  string
     * @since   1.0.0
     * @access  public
     */
    public function dcl_shortcode_hide_content($atts, $content = null)
    {
        if ($this->dcl_has_logged_in_user()) {
            return wpautop($content);
        }

        return '';
    }

    /**
     * Shortcode: html sitemap.
     *
     * Displays html sitemap excluding DocCheck login
     * restricted pages if user is not logged in.
     *
     * [dc-html-sitemap]
     *
     * @return string
     */
    public function dcl_shortcode_html_sitemap()
    {
        if (is_feed()) {
            return '';
        }

        if ($this->dcl_has_logged_in_user()) {
            $html = wp_list_pages([
                'echo' => 0,
                'title_li' => ''
            ]);
        } else {
            $exclude_pages_str = '';
            $exclude_pages = get_pages([
                'meta_key' => 'dcl_restrict_access',
                'meta_value' => 'on'
            ]);

            foreach ($exclude_pages as $page) {
                $exclude_pages_str .= $page->ID . ',';
            }

            $html = wp_list_pages([
                'echo' => 0,
                'title_li' => '',
                'exclude' => $exclude_pages_str
            ]);
        }

        return '<ul class="dc-html-sitemap">' . $html . '</ul>';
    }
}
