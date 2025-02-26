<?php

class DX_Custom_Articles_List_Widget extends WP_Widget{

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
	 		'DX_Custom_Articles_List', // Base ID
			__( '#Custom Articles List', 'dx-advanced-widgets' ), // Name
			array( 'description' => __( 'Custom Category articles, and sort...', 'dx-advanced-widgets' ), ) // Args
		);
		if( basename( $_SERVER['REQUEST_URI'] ) == 'widgets.php' )
			wp_enqueue_script( 'dx-advanced-widget-form', plugins_url( 'form.js', __FILE__ ), '', '', true );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	function widget( $args, $instance ) {
		include( 'widget.php' );
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['order'] = (string) $new_instance['order'];
		$instance['orderby'] = (string) $new_instance['orderby'];
		$instance['cid'] = (int) $new_instance['cid'];
		$instance['style'] = (string) $new_instance['style'];
		$instance['pic_width'] = (string) $new_instance['pic_width'];
		$instance['pic_height'] = (string) $new_instance['pic_height'];
		$instance['word_num'] = (int) $new_instance['word_num'];
		$instance['flash_width'] = (string) $new_instance['flash_width'];
		$instance['flash_height'] = (string) $new_instance['flash_height'];

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	function form( $instance ) {		
		include( 'form.php' );
	}
	
	//get post thumbnail
	private function tmb($size="media"){
		global $post;
		$args=array('post_type'=>'attachment','post_mime_type'=>'image','post_parent'=>$post->ID,'order'=>'asc');
		$images=get_children($args);
		if(has_post_thumbnail()) return get_the_post_thumbnail($post->ID,$size);
		else if($images){
			$attachment_id=key($images);
			return wp_get_attachment_image($attachment_id,$size);
		}
		else {
			$preg="/(<img )([^>]*)(>)/"; 
			$content=$post->post_content;
			preg_match($preg,$content,$img);
			if( isset($img[0]) ) return $img[0];
		}
	}
	
}