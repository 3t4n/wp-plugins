<?php


namespace TDWTFPlugin;


class Controller{

	private $attributes;

	/**
	 * Initiates general functions not specific to admin
	 */
	public function init()
	{
		/** Register shortcode */
		add_shortcode ( 'article-displayer-for-tdwtf', array( $this, 'shortCode') );

		add_action( 'wp_enqueue_scripts', function(){
			wp_enqueue_media();
			wp_enqueue_style( 'tdwtf-styles', TDWTF_PLUGIN_DIR . 'css/tdwtf-styles.css' );
			wp_enqueue_script( 'tdwtf-script', TDWTF_PLUGIN_DIR . 'js/tdwtf-script.js', array( 'jquery' ), FALSE, TRUE );
			wp_localize_script( 'tdwtf-script', 'ajax', ['url' => admin_url( 'admin-ajax.php' )] );
		});
	}

	public function shortCode( $attributes )
	{
		$this->attributes = shortcode_atts( array(
            'most_recent' => 1
        ), $attributes );

		//Article variable used in plugin.php file included after this.
		$article = Article::getMostRecentArticle();

		include(WDWTF_PLUGIN_ABSOLUTE_PATH . "/views/plugin.php");
	}

	/**
	 * Initiates the admin funcitons
	 */
	public function initAdmin()
	{
		add_action( 'wp_ajax_nopriv_tdwtf_plugin_get_article_by_id', array( $this, 'getArticleById' ) );
		add_action( 'wp_ajax_tdwtf_plugin_get_article_by_id', array( $this, 'getArticleById' ) );
	}

	public function getArticleById() {
		header( 'Content-Type: application/json' );
		echo json_encode( Article::getArticleById( $_POST['id'] ) );
		exit;
	}
}