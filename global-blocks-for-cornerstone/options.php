<?php

add_action( 'admin_menu', 'global_blocks_plugin_add_admin_menu' );
add_action( 'admin_init', 'global_blocks_plugin_settings_init' );


function global_blocks_plugin_add_admin_menu(  ) { 

	add_options_page( 'Global Blocks for Cornerstone and X Pro', 'Global Blocks for Cornerstone and X Pro', 'manage_options', 'global_blocks_for_cornerstone_and_x_pro', 'global_blocks_plugin_options_page' );

}


function global_blocks_plugin_settings_init(  ) { 

	register_setting( 'pluginPage', 'global_blocks_plugin_settings' );

	add_settings_section(
		'global_blocks_plugin_pluginPage_section', 
		__( 'Convert your Global Blocks', 'global-blocks-cornerstone' ), 
		'global_blocks_plugin_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'global_blocks_plugin_checkbox_field_0', 
		__( 'Check to confirm your choice', 'global-blocks-cornerstone' ), 
		'global_blocks_plugin_checkbox_field_0_render', 
		'pluginPage', 
		'global_blocks_plugin_pluginPage_section' 
	);


}


function global_blocks_plugin_checkbox_field_0_render(  ) { 

	$options = get_option( 'global_blocks_plugin_settings' );

	if($options['global_blocks_plugin_checkbox_field_0'] == 1):


		$posts = get_posts( array(
			'post_type' => 'global-blocks',
			'post_status' => 'any',
			'posts_per_page' => -1
		) );

		if(!empty($posts)){
			foreach ($posts as $post) {
				wp_update_post( array(
					'ID'          => $post->ID,
					'post_type'   => 'cs_global_block',
					'post_status' => 'tco-data'
				));
			}
		}

		?>
		<p>You have converted your Global Blocks already. THANK YOU to everyone for all your support over the years, and for the thousands of downloads of my tool. 
			I hope you checkout my new plugins <a href="https://wordpress.org/plugins/cornerstone-placeholder-images/#description" target="_blank">Cornerstone Placeholder Images</a> and <a href="https://wordpress.org/plugins/cornerstone-custom-icons/#description" target="_blank">Cornerstone Custom Icons</a></p>
		
		<p><h3>Looking for an easy way to swap all your classic Global Blocks shortcodes into new V2 Global Blocks shortcodes? Try this:</h3><br><br>
			<ul>
				<li>Backup your site. Install the plugin <strong>Better Search Replace</strong></li>
				<li>Select tables <strong>wp_posts, wp_postmeta</strong></li>
				<li>Do a DRY RUN and search for: <strong>global_block block</strong></li>
				<li>Replace with: <strong>cs_gb id</strong></li>
				<li>If the dry run worked, do a live run.</li>
				<li>Do a DRY RUN and search for: <strong>cs_global_blocks block</strong></li>
				<li>Replace with: <strong>cs_gb id</strong></li>
				<li>If the dry run worked, do a live run.</li>
				<li>Test, test, test. If anything broke, restore backup. If not, enjoy your new Global Blocks.</li>
			</ul>
		</p>
		<p><strong>You may now delete the Global Blocks plugin</strong></p>
	<?php else: ?>
		<input type='checkbox' name='global_blocks_plugin_settings[global_blocks_plugin_checkbox_field_0]' <?php checked( $options['global_blocks_plugin_checkbox_field_0'], 1 ); ?> value='1'>
		<?php

	endif;

}


function global_blocks_plugin_settings_section_callback(  ) { 

	echo __( 'This is a one way street, no going back. Make a backup first!', 'global-blocks-cornerstone' );

}


function global_blocks_plugin_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Global Blocks for Cornerstone and X Pro</h2>

		<p>This form will convert your Global Blocks into the Themeco Global Blocks manager. Check this box and hit submit. Be sure to backup your site first. Once completed, you will need to manually edit every page that has a global block, remove it, and insert a new Themeco Global Block (sorry!)

			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>

		</form>
		<?php

	}