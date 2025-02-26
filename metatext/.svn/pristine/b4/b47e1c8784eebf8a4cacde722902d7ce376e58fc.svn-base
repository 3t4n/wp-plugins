<?php
  /**
   * Loading Necessary Scripts
   */
  class WP_MetaText_Script_Loader extends WP_MetaText_Default_Properties {

    public function __construct() {
      parent::__construct();

      if (
        isset($_GET['page']) && 
        htmlspecialchars($_GET['page']) == 'metaText'
      ) {
        add_action( 'admin_enqueue_scripts', [ $this, 'load_scripts' ] );
      }
    }

    public function load_scripts () {
      wp_enqueue_script( 'wp-meta-text', $this->URL . 'dist/bundle.js', [ 'jquery', 'wp-element' ], wp_rand(), true );
      wp_localize_script( 'wp-meta-text', 'appLocalizerMetaText', [
        'url' => home_url( '/index.php/wp-json' ),
        'nonce' => wp_create_nonce( 'wp_rest' ),
      ] );
    }
  }
  
  new WP_MetaText_Script_Loader();
