<?php

namespace AnEasySkypeButton;


use AnEasySkypeButton\Admin\Settings;
use WPExpress\UI\RenderEngine;

class Shortcodes
{

    public function __construct()
    {
        add_shortcode( 'easy-skype-button', array( __CLASS__, 'skypeButtonShortcode' ) );
    }

    public static function renderSkypeButton()
    {
        $settings = new Settings();

        $defaultAccount = $settings->getValue('defaultAccount');

        if(empty( $defaultAccount )){
            return '<!-- This is not here! -->';
        }

        $targetElementID = "anEasySkypeButton_" . mt_rand();
        $templatePath = Setup::getResourceDirectory('', 'templates/mustache');
        $engine = new RenderEngine('mustache', $templatePath );

        $context = array(
            'targetElementID' => $targetElementID,
            'defaultAccount' => $defaultAccount,
            'imageSize' => 24,
        );

        return $engine->renderTemplate( "{$templatePath}/skype-button.mustache", $context );
    }

    public static function skypeButtonShortcode($atts)
    {
        // TODO: Implement custom parameters and validation
        $a = shortcode_atts( array(
            'foo' => 'something',
            'bar' => 'something else',
        ), $atts );

        self::renderSkypeButton();
    }

}