<?php

if (!defined('ABSPATH')) exit;

class acf_ajax {
    var $settings;

    function __construct() {
        add_action('wp_ajax_acf_submit_message', array(&$this, 'acf_submit_message'));
        add_action('wp_ajax_nopriv_acf_submit_message', array(&$this, 'acf_submit_message'));
    }


    public function acf_get_visitor_ip() {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $ip = preg_replace('/[^0-9a-fA-F:., ]/', '', $ip);

        return trim($ip);
    }


    public function acf_submit_message() {
//        var_dump(DOING_AJAX);
//        var_dump($_REQUEST);
//        exit();
        global $acf_core_loader;
        $referrer = wp_get_referer();
        if ($referrer === false) {
            $referrer = '';
        }

        $ip = $this->acf_get_visitor_ip();
        $this->settings = $acf_core_loader->settings;


        $output = '';
        if ($output == '') {
            $headers = 'Content-type: text/html';

            $info = array(
                'IP' => $ip,
                'DATE' => date('r'),
                'REFERRER' => $referrer,
                'MESSAGE' => stripcslashes($_REQUEST['message']),
                'NAME' => strip_tags(stripcslashes($_REQUEST['name'])),
                'EMAIL' => strip_tags(stripcslashes($_REQUEST['email'])),
                'URL' => strip_tags(stripcslashes($_REQUEST['url']))
            );


            $content = '';
            $content = 'DATE: '.$info['DATE'].'<br/>'.
                       'IP: '.$info['IP'].'<br/>'.
                       'NAME: '.$info['NAME'].'<br/>'.
                       'EMAIL: '.$info['EMAIL'].'<br/>'.
                       'MESSAGE: '.$info['MESSAGE'].'<br/>'.
                       'URL: '.$info['URL'].'<br/>';

            $subject = $this->settings['emailsubject'];

            $target = get_option('admin_email');
            if ($this->settings['duplicateemail']) {
                $target = $target .','. $info['email'];
            }

            $res = wp_mail($target, $subject, $content, $headers);
            if ($res) {
                $output = 'success';
            }
        }

        header('content-type: application/json; charset=utf-8');
        die(json_encode(array('response' => $output)));
    }
}

?>