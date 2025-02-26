<?php
class Flo_Pictime_Meta_Box {
	public function __construct() {
		if ( is_admin() ) {


			add_action( 'load-post.php',     array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
		}
	}

	public function init_metabox() {

		add_action( 'add_meta_boxes', array( $this, 'add_metabox'  ), 9     );
		add_action( 'save_post',      array( $this, 'save_metabox' ), 10, 2 );

	}

	public function add_metabox() {

		add_meta_box(
			'flo_pictime_gallery_settings', // meta box id
			__( 'FloPicTime Gallery Settings', 'flo-forms' ), // Title of the meta box
			array( $this, 'render_metabox' ),  // call back funtion
			'flo_pictime_gallery', // post type
			'normal', // The context within the screen where the boxes should display.
			'high' // priority
		);

	}

	/**
	 * @param $post
   */


  public function render_metabox($post) { ?>
		<!-- app wrap -->
			<div id="pictime__root"></div>
		<!-- app wrap -->
	<?php }

  public function save_metabox( $post_id, $post ) {

  	// update_post_meta() ....
  }
}

new Flo_Pictime_Meta_Box();
//die('333333');
?>
