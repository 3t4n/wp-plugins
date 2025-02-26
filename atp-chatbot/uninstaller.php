<?php

if ( ! defined( 'ABSPATH' ) ) exit; 
 
delete_option('id_empresa');
delete_option('id_chat');
 
// for site options in Multisite
delete_site_option('id_empresa');
delete_site_option('id_chat');