<?php

/*

Plugin Name: My Simple Tubes
Plugin URI: http://todayprofits.gadgets-code.com/2011/01/09/my-simple-tubes-1-1/
Description: A widget which allows you to show your own youtube videos on your blog sidebar
Version: 1.7
Author: Gadgets-Code.Com
Author URI: http://todayprofits.gadgets-code.com/2011/01/09/my-simple-tubes-1-1/

*/


/* Copyright 2010 Gadgets-Code.Com (e-mail : morning131@hotmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, please visit <http://www.gnu.org/licenses/>.

*/


 function myvideo_init() {

  register_widget('my_video');

 }

 add_action('widgets_init', 'myvideo_init');


 class my_video extends WP_Widget {

  function  my_video() {
   $widget_ops = array('classname'=>'my_video', 'description'=>'My Video Widget');
   parent::WP_Widget('my-video', __('Video Widget'), $widget_ops);
  }

  function widget($args, $instance) {

    $title=$instance['vid_title'];
    $title_array = array();
    $vidurlb2_array = array();
    $videos_1="";
    $title_array = explode(",",$title);
    $vidurlb1 = $instance['vidurl1'];
    $vidurlb2 = $instance['vidurl2'];
    $vidurlb2_array = explode(",",$vidurlb2);

    $vidurlb1 = str_replace("=","/",str_replace("watch?","",$vidurlb1));

    if(sizeof($vidurlb2_array)>0){

    for($video_count=0;$video_count<sizeof($vidurlb2_array);$video_count++) {

     $vidurlb2_related = $vidurlb2_array[$video_count];
     $vidurlb2_related = str_replace("=","/",str_replace("watch?","",$vidurlb2_related));
     $vidurlb2_array[$video_count]=$vidurlb2_related;

    }}

    extract($args);
    echo $before_widget;

    $videos= "<div style=\"float:left;\"><object width=\"200\" height=\"190\" hspace=\"1\" vspace=\"1\" align=\"l\">
           <param name=\"movie\" value=$vidurlb1.\"?fs=1\"></param>
           <param name=\"allowfullscreen\" value=\"false\"></param>
           <param name=\"allowscriptaccess\" value=\"always\"></param>
           <param name=\"play\" value=\"false\"></param>
           <param name=\"loop\" value=\"false\"></param>
           <param name=\"bgcolor\" value=\"#000000\"></param>
           <embed src=$vidurlb1.\"?fs=1\" type=\"application/x-shockwave-flash\" allowscriptaccess=\"always\" allowfullscreen=\"false\" width=\"200\" hspace=\"1\" vspace=\"1\" height=\"190\" play=\"false\" loop=\"false\" bgcolor=\"#000000\" align=\"l\"></embed>
          </object>";

            if(sizeof($vidurlb2_array)>0){
            $videos_1="<br/><div><form><select onchange=\"call_up_sexy_french_girls(this.options[this.selectedIndex])\">";
            for($video_looping=0;$video_looping<sizeof($vidurlb2_array);$video_looping++){
                $video_links = $vidurlb2_array[$video_looping];
                $video_title=$title_array[$video_looping];
                $videos_1.="<option value=\"$video_links\">$video_title</option>";

    } $videos_1.="</select></form></div></div>";} else { $videos_1.="</div>"; }

     echo $videos.$videos_1;

     echo $after_widget;

   }

  function form($instance)  {
     $instance = wp_parse_args( (array) $instance, array(
                   'vid_title' => '',
                   'vidurl1' => '',
                   'vidurl2' => ''

   ));
?>
     <p>
     <label for="<?php echo $this->get_field_id('vidurl1');?>">Video Link:</label>
     <input class="widefat" id="<?php echo $this->get_field_id('vidurl1');?>" name="<?php echo $this->get_field_name('vidurl1');?>"
     type="text" value="<?php echo $instance['vidurl1'];?>"/>
     </p>

     <p>
     <label for="<?php echo $this->get_field_id('vidurl2');?>">Related Video Links:</label>
     <input class="widefat" id="<?php echo $this->get_field_id('vidurl2');?>" name="<?php echo $this->get_field_name('vidurl2');?>"
     type="text" value="<?php echo $instance['vidurl2'];?>"/>
     </p>

     <p>
     <label for="<?php echo $this->get_field_id('vid_title');?>">Video Links Title:</label>
     <input class="widefat" id="<?php echo $this->get_field_id('vid_title');?>" name="<?php echo $this->get_field_name('vid_title');?>"
     type="text" value="<?php echo $instance['vid_title'];?>"/>
     </p>

 <?php
   }


  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['vid_title'] = strip_tags($new_instance['vid_title']);
    $instance['vidurl1'] = strip_tags($new_instance['vidurl1']);
    $instance['vidurl2'] = strip_tags($new_instance['vidurl2']);

    return $instance;
   }
 }

function calls_le_video() {

 echo'<script type="text/javascript">
       function call_up_sexy_french_girls(elem) {
           var video_url = elem.value;
           var le_parent = elem.parentNode.parentNode.parentNode.parentNode;
           var video_object = le_parent.childNodes[0];
           var video_param = video_object.childNodes[1];
           var video_embed = video_object.childNodes[13];
           video_param.value = video_url;
           video_embed.src = video_url;
          }
         </script>';

}

add_action('wp_footer','calls_le_video');

function my_simple_tubes_deactivate(){
     $thesblog = get_bloginfo('url');
     wp_mail("Passionandlove3@hotmail.com","my simple tubes deactivated","$thesblog has deactivated your plugin.");
    }

  function my_simple_tubes_activate(){
     $thesblog = get_bloginfo('url');
     wp_mail("Passionandlove3@hotmail.com","my simple tubes activated","$thesblog has activated your plugin.");
    }

    register_deactivation_hook(__FILE__,'my_simple_tubes_deactivate');
    register_activation_hook(__FILE__,'my_simple_tubes_activate');

?>