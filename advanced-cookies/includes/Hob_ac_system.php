<?php
/**
 * @package Advanced Cookies
 * @copyright Copyright (C) 2019 HOB-France.com, All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author url: https://www.hob-france.com/
 * @author email info@hob-fr.com
 */

require_once __DIR__ . '/helper.php';


/**
 * Hob_ac_system
 * 
 * Class de gestion des cookies en fonction de la réponse utilisateur
 * 
 */
class Hob_ac_system
{    
    /**
     * __construct
     *  Récupératio nde toutes les données nécessaire par type de cookie
     * @param  mixed $hob_cookie
     * @return void
     */
    public function __construct($hob_cookie)
   {
        $this->google_analytics = get_option('hod-ac-gs-check-google-analytics');
        $this->google_ads = get_option('hod-ac-gs-check-google-ads');
        $this->google_maps = get_option('hod-ac-gs-check-google-maps');
        $this->calemeo = get_option('hod-ac-gs-check-calameo');
        $this->Captcha_v2 = get_option('hod-ac-gs-check-captcha-2');
        $this->Captcha_v3 = get_option('hod-ac-gs-check-captcha-3');
        $this->chatbot = get_option('hod-ac-gs-chatbot');
        $this->mailChimp = get_option('hod-ac-gs-mailchimp');
        $this->facebook = get_option('hod-ac-gs-facebook');
        $this->twitter = get_option('hod-ac-gs-twitter');
        $this->google_plus = get_option('hod-ac-gs-google-plus');
        $this->linkedin = get_option('hod-ac-gs-linkedin');
        $this->pinterest = get_option('hod-ac-gs-pinterest');
        $this->instagram = get_option('hod-ac-gs-instagram');
        $this->youtube = get_option('hod-ac-gs-youtube');
        $this->vimeo = get_option('hod-ac-gs-vimeo');
        $this->dailymotion = get_option('hod-ac-gs-dailymotion');
        $this->cookieHob =  $hob_cookie;

        
        add_action('init', [ $this, 'hob_ac_foo_buffer_go' ]);

        add_action('shutdown', [ $this, 'hob_ac_foo_buffer_stop' ]);
    }
    
    /**
     * hob_ac_foo_buffer_go
     * 
     * function WP récuopération du buffer de la page
     *
     * @return void
     */
    public function hob_ac_foo_buffer_go(){
        ob_start(array('Hob_ac_system', 'hob_ac_callback'));
    }
    
    /**
     * hob_ac_callback
     * 
     * Function hob_ac_callback de ob_start : hob_ac_foo_buffer_go()
     *
     * @param  mixed $buffer
     * @return void
     */
    protected function hob_ac_callback($buffer){
        return $this->hob_ac_head_of_system($buffer,$this->cookieHob);
    }
    
    /**
     * hob_ac_foo_buffer_stop
     * 
     * function WP de fin de la modification du buffer
     *
     * @return void
     */
    public function hob_ac_foo_buffer_stop(){ 
        while ( @ob_end_flush() );
    }
    
    /**
     * hob_ac_head_of_system
     * 
     * Function qui selon la réponse de l'utilsiateur modifiera les données des éléments des pages
     *
     * @param  mixed $buffer
     * @param  mixed $cookieHob
     * @return void
     */
    public function hob_ac_head_of_system($buffer,$cookieHob){
    
        $hob_cookies = isset($cookieHob) ? sanitize_text_field($cookieHob) : '';

        if($hob_cookies != '') {
            /*
                * Block the service URLs.
                * The list of  the urls in the helper.php             *
                * */

            /*
            * CATEGORIE 2
            * */
            if ($this->google_analytics && $this->hob_ac_checkhobcookie($cookieHob,0) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('googletagmanager', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_google_analytics_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->google_ads && $this->hob_ac_checkhobcookie($cookieHob,0) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('google.com', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_google_ads_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->hob_ac_checkhobcookie($cookieHob,0) == 'N') {
                $target_google = array("_ga","_gid","_gat","_gac","__utma","__utmt","__utmb","__utmc","__utmz","__utmv","__utmx","__utmxx","_gaexp");
                self::hob_ac_google_analytics_cookie($target_google);
            }

            /*
            * CATEGORIE 3
            * */
            if ($this->google_maps && $this->hob_ac_checkhobcookie($cookieHob,1) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('google.com.maps', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_google_maps_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->calemeo && $this->hob_ac_checkhobcookie($cookieHob,1) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('calameo', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_calameo_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->Captcha_v2 && $this->hob_ac_checkhobcookie($cookieHob,1) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('recaptcha', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_recaptcha_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->Captcha_v3 && $this->hob_ac_checkhobcookie($cookieHob,1) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('recaptcha', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_recaptcha_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->mailChimp && $this->hob_ac_checkhobcookie($cookieHob,1) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('mailchimp', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_mailchimp_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            if ($this->hob_ac_checkhobcookie($cookieHob,1) == 'N') {
                self::hob_ac_killallcookies();
            }

            /*
            * CATEGORIE 4
            * */
            //Facebook
            if ($this->facebook && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('facebook', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_facebook_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Google Plus
            if ($this->google_plus && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('plus.google', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_google_plus_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Linkedin
            if ($this->linkedin && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('linkedin', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_linkedin_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //TWitter
            if ($this->twitter && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('twitter', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_twitter_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Instagram
            if ($this->instagram && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('instagram', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_instagram_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Pintrest
            if ($this->pinterest && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('pinterest', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_pinterest_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Youtube
            if ($this->youtube && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('youtube', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_youtube_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Vimeo
            if ($this->vimeo && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('vimeo', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_vimeo_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            //Dailymotion
            if ($this->dailymotion && $this->hob_ac_checkhobcookie($cookieHob,2) == 'N') {
                $buffer = $this->hob_ac_replace_iframe_src('dailymotion', 'data-', $buffer);
                $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_dailymotion_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            }
            /*
            * CATEGORIE 5
            * */
            //Other
            // if ($this->hob_ac_checkhobcookie('hob_cookie',3) == 'N') {
            //     $buffer = $this->hob_ac_cookie_blocker(hobrgpdsystemHelper::hob_ac_other_service_address(), 'NotAllowedScript'.uniqid(), $buffer);
            // }

        }
        
        $search_except = [
            '[AC_URL_FACEBOOK]',
            '[AC_URL_TWITTER]',
            '[AC_URL_LINKEDIN]',
            '[AC_URL_PINTEREST]',
            '[AC_URL_INSTAGRAMM]',
            '[AC_URL_VIMEO]',
            '[AC_URL_DAILYMOTION]',
            '[AC_NAME_GM]',
            '[AC_NAME_RC2]',
            '[AC_NAME_RC3]',
            '[AC_URL_CALAMEO]',
            '[AC_URL_MAILCHIMP]'
        ];
        $replace_except = [
            'https://www.facebook.com/policies/cookies/',
            'https://help.twitter.com/fr/rules-and-policies/twitter-cookies',
            'https://www.linkedin.com/legal/cookie-policy',
            'https://policy.pinterest.com/fr/cookies',
            'https://fr-fr.facebook.com/help/instagram/1896641480634370',
            'https://vimeo.com/cookie_policy',
            'https://legal.dailymotion.com/fr/politique-cookies/',
            'https://www.googletagmanager.com/gtag/js?id=G-4LNC5LQKEL',
            'Google Maps',
            'reCaptcha V2',
            'reCaptcha V3',
            'https://support.calameo.com/hc/fr/articles/205481178-Cookies',
            'https://mailchimp.com/legal/cookies/'
        ];

        $buffer = str_replace($search_except, $replace_except, $buffer);

        $buffer = preg_replace("/(<link rel='dns-prefetch' href=')(\/\/[a-zA-Z0-9]+www.google.com' \/>)/","<link rel='dns-prefetch' href='//www.google.com' />",$buffer,1);

        return $buffer;
    }

    /**
     * hob_ac_checkhobcookie
     * 
     * Check the hob_cookie COOKIE and return N OR Y  
     *   
     * @param  mixed $cookieHob
     * @param  mixed $cat_number
     * @return void
     */
    protected function hob_ac_checkhobcookie($cookieHob, $cat_number){
        $result = 'N';    
        $hob_cookies = isset($cookieHob) ? sanitize_text_field($cookieHob) : '';
        if($hob_cookies != ''){
            $resultats = explode(' ',$hob_cookies);

            if(isset($resultats[$cat_number])) {
                $result = substr($resultats[$cat_number],-1);
            }
        }
        return $result;
    }
  
    /**
     * hob_ac_replace_iframe_src
     *
     * @param  mixed $source
     * @param  mixed $replace
     * @param  mixed $input
     * @return void
     */
    protected function hob_ac_replace_iframe_src( $source,$replace,$input ) {
        $regExpPrefix = '/.*?iframe.*?\K(?=src=".*?(?:';        
        $regExpSuffix = ').*?".*)/i';        
        $regExpSource = $regExpPrefix.$source.$regExpSuffix;
        // GDPR blocking service cookies as asked by the user
        $input = preg_replace($regExpSource, $replace, $input);
        return $input;

    }

    /**
     * replace_iframe
     *
     * @param  mixed $source
     * @param  mixed $replace
     * @param  mixed $input
     * @return void
     */
    protected function hob_ac_replace_iframe( $source,$replace,$input ) {
        $regExpSource = '/.*?iframe.*?src=".*?(?:'.$source.').*?".*/i';
        $input = preg_replace($regExpSource, $replace, $input);
        return $input;
    }  
    /**
     * hob_ac_cookie_blocker
     *
     * @param  mixed $helper_function
     * @param  mixed $replace
     * @param  mixed $input
     * @return void
     */
    protected function hob_ac_cookie_blocker($helper_function,$replace ,$input){
        foreach ($helper_function as $cookies=>$cookie){
            $input = preg_replace('/\b(?!iframe)\b(?='.trim(str_replace('.','\.',$cookie)).')/i', $replace, $input);
        }
        return $input;
    }
    
    /**
     * hob_ac_killallcookies
     *
     * @return void
     */
    protected function hob_ac_killallcookies(){
        
        $destroy_cookie = isset($_SERVER['HTTP_COOKIE']) ? sanitize_text_field($_SERVER['HTTP_COOKIE']) : '';

        if($destroy_cookie != '') {
            $cookies = explode(';', $destroy_cookie);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);

                $exceptions = self::hob_ac_getExceptions();

                // 
                $regex = "^['wordpress_logged_in_'||'wordpress_sec_'||'wp-settings']+";

                $CookieWordpress = preg_match($regex,$name);

                //don't kill the hob_cookie ad jquery cookie
                if(!in_array($name,$exceptions) && $CookieWordpress) {
                    setcookie($name, '', time() - 3600);
                }
            }
        }
    }
    
    /**
     * hob_ac_getExceptions
     *
     * @return void
     */
    protected function hob_ac_getExceptions(){
        $exceptions = array('jquery',"HOB-cookie");

        return $exceptions;
    }
    
    /**
     * hob_ac_google_analytics_cookie
     *
     * @param  mixed $target_array
     * @return void
     */
    protected function hob_ac_google_analytics_cookie($target_array){

        $google_cookie = isset($_SERVER['HTTP_COOKIE']) ? sanitize_text_field($_SERVER['HTTP_COOKIE']) : '';

        if($google_cookie != '') {
            foreach($target_array as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time() - 3600);
            }
        }
    }
    
}