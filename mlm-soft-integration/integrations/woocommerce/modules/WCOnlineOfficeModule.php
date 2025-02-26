<?php
/**
 * Class WCOnlineOfficeModule.
 *
 * @since 3.7.0
 */

namespace MLMSoft\integrations\woocommerce\modules;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Exception;
use MLMSoft\core\models\user\MLMSoftLocalUser;

class WCOnlineOfficeModule
{
    /**
     * Online office menu item slug.
     */
    const ONLINEOFFICE_MENU_SLUG = 'mlmsoft_online_office';
    
    /**
     * Key for transient cache. 
     */			
    const TRANSIENT_KEY = '_transient_mlmsoft_v3_my_account';    
    
    /**
     * @var MLMSoftPlugin
     */
    private $mlmsoftPlugin;

    /**
     * @see mlm-soft-integration\core\models\user\MLMSoftLocalUser.php
     */
    private $localUser;

    /**
     * WCOnlineOfficeModule constructor.
     *
     * @param MLMSoftPlugin $mlmsoftPlugin
     */
    public function __construct($mlmsoftPlugin)
    {
        $this->mlmsoftPlugin = $mlmsoftPlugin;

        if ( $this->mlmsoftPlugin->options->useOnlineOffice ) {
            
            /**
             * @see mlm-soft-integration-v3\core\modules\MLMSoftAuthModule.php
             * @see const MLMSOFT_AUTH_SUCCESS_FILTER
             */
            add_filter('mlmsoft_auth_success', array($this, 'authSuccess'), 10, 3 );

            /**
             * @see woocommerce\includes\wc-account-functions.php
             */
            add_action( 'woocommerce_account_menu_items', array($this, 'addAccountMenuItem'), 10, 2 );
            
            /**
             * @see woocommerce\includes\wc-page-functions.php
             */				 
            add_filter( 'woocommerce_get_endpoint_url', array($this, 'getEndpointUrl'), 10, 4 );
            
            /**
             * @since 3.8.3
             *
             * @see woocommerce\includes\wc-user-functions.php
             */
            add_action('woocommerce_created_customer', [$this, 'createdCustomer'], 11, 3);
        }
    }

    /**
     * @since 3.8.3
     */
    public function createdCustomer($user_id, $newUser, $password_generated) 
    {
        $this->updateUserMeta(
            $user_id, 
            [
                'password' => $newUser['user_pass'], 
                'login' => $newUser['user_email']
            ]
        );
    }
    
    /**
     * Check if the timeout has expired.
     *
     * @return boolean
     */		
    protected function isTransientExpired($transient) 
    {
        if ( 0 ) {
            // @debug action
            return true;
        }
        
        if ( ! isset($transient['timeout']) ) {
            return true;
        }
        
        if ( (int) $transient['timeout'] < time() ) {
            return true;
        }
        return false;
    }

    /**
     * Get transient key.
     */		
    protected function getTransientKey($suffix = false)
    {
        if ( ! $suffix ) {
            return self::TRANSIENT_KEY;
        }
        
        $suffix = str_replace(' ', '_', $suffix);
        return self::TRANSIENT_KEY . '_' . $suffix;
    }

    /**
     * When registering a new user via a referral link in onlineoffice and then registering in the Woocommerce, 
     * a new WP user is created with `user_login` equal to `user_email`.
     * At the same time, sanitizing the `user_email` field can lead to a case when `user_login` !== `user_email` in the DB.
     * Thus, it will be impossible to get tokens. Use this function to get the correct login.
     *
     * При регистрации нового юзера по рефссылке в onlineoffice и следующей регистрации его в магазине Woocommerce
     * создаётся новый пользователь WP с `user_login` равным `user_email`.
     * При этом санитайзинг поля `user_email` может привести к случаю когда в БД `user_login` !== `user_email`.
     * Тем самым будет невозможно получить токены.
     * Используйте эту функцию для получения корректного логина.
     */
    protected function getUserLoginForTokens() 
    {
        static $login = null;
        
        if ( ! is_null($login) ) {
            return $login;
        }
        
        $user_login = $this->localUser->data->user_login;
        $user_email = $this->localUser->data->user_email;
        
        if ( $user_login === $user_email ) {
            $login = $user_login;
        } elseif ( $user_login === sanitize_user($user_email, true) ) {
            $login = $user_email;
        } else {
            $login = $user_email;
        }
        
        return $login;
    }
    
    /**
     *
     */
    protected function getTokens() 
    {
        $transient = get_user_meta( 
            $this->localUser->data->ID, 
            $this->getTransientKey(),  
            true
        );
        
        if ( ! is_array($transient) ) {
            return false;
        }
        
        $requestTokens = false;
        
        if ( ! empty($transient['password']) && ! empty($transient['login']) ) {
            $password = $transient['password'];
            $login = $transient['login'];
            $requestTokens = true;
        } else {
            
            if ( $this->isTransientExpired($transient) ) {
                
                $refreshed_tokens = $this->getAuthRefreshTokens($transient['refreshToken']);
                
                if ( $refreshed_tokens ) {
                    $tokens = array_merge($transient, $refreshed_tokens);
                    $expiration = HOUR_IN_SECONDS * 2; // 30 @debug
                    $tokens['timeout'] = time() + $expiration;
                    $this->updateUserMeta($this->localUser->data->ID, $tokens);
                }
            } else {
                $tokens = $transient;
            }
        }
        
        if ( $requestTokens ) {

            $tokens = $this->getAuthLoginTokens($this->getUserLoginForTokens(), $password);
            
            if ( $tokens ) {
                $expiration = HOUR_IN_SECONDS * 2; // 30 @debug
                $tokens['timeout'] = time() + $expiration;
                $this->updateUserMeta($this->localUser->data->ID, $tokens);
            }
        }
        
        return $tokens;
    }
    
    /**
     *
     */
    protected function getAuthLoginTokens($login, $password) 
    {
        static $response = null;
        if ( ! is_null($response) ) {
            return $response;
        }
        
        /**
         * Request tokens.
         */				
        try {
            $response = $this->mlmsoftPlugin->api3->post(
                "auth/login", 
                array(
                  "password" => $password,
                  "login"	 => $login,
                  "networkAccount" => true
                )
            );
        } catch (Exception $e) {
            $response = false;
        }
        
        return $response;
    }

    /**
     * Refresh tokens.
     *
     * @return bool | array
     */
    protected function getAuthRefreshTokens($refreshToken) 
    {
        try {
            $response = $this->mlmsoftPlugin->api3->post(
                "auth/refresh-token",
                array(
                  "token" => $refreshToken
                )
            );
        } catch (Exception $e) {
            $response = false;
        }
        
        if ( ! $response ) {
            return $response;
        }
        
        if ( isset( $response['accessToken'], $response['refreshToken'] ) ) {
            return $response;
        }
        
        return false;
    }

    /**
     * Add online office menu item to my-account items.
     *
     * @return array
     */
    public function addAccountMenuItem($items, $endpoints) 
    {
        /**
         * If you need to customize the URL of the menu item you should modify the template file
         * @see woocommerce\templates\myaccount\navigation.php
         */
        $menuTitle = $this->mlmsoftPlugin->options->onlineOfficeMenuTitle;
        
        if ( empty($menuTitle) ) {
            $menuTitle = 'Online Office';
        }
        $items[self::ONLINEOFFICE_MENU_SLUG] = $menuTitle;
        
        return $items;
    }

    /**
     * Get online office URL.
     *
     * @return string
     */
    public function getEndpointUrl($url, $endpoint, $value, $permalink) 
    {
        if ( $endpoint !== self::ONLINEOFFICE_MENU_SLUG ) {
            return $url;
        }
        
        static $_url = null;
        if ( ! is_null($_url) ) {
            return $_url;
        }

        $this->localUser = MLMSoftLocalUser::loadFromCurrent(); 
        
        if ( $this->localUser->isInternalUser() || $this->localUser->getAccountId() === 0 ) {
            /**
             * Set a unique URL anchor for the internal user.
             */
            $_url = '#noOnlineOfficeForLocalUser';
            return $_url;
        }
        
        /**
         * Get tokens.
         */
        $tokens = $this->getTokens();
        
        $_url = '';
        
        if ( $tokens ) {
            $_url = $this->mlmsoftPlugin->options->onlineOfficeUrl;
            if ( ! empty($_url) ) {
                $_url = trailingslashit($_url);

                $_url  = $_url.'#auth(';
                $_url .= $tokens['accessToken'].','.$tokens['refreshToken'];
                $_url .= ','.$tokens['remoteAuthKey'];
                $_url .= ')';			
            }
        }
        
        return $_url;    
    }
    
    /**
     * Authenticate success filter.
     */
    public function authSuccess($user, $localUser, $password) 
    {
        /**
         * @since 3.8.3
         */
        $this->updateUserMeta(
            $localUser->data->ID, 
            [
                'password' => $password, 
                'login' => $localUser->data->user_email
            ]
        );
        
        return $user;
    }

    /**
     * @since 3.8.3
     */
    protected function updateUserMeta($user_id, $attr = [])
    {
        update_user_meta( 
            $user_id, 
            $this->getTransientKey(),  
            $attr
        );
    }

}
