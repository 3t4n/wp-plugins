<?php

namespace ExactLinks\App\Traits;

trait Settings
{
    
    public static function globalSettings()
    {
        return apply_filters('exactlinks/globalSettings',[
            'redirection'        => 301,
            'slugCharacter'      => 3,
            'activeCookies'      => 30,
            'currency'           => '$',
            'pageRedirection404' => '',
            'isEmailBrokenLink'  => 'yes',
            'isCustomSubdomain'  => 'no',
            'brokenLinkEmail'    => get_option('admin_email'),
            'disclosure'         => 'We earn a commission if you make a purchase, at no additional cost to you.',
        ]);
    }
}