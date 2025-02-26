<?php
$plugin_settings = get_option( 'appts_settings' );
$sid = $atts[ 'sid' ];
$sid = sanitize_key( $sid );

global $appts_pricing;

$pricing_table = APPTS_Class::get_table( $sid );


$table_datas = $pricing_table[ 'table_data' ];
// echo "<pre>";
// print_r($table_datas);
// echo "</pre>";
// die();
$column_datas = isset( $table_datas[ 'appts-col-data' ] ) ? $table_datas[ 'appts-col-data' ] : array();
$column_counts = count( $column_datas );

$google_fonts_used_array = array();
if ( isset( $table_datas[ 'font-selection' ] ) && $table_datas[ 'font-selection' ] != '' ) {
    array_push( $google_fonts_used_array, preg_replace( '/\s/', '+', $table_datas[ 'font-selection' ] ) );
}

$template = $table_datas[ 'template-selection' ];

$table_dynamic_css_at_end = array();

//table specific custom css
ob_start();
echo $table_datas[ 'custom-css' ];
$table_dynamic_css_at_end[] = ob_get_contents();
ob_end_clean();

ob_start();
include('appts_templates_dynamic_css.php');
$table_dynamic_css_at_end[] = ob_get_contents();
ob_end_clean();

switch ( $template ) {
    case 'template_01':
        include('shortcode-template/template14.php');
        break;

    case 'template_02':
        include('shortcode-template/template14.php');
        break;

    case 'template_03':
        include('shortcode-template/template2.php');
        break;

    case 'template_04':
        include('shortcode-template/template4.php');
        break;

    case 'template_05':
        include('shortcode-template/template5.php');
        break;

    default:
        include('shortcode-template/template5.php');
        break;
}

$google_fonts = implode( '|', $google_fonts_used_array );
if ( ! empty( $google_fonts ) ) {
    ?>
    <link href="https://fonts.googleapis.com/css?family=<?php echo $google_fonts; ?>" rel="stylesheet">
    <?php
}

$table_dynamic_css_at_end_print = implode( '', $table_dynamic_css_at_end );
if ( ! empty( $table_dynamic_css_at_end_print ) ) {
    ?>
    <style type='text/css' media='all'>
    <?php echo esc_attr( $table_dynamic_css_at_end_print ); ?>
    </style>
    <?php
}

