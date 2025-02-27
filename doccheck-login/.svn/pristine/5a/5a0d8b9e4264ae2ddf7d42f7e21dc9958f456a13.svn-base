<?php

namespace DCL\Includes;

/**
 * Base.
 *
 * This is used to define shared methods and variables used by
 * extending other classes with this class.
 *
 * @since      1.0.0
 * @package    DCL\Includes
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Base
{

    /**
     * DocCheck Crawler IP.
     *
     * @since   1.0.0
     */
    const DCL_CRAWLER_IP = '195.82.66.150';

    /**
     * DocCheck Crawler IP 2.
     *
     * @since   1.0.0
     */
    const DCL_CRAWLER_IP_DEV = '195.82.85.56';

    /**
     * Login url.
     *
     * @since   1.0.0
     */
    const DCL_URL = 'https://login.doccheck.com/code/';

    /**
     * OAuth serivce url.
     *
     * @since   1.0.0
     */
    const DCL_OAUTH_SERVICE = 'https://login.doccheck.com/service/oauth/access_token/';

    /**
     * OAuth serivce url.
     *
     * @since   1.0.0
     */
    const DCL_OAUTH_SERVICE_USERDATA = 'https://login.doccheck.com/service/oauth/user_data/';

    /**
     * Check token url.
     *
     * @since   1.0.0
     */
    const DCL_CHECK_TOKEN = 'https://login.doccheck.com/service/oauth/access_token/checkToken.php';

    /**
     * Page with login.
     *
     *
     * @since   1.0.0
     * @access  protected
     * @var     string
     */
    protected $dcl_page_login_id;

    /**
     * Page to redirect occupation group.
     *
     *
     * @since   1.0.0
     * @access  protected
     * @var     string
     */
    protected $dcl_page_redirect_id;

    /**
     * Page for restricted circle.
     *
     * @since   1.0.0
     * @access  protected
     * @var     string
     */
    protected $dcl_page_professional_circles_id;

    /**
     * Available login form sizes.
     *
     * @since   1.0.0
     * @access  protected
     * @var     array
     */
    protected $dcl_form_sizes = [
        's_red' => 'S',
        'm_red' => 'M',
        'l_red' => 'L',
        'xl_red' => 'XL',
    ];


    /**
     * Available login form size dimensions.
     *
     * @since   1.0.0
     * @access  protected
     * @var     array
     */
    protected $dcl_form_size_dimensions = [
        's_red' => [
            'width' => 156,
            'height' => 203
        ],
        'm_red' => [
            'width' => 311,
            'height' => 188
        ],
        'l_red' => [
            'width' => 424,
            'height' => 215
        ],
        'xl_red' => [
            'width' => 467,
            'height' => 231
        ]
    ];

    /**
     * Available login form languages.
     *
     * @since   1.0.0
     * @access  protected
     * @var     array
     */
    protected $dcl_form_languages = [
        'de' => 'German',
        'com' => 'English',
        'fr' => 'French',
        'it' => 'Italian',
        'nl' => 'Dutch',
        'es' => 'Spanish',
    ];

    /**
     * Constructor.
     *
     * @since   1.0.0
     * @access  public
     */
    public function __construct()
    {
        $this->dcl_page_login_id = get_option('dcl_general_login_page_id', 0);
        $this->dcl_page_redirect_id = get_option('dcl_general_redirect_page_id', 0);

        $this->dcl_page_professional_circles_id = get_option('dcl_general_professional_circles_page_id', 0);
    }

    /**
     * Get form sizes.
     *
     * @return  array
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_form_sizes()
    {
        return $this->dcl_form_sizes;
    }

    /**
     * Get form languages.
     *
     * @return  array
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_form_languages()
    {
        return $this->dcl_form_languages;
    }

    /**
     * Return dimensions for size.
     *
     * @param   $size
     *
     * @return  array
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_form_dimensions_for_size($size = 'm_red')
    {
        return $this->dcl_form_size_dimensions[$size];
    }

    /**
     * Gets the request UTM parameters.
     *
     *
     * @return     array  The request parameter.
     */

    public function dcl_get_sanitized_utm_parameters()
    {
        $utm_parameters = array(
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
        );

        $sanitized_utm = array();

        foreach ($utm_parameters as $param) {
            // Get the parameter value from the URL
            $value = isset($_GET[$param]) ? sanitize_text_field($_GET[$param]) : '';

            // Escape the value for use in HTML output
            $escaped_value = esc_html($value);

            // Add the sanitized and escaped value to the array
            if ($value != '') {
                $sanitized_utm[$param] = $escaped_value;
            }
        }

        return $sanitized_utm;
    }


    /**
     * Check for access restriction
     * on current post or page.
     *
     * @return  bool
     * @since   1.0.0
     * @access  public
     */
    public function dcl_is_access_restricted()
    {
        global $post;


        // Make sure we have a post object to work with
        // Exclude 404, search and login page from access restriction
        if (!$post || is_404() || is_search() || is_page($this->dcl_page_login_id) || (is_page($this->dcl_page_redirect_id) && (int)$this->dcl_page_redirect_id > 0)) {
            return false;
        }

        $access_restricted = get_post_meta($post->ID, 'dcl_restrict_access', true);

        if ($access_restricted === 'on') {
            return true;
        }

        return false;
    }

    /**
     * Check if we do have a logged in user.
     *
     * @return bool
     * @since   1.0.0
     * @access  public
     */
    public function dcl_has_logged_in_user()
    {
        $access_token = $this->dcl_get_session_token();

        return !empty($access_token);
    }

    /**
     * Get permalink to login page.
     *
     * @param string $redirect_url Url to redirect to after login.
     *
     * @return  string $login_url
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_login_permalink($redirect_url = null)
    {

        // Get url for login page or home as fallback
        if ((int)$this->dcl_page_login_id > 0) {
            $login_url = get_permalink($this->dcl_page_login_id);
        } else {
            $login_url = home_url();
        }

        // Add redirect query arg if exists
        if ($redirect_url !== null) {
            $login_url = add_query_arg('redirect', $redirect_url, $login_url);
        }

        return $login_url;
    }

    /**
     * Get permalink to redirect page, when user is logged in but access to a page is restricted.
     *
     * @return  string $redirect_url
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_restricted_redirect_permalink()
    {
        // Get url for login page or home as fallback
        if ((int)$this->dcl_page_redirect_id > 0) {
            $redirect_url = get_permalink($this->dcl_page_redirect_id);
        } else {
            $redirect_url = home_url();
        }

        return $redirect_url;
    }

    /**
     * Get permalink to professionals page.
     *
     * @return  string $prof_url
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_professionals_permalink()
    {

        // Get url for professional circles page or home as fallback
        if ((int)$this->dcl_page_professional_circles_id > 0) {
            $prof_url = get_permalink($this->dcl_page_professional_circles_id);
        } else {
            $prof_url = home_url();
        }

        return $prof_url;
    }

    /**
     * Start session and set expiration time.
     * Open _SESSION read-only
     * @since   1.0.0
     * @access  public
     */
    public function dcl_start_session()
    {
        session_start([
            'cookie_lifetime' => 86400,
            'read_and_close' => true,    // READ ACCESS FAST
        ]);
    }

    /**
     * Get logged in cookie.
     *
     * @return  string
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_session_token()
    {
        if (isset($_SESSION['dc_login_token']) && !empty($_SESSION['dc_login_token'])) {
            $token = sanitize_text_field($_SESSION['dc_login_token']);

            // Validate the token if necessary (for example, check if it meets certain criteria)
            // Add your validation logic here

            return esc_html($token);
        }

        return null;
    }

    /**
     * Set logged in cookie.
     *
     * @param string $access_token
     *
     * @return void
     * @since   1.0.0
     * @access  public
     */
    public function dcl_set_session_token($access_token)
    {
        unset($_SESSION['dc_login_token']);
        $_SESSION['dc_login_token'] = $access_token;
    }

    /**
     * Logged in cookie exists.
     *
     * @return  bool
     * @since   1.0.0
     * @access  public
     */
    public function dcl_session_token_exists()
    {
        return isset($_SESSION['dc_login_token']);
    }

    /**
     * Clear logged in cookie.
     *
     * @return  void
     * @since   1.0.0
     * @access  public
     */
    public function dcl_clear_session_token()
    {
        unset($_SESSION['dc_login_token']);
        $_SESSION['dc_login_token'] = null;
    }

    /**
     * Set redirect url cookie.
     *
     * @param   $redirect_url
     *
     * @since   1.0.0
     * @access  public
     */
    public function dcl_set_session_redirect_url($redirect_url)
    {
        session_abort();

        // now open the session with write access
        session_start(['cookie_lifetime' => 86400]);
        unset($_SESSION['dc_login_redirect_url']);
        $_SESSION['dc_login_redirect_url'] = esc_url($redirect_url);
        session_write_close();  // Write session data and end session
        session_start([
            'cookie_lifetime' => 86400,
            'read_and_close' => true,    // READ ACCESS FAST
        ]);
    }

    /**
     * Get redirect url cookie.
     *
     * @return  string
     * @since   1.0.0
     * @access  public
     */
    public function dcl_get_session_redirect_url()
    {
        $redirect_url = home_url();

        if (isset($_SESSION['dc_login_redirect_url']) && !empty($_SESSION['dc_login_redirect_url'])) {
            // Sanitize the session URL
            $redirect_url = esc_url_raw($_SESSION['dc_login_redirect_url']);
        } elseif ((int)$this->dcl_page_professional_circles_id > 0) {
            // Generate the URL based on the professional circles page ID
            $redirect_url = esc_url(get_permalink($this->dcl_page_professional_circles_id));
        }

        // Validate the URL if necessary (for example, check if it's a valid URL)
        // Add your validation logic here

        // Escape the final URL for safe output
        return esc_url($redirect_url);
    }

    /**
     * Escape return URI for iframe.
     *
     * @param boolean|string $return_uri
     *
     * @return string
     * @since   1.0.3
     * @access  public
     */
    public function dcl_escape_return_uri($return_uri)
    {
        if ($return_uri) {
            $escape_arr = array(
                '{slash}' => '/',
                '{questionmark}' => '?',
                '{equalsign}' => '=',
                '{ampersand}' => '&'
            );
            $escaped_return_uri = $return_uri;

            foreach ($escape_arr as $key => $value) {
                $escaped_return_uri = str_replace($value, $key, $escaped_return_uri);
            }

            return $escaped_return_uri;
        }

        return null;
    }

    /**
     * Redirect cookie exists.
     *
     * @return  bool
     * @since   1.0.0
     * @access  public
     */
    public function dcl_session_redirect_url_exists()
    {
        return isset($_SESSION['dc_login_redirect_url']);
    }

    /**
     * Clear redirect cookie.
     *
     * @return  void
     * @since   1.0.0
     * @access  public
     */
    public function dcl_clear_session_redirect_url()
    {
        unset($_SESSION['dc_login_redirect_url']);
        $_SESSION['dc_login_redirect_url'] = null;
    }

    /**
     * Check if client is DocCheck crawler.
     *
     * @return bool
     * @since   1.0.0
     * @access  public
     */
    public function dcl_is_client_dc_crawler()
    {
        $client_ip = $this->dcl_get_client_ip();

        if (self::DCL_CRAWLER_IP === $client_ip
            || self::DCL_CRAWLER_IP_DEV === $client_ip
        ) {
            return true;
        }

        return false;
    }

    /**
     * Get client ip.
     *
     * @return string
     * @since   1.0.0
     * @access  private
     */
    private function dcl_get_client_ip()
    {
        $ipaddress = 'UNKNOWN';

        if (isset($_SERVER['HTTP_CLIENT_IP'])) :
            $ipaddress = sanitize_text_field($_SERVER['HTTP_CLIENT_IP']);
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) :
            $ipaddress = sanitize_text_field($_SERVER['HTTP_X_FORWARDED_FOR']);
        elseif (isset($_SERVER['HTTP_X_FORWARDED'])) :
            $ipaddress = sanitize_text_field($_SERVER['HTTP_X_FORWARDED']);
        elseif (isset($_SERVER['HTTP_FORWARDED_FOR'])) :
            $ipaddress = sanitize_text_field($_SERVER['HTTP_FORWARDED_FOR']);
        elseif (isset($_SERVER['HTTP_FORWARDED'])) :
            $ipaddress = sanitize_text_field($_SERVER['HTTP_FORWARDED']);
        elseif (isset($_SERVER['REMOTE_ADDR'])) :
            $ipaddress = sanitize_text_field($_SERVER['REMOTE_ADDR']);
        endif;

        // Validate IP address format
        if (filter_var($ipaddress, FILTER_VALIDATE_IP) === false) {
            // Invalid IP address, fallback to 'UNKNOWN'
            $ipaddress = 'UNKNOWN';
        }

        return esc_html($ipaddress);
    }

    /**
     * Define a constant if it is not already defined.
     *
     * @param string $name Constant name.
     * @param mixed $value Value.
     * @since 1.0.4
     */
    public function dcl_maybe_define_constant($name, $value)
    {
        if (!defined($name)) {
            define($name, $value);
        }
    }
}