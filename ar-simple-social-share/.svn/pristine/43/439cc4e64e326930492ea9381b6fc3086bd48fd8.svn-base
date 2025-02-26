<?php 
class facebook_likebox {
     function fb_likebox( $atts, $username= "", $width = "", $height= "", $colorscheme = "", $show_header = "", $show_stream="", $show_border = "" ) {
            return "http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F$username&width=$width&height=$height&colorscheme=$colorscheme&show_faces=$show_faces&header=$show_header&stream=$show_stream&show_border=$show_border&appId=481092295342350";
     }
}
add_shortcode( 'facebook-likebox', array( 'facebook_likebox', 'fb_likebox' ) );
?>