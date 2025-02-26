<?php
/*
Plugin Name: Amazon Context Links Ads
Version: 1.0
Plugin URI: http://patrick.bloggles.info/
Description: Add Amazon context link ads to your blog.
Author: Patrick Chia
Author URI: http://shopping.doogate.com/
*/

function amazon_context_admin_menu() {
	add_submenu_page('themes.php', 'Amazon Ads', 'Amazon Ads', 8, 'amazon_context', 'amazon_context_admin');
}

function amazon_context_ads() {
	$amazon_context = get_option('amazon_context');

	if ($amazon_context) {
		echo '<!--author: http://shopping.doogate.com/-->
			<script type="text/javascript">
			<!--
			amzn_cl_tag="'.$amazon_context.'";
			//--></script>
			<script type="text/javascript" src="http://cls.assoc-amazon.com/s/cls.js"></script>';
	} else {
		echo '<!--author: http://shopping.doogate.com/-->
			<script type="text/javascript">
			<!--
			amzn_cl_tag="vorspielsearc-20";
			//--></script>
			<script type="text/javascript" src="http://cls.assoc-amazon.com/s/cls.js"></script>';
	}
}

function amazon_context_admin() {
	$amazon_context = get_option('amazon_context');

	if ( $_POST['updatingextras'] ) {
		if ( $_POST['amazon_context'] ){
			update_option('amazon_context', $_POST['amazon_context']);
		}

		echo '<div id="message" class="updated fade"><p>Amazon ID added successfully.</p></div>';
	}

?>
<div class="wrap">
<h2><?php _e('Amazon Ads')?></h2>
<p>Context Links are a quick and convenient way to add links to blog and help you monetize your content. Context Links automatically identify and link relevant phrases within your blog content to Amazon products.</p>
<p><?php _e('Just add your amazon Associates ID (eg. vorspielsearc-20) to enable context ads to your blog')?></p>

<form action="" method="post">
<p><label><input name="amazon_context" value="<?php echo $amazon_context; ?>" /></label></p>
<p class="submit">
	<input value="Submit &raquo;" type="submit" />
	<input name="updatingextras" value="true" type="hidden" /></p>
</form>
<p>No ID? Get one from <a href="http://affiliate-program.amazon.com/join?tag=vorspielsearc-20">Amazon Associates ID</a></p>
<p>Author: <a href="http://patrick.bloggles.info/">Patrick Chia</a></p>
</div>
<?php
}

add_action('admin_menu', 'amazon_context_admin_menu');
add_action('wp_footer', 'amazon_context_ads');

?>