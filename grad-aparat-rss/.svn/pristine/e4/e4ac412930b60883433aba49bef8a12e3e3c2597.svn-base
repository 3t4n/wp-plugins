<?php
/**
* last modified: 2020-09-21 v1.2.0
*/

if ( !class_exists( 'Aparat_General_Controller__APARSSGRAD' ) ) {

    class Aparat_General_Controller__APARSSGRAD {
    
    

        /**
        * Read given video (single page) html and strip video details in json
        * and return it as Object
        * 
        * @param string $video_link
        * @return stdClass Video page details
        * @return bool false if video page not found
        */
        function get_the_aparat_video_details_obj( $video_link ) {
            
            if ( $video_link = $this->is_valid_aparat_video_link( $video_link ) ) {
                    
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
        * Check if structure for given Url of Aparat Videos (single page) are correct.
        * 
        * @param string $video_link
        * @return string Video Url if structure is correct.
        * @return bool false if Video Url structure is not correct.
        */
        protected function is_valid_aparat_video_link( $video_url ) {
            
            $video_url = trim( $video_url );
            
            if ((   $video_url != '' ) and
                (   preg_match_all( '#(https?:\/\/w{0,3}[\b.\b]?aparat.com\/v\/[\w]+)#', $video_url ) )) {
                return $video_url;
            } else {
                return false;
            }

        }
        
        
        
        /**
        * put your comment there...
        * 
        * @param mixed $aparat_video_obj
        */
        function get_the_aparat_video_title( $aparat_video_obj ) {
            
            return "<strong><a href=\"" . $aparat_video_obj->mainEntityOfPage . "\" target=\"_blank\">" . $aparat_video_obj->name . "</a></strong>";
            
        }
        
        
        
        /**
        * put your comment there...
        * 
        * @param mixed $aparat_video_obj
        */
        function get_the_aparat_video_meta( $aparat_video_obj ) {

            // Calculate video duration
            $duration = new DateInterval( $aparat_video_obj->duration );
            $duration_format = ( $duration->h > 0 ) ? "%h:%I:%S" : "%I:%S";
            
            $output  = "";
            $output .= "<div class=\"entry-date\">";
            $output .= "<a href=\"" . $aparat_video_obj->publisher->url . "\" target=\"_blank\" />";
            $output .= "<img src=\"" . $aparat_video_obj->publisher->logo->url . "\" width=\"16px\" title=\"" . $aparat_video_obj->publisher->name . "\" /> | ";
            $output .= "</a>";
            $output .= "<small>";
            $output .= "<i class=\"fa fas fa-upload\"></i> " . human_time_diff( strtotime( $aparat_video_obj->uploadDate ) + (3.5 * 60 * 60), current_time('U') )." ". __('ago', 'aparss-grad') ." | ";
            $output .= "<i class=\"fa far fa-eye\"></i> " . $aparat_video_obj->interactionCount . " | ";
            $output .= "<i class=\"fa fas fa-forward\"></i> " . $duration->format( $duration_format );
            $output .= "</small></div>";

            return $output;
        }
        
        
        
        
    
    }
    
}

$aparat_ctrl = new Aparat_General_Controller__APARSSGRAD();

  
?>
