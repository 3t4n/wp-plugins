<?php

add_action('admin_menu', 'ls_admin_menu');
add_action('admin_enqueue_scripts', 'ls_add_script');

/**
 *  It enqueues the js files for the plugins settings page.
 *
 *  @return    void
 *  @var	No arguments passed
 *  @author    HG
  
 */

function ls_add_script()
{
	global $ls_plugin_version;

	if (!wp_script_is('jquery')) {
		wp_enqueue_script('jquery');
	}

	wp_enqueue_script('shortcode_js', ls_sub_pages::ls_get_plugin_dir_url() . '/js/jquery_create_shortocode.js', array('jquery'), $ls_plugin_version);
	wp_enqueue_style('list-sp-admin-notices-css', ls_sub_pages::ls_get_plugin_dir_url() . '/css/list-sp-admin-notices.css');

}

/**
 *  It is used to add the option page for the plugin page.
 *
 *  @return     void
 *  @var	No arguments passed
 *  @author     HG
  
 */
function ls_admin_menu()
{
	add_options_page('List Sub Pages', 'List Sub Pages', 'manage_options', 'sub-page', 'ls_options_page');
}

/**
 *  It is used to render the form for the settings page.
 *
 *  @return     form
 *  @var	No arguments passed
 *  @author     HG

 */
function ls_options_page()
{

	//$result='0';

	?>
	<div class="wrap-list-sp">
		<div class="inner-list-sp">
			<div class="left-box-list-sp">

				<h2>
					<?php _e('Sub Page Plugin Options', 'subpage'); ?>
				</h2>
				<form class="column-wrap" action="" method="POST">
					<div class="col-50">
						<h4>
							<?php _e('Select the subpage dislaying options if subpage exists for that particular parent page.', 'subpage'); ?>
						</h4>

						<table class="form-table">
							<tbody>

								<tr valign="top">
									<th scope="row">
										<?php _e('Title', 'subpage'); ?>
									</th>
									<!-- Title Field -->
									<td>
										<?php
										echo "<input id='title' type='text' name='title' value='Pages' />"; ?>
									</td>
								</tr>

								<!-- <tr valign="top"> -->
								<!-- <th scope="row"><?php _e('Sort Order', 'subpage'); ?></th> -->

								<!-- Sort Order Field -->
								<!-- <td>
								
			
					<select id='child_sort_order' name="child_sort_order"  tabindex="1"> -->
								<?php
								/*
											$order_options = array(
														'ASC'=>__('Ascending','subpage'), 
														'DESC'=>__('Descending','subpage')
														);
										foreach ($order_options as $option_key=>$option_value ) { ?>
											<option
												value="<?php echo esc_attr($option_key); ?>"><?php echo __($option_value,'subpage'); ?>
											</option>
											<?php }
											*/
								?>
								<!-- </select>
							</td>
							</tr> -->

							</tbody>
						</table>

						<h3>
							<?php _e('Parent Pages Display Options', 'subpage'); ?>
						</h3>
						<h4>
							<?php _e('Select the options to add effect in the parent pages display when subpages are not available to display.', 'subpage'); ?>
						</h4>

						<table class="form-table">
							<tbody>
								<tr valign="top">
									<th scope="row">
										<?php _e('Sorting Criteria:', 'subpage'); ?>
									</th>

									<!-- Sorting Criteria Field -->
									<td>
										<select id='sorting_criteria' name="sorting_criteria[]" size="7" multiple="multiple"
											tabindex="1">
											<?php
											$options = array(
												'ID' => __('Page ID', 'subpage'),
												'post_title' => __('Page Title', 'subpage'),
												'menu_order' => __('Menu Order', 'subpage'),
												'post_date' => __('Date Created', 'subpage'),
												'post_modified' => __('Date Modified', 'subpage'),
												'post_author' => __('Page Author', 'subpage'),
												'post_name' => __('Post Slug', 'subpage')
											);

											foreach ($options as $key => $value) { ?>
												<option value="<?php echo $key; ?>"<?php selected('post_title', $key); ?>>
													<?php echo __($value, 'subpage'); ?>
												</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr valign="top">
									<th scope="row">
										<?php _e('Exclude Pages', 'subpage'); ?>
									</th>

									<!-- Exclude Pages Field -->
									<td>
										<select id='exclude_page' name="exclude_page[]" size="6" multiple="multiple" tabindex="1">

											<?php

											$pages = get_pages();
											foreach ($pages as $page) {
												?>
												<option value="<?php echo esc_attr($page->ID); ?>">
													<?php echo __("$page->post_title"); ?>
												</option>
											<?php } ?>
										</select>
									</td>

								<tr valign="top">
									<th scope="row">
										<?php _e('Depth Level', 'subpage'); ?>
									</th>

									<!-- Depth Level Field -->
									<td>
										<select id='depth_level' name="depth_level" tabindex="1">
											<?php
											$depth_options = array(
												'1' => __('1st Level Depth', 'subpage'),
												'2' => __('2nd Level Depth', 'subpage'),
												'3' => __('3rd Level Depth', 'subpage'),
												'4' => __('4th Level Depth', 'subpage'),
												'0' => __('Unlimited Depth', 'subpage')
											);
											foreach ($depth_options as $depth_number => $depth_label) { ?>
												<option value="<?php echo $depth_number; ?>">
													<?php echo __($depth_label, 'subpage'); ?>
												</option>
											<?php } ?>
										</select>
									</td>

								<tr valign="top">
									<th scope="row">
										<?php _e('Parent Sort Order', 'subpage'); ?>
									</th>
									<!-- Parent Sort Order Field -->
									<td>
										<select id='parent_sort_order' name="parent_sort_order" tabindex="1">
											<?php
											$order_options = array(
												'ASC' => __('Ascending', 'subpage'),
												'DESC' => __('Descending', 'subpage')
											);
											foreach ($order_options as $option_key => $option_value) { ?>
												<option value="<?php echo esc_attr($option_key); ?>">
													<?php echo __($option_value, 'subpage'); ?>
												</option>
											<?php } ?>
										</select>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-50">
						<div class="">
							<h3>
								<?php _e('Dynamic Shortcode', 'subpage'); ?>
							</h3>
							<h4>
								<?php _e('Please Copy This Shortcode and paste where you want to display subpages or parent pages.', 'subpage'); ?>
							</h4>
							<table class="form-table">
								<tbody>
									<tr valign="top">
										<th scope="row">
											<?php _e('Dynamic Shortcode:', 'subpage'); ?>
										</th>
										<td>
											<?php echo '<div id= "shortcode"></div>'; ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</div>
			<div class="right-box-list-sp">
				<?php lsp_general_section_callback(); ?>
			</div>
		</div>
	</div>
	<?php
	add_filter('admin_footer_text', 'lsp_admin_footer');
}

/**
 *  It is used to render the output when the shortcode is called.	 
 *
 *  @return             ARRAY
 *  @var				$atts datatype is ARRAY
 *  @author             HG

 */
function ls_shortcode($atts)
{
	global $post;
	extract(shortcode_atts(
		array(
			'title' => '',
			'sort_order' => '',
			'sort_by_values' => '',
			'exclude_page_id' => '',
			'depth' => '',
			'sort_order_parent' => '',
		), $atts));


	$title = empty($title) ? 'Pages' : $title;

	$sort_order = empty($sort_order) ? 'ASC' : $sort_order;

	$sort_by_values = empty($sort_by_values) ? 'post_title ' : $sort_by_values;

	$exclude_page_id = empty($exclude_page_id) ? ' ' : $exclude_page_id;

	$depth = trim($depth) == '' ? '1' : $depth;

	$sort_order_parent = empty($sort_order_parent) ? 'ASC' : $sort_order_parent;

	$ls_str = '';
	$ls_str .= '<div class="ls_container">';
	$ls_str .= '<h3 class="widget_title">' . $title . '</h3>';

	// WIDGET CODE GOES HERE

	$page_id = !empty($post->ID) ? $post->ID : '';

	$args = array(
		'order' => $sort_order,
		'post_parent' => $page_id,
		'post_status' => 'publish',
		'post_type' => 'page',
	);

	$attachments = get_children($args);

	$ls_str .= '<ul class="ls_page_list">';
	if ($attachments) {
		foreach ($attachments as $attachment) {
			$ls_str .= '<li><a href="' . $attachment->guid . '">' . $attachment->post_title . '</a></li>';
		}
	} else {
		$args = array(
			'depth' => $depth,
			'title_li' => '',
			'echo' => 0,
			'sort_order' => $sort_order_parent,
			'sort_column' => $sort_by_values,
			'post_type' => 'page',
			'post_status' => 'publish',
			'exclude' => $exclude_page_id,
		);
		$pages = wp_list_pages($args);

		$ls_str .= $pages;
	}

	$ls_str .= '</ul>';
	$ls_str .= '</div>';

	return $ls_str;
}

// General section callback function.
function lsp_general_section_callback()
{

	?>
	<div class="list-sp-plugin-cta">
		<h2 class="head">Thank you for downloading our plugin - List SubPages.</h2>
		<h2 class="head">We're here to help !</h2>
		<p>Our plugin comes with free, basic support for all users. We also provide plugin customization in case you want to
			customize our plugin to suit your needs.</p>
		<a href="https://www.weblineindia.com/contact-us.html?utm_source=WP-Plugin&utm_medium=List%20Sub%20Pages&utm_campaign=Free%20Support"
			target="_blank" class="button">Need help?</a>
		<a href="https://www.weblineindia.com/contact-us.html?utm_source=WP-Plugin&utm_medium=List%20Sub%20Pages&utm_campaign=Plugin%20Customization"
			target="_blank" class="button">Want to customize plugin?</a>
	</div>
	<?php
	$all_plugins = get_plugins();
	if (!(isset($all_plugins['xml-sitemap-for-google/xml-sitemap-for-google.php']))) {
		?>
			<div class="list-sp-plugin-cta show-other-plugin" id="xml-plugin-banner">
				<h2 class="head">Want to Rank Higher on Google?</h2>
				<h3 class="head">Install <span>XML Sitemap for Google</span> Plugin</h3>
				<hr>
				<p>Our plugin comes with free, basic support for all users.</p>
				<ul class="custom-bullet">
					<li>Easy Setup and Effortless Integration</li>	
					<li>Automatic Updates</li>	
					<li>Improve Search Rankings</li>	
					<li>SEO Best Practices</li>
					<li>Optimized for Performance</li>
				</ul>						
				<br>
				<button id="open-install-lsp" class="button-install">Install Plugin</button>
			</div>
		<?php 
	}	
}

// Callback section on Admin Footer
function lsp_admin_footer($footer_text)
{
	$url = 'https://wordpress.org/support/plugin/list-sub-pages/reviews/?filter=5#new-post';
	$wpdev_url = 'https://www.weblineindia.com/wordpress-development.html?utm_source=WP-Plugin&utm_medium=List%20Sub%20Pages&utm_campaign=Footer%20CTA';
	$text = sprintf(
		wp_kses(
			'Please rate our plugin %1$s <a href="%2$s" target="_blank" rel="noopener noreferrer">&#9733;&#9733;&#9733;&#9733;&#9733;</a> on <a href="%3$s" target="_blank" rel="noopener">WordPress.org</a> to help us spread the word. Thank you from the <a href="%4$s" target="_blank" rel="noopener noreferrer">WordPress development</a> team at WeblineIndia.',
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
					'rel' => array(),
				),
			)
		),
		'<strong>"List Sub Pages"</strong>',
		$url,
		$url,
		$wpdev_url
	);
	return $text;
}


?>