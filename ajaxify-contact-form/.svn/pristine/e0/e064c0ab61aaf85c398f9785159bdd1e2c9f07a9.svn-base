<?php

if (!defined('ABSPATH')) exit;

final class acf_defaults {
    public $settings = array(
        '__version__'=>'1.0.3',
        '__date__'=>'2013.11.1.',
        '__build__'=>'1000',
        '__status__'=>'stable',
        'Enable'=>'1',
        'duplicateemail'=>'0',
        'emailsubject'=>'Contact Form',
        'VPositionPx'=>'30%',
        'DeveloperCopy'=>'1',
        'Message'=>'Message',
        'Your_name'=>'Your name',
        'Email'=>'Email',
        'Website'=>'Website',
        'Send_Message'=>'Message',
        'Success_Text'=>'Well Done!<br> Thank you for your message!',
        'Close'=>'Close',
        'Required'=>'(required)',
    );

    function __construct() { }

    public function upgrade($old, $scope = 'settings') {
        $work = $this->settings;

        foreach ($work as $key => $value) {
            if (!isset($old[$key])) {
                $old[$key] = $value;
            }
        }

        $unset = array();
        foreach ($old as $key => $value) {
            if (!isset($work[$key])) {
                $unset[] = $key;
            }
        }

        if (!empty($unset)) {
            foreach ($unset as $key) {
                unset($old[$key]);
            }
        }

        foreach ($work as $key => $value) {
            if (substr($key, 0, 2) == '__') {
                $old[$key] = $value;
            }
        }

        return $old;
    }
}

?>