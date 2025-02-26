<?php
/*
Plugin Name: Add User Profile
Version: 1.0
Description: プロフィールの項目を追加.
Author: エボちゃん
Author URI: http://665-667.com/
Plugin URI: http://665-667.com/2010/04/10/052103
*/
function add_profile_contactmethod( $contactmethods ) {

//Add start
$contactmethods['rss'] = 'RSS';

$contactmethods['twitter'] = 'Twitter';

$contactmethods['facebook'] = 'Facebook';

$contactmethods['myspace'] = 'MySpace';

$contactmethods['mixi'] = 'mixi';

$contactmethods['skype'] = 'Skype';


//Add end, unset
unset($contactmethods['jabber']);

unset($contactmethods['yim']);

unset($contactmethods['aim']);

return $contactmethods;
}
add_filter('user_contactmethods',
'add_profile_contactmethod',10,1);

?>