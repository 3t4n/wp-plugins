<?php
/*
Plugin Name: ComicPress To Comic Easel
Plugin URI: http://frumph.net/plugins
Version: 1.8
Author: Philip M. Hofer (Frumph)
Author URI: http://frumph.net
Description: A bulk conversion utility that converts ComicPress post categories to Comic Easel custom post types.
License: GPL3
Copyright 2012 Philip M. Hofer (Frumph)  (email : philip@frumph.net)
*/

require_once(ABSPATH . 'wp-admin/includes/image.php');

if( !class_exists( 'WP_Http' ) )
	include_once( ABSPATH . WPINC. '/class-http.php' );

function cp2ce_clean_filename($filename) {
	return str_replace("%2F", "/", rawurlencode($filename));
}

function cp2ce_revert_filename($filename) {
	return rawurldecode($filename);
}

function cp2ce_get_plugin_path() {
	return PLUGINDIR . '/' . preg_replace('#^.*/([^\/]*)#', '\\1', dirname(plugin_basename(__FILE__)));
}

function cp2ce_pluginfo($whichinfo = null) {
	global $cp2ce_pluginfo;
	if (empty($cp2ce_pluginfo) || $whichinfo == 'reset') {
		// Important to assign pluginfo as an array to begin with.
		$cp2ce_pluginfo = array();
		$cp2ce_coreinfo = wp_upload_dir();
		$cp2ce_addinfo = array(
				// if wp_upload_dir reports an error, capture it
				'error' => $cp2ce_coreinfo['error'],
				'siteurl' => get_option('siteurl'),
				// upload_path-url
				'base_url' => $cp2ce_coreinfo['baseurl'],
				'base_path' => $cp2ce_coreinfo['basedir'],
				// Parent theme
				'theme_url' => get_template_directory_uri(),
				'theme_path' => get_template_directory(),
				// Child Theme (or parent if no child)
				'style_url' => get_stylesheet_directory_uri(),
				'style_path' => get_stylesheet_directory(),
				// comic-easel plugin directory/url
				'plugin_url' => plugin_dir_url(dirname (__FILE__)) . 'cp2ce',
				'plugin_path' => trailingslashit(ABSPATH) . cp2ce_get_plugin_path(),
				'comics_url' => $cp2ce_coreinfo['baseurl'].'/comics/',
				'comics_path' => $cp2ce_coreinfo['basedir'].'/comics/'
				);
		// Combine em.
		$cp2ce_pluginfo = array_merge($cp2ce_pluginfo, $cp2ce_addinfo);
		$cp2ce_themeinfo = array();
		if (!is_multisite()) {
			$cp2ce_themeinfo['comics_path'] = trailingslashit(ABSPATH).'comics/';
			$cp2ce_themeinfo['comics_url'] = trailingslashit($cp2ce_pluginfo['siteurl']).'comics/';
		}
		$cp2ce_pluginfo = array_merge($cp2ce_pluginfo, $cp2ce_themeinfo);
	}
	if ($whichinfo && isset($cp2ce_pluginfo[$whichinfo])) return $cp2ce_pluginfo[$whichinfo];
	return $cp2ce_pluginfo;
}

/**
 * This functions is to display test information on the dashboard, instead of dumping it out to everyone.
 * This is so that a plugin doesn't generate errors on output of the var_dump() to the end user.
 */
function cp2ce_test_information($vartodump) { ?>
	<div class="error">
		<h2><?php _e('CP2CE - Test Information','cp2ce'); ?></h2>
		<?php 
			var_dump($vartodump);
		?>
	</div>
<?php }

add_action('admin_menu', 'cp2ce_add_submenu');

function cp2ce_add_submenu() {
	$plugin_title = __('ComicPress to Comic Easel Migrator Plugin', 'cp2ce');
	$tools_title = __('CP2CE Migrator', 'cp2ce');
	$tools_hook = add_submenu_page('tools.php', $plugin_title . ' - ' . $tools_title, $tools_title, 'edit_theme_options', 'cp2ce', 'cp2ce_admin');
}

function cp2ce_admin() {
	global $wpdb, $wp_taxonomies, $wp_rewrite;
	if ( isset($_POST['_wpnonce']) && wp_verify_nonce($_POST['_wpnonce'], 'form-values') ) {
		if ('cp2ce_migrate' == $_REQUEST['action'] ) {
			// Our first value is either 0 or 1
			$migrate_from_category = esc_attr($_REQUEST['from_category']);
			$migrate_count = (int)esc_attr($_REQUEST['migrate_count']);
			$migrate_mask = esc_attr($_REQUEST['migrate_mask']);
			if (empty($migrate_count)) $migrate_count = 5;
			if (!empty($migrate_from_category)) {
				$migrate_to_chapter = get_cat_name( $migrate_from_category );
				echo 'Converting Category: '.$migrate_to_chapter.'<br />';
				$cp2_query = 'numberposts='.$migrate_count.'&post_status=any&post_type=post&cat='.$migrate_from_category;
				$cp2_items = get_posts($cp2_query);
				$cp2_count = 0;
				foreach ($cp2_items as $cp2_item) {
					$cp2_post_date = mysql2date($migrate_mask, $cp2_item->post_date);
					$filter_to_use = '{date}*.*';
					$filter_with_date = str_replace('{date}', $cp2_post_date, $filter_to_use);
					$mask_to_use = cp2ce_pluginfo('comics_path').$filter_with_date;
					// Check to see if this comic post has a comic associated with it before migrating.
					if (count($results = glob($mask_to_use)) > 0) {
						if ( !is_wp_error( $results ) ) {
							// If it DOES. -> THEN migrate the post.
							// Remove it from that category
							wp_set_object_terms( $cp2_item->ID, NULL, 'category' ); 
							// Set it into an identical chapter category
							wp_set_object_terms( $cp2_item->ID, $migrate_to_chapter, 'chapters', false );
							$update['ID'] = $cp2_item->ID;
							$update['post_type'] = 'comic';
							$converted = wp_update_post( $update );
							if ($converted) {
								$cp2_count++;
								echo $cp2_count.'. "<strong>'.$cp2_item->post_title.'</strong>" ('.$cp2_item->ID.')<br />';
								$filename = $results[0];
								$filename = cp2ce_clean_filename(basename($filename));
								$filename_stored = cp2ce_revert_filename(basename($filename));
								echo '<strong>Found comic</strong>: '.$filename.'<br />';
								$fileurl = cp2ce_pluginfo('comics_url').basename($filename);
								$comic = new WP_Http();
								$comic = $comic->request( $fileurl );
								$attachment = wp_upload_bits( $filename_stored, null, $comic['body'], date("Y-m", strtotime( $comic['headers']['last-modified'] ) ) );
								if (!is_wp_error($attachment)) {
									$filetype = wp_check_filetype( basename( $attachment['file'] ), null );
									$postinfo = array(
										'guid' => $attachment['file'],
										'post_mime_type'	=> $filetype['type'],
										'post_title'		=> 'comic-'.$filename_stored,
										'post_content'		=> '',
										'post_status'		=> 'inherit',
									);
									$attached_filename = $attachment['file'];
									$attach_id = wp_insert_attachment( $postinfo, $attached_filename, $cp2_item->ID );
									$attach_data = wp_generate_attachment_metadata( $attach_id, $attached_filename );
									wp_update_attachment_metadata( $attach_id,  $attach_data );
									// set it as the post featured image
									add_post_meta($cp2_item->ID, '_thumbnail_id', $attach_id, true);
									set_post_thumbnail( $cp2_item->ID, $attach_id );
								} else {
									$error_string = $attachment->get_error_message();
									echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
								}
							}
						} else {
							$error_string = $results->get_error_message();
							echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
						}	
					} else {
						echo sprintf(__('Could not convert post ID #%s - %s', 'cp2ce'), $cp2_item->ID, $mask_to_use).' - No Comic Found to attach.<br />';
					}
				}
			}
		}
	}					
	if (empty($migrate_count)) $migrate_count = 5;
	if (!isset($migrate_mask) || empty($migrate_mask)) $migrate_mask = 'Y-m-d';
?>

<div class="wrap">
<h2><?php _e('ComicPress to Comic Easel Migrator','cp2ce'); ?></h2>
<form method="post" id="myForm" name="template">
<?php wp_nonce_field('form-values') ?>
<table class="widefat">
<thead>
	<tr>
	<th colspan="3"><?php _e('Migrate','cp2ce'); ?></th>
	</tr>
	<tr>
		<td style="width:300px;">
			<?php _e('Category to Migrate', 'cp2ce'); ?><br />
			<select name="from_category" class="from_category" style="width: 200px;"> 
<?php 
$args = array(
	'type'                     => 'post',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 0,
	'hierarchical'             => 1,
	'taxonomy'                 => 'category',
	'pad_counts'               => false );
			$categories=  get_categories($args); 
			foreach ($categories as $cat) {
				if ($cat->category_count > -1) {
					$option = '<option value="'.$cat->term_id.'"';
					if ($cat->cat_name == $migrate_to_chapter) $option .= 'SELECTED';
					$option .= '>';
					$option .= $cat->cat_name;
					$option .= ' ('.$cat->category_count.')';
					$option .= '</option>';
					echo $option;
				}
			}
?>
			</select>
		</td>
		<td>
			How many to migrate at a time?<br />
			<select name="migrate_count" class="migrate_count" style="width: 100px;">
				<option value="1" <?php selected( $migrate_count, 1 ); ?>>1</option>
				<option value="5" <?php selected( $migrate_count, 5 ); ?>>5</option>
				<option value="10" <?php selected( $migrate_count, 10 ); ?>>10</option>
				<option value="15" <?php selected( $migrate_count, 15 ); ?>>15</option>
				<option value="20" <?php selected( $migrate_count, 20 ); ?>>20</option>
				<option value="25" <?php selected( $migrate_count, 25 ); ?>>25</option>
				<option value="50" <?php selected( $migrate_count, 50 ); ?>>50</option>
				<option value="100" <?php selected( $migrate_count, 100 ); ?>>100</option>
			</select>
		</td>
		<td>
			<?php _e('Date Mask on comic filenames (default: Y-m-d)','cp2ce'); ?><br />
			<input name="migrate_mask" id="migrate_count" style="width: 100px;" value="<?php echo $migrate_mask; ?>" />
		</td>
	</tr>
</thead>
</table>
<?php if (post_type_exists( 'comic' )) { ?>
<p class="submit" style="margin-left: 10px;">
	<input type="submit" class="button-primary" value="<?php _e('Migrate!') ?>" />
	<input type="hidden" name="action" value="cp2ce_migrate" />
</p>
<?php } else { ?>
	<div class="cp2error" style="color: #f00;">
	<strong>You are not using a theme that uses the Comic post type, or you do not currently have it enabled (plugin or theme).</strong><br />
	Enable the correct theme, plugin or option in your theme then come back.<br />
	</div>
<?php } ?>
<br />
<table class="widefat">
<thead>
	<tr>
		<th colspan="3"><?php _e('Directions','cp2ce'); ?></th>
	</tr>
	<tr>
		<td>
		<ul>
		<ol>
		<li>Changes comic posts into the Comic post type.</li>
		<li>Imports the comics from the /comics directory to the uploads directory and creates thumbnails automagically.</li>
		</ol>
		</ul>
		</td>
	</tr>
	<tr>
		<td>
			CP2CE Takes a few things for granted.<br />
			<ul>
				<ol>
					<li>It assumes your comics directory is in <strong><?php echo cp2ce_pluginfo('comics_path'); ?></strong></li>
					<li>You only have 1 comic per post.  If you have multiple it will only take the first one you found and attach it as the featured image.</li>
				</ol>
			</ul>
		</td>
	</tr>
</thead>
</table>
<br />
<table class="widefat">
<thead>
	<tr>
		<th colspan="3"><?php _e('When you are done migrating everything.','cp2ce'); ?></th>
	</tr>
	<td>
	<ul>
	<ol>
	<li>Go to the wp-admin -> posts -> categories and delete those old POST categories so they do not clash with the new chapters that were created.</li>
	</ol>
	</ul>
	</td>
</thead>
</table>
<br />
<table class="widefat">
<thead>
	<tr>
	<th colspan="3"><?php _e('CP2CE - Debug Variables','cp2ce'); ?></th>
	</tr>
</thead>
<tr><td>error</td><td><?php echo cp2ce_pluginfo('error'); ?></td></tr>
<tr><td>base_url</td><td><?php echo cp2ce_pluginfo('base_url'); ?></td></tr>
<tr><td>base_path</td><td><?php echo cp2ce_pluginfo('base_path'); ?></td></tr>
<tr><td>theme_url</td><td><?php echo cp2ce_pluginfo('theme_url'); ?></td></tr>
<tr><td>theme_path</td><td><?php echo cp2ce_pluginfo('theme_path'); ?></td></tr>
<tr><td>style_url</td><td><?php echo cp2ce_pluginfo('style_url'); ?></td></tr>
<tr><td>style_path</td><td><?php echo cp2ce_pluginfo('style_path'); ?></td></tr>
<tr><td>plugin_url</td><td><?php echo cp2ce_pluginfo('plugin_url'); ?></td></tr>
<tr><td>plugin_path</td><td><?php echo cp2ce_pluginfo('plugin_path'); ?></td></tr>
<tr><td>comics_url</td><td><?php echo cp2ce_pluginfo('comics_url'); ?></td></tr>
<tr><td>comics_path</td><td><?php echo cp2ce_pluginfo('comics_path'); ?></td></tr>
</table>
</div> 
<?php }
