<?php

/**
 * @package Konfirmi Plugin
 */
namespace Konfirmi\Api\Callbacks;

use \Konfirmi\Api\RestfulApi;
use \Konfirmi\Api\RequestHelper;
use \Konfirmi\Models\WidgetModel;
use \Konfirmi\Base\URL;

/**
 * Class for Konfirmi Admin panel.
 */
class AdminCallbacks extends RestfulApi
{
    public $isUserLogged = false;
    /**
     * Render Konfirmi Admin Dashboard using Twig template engine
     */
    public function adminDashboard()
    {
        $requestHelper = new RequestHelper(); 
        $widgets_data = $requestHelper->loadWidgets();
        $widgetModel = new WidgetModel();
        $notifies = [];

        $this->tryLogin();
        if(URL::getURLParam('logout')=="true"){
            $this->logout();
        } 
        $requestHelper->asignWidgetToForm($widgetModel, $notifies);
        $widgetForms = $widgetModel->getWidgetForms();

        if (!is_null($widgets_data['data']['widgets'])) {
            foreach ($widgets_data['data']['widgets'] as &$widget) {
                foreach ($widgetForms as $widgetForm) {
                    if ($widget['id'] == $widgetForm->widget_id) {
                        $widget['form'] = $widgetForm->form_id;
                    }
                }
            }
        }
        
        $notifies = empty($notifies) ? NULL : $notifies;
        $data = array(
            'admin' => $this->config["admin"],
            'pluginUrl' => esc_url($this->plugin_url),
            'widgets' => $widgets_data['data']['widgets'],
            'errors' => $this->getErrorsFromWidgets($widgets_data),
            'site_url' => esc_url(URL::getSiteURL()),
            'notifies' => $notifies,
            'forms' => $widgetModel->getForms(),
            'api' => $this->config["api"],
            'isUserLogged'=>$this->isUserLogged
        );
        echo $this->twig->render("admin.twig", $data);
    }

    /**
     * Read token from url and try to login
     */
    public function tryLogin(){
        $this->clearCookies();
        setcookie('konfirmiToken', '', time() - ($this->config["api"]["tokenExpireAt"]),'/');
        $redirect_uri = URL::removeParam( 'token', URL::getSiteURL());
        if(strlen(URL::getURLParam('token')) > 0 ){
            setcookie('konfirmiToken', URL::getURLParam('token'), time() + ($this->config["api"]["tokenExpireAt"]),"/");
            $this->isUserLogged = true;
            if(!isset($_COOKIE['konfirmiToken'])){
                header('Location: ' . $redirect_uri, true, $this->config["api"]["REDIRECT_STATUS"]); // remove token from url
            }
        } elseif (isset($_COOKIE['konfirmiToken'])){
            setcookie('konfirmiToken', $_COOKIE['konfirmiToken'], time() + ($this->config["api"]["tokenExpireAt"]), '/');
            $this->isUserLogged = true;
        }
    }

    public function clearCookies(){
        // unset cookies
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookie = 'konfirmiToken';
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', 1);
            setcookie($name, '', 1, '/'); 
        }
    }

    /**
     * Check errors from widgets
     *
     * @param object $widget_data object with widgets and error 
     * @return array array of errors or NULL
     */
    function getErrorsFromWidgets($widgets_data){
        $errors = [];
        if(!empty($widgets_data['error'])){
            $errors[] = $widgets_data['error'];
        }
        return  empty($errors) ? NULL : $errors;
    }
    /**
     * Clear user token in cookies
     */
    public function logout(){
        $this->isUserLogged = false;
        $this->clearCookies();
    }
}
