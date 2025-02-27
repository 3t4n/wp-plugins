<?php
/*
* Plugin Name: Social Media Widget Icon
* Description: This is a simple plugin to disply social follow icons in widget area in style
* Plugin URI: http://www.wpsuperhero.com/social-media-icons-widget
* Author: SuperHero Plugins
* Author URI: https://profiles.wordpress.org/superheroplugins
* Version: 1.0
* License: GPL2
* Text Domain: social-share-icons-widget
*/

/*

    Copyright (C) 2016  SuperHero Plugins, (email: wpsuperheroplugins@gmail.com) all rights reserved

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

    if ( !defined('ABSPATH') ) exit;

    include_once('social-media-widget-functions.php');


    //register widget backend
    class social_share_icon_widget extends WP_Widget{
    	public function __construct(){
    		parent::__construct('social_media_widget', __('Social Media Widget', 'socialmediawidget'), array(
    				'description' => __('This is a custom widget to display your social links by SuperHero Plugins', 'socialmediawidget')
    			));
    	}

    	public function widget($args, $instance){

            $title = $instance['title'];

            $selected_theme = $instance['select_theme'];

            $select_animation = $instance['select_animation'];

            $icon_size = $instance['size'];

            $margin_btw_icons = $instance['margin_btw_icons'];

            $target_option = $instance['target_option'];

            $twitter = $instance['twitter'];

            $facebook = $instance['facebook'];

            $google_plus = $instance['google-plus'];

            $linkedin = $instance['linkedin'];

            $pinterest = $instance['pinterest'];

            //set Widget front end

            echo $args['before_widget'] ;
           
    		if(isset($title) && !empty($title)){
        		   
               echo  $args['before_title'] . $title . $args['after_title'] ;


            }
            if(isset($facebook) && !empty($facebook)){
              $target_option_selection = '';
                if(isset($target_option) && !empty($target_option) && $target_option=='Open in New Window'){
                    $target_option_selection = '_blank';
                }
              $margin_btw_icons_option = '';
                if(isset($margin_btw_icons) && !empty($margin_btw_icons)){
                    $margin_btw_icons_option = $margin_btw_icons;
                }
                 if(isset($selected_theme) && !empty($selected_theme)){
                    $theme_prefix = strtolower($selected_theme);
                    $theme_prefix = str_replace(" ", "-", $theme_prefix);
                    if(isset($icon_size) && !empty($icon_size)){
                        echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($facebook) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-facebook.png', __FILE__ ) .'" width="'.$icon_size.'px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }

                     else{
                         echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($facebook) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-facebook.png', __FILE__ ) .'" width="32px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                 }

            }
            if(isset($twitter) && !empty($twitter)){
        		 $target_option_selection = '';
                if(isset($target_option) && !empty($target_option) && $target_option=='Open in New Window'){
                    $target_option_selection = '_blank';
                }
                $margin_btw_icons_option = '';
                if(isset($margin_btw_icons) && !empty($margin_btw_icons)){
                    $margin_btw_icons_option = $margin_btw_icons;
                }
                if(isset($selected_theme) && !empty($selected_theme)){
                    $theme_prefix = strtolower($selected_theme);
                    $theme_prefix = str_replace(" ", "-", $theme_prefix);
                    if(isset($icon_size) && !empty($icon_size)){
                        echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($twitter) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-twitter.png', __FILE__ ) .'" width="'.$icon_size.'px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                     else{
                         echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($twitter) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-twitter.png', __FILE__ ) .'" width="32px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                 }

            }
            
            if(isset($google_plus) && !empty($google_plus)){
        		 $target_option_selection = '';
                if(isset($target_option) && !empty($target_option) && $target_option=='Open in New Window'){
                    $target_option_selection = '_blank';
                }
                $margin_btw_icons_option = '';
                if(isset($margin_btw_icons) && !empty($margin_btw_icons)){
                    $margin_btw_icons_option = $margin_btw_icons;
                }
               if(isset($selected_theme) && !empty($selected_theme)){
                    $theme_prefix = strtolower($selected_theme);
                    $theme_prefix = str_replace(" ", "-", $theme_prefix);
                    if(isset($icon_size) && !empty($icon_size)){
                        echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($google_plus) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-google.png', __FILE__ ) .'" width="'.$icon_size.'px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                     else{
                         echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($google_plus) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-google.png', __FILE__ ) .'" width="32px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                 }

            }
            if(isset($linkedin) && !empty($linkedin)){
        		 $target_option_selection = '';
                if(isset($target_option) && !empty($target_option) && $target_option=='Open in New Window'){
                    $target_option_selection = '_blank';
                }
                $margin_btw_icons_option = '';
                if(isset($margin_btw_icons) && !empty($margin_btw_icons)){
                    $margin_btw_icons_option = $margin_btw_icons;
                }
               if(isset($selected_theme) && !empty($selected_theme)){
                    $theme_prefix = strtolower($selected_theme);
                    $theme_prefix = str_replace(" ", "-", $theme_prefix);
                    if(isset($icon_size) && !empty($icon_size)){
                        echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($linkedin) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-linkedin.png', __FILE__ ) .'" width="'.$icon_size.'px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                     else{
                         echo '<a id="wpssiw-facebook-link" style="margin-right:'.$margin_btw_icons_option.'px;" href="' . esc_url($linkedin) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-linkedin.png', __FILE__ ) .'" width="32px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                 }

            }
            if(isset($pinterest) && !empty($pinterest)){
        		 $target_option_selection = '';
                if(isset($target_option) && !empty($target_option) && $target_option=='Open in New Window'){
                    $target_option_selection = '_blank';
                }
                $margin_btw_icons_option = '';
                if(isset($margin_btw_icons) && !empty($margin_btw_icons)){
                    $margin_btw_icons_option = $margin_btw_icons;
                }
                if(isset($selected_theme) && !empty($selected_theme)){
                    $theme_prefix = strtolower($selected_theme);
                    $theme_prefix = str_replace(" ", "-", $theme_prefix);
                    if(isset($icon_size) && !empty($icon_size)){
                        echo '<a id="wpssiw-facebook-link" href="' . esc_url($pinterest) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-pinterest.png', __FILE__ ) .'" width="'.$icon_size.'px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                     else{
                         echo '<a id="wpssiw-facebook-link" href="' . esc_url($pinterest) . '" target="'.$target_option_selection.'"><img src="'. plugins_url( 'assets/img/'.$theme_prefix.'-pinterest.png', __FILE__ ) .'" width="32px" class="'. "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation))).'"/></a>';
                     }
                 }

            }
            
            echo $args['after_widget'];
	    		
	    	
    	}

        //set widget fiields 
    	public function form($instance){
           

            if(isset($instance['title'])){
              $title = $instance['title'];
            }
            if ( isset( $instance[ 'select_theme' ] ) ) {
              $selected_theme = $instance[ 'select_theme' ];
            }
             if ( isset( $instance[ 'size' ] ) ) {
              $icon_size = $instance[ 'size' ];
            }
            if ( isset( $instance[ 'margin_btw_icons' ] ) ) {
              $margin_btw_icons = $instance[ 'margin_btw_icons' ];
            }
            if ( isset( $instance[ 'target_option' ] ) ) {
              $target_option = $instance[ 'target_option' ];
            }
            if ( isset( $instance[ 'select_animation' ] ) ) {
              $select_animation = $instance[ 'select_animation' ];
            }
            if(isset($instance['twitter'])){
              $twitter = $instance['twitter'];
            }
            if(isset($instance['facebook'])){
                $facebook = $instance['facebook'];
            }
            if(isset($instance['google-plus'])){
                $google_plus = $instance['google-plus'];
            }
            if(isset($instance['linkedin'])){
                $linkedin = $instance['linkedin'];
            }
            if(isset($instance['pinterest'])){
                $pinterest = $instance['pinterest'];
            }
          

    		?>
			
            <br>
			<!-- title field -->
    		<strong><label for="<?php echo $this->get_field_id('title'); ?>">Set Widget Title: </label></strong>
    		<br>
    			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php if(isset($title)){ echo $title; }; ?>" type="text">
            <br>

           <p>
            <strong><label for="<?php echo $this->get_field_id( 'select_theme' ); ?>">Select Social Icon theme: </label> </strong>
            <select class="" id="<?php echo $this->get_field_id('select_theme'); ?>" name="<?php echo $this->get_field_name('select_theme'); ?>">
                <?php
                 
                    $options = array( 'Default', 
                      '3D Squares', 
                      '3D Boxes', 
                      'Branded', 
                      'Colored',
                      'Flat Icons', 
                      'Green', 
                      'Hanging', 
                      'Hollow', 
                      'Octagon', 
                      'Paper Fold', 
                      'Radiused', 
                      'Social Lambs', 
                      'Sprayed', 
                      'Social Badges', 
                      'Social Sketched',
                      'Social Christmas', 
                      'Tricon', 
                      'Pyramid', 
                      'White Rounded', 
                      'White Stitched Border' );
                    
                    foreach ( $options as $option ) {
                        echo '<option value="' . $option . '" id="' . $option . '"', $selected_theme == $option ? ' selected="selected"' : '', '>' . $option . '</option>';
                    }
                ?>
            </select>
        </p>
         <p>
           <strong> <label for="<?php echo $this->get_field_id( 'select_animation' ); ?>">Select animation: </label> </strong>
            <select class="" id="<?php echo $this->get_field_id('select_animation'); ?>" name="<?php echo $this->get_field_name('select_animation'); ?>">
                <?php
                 
                    $options = array( 'None', 
                      '360degree Rotate',
                      'Buzz Out',
                      'Bounce In',
                      'Bounce Out',
                      'Float Shadow',
                      'Float',
                      'Grow',
                      'Grow Shadow',
                      'Grow & Light Rotate',
                      'Push',
                      'Pop',
                      'Rotate',
                      'Sink',
                      'Skew',
                      'Skew Forward',
                      'Skew Backward',
                      'Shadow',
                      'Shrink',
                      'Wobble Horizontal',
                      'Wobble Vertical',
                      'Wobble to Bottom Right',
                      'Wobble to Top Right',
                      'Wobble Top', 
                      'Wobble Bottom' );
                    
                    foreach ( $options as $option ) {
                        echo '<option value="' . $option . '" id="' . $option . '"', $select_animation == $option ? ' selected="selected"' : '', '>' . $option . '</option>';
                    }
                    ;

                ?>
            </select>
            <p><strong>Tip: Hover over on social icons to see animation</strong></p>
        </p>
        <p>
        <p style="text-align:center !important; border: 2px dashed darkgray; margin-bottom: -2px;"><strong>Live Preview</strong></p>
            <div id="wpssiw-social-theme-preview" class="wpssiw-social-theme-preview" style="text-align:<?php if(isset($alignment_option) && !empty($alignment_option)){ echo $alignment_option.' !important'; }else{ echo 'left';} ?>">

            <p style="text-align:<?php if(isset($alignment_option) && !empty($alignment_option)){ echo $alignment_option.' !important'; }else{ echo 'left';} ?>"><strong><?php echo $title ?></strong></p>
            <br/>
                <div id="wpssiw-social-theme-default" class="wpssiw-social-theme-default" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Default'){ echo 'inline-block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" 
                    style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                          display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/default-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/default-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/default-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/default-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?>">
                      <img src="<?php echo plugins_url( 'assets/img/default-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-flat-icons" class="wpssiw-social-theme-flat-icons" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Flat Icons'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/flat-icons-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/flat-icons-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/flat-icons-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/flat-icons-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?>" >
                      <img src="<?php echo plugins_url( 'assets/img/flat-icons-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-paper-fold" class="wpssiw-social-theme-paper-fold" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Paper Fold'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/paper-fold-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/paper-fold-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/paper-fold-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/paper-fold-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?>">
                      <img src="<?php echo plugins_url( 'assets/img/paper-fold-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-radiused" class="wpssiw-social-theme-radiused" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Radiused'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/radiused-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/radiused-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/radiused-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/radiused-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/radiused-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-branded" class="wpssiw-social-theme-branded" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Branded'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/branded-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/branded-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/branded-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/branded-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/branded-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-octagon" class="wpssiw-social-theme-octagon" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Octagon'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/octagon-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/octagon-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/octagon-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/octagon-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/octagon-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-social-sketched" class="wpssiw-social-theme-social-sketched" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Social Sketched'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/social-sketched-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-sketched-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-sketched-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-sketched-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?>">
                      <img src="<?php echo plugins_url( 'assets/img/social-sketched-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-hanging" class="wpssiw-social-theme-hanging" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Hanging'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/hanging-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hanging-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hanging-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hanging-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hanging-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-tricon" class="wpssiw-social-theme-tricon" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Tricon'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/tricon-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/tricon-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/tricon-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/tricon-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/tricon-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-hollow" class="wpssiw-social-theme-hollow" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Hollow'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/hollow-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hollow-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hollow-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hollow-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/hollow-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-social-lambs" class="wpssiw-social-theme-social-lambs" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Social Lambs'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/social-lambs-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-lambs-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-lambs-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-lambs-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-lambs-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-3d-squares" class="wpssiw-social-theme-3d-squares"  style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='3D Squares'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/3d-squares-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-squares-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-squares-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-squares-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-squares-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-3d-boxes" class="wpssiw-social-theme-3d-boxes" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='3D Boxes'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/3d-boxes-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-boxes-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-boxes-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-boxes-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/3d-boxes-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-white-stitched-border" class="wpssiw-social-theme-white-stitched-border" 
                style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='White Stitched Border'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/white-stitched-border-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-stitched-border-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-stitched-border-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-stitched-border-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-stitched-border-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-white-rounded"  class="wpssiw-social-theme-white-rounded" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='White Rounded'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/white-rounded-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-rounded-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-rounded-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-rounded-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/white-rounded-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-sprayed" class="wpssiw-social-theme-sprayed" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Sprayed'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/sprayed-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/sprayed-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/sprayed-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/sprayed-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/sprayed-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-social-badges" class="wpssiw-social-theme-social-badges" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Social Badges'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/social-badges-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-badges-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-badges-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-badges-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-badges-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-social-christmas" class="wpssiw-social-theme-social-christmas" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Social Christmas'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/social-christmas-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-christmas-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-christmas-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-christmas-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/social-christmas-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-pyramid" class="wpssiw-social-theme-pyramid" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Pyramid'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/pyramid-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/pyramid-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/pyramid-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/pyramid-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/pyramid-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-green" class="wpssiw-social-theme-green" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Green'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/green-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/green-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/green-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/green-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/green-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
                <div id="wpssiw-social-theme-colored" class="wpssiw-social-theme-colored" style="display:<?php if(isset($selected_theme) && !empty($selected_theme) && $selected_theme=='Colored'){ echo 'block'; }else{ echo 'none';} ?>">
                    <a id="wpssiw-facebook-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($facebook) && !empty($facebook)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                        <img src="<?php echo plugins_url( 'assets/img/colored-facebook.png', __FILE__ ) ?>" 
                        width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                        class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-twitter-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($twitter) && !empty($twitter)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/colored-twitter.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-google-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($google_plus) && !empty($google_plus)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/colored-google.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-linkedin-link" href="#" target="_blank" style="margin-right:<?php if(isset($margin_btw_icons) && !empty($margin_btw_icons)){ echo $margin_btw_icons; }else{ echo '5';} ?>px;
                    display:<?php if(isset($linkedin) && !empty($linkedin)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/colored-linkedin.png', __FILE__ ) ?>" 
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                    <a id="wpssiw-pinterest-link" href="#" target="_blank" style="display:<?php if(isset($pinterest) && !empty($pinterest)){ echo 'inline-block'; }else{ echo 'none';} ?> ">
                      <img src="<?php echo plugins_url( 'assets/img/colored-pinterest.png', __FILE__ ) ?>"
                      width="<?php if(isset($icon_size) && !empty($icon_size)){ echo $icon_size; }else{ echo '32px';} ?>"
                      class="<?php if(isset($select_animation) && !empty($select_animation)){ echo "hvr-".strtolower(trim(str_replace(" ", "-", $select_animation)));; }else{ echo '';} ?>"/>
                    </a>
                </div>
            </div>
        </p>
          
            
          <br>
               <strong><label for="<?php echo $this->get_field_id('size'); ?>">Set Social Icon Size (px):</label></strong>
          <input class="widefat" id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" value="<?php if(isset($icon_size)){ echo $icon_size; }; ?>" type="text" placeholder="Default is 32">
        <br>
        <br>

    
             <strong><label for="<?php echo $this->get_field_id('margin_btw_icons'); ?>">Margin between Icons (px):</label></strong>
             <input class="widefat" id="<?php echo $this->get_field_id('margin_btw_icons'); ?>" name="<?php echo $this->get_field_name('margin_btw_icons'); ?>" value="<?php if(isset($margin_btw_icons)){ echo $margin_btw_icons; }; ?>" type="text" placeholder="Default is 5"></td>
        <br>
        <br>
       
          

 <strong><label for="<?php echo $this->get_field_id('target_option'); ?>">Target:</label></strong>
   <select class="" id="<?php echo $this->get_field_id('target_option'); ?>" name="<?php echo $this->get_field_name('target_option'); ?>">
                  <?php

                  $options = array( 'Open in same window', 
                    'Open in New Window' );

                  foreach ( $options as $option ) {
                    echo '<option value="' . $option . '" id="' . $option . '"', $target_option == $option ? ' selected="selected"' : '', '>' . $option . '</option>';
                  }
                  ?>
                </select>
          <br> <br>
            <!-- facebook field -->
           <strong> <label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook Profile Link / URL:</label></strong>
            <br>
                <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php if(isset($facebook)){ echo $facebook; }; ?>" type="text">
            <br>
            <br>

			<!-- twitter field -->
    		<strong><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter Profile Link / URL:</label></strong>
    		<br>
    			<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php if(isset($twitter)){ echo $twitter; }; ?>" type="text">
    		<br>
    		<br>

    	

    		<!-- Google plus field -->
    		<strong><label for="<?php echo $this->get_field_id('google-plus'); ?>">Google Plus Profile Link / URL:</label></strong>
    		<br>
    			<input class="widefat" id="<?php echo $this->get_field_id('google-plus'); ?>" name="<?php echo $this->get_field_name('google-plus'); ?>" value="<?php if(isset($google_plus)){ echo $google_plus; }; ?>" type="text">
    		<br>
    		<br>

    		<!-- LinkedIn field -->
    		<strong><label for="<?php echo $this->get_field_id('linkedin'); ?>">LinkedIn Profile Link / URL:</label></strong>
    		<br>
    			<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php if(isset($linkedin)){ echo $linkedin; }; ?>" type="text">
    		<br>
    		<br>

    		<!-- Pinterest field -->
    		<strong><label for="<?php echo $this->get_field_id('pinterest'); ?>">Pinterest Profile Link / URL:</label></strong>
    		<br>
    			<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php if(isset($pinterest)){ echo $pinterest; }; ?>" type="text">
    	

          

    		<br><br><br>

    		<?php 
        
    	}
    }

    function register_social_share_icon_widget(){
    	register_widget( 'social_share_icon_widget' );
    }
    add_action( 'widgets_init', 'register_social_share_icon_widget');

