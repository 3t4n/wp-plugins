<?php

class Inceptive500pxImageShowcaseWidget extends WP_Widget {
	

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/
	
	public function __construct() {
	
		parent::__construct(
			'Inceptive500pxImageShowcaseWidget',
			__( '.:: Inceptive: ::.&nbsp;500px Widget', 'Inceptive500pxImageShowcase-locale' ),
			array(
				'classname'		=>	'Inceptive500pxImageShowcaseWidget',
				'description'	=>	__( 'Image showcase from 500px photography community.', 'Inceptive500pxImageShowcase-locale' )
			)
		);
		
	} // end constructor

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/
	
	/**
	 * Outputs the content of the widget.
	 */
	public function widget( $args, $instance ) {
		
		$options = get_option( 'plugin_options' );
		$consumerKey_500px = $options['consumerkey'];
				
		$feature=(isset($instance['feature'])) ? $instance['feature'] : '';
		$tag=(isset($instance['tag'])) ? $instance['tag'] : '';
		$username=(isset($instance['username'])) ? $instance['username'] : '';
		$num=(isset($instance['num'])) ? $instance['num'] : '6';
		$row=(isset($instance['row'])) ? $instance['row'] : '3';
		$width=(isset($instance['width'])) ? $instance['width'] : '60';
		$height=(isset($instance['height'])) ? $instance['height'] : '60';
		
		if($feature=='tag'){
			$url= 'https://api.500px.com/v1/photos/search?consumer_key=' . $consumerKey_500px . '&tag='.$tag.'&rpp=' . $num;
		}
		else
			$url = 'https://api.500px.com/v1/photos?consumer_key=' . $consumerKey_500px . '&feature=' . $feature . '&username=' . $username . '&rpp=' . $num;
		
		$json = file_get_contents($url);
		$photos = json_decode($json, TRUE);
				
		if(isset($before_widget))
			echo $before_widget;
		
		echo "<h2>".$instance['title']."</h2>";
    
		$return_string = '<div class="gallery clearfix">';
		
		$i=1;		
		foreach ($photos['photos'] as $photo) {
			$photourl = substr($photo['image_url'], 0, -5) . "4.jpg";
			$photourl_thumb = substr($photo['image_url'], 0, -5) . "2.jpg";
			$photolink = 'http://500px.com/photo/'.$photo['id'];
			
			$return_string .= '<a target="_blank" href="' . $photolink . '" title="' . $photo['name'] . '"><img src="' . $photourl_thumb . '" width="'.$width.'px" height="'.$height.'px" alt="' . $photo['name'] . '" /></a>&nbsp;';
			
			if($i==$row){
				$return_string .= '<br/>';
				$i=1;
				continue;
			}
			
			$i++;
		}
				
		$return_string .= '</div>';
		
		echo $return_string;
		
		if(isset($after_widget))
			echo $after_widget;
		
	} // end widget
	
	/**
	 * Processes the widget's options to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['feature'] = strip_tags( $new_instance['feature'] );
		$instance['username'] = strip_tags( $new_instance['username'] );
		$instance['tag'] = strip_tags( $new_instance['tag'] );
		$instance['num'] = strip_tags( $new_instance['num'] );
		$instance['row'] = strip_tags( $new_instance['row'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
    
		return $instance;
		
	} // end widget
	
	/**
	 * Generates the administration form for the widget.
	 */
	public function form( $instance ) {
	
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'	=>	__( '500px Image Showcase', 'Inceptive500pxImageShowcase-locale' ),
				'feature' => 'popular',
				'username' => '',
				'tag' => '',
				'num' => '6',
				'row' => '3',
				'width' => '60',
				'height' => '60'
			)
		);
			
		// Display the admin form
		include( plugin_dir_path(__FILE__) . 'plugin-widget-admin.php' );	
		
	} // end form

	
} // end class

?>
