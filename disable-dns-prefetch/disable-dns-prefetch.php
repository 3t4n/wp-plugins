<?php
/*
Plugin Name: Disable DNS Prefetch
Description: Remove the DNS-Prefetch from header in front side. 
Version: 1.0
Author: Dhiraj Suthar
*/


add_action( 'init', 'disable_dns_prefetch' ); 
function  disable_dns_prefetch () {      
   remove_action( 'wp_head', 'wp_resource_hints', 2, 99 ); 
} 
