<?php
/**
* last modified: 2020-09-30 v1.2.1
*/

if ( ! function_exists( 'display_video_aparssgrad' ) ) {
    
    function display_video_aparssgrad( $atts ) {
        
        global $aparat_ctrl;
        
        if ( $aparat_video_obj = $aparat_ctrl->get_the_aparat_video_details_obj( $atts['src'] ) ) {
            
            /**
            * add some conditions to check if its showing in mobile mode,
            * then changing design to full width,
            * and removing sides margins.
            * 
            * modified at v1.2.1
            */
            
            $video_height   = ( isset( $atts['height'] ) )  ? 'height:'.$atts['height'].';' : 'height:300px;';
            $video_float    = ( isset( $atts['float'] ) )   ? 'float:'.$atts['float'].';'   : '';
            $video_width    = ( isset( $atts['width'] ) and ! wp_is_mobile() )   ? 'width:'.$atts['width'].';'   : '';
            
            $video_frame_style  = "margin-bottom:20px;";
            
            if ( !empty( $atts['float'] ) and ! wp_is_mobile() ) {
                
                if ( $atts['float'] == "right" ) {
                    $video_frame_style .= "margin-left:30px;";
                
                } elseif ( $atts['float'] == "left" ) {
                    $video_frame_style .= "margin-right:30px;";
                    
                }
            }
            
            $output = "\n<!-- Aparat Video Shortcode | Grad -->\n";
            
            if ( isset( $atts['format'] ) and $atts['format'] == 'iframe' ) {
                
                $output .= "<div class=\"h_iframe-aparat_embed_frame\" style=".$video_float.$video_width.$video_frame_style.">\n";
                $output .= "<iframe src=\"".$aparat_video_obj->embedUrl."?&recom=none\" allowFullScreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" style=\"margin-bottom:0;width:100%;".$video_height."\"></iframe>";
                if ( isset( $atts['display_meta'] ) and $atts['display_meta'] == "yes" ) {
                    $output .= $aparat_ctrl->get_the_aparat_video_title( $aparat_video_obj );
                    $output .= $aparat_ctrl->get_the_aparat_video_meta( $aparat_video_obj );
                }
                $output .= "</div>\n";
                
                
            } else {
                
                $output .= "<div class=\"aparat-video\" style=".$video_float.$video_width.$video_frame_style.">\n";
                $output .= "<video controls poster=\"".$aparat_video_obj->thumbnailUrl."\" style=\"width:100%;\">\n";
                $output .= "<source src=\"".$aparat_video_obj->contentUrl."\" type=\"video/mp4\">\n";
                $output .= __( 'Your browser does not support the video tag.', 'aparss-grad' );
                $output .= "</video>\n";
                if ( isset( $atts['display_meta'] ) and $atts['display_meta'] == "yes" ) {
                    $output .= $aparat_ctrl->get_the_aparat_video_title( $aparat_video_obj );
                    $output .= $aparat_ctrl->get_the_aparat_video_meta( $aparat_video_obj );
                }
                $output .= "</div>\n";
                
            }

            $output .= "<!-- / Aparat Video Shortcode | Grad -->\n";
            
            return $output;
            
        } else {
            
            if ( is_user_logged_in() )
                return __( 'The Aparat video link is not correct.', 'aparss-grad' );
        };
        
    }

}
add_shortcode( 'aparat-video', 'display_video_aparssgrad' );



?>
