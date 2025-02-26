<?php
/**
* @package Appointmind
*/
/*
Plugin Name: Appointmind
Plugin URI: http://www.appointmind.com/wordpress-plugin/?tracking=wordpress
Description: Include your Appointmind or Schedule Organizer online appointment scheduling calender in any article or in the sidebar. This plugin requires that you have purchased either a monthly subscription or the downloadable version of the software. This plugin does not include the appointmind scheduling software. You can get the subscription or the software at <a href="https://www.appointmind.com/?tracking=wordpress" target="_blank">Appointmind.com</a>.
Version: 4.1.0
Author: GentleSource
Author URI: https://www.appointmind.com/?tracking=wordpress
Text Domain: appointmind
Domain Path: /languages
*/
require_once dirname(__FILE__) . '/settings.php';
require_once dirname(__FILE__) . '/widget.php';

/**
 *
 */
class Appointmind
{
    /**
     * View object
     */
    private $view = null;

    /**
     * Settings
     */
    private $settings = null;

    /**
     * Register Hooks and do other constructing stuff
     */
    public function __construct()
    {
	    add_shortcode('appointmind_calendar', [&$this, 'displayArticleCalendarShortCode']);
	    add_shortcode('appointmind_patient_order', [&$this, 'displayArticlePatientOrderFormShortCode']);
	    add_filter('the_content', [&$this, 'displayArticleCalendar']);
	    add_action('widgets_init', [&$this, 'registerSidebarWidget']);
	    add_action('init', [&$this, 'defineLocale']);
        add_action('init', [&$this, 'init']);
        add_action('wp_footer', [&$this, 'footerCode'], 9999);

	    $this->settings = new AppointmindSettings;
        add_action('admin_menu', [&$this->settings, 'settingsMenu']);


        $this->view = new stdClass;
        $this->view->placeHolder = $this->settings->placeHolder;
        $this->view->settingOptionName = $this->settings->settingOptionName;
    }

    /**
     * Define locale stuff
     */
    public function defineLocale()
    {
	    load_plugin_textdomain($this->settings->settingOptionName, dirname(__FILE__) . '/languages', basename(dirname(__FILE__)) . '/languages');
    }

    /**
     * Init
     */
    public function init()
    {
		wp_enqueue_script('jquery');
    }

    /**
     * Footer
     */
    public function footerCode()
    {
        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        $urlParts = parse_url($this->view->calendarUrl);

        $appointmindUrlDomain = $urlParts['scheme'] . '://' . $urlParts['host'];
        $appointmindUrlPath = $urlParts['path'];
        $appointmindUrlParameters = '';

        if (!empty($urlParts['query'])) {
            $appointmindUrlParameters = '?' . $urlParts['query'];
        }

        $view = $this->view;

        include dirname(__FILE__) . '/templates/footer_code.php';
    }

    /**
     * Display calendar in article
     */
    public function displayArticleCalendar($content)
    {
        if (strpos($content, '{' . $this->settings->placeHolder . '}') === false) {
            return $content;
        }

        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        if (empty($this->view->calendarUrl) or $this->view->calendarUrl == 'http://') {
            return str_replace('{' . $this->settings->placeHolder . '}', '', $content);
        }

        $urlParts = parse_url($this->view->calendarUrl);

        $appointmindUrlDomain = $urlParts['scheme'] . '://' . $urlParts['host'];
        $appointmindUrlPath = $urlParts['path'];
        $appointmindUrlParameters = '';

        if (!empty($urlParts['query'])) {
            $appointmindUrlParameters = '?' . $urlParts['query'];
        }

        $calendarContent = '';
        $view = $this->view;

    	ob_start();
        include dirname(__FILE__) . '/templates/article_calendar.php';
        $calendarContent = ob_get_contents();
        ob_end_clean();

        $content = str_replace('{' . $this->settings->placeHolder . '}', $calendarContent, $content);

        return $content;
    }


    /**
     * Display calendar in article
     */
    public function displayArticleCalendarShortCode($params)
    {
        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        if (empty($this->view->calendarUrl) or $this->view->calendarUrl == 'http://') {
            return '';
        }

        $urlParts = parse_url($this->view->calendarUrl);

        $appointmindUrlDomain = $urlParts['scheme'] . '://' . $urlParts['host'];
        $appointmindUrlPath = $urlParts['path'];
        $appointmindUrlParameters = '';

        if (!empty($urlParts['query'])) {
            $appointmindUrlParameters = '?' . $urlParts['query'];
        }

        $attributes = shortcode_atts([
            'id' => null,
            'reason' => null,
            'language' => null,
        ], $params );

        if (!empty($attributes['id'])) {
            if (empty($appointmindUrlParameters)) {
                $appointmindUrlParameters = '?cap=' . $attributes['id'];
            } else {
                $appointmindUrlParameters .= '&amp;cap=' . $attributes['id'];
            }
        }
        if (!empty($attributes['reason'])) {
            if (empty($appointmindUrlParameters)) {
                $appointmindUrlParameters = '?reason=' . $attributes['reason'];
            } else {
                $appointmindUrlParameters .= '&amp;reason=' . $attributes['reason'];
            }
        }
        if (!empty($attributes['language'])) {
            if (empty($appointmindUrlParameters)) {
                $appointmindUrlParameters = '?select_lang=' . $attributes['language'] . '_utf8';
            } else {
                $appointmindUrlParameters .= '&amp;select_lang=' . $attributes['language'] . '_utf8';
            }
        }

        $calendarContent = '';
        $view = $this->view;

    	ob_start();
        include dirname(__FILE__) . '/templates/article_calendar.php';
        $calendarContent = ob_get_contents();
        ob_end_clean();

        return $calendarContent;
    }

    /**
     * Display order forms in article
     */
    public function displayArticlePatientOrderFormShortCode($params)
    {
        $formType = '';
        $settings = $this->settings->readSettings();

        $this->view = (object) array_merge((array) $this->view, $settings);

        if (empty($this->view->calendarUrl) or $this->view->calendarUrl == 'http://') {
            return '';
        }

        $urlParts = parse_url($this->view->calendarUrl);

        $appointmindUrlDomain = $urlParts['scheme'] . '://' . $urlParts['host'];
        $appointmindUrlPath = $urlParts['path'];
        $appointmindUrlParameters = '';

        if (!empty($urlParts['query'])) {
            $appointmindUrlParameters = '?' . $urlParts['query'];
        }

        $attributes = shortcode_atts([
            'form' => null,
        ], $params );

        if (empty($attributes['form'])) {
            return '';
        }

        $formType = trim($attributes['form']);

        $calendarContent = '';
        $view = $this->view;

    	ob_start();
        include dirname(__FILE__) . '/templates/article_order_form.php';
        $calendarContent = ob_get_contents();
        ob_end_clean();

        return $calendarContent;
    }

    /**
     * Register sidebar widget
     */
    public function registerSidebarWidget()
    {
        register_widget('AppointmindWidget');
    }

    /**
     * Translate
     */
    public function __($string)
    {
        return __($string, $this->settings->settingOptionName);
    }
}

new Appointmind;