<?php
/*
Plugin Name: A-Z Indexing startup
Plugin URI: http://www.adsnest.com/
Description: list posts alphabetically:A plugin that provides an A-Z index of the posts displayed on a particular page or category based on the post title.After you activate the plguin , you do not have to do nothing .You will see the result.
Version: 0.0.1
Author: Mohamed Rida Allah
Author URI: http://www.adsnest.com
License: GPL2
*/

/*  
Copyright 2014  Mohamed Rida Allah  (email : info@adsnest.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function order_category_archives( $query ) {
  if ( is_category() && $query->is_main_query() ){ // is_category() can specify a category, if necessary
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}

add_action( 'pre_get_posts', 'order_category_archives' );

?>