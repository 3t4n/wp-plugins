<?php

/**
 * Users.
 */

defined('ABSPATH') || exit;

class Apbd_wps_users extends AppsBDBaseModuleLite
{
    public function initialize()
    {
        parent::initialize();
        $this->disableDefaultForm();
        $this->AddAjaxAction("add", [$this, "add"]);
        $this->AddAjaxAction("data_search", [$this, "data_search"]);

        $this->AddPortalAjaxAction("add", [$this, "add"]);
        $this->AddPortalAjaxAction("data_search", [$this, "data_search"]);
        $this->AddPortalAjaxAction("logout", [$this, "logout"]);
        $this->AddPortalAjaxAction("update", [$this, "update"]);
        $this->AddPortalAjaxAction("change_password", [$this, "change_password"]);

        $this->AddPortalAjaxNoPrivAction("add_guest", [$this, "add_guest"]);
        $this->AddPortalAjaxNoPrivAction("login", [$this, "login"]);
        $this->AddPortalAjaxNoPrivAction("register", [$this, "register"]);
        $this->AddPortalAjaxNoPrivAction("reset_password", [$this, "reset_password"]);
    }

    public function add()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $data = [];
        $hasError = false;

        if (APPSBD_IsPostBack) {
            $email = sanitize_email(APBD_PostValue('email', ''));
            $first_name = sanitize_text_field(APBD_PostValue('first_name', ''));
            $last_name = sanitize_text_field(APBD_PostValue('last_name', ''));
            $notify = sanitize_text_field(APBD_PostValue('notify', ''));

            $notify = 'Y' === $notify ? 'Y' : 'N';

            if (
                (1 > strlen($email)) ||
                (1 > strlen($first_name))
            ) {
                $hasError = true;
            }

            $userObj = $this->CreateUser($email, $first_name, $last_name, $notify);

            if ($userObj) {
                $data = [
                    'id' => strval(absint($userObj->ID)),
                    'name' => $userObj->display_name,
                    'email' => $userObj->user_email,
                    'avatar' => get_avatar_url($userObj->ID),
                ];
            }

            if (!$hasError) {
                if (!empty($data)) {
                    $apiResponse->SetResponse(true, $this->__('Successfully added.'), $data);
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function add_guest()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $grcToken = APBD_PostValue('grcToken', '');

            $user = APBD_PostValue('user', '');
            $user = !empty($user) ? json_decode(stripslashes($user), true) : [];
            $user = wp_parse_args($user, [
                'email' => '',
                'first_name' => '',
                'last_name' => '',
                'custom_fields' => [],
            ]);

            $ticket = APBD_PostValue('ticket', '');
            $ticket = !empty($ticket) ? json_decode(stripslashes($ticket), true) : [];
            $ticket = wp_parse_args($ticket, [
                'cat_id' => '',
                'title' => '',
                'ticket_body' => '',
                'is_public' => 'N',
                'custom_fields' => [],
            ]);

            $email = sanitize_email($user['email']);
            $first_name = sanitize_text_field($user['first_name']);
            $last_name = sanitize_text_field($user['last_name']);
            $user_custom_fields = $user['custom_fields'];

            if (is_array($user_custom_fields)) {
                $user_custom_fields = array_map(function ($value) {
                    return !is_bool($value) ? sanitize_text_field($value) : $value;
                }, $user_custom_fields);
            } else {
                $user_custom_fields = [];
            }

            $password = wp_generate_password();

            $username = sanitize_user(strtolower(preg_replace("#[^a-z0-9]+#i", "", $first_name)));
            $username = $this->UniqueUsername($username);

            $cat_id = sanitize_text_field($ticket['cat_id']);
            $title = sanitize_text_field($ticket['title']);
            $ticket_body = sanitize_text_field($ticket['ticket_body']);
            $is_public = sanitize_text_field($ticket['is_public']);
            $ticket_custom_fields = $ticket['custom_fields'];

            if (is_array($ticket_custom_fields)) {
                $ticket_custom_fields = array_map(function ($value) {
                    return !is_bool($value) ? sanitize_text_field($value) : $value;
                }, $ticket_custom_fields);
            } else {
                $ticket_custom_fields = [];
            }

            $cat_id = strval($cat_id);
            $ticket_body = stripslashes($ticket_body);
            $check__ticket_body = sanitize_text_field($ticket_body);
            $is_public = 'Y' === $is_public ? 'Y' : 'N';

            if (
                (1 > strlen($email)) ||
                (1 > strlen($first_name)) ||
                (1 > strlen($password)) ||
                (1 > strlen($username)) ||
                (1 > strlen($title)) ||
                (1 > strlen($check__ticket_body))
            ) {
                $hasError = true;
            }

            if (!$hasError) {
                $userObj = get_user_by('email', $email);

                if (!$userObj) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSUserAPI($namespace, false);

                    $apiObj->SetPayload('grcToken', $grcToken);

                    $apiObj->SetPayload('user', [
                        'email' => $email,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'username' => $username,
                        'password' => $password,
                        'custom_fields' => $user_custom_fields,
                    ]);

                    $apiObj->SetPayload('ticket', [
                        'cat_id' => $cat_id,
                        'title' => $title,
                        'ticket_body' => $ticket_body,
                        'is_public' => $is_public,
                        'custom_fields' => $ticket_custom_fields,
                    ]);

                    $resObj = $apiObj->create_user();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Successfully created.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSTicketAPI($namespace, false);

                    $ticket_user = isset($userObj->ID) ? absint($userObj->ID) : 0;

                    $apiObj->SetPayload('cat_id', $cat_id);
                    $apiObj->SetPayload('ticket_user', $ticket_user);
                    $apiObj->SetPayload('title', $title);
                    $apiObj->SetPayload('ticket_body', $ticket_body);
                    $apiObj->SetPayload('is_public', $is_public);
                    $apiObj->SetPayload('custom_fields', $ticket_custom_fields);

                    $resObj = $apiObj->create_ticket();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Successfully created.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function update()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $param_id = absint(APBD_GetValue("id"));

        $hasError = false;

        if (APPSBD_IsPostBack && !empty($param_id)) {
            $first_name = sanitize_text_field(APBD_PostValue('first_name', ''));
            $last_name = sanitize_text_field(APBD_PostValue('last_name', ''));
            $custom_fields = APBD_PostValue('custom_fields', '');

            if (!empty($custom_fields)) {
                $custom_fields = json_decode(stripslashes($custom_fields), true);

                if (is_array($custom_fields)) {
                    $custom_fields = array_map(function ($value) {
                        return !is_bool($value) ? sanitize_text_field($value) : $value;
                    }, $custom_fields);
                }
            }

            $custom_fields = is_array($custom_fields) ? $custom_fields : [];

            if (1 > strlen($first_name)) {
                $hasError = true;
            }

            if (!$hasError) {
                $userObj = get_user_by('id', $param_id);

                if ($userObj) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSUserAPI($namespace, false);

                    $apiObj->SetPayload('id', $param_id);
                    $apiObj->SetPayload('first_name', $first_name);
                    $apiObj->SetPayload('last_name', $last_name);
                    $apiObj->SetPayload('custom_fields', $custom_fields);
                    $apiObj->SetPayload('username', $userObj->user_login);
                    $apiObj->SetPayload('email', $userObj->user_email);

                    $resObj = $apiObj->update_client();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Invalid user.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function login()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $grcToken = APBD_PostValue('grcToken', '');
            $username = sanitize_text_field(APBD_PostValue('username', ''));
            $password = strval(APBD_PostValue('password', ''));
            $remember = APBD_PostValue('remember', '');

            if (
                (1 > strlen($username)) ||
                (1 > strlen($password))
            ) {
                $hasError = true;
            }

            if (!$hasError) {
                $user = wp_authenticate($username, $password);

                if (!is_wp_error($user)) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSUserAPI($namespace, false);

                    $apiObj->SetPayload('grcToken', $grcToken);
                    $apiObj->SetPayload('username', $username);
                    $apiObj->SetPayload('password', $password);
                    $apiObj->SetPayload('remember', $remember);

                    $resObj = $apiObj->user_login();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Login successful.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Invalid username or password.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function logout()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        if (APPSBD_IsPostBack) {
            $namespace = APBDWPSupportLite::getNamespaceStr();
            $apiObj = new APBDWPSUserAPI($namespace, false);

            $resObj = $apiObj->user_logout();
            $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

            if ($resStatus) {
                $apiResponse->SetResponse(true, $this->__('Logout successful.'));
            } else {
                $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function register()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $grcToken = APBD_PostValue('grcToken', '');
            $email = sanitize_email(APBD_PostValue('email', ''));
            $first_name = sanitize_text_field(APBD_PostValue('first_name', ''));
            $last_name = sanitize_text_field(APBD_PostValue('last_name', ''));
            $password = strval(APBD_PostValue('password', ''));
            $custom_fields = APBD_PostValue('custom_fields', '');

            if (!empty($custom_fields)) {
                $custom_fields = json_decode(stripslashes($custom_fields), true);

                if (is_array($custom_fields)) {
                    $custom_fields = array_map(function ($value) {
                        return !is_bool($value) ? sanitize_text_field($value) : $value;
                    }, $custom_fields);
                }
            }

            $custom_fields = is_array($custom_fields) ? $custom_fields : [];

            $username = sanitize_user(strtolower(preg_replace("#[^a-z0-9]+#i", "", $first_name)));
            $username = $this->UniqueUsername($username);

            if (
                (1 > strlen($email)) ||
                (1 > strlen($first_name)) ||
                (1 > strlen($last_name)) ||
                (1 > strlen($password)) ||
                (1 > strlen($username))
            ) {
                $hasError = true;
            }

            if (!$hasError) {
                $userObj = get_user_by('email', $email);

                if (!$userObj) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSUserAPI($namespace, false);

                    $apiObj->SetPayload('grcToken', $grcToken);
                    $apiObj->SetPayload('id', null);
                    $apiObj->SetPayload('email', $email);
                    $apiObj->SetPayload('first_name', $first_name);
                    $apiObj->SetPayload('last_name', $last_name);
                    $apiObj->SetPayload('username', $username);
                    $apiObj->SetPayload('password', $password);
                    $apiObj->SetPayload('custom_fields', $custom_fields);
                    $apiObj->SetPayload('image', '');
                    $apiObj->SetPayload('role', '');

                    $resObj = $apiObj->create_client();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Registration successful.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('User already exists.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function reset_password()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $grcToken = APBD_PostValue('grcToken', '');
            $username = sanitize_text_field(APBD_PostValue('username', ''));

            if (1 > strlen($username)) {
                $hasError = true;
            }

            if (!$hasError) {
                $userObj = get_user_by('email', $username);

                if (!$userObj) {
                    $userObj = get_user_by('login', $username);
                }

                if ($userObj) {
                    $namespace = APBDWPSupportLite::getNamespaceStr();
                    $apiObj = new APBDWPSUserAPI($namespace, false);

                    $apiObj->SetPayload('grcToken', $grcToken);
                    $apiObj->SetPayload('username', $username);

                    $resObj = $apiObj->reset_password();
                    $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                    if ($resStatus) {
                        $apiResponse->SetResponse(true, $this->__('Check your email for the confirmation link, then visit the login page.'));
                    } else {
                        $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                    }
                } else {
                    $apiResponse->SetResponse(false, $this->__('Invalid username or email address.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function change_password()
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(false, $this->__('Invalid request.'));

        $hasError = false;

        if (APPSBD_IsPostBack) {
            $old_password = strval(APBD_PostValue('old_password', ''));
            $new_password = strval(APBD_PostValue('new_password', ''));

            if (
                (1 > strlen($old_password)) ||
                (1 > strlen($new_password))
            ) {
                $hasError = true;
            }

            if (!$hasError) {
                $namespace = APBDWPSupportLite::getNamespaceStr();
                $apiObj = new APBDWPSUserAPI($namespace, false);

                $apiObj->SetPayload('oldPass', $old_password);
                $apiObj->SetPayload('newPass', $new_password);

                $resObj = $apiObj->change_pass();
                $resStatus = isset($resObj->status) ? rest_sanitize_boolean($resObj->status) : false;

                if ($resStatus) {
                    $apiResponse->SetResponse(true, $this->__('Successfully updated.'));
                } else {
                    $apiResponse->SetResponse(false, $this->__('Something went wrong.'));
                }
            } else {
                $apiResponse->SetResponse(false, $this->__('Invalid data.'));
            }
        }

        echo wp_json_encode($apiResponse);
    }

    public function data_search($term = '')
    {
        $apiResponse = new Apbd_WPS_API_Response();
        $apiResponse->SetResponse(true, "", []);

        $term = APBD_GetValue("term", '');
        $term = sanitize_text_field($term);

        $sort = APBD_GetValue("sort");
        $page = APBD_GetValue("page");
        $limit = APBD_GetValue("limit");

        $orderBy = 'id';
        $order = 'ASC';

        if ($sort) {
            $sort = explode('-', $sort);

            if (isset($sort[0]) && !empty($sort[0])) {
                $orderBy = sanitize_key($sort[0]);
            }

            if (isset($sort[1]) && !empty($sort[1])) {
                $order = 'asc' === sanitize_key($sort[1]) ? 'ASC' : 'DESC';
            }
        }

        $page = max(absint($page), 1);
        $limit = max(absint($limit), 10);
        $offset = ($limit * ($page - 1));

        $result = get_users([
            'search' => '*' . esc_attr($term) . '*',
            'number' => $limit,
            'offset' => $offset,
            'orderby' => $orderBy,
            'order' => $order
        ]);

        $data = [];

        if (is_array($result) && !empty($result)) {
            foreach ($result as $userObj) {
                $data[] = [
                    'id' => strval(absint($userObj->ID)),
                    'name' => $userObj->display_name,
                    'email' => $userObj->user_email,
                    'avatar' => get_avatar_url($userObj->ID),
                ];
            }
        }

        $apiResponse->SetResponse(true, "", $data);

        echo wp_json_encode($apiResponse);
    }

    public function CreateUser($email, $firstName, $lastName, $notify = 'N')
    {
        $userObj = get_user_by("email", $email);

        if (!$userObj) {
            $username = sanitize_user(strtolower(preg_replace("#[^a-z0-9]+#i", "", $firstName)));
            $username = $this->UniqueUsername($username);

            $password = wp_generate_password();

            $userId = wp_create_user($username, $password, $email);
            $userId = !is_wp_error($userId) ? $userId : 0;

            if (!empty($userId)) {
                $display_name = trim($firstName . " " . $lastName);

                wp_update_user([
                    "ID" => $userId,
                    "first_name" => $firstName,
                    "last_name" => $lastName,
                    "display_name" => $display_name,
                ]);

                if ('Y' === $notify) {
                    wp_send_new_user_notifications($userId, 'user');
                }

                $userObj = get_user_by("id", $userId);
            }
        }

        return $userObj;
    }

    public function UniqueUsername($username, $counter = 1)
    {
        if (username_exists($username)) {
            $username .= "_";
            $username .= $counter;

            return $this->UniqueUsername($username, $counter + 1);
        }

        return $username;
    }
}
