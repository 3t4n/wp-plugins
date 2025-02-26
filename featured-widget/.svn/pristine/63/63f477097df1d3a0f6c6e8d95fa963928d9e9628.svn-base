<?php
/**
 * Featured_Widget Class
 */
class Featured_Widget extends WP_Widget {
	/** constructor */
	function Featured_Widget() {
		parent::WP_Widget( 'Featured_Widget', $name = 'Featured_Widget' );
	}

	/** @see WP_Widget::widget */
	function widget( $args, $instance ) {
	//database
		global $wpdb;
		$table_name = $wpdb->prefix . "featured";
foreach( $wpdb->get_results("SELECT * FROM $table_name;") as $key => $row) {
	// each column in your row will be accessible like this
	$id = $row->id;
	$band = $row->name;
	$url = $row->url;
	$pagel = $row->link;
	$dwidth = $row->width;
	}
	//end db
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;
		//check for no width set
		if ( $title )
			echo $before_title . $title . $after_title;
			echo "<a href='" . $pagel . "'>";
			?>
<img style="width: <?php echo $dwidth; ?>px" src="<?php echo $url; ?>" alt="">
			<?php
			echo "<div>" . $band . "</div>";
			echo "</a>";
			?>
		<?php echo $after_widget;
	}

	/** @see WP_Widget::update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	/** @see WP_Widget::form */
	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php 
	}

} // class Featured_Widget

// register Featured_Widget widget
add_action( 'widgets_init', create_function( '', 'return register_widget("Featured_Widget");' ) );

?>