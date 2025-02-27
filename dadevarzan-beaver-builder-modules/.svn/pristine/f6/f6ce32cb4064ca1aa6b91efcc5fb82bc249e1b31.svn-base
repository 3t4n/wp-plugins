<div class="dadevarzan-date-and-time">
<?php
if ( $settings->display_date == 'true') {

    if ( !empty($settings->date_format) ) {
        $date_format = $settings->date_format;
    } else {
        $date_format =  get_option('date_format');
    }

    if ( function_exists('jdate') ) {
        $dvToday =  jdate( $date_format );
    } elseif ( function_exists('parsidate') ) {
        $dvToday =  parsidate( $date_format );
    } else {
        $dvToday =  date( $date_format);
    }

    printf( ' <span class="dadevarzan-date">%s</span> ', esc_html($dvToday) );
}

if ( $settings->display_time == 'true') {

    echo( ' <span class="dadevarzan-time"></span> ' );

}
?>
</div>
