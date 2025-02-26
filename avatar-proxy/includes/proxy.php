<?php
/**
 * Proxy file, this use for get the avatars from AVATAR_SERVER
 *
 *
 * @package Avatar Proxy
 * @author Frans Allen
 */

# Exit if accessed directly
if ( !defined('ABSPATH') ) exit;

# Variables Setting
$get = wp_remote_get(AVATAR_SERVER . $_GET['apid']);
$avatar = wp_remote_retrieve_body($get);

# Header Setting
header('Cache-Control: max-age=' . AVATAR_CACHE_EXPIRES);
header('Content-Type: image/jpeg');
header('Expires: ' . gmdate("D, d M Y H:i:s", time() + AVATAR_CACHE_EXPIRES) . ' GMT');

# Out put the gravatar
echo $avatar;
