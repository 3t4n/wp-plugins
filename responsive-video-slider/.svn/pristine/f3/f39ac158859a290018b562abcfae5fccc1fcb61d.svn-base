<?php
/*
Plugin Name: Responsive Video Slider
Plugin URI: http://www.junktheme.com
Description: Responsive Video Slider can be the best portion of your website. So make 100% responsive free WordPress video slider in minute. Responsive Video Slider is a WordPress video embed plugin that allows you to effortlessly include YouTube, DailyMotion, Vimeo, Blip and Vube videos to your website without coding knowledge. 
Author: Junk Theme
Version: 1.0
Author URI: http://www.junktheme.com
*/
class bs_video_slider {

	public function __construct() {
		$this->bs_register_video_slider();
		$this->bs_video_slider_metaboxes();
	}

	function bs_register_video_slider() {

		$labels = array(
			'name' => _x( 'Responsive Video Slider', 'bs_video_slider' ),
			'singular_name' => _x( 'Video Slider', 'bs_video_slider' ),
			'add_new' => _x( 'Add Video Slider', 'bs_video_slider' ),
			'add_new_item' => _x( 'Add New Video Slider', 'bs_video_slider' ),
			'edit_item' => _x( 'Edit Video Slider', 'bs_video_slider' ),
			'new_item' => _x( 'New Video Slider', 'bs_video_slider' ),
			'view_item' => _x( 'View Video Slider', 'bs_video_slider' ),
			'search_items' => _x( 'Search Barrel slider', 'bs_video_slider' ),
			'not_found' => _x( 'No Barrel slider found', 'bs_video_slider' ),
			'not_found_in_trash' => _x( 'No Slider s found in Trash', 'bs_video_slider' ),
			'parent_item_colon' => _x( 'Parent Barrel Slider:', 'bs_video_slider' ),
			'menu_name' => _x( 'Responsive Video Slider', 'bs_video_slider' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
			'description' => 'Barrel slider',
			'supports' => array( 'title' ),
			//'taxonomies' => array( 'genres' ),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-images-alt2',
			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'taxonomies' => array( 'bs_video_slider_tax' ),
		);
		register_post_type( 'bs_video_slider', $args );
	}



	function bs_video_slider_metaboxes() {

		add_action( 'admin_init', 'bs_meta_box' );

		function bs_meta_box() {
			add_meta_box( 'bs_video_slider_id', 'Add Barrel slider', 'display_video_slider_meta_box', 'bs_video_slider', 'normal', 'high' );
		}

		function display_video_slider_meta_box( $bs_video_slider ) {
			$video_url = ( get_post_meta( $bs_video_slider->ID, 'video_url', true ) );
			$video_provider = ( get_post_meta( $bs_video_slider->ID, 'video_provider', true ) );
			?>
			<table>
				<tr>
					<td style="width: 150px">Select Video Provider</td>
					<td>
						<?php
						echo "<select id='slider_loop' name='video_provider'>";
						$know = array( 'youtube','dailymotion');
						foreach ( $know as $v ) {
							echo '<option value="' . $v . '"';
							if ( $v == $video_provider ) {
								echo 'selected="selected"';
							}

							echo '>' . $v . '</option>';
						}

						echo "</select>";
						?>
					</td>

				</tr>
				<tr>
					<td style="width: 100%">Video Id</td>
					<td><input type="text" size="80" name="video_url" value="<?php echo $video_url; ?>" /></td>
				</tr>

			</table>
			<?php
		}

		add_action( 'save_post', 'add_bs_video_slider', 10, 2 );

		function add_bs_video_slider( $post_id, $bs_video_slider ) {
			if ( $bs_video_slider->post_type == 'bs_video_slider' ) {
				if ( isset( $_POST['video_url'] ) &&
						$_POST['video_url'] != '' ) {
					update_post_meta( $post_id, 'video_url', $_POST['video_url'] );
				}
				if ( isset( $_POST['video_provider'] ) &&
						$_POST['video_provider'] != '' ) {
					update_post_meta( $post_id, 'video_provider', $_POST['video_provider'] );
				}
			}
		}

	}

}

add_action( 'init', 'an_bs_video_slider' );

function an_bs_video_slider() {
	new bs_video_slider();
	include dirname( __FILE__ ) . '/bs-video-slider-shortcode.php';
	include dirname( __FILE__ ) . '/bs-video-slider-admin.php';
}
?>