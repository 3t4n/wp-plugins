<?php

class WP_MetaText_Front_End_Manipulation extends WP_MetaText_Default_Properties {

  public function __construct() {
    parent::__construct();

    $appState = get_option( 'meta-text-app-state', $this->appState );
    if ($appState == 'enabled' ) {
      add_action( 'wp_enqueue_scripts', [ $this, 'load_front_scripts' ] );
      add_action( 'wp_footer', [$this, 'scriptAttachment'] );
    }
  }

  function scriptAttachment() {
    ?>
      <script>var meta_text_wp_intervalId=setInterval(function(){MetaTextWP&&(clearInterval(meta_text_wp_intervalId),window.MetaTextWP=new MetaTextWP)},500);</script>
    <?php
  }
  
  public function load_front_scripts () {

    wp_enqueue_script( 'wp-meta-text-frontend', $this->URL . 'scripts/doc/meta-text.min.js', [], wp_rand(), true );
    
    $description = get_option( 'meta-text-description', $this->description );
    $buttonWidth = get_option( 'meta-text-button-width', $this->buttonWidth );
    $verticalAlignment = get_option( 'meta-text-vertical-alignment', $this->verticalAlignment );
    $horizontalAlignment = get_option( 'meta-text-horizontal-alignment', $this->horizontalAlignment );
    $offsetMargin = get_option( 'meta-text-offset-margin', $this->offsetMargin );
    $mobile = get_option( 'meta-text-mobile', $this->mobile );
    $margins = get_option( 'meta-text-margins', $this->margins );
    $selector = get_option( 'meta-text-selector', $this->selector );

    wp_localize_script( 'wp-meta-text-frontend', 'appLocalizerMetaTextFrontEnd', [
      'mobile' => $mobile,
      'margins' => $margins,
      'selector' => $selector,
      'description' => $description,
      'buttonWidth' => $buttonWidth,
      'offsetMargin' => $offsetMargin,
      'verticalAlignment' => $verticalAlignment,
      'horizontalAlignment' => $horizontalAlignment
    ] );
  }

}

new WP_MetaText_Front_End_Manipulation();