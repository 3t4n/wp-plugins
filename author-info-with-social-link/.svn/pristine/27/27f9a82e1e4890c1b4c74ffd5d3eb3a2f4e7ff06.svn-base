<?php
/*
Plugin Name: special premium author info with social link 
Plugin URI: https://wdrasel.com/
Description: Welcome To Wordpress plugin development.
Version: 0.1
Author: Rasel
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: wdrasel
*/

//don't call the file directly

if ( !defined('ABSPATH') ) exit;

if (is_admin()) {
	require_once dirname(__FILE__).'/includes/admin/profile.php';
}

function sai_author_bio($content){

	global $post ;

	$author = get_user_by('id', $post->post_author) ;

	$bio = get_user_meta($author->ID,'description',true);

	$twitter = get_user_meta($author->ID,'twitter',true);
	$facebook = get_user_meta($author->ID, 'facebook',true);
	$linkedin = get_user_meta($author->ID,'linkedin',true);

ob_start();
?>
<div class="wd-bio-wrap">
	<div class="avatar-image">
		<?php echo get_avatar($author->ID, 124); ?>
	</div>

<div class="wd-bio-content">
	<div class="author-name"><?php  echo  $author->display_name ?></div>

	<div class="wd-author-bio">
		<?php echo wpautop(wp_kses_post($bio))?>
	</div>

	<ul class="wd-social">
	
	<?php if ($twitter) { ?>
	<li><a href="<?php echo esc_url($twitter)?>"> <?php  _e('Twitter','wdrasel')?></a></li>
	<?php }?>
	
	<?php if ($facebook){?>	
	<li><a href="<?php echo esc_url($facebook) ?>"> <?php _e('Facebook','wdrasel');?></a></li>
	<?php }?>

	<?php if ($linkedin) {?>	
	<li><a href="<?php echo esc_url($linkedin)?>"> <?php _e('Linkedin','wdrasel');?></a></li>
	<?php }?>	
	</ul>
</div>
</div>

<?php

$bio_content = ob_get_clean();
	return $content.$bio_content;
}

add_filter('the_content','sai_author_bio');

function sai_script(){
	wp_enqueue_style('wd-style',plugins_url('assets/css/wd_style.css',__FILE__));
}

add_action('wp_enqueue_scripts','sai_script');
