<?php
global $afterRead_sugestion;
//These surpress the echo contained in the called function, effectivly forcing it to function like a return
ob_start();
previous_post_link('%link','&laquo %title', True );
$afterRead_dynamic_previous_contents = ob_get_clean();
//And again...
ob_start();
next_post_link('%link','%title &raquo', True );
$afterRead_dynamic_next_contents = ob_get_clean();
$afterRead_sugestion = '<div style=" font-size:2em;display:block;"><p><div style="float:left;'.get_option('afterRead_option_inchi').'">'.$afterRead_dynamic_previous_contents.'</div>'.get_option('afterRead_option_ni').'<div style="float:right;'.get_option('afterRead_option_san').'">'.$afterRead_dynamic_next_contents.'</div></p></div><div style="clear:both"></div>';
?>