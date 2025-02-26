<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//
// saves extra fields
//
function my_save_extra_profile_fields($id){
    AuthorListings::my_save_extra_profile_fields($id);
}
//
//  shows fields
//
function my_show_extra_profile_fields($id){
AuthorListings::my_show_extra_profile_fields($id);
}
//
// show author listings
//
function show_author_listings($args){
AuthorListings::show_author_listings($args);
}

?>
