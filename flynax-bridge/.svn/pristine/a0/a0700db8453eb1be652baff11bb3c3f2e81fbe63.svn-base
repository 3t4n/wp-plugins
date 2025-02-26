<?php

namespace Flynax\Plugins\FlynaxBridge;

use WP_Error;
use WP_REST_Response;
use WP_User;

/**
 * Class API
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class API
{
    /**
     * @var array $routes
     */
    public static $routes = [
        'handshake' => 'handShake',
        'fl-token' => 'saveFlToken',
        'status' => 'getConnectionStatus',
        'recent-posts' => 'getRecentPosts',
        'update-listings-cache' => 'updateListingsCache',
        'bridge-uninstalled' => 'afterBridgeUninstall',
        'register-user' => 'registerUser',
        'update-user' => 'updateUser',
        'validate-user' => 'validateUser',
        'update-password' => 'updatePassword',
        'delete-user' => 'deleteUser',
    ];

    /**
     * Load Route
     *
     * @param string $route
     *
     * @since 2.2.0 - Method changed to static
     * @since 2.1.0
     */
    public static function loadRoute($route = '')
    {
        if (!$route || !isset(self::$routes[$route])) {
            return;
        }

        $method = self::$routes[$route];
        self::$method();
    }

    /**
     * Running after WordPress bridge plugin uninstalling process
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function afterBridgeUninstall()
    {
        $self = new self();
        $tokenFromRequest = sanitize_post($_REQUEST['wp_token']);

        if (!$self->isValidToken($tokenFromRequest)) {
            $response = new WP_Error('token-exchange-error', __('Invalid WP token', FlynaxBridge::PLUGIN_KEY));

            print(json_encode($response));
            return;
        }

        delete_option('flb_wp_token');
        delete_option('flb_fl_token');
        delete_option('flb_fl_url');
        delete_option('flb_flynax_listings');

        $response = new WP_REST_Response(array(
            'message' => __('All tokens has been successfully removed', FlynaxBridge::PLUGIN_KEY),
        ), 200);

        print(json_encode($response));
    }

    /**
     * Update cache off all widgets
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function updateListingsCache()
    {
        Cache::updateFlListings();
    }

    /**
     * Get connection status between WordPress bridge and FlynaxBridge plugins
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function getConnectionStatus()
    {
        if (get_option('flb_fl_token') && get_option('flb_wp_token')) {
            $response = new WP_REST_Response(array(
                'message' => __('Plugins are connected successfully', FlynaxBridge::PLUGIN_KEY),
            ), 200);
        } else {
            $response = new WP_Error('status-message', __('Plugins are not connected', FlynaxBridge::PLUGIN_KEY), 401);
        }

        print(json_encode($response));
    }

    /**
     * Greetings method of the bridges
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function handShake()
    {
        $self = new self();
        $token = $self->generateToken();
        $data = array(
            'token' => $token,
        );

        if ($token) {
            (new Events)->afterTokenGenerate($token);
            $response = new WP_REST_Response($data, 200);
            print(json_encode($response));
            return;
        }

        $response = new WP_Error('handshake-error', __('Handshake error', FlynaxBridge::PLUGIN_KEY));

        print(json_encode($response));
    }

    /**
     * Save WordPress bridge token, which is coming from Flynax
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function saveFlToken()
    {
        $self = new self();

        $log = sprintf("\n%s:\n%s\n", date('Y.m.d H:i:s'), print_r($_REQUEST, true));
        file_put_contents('response.log', $log, FILE_APPEND);

        $tokenFromRequest = sanitize_post($_REQUEST['wp_token']);
        $flToken = sanitize_post($_REQUEST['fl_token']);
        $flUrl = sanitize_post($_REQUEST['fl_path']);

        if (!$self->isValidToken($tokenFromRequest)) {
            $response = new WP_Error('token-exchange-error', __('Invalid WP token', FlynaxBridge::PLUGIN_KEY));
            print(json_encode($response));
            return;
        }

        if (add_option('flb_fl_token', $flToken)) {
            add_option('flb_fl_url', $flUrl);

            $data = array(
                'message' => 'Token has been successfully exchanged',
            );

            $response = new WP_REST_Response($data, 200);
            print(json_encode($response));
            return;
        }

        $response = new WP_Error(
            'token-exchange-error',
            __(
                "I couldn't save your token. Maybe it is already exist?",
                FlynaxBridge::PLUGIN_KEY
            )
        );
        print(json_encode($response));
        return;
    }

    /**
     * Get recent posts from WordPress
     *
     * @since 2.2.0 - Method changed to static
     */
    public static function getRecentPosts()
    {
        $limit = sanitize_post($_REQUEST['limit']);
        $args = array(
            'numberposts' => $limit,
            'orderby' => 'post_date',
            'post_type' => 'post',
            'post_status' => 'publish',
        );

        $posts = wp_get_recent_posts($args, ARRAY_A);
        $resultPosts = array();
        foreach ($posts as $post) {
            $htmlStrippedContent = strip_tags($post['post_content'] ?: $post['post_excerpt']);
            $sanitizedContent = preg_replace('/\[\/?et_pb.*?\]/', '', $htmlStrippedContent);
            $sanitizedContent = trim(preg_replace('/\s+/', ' ', $htmlStrippedContent));
            $sanitizedContent = wp_slash($sanitizedContent);

            $post['post_title'] = wp_slash($post['post_title']);

            $postInfo = array(
                'title' => $post['post_title'],
                'excerpt' => $sanitizedContent,
                'img' => get_the_post_thumbnail_url($post['ID'], 'thumbnail'),
                'post_date' => $post['post_date'],
                'url' => get_permalink($post['ID']),
            );

            if ($authorInfo = get_user_by('ID', $post['post_author'])) {
                $postInfo['author_username'] = $authorInfo->user_login;
                $postInfo['display_name'] = $authorInfo->display_name;
            }

            $resultPosts[] = $postInfo;
        }

        if (empty($resultPosts)) {
            $response = new WP_Error(
                'posts-not-found',
                __(
                    "There are no published posts",
                    FlynaxBridge::PLUGIN_KEY
                ),
                404);
        }

        $response = new WP_REST_Response(array('data' => $resultPosts), 200);
        print(json_encode($response));
        return;
    }

    /**
     * Does provided token from WordPress bridge plugin is valid
     *
     * @param string $token
     * @return bool
     */
    public function isValidToken($token)
    {
        return $token == $this->getOurToken();
    }

    /**
     * Get FlynaxBridge token
     *
     * @return string
     */
    public function getOurToken()
    {
        return get_option('flb_wp_token');
    }

    /**
     * Generate FlynaxBridge token
     *
     * @param int $length - Token length
     * @return string
     */
    public function generateToken($length = 32)
    {
        return bin2hex(random_bytes($length));
    }

    /**
     * Escape json string
     *
     * @since 2.1.0
     */
    public function escapeJsonString($value = '')
    {
        $escapers = array("\\");
        $replacements = array("\\\\");
        $result = str_replace($escapers, $replacements, $value);

        return $result;
    }

    /**
     * Register a new user
     *
     * @since 2.2.0 - Method changed to static
     * @since 2.1.0
     */
    public static function registerUser()
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $email = $_REQUEST['email'];
        $type = 'author';
        $firstName = $_REQUEST['first_name'];
        $lastName = $_REQUEST['last_name'];

        if (username_exists($username) || email_exists($email)) {
            return;
        } else {
            $userdata = array(
                'user_pass' => $password,
                'user_login' => $username,
                'user_email' => $email,
            );

            $user_id = wp_insert_user($userdata);
            update_user_meta($user_id, "first_name", $firstName);
            update_user_meta($user_id, "last_name", $lastName);

            require_once '../../../wp-load.php';
            $user = new WP_User($user_id);
            $user->set_role($type);

            $out = array(
                'status' => 'OK',
                'wp_user_id' => $user_id,
            );

            print(json_encode($out));
        }
    }

    /**
     * Update user information
     *
     * @since 2.2.0 - Method changed to static
     * @since 2.1.0
     */
    public static function updateUser()
    {
        $userID = $_REQUEST['ID'];
        $userdata = array(
            'ID' => $userID,
            'user_email' => $_REQUEST['user_email'],
        );

        wp_update_user($userdata);

        $firstName = $_REQUEST['first_name'];
        $lastName = $_REQUEST['last_name'];

        if ($firstName) {
            update_user_meta($userID, "first_name", $firstName);
        }
        if ($lastName) {
            update_user_meta($userID, "last_name", $lastName);
        }
    }

    /**
     * Validate user information
     *
     * @since 2.2.0 - Method changed to static
     * @since 2.1.0
     */
    public static function validateUser()
    {
        $exists = false;
        if (email_exists($_REQUEST['user_email'])) {
            $exists = true;
        }

        print(json_encode(['exists' => $exists]));
    }

    /**
     * Update user password
     *
     * @since 2.2.0 - Method changed to static
     * @since 2.1.0
     */
    public static function updatePassword()
    {
        $password = $_REQUEST['password'];
        $userID = $_REQUEST['wp_user_id'];

        wp_set_password($password, $userID);
    }

    /**
     * Delete user
     *
     * @since 2.2.0 - Method changed to static
     * @since 2.1.0
     */
    public static function deleteUser()
    {
        require_once '../../../wp-load.php';
        require_once ABSPATH . 'wp-admin/includes/admin.php';

        $userID = $_REQUEST['wp_user_id'];

        wp_delete_user($userID);
    }

    /**
     * Register all WordPress REST API endpoints, which will be used by this plugin
     *
     * @deprecated 2.1.0
     */
    public function registerEndpoints()
    {}
}
