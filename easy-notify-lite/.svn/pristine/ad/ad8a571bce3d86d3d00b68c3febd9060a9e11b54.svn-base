<?php

function head_img_txt_list( $id, $val = '', $type = '' )
{

    $getdata = [ 'headertext', 'maincontent', 'mainimage', 'bullets', 'bulletstyle', 'headertextfont', 'headertextcol', 'maincontentfont', 'maincontentcol', 'bulletsfont', 'bulletssize', 'bulletsison' ];
    $data    = easynotify_loader( $getdata, $id, $val, $type );

    if ( trim( $data[ 'mainimage' ] == '' ) ) {
        $image = plugins_url( '../inc/images/no_image.png', __FILE__ );
    } else {
        $image = $data[ 'mainimage' ];
    }

    echo '<div class="enoty-wrapper">'.( trim( $data[ 'headertext' ] != '' ) && trim( $data[ 'headertext' ] != 'none' ) ? '<div class="noty-text-header bottom-shadow"><h1 style="font-size:'.esc_attr( $data[ 'headertextfont' ] ).'; color:'.esc_attr( $data[ 'headertextcol' ] ).';">'.esc_html( $data[ 'headertext' ] ).'</h1></div>' : '' ).'<div class="noty-content-wrap"><div class="noty-popup-image"><img src="'.esc_url( $image ).'"></div><div class="noty-content-right"><div class="noty-popup-content" style="font-size:'.esc_attr( $data[ 'maincontentfont' ] ).' !important; color:'.esc_attr( $data[ 'maincontentcol' ] ).' !important;">'.wp_kses_post( wpautop( $data[ 'maincontent' ] ) ).'</div><div class="noty-popup-bullet-wrap"><ul class="noty-popup-bullet">';
    if ( $data[ 'bulletsison' ] == 'on' ) {
        foreach ( $data[ 'bullets' ] as $row ) {
            echo '<li class="'.esc_attr( $data[ 'bulletstyle' ] ).'" style="display:'.( trim( $row == '' ) ? 'none' : '' ).'; font-size:'.esc_attr( $data[ 'bulletssize' ] ).' !important; color:'.esc_attr( $data[ 'bulletsfont' ] ).' !important;"><p>'.esc_html( $row ).'</p></li>';
        }
    }
    echo '</ul></div></div></div></div>';

}
