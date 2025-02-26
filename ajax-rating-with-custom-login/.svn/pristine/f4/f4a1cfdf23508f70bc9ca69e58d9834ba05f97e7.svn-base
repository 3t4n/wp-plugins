<?php
function mith_arcl_login_form() { 
if ( !is_user_logged_in() ) {
?>
<div class="login_popup"><div class="modal fade bs-req-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"><div class="modal-dialog modal-md"><button type="button" class="close" data-dismiss="modal">X</button><div class="modal-content"><div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">Login</h3></div><div class="panel-body"><form name="login_form" id="login_form" class="login_form" action="login" method="post"><p class="status bg-info msg hide"></p><p><input type="text" name="username" id="username" placeholder="Username" /></p><p><input type="password" name="password" id="password" placeholder="Password" /></p><button name="submit" id="submit" class="btn"><?php _e("Sign in", "shorti"); ?></button><a class="lost" href="<?php echo wp_lostpassword_url(); ?>">Lost your password?</a><?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?></form></div></div></div></div></div></div><?php } }

add_action('wp_footer', 'mith_arcl_login_form');
