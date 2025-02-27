<?php
// Facebook Shortcode

add_shortcode('fblikebox', 'awl_fb_shortcode');
function awl_fb_shortcode($post_id) {
	ob_start();
	//load shortcode setting
	$id = $post_id['id'];
	if($facebook_cpt_settings = get_post_meta( $post_id['id'], 'facebook_cpt_settings'.$post_id['id'], true)) {
		//echo "<pre>";
		//print_r($facebook_cpt_settings);
		//echo "</pre>";
		$w_title = get_the_title($post_id['id']);
		if(isset($facebook_cpt_settings['app_id'])) $app_id = $facebook_cpt_settings['app_id']; else $app_id = "1869036243369971";
		if(isset($facebook_cpt_settings['fb_page_url'])) $fb_page_url = $facebook_cpt_settings['fb_page_url']; 	else $fb_page_url = "https://www.facebook.com/AWordPressLife/";
		if(isset($facebook_cpt_settings['title'])) $title = $facebook_cpt_settings['title']; else $title = "false";
		if(isset($facebook_cpt_settings['w_auto_width'])) $w_auto_width = $facebook_cpt_settings['w_auto_width']; else  $w_auto_width = "false";
		if(isset($facebook_cpt_settings['w_width'])) $w_width = $facebook_cpt_settings['w_width']; else $w_width = "";
		if(isset($facebook_cpt_settings['w_height'])) $w_height = $facebook_cpt_settings['w_height']; else $w_height = "";
		if(isset($facebook_cpt_settings['cover_photo'])) $cover_photo = $facebook_cpt_settings['cover_photo']; else $cover_photo = "true";
		if(isset($facebook_cpt_settings['header_size'])) $header_size = $facebook_cpt_settings['header_size']; else $header_size = "true";
		if(isset($facebook_cpt_settings['show_fans'])) $show_fans = $facebook_cpt_settings['show_fans']; else $show_fans = "true";
		if(isset($facebook_cpt_settings['show_post'])) $show_post = $facebook_cpt_settings['show_post']; else $show_post = "true";
		if(isset($facebook_cpt_settings['language'])) $language = $facebook_cpt_settings['language']; else $language = "en_US";
		if(isset($facebook_cpt_settings['credit_link'])) $credit_link = $facebook_cpt_settings['credit_link']; else $credit_link = "false";
		?>
		
		<?php if($title == 'true') { ?><h2><?php echo $w_title; ?></h2><?php } ?>
		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
			FB.init({
			  appId      : '<?php echo $app_id; ?>',
			  xfbml      : true,
			  version    : 'v2.4'
			});
		  };
		(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/<?php echo $language; ?>/sdk.js#xfbml=1&version=v2.4&appId=<?php echo $app_id; ?>";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-page" data-href="<?php echo $fb_page_url; ?>" data-width="<?php echo $w_width; ?>" data-height="<?php echo $w_height; ?>" data-small-header="<?php echo $header_size; ?>" data-adapt-container-width="<?php echo $w_auto_width; ?>" data-hide-cover="<?php echo $cover_photo; ?>" data-show-facepile="<?php echo $show_fans; ?>" data-show-posts="<?php echo $show_post; ?>"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div></div>
		<?php if($credit_link == "true") { ?><div id="awplife-credit-link" class="awplife-credit-link" style="font-size: x-small; margin-bottom:5px; margin-top:5px; width:100%; float: left;">Facebook Plugin By: <a href="https://awplife.com/" target="_blank">A WP Life</a></div><?php } ?>
		<?php
	}
	wp_reset_query();
	return ob_get_clean();
}
?>