<?php
if ( !defined( 'ABSPATH' ) ) { exit; }

if( !class_exists('BBlocksEnqueueScripts') ){
	class BBlocksEnqueueScripts{
		function __construct(){
			add_action( 'enqueue_block_editor_assets', [$this, 'enqueueBlockEditorAssets'] );
			add_action( 'enqueue_block_assets', [$this, 'enqueueBockAssets'] );
			add_action( 'wp_enqueue_scripts', [$this, 'enqueueScripts'] );
			add_filter( 'script_loader_tag', [$this, 'scriptLoaderTag'], 10, 3 );
		}

		function enqueueBlockEditorAssets(){
			wp_register_script( 'jqueryUI', B_BLOCKS_ASSETS . 'js/jquery-ui.min.js', [ 'jquery' ], '1.13.0', true ); // Slider Block

			wp_enqueue_script( 'b-blocks-template-library-script', B_BLOCKS_BUILD . 'template-library.js', [ 'wp-api', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-data', 'wp-dom-ready', 'wp-i18n', 'wp-util', 'react', 'react-dom' ], B_BLOCKS_VERSION, false );
			wp_set_script_translations( 'b-blocks-template-library-script', 'b-blocks', B_BLOCKS_DIR_PATH . 'languages' );

			wp_enqueue_style( 'b-blocks-template-library-style', B_BLOCKS_BUILD . 'template-library.css', [], B_BLOCKS_VERSION );

			wp_enqueue_script( 'b-blocks-index-script', B_BLOCKS_BUILD . 'index.js', [ 'wp-api', 'wp-blob', 'wp-block-editor', 'wp-blocks', 'wp-components', 'wp-compose', 'wp-data', 'wp-date', 'wp-element', 'wp-i18n', 'wp-rich-text', 'wp-util', 'jquery', 'jqueryUI', 'aos', 'modelViewer', 'easyTicker', 'swiper', 'dotLottiePlayer', 'lottieInteractivity', 'chartJS', 'plyr', 'textillate', 'goodShare' ], B_BLOCKS_VERSION, false );
			wp_set_script_translations( 'b-blocks-index-script', 'b-blocks', B_BLOCKS_DIR_PATH . 'languages' );

			wp_enqueue_style( 'b-blocks-index-style', B_BLOCKS_BUILD . 'index.css', [ 'fontAwesome', 'b-blocks-style' ], B_BLOCKS_VERSION );
		}

		function enqueueBockAssets(){
			wp_register_script( 'easyTicker', B_BLOCKS_ASSETS . 'js/easy-ticker.min.js', [ 'jquery' ], '3.2.1', true ); // Posts
			wp_register_script( 'swiper', B_BLOCKS_ASSETS . 'js/swiper.min.js', [], '8.0.7', true ); // Slider
			wp_register_script( 'dotLottiePlayer', B_BLOCKS_ASSETS . 'js/dotlottie-player.js', [], '1.5.7', true ); // Lottie Player
			wp_register_script( 'lottieInteractivity', B_BLOCKS_ASSETS . 'js/lottie-interactivity.min.js', [ 'dotLottiePlayer' ], '1.5.2', true ); // Lottie Player
			wp_register_script( 'chartJS', B_BLOCKS_ASSETS . 'js/chart.min.js', [], '3.5.1', true ); // Chart
			wp_register_script( 'plyr', B_BLOCKS_ASSETS . 'js/plyr.js', [], '3.7.2', true ); // Video
			wp_register_script( 'textillate', B_BLOCKS_ASSETS . 'js/jquery.textillate.min.js', [ 'jquery' ], '0.6.1', true ); // Animated Text
			wp_register_script( 'goodShare', B_BLOCKS_ASSETS . 'js/goodshare.min.js', [], B_BLOCKS_VERSION, true ); // Social Share
			wp_register_script( 'modelViewer', B_BLOCKS_ASSETS . 'js/model-viewer.min.js', [], B_BLOCKS_VERSION, true ); // 3D Viewer
			wp_register_script( 'aos', B_BLOCKS_ASSETS . 'js/aos.js', [], '3.0.0', true ); // Button
			wp_register_script( 'fancybox', B_BLOCKS_ASSETS . 'js/fancybox.min.js', [], '4.0', true ); // Image Gallery
			wp_register_script( 'mailtoui', B_BLOCKS_ASSETS . 'js/mailtoui-min.js', [], '1.0.3', true ); // Mailto
			
			wp_register_style( 'fontAwesome', B_BLOCKS_ASSETS . 'css/font-awesome.min.css', [], '6.4.2' ); // Icon
			wp_register_style( 'swiper', B_BLOCKS_ASSETS . 'css/swiper.min.css', [], '8.0.7' ); // Slider
			wp_register_style( 'animate', B_BLOCKS_ASSETS . 'css/animate.min.css', [], '4.1.1' ); // Animated Text
			wp_register_style( 'plyr', B_BLOCKS_ASSETS . 'css/plyr.css', [], '3.7.2' ); // Video
			wp_register_style( 'aos', B_BLOCKS_ASSETS . 'css/aos.css', [], '3.0.0' ); // Button
			wp_register_style( 'fancybox', B_BLOCKS_ASSETS . 'css/fancybox.min.css', '', '4.0', 'all' ); // Image Gallery

			wp_enqueue_style( 'b-blocks-style', B_BLOCKS_BUILD . 'script.css', [], B_BLOCKS_VERSION ); // Style
		}

		function enqueueScripts(){
			wp_enqueue_script( 'b-blocks-advanced-script', B_BLOCKS_BUILD . 'advanced.js', [], B_BLOCKS_VERSION, true );
		}

		function scriptLoaderTag( $tag, $handle, $src ){
			if ( 'modelViewer' !== $handle ) {
				return $tag;
			}
			$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
			return $tag;
		}
	}
	new BBlocksEnqueueScripts();
}