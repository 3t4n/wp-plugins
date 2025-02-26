<?php

/**
 *    __  _____   ___   __          __
 *   / / / /   | <  /  / /   ____ _/ /_  _____
 *  / / / / /| | / /  / /   / __ `/ __ `/ ___/
 * / /_/ / ___ |/ /  / /___/ /_/ / /_/ (__  )
 * `____/_/  |_/_/  /_____/`__,_/_.___/____/
 *
 * @package FireStudio
 * @author UA1 Labs Developers https://ua1.us
 * @copyright Copyright (c) UA1 Labs
 */

namespace UA1Labs\Fire\Studio;

use \ReflectionObject;

abstract class Feature
{

    /**
     * Frontend scripts to load
     *
     * @var array<string>
     */
    private $wpFrontendScripts;

    /**
     * Admin scripts to load
     *
     * @var array<string>
     */
    private $wpAdminScripts;

    /**
     * Frontend stylesheets to load
     *
     * @var array<string>
     */
    private $wpFrontendStyleseets;

    /**
     * Admin stylesheets to load
     *
     * @var array<string>
     */
    private $wpAdminStylesheets;

    /**
     * Adds a script to the head of a frontend wordpress page.
     *
     * @param string $id A unique ID to identify the script
     * @param string $script The server root path of the script
     */
    protected function addFrontendScript($id, $script)
    {
        if (!isset($this->wpFrontendScripts)) {
            $this->wpFrontendScripts = [];
        }
        $this->wpFrontendScripts[$id] = $this->getAssetUrl($script);
    }

    /**
     * Adds a script to the head of a admin wordpress page.
     *
     * @param string $id A unique ID to identify the script
     * @param string $script The server root path of the script
     */
    protected function addAdminScript($id, $script)
    {
        if (!isset($this->wpAdminScripts)) {
            $this->wpAdminScripts = [];
        }
        $this->wpAdminScripts[$id] = $this->getAssetUrl($script);
    }

    /**
     * Adds a stylesheet to the head of a frontend wordpress page.
     *
     * @param string $id A unique ID to identify the stylesheet
     * @param string $stylesheet The server root path of the stylesheet
     */
    protected function addFrontendStylesheet($id, $stylesheet)
    {
        if (!isset($this->wpFrontendStyleseets)) {
            $this->wpFrontendStyleseets = [];
        }
        $this->wpFrontendStyleseets[$id] = $this->getAssetUrl($stylesheet);
    }

    /**
     * Adds a stylesheet to the head of an admin wordpress page.
     *
     * @param string $id A unique ID to identify the stylesheet
     * @param string $stylesheet The server root path of the stylesheet
     */
    protected function addAdminStylesheet($id, $stylesheet)
    {
        if (!isset($this->wpAdminStylesheets)) {
            $this->wpAdminStylesheets = [];
        }
        $this->wpAdminStylesheets[$id] = $this->getAssetUrl($stylesheet);
    }


    /**
     * Automatically registers frontend scripts registered
     * using Feature::addFrontendScript()
     *
     * @action wp_enqueue_scripts
     */
    public function enqueueFrontendScriptsAndStylesheets()
    {
        if (isset($this->wpFrontendScripts) && is_array($this->wpFrontendScripts)) {
            foreach ($this->wpFrontendScripts as $id => $script) {
                wp_enqueue_script($id, $script);
            }
        }

        if (isset($this->wpFrontendStyleseets) && is_array($this->wpFrontendStyleseets)) {
            foreach ($this->wpFrontendStyleseets as $id => $stylesheet) {
                wp_enqueue_style($id, $stylesheet);
            }
        }
    }

    /**
     * Automatically registers admin scripts registered
     * using Feature::addAdminScript()
     *
     * @action admin_enqueue_scripts
     */
    public function enqueueAdminScriptsAndStylesheets()
    {
        if (isset($this->wpAdminScripts) && is_array($this->wpAdminScripts)) {
            foreach ($this->wpAdminScripts as $id => $script) {
                wp_enqueue_script($id, $script);
            }
        }

        if (isset($this->wpAdminStylesheets) && is_array($this->wpAdminStylesheets)) {
            foreach ($this->wpAdminStylesheets as $id => $stylesheet) {
                wp_enqueue_style($id, $stylesheet);
            }
        }
    }

    /**
     * Parses the doc block comment from methods. Determines
     * if @action and @priority is set and calls ::addAction()
     * if those values are set.
     */
    public function initWpHooksByDecorators()
    {
        $feature = new ReflectionObject($this);
        foreach ($feature->getMethods() as $method) {
            $methodName = $method->getName();
            $docComment = $method->getDocComment();
            $docConfig = $this->parseDocComment($docComment);

            if (isset($docConfig->{'@action'})) {
                $action = $docConfig->{'@action'};
                $priority = isset($docConfig->{'@priority'}) ? $docConfig->{'@priority'} : 10;
                $this->addAction($action, $methodName, $priority);
            }
        }
    }

    /**
     * Parses a doc block data from ReflectionMethod.
     *
     * @param string $docComment
     * @return object An object containing @configs matched with values
     */
    private function parseDocComment($docComment)
    {
        \preg_match_all("#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#", $docComment, $matches, PREG_PATTERN_ORDER);
        $docConfig = (object) [];
        foreach ($matches[0] as $config) {
            $conf = \explode(' ', $config, 2);
            $docConfig->{$conf[0]} = $conf[1];
        }
        return $docConfig;
    }

    /**
     * A proxy for the wp function \add_action().
     *
     * @param string $action The WP Action to key from
     * @param string $method The method in this feature to run
     * @param int $priority The priority of the action
     * @return void
     */
    protected function addAction($action, $method, $priority = 10)
    {
        \add_action($action, [$this, $method], $priority);
    }

    /**
     * Returns a public URL to access an asset from the
     * server root path.
     *
     * @param string $rootPath
     * @return string
     */
    protected function getAssetUrl($rootPath)
    {
        $path = realpath($rootPath);
        $wpContentStart = strpos($path, '/wp-content');
        $assetUrl = substr($path, $wpContentStart);
        return $assetUrl;
    }

}