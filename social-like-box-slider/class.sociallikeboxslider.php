<?php

class SocialLikeboxSlider {
    
    public function __construct() {
        add_action('init', array($this, 'initLikebox'));
        
    }
    
    public function initLikebox() {
        // add assets
        wp_register_style( 'social-likebox-slider-css', plugin_dir_url( __FILE__ ) . 'assets/css/social-likebox-slider.css', array(), SLBOXS_VERSION );
        wp_enqueue_style( 'social-likebox-slider-css');
        wp_register_script( 'social-likebox-slider-js', plugin_dir_url( __FILE__ ) . 'assets/js/social-likebox-slider.js', array('jquery'), SLBOXS_VERSION );
        wp_enqueue_script( 'social-likebox-slider-js' );
        
        // add html
        add_action('wp_footer', array($this, 'addHtml') );
        
        // add translation
        add_action( 'plugins_loaded', array($this, 'loadPluginTextdomain')); 
    }
    
    public function loadPluginTextdomain(){
        load_plugin_textdomain( 'slboxs', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
    }
    
    public function addHtml() {
        $options = get_option( 'slboxs_options' );
        $class = (@$options['slboxs_field_disable_on_mobile']) ? 'slboxs--disable_on_mobile' : '';

        echo '<div class="slboxs '.$class.'" style="top:'.$options['slboxs_field_top'].'px;'.$options['slboxs_field_position'].':0;">';
        
        /* 
         * Facebook
         */
        if(@$options['slboxs_field_enable_facebook'] === 'on'){
            $facebook_options = array(
                'lang' => preg_replace( array('/\"/','/\-/'), array('','_'), get_language_attributes() ),
                'use_small_header'   => (@$options['slboxs_field_facebook_use_small_header'] === 'on') ? 'true' : 'false',
                'hide_cover_photo'   => (@$options['slboxs_field_facebook_hide_cover_photo'] === 'on') ? 'true' : 'false',
                'show_friends_faces' => (@$options['slboxs_field_facebook_show_friends_faces'] === 'on') ? 'true' : 'false',
                'tabs'               => implode(', ', $options['slboxs_field_facebook_tabs'])
            );
            $facebook_html = '<div id="fb-root"></div><script async defer crossorigin="anonymous" src="https://connect.facebook.net/'.$facebook_options['lang'].'/sdk.js#xfbml=1&version=v3.2&appId=829877690433634&autoLogAppEvents=1"></script><div class="fb-page" data-href="'.$options['slboxs_field_facebook_uri'].'" data-tabs="'.$facebook_options['tabs'].'" data-small-header="'.$facebook_options['use_small_header'].'" data-adapt-container-width="true" data-hide-cover="'.$facebook_options['hide_cover_photo'].'" data-show-facepile="'.$facebook_options['show_friends_faces'].'"><blockquote cite="'.$options['slboxs_field_facebook_uri'].'" class="fb-xfbml-parse-ignore"><a href="'.$options['slboxs_field_facebook_uri'].'">Facebook</a></blockquote></div>';
            echo '<div style="'.$options['slboxs_field_position'].':-300px;" data-position="'.$options['slboxs_field_position'].'" class="slboxs__container slboxs__facebook__container-style-'.$options['slboxs_field_style'].'-'.$options['slboxs_field_position'].' slboxs__facebook__container slboxs__'.$options['slboxs_field_style'].'"><div style="'.(($options['slboxs_field_position'] === 'left') ? 'right' : 'left').':0;" class="slboxs__label slboxs__facebook__label"><span>Facebook<span></div><div class="slboxs__inside slboxs__facebook">'.$facebook_html.'</div></div>';
        }
        
        /*
         *  Twitter
         */
        if(@$options['slboxs_field_enable_twitter'] === 'on'){
            $twitter_html = '<a class="twitter-timeline" data-lang="en" data-theme="'.$options['slboxs_field_twitter_theme'].'" data-link-color="#9266CC" href="'.$options['slboxs_field_twitter_uri'].'?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
            echo '<div style="'.$options['slboxs_field_position'].':-300px;" data-position="'.$options['slboxs_field_position'].'"  class="slboxs__container slboxs__twitter__container-style-'.$options['slboxs_field_style'].'-'.$options['slboxs_field_position'].' slboxs__twitter__container slboxs__'.$options['slboxs_field_style'].'"><div style="'.(($options['slboxs_field_position'] === 'left') ? 'right' : 'left').':0;" class="slboxs__label slboxs__twitter__label"><span>Twitter<span></div><div class="slboxs__inside slboxs__twitter">'.$twitter_html.'</div></div>';
            
        }
        
        // YouTube
        if(@$options['slboxs_field_enable_youtube'] === 'on'){
            $youtube_html = '';
            if(!empty($options['slboxs_field_youtube_username'])){
                $youtube_html .= '<iframe width="300" height="72" frameborder="0" id="fr" scrolling="no" src="http://www.youtube.com/subscribe_widget?p='.$options['slboxs_field_youtube_username'].'" style="overflow:hidden;border:0;width:100%;height:72px;overflow:hidden;margin:0;display:block;"></iframe>';
            }
            if(!empty($options['slboxs_field_youtube_video_url'])){
                $youtube_html .= '<iframe width="300" height="176" src="'. str_replace('watch', 'embed', $options['slboxs_field_youtube_video_url']).'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" style="width:100%;margin:0;padding:0;display:block;" allowfullscreen></iframe>';
            }
            echo '<div style="'.$options['slboxs_field_position'].':-300px;" data-position="'.$options['slboxs_field_position'].'"  class="slboxs__container slboxs__youtube__container-style-'.$options['slboxs_field_style'].'-'.$options['slboxs_field_position'].' slboxs__youtube__container slboxs__'.$options['slboxs_field_style'].'"><div style="'.(($options['slboxs_field_position'] === 'left') ? 'right' : 'left').':0;" class="slboxs__label slboxs__youtube__label"><span>YouTube<span></div><div class="slboxs__inside slboxs__youtube">'.$youtube_html.'</div></div>';
        }
        
        echo '</div>';
//        echo '<div class="slboxs">SocialLikeboxSlider - Sample text - '.$options['slboxs_field_pill'].'</div>';
    }
    
    public function check_version() {
        if (SLBOXS_VERSION !== get_option('slboxs_version')){
            $this->activation();
        }
    }

    public function activation() {
	update_option('slboxs_version', SLBOXS_VERSION);
  
        $default_options = array(
            'slboxs_field_disable_on_mobile' => 'on',
            'slboxs_field_top'               => 120,
            'slboxs_field_style'             => 'big-fill',
            'slboxs_field_position'          => 'right',
            'slboxs_field_enable_facebook'   => 'on',
            'slboxs_field_facebook_uri'      => 'https://www.facebook.com/WordPress/',
            'slboxs_field_facebook_show_friends_faces' => 'on',
            'slboxs_field_facebook_tabs'     => array( 'timeline' ),
            'slboxs_field_enable_twitter'    => 'on',
            'slboxs_field_twitter_uri'       => 'https://twitter.com/TwitterDev',
            'slboxs_field_twitter_theme'     => 'light',
            'slboxs_field_enable_youtube'    => 'on',
            'slboxs_field_youtube_username'  => 'youtube',
            'slboxs_field_youtube_video_url' => 'https://www.youtube.com/watch?v=FlsCjmMhFmw',
        );
	$options = get_option('slboxs_options');
        if ($options === false) {
            $options = array();
        }

	update_option('slboxs_options', array_merge($default_options, $options));
    }
    
    public function deactivation() {
    }
    
    public function unintall() {
    }
}