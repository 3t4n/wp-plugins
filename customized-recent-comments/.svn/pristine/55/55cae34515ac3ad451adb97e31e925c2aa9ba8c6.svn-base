<?php
/**
Plugin Name: Customized Recent Comments
Version: 1.0
Plugin URI: http://justmyecho.com/2010/07/customized-recent-comments/
Description: A recent comments widget that allows for customizing, format changes and other options.
Author: Robin Dalton
Author URI: http://justmyecho.com
**/

class jme_recent_comments {
	
	var $jme_options = 'jme_options';
	var	$jme_options_default = array(	'num_of_comments' => 10,
										'word_limit' => 20,
										'c_template' => '<div class="avatar">%AVATAR%</div><h3>%AUTHORLINK% on <a href="%PERMALINK%">%POSTTITLE%</a></h3>%COMMENT%<div class="comment-meta">Posted %POSTDATE%</div>',
										'include_cat' => '',
										'exclude_cat' => '',
										'date_format' => 'M d, Y',
										'avatar_size' => 40,
										'cat_archive' => 0
									);
	
	var $search = array (	
							'%ID%',
							'%AUTHOR%',
							'%AUTHORLINK%',
							'%COMMENT%',
							'%POSTDATE%',
							'%AVATAR%',
							'%PERMALINK%',
							'%POSTTITLE%'
						);
	
	function jme_recent_comments() {
	}
	
	function jme_comments_activate() {
		if (!get_option($this->jme_options))	{
			add_option($this->jme_options , $this->jme_options_default);
		} else {
			update_option($this->jme_options , $this->jme_options_default);
		}
	}
	
	function jme_comments_deactivate() {
		delete_option($this->jme_options);
	}
	
	function jme_add_options_page() {
		add_options_page("Recent Comments", "Recent Comments", 'edit_themes', basename(__FILE__), array(&$this, 'jme_the_options_page') );
	}
	
	function jme_the_options_page() {
		
		if(($_GET['reset'] == 'options') && (!$_POST)) {
			$this->jme_comments_activate();
			echo '<div id="message" class="updated fade"><p>Options have been reset to defaults.</p></div>';
		}
		
		if($_POST['save_settings']) {
			foreach($_POST as $option => $val) {
				if($option != 'save_settings' || $option != 'generate_code') {
					$options[$option] = htmlentities($val);
				}
			}
			$options['cat_archive'] = ($options['cat_archive'] == 1) ? 1 : 0;
			$options['c_template'] = stripslashes($_POST['c_template']);
			update_option($this->jme_options, $options);
			
			echo '<div id="message" class="updated fade"><p>Your options have been saved.</p></div>';			
		}
					
		$options = get_option($this->jme_options);
	
?>
<style type="text/css">
.wrap {width:860px;}
.wrap div {margin:15px 0;}
.wrap div span {font-size:.8em;}
.st { width:70px;}
.lt {width:400px;}
.template-info {
	font-size:11px;
}
.template-info span {background-color:#d1eaff;}
</style>
<script type="text/javascript">
function jme_generate_code(form) {
	var output = '';
	
	var template = addslashes(form.c_template.value);
	if(template == '<?php echo $this->jme_options_default['c_template']; ?>') {
		template = '__default__';
	}
	var catarch = 0;
	if(form.cat_archive.checked == 1) catarch = 1;
	
	output = "<\?php if(function_exists('jme_display_comments')) { jme_display_comments( array( ";
	if( form.num_of_comments.value != 10 ) {
		output += "1 => " + form.num_of_comments.value + ", ";
	}
	if( form.word_limit.value != 20 ) {
		output += "2 => " + form.word_limit.value + ", ";
	}
	if( addslashes(form.include_cat.value) != '' ) {
		output += "4 => '" + addslashes(form.include_cat.value) + "', ";
	}
	if( addslashes(form.exclude_cat.value) != '') {
		output += "5 => '" + addslashes(form.exclude_cat.value) + "', ";
	}
	if( catarch == 1 ) {
		output += "8 => " + catarch + ", ";
	}
	if( form.avatar_size.value != 40 ) {
		output += "7 => " + form.avatar_size.value + ", ";
	}
	if( addslashes(form.date_format.value) != 'M d, Y' ) {
		output += "6 => '" + addslashes(form.date_format.value) + "', ";
	}
	output += "3 => '" + template + "'));} ?>";
	document.getElementById('generated_code').value = output;	
}
function addslashes(str) {
	str=str.replace(/\'/g,'\\\'');
	return str;
}
</script>
<div class="wrap">
	<h2>Customized Recent Comments</h2>
	<p>This plugin also has a Recent Comments widget. Go to your Widgets section to add Customized Recent Comments to your widget sidebars.</p>
	<p>Or you can add recent comments anywhere on your blog by selecting your options below, click "Generate Code" and paste the code into your theme template.</p>
	
	<form method="post" name="jme_options">
	<div><label for="num_of_comments">Number of Comments: 
		<input type="text" class="st" id="num_of_comments" name="num_of_comments" value="<?php echo htmlentities($options['num_of_comments']); ?>" /></label></div>
	
	<div><label for="word_limit">Limit Comment Words: 
		<input type="text" class="st" id="word_limit" name="word_limit" value="<?php echo htmlentities($options['word_limit']); ?>" /></label></div>

	<div>
		<div style="float:left;margin:0 20px 0 0;">
		<label for="c_template">Comment Template:<br />
		<textarea style="width:400px;height:200px;" id="c_template" name="c_template"><?php echo htmlspecialchars($options['c_template']); ?></textarea></label></div>
		<div class="template-info"><strong>Available Tags for Template:</strong><br />
			<span>%ID%</span>: Comment ID<br />
			<span>%AUTHOR%</span>: Comment Author<br />
			<span>%AUTHORLINK%</span>: Author Link (Outputs: <span style="background:#e9e9e9;"><?php echo htmlspecialchars('<a href="__URL__">%AUTHOR%</a>'); ?></span>, or just <span style="background:#e9e9e9;">%AUTHOR%</span> if URL doesn't exist.)<br />
			<span>%COMMENT%</span>: Comment Text<br />
			<span>%POSTDATE%</span>: Comment Date<br />
			<span>%AVATAR%</span>: Commenter Avatar<br />
			<span>%POSTTITLE%</span>: Post Title<br />
			<span>%PERMALINK%</span>: Post Permalink <br />
		</div>
		
	<div style="clear:both;"></div>
	</div>
	
	<div><label for="include_cat">Include Comments from these Categories: <span>(separate each category by commas)</span><br />
		<input type="text" class="lt" id="include_cat" name="include_cat" value="<?php echo htmlentities($options['include_cat']); ?>" /></label></div>
		
	<div><label for="exclude_cat">Exclude Comments from these Categories: <span>(Only applied if Include category list is empty)</span><br />
		<input type="text" class="lt" id="exclude_cat" name="exclude_cat" value="<?php echo htmlentities($options['exclude_cat']); ?>" /></label></div>
		
	<div><label for="cat_archive"><input type="checkbox" id="cat_archive" name="cat_archive" value="1"<?php if($options['cat_archive'] == 1) echo ' checked="checked"'; ?> /> If on a Category Archive page, show recent comments from that Category only.<br />
		</label></div>

	<div><label for="date_format">Date Format for Comments: <span>(Used in %POSTDATE% tag in the template)</span> 
		<input type="text" class="st" id="date_format" name="date_format" value="<?php echo htmlentities($options['date_format']); ?>" /></label></div>

	<div><label for="avatar_size">Avatar Size in pixels: 
		<input type="text" class="st" id="avatar_size" name="avatar_size" value="<?php echo htmlentities($options['avatar_size']); ?>" /></label></div>

	<div style="margin:25px 0;"><input type="submit" name="save_settings" value="Save These Settings" /> &nbsp; <input type="button" name="generate_code" value="Generate Code" onClick="jme_generate_code(this.form);return false;" /></div>

	</form>
	
	<div>Copy and paste the generated code below into your Theme template where you want the comment list to display:<br />
		<textarea id="generated_code" style="width:600px;height:120px;"></textarea></div>
		
	<p><a href="?page=customized-recent-comments.php&reset=options">Click here to reset all options back to default.</a></p>
		
</div>
	<?php	
	}
}

class jme_Custom_Comments_Widget extends WP_Widget {

	function jme_Custom_Comments_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'comments', 'description' => __('A customizable Recent Comments list.', 'comments') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 380, 'height' => 350, 'id_base' => 'comment-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'comment-widget', __('Customized Recent Comments', 'comments'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract($args);
		$data[1] = $instance['num_of_comments'];
		$data[2] = $instance['comment_length'];
		$data[3] = $instance['comment_list_template'];
		$data[4] = $instance['include_cat'];
		$data[5] = $instance['exclude_cat'];
		$data[6] = $instance['post_time_format'];
		$data[7] = $instance['avatar_size'];
		$data[8] = $instance['cat_archive'];
		
		echo $before_widget;
		if($instance['title'] != '') {
			echo $before_title . $instance['title'] . $after_title;
		}
		jme_display_comments( $data, $args );
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		foreach($new_instance as $key => $val) {
			$instance[$key] = strip_tags( $new_instance[$key] );
		}
		$instance['cat_archive'] = ($new_instance['cat_archive'] == 1) ? 1 : 0;
		$instance['comment_list_template'] = $new_instance['comment_list_template'];

		return $instance;
	}

	function form( $instance ) {
		global $jme_RC;
		
		/* Set up some default widget settings. */
		$defaults = array( 	'title' => __('Recent Comments', 'comments'),
							'num_of_comments' => __('10', 'comments'),
							'comment_length' => __('20', 'comments'),
							'avatar_size' => __('40', 'comments'),
							'post_time_format' => __('M d, Y', 'comments'),
							'comment_list_template' => __( $jme_RC->jme_options_default['c_template'], 'comments'),
							'include_cat' => __( '', 'comments'),
							'exclude_cat' => __( '', 'comments'),
							'cat_archive' => __( 0, 'comments')
						 );
							
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:250px;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'num_of_comments' ); ?>"><?php _e('Number of Comments:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'num_of_comments' ); ?>" name="<?php echo $this->get_field_name( 'num_of_comments' ); ?>" value="<?php echo $instance['num_of_comments']; ?>" style="width:50px;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'comment_length' ); ?>"><?php _e('Word limit for each comment:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'comment_length' ); ?>" name="<?php echo $this->get_field_name( 'comment_length' ); ?>" value="<?php echo $instance['comment_length']; ?>" style="width:50px;" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'comment_list_template' ); ?>"><?php _e('Comment Template:', 'comments'); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'comment_list_template' ); ?>" name="<?php echo $this->get_field_name( 'comment_list_template' ); ?>" style="width:375px;height:125px;"><?php echo htmlspecialchars($instance['comment_list_template']); ?></textarea><br />
			<span style="font-size:.9em;">Tags you can use are:<br>
						%AUTHOR% = comment author<br />
						%COMMENT% = comment text<br />
						%POSTDATE% = comment date<br />
						View all available tags under "Settings > Recent Comments"
			</span>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'include_cat' ); ?>"><?php _e('Include Comments from Categories:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'include_cat' ); ?>" name="<?php echo $this->get_field_name( 'include_cat' ); ?>" value="<?php echo $instance['include_cat']; ?>" style="width:375px;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'exclude_cat' ); ?>"><?php _e('Exclude Comments from Categories:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'exclude_cat' ); ?>" name="<?php echo $this->get_field_name( 'exclude_cat' ); ?>" value="<?php echo $instance['exclude_cat']; ?>" style="width:375px;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'cat_archive' ); ?>"><input type="checkbox" id="<?php echo $this->get_field_id( 'cat_archive' ); ?>" name="<?php echo $this->get_field_name( 'cat_archive' ); ?>" value="1"<?php if($instance['cat_archive'] == 1) echo ' checked="checked"'; ?> /><?php _e(' If on Category Archive page, show recent comments from that Category only.', 'comments'); ?></label>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'post_time_format' ); ?>"><?php _e('Comment date format:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'post_time_format' ); ?>" name="<?php echo $this->get_field_name( 'post_time_format' ); ?>" value="<?php echo $instance['post_time_format']; ?>" style="width:80px;" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'avatar_size' ); ?>"><?php _e('Avatar size:', 'comments'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'avatar_size' ); ?>" name="<?php echo $this->get_field_name( 'avatar_size' ); ?>" value="<?php echo $instance['avatar_size']; ?>" style="width:50px;" />
		</p>

	<?php
	}
}

function jme_custom_comments_load_widget() {
	register_widget( 'jme_Custom_Comments_Widget' );
}

function jme_custom_comment_style() {
	$plugin_path = WP_CONTENT_URL . '/plugins/'. plugin_basename(dirname(__FILE__)) . '/';
	echo '<link rel="stylesheet" href="' . $plugin_path . 'css/style.css" type="text/css" />' . "\r\n";
}

function jme_display_comments( $args ) {
	global $wpdb, $jme_RC;
	
	//set defaults if not defined
	if(!isset($args[1])) $args[1] = $jme_RC->jme_options_default['num_of_comments'];
	if(!isset($args[2])) $args[2] = $jme_RC->jme_options_default['word_limit'];
	if(!isset($args[3]) || ($args[3] == '__default__')) $args[3] = $jme_RC->jme_options_default['c_template'];
	if(!isset($args[4])) $args[4] = $jme_RC->jme_options_default['include_cat'];
	if(!isset($args[5])) $args[5] = $jme_RC->jme_options_default['exclude_cat'];
	if(!isset($args[6])) $args[6] = $jme_RC->jme_options_default['date_format'];
	if(!isset($args[7])) $args[7] = $jme_RC->jme_options_default['avatar_size'];
	if(!isset($args[8])) $args[8] = $jme_RC->jme_options_default['cat_archive'];
	
	if(($args[4] == '') && ($args[5] == '') && ($args[8] == 0)) {
		// do basic comment query

		$query = "SELECT * FROM $wpdb->comments
							WHERE comment_approved = '1' 
							AND comment_type = ''
							ORDER BY comment_date_gmt DESC 
							LIMIT 0, $args[1]";
	} else {
		$sql_cat = '';
		if($args[8] == 1) {
			if(is_category()) {
				$catid = get_cat_id(single_cat_title("", false));
				$sql_cat = "AND t.term_id = '" . $catid . "'";
			}		
		} else if($args[4] != '') {
			$cats = explode(",",$args[4]);
			for($i=0;$i<count($cats);$i++) {
				$thecats[] = get_cat_id(trim(stripslashes($cats[$i])));
			}
			$catids = implode(",", $thecats);
			$sql_cat = "AND t.term_id IN (" . $catids . ")";
		} else if ($args[5] != '') {
			$cats = explode(",",$args[5]);
			for($i=0;$i<count($cats);$i++) {
				$thecats[] = get_cat_id(trim(stripslashes($cats[$i])));
			}
			$catids = implode(",", $thecats);
			$sql_cat = "AND t.term_id NOT IN (" . $catids . ")";
		}
		
		$query = "SELECT 	c.comment_ID,
							c.comment_post_ID,
							c.comment_author,
							c.comment_author_email,
							c.comment_author_url,
							c.comment_content
						FROM $wpdb->comments c
						LEFT JOIN $wpdb->posts p
						ON c.comment_post_ID = p.ID
						LEFT JOIN $wpdb->term_relationships r
						ON p.ID = r.object_id
						LEFT JOIN $wpdb->term_taxonomy t
						ON r.term_taxonomy_id = t.term_taxonomy_id
						WHERE c.comment_approved = '1' 
						AND c.comment_type = ''
						AND t.taxonomy = 'category'
						$sql_cat
						ORDER BY c.comment_date_gmt DESC 
						LIMIT 0, $args[1]";
						
	}
			
	$comments = $wpdb->get_results($query);

	if (!$comments) {
		$result = "none";
	}
	
	echo '<ul class="customized-recent-comments">';
		
	if($result == "none") {
		echo '<p>No comments to display.</p>';
	} else {

		foreach ($comments as $com) {
			if($com->comment_author_url != '') {
				$authorlink = '<a href="'.$com->comment_author_url.'">'.$com->comment_author.'</a>';
			} else {
				$authorlink = $com->comment_author;
			}
			
			$content = strip_tags( $com->comment_content );				
			$words = explode(' ',$content);
				
			if(count($words) > $args[2]) {
				array_splice($words, $args[2]);
    			$output = implode(' ', $words) . '...';
    		} else {
    			$output = $content;
    		}
			
			$replace = array (	$com->comment_ID,
								$com->comment_author,
								$authorlink,
								$output,
								get_comment_date( $args[6], $com->comment_ID ),
								get_avatar( $com->comment_author_email, $size = $args[7] ),
								get_permalink( $com->comment_post_ID ),
								get_the_title( $com->comment_post_ID )
							);
			echo '<li class="recentcomment">';
			echo stripslashes( str_replace( $jme_RC->search, $replace, $args[3]) );
			echo '</li>';	
		}
	}
	echo '</ul>';
}

$jme_RC = new jme_recent_comments();

add_action('widgets_init', 'jme_custom_comments_load_widget' );
add_action('wp_head', 'jme_custom_comment_style');
add_action('admin_menu', array(&$jme_RC, 'jme_add_options_page') );

register_activation_hook( __FILE__, array(&$jme_RC, 'jme_comments_activate') );
register_deactivation_hook( __FILE__, array(&$jme_RC, 'jme_comments_deactivate') );
?>
