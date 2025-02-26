<?php

namespace ExactLinks\App\Libs\BotDetection;

class BotDetection {
    
    public function is_bot($userAgent) {
        $bots = array(
            'youtube',
            'youtube-bot',
            'youtube-views',
            'youtube-view-bot',
            'youtube-views-bot',
            'youtubebot',
            'youtube-bot',
            'LinkedInBot/1.0',
            'LinkedInBot',
            'Twitterbot',
            'Yahoo! Slurp',
            'TelegramBot',
            'Google-Youtube-Links',
            'Googlebot',
            'FacebookBot',
            'Google-Safety',
            'Bingbot',
            'TweetmemeBot',
		);
       
        // Don't track from own WordPress
        $bots[] = get_bloginfo( 'url' );
        
        foreach($bots as $bot)
        {
            if ( stripos( $userAgent, $bot ) !== false ) {
                return true;
            }
        }
        
        return false;
    }
}