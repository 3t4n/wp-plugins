<?php

if ( ! defined('ABSPATH') ) { die( 'Cheating? Direct access is not allowed. ' ); }

if( !class_exists( 'ADL_team_helper' ) ) :

class ADL_team_helper {


    private $nonce_action = 'adl_team_nonce_action';
    private $nonce_name = 'adl_team_nonce';

    public function __construct(){
        if ( ! defined('ABSPATH') ) { return; }
        add_action('init', array( $this, 'check_req_php_version' ), 100 );

        // include any helper library here.
        include ADL_TEAM_LIB_DIR.'Aq_Resize.php';
    }
    public function check_req_php_version( ){
        if ( version_compare( PHP_VERSION, '5.4', '<' )) {
            add_action( 'admin_notices', array($this, 'adl_team_notice'), 100 );


            // deactivate the plugin because required php version is less.
            add_action( 'admin_init', array($this, 'adl_team_deactivate_self'), 100 );

            return;
        }
    }
    public function adl_team_notice() { ?>
        <div class="error"> <p>
                <?php
                printf(
                        __('%s requires minimum PHP 5.4 to function properly. Please upgrade PHP version. The Plugin has been auto-deactivated.. You have PHP version %d', ADL_TEAM_TEXTDOMAIN),
                        ADL_TEAM_PLUGIN_NAME,
                        PHP_VERSION
                );
                ?>
            </p></div>
        <?php
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }

    public function adl_team_deactivate_self() {
        deactivate_plugins( ADL_TEAM_BASE );
    }

    public function verifyNonce( ){
        //global $ADL_team;
        $nonce      = (!empty($_REQUEST[$this->nonceName()])) ? $_REQUEST[$this->nonceName()] : null ;
        $nonceAction  = $this->nonceAction();
        if( !wp_verify_nonce( $nonce, $nonceAction ) ) return false;
        return true;
    }

    public function nonceAction(){
        return $this->nonce_action;
    }
    public function nonceName(){
        return $this->nonce_name;
    }

    public function adl_social_links(){
        $s = array(
            'facebook' => __('Facebook', ADL_TEAM_TEXTDOMAIN),
            'twitter'   => __('Twitter', ADL_TEAM_TEXTDOMAIN),
            'google-plus' =>  __('Google+', ADL_TEAM_TEXTDOMAIN),
            'linkedin' =>  __('LinkedIn', ADL_TEAM_TEXTDOMAIN),
            'pinterest' =>  __('Pinterest', ADL_TEAM_TEXTDOMAIN),
            'instagram' =>  __('Instagram', ADL_TEAM_TEXTDOMAIN),
            'tumblr' =>  __('Tumblr', ADL_TEAM_TEXTDOMAIN),
            'flickr' =>  __('Flickr', ADL_TEAM_TEXTDOMAIN),
            'snapchat-ghost' =>  __('Snapchat', ADL_TEAM_TEXTDOMAIN),
            'reddit' =>  __('Reddit', ADL_TEAM_TEXTDOMAIN),
            'youtube' =>  __('Youtube', ADL_TEAM_TEXTDOMAIN),
            'vimeo' =>  __('Vimeo', ADL_TEAM_TEXTDOMAIN),
            'vine' =>  __('Vine', ADL_TEAM_TEXTDOMAIN),
            'github' =>  __('Github', ADL_TEAM_TEXTDOMAIN),
            'dribbble' =>  __('Dribbble', ADL_TEAM_TEXTDOMAIN),
            'behance' =>  __('Behance', ADL_TEAM_TEXTDOMAIN),
            'soundcloud' =>  __('SoundCloud', ADL_TEAM_TEXTDOMAIN),
            'stack-overflow' =>  __('StackOverFLow', ADL_TEAM_TEXTDOMAIN),
        );
        asort($s);
        return $s;
    }


    /**
     * Darken or lighten a given hex color and return it.
     * @param string $hex Hex color code to be darken or lighten
     * @param int $percent The number of percent of darkness or brightness
     * @param bool|true $darken Lighten the color if set to false, otherwise, darken it. Default is true.
     *
     * @return string
     */
    public function adjust_brightness($hex, $percent, $darken = true) {
        // determine if we want to lighten or draken the color. Negative -255 means darken, positive integer means lighten
        $brightness = $darken ? -255 : 255;
        $steps = $percent*$brightness/100;

        // Normalize into a six character long hex string
        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
        }

        // Split into three parts: R, G and B
        $color_parts = str_split($hex, 2);
        $return = '#';

        foreach ($color_parts as $color) {
            $color   = hexdec($color); // Convert to decimal
            $color   = max(0,min(255,$color + $steps)); // Adjust color
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
        }

        return $return;
    }





    /**
     * Lists of html tags that are allowed in a content
     * @return array List of allowed tags in a content
     */
    public function allowed_html() {
        return array(
            'i' => array(
                'class' => array(),
            ),
            'strong' => array(
                'class' => array(),
            ),
            'em' => array(
                'class' => array(),
            ),
            'a' => array(
                'class' => array(),
                'href' => array(),
                'title' => array(),
                'target' => array(),
            ),

        );
    }

}
endif;


if (!function_exists('adl_team')){
    function adl_team($id ){
        $c = "[adl-team id={$id}]";
        echo do_shortcode($c);

    }
}