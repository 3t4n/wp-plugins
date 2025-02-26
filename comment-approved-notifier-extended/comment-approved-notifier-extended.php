<?php
/*
	Plugin Name: Comment Approved Notifier Extended
	Plugin URI: http://www.ubilisim.com/comment-approved-notifier-extended-wordpress-plugin/
	Description: Send notification e-mail to user when comment approved.
	Author: UfukArt
	Version: 5.2
	Domain Path: /lang
	Text Domain: comment-approved-notifier-extended
	Author URI: https://www.zumbo.net
*/
// Security
defined( 'ABSPATH' ) or exit;

// Load plugin translations
load_plugin_textdomain('comment-approved-notifier-extended', false, dirname(plugin_basename(__FILE__)) . '/lang');

// Default Texts
const  cane_default_message_subject = "Your Comment is Approved!";
const  cane_default_message_body = "Dear [commentauthor],

Your comment is approved to this post: [commentedposttitle]

You can see your comment from following address: [commentaddress]

Your Comment:
[commentcontent]

Thanks for your comment.
[blogname]
[blogurl]
(If you did not send this comment, we apologize for this e-mail)";

// Add default english comment approved mail message to db when plugin activated
function cane_default_message_first_add() {
	update_option('cane_default_message_subject', cane_default_message_subject);
	update_option('cane_default_message_body', cane_default_message_body);
}
register_activation_hook( __FILE__, 'cane_default_message_first_add' );

// Delete default english comment approved mail message from db when plugin deactivated
function cane_default_message_delete()
{
	delete_option('cane_default_message_subject');
	delete_option('cane_default_message_body');
}
register_deactivation_hook( __FILE__, 'cane_default_message_delete' );

// if default subject and body have been deleted for any reason
if(!get_option('cane_default_message_subject')){
	update_option('cane_default_message_subject', cane_default_message_subject);
}
if(!get_option('cane_default_message_body')){
	update_option('cane_default_message_body', cane_default_message_body);
}
if (is_admin()) {
	// Add Menu To Wordpress
	add_action('admin_menu', 'comment_approved_notifier_extended_menu');
	function comment_approved_notifier_extended_menu()
    {
		add_menu_page('Comment Approved Notifier','Comment Approved', 'manage_options', 'comment-approved-notifier-extended', 'comment_approved_notifier_extended_manage');
	}

	// Plugin Management Page
	function comment_approved_notifier_extended_manage()
    {
		if(!empty($_POST['action'])=='update'){
		// Wp_nonce check
			if (!isset($_POST['comment_approved_notifier_extended_update']) || ! wp_verify_nonce( $_POST['comment_approved_notifier_extended_update'], 'comment_approved_notifier_extended_update')) {
				echo 'Sorry, you do not have access to this page! https://www.ubilisim.com/missed-schedule-post-publisher-wordpress-plugin/';
				exit;
			}else{
				$cane_default_message_subject = sanitize_text_field($_POST['cane_default_message_subject']);
				$cane_default_message_body = sanitize_textarea_field($_POST['cane_default_message_body']);
				update_option('cane_default_message_subject', $cane_default_message_subject);
				update_option('cane_default_message_body', $cane_default_message_body);
				echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
<p><strong>Settings saved.</strong></p></div>';
			}
		}
	?>
    <h1 class="wp-heading-inline"><?php echo __('Comment Approved Notifier Settings', 'comment-approved-notifier-extended');?></h1>
	<h3><?php echo __('Shortcode List', 'comment-approved-notifier-extended');?></h3>
	<div>
	<?php echo __('You can use this shortcodes in your mail title or mail body.', 'comment-approved-notifier-extended');?>
	<ul>
	<li><?php echo __('Comment Author Name:', 'comment-approved-notifier-extended');?> <strong>[commentauthor]</strong></li>
	<li><?php echo __('Commented Post Title:', 'comment-approved-notifier-extended');?> <strong>[commentedposttitle]</strong></li>
	<li><?php echo __('Comment Link:', 'comment-approved-notifier-extended');?> <strong>[commentaddress]</strong></li>
	<li><?php echo __('Comment:', 'comment-approved-notifier-extended');?> <strong>[commentcontent]</strong></li>
	<li><?php echo __('Blog Name:', 'comment-approved-notifier-extended');?> <strong>[blogname]</strong></li>
	<li><?php echo __('Blog URL:', 'comment-approved-notifier-extended');?> <strong>[blogurl]</strong></li>
	</ul>
	</div>
	<link rel="stylesheet" href="<?php echo  plugins_url().'/'.dirname(plugin_basename(__FILE__));?>/css/style.css" type="text/css" />
	<form class="formoid-metro-cyan" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post"><div class="title"><h2><?php echo __('Comment Approved Notifier', 'comment-approved-notifier-extended');?></h2></div>
		<div class="element-input"><label for="cane_default_message_subject" class="title"><?php echo __('Mail Subject', 'comment-approved-notifier-extended');?></label><input class="large" type="text" name="cane_default_message_subject" id="cane_default_message_subject" value="<?php echo get_option('cane_default_message_subject');?>" /></div>
		<div class="element-textarea"><label for="cane_default_message_body" class="title"><?php echo __('Mail Body', 'comment-approved-notifier-extended');?></label><textarea class="medium" name="cane_default_message_body" id="cane_default_message_body" cols="20" rows="5" ><?php echo stripslashes(get_option('cane_default_message_body'));?></textarea></div>
	<div class="submit"><input type="submit" value="<?php echo __('Update', 'comment-approved-notifier-extended');?>"/></div>
	<input type="hidden" name="action" value="update">
	<?php wp_nonce_field('comment_approved_notifier_extended_update','comment_approved_notifier_extended_update');?>
	</form>
	<?php
	}
}
?>
<?php
// Mail Function
function ub__send_email($comment) {
	if (($comment->comment_type == 'comment') && ($comment->comment_author_email != '')){
		$to = $comment->comment_author_email;
		$site_name = get_bloginfo('name');
		$blog_description = get_bloginfo('description');
		$blog_url = get_bloginfo('url');
		$from_email = get_bloginfo('admin_email');
		$charset = get_option('blog_charset');
		$mailbody = get_option('cane_default_message_body'); 
		$subject = get_option('cane_default_message_subject');
		$cane_default_message_body = nl2br("$mailbody");
		$shortcodes   = ["[commentauthor]","[commentedposttitle]","[commentaddress]","[commentcontent]","[blogurl]","[blogname]"];
		$replaced   = [$comment->comment_author,get_the_title($comment->comment_post_ID),get_permalink($comment->comment_post_ID). "#comment-".$comment->comment_ID,$comment->comment_content,get_bloginfo('url'),get_bloginfo('name')];
		$cane_default_message_subject = str_ireplace($shortcodes, $replaced, $subject);
		$cane_default_message_body = str_ireplace($shortcodes, $replaced, $cane_default_message_body);
		$servername = strtolower( $_SERVER['SERVER_NAME'] );
		if ( str_starts_with( $servername, 'www.' ) ) {
			$servername = substr( $servername, 4 );
		}
		$headers = "From: $site_name <$from_email>\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=\"$charset\"\n";
		$headers .= "List-Unsubscribe: <mailto: $from_email?subject=unsubscribe>";
		ob_start();
		include plugin_dir_path( __FILE__ ) . "templates/email-template.php";
		$content = ob_get_clean();
		//@wp_mail( $to, $cane_default_message_subject, $cane_default_message_body, $headers);
		@wp_mail( $to, $cane_default_message_subject, $content, $headers);
	}
	return false;
}
//comment_unapproved_to_approved action is defined in function  wp_transition_comment_status
add_action('comment_unapproved_to_approved', 'ub__send_email');
?>