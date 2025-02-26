<?php

namespace SixStorageOnline\Base;

class Six_Storage_Enqueue extends Six_Storage_BaseController
{
    public function Six_Storage_Enqueue_register()
    {
        add_action('wp_head', [$this, 'six_storage_region_date']);
    }

    public function six_storage_region_date(){
		$datem = current_datetime();
        $url =  get_option('six_storage_online_api_url');
        if($url == 'https://api-us.6storage.com/' || $url == 'https://api-us.8storage.com/' || $url=='https://v2stagingapi.8storage.com/' || $url == 'https://api.8storage.com/'){
         echo '<script>window.sixStorage_online_region = ' . wp_json_encode( 'us') . '</script>' . PHP_EOL;
        }else {
            echo '<script>window.sixStorage_online_region = ' . wp_json_encode( 'eu') . '</script>' . PHP_EOL;
        }
		echo '<script>window.sixstorage_online_date = ' . wp_json_encode( date_format($datem,"Y/m/d")) . '</script>' . PHP_EOL;
	}
}