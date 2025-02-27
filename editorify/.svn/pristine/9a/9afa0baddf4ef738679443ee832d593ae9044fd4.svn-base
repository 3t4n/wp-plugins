<?php

/**
 * @package: editorify-plugin
 */

/**
 * Plugin Name: Editorify
 * Description: Boost Your Sales By Adding Products Reviews, Videos & Images to your product page
 * Version: 1.0.6
 * Author: Editorify
 * Author URI: https://editorify.com
 * License: GPLv3 or later
 * Text Domain: editorify-plugin
 */

if (!defined('ABSPATH')) {
    die;
}

define("EDITORIFY_API_URL", "https://apps.editorify.com");
define('EDITORIFY_VERSION', '1.0.6');
define('EDITORIFY_PATH', dirname(__FILE__));
define('EDITORIFY_FOLDER', basename(EDITORIFY_PATH));
define('EDITORIFY_URL', plugins_url() . '/' . EDITORIFY_FOLDER);
define('EDITORIFY_API_KEY', get_option('editorify_api_key'));
define("EDITORIFY_DEVELOPMENT", (stripos(EDITORIFY_API_URL, "dev.editorify") !== false ? "dev" : ""));
define("EDITORIFY_DEBUG", false);

register_activation_hook(__FILE__, 'editorify_activation_hook');
register_deactivation_hook(__FILE__, 'editorify_deactivation_hook');
register_uninstall_hook(__FILE__, 'editorify_uninstall_hook');
add_action('admin_enqueue_scripts', 'editorify_add_admin_css_js');
add_action('admin_menu', 'editorify_admin_menu');
add_action('wp_head', 'editorify_script');


function editorify_activation_hook()
{
    $data = array(
        'store' => get_site_url(),
        'email' => get_option('admin_email'),
        'event' => 'install'
    );

    $response = editorify_send_request('/auth/woocomerce-activate', $data);
    
    if ($response) {
        if ($response['success'] > 0) {

            

            if (!get_option('editorify_api_key')) {
                add_option('editorify_api_key', $response['api_key']);

                

                if (class_exists("WC_Auth")) {
                    class Editorify_AuthCustom extends WC_Auth
                    {
                        public function getKeys($app_name, $user_id, $scope)
                        {
                            return parent::create_keys($app_name, $user_id, $scope);
                        }
                    }

                    $auth = new Editorify_AuthCustom();
                    $keys = $auth->getKeys($response['app_name'], $response['user_id'], $response['scope']);
                    $data = array(
                        'store' => get_site_url(),
                        'keys' => $keys,
                        'user_id' => $response['user_id'],
                        'event' => 'update_keys'
                    );

                    $keys_response = editorify_send_request('/auth/woocomerce-activate', $data);

                    if ($keys_response && $keys_response['success'] == 0) {
                        add_option('editorify_error', 'yes');
                        add_option('editorify_error_message', $keys_response['message']);
                    }
                }

                
            } else {
                update_option('editorify_api_key', $response['api_key']);
            }
        } else {
            

            if (!get_option('editorify_error')) {
                add_option('editorify_error', 'yes');
                add_option('editorify_error_message', 'Error activation plugin!');
            }
        }
    } else {
       

        if (!get_option('editorify_error')) {
            add_option('editorify_error', 'yes');
            add_option('editorify_error_message', 'Error activation plugin!');
        }
    }
}

function editorify_deactivation_hook()
{
    if (!current_user_can('activate_plugins')) {
        return;
    }
    $data = array(
        'store' => get_site_url(),
        'event' => 'deactivated',
    );
    return editorify_send_request('/auth/woocomerce-deactivate', $data);
}

function editorify_uninstall_hook()
{
    if (!current_user_can('activate_plugins')) {
        return;
    }

    delete_option('editorify_api_key');

    if (get_option('editorify_error')) {
        delete_option('editorify_error');
    }

    if (get_option('editorify_error_message')) {
        delete_option('editorify_error_message');
    }

    editorify_clear_all_caches();

    $data = array(
        'store' => get_site_url(),
        'event' => 'uninstall',
    );
    return editorify_send_request('/auth/woocomerce-deactivate', $data);
}

function editorify_script()
{
    if (strlen(EDITORIFY_API_KEY) > 0) {
        $attributes = array(
            'id' => EDITORIFY_DEVELOPMENT . 'editorifyScript',
            'async' => true,
            'src' => esc_url("https://www.editorify.net/js/woo_reviews.js?key=" . EDITORIFY_API_KEY),
        );
        wp_print_script_tag($attributes);
    }
}

function editorify_add_admin_css_js()
{
    wp_register_style('editorify_style', EDITORIFY_URL . '/assets/css/style.css');
    wp_enqueue_style('editorify_style');
    wp_register_script('editorify-admin', EDITORIFY_URL . '/assets/js/script.js', array('jquery'), '1.0.0');
    wp_enqueue_script('editorify-admin');
}

function editorify_admin_menu()
{
    add_menu_page('Editorify Settings', 'Editorify', 'manage_options', 'Editorify', 'editorify_admin_menu_page_html', EDITORIFY_URL . '/assets/images/editorify_icon.png');
}

function editorify_has_woocommerce()
{
    return in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')));
}

function editorify_admin_menu_page_html()
{
    $data = array(
        'store' => get_site_url(),
        'event' => 'check_status'
      );
      
      $store_connected = false;

      $status_response = editorify_send_request('/auth/woocomerce-activate', $data);

      if ($status_response && $status_response['success'] == 0)
      {
        add_option('editorify_error', 'yes');
        add_option('editorify_error_message', $status_response['message']);
      }


      if ($status_response && $status_response['success'] == 1)
      {
        delete_option('editorify_error');
        delete_option('editorify_error_message');

        if(isset($status_response['keys_ok']) && $status_response['keys_ok'] == "no")
        {
          if (class_exists("WC_Auth"))
          {
           class Editorify_AuthCustom extends WC_Auth
            {
                public function getKeys($app_name, $user_id, $scope)
                {
                    return parent::create_keys($app_name, $user_id, $scope);
                }
            }

            $auth = new Editorify_AuthCustom();
            $keys = $auth->getKeys($response['app_name'], $response['user_id'], $response['scope']);

            $data = array(
                'store' => get_site_url(),
                'keys' => $keys,
                'user_id' => $status_response['user_id'],
                'event' => 'update_keys'
              );
            $keys_response = editorify_send_request('/auth/woocomerce-activate', $data);

          }
        }


        if(!get_option('editorify_api_key'))
        {
          add_option('editorify_api_key',$status_response['api_key']);
        }
        else
        {
            delete_option('editorify_api_key');
            add_option('editorify_api_key',$status_response['api_key']);
        }

        if(isset($status_response['store_connected']) && $status_response['store_connected'] == "yes")
        {
          $store_connected = true;
        }
      }

      add_option('editorify_check', array());
      $tmp_check_data = array();

      if(is_ssl())
      {
        $tmp_check_data['ssl_active'] = "true";
      }
      else
      {
        $tmp_check_data['ssl_active'] = "false";
      }

      $tmp_check_data['permalinks']           = get_option( 'permalink_structure' );
      $tmp_check_data['woocomerce_installed'] = editorify_has_woocommerce();
      $tmp_check_data['firewall_active']      = false;
      $tmp_check_data['cloudflare_active']    = false;

      // Checking if we have a plugin with firewall option if store is not connected
      if($store_connected == FALSE)
      {
        // Checking for Cloudflare presence
        $data = array(
          'store' => get_site_url(),
          'event' => 'check_cloudflare'
        );


        $cloudflare_check = editorify_send_request('/auth/woocomerce-activate', $data);

        if($cloudflare_check && $cloudflare_check['success'] == 1)
        {
          if($cloudflare_check['cloudflare_enabled'] == "true")
          {
            $tmp_check_data['cloudflare_active'] = true;
          }
        }

        $plugin_list = get_plugins();

        foreach ($plugin_list as $key => $value) 
        {

            if(is_plugin_active($key))
            {
              if(strpos($plugin_name, "wordfence") !== FALSE || strpos($plugin_name, "jetpack") !== FALSE || strpos($plugin_name, "sucuri") !== FALSE || strpos($plugin_name, "ninjafirewall") !== FALSE)
              {
                $tmp_check_data['firewall_active'] = true;
              }
            }
        }
      }

   
    update_option('editorify_check', $tmp_check_data);
    include_once EDITORIFY_PATH . '/views/editorify_admin_page.php';
}

function editorify_send_request($path, $data)
{
    try {
        $headers = array(
            'Content-Type' => 'application/json',
            'x-plugin-version' => EDITORIFY_VERSION,
            'x-site-url' => get_site_url(),
            'x-wp-version' => get_bloginfo('version'),
        );

        if (editorify_has_woocommerce()) {
            $headers['x-woo-version'] = WC()->version;
        }

        $url = EDITORIFY_API_URL . $path;
        $data = array(
            'headers' => $headers,
            'body' => json_encode($data),
            'method' => 'POST',
            'data_format' => 'body',
            'sslverify' => false
        );
        
        $response = wp_remote_post($url, $data);
        
        // var_dump($response);
        if (!is_wp_error($response)) {
            
            $decoded_response = json_decode(wp_remote_retrieve_body($response), true);

            return $decoded_response;
        }
        return 0;
    } catch (Exception $err) {
        if(EDITORIFY_DEBUG)
        {
            echo $err;
        }
    }
}



function editorify_plugin_redirect()
{
    exit(wp_redirect("admin.php?page=Editorify"));
}

function editorify_clear_all_caches()
{
    try {
        global $wp_fastest_cache;

        if (function_exists('w3tc_flush_all')) {
            w3tc_flush_all();
        }

        if (function_exists('wp_cache_clean_cache')) {
            global $file_prefix, $supercachedir;
            if (empty($supercachedir) && function_exists('get_supercache_dir')) {
                $supercachedir = get_supercache_dir();
            }
            wp_cache_clean_cache($file_prefix);
        }
        if (method_exists('WpFastestCache', 'deleteCache') && !empty($wp_fastest_cache)) {
            $wp_fastest_cache->deleteCache();
        }

        if (function_exists('rocket_clean_domain')) {
            rocket_clean_domain();
            // Preload cache.
            if (function_exists('run_rocket_sitemap_preload')) {
                run_rocket_sitemap_preload();
            }
        }
        if (class_exists("autoptimizeCache") && method_exists("autoptimizeCache", "clearall")) {
            autoptimizeCache::clearall();
        }
        if (class_exists("LiteSpeed_Cache_API") && method_exists("autoptimizeCache", "purge_all")) {
            LiteSpeed_Cache_API::purge_all();
        }

        if (class_exists('\Hummingbird\Core\Utils')) {
            $modules = \Hummingbird\Core\Utils::get_active_cache_modules();
            foreach ($modules as $module => $name) {
                $mod = \Hummingbird\Core\Utils::get_module($module);

                if ($mod->is_active()) {
                    if ('minify' === $module) {
                        $mod->clear_files();
                    } else {
                        $mod->clear_cache();
                    }
                }
            }
        }
    } catch (Exception $e) {
        return 1;
    }
}


?>