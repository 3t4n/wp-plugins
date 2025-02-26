<?php
function ads_main_meta_box_function() {

	add_meta_box('wp-ads-meta', __('Parsi Text ADS','pw-spe'), 'add_ads_meta_box', 'text_ads', 'normal', 'high');



	function add_ads_meta_box() {

		global $post;

		$text_ads_link = get_post_meta($post->ID, 'text_ads-link', true);

		$text_ads_des  = get_post_meta($post->ID, 'text_ads-des', true);

		$text_url  = get_post_meta($post->ID, 'text_url', true);

		$dropdown_value = get_post_meta($post->ID, 'rangha', true);

		$link_target = get_post_meta($post->ID, 'link_target', true);

		$link_rel = get_post_meta($post->ID, 'link_rel', true);

		$customer_contact = get_post_meta($post->ID, 'cus_contact', true);

		$status= get_post_meta($post->ID, 'status_value', true);

		?>

		<div class="text_ads-main">

	<a href="http://marketwp.ir/product/parsi-text-ads-pro/" target="_blank" style="
	font-size: 22px;
	font-family: tahoma;
	text-decoration: none;
	background-color: #d54e21;
	color: #fff;
	margin: 15px auto;
	padding: 12px 0px;
	display: block;
	text-align: center;
	width: 330px;
">نسخه حرفه ای افزونه را ببینید</a>

			<label for="text_ads-link"> <?php _e('URL Link WithOut http :','pw-spe'); ?> </label>
			<input type="text" dir="ltr" name="text_ads-link" value="<?php echo $text_ads_link ?>" />

			<label for="text_ads-link-des"><?php _e('Description Of ADS :','pw-spe'); ?> </label>
			<input type="text" name="text_ads-des" value="<?php echo $text_ads_des ?>" />

			<label for="text_ads-link-des"><?php _e('Domain Name :','pw-spe'); ?> </label>
			<input type="text" name="text_url" value="<?php echo  $text_url ?>" />

			<label for="link_rel"><?php _e('rel Attribute :','pw-spe'); ?> </label>
			<select name="link_rel" style="width: 100px;">
  			<option value="follow" <?php echo ($link_rel == 'follow' ? 'selected':'') ?>>Follow</option>
  			<option value="nofollow" <?php echo ($link_rel == 'nofollow' ? 'selected':'') ?>>No Follow</option>
			</select>

			<label for="link_target"><?php _e('Link Target :','pw-spe'); ?> </label>
			<select name="link_target" style="width: 100px;">
  			<option value="_blank" <?php echo ($link_target == '_blank' ? 'selected':'') ?>><?php _e('Blank','pw-spe'); ?></option>
  			<option value="_self" <?php echo ($link_target == '_self' ? 'selected':'') ?>><?php _e('Self','pw-spe'); ?></option>
			</select>

			<label for="rangha"><?php _e('Color Of ADS :','pw-spe'); ?> </label>
			<select name="rangha" style="width: 100px;">
  			<option value="red_color" <?php echo ($dropdown_value == 'red_color' ? 'selected':'') ?>><?php _e('Red','pw-spe'); ?></option>
  			<option value="green_color" <?php echo ($dropdown_value == 'green_color' ? 'selected':'') ?>><?php _e('Green','pw-spe'); ?></option>
  			<option value="orange_color" <?php echo ($dropdown_value == 'orange_color' ? 'selected':'') ?>><?php _e('Orange','pw-spe'); ?></option>
			</select>



			<label for="cus_contact"><?php _e('Email Or Phone Number Of Custumer (do not show in site) :','pw-spe'); ?></label>
			<input type="text" name="cus_contact" value="<?php echo $customer_contact  ?>" />

		<?php
		$out_cod='';
		$out_cod .= '
		<div class="bmenu">
		<a target="'.$link_target.'" rel="'.$link_rel.'" href="http://' . $text_ads_link . '/" title="' . get_the_title() . '">
		<ul class="'.$dropdown_value.'">
		<li class="text_ads-name">' . get_the_title() . '</li>
		<li class="text_ads-desc">' . $text_ads_des . '</li>
		<li class="text_ads-adre">' . $text_url . '</li>
		</ul>
		</a>
		</div>'; ?>
         <label for="out_cod"><?php _e('Short Code for This ADS :','pw-spe'); ?></label>
		<textarea name="out_cod" style="width: 50%;height: 100px;direction: ltr;" ><?php echo $out_cod ?></textarea>

		</div>
		<?php
	}
}
add_action( 'add_meta_boxes', 'ads_main_meta_box_function' );

function save_text_ads_meta() {

	global $post;

	if( isset($_POST['post_type']) && ($_POST['post_type'] == "text_ads") ) {

		if( isset($_POST['text_ads-link']) && $_POST['text_ads-link'] != get_post_meta($post->ID, 'text_ads-link', true)) {
				$save_text_ads_link = sanitize_text_field($_POST['text_ads-link']);
				update_post_meta($post->ID, 'text_ads-link',$save_text_ads_link );

		}

		if( isset($_POST['text_ads-des']) && $_POST['text_ads-des'] != get_post_meta($post->ID, 'text_ads-des', true)) {
			$save_text_ads_des = sanitize_text_field($_POST['text_ads-des']);
			update_post_meta($post->ID, 'text_ads-des',$save_text_ads_des );

		}

		if( isset($_POST['text_url']) && $_POST['text_url'] != get_post_meta($post->ID, 'text_url', true)) {

			$save_text_url = sanitize_text_field($_POST['text_url']);
			update_post_meta($post->ID, 'text_url',$save_text_url);

		}

		if( isset($_POST['rangha']) && $_POST['rangha'] != get_post_meta($post->ID, 'rangha', true)) {

			$save_rangha = sanitize_text_field($_POST['rangha']);
			update_post_meta($post->ID, 'rangha',$save_rangha);

		}

		if( isset($_POST['link_rel']) && $_POST['link_rel'] != get_post_meta($post->ID, 'link_rel', true)) {

			$save_link_rel = sanitize_text_field($_POST['link_rel']);
			update_post_meta($post->ID, 'link_rel',$save_link_rel);

		}

		if( isset($_POST['link_target']) && $_POST['link_target'] != get_post_meta($post->ID, 'link_target', true)) {

			$save_link_target = sanitize_text_field($_POST['link_target']);
			update_post_meta($post->ID, 'link_target',$save_link_target);

		}

		if( isset($_POST['cus_contact']) && $_POST['cus_contact'] != get_post_meta($post->ID, 'cus_contact', true)) {

			$save_cus_contact = sanitize_text_field($_POST['cus_contact']);
			update_post_meta($post->ID, 'cus_contact',$save_cus_contact);

		}

		if( isset($_POST['status_value']) && $_POST['status_value'] != get_post_meta($post->ID, 'status_value', true)) {

			$save_status_value = sanitize_text_field($_POST['status_value']);
			update_post_meta($post->ID, 'status_value',$save_status_value);

		}

    }

}
add_action('save_post', 'save_text_ads_meta');
?>
