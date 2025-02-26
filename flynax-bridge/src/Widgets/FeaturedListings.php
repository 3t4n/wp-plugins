<?php

namespace Flynax\Plugins\FlynaxBridge\Widgets;

use Flynax\Plugins\FlynaxBridge\Cache;
use Flynax\Plugins\FlynaxBridge\FlynaxBridge;
use Flynax\Plugins\FlynaxBridge\Request;
use Flynax\Plugins\FlynaxBridge\View;
use Flynax\Plugins\FlynaxBridge\Widgets;
use WP_Widget;

/**
 * Class FeaturedListings
 *
 * @since 2.0.0
 *
 * @package Flynax\Plugins\FlynaxBridge\Widgets
 */
class FeaturedListings extends WP_Widget
{
    /**
     * @var array - Default option of the admin-panel form of the widget
     */
    private $options = array(
        'default' => array(
            'img_width' => 190,
            'img_height' => 130,
            'l_count' => 4,
        ),
    );

    /**
     * @var array - Widgets validation errors
     */
    private $errors = array();

    /**
     * @var array - Field of the admin-panel form
     */
    private $formFields = array();

    /**
     * FeaturedListings constructor.
     */
    public function __construct()
    {
        $options = array(
            'widget' => array(
                'description' => __('Display listings from your Flynax site', FlynaxBridge::PLUGIN_KEY),
            ),
            'control' => array(
                'img_width' => $this->options['default']['img_width'],
                'img_height' => $this->options['default']['img_height'],
            ),
        );

        parent::__construct(
            Widgets::WIDGET_KEY,
            __('Flynax Listings', FlynaxBridge::PLUGIN_KEY),
            $options['widget'],
            $options['control']
        );

        $this->formFields = array(
            'title',
            'l_count',
            'l_mode',
            'l_type',
            'img_height',
            'img_width',
        );
    }

    /**
     * Prepare form data to display it on the view properly
     *
     * @param WP_Widget $instance - Widget instance
     *
     * @return array - Prepared for rendering in view data
     */
    public function prepareFormData($instance)
    {
        $form = array();
        foreach ($this->formFields as $field) {
            $form[$field] = array(
                'id' => $this->get_field_id($field),
                'name' => $this->get_field_name($field),
                'value' => (isset($instance[$field]) ? $instance[$field] : $this->options['default'][$field]) ?: '',
            );
        }
        return $form;
    }

    /**
     * Admin Panel form showing callback
     *
     * @param WP_Widget $instance - Instance of the WordPress widget
     *
     * @return void
     */
    public function form($instance)
    {
        $form = $this->prepareFormData($instance);
        $formValues = array_combine(array_keys($form), array_column($form, 'value'));
        if (!empty($this->errors) || $errors = $this->validateForm($formValues)) {
            $errors = $errors ?: $this->errors;
            View::display('Widgets/FeaturedListings/errors.php', compact('errors'));
        }

        $widgetsClass = $this;
        $sendingParams = [];

        $response = Request::get('/listing-types');

        if (!is_wp_error($response)) {
            $json = $response['body'];
            $listingTypes = json_decode($json, true);
            if ($listingTypes['data']['listing_types']) {
                $listingTypes = $listingTypes['data']['listing_types'];
                $sendingParams = compact(
                    'instance',
                    'widgetsClass',
                    'form',
                    'listingTypes'
                );
            }
        }

        View::display('Widgets/FeaturedListings/form.php', $sendingParams);
    }

    /**
     * Update values from admin-panel form
     *
     * @param array $new - New data
     * @param array $old - Old data
     *
     * @return mixed
     */
    public function update($new, $old)
    {
        $sanitizedFields = array(
            'title' => sanitize_text_field(htmlentities($new['title'])),
            'l_count' => (int) $new['l_count'],
            'l_mode' => sanitize_text_field($new['l_mode']),
            'l_type' => sanitize_text_field($new['l_type']),
            'img_height' => (int) $new['img_height'],
            'img_width' => (int) $new['img_width'],
        );
        $errors = $this->validateForm($sanitizedFields);

        if (!empty($errors)) {
            $this->errors = $errors;
        }

        return $sanitizedFields;
    }

    /**
     * Does new configuration values are the same as an old ones
     *
     * @param array $newConfigs - Old configuration values
     * @param array $oldConfigs - New configuration values
     *
     * @return bool
     */
    public function isClean($newConfigs, $oldConfigs)
    {
        $listeningConfigs = ['l_mode', 'l_type', 'l_count'];
        $isClean = true;

        foreach ($listeningConfigs as $config) {
            if ($newConfigs[$config] !== $oldConfigs[$config]) {
                $isClean = false;
                break;
            }
        }

        return $isClean;
    }

    /**
     * Widget front-end part rendering callback
     *
     * @param array     $args     - Helper arguments of the widget
     * @param WP_Widget $instance - Widget instance
     */
    public function widget($args, $instance)
    {
        if (!$this->isValid($instance)) {
            return;
        }

        wp_enqueue_style(FlynaxBridge::PLUGIN_KEY . '_widgets', FLYNAX_BRIDGE_PLUGIN_URL . 'assets/css/widgets.css');

        $widgetTitle = !empty($instance['title'])
            ? $args['before_title'] . $instance['title'] . $args['after_title']
            : '';
        $imgStyle = sprintf("style='width:%spx;height:%spx;'", $instance['img_width'], $instance['img_height']);

        $listings = Cache::getFlListings($this->number);

        View::display(
            'Widgets/FeaturedListings/fl-listings.php',
            compact(
                'args',
                'instance',
                'listings',
                'imgStyle',
                'widgetTitle'
            )
        );
    }

    /**
     * Validate all incoming widget configurations
     *
     * @param  array $fields - Widget configuration values
     * @return array         - Errors
     */
    public function validateForm($fields)
    {
        $validationErrors = array();

        $requiredFields = array(
            'l_count' => __('Listings count:', 'fl_bridge'),
            'img_height' => __('Image height:', 'fl_bridge'),
            'img_width' => __('Image width:', 'fl_bridge'),
        );

        foreach ($fields as $fieldKey => $fieldValue) {
            if (in_array($fieldKey, array_keys($requiredFields)) && !$fields[$fieldKey]) {
                $validationErrors[] = sprintf("'%s' is required", $requiredFields[$fieldKey]);
            }
        }

        return $validationErrors;
    }

    /**
     * Does all saving configuration of the widget are valid
     *
     * @param array $fields - Widget configuration values
     *
     * @return bool
     */
    public function isValid($fields)
    {
        return is_array($fields) ? !$this->validateForm($fields) : false;
    }
}
