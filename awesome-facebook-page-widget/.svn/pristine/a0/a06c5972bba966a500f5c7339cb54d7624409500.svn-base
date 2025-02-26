<?php

Class Awesome_Facebook extends WP_Widget{
    
    public function __construct() {
        parent::__construct('awesome_facebook',
                __('Awesome Facebook Page Widget', 'text_domain'),
                array('description' => __('Powered by Awesome Sliders - Simple yet useful Awesome Facebook Page Widget.','text_domain')));
    }
    
    // frontend
    
    public function widget($args, $instance) {
        $title                  = apply_filters('widget_title', $instance['title']);
        $page_url               = $instance['page_url'];
        $width                  = $instance['width'];
        $height                 = $instance['height'];
        $hide_cover             = $instance['hide_cover'];
        $show_facepile          = $instance['show_facepile'];
        $show_posts             = $instance['show_posts'];
        $hide_cta               = $instance['hide_cta'];
        $small_header           = $instance['small_header'];
        $adapt_container_width  = $instance['adapt_container_width'];
        
        echo $args['before_widget'];
        if(!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        // Display Form

        echo $this->getDisplay($title, $page_url, $width, $height, $hide_cover, $show_facepile, $show_posts, $hide_cta, $small_header, $adapt_container_width);
        

        echo $args['after_widget'];
        
    }
    
    // Backend Form
    
    public function form($instance){
        if(isset($instance['title'])){
            $title = $instance['title'];
        }else{
            $title = __('Awesome Facebook Page Widget','text_domain');
        }
        if(isset($instance['page_url'])){
            $page_url = $instance['page_url'];
        }else{
            $page_url = 'http://www.facebook.com/facebook';
        }
        if(isset($instance['width'])){
            $width = $instance['width'];
        }else{
            $width = 300;
        }
        if(isset($instance['height'])){
            $height = $instance['height'];
        }else{
            $height = 500;
        }
        //$width = $instance['width']; // if liked to keep blank could use this line
        //$height = $instance['height'];
        if(empty($hide_cover)) $hide_cover = "false";
        if(empty($show_facepile)) $show_facepile = "true";
        if(empty($show_posts)) $show_posts = "true";
        if(empty($hide_cta)) $hide_cta = "false";
        if(empty($small_header)) $small_header = "false";
        if(empty($adapt_container_width)) $adapt_container_width = "true";
                
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">
                <?php _e('Title:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('page_url'); ?>">
                <?php _e('Facebook Page URL:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('page_url'); ?>" name="<?php echo $this->get_field_name('page_url'); ?>" type="text" value="<?php echo esc_attr($page_url); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('width'); ?>">
                <?php _e('Width:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id('height'); ?>">
                <?php _e('Height:'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>">
        </p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'hide_cover' ); ?>">
                <?php _e('Hide Cover:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'hide_cover' ); ?>"
                name="<?php echo $this->get_field_name( 'hide_cover' ); ?>"
                class="widefat" style="width:100%;">
                <option value="false" <?php if ($hide_cover == 'false') echo 'selected="false"'; ?> >False</option>
                <option value="true" <?php if ($hide_cover == 'true') echo 'selected="true"'; ?> >True</option>	
            </select>
            
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_facepile' ); ?>">
                <?php _e('Show Facepile:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'show_facepile' ); ?>"
                name="<?php echo $this->get_field_name( 'show_facepile' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($show_facepile == 'true') echo 'selected="true"'; ?> >True</option>
                <option value="false" <?php if ($show_facepile == 'false') echo 'selected="false"'; ?> >False</option>	
            </select>
            
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'show_posts' ); ?>">
                <?php _e('Show Posts:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'show_posts' ); ?>"
                name="<?php echo $this->get_field_name( 'show_posts' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($show_posts == 'true') echo 'selected="true"'; ?> >True</option>
                <option value="false" <?php if ($show_posts == 'false') echo 'selected="false"'; ?> >False</option>	
            </select>
            
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'hide_cta' ); ?>">
                <?php _e('Hide Call to Action Button:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'hide_cta' ); ?>"
                name="<?php echo $this->get_field_name( 'hide_cta' ); ?>"
                class="widefat" style="width:100%;">
                <option value="false" <?php if ($hide_cta == 'false') echo 'selected="false"'; ?> >False</option>
                <option value="true" <?php if ($hide_cta == 'true') echo 'selected="true"'; ?> >True</option>	
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'small_header' ); ?>">
                <?php _e('Small Header:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'small_header' ); ?>"
                name="<?php echo $this->get_field_name( 'small_header' ); ?>"
                class="widefat" style="width:100%;">
                <option value="false" <?php if ($small_header == 'false') echo 'selected="false"'; ?> >False</option>
                <option value="true" <?php if ($small_header == 'true') echo 'selected="true"'; ?> >True</option>	
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>">
                <?php _e('Adapt Container Width:'); ?>
            </label> 
            <select id="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>"
                name="<?php echo $this->get_field_name( 'adapt_container_width' ); ?>"
                class="widefat" style="width:100%;">
                <option value="true" <?php if ($adapt_container_width == 'true') echo 'selected="true"'; ?> >True</option>
                <option value="false" <?php if ($adapt_container_width == 'false') echo 'selected="false"'; ?> >False</option>
            </select>
        </p>
        
        <?php
    }
    
    // update method
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['page_url'] = (!empty($new_instance['page_url'])) ? strip_tags($new_instance['page_url']) : '';
        $instance['width'] = (!empty($new_instance['width'])) ? strip_tags($new_instance['width']) : '';
        $instance['height'] = (!empty($new_instance['height'])) ? strip_tags($new_instance['height']) : '';
        $instance['hide_cover'] = (!empty($new_instance['hide_cover'])) ? strip_tags($new_instance['hide_cover']) : '';
        $instance['show_facepile'] = (!empty($new_instance['show_facepile'])) ? strip_tags($new_instance['show_facepile']) : '';
        $instance['show_posts'] = (!empty($new_instance['show_posts'])) ? strip_tags($new_instance['show_posts']) : '';
        $instance['hide_cta'] = (!empty($new_instance['hide_cta'])) ? strip_tags($new_instance['hide_cta']) : '';
        $instance['small_header'] = (!empty($new_instance['small_header'])) ? strip_tags($new_instance['small_header']) : '';
        $instance['adapt_container_width'] = (!empty($new_instance['adapt_container_width'])) ? strip_tags($new_instance['adapt_container_width']) : '';
        
        
        return $instance;
    }
    
    public function getDisplay($title, $page_url, $width, $height, $hide_cover, $show_facepile, $show_posts, $hide_cta, $small_header, $adapt_container_width){
        
        $print_facebook = '';
        $print_facebook .= '<div class="fb-page" data-href="'. $page_url .'" data-width="'. $width .'" data-height="'. $height .'" data-hide-cover="'. $hide_cover .'" data-show-facepile="' . $show_facepile .'" data-show-posts="'. $show_posts .'" data-hide-cta="' . $hide_cta .'" data-small-header="' . $small_header .'" data-adapt-container-width="' . $adapt_container_width .'"><div class="fb-xfbml-parse-ignore"><blockquote cite="'. $page_url .'"><a href="'. $page_url .'">Facebook</a></blockquote></div></div>';
		$print_facebook .= '<div class="support" style="font-size: 9px; text-align: right; position: relative; top: -10px;"><a href="http://dual-diagnosis-help.com/rehab-los-angeles/" target="_blank" style="color: #808080;" title="dual diagnosis help">Rehab Los Angeles</a></div>';

        ?>
        <div id="fb-root"></div>
            <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
            
        <div id="awesome_facebook">
            
            <?php
                echo $before_widget;
                
                echo $print_facebook;
                
                echo $after_widget;
            ?>
            
        </div>
        <?php
    }
    
    
}
