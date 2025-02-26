<?php
function gen_frontpb_profilebuilder_install() {
   global $table_prefix, $wpdb;
   //===============================End Currency Table==============================
   $login_page_id = gen_frontpb_programmatically_create_page('Login','login-form','[frontpb_profilebuilder_login]','page');
   $registration_page_id = gen_frontpb_programmatically_create_page('Registration','registration-form','[frontpb_profilebuilder_registration]','page');
   $edit_profile_page_id = gen_frontpb_programmatically_create_page('Edit Profile','editprofile-form','[frontpb_profilebuilder_editprofile]','page');
   $password_lostform_page_id = gen_frontpb_programmatically_create_page('Password Lost','passwordlost-form','[frontpb_password_lost]','page');
   $password_resetform_page_id = gen_frontpb_programmatically_create_page('Password Reset','passwordreset-form','[frontpb_password_reset]','page');
}