<?php
/**
 * FooWidget Class
 */
class AscWidget extends WP_Widget {
	private $wdg_title = ASC_TITLE;
	
    /** constructor */
    function AscWidget() {
        parent::WP_Widget(false, $name = 'adscaped widget');
    }

    /** @see WP_Widget::widget 
     * called on widget display (page) */
    function widget($args, $instance) {
        extract( $args );
  		
        echo $before_widget;
        
        //if ( $title )
        echo $before_title . $this->wdg_title . $after_title;
        
        asc_dl_widgetad();
        
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
	$instance = $old_instance;
	//$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    /** @see WP_Widget::form
     * called on widget admin edit */
    function form($instance) {
        //$title = esc_attr($instance['title']);
        $f_pid = get_option("asc_opt_pageid");
        
        echo '<p>adscaped pageid: '.$f_pid."</p>";
        
        echo 'change <a href="options-general.php?page=adsmen_main">adscaped Settings</a>';
        /*  <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        */
        
        echo '</p>';
         
    }

} // class FooWidget
?>
