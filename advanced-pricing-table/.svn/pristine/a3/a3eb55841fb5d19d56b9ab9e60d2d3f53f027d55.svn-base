<?php
add_shortcode( 'wppt_pricing_table', 'wppt_render_pricing_table' );

function wppt_render_pricing_table( $atts, $content = '' ) {
    wp_enqueue_style( 'temp-component' );

    global $wppt_pricing_tables_array;

    $atts = shortcode_atts( array(
        'id' => null,
    ), $atts, 'wppt_pricing_table' );

    if( !$atts['id'] ) return;
    $wppt_pricing_table_data = get_post_meta( $atts['id'], 'wppt_pricing_table_data', true );

    if( $wppt_pricing_table_data ) {
        $wppt_pricing_table_data = json_decode( stripslashes( base64_decode( $wppt_pricing_table_data ) ), true );
        !is_array( $wppt_pricing_table_data ) ? $wppt_pricing_table_data = array() : '';
    }
    ?>
    <style>
        .pricing .pricing__item{
        margin-right : <?php echo ( $wppt_pricing_table_data['settings']['s']['spacing'] / 2 ). 'px' ; ?>;
        margin-left : <?php echo ( $wppt_pricing_table_data['settings']['s']['spacing'] / 2 ). 'px' ; ?>;
        -webkit-flex: 0 1 <?php echo $wppt_pricing_table_data['settings']['s']['col_width'] . 'px'; ?>;
            flex: 0 1 <?php echo $wppt_pricing_table_data['settings']['s']['col_width'] . 'px'; ?>;
        }
    </style>
    <?php
    if( isset( $wppt_pricing_table_data['template'] ) && isset( $wppt_pricing_tables_array[$wppt_pricing_table_data['template']] ) ) {
        $wppt_pricing_tables_array[$wppt_pricing_table_data['template']]['public']( $wppt_pricing_table_data );
    }
    ?>
    <script>
        var $wppt_pricing_table_data = JSON.parse('<?php echo json_encode( $wppt_pricing_table_data ? $wppt_pricing_table_data : array() ); ?>');
    </script>
<?php
}
add_shortcode( 'bartag', 'bartag_func' );