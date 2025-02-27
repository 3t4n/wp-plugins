<?php
class GMWPLW_Block {
	
	protected static $instance = NULL;


	public function __construct () {
		add_action( 'init', array( $this, 'GMWPLW_init' ) );
		
	}

	public function GMWPLW_init () {
		wp_register_script(
	        'gmwplw-block-script',
	        GMWPLW_PLUGIN_URL . '/build/block.js',
	        array('wp-blocks', 'wp-element', 'wp-editor'),
	        '1.0.0',
	        true
	    );
	    $args = array(
			    'post_type' => 'product_widget',
			    'posts_per_page' => -1, 
			    'orderby' => 'date',
			    'order' => 'DESC',
			    'post_status' => 'publish', // Retrieve only published posts.
			);
	    $posts = get_posts($args);
	    $arr= array();
	    foreach ($posts as $post) {
	    	$arr[]= array('label' => $post->post_title, 'value' => $post->ID);
	    }
	     // Pass dynamic options to JavaScript
	    wp_localize_script('gmwplw-block-script', 'gmwplwBlockData', array(
	        'options' => $arr
	    ));

	    register_block_type('gmwplw/gmwplw-block', array(
	        'editor_script' => 'gmwplw-block-script',
	        'render_callback' => array( $this,'gmwplw_block_render'),
	    ));
	}

	public function gmwplw_block_render($attributes) {
	    if(isset($attributes['selectedOption'])){
	    	ob_start();
	    	GMWPLW_returndata($attributes['selectedOption']);
	    	$output = ob_get_clean();
	    	return $output ;
	    }else{
	    	return 'No option selected';
	    }
	    
	}

}