<?php

namespace Flynax\Plugins\FlynaxBridge;

/**
 * Class User. All actions with WordPress users
 *
 * @since 2.1.0
 *
 * @package Flynax\Plugins\FlynaxBridge
 */
class User
{
    /**
     * Register a new user in Flynax site
     */
    public function registerUser($user_id = 0)
    {
        if (!$_POST['user_login']) {
            return;
        }

        $data = [
            'username' => $_POST['user_login'],
            'password' => $_POST['pass1'] ?? '',
            'mail' => $_POST['user_email'] ?: $_POST['email'],
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'wp_user_id' => $user_id,
        ];

        return Request::get('/account/register', $data);
    }

    /**
     * Update user information
     *
     * @param string $userID
     */
    public function updateUser($userID = 0)
    {
        if (!$userID) {
            return;
        }

        $userInfo = get_user_by('ID', $userID);

        $data = [
            'first_name' => $_POST['first_name'] ?? '',
            'last_name' => $_POST['last_name'] ?? '',
            'user_email' => $userInfo->data->user_email,
            'wp_user_id' => $userID,
        ];

        if (isset($_POST['pass1'])) {
            $data['password'] = $_POST['pass1'];
        }

        return Request::get('/account/update', $data);
    }

    /**
     * Validate user information
     *
     * @param object $errors
     * @param string $sanitized_user_login
     * @param string $user_email
     */
    public function validateUser($errors, $sanitized_user_login = '', $user_email = '')
    {
        $data = [
            'email' => $user_email,
        ];
        $result = Request::get('/account/validate', $data);
        $result = json_decode($result['body'], true);

        if ($result['exist']) {
            $errors->add('duplicate_error', '<strong>ERROR</strong>: Email address already exists on Flynax site');
        }

        return $errors;
    }

    /**
     * Update user password
     *
     * @param \WP_User $user - WordPress User object
     * @param string $password
     */
    public function updatePassword($userObj, $password = '')
    {
        if (!$userObj) {
            return;
        }

        $data = [
            'password' => $_POST['pass1'] ? $_POST['pass1'] : $password,
            'wp_user_id' => $userObj->ID,
        ];

        return Request::get('/account/change-password', $data);
    }

    /**
     * Delete user
     *
     * @param int $userID
     */
    public function deleteUser($userID)
    {
        if (!$userID) {
            return;
        }

        $data = [
            'wp_user_id' => $userID,
        ];

        return Request::get('/account/delete', $data);
    }
}
