<?php

/**
 * Plugin helper.
 */

defined('ABSPATH') || exit;

if (! function_exists("sanitize_elite_post_slug")) {
    function sanitize_elite_post_slug($name)
    {
        return sanitize_title_with_dashes('apbd-el-' . $name);
    }
}

if (! function_exists("APBD_LoadPluginAPI")) {
    function APBD_LoadPluginAPI($className = "", $sub_path = '', $defaultext = ".php")
    {
        if (! empty($className) && class_exists($className)) {
            return;
        }
        if (! APBD_EndWith($className, $defaultext)) {
            $className .= ".php";
        }
        if (! empty($sub_path)) {
            $sub_path = '/' . $sub_path;
        }
        $apifile = dirname(__FILE__) . "/../api/" . $sub_path . "/" . $className;
        if (file_exists($apifile)) {
            require_once $apifile;
        }
    }
}
if (! function_exists("APBD_getMimeType")) {
    function APBD_getMimeType($file)
    {
        if (function_exists("mime_content_type")) {
            return mime_content_type($file);
        }
        if (class_exists("finfo")) {
            $finfo = new finfo(FILEINFO_MIME);
            return $finfo->file($file, FILEINFO_MIME_TYPE);
        }
        return '';
    }
}


if (!function_exists('apbd_get_user_role_name')) {
    /**
     * @param WP_User $userObject
     * @return string
     */
    function apbd_get_user_role_name($userObject)
    {
        global $wp_roles;
        if (! empty($userObject->roles[0])) {
            $user_role_slug = $userObject->roles[0];
            return translate_user_role($wp_roles->roles[$user_role_slug]['name']);
        }
        return "";
    }
}
if (!function_exists('apbd_editor_text_filter')) {
    function apbd_editor_text_filter($string)
    {
        return wp_kses_html($string);
    }
}
if (!function_exists('apbd_get_user_title_by_id')) {
    function apbd_get_user_title_by_id($id)
    {
        if (empty($id)) {
            return '';
        }
        $user = get_user_by("id", $id);
        $title = $user->first_name . ' ' . $user->last_name; //Name of ticket user
        if (empty(trim($title))) {
            $title = $user->display_name;
        }
        return $title;
    }
}
if (!function_exists('apbd_get_user_title_by_user')) {
    /**
     * @param WP_User $user
     * @return string
     */
    function apbd_get_user_title_by_user($user)
    {
        $title = "";
        if ($user instanceof WP_User) {
            if (! empty($user->first_name) && property_exists($user, 'last_name')) {
                $title = $user->first_name . ' ' . $user->last_name; //Name of ticket user
                if (empty(trim($title))) {
                    $title = $user->display_name;
                }
            } elseif (! empty($user->display_name)) {
                $title = $user->display_name;
            }
        }
        return $title;
    }
}

if (!function_exists('apbd_wps_get_role_users')) {
    /**
     * @param $role
     * @param $orderby
     * @param $order
     * @return WP_User []
     */
    function apbd_wps_get_role_users($role, $orderby, $order)
    {
        $args = array(
            'role' => $role,
            'orderby' => $orderby,
            'order' => $order
        );
        $users = get_users($args);
        return $users;
    }
}

if (!function_exists('apbd_wps_get_files_in_directory')) {
    function apbd_wps_get_files_in_directory($dir_path, $extension = '')
    {
        $output = [];

        if (!is_dir($dir_path)) {
            return $output;
        }

        $files = scandir($dir_path);

        if (false === $files) {
            return $output;
        }

        foreach ($files as $file) {
            if ('.' === $file || '..' === $file) {
                continue;
            }

            $file_path = $dir_path . DIRECTORY_SEPARATOR . $file;

            if (!is_file($file_path)) {
                continue;
            }

            if (!empty($extension)) {
                if ($extension === pathinfo($file, PATHINFO_EXTENSION)) {
                    $output[] = $file;
                }
            } else {
                $output[] = $file;
            }
        }

        return $output;
    }
}
