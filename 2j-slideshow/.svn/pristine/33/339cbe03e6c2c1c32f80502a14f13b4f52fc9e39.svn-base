<?php

if ( ! class_exists( 'TwojSlideshowBlocks' ) ) {

	class TwojSlideshowBlocks {

		public $prefix = null;
		public $version = null;
		public $path = null;
		public $url = null;

		function __construct() {
			$this->version = TWOJ_SLIDESHOW_VERSION; 
			$this->prefix = 'blocks-twoj-slideshow-'; 
			
			$this->path = TWOJ_SLIDESHOW_PATH. ( TWOJ_SLIDESHOW_DEBUG ? 'guttenbergBlock/' : 'inc/addons/block/' );	
			$this->url 	= TWOJ_SLIDESHOW_URL. ( TWOJ_SLIDESHOW_DEBUG ? 'guttenbergBlock/' : 'inc/addons/block/' );	
			
			add_action( 'enqueue_block_assets', 						array( $this, 'block_assets') );
			add_action( 'enqueue_block_editor_assets', 					array( $this, 'editor_assets') );
			add_action( 'init', 										array( $this, 'php_block_init' ) );
			add_action( 'wp_ajax_twoj_slideshow_get_slideshow_json', 	array( $this, 'ajaxGetSlideshowJson') );

		}

		function block_assets(){ 

			wp_enqueue_style(
				$this->prefix.'style-css', 
				$this->url.'dist/blocks.style.build.css', 
				array( 'wp-editor' ),
				$this->version
			);
		}

		function editor_assets(){ 

			wp_enqueue_script(
				$this->prefix.'block-js',
				$this->url.'dist/blocks.build.js',
				array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
				$this->version,
				true // Enqueue the script in the footer.
			);

			wp_enqueue_style(
				$this->prefix.'block-editor-css',
				$this->url.'dist/blocks.editor.build.css', 
				array( 'wp-edit-blocks' ),
				$this->version
			);
		}

		function php_block_init(){

			if ( !function_exists( 'register_block_type' ) ) {
				return ;
			}

			register_block_type( 'twoj/block-2j-slideshow', array(
			    'render_callback' => array( $this, 'renderBlock'),
			    'attributes'	  => array(
					'galleryid'	 => array(
						'type'	=> 'number',
						'default' => 0,
					),
				),
			) );

		}

		function renderBlock( $attributes ) {
		


			if( is_array($attributes) &&  isset($attributes['galleryid']) && $attributes['galleryid']>0 ){
				if(class_exists('twojSlideshow')){
					$attr = array ( 'id'  =>  (int) $attributes['galleryid'] );
					$slideshow = new twojSlideshow($attr);
					return $slideshow->getSlideshow();
				} else return '2J SlideShow:: Error 386';
				
			} else {
				return sprintf( 
					'<div><strong>%s</strong>: %s</div>', 
					'2J SlideShow', 
					__("You didn't select any 2J Slideshow item in editor. Please select one from the list or create new slideshow",'2j-slideshow')
				) ;
			}    
		}

		function ajaxGetSlideshowJson() { 

			$query = new WP_Query( 
				array( 
					'post_type' => TWOJ_SLIDESHOW_TYPE_POST,
					'post_status' => array( 'publish', 'private', 'future' )
				)
			);
			$posts = $query->posts;

			$returnJson = array();

			if( is_array($posts) && count($posts)){
				foreach($posts as $post) {
					$returnJson[] = array(
						'id' => $post->ID,
						'title' => esc_js($post->post_title),
						'parent' => $post->post_parent,
					);
				}
			}

			wp_send_json( $returnJson );
			wp_die();
		}
	}
}

new TwojSlideshowBlocks();