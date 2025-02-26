<?php
global $afterRead_sugestion;
//These surpress the echo contained in the called function, effectivly forcing it to function like a return
ob_start();
previous_post_link('&laquo %link','%title', TRUE);
$afterRead_dynamic_previous_contents = ob_get_clean();
//And again...
ob_start();
next_post_link('%link &raquo','%title', TRUE);
$afterRead_dynamic_next_contents = ob_get_clean();
$afterRead_sugestion = '<div style="display:block;" ><p><div style="float:left;'.get_option('afterRead_option_ichi').'">'.$afterRead_dynamic_previous_contents.'</div>'.get_option('afterRead_option_ni').'<div style="float:right;'.get_option('afterRead_option_san').'">'.$afterRead_dynamic_next_contents.'</div></p></div><div style="clear:both"></div>';
?>