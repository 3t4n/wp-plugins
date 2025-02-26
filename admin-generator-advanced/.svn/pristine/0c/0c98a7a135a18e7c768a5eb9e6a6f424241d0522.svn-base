<?php
namespace HM\REST_API;

class restApi
{
    var $accessError = "{'You don\'t have access here'}";

    public function __construct()
    {

        add_action('rest_api_init', array($this, 'restRoutes'));
    }

    public function restRoutes()
    {
        $apiNamespace = 'aga/v1';
        $this->setDbData($apiNamespace);
        $this->getDbData($apiNamespace);
        $this->getCPTs($apiNamespace);
        $this->getPlugins($apiNamespace);
        $this->getThemes($apiNamespace);

    }
    //++++++++++++++++++++++++++++++++++++++++++++++++
    //************************************************
    //setDbData START
    //************************************************
    //++++++++++++++++++++++++++++++++++++++++++++++++

    //store the entire array sent from angular front end to the database as one serialized string
    private function setDbData($vNamespace)
    {
        global $wpdb;
        $xThis = $this;
        $vRoute = '/setDbData';
        // Register our first endpoint
        register_rest_route(
            $vNamespace,
            $vRoute,
            array(
                'methods' => 'POST',
                'callback' => array($this, 'setDbData_callback'),
                'args' => array(
                    'key' => array(
                        'validate_callback' => array($this, 'validate_callback')
                    )
                )
            )
        );

    }

    //insert settings main functionality callback
    public function setDbData_callback($data)
    {
        //callback function functionality
        // authentificate
        if ($data['key'] != AUTH_KEY) {
            return $xThis->accessError;
        }
        //default Values
        $agaData = $data['data'] ? $data['data'] : '';//the entire array from javascript

        $result = update_option('agaData', $agaData);

        return $result;
    }
    //------------------------------------------------
    //************************************************
    //setDbData END
    //************************************************
    //------------------------------------------------

    //++++++++++++++++++++++++++++++++++++++++++++++++
    //************************************************
    //getDbData START
    //************************************************
    //++++++++++++++++++++++++++++++++++++++++++++++++

    //store the entire array sent from angular front end to the database as one serialized string
    private function getDbData($vNamespace)
    {
        global $wpdb;
        $xThis = $this;
        $vRoute = '/getDbData';
        // Register our first endpoint
        register_rest_route(
            $vNamespace,
            $vRoute,
            array(
                'methods' => 'POST',
                'callback' => array($this, 'getDbData_callback'),
                'args' => array(
                    'key' => array(
                        'validate_callback' => array($this, 'validate_callback')
                    )
                )
            )
        );

    }

    //insert settings main functionality callback
    public function getDbData_callback($data)
    {
        //callback function functionality
        // authentificate
        if ($data['key'] != AUTH_KEY) {
            return $this->accessError;
        }
        //default Values
        $data = '';
        $data = get_option('agaData');
        return $data;
    }

    //------------------------------------------------
    //************************************************
    //getDbData END
    //************************************************
    //------------------------------------------------

    //++++++++++++++++++++++++++++++++++++++++++++++++
    //************************************************
    //get custom post types START
    //************************************************
    //++++++++++++++++++++++++++++++++++++++++++++++++

    //store the entire array sent from angular front end to the database as one serialized string
    private function getCPTs($vNamespace)
    {
        global $wpdb;
        $xThis = $this;
        $vRoute = '/getCPTs';
        // Register our first endpoint
        register_rest_route(
            $vNamespace,
            $vRoute,
            array(
                'methods' => 'POST',
                'callback' => array($this, 'getCPTs_callback'),
                'args' => array(
                    'key' => array(
                        'validate_callback' => array($this, 'validate_callback')
                    )
                )
            )
        );

    }

    //get available custom post types
    public function getCPTs_callback($data)
    {
        //callback function functionality
        // authentificate
        if ($data['key'] != AUTH_KEY) {
            return $xThis->accessError;
        }
        //default Values
        $data = '';
        $data = get_post_types();
        return $data;


        return true; //returns inserted id
    }
    //------------------------------------------------
    //************************************************
    //get custom post types END
    //************************************************
    //------------------------------------------------


    //++++++++++++++++++++++++++++++++++++++++++++++++
    //************************************************
    //get available Plugins ListSTART
    //************************************************
    //++++++++++++++++++++++++++++++++++++++++++++++++

    //store the entire array sent from angular front end to the database as one serialized string
    private function getPlugins($vNamespace)
    {
        global $wpdb;
        $xThis = $this;
        $vRoute = '/getPlugins';
        // Register our first endpoint
        register_rest_route(
            $vNamespace,
            $vRoute,
            array(
                'methods' => 'POST',
                'callback' => array($this, 'getPlugins_callback'),
                'args' => array(
                    'key' => array(
                        'validate_callback' => array($this, 'validate_callback')
                    )
                )
            )
        );

    }

    //get available custom post types
    public function getPlugins_callback($data)
    {
        //callback function functionality
        // authentificate
        if ($data['key'] != AUTH_KEY) {
            return false;
        }
        $allPlugins = array('');
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $allPlugins = get_plugins();
        foreach ($allPlugins as $key => $value) {
            $result[] = array(
                'key' => $key,
                'name' => $value['Name'],
                'options' => $value
            );
        }

        //default Values
        return $result;

    }
    //------------------------------------------------
    //************************************************
    //get available Plugins List END
    //************************************************
    //------------------------------------------------


    //++++++++++++++++++++++++++++++++++++++++++++++++
    //************************************************
    //get available Themes ListSTART
    //************************************************
    //++++++++++++++++++++++++++++++++++++++++++++++++

    //store the entire array sent from angular front end to the database as one serialized string
    private function getThemes($vNamespace)
    {
        global $wpdb;
        $vRoute = '/getThemes';
        // Register our first endpoint
        register_rest_route(
            $vNamespace,
            $vRoute,
            array(
                'methods' => 'POST',
                'callback' => array($this, 'getThemes_callback'),
                'args' => array(
                    'key' => array(
                        'validate_callback' => array($this, 'validate_callback')
                    )
                )
            )
        );

    }

    //get available custom post types
    public function getThemes_callback($data)
    {
        //callback function functionality
        // authentificate
        if ($data['key'] != AUTH_KEY) {
            return false;
        }
        $allThemes = array('');
        if (!function_exists('wp_get_themes')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        $allThemes = wp_get_themes();
        foreach ($allThemes as $key => $value) {
            $theme = wp_get_theme($key);
            $result[] = array(
                'key' => $key,
                'name' => $value['Name'],
                'options' => array(
                    'Name' => $theme->get('Name'),
                    'ThemeURI' => $theme->get('ThemeURI'),
                    'Description' => $theme->get('Description'),
                    'Author' => $theme->get('Author'),
                    'AuthorURI' => $theme->get('AuthorURI'),
                    'Version' => $theme->get('Version'),
                    'Template' => $theme->get('Template'),
                    'Status' => $theme->get('Status'),
                    'Tags' => $theme->get('Tags'),
                    'TextDomain' => $theme->get('TextDomain'),
                    'DomainPath' => $theme->get('DomainPath')
                )
            );
        }
        //default Values
        return $result;

    }
    //------------------------------------------------
    //************************************************
    //get available Themes List END
    //************************************************
    //------------------------------------------------


    //
    //
    //
    // GENERAL FUNCTIONS
    //
    //


    //validates all the callbacks
    public function validate_callback($param, $request, $key)
    {
        if ($param == AUTH_KEY) {
            return true;
        }
        return false;
    }


}

new restApi();
