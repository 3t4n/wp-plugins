<?php

//Fetch Posts and show
	function DashboardExtended_post(){
	// Add the widget to the dashboard
	  global $wpdb;
	  
	  $widget_options = DashboardExtended_Options_post();
	  $request = "SELECT $wpdb->posts.*, display_name as name FROM $wpdb->posts LEFT JOIN $wpdb->users ON $wpdb->posts.post_author=$wpdb->users.ID WHERE post_status IN ('publish','static') AND post_type ='post' ";
		$request .= "ORDER BY post_date DESC LIMIT ".$widget_options['items'];
		$posts = $wpdb->get_results($request);
	
		DashboardExtended_post_html($posts, $widget_options);
	}
	
	
//html for list of posts
	function DashboardExtended_post_html($posts, $widget_options,$type = 'post'){
		
		
		if ( $posts ) {
			echo "<ul id='dashboard-recent-posts-extended-list'>\n";

			foreach ( $posts as $post ) {
				$post_meta = sprintf('%s', '<strong><a href="post.php?action=edit&amp;post=' . $post->ID . '">' . get_the_title($post->ID) . '</a></strong> ' );

        if($widget_options['showauthor']) {				
          $post_meta.= sprintf( __(' by %s', 'dashboard-recent-posts-extended'),'<strong>'. $post->name .'</strong> ' );
          }
          				
        if($widget_options['showtime']) {				
          $time = get_post_time('G', true);

          if ( ( abs(time() - $time) ) < 86400 )
            $h_time = sprintf( __('%s ago'), human_time_diff( $time ) );
          else
            $h_time = mysql2date(__('Y/m/d'), $post->post_date);


          $post_meta.= sprintf( __('&#8212; %s', 'dashboard-recent-posts-extended'),'<abbr title="' . get_post_time(__('Y/m/d H:i:s')) . '">' . $h_time . '</abbr>' );
          }
          
?>
					<li class='post-meta'>
						<?php echo $post_meta; ?>
					</li>
<?php
			}

			echo "				</ul>\n";
		} else {
				echo '				<p>' . __( "Sorry! You don't have any posts in your database!", 'dashboard-recent-posts-extended' ) . "</p><br />";
		}
		
		if($type == 'post')
			echo '<form action="post-new.php"><input type="submit" style="height:30px;" value="Add New Post" class="button-primary"></form>';
		else
			echo '<form action="post-new.php">
				<input type="hidden" name="post_type" value="page" />
				<input type="submit" style="height:30px;" value="Add New Page" class="button-primary"></form>';
			
	}
	
	function DashboardExtended_Options_post() {
		$defaults = array( 'items' => 5, 'showtime' => 1, 'showauthor' => 1);
		if ( ( !$options = get_option( 'DashboardExtended_post' ) ) || !is_array($options) )
			$options = array();
		return array_merge( $defaults, $options );
	}
	
	function DashboardExtended_Setup_post() {
		DashboardExtended_Setup('post');
	}
	
	
	

function DashboardExtended_Setup($content_type) {

	$option_func = "DashboardExtended_Options_$content_type";
	$options = $option_func();
	
	if ( 'post' == strtolower($_SERVER['REQUEST_METHOD']) && isset( $_POST['widget_id'] ) && 'DashboardExtended_'.$content_type == $_POST['widget_id'] ) {
		foreach(array('items','showtime','showauthor') as $key)
			$options[$key] = $_POST[$key];
		update_option( 'DashboardExtended_'.$content_type, $options );
	}
		
?>
	<p>
		<label for="items">
			<?php _e('How many recent items would you like to display?', 'dashboard-recent-'.$content_type.'-extended' ); ?>
			
			<select id="items" name="items">
				<?php
					for ( $i = 5; $i <= 20; $i = $i + 1 )
						echo "<option value='$i'" . ( $options['items'] == $i ? " selected='selected'" : '' ) . ">$i</option>";
				?>
			</select>
		</label>
	</p>

   <p>
		<label for="showauthor">
			<input id="showauthor" name="showauthor" type="checkbox" value="1"<?php if ( 1 == $options['showauthor'] ) echo ' checked="checked"'; ?> />
			<?php _e('Show post author?', 'dashboard-recent-posts-extended' ); ?>
		</label>
	</p>
	
   <p>
		<label for="showtime">
			<input id="showtime" name="showtime" type="checkbox" value="1"<?php if ( 1 == $options['showtime'] ) echo ' checked="checked"'; ?> />
			<?php _e('Show post date?', 'dashboard-recent-posts-extended' ); ?>
		</label>
	</p>
	
<?php
	}


