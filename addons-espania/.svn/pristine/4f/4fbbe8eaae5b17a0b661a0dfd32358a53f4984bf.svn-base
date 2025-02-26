<?php   
add_action('widgets_init', create_function('', 'return register_widget("AddonsEspaniaCommentsWidget");'));

class AddonsEspaniaCommentsWidget extends WP_Widget {

    function __construct() {
        $widget_ops = array( 'description' => __('Advanced widget for displaying the recent comments with avatars', 'espania' ) );
        $control_ops = array( 'width' => 400 );
        parent::__construct( false, __( '&raquo; [Espania] Comments', 'espania' ), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        global $wpdb;
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
    	$comments_number = $instance['comments_number'];
        
    	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_content 
    		FROM $wpdb->comments 
    		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) 
    		WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
    		ORDER BY comment_date_gmt DESC 
    		LIMIT $comments_number";
    	$comments = $wpdb->get_results($sql);
		
		echo $before_widget;
		echo $before_title; 
		echo $title;
        echo $after_title;
        ?>
            <ul class="espania-comments-widget">
                <?php
                    foreach ( $comments as $comment ) {
                    ?>
                        <li class="clearfix">
                            <?php 
                                $get_the_peralink = get_permalink($comment->ID)  . "#comment-" . $comment->comment_ID;
                                
                                if( $instance['display_avatar']) { ?>
                                    <a href="<?php echo $get_the_peralink; ?>" title="<?php echo $comment->post_title; ?>"><img class="comments-widget-avatar <?php echo $instance['avatar_align']; ?>" alt="<?php echo $comment->comment_author; ?>" src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo md5($comment->comment_author_email); ?>&amp;size=<?php echo $instance['avatar_size']; ?>" /></a><?php 
                                } 
                            
                                if($instance['display_comment'] || $instance['display_read_more'] || $instance['display_avatar']) { ?> 
                                    <div class="comments-widget-entry">
                                    <?php 
                                        if( $instance['display_author'] ) { ?>
                                            <a href="<?php echo $get_the_peralink; ?>" class="comments-widget-author"><?php echo $comment->comment_author; ?></a>: <?php
                                        }
										
                                        if( $instance['display_comment'] ) { 
                                            $get_the_comment_length = $instance['comment_length'] ? $instance['comment_length'] : 16; ?>
											<a href="<?php echo $get_the_peralink; ?>" title="<?php echo $comment->post_title; ?>">
												<?php echo espania_shorten( $comment->comment_content, $get_the_comment_length ); ?>
											</a>
										<?php
                                        }
										
										if( $instance['display_date'] ) { ?> 
                                            <span href="<?php echo $get_the_peralink; ?>" class="comments-widget-date"><?php comment_date( $instance['date_format'], $comment->comment_ID ); ?></span><?php
                                        }
                                       
                                        if( $instance['read_more_text'] ) { ?> 
                                            <a href="<?php echo $get_the_peralink; ?>" class="comments-widget-more"><?php echo $instance['read_more_text']; ?></a><?php
                                        }
                                    ?>
                                    </div><?php
                                }
                                
                            ?>
                        </li>
                    <?php
                	}
                ?>
            </ul>
			
		<?php
		echo $after_widget;
    }

    function update( $new_instance, $old_instance ) {				
    	$instance = $old_instance;
		$params = array( 'title', 'comments_number', 'display_author', 'display_date', 'display_comment', 'display_avatar', 'date_format', 'read_more_text', 'comment_length', 'avatar_size', 'avatar_align' );
		foreach ( $params as $k ) {
			$instance[$k] = strip_tags( $new_instance[$k] );
		}
        return $instance;
    }
    
    function form( $instance ) {	
        $defaults = array(
			'title' => 'Recent Comments',
			'comments_number' => '5',
			'display_author' => 'true',
			'display_date' => 'true',
			'display_comment' => 'true',
			'display_avatar' => 'true',
			'date_format' => 'n-j-Y',
			'read_more_text' => '',
			'comment_length' => '26',
			'avatar_size' => '32',
			'avatar_align' => 'alignleft'
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
        
        ?>
        
            <div class="espania-widget">
                <table width="100%">
                    <tr>
                        <td class="espania-widget-label" width="40%"><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content" width="60%"><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('comments_number'); ?>"><?php _e( 'Number Of Comments:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('comments_number'); ?>" name="<?php echo $this->get_field_name('comments_number'); ?>" type="text" value="<?php echo esc_attr($instance['comments_number']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('comment_length'); ?>"><?php _e( 'The Comment Length:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content">
                            <input class="widefat" id="<?php echo $this->get_field_id('comment_length'); ?>" name="<?php echo $this->get_field_name('comment_length'); ?>" type="text" value="<?php echo esc_attr($instance['comment_length']); ?>" />
                            <br /><span class="espania-widget-help"><?php _e( 'Number of words', 'espania' ); ?></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('read_more_text'); ?>"><?php _e( '"Read More" Text:', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('read_more_text'); ?>" name="<?php echo $this->get_field_name('read_more_text'); ?>" type="text" value="<?php echo esc_attr($instance['read_more_text']); ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><?php _e( 'Display Elements:', 'espania' ); ?></td>
                        <td class="espania-widget-content">
                            <input type="checkbox" id="<?php echo $this->get_field_id('display_author'); ?>" name="<?php echo $this->get_field_name('display_author'); ?>"  <?php checked('true', $instance['display_author']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_author'); ?>"><?php _e( 'Author', 'espania' ); ?></label>
							<br /><input type="checkbox" id="<?php echo $this->get_field_id('display_date'); ?>" name="<?php echo $this->get_field_name('display_date'); ?>"  <?php checked('true', $instance['display_date']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_date'); ?>"><?php _e( 'Date', 'espania' ); ?></label>
                            <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_comment'); ?>" name="<?php echo $this->get_field_name('display_comment'); ?>"  <?php checked('true', $instance['display_comment']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_comment'); ?>"><?php _e( 'The Comment', 'espania' ); ?></label>
                            <br /><input type="checkbox" id="<?php echo $this->get_field_id('display_avatar'); ?>" name="<?php echo $this->get_field_name('display_avatar'); ?>"  <?php checked('true', $instance['display_avatar']); ?> value="true" /> <label for="<?php echo $this->get_field_id('display_avatar'); ?>"><?php _e( 'Avatar', 'espania' ); ?></label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="espania-widget-label"><?php _e( 'Avatar:', 'espania' ); ?></td>
                        <td class="espania-widget-content">
                           <label for="<?php echo $this->get_field_id('avatar_size'); ?>"><?php _e( 'Size:', 'espania' ); ?></label> <input type="text" style="width: 40px;" id="<?php echo $this->get_field_id('avatar_size'); ?>" name="<?php echo $this->get_field_name('avatar_size'); ?>" value="<?php echo esc_attr($instance['avatar_size']); ?>" />
                           <label for="<?php echo $this->get_field_id('avatar_align'); ?>"><?php _e( 'Align:', 'espania' ); ?></label> 
								<select id="<?php echo $this->get_field_id('avatar_align'); ?>" name="<?php echo $this->get_field_name('avatar_align'); ?>">
                                        <option value="alignleft" <?php selected('alignleft', $instance['avatar_align']); ?> ><?php _e( 'Left', 'espania' ); ?></option>
                                        <option value="alignright"  <?php selected('alignright', $instance['avatar_align']); ?>><?php _e( 'Right', 'espania' ); ?></option>
                                        <option value="aligncenter" <?php selected('aligncenter', $instance['avatar_align']); ?>><?php _e( 'Center', 'espania' ); ?></option>
                                </select>                            
                        </td>
                    </tr>
                    
					<tr>
                        <td class="espania-widget-label"><label for="<?php echo $this->get_field_id('date_format'); ?>"><?php _e( 'Date Format (<a href="http://codex.wordpress.org/Formatting_Date_and_Time">info</a>):', 'espania' ); ?></label></td>
                        <td class="espania-widget-content"><input class="widefat" id="<?php echo $this->get_field_id('date_format'); ?>" name="<?php echo $this->get_field_name('date_format'); ?>" type="text" value="<?php echo esc_attr($instance['date_format']); ?>" /></td>
                    </tr>
					
                </table>
            </div>
            
        <?php 
    }
} 
?>