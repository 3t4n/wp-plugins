=== API info for Plugins & Themes from WP.ORG ===

Tags			 : api,wordpress,wp,org,plugin,theme,author
Stable tag		 : 1.13
WordPress URI	 : https://wordpress.org/plugins/api-info-themes-plugins-wp-org/
Plugin URI		 : https://puvox.software/software/wordpress-plugins/?plugin=api-info-themes-plugins-wp-org
Contributors	 : puvoxsoftware,ttodua
Author			 : Puvox.software
Author URI		 : https://puvox.software/
Donate link		 : https://paypal.me/puvox
License			 : GPL-3.0
License URI		 : https://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 6.0
Tested up to	 : 6.5.3

[ ✅ 𝐒𝐄𝐂𝐔𝐑𝐄 𝐏𝐋𝐔𝐆𝐈𝐍𝐒 b𝓎 𝒫𝓊𝓋𝑜𝓍 ]
Show Plugins & Themes information on your site, from WP.ORG API

== Description ==
= [ ✅ 𝐒𝐄𝐂𝐔𝐑𝐄 𝐏𝐋𝐔𝐆𝐈𝐍𝐒 b𝓎 𝒫𝓊𝓋𝑜𝓍 ] : =
> • Revised for security to be reliable and free of vulnerability holes.
> • Efficient, not to add any extra load/slowness to site.
> • Don't collect private data.
= Plugin Description =
Show Plugins & Themes information on your site, from WP.ORG API, as described in <a href="https://codex.wordpress.org/WordPress.org_API#Plugins">WordPress API codex</a>.

**Shortcode**:
`
[wporg_api_pt type="plugins" by="author" by_value="wporg_username" ...]
`

**Programatic access**: 
`
<?php echo do_shortcode('[wporg_api_pt type="plugins" by="author" by_value="wporg_username" ...]');  ?>
                //or
<?php if (function_exists('wporg_api_pt'))		{ echo wporg_api_pt(["type"=>"plugins", "by"="author", "by_value"="wporg_username" ...]); } ?>
`

= Available Options =
See all available options and their description on plugin's settings page. To mention some of them, you can get these data:


== Screenshots ==
1. Example output


== Installation ==
A) Enter your website "Admin Dashboard > Plugins > Add New" and enter the plugin name
or
B) Download plugin from WordPress.org , Extract the zip file and upload the container folder to "wp-content/plugins/"


== Frequently Asked Questions ==
- More at <a href="https://puvox.software/software/wordpress-plugins/">our WP plugins</a> page.


== Changelog ==
= 2.20 =
* Only php >= 5.4 supported

= 1.0 =
* First release.