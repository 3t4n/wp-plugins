<?php
// Include WordPress core
require_once('../../../../wp-load.php');

$options = array(
    'ch_def_reply' => get_option('ch_def_reply_option', 'Hi hello we areqeqeahsahsioThanks for contacting with us!'),
    'ch_def_reply_toggle' => get_option('achat_default_reply_option'),

);

header('Content-Type: application/json');
echo json_encode($options);
