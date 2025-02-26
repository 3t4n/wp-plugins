<?php
add_action('admin_init','afpw_admin_init');
function afpw_admin_init(){
  $current_user = wp_get_current_user();
  if(isset($_GET['wporg_review_url']))
    header('Location:  '.  AFPW_REVIEW_URL  );

  
  if(isset($_GET['afpw_already_shared'])){
    // update_option('afpw_display_review_msg', '0');
    update_user_meta( $current_user->ID, 'afpw_already_reviewed', '1');
  }
}


add_action('admin_notices','afpw_admin_notices');
function afpw_admin_notices() {
  $current_user = wp_get_current_user();
  $afpw_already_reviewed = get_user_meta($current_user->ID, 'afpw_already_reviewed', true);
  //get_option('afpw_display_review_msg')  == '1'
  if (get_transient('afpw_hide_review_msg') != '1' and $afpw_already_reviewed != '1'){ 
    $notice = AFPWAdminNotice::getInstance();
    $notice->displayInfo(
    	"<a href='?wporg_review_url=true' class='button button-primary button-large ptohc-flr' target='_blank'>share your review</a>
    	Thank you for installing <b>Author Facebook Page Widget</b>.<br/>
      I hope you are enjoying it! If you really like it then please share your reviews at 
      <a href='?wporg_review_url=true'>WordPress.org</a>. I've already <a href='?afpw_already_shared=true'>done this</a>.<br/>You can send <a target='_blank' href='".esc_url("http://www.psdtohtmlcloud.com/contact-us")."'>your suggestions</a> as well.");
  }
}