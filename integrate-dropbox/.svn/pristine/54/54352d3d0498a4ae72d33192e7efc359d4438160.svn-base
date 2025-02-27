<?php

namespace CodeConfig\IntegrateDropbox\Ajax;

defined('ABSPATH') or exit('Hey, what are you doing here? You silly human!');

use CodeConfig\IntegrateDropbox\Helpers;
use CodeConfig\IntegrateDropbox\Database\UserAccessModel;
use CodeConfig\IntegrateDropbox\User;

class UserAccess
{
    private static $_instance = null;

    public function __construct()
    {
        add_action('wp_ajax_indbox_set_user_access', [$this, 'indbox_set_user_access']);
        add_action('wp_ajax_indbox_remove_user_access', [$this, 'indbox_remove_user_access']);
        add_action('wp_ajax_indbox_get_users_access', [$this, 'indbox_get_users_access']);
        add_action('wp_ajax_indbox_get_user_access', [$this, 'indbox_get_user_access']);
        add_action('wp_ajax_indbox_update_user_access', [$this, 'indbox_update_user_access']);
    }

    public function indbox_set_user_access()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (!wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $type = sanitize_text_field($_POST['type'] ?? null);
        $value = sanitize_text_field($_POST['value'] ?? null);
        $force = filter_var($_POST['force'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $folders = Helpers::sanitization($_POST['folders'] ?? null);

        if (empty($type) || empty($value)) {
            wp_send_json_error(['message' => __('Type and Value are required fields.', 'integrate-dropbox')], 400);
        }

        if (empty($folders)) {
            wp_send_json_error(['message' => __('Folders field is required!', 'integrate-dropbox')], 400);
        }

        if ('user' === $type) {
            $user = new User(['type' => 'login', 'value' => $value]);

            if (empty($user->get_user())) {
                wp_send_json_error(['message' => __('User not found!', 'integrate-dropbox')], 404);
            }

            $user->set_user_capability();
        } elseif ('role' === $type) {
            $role = get_role($value);

            if (empty($role)) {
                wp_send_json_error(['message' => __('Role not found!', 'integrate-dropbox')], 404);
            }

            $role->add_cap('manage_indbox_files');
        } else {
            wp_send_json_error(['message' => __('Something went wrong!', 'integrate-dropbox')], 404);
        }

        $insert_id = UserAccessModel::instance()->create($type, $value, $folders, $force);

        wp_send_json_success([
            'status' => 'ok',
            'message' => __('Access successfully set!', 'integrate-dropbox'),
            'result' => $insert_id
        ], 200);
    }

    public function indbox_remove_user_access()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (!wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $id = intval($_POST['id'] ?? 0);

        if ($id <= 0) {
            wp_send_json_error(['message' => __('Valid ID is required!', 'integrate-dropbox')], 400);
        }

        $OUA = UserAccessModel::instance();

        $data = $OUA->get($id);

        if (!$data) {
            wp_send_json_error(['message' => __('Record not found!', 'integrate-dropbox')], 404);
        }

        if ('user' === $data['type']) {
            $user = new User(['type' => 'login', 'value' => $data['value']]);
            if ($user->get_user()) {
                $user->remove_user_capability();
            } else {
                wp_send_json_error(['message' => __('User not found!', 'integrate-dropbox')], 404);
            }
        } elseif ('role' === $data['type']) {
            $role = get_role($data['value']);
            if ($role) {
                $role->remove_cap('manage_indbox_files');
            } else {
                wp_send_json_error(['message' => __('Role not found!', 'integrate-dropbox')], 404);
            }
        } else {
            wp_send_json_error(['message' => __('Invalid type specified!', 'integrate-dropbox')], 400);
        }

        $delete = $OUA->delete($id);

        if ($delete === false) {
            wp_send_json_error(['message' => __('Failed to delete record!', 'integrate-dropbox')], 500);
        }

        wp_send_json_success([
            'status' => 'ok',
            'message' => __('User access removed successfully!', 'integrate-dropbox'),
            'result' => $delete
        ], 200);
    }

    public function indbox_get_users_access()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (!wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $users_access = UserAccessModel::instance()->get_all();

        if (is_wp_error($users_access)) {
            wp_send_json_error(['message' => $users_access->get_error_message()], 500);
        }

        wp_send_json_success([
            'status' => 'ok',
            'message' => __('User access retrieved successfully!', 'integrate-dropbox'),
            'result' => $users_access
        ], 200);
    }

    public function indbox_get_user_access()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (!wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $id = intval($_POST['id'] ?? 0);

        if ($id <= 0) {
            wp_send_json_error(['message' => __('Valid ID is required!', 'integrate-dropbox')], 400);
        }

        $user_access = UserAccessModel::instance()->get($id);

        if (is_wp_error($user_access)) {
            wp_send_json_error(['message' => $user_access->get_error_message()], 500);
        } elseif (empty($user_access)) {
            wp_send_json_error(['message' => __('No access data found for the specified ID.', 'integrate-dropbox')], 404);
        }

        wp_send_json_success([
            'status' => 'ok',
            'message' => __('User access retrieved successfully!', 'integrate-dropbox'),
            'result' => $user_access
        ], 200);
    }

    public function indbox_update_user_access()
    {
        $nonce = sanitize_text_field($_POST['nonce'] ?? '');

        if (!wp_verify_nonce($nonce, 'indbox-nonce')) {
            wp_send_json_error(['message' => __('Unauthorized Request!', 'integrate-dropbox')], 401);
        }

        $id = intval($_POST['id'] ?? 0);
        $type = sanitize_text_field($_POST['type'] ?? null);
        $value = sanitize_text_field($_POST['value'] ?? null);
        $force = filter_var($_POST['force'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $folders = Helpers::sanitization($_POST['folders'] ?? null);

        if ($id <= 0 || empty($type) || empty($value)) {
            wp_send_json_error(['message' => __('ID, type, and value are required!', 'integrate-dropbox')], 400);
        }

        if (empty($folders)) {
            wp_send_json_error(['message' => __('Folders is required!', 'integrate-dropbox')], 400);
        }

        $OUA = UserAccessModel::instance();
        $old_data = $OUA->get($id);

        if (is_wp_error($old_data) || empty($old_data)) {
            wp_send_json_error(['message' => __('Access data not found!', 'integrate-dropbox')], 404);
        }

        if ($old_data['type'] !== $type || $old_data['value'] !== $value) {
            if ('role' === $old_data['type']) {
                $role = get_role($old_data['value']);
                if ($role) {
                    $role->remove_cap('manage_indbox_files');
                }
            } elseif ('user' === $old_data['type']) {
                $user = new User(['type' => 'login', 'value' => $old_data['value']]);
                $user->remove_user_capability();
            }

            // Set new capabilities
            if ('user' === $type) {
                $user = new User(['type' => 'login', 'value' => $value]);
                $user->set_user_capability();
            } elseif ('role' === $type) {
                $role = get_role($value);
                if ($role) {
                    $role->add_cap('manage_indbox_files');
                }
            }
        }

        $update = $OUA->update($id, $type, $value, $folders, $force);

        if (is_wp_error($update)) {
            wp_send_json_error(['message' => 'Update failed!'], 500);
        }

        wp_send_json_success([
            'status' => 'ok',
            'message' => __('User access updated successfully!', 'integrate-dropbox'),
            'result' => $update
        ], 200);
    }

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}
