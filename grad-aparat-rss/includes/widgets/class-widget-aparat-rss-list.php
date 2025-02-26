<?php
/**
* last modified: 2020-09-01 v1.1.0
*/
if ( !class_exists( 'Widget_Aparat_RSS_List__APARSSGRAD' ) ) {


    class Widget_Aparat_RSS_List__APARSSGRAD extends Widget_Aparat_General__APARSSGRAD {

        /**
        * Aparat Channel RSS Reader (List) widget - Constructor
        */
        public function __construct() {
            $widget_ops = array (
                'classname'     => __( 'widget_recent_entries widget_aparat_rss_aparssgrad', 'aparss-grad' ),
                'description'   => __( 'Showing Aparat videos form a Channel RSS.', 'aparss-grad' )
            );
            parent::__construct( 'aparat-rss-list-aparssgrad', 'GRAD | ' . __( 'Aparat Channel RSS Reader (List)', 'aparss-grad' ), $widget_ops );
        }



        /**
        * Creating widget front-end
        *
        * @param array $args
        * @param array $instance
        */
        public function widget( $args, $instance ) {

            $widget_title           = isset( $instance['widget_title'] )            ? esc_attr( $instance['widget_title'] )         : '';
            $aparat_rss_link        = isset( $instance['aparat_rss_link'] )         ? esc_attr( $instance['aparat_rss_link'] )      : '';
            $show_channel_title     = isset( $instance['show_channel_title'] )      ?    (bool) $instance['show_channel_title']     : false;
            $show_video_num         = isset( $instance['show_video_num'] )          ?   absint( $instance['show_video_num'] )       : 0;
            $show_video_selecttype  = isset( $instance['show_video_selecttype'] )   ? esc_attr( $instance['show_video_selecttype'] ): 'newest';    // { newest | randomly }  // added v1.0.0
            $show_video_preview     = isset( $instance['show_video_preview'] )      ? esc_attr( $instance['show_video_preview'] )   : 'first'; // { first | all }
            $use_iframe_code        = isset( $instance['use_iframe_code'] )         ?    (bool) $instance['use_iframe_code']        : false;
            $show_video_details     = isset( $instance['show_video_details'] )      ? esc_attr( $instance['show_video_details'] )   : 'first'; // { first | all }
            $show_follow_us_link    = isset( $instance['show_follow_us_link'] )     ?    (bool) $instance['show_follow_us_link']    : false;
            $follow_us_link_text    = isset( $instance['follow_us_link_text'] )     ? esc_attr( $instance['follow_us_link_text'] )  : '';
            $aparat_icon_32         = isset( $instance['aparat_icon_32'])           ? esc_attr( $instance['aparat_icon_32'] )       : 'black'; // { none | black | white }
            $aparat_rss_link_error  = isset( $instance['aparat_rss_link_error'] )   ?    (bool) $instance['aparat_rss_link_error']  : false;
            

            if ( empty( $follow_us_link_text ) )
                $follow_us_link_text = __( 'Follow us in Aparat.com', 'aparss-grad' );

            if (( ! $aparat_rss_link_error ) and
                (   $aparat_rss_object = parent::get_aparat_rss_object( $aparat_rss_link ) )) {

                echo "\n<!-- Aparat Rss Reader Widget | Grad -->\n";
                if ( $show_follow_us_link and $aparat_icon_32 != 'none' ) {
                ?><style>
                .widget_aparat_rss_aparssgrad .read-more::before{
                    <?php if ($aparat_icon_32 == 'black') : ?>
                    background-image:url("<?php echo APARSSGRAD__URL . 'public/images/aparat_icon_color_black_32.png'; ?>");
                    <?php elseif ($aparat_icon_32 == 'white') : ?>
                    background-image:url("<?php echo APARSSGRAD__URL . 'public/images/aparat_icon_color_white_32.png'; ?>");
                    <?php endif; ?>
                    content:"";
                    display:inline-block;
                    float:left;
                    height:32px;
                    margin-right:5px;
                    position:relative;
                    top:-7px;
                    width:32px;
                }
                body.rtl .widget_aparat_rss_aparssgrad .read-more::before{
                    float:right;
                    margin-left:5px;
                    margin-right:0;
                }
                </style><?php
                }

                echo $args['before_widget'];
                echo $args['before_title'];
                
                // to make Widget Title linkable or not
                if ( $show_channel_title == true ) {
                    $widget_title = $this->aparat_channel_title;
                    echo '<a href="' . esc_url( $aparat_channel_link ) . '" target="_blank">' . wp_kses_post( $widget_title ) . '</a>';
                } else {
                    echo wp_kses_post( $widget_title );
                }
                
                echo $args['after_title'];
                    
                $aparat_rss_videos_count = count( $aparat_rss_object->channel->item );
                $rows = ( $show_video_num > 0 and $show_video_num < $aparat_rss_videos_count ) ? $show_video_num : $aparat_rss_videos_count;


                /**
                * Shuffle videos in the RSS list, if must be selected randomly
                * added: 2019-08-07 v1.0.0
                */
                $video_rows_num = range( 0, $aparat_rss_videos_count-1 );
                if ( $show_video_selecttype == 'randomly' ) {
                    shuffle( $video_rows_num );
                }
                

                echo "<ul>\n";
                for ($i=0; $i<$rows; $i++) {
                    
                    $j = $video_rows_num[$i]; // this parameter added for selecting newest/randomly -- v1.0.0
                    if ( ( $aparat_video_obj = parent::get_aparat_video_page_details_obj( $aparat_rss_object->channel->item[$j]->link ) ) == false ) {
                        continue;
                    }

                    echo "<li>";
                    if ((   $show_video_preview == 'all' ) or
                        (   $i == 0 and $show_video_preview == 'first' )) {
                        
                        // Show preview for the first or all videos if requested.
                        if ( $use_iframe_code ) {
                            echo "<div class=\"h_iframe-aparat_embed_frame\">\n";
                            echo "<span style=\"display:block;padding-top:57%;\"></span>";
                            echo "<iframe src=\"".$aparat_video_obj->embedUrl."?&recom=none\" allowFullScreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>";
                            echo "</div>\n";

                        } else {
                            echo "<video width=\"100%\" controls poster=\"".$aparat_video_obj->thumbnailUrl."\">\n";
                            echo "<source src=\"".$aparat_video_obj->contentUrl."\" type=\"video/mp4\">\n";
                            echo __( 'Your browser does not support the video tag.', 'aparss-grad' );
                            echo "</video>\n";
                        }
                    }

                    if ( ! $use_iframe_code ) {
                        // Show each video title
                        echo "<a href=\"" . $aparat_video_obj->mainEntityOfPage . "\" target=\"_blank\">" . $aparat_video_obj->name . "</a>";
                    }

                    if ((   $show_video_details == 'all' ) or
                        (   $i == 0 and $show_video_details == 'first' )) {

                        // Calculate video duration
                        $duration = new DateInterval( $aparat_video_obj->duration );
                        $duration_format = ( $duration->h > 0 ) ? "%h:%I:%S" : "%I:%S";
                        
                        // Show video details for the first or all videos if requested.
                        echo "<div class=\"entry-date\">";
                        echo "<a href=\"" . $aparat_video_obj->publisher->url . "\" target=\"_blank\" />";
                        echo "<img src=\"" . $aparat_video_obj->publisher->logo->url . "\" width=\"16px\" title=\"" . $aparat_video_obj->publisher->name . "\" /> | ";
                        echo "</a>";
                        echo "<small>";
                        echo "<i class=\"fa fas fa-upload\"></i> " . human_time_diff( strtotime( $aparat_video_obj->uploadDate ) + (3.5 * 60 * 60), current_time('U') )." ". __('ago', 'aparss-grad') ." | ";
                        echo "<i class=\"fa far fa-eye\"></i> " . $aparat_video_obj->interactionCount . " | ";
                        echo "<i class=\"fa fas fa-forward\"></i> " . $duration->format( $duration_format );
                        echo "</small></div>";
                    }
                    echo "</li>\n";
                    
                }
                echo "</ul>\n";

                if ( $show_follow_us_link ) {
                    echo '<div class="read-more"><a href="'.$this->aparat_channel_link.'" target="_blank">'.$follow_us_link_text.'</a></div>'; // edited v1.0.0
                }

                echo $args['after_widget'];
                echo "\n<!-- / Aparat Rss Reader Widget | Grad -->\n";
            }


        }



        /**
        * Creating widget back-end
        *
        * @param array $instance
        */
        public function form( $instance ) {

            $widget_title           = isset( $instance['widget_title'] )            ? esc_attr( $instance['widget_title'] )         : '';
            $aparat_rss_link        = isset( $instance['aparat_rss_link'] )         ? esc_attr( $instance['aparat_rss_link'] )      : '';
            $show_channel_title     = isset( $instance['show_channel_title'] )      ?    (bool) $instance['show_channel_title']     : false;
            $show_video_num         = isset( $instance['show_video_num'] )          ?   absint( $instance['show_video_num'] )       : 0;
            $show_video_selecttype  = isset( $instance['show_video_selecttype'] )   ? esc_attr( $instance['show_video_selecttype'] ): 'newest'; // { newest | randomly } // added v1.0.0
            $show_video_preview     = isset( $instance['show_video_preview'] )      ? esc_attr( $instance['show_video_preview'] )   : 'first';  // { first | all }
            $use_iframe_code        = isset( $instance['use_iframe_code'] )         ?    (bool) $instance['use_iframe_code']        : false;
            $show_video_details     = isset( $instance['show_video_details'] )      ? esc_attr( $instance['show_video_details'] )   : 'first';  // { first | all }
            $show_follow_us_link    = isset( $instance['show_follow_us_link'] )     ?    (bool) $instance['show_follow_us_link']    : false;
            $follow_us_link_text    = isset( $instance['follow_us_link_text'] )     ? esc_attr( $instance['follow_us_link_text'] )  : '';
            $aparat_icon_32         = isset( $instance['aparat_icon_32'] )          ? esc_attr( $instance['aparat_icon_32'] )       : 'black';  // { none | black | white }
            
            ?>
            <p><label for="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>"><?php _e( 'Widget Title:', 'aparss-grad' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'widget_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget_title' ) ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>" /></p>

            <p><label for="<?php echo esc_attr( $this->get_field_id( 'aparat_rss_link' ) ); ?>"><?php _e( 'RSS Link for specific Aparat Channel:', 'aparss-grad' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'aparat_rss_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'aparat_rss_link' ) ); ?>" type="text" value="<?php echo esc_attr( $aparat_rss_link ); ?>" />
            <?php if (isset($instance['aparat_rss_link_error']) and $instance['aparat_rss_link_error']): ?>
            <br/><small style="color:red;"><?php _e( 'Enter the true Aparat Rss link.', 'aparss-grad'); ?></small>
            <?php endif; ?></p>

            <p><input class="checkbox" type="checkbox" <?php checked( $show_channel_title ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_channel_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_channel_title' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_channel_title' ) ); ?>"><?php _e( 'Replace Channel title with Widget title?', 'aparss-grad' ); ?></label></p>

            <p><label for="<?php echo esc_attr( $this->get_field_id( 'show_video_num' ) ); ?>"><?php _e( 'Number of videos to show:', 'aparss-grad' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'show_video_num' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_video_num' ) ); ?>" type="number" min="0" value="<?php echo esc_attr( $show_video_num ); ?>" size="3" />
            <br/><small><?php _e( '0 for showing all videos listed in RSS.', 'aparss-grad'); ?></small></p>

            <?php // added v1.0.0 ?>
            <p> <strong><?php _e( 'Select Videos:', 'aparss-grad' ); ?></strong>
                <!--span style="background-color:orange;color:white;padding:0 5px;margin:0 5px;border-radius:5px;font-weight:bold;">new</span--><br>
                <small><?php _e( 'Aparat RSS originaly includes newest 30 videos.', 'aparss-grad'); ?></small><br>
                <input class="radio" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'show_video_selecttype' ) ); ?>-1" name="<?php echo esc_attr( $this->get_field_name( 'show_video_selecttype' ) ); ?>" value="newest" <?php echo ($show_video_selecttype == 'newest') ? 'checked' : ''; ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_video_selecttype' ) ); ?>-1"><?php _e( 'Newest', 'aparss-grad' ); ?></label><br>
                <input class="radio" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'show_video_selecttype' ) ); ?>-2" name="<?php echo esc_attr( $this->get_field_name( 'show_video_selecttype' ) ); ?>" value="randomly" <?php echo ($show_video_selecttype == 'randomly') ? 'checked' : ''; ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_video_selecttype' ) ); ?>-2"><?php _e( 'Randomly', 'aparss-grad' ); ?></label>
            </p>
            
            <p> <strong><?php _e( 'Show Videos Preview:', 'aparss-grad' ); ?></strong><br>
                <input class="radio" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'show_video_preview' ) ); ?>-1" name="<?php echo esc_attr( $this->get_field_name( 'show_video_preview' ) ); ?>" value="first" <?php echo ($show_video_preview == 'first') ? 'checked' : ''; ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_video_preview' ) ); ?>-1"><?php _e( 'Only for 1st video', 'aparss-grad' ); ?></label><br>
                <input class="radio" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'show_video_preview' ) ); ?>-2" name="<?php echo esc_attr( $this->get_field_name( 'show_video_preview' ) ); ?>" value="all" <?php echo ($show_video_preview == 'all') ? 'checked' : ''; ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_video_preview' ) ); ?>-2"><?php _e( 'For all videos', 'aparss-grad' ); ?></label><br>
                
                <input class="checkbox" type="checkbox" <?php checked( $use_iframe_code ); ?> id="<?php echo esc_attr( $this->get_field_id( 'use_iframe_code' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'use_iframe_code' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'use_iframe_code' ) ); ?>"><?php _e( 'Use iframe code for preview?', 'aparss-grad' ); ?></label>
                <span style="background-color:darkorange;color:white;font-weight:bold;padding: 0 5px 4px;border-radius:5px;">
                    <?php _e( 'new', 'aparss-grad' ); ?>
                </span><br>
                <small><?php _e( 'Increasing the view counter when playing videos.', 'aparss-grad'); ?></small>
            </p>
            
            <p> <strong><?php _e( 'Show Videos Details:', 'aparss-grad' ); ?></strong><br>
                <small><?php _e( 'Upload time | View | Duration', 'aparss-grad'); ?></small><br>
                <input class="radio" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'show_video_details' ) ); ?>-1" name="<?php echo esc_attr( $this->get_field_name( 'show_video_details' ) ); ?>" value="first" <?php echo ($show_video_details == 'first') ? 'checked' : ''; ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_video_details' ) ); ?>-1"><?php _e( 'Only for 1st video', 'aparss-grad' ); ?></label><br>
                <input class="radio" type="radio" id="<?php echo esc_attr( $this->get_field_id( 'show_video_details' ) ); ?>-2" name="<?php echo esc_attr( $this->get_field_name( 'show_video_details' ) ); ?>" value="all" <?php echo ($show_video_details == 'all') ? 'checked' : ''; ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_video_details' ) ); ?>-2"><?php _e( 'For all videos', 'aparss-grad' ); ?></label>
            </p>

            <hr>

            <p><input class="checkbox" type="checkbox" <?php checked( $show_follow_us_link ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_follow_us_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_follow_us_link' ) ); ?>" />
            <label for="<?php echo esc_attr( $this->get_field_id( 'show_follow_us_link' ) ); ?>"><?php _e( 'Show \'follow us\' link?', 'aparss-grad' ); ?></label></p>

            <p><label for="<?php echo esc_attr( $this->get_field_id( 'follow_us_link_text' ) ); ?>"><?php _e( 'Change \'follow us\' text:', 'aparss-grad' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'follow_us_link_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'follow_us_link_text' ) ); ?>" placeholder="<?php _e( 'Follow us in Aparat.com', 'aparss-grad' ); ?>" type="text" value="<?php echo esc_attr( $follow_us_link_text ); ?>" /></p>

            <p><?php _e( 'Include Aparat Icon before \'follow us\' link:', 'aparss-grad' ); ?><br>
            <!--p><?php _e( 'Show Aparat Icon before channel link:', 'aparss-grad' ); ?><br-->
            <table width="100%"><tr>
                <td><input class="radio-inline" id="<?php echo esc_attr( $this->get_field_id( 'aparat_icon_32' ) ); ?>-1" name="<?php echo esc_attr( $this->get_field_name( 'aparat_icon_32' ) ); ?>" type="radio" value="none" <?php echo ($aparat_icon_32 == 'none') ? 'checked' : ''; ?> />
                    <label for="<?php echo esc_attr( $this->get_field_id( 'aparat_icon_32' ) ); ?>-1">None</label></td>
                <td><input class="radio-inline" id="<?php echo esc_attr( $this->get_field_id( 'aparat_icon_32' ) ); ?>-2" name="<?php echo esc_attr( $this->get_field_name( 'aparat_icon_32' ) ); ?>" type="radio" value="black" <?php echo ($aparat_icon_32 == 'black') ? 'checked' : ''; ?> />
                    <label for="<?php echo esc_attr( $this->get_field_id( 'aparat_icon_32' ) ); ?>-2"><img src="<?php echo APARSSGRAD__URL . 'public/images/aparat_icon_color_black_32.png'; ?>" style="background-color:#eee;"></label></td>
                <td><input class="radio-inline" id="<?php echo esc_attr( $this->get_field_id( 'aparat_icon_32' ) ); ?>-3" name="<?php echo esc_attr( $this->get_field_name( 'aparat_icon_32' ) ); ?>" type="radio" value="white" <?php echo ($aparat_icon_32 == 'white') ? 'checked' : ''; ?> />
                    <label for="<?php echo esc_attr( $this->get_field_id( 'aparat_icon_32' ) ); ?>-3"><img src="<?php echo APARSSGRAD__URL . 'public/images/aparat_icon_color_white_32.png'; ?>" style="background-color:#444;"></label></td>
            </tr></table>
            </p>
            <hr>
            <?php
        }

        
        
        /**
        * Updating widget replacing old instances with new
        * 
        * @param mixed $new_instance
        * @param mixed $old_instance
        * 
        * @return array
        */
        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance = $new_instance;
            $aparat_rss_object = parent::get_aparat_rss_object( $instance['aparat_rss_link'] );
            $instance['aparat_rss_link_error'] = ( !$aparat_rss_object ) ? true : false;

            $instance['aparat_rss_link'] =  ( ! empty( $new_instance['aparat_rss_link'] ) and $aparat_rss_object  ) ? $new_instance['aparat_rss_link'] : '';

            return $instance;

        }

        
    }

    
}

?>