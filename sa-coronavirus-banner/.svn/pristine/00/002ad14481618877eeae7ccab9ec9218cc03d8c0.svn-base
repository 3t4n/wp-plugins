<?php
/**
 * Initialises the plugin requriements.
 *
 */

namespace SA\Covid19\BannerDisplay;

add_filter( 'body_class', function( $classes ) {

  $options = get_option( 'banner_options' );

  if ( empty( $options[ 'display'] ) && !empty( $options[ 'bannertext'] ) ){

    return array_merge( $classes, array( $options[ 'banner_position' ] , 'textBannner' ) );

  } else {

    return array_merge( $classes, array( $options[ 'banner_position' ] ) );

  }

} );

function banner(){

  $options = get_option( 'banner_options' );

  if ( empty( $options[ 'banner_position' ] ) ){
    return;
  }

  \wp_enqueue_style( 'sacovid-19-page-banner', SA_COVID19_URL . 'assets/css/covid-19.min.css', null, SA_COVID19_VERSION, false );

  ob_start();

	include_once 'user/banner.php';

	$banner = ob_get_contents();

	ob_end_clean();

	echo $banner;
}

function banner_css(){

  $options = get_option( 'banner_options' );

  if ( empty( $options[ 'colours' ] ) ){
    return;
  }
  echo '<style>
  .covid-banner{ background-color:'. $options[ 'colours' ][ 'background' ].'}
  .covid-banner{ color: '. $options[ 'colours' ][ 'text' ].' }
  .covid-banner a{ color: '. $options[ 'colours' ][ 'link' ].'}
  </style>';
}

 ?>
