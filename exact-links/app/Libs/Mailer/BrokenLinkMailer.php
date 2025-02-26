<?php

namespace ExactLinks\App\Libs\Mailer;

use ExactLinks\App\Models\Link;

class BrokenLinkMailer {
 
    public static function brokenLinkMailSend() 
    {
        $brokenLinks      =  Link::where('status', 'broken')->get();
        $brokenLinksCount =  count($brokenLinks);
        $name             = 'link';
        $brokenLinksURL   =  get_site_url().'/wp-admin/admin.php?page=wplink-exactlinks#/?status=broken'; 
        $settings         =  get_option('exactlinks_settings');

        if (($settings['isEmailBrokenLink'] == 'no')) {
            return;
        }
       
        if (empty($settings['brokenLinkEmail'])) {
            return;
        }

        if (!$brokenLinksCount) {
            return;
        }
       
        if ($brokenLinksCount > 1 ) {
            $name = 'links'; 
        }

        $sendEmail = explode(',', $settings['brokenLinkEmail']);
        
        if (count($sendEmail) > 1) {
            $settings['brokenLinkEmail'] = $sendEmail;
        }

        $to = $settings['brokenLinkEmail'];
        $subject = "[Exact Links] Broken Links Report";
        $body = "Howdy! Here's your daily broken $name report</br>
                Exact Links has detected $brokenLinksCount broken $name on your site</br>
                To fix them, visit the <a href='$brokenLinksURL' target='_blank'>Broken Links</a> page and edit the $name target URL.";
        $headers = array('Content-Type: text/html; charset=UTF-8');
        
        wp_mail( $to, $subject, $body, $headers );
    }
}