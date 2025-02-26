<?php
namespace TWPElementorimagepanorama\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Image Panorama
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Image_Panorama extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'image-panorama';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Image Panorama', 'image-panorama' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'image-panorama' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	

	

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'image-panorama' ),
			]
		);

		$this->add_control(
			'panorama_img_1',
			[
				'label' => esc_html__( 'Choose Image', 'image-panorama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
			]
			]
		);

		$this->add_control(
			'panorama_img_2',
			[
				'label' => esc_html__( 'Choose Image', 'image-panorama' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
			]
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		static $i = 0;

		echo'<div id="panorama-'.$i.'" class="panorama-'.$i.'"></div>';
		

		echo' 

		<style>
			html, body {
				margin: 0;
				width: 100%;
				height: 100%;
			}
			#panorama-'.$i.', .panolens-canvas {
			  width: 100%;
			  height: 600px;
			  background: #ffffff;
			}
		</style>
		<script type="text/javascript">
          jQuery(document).ready(function(){

          	"use strict";

			// Panorama options
			var panorama, panorama2, viewer, container;

			var lookAtPositions = [
			  new THREE.Vector3(0, 1000, -120),
			  new THREE.Vector3(0, 1000, -120)
			];

			var infospotPositions = [
			  new THREE.Vector3(0, -100, -2600),
			  new THREE.Vector3(0, -100, -2600)
			];

			container = document.querySelector( \'#panorama-'.$i.'\' );

			panorama = new PANOLENS.ImagePanorama( \''.$settings['panorama_img_1']['url'].'\' );
			panorama.addEventListener( function(){
			  viewer.tweenControlCenter( lookAtPositions[0], 0 );
			} );

			panorama2 = new PANOLENS.ImagePanorama( \''.$settings['panorama_img_2']['url'].'\' );
			panorama2.addEventListener( function(){
			  viewer.tweenControlCenter( lookAtPositions[1], 0 );
			} );

			panorama.link( panorama2, infospotPositions[0] );
			panorama2.link( panorama, infospotPositions[1] );
			
			viewer = new PANOLENS.Viewer( { 
				output: \'console\',
				container: container,
				
				} );

			viewer.add( panorama, panorama2 );

			}) // document.ready

		</script>
		';

		$i++;

	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="mosaicholder"></div>
			<ul id="mosaicContainer">
				<# _.each( settings.mosaic_gallery, function( image ) { #>
				<li class="mosaicgallery-item">
					<a href="{{ image.url }}" class="image-panorama-link">
						<img src="{{ image.url }}">
					</a>
				</li>
				<# }); #>
			</ul>
		<?php
	}
}
