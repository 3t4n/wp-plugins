<?php
  add_shortcode( 'bdrimg', 'bdrimg_shortcode' );
  function bdrimg_shortcode( $atts, $content = null ) {
    if ( ! $content ) {
      return "Please add content to your shortcode";
    }
    $i = $w = $ir = $is = $bc = '';
    extract($atts);
    $style = $bc ? '
      border-style: solid;
      border-width: '.$w.';
      border-color: '.$bc.';
    ' : '
      border-style: solid;
      border-width: '.$w.';
      -moz-border-image: url('.$i.') '.$is.' '.$ir.';
      -webkit-border-image: url('.$i.') '.$is.' '.$ir.';
      -o-border-image: url('.$i.') '.$is.' '.$ir.';
      border-image: url('.$i.') '.$is.' '.$ir.';
    ';
    $html = '<div style="'.$style.'">'.$content.'</div>';

    return $html;
  }