<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<div id="backup_warning"><?php esc_html_e('Be sure to backup your database before use this plugin!', 'search-replace'); ?></div>

<form action="" method="post" id="search-and-replace-free">

	<?php wp_nonce_field( 'search_replace' ) ?>

	<label for="s"><?php esc_html_e('Search:', 'search-replace'); ?></label><input type="text" name="s" id="s" /><br />

	<label for="r"><?php esc_html_e('Replace by:', 'search-replace'); ?></label><input type="text" name="r" id="r" /> <?php esc_html_e('(replace both title and content)', 'search-replace'); ?><br />

	<div>

		<label for="in"><?php esc_html_e('In:', 'search-replace'); ?></label>

		<input type="checkbox" value="post" name="post" /> <?php esc_html_e('Posts', 'search-replace'); ?> 

		<input type="checkbox" value="page" name="page" /> <?php esc_html_e('Pages', 'search-replace'); ?>

	</div>

	<input type="submit" class="button button-primary" value="<?php esc_html_e('Go!', 'search-replace'); ?>" />

</form>



<p>

	<a href="https://www.info-d-74.com/en/produit/search-and-replace-pro-plugin-wordpress-2/" target="_blank">

		<?php esc_html_e('Need more options? Look at Search and Replace Pro', 'search-replace'); ?></a><br />

	<a href="https://www.info-d-74.com/en/produit/search-and-replace-pro-plugin-wordpress-2/" target="_blank">

		<img src="<?php echo esc_url(plugins_url( 'search-replace/images/search-and-replace-pro.png' )); ?>" class="srp_img" />

	</a>

</p>



<script>



	jQuery(document).ready(function(){



		jQuery('#search-and-replace-free input[type=submit]').click(function(){



			return confirm('<?php esc_html_e('Are you sure to do that?', 'search-replace'); ?>');



		});



	});



</script>