<?php
namespace FormInteg\IZCRMEF\Admin;

use FormInteg\IZCRMEF\Core\Util\Route;

class AdminAjax
{
    public function register()
    {
        Route::post('app/config', [$this, 'updatedAppConfig']);
        Route::get('get/config', [$this, 'getAppConfig']);
    }

    public function updatedAppConfig($data)
    {
        if (!property_exists($data, 'data')) {
            wp_send_json_error(__('Data can\'t be empty', 'izcrmef'));
        }

        update_option('izcrmef_app_conf', $data->data);
        wp_send_json_success(__('save successfully done', 'izcrmef'));
    }

    public function getAppConfig()
    {
        $data = get_option('izcrmef_app_conf');
        wp_send_json_success($data);
    }
}
