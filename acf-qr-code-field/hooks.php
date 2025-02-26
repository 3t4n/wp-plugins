<?php 
function acfqrcode_scripts(){
    wp_enqueue_script( 'qrcode',  plugin_dir_url( __FILE__ ) . '/assets/js/qrcode.min.js', array ( 'jquery' ),2.5, true);
    wp_enqueue_script( 'acfqrcode_script',  plugin_dir_url( __FILE__ ) . '/assets/js/script.js', array ( 'jquery' ),2.5, true);      
}
add_action( 'wp_enqueue_scripts', 'acfqrcode_scripts' );

function acfqrcode_qrcode_format_value( $value, $post_id, $field ) {
    $qrcode_size = 150;
    $qrcode_color = "#000000";
    $qrcode_bg = "#ffffff";
    if(!empty($field['qrcode_color'])){
        $qrcode_color = $field['qrcode_color'];
    }
    if(!empty($field['qrcode_bg'])){
        $qrcode_bg = $field['qrcode_bg'];
    }
    if(!empty($field['qrcode_size'])){
        $qrcode_size = $field['qrcode_size'];
    }

    $value = '<div class="acfqrcode_qr_code" data-color="'.$qrcode_color.'" data-bg="'.$qrcode_bg.'" data-size="'.$qrcode_size.'" id="qr_'.$post_id.'"  style="display:none;">'.$value.'</div>';

    return $value;
}
add_filter('acf/format_value/type=qrcode', 'acfqrcode_qrcode_format_value', 10, 3);