<?php
$cssstr = stripslashes($_POST['cssdata']);
file_put_contents(AW_STYLES_ROOT, $cssstr);
echo json_encode(aw_parse_css($cssstr));
die();
?>