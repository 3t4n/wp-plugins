<?php

// REGISTERING CUSTOM POST TYPES
function arastoo_cpt_create_main() {

	$arastoo_cpt_title = get_option('arastoo_cpt_title');
	$arastoo_cpt_title_two = get_option('arastoo_cpt_title_two');
	$arastoo_cpt_slug = get_option ('arastoo_cpt_slug');
	$arastoo_cpt_slug_two = get_option ('arastoo_cpt_slug_two');

		if (empty($arastoo_cpt_title)) {
			//do something if empty
			} else {
			//do something else if not empty
			register_post_type( $arastoo_cpt_title, // change the name
				array(
					'labels' => array(
						'name' => __( $arastoo_cpt_title ), // change the name
						'singular_name' => __( $arastoo_cpt_title ), // change the name
					),
					'public' => true,
					'supports' => array ( 'title', 'editor', 'custom-fields', 'page-attributes', 'thumbnail' ), // extra options
					//'taxonomies' => array( 'category', 'post_tag' ), //  categories and tags
					'hierarchical' => true,
					'menu_icon' => 'dashicons-admin-page',
					'rewrite' => array ( 'slug' => __( $arastoo_cpt_slug ) ) // change the name
				)
			);
			}

		if (empty($arastoo_cpt_title_two)) {
			//do something if empty
			} else {
			//do something else if not empty
			register_post_type( $arastoo_cpt_title_two, // change the name
				array(
					'labels' => array(
						'name' => __( $arastoo_cpt_title_two ), // change the name
						'singular_name' => __( $arastoo_cpt_title_two ), // change the name
					),
					'public' => true,
					'supports' => array ( 'title', 'editor', 'page-attributes', 'thumbnail' ), // extra options
					//'taxonomies' => array( 'category', 'post_tag' ), //  categories and tags
					'hierarchical' => true,
					'menu_icon' => 'dashicons-admin-page',
					'rewrite' => array ( 'slug' => __( $arastoo_cpt_slug_two ) ) // change the name
				)
			);
			}
}

function arastoo_cpt_group_settings() {
 
	register_setting('arastoo_cpt_options_group', 'arastoo_cpt_title');
 	register_setting('arastoo_cpt_options_group', 'arastoo_cpt_slug');
	register_setting ('arastoo_cpt_options_group', 'arastoo_cpt_title_two');
	register_setting ('arastoo_cpt_options_group', 'arastoo_cpt_slug_two');
 
}

function arastoo_cpt_options() {
 
	add_options_page(
		'Arastoo CPT', // page <title>Title</title>
		'Arastoo CPT', // menu link text
		'manage_options', // capability to access the page
		'arastoo-cpt', // page URL slug
		'arastoo_cpt_options_content', // callback function with content
		2 // priority
	);
 
}

function arastoo_cpt_options_content() { ?>
 
<div class="wrap">
        <h2>Arastoo CPT</h2>
        <form method="post" action="options.php">
            <?php settings_fields('arastoo_cpt_options_group'); ?>
 
        <table class="form-table">
 
            <tr>
                <th><label for="arastoo_cpt_title_id">CPT Title:</label></th>
 
                <td>
<input type = "text" class="regular-text" id="arastoo_cpt_title_id" name="arastoo_cpt_title" value="<?php echo get_option('arastoo_cpt_title'); ?>"> <button type="button" onclick="ClearCPTtitle1();">Clear</button> <em id="alert-one" style="color:#F00;"></em>
                </td>
            </tr>
 
            <tr>
                <th><label for="arastoo_cpt_slug_id">CPT Slug:</label></th>
                <td>
<input type = "text" class="regular-text" id="arastoo_cpt_slug_id" name="arastoo_cpt_slug" value="<?php echo get_option('arastoo_cpt_slug'); ?>">
                </td>
            </tr>
 
            <tr>
                <th><label for="arastoo_cpt_title_two_id">CPT Title 2:</label></th>
   <td>
<input type = "text" class="regular-text" id="arastoo_cpt_title_two_id" name="arastoo_cpt_title_two" value="<?php echo get_option('arastoo_cpt_title_two'); ?>"> <button type="button" onclick="ClearCPTtitle2();">Clear</button> <em id="alert-two" style="color:#F00;"></em>
                </td>
            </tr>
            <tr>
                <th><label for="arastoo_cpt_slug_two_id">CPT Slug 2:</label></th>
                <td>
<input type = "text" class="regular-text" id="arastoo_cpt_slug_two_id" name="arastoo_cpt_slug_two" value="<?php echo get_option('arastoo_cpt_slug_two'); ?>">
                </td>
            </tr>
        </table>
 <div><em><strong style="color:#F00;">IMPORTANT:</strong> Update permalink structure after clicking on the Save Changes button.</em> Go to Settings > <a href="<?php echo admin_url( 'options-permalink.php' ); ?>">Permalinks</a></div>
        <?php submit_button(); ?>
    </form>
    </div>
	<div>


	</div>

<?php } 

function arastoo_load_my_scripts() {
	wp_enqueue_script( 'cpt_script', plugin_dir_url( __FILE__ ) . 'assets/cpt-script.js', array(), '1.0.0' );
}

add_filter( 'plugin_action_links_arastoo-cpt/arastoo-cpt.php', 'arastoocpt_settings_link' );
function arastoocpt_settings_link( $links ) {
	// Build and escape the URL.
	$url = esc_url( add_query_arg(
		'page',
		'arastoo-cpt',
		get_admin_url() . 'options-general.php'
	) );
	// Create the link.
	$settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
	// Adds the link to the end of the array.
	array_push(
		$links,
		$settings_link
	);
	return $links;
}//end arastocpt_settings_link()

?>