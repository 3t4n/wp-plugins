<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 

class apw_authors extends WP_Widget {

	public function __construct() {
		// widget actual processes
		parent::__construct(
			'apw_authors', // Base ID
			__('Authors Posts', 'authors-posts-widget'), // Name
			array( 'description' => __( 'A widget with collapsible feature which displays posts by authors. ', 'authors-posts-widget'), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		 
		 global $wpdb;
		 $title = $instance['title'];
		 $limit_posts = ($instance['number']>0?$instance['number']:'');
		 $display_excerpt = $instance['display_excerpt'];
		 $html = '<section class="add-nav widget widget_authors" id="apw-authors"><h3 class="widget-title">'.$title.'</h3>';
		 $table = $wpdb->prefix . 'users';
		 $users = $wpdb->get_results('SELECT ID FROM '.$table.' ORDER BY user_login');
		 if(!empty($users)){
			foreach($users as $results){
				
			 $id = $results->ID;
			 $user_info = get_userdata($id);
			 
			 $table = $wpdb->prefix . 'posts';
			 $result = $wpdb->get_results('SELECT * FROM '.$table.' WHERE post_author = '.$id.' AND post_status = "publish" AND post_type = "post" ORDER BY post_date DESC '.($limit_posts!=''?'LIMIT 0,'.$limit_posts:''));
			 $i = 0;
			 if(!empty($result)){
				 $name = $user_info->first_name.' '.$user_info->last_name;
				 //pree($user_info);
				 $avatar_url = esc_url( get_avatar_url( $user_info->ID ) );
				 $name = (trim($name)==''?ucwords($user_info->display_name):$name);
			 	 $html .= '<div class="apw-closed"><img src="'.$avatar_url.'" /><a class="apw-parent">'.$name.' <span>('.count($result).')</span></a>';
				 $html .= '<ul>';
				 foreach ($result as $numpost) {
				 $html .= '<li><a href="'.get_permalink($numpost->ID).'">'.$numpost->post_title.'</a>';
				 if($display_excerpt){
				 $html .= '<p>'.$numpost->post_excerpt.'</p>';
				 }
				 $html .= '</li>';
				 $i++;
				 if($i == $limit_posts){
				 break;
				 }
				 }
				 $html .= '</ul></div>';
			 }
			
			 
			}
		 }
		 
		 $html .= '</section>';
		 echo $html;
	
	}

 	public function form( $instance ) {
		// outputs the options form on admin
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$excerpt    = (isset( $instance['display_excerpt'] ) && $instance['display_excerpt'])==true ? true : false;
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'authors-posts-widget' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:', 'authors-posts-widget' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Display excerpt?', 'authors-posts-widget' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'display_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'display_excerpt' ); ?>" type="checkbox" value="1"<?php checked($excerpt, true); ?> /></p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		
		$instance = array();
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['display_excerpt']    = $new_instance['display_excerpt'];
		

		return $instance;
		
	}
}
if(!function_exists('apw_init')){
	function apw_init(){
		 register_widget( 'apw_authors' );
		}
	}