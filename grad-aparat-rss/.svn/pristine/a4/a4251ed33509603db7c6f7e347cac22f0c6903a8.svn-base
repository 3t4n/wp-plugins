<?php
/**
* last modified: 2020-09-21 v1.1.1
*/

if ( !class_exists( 'Widget_Aparat_General__APARSSGRAD' ) ) {


    class Widget_Aparat_General__APARSSGRAD extends WP_Widget {

        
        /**
        * @var string used later as Widget Title in Extended (Child) Classes
        */
        protected $aparat_channel_title = '';

        /**
        * @var string used later as Follow our channel link in Extended (Child) Classes
        * added v1.0.0
        */
        protected $aparat_channel_link = '';
        
        
        
        /**
        * Find the first Json block as Aparat Video details (single page)
        * from a given html string and return json data as array
        * 
        * @param string $video_page_html
        * @return stdClass
        * @return bool false if json not fount
        */
        protected function aparat_video_details_json_obj( $video_page_html ) {
            
            $start_pos  = strpos( $video_page_html, "<script type=\"application/ld+json\">") + strlen("<script type=\"application/ld+json\">" );
            $end_pos    = strpos( $video_page_html, "</script>", $start_pos );
            
            if ( $start_pos and $end_pos ) {
                $json   = substr( $video_page_html, $start_pos, $end_pos - $start_pos );
                $json   = str_replace( "\r", "", $json );
                $json   = str_replace( "\n", "", $json );
                return json_decode( $json );
            } else {
                return false;
            }
            
        }


        
        /**
        * Read given video (single page) html and strip video details in json
        * and return it as Object
        * 
        * @param string $video_link
        * @return stdClass Video page details
        * @return bool false if video page not found
        */
        protected function get_aparat_video_page_details_obj( $video_link ) {
            
            if ( $video_link = $this->is_valid_aparat_video_url_structure( $video_link ) ) {
                    
                $ch = curl_init( $video_link );
                curl_setopt( $ch, CURLOPT_HEADER, 0 );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                
                if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {  // to work cURL on localhost.
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
                }
                
                $curl_result = curl_exec( $ch );
                $curl_info   = curl_getinfo( $ch );
                curl_close( $ch );
                
                if ( $curl_info['http_code'] == '200' ) {
                    return $this->aparat_video_details_json_obj( $curl_result );
                } else {
                    return false;
                }    

            } else {
                return false;
            }
            
        }
        
        
        
        /**
        * Check if structure for given Url of Aparat Videos (single page) are correct.
        * 
        * @param string $video_link
        * @return string Video Url if structure is correct.
        * @return bool false if Video Url structure is not correct.
        */
        protected function is_valid_aparat_video_url_structure( $video_url ) {
            
            $video_url = trim( $video_url );
            
            if ((   $video_url != '' ) and
                (   preg_match_all( '#(https?:\/\/w{0,3}[\b.\b]?aparat.com\/v\/[\w]+)#', $video_url ) )) {
                return $video_url;
            } else {
                return false;
            }

        }
        
        
        
        /**
        * Check a given channel url structure if its correct
        * Then read the page and find the page title
        * Fill the $this->aparat_channel_title to use it later as Widget Title
        * 
        * @param string $channel_link
        * @return string the Html of given channel page if the link is correct
        * @return bool false if given link is incorrect.
        */
        protected function is_valid_aparat_channel_link( $channel_link ) {
            
            $channel_link = trim( $channel_link );
            
            if ( (  strlen( $channel_link ) > 0 ) and
                 (  preg_match_all( '#(https?:\/\/w{0,3}[\b.\b]?aparat.com\/[\w]+)#', $channel_link ) ) ) {
                
                $ch = curl_init( $channel_link );
                curl_setopt( $ch, CURLOPT_HEADER, 0 );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                
                if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {  // to work cURL on localhost.
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
                }
                
                $curl_resault   = curl_exec( $ch );
                $curl_info      = curl_getinfo( $ch );
                curl_close( $ch );
                
                /**
                * here checks the channel page some Html code, to be sure its a true page link.
                * old - in previus versions we had checking <body> class name [body_video_profile_one]
                * new - from version 1.1.1 we are checking <body> data-page attribute [channel-page]
                * 
                * Find channel title
                * old - in previus versions we had check <title> Tag
                * new - from ver 1.1.1 we are checking schema.org data [name]
                * 
                * updated @ ver. 1.1.1
                * 
                */
                if ( (  $curl_info['http_code'] == "200" ) and
                     (  preg_match_all( "#<body[\s]+[\w\s=\"-]*data-page=\"channel-page[\w\s-]*\"#", $curl_resault ) ) ) {

                    // find the channel title
                    preg_match_all( "#\"name\":[\s]*\"(.*)\"#", $curl_resault, $match_title );
                    
                    $this->aparat_channel_title = $match_title[1][0];
                    
                    return $curl_resault;
                } else {
                    return false;
                }
                
            } else {
                
                return false;
            }

        }
        
        
        
        /**
        * Check if structure for given Url of Aparat Channel RSS are correct.
        * 
        * @param string $rss_url
        * @return string RSS Url if structure is correct.
        * @return bool false if RSS Url structure is not correct.
        */
        protected function is_valid_aparat_rss_url_structure( $rss_url ) {
            
            $rss_url = trim( $rss_url );
            
            if ((   $rss_url != '' ) and
                (   preg_match_all( '#(https?:\/\/w{0,3}[\b.\b]?aparat.com\/rss\/[\w]+)#', $rss_url ) )) {
                
                return $rss_url;
            } else {
                
                return false;
            }

        }


        /**
        * Read given video rss xml
        * Fill the $this->aparat_channel_title to use it later as Widget Title
        * 
        * 
        * @param string $rss_link
        * @return string Aparat Rss xml as string
        * @return bool false if RSS xml not found
        */
        protected function get_aparat_rss_object( $rss_link ) {
            
            $rss_link = trim( $rss_link );
            
            if ( $this->is_valid_aparat_rss_url_structure( $rss_link ) ) {
                
                $ch = curl_init( $rss_link );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                
                if ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ) {  // to work cURL on localhost.
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
                }
                
                $curl_resault   = curl_exec( $ch );
                $curl_info      = curl_getinfo( $ch );
                $curl_eror      = curl_error( $ch );
                curl_close( $ch );
                
                if ( $curl_info['http_code'] == "200" ) {
                    
                    $result = simplexml_load_string( $curl_resault );
                    // find the channel title
                    $this->aparat_channel_title = $result->channel->title;
                    
                    /**
                    * correcting the wrong channel link which placed in the RSS
                    * the /name/ will remove
                    * added v1.0.0
                    */
                    $this->aparat_channel_link = str_replace( ".com/name/", ".com/", $result->channel->link );
                    
                    return $result;
                } else {
                    
                    return false;
                }
                
            } else {
                return false;
            }

        }
        
        
        
        
    }

}





?>
