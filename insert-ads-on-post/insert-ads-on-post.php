<?php
/*
Plugin Name: Insert Ads On Post
Version: 1.2.2
Plugin URI: http://wp.labnul.com/plugin/insert-ads-on-post/
Description: Insert adsense inside post content and page content. Start <a href="options-general.php?page=insert-ads-on-post">Insert Ads On Post</a>.
Author: Aby Rafa
Author URI: http://wp.labnul.com/
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.*/

//filter content
function insert_ads_on_post($content) {
	if(!is_front_page() && !is_home()){
		if (is_single()) {
			if(get_option("insert_ads_on_post_single") == "1") {
				if(get_option("insert_ads_on_post_showa") == "1") $content = get_option("insert_ads_on_post_above") . $content;
				if(get_option("insert_ads_on_post_showb") == "1") $content .= get_option("insert_ads_on_post_below");
			}
		}
		if(is_page()){
			if(get_option("insert_ads_on_post_page") == "1") {
				if(get_option("insert_ads_on_post_showa") == "1") $content = get_option("insert_ads_on_post_above") . $content;
				if(get_option("insert_ads_on_post_showb") == "1") $content .= get_option("insert_ads_on_post_below");
			}
		}
	}
	return $content;
}
add_filter("the_content", "insert_ads_on_post");

// create custom plugin settings menu
add_action('admin_menu', 'insert_ads_on_post_create_menu');

function insert_ads_on_post_create_menu() {

	//create new top-level menu
	add_options_page("Insert Ads On Post Settings","Insert Ads On Post","manage_options","insert-ads-on-post","insert_ads_on_post_settings_page");

	//call register settings function
	add_action( 'admin_init', 'register_insert_ads_on_post_settings' );
}


function register_insert_ads_on_post_settings() {
	//register our settings
	register_setting( 'insert-ads-on-post-group', 'insert_ads_on_post_single' );
	register_setting( 'insert-ads-on-post-group', 'insert_ads_on_post_page' );
	register_setting( 'insert-ads-on-post-group', 'insert_ads_on_post_above' );
	register_setting( 'insert-ads-on-post-group', 'insert_ads_on_post_below' );
	register_setting( 'insert-ads-on-post-group', 'insert_ads_on_post_showa' );
	register_setting( 'insert-ads-on-post-group', 'insert_ads_on_post_showb' );

	//update db
	if ( false!==get_option('insertadsonpost_data') ) { //if db exist 
		$data = get_option("insertadsonpost_data");
		add_option("insert_ads_on_post_above", htmlspecialchars_decode($data[0], ENT_QUOTES));
		add_option("insert_ads_on_post_below", htmlspecialchars_decode($data[1], ENT_QUOTES));
		add_option("insert_ads_on_post_showa", $data[2]);
		add_option("insert_ads_on_post_showb", $data[3]);
		add_option("insert_ads_on_post_single", $data[4]);
		add_option("insert_ads_on_post_page", $data[5]);
		delete_option("insertadsonpost_data"); // remove db
	}
}

function insert_ads_on_post_settings_page() { ?>
<div class="wrap">
<h1>Insert Ads On Post</h1>
<form method="post" action="options.php">
    <?php
		settings_fields( 'insert-ads-on-post-group' );
		do_settings_sections( 'insert-ads-on-post-group' );
	 ?>
    <div id="dashboard-widgets-wrap">
		<div id="dashboard-widgets" class="metabox-holder">
			<div id="postbox-container-2" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables">
					<div id="dashboard_primary" class="postbox ">
						<h2 class="hndle"><span>About Plugin:</span></h2>
						<div class="inside">
							<div class="rss-widget">
								<div style="float:left; margin-right:25px;">
									<p><img src="<?php echo plugins_url("images/home.jpg", __FILE__); ?>" /> <a href="http://wp.labnul.com/plugin/insert-ads-on-post/" target="_blank">Plugin Homepage</a></p>
								</div>
								<div style="clear:left;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="postbox-container-1" class="postbox-container">
				<div id="side-sortables" class="meta-box-sortables">
					<div id="dashboard_primary" class="postbox ">					
						<h2 class="hndle"><span>Adsense Visibility</span></h2>
						<div class="inside">
							<div class="rss-widget"><br />
								<input name="insert_ads_on_post_single" type="checkbox" value="1" <?php checked(1, get_option('insert_ads_on_post_single'),true); if(false===get_option('insert_ads_on_post_single')) echo "checked"; ?>/> Single Post
								<br /><br />
								<input name="insert_ads_on_post_page" type="checkbox" value="1" <?php checked(1, get_option('insert_ads_on_post_page'),true); if(false===get_option('insert_ads_on_post_page')) echo "checked"; ?> /> Page Post<br /><br />
							</div>
						</div>
						<h2 class="hndle"><span>Adsense script above post content (below post title)</span></h2>
						<div class="inside">
							<div class="rss-widget">							
								<textarea name="insert_ads_on_post_above" class="large-text code" rows="9"><?php echo esc_textarea( get_option('insert_ads_on_post_above') ); ?></textarea>
								<br />								
								<input type="radio" name="insert_ads_on_post_showa" value="1" <?php checked(1, get_option('insert_ads_on_post_showa'),true); if(false===get_option('insert_ads_on_post_showa')) echo "checked"; ?>>enable</input>
								&nbsp;&nbsp;&nbsp;
								<input type="radio" name="insert_ads_on_post_showa" value="0" <?php checked(0, get_option('insert_ads_on_post_showa'),true); ?>>disable</input>							
							</div>
						</div><br /><br />
						<h2 class="hndle"><span>Adsense script below post content</span></h2>
						<div class="inside">
							<div class="rss-widget">								
								<textarea name="insert_ads_on_post_below" class="large-text code" rows="9"><?php echo esc_textarea( get_option('insert_ads_on_post_below') ); ?></textarea>
								<br />
								<input type="radio" name="insert_ads_on_post_showb" value="1" <?php checked(1, get_option('insert_ads_on_post_showb'),true); if(false===get_option('insert_ads_on_post_showb')) echo "checked"; ?>>enable</input>
								&nbsp;&nbsp;&nbsp;
								<input type="radio" name="insert_ads_on_post_showb" value="0" <?php checked(0, get_option('insert_ads_on_post_showb'),true); ?>>disable</input>							
							</div>
						</div><br />
						<div class="inside">
							<div class="rss-widget">
								<?php submit_button(); ?>
							</div>
						</div>
						<h2 class="hndle"><span>You may use these HTML tags :</h2>
						<div class="inside">
							<div class="rss-widget">
								<br /><lo><li><code><b>&lt;p&gt;</b> your adsense script <b>&lt;/p&gt;</b></code></li>
								<li><code><b>&lt;center&gt;</b> your adsense script <b>&lt;/center&gt;</b></code></li>
								<li><code><b>&lt;br /&gt;</b> your adsense script </code></li>
								<li> <code>your adsense script <b>&lt;br /&gt;</b></code></li></lo>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
</form>
</div>
<?php } ?>
