<?php 
/**
 * Adds Aspearl_RRPA_Widget widget.
 *
 * @author Aspearlsoft
 * @since 1.0
 */
class Aspearl_RRPA_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'aspearl_rrpa_widget', 

		// Widget name will appear in UI
		__('Aspearl RRPA Widget', 'aspearl_rrpa'), 

		// Widget description
		array( 'description' => __( 'Widget to show Recent Post, Recent Comment, Popular Post and Archive in nice tabing.', 'aspearl_rrpa' ), ) 
		);
	}

	/* 
	* Creating widget front-end.  This is where the action happens
	* 
	* @params Array $args
	* @params Object $instance
	*/
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		// This is where you run the code and display the output
		$instance['no_of_records']	= ( ! empty( $instance[ 'no_of_records']) && (int)$instance[ 'no_of_records'] > 0) ? $instance[ 'no_of_records'] : 10;
		$instance['show_recent']	= ( ! empty( $instance['show_recent'] ) ) ? strip_tags( $instance['show_recent'] ) 		: 'yes';
		$instance['show_popuplar']	= ( ! empty( $instance['show_popuplar'] ) ) ? strip_tags( $instance['show_popuplar'] )  : 'yes';
		$instance['show_comment']	= ( ! empty( $instance['show_comment'] ) ) ? strip_tags( $instance['show_comment'] ) 	: 'yes';
		$instance['show_archive']	= ( ! empty( $instance['show_archive'] ) ) ? strip_tags( $instance['show_archive'] ) 	: 'yes';
		showWidgetHtml($instance);
		echo $args['after_widget'];
	}
		
	/* Widget Backend Configuration */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( '', 'wpb_widget_domain' );
		}	
		
		$noOfRecords 	= ( ! empty( $instance['no_of_records'] ) )	? strip_tags( $instance['no_of_records'] )	: '';
		$showRecent 	= ( ! empty( $instance['show_recent'] ) )	? strip_tags( $instance['show_recent'] )	: 'yes';
		$showPopuplar 	= ( ! empty( $instance['show_popuplar'] ) )	? strip_tags( $instance['show_popuplar'] )	: 'yes';
		$showComment 	= ( ! empty( $instance['show_comment'] ) )	? strip_tags( $instance['show_comment'] )	: 'yes';
		$showArchive 	= ( ! empty( $instance['show_archive'] ) )	? strip_tags( $instance['show_archive'] )	: 'yes';
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'no_of_records' ); ?>"><?php _e( 'No. of Record:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'no_of_records' ); ?>" name="<?php echo $this->get_field_name( 'no_of_records' ); ?>" type="text" value="<?php echo esc_attr( $noOfRecords ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_recent' ); ?>"><?php _e( 'Show Recent Tab:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'show_recent' ); ?>" name="<?php echo $this->get_field_name( 'show_recent' ); ?>" type="checkbox" value="yes" <?php echo ($showRecent=='yes') ? ' checked="checked" ': ''; ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_popuplar' ); ?>"><?php _e( 'Show Popuplar Tab:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'show_popuplar' ); ?>" name="<?php echo $this->get_field_name( 'show_popuplar' ); ?>" type="checkbox" value="yes" <?php echo ($showPopuplar=='yes') ?  ' checked="checked" ': ''; ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_comment' ); ?>"><?php _e( 'Show Comment Tab:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'show_comment' ); ?>" name="<?php echo $this->get_field_name( 'show_comment' ); ?>" type="checkbox" value="yes" <?php echo ($showComment=='yes') ?  ' checked="checked" ': ''; ?> />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_archive' ); ?>"><?php _e( 'Show Archive Tab:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'show_archive' ); ?>" name="<?php echo $this->get_field_name( 'show_archive' ); ?>" type="checkbox" value="yes" <?php echo ($showArchive=='yes') ?  ' checked="checked" ': ''; ?> />
		</p>

	<?php 
	}	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['no_of_records'] = ( ! empty( $new_instance['no_of_records'] ) ) ? strip_tags( $new_instance['no_of_records'] ) : '';
		$instance['show_recent'] = ( ! empty( $new_instance['show_recent'] ) ) ? strip_tags( $new_instance['show_recent'] ) : 'no';
		$instance['show_popuplar'] = ( ! empty( $new_instance['show_popuplar'] ) ) ? strip_tags( $new_instance['show_popuplar'] ) : 'no';
		$instance['show_comment'] = ( ! empty( $new_instance['show_comment'] ) ) ? strip_tags( $new_instance['show_comment'] ) : 'no';
		$instance['show_archive'] = ( ! empty( $new_instance['show_archive'] ) ) ? strip_tags( $new_instance['show_archive'] ) : 'no';
		return $instance;
		}
	} // Class wpb_widget ends here

		// Register and load the widget
	function wpb_load_widget() {
			register_widget( 'Aspearl_RRPA_Widget' );
	}

add_action( 'widgets_init', 'wpb_load_widget' );
/*
* function to show tab html 
*/
function showWidgetHtml($instance) {
	wp_enqueue_style('RRPA CSS',plugin_dir_url( __FILE__ ).'css/aspearl-rrpa.css',array(),'1.0',false);//true for footer
	$tabList = array();
	if($instance['show_recent']=='yes') {
		$recent  = getRecentPost($instance);
		$tabList['recent'] = array('label'=>'Show Recent',
							'loop'=>true,
							'data'=>$recent,
							'no_msg'=>'No Recent Post Found.');
	}
	if($instance['show_popuplar']=='yes') {
		$popular = getPopuplarPost($instance);
		$tabList['popular'] = array('label'=>'Show Popuplar',
							'loop'=>true,
							'data'=>$popular,
							'no_msg'=>'No Popuplar Post Found.');
	}
	if($instance['show_comment']=='yes') {
		$comment = getPostCommets($instance);

		$tabList['comment'] = array('label'=>'Show Comment',
							'loop'=>true,
							'data'=>$comment,
							'no_msg'=>'No Comments Found.');	
	}
	if($instance['show_archive']=='yes') {
		$archive = getArchivePost($instance);
		$tabList['archive'] = array('label'=>'Show Archive',
							'loop'=>false,
							'data'=>$archive,
							'no_msg'=>'No Archived Post Found.');	
	}
	include_once dirname(__FILE__).'/aspearl-rrpa-view.php';
}
function getRecentPost($instance){	
	$noOfRecords = $instance[ 'no_of_records' ];
	$args = array(
	    'numberposts' =>$noOfRecords,
	    'offset' => 0,
	    'category' => 0,
	    'orderby' => 'post_date',
	    'order' => 'DESC',	   
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'suppress_filters' => true
	);
	return $recentPosts = wp_get_recent_posts( $args, OBJECT );	
}
function getPopuplarPost($instance){
	$noOfRecords = $instance[ 'no_of_records' ];
	$args = array(
	    'numberposts' => $noOfRecords,
	    'offset' => 0,
	    'category' => 0,
	    'orderby' => 'comment_count',
	    'order' => 'DESC',
	    //'include' => ,
	   // 'exclude' => ,
	    //'meta_key' => ,
	    //'meta_value' =>,
	    'post_type' => 'post',
	    'post_status' => 'publish',
	    'suppress_filters' => true
	);
	return $recentPosts = get_posts( $args, OBJECT );	
}

function getPostCommets($instance){
	$noOfRecords = $instance[ 'no_of_records' ];
	$defaults = array(	
	'include_unapproved' => '',
	'fields' => '',
	'ID' => '',
	'number' => $noOfRecords,
	'offset' => '',
	'orderby' => 'comment_date_gmt',
	'order' => 'DESC',
	'post_ID' => '',
	'post_id' => 0,		
	'post_name' => '',
	'post_parent' => '',
	'post_status' => '',
	'post_type' => '',
	'status' => 'approve',/* all- All , hold - unapproved comments,'approve' - approved comments
			'spam' - spam comments
			'trash' - trash comments
			'post-trashed'*/
	'type' => '',	
	'count' => false,	
	'date_query' => null, // See WP_Date_Query
);
	return $postComments = get_comments( $defaults, OBJECT );	
}
function getArchivePost($instance){
	$noOfRecords = $instance[ 'no_of_records' ];
	$args = array(
		'type'            => 'monthly',
		'limit'           => $noOfRecords,
		'format'          => 'html', 
		'before'          => '',
		'after'           => '',
		'show_post_count' => true,
		'echo'            => 0,
		'order'           => 'DESC'
	); 
	return $archivePosts = wp_get_archives( $args, OBJECT );	
}
?>
