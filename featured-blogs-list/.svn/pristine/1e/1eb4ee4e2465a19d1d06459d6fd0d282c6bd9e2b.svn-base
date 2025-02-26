<?php
/*
Plugin Name: Featured blogs
Plugin URI: none
Description: Display specific/multiple blogs list in wordpress as featured blogs.
Version: 1.1
Author: Mamoun.othman
Author URI: none
*/
/*  Copyright 2009-2010  Mamoun.othman  (email : mamoun@hellospring.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//get blogs id
function get_blog_ids($formated=false,$start=0,$post_per_page=9) {
	global $wpdb;
	$blog_ids_sql = "SELECT blog_id FROM {$wpdb->blogs}";
	if($start && $post_per_page) {
		$blog_ids_sql.=" LIMIT $start,$post_per_page";
	}
	$blog_ids = $wpdb->get_results($wpdb->prepare($blog_ids_sql));
	if($formated) {
		$ids = array();
		foreach ($blog_ids as $id ) {
			$ids[] = $id->blog_id;
		}
		return $ids;
	}
	return $blog_ids;
}

function featuredBlogsList() {
	global $wpdb, $blogs_settings;
	
	$blogs_id = $blogs_settings;
	
	if ($blogs_id) {
		
		$blogs_idarray = explode ( ',', $blogs_id );?>
		<?php if(get_option('featured_blog_css')):?>
				<link rel="stylesheet" type="text/css" href="/wp-content/plugins/featured-blogs-list/output_style.css" media="screen" />
		<?php endif;
		$counter=1;
		foreach ( $blogs_idarray as $blog_id ) {
			
			if(!in_array($blog_id,get_blog_ids(true))) {
				continue;
			}
			
			$blog_info = get_blog_details( $blog_id );
			
			$details_count = $wpdb->get_results($wpdb->prepare("SELECT $wpdb->users.ID AS user_id,$wpdb->users.user_nicename,count(*) AS post_count FROM $wpdb->users JOIN wp_".$blog_id."_posts ON $wpdb->users.ID = wp_".$blog_id."_posts.post_author WHERE (wp_".$blog_id."_posts.post_status = 'publish' AND wp_".$blog_id."_posts.post_type='post') GROUP BY $wpdb->users.user_nicename"));
			
			$count =0;
			
			foreach ($details_count as $detail) {
				$count+=$detail->post_count;
			}
			$details = $wpdb->get_row( $wpdb->prepare("SELECT $wpdb->users.ID AS user_id,$wpdb->users.user_nicename,count(*) AS post_count FROM $wpdb->users JOIN wp_".$blog_id."_posts ON $wpdb->users.ID = wp_".$blog_id."_posts.post_author WHERE (wp_".$blog_id."_posts.post_status = 'publish' AND wp_".$blog_id."_posts.post_type='post') GROUP BY $wpdb->users.user_nicename"));
			
			$avatar = get_avatar ( $details->user_id, 50 );
			?>
			<div class="featured_blog_item">
				<div class='avatar'><?php print $avatar ?></div>
				<div class='blog_info'>
					<div><a class="blog_title" href="<?php print get_blog_option($blog_id,'siteurl') ?>"><?php  print ucfirst(get_blog_option ($blog_id, 'blogname')); ?> </a></div>
					<div class="blog_owner"> <?php  print $details->user_nicename ?> </div>
					<?php $last_update = strtotime($blog_info->last_updated); ?>
					<div class="blog_owner latest_update">Latest update : <?php print date('d.m.y',$last_update) ?> | <?php if($details->post_count): ?> (<?php print $count ?> )  Post</div> <?php  else : ?> (0) Post</div>	<?php endif;?>
				</div>
				<div class='clear'></div>
			</div>
			<?php
		}
	}
}

$data = array ('blogs_id'=>'');
$ol_flash = '';
$blogs_settings = get_option('blogs_settings');

function blogs_add_pages() {
	add_options_page ( 'Featured Blogs List', 'Featured Blogs', 8, 'blogsoptions', 'blogs_options_page' );
}

function blogs_options_page() {
	global $ol_flash, $_POST, $blogs_settings, $wp_rewrite, $wpdb;
	if (isset ( $_POST ['blogs_id'] )) {
		$blogs_settings ="";
		
		foreach ($_POST['blogs_id'] as $key=>$val) {
			$blogs_settings.= $val.",";
		}
		
		$blogs_settings = substr($blogs_settings,0,-1);		
		update_option('blogs_settings',$blogs_settings);
		
		if(isset($_POST['featured_blog_css']) && $_POST['featured_blog_css']!='') {
			update_option('featured_blog_css',true);
		} else {
			update_option('featured_blog_css',false);
		}
		
		$ol_flash = "Your Featured List has been saved.";
	}
	
	if ($ol_flash != '') {
		echo '<div id="message"class="updated fade"><p>' . $ol_flash . '</p></div>';
	}
		
	$blogs = get_blog_ids();
	
	$blog_ids = explode(',',get_option('blogs_settings'));
	
	$post_per_page = 5;
	$total =count($blogs);
	
	$total_page = ceil($total/$post_per_page);
	?>
	<div class="wrap">
		<h2>Click on checkbox to create Featured Blogs List</h2>
		<h4 class="updated"><span>Note</span>: you can use this plugin by put this code where erver you want in your template ( featuredBlogsList() ) .</h4><br />
		<form action="" method="post">
			<strong>This plugin gives full freedom to display multiple blogs as Featured Blogs List on your site.</strong>
			<?php for($i=0;$i<$total_page;$i++) : ?>
				<div class='virtualpage'>
				<?php $start = $post_per_page * $i;
					$blogs = $wpdb->get_results( $wpdb->prepare ( "SELECT blog_id FROM $wpdb->blogs LIMIT $start,$post_per_page" ));
				?>
				<table id='active-plugins-table' class='widefat' cellspacing='0'>
				<thead><tr><th class='col'></th><th>Blog title</th><th>Last updated</th><th>Post count</th></tr></thead>
					<tbody class='plugins'>
						<?php  foreach ( $blogs as $blog ) : ?>
						<tr>
							<?php if(!in_array($blog->blog_id,$blog_ids)): ?>
								<td><input type="checkbox" name="blogs_id[]" value="<?php print $blog->blog_id ?>" /></td>
							<?php else :?>
								<td><input type="checkbox" name="blogs_id[]" value="<?php print $blog->blog_id; ?>" checked /></td>
							<?php endif;?>
							<?php  $blog_info = get_blog_details($blog->blog_id);?>
							<td><?php print  get_blog_option ( $blog->blog_id, 'blogname' ) ?></td>
							<td><?php print  $blog_info->last_updated ?></td>
							<td><?php print  $blog_info->post_count ?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
				</div>
			<?php endfor;?><br /><br /><br />
			<input type="checkbox" name="featured_blog_css" value="1" class="css_inlcude" <?php (get_option('featured_blog_css')? print 'checked': print '')?> /><label class="label_css">Include default css for html output. </label><br />
			<br />
			<!--<input type="checkbox" name="display_post" value="1" class="css_inlcude" /><label class="label_css">Display post instead of default output.</label><br />-->
			<div class="submit"><input type="submit" value="Save your list" /></div>
		</form>
		<?php $home_url = get_option("home");?>
	</div>
	<div id="gallerypaginate" class="paginationstyle"><a href="#" rel="previous">Prev</a> <span class="flatview"></span> <a href="#" rel="next">Next</a></div>
	</div>
		<script type="text/javascript" src="/wp-content/plugins/featured-blogs-list/virtualpaginate.js"></script>
		<link rel='stylesheet' href="/wp-content/plugins/featured-blogs-list/virtual_painging.css" type='text/css' media='screen' />
		<script type="text/javascript">
			var gallery=new virtualpaginate({piececlass:"virtualpage",piececontainer: "div",pieces_per_page: 1,defaultpage: 0,persist: false});
			gallery.buildpagination(["gallerypaginate"]);
		</script>
	</div>
	<?php 
	} 
	add_action ( 'admin_menu', 'blogs_add_pages' ); 
	
	
	class m_widget_featured_blog extends WP_Widget {
		
		/** constructor **/
		function m_widget_featured_blog() {
			parent::WP_Widget(false, $name = 'Featured Blog List');
		}
		
		/** This function displays the output of the widget **/
		function widget($args, $instance) {
			global $wpdb;
			extract( $args );
			$option = $instance;
			$title = empty($options['title']) ? __('Featured Blog') : apply_filters('widget_title', $options['title']);
			
			/*$defaults = array(
				'id' => 1, 'number' => 5, 'author' => '', 'include_content' => false, 'content_length' => 50, include_date => false, include_tags => false, include_author_name => false, limit_to_author => false
			);*/
			
			if($option['widget_featured_blog_default_css']) {
					print '<link rel="stylesheet" type="text/css" href="/wp-content/plugins/featured-blogs-list/output_style_widget.css" media="screen" />';
			}
				 
			foreach ( $option['featured_blog'] as $blog_id ) {
				
				$blog_info = get_blog_details( $blog_id );
				$details_count = $wpdb->get_results($wpdb->prepare("SELECT $wpdb->users.ID AS user_id,$wpdb->users.user_nicename,count(*) AS post_count FROM $wpdb->users JOIN wp_".$blog_id."_posts ON $wpdb->users.ID = wp_".$blog_id."_posts.post_author WHERE (wp_".$blog_id."_posts.post_status = 'publish' AND wp_".$blog_id."_posts.post_type='post') GROUP BY $wpdb->users.user_nicename"));
				$count =0;				
				foreach ($details_count as $detail) {
					$count+=$detail->post_count;
				}
				$details = $wpdb->get_row( $wpdb->prepare("SELECT $wpdb->users.ID AS user_id,$wpdb->users.user_nicename,count(*) AS post_count FROM $wpdb->users JOIN wp_".$blog_id."_posts ON $wpdb->users.ID = wp_".$blog_id."_posts.post_author WHERE (wp_".$blog_id."_posts.post_status = 'publish' AND wp_".$blog_id."_posts.post_type='post') GROUP BY $wpdb->users.user_nicename"));
				$avatar = get_avatar ( $details->user_id,45);
				?>
				<div class="featured_blog_item_widget">
					<div class='avatar_widget'><?php print $avatar ?></div>
					<div class='blog_info_widget'>
						<div><a class="blog_title_widget" href="<?php print get_blog_option($blog_id,'siteurl') ?>"><?php  print ucfirst(get_blog_option ($blog_id, 'blogname')); ?> </a></div>
						<div class="blog_owner_widget"> <?php  print $details->user_nicename ?> </div>
						<?php $last_update = strtotime($blog_info->last_updated); ?>
						<div class="blog_owner_widget latest_update_widget"><span>updated : <?php print date('d.m.y',$last_update) ?> | <?php if($details->post_count): ?> (<?php print $count ?>)  Post</div> <?php  else : ?> (0) Post</span></div>	<?php endif;?>
						
					</div>
					<div class='clear_widget'></div>
				</div>
				<?php
			}
		}
		
		/** This function handles the widget option update form **/
		function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['title'] = strip_tags(stripslashes($new_instance['title']));
			$instance['featured_blog'] = $new_instance['featured_blog'];
			$instance['widget_featured_blog_default_css'] = $new_instance['widget_featured_blog_default_css'];
			/*$instance['widget_featured_blog_content'] = $new_instance['widget_featured_blog_content'];*/
			
			return $new_instance;
			
		}
		
		/** This function creates widget option form **/
	    function form($instance) {
	    	$title = esc_attr($instance['title']);
	    	$featured_blog = $instance['featured_blog'];
	    	if(empty($featured_blog)) {
	    		$featured_blog = array();
	    	}
			$widget_featured_blog_default_css = esc_attr($instance['widget_featured_blog_default_css']);
			/*$widget_featured_blog_content = esc_attr($instance['widget_featured_blog_content']);*/
	    ?>
	    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	    <?php $blogs = get_blog_ids();?>
	    <label><?php _e('Select blogs to mark as featured:') ?></label>
	    <select  name="<?php echo $this->get_field_name('featured_blog')."[]"; ?>" size=5 style="height:100px;width:225px;" multiple="multiple">
	    	<?php foreach ($blogs as $blog): ?>
		    	<option name="<?php echo $this->get_field_name('featured_blog') ?>" value="<?php print $blog->blog_id?>" <?php in_array($blog->blog_id,$featured_blog)? print 'selected': print ''; ?>><?php print  get_blog_option ( $blog->blog_id, 'blogname' ) ?>
		    <?php endforeach;?>
	    </select>
	    
	    <input type="checkbox" name="<?php echo $this->get_field_name('widget_featured_blog_default_css'); ?>" <?php if($widget_featured_blog_default_css){print 'checked';} ?>  value="true" style="margin-top:10px;" /><label style="margin-top:10px;display:inline-block" ><?php _e('Include default css for html output.') ?></label>
	    <!--<input type="checkbox" name="<?php echo $this->get_field_name('widget_featured_blog_content') ?>" <?php if($widget_featured_blog_content){print 'checked';}?> value="true" style="margin-top:10px;" /><label style="margin-top:10px;display:inline-block" ><?php _e('Display content.') ?></label>-->
		<?php
	    }
	}
	
	add_action('widgets_init', create_function('', 'return register_widget("m_widget_featured_blog");'));
	?>