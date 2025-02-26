<?php

class WP_Widget_Futura extends WP_Widget {

	function __construct() {

		$widget_ops = array('classname' => 'futura-related', 'description' => __( 'Show related posts by futura', 'futura' ) );
        parent::__construct('futura_related', __('FUTURA Related Posts', 'futura'), $widget_ops);
        if(is_active_widget(false, false, $this->id_base, true)){
            add_action( 'wp_enqueue_scripts', array($this, 'futura_scripts') );
            add_action( 'wp_head', array($this, 'load_style'), 100);
        }
    }
    
    function futura_scripts(){
        
            wp_enqueue_script( 'futura_script', plugins_url( 'assets/js/script.js', dirname(__FILE__) ), array(), FUTURA_V, true );

            (get_option('futura_deactivate_style'))?$activate_style=0:$activate_style=1;
            $this->activate_style = $activate_style;
            if($activate_style){
                wp_enqueue_style('futura_styles', plugins_url( '/assets/css/style.css', dirname(__FILE__) ), array(), FUTURA_V, 'all');		            
            }

    }

	function widget( $args, $instance ) {
        $post_types = Futura::get_target_post_types();
        if(in_array(get_post_type(), $post_types)==false){return;}
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		print $before_widget;
		if ( $title )
			print $before_title . $title . $after_title;

        $this->show_related_posts($instance);        

        if(get_option('futura_payment_status') == "trial"):
            print futura_get_front_footer();
        endif;
        print $after_widget;
    }
    

    function load_style(){

        $activate_style = $this->activate_style;
        if(!$activate_style){return;}
        ?>
            <style id="futura_widget">
            .widget.futura-related .widget-title{
                font-size:<?php print get_option('futura_html_h3_font_size'); ?>;
            }
            .widget.futura-related .title{
                font-size:<?php print get_option('futura_post_title_font_size'); ?>;
            }
            .widget.futura-related .author{
                font-size:<?php print get_option('futura_author_font_size'); ?>;
            }
            .widget.futura-related{
                padding: 15px 0;
                border-top: 5px solid <?php print get_option('futura_html_border_color'); ?>;
                border-bottom: 5px solid <?php print get_option('futura_html_border_color'); ?>;
                background-color: <?php print get_option('futura_html_posts_wrap_bg_color'); ?>;
            }
            .widget.futura-related .widget-title{
                font-weight: bold;
                margin-bottom: 10px;
                border-left: 5px solid <?php print get_option('futura_html_border_title_color'); ?>;
                border-bottom:0;
                padding:0;
                padding-left: 15px;   
            }
            .widget.futura-related .title a{
                font-weight: inherit;
                text-decoration: none;    
            }

            <?php
                $display_device_option = get_option('futura_displya_device');
                if($display_device_option == "futura_pc"):
                ?>
                .widget.futura-related{
                    display:block;
                }
                @media screen and (max-width: 769px) {
                    .widget.futura-related{
                        display:none;
                    }                    
                }
                <?php elseif($display_device_option == "futura_sp"): ?>
                    .widget.futura-related{
                        display:none;
                    }
                    @media screen and (max-width: 769px) {
                        .widget.futura-related{
                            display:block;
                        }                    
                    }
            <?php endif; ?>            
            </style>
        <?php
    }

    function show_related_posts($instance){
        $number_of_posts = $instance['number_of_posts'];
        $display = get_option('futura_display');
        ?>
            <div id="futura_related_posts"></div>            
        <?php
    }


	function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number_of_posts' => '', 'display' => '') );
		$title = $instance['title'];
		$number_of_posts = get_option('futura_number_of_posts');
        // $display = $instance['display'];
        // if(!$display){
        //     $display = get_option('futura_display');
        // }
        update_option('futura_display', "sidebar");
        ?>
        <p><label for="<?php print $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php print $this->get_field_id('title'); ?>" name="<?php print $this->get_field_name('title'); ?>" type="text" value="<?php print esc_attr($title); ?>" /></label></p>
        <p><label for="<?php print $this->get_field_id('number_of_posts'); ?>"><?php _e('Number Of Posts:', 'futura'); ?> <input class="widefat" id="<?php print $this->get_field_id('number_of_posts'); ?>" name="<?php print $this->get_field_name('number_of_posts'); ?>" type="number" min="1" value="<?php print esc_attr($number_of_posts); ?>" /></label><small><?php _e( 'This setting will be overridden by futura setting.', 'futura' ) ?></small></p>        
        <!--
        <p><label for="<?php print $this->get_field_id('display'); ?>"><?php _e('Display Setting:', 'futura'); ?>
            <select class="widefat" name="<?php print $this->get_field_name('display'); ?>" id="<?php print $this->get_field_id('display'); ?>">
                <option value="sidebar" <?php if($display=='sidebar'): ?>selected<?php endif; ?>><?php _e('Sidebar', 'futura'); ?></optin>
                <option value="after_content" <?php if($display=='after_content'): ?>selected<?php endif; ?>><?php _e('After Content', 'futura'); ?></optin>
                <option value="footer_fixed" <?php if($display=='footer_fixed'): ?>selected<?php endif; ?>><?php _e('Footer Fixed', 'futura'); ?></optin>
            </select>
        </label></p>   
        -->
        <?php
	}

    
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => '', 'number_of_posts'=>'', 'display'=>''));
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number_of_posts'] = strip_tags($new_instance['number_of_posts']);
        update_option('futura_number_of_posts', strip_tags($new_instance['number_of_posts']));
		return $instance;
	}

}


class WP_Widget_Futura_Search extends WP_Widget {

	function __construct() {

		$widget_ops = array('classname' => 'futura_search', 'description' => __( 'FUTURA Search Function', 'futura' ) );
		parent::__construct('futura_search', __('FUTURA Search', 'futura'), $widget_ops);
    }
    

	function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number_of_posts' => '', 'display' => '') );
		$title = $instance['title'];
		$number_of_posts = get_option('futura_number_of_posts');
		$display = $instance['display'];
        ?>
        <p><label for="<?php print $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php print $this->get_field_id('title'); ?>" name="<?php print $this->get_field_name('title'); ?>" type="text" value="<?php print esc_attr($title); ?>" /></label></p>
        </label></p>        
        <?php
	}


	function widget( $args, $instance ) {

		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		print $before_widget;
		if ( $title )
			print $before_title . $title . $after_title;

        ?>
        <form method="GET" action="<?php print get_home_url(); ?>/futura_search" id="futura_search">
            <input type="text" name="keyword" value="<?php print filter_input( INPUT_GET, 'keyword', FILTER_SANITIZE_STRING ); ?>" required>
            <button type="submit"><?php _e( 'search', 'futura' ) ?></button>
        </form>
        <?php

		print $after_widget;
    }
    

}
