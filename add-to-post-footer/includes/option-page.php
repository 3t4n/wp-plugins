<div id="content-box">
	<header class="row">
		<span class="column column-2">
			<img src="<?php echo ATPF_IMAGES_URL.'add-to-post-footer-logo.jpg'; ?>" title="Add To Post Footer Logo" alt="Add To Post Footer Logo" width="100" />
		</span>
		<h1 class="column column-6 to-center"><?php echo ATPF_PLUGIN_NAME; ?></h1>
		<h3 class="column column-4"><?php echo ATPF_PLUGIN_VERSION; ?></h3>
		<p class="column column-8 to-justify"><?php echo __( 'With ', 'add-to-post-footer').ATPF_PLUGIN_NAME.__(' you can add some content at the final of all your posts without care about forget some of them, or the need to copy and paste boring proccess. Just go to Posts >> ', 'add-to-post-footer').ATPF_PLUGIN_NAME.__(', insert the content and save it. The proccess is the same to change the content. You just have to care about other stuff of your site/blog now', 'add-to-post-footer'); ?>
		</p>
	</header>
	<section class="row">
		<form method="post">
			<div class="column column-8" id="poststuff">
		    	<?php
		    		if( isset( $_POST['post_footer'] ) ){
		    			atpf_update_footer_text( stripslashes( wp_filter_post_kses( addslashes( $_POST['post_footer'] ) ) ) );
		    		}
		    		$text = atpf_select_text();

		    		$settings = array(
		    			'textarea_name' => 'post_footer',
		    			'textarea_rows' => 5
		    		);
		    		wp_editor( $text ,'content',$settings);
		    	?>
			</div>
			<div class="column column-4">
				<input type="submit" value="<?php _e( 'Save', 'add-to-post-footer' ); ?>" />
			</div>
		</form>
	</section>
	<footer class="row">
		<p class="column column-8">
			<?php echo __( 'This plugin was developed by', 'add-to-post-footer' ).' <a href="http://portfolio.novoaprendizado.com.br" target="_blank">Enrique René</a><br/>'.__( 'Feel free to get in touch to point out some errors or suggest some changes.','add-to-post-footer' ); ?>
		</p>
		<span class="column column-4">&nbsp;</span>
	</footer>
</div>