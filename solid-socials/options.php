<?php

$position = $_POST['solid_socials_position'];
$facebook_option = $_POST['solid_socials_fb_option'];
$twitter_handle = $_POST['solid_socials_twitter_handle'];
$display_options = $_POST['solid_socials_display'];
$header_height = $_POST['solid_socials_header_height'];


$option_name = "social_beta";
$new_value = "left";

update_option($option_name,$new_value);

?>