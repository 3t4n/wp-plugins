<?
/*
Plugin Name: Adminbar
Plugin URI: http://www.bigalex.it/plugins/adminbar
Description: This plugin adds an adminbar like in Wordpress.com
Version: 1.2
Author: Alessio Periloso
Author URI: http://www.bigalex.it/
*/

function add_wpadminbar() {
require_once(ABSPATH . 'wp-admin/admin-functions.php');
global $userdata, $user_identity, $wpdb;
get_currentuserinfo();
$awaiting_mod = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '0'");

if ($userdata->user_level==10) {
?>
<style>
.quicklinks a img{background:transparent;border:0;padding:0;z-index:1000;}
.quicklinks a:hover{background:#2c77a4;color:#fff}
.quicklinks small a{display:inline}
.quicklinks ul{list-style:none;margin:0;padding:0;text-align:left;z-index:1000;}
.quicklinks ul li{float:left;margin:0;padding:0;z-index:1000;}
.quicklinks ul li.blogmeta{margin-top:0.5em;z-index:1000;}
#wpcombar{background:url('<? bloginfo('wpurl'); ?>/wp-content/plugins/adminbar/wpcombar_bkg.png') #14568a no-repeat 50% 0;border-bottom:1px solid #3285ae;color:#fff;font:12px "Lucida Grande","Lucida Sans Unicode",Tahoma,Verdana;height:27px;left:0;margin:0;position:absolute;top:0;width:100%}
#wpcombar .menupop a span{background:url('<? bloginfo('wpurl'); ?>/wp-content/plugins/adminbar/bullet_arrow_down.gif') no-repeat 100% 0;padding-right:1.5em}
#wpcombar .menupop li{float:none;margin:0;padding:0}
#wpcombar .menupop ul{background:#14568a;border:1px solid #3285ae;border-width:0 1px 1px;left:-999em;position:absolute}
#wpcombar .quicklinks a,.blogmeta{border:none;color:#c3def1;display:block;font:12px "Lucida Grande","Lucida Sans Unicode",Tahoma,Verdana;font-weight:normal;letter-spacing:normal;padding:0.5em 1em;text-decoration:none}
body {padding-top: 28px;}
</style>
<!-- Inizio barra amministrazione -->
<script type="text/javascript">
function showNav(el) { el.getElementsByTagName('UL')[0].style.left='auto'; }
function hideNav(el) { el.getElementsByTagName('UL')[0].style.left='-999em'; }
</script>
<div id="wpcombar">
	<div class="quicklinks">

		<?
			$menu = array(
				array('My Account',array(
					array('Dashboard',get_option('siteurl').'/wp-admin/index.php'),
					array('My Comments',get_option('siteurl').'/wp-admin/edit-comments.php'),
					array('Themes Editor',get_option('siteurl').'/wp-admin/theme-editor.php'),
					array('Manage Posts',get_option('siteurl').'/wp-admin/edit.php'),
					array('Plugins',get_option('siteurl').'/wp-admin/plugins.php'),
					array('Users Management',get_option('siteurl').'/wp-admin/users.php'),
					array('General Options',get_option('siteurl').'/wp-admin/options-general.php'),
					array('Logout',get_option('siteurl').'/wp-login.php?action=logout&amp')
					)
				),
				array('New',array(
					array('New Post', get_option('siteurl').'/wp-admin/post-new.php'),
					array('New Page',get_option('siteurl').'/wp-admin/page-new.php'),
					array('New Link',get_option('siteurl').'/wp-admin/link-add.php'),
					array('New Category',get_option('siteurl').'/wp-admin/categories.php#addcat')
					)
				)
			);

			foreach ($menu as $menuitem) { ?>
				<ul>
					<li class="menupop" onmouseover="showNav(this)" onmouseout="hideNav(this)">
						<a href="" onclick="return false">
							<span><? echo $menuitem[0]; ?></span>
						</a>
						<ul> <?
							foreach ($menuitem[1] as $item) {
								?><li><a href="<? echo $item[1]; ?>"><? echo $item[0]; ?></a></li><?
							} ?>
						</ul>
					</li>
				</ul><?
			}
		?>

		<? if ($awaiting_mod>0) { ?>
		<ul>
			<li>
				<a href="<? bloginfo('wpurl'); ?>/wp-admin/moderation.php">
					<b>Comments to moderate (<? echo $awaiting_mod; ?>)</b>
				</a>
			</li>
		</ul>
		<? } ?>

		<? if (akismet_spam_count()>0) { ?>
			<ul>
				<li>
					<a href="<? bloginfo('wpurl'); ?>/wp-admin/edit-comments.php?page=akismet-admin">
						<b>Akismet Spam (<? echo akismet_spam_count(); ?>)</b>
					</a>
				</li>
			</ul>
		<? } ?>

	</div>
	<div id="admin-bar-rightlinks" class="quicklinks" style="position: absolute; right: 0;">
		<a>Hello <? echo $user_identity; ?> and welcome to <?php bloginfo('name');?></a>
	</div>
</div>
<!-- Fine barra amministrazione --><? }
}

add_action('wp_footer', 'add_wpadminbar');
?>
