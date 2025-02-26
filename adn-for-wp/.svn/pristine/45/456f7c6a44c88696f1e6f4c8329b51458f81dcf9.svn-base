<?php
require 'adnwp-functions.php';

add_action('admin_menu', 'adnwp_admin_menus');

function adnwp_admin_menus() {
	add_menu_page("ADNWP Settings", "ADNWP", 'manage_options', 'adnwp-main-menu', 'adnwp_main_menu');
}

function adnwp_main_menu() {
	global $wpdb;

	$do_share = share_settings();

	$checked = "";
	$pchecked = "";

	if ($do_share->adn_share == 1) {
		$checked = "checked=\"checked\"";
	}
	if ($do_share->posts_only == 1) {
		$pchecked = "checked=\"checked\"";
	}
	if (isset($_POST['submit_adnwp_settings'])) {
		if (isset($_POST['share'])) {
			$checked = "checked=\"checked\"";
			$val = 1;
		}
		else {
			$checked = "";
			$val = 0;
		}
		if (isset($_POST['posts-only'])) {
			$pchecked = "checked=\"checked\"";
			$pval = 1;
		}
		else {
			$pchecked = "";
			$pval = 0;
		}
		save_share($val, $pval);
	}
	include ('templates/admin/_adnwpSettings.php');

}

function include_share_button($content) {
	$share_settings = share_settings();
	$share_url = get_permalink();
	if (is_singular() && is_main_query()) {
		if ($share_settings->adn_share == 1) {
			if ($share_settings->posts_only == 1) {
				if (!is_page()) {
					$content .= '<div id="share-adn" class="social-share"><a href="#" class="" onclick="postADN();"><img src="'.get_bloginfo('wpurl').'/wp-content/plugins/adn-for-wp/images/ADN-post-btn.png"/></a>
								<script type="text/javascript">
									function postADN() {
										window.open(
									    "https://alpha.app.net/intent/post?text=" + "'.$share_url.'",
									    "adn_post",
									    "width=750,height=350,left=100,top=100"
										);
								}
								</script></div>';
				}
			}
			else {
				$content .= '<div id="share-adn" class="social-share"><a href="#" class="" onclick="postADN();"><img src="'.get_bloginfo('wpurl').'/wp-content/plugins/adn-for-wp/images/ADN-post-btn.png"/></a>
					<script type="text/javascript">
						function postADN() {
							window.open(
						    "https://alpha.app.net/intent/post?text=" + "'.$share_url.'",
						    "adn_post",
						    "width=750,height=350,left=100,top=100"
							);
					}
					</script></div>';
			}
		
	}
	}
	
	return $content;
}

add_filter('the_content', 'include_share_button', 10);
?>