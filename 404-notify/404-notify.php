<?php
/*
Plugin Name:    404 Notify
Plugin URI:     https://wordpress.org/plugins/404-notify/
Description:    Get a notification whenever a 404 is encountered on your web site.
Version:        1.2.0
Author: 		Rocket Apps
Author URI: 	https://rocketapps.com.au
Author Email:   hello@michaelott.id.au
Text Domain:    four-o-four
License:        GPL2
Domain Path:    /languages/
*/

/* Look for translation file. */
function load_four_o_four_textdomain() {
    load_plugin_textdomain( 'four-o-four', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'load_four_o_four_textdomain' );


/* Add 404 notifictaion email address field into the General Settings page */
$fof_notify_email = new fof_notify_email();
class fof_notify_email {
    function __construct() {
        add_filter( 'admin_init' , array( &$this , 'add_email' ) );
    }
    function add_email() {
        register_setting( 'general', 'fof_notify_email', 'esc_attr' );
        add_settings_field('fofe', '<label for="fof_notify_email" id="fof_notify_email">' . __('404 Notify email address' , 'four-o-four' ).'</label>' , array(&$this, 'fof_notify_email_field') , 'general' );
    }
    function fof_notify_email_field() {
        $fof_notify_email   = get_option('fof_notify_email');
        $admin_email        = get_option('admin_email');
        ?>
        <input type="text" id="fof_notify_email" class="regular-text ltr" name="fof_notify_email" value="<?php echo $fof_notify_email; ?>" />
        <p class="description"><?php  printf(__('If not specified, notifications will be sent to %1$s' , 'four-o-four' ),$admin_email); ?></p>
	<?php }
}


/* If 404 is encountered, send email notification */
function four_o_four() {
    if ( is_404() ) {
        $refering_url   = wp_get_referer();
        $admin_email    = get_option('admin_email');
        $custom_email   = get_option('fof_notify_email');
        $website_name   = get_option('blogname');
        $website_url    = get_option('siteurl');
        $fofn_url       = 'https://wordpress.org/plugins/404-notify/';
        $compliment     = array(__('Have a great day!', 'four-o-four'), __('Good luck!', 'four-o-four'), __('You got this!', 'four-o-four'), __('Squash that bug!', 'four-o-four'), __('Have fun!', 'four-o-four'));
        $text_style     = 'style="font-family: Arial; font-size: 16px; color: #1d2327"';
        $link_style     = 'style="color: #4072af;"';

        if($custom_email) {
            $send_to = $custom_email;
        } else {
            $send_to = $admin_email;
        }

        /* Only send mail if a referring URL exists (prevents bots that directly hit the 404 page from triggeing emails) */
        if($refering_url) {

            $subject     = sprintf( __('404 on your web site (%1$s)', 'four-o-four'), $website_url);
            $message     = '<p ' . $text_style . '>' . __('Hello,', 'four-o-four') . '</p>';
            $message    .= '<p ' . $text_style . '>' . sprintf( __('Something on this page (<a href="%1$s" ' . $link_style . '>' . $refering_url . '</a>) returns a 404. Ideally you should track it down and fix the issue.', 'four-o-four'), $refering_url) . '</p>';
            $message    .= '<p ' . $text_style . '>' . $compliment[array_rand($compliment)] . ' &#9786;</p>';
            $message    .= '<p ' . $text_style . '>' . sprintf( __('This automated message was sent by <a href="%1$s" ' . $link_style . '>404 Notify</a> for WordPress.', 'four-o-four'),$fofn_url) . '</p>';
            $headers[]  = 'Content-Type: text/html; charset=UTF-8';
            $headers[]  = __( 'From', 'four-o-four' ) . $website_name . ' <' . $admin_email . '>';
            $headers[]  = __( 'Reply-To:', 'four-o-four' ) . $admin_email;
            
            wp_mail( $send_to, $subject, $message, $headers );

        }
    }
}
add_action('wp_footer', 'four_o_four');