<?php
/*
*      2J Photo Gallery
*      Version: 1.0.9
*      By 2J Photo Gallery Team
*      Contact: http://2joomla.net
*      Licensed under the GPLv3 license - https://opensource.org/licenses/gpl-3.0.html
*      Copyright (c) 2001, 2JTeam. All rights reserved.
*/


if ( ! defined( 'WPINC' ) )  die;
if ( ! defined( 'ABSPATH' ) ) exit;

class Photo_Gallery_2J_Widget extends WP_Widget {

  function __construct(){
  		global $pagenow;
 		if( isset( $pagenow) &&  ( $pagenow=='customize.php' || $pagenow=='widgets.php' ) ) {
  			wp_enqueue_media();
			wp_enqueue_style("wp-jquery-ui-dialog");
			wp_enqueue_script('jquery-ui-dialog');
		}
	    parent::__construct(
	      'Photo_Gallery_2J_Widget',
	      __( '2J Photo Gallery', '2j-photo-gallery' ).' '.__( 'Widget', '2j-photo-gallery' ),
	      array( 'description' => __( "Publish images on your website." ), )
	    );
  }

  public function widget( $args, $instance ) {
		wp_enqueue_script( 'twoj-photo-gallery-lightbox-js', 	TWOJ_PHOTO_GALLERY_URL.'assets/js/2j-photo-gallery-lightbox.js', array( 'jquery' ), 	TWOJ_PHOTO_GALLERY_VERSION, false );
		wp_enqueue_script( 'twoj-photo-gallery-script-js', 		TWOJ_PHOTO_GALLERY_URL.'assets/js/2j-photo-gallery-script.js', 	array( 'jquery' ), 	TWOJ_PHOTO_GALLERY_VERSION, false );
		wp_enqueue_style(  'twoj-photo-gallery-css',			TWOJ_PHOTO_GALLERY_URL.'assets/css/2j-photo-gallery-style.css', 	array(), 			TWOJ_PHOTO_GALLERY_VERSION, 'all' );


    $photo_gallery_title = 		apply_filters( 'widget_title', $instance['2j-photo-gallery-title'] );
    $photo_gallery_id = 		$instance['2j-photo-gallery-id'];
	$photo_gallery_columns = 	$instance['2j-photo-gallery-columns'];
	if(!$photo_gallery_columns) $photo_gallery_columns = 3;
	$photo_gallery_lightbox = 	$instance['2j-photo-gallery-lightbox'];

    echo $args['before_widget'];
    if( ! empty( $photo_gallery_title ) ){
    	echo $args['before_title'] . $photo_gallery_title . $args['after_title'];
    }

    echo '<div id="'.uniqid('twoj_photo_gallery_wrap_id_').'" class="twoj_photo_gallery_wrap" '.($photo_gallery_lightbox?' data-hidecaption="1" ':'').'>';
   		echo do_shortcode('[gallery ids="'.$photo_gallery_id.'" link="file"  columns="'.$photo_gallery_columns.'" ]');
   	echo '</div>';

    echo $args['after_widget'];
  }


  public function form( $instance ) {
  	//print_r($instance);
	if ( isset( $instance[ '2j-photo-gallery-title' ] ) ) {
		$title = $instance[ '2j-photo-gallery-title' ];
	} else {
		$title = __( 'Images' );
	}

    if ( isset( $instance[ '2j-photo-gallery-id' ] ) ) {
      	$galleries_id = $instance[ '2j-photo-gallery-id' ];
    } else {
      	$galleries_id = ' ';
    }

     if ( isset( $instance[ '2j-photo-gallery-columns' ] ) ) {
      	$columns = $instance[ '2j-photo-gallery-columns' ];
    } else {
      	$columns = 3;
    }

    ?>
		<label for="<?php echo $this->get_field_id( '2j-photo-gallery-title' ); ?>">
	 		<?php _e( 'Title', '2j-photo-gallery' ); ?>:
		</label>
		<input class="widefat" id="<?php echo $this->get_field_id( '2j-photo-gallery-title' ); ?>" name="<?php echo $this->get_field_name( '2j-photo-gallery-title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<p align="center">
    	<button data-valuefield="<?php echo $this->get_field_id( '2j-photo-gallery-id' ); ?>" class="button twoj-photo-gallery-edit-button"><?php _e( 'Manage Images' ); ?></button>
   		<input type='hidden' id="<?php echo $this->get_field_id( '2j-photo-gallery-id' ); ?>" name="<?php echo $this->get_field_name( '2j-photo-gallery-id' ); ?>" value="<?php echo esc_attr( $galleries_id ); ?>" />
	<p>

	<p>
		<label for="<?php echo $this->get_field_id( '2j-photo-gallery-columns' ); ?>"><?php _e( 'Columns:', '2j-photo-gallery' ); ?></label>
		<input id="<?php echo $this->get_field_id( '2j-photo-gallery-columns' ); ?>" name="<?php echo $this->get_field_name( '2j-photo-gallery-columns' ); ?>" class="tiny-text" step="1" min="1" size="3" type="number"  value="<?php echo $columns; ?>" />
	</p>

	<p>
		<input <?php checked( $instance[ '2j-photo-gallery-lightbox' ], 'on' ); ?> value='on' id="<?php echo $this->get_field_id( '2j-photo-gallery-lightbox' ); ?>" name="<?php echo $this->get_field_name( '2j-photo-gallery-lightbox' ); ?>" type="checkbox" >
		<label for="<?php echo $this->get_field_id( '2j-photo-gallery-lightbox' ); ?>"><?php _e( 'Disable Lightbox Caption', '2j-photo-gallery' ); ?></label>
	</p>

	<script type="text/javascript">
		(function ($) {
    		$('.twoj-photo-gallery-edit-button').click(function(event){
    			event.preventDefault();
    			var valField = $( '#'+$(this).data("valuefield") );
    			wp.media.gallery.edit("[gallery ids='"+valField.val()+"']").on('update', function(g){
					var id_array = [];
					$.each(g.models, function(id, img) { id_array.push(img.id); });
					valField.val(id_array.join(","));
				});
    			if(valField.val()=='' || valField.val()==' ') $('.media-frame-menu .media-menu-item').eq(2).click();
    		});
    	}(jQuery));

	</script>

    <?php
  }

  public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['2j-photo-gallery-title'] = 		( ! empty( $new_instance['2j-photo-gallery-title'] ) ) 		? strip_tags( $new_instance['2j-photo-gallery-title'] ) : '';
	$instance['2j-photo-gallery-columns'] = 	( ! empty( $new_instance['2j-photo-gallery-columns'] ) ) 	? (int) $new_instance['2j-photo-gallery-columns'] 		: 3;
	$instance['2j-photo-gallery-lightbox'] = 	$new_instance['2j-photo-gallery-lightbox'];
	$instance['2j-photo-gallery-id'] = 			( ! empty( $new_instance['2j-photo-gallery-id'] ) ) 		? strip_tags($new_instance['2j-photo-gallery-id']) 		: ' ';
	return $instance;
  }
}


function photo_gallery_2j_init_widget() {
  	register_widget( 'Photo_Gallery_2J_Widget' );
}

add_action( 'widgets_init', 'photo_gallery_2j_init_widget' );
