<?php

namespace CodeConfig\IntegrateDropbox;

use CodeConfig\IntegrateDropbox\Database\UserAccessModel;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

class User
{
    private static $instance = null;

    /**
     * @var \WP_User|null
     */
    private $user = null;

    public function __construct($args = array())
    {
        $defaults = array(
            'type' => 'id',
            'value' => get_current_user_id(),
        );

        $allowed_keys = ['type', 'value'];
        $args = array_intersect_key($args, array_flip($allowed_keys));

        $args = wp_parse_args($args, $defaults);

        $this->user = get_user_by($args['type'], $args['value']);
    }

    public function get_user()
    {
        return $this->user;
    }

    public function get_user_capability()
    {
        return $this->user->get_role_caps();
    }

    public function set_user_capability($capability = 'manage_indbox_files')
    {
        if ($this->user instanceof \WP_User) {
            $this->user->add_cap($capability, true);
            return true;
        } else {
            error_log("User is not an instance of WP_User.");
            return false;
        }
    }

    public function remove_user_capability($capability = 'manage_indbox_files')
    {
        if ($this->user instanceof \WP_User) {
            $this->user->remove_cap($capability);
            return true;
        } else {
            error_log("User is not an instance of WP_User.");
            return false;
        }
    }


    public function get_user_email()
    {
        return $this->user->user_email;
    }

    public function get_user_role($only_first = false)
    {
        if ($only_first) {
            return isset($this->user->roles[0]) ? $this->user->roles[0] : false;
        }

        return $this->user->roles;
    }

    public function get_id()
    {
        return $this->user->ID;
    }

    public function get_user_name()
    {
        return $this->user->user_login;
    }

    public function get_user_access_folders()
    {
        $result = UserAccessModel::instance()->get_folders($this->get_user_name(), $this->get_user_role());
        return $result;
    }

    public function is_setup_access_folder()
    {
        $username = $this->get_user_name();
        $get_access_folders = UserAccessModel::instance()->get_by(['type' => 'user', 'value' => $username]);

        if (!empty($get_access_folders)) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Singleton instance retrieval
     *
     * @return User
     * @static
     */
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
