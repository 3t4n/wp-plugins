<?php 
/**
 * AccessibilityWidget Class
 * Developed by: Cory Bohon 
 */
class AccessibilityWidget extends WP_Widget 
	{
    /** constructor */
    function AccessibilityWidget() {
        parent::WP_Widget(false, $name = 'Accessibility Options');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
				  <p>
					<strong>Available Access Keys:</strong>
						<ul>
							<?php //Display the built-in WordPress function access keys ?>
							<?php if(get_option('home_page_key') != ""){?>
							<li><strong><?php echo get_option('home_page_key'); ?> </strong> - Home Page </li>
							
							<?php }if(get_option('search_page_key') != ""){?>
							<li><strong><?php echo get_option('search_page_key'); ?> </strong> - Search Page </li>
							
							<?php }if(get_option('skip_to_content_key') != ""){?>
							<li><strong><?php echo get_option('skip_to_content_key'); ?> </strong> - Skip to Main Content </li>						
							
							<?php }if(get_option('top_of_page_key') != ""){?>
							<li><strong><?php echo get_option('top_of_page_key'); ?> </strong> - Jump to Top of Page </li>						
							
							<?php //Display the custom access keys ?>
							<?php }if(get_option('custom_key_shortname_1') != "" && get_option('custom_key_1') != ""){?>
							<li><strong><?php echo get_option('custom_key_1'); ?> </strong> - <?php echo get_option('custom_key_shortname_1'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_2') != "" && get_option('custom_key_2') != ""){?>
							<li><strong><?php echo get_option('custom_key_2'); ?> </strong> - <?php echo get_option('custom_key_shortname_2'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_3') != "" && get_option('custom_key_3') != ""){?>
							<li><strong><?php echo get_option('custom_key_3'); ?> </strong> - <?php echo get_option('custom_key_shortname_3'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_4') != "" && get_option('custom_key_4') != ""){?>
							<li><strong><?php echo get_option('custom_key_4'); ?> </strong> - <?php echo get_option('custom_key_shortname_4'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_5') != "" && get_option('custom_key_5') != ""){?>
							<li><strong><?php echo get_option('custom_key_5'); ?> </strong> - <?php echo get_option('custom_key_shortname_5'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_6') != "" && get_option('custom_key_6') != ""){?>			
							<li><strong><?php echo get_option('custom_key_6'); ?> </strong> - <?php echo get_option('custom_key_shortname_6'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_7') != "" && get_option('custom_key_7') != ""){?>							
							<li><strong><?php echo get_option('custom_key_7'); ?> </strong> - <?php echo get_option('custom_key_shortname_7'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_8') != "" && get_option('custom_key_8') != ""){?>							
							<li><strong><?php echo get_option('custom_key_8'); ?> </strong> - <?php echo get_option('custom_key_shortname_8'); ?> </li>		
							
							<?php }if(get_option('custom_key_shortname_9') != "" && get_option('custom_key_9') != ""){?>							
							<li><strong><?php echo get_option('custom_key_9'); ?> </strong> - <?php echo get_option('custom_key_shortname_9'); ?> </li>
							
							<?php }if(get_option('custom_key_shortname_10') != "" && get_option('custom_key_10') != ""){?>							
							<li><strong><?php echo get_option('custom_key_10'); ?> </strong> -<?php echo get_option('custom_key_shortname_10'); ?> </li>
							
							<?php }?>
							
							<br />
						</ul>											
		          </p>
		          
		          <div style="position:absolute;top:0left:-10000px;top:auto;width:1px;height:1px;overflow:hidden;">This site utilizes access keys to aid user navigation for screen reader users. Continue to listen for a list of available access keys.
			          
			          <?php 
			          
			          if (get_option('home_page_key') != "") {
				          echo "Use the access key " . get_option('home_page_key') . " to navigate to the Home Page.";
			          }
			          
			          if (get_option('search_page_key') != "") {
				          echo "Use the access key " . get_option('search_page_key') . " to navigate to the Search Page.";
			          }
			          
			          if (get_option('skip_to_content_key') != "") {
				          echo "Use the access key " . get_option('skip_to_content_key') . " to skip to the main content on the page.";
			          }
			          
			          if (get_option('top_of_page_key') != "") {
				          echo "Use the access key " . get_option('top_of_page_key') . " to jump to the top of the page.";
			          }
			          
			          ?>
			          
		          </div>
		          
              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <?php 
    }

} // class AccessibilityWidget

?>