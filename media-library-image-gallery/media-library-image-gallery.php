<?php
/**
 * @package Media Library Image Gallery
 * @version 1.6
 */
/*
Plugin Name: Media Library Image Gallery
Description: Display all Images in your Gallery as a WordPress Gallery
Author: derweili
Version: 1.0.0
Author URI: http://derweili.de/
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
*  Plugin Class
*/
class Media_Library_Image_Gallery
{

	private $query_args;
	private $attachements;
	private $images;
	private $image_ids_string;
	private $gallery_shortcode;
	private $gallery_order;


	function __construct()
	{

		// load register shortcode function
		add_action( 'init', array( &$this, 'register_shortcode' ) );

	}

	public function register_shortcode() {

		add_shortcode( 'media-library-image-gallery', array( &$this, 'mlig_content' ) );

	}

	/**
	* shortcode content
	*/
	public function mlig_content( $atts = null ) {

		/*
		* set query args to query all image attachements
		*/
		$this->query_args = array(
			'post_type' => 'attachment',
			'orderby' => 'date',
			'post_mime_type' => 'image',
			'posts_per_page'   => -1,
		);

		// set excluded images
		if ( isset( $atts["exclude"] ) ) {
			$this->query_args["exclude"] = esc_attr( $atts["exclude"] );
		}

		/**
		* you can modify the query args before query
		*/

		$this->query_args = apply_filters( 'mlig_before_query', $this->query_args );

		$this->attachements = get_posts( $this->query_args ); //Get Attachement Posts

		$this->attachements = apply_filters( 'mlig_after_query', $this->attachements );



		if( $this->attachements ) { //Check if there are attachements

			$this->images = array(); //define images variable


			foreach ( $this->attachements as $attachement ) : setup_postdata( $attachement ); //loop attachements
				//var_dump($attachement);
				$images[] = $attachement->ID;

			endforeach;


			/**
			* you can modify all the attachement ids
			*/
			$this->images = apply_filters( 'mlig_image_ids', $images );

			$this->image_ids_string = join( ',', $this->images ); // Join all image IDs from array to string

			$gallery_order = apply_filters(	'mlig_gallery_order', 'DESC' );

			$this->gallery_shortcode = '[gallery include="' . $this->image_ids_string . '" order="' . $gallery_order . '"]'; //Define Shortcode

			$this->gallery_shortcode = apply_filters( 'mlig_shortcode', $this->gallery_shortcode, $this->images, $this->image_ids_string );


			//echo do_shortcode( $this->gallery_shortcode );
			echo apply_filters( 'the_content', $this->gallery_shortcode );


		};

	}


}

new Media_Library_Image_Gallery();
