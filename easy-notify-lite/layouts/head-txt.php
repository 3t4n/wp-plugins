<?php

function head_txt( $id, $val = '', $type = '' )
{

    $getdata = [ 'headertext', 'maincontent', 'headertextfont', 'headertextcol', 'maincontentfont', 'maincontentcol' ];
    $data    = easynotify_loader( $getdata, $id, $val, $type );

    echo '<div class="enoty-wrapper">'.( trim( $data[ 'headertext' ] != '' ) && trim( $data[ 'headertext' ] != 'none' ) ? '<div class="noty-text-header bottom-shadow"><h1 style="font-size:'.esc_attr( $data[ 'headertextfont' ] ).'; color:'.esc_attr( $data[ 'headertextcol' ] ).';">'.esc_html( $data['headertext' ] ).'</h1></div>' : '' ).'<div class="noty-content-wrap"><div class="noty-content-center"><div class="noty-popup-content" style="font-size:'.esc_attr( $data[ 'maincontentfont' ] ).' !important; color:'.esc_attr( $data[ 'maincontentcol' ] ).' !important;">'.wp_kses_post( wpautop( $data['maincontent' ] ) ).'</div>';

    echo '</div></div></div>';

}
