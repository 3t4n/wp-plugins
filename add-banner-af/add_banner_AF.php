<?php 
/*
Plugin Name: Add Widget Banner AF
Plugin URI: www.altramarca.net
Description: Aggiunge un widget che permette la gestione di immagini e banner
Version: 1.0
Author: Alessandro Filira - Web Agency Altramarca
Author URI: www.altramarca.net
*/

class Add_Image extends WP_Widget { 
	function __construct() {
	parent::WP_Widget('Add_Image', 'Aggiungi Banner/Immagine', array('description' => 'Widget creato da Altramarca per aggiungere immagini'));
	}
 
	function widget($args, $instance) { 
		extract($args);
		 
		$str = "$before_widget $before_title ";
		$str.= $after_title;
		$height=$instance['height'];
		$width=$instance['width'];
		if(!$height && !$width) {$height='100%';$width='100%';}
		if(!$height && $width){$height='auto';}
		if($height && !$width){$width='auto';}

		if($instance['url']){
			$str .='<a href="'.$instance['url'].'" target="_blank">';
		}
		$str .='<img src="'.$instance['image'].'"
					alt="'.$instance['alt'].'" 
					height="'.$height.'" 
					width="'.$width.'">';
		if($instance['url']){
			$str .='</a>';
		}
		$str .= $after_widget;
		echo $str;
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['url'] = strip_tags($new_instance['url']);
		$instance['image'] = strip_tags($new_instance['image']);
		$instance['alt'] = strip_tags($new_instance['alt']);
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['width'] = strip_tags($new_instance['width']);
		return $instance;
	}	
 
	function form($instance){
		if ( $instance ) { 
			$url = esc_attr( $instance[ 'url' ] );
			$image = esc_attr( $instance[ 'image' ] );
			$alt = esc_attr( $instance[ 'alt' ] );
			$height = esc_attr( $instance[ 'height' ] );
			$width= esc_attr( $instance[ 'width' ] );
		}
		else {}
	echo '<b>tutti i campi sono facoltativi tranne l\'immagine</b><br>';
	
	echo '<label for="'.$this -> get_field_id('url').'">'. _e('Link:').'</label>';
	echo '<input id="'. $this->get_field_id('url').' " class="widefat" type="text" name="'.$this->get_field_name('url').'" value="'.$url.'" />';

	echo '<label for="'.$this -> get_field_id('image').'">'. _e('Image:').'</label>';
	echo '<input id="'. $this->get_field_id('image').' " class="widefat" type="text" name="'.$this->get_field_name('image').'" value="'.$image.'" />';

	echo '<label for="'.$this -> get_field_id('alt').'">'. _e('tag Alt:').'</label>';
	echo '<input id="'. $this->get_field_id('alt').' " class="widefat" type="text" name="'.$this->get_field_name('alt').'" value="'.$alt.'" />';

	echo '<label for="'.$this -> get_field_id('width').'">'. _e('tag Width:').'</label>';
	echo '<input id="'. $this->get_field_id('width').' " class="widefat" type="text" name="'.$this->get_field_name('width').'" value="'.$width.'" />';

	echo '<label for="'.$this -> get_field_id('height').'">'. _e('tag Height:').'</label>';
	echo '<input id="'. $this->get_field_id('height').' " class="widefat" type="text" name="'.$this->get_field_name('height').'" value="'.$height.'" />';	 
	}
}

function Add_img(){register_widget( 'Add_Image' );}
add_action( 'widgets_init', 'Add_img' );
?>