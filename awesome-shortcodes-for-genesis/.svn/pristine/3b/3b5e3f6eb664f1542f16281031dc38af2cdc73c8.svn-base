<?php
//add style for frontend
function asg_shortcodes_styles() {
        wp_register_style('asgshortcode_css', plugins_url('asg_shortcodes.css', __FILE__) );
        wp_register_script('asgshortcode_jss', plugins_url('asg_shortcodes.js', __FILE__),array('jquery'));
        if (!get_option('asg_css')) {
            wp_enqueue_style( 'asgshortcode_css');
        }
}

//Shortcode for adding ASG content box
function asg_content_box ( $atts, $content = NULL ) {
    extract(shortcode_atts(array(
        'boxcolor' => '',
        'boxtitle' => '',
        'boldtitle' => '',
        'boxexpand' => 'false',
        'showcontent' => 'true'
    ),$atts));
    static $box_count=0; $box_count++;
    if ($boxtitle != '') {
        $box_content = '<p id="boxtitle-'.$box_count.'" class="content-box-'.$boxcolor.'-title content-box-no-bottom">';
        if ($boldtitle == 'true') { 
            $box_content .= '<strong>'.$boxtitle.'</strong>';     
        } else {
            $box_content .= $boxtitle;     
        }
        if ($boxexpand == 'true') {
            $box_content .= '<a href="#asg_content_box-'.$box_count.'" class="asg-expander"><img id="asg-content-box-img-'.$box_count.'"';
            if ($showcontent == 'false' ? $box_content .= ' class="asg-side"' : $box_content .= ' class="asg-down"') ; 
            $box_content .= ' src="'.plugins_url('/Images/asg-blank.png', __FILE__).'" align=right></a>';
            wp_enqueue_script( 'asgshortcode_jss');
        }
        $box_content .= '</p>'; 
    }
    if ($content != '') {
        $box_content .= '<p id="asg_content_box-'.$box_count.'" class="content-box-'.$boxcolor;
        if ($boxtitle != '' ? $box_content .= ' content-box-no-gap"' : $box_content .= '"');
        if ($showcontent == 'false' and $boxtitle != '' and $boxexpand == 'true') {
            $box_content .= ' style="display:none"'; 
        }
        $box_content .= '>'.do_shortcode($content).'</p>'; 
    }
    return $box_content;
}
add_shortcode('asg-content-box','asg_content_box');

//Shortcodes for ASG Buttons
function asg_button ( $atts, $content = NULL ) {
    extract(shortcode_atts(array(
        'color' => '',
        'link' => '',
        'newwindow' => '',
        'rel' => 'none'
    ),$atts));
    $ret_text = '<p><a href="'.$link.'" ';
    if ($newwindow == "true" || $rel != "none") {
        $ret_text .= 'rel="';
        if ($rel != "none") {
            $ret_text .= $rel . ' ';
        }
        if ($newwindow == "true") {
            $ret_text .= 'noopener';
        }
        $ret_text .= '" ';
    }
    if ($newwindow == "true") {
            $ret_text .= 'target="_blank"';
        }
    $ret_text .= '><button class="button-'.$color.'">';    
    $ret_text .= do_shortcode($content).'</button></a></p>';    
    return $ret_text;
}
add_shortcode('asg-button','asg_button');

//Shortcodes for Two Columns
function asg_column ($atts, $content = NULL) {
    extract(shortcode_atts(array(
        'firstcolumn' => '',
        'columnno' => ''
    ),$atts));
    if ($firstcolumn == 'first') {
        return '<div class="one-'.$columnno.' first">'.do_shortcode($content).'</div>';
    } else {
        return '<div class="one-'.$columnno.'">'.do_shortcode($content).'</div>';
    }    
}
add_shortcode('asg-column','asg_column');

// YouTube ShortCode [youtube src="" title="" duration="" thumbnail="" description=""]
function asg_youtube_shortcode( $atts ) {
   extract(shortcode_atts(array(
	'src' => '',
    	'title' => '',
        'duration' => '',
        'thumbnail' => '',
        'description' => ''
   ), $atts));
    $video_tag = '<div itemprop="video" itemscope itemtype="http://schema.org/VideoObject">';
    if ($title != ''){
        $video_tag .= '<h2 itemprop="name">' . $title . '</h2>';
    }
    if ($duration != ''){
        $video_tag .= '<meta itemprop="duration" content="' . $duration . '" />';
    }
    if ($thumbnail != ''){
        $video_tag .= '<meta itemprop="thumbnailUrl" content="' . $thumbnail . '" />';
    }
    $video_tag .= '<meta itemprop="embedURL" content="https://youtu.be/' . $src . '" />';
    $video_tag .= '<p class="video-container"><iframe src="https://www.youtube.com/embed/' .$src. '?hd=1" frameborder="0" allowfullscreen></iframe></p>';
    if ($description != ''){
        $video_tag .= '<p itemprop="description">' . $description . '</p>';
    }
    $video_tag .= '</div>';
    return $video_tag;
}
add_shortcode('youtube', 'asg_youtube_shortcode');

// github gist Shortcode Usage: [gist file="" username=""]
function asg_gist_shortcode( $atts ) {
   extract(shortcode_atts(array(
	   'file' => '',
           'username' => ''
   ), $atts));
   if ($username == NULL) { 
       $username = get_option(asg_gist_username);
   }
   $src = 'https://gist.github.com/'.$username.'/'.$file;
   $rettxt = '<script src="'.$src.'.js"></script>';
   if (get_option(asg_gist_footer)) {
       $rettxt .= '<p>if javascript is not enabled, you will not see the code. <a href="'.$src.'" target="_blank" rel="nofollow noopener">Click Here for the Code</a></p>';
   }
   return $rettxt;
}
add_shortcode('gist', 'asg_gist_shortcode');

// PunchTab Giveaway Shortcode Usage: [punchtab datauuid=""]
function asg_punchtab_shortcode( $atts ) {
   extract(shortcode_atts(array(
	   'datauuid' => ''
   ), $atts));
   return '<script async src="//static.punchtab.com/js/pg.js" class="pt-giveaway" data-uuid="'.$datauuid.'"></script>';
}
add_shortcode('punchtab', 'asg_punchtab_shortcode');

function asg_rafflecopter_shortcode( $atts ) {
    extract(shortcode_atts(array(
        'raffleid' => '',
        'title' => ''
    ), $atts));
    return '<a id="rc-' + e.data.raffleid + '" class="rafl" href="http://www.rafflecopter.com/rafl/display/' + e.data.raffleid + '/" rel="nofollow">' + e.data.title + '</a><script src="//widget.rafflecopter.com/load.js"></script>';
}
add_shortcode('rafflecopter', 'asg_rafflecopter_shortcode');